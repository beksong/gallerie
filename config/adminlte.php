
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Galerie',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Galerie</b>POS',

    'logo_mini' => '<b>G</b>P',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'purple',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => true,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MAIN NAVIGATION',
        [
            'text' => 'Change Password',
            'url'  => 'changepass',
            'icon' => 'lock',
        ],
        [
            'text'    => 'Management User',
            'icon'    => 'share',
            'can'      => 'manage_user',
            'submenu' => [
                [
                    'text'    => 'Role',
                    'url'     => 'roles',
                    'icon'     => 'wrench',
                ],
                [
                    'text'    => 'Permission',
                    'url'     => 'permission',
                    'icon'     => 'wrench',
                ],
                [
                    'text'    => 'Permission Role',
                    'url'     => 'permissionrole',
                    'icon'     => 'wrench',
                ],
                [
                    'text'    => 'Role User',
                    'url'     => 'roleuser',
                    'icon'     => 'wrench',
                ],
            ],
        ],
        'MASTER',
        [
            'text' => 'Master Data',
            'icon' => 'list',
            'icon_color' => 'aqua',
            'submenu' => [
                [
                    'text' => 'Master Kategori',
                    'url'  => 'kategori',
                    'icon' => 'list',
                    'can'  => 'show_category'
                ],
                [
                    'text' => 'Brand Produk',
                    'url'  => 'brand',
                    'icon' => 'copyright',
                    'can'  => 'show_brand'
                ],
                [
                    'text' => 'Master Suplier',
                    'url'  => 'suplier',
                    'icon' => 'users',
                    'can'  => 'show_suplier'
                ],
                [
                    'text' => 'Master Barang',
                    'url'  => 'barang',
                    'icon' => 'cubes',
                    'can'  => 'show_barang'
                ],
                [
                    'text' => 'Customer',
                    'url'  => 'customer',
                    'icon' => 'user-o',
                ],
            ],
        ],
        'Transaksi',
        [
            'text' => 'Transaksi',
            'icon' => 'money',
            'icon_color' => 'green',
            'submenu' => [
                [
                    'text' => 'Gudang',
                    'icon' => 'cubes',
                    'can'  => 'show_gudang',
                    'submenu' => [
                        [
                            'text' => 'SJ/DO Pembelian',
                            'url'  => 'sjpembelian',
                            'icon' => 'truck',
                            'can'  => 'show_sjpembelian'
                        ],
                        [
                            'text' => 'SJ/DO Penjualan',
                            'url'  => 'sjpenjualan',
                            'icon' => 'cube',
                            'can'  => 'show_sjpenjualan'
                        ],
                    ],
                ],
                [
                    'text' => 'Kasir',
                    'url'  => 'kasir',
                    'icon' => 'shopping-cart',
                    'can'  => 'show_kasir'
                ],
                [
                    'text' => 'Kasir Today',
                    'url'  => 'kasirtoday',
                    'icon' => 'shopping-cart',
                    'can'  => 'show_kasirtoday'
                ],
                [
                    'text' => 'Pembelian',
                    'icon' => 'list',
                    'can'  => 'show_pembelian',
                    'submenu' => [
                        [
                            'text' => 'Pembelian >> SJ',
                            'url'  => 'pembelian',
                            'icon' => 'file-archive-o',
                            'can'  => 'show_pembeliansj'
                        ],
                        [
                            'text' => 'Kredit',
                            'url'  => 'pembelian/kredit',
                            'icon' => 'file-o',
                            'can'  => 'show_pembeliankredit'
                        ],
                        [
                            'text' => 'Cash',
                            'url'  => 'pembelian/cash',
                            'icon' => 'file',
                            'can'  => 'show_pembeliancash'
                        ],
                    ],
                ],
            ],
        ],
        'Laporan-Laporan',
        [
            'text'       => 'Laporan Penjualan',
            'icon_color' => 'red',
            'icon'       => 'book',
            'can'        => 'show_laporanpenjualan',
            'submenu'    =>[
                [
                    'text'       => 'Penjualan',
                    'icon_color' => 'blue',
                    'icon'       => 'calendar',
                    'url'        => 'rpt/penjualan/timeframes',
                    'can'        => 'show_penjualantimeframe'
                ],
                [
                    'text'       => 'Semua Penjualan',
                    'url'        => 'rpt',
                    'icon_color' => 'blue',
                    'can'        => 'show_semuapenjualan'   
                ],
                [
                    'text'       => 'Penjualan Hari Ini',
                    'url'        => 'rpt/today',
                    'icon_color' => 'red',
                    'can'        => 'show_penjualantoday'
                ],
                [
                    'text'       => 'Kredit',
                    'url'        => 'kredit',
                    'icon_color' => 'grey',
                    'can'        => 'showkredit'
                ],
                [
                    'text'       => 'Rekap Stok Barang',
                    'icon_color' => 'yellow',
                    'url'        => 'stok',
                    'can'        => 'show_stok'
                ],
                [
                    'text'       => 'Stok Minimal',
                    'icon_color' => 'aqua',
                    'url'        => 'stok/minimal',
                    'can'        => 'show_stokminimal'
                ],
                [
                    'text'       => 'Tagihan',
                    'icon_color' => 'red',
                    'icon'       => 'calendar',
                    'url'        => 'tagihan',
                    'can'        => 'showtagihan'
                ],

            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
    ],
];
