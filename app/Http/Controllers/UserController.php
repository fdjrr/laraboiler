<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UserImport;
use App\Models\Entry;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class UserController extends Controller
{
  public function index(Request $request)
  {
    $users = User::latest()->filter([
      'search' => $request->search,
    ]);

    return view('pages.users.index', [
      'title' => 'Data Users',
      'users' => $users->paginate($request->entry ?? 15)->withQueryString(),
      'roles' => Role::all(),
      'permissions' => Permission::all(),
      'entries' => Entry::all(),
    ]);
  }

  public function show(User $user): JsonResponse
  {
    try {
      return response()->json([
        'status' => true,
        'data' => $user,
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }

  public function edit(User $user)
  {
    return view('pages.users.edit', [
      'title' => 'Edit User',
      'user' => $user,
      'roles' => Role::all(),
      'permissions' => Permission::all(),
    ]);
  }

  public function update(User $user, Request $request): JsonResponse
  {
    DB::beginTransaction();

    try {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => ($request->password) ? 'required|min:8' : '',
        'confirm_password' => 'same:password',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'status' => false,
          'message' => $validator->errors()->first(),
        ])->setStatusCode(422);
      }

      if ($request->email != $user->email && User::where('email', $request->email)->exists()) {
        return response()->json([
          'status' => false,
          'message' => 'Email already exists!',
        ])->setStatusCode(422);
      }

      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = ($request->password) ? Hash::make($request->password) : $user->password;
      $user->save();

      $roles = [];
      if ($request->roles) {
        foreach ($request->roles as $item) {
          $role = Role::find($item);
          if ($role) {
            $roles[] = $role;
          } else {
            return response()->json([
              'status' => false,
              'message' => 'Role not found!',
            ])->setStatusCode(400);
          }
        }
      }
      $user->syncRoles($roles);

      $permissions = [];
      if ($request->permissions) {
        foreach ($request->permissions as $item) {
          $permission = Permission::find($item);
          if ($permission) {
            $permissions[] = $permission;
          } else {
            return response()->json([
              'status' => false,
              'message' => 'Permission not found!',
            ])->setStatusCode(400);
          }
        }
      }
      $user->syncPermissions($permissions);

      DB::commit();

      return response()->json([
        'status' => true,
        'message' => 'User updated successfully!',
        'data' => $user,
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      DB::rollBack();

      return response()->json([
        'status' => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }

  public function destroy(User $user): JsonResponse
  {
    try {
      $user->delete();

      return response()->json([
        'status' => true,
        'message' => 'User deleted successfully!',
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }

  public function export(Request $request): JsonResponse
  {
    try {
      $path = "exports/users.xlsx";

      Excel::store(new UsersExport(), $path);

      return response()->json([
        'status' => true,
        'message' => 'Exported successfully!',
        'result' => Storage::url($path),
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }

  public function store(Request $request): JsonResponse
  {
    DB::beginTransaction();

    try {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'confirm_password' => 'same:password',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'status' => false,
          'message' => $validator->errors()->first(),
        ])->setStatusCode(422);
      }

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();

      $roles = [];
      if ($request->roles) {
        foreach ($request->roles as $item) {
          $role = Role::find($item);
          if ($role) {
            $roles[] = $role;
          } else {
            return response()->json([
              'status' => false,
              'message' => 'Role not found!',
            ])->setStatusCode(400);
          }
        }
      }
      $user->syncRoles($roles);

      $permissions = [];
      if ($request->permissions) {
        foreach ($request->permissions as $item) {
          $permission = Permission::find($item);
          if ($permission) {
            $permissions[] = $permission;
          } else {
            return response()->json([
              'status' => false,
              'message' => 'Permission not found!',
            ])->setStatusCode(400);
          }
        }
      }
      $user->syncPermissions($permissions);

      DB::commit();

      return response()->json([
        'status' => true,
        'message' => 'User created successfully!',
        'data' => $user,
      ])->setStatusCode(201);
    } catch (Throwable $e) {
      DB::rollBack();

      return response()->json([
        'status' => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }

  public function import(Request $request): JsonResponse
  {
    try {
      $validator = Validator::make($request->all(), [
        'csv' => 'required|mimes:csv',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'status' => false,
          'message' => $validator->errors()->first(),
        ])->setStatusCode(422);
      }

      $file = $request->file('csv')->store('imports/users');

      Excel::import(new UserImport(), $file, null, \Maatwebsite\Excel\Excel::CSV);

      return response()->json([
        'status' => true,
        'message' => 'User imported successfully!',
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }
}
