<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.settings.permission-management.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'guard_name' => 'required',
        ]);

        $permission = Permission::Create([
            'name'       => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return response()->json($permission, 201);
    }

    public function permissions(Request $request)
    {
        return Permission::orderBy('id', 'desc')->get();
    }

    public function edit(Permission $permission)
    {
        return $permission;
    }

    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name'       => 'required',
            'guard_name' => 'required',
        ]);
        $permission->update([
            'name'       => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return response()->json($permission, 200);
    }
}
