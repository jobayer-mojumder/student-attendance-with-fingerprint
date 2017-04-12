<?php $year=date('Y');
echo $year;?>


<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Assign Fingerprint!</h3>
            </div>
            <div class="module-body">
                <br />
                <form class="form-inline  container-fluid" method="post">
                    <div class="row">
                        <div class="pull-left marginleft3">
                            <label class="control-label" for="class">Class</label>
                            <div class="controls">
                                <select name="std_class" tabindex="1" data-placeholder="Select here.."
                                        class="span2">
                                    <option selected="selected">11</option>
                                    <option>12</option>
                                </select>
                            </div>
                        </div>

                        <div class="pull-left marginleft3">
                            <label class="control-label" for="section">Section</label>
                            <div class="controls">
                                <select name="std_section" tabindex="1" data-placeholder="Select here.."
                                        class="span2">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>
                        <div class="pull-left marginleft3">
                            <label class="control-label" for="group">Group</label>
                            <div class="controls">
                                <select name="std_group" tabindex="1" data-placeholder="Select here.."
                                        class="span2">
                                    <option selected="selected">Science</option>
                                    <option>Arts</option>
                                    <option>Commerce</option>
                                    <option>None</option>
                                </select>
                            </div>
                        </div>
                        <div class="pull-left marginleft3">
                            <label class="control-label" for="shift">Shift</label>
                            <div class="controls">
                                <select name="std_shift" tabindex="1" data-placeholder="Select here.."
                                        class="span2">
                                    <option>none</option>
                                    <option>Morning</option>
                                    <option>Day</option>
                                </select>
                            </div>
                        </div>
                        <div class="pull-left marginleft3">
                            <label class="control-label" for="month">Month</label>
                            <div class="controls">
                                <select name="month" tabindex="1" data-placeholder="Select here.."
                                        class="span2">
                                    <option value="Jan">January</option>
                                    <option value="Feb">February</option>
                                    <option value="Mar">March</option>
                                    <option value="Apr">April</option>
                                    <option value="May">May</option>
                                    <option value="Jun">June</option>
                                    <option value="Jul">July</option>
                                    <option value="Aug">August</option>
                                    <option value="Sep">September</option>
                                    <option value="Oct">October</option>
                                    <option value="Nov">November</option>
                                    <option value="Dec">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="pull-left marginleft3">
                            <label class="control-label" for="year">Year</label>
                            <div class="controls">
                                <select name="year" tabindex="1" data-placeholder="Select here.."
                                        class="span2">
                                    <option><?php echo $year; ?></option>
                                    <option><?php echo $year-1; ?> </option>
                                    <option><?php echo $year-2; ?></option>
                                    <option><?php echo $year-3; ?></option>
                                    <option><?php echo $year-4; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="pull-left marginleft3">

                            <br><div class="control" style="margin-top: 6px;">
                                <button class="btn btn-primary" type="submit" name="btn_search" id="btn_search">Search</button>
                            </div>

                        </div>

                    </div><br>
                    <hr>
                </form>
                <?php if(isset($_POST['btn_search'])) {
                    include "views/attendance_view_table.php";
                }?>
            </div>
        </div>
    </div><!--/.content-->
</div><!--/.span9-->
