<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('dashboard.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create',[
            'role'=>new Role(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Support\Facades\Request $request,Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array',
        ]);

        $role =Role::createWithAbilities($request);

        return redirect()
            ->route('dashboard.roles.index')
            ->with('success','Role created created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\Illuminate\Support\Facades\Request $request,Role $role  )
    {
        $request -> validate([
            'name' => 'required|string|max:255',
            'abilities'=>'array',
        ]);
        $role->updateWithAbilities($request);

        return redirect()
            ->route('dashboard.roles.index')
            ->with('success','role updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect()
            ->route('dashboard.roles.index')
            ->with('success','role deleted successfully');
    }
}
