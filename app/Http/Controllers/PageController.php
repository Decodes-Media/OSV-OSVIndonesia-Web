<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PageController extends Controller
{
    public function view(string $slug): View
    {
        $page = Page::published()
            ->where('type', Page::class)
            ->where('slug', strtolower($slug))
            ->firstOrFail();

        $page->increment('views_count');

        return view('client.pages.page-view', ['page' => $page]);
    }

    public function termsCondition(): View
    {
        $page = Page::firstWhere('slug', 'ketentuan-pengguna');

        abort_if(empty($page), Response::HTTP_NOT_FOUND);

        $page->increment('views_count');

        return view('client.pages.page-view', ['page' => $page]);
    }

    public function privacyPolicy(): View
    {
        $page = Page::firstWhere('slug', 'kebijakan-privasi');

        abort_if(empty($page), Response::HTTP_NOT_FOUND);

        $page->increment('views_count');

        return view('client.pages.page-view', ['page' => $page]);
    }
}
