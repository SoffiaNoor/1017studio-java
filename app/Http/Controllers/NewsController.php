<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\NewsInformation;

class NewsController extends Controller
{
    public function index()
    {
        $information = Information::first();
        $news_information = NewsInformation::first();
        $news = News::paginate(6);
        return view('news.index', compact('information', 'news', 'news_information'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $latest_news = News::all();
        $information = Information::first();
        $newsImages = NewsImage::where('id_news', $id)->get();
        return view('news.show', compact('news', 'information', 'latest_news', 'newsImages'));
    }
}
