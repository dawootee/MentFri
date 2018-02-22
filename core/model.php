<?php


class Model {

    private $db_host = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "mf";

    public $mysqli;

    /**
     * Model constructor.
     */
    public function __construct() {
        $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
    }

}