<?php
 
class DB_Connect {
 
    // constructeur
    function __construct() {
 
    }
 
    // destructeur
    function __destruct() {
        
    }
 
    // Connection à la bd
    public function connect() {
        require_once 'config.php';
        // connection à la bd
        $con = mysql_connect("localhost", "root", "");
        // selection db
        mysql_select_db("gcm");
 
        // retour
        return $con;
    }
 
    // fermer connexion
    public function close() {
        mysql_close();
    }
 
} 
?>