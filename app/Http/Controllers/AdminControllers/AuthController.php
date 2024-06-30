<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Rules\Cpf;
class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('admin')->user()) {
            return redirect()->route('admin_dashboard');
        }
        return view('admin.auth.login');
    }

    public function dasboard()
    {
        

        return view('admin.dashboard.dashboard', get_defined_vars());
    }
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    /**
     * Admin Login
     *
     * @param Request $request
     * @return void
     */
    public function loginProcess(Request $request)
    {
        try {
            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                if (Auth()->guard('admin')->check()) {
                    return redirect()->route('admin_dashboard');
                } else {
                    return redirect()->back()->with('error', "Permission Denied");
                }
            }
            return back()->with('error', "Invalid Credentials");
        } catch (\Exception $e) {
            return back()->with('error', "Something went wrong!!");
        }
    }

    /**
     * Logout Admin
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        try {
            Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('admin_login');
        } catch (\Exception $e) {
            return back()->with('error', "Something went wrong!!");
        }
    }

    public function admin_profile()
    {
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.auth.profile', compact('admin'));
    }

    public function update_password(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = Auth::guard('admin')->user()->id;
        $old = Auth::guard('admin')->user()->password;
        $Admin = Hash::check($request->old_password, $old);
        if ($request->password == $request->password_confirmation) {
            if ($Admin) {
                Admin::where('id', $id)->update(['password' => Hash::make($request->password)]);

                DB::commit();
                return redirect()->back()->with('success', 'Password Changed Successfully');
            } else {
                return redirect()->back()->with('error', 'Old password is incorrect!');
            }
        }
        return redirect()->back()->with('error', 'New Password and confirm password did not match!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', "Something went wrong!!");
        }
    }

    public function update_profile(Request $request)
    {
        DB::beginTransaction();
        try {
            $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);

            $admin->name = $request->name;
            $admin->email = $request->email;

            if ($request->hasFile('image')) {

                $destination = 'uploads/admin/' . $admin->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $random_code = mt_rand(1000, 9999);
                $admin_image =  $request->file('image');
                $img_name = 'uploads/admin/'.$admin->id . $admin->name .  $random_code . '.' . $admin_image->getClientOriginalExtension();

                $admin_image->move(public_path('uploads/admin'), $img_name);

                $admin->image = $img_name;

            }

            $admin->update();

            DB::commit();

            return redirect()->back()->with('success', 'Profile Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return redirect()->back()->with('error', 'Database Error. Please Contact Support');
            }
        }
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'cpf' => ['required', 'string', 'size:11', 'unique:admins', new Cpf],
        ]);
//            'password' => 'required|string|min:8|confirmed',

        DB::beginTransaction();


        try {
            $admin = Admin::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'cpf' => $validatedData['cpf'],
                'password' => Hash::make($request->password),
            ]);

            // Atribui a role de usuário (role_id = 2)
            $admin->roles()->attach(2);

            DB::commit();

            // Loga o usuário recém registrado
            Auth::guard('admin')->login($admin);

            return redirect()->route('admin_dashboard');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o usuário. Certifique-se de informar um email ainda nao utilizado e um CPF válido');
        }
    }
}
