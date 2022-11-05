<?php
class Database {
    private $host_name;
    private $user_name;
    private $password;
    private $database_name;

    public function connect() {

        $this->host_name="localhost";
        $this->user_name="root";
        $this->password="";
        $this->database_name="wt_sales_inventory";        
        $conn= new mysqli($this->host_name,$this->user_name,$this->password,$this->database_name);
        return $conn;
    }
}
?>