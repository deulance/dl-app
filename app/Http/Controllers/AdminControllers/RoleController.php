<?php
namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\FileHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Permission;
use App\Models\Role;
class RoleController extends Controller
{
    public function index()
    {
        $role_list = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('admin.roles.index', ['items' => $role_list,'permissions'=>$permissions,'roles'=>[]]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string'
            
        ]);

        $role = Role::create([
            'name' => $validatedData['name']
        ]);
        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        //return view('admin.roles.show', ['role' => $role]);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        //return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, $id)
    {
       
            $validatedData = $request->validate([
                'name' => 'required|string',
               
            ]);
        
        $role = Role::findOrFail($id);
        $role->name = $validatedData['name'];
        $role->permissions()->sync($request->input('permissions'));
       
       
        $role->save();

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
