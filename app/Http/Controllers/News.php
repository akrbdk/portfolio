<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class News extends Controller
{
    public function list()
    {
        $news = \App\Models\News::query()->where('active', true)->with(['previewImage'])->get();

        return view('news.list', ['list' => $news]);
    }
}
