<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {
        $popular = Novel::with('user')->orderBy('views','desc')->take(4)->get();
        $latest = Novel::with('user')->latest()->take(4)->get();
        $all = Novel::with('user')->latest()->take(8)->get();
        $genres = Genre::all();

        return view('home', compact('popular','latest','all','genres'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $novels = Novel::with('user')
            ->when($keyword, function($q) use ($keyword){
                $q->where('title','like',"%$keyword%");
            })
            ->get();

        $genres = Genre::all();

        return view('home', compact('novels','genres','keyword'));
    }

    public function popular()
    {
        $novels = Novel::with('user')->orderBy('views','desc')->get();
        $genres = Genre::all();

        return view('home', compact('novels','genres'));
    }

    public function latest()
    {
        $novels = Novel::with('user')->latest()->get();
        $genres = Genre::all();

        return view('home', compact('novels','genres'));
    }
    public function byGenre($id)
        {
            $genres = Genre::all();
            $novels = Genre::find($id)->novels; // ambil semua novel di genre ini
            
            return view('home', compact('novels', 'genres'));
        }
}