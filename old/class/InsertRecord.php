<?php
require_once('DBConfig.php');
    class InsertRecord{


        public function instituteInfo($institute_name, $eiin_number, $institute_type,
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
                return 1;
            } catch (Exception $e) {
                echo $e->getMessage();
                return 2;
            }
        }

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

        public function setStudentInfo($full_name, $class, $std_section, $std_roll, $std_group, $birth_date,
                                       $std_shift, $image, $gender, $religion, $father_name, $father_occupation,
                                       $father_phone, $mother_name, $mother_occupation, $local_guardian, $local_phone,
                                       $local_occupation, $present_house_no, $present_road_no, $present_thana, $present_district,
                                       $permanent_house_no, $permanent_road_no, $permanent_thana, $permanent_district)
        {
            $dbObject = new DBConfig();
            try {
                $stmt = $dbObject->returnConnection()->prepare("INSERT INTO $dbObject->student_info_table (
                full_name, class, std_section, std_roll, std_group, birth_date,std_shift, image, gender,
                religion, father_name, father_occupation,father_phone, mother_name, mother_occupation,
                local_guardian, local_phone,local_occupation, present_house_no, present_road_no, present_thana,
                present_district,permanent_house_no, permanent_road_no, permanent_thana, permanent_district)

                VALUES(:full_name, :class, :std_section, :std_roll, :std_group, :birth_date, :std_shift, :image, :gender,
                :religion, :father_name, :father_occupation, :father_phone, :mother_name, :mother_occupation,
                :local_guardian, :local_phone, :local_occupation, :present_house_no, :present_road_no, :present_thana,
                :present_district, :permanent_house_no, :permanent_road_no, :permanent_thana, :permanent_district)");
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

                $stmt->execute();
                return 1;
            } catch (Exception $e) {
                echo $e->getMessage();
                return 2;
            }
        }







    }
?>