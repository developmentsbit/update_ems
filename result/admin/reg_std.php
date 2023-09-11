<?php
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
        
        if(isset($_GET["id"]))
        {
            $db->link->query("DELETE FROM `online_reg_std_info` WHERE `id`='".$_GET["id"]."'");
            $db->link->query("SELECT * FROM `online_subject_registration_table` WHERE `std_id`='".$_GET["id"]."'");
        }
?> 

<table  width="1200" align="center" border="3" cellpadding="0" cellspacing="0" style="">
    <tr>
        <td colspan="14" align="center"><h3>Feni Govt. College </h3> <h2>Student's Form Fill Up (HSC Exam. - 2021)</h2></td>
    </tr>
    <tr> 
    <td width="30" align="center">SL</td>
    <td width="30" align="center">Roll</td>
    <td width="50" align="center">Reg.</td>
    <td width="100" align="center">Session</td>
    <td align="center">Group</td>
    <td>Student Name</td>
    

    <td>Phone</td>
    <td>Father's Name </td>
    <td>Mother's Name </td>
    <td>Guardian Phone </td>
    <td>Subject Name</td>
    <td>Action</td>
    
    </tr>
    
        <?php
        $i=1;
        $sql=$db->link->query("SELECT `roll`,`reg`,`session`,`group`,`name`,`std_mobile`,`fathers_name`,`mothers_name`,`guardian_mobile`,`id` FROM `online_reg_std_info` order by `roll` asc ");
        while($fetch=$sql->fetch_array())
        {?> 
        <tr>
            <td> <?php  echo $i++;?> </td>
            <td align="center"> <?php echo $fetch[0];?> </td>
            <td align="center"> <?php echo $fetch[1];?> </td>
            <td align="center"> <?php  echo $fetch[2];?> </td>
            <td align="center"> <?php echo $fetch[3];?> </td>
            <td align="left"> <?php echo $fetch[4];?> </td>
            <td> <?php echo $fetch[5];?> </td>
            <td> <?php echo $fetch[6];?> </td>
            <td> <?php echo $fetch[7];?> </td>
            <td> <?php echo $fetch[8];?> </td>
            <td> Action </td>
            <td width="300">
                <?php
                

                $sqll=$db->link->query("SELECT `subject_name`,`select_subject_type` FROM `online_subject_registration_table`
inner join `add_subject_info` on  `id`=`online_subject_registration_table`.`subject_id`
WHERE `std_id`='$fetch[9]'  order by `add_subject_info`.`select_subject_type`  ASC  ");
while($fetch_sub=$sqll->fetch_array())
{
    $a="";
    if($fetch_sub[1]=="GroupSubject")
    {
        $a="(Group)";
    }
     if($fetch_sub[1]=="OptionalSubject")
    {
        $a="(Optional)";
    }
    print $fetch_sub[0].$a.' , ';
}

?> 

            </td>
            <td> <a href="https://fgc.gov.bd/admin/reg_std.php?id=<?php echo $fetch[9]?>" class="btn btn-danger"> Delete </a></td>
             </tr>
       <?php
       }
        ?> 
        
   
</table>
    