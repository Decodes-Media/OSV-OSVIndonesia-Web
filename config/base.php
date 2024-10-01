<?php

return [

    'superadmin_email' => 'super@osvi.com',

    'route' => [
        'web_domain' => env('APP_WEB_DOMAIN'),
        'api_domain' => env('APP_API_DOMAIN'),
        'admin_domain' => env('APP_ADMIN_DOMAIN'),
        'web_path' => env('APP_WEB_PATH', '/'),
        'api_path' => env('APP_API_PATH', '/api'),
        'admin_path' => env('APP_ADMIN_PATH', '/cpanel'),
    ],

    'records_limit' => [
        'roles' => 12,
        'admins' => 256,
    ],

    'rich_editor_simple' => [
        'bold', 'italic', 'underline', 'strike',
        'bulletList', 'orderedList',
        'link', 'undo', 'redo',
    ],

    'master_pages' => [
        // route => title
        'terms-condition' => 'Ketentuan Pengguna',
        'privacy-policy' => 'Kebijakan Privasi',
    ],

    'model_names' => [
        // MAIN MODELS 🔽
        \App\Models\RegisPersonal::class => 'Regis Personal',
        \App\Models\RegisRecommend::class => 'Regis Other',
        \App\Models\Profile::class => 'Profile',
        // \App\Models\Aspiration::class => 'Aspiration',
        // \App\Models\Donation::class => 'Donation',
        \App\Models\MailingList::class => 'MailingList',
        \App\Models\Contact::class => 'Contact',
        \App\Models\News::class => 'News',
        \App\Models\Page::class => 'Page',
        \App\Models\Admin::class => 'Admin',
        \App\Models\Role::class => 'Role',
        \App\Models\Client::class => 'Client',
        \App\Models\Project::class => 'Project',
        // SUPPORTING MODELS 🔽
        \App\Models\User::class => 'User',
        \App\Models\ActivityLog::class => 'Activity Log',
    ],

    'permissions_policy' => [
        \App\Models\RegisPersonal::class => \App\Policies\RegisPersonalPolicy::class,
        \App\Models\RegisRecommend::class => \App\Policies\RegisRecommendPolicy::class,
        \App\Models\Profile::class => \App\Policies\ProfilePolicy::class,
        // \App\Models\Aspiration::class => \App\Policies\AspirationPolicy::class,
        // \App\Models\Donation::class => \App\Policies\DonationPolicy::class,
        \App\Models\MailingList::class => \App\Policies\MailingListPolicy::class,
        \App\Models\Contact::class => \App\Policies\ContactPolicy::class,
        \App\Models\News::class => \App\Policies\NewsPolicy::class,
        \App\Models\Page::class => \App\Policies\PagePolicy::class,
        \App\Models\Admin::class => \App\Policies\AdminPolicy::class,
        \App\Models\Role::class => \App\Policies\RolePolicy::class,
    ],

    'permissions_admin' => [
        [
            ['*', 'GOD MODE — ALL ACCESS'],
        ],
        [
            ['reg_personal.*', 'Regis Personal — All Access'],
            ['reg_personal.view', 'Regis Personal — View'],
            ['reg_personal.create', 'Regis Personal — Create'],
            ['reg_personal.update', 'Regis Personal — Update'],
            ['reg_personal.delete', 'Regis Personal — Delete'],
            ['reg_personal.export', 'Regis Personal — Export'],
        ],
        [
            ['reg_recommend.*', 'Regis Recommendation — All Access'],
            ['reg_recommend.view', 'Regis Recommendation — View'],
            ['reg_recommend.create', 'Regis Recommendation — Create'],
            ['reg_recommend.update', 'Regis Recommendation — Update'],
            ['reg_recommend.delete', 'Regis Recommendation — Delete'],
            ['reg_recommend.export', 'Regis Recommendation — Export'],
        ],
        [
            ['profile.*', 'Profile — All Access'],
            ['profile.view', 'Profile — View'],
            ['profile.create', 'Profile — Create'],
            ['profile.update', 'Profile — Update'],
            ['profile.delete', 'Profile — Delete'],
            ['profile.export', 'Profile — Export'],
        ],
        [
            ['aspiration.*', 'Aspirations — All Access'],
            ['aspiration.view', 'Aspirations — View'],
            ['aspiration.create', 'Aspirations — Create'],
            ['aspiration.update', 'Aspirations — Update'],
            ['aspiration.delete', 'Aspirations — Delete'],
            ['aspiration.export', 'Aspirations — Export'],
        ],
        [
            ['donation.*', 'Donation — All Access'],
            ['donation.view', 'Donation — View'],
            ['donation.create', 'Donation — Create'],
            ['donation.update', 'Donation — Update'],
            ['donation.delete', 'Donation — Delete'],
            ['donation.export', 'Donation — Export'],
        ],
        [
            ['mailing_list.*', 'Mailing List — All Access'],
            ['mailing_list.view', 'Mailing List — View'],
            ['mailing_list.create', 'Mailing List — Create'],
            ['mailing_list.update', 'Mailing List — Update'],
            ['mailing_list.delete', 'Mailing List — Delete'],
            ['mailing_list.export', 'Mailing List — Export'],
        ],
        [
            ['contact.*', 'Contact — All Access'],
            ['contact.view', 'Contact — View'],
            ['contact.create', 'Contact — Create'],
            ['contact.update', 'Contact — Update'],
            ['contact.delete', 'Contact — Delete'],
            ['contact.export', 'Contact — Export'],
        ],
        [
            ['news.*', 'News — All Access'],
            ['news.view', 'News — View'],
            ['news.create', 'News — Create'],
            ['news.update', 'News — Update'],
            ['news.delete', 'News — Delete'],
            ['news.export', 'News — Export'],
        ],
        [
            ['page.*', 'Page — All Access'],
            ['page.view', 'Page — View'],
            ['page.create', 'Page — Create'],
            ['page.update', 'Page — Update'],
            ['page.delete', 'Page — Delete'],
            ['page.export', 'Page — Export'],
        ],
        [
            ['admin.*', 'Admin — All Access'],
            ['admin.view', 'Admin — View'],
            ['admin.create', 'Admin — Create'],
            ['admin.update', 'Admin — Update'],
            ['admin.delete', 'Admin — Delete'],
            ['admin.export', 'Admin — Export'],
        ],
        [
            ['role.*', 'Role — All Access'],
            ['role.view', 'Role — View'],
            ['role.create', 'Role — Create'],
            ['role.update', 'Role — Update'],
            ['role.delete', 'Role — Delete'],
            ['role.export', 'Role — Export'],
        ],
        [
            ['system.log_activities', 'System — Log Activities'],
            ['system.log_application', 'System — Log Application'],
            ['system.site_health', 'System — Site Health'],
            ['system.site_backup', 'System — Site Backups'],
        ],
    ],

    'permissions_vendor' => [
        [
            ['*', 'GOD MODE — ALL ACCESS'],
        ],
    ],
];
