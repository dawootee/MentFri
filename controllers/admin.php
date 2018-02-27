<?php

/**
 * Class Dashboard
 */
class Admin extends Controller {


    public $pages = ['dashboard' => 'Dashboard', 'posts' => 'Posts', 'users' => 'Users'];


    public function __construct($action, $parameters = []) {
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
        return $this->{$action}($parameters);
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


    public function posts($actions = []) {

      if(empty($actions)) {
        $posts = $this->model('Post');
        $data = $posts->getPosts();
        $this->view("posts-list", $data);
      } else {
        foreach($actions as $action) {
          if($action === "new") {
            $this->view('posts-new');
          } else {
            echo "Not found";
          }
        }
      }


    }

    public function users($actions = []) {

      if(empty($actions)) {
        $users = $this->model('User');
        $data = $users->getUsers();
        $this->view("users-list", $data);
      } else {
        foreach($actions as $action) {
          if($action === "new") {
            $this->view('users-new');
          } else {
            echo "Not found";
          }
        }
      }


    }

    public function mf_user_defined_1() {
      $this->view('mf_user_defined_1');
    }

    public function mf_user_defined_2() {
      $this->view('mf_user_defined_2');
    }


}
