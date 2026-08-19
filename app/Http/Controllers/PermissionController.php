<?php

namespace App\Http\Controllers;

use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(['permission:permissions.index'], only: ['index', 'all']),
        ];
    }

     public function index()
    {
        //get permissions
        $permissions = Permission::when(request()->search, function($permissions) {
            $permissions = $permissions->where('name', 'like', '%'. request()->search . '%');
        })->latest()->paginate(5);

        //append query string to pagination links
        $permissions->appends(['search' => request()->search]);

        //return with Api Resource
        return new PermissionResource(true, 'List Data Permissions', $permissions);
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        //get permissions
        $permissions = Permission::latest()->get();

        //return with Api Resource
        return new PermissionResource(true, 'List Data Permissions', $permissions);
    }
}
