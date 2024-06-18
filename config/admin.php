<?php
return [

/*
|--------------------------------------------------------------------------
| Laravel-admin name
|--------------------------------------------------------------------------
|
| 登錄頁面的大標題，顯示在登錄頁面
|
*/
'name' => 'blog-後台管理',

/*
|--------------------------------------------------------------------------
| Laravel-admin logo
|--------------------------------------------------------------------------
|
| 管理頁面的logo設置，如果要設置為圖片，可以設置為img標籤
| <img src="http://logo-url" alt="Admin logo">'.
|
*/
'logo' => '<b>blog</b> 後台管理',

/*
|--------------------------------------------------------------------------
| Laravel-admin mini logo
|--------------------------------------------------------------------------
|
| 當左側邊欄收起時顯示的小logo，也可以設置為html標籤
|
*/
'logo-mini' => '<b>後台</b>',

/*
|--------------------------------------------------------------------------
| Laravel-admin bootstrap setting
|--------------------------------------------------------------------------
|
| 用來設置啟動文件
|
*/
'bootstrap' => app_path('Admin/bootstrap.php'),

/*
|--------------------------------------------------------------------------
| Laravel-admin route settings
|--------------------------------------------------------------------------
|
| 後台路由設定，應用在`app/Admin/routes.php`裡面
|
*/
'route' => [

    'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'), //安裝好時的狀態

    'namespace' => 'App\\Admin\\Controllers',

    'middleware' => ['web', 'admin'],
],

/*
|--------------------------------------------------------------------------
| Laravel-admin install directory
|--------------------------------------------------------------------------
|
| 後台的安裝目錄，如果在運行`admin:install`之前修改它，那麼後台目錄將會是這個設定的目錄
|
*/
'directory' => app_path('Admin'),

/*
|--------------------------------------------------------------------------
| Laravel-admin html title
|--------------------------------------------------------------------------
|
| 所有頁面的<title>標籤內容
|
*/
'title' => 'blog - 管理後台',

/*
|--------------------------------------------------------------------------
| Access via `https`
|--------------------------------------------------------------------------
|
| 後台是否使用https
|
*/
'https' => env('ADMIN_HTTPS', false),

/*
|--------------------------------------------------------------------------
| Laravel-admin auth setting
|--------------------------------------------------------------------------
|
| 後台用戶使用的用戶認證設定
|
*/
'auth' => [

    'controller' => App\Admin\Controllers\AuthController::class,

    'guard' => 'admin',

    'guards' => [
        'admin' => [
            'driver'   => 'session',
            'provider' => 'admin',
        ],
    ],

    'providers' => [
        'admin' => [
            'driver' => 'eloquent',
            'model'  => Encore\Admin\Auth\Database\Administrator::class,
        ],
    ],

    // Add "remember me" to login form
    'remember' => true,

    // 登陸之後的跳轉地址
    'redirect_to' => 'auth/login',

    // 登陸驗證的排除URI
    'excepts' => [
        'auth/login',
        'auth/logout',
    ],
],

/*
|--------------------------------------------------------------------------
| Laravel-admin upload setting
|--------------------------------------------------------------------------
|
| 在Form表單中的image和file類型的預設上傳磁碟和目錄設置，其中disk的設定會使用在
| config/filesystem.php裡面設定的一項disk
|
*/
'upload' => [

    // `config/filesystem.php`中設置的disk
    // 設定成public可編輯 原始為admin
    'disk' => 'public',

    // image和file類型表單元素的上傳目錄
    'directory' => [
        'image' => 'images',
        'file'  => 'files',
    ],
],

/*
|--------------------------------------------------------------------------
| Laravel-admin database settings
|--------------------------------------------------------------------------
|
| 安裝laravel-admin之後，預設會在資料庫中新建下面9張表，包括用戶、選單、角色、權限、
| 日誌和它們之間的關係表，下面的設定是標的名字和對應的模型
|
| 其中的`connection`設定為下面幾個模型所使用的資料庫連接，對應`config/database.php`
| 中的connections裡面設置的connection,
|
| 如果你想修改資料庫裡面這幾個表的名字，可以在運行`admin:install`之前修改它們
| 如果install之後想修改，那麼可以手動在資料庫中修改，然後再修改下面幾項的值
|
| 如果你需要在表裡面增加字段，可以自定義模型，然後替換掉下面的模型設置即可，控制器的修改
| 也可以通過覆蓋路由的方式、覆蓋掉內置的路由設定
|
*/
'database' => [

    // Database connection for following tables.
    'connection' => '',

    // User tables and model.
    'users_table' => 'admin_users',
    'users_model' => Encore\Admin\Auth\Database\Administrator::class,

    // Role table and model.
    'roles_table' => 'admin_roles',
    'roles_model' => Encore\Admin\Auth\Database\Role::class,

    // Permission table and model.
    'permissions_table' => 'admin_permissions',
    'permissions_model' => Encore\Admin\Auth\Database\Permission::class,

    // Menu table and model.
    'menu_table' => 'admin_menu',
    'menu_model' => Encore\Admin\Auth\Database\Menu::class,

    // Pivot table for table above.
    'operation_log_table'    => 'admin_operation_log',
    'user_permissions_table' => 'admin_user_permissions',
    'role_users_table'       => 'admin_role_users',
    'role_permissions_table' => 'admin_role_permissions',
    'role_menu_table'        => 'admin_role_menu',
],

