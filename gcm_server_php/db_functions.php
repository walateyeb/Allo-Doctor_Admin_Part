<?php

class DB_Functions {

    private $db;

    
    // constructeur
    function __construct() {
        include_once './db_connect.php';
        // connection à la bd
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructeur
    function __destruct() {
        
    }

    
    public function storeUser($name, $email, $gcm_regid) {
        // insertion visiteur à la bd
        $result = mysql_query("INSERT INTO gcm_users(name, email, gcm_regid, created_at) VALUES('$name', '$email', '$gcm_regid', NOW()) ON DUPLICATE KEY UPDATE `name`='".$name."', gcm_regid = '".$gcm_regid."', created_at = NOW()");
        
        if ($result) {
           
            $id = mysql_insert_id(); 
            $result = mysql_query("SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
           
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUserByEmail($email) {
        $result = mysql_query("SELECT * FROM gcm_users WHERE email = '$email' LIMIT 1");
        return $result;
    }

    public function getAllUsers() {
        $result = mysql_query("select * FROM gcm_users");
        return $result;
    }

    
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from gcm_users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
           
            return true;
        } else {
           
            return false;
        }
    }

}

?>