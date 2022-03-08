<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\DocumentChapter;
use App\UserPayment;
use DB;

class TaskTranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc = Document::get();
        return view('pages.translator.task.index')->with(
            [
                'doc' => $doc
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
        $doc_chap = DocumentChapter::findOrFail($id);

        $doc_id = $doc_chap->document_id;

        $note = Document::findOrFail($doc_id);
        // return $note;

        return view('pages.translator.task.edit')->with(
            [
                'doc_chap' => $doc_chap,
                'note' => $note
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
            'user_id' => 'required|int',
            'status' => 'required|int',
            'id_chapter_title' => 'required|min:3',
            'id_text' => 'required',
            'number_words' => 'required|int',
        ]);

        // START cost calculation
        $user_id = $request->user_id;
        $user_payment = DB::table('user_payments')
            ->where('user_id', '=', $user_id)
            ->get();
        $price = $user_payment[0]->price;
        $calculate = ($validatedData['number_words'] / 1000) * $price;
        $validatedData['cost_of_translate'] = $calculate;
        // END cost calculation


        $id_doc = $request['document_id'];

        $doc_chap = DocumentChapter::findOrFail($id);
        $doc_chap->update($validatedData);
        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('document-chapters.manageChapters', $id_doc);
    }

    public function updateStatusSubmit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|int',
        ]);

        $id_doc = $request['document_id'];

        $doc_chap = DocumentChapter::findOrFail($id);
        $doc_chap->update($validatedData);

        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('document-chapters.manageChapters', $id_doc);
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