/*
|--------------------------------------------------------------------------
| User operation log setting
|--------------------------------------------------------------------------
|
| 操作日誌記錄的設定
|
*/
'operation_log' => [

    /*
     * 是否開啟日誌記錄、預設打開
     */
    'enable' => true,

    /*
     * 允許記錄請求日誌的HTTP方法
     */
    'allowed_methods' => ['GET', 'HEAD', 'POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'TRACE', 'PATCH'],

    /*
     * 不需要被記錄日誌的url路徑
     */
    'except' => [
        env('ADMIN_ROUTE_PREFIX', 'admin').'/auth/logs*',
    ],
],

/*
|--------------------------------------------------------------------------
| Indicates whether to check route permission.
|--------------------------------------------------------------------------
*/
'check_route_permission' => true,

/*
|--------------------------------------------------------------------------
| Indicates whether to check menu roles.
|--------------------------------------------------------------------------
*/
'check_menu_roles'       => true,

/*
|--------------------------------------------------------------------------
| User default avatar
|--------------------------------------------------------------------------
|
| 默認頭像
|
*/
'default_avatar' => '/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg',

/*
|--------------------------------------------------------------------------
| Admin map field provider
|--------------------------------------------------------------------------
|
| model-form中map組件所使用的地圖設定，支持三個地圖服務商: "tencent", "google", "yandex".
|
*/
'map_provider' => 'google',

/*
|--------------------------------------------------------------------------
| Application Skin
|--------------------------------------------------------------------------
|
| 皮膚設置，參考https://adminlte.io/docs/2.4/layout設置
|
| 支持的設置為:
|    "skin-blue", "skin-blue-light", "skin-yellow", "skin-yellow-light",
|    "skin-green", "skin-green-light", "skin-purple", "skin-purple-light",
|    "skin-red", "skin-red-light", "skin-black", "skin-black-light".
|
*/
'skin' => env('ADMIN_SKIN', 'skin-blue-light'),

/*
|--------------------------------------------------------------------------
| Application layout
|--------------------------------------------------------------------------
|
| 佈局設置，參考https://adminlte.io/docs/2.4/layout
|
| 支持的設置為: "fixed", "layout-boxed", "layout-top-nav", "sidebar-collapse",
| "sidebar-mini".
|
*/
'layout' => ['sidebar-mini', 'sidebar-collapse'],

/*
|--------------------------------------------------------------------------
| Login page background image
|--------------------------------------------------------------------------
|
| 登錄頁面的背景圖設置
|
*/
'login_background_image' => '',

/*
|--------------------------------------------------------------------------
| Show version at footer
|--------------------------------------------------------------------------
|
| 是否在頁面的右下角顯示當前laravel-admin的版本
|
*/
'show_version' => true,

/*
|--------------------------------------------------------------------------
| Show environment at footer
|--------------------------------------------------------------------------
|
| 是否在頁面的右下角顯示當前的環境
|
*/
'show_environment' => true,

/*
|--------------------------------------------------------------------------
| Menu bind to permission
|--------------------------------------------------------------------------
|
| 選單是否綁定權限
|
*/
'menu_bind_permission' => true,

/*
|--------------------------------------------------------------------------
| Enable default breadcrumb
|--------------------------------------------------------------------------
|
| 是否開啟頁面的面包屑導航
|
*/
'enable_default_breadcrumb' => true,

/*
|--------------------------------------------------------------------------
| Enable/Disable assets minify
|--------------------------------------------------------------------------
|
|是否開啟靜態資源文件的壓縮
|
*/
'minify_assets' => [

    // 不需要被壓縮的文件
    'excepts' => [

    ],

],

/*
|--------------------------------------------------------------------------
| Enable/Disable sidebar menu search
|--------------------------------------------------------------------------
|
| 是否要开启侧边栏的菜单搜索
|
*/
'enable_menu_search' => true,

/*
|--------------------------------------------------------------------------
| Exclude route from generate menu command
|--------------------------------------------------------------------------
*/
'menu_exclude' => [
    '_handle_selectable_',
    '_handle_renderable_',
],

/*
|--------------------------------------------------------------------------
| Alert message that will displayed on top of the page.
|--------------------------------------------------------------------------
|
| 用來設定頂部的文字提示
|
*/
'top_alert' => '',

/*
|--------------------------------------------------------------------------
| The global Grid action display class.
|--------------------------------------------------------------------------
|
| 設置數據表格的操作列顯示類
|
*/
'grid_action_class' => \Encore\Admin\Grid\Displayers\DropdownActions::class,

/*
|--------------------------------------------------------------------------
| Extension Directory
|--------------------------------------------------------------------------
|
| 如果你要運行`php artisan admin:extend`命令來開發擴展，需要設定這一項，來存放你的擴展文件
|
*/
'extension_dir' => app_path('Admin/Extensions'),

/*
|--------------------------------------------------------------------------
| Settings for extensions.
|--------------------------------------------------------------------------
|
| 每一個laravel-admin擴展對應的設定，都寫在這下面，擴展可以參考 https://github.com/laravel-admin-extensions
|
*/
'extensions' => [

],
];