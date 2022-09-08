<?php

namespace App\Http\Controllers;

use DB;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Http\Request;

class DocumentDownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view('pages.admin.documentdownload.index')->with(
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

    public function download($id)
    {
        // dd($id);
        $doc_chapter = DB::table('document_chapters')
            ->select('document_chapters.*')
            ->where('id', '=', $id)
            ->where('status', '=', '10')
            ->first();

        // dd($doc_chapter->id_chapter_title);

        $judul = $doc_chapter->id_chapter_title;
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText($doc_chapter->ch_chapter_title, array('name' => 'Arial', 'size' => 20, 'bold' => true));
        $text = $section->addText($doc_chapter->id_chapter_title, array('name' => 'Arial', 'size' => 20, 'bold' => true));
        $text = $section->addText($doc_chapter->ch_text);
        $text = $section->addText($doc_chapter->id_text);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($judul . '.docx');
        return response()->download(public_path($judul . '.docx'));
    }
}
