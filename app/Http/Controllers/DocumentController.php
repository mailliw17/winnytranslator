<?php

namespace App\Http\Controllers;

use DB;
use App\Document;
use App\DocumentChapter;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // get data from document table
        $doc = DB::table('documents')
            ->leftJoin('document_chapters', 'documents.id', '=', 'document_chapters.document_id')
            ->select('documents.*', DB::raw('COUNT(document_chapters.document_id) as document_chapter_count'),  DB::raw('TRUNCATE(SUM(document_chapters.cost_of_translate),2) as cost_of_translate')) //truncate to standarize 2 digit after comma
            ->where('document_chapters.status', '=', '10') // show the doc with chapter
            // show doc with the various document chapter status
            ->orWhere('document_chapters.status', '=', '0') // created
            ->orWhere('document_chapters.status', '=', '1') // ongoing
            ->orWhere('document_chapters.status', '=', '2') // submitted
            ->orWhere('document_chapters.status', '=', '3') // rejected
            ->orWhereNull('document_chapters.status')   //show new doc without chapter
            ->groupBy('documents.id')
            ->get();

        // dd($doc);

        return view('pages.admin.document.index')->with(
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
        return view('pages.admin.document.create');
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
            'id_title' => '',
            'ch_title' => 'required',
            'number_chapter' => 'required|int',
            // 'number_chapter_done' => 'required|int',
            // 'cost_of_translate' => 'required|int',
            // 'note' => 'required',
        ]);
        // dd('lolos');

        Document::create($validatedData);
        // $request->session()->flash('success', 'Registration User Successfully');
        return redirect()->route('documents.index');
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
        $doc = Document::findOrFail($id);

        return view('pages.admin.document.edit')->with(
            [
                'doc' => $doc
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
            'id_title' => 'required',
            'ch_title' => 'required',
            'number_chapter' => 'required|int',
        ]);

        $doc = Document::findOrFail($id);
        $doc->update($validatedData);
        // $request->session()->flash('success-edit', 'Edit User Successfully');
        return redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = Document::findOrFail($id);
        $doc->delete();

        // delete document and delete chapters
        DocumentChapter::where('document_id', $id)->delete();

        return redirect()->route('documents.index');
    }
}
