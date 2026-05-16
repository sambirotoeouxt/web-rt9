<?php
/**
 * CodeIgniter
 * Open source web application framework
 * Website: http://codeigniter.com
 */
define('BASEPATH', dirname(__FILE__) . '/');
if (realpath($system_path) !== FALSE)
{
    $system_path = realpath($system_path).'/';
}
else
{
    $system_path = str_replace("\\", "/", $system_path).'/';
}
if (!is_dir($system_path))
{
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct it: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
define('SYSDIR', str_replace("\\", "/", BASEPATH.'system/'));
define('APPPATH', BASEPATH.'application/');
define('VIEWPATH', APPPATH.'views/');
require_once BASEPATH.'system/core/CodeIgniter.php';
?>