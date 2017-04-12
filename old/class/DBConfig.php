<?php

class DBConfig {

    public  $user_table = "user_table";
    public  $institute_info_table = "institute_info";
    public  $student_info_table = "student_info_table";

    private $conn ="";
    function __construct(){
        ob_start();
        $servername = "localhost";
        $Dbusername = "root";
        $Dbpassword = "";
        $db="attendance_management";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $Dbusername, $Dbpassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            #echo "Connected successfully";
           $this->conn = $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    function returnConnection(){
        return $this->conn;
    }





} 