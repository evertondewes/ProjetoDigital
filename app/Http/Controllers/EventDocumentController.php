<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\EventDocument;
use Illuminate\Http\Request;

class EventDocumentController extends Controller
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
     * @param  \ProjetoDigital\Models\EventDocument  $eventDocument
     * @return \Illuminate\Http\Response
     */
    public function show(EventDocument $eventDocument)
    {


        $content = base64_decode($eventDocument->content);
        header('Content-Type: application/pdf');
        header('Content-Length: '.strlen( $content ));
        header('Content-disposition: attachment; filename="' . $eventDocument->name . '"');
        header('Cache-Control: public, must-revalidate, max-age=0');
        header('Pragma: public');
//        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        echo $content;
        die();

        echo '-------';
        dd($eventDocument);
        $this->authorize('view', $projectDocument);

        return Storage::download($projectDocument->path, $projectDocument->name.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ProjetoDigital\Models\EventDocument  $eventDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(EventDocument $eventDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ProjetoDigital\Models\EventDocument  $eventDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventDocument $eventDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ProjetoDigital\Models\EventDocument  $eventDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventDocument $eventDocument)
    {
        //
    }
}
