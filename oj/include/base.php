<?php
require_once('hu.config.php');
require_once('mysql.php');
session_start();
class base{
    var $DB;
    function __construct(){
        $this->DB = new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }
}