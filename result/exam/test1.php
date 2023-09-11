
   <?php
 
date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database(); 
$phpdate=date("d");
//print $phpdate;
$phphour=date("h");
//print $phphour;

$timeexam="0.00";
$fetch_info['Day']='';
$sqlexamtime="SELECT * FROM `examsetup` WHERE `id`='".$_POST["exam"]."'";
//print $sqlexamtime;
$fetchExamm=$db->link->query($sqlexamtime);
if($fetchExamm)
{
    $fetch_info=$fetchExamm->fetch_array();
    $timeexam=$fetch_info['Hour'];
    if($timeexam=='13')
    {
        $timeexam='01';
    }
    else if($timeexam=='14')
    {
        $timeexam='02';
    }
     else if($timeexam=='15')
    {
        $timeexam='03';
    }
    else if($timeexam=='16')
    {
        $timeexam='04';
    }
     else if($timeexam=='17')
    {
        $timeexam='05';
    }
   // print $timeexam;
   // print '<br>'.$fetch_info['Day'];
}




        function numberSystem($x)
        {
            switch($x){
                        
                        case"0":return"০";
                        case"1":return"০১";
                        case"2":return"০২";
                        case"3":return"০৩";
                        case"4":return"০৪";
                        case"5":return"০৫";
                        case"6":return"০৬";
                        case"7":return"০৭";
                        case"8":return"০৮";
                        case"9":return"০৯";
                        case"10":return"১০";
                        case"11":return"১১";
                        case"12":return"১২";
                        case"13":return"১৩";
                        case"14":return"১৪";
                        case"15":return"১৫";
                        case"16":return"১৬";
                        case"17":return"১৭";
                        case"18":return"১৮";
                        case"19":return"১৯";
                        case"20":return"২০";
                        case"21":return"২১";
                        case"22":return"২২";
                        case"23":return"২৩";
                        case"24":return"২৪";
                        case"25":return"২৫";
                        case"26":return"২৬";
                        case"27":return"২৭";
                        case"28":return"২৮";
                        case"29":return"২৯";
                        case"30":return"৩০";
                        case"31":return"৩১";
                        case"32":return"৩২";
                        case"33":return"৩৩";
                        case"34":return"৩৪";
                        case"35":return"৩৫";
                        case"36":return"৩৬";
                        case"37":return"৩৭";
                        case"38":return"৩৮";
                        case"39":return"৩৯";
                        case"40":return"৪০";
                        case"41":return"৪১";
                        case"42":return"৪২";
                        case"43":return"৪৩";
                        case"44":return"৪৪";
                        case"45":return"৪৫";
                        case"46":return"৪৬";
                        case"47":return"৪৭";
                        case"48":return"৪৮";
                        case"49":return"৪৯";
                        case"50":return"৫০";
             }
        }

    
    $i=1;
    $select="SELECT * FROM `questionadd` INNER JOIN `questionpaper` ON `questionpaper`.`QuestionID`=`questionadd`.`id` WHERE `questionpaper`.`ExamTypeID`='".$_POST["exam"]."' ";
  // print  $select;
    $r=$db->link->query($select);
    if($r)
    {
   

            // if($phpdate==$fetch_info['Day'] && $phphour==$timeexam )
            // {


           
            
                while($fetch=$r->fetch_array())
                {
                    
                $fetchAns[4]="";
                $ans="SELECT *  FROM `answer_sheet`  WHERE `Exam_ID`='".$_POST["exam"]."' AND `Student_ID`='".$_POST["StdID"]."' AND `Qiestion_ID`='$fetch[0]'";
                //print $ans;
               $qans=$db->link->query($ans);
               $fetchAns=$qans->fetch_array();
             ?>
    
        
        <div class="form-group col-md-6 " style="min-height: 50px;">

        <div  class="col-md-12" style="font-size: 14px;"><label style="font-size: 16px; vertical-align: top;"><?php  echo $sl=numberSystem($i++); ?>.</label>  <label><?php print $fetch[3];?>  </label>   </div> 

        <div  class="col-md-6" style="min-height: 30px;"> <label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[8].'and'.'A';?>" name="<?php print $fetch[0];?>" id="<?php print $fetch[0].'1';?>"  onclick="return SelectedAns('<?php print $fetch[0].'1';?>')" 
        style='height:18px; width:18px;  border: 3px #000 solid;' <?php if($fetchAns[4]=="A"){?> checked="checked" <?php }?> >
        </input>&nbsp;&nbsp;</label>

       <label>ক)  <?php print $fetch[4];?>   </label> </div>

        <div  class="col-md-6 " style="min-height: 30px;"><label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[9].'and'.'B';?>" name="<?php print $fetch[0];?>" id="<?php print $fetch[0].'2';?>" onclick="return SelectedAns('<?php print $fetch[0].'2';?>')"  style='height:18px; width:18px;  border: 3px #000 solid;' <?php if($fetchAns[4]=="B"){?> checked="checked" <?php }?> > &nbsp;&nbsp;</label>
 <label>  খ)  <?php print $fetch[5];?> </label></div>

        <div  class="col-md-6 " style="min-height: 30px;"><label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[10].'and'.'C';?>" name="<?php print $fetch[0];?>" id="<?php print $fetch[0].'3';?>" onclick="return SelectedAns('<?php print $fetch[0].'3';?>')" style='height:18px; width:18px;  border: 3px #000 solid;' <?php if($fetchAns[4]=="C"){?> checked="checked" <?php }?> > &nbsp;&nbsp;</label>
 <label>  গ)  <?php print $fetch[6];?> </label></div>

        <div  class="col-md-6 " style="min-height: 30px;"><label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[11].'and'.'D';?>" name="<?php print $fetch[0];?>"  id="<?php print $fetch[0].'4';?>" onclick="return SelectedAns('<?php print $fetch[0].'4';?>')" style='height:18px; width:18px;  border: 3px #000 solid;' <?php if($fetchAns[4]=="D"){?> checked="checked" <?php }?> > &nbsp;&nbsp;</label>
   <label>  ঘ)  <?php print $fetch[7];?> </label></div>


    </div>
    

    
 <?php
}
?>

  <div class="form-row">
    <div class="form-group col-md-12 text-center">
          <label>
              <form method="POST">
                    <input type="submit" name="Submit" value="Submit" class="btn btn-success " style="width: 200px;">
            </form>
          </label>
    </div>
  </div> 
  

<?php
// } 
?>


  <?php
    }
    else
    {
        //print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }
  ?>