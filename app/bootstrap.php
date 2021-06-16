<?php
declare(strict_types=1);
error_reporting(E_ALL & ~ E_NOTICE);

//use Pecee\SimpleRouter\SimpleRouter;
require __DIR__ . '/../vendor/autoload.php';
// Load config
require __DIR__ . '/config/config.php';

//require __DIR__ . '/routes.php';

//spl_autoload_register('loadHelpers');
require __DIR__ . '/helpers/mime_type_helper.php';
require __DIR__ . '/helpers/url_helper.php';
require __DIR__ . '/helpers/download_helper.php';
require __DIR__ . '/helpers/session_helper.php';
require __DIR__ . '/helpers/date_helper.php';
require __DIR__ . '/helpers/menu_helper.php';
//require __DIR__ . '/helpers/routes_helper.php';


/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

//SimpleRouter::setDefaultNamespace('\Demo\controllers');

// Start the routing
//SimpleRouter::start();


//require_once 'helpers/show_process.html';
// For easy error decoding when in production mode.
// Error reporting should be set to 1 while developing and testing
// For easy error decoding when in production mode.
// Error reporting should be set to 1 while developing and testing
\Tracy\Debugger::enable();
// Autoload Core Libraries
// This works when loading classes from different directories.
// Vendor autoload function and spl_autoload seems to create problems when used together.
function autoLoader ($className) {
    if (file_exists(__DIR__. '/libraries/'.$className.'.php')) {
        require __DIR__. '/libraries/' . $className . '.php';
    }
}
spl_autoload_register('autoLoader');



