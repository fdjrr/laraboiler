<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Permission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $permissions = Permission::latest()
      ->filter([
        'search' => $request->search
      ])
      ->paginate($request->entry ?? 15)
      ->withQueryString();

    return view('pages.permissions.index', [
      'title' => 'Data Permissions',
      'permissions' => $permissions,
      'entries' => Entry::all()
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

      if (Permission::where('name', $request->name)->exists()) {
        return response()->json([
          'status' => false,
          'message' => 'Permission already exists!'
        ])->setStatusCode(400);
      }

      $permission = new Permission();
      $permission->name = $request->name;
      $permission->guard_name = $request->guard_name;
      $permission->save();

      return response()->json([
        'status' => true,
        'message' => 'Permission added successfully!',
        'data' => $permission
      ])->setStatusCode(201);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Permission $permission): JsonResponse
  {
    try {
      return response()->json([
        'status' => true,
        'data' => $permission
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
  public function edit(Permission $permission)
  {
    return view('pages.permissions.edit', [
      'title' => 'Edit Permission',
      'permission' => $permission
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Permission $permission): JsonResponse
  {
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

      if ($request->name != $permission->name && Permission::where('name', $request->name)->exists()) {
        return response()->json([
          'status' => false,
          'message' => 'Permission already exists!'
        ])->setStatusCode(400);
      }

      $permission->name = $request->name;
      $permission->guard_name = $request->guard_name;
      $permission->save();

      return response()->json([
        'status' => true,
        'message' => 'Permission updated successfully!',
        'data' => $permission
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission): JsonResponse
  {
    try {
      $permission->delete();
      
      return response()->json([
        'status' => true,
        'message' => 'Permission deleted successfully!'
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }
}
