
<?php

    error_reporting(0);
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    date_default_timezone_set('Asia/Dhaka');

    $db = new database();
    global $msg;
    $id=$_GET["id"];
    if(isset($id)){ 
        

        $presentrecord = "SELECT `running_student_info`.*,`add_class`.`class_name`,`add_group`.`group_name`,`student_personal_info`.`father_name`,`student_name` FROM `running_student_info`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id` INNER JOIN `add_group` ON
`add_group`.`id`=`running_student_info`.`group_id` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id` WHERE `running_student_info`.`student_id`='".$_GET["id"]."'";
    $resultPreRecord =  $db->select_query($presentrecord);
        if($resultPreRecord->num_rows > 0){
            $fetchpreRecord = $resultPreRecord->fetch_array();
        }
        $ProjectInfo="SELECT * FROM `project_info`";
        $resultProjectInfo = $db->select_query($ProjectInfo);
            if($resultProjectInfo->num_rows > 0){
                    $fetchProjectInfo = $resultProjectInfo->fetch_array();
            }
    ?>
    
    
    <?php ?>
  <style>
    @media print{
            .noneBtnForprin{
                display:none;
            }
            .not{
                display:none;
            }
            #dont{
                display:none;
            }
            .dontPrint{
            display:none;
            }
            @page 
            {
                size:  auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
            }
        
            html
            {
                background-color: #FFFFFF; 
                margin: 0px;  /* this affects the margin on the html before sending to printer */
            }
        
            body
            {
                border: solid 0px blue ;
                margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
            }
        }
</style>
    <?php  $presentrecord = "SELECT `running_student_info`.*,`add_class`.`class_name`,`add_group`.`group_name`,`student_personal_info`.`father_name`,`student_name` FROM `running_student_info`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id` INNER JOIN `add_group` ON
`add_group`.`id`=`running_student_info`.`group_id` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id` WHERE `running_student_info`.`student_id`='$id'";
    $resultPreRecord =  $db->select_query($presentrecord);
        if($resultPreRecord->num_rows > 0){
            $fetchpreRecord = $resultPreRecord->fetch_array();
        }
        $ProjectInfo="SELECT * FROM `project_info`";
        $resultProjectInfo = $db->select_query($ProjectInfo);
            if($resultProjectInfo->num_rows > 0){
                    $fetchProjectInfo = $resultProjectInfo->fetch_array();
            }
            ?>

    <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    
        <table width="750" height="197" border="1" cellpadding="0" cellspacing="0" align="center" >
        <tr>
        <td height="76" colspan="9" align="center">
            
            <table  width="750"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="border-bottom:1px solid #333333" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
   <?php
                    if(isset($fetchProjectInfo)){
                        echo $fetchProjectInfo["institute_name"];
                    }else {
                        echo "";
                    }
                ?></p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> <?php
                    if(isset($fetchProjectInfo)){
                        echo $fetchProjectInfo["location"];
                    }else {
                        echo "";
                    }
                ?>     </p>

   
         </td>

           <td height="50" width="200" align="center" style="border-bottom:1px solid #333333">

      

  </td>
     </tr>
     </table>
     <h4><b> Student's Information </b></h4>
           
        </td>
      </tr>
      
          <tr align="">
            <td height="21" colspan="9">&nbsp;<strong>Present Year &nbsp; : &nbsp; <?php echo date('Y'); ?> <span style="padding-left:100px;">Class &nbsp; : &nbsp;<?php if(isset($fetchpreRecord)) { echo $fetchpreRecord["class_name"]; } else { echo ""; }  ?></span><?php if($fetchpreRecord["group_name"] 
            !="Null" && $fetchpreRecord["group_name"] 
            !="null" ) {?><span  style="padding-left:150px;">Group &nbsp; :&nbsp; <?php if(isset($fetchpreRecord)) { 
            
            
            echo $fetchpreRecord["group_name"]; } else { echo ""; }  ?></span><?php } ?></strong></td>
          </tr>
          
          
          <tr align="center">
            <td width="84" height="24">ID No. </td>
            <td width="219">Student's Name </td>
            <td width="202">Father's Name </td>
            <td width="67">Previous Year </td>
            <td width="67">Previous Class </td>
            <td width="67">Previous Group </td>
            <td width="67">Previous Roll </td>
            <td width="67">Present Roll </td>
            <td width="67">Reg. Sub. </td>
          </tr>
      
  <tr align="center">
    <td height="21"> <?php if(isset($fetchpreRecord)) { 
    
    
    echo $fetchpreRecord["student_id"]; } else { echo ""; }  ?></td>
    <td> <a href="#"><?php if(isset($fetchpreRecord)) { 
    
    
    echo $fetchpreRecord["student_name"]; } else { echo ""; }  ?></a></td>
    <td> <?php if(isset($fetchpreRecord)) { 
    
    
    echo $fetchpreRecord["father_name"]; } else { echo ""; }  ?></td>
    <td><?php echo date('Y')-1 ?></td>
   <?php
        $preViousRecord =  "SELECT `student_academic_record`.*,`add_class`.`class_name`,`add_group`.`group_name` FROM `student_academic_record`
INNER JOIN `add_class` ON `add_class`.`id`=`student_academic_record`.`class_id` INNER JOIN `add_group`
ON `add_group`.`id`=`student_academic_record`.`groupID` WHERE `student_academic_record`.`student_id`='".$_POST["stID"]."'";


    $resultPReviousRecord = $db->select_query($preViousRecord);
        if($resultPReviousRecord->num_rows > 0){
                $fetchRecord =$resultPReviousRecord->fetch_array();
        }
   
   ?>       
   
    <td>   <?php 
            if(isset($fetchRecord)){
                echo $fetchRecord["class_name"];
            }else {
                echo "";
            }
    ?></td>
    <td>  <?php 
            if(isset($fetchRecord)){
                echo $fetchRecord["group_name"];
            }else {
                echo "";
            }
    ?> </td>
    <td>  <?php 
            if(isset($fetchRecord)){
                echo $fetchRecord["class_roll"];
            }else {
                echo "";
            }
    ?></td>
    <td>    <?php if(isset($fetchpreRecord)) { 
    
    
    echo $fetchpreRecord["class_roll"]; } else { echo ""; }  ?></td>
    <?php 
                                                $sql333="SELECT COUNT(`subject_id`) FROM `subject_registration_table` WHERE `std_id`='".$_POST["getid"]."'";
                                                $chek9=$db->select_query($sql333);
                                                if($chek9){$r333=$chek9->fetch_array();} 
                                            ?>
    <td>&nbsp;<?php echo $r333[0];?></td>
  </tr>
</table>
<?php
        $studentDetails="SELECT `running_student_info`.*, `student_personal_info`.*,`student_guardian_information`.`guardian_contact`,
`student_address_info`.`permanent_house_name`,`permanent_village`,`permanent_PO`,`permanent_upazila`,`permanent_distric`,`add_class`.`class_name`,
`add_group`.`group_name`,`student_acadamic_information`.`session2` FROM `running_student_info` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`running_student_info`.`student_id`
INNER JOIN `student_address_info` ON `student_address_info`.`id`=`running_student_info`.`student_id` INNER JOIN`add_class`
ON `add_class`.`id`=`running_student_info`.`class_id` INNER JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id`
INNER JOIN `student_acadamic_information` ON `student_acadamic_information`.`id`=`running_student_info`.`student_id`
 WHERE `running_student_info`.`student_id`='$id'";
        $resultDetails = $db->select_query($studentDetails);
            if($resultDetails->num_rows > 0){
                        $fetchDeatials = $resultDetails->fetch_array();
                }
?>
<table width="750" height="600" border="1" cellpadding="0" cellspacing="0" align="center" style="margin-top:10px;">

  
   <tr >
    
    <td width="190" height="21" align="left" style="padding-left:20px; font-size:16px;">Board Reg. No.</td>
      <td height="21"  align="left" style="padding-left:20px; font-size:16px;"> 
            
            </td>  
            <td height="21"  align="left" style="padding-left:20px; font-size:16px;"> 
           Session :  <?php print $fetchDeatials['session2'];?>
            </td>
            
            
        <td width="210" rowspan="5" align="center" style="padding-left:20px; font-size:16px; vertical-align:middle;"> 
      
                         <img src="../other_img/<?php echo $fetchDeatials["id"] ?>.jpg"  class="img-responsive img-thumbnail"    border="2" style="margin-top:8px;border:0px;  height:150px; width:120px" alt='<?php echo $fetchDeatials["student_name"] ?>'/>
    
    </td>
  </tr>
  
   <tr style="padding-left:20px; font-size:16px;">
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Student's Name </td>
      <td height="20" colspan="2" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["student_name"];
            }else {
                echo "";
            }
      ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Father's Name </td>
      <td height="20" colspan="2" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["father_name"];
            }else {
                echo "";
            }
      ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Mother's Name </td>
      <td height="20" colspan="2" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["mother_name"];
            }else {
                echo "";
            }
      ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="38" align="left" style="padding-left:20px; font-size:14px;">Permanent Address </td>
      <td height="38" colspan="2" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["permanent_house_name"].','.$fetchDeatials["permanent_village"].','.$fetchDeatials["permanent_PO"].','.$fetchDeatials["permanent_upazila"].','.$fetchDeatials["permanent_distric"];
            }else {
                echo "";
            }
      ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Date of birth </td>
      <td width="234" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["date_of_brith"];
            }else {
                echo "";
            }
      ?></td>
        <td width="283" height="20"  align="left" style="padding-left:20px; font-size:14px;" >Admission date </td>
          <td width="210" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["date_of_brith"];
            }else {
                echo "";
            }
      ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Religion </td>
      <td width="234" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["religious"];
            }else {
                echo "";
            }
      ?></td>
        <td width="283" height="20"  align="left" style="padding-left:20px; font-size:14px;">Gender</td>
          <td width="210" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["gender"];
            }else {
                echo "";
            }
      ?></td>
  </tr>
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Present Session </td>
      <td width="234" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php if(isset($fetchRecord)){
                echo $fetchDeatials["session2"];
            }else {
                echo "";
            }
      ?></td>
        <td width="283" align="left" style="padding-left:20px; font-size:14px;">Previous Session </td>
        <td width="210" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php if(isset($fetchRecord)){
                echo $fetchRecord["session"];
            }else {
                echo "";
            }
      ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Present Class </td>
      <td width="234" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["class_name"];
            }else {
                echo "";
            }
      ?></td>
        <td width="283" align="left" style="padding-left:20px; font-size:14px;">Previous Class </td>
        <td width="210" height="20" align="left" style="padding-left:20px; font-size:14px;"> <?php 
            if(isset($fetchRecord)){
                echo $fetchRecord["class_name"];
            }else {
                echo "";
            } ?></td>
  </tr>
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Present Group </td>
      <td width="234" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["group_name"];
            }else {
                echo "";
            }
      ?></td>
        <td width="283" align="left" style="padding-left:20px; font-size:14px;">Previous Group </td>
        <td width="210" height="20" align="left" style="padding-left:20px; font-size:14px;"> <?php 
            if(isset($fetchRecord)){
                echo $fetchRecord["group_name"];
            }else {
                echo "";
            } ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Present Roll </td>
      <td width="234" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["class_roll"];
            }else {
                echo "";
            }
      ?></td>
        <td width="283" align="left" style="padding-left:20px; font-size:14px;">Previous Roll </td>
        <td width="210" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchRecord)){
                echo $fetchRecord["class_roll"];
            }else {
                echo "";
            } ?></td>
  </tr>
  
   <tr >
    
    <td width="190" height="20" align="left" style="padding-left:20px; font-size:14px;">Gurdian Contact No. </td>
      <td width="234" height="20" align="left" style="padding-left:20px; font-size:14px;">0<?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["guardian_contact"];
            }else {
                echo "";
            }
      ?></td>
        <td width="283" height="20"  align="left" style="padding-left:20px; font-size:14px;">Blood group </td>
          <td width="210" height="20" align="left" style="padding-left:20px; font-size:14px;"><?php 
            if(isset($fetchDeatials)){
                echo $fetchDeatials["blood_group"];
            }else {
                echo "";
            }
      ?></td>
  </tr>

 <tr >
    
    <td width="190" height="18" align="left" style="padding-left:20px; font-size:14px;" colspan="4"> <b>Registered Subjects : </b> </td>
     
  </tr>
  
   
   
            <?php
            $show = '';
         $sql8="SELECT `running_student_info`.`student_id`,`class_roll`,`datev`,`year`,running_student_info.`class_id`,running_student_info.`group_id`,`student_personal_info`.`student_name`,`add_class`.`class_name`,`add_group`.`group_name`
 FROM `running_student_info` JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id` JOIN `add_class`
 ON `add_class`.`id`=`running_student_info`.`class_id` JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id` WHERE `running_student_info`.`student_id`='$id'";
            
            $chek8=$db->select_query($sql8);
            if($chek8){
                $res8=$chek8->fetch_object();
                //print_r($res8);
            }
           
            
            $show.='<tr><td  align="center">SL</td><td  colspan="2" height="40" align="left" style="padding-left:20px; font-size:14px;">Subject Name</td><td align="left" style="padding-left:20px; font-size:14px;">Subject Code</td>';
                
                 $selectSubjectType=$db->select_query("SELECT `add_subject_info`.`select_subject_type` from `add_subject_info` group by  `add_subject_info`.`select_subject_type`");
                while($fetch_type=$selectSubjectType->fetch_array())
                {
                $show.='<tr><td colspan="4" align="center"><b>'.$fetch_type[0].'</b></td></tr>';
               
                
                 $sql99="SELECT `subject_registration_table`.`subject_id`,`std_id`,`add_subject_info`.`subject_code`,`subject_name`,`select_subject_type`
 FROM `subject_registration_table` INNER JOIN `add_subject_info` ON `add_subject_info`.`id`=`subject_registration_table`.`subject_id`
 WHERE `subject_registration_table`.`std_id`='".$res8->student_id."' AND `subject_registration_table`.`class_id`='".$res8->class_id."' 
AND `subject_registration_table`.`group_id`='".$res8->group_id."' AND  `add_subject_info`.`select_subject_type`='$fetch_type[0]'   ORDER BY `add_subject_info`.`serial` ASC";

                $chek99=$db->select_query($sql99);
                
                if($chek99){
                $a=0;
                    while($fetch99=$chek99->fetch_object()){
                    $a++;
                        $show.='<tr ><td align="center">'.$a.'</td><td height="30" align="left" style="padding-left:20px; font-size:14px;" colspan="2">'.$fetch99->subject_name.'</td><td align="left" style="padding-left:20px; font-size:14px;">'.$fetch99->subject_code.'</td></tr>';
                    }
                }
                
        }
                
            
            
            echo $show;
            ?>
            
                <tr>
    
    <td width="190" height="38" align="left" style="padding-left:20px; font-size:16px;" colspan="4"> <lable> <input type="checkbox"></lable> <label> &nbsp;&nbsp;<b>  I certify that above statement is correct.</b></label></td>
     
  </tr>
  
  
          <tr>
    
    <td colspan="4">
        
        <table width="100%">
            <tr>
                <td width="33%" align="center"><br></td>
                <td width="33%"></td>
                <td width="33%"></td>
               
            </tr>   
            
            <tr>
                <td width="33%"  align="center">.............................</td>
                <td width="33%"  align="center">.............................</td>
             
                <td width="33%"  align="center">.............................</td>
      
               
            </tr>     
            
            <tr>
                <td width="33%"  align="center">Guardian's</td>
                <td width="33%"  align="center">Class Teacher</td>
      
                <td width="33%"  align="center">Student</td>
      
               
            </tr>
        </table>
    </td>
     
  </tr>
  
            <tr class="noneBtnForprin">
    
    <td width="190" height="38" align="center" style="padding-left:20px; font-size:14px;" colspan="4"><input name="button" type="button" class="btn btn-sm btn-danger" onclick="window.print()" value ="PRINT"/></td>
     
  </tr>
 </table>
 
<?php   
 }
 

 
 

?>
<script>
    window.print();
</script>


