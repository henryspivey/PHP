<?php
/**
 * Main Entry point into the Validate Email Web App
 *
 * This app has a form with an email address on it. When the form is
 * submitted the form is draw again, but beneath it is displayed the
 * last email submitted and whether or not it was valid.
 */
namespace cs174\email_validator;

require_once "src/controllers/EmailController.php";
// defines for various namespaces
define("NS_BASE", "cs174\\email_validator\\");
define(NS_BASE . "NS_CONTROLLERS", "cs174\\email_validator\\controllers\\");
define(NS_BASE . "NS_VIEWS", "cs174\\email_validator\\views\\");
$allowed_controllers = ["email"];
//determine controller for request
if (!empty($_REQUEST['c']) && in_array($_REQUEST['c'], $allowed_controllers)) {
    $controller_name = NS_CONTROLLERS . ucfirst($_REQUEST['c']). "Controller";
} else {
    $controller_name = NS_CONTROLLERS . "EmailController";
}
//instatiate controller for request
$controller = new $controller_name();
//process request
$controller->processRequest();
