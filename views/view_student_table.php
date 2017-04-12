<?php
    require_once('class/FetchValues.php');
    $fetchObj = new FetchValues();
?>
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
                    Name
                </th>
                <th>
                    Class
                </th>
                <th>
                    Section
                </th>
                <th>
                    Roll
                </th>
                <th>
                    Group
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fetchObj->viewStudent($_SESSION['institute_id']) as $student) { ?>
                <tr class="gradeA">
                    <td>
                        <?php echo $student['full_name']; ?>
                    </td>
                    <td>
                        <?php echo $student['class']; ?>
                    </td>
                    <td>
                        <?php echo $student['std_section']; ?>
                    </td>
                    <td class="center">
                        <?php echo $student['std_roll']; ?>
                    </td>
                    <td class="center">
                        <?php echo $student['std_group']; ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


