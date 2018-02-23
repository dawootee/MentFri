<?php


/**
 * Class Controller
 */
class Controller {

  public $stylesheets;
  public $scripts;

  public function __construct() {
    if(!isset($this->stylesheets) && !isset($this->scripts)) {
      $this->stylesheets = new stdClass();
      $this->scripts = new stdClass();
    }
    $this->stylesheets->admin = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css',
        ROOT_URL . 'views/assets/css/style.css'
    ];
    $this->scripts->admin = [
        "https://code.jquery.com/jquery-3.2.1.min.js",
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js",
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
    ];
    $this->stylesheets->public = [];
    $this->scripts->public = [];
  }


  public function header($phase) {
    if(isset($phase)) {
      if(is_array($phase)) {
        foreach($phase as &$type) {
          $stylesheets = $this->stylesheets->{$type};
          if(isset($stylesheets)) {
            foreach ($stylesheets as $stylesheet) {
              echo '<link rel="stylesheet" href="' . $stylesheet . '" />';
            }
          }
        }
      } else if(is_string($phase)) {
        $stylesheets = $this->stylesheets->{$phase};
        if(isset($stylesheets)) {
          foreach ($stylesheets as $stylesheet) {
            echo '<link rel="stylesheet" href="' . $stylesheet . '" />';
          }
        }
      }
    }
  }

  public function footer($phase) {
    if(isset($phase)) {
      if(is_array($phase)) {
        foreach($phase as &$type) {
          $scripts = $this->scripts->{$type};
          if(isset($scripts)) {
            foreach ($scripts as $script) {
              echo '<script src="' . $script . '"></script>';
            }
          }
        }
      } else if(is_string($phase)) {
        $scripts = $this->scripts->{$phase};
        if(isset($scripts)) {
          foreach ($scripts as $script) {
            echo '<script src="' . $script . '"></script>';
          }
        }
      }
    }
  }

    /**
     * @param $model
     * @return mixed
     */
    public function model($model) {
        require_once(ROOT_PATH . 'models/' . strtolower($model) . '.php');
        return new $model;
    }

    /**
     * @param $view
     * @param null $data
     * @return mixed
     */
    public function view($view, $data = null) {

      return require_once(ROOT_PATH . 'views/' . strtolower($view) . '.php');
    }

}
