<?php

namespace App\Http\Controllers\Admin\Settings;

use App\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleManagementController extends Controller
{
    public function index()
    {
        return view('admin.settings.role-management.index');
    }

    public function permission()
    {
        //DB::enableQueryLog();
        $permissions = Permission::addSelect(['service' => PermissionService::addSelect(['service'])
                                                ->whereColumn('permission_id', 'permissions.id')
                                        ])
                                        ->where('guard_name', 'admin')
                                        ->get()
                                        ->groupBy('service');

        return response()->json($permissions, 200);
        //dd(DB::getQueryLog());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'permissions' => 'required'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->save();

        $role->givePermissionTo($request->permissions);
        return response()->json($role, 201);
    }
}
