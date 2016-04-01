<?php

namespace soloRider\hw3\controllers;
require_once "Controller.php";
require_once "auth.php";

class ImageRatingController extends Controller {

  function processRequest() {
      $data = [];
      
      // code for gathering photos from db
      ini_set('display_errors',1);
      error_reporting(E_ALL);
      

      $data['UPLOADED_FILE'] = $this->sanitize("imageFile", "file");
      $data['UPLOADED_FILE_VALID'] = $this->validate("imageFile", "file");

      $this->view("imageRating")->render($data);
  }
}
