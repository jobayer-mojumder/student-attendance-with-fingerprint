<?php
require_once('DBConfig.php');
    class InsertRecord{

        // recording institute information
        public function setInstituteInfo($institute_name, $eiin_number, $institute_type,
                                      $weekend, $contact_number, $house_no, $road_no, $thana, $district)
        {
            $dbObject = new DBConfig();
            $activate_status = 1;   // activate
            try {
                $stmt = $dbObject->returnConnection()->prepare("INSERT INTO $dbObject->institute_info_table (institute_name, eiin_number,institute_type,
                weekend, contact_num, house_no, road_no, thana, district, activate_status)
                VALUES (:institute_name, :eiin_number, :institute_type,
                :weekend, :contact_num, :house_no, :road_no, :thana, :district, :activate_status)");
                $stmt->bindParam(':institute_name', $institute_name);
                $stmt->bindParam(':eiin_number', $eiin_number);
                $stmt->bindParam(':institute_type', $institute_type);
                $stmt->bindParam(':weekend', $weekend);
                $stmt->bindParam(':contact_num', $contact_number);
                $stmt->bindParam(':house_no', $road_no);
                $stmt->bindParam(':road_no', $house_no);
                $stmt->bindParam(':thana', $thana);
                $stmt->bindParam(':district', $district);
                $stmt->bindParam(':activate_status', $activate_status);

                $stmt->execute();
                $institute_id = $dbObject->returnConnection()->lastInsertId();
                $usertype="school_admin";
                $designation="school_admin";
                // creating institute user
                $check=$this->setSchoolAdmin($institute_name,$designation,$institute_id,$contact_number,$usertype,$activate_status);
                if($check==1){
                    return 3;
                }else{
                    return 1;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                return 2;
            }
        }
        // recording user information
        public function setUserInfo($username, $password, $full_name, $designation, $institute_id, $user_type, $imageref, $activate_status)
        {
            $dbObject = new DBConfig();
            try {
                $stmt = $dbObject->returnConnection()->prepare("INSERT INTO $dbObject->user_table (
                username, password, full_name, designation, institute_id, user_type, imageref, activate_status)
                VALUES (:username, :password, :full_name, :designation, :institute_id, :user_type, :imageref, :activate_status)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':full_name', $full_name);
                $stmt->bindParam(':designation', $designation);
                $stmt->bindParam(':institute_id', $institute_id);
                $stmt->bindParam(':user_type', $user_type);
                $stmt->bindParam(':imageref', $imageref);
                $stmt->bindParam(':activate_status', $activate_status);
                $stmt->execute();
                return 1;
            } catch (Exception $e) {
                echo $e->getMessage();
                return 2;

            }
        }


        public function editFingerPrint($id, $text)
        {
            $dbObject = new DBConfig();
            try {
                $stmt = $dbObject->returnConnection()->prepare("UPDATE $dbObject->student_info_table set fingerPrintId = :text WHERE std_id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':text', $text);
                $stmt->execute();
                return 1;
            } catch (Exception $e) {
                echo $e->getMessage();
                return 2;
            }
        }

        // adding student record into database
        public function setStudentInfo($full_name, $class, $std_section, $std_roll, $std_group, $birth_date,
                                       $std_shift, $image, $gender, $religion, $father_name, $father_occupation,
                                       $father_phone, $mother_name, $mother_occupation, $local_guardian, $local_phone,
                                       $local_occupation, $present_house_no, $present_road_no, $present_thana, $present_district,
                                       $permanent_house_no, $permanent_road_no, $permanent_thana, $permanent_district)
        {
            $school_id=$_SESSION['institute_id'];
            $student_status=1;
            $dbObject = new DBConfig();

            $stmt = $dbObject->returnConnection()->prepare("SELECT * FROM $dbObject->student_info_table WHERE class  = '$class' AND
                std_section = '$std_section' AND std_group='$std_group' AND std_roll = '$std_roll' AND std_shift = '$std_shift'");

            $stmt->execute();
            if($stmt->rowCount() >0){
                return 3;
            }
            else if($local_phone == '' || $std_roll=='' || $father_name=='' || $mother_name=='' || $local_guardian==''){
                return 4;
            }
            else{
            try {
                $stmt = $dbObject->returnConnection()->prepare("INSERT INTO $dbObject->student_info_table (
                full_name, class, std_section, std_roll, std_group, birth_date,std_shift, image, gender,
                religion, father_name, father_occupation,father_phone, mother_name, mother_occupation,
                local_guardian, local_phone,local_occupation, present_house_no, present_road_no, present_thana,
                present_district,permanent_house_no, permanent_road_no, permanent_thana, permanent_district,student_status, school_id)

                VALUES(:full_name, :class, :std_section, :std_roll, :std_group, :birth_date, :std_shift, :image, :gender,
                :religion, :father_name, :father_occupation, :father_phone, :mother_name, :mother_occupation,
                :local_guardian, :local_phone, :local_occupation, :present_house_no, :present_road_no, :present_thana,
                :present_district, :permanent_house_no, :permanent_road_no, :permanent_thana, :permanent_district,:student_status, :school_id)");
                $stmt->bindParam(':full_name', $full_name);
                $stmt->bindParam(':class', $class);
                $stmt->bindParam(':std_section', $std_section);
                $stmt->bindParam(':std_roll', $std_roll);
                $stmt->bindParam(':std_group', $std_group);
                $stmt->bindParam(':birth_date', $birth_date);
                $stmt->bindParam(':std_shift', $std_shift);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':religion', $religion);
                $stmt->bindParam(':father_name', $father_name);
                $stmt->bindParam(':father_occupation', $father_occupation);
                $stmt->bindParam(':father_phone', $father_phone);
                $stmt->bindParam(':mother_name', $mother_name);
                $stmt->bindParam(':mother_occupation', $mother_occupation);
                $stmt->bindParam(':local_guardian', $local_guardian);
                $stmt->bindParam(':local_phone', $local_phone);
                $stmt->bindParam(':local_occupation', $local_occupation);
                $stmt->bindParam(':present_house_no', $present_house_no);
                $stmt->bindParam(':present_road_no', $present_road_no);
                $stmt->bindParam(':present_thana', $present_thana);
                $stmt->bindParam(':present_district', $present_district);
                $stmt->bindParam(':permanent_house_no', $permanent_house_no);
                $stmt->bindParam(':permanent_road_no', $permanent_road_no);
                $stmt->bindParam(':permanent_thana', $permanent_thana);
                $stmt->bindParam(':permanent_district', $permanent_district);
                $stmt->bindParam(':student_status', $student_status);
                $stmt->bindParam(':school_id', $school_id);

                $stmt->execute();
                return 1;
            } catch (Exception $e) {
                echo $e->getMessage();
                return 2;
            }
         }
        }

        // creating institute users
        public function setSchoolAdmin($full_name,$designation,$institute_id,$phone,$user_type,$activate_status){
            include_once('class/ConfirmationMessage.php');
            $sentMail=new MailSent();
            $username=$user_type."00".$institute_id;
            $password=$user_type."00".$institute_id;
            $imageref="";
            $dbObject = new DBConfig();
            
            try {
                $stmt = $dbObject->returnConnection()->prepare("INSERT INTO $dbObject->user_table (
                username, password, full_name, designation, institute_id, user_type, imageref,phone, activate_status)
                VALUES (:username, :password, :full_name, :designation, :institute_id, :user_type, :imageref, :phone, :activate_status)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':full_name', $full_name);
                $stmt->bindParam(':designation', $designation);
                $stmt->bindParam(':institute_id', $institute_id);
                $stmt->bindParam(':user_type', $user_type);
                $stmt->bindParam(':imageref', $imageref);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':activate_status', $activate_status);
                $stmt->execute();
                $sentMail->sentMessage($full_name,$phone,$username,$password);
                return 1;
            } catch (Exception $e) {
                echo $e->getMessage();
                return 2;
            }

        }


    }
?>
