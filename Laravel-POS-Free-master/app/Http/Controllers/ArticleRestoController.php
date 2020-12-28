<?php

namespace App\Http\Controllers;
use App\Resto;
use App\Comment;
use Illuminate\Http\Request;

class ArticleRestoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function article($id){         
        $restos= Resto::find($id);
        return view('postresto.postresto',['for'=>$restos]);
    } 
    public function search(Request $request){
        $search =$request->search;
        $restos=DB::table('restos')->where('name','like',"%".$search."%")->first();
        return view('postresto.postresto',['for'=>$restos]);
    }
    public function index(){
        $restos = Resto::all();
        $comments = Comment::all();
        return view('postresto.postresto', compact(['for'=>$restos],['comments'=>$comments]));
    }
}
