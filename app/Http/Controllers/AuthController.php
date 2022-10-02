<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserPayment;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = auth()->user()->role;
            // dd($role);
            switch ($role) {
                case 1:
                    return redirect()->intended('/documents');
                    break;
                case 2:
                    return redirect()->intended('/account-translator');
                    break;
            };
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function registerPage()
    {
        $role = auth()->user()->role;

        // SECURE ADMIN ROUTING
        if ($role == 1) {
            return view('pages.admin.auth.register');
        } else {
            return redirect()->back();
        }
    }

    public function register(Request $request)
    {
        $role = auth()->user()->role;

        // SECURE ADMIN ROUTING
        if ($role == 1) {
            // generate UUID for user
            $request['id'] =  Uuid::uuid4()->toString();

            // take UUID from id(user table) to id_user (user_payments table)
            $request['user_id'] =  $request['id'];

            $validatedData = $request->validate(
                [
                    'id' => 'required',
                    'name' => 'required|max:255',
                    'username' => 'required|unique:users|min:3',
                    'email' => 'required|email:dns|unique:users',
                    'phone' => 'required',
                    'password' => 'required|min:3',
                    'role' => 'required',
                    // FOR PAYMENT INFO
                    'user_id' => 'required',
                    'payment_method' => 'required',
                    'account_info' => 'required',
                    'account_name' => 'required',
                    'price' => 'required',
                    'payment_period' => 'required'
                ]
            );

            $validatedData['password'] = Hash::make($validatedData['password']);

            User::create($validatedData);
            UserPayment::create($validatedData);
            $request->session()->flash('success', 'Registration User Successfully');
            return redirect()->route('users.index');
        } else {
            return redirect()->back();
        }
    }

    public function showChangePasswordForm($id)
    {
        $role = auth()->user()->role;

        // SECURE ADMIN ROUTING
        if ($role == 1) {
            $user = User::findOrFail($id);

            return view('pages.admin.user.forgotpassword')->with(
                [
                    'user' => $user
                ]
            );
        } else {
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $role = auth()->user()->role;

        // SECURE ADMIN ROUTING
        if ($role == 1) {
            $validatedData = $request->validate([
                'newpassword' => 'required|min:3|same:password_confirmation',
                'password_confirmation' => 'required|min:3',
            ]);

            $validatedData['newpassword'] = Hash::make($validatedData['newpassword']);

            $data = User::findOrFail($id);
            $data->password = $validatedData['newpassword'];
            $data->save();
            $request->session()->flash('success-update-password', 'Password Changed');
            return redirect()->route('users.index');
        } else {
            return redirect()->back();
        }
    }

    // this routing is for condition where user hardcode URL login, but them have login
    public function checkRedirect()
    {
        $role = auth()->user()->role;
        // dd($role);
        switch ($role) {
            case 1:
                return redirect()->route('documents.index');
                break;
            case 2:
                return redirect()->route('documents-translator.index');
                break;
        };
    }
}
