<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $roles = Role::latest()
      ->filter([
        'search' => $request->search,
      ])
      ->paginate($request->entry ?? 15)
      ->withQueryString();

    return view('pages.roles.index', [
      'title' => 'Data Roles',
      'roles' => $roles,
      'permissions' => Permission::all(),
      'entries' => Entry::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): JsonResponse
  {
    DB::beginTransaction();

    try {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'guard_name' => 'required'
      ]);

      if ($validator->fails()) {
        return response()->json([
          'status' => false,
          'message' => $validator->errors()->first()
        ])->setStatusCode(422);
      }

      if (Role::where('name', $request->name)->exists()) {
        return response()->json([
          'status' => false,
          'message' => 'Permission already exists!'
        ])->setStatusCode(400);
      }

      $role = new Role();
      $role->name = $request->name;
      $role->guard_name = $request->guard_name;
      $role->save();

      if ($request->permissions) {
        $permissions = [];
        foreach ($request->permissions as $permission) {
          $permission = Permission::find($permission);
          if ($permission) {
            $permissions[] = $permission->name;
          } else {
            return response()->json([
              'status' => false,
              'message' => 'Permission not found!'
            ])->setStatusCode(400);
          }
        }

        $role->syncPermissions($permissions);
      }

      DB::commit();

      return response()->json([
        'status' => true,
        'message' => 'Role added successfully!',
        'data' => $role
      ])->setStatusCode(201);
    } catch (Throwable $e) {
      DB::rollBack();

      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role): JsonResponse
  {
    try {
      return response()->json([
        'status' => true,
        'data' => $role
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    return view('pages.roles.edit', [
      'title' => 'Edit Role',
      'role' => $role,
      'permissions' => Permission::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Role $role): JsonResponse
  {
    DB::beginTransaction();

    try {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'guard_name' => 'required'
      ]);

      if ($validator->fails()) {
        return response()->json([
          'status' => false,
          'message' => $validator->errors()->first()
        ])->setStatusCode(422);
      }

      if ($request->name != $role->name && Role::where('name', $request->name)->exists()) {
        return response()->json([
          'status' => false,
          'message' => 'Role already exists!'
        ])->setStatusCode(400);
      }

      $role->name = $request->name;
      $role->guard_name = $request->guard_name;
      $role->save();

      if ($request->permissions) {
        $permissions = [];
        foreach ($request->permissions as $permission) {
          $permission = Permission::find($permission);
          if ($permission) {
            $permissions[] = $permission->name;
          } else {
            return response()->json([
              'status' => false,
              'message' => 'Permission not found!'
            ])->setStatusCode(400);
          }
        }

        $role->syncPermissions($permissions);
      }

      DB::commit();

      return response()->json([
        'status' => true,
        'message' => 'Role updated successfully!',
        'data' => $role
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      DB::rollBack();

      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role): JsonResponse
  {
    try {
      $role->delete();

      return response()->json([
        'status' => true,
        'message' => 'Role deleted successfully!'
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }
}
