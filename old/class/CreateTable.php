<?php require_once('DBConfig.php');
class CreateTable
{
    //Create Users Table
    function createUsers()
    {
        $dbObj = new DBConfig();

        try {
            $dbObj->returnConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE IF NOT EXISTS $dbObj->user_table (
                        user_id INT AUTO_INCREMENT PRIMARY KEY,
                        username VARCHAR(255) UNIQUE,
                        password VARCHAR(100),
                        full_name VARCHAR(100),
                        designation VARCHAR(100),
                        institute_id INT,
                        imageref VARCHAR(255),
                        phone VARCHAR(50) ,
                        user_type VARCHAR(100),
                        activate_status INT,
                        regtime TIMESTAMP
                        )";
            $dbObj->returnConnection()->exec($sql);
            print("Created  user_table Table.\n");
        } catch (Exception $e) {
            echo "<br>User_table". $e->getMessage();
        }
    }

    //Create Institute Table
    function createInstitute()
    {
        try {
            $dbObj = new DBConfig();

            $dbObj->returnConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $table_create = "CREATE TABLE IF NOT EXISTS $dbObj->institute_info_table(
                school_id INT AUTO_INCREMENT PRIMARY KEY,
                institute_name VARCHAR(100),
                eiin_number VARCHAR(20),
                institute_type VARCHAR(20),
                weekend VARCHAR(10),
                contact_num VARCHAR(15),
                house_no VARCHAR(20),
                road_no VARCHAR(20),
                thana VARCHAR(50),
                district VARCHAR(20),
                activate_status VARCHAR(20),
                reg_time DATETIME DEFAULT CURRENT_TIMESTAMP)";

                $dbObj->returnConnection()->exec($table_create);
                 echo "institute_info Table created successfully";
             }
             catch(PDOException $e)
             {
                 echo  "<br> Institute_info " . $e->getMessage();
             }
         }

    public function createStudentInfoTable()
    {
        try {
            $dbObj = new DBConfig();

            $dbObj->returnConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $table_create="CREATE TABLE IF NOT EXISTS $dbObj->student_info_table(
                std_id INT AUTO_INCREMENT PRIMARY KEY,
                full_name VARCHAR(30) NOT NULL,
                class VARCHAR(25),
                std_section VARCHAR(7),
                std_roll int,
                std_group VARCHAR(20),
                birth_date date,
                std_shift VARCHAR(10),
                image VARCHAR(100),
                gender VARCHAR(7),
                religion VARCHAR(20),
                father_name VARCHAR(32),
                father_occupation VARCHAR(32),
                father_phone VARCHAR(32),
                mother_name VARCHAR(64),
                mother_occupation VARCHAR(32),
                mother_phone VARCHAR(32),
                local_guardian VARCHAR(50),
                local_occupation VARCHAR(30),
                local_phone VARCHAR(15),

                permanent_house_no VARCHAR(32),
                permanent_road_no VARCHAR(32),
                permanent_thana VARCHAR(64),
                permanent_district VARCHAR(64),

                present_house_no VARCHAR (255),
                present_road_no VARCHAR (255),
                present_thana VARCHAR (255),
                present_district VARCHAR (255),

                student_status INT(2),
                fingerPrintId VARCHAR(50),
                reg_time DATETIME DEFAULT CURRENT_TIMESTAMP,
                school_id int NOT NULL,

                FOREIGN KEY (school_id) REFERENCES institute_info (school_id)
                )";
            // use exec() because no results are returned
            $dbObj->returnConnection()->exec($table_create);
            echo "student_info Table created successfully";
        }
        catch(PDOException $e)
        {
            echo $table_create . "<br> student_info " . $e->getMessage();
        }
    }


}
?>