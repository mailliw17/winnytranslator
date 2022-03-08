<?php

namespace App\Http\Controllers;

use DB;
use App\DocumentChapter;
use App\Document;
use Illuminate\Http\Request;

class DocumentChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    // here is the index page
    public function manageChapters($id)
    {
        // for document title
        $doc = DB::table('documents')
            ->where('id', '=', $id)
            ->get();
        // return $doc;

        $doc_chapter =  DB::table('document_chapters')
            ->where('document_id', '=', $id)
            ->get();
        // return $doc_chapter;

        if ($doc_chapter->isEmpty()) {
            // prevent not error 0 offset
            $user_id = 0;
            $user = DB::table('users')
                ->where('id', '=', $user_id)
                ->get();

            $user_payment = DB::table('user_payments')
                ->where('user_id', '=', $user_id)
                ->get();
        } else {
            $user_id = $doc_chapter[0]->user_id;
            $user = DB::table('users')
                ->where('id', '=', $user_id)
                ->get();
            // return $user;

            // for user payment information
            $user_payment = DB::table('user_payments')
                ->where('user_id', '=', $user_id)
                ->get();
            // return $user_payment;
        }

        return view('pages.admin.documentchapter.index')->with(
            [
                'doc' => $doc,
                'doc_chapter' => $doc_chapter,
                'user' => $user,
                'user_payment' => $user_payment
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
    }

    public function addChapter($id)
    {
        // for get document title
        $doc_chap = DB::table('documents')
            ->where('id', '=', $id)
            ->get();

        // return $doc_chap;
        return view('pages.admin.documentchapter.create')->with(
            [
                'doc_chap' => $doc_chap
            ]
        );
    }

    public function manageNote($id)
    {
        // for fill the id field value 
        // $doc_id = DB::table('document_chapters')
        //     ->where('document_id', '=', $id)
        //     ->get();

        // for fill the note field value
        $note = DB::table('documents')
            ->where('id', '=', $id)
            ->get();

        // return $note[0]->note;
        return view('pages.admin.documentchapter.managenote')->with(
            [
                // 'doc_id' => $doc_id,
                'note' => $note
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
            'document_id' => 'required|int',
            'number_words' => 'required|int',
            'status' => 'required|int',
            'ch_chapter_title' => 'required|max:100',
            'ch_text' => 'required',
        ]);

        $id_doc = $validatedData['document_id'];

        DocumentChapter::create($validatedData);
        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('document-chapters.manageChapters', $id_doc);
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

        return view('pages.admin.documentchapter.edit')->with(
            [
                'doc_chap' => $doc_chap
            ]
        );
    }

    public function check($id)
    {
        $doc_chap = DocumentChapter::findOrFail($id);

        $doc_id = $doc_chap->document_id;

        $note = Document::findOrFail($doc_id);
        // return $note;

        return view('pages.admin.documentchapter.check')->with(
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
            'ch_chapter_title' => 'required|min:3',
            'ch_text' => 'required',
        ]);

        $id_doc = $request['document_id'];

        $doc_chap = DocumentChapter::findOrFail($id);
        $doc_chap->update($validatedData);
        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('document-chapters.manageChapters', $id_doc);
    }

    public function updateNote(Request $request, $id)
    {
        $validatedData = $request->validate([
            'note' => 'required',
        ]);

        $id_doc = $request['document_id'];

        $doc = Document::findOrFail($id);
        $doc->update($validatedData);
        // $request->session()->flash('success-edit', 'Edit User Successfully');
        return redirect()->route('document-chapters.manageChapters', $id_doc);
    }

    public function acceptDocumentChapter(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ch_chapter_title' => 'required|min:3',
            'ch_text' => 'required',
            'status' => 'required|int'
        ]);

        $id_doc = $request['document_id'];

        $doc_chap = DocumentChapter::findOrFail($id);
        $doc_chap->update($validatedData);

        // add Number Chapter Done
        $doc = Document::findOrFail($id_doc);
        $doc->number_chapter_done += 1;
        $doc->save();

        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('document-chapters.manageChapters', $id_doc);
    }

    public function revisionDocumentChapter(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|int',
            'revision_reason' => 'required'
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
    public function destroy(Request $request, $id)
    {
        $doc = DocumentChapter::findOrFail($id);
        $doc->delete();

        $id_doc = $request['document_id'];

        return redirect()->route('document-chapters.manageChapters', $id_doc);
    }
}
