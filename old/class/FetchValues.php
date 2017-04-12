<?php require_once('DBConfig.php');

class FetchValues{

    public function getAllInstitute(){
        $dbObj = new DBConfig();

        try {
            $stmt = $dbObj->returnConnection()->prepare("SELECT * FROM ". $dbObj->institute_info_table);
            $stmt->execute();
            #$rowNo=$stmt->rowCount();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            return "<br>Error: "+ $e->getMessage();
        }
    }

    public function getAllUsers(){
        $dbObj = new DBConfig();

        try {
            $stmt = $dbObj->returnConnection()->prepare("SELECT * FROM ". $dbObj->user_table);
            $stmt->execute();
            #$rowNo=$stmt->rowCount();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            return "<br>Error: ". $e->getMessage();
        }
    }

    public function checkLogin($username,$password){
        $dbObj = new DBConfig();
        try
        {
            $stmt = $dbObj->returnConnection()->prepare("SELECT * FROM user_table WHERE username='$username' AND password='$password' AND activate_status=1 LIMIT 1");
            $stmt->execute(array(':username'=>$username, ':password'=>$password));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                session_start();
                $_SESSION['full_name'] = $userRow['full_name'];
                $_SESSION['username'] = $userRow['username'];
                $_SESSION['designation'] = $userRow['designation'];
                $_SESSION['user_type'] = $userRow['user_type'];
                $_SESSION['user_id'] = $userRow['user_id'];
                $_SESSION['institute_id'] = $userRow['institute_id'];
                return 1;

            }else {
                return 2;
            }
            $conn=null;
        } catch (Exception $e) {
            return "<br>Error: ". $e->getMessage();
        }
    }

}