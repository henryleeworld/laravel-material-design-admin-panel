<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return back();

    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
