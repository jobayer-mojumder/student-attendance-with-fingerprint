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

        $status = $insertObj->setInstituteInfo($institute_name,$eiin_number,
            $institute_type, $weekend, $contact_number, $house_no, $road_no, $thana, $district);


    }


?>


<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Add Institute!</h3>
            </div>
            <div class="module-body">

                <?php
                    if($status==1)
                        $config->getSuccessMsg("Institute Added! Successfully");
                    else if($status == 2) $config->getErrorMsg("Institute not Added!");
                    else if($status == 3) $config->getSuccessMsg("Institute User Created!");
                ?>

                <br />


                <form class="form-horizontal row-fluid" action="" method="post">
                    <div class="control-group">
                        <label class="control-label" for="InstituteName">Institute Name</label>
                        <div class="controls">
                            <input type="text"  id="InstituteName" placeholder="" value="" class="span8"  name= "institute_name" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="EIINNumber">EIIN Number</label>
                        <div class="controls">
                            <input type="text"  id="EIINNumber" placeholder="" value="" class="span8"  name= "eiin_number" required="required">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="InstituteType">Institute Type</label>
                        <div class="controls">
                            <select id="InstituteType" name="institute_type" tabindex="1" data-placeholder="Select here.." class="span8">
                                <option value="PrimarySchool">Primary School</option>
                                <option value="HighSchool">High School</option>
                                <option value="College">College</option>
                                <option value="JuniorHighSchool">Junior High School</option>
                                <option value="SchoolAndCollege">School And College</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Weekend">Weekend</label>
                        <div class="controls">
                            <select id="Weekend" name="weekend" tabindex="1" data-placeholder="Select here.." class="span8">
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                            </select>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="ContactNumber">Contact Number</label>
                        <div class="controls">
                            <input type="text"  id="ContactNumber" placeholder="" value="" class="span8"  name= "contact_number" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="HouseNo">House No</label>
                        <div class="controls">
                            <input type="text"  id="HouseNo" placeholder="" value="" class="span8"  name= "house_no" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="RoadNo">Road No</label>
                        <div class="controls">
                            <input type="text"  id="RoadNo" placeholder="" value="" class="span8"  name= "road_no" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="Thana">Thana</label>
                        <div class="controls">
                            <input type="text"  id="Thana" placeholder="" value="" class="span8"  name= "thana" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="district">District</label>
                        <div class="controls">
                            <input type="text"  id="district" placeholder="" value="" class="span8"  name= "district" required="required">
                        </div>
                    </div>


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
