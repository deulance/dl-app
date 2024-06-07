<?php
namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\FileHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Role;
class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::with('roles')->get();
        $roles = Role::all();
        return view('admin.admins.index', ['items' => $admins,'roles'=>$roles]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:4',
        ]);
        $password = Hash::make($request->password);
        $admin = Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $password
        ]);
        
        $admin->roles()->sync($request->input('roles'));
       

        return redirect()->route('admin.admins.index')->with('success', 'User created successfully.');

    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.show', ['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
        if( !empty( $request->password ) ) {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:admins,email,' . $id,
                'password' => 'sometimes|string|min:4',
            ]);
        }else{
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:admins,email,' . $id
            ]);
        }
        $admin = Admin::findOrFail($id);
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];
        $admin->roles()->sync($request->input('roles'));
        if( !empty( $request->password ) ){
            if (isset($validatedData['password'])) {
                $password = Hash::make($request->password);
                $admin->password = $password;
            }
        }
       
        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'User deleted successfully.');
    }
}
