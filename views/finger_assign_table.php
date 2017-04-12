<?php
    require_once('class/FetchValues.php');
    $fetchObj = new FetchValues();

    $std_class = $_POST['std_class'];
    $std_section = $_POST['std_section'];
    $std_group = $_POST['std_group'];
    $std_shift = $_POST['std_shift'];
?>
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
                <th>
                    FingerPrint
                </th>
            </tr>
            </thead>
            <tbody>
		<?php
            $my_result=$fetchObj->fingerAssignView($std_class, $std_section, $std_group, $std_shift,$_SESSION['institute_id']);
        foreach ($my_result as $student) { ?>
		 <tr class="gradeA" id = "<?php echo $student['std_id']; ?>">
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
                    <td class="finger">
						<?php echo $student['fingerPrintId']; ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>


<script>  
    var flag = 0;
     $(function(){      
                
          $(document).on('dblclick', '.finger', function(e){        
              flag++;  

              if (flag == 1)
              {
                e.stopPropagation();
                var currentEle = $(this);
                var id =  $(this).parent().attr('id');

                var value = $(this).text().trim(); 
                $(currentEle).html('<input class="thVal"  onfocus = "test(this)"  style="border:1px solid #ff0000" type="text" value = "' + value + '" />');

                $(".thVal").dblclick(function (e) {
                    e.stopPropagation();
                });         
                    
                $(".thVal").focus();
                
                $(".thVal").keyup(function (event) {
                    if (event.keyCode == 13) { 
                      var preValue = value;
                      value = $(".thVal").val().trim();               
                      edit_data(id, value, preValue, currentEle);                                   
                    }
                });
              }        
          });
    });

     function test(obj){
        obj.value = obj.value;
     } 

       function edit_data(id, text, preValue, currentEle)  
      {  
           //alert(id + "\n" + text + "\n" + preValue);
           $.ajax({  
                url:"views/edit.php",  
                method:"POST",  
                data:{id:id, text:text},  
                dataType:"text",  
                success:function(data){                  
                if (data == "1")
                  {
                    $(currentEle).html(text);
                  } 
                  else 
                  {
                    alert(data);
                    $(currentEle).html(preValue);
                  } 
                   flag = 0;   
                }  
           });  
      } 
     
 </script>


