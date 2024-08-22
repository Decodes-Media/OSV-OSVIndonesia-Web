<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Contact;
use App\Models\News;
use App\Models\Page;
use App\Models\Profile;
use App\Settings\SiteSetting;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MasterDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguard();

        $superadmin = Admin::firstWhere('email', config('base.superadmin_email'));

        Filament::auth()->login($superadmin);

        /** @var SiteSetting $siteSetting */
        $siteSetting = app(SiteSetting::class);

        $fnNoSpaces = fn ($x) => preg_replace('/\s+/', ' ', $x);

        $fnRandomHtml = fn () => collect((array) fake()->paragraphs(rand(6, 12)))
            ->map(fn ($x) => "<p>{$x}</p>")->implode('');

        $fnData = fn (array $d) => array_merge($d, [
            'id' => @$d['id'] ?: strtolower(Str::ulid()),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
            'created_by_id' => $superadmin->id,
            'updated_by_id' => $superadmin->id,
        ]);

        // foreach (config('base.master_pages') as $route => $title) {
        //     Page::insert($fnData([
        //         'type' => Page::class,
        //         'title' => $title,
        //         'slug' => Str::slug($title),
        //         'status' => 'Published',
        //         'cover_path' => null,
        //         'body' => Markdown::parse(file_get_contents(
        //             database_path("_raws/{$route}.md"),
        //         ) ?: ''),
        //         'is_published' => true,
        //         'published_at' => now(),
        //         'published_by' => $superadmin->id,
        //         'is_master' => true,
        //         'metadata' => json_encode(['route' => $route]),
        //     ]));
        // }

        // Page::insert($fnData([
        //     'type' => Page::class,
        //     'title' => 'What is Wikipedia',
        //     'slug' => 'what-is-wikipedia',
        //     'status' => 'Published',
        //     'cover_path' => null,
        //     'body' => file_get_contents(database_path('_raws/wikipedia.html')),
        //     'is_published' => true,
        //     'published_at' => now(),
        //     'published_by' => $superadmin->id,
        // ]));

        // News::factory(8)->create();

        // Aspiration::factory(6)->create();

        // Donation::factory(4)->create()
        //     ->each(function (Donation $donation) {
        //         $donation->created_at = Carbon::parse(fake()->dateTimeThisMonth());
        //         $donation->save();
        //     });

        // Contact::factory(8)->create()
        //     ->each(function (Contact $contact) {
        //         $contact->created_at = Carbon::parse(fake()->dateTimeThisMonth());
        //         $contact->save();
        //     });
    }
}
