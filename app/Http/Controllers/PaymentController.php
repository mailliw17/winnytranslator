<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\UserPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user()->role;

        // SECURE ADMIN ROUTING
        if ($role == 1) {
            // return UserPayment::with('user')->get();
            $data = UserPayment::with('user')->get();

            return view('pages.admin.payment.index')->with(
                [
                    'user_payments' => $data
                ]
            );
        } else {
            return redirect()->back();
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = auth()->user()->role;

        // SECURE ADMIN ROUTING
        if ($role == 1) {
            $user = UserPayment::findOrFail($id);

            return view('pages.admin.payment.edit')->with(
                [
                    'user' => $user
                ]
            );
        } else {
            return redirect()->back();
        }
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
        $role = auth()->user()->role;

        // SECURE ADMIN ROUTING
        if ($role == 1) {
            $validatedData = $request->validate([
                'payment_method' => 'required',
                'account_info' => 'required',
                'price' => 'required|int',
            ]);

            $user = UserPayment::findOrFail($id);
            $user->update($validatedData);
            // $request->session()->flash('success-edit', 'Edit User Successfully');
            return redirect()->route('payments.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
