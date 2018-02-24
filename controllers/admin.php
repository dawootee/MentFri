<?php

/**
 * Class Dashboard
 */
class Admin extends Controller {


    public $pages = ['dashboard' => 'Dashboard', 'users' => 'Users', 'posts' => 'Posts'];


    public function __construct($action) {
      parent::__construct();

      $user_defined_functions = get_class_methods($this);
      foreach($user_defined_functions as $user_defined_function) {
        if(strpos($user_defined_function, "mf_") !== false) {
          $user_defined_function_url = $user_defined_function;
          $user_defined_function = preg_replace("/_/", " ", $user_defined_function);
          $user_defined_function = explode(" ", $user_defined_function);
          foreach($user_defined_function as &$user_defined_function_words) {
            unset($user_defined_function[0]);
            $user_defined_function_words[0] = strtoupper($user_defined_function_words[0]);
          }
          $user_defined_function = array_values($user_defined_function);
          $user_defined_function = implode(" ", $user_defined_function);
          $this->pages[$user_defined_function_url] = $user_defined_function;
        }
      }



      if($action !== "__construct") {
        return $this->{$action}();
      } else {
        $this->dashboard();
      }


    }

    public function dashboard() {
      $this->view('dashboard');
    }

    public function login() {
      $this->view('login');
    }

    public function users() {
      $users = $this->model('User');
      $data = $users->getUsers();
      $this->view('users', $data);
    }


    public function posts() {
      $posts = $this->model('Post');
      $data = $posts->getPosts();
      $this->view('posts', $data);
    }

    public function mf_user_defined_1() {
      $this->view('mf_user_defined_1');
    }

    public function mf_user_defined_2() {
      $this->view('mf_user_defined_2');
    }


}
