<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\WithdrawHistory;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // send data to hidden button when any transaction is active
        $payroll = DB::table('withdraw_histories')
            ->join('user_payments', 'withdraw_histories.user_payment_id', '=', 'user_payments.id')
            ->join('users', 'user_payments.user_id', '=', 'users.id')
            ->select('user_payments.user_id as user_id', 'withdraw_histories.status as status', 'withdraw_histories.salary as salary', 'users.name as name', 'user_payments.id', 'withdraw_histories.number_words_wd', 'withdraw_histories.id as withdraw_id', 'withdraw_histories.updated_at as paid_on')
            // ->where('status', '=', '0')
            ->get();

        // dd($payroll);

        return view('pages.admin.withdraw.index')->with(
            [
                'payroll' => $payroll
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
        //
    }

    public function check($id)
    {
        // only select required data
        $check = DB::table('withdraw_histories')
            ->join('user_payments', 'withdraw_histories.user_payment_id', '=', 'user_payments.id')
            ->join('users', 'user_payments.user_id', '=', 'users.id')
            ->select('withdraw_histories.*', 'user_payments.user_id', 'user_payments.price', 'user_payments.payment_method', 'user_payments.account_info', 'user_payments.account_name', 'users.name', 'users.email', 'users.phone')
            ->where('withdraw_histories.status', '=', '0')
            ->where('withdraw_histories.id', '=', $id)
            ->first();

        // dd($check);

        return view('pages.admin.withdraw.check')->with(
            [
                'check' => $check
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
            'status' => 'required|int'
        ]);

        $doc_chap = WithdrawHistory::findOrFail($id);
        $doc_chap->update($validatedData);

        return redirect()->route('withdraw.index');
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
