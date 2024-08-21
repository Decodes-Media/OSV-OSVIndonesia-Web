<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $profiles = Profile::published()->latest()->take(5)->get();

        return view('client.pages.profile', [
            'profiles' => $profiles,
        ]);
    }

    public function view(string $slug): View
    {
        $profile = Profile::published()
            ->where('slug', strtolower($slug))
            ->first();

        abort_if(empty($profile), Response::HTTP_NOT_FOUND);

        return view('client.pages.profile-view', ['profile' => $profile]);
    }
}
