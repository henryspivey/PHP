<?php

namespace CS174\Hw3\src\controllers;
require 'Controller.php';




include getcwd().'/src/models/db.php';
use dbconnect as DB;
// echo \DB\connectToDB::connect();
/**
 * The default controller for the web app
 */
class LoginController extends Controller
{
    /**
     * Used to handle form data coming from LoginView.
     * Should sanitize that data and check if the email within it was
     * valid.
     */
    
    function processRequest(){
      $conn = DB\connectToDB::connect();
      session_start();
      // If form submitted, insert values into the database.
      if (isset($_POST['username'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      //$username = stripslashes($username);
      //$username = mysqli_real_escape_string($username);
      $password = stripslashes($password);
      $password = mysqli_real_escape_string($password);
      //Checking is user existing in the database or not
      $query = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
      $result = mysqli_query($conn, $query);
      $rows = mysqli_num_rows($result);
      if($rows==1){
          header("Location: index.php"); // Redirect user to index.php
          exit();
          $_SESSION['username'] = $username;
      }else{
        echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
      }
      
      } else {
        $data = [];
        $data['username'] = $this->sanitize("string","string");
        $this->view("login")->render($data);
      }
    }
}

