<?php
    require_once('class/FetchValues.php');
    $specificClassObj = new FetchValues();
    $class=$_POST['std_class'];
    $section=$_POST['std_section'];
    $group=$_POST['std_group'];
    $shift=$_POST['std_shift'];
    $year=$_POST['year'];
    $month=$_POST['month'];
    $result=$specificClassObj->getSpecificClassStudentDetail($class,$section,$group,$shift);
    //print_r($result);
?>
<div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0"
           class="datatable-1 table table-bordered table-striped	 display"
           width="100%">
        <thead>
        <tr>
            <th>
                Full Name
            </th>

        </tr>
        </thead>
        <tbody>

        <?php foreach ($result as $user) {

            ?>

        <tr class="gradeA">
            <td>
                <div class=" pull-left" style="width:17%;padding-right: 50px">
                    <?php echo$user['full_name'];?>
                </div>
                <div class="pull-left">

                   <?php
                   $result=$specificClassObj->getSingleAttendance($user['std_id'],$year,$month);
                    //print_r ($result);
                   $present_counter=0;
                   for($i=1;$i<=31;$i++){
                       $temp=0;
                       if($i%10==0){
                           echo'<br>';
                       }
                       foreach ($result as $time) {
                           $tempArr= explode("-", $time['time']);
                           $temp=$tempArr[1];
                           if ($temp==$i){
                               $present_counter++;
                               echo '<button class="btn-small btn-success">' . $i . '</button>';
                               break;
                           }
                           else{
                               $temp++;
                           }
                       }

                       echo '<button class="btn-small btn-danger">' . $i . '</button>';
                   }


                    ?>

                </div>
                <div class="pull-left"  style="padding-left: 30px">
                    <p>Total Absent: <?php echo$present_counter?></p>
                    <p>Total Present <?php echo(31-$present_counter);?></p>
                </div>



            </td>
        </tr>

        <?php } ?> </tr>
        </tbody>
    </table>
</div>
