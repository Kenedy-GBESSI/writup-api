<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use PDF;
use Illuminate\Support\Str;

class DownloadBookController extends Controller
{


    public function downloadBook(Request $request)
    {
        $book = Book::find($request['book_id']);
        $user = User::find($request['user_id']);
        $book->users()->attach($user);

        $chapters = $book->chapters;
        $livre = [];
        for($i = 0; $i< count($chapters); $i++){
            $livre[$i] = [
                'chapter' => $book->chapters[$i],
                'paragraphs' => $book->chapters[$i]->paragraphs
            ] ;
        }

        $livre_name = $book->title;
        $summary = $book->summary;
        $title_slug = Str::slug($book->title,'_');
        $pdf = PDF::loadView('dynamicPDF',compact(['livre','livre_name','summary']))
                  ->setPaper('a4','portrait');
        return $pdf->download($title_slug.'.pdf');
    }
    public function getBook(Request $request){
        $book = Book::find($request['book_id']);
        $chapters = $book->chapters;
        $livre = [];

        for($i = 0; $i< count($chapters); $i++){
            $livre[$i] = [
                'chapter' => $book->chapters[$i]->title,
                'contents'=> $book->chapters[$i]->paragraphs

            ];

        }
        return response()->json($livre,200);
    }
}
