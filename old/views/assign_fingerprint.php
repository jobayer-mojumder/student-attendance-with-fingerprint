<?php
include_once("class/InsertRecord.php");
include_once("class/Config.php");
$config = new Config();
$insertObj = new InsertRecord();
$status=0;


if(isset($_POST['reg_submit'])) {

    $institute_name = $_POST['institute_name'];
    $eiin_number = $_POST['eiin_number'];
    $institute_type = $_POST['institute_type'];
    $weekend = $_POST['weekend'];
    $contact_number = $_POST['contact_number'];
    $house_no = $_POST['house_no'];
    $road_no = $_POST['road_no'];
    $thana = $_POST['thana'];
    $district = $_POST['district'];

    $status = $insertObj->instituteInfo($institute_name,
        $eiin_number, $institute_type, $weekend, $contact_number, $house_no, $road_no, $thana, $district);

    //echo $status;

}


?>


<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Assign Student!</h3>
            </div>
            <div class="module-body">



                <?php
                if($status==1)
                    $config->getSuccessMsg("Institute Added! Successfully");
                else if($status == 2) $config->getErrorMsg("Institute not Added!");
                ?>


                <br />


                <form class="form-horizontal row-fluid" action="" method="post">


                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="reg_submit" class="btn">Submit Form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div><!--/.content-->
</div><!--/.span9-->
