<?php

namespace App\FilamentAdmin\Pages;

use Filament\Actions;
use Filament\Pages\Page;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Spatie\Backup\Helpers\Format;

class SiteHealthPage extends Page
{
    protected static ?string $slug = 'system/site-health';

    protected static string $view = 'filament.pages.site-health-page';

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?int $navigationSort = 3;

    protected static bool $shouldRegisterNavigation = false;

    public Collection $data;

    public function getTitle(): string
    {
        return __('Site Health');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    public static function getNavigationLabel(): string
    {
        return __('Site Health');
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return filament_user_can('system.site_health');
    // }

    public function mount(): void
    {
        abort_unless(static::shouldRegisterNavigation(), Response::HTTP_UNAUTHORIZED);
    }

    protected function getActions(): array
    {
        return [
            Actions\Action::make(__('Refresh'))
                ->button()
                ->icon('heroicon-o-arrow-path')
                ->action('$refresh'),
        ];
    }

    protected function getViewData(): array
    {
        $env = App::environment();

        $debugEnabled = App::hasDebugModeEnabled();

        try {
            $response = Http::get('https://ipinfo.io/json');
            $hasInternet = $response->ok();
            $inetInfo = $response->json();
        } catch (\Exception $e) {
            $hasInternet = false;
            $inetInfo = [];
        }

        try {
            $pdo = DB::connection()->getPDO();
            $dbname = DB::connection()->getDatabaseName();
            $dbsize = DB::select('
                SELECT table_schema AS "db_name",
                ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) AS "size_mb"
                FROM information_schema.tables WHERE table_schema = ? GROUP BY table_schema;
            ', [$dbname]);
        } catch (\Exception $e) {
            $dbname = null;
            $dbsize = null;
        }

        $totalSpace = disk_total_space(windows_os() ? 'C:' : '/');
        $freeSpace = disk_free_space(windows_os() ? 'C:' : '/');
        $usedSpace = $totalSpace - $freeSpace;
        $usedSpacePercent = round($usedSpace / $totalSpace * 100);

        $checkResults = [
            [
                'status' => match ($env) {
                    'production' => 'ok',
                    'development' => 'normal',
                    default => 'warning',
                },
                'label' => 'Environment',
                'message' => ucwords((string) $env)
                    .'<br/> App Version: '
                    .config('app.version'),
            ],
            [
                'status' => match ($debugEnabled) {
                    false => 'ok',
                    default => 'warning',
                },
                'label' => 'Debug Mode',
                'message' => $debugEnabled
                    ? __('Status: Enabled <br/> Show full error message & stack traces')
                    : __('Status: Disabled <br/> Hide full error message & stack traces'),
            ],
            [
                'status' => match ($hasInternet) {
                    true => 'ok',
                    default => 'failed',
                },
                'label' => 'Internet',
                'message' => ($hasInternet ? __('Connected') : __('Disconnected'))
                    .($hasInternet ? "<br/> IP: {$inetInfo['ip']} - {$inetInfo['city']}" : ''),
            ],
            [
                'status' => 'ok',
                'label' => 'Timezone',
                'message' => 'Server: '.config('app.timezone')
                            .'<br/><span id="lclock"></span>',
            ],
            [
                'status' => $dbname ? 'ok' : 'failed',
                'label' => 'Database',
                'message' => $dbname
                    ? __('Connected to :dbname', ['dbname' => $dbname])
                      .(@$dbsize ? '<br/> Size: '.@$dbsize[0]?->size_mb.' MB' : '')
                    : __('Database connection failed'),
            ],
            [
                'status' => match (true) {
                    $usedSpacePercent >= 90 => 'failed',
                    $usedSpacePercent >= 70 => 'warning',
                    default => 'ok',
                },
                'label' => 'Storage',
                'message' => __('Used ')
                    .Format::humanReadableSize((float) $usedSpace)
                    .'/'
                    .Format::humanReadableSize((float) $totalSpace)
                    .__('<br/> Used Percentage (:percent%)', ['percent' => $usedSpacePercent]),
            ],
        ];

        return [
            'lastRanAt' => now(),
            'checkResults' => $checkResults,
        ];
    }
}
