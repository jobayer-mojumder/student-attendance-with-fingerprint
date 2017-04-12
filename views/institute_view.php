<?php
require_once('class/FetchValues.php');
$fetchObj = new FetchValues();

//print_r( $fetchObj->getAllInstitute());


?>

<!--/.span3-->
<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>
                    DataTables</h3>
            </div>
            <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0"
                       class="datatable-1 table table-bordered table-striped	 display"
                       width="100%">
                    <thead>
                    <tr>
                        <th>
                            Institute Name
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Weekend
                        </th>
                        <th>
                            Contact Number
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Password
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Del
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($fetchObj->getAllInstitute() as $institutes) { ?>

                        <tr class="gradeA">
                            <td>
                                <?php echo $institutes['institute_name']; ?>
                            </td>
                            <td>
                                <?php echo $institutes['institute_type']; ?>
                            </td>
                            <td>
                                <?php echo $institutes['weekend']; ?>
                            </td>
                            <td class="center">
                                <?php echo $institutes['contact_num']; ?>
                            </td>
                            <td class="center">
                                <?php echo $institutes['contact_num']; ?>
                            </td>
                            <td class="center">
                                <?php echo $institutes['contact_num']; ?>
                            </td>
                            <td class="center">
                                <?php
                                    if($institutes['activate_status']==1){
                                        echo'Activate';
                                    }else{
                                        echo"Deactivate";
                                    }
                                ?>
                            </td>
                            <td class="center">
                               <a href="#">Activate</a>
                            </td>
                            <td class="center">
                                <a href="#">Deactivate</a>
                            </td>
                        </tr>

                    <?php } ?> </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.content-->
</div>

<!--/.span9-->

