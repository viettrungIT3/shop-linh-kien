<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



defined("SHORT_DATE_FORMAT")                        OR define("SHORT_DATE_FORMAT"  , "m/d/Y");
defined("TIME_FORMAT")                              OR define("TIME_FORMAT", "g:i a T");
defined("LONG_DATE_FORMAT")                         OR define("LONG_DATE_FORMAT", "l, F jS, Y g:i:s A");
defined("LOG_DATE_FORMAT")                          OR define("LOG_DATE_FORMAT", "l, F jS, Y g:i:s A");
defined("NOTE_DATE_FORMAT")                         OR define("NOTE_DATE_FORMAT", "m/d/Y h:i");
defined("DB_DATE_FORMAT")                           OR define("DB_DATE_FORMAT", "Y-m-d");
defined("DB_DATE_FORMAT_LONG")                      OR define("DB_DATE_FORMAT_LONG", "Y-m-d h:i:s");


defined('API_VERSION')                              OR define('API_VERSION'         , $_ENV['API_VERSION'] ?? "");
defined("APP_VERSION")                              OR define("APP_VERSION"         , $_ENV['APP_VERSION'] ?? "1.0.0");
defined("ASSETS_VERSION")                           OR define("ASSETS_VERSION"      , $_ENV['ASSETS_VERSION'] ?? "r001");




defined("ASSETS_PATH")                              OR define("ASSETS_PATH", $_ENV['ASSETS_PATH']);
defined("LOG_PATH")                                 OR define("LOG_PATH", $_ENV['LOG_PATH'] ?? "");
defined("ROOT_PATH")                                 OR define("ROOT_PATH", $_ENV['ROOT_PATH'] ?? "");


defined("SENDGRID_API_KEY")                                 OR define("SENDGRID_API_KEY", $_ENV['SENDGRID_API_KEY'] ?? "");

defined("SENDGRID_TEMPLATE_ID")                                 OR define("SENDGRID_TEMPLATE_ID", $_ENV['SENDGRID_TEMPLATE_ID'] ?? "");

define("EMAIL_SENDGRID_FROM", $_ENV['EMAIL_SENDGRID_FROM'] ?? "");

defined("BASE_URL")                                 OR define("BASE_URL", $_ENV['BASE_URL'] ?? "");
defined("META_DEFAULT_PAGE_TITLE")  OR define("META_DEFAULT_PAGE_TITLE", $_ENV['DEFAULT_PAGE_TITLE'] ?? "");

defined("DF_NUM_ROWS")                      OR define("DF_NUM_ROWS", 25);


defined("LIST_SORT_ASC")                    OR define("LIST_SORT_ASC"                   , "asc");

defined("DF_SORT_DIR")                      OR define("DF_SORT_DIR"                     , LIST_SORT_ASC);

defined("MAX_NUM_ROWS")                             OR define("MAX_NUM_ROWS", 999999);
defined("LIST_SORT_DESC")                   OR define("LIST_SORT_DESC"                  , "desc");


define("USE_TWO_WAY_AUTH", $_ENV['USE_TWO_WAY_AUTH'] ?? "");
defined("OTP_CODE_PATH")                         OR define("OTP_CODE_PATH", ROOT_PATH ."/"."hash"."/");
