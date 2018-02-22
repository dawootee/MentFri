<?php

/**
 * Class Main
 */
class Main extends Controller {

    /**
     * Main constructor.
     */
    public function __construct() {
      parent::__construct();
      require_once(realpath(__DIR__ . '/../template/preferences.php'));
      $this->view('../template/index');
    }



}
