<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserPayment;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translators = User::where('role', '=', 2)->get();
        $admin = User::where('role', '=', 1)->get();
        return view('pages.admin.user.index')->with(
            [
                'translators' => $translators,
                'admin' => $admin
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // to get user dan user_payment info
        $user_info_all = DB::table('users')
            ->join('user_payments', 'user_payments.user_id', '=', 'users.id')
            ->select('user_payments.*', 'users.*')
            ->where('users.id', '=', $id)
            ->first();

        // dd($user_info_all);

        return view('pages.admin.user.info')->with(
            [
                'user' => $user_info_all
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // to get user dan user_payment info
        $user_info_all = DB::table('users')
            ->join('user_payments', 'user_payments.user_id', '=', 'users.id')
            ->select('user_payments.*', 'users.*')
            ->where('users.id', '=', $id)
            ->first();

        // dd($user_info_all);

        return view('pages.admin.user.edit')->with(
            [
                'user' => $user_info_all
            ]
        );
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // take UUID from id(user table) to id_user (user_payments table)
        $request['user_id'] =  $request['id'];

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3',
            'email' => 'required|email:dns',
            'phone' => 'required',
            'role' => 'required',
            // for payment info
            'user_id' => 'required',
            'payment_method' => 'required',
            'account_info' => 'required',
            'account_name' => 'required',
            'price' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        // update user_payment information
        UserPayment::where('user_id', $id)
            ->update([
                'payment_method' => $validatedData['payment_method'],
                'account_name' => $validatedData['account_name'],
                'account_info' => $validatedData['account_info'],
                'price' => $validatedData['price']
            ]);
        $request->session()->flash('success-edit', 'Edit User Successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        // delete user and delete user_payment
        UserPayment::where('user_id', $id)->delete();

        return redirect()->route('users.index');
    }
}
