<?php
require_once('class/FetchValues.php');
require_once('class/InsertRecord.php');
require_once('class/Config.php');
$fetchObj = new FetchValues();
$insertObj = new InsertRecord();
$config=new Config();
$status=0;


if (isset($_POST['student_reg_submit'])) {
    $full_name = $_POST['full_name'];
    $class = $_POST['class'];
    $std_section = $_POST['std_section'];
    $std_roll = $_POST['std_roll'];
    $std_group = $_POST['std_group'];
    $birth_date = $_POST['birth_date'];
    $std_shift = $_POST['std_shift'];
    $image = "";
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $father_phone = $_POST['father_phone'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];
    $mother_phone = $_POST['mother_phone'];
    $local_guardian = $_POST['local_guardian'];
    $local_phone = $_POST['local_phone'];
    $local_occupation = $_POST['local_occupation'];

    $present_house_no = $_POST['present_house_no'];
    $present_road_no = $_POST['present_road_no'];
    $present_thana = $_POST['present_thana'];
    $present_district = $_POST['present_district'];

    $permanent_house_no = $_POST['permanent_house_no'];
    $permanent_road_no = $_POST['permanent_road_no'];
    $permanent_thana = $_POST['permanent_thana'];
    $permanent_district = $_POST['permanent_district'];

    $status = $insertObj->setStudentInfo($full_name, $class, $std_section, $std_roll, $std_group, $birth_date, $std_shift, $image, $gender, $religion, $father_name,
        $father_occupation, $father_phone, $mother_name, $mother_occupation, $local_guardian, $local_phone, $local_occupation, $present_house_no, $present_road_no,
        $present_thana, $present_district, $permanent_house_no, $permanent_road_no, $permanent_thana, $permanent_district);

}



?>

<!--/.span3-->
<div class="span9">
<div class="content">
<div class="module-head">
    <h3>Add Student!</h3>
</div>
<form class="form-horizontal row-fluid" action="" method="post">
<div class="module">

<?php
if($status==1)
    $config->getSuccessMsg("User Added! Successfully");
else if($status == 2) $config->getErrorMsg("User not Added!");
?>

<div class="card">
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                              data-toggle="tab">Basic Information</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Guardian
            Information</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                               data-toggle="tab">Present Address</a></li>
</ul>

<!-- Tab panes -->

<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="home">
    <div class="control-group">
        <label class="control-label" for="full_name">Full Name</label>

        <div class="controls">
            <input type="text" id="full_name" placeholder="" value="" class="span8"
                   name="full_name" required="required">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="section">Section</label>

        <div class="controls">
            <select id="std_section" name="std_section" tabindex="1" data-placeholder="Select here.."
                    class="span8">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="class">Class</label>

        <div class="controls">
            <select id="class" name="class" tabindex="1" data-placeholder="Select here.."
                    class="span8">
                <option>Select</option>
                <option selected="selected">11</option>
                <option>12</option>
            </select>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="std_roll">Student Roll</label>

        <div class="controls">
            <input type="text" id="std_roll" placeholder="" value="" class="span8"
                   name="std_roll" required="required">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="full_name">Group</label>

        <div class="controls">
            <select id="group" name="std_group" tabindex="1" data-placeholder="Select here.."
                    class="span8">
                <option>Select</option>
                <option selected="selected">Science</option>
                <option>Arts</option>
                <option>Commerce</option>
                <option>None</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="gender">Gender</label>

        <div class="controls">
            <select id="gender" name="gender" tabindex="1" data-placeholder="Select here.."
                    class="span8">
                <option>Select</option>
                <option selected="selected">Male</option>
                <option>Female</option>

            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="shift">Shift</label>

        <div class="controls">
            <select id="shift" name="std_shift" tabindex="1" data-placeholder="Select here.."
                    class="span8">
                <option>none</option>
                <option>Morning</option>
                <option>Day</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="date_of_birth">Date Of Birth</label>

        <div class="controls">
            <input type="date" id="date_of_birth" placeholder="" value="" class="span8"
                   name="birth_date">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="religion">Religion</label>

        <div class="controls">
            <select id="religion" name="religion" tabindex="1" data-placeholder="Select here.."
                    class="span8">
                <option selected="selected">Islam</option>
                <option>Hindu</option>
                <option>Christian</option>
                <option>Buddhis</option>
                <option>Other</option>
            </select>
        </div>
    </div>


