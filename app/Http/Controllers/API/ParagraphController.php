<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParagraphStoreRequest;
use App\Http\Resources\ParagraphResource;
use App\Models\Paragraph;
use Illuminate\Http\Request;

class ParagraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ParagraphResource::collection(Paragraph::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParagraphStoreRequest $request)
    {
        $paragraph = Paragraph::create($request->all());
        return new ParagraphResource($paragraph);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function show(Paragraph $paragraph)
    {
        return new ParagraphResource($paragraph);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paragraph $paragraph)
    {
        $paragraph->update($request->all());
        return new ParagraphResource($paragraph);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paragraph $paragraph)
    {
        $paragraph->delete();
        return response()->noContent();
    }
}
