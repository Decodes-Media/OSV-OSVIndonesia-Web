<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\PanelProvider;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Vite;
use Livewire\Livewire;

class FilamentAdminPanelProvider extends PanelProvider
{
    public function panel(\Filament\Panel $panel): \Filament\Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->domain(config('base.route.admin_domain'))
            ->path(config('base.route.admin_path'))
            ->favicon(asset('faviconx.ico'))
            ->sidebarCollapsibleOnDesktop(true)
            ->viteTheme('resources/css/filament-base-theme.css')
            ->login(\App\Livewire\Auth\FilamentLogin::class)
            // ->registration()
            // ->passwordReset()
            // ->emailVerification()
            // ->profile()
            ->authGuard('web:admin')
            ->databaseNotifications(false)
            ->darkMode(true)
            ->colors([
                'primary' => '#563627',
                'secondary' => '#A88D6C',
            ])
            ->discoverResources(
                in: app_path('FilamentAdmin/Resources'),
                for: 'App\\FilamentAdmin\\Resources',
            )
            ->discoverPages(
                in: app_path('FilamentAdmin/Pages'),
                for: 'App\\FilamentAdmin\\Pages',
            )
            ->pages([
                //
            ])
            ->discoverWidgets(
                in: app_path('FilamentAdmin/Widgets'),
                for: 'App\\FilamentAdmin\\Widgets',
            )
            ->widgets([
                \App\Filament\MyWidgets\ForismaticWidget::class,
                \Awcodes\Overlook\Widgets\OverlookWidget::class,
            ])
            ->middleware([
                'web',
                \Filament\Http\Middleware\DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                \Filament\Http\Middleware\Authenticate::class,
            ])
            ->plugins([
                \Awcodes\Overlook\OverlookPlugin::make()
                    ->includes([
                        // \App\FilamentAdmin\Resources\ProfileResource::class,
                        // \App\FilamentAdmin\Resources\RegisPersonalResource::class,
                        // \App\FilamentAdmin\Resources\RegisRecommendResource::class,
                        // \App\FilamentAdmin\Resources\AspirationResource::class,
                        // \App\FilamentAdmin\Resources\DonationResource::class,
                        \App\FilamentAdmin\Resources\ContactResource::class,
                        // \App\FilamentAdmin\Resources\MailingListResource::class,
                        // \App\FilamentAdmin\Resources\NewsResource::class,
                        // \App\FilamentAdmin\Resources\PageResource::class,
                        \App\FilamentAdmin\Resources\AdminResource::class,
                        \App\FilamentAdmin\Resources\RoleResource::class,
                        \App\FilamentAdmin\Resources\ActivityLogResource::class,
                    ]),
            ]);
    }

    public function boot(): void
    {
        Filament::getCurrentPanel()->navigationGroups([
            \Filament\Navigation\NavigationGroup::make()
                ->label(__('Membership')),
            \Filament\Navigation\NavigationGroup::make()
                ->label(__('Contact Us')),
            \Filament\Navigation\NavigationGroup::make()
                ->label(__('About Us')),
            \Filament\Navigation\NavigationGroup::make()
                ->label(__('Access')),
            \Filament\Navigation\NavigationGroup::make()
                ->label(__('System')),
        ]);

        FilamentAsset::register([
            Js::make('theme-js', url(Vite::asset('resources/js/filament-base-theme.js'))),
        ]);

        FilamentView::registerRenderHook('panels::head.end', fn () => '
            <meta name="developer-name" content="Decodes Media" />
            <meta name="developer-website" content="decodesmedia.com" />
            <meta name="developer-contact" content="info@decodesmedia.com" />
        ');

        Livewire::component(
            'filament-admin--site-backup-status-list-records',
            \App\FilamentAdmin\Components\SiteBackupStatusListRecords::class,
        );

        Livewire::component(
            'filament-admin--site-backup-list-records',
            \App\FilamentAdmin\Components\SiteBackupListRecords::class,
        );
    }
}
