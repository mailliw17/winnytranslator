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
        // all of this query has been normalize in 20 july 2022
        $doc_chapter = DB::table('document_chapters')
            ->leftJoin('users', 'users.id', '=', 'document_chapters.user_id')
            ->select('document_chapters.*', 'users.id as user_id', 'users.name as name')
            ->where('document_id', '=', $id)
            ->get();

        $document = DB::table('documents')
            ->where('documents.id', '=', $id)
            ->first();

        $doc_chapter_finished = DB::table('document_chapters')
            ->where('document_id', '=', $id)
            ->where('document_chapters.status', '=', '10')
            ->count();

        // dd($document);
        // dd($doc_chapter);
        // dd($doc_chapter_finished);

        return view('pages.admin.documentchapter.index')->with(
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
    }

    public function createChapter($id)
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
            'ch_chapter_title' => 'required|max:100|unique:document_chapters',
            'ch_text' => 'required',
            'is_paid' => 'required|int',
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
            'number_words' => 'required|int',
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

    public function afterCheckDocumentChapter(Request $request, $id)
    {
        $status = $request['status'];
        $id_doc = $request['document_id'];

        // dd($id_doc);

        // if doc_chap get take out like new doc_chap
        if ($status == 0) {
            $validatedData = $request->validate([
                'ch_chapter_title' => 'required',
                'id_chapter_title' => 'required',
                'cost_of_translate' => 'required',
                'ch_text' => 'required',
                'id_text' => 'required',
                'status' => 'required|int',
                'revision_reason' => '',
                'reduced_fare' => '',
                'user_id' => ''
            ]);

            // what expect to be null as a new doc_chap
            $validatedData['id_chapter_title'] = null;
            $validatedData['id_text'] = null;
            $validatedData['cost_of_translate'] = null;
            $validatedData['status'] = 0;
            $validatedData['revision_reason'] = null;
            $validatedData['reduced_fare'] = null;
            $validatedData['user_id'] = null;
        } else {
            $validatedData = $request->validate([
                'ch_chapter_title' => 'required',
                'id_chapter_title' => 'required',
                'cost_of_translate' => 'required',
                'ch_text' => 'required',
                'id_text' => 'required',
                'status' => 'required|int',
                'revision_reason' => '',
                'reduced_fare' => ''
            ]);
        }

        $doc_chap = DocumentChapter::findOrFail($id);
        $doc_chap->update($validatedData);
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
