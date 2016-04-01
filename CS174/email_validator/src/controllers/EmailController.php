<?php
/**
 * EmailController.php
 * (C) 2016 Chris Pollett
 */
namespace cs174\email_validator\controllers;

require_once "Controller.php";
/**
 * The default controller for the Email Validator Web App
 */
class EmailController extends Controller
{
    /**
     * Used to handle form data coming from EmailView.
     * Should sanitize that data and check if the email within it was
     * valid.
     */
    function processRequest()
    {
        $data = [];
        $data["PREVIOUS_EMAIL"] = $this->sanitize("email", "email");
        $data["PREVIOUS_EMAIL_VALID"] = $this->validate("email", "email");
        // Need to get the type of data
        $this->view("email")->render($data);
    }
}
