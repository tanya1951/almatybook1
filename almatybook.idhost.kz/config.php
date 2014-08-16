<?php
define ('DEBUG', 0);
define ('ALWAYS_PASS_CAPTCHA', 0);
define ('_MODULES_CONFIGURATION_BASE_PATH', dirname(__FILE__));
define ('_MODULES_CONFIGURATION_SITE_PATH', _MODULES_CONFIGURATION_BASE_PATH);
define ('_MODULES_CONFIGURATION_INCLUDE_PATH', dirname(__FILE__) . '/include');
define ('_MODULES_CONFIGURATION_TEMPLATE_CACHE_CONTROL', '?template=av-075&colorScheme=green&header=&button=buttons1');
define ('_MODULES_CONFIGURATION_SITE_API_PATH', _MODULES_CONFIGURATION_SITE_PATH.'/data/settings/api.php');
define ('_MODULES_CONFIGURATION_SITE_PASSWORD_PATH', _MODULES_CONFIGURATION_SITE_PATH.'/data/settings/pwd.php');
define ('_MODULES_CONFIGURATION_SITE_LANG', 'ru_RU');
define ('_MODULES_CONFIGURATION_STORAGE_ATTACH_PATH', 'data/storage/attachments');
define ('_MODULES_CONFIGURATION_STORAGE_TYPE', 'publish');
define ('_MODULES_CONFIGURATION_TMP_PATH', _MODULES_CONFIGURATION_BASE_PATH.'/data/tmp');
define ('_MODULES_CONFIGURATION_TMP_URL', 'data/tmp/');
define ('_MODULES_CONFIGURATION_SETTINGS_PATH', _MODULES_CONFIGURATION_SITE_PATH.'/data/settings');
define ('_MODULES_CONFIGURATION_SETTINGS_ATTACHMENTS_BASE_URL', '');
$_configurationModulesInstance = array (
	'xjlgnsj4pry' => array (
		'TRANSPORT' => 'direct',
		'STORAGE_ATTACHMENTS_BASE_URL' => '',
		'STORAGE_BASE_PATH' => _MODULES_CONFIGURATION_BASE_PATH,
		'STORAGE_DB_DSN' => 'sqlite:///'._MODULES_CONFIGURATION_BASE_PATH.'/data/storage/sb_modules.php',
		'MODULE_NAME' => 'Статистика',
		'VERSION' => '4.5.0',
		'REQUIRED_API_VERSION' => '4.5.0',
	),
	'hgmso6268ch' => array (
		'TRANSPORT' => 'direct',
		'STORAGE_ATTACHMENTS_BASE_URL' => '',
		'STORAGE_BASE_PATH' => _MODULES_CONFIGURATION_BASE_PATH,
		'STORAGE_DB_DSN' => 'sqlite:///'._MODULES_CONFIGURATION_BASE_PATH.'/data/storage/sb_modules.php',
		'MODULE_NAME' => 'Галерея изображений',
		'VERSION' => '4.5.0',
		'REQUIRED_API_VERSION' => '4.5.0',
	),
);
define ('LOCALE_DECIMAL_POINT', ',');
define ('LOCALE_MONETARY_UNIT_CODE', 'RUB');
define ('LOCALE_CURRENCY_SYMBOL_LEFT', '');
define ('LOCALE_CURRENCY_SYMBOL_RIGHT', 'р.');
define ('LOCALE_DATE_FORMAT', 'd.m.Y');
define ('LOCALE_TIME_FORMAT', 'H:i:s');
define ('LOCALE_WEEK_BEGIN', '1');
?>