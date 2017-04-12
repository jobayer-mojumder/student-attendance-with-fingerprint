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


    public function viewStudent($institute_id){
        $dbObj = new DBConfig();

        try {
            $stmt = $dbObj->returnConnection()->prepare("SELECT * FROM ". $dbObj->student_info_table." WHERE school_id=".$institute_id);
            $stmt->execute();
            #$rowNo=$stmt->rowCount();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            return "<br>Error: "+ $e->getMessage();
        }
    }


    public function getAllUsers($institute_id){
        $dbObj = new DBConfig();

        try {
            $stmt = $dbObj->returnConnection()->prepare("SELECT * FROM ". $dbObj->user_table." WHERE institute_id =".$institute_id);
            $stmt->execute();
            #$rowNo=$stmt->rowCount();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            return "<br>Error: ". $e->getMessage();
        }
    }


    public function fingerAssignView($std_class, $std_section, $std_group, $std_shift,$institute_id){

        $dbObj = new DBConfig();
        try {

            $stmt = $dbObj->returnConnection()->prepare("SELECT * FROM $dbObj->student_info_table WHERE class  = '$std_class' AND std_section = '$std_section' AND std_group = '$std_group' AND std_shift = '$std_shift'
                      AND school_id='$institute_id'");
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
            return 3;
            //return "<br>Error: ". $e->getMessage();
        }
    }

    public function singleStudentInfo($fingerprintId){
        $dbObj = new DBConfig();
        //activate_status=1
        try
        {
            $statement = $dbObj->returnConnection()->prepare("SELECT std_id,full_name, local_guardian,local_phone,student_status,school_id FROM ".$dbObj->student_info_table." WHERE fingerPrintId='$fingerprintId' LIMIT 1");
            $statement->execute();
            #$rowNo=$stmt->rowCount();

            return $statement;
        } catch (Exception $e) {
            return 0;
            //return "<br>Error: ". $e->getMessage();
        }
    }

    public function getSpecificClassStudentDetail($class,$section,$group,$shift){
        $dbObj = new DBConfig();

        try {
            $stmt = $dbObj->returnConnection()->prepare("SELECT * FROM ". $dbObj->student_info_table." WHERE class ='".$class."' AND std_section= '".$section."' AND std_group = '".$group."' AND std_shift = '".$shift."'");
            $stmt->execute();
            #$rowNo=$stmt->rowCount();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            return "<br>Error: ". $e->getMessage();
        }
    }


    public function getSingleAttendance($student_id,$year,$month){
        $dbObj = new DBConfig();
        //activate_status=1
        $time=$month."-".$year;
        try
        {
            $statement = $dbObj->returnConnection()->prepare("SELECT time FROM ".$dbObj->student_attendance_table."
             WHERE std_id='$student_id' AND type='O' AND time like '%$time'");
            $statement->execute();
            #$rowNo=$stmt->rowCount();
            $result = $statement->fetchall();
            return $result;
        } catch (Exception $e) {
            return 0;
            //return "<br>Error: ". $e->getMessage();
        }
    }

}