</div>
<div role="tabpanel" class="tab-pane" id="profile">
    <div class="control-group">
        <label class="control-label" for="fathersName">Fathers Name</label>

        <div class="controls">
            <input type="text" id="fathersName" placeholder="" value="" class="span8"
                   name="father_name">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="father_occupation">Father's Occupation</label>

        <div class="controls">
            <input type="text" id="father_occupation" placeholder="" value="" class="span8"
                   name="father_occupation">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="father_phone">Phone Number</label>

        <div class="controls">
            <input type="text" id="father_phone" placeholder="" value="" class="span8"
                   name="father_phone">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="mothers_name">Mothers Name</label>

        <div class="controls">
            <input type="text" id="mothers_name" placeholder="" value="" class="span8"
                   name="mother_name">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="mother_occupation">Mothers Occupation</label>

        <div class="controls">
            <input type="text" id="mother_occupation" placeholder="" value="" class="span8"
                   name="mother_occupation">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="mother_phone">Mother's Phone Number</label>

        <div class="controls">
            <input type="text" id="mother_phone" placeholder="" value="" class="span8"
                   name="mother_phone">
        </div>
    </div>
    <hr>
    Local Guardians Information
    <div class="control-group">
        <label class="control-label" for="local_guardian">LOcal Guardian's Name</label>

        <div class="controls">
            <input type="text" id="local_guardian" placeholder="" value="" class="span8"
                   name="local_guardian">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="local_occupation">Local Guardian's Occupation</label>

        <div class="controls">
            <input type="text" id="local_occupation" placeholder="" value="" class="span8"
                   name="local_occupation">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="local_phone">Local Guardian's Phone Number</label>

        <div class="controls">
            <input type="text" id="local_phone" placeholder="" value="" class="span8"
                   name="local_phone">
        </div>
    </div>

</div>

<div role="tabpanel" class="tab-pane" id="messages">
    <div class="control-group">
        <label class="control-label" for="present_house_no">House No</label>

        <div class="controls">
            <input type="text" id="present_house_no" placeholder="" value="" class="span8"
                   name="present_house_no">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="present_road_no">Road No</label>

        <div class="controls">
            <input type="text" id="present_road_no" placeholder="" value="" class="span8"
                   name="present_road_no">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="present_thana">Thana</label>

        <div class="controls">
            <input type="text" id="present_thana" placeholder="" value="" class="span8"
                   name="present_thana">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="present_district">District</label>

        <div class="controls">
            <input type="text" id="present_district" placeholder="" value="" class="span8"
                   name="present_district">
        </div>
    </div>
    <hr>
    Permanent Address
    <div class="control-group">
        <label class="control-label" for="permanent_house_no">House No</label>

        <div class="controls">
            <input type="text" id="permanent_house_no" placeholder="" value="" class="span8"
                   name="permanent_house_no">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="permanent_road_no">Road No</label>

        <div class="controls">
            <input type="text" id="permanent_road_no" placeholder="" value="" class="span8"
                   name="permanent_road_no">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="permanent_thana">Thana</label>

        <div class="controls">
            <input type="text" id="permanent_thana" placeholder="" value="" class="span8"
                   name="permanent_thana">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="permanent_district">Permanent District</label>

        <div class="controls">
            <input type="text" id="permanent_district" placeholder="" value="" class="span8"
                   name="permanent_district">
        </div>
    </div>
</div>
</br>
<div class="control-group">
    <div class="controls">
        <button type="submit" name="student_reg_submit" class="btn">Student Registration</button>
    </div>
</div>
</div>
</div>
</div>

</form>
</div>
<!--/.content-->
</div>

<!--/.span9-->

