<?php die(1); ?>


--------------------------------------------------------------------
[Mon, 04 May 20 16:13:08 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:13:10 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'params' => 
  array (
    'new_installation' => '2',
  ),
  'agree' => 'on',
  'go_back' => '0',
  'current' => '1',
  'next_button' => 'Далее',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:13:14 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'params' => 
  array (
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
  ),
  'go_back' => '0',
  'current' => '2',
  'next_button' => 'Далее',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:13:17 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:13:20 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Проверка требований успешно завершена


--------------------------------------------------------------------
[Mon, 04 May 20 16:13:20 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Requirements log
array (
  'config_file' => 
  array (
    'title' => 'Файл конфигурации',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'configPath' => '/var/www/xcart/etc/',
      'configFileName' => 'config.php',
      'defaultConfigFileName' => 'config.default.php',
    ),
    'messageData' => 
    array (
      ':configPath' => '/var/www/xcart/etc/',
      ':configFileName' => 'config.php',
      ':defaultConfigFileName' => 'config.default.php',
    ),
    'description' => '',
  ),
  'php_version' => 
  array (
    'title' => 'Версия PHP',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_disabled_functions' => 
  array (
    'title' => 'Отключенные функции',
    'status' => true,
    'critical' => false,
    'value' => '...',
    'data' => 
    array (
      'exists' => 
      array (
        0 => 'func_num_args',
        1 => 'func_get_arg',
        2 => 'func_get_args',
        3 => 'strlen',
        4 => 'strcmp',
        5 => 'strncmp',
        6 => 'strcasecmp',
        7 => 'strncasecmp',
        8 => 'each',
        9 => 'error_reporting',
        10 => 'define',
        11 => 'defined',
        12 => 'get_class',
        13 => 'get_called_class',
        14 => 'get_parent_class',
        15 => 'method_exists',
        16 => 'property_exists',
        17 => 'class_exists',
        18 => 'interface_exists',
        19 => 'function_exists',
        20 => 'get_included_files',
        21 => 'is_subclass_of',
        22 => 'is_a',
        23 => 'get_class_vars',
        24 => 'get_object_vars',
        25 => 'set_error_handler',
        26 => 'restore_error_handler',
        27 => 'set_exception_handler',
        28 => 'get_declared_classes',
        29 => 'get_resource_type',
        30 => 'extension_loaded',
        31 => 'debug_backtrace',
        32 => 'debug_print_backtrace',
        33 => 'strtotime',
        34 => 'date',
        35 => 'gmdate',
        36 => 'mktime',
        37 => 'strftime',
        38 => 'time',
        39 => 'getdate',
        40 => 'date_create',
        41 => 'date_default_timezone_set',
        42 => 'date_default_timezone_get',
        43 => 'preg_match',
        44 => 'preg_match_all',
        45 => 'preg_replace',
        46 => 'preg_replace_callback',
        47 => 'preg_split',
        48 => 'preg_quote',
        49 => 'preg_grep',
        50 => 'preg_last_error',
        51 => 'ctype_alpha',
        52 => 'ctype_digit',
        53 => 'filter_var',
        54 => 'filter_var_array',
        55 => 'hash_hmac',
        56 => 'json_encode',
        57 => 'json_decode',
        58 => 'spl_autoload_register',
        59 => 'spl_autoload_unregister',
        60 => 'spl_autoload_functions',
        61 => 'class_parents',
        62 => 'class_implements',
        63 => 'spl_object_hash',
        64 => 'iterator_to_array',
        65 => 'simplexml_load_file',
        66 => 'constant',
        67 => 'sleep',
        68 => 'flush',
        69 => 'htmlspecialchars',
        70 => 'htmlentities',
        71 => 'html_entity_decode',
        72 => 'get_html_translation_table',
        73 => 'sha1',
        74 => 'md5',
        75 => 'md5_file',
        76 => 'crc32',
        77 => 'getimagesize',
        78 => 'phpinfo',
        79 => 'phpversion',
        80 => 'substr_count',
        81 => 'strspn',
        82 => 'strcspn',
        83 => 'strtok',
        84 => 'strtoupper',
        85 => 'strtolower',
        86 => 'strpos',
        87 => 'stripos',
        88 => 'strrpos',
        89 => 'strrev',
        90 => 'nl2br',
        91 => 'basename',
        92 => 'dirname',
        93 => 'pathinfo',
        94 => 'stripslashes',
        95 => 'stripcslashes',
        96 => 'strstr',
        97 => 'stristr',
        98 => 'str_split',
        99 => 'substr',
        100 => 'substr_replace',
        101 => 'ucfirst',
        102 => 'lcfirst',
        103 => 'ucwords',
        104 => 'strtr',
        105 => 'addslashes',
        106 => 'addcslashes',
        107 => 'rtrim',
        108 => 'str_replace',
        109 => 'str_ireplace',
        110 => 'str_repeat',
        111 => 'chunk_split',
        112 => 'trim',
        113 => 'ltrim',
        114 => 'strip_tags',
        115 => 'explode',
        116 => 'implode',
        117 => 'join',
        118 => 'setlocale',
        119 => 'chr',
        120 => 'ord',
        121 => 'parse_str',
        122 => 'str_pad',
        123 => 'chop',
        124 => 'sprintf',
        125 => 'printf',
        126 => 'sscanf',
        127 => 'parse_url',
        128 => 'urlencode',
        129 => 'urldecode',
        130 => 'http_build_query',
        131 => 'unlink',
        132 => 'exec',
        133 => 'escapeshellcmd',
        134 => 'escapeshellarg',
        135 => 'rand',
        136 => 'srand',
        137 => 'mt_rand',
        138 => 'mt_srand',
        139 => 'getmypid',
        140 => 'base64_encode',
        141 => 'abs',
        142 => 'ceil',
        143 => 'floor',
        144 => 'round',
        145 => 'is_infinite',
        146 => 'pow',
        147 => 'log',
        148 => 'sqrt',
        149 => 'hexdec',
        150 => 'octdec',
        151 => 'dechex',
        152 => 'base_convert',
        153 => 'number_format',
        154 => 'getenv',
        155 => 'putenv',
        156 => 'microtime',
        157 => 'uniqid',
        158 => 'quoted_printable_encode',
        159 => 'set_time_limit',
        160 => 'get_magic_quotes_gpc',
        161 => 'get_magic_quotes_runtime',
        162 => 'error_log',
        163 => 'error_get_last',
        164 => 'call_user_func',
        165 => 'call_user_func_array',
        166 => 'serialize',
        167 => 'unserialize',
        168 => 'var_dump',
        169 => 'var_export',
        170 => 'print_r',
        171 => 'memory_get_usage',
        172 => 'memory_get_peak_usage',
        173 => 'register_shutdown_function',
        174 => 'ini_get',
        175 => 'ini_set',
        176 => 'get_include_path',
        177 => 'set_include_path',
        178 => 'setcookie',
        179 => 'header',
        180 => 'headers_sent',
        181 => 'parse_ini_file',
        182 => 'is_uploaded_file',
        183 => 'move_uploaded_file',
        184 => 'intval',
        185 => 'floatval',
        186 => 'doubleval',
        187 => 'strval',
        188 => 'gettype',
        189 => 'is_null',
        190 => 'is_resource',
        191 => 'is_bool',
        192 => 'is_float',
        193 => 'is_int',
        194 => 'is_integer',
        195 => 'is_numeric',
        196 => 'is_string',
        197 => 'is_array',
        198 => 'is_object',
        199 => 'is_scalar',
        200 => 'is_callable',
        201 => 'pclose',
        202 => 'popen',
        203 => 'readfile',
        204 => 'rewind',
        205 => 'rmdir',
        206 => 'umask',
        207 => 'fclose',
        208 => 'feof',
        209 => 'fgets',
        210 => 'fread',
        211 => 'fopen',
        212 => 'fstat',
        213 => 'fflush',
        214 => 'fwrite',
        215 => 'fputs',
        216 => 'mkdir',
        217 => 'rename',
        218 => 'copy',
        219 => 'tempnam',
        220 => 'file',
        221 => 'file_get_contents',
        222 => 'file_put_contents',
        223 => 'stream_context_create',
        224 => 'stream_context_set_params',
        225 => 'stream_filter_append',
        226 => 'stream_filter_remove',
        227 => 'stream_socket_enable_crypto',
        228 => 'stream_get_contents',
        229 => 'flock',
        230 => 'stream_get_meta_data',
        231 => 'stream_set_timeout',
        232 => 'socket_set_timeout',
        233 => 'socket_get_status',
        234 => 'realpath',
        235 => 'fsockopen',
        236 => 'pack',
        237 => 'unpack',
        238 => 'opendir',
        239 => 'closedir',
        240 => 'chdir',
        241 => 'getcwd',
        242 => 'readdir',
        243 => 'glob',
        244 => 'filemtime',
        245 => 'fileperms',
        246 => 'filesize',
        247 => 'file_exists',
        248 => 'is_writable',
        249 => 'is_readable',
        250 => 'is_executable',
        251 => 'is_file',
        252 => 'is_dir',
        253 => 'is_link',
        254 => 'chmod',
        255 => 'touch',
        256 => 'clearstatcache',
        257 => 'disk_free_space',
        258 => 'mail',
        259 => 'openlog',
        260 => 'syslog',
        261 => 'closelog',
        262 => 'ob_start',
        263 => 'ob_flush',
        264 => 'ob_clean',
        265 => 'ob_end_clean',
        266 => 'ob_get_clean',
        267 => 'ob_get_contents',
        268 => 'ksort',
        269 => 'krsort',
        270 => 'asort',
        271 => 'sort',
        272 => 'usort',
        273 => 'uasort',
        274 => 'uksort',
        275 => 'array_walk',
        276 => 'array_walk_recursive',
        277 => 'count',
        278 => 'end',
        279 => 'next',
        280 => 'reset',
        281 => 'current',
        282 => 'key',
        283 => 'min',
        284 => 'max',
        285 => 'in_array',
        286 => 'array_search',
        287 => 'compact',
        288 => 'array_fill',
        289 => 'array_fill_keys',
        290 => 'range',
        291 => 'array_multisort',
        292 => 'array_push',
        293 => 'array_pop',
        294 => 'array_shift',
        295 => 'array_unshift',
        296 => 'array_splice',
        297 => 'array_slice',
        298 => 'array_merge',
        299 => 'array_merge_recursive',
        300 => 'array_replace_recursive',
        301 => 'array_keys',
        302 => 'array_values',
        303 => 'array_count_values',
        304 => 'array_reverse',
        305 => 'array_reduce',
        306 => 'array_pad',
        307 => 'array_flip',
        308 => 'array_change_key_case',
        309 => 'array_unique',
        310 => 'array_intersect',
        311 => 'array_intersect_key',
        312 => 'array_diff',
        313 => 'array_diff_key',
        314 => 'array_diff_assoc',
        315 => 'array_udiff_assoc',
        316 => 'array_sum',
        317 => 'array_filter',
        318 => 'array_map',
        319 => 'array_chunk',
        320 => 'array_combine',
        321 => 'array_key_exists',
        322 => 'version_compare',
        323 => 'stream_get_filters',
        324 => 'sys_get_temp_dir',
        325 => 'token_get_all',
        326 => 'xml_parser_create',
        327 => 'xml_parse_into_struct',
        328 => 'xml_get_error_code',
        329 => 'xml_error_string',
        330 => 'xml_get_current_byte_index',
        331 => 'xml_parser_free',
      ),
      'missed' => 
      array (
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_memory_limit' => 
  array (
    'title' => 'Предел памяти',
    'status' => true,
    'critical' => true,
    'value' => '268435456',
    'data' => 
    array (
      'memoryLimit' => '268435456',
      'memoryLimitMin' => '256M',
    ),
    'messageData' => 
    array (
      ':memoryLimit' => '268435456',
      ':memoryLimitMin' => '256M',
    ),
    'description' => '',
  ),
  'php_file_uploads' => 
  array (
    'title' => 'Загрузка файлов',
    'status' => true,
    'critical' => false,
    'value' => '1',
    'data' => 
    array (
      'file_uploads' => '1',
    ),
    'messageData' => 
    array (
      ':file_uploads' => '1',
    ),
    'description' => '',
  ),
  'php_pdo_mysql' => 
  array (
    'title' => 'Расширение PDO',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_upload_max_file_size' => 
  array (
    'title' => 'Предел размера загружаемого файла',
    'status' => true,
    'critical' => false,
    'value' => '2M',
    'data' => 
    array (
      'upload_max_filesize' => '2M',
    ),
    'messageData' => 
    array (
      ':upload_max_filesize' => '2M',
    ),
    'description' => '',
  ),
  'file_permissions' => 
  array (
    'title' => 'Права на файлы',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'mysql_version' => 
  array (
    'title' => 'Версия MySQL',
    'status' => true,
    'critical' => true,
    'value' => 'unknown',
    'data' => 
    array (
      'version' => 'unknown',
      'error' => '',
    ),
    'messageData' => 
    array (
      ':version' => 'unknown',
      ':error' => '',
    ),
    'description' => '',
  ),
  'php_gdlib' => 
  array (
    'title' => 'Расширение GDlib',
    'status' => true,
    'critical' => false,
    'value' => 'bundled (2.1.0 compatible)',
    'data' => 
    array (
      'version' => 'bundled (2.1.0 compatible)',
      'imagecreatefromjpeg' => true,
    ),
    'messageData' => 
    array (
      ':version' => 'bundled (2.1.0 compatible)',
      ':imagecreatefromjpeg' => true,
    ),
    'description' => '',
  ),
  'php_phar' => 
  array (
    'title' => 'Расширение Phar',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'https_bouncer' => 
  array (
    'title' => 'HTTPS баунсеры',
    'status' => true,
    'critical' => false,
    'value' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    'data' => 
    array (
      'version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'messageData' => 
    array (
      ':version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'description' => '',
  ),
  'xml_support' => 
  array (
    'title' => 'Поддержка XML расширений',
    'status' => true,
    'critical' => false,
    'value' => 'XML Parser, DOM/XML',
    'data' => 
    array (
      'extensions' => 
      array (
        0 => 'XML Parser',
        1 => 'DOM/XML',
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'doc_blocks_support' => 
  array (
    'title' => 'Поддержка DocBlocks',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'eAccelerator' => false,
    ),
    'messageData' => 
    array (
      ':eAccelerator' => false,
    ),
    'description' => '',
  ),
  'frame_options' => 
  array (
    'title' => 'X-Frame-Options',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'loopback_request' => 
  array (
    'title' => 'Loopback request',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
      'url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'messageData' => 
    array (
      ':url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'description' => '',
  ),
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:13:26 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'params' => 
  array (
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
    'requirements_success' => '1',
  ),
  'go_back' => '0',
  'current' => '3',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:13:27 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:13:27 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Проверка требований успешно завершена


--------------------------------------------------------------------
[Mon, 04 May 20 16:13:27 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Requirements log
array (
  'config_file' => 
  array (
    'title' => 'Файл конфигурации',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'configPath' => '/var/www/xcart/etc/',
      'configFileName' => 'config.php',
      'defaultConfigFileName' => 'config.default.php',
    ),
    'messageData' => 
    array (
      ':configPath' => '/var/www/xcart/etc/',
      ':configFileName' => 'config.php',
      ':defaultConfigFileName' => 'config.default.php',
    ),
    'description' => '',
  ),
  'php_version' => 
  array (
    'title' => 'Версия PHP',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_disabled_functions' => 
  array (
    'title' => 'Отключенные функции',
    'status' => true,
    'critical' => false,
    'value' => '...',
    'data' => 
    array (
      'exists' => 
      array (
        0 => 'func_num_args',
        1 => 'func_get_arg',
        2 => 'func_get_args',
        3 => 'strlen',
        4 => 'strcmp',
        5 => 'strncmp',
        6 => 'strcasecmp',
        7 => 'strncasecmp',
        8 => 'each',
        9 => 'error_reporting',
        10 => 'define',
        11 => 'defined',
        12 => 'get_class',
        13 => 'get_called_class',
        14 => 'get_parent_class',
        15 => 'method_exists',
        16 => 'property_exists',
        17 => 'class_exists',
        18 => 'interface_exists',
        19 => 'function_exists',
        20 => 'get_included_files',
        21 => 'is_subclass_of',
        22 => 'is_a',
        23 => 'get_class_vars',
        24 => 'get_object_vars',
        25 => 'set_error_handler',
        26 => 'restore_error_handler',
        27 => 'set_exception_handler',
        28 => 'get_declared_classes',
        29 => 'get_resource_type',
        30 => 'extension_loaded',
        31 => 'debug_backtrace',
        32 => 'debug_print_backtrace',
        33 => 'strtotime',
        34 => 'date',
        35 => 'gmdate',
        36 => 'mktime',
        37 => 'strftime',
        38 => 'time',
        39 => 'getdate',
        40 => 'date_create',
        41 => 'date_default_timezone_set',
        42 => 'date_default_timezone_get',
        43 => 'preg_match',
        44 => 'preg_match_all',
        45 => 'preg_replace',
        46 => 'preg_replace_callback',
        47 => 'preg_split',
        48 => 'preg_quote',
        49 => 'preg_grep',
        50 => 'preg_last_error',
        51 => 'ctype_alpha',
        52 => 'ctype_digit',
        53 => 'filter_var',
        54 => 'filter_var_array',
        55 => 'hash_hmac',
        56 => 'json_encode',
        57 => 'json_decode',
        58 => 'spl_autoload_register',
        59 => 'spl_autoload_unregister',
        60 => 'spl_autoload_functions',
        61 => 'class_parents',
        62 => 'class_implements',
        63 => 'spl_object_hash',
        64 => 'iterator_to_array',
        65 => 'simplexml_load_file',
        66 => 'constant',
        67 => 'sleep',
        68 => 'flush',
        69 => 'htmlspecialchars',
        70 => 'htmlentities',
        71 => 'html_entity_decode',
        72 => 'get_html_translation_table',
        73 => 'sha1',
        74 => 'md5',
        75 => 'md5_file',
        76 => 'crc32',
        77 => 'getimagesize',
        78 => 'phpinfo',
        79 => 'phpversion',
        80 => 'substr_count',
        81 => 'strspn',
        82 => 'strcspn',
        83 => 'strtok',
        84 => 'strtoupper',
        85 => 'strtolower',
        86 => 'strpos',
        87 => 'stripos',
        88 => 'strrpos',
        89 => 'strrev',
        90 => 'nl2br',
        91 => 'basename',
        92 => 'dirname',
        93 => 'pathinfo',
        94 => 'stripslashes',
        95 => 'stripcslashes',
        96 => 'strstr',
        97 => 'stristr',
        98 => 'str_split',
        99 => 'substr',
        100 => 'substr_replace',
        101 => 'ucfirst',
        102 => 'lcfirst',
        103 => 'ucwords',
        104 => 'strtr',
        105 => 'addslashes',
        106 => 'addcslashes',
        107 => 'rtrim',
        108 => 'str_replace',
        109 => 'str_ireplace',
        110 => 'str_repeat',
        111 => 'chunk_split',
        112 => 'trim',
        113 => 'ltrim',
        114 => 'strip_tags',
        115 => 'explode',
        116 => 'implode',
        117 => 'join',
        118 => 'setlocale',
        119 => 'chr',
        120 => 'ord',
        121 => 'parse_str',
        122 => 'str_pad',
        123 => 'chop',
        124 => 'sprintf',
        125 => 'printf',
        126 => 'sscanf',
        127 => 'parse_url',
        128 => 'urlencode',
        129 => 'urldecode',
        130 => 'http_build_query',
        131 => 'unlink',
        132 => 'exec',
        133 => 'escapeshellcmd',
        134 => 'escapeshellarg',
        135 => 'rand',
        136 => 'srand',
        137 => 'mt_rand',
        138 => 'mt_srand',
        139 => 'getmypid',
        140 => 'base64_encode',
        141 => 'abs',
        142 => 'ceil',
        143 => 'floor',
        144 => 'round',
        145 => 'is_infinite',
        146 => 'pow',
        147 => 'log',
        148 => 'sqrt',
        149 => 'hexdec',
        150 => 'octdec',
        151 => 'dechex',
        152 => 'base_convert',
        153 => 'number_format',
        154 => 'getenv',
        155 => 'putenv',
        156 => 'microtime',
        157 => 'uniqid',
        158 => 'quoted_printable_encode',
        159 => 'set_time_limit',
        160 => 'get_magic_quotes_gpc',
        161 => 'get_magic_quotes_runtime',
        162 => 'error_log',
        163 => 'error_get_last',
        164 => 'call_user_func',
        165 => 'call_user_func_array',
        166 => 'serialize',
        167 => 'unserialize',
        168 => 'var_dump',
        169 => 'var_export',
        170 => 'print_r',
        171 => 'memory_get_usage',
        172 => 'memory_get_peak_usage',
        173 => 'register_shutdown_function',
        174 => 'ini_get',
        175 => 'ini_set',
        176 => 'get_include_path',
        177 => 'set_include_path',
        178 => 'setcookie',
        179 => 'header',
        180 => 'headers_sent',
        181 => 'parse_ini_file',
        182 => 'is_uploaded_file',
        183 => 'move_uploaded_file',
        184 => 'intval',
        185 => 'floatval',
        186 => 'doubleval',
        187 => 'strval',
        188 => 'gettype',
        189 => 'is_null',
        190 => 'is_resource',
        191 => 'is_bool',
        192 => 'is_float',
        193 => 'is_int',
        194 => 'is_integer',
        195 => 'is_numeric',
        196 => 'is_string',
        197 => 'is_array',
        198 => 'is_object',
        199 => 'is_scalar',
        200 => 'is_callable',
        201 => 'pclose',
        202 => 'popen',
        203 => 'readfile',
        204 => 'rewind',
        205 => 'rmdir',
        206 => 'umask',
        207 => 'fclose',
        208 => 'feof',
        209 => 'fgets',
        210 => 'fread',
        211 => 'fopen',
        212 => 'fstat',
        213 => 'fflush',
        214 => 'fwrite',
        215 => 'fputs',
        216 => 'mkdir',
        217 => 'rename',
        218 => 'copy',
        219 => 'tempnam',
        220 => 'file',
        221 => 'file_get_contents',
        222 => 'file_put_contents',
        223 => 'stream_context_create',
        224 => 'stream_context_set_params',
        225 => 'stream_filter_append',
        226 => 'stream_filter_remove',
        227 => 'stream_socket_enable_crypto',
        228 => 'stream_get_contents',
        229 => 'flock',
        230 => 'stream_get_meta_data',
        231 => 'stream_set_timeout',
        232 => 'socket_set_timeout',
        233 => 'socket_get_status',
        234 => 'realpath',
        235 => 'fsockopen',
        236 => 'pack',
        237 => 'unpack',
        238 => 'opendir',
        239 => 'closedir',
        240 => 'chdir',
        241 => 'getcwd',
        242 => 'readdir',
        243 => 'glob',
        244 => 'filemtime',
        245 => 'fileperms',
        246 => 'filesize',
        247 => 'file_exists',
        248 => 'is_writable',
        249 => 'is_readable',
        250 => 'is_executable',
        251 => 'is_file',
        252 => 'is_dir',
        253 => 'is_link',
        254 => 'chmod',
        255 => 'touch',
        256 => 'clearstatcache',
        257 => 'disk_free_space',
        258 => 'mail',
        259 => 'openlog',
        260 => 'syslog',
        261 => 'closelog',
        262 => 'ob_start',
        263 => 'ob_flush',
        264 => 'ob_clean',
        265 => 'ob_end_clean',
        266 => 'ob_get_clean',
        267 => 'ob_get_contents',
        268 => 'ksort',
        269 => 'krsort',
        270 => 'asort',
        271 => 'sort',
        272 => 'usort',
        273 => 'uasort',
        274 => 'uksort',
        275 => 'array_walk',
        276 => 'array_walk_recursive',
        277 => 'count',
        278 => 'end',
        279 => 'next',
        280 => 'reset',
        281 => 'current',
        282 => 'key',
        283 => 'min',
        284 => 'max',
        285 => 'in_array',
        286 => 'array_search',
        287 => 'compact',
        288 => 'array_fill',
        289 => 'array_fill_keys',
        290 => 'range',
        291 => 'array_multisort',
        292 => 'array_push',
        293 => 'array_pop',
        294 => 'array_shift',
        295 => 'array_unshift',
        296 => 'array_splice',
        297 => 'array_slice',
        298 => 'array_merge',
        299 => 'array_merge_recursive',
        300 => 'array_replace_recursive',
        301 => 'array_keys',
        302 => 'array_values',
        303 => 'array_count_values',
        304 => 'array_reverse',
        305 => 'array_reduce',
        306 => 'array_pad',
        307 => 'array_flip',
        308 => 'array_change_key_case',
        309 => 'array_unique',
        310 => 'array_intersect',
        311 => 'array_intersect_key',
        312 => 'array_diff',
        313 => 'array_diff_key',
        314 => 'array_diff_assoc',
        315 => 'array_udiff_assoc',
        316 => 'array_sum',
        317 => 'array_filter',
        318 => 'array_map',
        319 => 'array_chunk',
        320 => 'array_combine',
        321 => 'array_key_exists',
        322 => 'version_compare',
        323 => 'stream_get_filters',
        324 => 'sys_get_temp_dir',
        325 => 'token_get_all',
        326 => 'xml_parser_create',
        327 => 'xml_parse_into_struct',
        328 => 'xml_get_error_code',
        329 => 'xml_error_string',
        330 => 'xml_get_current_byte_index',
        331 => 'xml_parser_free',
      ),
      'missed' => 
      array (
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_memory_limit' => 
  array (
    'title' => 'Предел памяти',
    'status' => true,
    'critical' => true,
    'value' => '268435456',
    'data' => 
    array (
      'memoryLimit' => '268435456',
      'memoryLimitMin' => '256M',
    ),
    'messageData' => 
    array (
      ':memoryLimit' => '268435456',
      ':memoryLimitMin' => '256M',
    ),
    'description' => '',
  ),
  'php_file_uploads' => 
  array (
    'title' => 'Загрузка файлов',
    'status' => true,
    'critical' => false,
    'value' => '1',
    'data' => 
    array (
      'file_uploads' => '1',
    ),
    'messageData' => 
    array (
      ':file_uploads' => '1',
    ),
    'description' => '',
  ),
  'php_pdo_mysql' => 
  array (
    'title' => 'Расширение PDO',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_upload_max_file_size' => 
  array (
    'title' => 'Предел размера загружаемого файла',
    'status' => true,
    'critical' => false,
    'value' => '2M',
    'data' => 
    array (
      'upload_max_filesize' => '2M',
    ),
    'messageData' => 
    array (
      ':upload_max_filesize' => '2M',
    ),
    'description' => '',
  ),
  'file_permissions' => 
  array (
    'title' => 'Права на файлы',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'mysql_version' => 
  array (
    'title' => 'Версия MySQL',
    'status' => true,
    'critical' => true,
    'value' => 'unknown',
    'data' => 
    array (
      'version' => 'unknown',
      'error' => '',
    ),
    'messageData' => 
    array (
      ':version' => 'unknown',
      ':error' => '',
    ),
    'description' => '',
  ),
  'php_gdlib' => 
  array (
    'title' => 'Расширение GDlib',
    'status' => true,
    'critical' => false,
    'value' => 'bundled (2.1.0 compatible)',
    'data' => 
    array (
      'version' => 'bundled (2.1.0 compatible)',
      'imagecreatefromjpeg' => true,
    ),
    'messageData' => 
    array (
      ':version' => 'bundled (2.1.0 compatible)',
      ':imagecreatefromjpeg' => true,
    ),
    'description' => '',
  ),
  'php_phar' => 
  array (
    'title' => 'Расширение Phar',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'https_bouncer' => 
  array (
    'title' => 'HTTPS баунсеры',
    'status' => true,
    'critical' => false,
    'value' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    'data' => 
    array (
      'version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'messageData' => 
    array (
      ':version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'description' => '',
  ),
  'xml_support' => 
  array (
    'title' => 'Поддержка XML расширений',
    'status' => true,
    'critical' => false,
    'value' => 'XML Parser, DOM/XML',
    'data' => 
    array (
      'extensions' => 
      array (
        0 => 'XML Parser',
        1 => 'DOM/XML',
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'doc_blocks_support' => 
  array (
    'title' => 'Поддержка DocBlocks',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'eAccelerator' => false,
    ),
    'messageData' => 
    array (
      ':eAccelerator' => false,
    ),
    'description' => '',
  ),
  'frame_options' => 
  array (
    'title' => 'X-Frame-Options',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'loopback_request' => 
  array (
    'title' => 'Loopback request',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
      'url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'messageData' => 
    array (
      ':url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'description' => '',
  ),
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:10 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'cfg_install_db_step' => '1',
  'params' => 
  array (
    'mysqlhost' => 'localhost',
    'mysqlbase' => 'xcart',
    'mysqluser' => 'root',
    'mysqlpass' => '<specified>',
    'demo' => 'Y',
    'mysqlport' => '3306',
    'mysqlsock' => '',
    'mysqlprefix' => 'xc_',
    'mysqlcharset' => 'utf8mb4',
    'xlite_http_host' => '192.168.0.13',
    'xlite_https_host' => '192.168.0.13',
    'xlite_web_dir' => '',
    'date_default_timezone' => 'UTC',
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
    'requirements_success' => '1',
  ),
  'go_back' => '0',
  'current' => '3',
  'next_button' => 'Далее',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:10 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:10 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Проверка требований успешно завершена


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:10 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Requirements log
array (
  'config_file' => 
  array (
    'title' => 'Файл конфигурации',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'configPath' => '/var/www/xcart/etc/',
      'configFileName' => 'config.php',
      'defaultConfigFileName' => 'config.default.php',
    ),
    'messageData' => 
    array (
      ':configPath' => '/var/www/xcart/etc/',
      ':configFileName' => 'config.php',
      ':defaultConfigFileName' => 'config.default.php',
    ),
    'description' => '',
  ),
  'php_version' => 
  array (
    'title' => 'Версия PHP',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_disabled_functions' => 
  array (
    'title' => 'Отключенные функции',
    'status' => true,
    'critical' => false,
    'value' => '...',
    'data' => 
    array (
      'exists' => 
      array (
        0 => 'func_num_args',
        1 => 'func_get_arg',
        2 => 'func_get_args',
        3 => 'strlen',
        4 => 'strcmp',
        5 => 'strncmp',
        6 => 'strcasecmp',
        7 => 'strncasecmp',
        8 => 'each',
        9 => 'error_reporting',
        10 => 'define',
        11 => 'defined',
        12 => 'get_class',
        13 => 'get_called_class',
        14 => 'get_parent_class',
        15 => 'method_exists',
        16 => 'property_exists',
        17 => 'class_exists',
        18 => 'interface_exists',
        19 => 'function_exists',
        20 => 'get_included_files',
        21 => 'is_subclass_of',
        22 => 'is_a',
        23 => 'get_class_vars',
        24 => 'get_object_vars',
        25 => 'set_error_handler',
        26 => 'restore_error_handler',
        27 => 'set_exception_handler',
        28 => 'get_declared_classes',
        29 => 'get_resource_type',
        30 => 'extension_loaded',
        31 => 'debug_backtrace',
        32 => 'debug_print_backtrace',
        33 => 'strtotime',
        34 => 'date',
        35 => 'gmdate',
        36 => 'mktime',
        37 => 'strftime',
        38 => 'time',
        39 => 'getdate',
        40 => 'date_create',
        41 => 'date_default_timezone_set',
        42 => 'date_default_timezone_get',
        43 => 'preg_match',
        44 => 'preg_match_all',
        45 => 'preg_replace',
        46 => 'preg_replace_callback',
        47 => 'preg_split',
        48 => 'preg_quote',
        49 => 'preg_grep',
        50 => 'preg_last_error',
        51 => 'ctype_alpha',
        52 => 'ctype_digit',
        53 => 'filter_var',
        54 => 'filter_var_array',
        55 => 'hash_hmac',
        56 => 'json_encode',
        57 => 'json_decode',
        58 => 'spl_autoload_register',
        59 => 'spl_autoload_unregister',
        60 => 'spl_autoload_functions',
        61 => 'class_parents',
        62 => 'class_implements',
        63 => 'spl_object_hash',
        64 => 'iterator_to_array',
        65 => 'simplexml_load_file',
        66 => 'constant',
        67 => 'sleep',
        68 => 'flush',
        69 => 'htmlspecialchars',
        70 => 'htmlentities',
        71 => 'html_entity_decode',
        72 => 'get_html_translation_table',
        73 => 'sha1',
        74 => 'md5',
        75 => 'md5_file',
        76 => 'crc32',
        77 => 'getimagesize',
        78 => 'phpinfo',
        79 => 'phpversion',
        80 => 'substr_count',
        81 => 'strspn',
        82 => 'strcspn',
        83 => 'strtok',
        84 => 'strtoupper',
        85 => 'strtolower',
        86 => 'strpos',
        87 => 'stripos',
        88 => 'strrpos',
        89 => 'strrev',
        90 => 'nl2br',
        91 => 'basename',
        92 => 'dirname',
        93 => 'pathinfo',
        94 => 'stripslashes',
        95 => 'stripcslashes',
        96 => 'strstr',
        97 => 'stristr',
        98 => 'str_split',
        99 => 'substr',
        100 => 'substr_replace',
        101 => 'ucfirst',
        102 => 'lcfirst',
        103 => 'ucwords',
        104 => 'strtr',
        105 => 'addslashes',
        106 => 'addcslashes',
        107 => 'rtrim',
        108 => 'str_replace',
        109 => 'str_ireplace',
        110 => 'str_repeat',
        111 => 'chunk_split',
        112 => 'trim',
        113 => 'ltrim',
        114 => 'strip_tags',
        115 => 'explode',
        116 => 'implode',
        117 => 'join',
        118 => 'setlocale',
        119 => 'chr',
        120 => 'ord',
        121 => 'parse_str',
        122 => 'str_pad',
        123 => 'chop',
        124 => 'sprintf',
        125 => 'printf',
        126 => 'sscanf',
        127 => 'parse_url',
        128 => 'urlencode',
        129 => 'urldecode',
        130 => 'http_build_query',
        131 => 'unlink',
        132 => 'exec',
        133 => 'escapeshellcmd',
        134 => 'escapeshellarg',
        135 => 'rand',
        136 => 'srand',
        137 => 'mt_rand',
        138 => 'mt_srand',
        139 => 'getmypid',
        140 => 'base64_encode',
        141 => 'abs',
        142 => 'ceil',
        143 => 'floor',
        144 => 'round',
        145 => 'is_infinite',
        146 => 'pow',
        147 => 'log',
        148 => 'sqrt',
        149 => 'hexdec',
        150 => 'octdec',
        151 => 'dechex',
        152 => 'base_convert',
        153 => 'number_format',
        154 => 'getenv',
        155 => 'putenv',
        156 => 'microtime',
        157 => 'uniqid',
        158 => 'quoted_printable_encode',
        159 => 'set_time_limit',
        160 => 'get_magic_quotes_gpc',
        161 => 'get_magic_quotes_runtime',
        162 => 'error_log',
        163 => 'error_get_last',
        164 => 'call_user_func',
        165 => 'call_user_func_array',
        166 => 'serialize',
        167 => 'unserialize',
        168 => 'var_dump',
        169 => 'var_export',
        170 => 'print_r',
        171 => 'memory_get_usage',
        172 => 'memory_get_peak_usage',
        173 => 'register_shutdown_function',
        174 => 'ini_get',
        175 => 'ini_set',
        176 => 'get_include_path',
        177 => 'set_include_path',
        178 => 'setcookie',
        179 => 'header',
        180 => 'headers_sent',
        181 => 'parse_ini_file',
        182 => 'is_uploaded_file',
        183 => 'move_uploaded_file',
        184 => 'intval',
        185 => 'floatval',
        186 => 'doubleval',
        187 => 'strval',
        188 => 'gettype',
        189 => 'is_null',
        190 => 'is_resource',
        191 => 'is_bool',
        192 => 'is_float',
        193 => 'is_int',
        194 => 'is_integer',
        195 => 'is_numeric',
        196 => 'is_string',
        197 => 'is_array',
        198 => 'is_object',
        199 => 'is_scalar',
        200 => 'is_callable',
        201 => 'pclose',
        202 => 'popen',
        203 => 'readfile',
        204 => 'rewind',
        205 => 'rmdir',
        206 => 'umask',
        207 => 'fclose',
        208 => 'feof',
        209 => 'fgets',
        210 => 'fread',
        211 => 'fopen',
        212 => 'fstat',
        213 => 'fflush',
        214 => 'fwrite',
        215 => 'fputs',
        216 => 'mkdir',
        217 => 'rename',
        218 => 'copy',
        219 => 'tempnam',
        220 => 'file',
        221 => 'file_get_contents',
        222 => 'file_put_contents',
        223 => 'stream_context_create',
        224 => 'stream_context_set_params',
        225 => 'stream_filter_append',
        226 => 'stream_filter_remove',
        227 => 'stream_socket_enable_crypto',
        228 => 'stream_get_contents',
        229 => 'flock',
        230 => 'stream_get_meta_data',
        231 => 'stream_set_timeout',
        232 => 'socket_set_timeout',
        233 => 'socket_get_status',
        234 => 'realpath',
        235 => 'fsockopen',
        236 => 'pack',
        237 => 'unpack',
        238 => 'opendir',
        239 => 'closedir',
        240 => 'chdir',
        241 => 'getcwd',
        242 => 'readdir',
        243 => 'glob',
        244 => 'filemtime',
        245 => 'fileperms',
        246 => 'filesize',
        247 => 'file_exists',
        248 => 'is_writable',
        249 => 'is_readable',
        250 => 'is_executable',
        251 => 'is_file',
        252 => 'is_dir',
        253 => 'is_link',
        254 => 'chmod',
        255 => 'touch',
        256 => 'clearstatcache',
        257 => 'disk_free_space',
        258 => 'mail',
        259 => 'openlog',
        260 => 'syslog',
        261 => 'closelog',
        262 => 'ob_start',
        263 => 'ob_flush',
        264 => 'ob_clean',
        265 => 'ob_end_clean',
        266 => 'ob_get_clean',
        267 => 'ob_get_contents',
        268 => 'ksort',
        269 => 'krsort',
        270 => 'asort',
        271 => 'sort',
        272 => 'usort',
        273 => 'uasort',
        274 => 'uksort',
        275 => 'array_walk',
        276 => 'array_walk_recursive',
        277 => 'count',
        278 => 'end',
        279 => 'next',
        280 => 'reset',
        281 => 'current',
        282 => 'key',
        283 => 'min',
        284 => 'max',
        285 => 'in_array',
        286 => 'array_search',
        287 => 'compact',
        288 => 'array_fill',
        289 => 'array_fill_keys',
        290 => 'range',
        291 => 'array_multisort',
        292 => 'array_push',
        293 => 'array_pop',
        294 => 'array_shift',
        295 => 'array_unshift',
        296 => 'array_splice',
        297 => 'array_slice',
        298 => 'array_merge',
        299 => 'array_merge_recursive',
        300 => 'array_replace_recursive',
        301 => 'array_keys',
        302 => 'array_values',
        303 => 'array_count_values',
        304 => 'array_reverse',
        305 => 'array_reduce',
        306 => 'array_pad',
        307 => 'array_flip',
        308 => 'array_change_key_case',
        309 => 'array_unique',
        310 => 'array_intersect',
        311 => 'array_intersect_key',
        312 => 'array_diff',
        313 => 'array_diff_key',
        314 => 'array_diff_assoc',
        315 => 'array_udiff_assoc',
        316 => 'array_sum',
        317 => 'array_filter',
        318 => 'array_map',
        319 => 'array_chunk',
        320 => 'array_combine',
        321 => 'array_key_exists',
        322 => 'version_compare',
        323 => 'stream_get_filters',
        324 => 'sys_get_temp_dir',
        325 => 'token_get_all',
        326 => 'xml_parser_create',
        327 => 'xml_parse_into_struct',
        328 => 'xml_get_error_code',
        329 => 'xml_error_string',
        330 => 'xml_get_current_byte_index',
        331 => 'xml_parser_free',
      ),
      'missed' => 
      array (
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_memory_limit' => 
  array (
    'title' => 'Предел памяти',
    'status' => true,
    'critical' => true,
    'value' => '268435456',
    'data' => 
    array (
      'memoryLimit' => '268435456',
      'memoryLimitMin' => '256M',
    ),
    'messageData' => 
    array (
      ':memoryLimit' => '268435456',
      ':memoryLimitMin' => '256M',
    ),
    'description' => '',
  ),
  'php_file_uploads' => 
  array (
    'title' => 'Загрузка файлов',
    'status' => true,
    'critical' => false,
    'value' => '1',
    'data' => 
    array (
      'file_uploads' => '1',
    ),
    'messageData' => 
    array (
      ':file_uploads' => '1',
    ),
    'description' => '',
  ),
  'php_pdo_mysql' => 
  array (
    'title' => 'Расширение PDO',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_upload_max_file_size' => 
  array (
    'title' => 'Предел размера загружаемого файла',
    'status' => true,
    'critical' => false,
    'value' => '2M',
    'data' => 
    array (
      'upload_max_filesize' => '2M',
    ),
    'messageData' => 
    array (
      ':upload_max_filesize' => '2M',
    ),
    'description' => '',
  ),
  'file_permissions' => 
  array (
    'title' => 'Права на файлы',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'mysql_version' => 
  array (
    'title' => 'Версия MySQL',
    'status' => true,
    'critical' => true,
    'value' => 'unknown',
    'data' => 
    array (
      'version' => 'unknown',
      'error' => '',
    ),
    'messageData' => 
    array (
      ':version' => 'unknown',
      ':error' => '',
    ),
    'description' => '',
  ),
  'php_gdlib' => 
  array (
    'title' => 'Расширение GDlib',
    'status' => true,
    'critical' => false,
    'value' => 'bundled (2.1.0 compatible)',
    'data' => 
    array (
      'version' => 'bundled (2.1.0 compatible)',
      'imagecreatefromjpeg' => true,
    ),
    'messageData' => 
    array (
      ':version' => 'bundled (2.1.0 compatible)',
      ':imagecreatefromjpeg' => true,
    ),
    'description' => '',
  ),
  'php_phar' => 
  array (
    'title' => 'Расширение Phar',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'https_bouncer' => 
  array (
    'title' => 'HTTPS баунсеры',
    'status' => true,
    'critical' => false,
    'value' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    'data' => 
    array (
      'version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'messageData' => 
    array (
      ':version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'description' => '',
  ),
  'xml_support' => 
  array (
    'title' => 'Поддержка XML расширений',
    'status' => true,
    'critical' => false,
    'value' => 'XML Parser, DOM/XML',
    'data' => 
    array (
      'extensions' => 
      array (
        0 => 'XML Parser',
        1 => 'DOM/XML',
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'doc_blocks_support' => 
  array (
    'title' => 'Поддержка DocBlocks',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'eAccelerator' => false,
    ),
    'messageData' => 
    array (
      ':eAccelerator' => false,
    ),
    'description' => '',
  ),
  'frame_options' => 
  array (
    'title' => 'X-Frame-Options',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'loopback_request' => 
  array (
    'title' => 'Loopback request',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
      'url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'messageData' => 
    array (
      ':url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'description' => '',
  ),
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:11 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Неустранимая ошибка: Не удалось установить соединение с MySQL сервером.<span class="pdo-details" onclick="javascript: toggleSection('pdo-error');">Подробнее</span><div class="section section-pdo-error">SQLSTATE[HY000] [2002] No such file or directory</div><br />Нажмите НАЗАД' и проверьте введенные настройки MySQL сервера.


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:12 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'params' => 
  array (
    'mysqlhost' => 'localhost',
    'mysqlbase' => 'xcart',
    'mysqluser' => 'root',
    'mysqlpass' => '<specified>',
    'demo' => 'Y',
    'mysqlport' => '3306',
    'mysqlprefix' => 'xc_',
    'mysqlcharset' => 'utf8mb4',
    'xlite_http_host' => '192.168.0.13',
    'xlite_https_host' => '192.168.0.13',
    'date_default_timezone' => 'UTC',
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
    'requirements_success' => '1',
  ),
  'go_back' => '1',
  'current' => '3',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:12 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:12 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Проверка требований успешно завершена


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:12 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Requirements log
array (
  'config_file' => 
  array (
    'title' => 'Файл конфигурации',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'configPath' => '/var/www/xcart/etc/',
      'configFileName' => 'config.php',
      'defaultConfigFileName' => 'config.default.php',
    ),
    'messageData' => 
    array (
      ':configPath' => '/var/www/xcart/etc/',
      ':configFileName' => 'config.php',
      ':defaultConfigFileName' => 'config.default.php',
    ),
    'description' => '',
  ),
  'php_version' => 
  array (
    'title' => 'Версия PHP',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_disabled_functions' => 
  array (
    'title' => 'Отключенные функции',
    'status' => true,
    'critical' => false,
    'value' => '...',
    'data' => 
    array (
      'exists' => 
      array (
        0 => 'func_num_args',
        1 => 'func_get_arg',
        2 => 'func_get_args',
        3 => 'strlen',
        4 => 'strcmp',
        5 => 'strncmp',
        6 => 'strcasecmp',
        7 => 'strncasecmp',
        8 => 'each',
        9 => 'error_reporting',
        10 => 'define',
        11 => 'defined',
        12 => 'get_class',
        13 => 'get_called_class',
        14 => 'get_parent_class',
        15 => 'method_exists',
        16 => 'property_exists',
        17 => 'class_exists',
        18 => 'interface_exists',
        19 => 'function_exists',
        20 => 'get_included_files',
        21 => 'is_subclass_of',
        22 => 'is_a',
        23 => 'get_class_vars',
        24 => 'get_object_vars',
        25 => 'set_error_handler',
        26 => 'restore_error_handler',
        27 => 'set_exception_handler',
        28 => 'get_declared_classes',
        29 => 'get_resource_type',
        30 => 'extension_loaded',
        31 => 'debug_backtrace',
        32 => 'debug_print_backtrace',
        33 => 'strtotime',
        34 => 'date',
        35 => 'gmdate',
        36 => 'mktime',
        37 => 'strftime',
        38 => 'time',
        39 => 'getdate',
        40 => 'date_create',
        41 => 'date_default_timezone_set',
        42 => 'date_default_timezone_get',
        43 => 'preg_match',
        44 => 'preg_match_all',
        45 => 'preg_replace',
        46 => 'preg_replace_callback',
        47 => 'preg_split',
        48 => 'preg_quote',
        49 => 'preg_grep',
        50 => 'preg_last_error',
        51 => 'ctype_alpha',
        52 => 'ctype_digit',
        53 => 'filter_var',
        54 => 'filter_var_array',
        55 => 'hash_hmac',
        56 => 'json_encode',
        57 => 'json_decode',
        58 => 'spl_autoload_register',
        59 => 'spl_autoload_unregister',
        60 => 'spl_autoload_functions',
        61 => 'class_parents',
        62 => 'class_implements',
        63 => 'spl_object_hash',
        64 => 'iterator_to_array',
        65 => 'simplexml_load_file',
        66 => 'constant',
        67 => 'sleep',
        68 => 'flush',
        69 => 'htmlspecialchars',
        70 => 'htmlentities',
        71 => 'html_entity_decode',
        72 => 'get_html_translation_table',
        73 => 'sha1',
        74 => 'md5',
        75 => 'md5_file',
        76 => 'crc32',
        77 => 'getimagesize',
        78 => 'phpinfo',
        79 => 'phpversion',
        80 => 'substr_count',
        81 => 'strspn',
        82 => 'strcspn',
        83 => 'strtok',
        84 => 'strtoupper',
        85 => 'strtolower',
        86 => 'strpos',
        87 => 'stripos',
        88 => 'strrpos',
        89 => 'strrev',
        90 => 'nl2br',
        91 => 'basename',
        92 => 'dirname',
        93 => 'pathinfo',
        94 => 'stripslashes',
        95 => 'stripcslashes',
        96 => 'strstr',
        97 => 'stristr',
        98 => 'str_split',
        99 => 'substr',
        100 => 'substr_replace',
        101 => 'ucfirst',
        102 => 'lcfirst',
        103 => 'ucwords',
        104 => 'strtr',
        105 => 'addslashes',
        106 => 'addcslashes',
        107 => 'rtrim',
        108 => 'str_replace',
        109 => 'str_ireplace',
        110 => 'str_repeat',
        111 => 'chunk_split',
        112 => 'trim',
        113 => 'ltrim',
        114 => 'strip_tags',
        115 => 'explode',
        116 => 'implode',
        117 => 'join',
        118 => 'setlocale',
        119 => 'chr',
        120 => 'ord',
        121 => 'parse_str',
        122 => 'str_pad',
        123 => 'chop',
        124 => 'sprintf',
        125 => 'printf',
        126 => 'sscanf',
        127 => 'parse_url',
        128 => 'urlencode',
        129 => 'urldecode',
        130 => 'http_build_query',
        131 => 'unlink',
        132 => 'exec',
        133 => 'escapeshellcmd',
        134 => 'escapeshellarg',
        135 => 'rand',
        136 => 'srand',
        137 => 'mt_rand',
        138 => 'mt_srand',
        139 => 'getmypid',
        140 => 'base64_encode',
        141 => 'abs',
        142 => 'ceil',
        143 => 'floor',
        144 => 'round',
        145 => 'is_infinite',
        146 => 'pow',
        147 => 'log',
        148 => 'sqrt',
        149 => 'hexdec',
        150 => 'octdec',
        151 => 'dechex',
        152 => 'base_convert',
        153 => 'number_format',
        154 => 'getenv',
        155 => 'putenv',
        156 => 'microtime',
        157 => 'uniqid',
        158 => 'quoted_printable_encode',
        159 => 'set_time_limit',
        160 => 'get_magic_quotes_gpc',
        161 => 'get_magic_quotes_runtime',
        162 => 'error_log',
        163 => 'error_get_last',
        164 => 'call_user_func',
        165 => 'call_user_func_array',
        166 => 'serialize',
        167 => 'unserialize',
        168 => 'var_dump',
        169 => 'var_export',
        170 => 'print_r',
        171 => 'memory_get_usage',
        172 => 'memory_get_peak_usage',
        173 => 'register_shutdown_function',
        174 => 'ini_get',
        175 => 'ini_set',
        176 => 'get_include_path',
        177 => 'set_include_path',
        178 => 'setcookie',
        179 => 'header',
        180 => 'headers_sent',
        181 => 'parse_ini_file',
        182 => 'is_uploaded_file',
        183 => 'move_uploaded_file',
        184 => 'intval',
        185 => 'floatval',
        186 => 'doubleval',
        187 => 'strval',
        188 => 'gettype',
        189 => 'is_null',
        190 => 'is_resource',
        191 => 'is_bool',
        192 => 'is_float',
        193 => 'is_int',
        194 => 'is_integer',
        195 => 'is_numeric',
        196 => 'is_string',
        197 => 'is_array',
        198 => 'is_object',
        199 => 'is_scalar',
        200 => 'is_callable',
        201 => 'pclose',
        202 => 'popen',
        203 => 'readfile',
        204 => 'rewind',
        205 => 'rmdir',
        206 => 'umask',
        207 => 'fclose',
        208 => 'feof',
        209 => 'fgets',
        210 => 'fread',
        211 => 'fopen',
        212 => 'fstat',
        213 => 'fflush',
        214 => 'fwrite',
        215 => 'fputs',
        216 => 'mkdir',
        217 => 'rename',
        218 => 'copy',
        219 => 'tempnam',
        220 => 'file',
        221 => 'file_get_contents',
        222 => 'file_put_contents',
        223 => 'stream_context_create',
        224 => 'stream_context_set_params',
        225 => 'stream_filter_append',
        226 => 'stream_filter_remove',
        227 => 'stream_socket_enable_crypto',
        228 => 'stream_get_contents',
        229 => 'flock',
        230 => 'stream_get_meta_data',
        231 => 'stream_set_timeout',
        232 => 'socket_set_timeout',
        233 => 'socket_get_status',
        234 => 'realpath',
        235 => 'fsockopen',
        236 => 'pack',
        237 => 'unpack',
        238 => 'opendir',
        239 => 'closedir',
        240 => 'chdir',
        241 => 'getcwd',
        242 => 'readdir',
        243 => 'glob',
        244 => 'filemtime',
        245 => 'fileperms',
        246 => 'filesize',
        247 => 'file_exists',
        248 => 'is_writable',
        249 => 'is_readable',
        250 => 'is_executable',
        251 => 'is_file',
        252 => 'is_dir',
        253 => 'is_link',
        254 => 'chmod',
        255 => 'touch',
        256 => 'clearstatcache',
        257 => 'disk_free_space',
        258 => 'mail',
        259 => 'openlog',
        260 => 'syslog',
        261 => 'closelog',
        262 => 'ob_start',
        263 => 'ob_flush',
        264 => 'ob_clean',
        265 => 'ob_end_clean',
        266 => 'ob_get_clean',
        267 => 'ob_get_contents',
        268 => 'ksort',
        269 => 'krsort',
        270 => 'asort',
        271 => 'sort',
        272 => 'usort',
        273 => 'uasort',
        274 => 'uksort',
        275 => 'array_walk',
        276 => 'array_walk_recursive',
        277 => 'count',
        278 => 'end',
        279 => 'next',
        280 => 'reset',
        281 => 'current',
        282 => 'key',
        283 => 'min',
        284 => 'max',
        285 => 'in_array',
        286 => 'array_search',
        287 => 'compact',
        288 => 'array_fill',
        289 => 'array_fill_keys',
        290 => 'range',
        291 => 'array_multisort',
        292 => 'array_push',
        293 => 'array_pop',
        294 => 'array_shift',
        295 => 'array_unshift',
        296 => 'array_splice',
        297 => 'array_slice',
        298 => 'array_merge',
        299 => 'array_merge_recursive',
        300 => 'array_replace_recursive',
        301 => 'array_keys',
        302 => 'array_values',
        303 => 'array_count_values',
        304 => 'array_reverse',
        305 => 'array_reduce',
        306 => 'array_pad',
        307 => 'array_flip',
        308 => 'array_change_key_case',
        309 => 'array_unique',
        310 => 'array_intersect',
        311 => 'array_intersect_key',
        312 => 'array_diff',
        313 => 'array_diff_key',
        314 => 'array_diff_assoc',
        315 => 'array_udiff_assoc',
        316 => 'array_sum',
        317 => 'array_filter',
        318 => 'array_map',
        319 => 'array_chunk',
        320 => 'array_combine',
        321 => 'array_key_exists',
        322 => 'version_compare',
        323 => 'stream_get_filters',
        324 => 'sys_get_temp_dir',
        325 => 'token_get_all',
        326 => 'xml_parser_create',
        327 => 'xml_parse_into_struct',
        328 => 'xml_get_error_code',
        329 => 'xml_error_string',
        330 => 'xml_get_current_byte_index',
        331 => 'xml_parser_free',
      ),
      'missed' => 
      array (
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_memory_limit' => 
  array (
    'title' => 'Предел памяти',
    'status' => true,
    'critical' => true,
    'value' => '268435456',
    'data' => 
    array (
      'memoryLimit' => '268435456',
      'memoryLimitMin' => '256M',
    ),
    'messageData' => 
    array (
      ':memoryLimit' => '268435456',
      ':memoryLimitMin' => '256M',
    ),
    'description' => '',
  ),
  'php_file_uploads' => 
  array (
    'title' => 'Загрузка файлов',
    'status' => true,
    'critical' => false,
    'value' => '1',
    'data' => 
    array (
      'file_uploads' => '1',
    ),
    'messageData' => 
    array (
      ':file_uploads' => '1',
    ),
    'description' => '',
  ),
  'php_pdo_mysql' => 
  array (
    'title' => 'Расширение PDO',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_upload_max_file_size' => 
  array (
    'title' => 'Предел размера загружаемого файла',
    'status' => true,
    'critical' => false,
    'value' => '2M',
    'data' => 
    array (
      'upload_max_filesize' => '2M',
    ),
    'messageData' => 
    array (
      ':upload_max_filesize' => '2M',
    ),
    'description' => '',
  ),
  'file_permissions' => 
  array (
    'title' => 'Права на файлы',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'mysql_version' => 
  array (
    'title' => 'Версия MySQL',
    'status' => true,
    'critical' => true,
    'value' => 'unknown',
    'data' => 
    array (
      'version' => 'unknown',
      'error' => '',
    ),
    'messageData' => 
    array (
      ':version' => 'unknown',
      ':error' => '',
    ),
    'description' => '',
  ),
  'php_gdlib' => 
  array (
    'title' => 'Расширение GDlib',
    'status' => true,
    'critical' => false,
    'value' => 'bundled (2.1.0 compatible)',
    'data' => 
    array (
      'version' => 'bundled (2.1.0 compatible)',
      'imagecreatefromjpeg' => true,
    ),
    'messageData' => 
    array (
      ':version' => 'bundled (2.1.0 compatible)',
      ':imagecreatefromjpeg' => true,
    ),
    'description' => '',
  ),
  'php_phar' => 
  array (
    'title' => 'Расширение Phar',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'https_bouncer' => 
  array (
    'title' => 'HTTPS баунсеры',
    'status' => true,
    'critical' => false,
    'value' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    'data' => 
    array (
      'version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'messageData' => 
    array (
      ':version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'description' => '',
  ),
  'xml_support' => 
  array (
    'title' => 'Поддержка XML расширений',
    'status' => true,
    'critical' => false,
    'value' => 'XML Parser, DOM/XML',
    'data' => 
    array (
      'extensions' => 
      array (
        0 => 'XML Parser',
        1 => 'DOM/XML',
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'doc_blocks_support' => 
  array (
    'title' => 'Поддержка DocBlocks',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'eAccelerator' => false,
    ),
    'messageData' => 
    array (
      ':eAccelerator' => false,
    ),
    'description' => '',
  ),
  'frame_options' => 
  array (
    'title' => 'X-Frame-Options',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'loopback_request' => 
  array (
    'title' => 'Loopback request',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
      'url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'messageData' => 
    array (
      ':url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'description' => '',
  ),
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:17 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'cfg_install_db_step' => '1',
  'params' => 
  array (
    'mysqlhost' => 'mysql',
    'mysqlbase' => 'xcart',
    'mysqluser' => 'root',
    'mysqlpass' => '<specified>',
    'demo' => 'Y',
    'mysqlport' => '3306',
    'mysqlsock' => '',
    'mysqlprefix' => 'xc_',
    'mysqlcharset' => 'utf8mb4',
    'xlite_http_host' => '192.168.0.13',
    'xlite_https_host' => '192.168.0.13',
    'xlite_web_dir' => '',
    'date_default_timezone' => 'UTC',
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
    'requirements_success' => '1',
  ),
  'go_back' => '0',
  'current' => '3',
  'next_button' => 'Далее',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:17 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:17 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Проверка требований успешно завершена


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:17 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Requirements log
array (
  'config_file' => 
  array (
    'title' => 'Файл конфигурации',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'configPath' => '/var/www/xcart/etc/',
      'configFileName' => 'config.php',
      'defaultConfigFileName' => 'config.default.php',
    ),
    'messageData' => 
    array (
      ':configPath' => '/var/www/xcart/etc/',
      ':configFileName' => 'config.php',
      ':defaultConfigFileName' => 'config.default.php',
    ),
    'description' => '',
  ),
  'php_version' => 
  array (
    'title' => 'Версия PHP',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_disabled_functions' => 
  array (
    'title' => 'Отключенные функции',
    'status' => true,
    'critical' => false,
    'value' => '...',
    'data' => 
    array (
      'exists' => 
      array (
        0 => 'func_num_args',
        1 => 'func_get_arg',
        2 => 'func_get_args',
        3 => 'strlen',
        4 => 'strcmp',
        5 => 'strncmp',
        6 => 'strcasecmp',
        7 => 'strncasecmp',
        8 => 'each',
        9 => 'error_reporting',
        10 => 'define',
        11 => 'defined',
        12 => 'get_class',
        13 => 'get_called_class',
        14 => 'get_parent_class',
        15 => 'method_exists',
        16 => 'property_exists',
        17 => 'class_exists',
        18 => 'interface_exists',
        19 => 'function_exists',
        20 => 'get_included_files',
        21 => 'is_subclass_of',
        22 => 'is_a',
        23 => 'get_class_vars',
        24 => 'get_object_vars',
        25 => 'set_error_handler',
        26 => 'restore_error_handler',
        27 => 'set_exception_handler',
        28 => 'get_declared_classes',
        29 => 'get_resource_type',
        30 => 'extension_loaded',
        31 => 'debug_backtrace',
        32 => 'debug_print_backtrace',
        33 => 'strtotime',
        34 => 'date',
        35 => 'gmdate',
        36 => 'mktime',
        37 => 'strftime',
        38 => 'time',
        39 => 'getdate',
        40 => 'date_create',
        41 => 'date_default_timezone_set',
        42 => 'date_default_timezone_get',
        43 => 'preg_match',
        44 => 'preg_match_all',
        45 => 'preg_replace',
        46 => 'preg_replace_callback',
        47 => 'preg_split',
        48 => 'preg_quote',
        49 => 'preg_grep',
        50 => 'preg_last_error',
        51 => 'ctype_alpha',
        52 => 'ctype_digit',
        53 => 'filter_var',
        54 => 'filter_var_array',
        55 => 'hash_hmac',
        56 => 'json_encode',
        57 => 'json_decode',
        58 => 'spl_autoload_register',
        59 => 'spl_autoload_unregister',
        60 => 'spl_autoload_functions',
        61 => 'class_parents',
        62 => 'class_implements',
        63 => 'spl_object_hash',
        64 => 'iterator_to_array',
        65 => 'simplexml_load_file',
        66 => 'constant',
        67 => 'sleep',
        68 => 'flush',
        69 => 'htmlspecialchars',
        70 => 'htmlentities',
        71 => 'html_entity_decode',
        72 => 'get_html_translation_table',
        73 => 'sha1',
        74 => 'md5',
        75 => 'md5_file',
        76 => 'crc32',
        77 => 'getimagesize',
        78 => 'phpinfo',
        79 => 'phpversion',
        80 => 'substr_count',
        81 => 'strspn',
        82 => 'strcspn',
        83 => 'strtok',
        84 => 'strtoupper',
        85 => 'strtolower',
        86 => 'strpos',
        87 => 'stripos',
        88 => 'strrpos',
        89 => 'strrev',
        90 => 'nl2br',
        91 => 'basename',
        92 => 'dirname',
        93 => 'pathinfo',
        94 => 'stripslashes',
        95 => 'stripcslashes',
        96 => 'strstr',
        97 => 'stristr',
        98 => 'str_split',
        99 => 'substr',
        100 => 'substr_replace',
        101 => 'ucfirst',
        102 => 'lcfirst',
        103 => 'ucwords',
        104 => 'strtr',
        105 => 'addslashes',
        106 => 'addcslashes',
        107 => 'rtrim',
        108 => 'str_replace',
        109 => 'str_ireplace',
        110 => 'str_repeat',
        111 => 'chunk_split',
        112 => 'trim',
        113 => 'ltrim',
        114 => 'strip_tags',
        115 => 'explode',
        116 => 'implode',
        117 => 'join',
        118 => 'setlocale',
        119 => 'chr',
        120 => 'ord',
        121 => 'parse_str',
        122 => 'str_pad',
        123 => 'chop',
        124 => 'sprintf',
        125 => 'printf',
        126 => 'sscanf',
        127 => 'parse_url',
        128 => 'urlencode',
        129 => 'urldecode',
        130 => 'http_build_query',
        131 => 'unlink',
        132 => 'exec',
        133 => 'escapeshellcmd',
        134 => 'escapeshellarg',
        135 => 'rand',
        136 => 'srand',
        137 => 'mt_rand',
        138 => 'mt_srand',
        139 => 'getmypid',
        140 => 'base64_encode',
        141 => 'abs',
        142 => 'ceil',
        143 => 'floor',
        144 => 'round',
        145 => 'is_infinite',
        146 => 'pow',
        147 => 'log',
        148 => 'sqrt',
        149 => 'hexdec',
        150 => 'octdec',
        151 => 'dechex',
        152 => 'base_convert',
        153 => 'number_format',
        154 => 'getenv',
        155 => 'putenv',
        156 => 'microtime',
        157 => 'uniqid',
        158 => 'quoted_printable_encode',
        159 => 'set_time_limit',
        160 => 'get_magic_quotes_gpc',
        161 => 'get_magic_quotes_runtime',
        162 => 'error_log',
        163 => 'error_get_last',
        164 => 'call_user_func',
        165 => 'call_user_func_array',
        166 => 'serialize',
        167 => 'unserialize',
        168 => 'var_dump',
        169 => 'var_export',
        170 => 'print_r',
        171 => 'memory_get_usage',
        172 => 'memory_get_peak_usage',
        173 => 'register_shutdown_function',
        174 => 'ini_get',
        175 => 'ini_set',
        176 => 'get_include_path',
        177 => 'set_include_path',
        178 => 'setcookie',
        179 => 'header',
        180 => 'headers_sent',
        181 => 'parse_ini_file',
        182 => 'is_uploaded_file',
        183 => 'move_uploaded_file',
        184 => 'intval',
        185 => 'floatval',
        186 => 'doubleval',
        187 => 'strval',
        188 => 'gettype',
        189 => 'is_null',
        190 => 'is_resource',
        191 => 'is_bool',
        192 => 'is_float',
        193 => 'is_int',
        194 => 'is_integer',
        195 => 'is_numeric',
        196 => 'is_string',
        197 => 'is_array',
        198 => 'is_object',
        199 => 'is_scalar',
        200 => 'is_callable',
        201 => 'pclose',
        202 => 'popen',
        203 => 'readfile',
        204 => 'rewind',
        205 => 'rmdir',
        206 => 'umask',
        207 => 'fclose',
        208 => 'feof',
        209 => 'fgets',
        210 => 'fread',
        211 => 'fopen',
        212 => 'fstat',
        213 => 'fflush',
        214 => 'fwrite',
        215 => 'fputs',
        216 => 'mkdir',
        217 => 'rename',
        218 => 'copy',
        219 => 'tempnam',
        220 => 'file',
        221 => 'file_get_contents',
        222 => 'file_put_contents',
        223 => 'stream_context_create',
        224 => 'stream_context_set_params',
        225 => 'stream_filter_append',
        226 => 'stream_filter_remove',
        227 => 'stream_socket_enable_crypto',
        228 => 'stream_get_contents',
        229 => 'flock',
        230 => 'stream_get_meta_data',
        231 => 'stream_set_timeout',
        232 => 'socket_set_timeout',
        233 => 'socket_get_status',
        234 => 'realpath',
        235 => 'fsockopen',
        236 => 'pack',
        237 => 'unpack',
        238 => 'opendir',
        239 => 'closedir',
        240 => 'chdir',
        241 => 'getcwd',
        242 => 'readdir',
        243 => 'glob',
        244 => 'filemtime',
        245 => 'fileperms',
        246 => 'filesize',
        247 => 'file_exists',
        248 => 'is_writable',
        249 => 'is_readable',
        250 => 'is_executable',
        251 => 'is_file',
        252 => 'is_dir',
        253 => 'is_link',
        254 => 'chmod',
        255 => 'touch',
        256 => 'clearstatcache',
        257 => 'disk_free_space',
        258 => 'mail',
        259 => 'openlog',
        260 => 'syslog',
        261 => 'closelog',
        262 => 'ob_start',
        263 => 'ob_flush',
        264 => 'ob_clean',
        265 => 'ob_end_clean',
        266 => 'ob_get_clean',
        267 => 'ob_get_contents',
        268 => 'ksort',
        269 => 'krsort',
        270 => 'asort',
        271 => 'sort',
        272 => 'usort',
        273 => 'uasort',
        274 => 'uksort',
        275 => 'array_walk',
        276 => 'array_walk_recursive',
        277 => 'count',
        278 => 'end',
        279 => 'next',
        280 => 'reset',
        281 => 'current',
        282 => 'key',
        283 => 'min',
        284 => 'max',
        285 => 'in_array',
        286 => 'array_search',
        287 => 'compact',
        288 => 'array_fill',
        289 => 'array_fill_keys',
        290 => 'range',
        291 => 'array_multisort',
        292 => 'array_push',
        293 => 'array_pop',
        294 => 'array_shift',
        295 => 'array_unshift',
        296 => 'array_splice',
        297 => 'array_slice',
        298 => 'array_merge',
        299 => 'array_merge_recursive',
        300 => 'array_replace_recursive',
        301 => 'array_keys',
        302 => 'array_values',
        303 => 'array_count_values',
        304 => 'array_reverse',
        305 => 'array_reduce',
        306 => 'array_pad',
        307 => 'array_flip',
        308 => 'array_change_key_case',
        309 => 'array_unique',
        310 => 'array_intersect',
        311 => 'array_intersect_key',
        312 => 'array_diff',
        313 => 'array_diff_key',
        314 => 'array_diff_assoc',
        315 => 'array_udiff_assoc',
        316 => 'array_sum',
        317 => 'array_filter',
        318 => 'array_map',
        319 => 'array_chunk',
        320 => 'array_combine',
        321 => 'array_key_exists',
        322 => 'version_compare',
        323 => 'stream_get_filters',
        324 => 'sys_get_temp_dir',
        325 => 'token_get_all',
        326 => 'xml_parser_create',
        327 => 'xml_parse_into_struct',
        328 => 'xml_get_error_code',
        329 => 'xml_error_string',
        330 => 'xml_get_current_byte_index',
        331 => 'xml_parser_free',
      ),
      'missed' => 
      array (
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_memory_limit' => 
  array (
    'title' => 'Предел памяти',
    'status' => true,
    'critical' => true,
    'value' => '268435456',
    'data' => 
    array (
      'memoryLimit' => '268435456',
      'memoryLimitMin' => '256M',
    ),
    'messageData' => 
    array (
      ':memoryLimit' => '268435456',
      ':memoryLimitMin' => '256M',
    ),
    'description' => '',
  ),
  'php_file_uploads' => 
  array (
    'title' => 'Загрузка файлов',
    'status' => true,
    'critical' => false,
    'value' => '1',
    'data' => 
    array (
      'file_uploads' => '1',
    ),
    'messageData' => 
    array (
      ':file_uploads' => '1',
    ),
    'description' => '',
  ),
  'php_pdo_mysql' => 
  array (
    'title' => 'Расширение PDO',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_upload_max_file_size' => 
  array (
    'title' => 'Предел размера загружаемого файла',
    'status' => true,
    'critical' => false,
    'value' => '2M',
    'data' => 
    array (
      'upload_max_filesize' => '2M',
    ),
    'messageData' => 
    array (
      ':upload_max_filesize' => '2M',
    ),
    'description' => '',
  ),
  'file_permissions' => 
  array (
    'title' => 'Права на файлы',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'mysql_version' => 
  array (
    'title' => 'Версия MySQL',
    'status' => true,
    'critical' => true,
    'value' => 'unknown',
    'data' => 
    array (
      'version' => 'unknown',
      'error' => '',
    ),
    'messageData' => 
    array (
      ':version' => 'unknown',
      ':error' => '',
    ),
    'description' => '',
  ),
  'php_gdlib' => 
  array (
    'title' => 'Расширение GDlib',
    'status' => true,
    'critical' => false,
    'value' => 'bundled (2.1.0 compatible)',
    'data' => 
    array (
      'version' => 'bundled (2.1.0 compatible)',
      'imagecreatefromjpeg' => true,
    ),
    'messageData' => 
    array (
      ':version' => 'bundled (2.1.0 compatible)',
      ':imagecreatefromjpeg' => true,
    ),
    'description' => '',
  ),
  'php_phar' => 
  array (
    'title' => 'Расширение Phar',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'https_bouncer' => 
  array (
    'title' => 'HTTPS баунсеры',
    'status' => true,
    'critical' => false,
    'value' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    'data' => 
    array (
      'version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'messageData' => 
    array (
      ':version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'description' => '',
  ),
  'xml_support' => 
  array (
    'title' => 'Поддержка XML расширений',
    'status' => true,
    'critical' => false,
    'value' => 'XML Parser, DOM/XML',
    'data' => 
    array (
      'extensions' => 
      array (
        0 => 'XML Parser',
        1 => 'DOM/XML',
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'doc_blocks_support' => 
  array (
    'title' => 'Поддержка DocBlocks',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'eAccelerator' => false,
    ),
    'messageData' => 
    array (
      ':eAccelerator' => false,
    ),
    'description' => '',
  ),
  'frame_options' => 
  array (
    'title' => 'X-Frame-Options',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'loopback_request' => 
  array (
    'title' => 'Loopback request',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
      'url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'messageData' => 
    array (
      ':url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'description' => '',
  ),
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:17 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
The specified database "xcart" not found


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:17 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
The database "xcart" successfully created.


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:18 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:18 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Проверка требований успешно завершена


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:18 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Requirements log
array (
  'config_file' => 
  array (
    'title' => 'Файл конфигурации',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'configPath' => '/var/www/xcart/etc/',
      'configFileName' => 'config.php',
      'defaultConfigFileName' => 'config.default.php',
    ),
    'messageData' => 
    array (
      ':configPath' => '/var/www/xcart/etc/',
      ':configFileName' => 'config.php',
      ':defaultConfigFileName' => 'config.default.php',
    ),
    'description' => '',
  ),
  'php_version' => 
  array (
    'title' => 'Версия PHP',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_disabled_functions' => 
  array (
    'title' => 'Отключенные функции',
    'status' => true,
    'critical' => false,
    'value' => '...',
    'data' => 
    array (
      'exists' => 
      array (
        0 => 'func_num_args',
        1 => 'func_get_arg',
        2 => 'func_get_args',
        3 => 'strlen',
        4 => 'strcmp',
        5 => 'strncmp',
        6 => 'strcasecmp',
        7 => 'strncasecmp',
        8 => 'each',
        9 => 'error_reporting',
        10 => 'define',
        11 => 'defined',
        12 => 'get_class',
        13 => 'get_called_class',
        14 => 'get_parent_class',
        15 => 'method_exists',
        16 => 'property_exists',
        17 => 'class_exists',
        18 => 'interface_exists',
        19 => 'function_exists',
        20 => 'get_included_files',
        21 => 'is_subclass_of',
        22 => 'is_a',
        23 => 'get_class_vars',
        24 => 'get_object_vars',
        25 => 'set_error_handler',
        26 => 'restore_error_handler',
        27 => 'set_exception_handler',
        28 => 'get_declared_classes',
        29 => 'get_resource_type',
        30 => 'extension_loaded',
        31 => 'debug_backtrace',
        32 => 'debug_print_backtrace',
        33 => 'strtotime',
        34 => 'date',
        35 => 'gmdate',
        36 => 'mktime',
        37 => 'strftime',
        38 => 'time',
        39 => 'getdate',
        40 => 'date_create',
        41 => 'date_default_timezone_set',
        42 => 'date_default_timezone_get',
        43 => 'preg_match',
        44 => 'preg_match_all',
        45 => 'preg_replace',
        46 => 'preg_replace_callback',
        47 => 'preg_split',
        48 => 'preg_quote',
        49 => 'preg_grep',
        50 => 'preg_last_error',
        51 => 'ctype_alpha',
        52 => 'ctype_digit',
        53 => 'filter_var',
        54 => 'filter_var_array',
        55 => 'hash_hmac',
        56 => 'json_encode',
        57 => 'json_decode',
        58 => 'spl_autoload_register',
        59 => 'spl_autoload_unregister',
        60 => 'spl_autoload_functions',
        61 => 'class_parents',
        62 => 'class_implements',
        63 => 'spl_object_hash',
        64 => 'iterator_to_array',
        65 => 'simplexml_load_file',
        66 => 'constant',
        67 => 'sleep',
        68 => 'flush',
        69 => 'htmlspecialchars',
        70 => 'htmlentities',
        71 => 'html_entity_decode',
        72 => 'get_html_translation_table',
        73 => 'sha1',
        74 => 'md5',
        75 => 'md5_file',
        76 => 'crc32',
        77 => 'getimagesize',
        78 => 'phpinfo',
        79 => 'phpversion',
        80 => 'substr_count',
        81 => 'strspn',
        82 => 'strcspn',
        83 => 'strtok',
        84 => 'strtoupper',
        85 => 'strtolower',
        86 => 'strpos',
        87 => 'stripos',
        88 => 'strrpos',
        89 => 'strrev',
        90 => 'nl2br',
        91 => 'basename',
        92 => 'dirname',
        93 => 'pathinfo',
        94 => 'stripslashes',
        95 => 'stripcslashes',
        96 => 'strstr',
        97 => 'stristr',
        98 => 'str_split',
        99 => 'substr',
        100 => 'substr_replace',
        101 => 'ucfirst',
        102 => 'lcfirst',
        103 => 'ucwords',
        104 => 'strtr',
        105 => 'addslashes',
        106 => 'addcslashes',
        107 => 'rtrim',
        108 => 'str_replace',
        109 => 'str_ireplace',
        110 => 'str_repeat',
        111 => 'chunk_split',
        112 => 'trim',
        113 => 'ltrim',
        114 => 'strip_tags',
        115 => 'explode',
        116 => 'implode',
        117 => 'join',
        118 => 'setlocale',
        119 => 'chr',
        120 => 'ord',
        121 => 'parse_str',
        122 => 'str_pad',
        123 => 'chop',
        124 => 'sprintf',
        125 => 'printf',
        126 => 'sscanf',
        127 => 'parse_url',
        128 => 'urlencode',
        129 => 'urldecode',
        130 => 'http_build_query',
        131 => 'unlink',
        132 => 'exec',
        133 => 'escapeshellcmd',
        134 => 'escapeshellarg',
        135 => 'rand',
        136 => 'srand',
        137 => 'mt_rand',
        138 => 'mt_srand',
        139 => 'getmypid',
        140 => 'base64_encode',
        141 => 'abs',
        142 => 'ceil',
        143 => 'floor',
        144 => 'round',
        145 => 'is_infinite',
        146 => 'pow',
        147 => 'log',
        148 => 'sqrt',
        149 => 'hexdec',
        150 => 'octdec',
        151 => 'dechex',
        152 => 'base_convert',
        153 => 'number_format',
        154 => 'getenv',
        155 => 'putenv',
        156 => 'microtime',
        157 => 'uniqid',
        158 => 'quoted_printable_encode',
        159 => 'set_time_limit',
        160 => 'get_magic_quotes_gpc',
        161 => 'get_magic_quotes_runtime',
        162 => 'error_log',
        163 => 'error_get_last',
        164 => 'call_user_func',
        165 => 'call_user_func_array',
        166 => 'serialize',
        167 => 'unserialize',
        168 => 'var_dump',
        169 => 'var_export',
        170 => 'print_r',
        171 => 'memory_get_usage',
        172 => 'memory_get_peak_usage',
        173 => 'register_shutdown_function',
        174 => 'ini_get',
        175 => 'ini_set',
        176 => 'get_include_path',
        177 => 'set_include_path',
        178 => 'setcookie',
        179 => 'header',
        180 => 'headers_sent',
        181 => 'parse_ini_file',
        182 => 'is_uploaded_file',
        183 => 'move_uploaded_file',
        184 => 'intval',
        185 => 'floatval',
        186 => 'doubleval',
        187 => 'strval',
        188 => 'gettype',
        189 => 'is_null',
        190 => 'is_resource',
        191 => 'is_bool',
        192 => 'is_float',
        193 => 'is_int',
        194 => 'is_integer',
        195 => 'is_numeric',
        196 => 'is_string',
        197 => 'is_array',
        198 => 'is_object',
        199 => 'is_scalar',
        200 => 'is_callable',
        201 => 'pclose',
        202 => 'popen',
        203 => 'readfile',
        204 => 'rewind',
        205 => 'rmdir',
        206 => 'umask',
        207 => 'fclose',
        208 => 'feof',
        209 => 'fgets',
        210 => 'fread',
        211 => 'fopen',
        212 => 'fstat',
        213 => 'fflush',
        214 => 'fwrite',
        215 => 'fputs',
        216 => 'mkdir',
        217 => 'rename',
        218 => 'copy',
        219 => 'tempnam',
        220 => 'file',
        221 => 'file_get_contents',
        222 => 'file_put_contents',
        223 => 'stream_context_create',
        224 => 'stream_context_set_params',
        225 => 'stream_filter_append',
        226 => 'stream_filter_remove',
        227 => 'stream_socket_enable_crypto',
        228 => 'stream_get_contents',
        229 => 'flock',
        230 => 'stream_get_meta_data',
        231 => 'stream_set_timeout',
        232 => 'socket_set_timeout',
        233 => 'socket_get_status',
        234 => 'realpath',
        235 => 'fsockopen',
        236 => 'pack',
        237 => 'unpack',
        238 => 'opendir',
        239 => 'closedir',
        240 => 'chdir',
        241 => 'getcwd',
        242 => 'readdir',
        243 => 'glob',
        244 => 'filemtime',
        245 => 'fileperms',
        246 => 'filesize',
        247 => 'file_exists',
        248 => 'is_writable',
        249 => 'is_readable',
        250 => 'is_executable',
        251 => 'is_file',
        252 => 'is_dir',
        253 => 'is_link',
        254 => 'chmod',
        255 => 'touch',
        256 => 'clearstatcache',
        257 => 'disk_free_space',
        258 => 'mail',
        259 => 'openlog',
        260 => 'syslog',
        261 => 'closelog',
        262 => 'ob_start',
        263 => 'ob_flush',
        264 => 'ob_clean',
        265 => 'ob_end_clean',
        266 => 'ob_get_clean',
        267 => 'ob_get_contents',
        268 => 'ksort',
        269 => 'krsort',
        270 => 'asort',
        271 => 'sort',
        272 => 'usort',
        273 => 'uasort',
        274 => 'uksort',
        275 => 'array_walk',
        276 => 'array_walk_recursive',
        277 => 'count',
        278 => 'end',
        279 => 'next',
        280 => 'reset',
        281 => 'current',
        282 => 'key',
        283 => 'min',
        284 => 'max',
        285 => 'in_array',
        286 => 'array_search',
        287 => 'compact',
        288 => 'array_fill',
        289 => 'array_fill_keys',
        290 => 'range',
        291 => 'array_multisort',
        292 => 'array_push',
        293 => 'array_pop',
        294 => 'array_shift',
        295 => 'array_unshift',
        296 => 'array_splice',
        297 => 'array_slice',
        298 => 'array_merge',
        299 => 'array_merge_recursive',
        300 => 'array_replace_recursive',
        301 => 'array_keys',
        302 => 'array_values',
        303 => 'array_count_values',
        304 => 'array_reverse',
        305 => 'array_reduce',
        306 => 'array_pad',
        307 => 'array_flip',
        308 => 'array_change_key_case',
        309 => 'array_unique',
        310 => 'array_intersect',
        311 => 'array_intersect_key',
        312 => 'array_diff',
        313 => 'array_diff_key',
        314 => 'array_diff_assoc',
        315 => 'array_udiff_assoc',
        316 => 'array_sum',
        317 => 'array_filter',
        318 => 'array_map',
        319 => 'array_chunk',
        320 => 'array_combine',
        321 => 'array_key_exists',
        322 => 'version_compare',
        323 => 'stream_get_filters',
        324 => 'sys_get_temp_dir',
        325 => 'token_get_all',
        326 => 'xml_parser_create',
        327 => 'xml_parse_into_struct',
        328 => 'xml_get_error_code',
        329 => 'xml_error_string',
        330 => 'xml_get_current_byte_index',
        331 => 'xml_parser_free',
      ),
      'missed' => 
      array (
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_memory_limit' => 
  array (
    'title' => 'Предел памяти',
    'status' => true,
    'critical' => true,
    'value' => '268435456',
    'data' => 
    array (
      'memoryLimit' => '268435456',
      'memoryLimitMin' => '256M',
    ),
    'messageData' => 
    array (
      ':memoryLimit' => '268435456',
      ':memoryLimitMin' => '256M',
    ),
    'description' => '',
  ),
  'php_file_uploads' => 
  array (
    'title' => 'Загрузка файлов',
    'status' => true,
    'critical' => false,
    'value' => '1',
    'data' => 
    array (
      'file_uploads' => '1',
    ),
    'messageData' => 
    array (
      ':file_uploads' => '1',
    ),
    'description' => '',
  ),
  'php_pdo_mysql' => 
  array (
    'title' => 'Расширение PDO',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'php_upload_max_file_size' => 
  array (
    'title' => 'Предел размера загружаемого файла',
    'status' => true,
    'critical' => false,
    'value' => '2M',
    'data' => 
    array (
      'upload_max_filesize' => '2M',
    ),
    'messageData' => 
    array (
      ':upload_max_filesize' => '2M',
    ),
    'description' => '',
  ),
  'file_permissions' => 
  array (
    'title' => 'Права на файлы',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'mysql_version' => 
  array (
    'title' => 'Версия MySQL',
    'status' => true,
    'critical' => true,
    'value' => '10.4.12',
    'data' => 
    array (
      'version' => '10.4.12',
      'innodb' => true,
    ),
    'messageData' => 
    array (
      ':version' => '10.4.12',
      ':innodb' => true,
    ),
    'description' => '',
  ),
  'php_gdlib' => 
  array (
    'title' => 'Расширение GDlib',
    'status' => true,
    'critical' => false,
    'value' => 'bundled (2.1.0 compatible)',
    'data' => 
    array (
      'version' => 'bundled (2.1.0 compatible)',
      'imagecreatefromjpeg' => true,
    ),
    'messageData' => 
    array (
      ':version' => 'bundled (2.1.0 compatible)',
      ':imagecreatefromjpeg' => true,
    ),
    'description' => '',
  ),
  'php_phar' => 
  array (
    'title' => 'Расширение Phar',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'https_bouncer' => 
  array (
    'title' => 'HTTPS баунсеры',
    'status' => true,
    'critical' => false,
    'value' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    'data' => 
    array (
      'version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'messageData' => 
    array (
      ':version' => 'libcurl 7.64.0, OpenSSL/1.1.1d',
    ),
    'description' => '',
  ),
  'xml_support' => 
  array (
    'title' => 'Поддержка XML расширений',
    'status' => true,
    'critical' => false,
    'value' => 'XML Parser, DOM/XML',
    'data' => 
    array (
      'extensions' => 
      array (
        0 => 'XML Parser',
        1 => 'DOM/XML',
      ),
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'doc_blocks_support' => 
  array (
    'title' => 'Поддержка DocBlocks',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
      'eAccelerator' => false,
    ),
    'messageData' => 
    array (
      ':eAccelerator' => false,
    ),
    'description' => '',
  ),
  'frame_options' => 
  array (
    'title' => 'X-Frame-Options',
    'status' => true,
    'critical' => true,
    'value' => '',
    'data' => 
    array (
    ),
    'messageData' => 
    array (
    ),
    'description' => '',
  ),
  'loopback_request' => 
  array (
    'title' => 'Loopback request',
    'status' => true,
    'critical' => false,
    'value' => '',
    'data' => 
    array (
      'url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'messageData' => 
    array (
      ':url' => 'https://www.x-cart.com/contact-us.htmlutm_source=XC5Install&amp;utm_medium=reqsFailure&amp;utm_campaign=XC5Install',
    ),
    'description' => '',
  ),
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:24 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'params' => 
  array (
    'mysqlhost' => 'mysql',
    'mysqlbase' => 'xcart',
    'mysqluser' => 'root',
    'mysqlpass' => '<specified>',
    'demo' => 'Y',
    'mysqlport' => '3306',
    'mysqlprefix' => 'xc_',
    'mysqlcharset' => 'utf8mb4',
    'xlite_http_host' => '192.168.0.13',
    'xlite_https_host' => '192.168.0.13',
    'date_default_timezone' => 'UTC',
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
    'requirements_success' => '1',
    'mysqlVersion' => '10.4.12',
  ),
  'go_back' => '0',
  'current' => '4',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:24 +0000]
[X-Cart v5.4.1.3]
[GET, HTTP/1.1] http://192.168.0.13:80/install.php?target=install&action=dirs
[nginx/1.17.10]
Debug info
array (
  'target' => 'install',
  'action' => 'dirs',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:25 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'ck_res' => '1',
  'params' => 
  array (
    'mysqlhost' => 'mysql',
    'mysqlbase' => 'xcart',
    'mysqluser' => 'root',
    'mysqlpass' => '<specified>',
    'demo' => 'Y',
    'mysqlport' => '3306',
    'mysqlprefix' => 'xc_',
    'mysqlcharset' => 'utf8mb4',
    'xlite_http_host' => '192.168.0.13',
    'xlite_https_host' => '192.168.0.13',
    'date_default_timezone' => 'UTC',
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
    'requirements_success' => '1',
    'mysqlVersion' => '10.4.12',
  ),
  'go_back' => '0',
  'current' => '5',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:31 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Debug info
array (
  'params' => 
  array (
    'mysqlhost' => 'mysql',
    'mysqlbase' => 'xcart',
    'mysqluser' => 'root',
    'mysqlpass' => '<specified>',
    'demo' => 'Y',
    'mysqlport' => '3306',
    'mysqlprefix' => 'xc_',
    'mysqlcharset' => 'utf8mb4',
    'xlite_http_host' => '192.168.0.13',
    'xlite_https_host' => '192.168.0.13',
    'date_default_timezone' => 'UTC',
    'login' => 'qwe@qwe.qwe',
    'password' => '<specified>',
    'new_installation' => '2',
    'requirements_success' => '1',
    'mysqlVersion' => '10.4.12',
  ),
  'go_back' => '0',
  'current' => '6',
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:37 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
inst_http_request() result
array (
  'url_request' => 'http://192.168.0.13/check/for/clean/urls.html',
  'adapter' => 'PEAR2\\HTTP\\Request\\Adapter\\Curl',
  'result' => 
  PEAR2\HTTP\Request\Response::__set_state(array(
     'code' => 404,
     'headers' => 
    PEAR2\HTTP\Request\Headers::__set_state(array(
       'iterationStyle' => 'lowerCase',
       'fields' => 
      array (
        'Server' => 'nginx/1.17.10',
        'Date' => 'Mon, 04 May 2020 16:23:37 GMT',
        'Content-Type' => 'text/html; charset=UTF-8',
        'Content-Length' => '154',
        'Connection' => 'keep-alive',
      ),
       'camelCase' => NULL,
       'lowerCase' => NULL,
    )),
     'cookies' => 
    array (
    ),
     'body' => '<html>
<head><title>404 Not Found</title></head>
<body>
<center><h1>404 Not Found</h1></center>
<hr><center>nginx/1.17.10</center>
</body>
</html>
',
     'scheme' => 'http',
     'host' => '192.168.0.13',
     'path' => '/check/for/clean/urls.html',
     'uri' => 'http://192.168.0.13/check/for/clean/urls.html',
     'port' => 80,
  )),
  'response' => '<html>
<head><title>404 Not Found</title></head>
<body>
<center><h1>404 Not Found</h1></center>
<hr><center>nginx/1.17.10</center>
</body>
</html>
',
  'error' => NULL,
)

--------------------------------------------------------------------
[Mon, 04 May 20 16:23:37 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Файл установки переименован в install.de80470e813aec8162a9e048979a5710.php


--------------------------------------------------------------------
[Mon, 04 May 20 16:23:38 +0000]
[X-Cart v5.4.1.3]
[POST, HTTP/1.1] http://192.168.0.13:80/install.php
[nginx/1.17.10]
Установка завершена
