<?php

require_once('./globals.php');

class PdoManager{
    public $basename;

    public function __construct()
    {
        $this->basename = $GLOBALS['basename'];
    }

    public function serverConnection(){
        try{
            $db = new PDO("mysql:host=localhost", $GLOBALS['username'], $GLOBALS['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (Exception $e) {
            die('Erreur connect server: ' . $e->getMessage());
        }
        return $db;
    }

    protected function baseConnection(){
        try {
            $pdoConnect = new PDO("mysql:host=" . $GLOBALS['servername'] . ";dbname=" . $this->basename . ";charset=utf8", $GLOBALS['username'], $GLOBALS['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur connect base: ' . $e->getMessage());
        }
        return $pdoConnect;
    }
}