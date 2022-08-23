<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentChapter;
use Illuminate\Http\Request;
use DB;
use Auth;

class DocumentChapterTranslatorController extends Controller
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

    // here is the index page
    public function manageChapters($id)
    {
        // all of this query has been normalize in 20 july 2022
        $doc_chapter = DB::table('document_chapters')
            ->leftJoin('users', 'users.id', '=', 'document_chapters.user_id')
            ->select('document_chapters.*', 'users.id as user_id', 'users.name as name')
            ->where('document_id', '=', $id)
            ->where('is_lock', '=', '0')
            ->get();

        $document = DB::table('documents')
            ->where('documents.id', '=', $id)
            ->first();

        $doc_chapter_finished = DB::table('document_chapters')
            ->where('document_id', '=', $id)
            ->where('document_chapters.status', '=', '10')
            ->count();

        return view('pages.translator.documentchapter.index')->with(
            [
                'doc_chapter_finished' => $doc_chapter_finished,
                'document' => $document,
                'doc_chapter' => $doc_chapter
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
        $user = Auth::user();
        $doc_chap = DocumentChapter::findOrFail($id);

        $doc_id = $doc_chap->document_id;
        $status = $doc_chap->status;
        $user_id = $doc_chap->user_id;
        // dd($doc_chap);
        $note = Document::findOrFail($doc_id);
        if (($status) == 1 && ($user_id != $user->id)) {
            return redirect()->back();
        } else {
            return view('pages.translator.documentchapter.edit')->with(
                [
                    'doc_chap' => $doc_chap,
                    'note' => $note
                ]
            );
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
        $validatedData = $request->validate([
            'user_id' => 'required',
            'status' => 'required|int',
            'id_chapter_title' => 'required|min:3',
            'id_text' => 'required',
            'number_words' => 'required|int',
        ]);

        // START cost calculation
        if ($validatedData['status'] == 1) {
            $user_id = $request->user_id;
            $user_payment = DB::table('user_payments')
                ->where('user_id', '=', $user_id)
                ->get();
            $price = $user_payment[0]->price;
            $calculate = ($validatedData['number_words'] / 1000) * $price;
            $validatedData['cost_of_translate'] = $calculate;
        }
        // END cost calculation


        $id_doc = $request['document_id'];

        $doc_chap = DocumentChapter::findOrFail($id);
        $doc_chap->update($validatedData);
        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('document-chapters-translator.manageChapters', $id_doc);
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

    public function updateStatusSubmit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|int',
        ]);

        $id_doc = $request['document_id'];

        $doc_chap = DocumentChapter::findOrFail($id);
        $doc_chap->update($validatedData);

        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('document-chapters-translator.manageChapters', $id_doc);
    }
}
