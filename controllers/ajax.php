<?php

class AJAX extends Controller {

  public function __construct($action) {
    parent::__construct();

    if($_SERVER["REQUEST_METHOD"] === "POST") {
      return $this->{$action}();
    } else {
      echo "Return error";
    }



  }


  public function checkLogin() {
      echo "Checking...";
    }

}
