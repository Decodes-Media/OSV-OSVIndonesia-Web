<?php

namespace App\FilamentAdmin\Pages;

use App\Models\Profile;
use App\Settings\SiteSetting;
use Filament\Actions;
use Filament\Forms\Components as FC;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Http\Response;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class SiteSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'system/site-settings';

    protected static string $view = 'filament.pages.site-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?int $navigationSort = 1;

    protected SiteSetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public function getTitle(): string|Htmlable
    {
        return __('Site Setting');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    public static function getNavigationLabel(): string
    {
        return __('Site Setting');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('System'), __('Site Setting')];
    }

    public function boot(): void
    {
        /** @var SiteSetting $setting */
        $setting = app(SiteSetting::class);
        $this->setting = $setting;
    }

    public function mount(): void
    {
        abort_unless(static::shouldRegisterNavigation(), Response::HTTP_FORBIDDEN);

        $this->disableForm = request('mode', 'view') == 'view';

        if (request('save') == 'ok') {
            Notification::make()->success()->title(__('Saved'))->send();
        }

        $this->data = $this->setting->toArray();

        $this->form->fill($this->data);
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $this->setting->fill($data);
        $this->setting->save();

        redirect(static::getUrl(['save' => 'ok']));
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                FC\Wizard::make([
                    FC\Wizard\Step::make('Main Setting')->schema([
                        FC\Tabs::make('Main Setting')->schema([
                            FC\Tabs\Tab::make('Basic Info')->columns(2)->schema([
                                FC\TextInput::make('name')
                                    ->label('Nama situs')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->required()
                                    ->afterStateHydrated(function ($set, $livewire) {
                                        $set('name', $livewire->data['name']);
                                    }),
                                FC\FileUpload::make('logo_white_path')
                                    ->label('Logo Putih')
                                    ->disabled($this->disableForm)
                                    ->imagePreviewHeight('256px')
                                    ->directory('uploads')
                                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                    ->downloadable()
                                    ->openable()
                                    ->required()
                                    ->maxSize(512),
                                FC\FileUpload::make('logo_black_path')
                                    ->label('Logo Hitam')
                                    ->disabled($this->disableForm)
                                    ->imagePreviewHeight('256px')
                                    ->directory('uploads')
                                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                    ->downloadable()
                                    ->openable()
                                    ->required()
                                    ->maxSize(512),
                                FC\TextInput::make('email')
                                    ->label('Email')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->email(),
                                FC\Fieldset::make('Instagram')->schema([
                                    FC\TextInput::make('social_instagram_name')
                                        ->label('Nama')
                                        ->disabled($this->disableForm),
                                    FC\TextInput::make('social_instagram_url')
                                        ->label('Link')
                                        ->disabled($this->disableForm)
                                        ->activeUrl(),
                                ]),
                                FC\Fieldset::make('TikTok')->schema([
                                    FC\TextInput::make('social_tiktok_name')
                                        ->label('Nama')
                                        ->disabled($this->disableForm),
                                    FC\TextInput::make('social_tiktok_url')
                                        ->label('Link')
                                        ->disabled($this->disableForm)
                                        ->activeUrl(),
                                ]),
                            ]),
                            FC\Tabs\Tab::make('Global: Donation')->columns(2)->schema([
                                FC\RichEditor::make('section_donate_title')
                                    ->label('Judul')
                                    ->disabled($this->disableForm)
                                    ->maxLength(256)
                                    ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                    ->extraInputAttributes(['style' => 'min-height:0px'])
                                    ->required(),
                                FC\Fieldset::make('Opsi Nominal')->schema([
                                    FC\Repeater::make('section_donate_options')
                                        ->columnSpanFull()
                                        ->grid(2)
                                        ->columns(2)
                                        ->hiddenLabel()
                                        ->addActionLabel('Tambah Opsi')
                                        ->disabled($this->disableForm)
                                        ->schema([
                                            FC\TextInput::make('amount')
                                                ->label('Jumlah')
                                                ->numeric()
                                                ->integer()
                                                ->minValue(-1)
                                                ->required(),
                                            FC\TextInput::make('label')
                                                ->label('Nominal')
                                                ->maxLength(64)
                                                ->required(),
                                        ]),
                                ]),
                            ]),
                            FC\Tabs\Tab::make('Global: Mailing List')->columns(2)->schema([
                                FC\RichEditor::make('section_mailing_title')
                                    ->label('Judul')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->maxLength(256)
                                    ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                    ->extraInputAttributes(['style' => 'min-height:0px'])
                                    ->required(),
                                FC\RichEditor::make('section_mailing_subtitle')
                                    ->label('Sub-judul')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->maxLength(256)
                                    ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                    ->extraInputAttributes(['style' => 'min-height:0px'])
                                    ->required(),
                                FC\RichEditor::make('section_mailing_terms')
                                    ->label('Syarat Ketentuan')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->maxLength(256)
                                    ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                    ->extraInputAttributes(['style' => 'min-height:0px'])
                                    ->required(),
                            ]),
                            FC\Tabs\Tab::make('Default SEO')->columns(2)->schema([
                                FC\FileUpload::make('seo_default.cover_path')
                                    ->label('Cover')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->imagePreviewHeight('256px')
                                    ->directory('uploads')
                                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                    ->downloadable()
                                    ->openable()
                                    ->required()
                                    ->maxSize(512),
                                FC\TextInput::make('seo_default.author')
                                    ->label('Author')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->required(),
                                FC\TagsInput::make('seo_default.keywords')
                                    ->label('Keywords')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->separator(',')
                                    ->required(),
                                FC\Textarea::make('seo_default.description')
                                    ->label('Description')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->cols(2)
                                    ->required(),
                            ]),
                        ]),
                    ]),
                    FC\Wizard\Step::make('Page Setting')->schema([
                        FC\Tabs::make('Page Setting')->schema([
                            FC\Tabs\Tab::make('Page: Home')->columns(2)->schema([
                                FC\Fieldset::make('Section: Banner')->schema([
                                    FC\RichEditor::make('home_banner_title')
                                        ->label('Judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('home_banner_subtitle')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                                FC\Fieldset::make('Section: Infolist')->schema([
                                    FC\Repeater::make('home_features')
                                        ->columnSpanFull()
                                        ->grid(2)
                                        ->columns(4)
                                        ->hiddenLabel()
                                        ->addable(false)
                                        ->deletable(false)
                                        ->reorderable(false)
                                        ->disabled($this->disableForm)
                                        ->schema([
                                            FC\TextInput::make('icon')
                                                ->label('Ikon')
                                                ->columnSpan(1)
                                                ->default('fa fa-info')
                                                ->required(),
                                            FC\Textarea::make('text')
                                                ->label('Konten')
                                                ->columnSpan(3)
                                                ->rows(3)
                                                ->required(),
                                        ]),
                                ]),
                                FC\Fieldset::make('Section: Aspirasi')->schema([
                                    FC\RichEditor::make('home_aspiration_title')
                                        ->label('Judul')
                                        ->columnSpanFull()
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                                FC\Fieldset::make('Section: Registrasi')->schema([
                                    FC\RichEditor::make('home_register_title')
                                        ->label('Judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('home_register_subtitle')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('home_register_btn_left')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('home_register_btn_right')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                                FC\Fieldset::make('Section: Survey')->schema([
                                    FC\FileUpload::make('home_survey_banner_path')
                                        ->label('Banner Kiri')
                                        ->disabled($this->disableForm)
                                        ->imagePreviewHeight('256px')
                                        ->directory('uploads')
                                        ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                        ->downloadable()
                                        ->openable()
                                        ->required()
                                        ->maxSize(512),
                                    FC\RichEditor::make('home_survey_text')
                                        ->label('Konten Kanan')
                                        ->disabled($this->disableForm)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('home_survey_cta_title')
                                        ->label('Aksi - judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\Textarea::make('home_survey_cta_url')
                                        ->label('Aksi - link')
                                        ->disabled($this->disableForm)
                                        ->required()
                                        ->activeUrl(),
                                ]),
                            ]),
                            FC\Tabs\Tab::make('Page: About')->columns(2)->schema([
                                FC\Fieldset::make('Section: Intro')->schema([
                                    FC\RichEditor::make('about_intro_title')
                                        ->label('Judul')
                                        ->columnSpanFull()
                                        ->disabled($this->disableForm)
                                        ->maxLength(4096)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('about_intro_content')
                                        ->label('Konten')
                                        ->columnSpanFull()
                                        ->disabled($this->disableForm)
                                        ->maxLength(4096)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                                FC\Fieldset::make('Section: Infolist')->schema([
                                    FC\RichEditor::make('about_feat_title')
                                        ->label('Judul')
                                        ->columnSpanFull()
                                        ->disabled($this->disableForm)
                                        ->maxLength(512)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\Repeater::make('about_feat_sections')
                                        ->columnSpanFull()
                                        ->grid(2)
                                        ->columns(4)
                                        ->hiddenLabel()
                                        ->addable(false)
                                        ->deletable(false)
                                        ->reorderable(false)
                                        ->disabled($this->disableForm)
                                        ->schema([
                                            FC\TextInput::make('icon')
                                                ->label('Ikon')
                                                ->columnSpan(1)
                                                ->default('fa fa-info')
                                                ->required(),
                                            FC\TextInput::make('title')
                                                ->label('Judul')
                                                ->columnSpan(3)
                                                ->required(),
                                            FC\Textarea::make('content')
                                                ->label('Konten')
                                                ->columnSpan(4)
                                                ->rows(3)
                                                ->required(),
                                        ]),
                                ]),
                                FC\Fieldset::make('Section: Visi & Misi')->schema([
                                    FC\RichEditor::make('about_vision')
                                        ->label('Konten Visi')
                                        ->columnSpanFull()
                                        ->disabled($this->disableForm)
                                        ->maxLength(4096)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('about_mission')
                                        ->label('Konten Misi')
                                        ->columnSpanFull()
                                        ->disabled($this->disableForm)
                                        ->maxLength(10240)
                                        ->toolbarButtons([
                                            'bold', 'italic', 'strike', 'underline',
                                            'bulletList', 'orderedList', 'link',
                                        ])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                            ]),
                            FC\Tabs\Tab::make('Page: Profil Caleg')->columns(2)->schema([
                                FC\RichEditor::make('profile_title')
                                    ->label('Judul')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->maxLength(512)
                                    ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                    ->extraInputAttributes(['style' => 'min-height:0px'])
                                    ->required(),
                                FC\Select::make('profile_featured_ids')
                                    ->label('Profile Pilihan')
                                    // ->options(Category::active()->pluck('name', 'id'))
                                    ->options(fn () => //
                                        Profile::published()->get()->map(fn ($profile) => [
                                            'id' => $profile->id,
                                            'text' => '
                                                <div class="flex flex-row">
                                                    <div><img style="max-width:32px;margin:6px" src="'.($profile->photo_url).'" /></div>
                                                    <div style="margin:6px"><b>'.$profile->name.'</b><br/>'.$profile->title.'</div>
                                                </div>
                                            ',
                                        ])
                                            ->pluck('text', 'id'),
                                    )
                                    ->allowHtml()
                                    ->multiple()
                                    ->preload()
                                    ->maxItems(4)
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm),
                            ]),
                            FC\Tabs\Tab::make('Page: Program')->columns(2)->schema([
                                FC\Fieldset::make('Section: Registrasi')->schema([
                                    FC\RichEditor::make('program_register_title')
                                        ->label('Judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('program_register_subtitle')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('program_register_btn_left')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('program_register_btn_right')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                            ]),
                            FC\Tabs\Tab::make('Page: Partnership')->columns(2)->schema([
                                FC\Fieldset::make('Section: Main')->schema([
                                    FC\RichEditor::make('partner_main_title')
                                        ->label('Judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('partner_main_subtitle')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline', 'link'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                            ]),
                            FC\Tabs\Tab::make('Page: Donation')->columns(2)->schema([
                                FC\Fieldset::make('Section: Main')->schema([
                                    FC\RichEditor::make('donation_main_title')
                                        ->label('Judul')
                                        ->disabled($this->disableForm)
                                        ->maxLength(256)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                    FC\RichEditor::make('donation_main_subtitle')
                                        ->label('Sub-judul')
                                        ->disabled($this->disableForm)
                                        ->toolbarButtons(['bold', 'italic', 'strike', 'underline'])
                                        ->extraInputAttributes(['style' => 'min-height:0px'])
                                        ->required(),
                                ]),
                            ]),
                            FC\Tabs\Tab::make('Page: Artikel')->columns(2)->schema([
                                FC\TextInput::make('article_perpage')
                                    ->label('Jml. Per halaman')
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->numeric()
                                    ->integer(true)
                                    ->minValue(3)
                                    ->maxValue(20)
                                    ->required(),
                            ]),
                        ]),
                    ]),
                ]),
                // FC\Tabs\Tab::make('SEO')->schema([
                //     FC\FileUpload::make('home_seo.cover_path')
                //         ->label('SEO - Cover')
                //         ->columnSpanFull()
                //         ->disabled($this->disableForm)
                //         ->imagePreviewHeight('256px')
                //         ->directory('uploads')
                //         ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                //         ->downloadable()
                //         ->openable()
                //         ->required()
                //         ->maxSize(512),
                //     FC\TextInput::make('home_seo.author')
                //         ->label('SEO - Author')
                //         ->columnSpanFull()
                //         ->disabled($this->disableForm)
                //         ->required(),
                //     FC\Textarea::make('home_seo.description')
                //         ->label('SEO - Description')
                //         ->columnSpanFull()
                //         ->disabled($this->disableForm)
                //         ->cols(2)
                //         ->required(),
                //     FC\TagsInput::make('home_seo.keywords')
                //         ->label('SEO - Keywords')
                //         ->columnSpanFull()
                //         ->disabled($this->disableForm)
                //         ->separator(',')
                //         ->required(),
                // ]),
            ]);
    }

    public function getCancelButtonUrlProperty(): string
    {
        return static::getUrl();
    }

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make()
                ->action(fn () => redirect(static::getUrl(['mode' => 'edit'])))
                ->visible(fn ($livewire) => $livewire->disableForm),
        ];
    }
}
