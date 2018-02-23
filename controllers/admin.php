<?php

/**
 * Class Dashboard
 */
class Admin extends Controller {

    /**
     * Dashboard constructor.
     */
    public function __construct($action) {
      parent::__construct();

        if($action !== "__construct") {
          return $this->{$action}();
        } else {
          $this->view('dashboard');
        }

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

}
