<?php
    include_once("class/InsertRecord.php");
    include_once("class/Config.php");
    $config = new Config();
    $insertObj = new InsertRecord();
    $status=0;


    if(isset($_POST['user_reg_submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $designation = $_POST['designation'];
        $institute_id = 1;          // from session after login
        $user_type = $_POST['user_type'];
        $imageref = "None";
        $activate_status = 1;       // Activate

        $status = $insertObj->setUserInfo($username,$password,$full_name,$designation,$institute_id,$user_type, $imageref,$activate_status  );
    }


?>


<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>User Registration!</h3>
            </div>
            <div class="module-body">



                <?php
                    if($status==1)
                        $config->getSuccessMsg("User Added! Successfully");
                    else if($status == 2) $config->getErrorMsg("User not Added!");
                ?>


                <br />


                <form class="form-horizontal row-fluid" action="" method="post">
                    <div class="control-group">
                        <label class="control-label" for="full_name">Full Name</label>
                        <div class="controls">
                            <input type="text"  id="full_name" placeholder="" value="" class="span8"  name= "full_name" required="required">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="designation">Designation</label>
                        <div class="controls">
                            <input type="text"  id="designation" placeholder="" value="" class="span8"  name= "designation" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phone">Phone</label>
                        <div class="controls">
                            <input type="text"  id="phone" placeholder="" value="" class="span8"  name= "phone" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="user_type">User Type</label>
                        <div class="controls">
                            <input type="text"  id="user_type" placeholder="" value="" class="span8"  name= "user_type" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="username">Username</label>
                        <div class="controls">
                            <input type="text"  id="username" placeholder="" value="" class="span8"  name= "username" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password"  id="password" placeholder="" value="" class="span8"  name= "password" required="required">
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="user_reg_submit" class="btn">Registration</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div><!--/.content-->
</div><!--/.span9-->
