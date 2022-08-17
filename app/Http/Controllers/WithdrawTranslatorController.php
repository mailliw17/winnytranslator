<?php

namespace App\Http\Controllers;

use App\WithdrawHistory;
use Auth;
use DB;
use Illuminate\Http\Request;

class WithdrawTranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        $info_doc = DB::table('document_chapters')
            ->select(DB::raw('SUM(number_words) as total_number_words'),  DB::raw('ROUND(SUM(cost_of_translate),2) as total_cost_of_translate'), DB::raw('COUNT(id) as total_doc'))
            ->where('user_id', '=', $user->id)
            ->where('is_paid', '=', '0') // not yet paid
            ->where('status', '=', '10') // document accepted
            ->where('is_vendor_paid', '=', '1') //the vendor has paid 
            ->get();

        $info_user_payment = DB::table('user_payments')
            ->select('id', 'user_id', 'payment_method', 'account_info', 'account_name')
            ->where('user_id', '=', $user->id)
            ->get();

        // dd($info_user_payment);


        return view('pages.translator.withdraw.create')->with(
            [
                'info_doc' => $info_doc,
                'info_user_payment' => $info_user_payment,
            ]
        );
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
            'user_payment_id' => 'required|int',
            'salary' => 'required',
            'status' => 'required|int',
            'number_words_wd' => 'required|int',
        ]);

        WithdrawHistory::create($validatedData);

        // update document_chapted is_paid = 1
        $user = Auth::user();

        $update = DB::table('document_chapters')
            ->where('is_paid', 0) //document has not paid
            ->where('status', '=', '10') // document accepted
            ->where('is_vendor_paid', '=', '1') //the vendor has paid 
            ->where('user_id', '=', $user->id)
            ->update(['is_paid' => 1]);

        return redirect()->route('payment-translator.index');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
