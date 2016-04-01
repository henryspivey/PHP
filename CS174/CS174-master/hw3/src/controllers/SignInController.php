<?php

namespace soloRider\hw3\controllers;
require_once "Controller.php";

class SignInController extends Controller {

    function processRequest() {
        $data = [];
        $conn = $this->connect();
        session_start();
        // If form submitted, insert values into the database.
        if (isset($_REQUEST['username'])){
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            $username = stripslashes($username);
            $password = stripslashes($password);

            //Checking is user existing in the database or not
            $query = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
            $result = mysqli_query($conn, $query);
            $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['username'] = $username;
                header("Location: index.php"); // Redirect user to index.php
                exit();
            }else{
                echo "<form method='post' action='index.php'><h3>Username/password is incorrect.</h3><br/><input type='submit' class='buttonLink' name='signIn' value='Sign In'/></form>";
            }
        } else {
            $data['username'] = $this->sanitize("username","string");
            $this->view("signIn")->render($data);
        }
        
    }
}
