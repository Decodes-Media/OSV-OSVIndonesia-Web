<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $news = News::with('creator')->published();

        if ($keyword = $request->input('cari')) {
            $news->where(fn ($q) => //
                $q->orWhere('title', 'like', "%{$keyword}%")
                    ->orWhere('excerpt', 'like', "%{$keyword}%")
                    ->orWhere('body', 'like', "%{$keyword}%")
            );
        }

        $news = $news->paginate(6);

        return view('client.pages.news', ['news' => $news]);
    }

    public function view(string $slug): View
    {
        $news = News::published()
            ->where('slug', strtolower($slug))
            ->first();

        abort_if(empty($news), Response::HTTP_NOT_FOUND);

        return view('client.pages.news-view', ['news' => $news]);
    }
}
