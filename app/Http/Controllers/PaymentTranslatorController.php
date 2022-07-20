<?php

namespace App\Http\Controllers;

use DB;
use Auth;
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
        $user = Auth::user();



        $doc = DB::table('document_chapters')
            ->select(DB::raw('SUM(number_words) as total_number_words'),  DB::raw('ROUND(SUM(cost_of_translate),2) as total_cost_of_translate'), DB::raw('COUNT(id) as total_doc'))
            ->where('user_id', '=', $user->id) //still hardcode
            ->where('is_paid', '=', '0') // not yet paid
            ->where('status', '=', '10') // document accepted
            ->get();

        // dd($doc);

        // send data to hidden button when any transaction is active
        $disabled_button = DB::table('withdraw_histories')
            ->join('user_payments', 'withdraw_histories.user_payment_id', '=', 'user_payments.id')
            ->select('user_payments.user_id as user_id', 'withdraw_histories.status as status')
            ->where('user_id', '=', $user->id)
            ->where('status', '=', '0')
            ->count();

        // dd($disabled_button);

        return view('pages.translator.payment.index')->with(
            [
                'doc' => $doc,
                'disabled_button' => $disabled_button

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
            'account_name' => 'required',
            'user_id' => 'required',
        ]);
        // dd('lolos');

        UserPayment::create($validatedData);
        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('payment-translator.info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function info()
    {
        // $user = Auth::user();
        // $payment = DB::table('user_payments')
        //     ->select('user_payments.*')
        //     ->where('user_id', '=', $user->id)
        //     ->get();

        // if ($payment->isEmpty()) {
        //     return view('pages.translator.payment.showNoSidebar')->with([
        //         'payment' => $payment
        //     ]);
        // } elseif ($payment[0]->price == null) {
        //     return view('pages.translator.payment.showAskPriceFirst')->with([
        //         'payment' => $payment
        //     ]);
        // } else {
        //     return view('pages.translator.payment.show')->with(
        //         [
        //             'payment' => $payment
        //         ]
        //     );
        // }
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
        // var_dump('masuk');
        $validatedData = $request->validate([
            'payment_method' => 'required',
            'account_info' => 'required',
            'account_name' => 'required',
            // 'is_paid' => 'required'
        ]);

        $user = UserPayment::findOrFail($id);
        $user->update($validatedData);
        // $request->session()->flash('success-edit', 'Edit User Successfully');
        return redirect()->route('payment-translator.info');
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
