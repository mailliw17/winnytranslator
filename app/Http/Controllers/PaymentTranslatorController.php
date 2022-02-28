<?php

namespace App\Http\Controllers;

use DB;
use App\UserPayment;
use Illuminate\Http\Request;

class PaymentTranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.translator.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'payment_method' => 'required',
            'account_info' => 'required',
            'user_id' => 'required',
        ]);
        // dd('lolos');

        UserPayment::create($validatedData);
        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('account-translator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = DB::table('user_payments')
            ->where('user_id', '=', $id)
            ->get();

        // return $payment;

        return view('pages.translator.payment.show')->with([
            'payment' => $payment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserPayment::findOrFail($id);

        return view('pages.translator.payment.edit')->with(
            [
                'user' => $user
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
        $validatedData = $request->validate([
            'payment_method' => 'required',
            'account_info' => 'required',
        ]);

        $user = UserPayment::findOrFail($id);
        $user->update($validatedData);
        // $request->session()->flash('success-edit', 'Edit User Successfully');
        return redirect()->route('account-translator.index');
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
