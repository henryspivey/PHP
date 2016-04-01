<?php

namespace soloRider\hw3\controllers;
require_once "Controller.php";

class CreateAccountController extends Controller {

    /**
     * Used to handle form data coming from EmailView.
     * Should sanitize that data and check if the email within it was
     * valid.
     */

    function processRequest() {
        $data = [];


          // If form submitted, insert values into the database.
          $conn = $this->connect();
          if (isset($_REQUEST['username'])){
            
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $username = stripslashes($username);
            $email = stripslashes($email);
            $query = "INSERT into users (username, password, email) VALUES ('$username', '".md5($password)."', '$email')";
            $result = $conn -> query($query);
            if($result){
                echo "<form method='post' action='index.php'><h3>You are registered successfully.</h3><br/><input type='submit' class='buttonLink' name='signIn' value='Sign In'/></form>";

            } else {
                echo "something went wrong" . $query . " " . $conn->error;
            }
          } else {
            
            $data['username'] = $this->sanitize("username","string");
            $data['email'] = $this->sanitize("email", "email");
            $this->view("createAccount")->render($data);
          }

    }
}
