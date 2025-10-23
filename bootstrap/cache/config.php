<?php return array (
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'host' => 'api-mt1.pusher.com',
          'port' => 443,
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
      'limit' => NULL,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\resources\\views',
    ),
    'compiled' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\framework\\views',
  ),
  'app' => 
  array (
    'name' => 'Ethica Holding',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:zhmGnWabN49mJl0a50cs03h8Im42hYlbwIsHDnfiV5o=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\FortifyServiceProvider',
      25 => 'App\\Providers\\JetstreamServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Benchmark' => 'Illuminate\\Support\\Benchmark',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'Uri' => 'Illuminate\\Support\\Uri',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'session' => 
      array (
        'driver' => 'session',
        'key' => '_cache',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\framework/cache/data',
        'lock_path' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'ethica-holding-cache-',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'ethica_holdings',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ethica_holdings',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ethica_holdings',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ethica_holdings',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ethica_holdings',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'ethica-holding-database-',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
      'private' => 
      array (
        'driver' => 'local',
        'root' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\app/private',
        'visibility' => 'private',
      ),
    ),
    'links' => 
    array (
      'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\public\\storage' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\app/public',
    ),
  ),
  'fortify-options' => 
  array (
    'two-factor-authentication' => 
    array (
      'confirm' => true,
      'confirmPassword' => true,
    ),
  ),
  'fortify' => 
  array (
    'guard' => 'web',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'auth_middleware' => 'auth',
    'passwords' => 'users',
    'username' => 'email',
    'email' => 'email',
    'views' => true,
    'home' => '/dashboard',
    'prefix' => '',
    'domain' => NULL,
    'lowercase_usernames' => true,
    'limiters' => 
    array (
      'login' => 'login',
      'two-factor' => 'two-factor',
    ),
    'paths' => 
    array (
      'login' => NULL,
      'logout' => NULL,
      'password' => 
      array (
        'request' => NULL,
        'reset' => NULL,
        'email' => NULL,
        'update' => NULL,
        'confirm' => NULL,
        'confirmation' => NULL,
      ),
      'register' => NULL,
      'verification' => 
      array (
        'notice' => NULL,
        'verify' => NULL,
        'send' => NULL,
      ),
      'user-profile-information' => 
      array (
        'update' => NULL,
      ),
      'user-password' => 
      array (
        'update' => NULL,
      ),
      'two-factor' => 
      array (
        'login' => NULL,
        'enable' => NULL,
        'confirm' => NULL,
        'disable' => NULL,
        'qr-code' => NULL,
        'secret-key' => NULL,
        'recovery-codes' => NULL,
      ),
    ),
    'redirects' => 
    array (
      'login' => NULL,
      'logout' => NULL,
      'password-confirmation' => NULL,
      'register' => NULL,
      'email-verification' => NULL,
      'password-reset' => NULL,
    ),
    'features' => 
    array (
      0 => 'registration',
      1 => 'reset-passwords',
      2 => 'update-profile-information',
      3 => 'update-passwords',
      4 => 'two-factor-authentication',
    ),
  ),
  'jetstream' => 
  array (
    'stack' => 'livewire',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'features' => 
    array (
      0 => 'account-deletion',
    ),
    'profile_photo_disk' => 'public',
    'auth_session' => 'Laravel\\Jetstream\\Http\\Middleware\\AuthenticateSession',
    'guard' => 'sanctum',
  ),
  'laravolt' => 
  array (
    'avatar' => 
    array (
      'driver' => 'gd',
      'cache' => 
      array (
        'enabled' => true,
        'key_prefix' => 'avatar_',
        'duration' => 86400,
      ),
      'generator' => 'Laravolt\\Avatar\\Generator\\DefaultGenerator',
      'ascii' => false,
      'shape' => 'circle',
      'width' => 100,
      'height' => 100,
      'responsive' => false,
      'chars' => 2,
      'fontSize' => 48,
      'uppercase' => false,
      'rtl' => false,
      'fonts' => 
      array (
        0 => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\config\\laravolt/../fonts/OpenSans-Bold.ttf',
        1 => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\config\\laravolt/../fonts/rockwell.ttf',
      ),
      'foregrounds' => 
      array (
        0 => '#FFFFFF',
      ),
      'backgrounds' => 
      array (
        0 => '#f44336',
        1 => '#E91E63',
        2 => '#9C27B0',
        3 => '#673AB7',
        4 => '#3F51B5',
        5 => '#2196F3',
        6 => '#03A9F4',
        7 => '#00BCD4',
        8 => '#009688',
        9 => '#4CAF50',
        10 => '#8BC34A',
        11 => '#CDDC39',
        12 => '#FFC107',
        13 => '#FF9800',
        14 => '#FF5722',
      ),
      'border' => 
      array (
        'size' => 1,
        'color' => 'background',
        'radius' => 0,
      ),
      'theme' => 
      array (
        0 => 'colorful',
      ),
      'themes' => 
      array (
        'grayscale-light' => 
        array (
          'backgrounds' => 
          array (
            0 => '#edf2f7',
            1 => '#e2e8f0',
            2 => '#cbd5e0',
          ),
          'foregrounds' => 
          array (
            0 => '#a0aec0',
          ),
        ),
        'grayscale-dark' => 
        array (
          'backgrounds' => 
          array (
            0 => '#2d3748',
            1 => '#4a5568',
            2 => '#718096',
          ),
          'foregrounds' => 
          array (
            0 => '#e2e8f0',
          ),
        ),
        'colorful' => 
        array (
          'backgrounds' => 
          array (
            0 => '#f44336',
            1 => '#E91E63',
            2 => '#9C27B0',
            3 => '#673AB7',
            4 => '#3F51B5',
            5 => '#2196F3',
            6 => '#03A9F4',
            7 => '#00BCD4',
            8 => '#009688',
            9 => '#4CAF50',
            10 => '#8BC34A',
            11 => '#CDDC39',
            12 => '#FFC107',
            13 => '#FF9800',
            14 => '#FF5722',
          ),
          'foregrounds' => 
          array (
            0 => '#FFFFFF',
          ),
        ),
        'pastel' => 
        array (
          'backgrounds' => 
          array (
            0 => '#ef9a9a',
            1 => '#F48FB1',
            2 => '#CE93D8',
            3 => '#B39DDB',
            4 => '#9FA8DA',
            5 => '#90CAF9',
            6 => '#81D4FA',
            7 => '#80DEEA',
            8 => '#80CBC4',
            9 => '#A5D6A7',
            10 => '#E6EE9C',
            11 => '#FFAB91',
            12 => '#FFCCBC',
            13 => '#D7CCC8',
          ),
          'foregrounds' => 
          array (
            0 => '#FFF',
          ),
        ),
      ),
      'hd' => 
      array (
        'hd' => 
        array (
          'enabled' => true,
          'width' => 512,
          'height' => 512,
          'fontSize' => 192,
          'quality' => 
          array (
            'png' => 95,
            'jpg' => 90,
            'webp' => 85,
          ),
          'antialiasing' => true,
          'dpi' => 300,
        ),
        'export' => 
        array (
          'format' => 'png',
          'path' => 'avatars',
          'filename_pattern' => '{hash}_{timestamp}.{format}',
          'multiple_formats' => false,
          'progressive_jpeg' => true,
          'webp_lossless' => false,
        ),
        'performance' => 
        array (
          'file_cache' => true,
          'size_based_cache' => true,
          'preload_fonts' => true,
          'background_processing' => false,
          'lazy_loading' => true,
          'compression' => 
          array (
            'png' => 6,
            'webp' => 80,
          ),
        ),
        'storage' => 
        array (
          'auto_cleanup' => true,
          'max_age_days' => 30,
          'max_storage_mb' => 500,
          'disk' => 'local',
          'cdn_url' => NULL,
          'metrics' => false,
        ),
        'hd_themes' => 
        array (
          'ultra-hd' => 
          array (
            'width' => 1024,
            'height' => 1024,
            'fontSize' => 384,
            'backgrounds' => 
            array (
              0 => '#667eea',
              1 => '#764ba2',
              2 => '#f093fb',
              3 => '#f5576c',
              4 => '#4facfe',
              5 => '#00f2fe',
              6 => '#43e97b',
              7 => '#38f9d7',
              8 => '#ffecd2',
              9 => '#fcb69f',
              10 => '#a8edea',
              11 => '#fed6e3',
            ),
            'foregrounds' => 
            array (
              0 => '#FFFFFF',
            ),
            'border' => 
            array (
              'size' => 4,
              'color' => 'foreground',
              'radius' => 8,
            ),
          ),
          'retina' => 
          array (
            'width' => 512,
            'height' => 512,
            'fontSize' => 192,
            'backgrounds' => 
            array (
              0 => '#667eea',
              1 => '#764ba2',
              2 => '#f093fb',
              3 => '#f5576c',
              4 => '#4facfe',
              5 => '#00f2fe',
              6 => '#43e97b',
              7 => '#38f9d7',
            ),
            'foregrounds' => 
            array (
              0 => '#FFFFFF',
            ),
          ),
          'material-hd' => 
          array (
            'width' => 384,
            'height' => 384,
            'fontSize' => 144,
            'shape' => 'circle',
            'backgrounds' => 
            array (
              0 => '#1976D2',
              1 => '#388E3C',
              2 => '#F57C00',
              3 => '#7B1FA2',
              4 => '#5D4037',
              5 => '#455A64',
              6 => '#E64A19',
              7 => '#00796B',
            ),
            'foregrounds' => 
            array (
              0 => '#FFFFFF',
            ),
            'border' => 
            array (
              'size' => 2,
              'color' => 'background',
              'radius' => 0,
            ),
          ),
        ),
        'responsive_sizes' => 
        array (
          'thumbnail' => 
          array (
            'width' => 64,
            'height' => 64,
            'fontSize' => 24,
          ),
          'small' => 
          array (
            'width' => 128,
            'height' => 128,
            'fontSize' => 48,
          ),
          'medium' => 
          array (
            'width' => 256,
            'height' => 256,
            'fontSize' => 96,
          ),
          'large' => 
          array (
            'width' => 512,
            'height' => 512,
            'fontSize' => 192,
          ),
          'xl' => 
          array (
            'width' => 768,
            'height' => 768,
            'fontSize' => 288,
          ),
          'xxl' => 
          array (
            'width' => 1024,
            'height' => 1024,
            'fontSize' => 384,
          ),
        ),
        'features' => 
        array (
          'sprites' => false,
          'variations' => false,
          'placeholders' => true,
          'aspect_ratios' => false,
          'watermark' => 
          array (
            'enabled' => false,
            'text' => '',
            'opacity' => 0.3,
            'position' => 'bottom-right',
          ),
        ),
        'api' => 
        array (
          'enabled' => true,
          'rate_limit' => 60,
          'cors' => true,
          'auth' => false,
          'headers' => 
          array (
            'Cache-Control' => 'public, max-age=31536000',
            'Expires' => 'Fri, 23 Oct 2026 22:18:58 GMT',
          ),
        ),
      ),
    ),
    'avatar-hd' => 
    array (
      'hd' => 
      array (
        'enabled' => true,
        'width' => 512,
        'height' => 512,
        'fontSize' => 192,
        'quality' => 
        array (
          'png' => 95,
          'jpg' => 90,
          'webp' => 85,
        ),
        'antialiasing' => true,
        'dpi' => 300,
      ),
      'export' => 
      array (
        'format' => 'png',
        'path' => 'avatars',
        'filename_pattern' => '{hash}_{timestamp}.{format}',
        'multiple_formats' => false,
        'progressive_jpeg' => true,
        'webp_lossless' => false,
      ),
      'performance' => 
      array (
        'file_cache' => true,
        'size_based_cache' => true,
        'preload_fonts' => true,
        'background_processing' => false,
        'lazy_loading' => true,
        'compression' => 
        array (
          'png' => 6,
          'webp' => 80,
        ),
      ),
      'storage' => 
      array (
        'auto_cleanup' => true,
        'max_age_days' => 30,
        'max_storage_mb' => 500,
        'disk' => 'local',
        'cdn_url' => NULL,
        'metrics' => false,
      ),
      'hd_themes' => 
      array (
        'ultra-hd' => 
        array (
          'width' => 1024,
          'height' => 1024,
          'fontSize' => 384,
          'backgrounds' => 
          array (
            0 => '#667eea',
            1 => '#764ba2',
            2 => '#f093fb',
            3 => '#f5576c',
            4 => '#4facfe',
            5 => '#00f2fe',
            6 => '#43e97b',
            7 => '#38f9d7',
            8 => '#ffecd2',
            9 => '#fcb69f',
            10 => '#a8edea',
            11 => '#fed6e3',
          ),
          'foregrounds' => 
          array (
            0 => '#FFFFFF',
          ),
          'border' => 
          array (
            'size' => 4,
            'color' => 'foreground',
            'radius' => 8,
          ),
        ),
        'retina' => 
        array (
          'width' => 512,
          'height' => 512,
          'fontSize' => 192,
          'backgrounds' => 
          array (
            0 => '#667eea',
            1 => '#764ba2',
            2 => '#f093fb',
            3 => '#f5576c',
            4 => '#4facfe',
            5 => '#00f2fe',
            6 => '#43e97b',
            7 => '#38f9d7',
          ),
          'foregrounds' => 
          array (
            0 => '#FFFFFF',
          ),
        ),
        'material-hd' => 
        array (
          'width' => 384,
          'height' => 384,
          'fontSize' => 144,
          'shape' => 'circle',
          'backgrounds' => 
          array (
            0 => '#1976D2',
            1 => '#388E3C',
            2 => '#F57C00',
            3 => '#7B1FA2',
            4 => '#5D4037',
            5 => '#455A64',
            6 => '#E64A19',
            7 => '#00796B',
          ),
          'foregrounds' => 
          array (
            0 => '#FFFFFF',
          ),
          'border' => 
          array (
            'size' => 2,
            'color' => 'background',
            'radius' => 0,
          ),
        ),
      ),
      'responsive_sizes' => 
      array (
        'thumbnail' => 
        array (
          'width' => 64,
          'height' => 64,
          'fontSize' => 24,
        ),
        'small' => 
        array (
          'width' => 128,
          'height' => 128,
          'fontSize' => 48,
        ),
        'medium' => 
        array (
          'width' => 256,
          'height' => 256,
          'fontSize' => 96,
        ),
        'large' => 
        array (
          'width' => 512,
          'height' => 512,
          'fontSize' => 192,
        ),
        'xl' => 
        array (
          'width' => 768,
          'height' => 768,
          'fontSize' => 288,
        ),
        'xxl' => 
        array (
          'width' => 1024,
          'height' => 1024,
          'fontSize' => 384,
        ),
      ),
      'features' => 
      array (
        'sprites' => false,
        'variations' => false,
        'placeholders' => true,
        'aspect_ratios' => false,
        'watermark' => 
        array (
          'enabled' => false,
          'text' => '',
          'opacity' => 0.3,
          'position' => 'bottom-right',
        ),
      ),
      'api' => 
      array (
        'enabled' => true,
        'rate_limit' => 60,
        'cors' => true,
        'auth' => false,
        'headers' => 
        array (
          'Cache-Control' => 'public, max-age=31536000',
          'Expires' => 'Fri, 23 Oct 2026 22:18:58 GMT',
        ),
      ),
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\logs/laravel.log',
        'level' => 'error',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\logs/laravel.log',
        'level' => 'error',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'error',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'error',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'error',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'handler_with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'formatter' => NULL,
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'error',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'error',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => 'heckto.com',
        'port' => '465',
        'username' => 'hrm@heckto.com',
        'password' => 'Hrm@0900-+$',
        'timeout' => NULL,
        'local_domain' => 'localhost',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
        'retry_after' => 60,
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
        'retry_after' => 60,
      ),
    ),
    'from' => 
    array (
      'address' => 'hrm@heckto.com',
      'name' => 'Ethica Holding Support',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'authenticate_session' => 'Laravel\\Sanctum\\Http\\Middleware\\AuthenticateSession',
      'encrypt_cookies' => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
      'validate_csrf_token' => 'Illuminate\\Foundation\\Http\\Middleware\\ValidateCsrfToken',
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'ethica-holding-session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Livewire',
    'view_path' => 'F:\\xampp\\htdocs\\ethica-holdings-dashboard\\resources\\views/livewire',
    'layout' => 'components.layouts.app',
    'lazy_placeholder' => NULL,
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
      'cleanup' => true,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => false,
    'inject_assets' => true,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => true,
    'pagination_theme' => 'tailwind',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
