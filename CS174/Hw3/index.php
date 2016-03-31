<?php
/**
 * Main Entry point into the Validate Email Web App
 *
 * This app has a form with an email address on it. When the form is
 * submitted the form is draw again, but beneath it is displayed the
 * last email submitted and whether or not it was valid.
 */
namespace CS174\Hw3\src;

require_once "src/controllers/LoginController.php";
// defines for various namespaces
define("NS_BASE", "CS174\\Hw3\\src\\");
define(NS_BASE . "NS_CONTROLLERS", "CS174\\Hw3\\src\\controllers\\");
define(NS_BASE . "NS_VIEWS", "CS174\\Hw3\\src\\views\\");
$allowed_controllers = ["login"];
//determine controller for request
if (!empty($_REQUEST['c']) && in_array($_REQUEST['c'], $allowed_controllers)) {
    $controller_name = NS_CONTROLLERS . ucfirst($_REQUEST['c']). "Controller";
} else {
    $controller_name = NS_CONTROLLERS . "LoginController";
}
//instatiate controller for request
$controller = new $controller_name();
//process request
$controller->processRequest();