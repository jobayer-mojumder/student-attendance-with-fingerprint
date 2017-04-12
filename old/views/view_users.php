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
                <h3>All Users </h3>
            </div>
            <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0"
                       class="datatable-1 table table-bordered table-striped	 display"
                       width="100%">
                    <thead>
                    <tr>
                        <th>
                            Full Name
                        </th>
                        <th>
                            Designation
                        </th>
                        <th>
                            Institute Id
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Password
                        </th>
                        <th>
                            Active
                        </th>
                        <th>
                            Del
                        </th>
                        <th>
                            Edit
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($fetchObj->getAllUsers() as $user) { ?>

                        <tr class="gradeA">
                            <td>
                                <?php echo $user['full_name']; ?>
                            </td>
                            <td>
                                <?php echo $user['designation']; ?>
                            </td>
                            <td>
                                <?php echo $user['institute_id']; ?>
                            </td>
                            <td class="center">
                                <?php echo $user['phone']; ?>
                            </td>
                            <td class="center">
                                <?php echo $user['username']; ?>
                            </td>
                            <td class="center">
                                <?php echo $user['password']; ?>
                            </td>
                            <td class="center">
                                <?php echo $user['activate_status']; ?>
                            </td>
                            <td class="center">
                               Del
                            </td>
                            <td class="center">
                                Edit
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

