<?php
include('inc/header.php');
   if(empty($_SESSION['username'])){
       header("Location:login.php");
   }else{
      /* $full_name=$_SESSION['full_name'];echo$full_name;
       $username=$_SESSION['username'];echo$full_name;
       $user_type=$_SESSION['user_type'];echo$user_type;

       //$user_type=super_admin
       //$user_type=school_admin
       //$user_type=school_teacher

       $institute_id=$_SESSION['institute_id'];echo$institute_id;
       $user_id=$_SESSION['user_id'];echo$user_id;
       $designation=$_SESSION['designation'];echo$designation;*/
   }

    if(isset($_GET['page'])){
        switch($_GET["page"]){
            case "students":
                include 'views/add_student.php';
                break;
            case "view_students":
                include 'views/view_students.php';
                break;
            case "institute_reg":
                include 'views/institute_registration.php';
                break;
            case "institute_view":
                include 'views/institute_view.php';
                break;
            case "operator":
                include 'views/user_registration.php';
                break;
            case "view_operator":
                include 'views/view_users.php';
                break;
            case "fingerprint":
                include 'views/assign_fingerprint.php';
                break;
            case "attendance":
                include 'views/attendance_view.php';
                break;
            case "logout":
                include 'views/logout.php';
                break;
            default:
                include 'views/home_content.php';
                break;
        }
    }else
        include 'views/home_content.php';


	include('inc/footer.php');
?>
