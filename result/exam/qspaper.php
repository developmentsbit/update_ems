
<?php
@session_start();


date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database(); 
$phpdate=date("Y-m-d");
//print $phpdate;
$phphour=date("h");
//print $phphour;
$stdIDNew=$_GET["std"];

$key = "encryption key";
$newIDStd=openssl_decrypt(hex2bin($stdIDNew),'AES-128-CBC',$key);

    if(isset($_POST["Submit"]))
    {
            print "<script>alert('Saved Successfully!!')</script>";
            print "<script>location='examResult.php'</script>";
    }

$selectExam="SELECT * FROM `examsetup`  WHERE `id`='".$_GET['exid']."' AND `Status`='Active'";
$queryExam=$db->link->query($selectExam);
if($queryExam->num_rows>0)
{
  $fetch_exam=$queryExam->fetch_array();


  $endtime=$fetch_exam['Month'].' '.$fetch_exam['Day'].', '.$fetch_exam['Year'].' '.$fetch_exam['EndHour'].':'.$fetch_exam['EndMinute'].':00';

  $startTime=$fetch_exam['Month'].' '.$fetch_exam['Day'].', '.$fetch_exam['Year'].' '.$fetch_exam['Hour'].':'.$fetch_exam['Minute'].':00';


  // if($_GET["exam"]=="Ex-000000003" || $_GET["exam"]=="Ex-000000011"  || $_GET["exam"]=="Ex-000000019"   || $_GET["exam"]=="Ex-000000037"  || $_GET["exam"]=="Ex-000000041" || $_GET["exam"]=="Ex-000000038" || $_GET["exam"]=="Ex-000000054" || $_GET["exam"]=="Ex-000000061" || $_GET["exam"]=="Ex-000000058")
        // {


?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compitable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question Paper</title>
    <meta property="og:image" content="Null">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="fgc.gov.bd.com">
    <meta property="og:url" content="http://www.fgc.gov.bd">
    <meta property="og:title" content="Question Link ">
    <meta property="og:description" content="Feni Govt. College">
    <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.x-git.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  
    
    <body>
    <style>
    p {
      text-align: center;
      font-size: 20px;
      margin-top: 0px;
    }
    </style>
    </head>
<body>

<p id="demo"></p>
<p id="demo3"></p>

 


<script>
// Set the date we're counting down to


var now = new Date().getTime();
var counttime = new Date('<?php print $endtime;?>').getTime();
var count=0;
if(counttime>now)
{

var countDownDate = new Date('<?php print $startTime;?>').getTime();
var x = setInterval(function() {
    $('#questionID').hide();
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("demo").innerHTML ='<div class="container-fluid"> <h1 style="font-size:50px;">Feni Govt. College</h1> College Road, Feni.<br> www.fgc.gov.bd <br>  '+"<span style='color:#ff0000'> পরীক্ষা শুরুর সময় <br> <h1>"+ days + " Day " + hours + " Hour " + minutes + " Minute  " + seconds + " Second"+"</div>";
  if (distance < 0) {
    clearInterval(x);
    $('#questionID').show();
    if(count==0)
    {   count=1;
        showQuestion();
    }
    $('#demo').hide();
    $('#demo5').hide();
    ExamTimeStart();
  }
}, 1000);


function ExamTimeStart()
{
    $('#demo5').hide();
      var sbit = setInterval(function() {
      var now = new Date().getTime();
      var distance = counttime - now;
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      // Output the result in an element with id="demo"
      document.getElementById("demo1").innerHTML =" <h4 <span style='color:#ff0000'> পরীক্ষার সমাপ্তি সময় <p style='color:#ff0000;'>"+ minutes + " Minute  " + seconds +" Second </p></h4>";
      if (distance < 0) {
        clearInterval(sbit);
        $('#questionID').hide();
         $('#demo1').hide();
                $('#demo5').hide();
         location.reload();
      }

    }, 1000);
}
   
}
else
{
    document.getElementById("demo3").innerHTML =" <h1> Feni Govt. College </h1><br><h3> <span style='color:#ff0000'> পরীক্ষার সময় শেষ <br> <h3><br>";    
}

function SelectedAns(ans)
{
    //alert("ok");
    
        var val = $('#'+ans).val();
        var exam = $('#exam').val();
        var StdID = $('#StdID').val();
        var answer="answer";
        if(val !="")
        {
            $.ajax({
                url:"ajaxAddAns.php",
                type:"POST",
                data :{answer:answer,val:val,exam:exam,StdID:StdID},
                cache:false,
                success:function(data)
                {
                    
                }
                
            });
        }
 
}

function showQuestion()
{
        
        var exam = $('#exam').val();
          var StdID = $('#StdID').val();
            $.ajax({
                url:"questionLoad.php",
                type:"POST",
                data :{exam:exam,StdID:StdID},
                cache:false,
                success:function(data)
                {
                    $('#questionView').html(data);
                }
                
            });
        
}


</script>



<p id="demo5">
    <table class='table table-hover'>
        <tr>
        <td  align="center" style="font-size:20px;">
            <label> 
            <?php  $SelectExam="SELECT `examsetup`.`question_title`,`examsetup`.`time`,`examsetup`.`num_question`,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `examsetup` 
INNER JOIN `add_class` ON `add_class`.`id` = `examsetup`.`Class_id`
INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`examsetup`.`Subject_id`
WHERE `examsetup`.`id`='".$_GET["exid"]."'";
           
            $queryexamType=$db->link->query($SelectExam);
            $queryExam=$queryexamType->fetch_array();
           // print "Class : ".$queryExam['3'];

             ?>
             </label>

            <label> 

            <label> Exam Title : <?php  
            print  $queryExam[0];

             ?></label>
        </td>
 
        </tr>
        
          <tr>
        <td align="center"> 
        <?php
            $std="SELECT `student_personal_info`.`student_name`,`running_student_info`.`class_roll` FROM `student_personal_info` 
INNER JOIN  `running_student_info` ON `running_student_info`.`student_id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='$newIDStd'";
            $stdQuery=$db->link->query($std);
            if($stdQuery)
            {
                $stdfetchinfo=$stdQuery->fetch_array();
                print "<b> <label><h3>Student Name : ".$stdfetchinfo[0].', </h3></label></b>';
                print "<b> <label><h3>Student Roll : ".$stdfetchinfo[1].'</h3></label></b>';
            }
        ?>
            <hr style="border: 1px #000 dotted;">
        </td>
        </tr>
    </table>
</p>
</body>
</html>



        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compitable" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Dashboard</title>
        <!--Bootstarp-->
        <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
        <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
        <link rel="stylesheet" href="../css/loading/loading.css" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.x-git.min.js"></script>
        <script src="textEdit/redactor/redactor.min.js"></script>
        <script type="text/javascript" src="../js/loading/pace.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <body>
        <div class="container-fluid" id="questionID" style="display: none;">
        <input type="hidden" value="<?php print $_GET["exid"]?>" name="exam" id="exam"></input>
        <input type="hidden" value="<?php print $newIDStd?>" name="StdID" id="StdID"></input>
        <table width="100%" style="  padding: 0px; " align="center" >
        <tr>    
                <td>
                        <div class="container-fluid txt-center" >   
                                <ul style="text-align: center">
                                <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:40px; list-style: none;">Feni Govt. College</li>
                                <li style=" list-style: none; font-size:24px;font-family:Arial, Helvetica, sans-serif">www.fgc.gov.bd </li>
                             </ul> 
                      </div>
                </td>
        </tr>
        <tr>
            
            <td> <p id="demo1"></p></td>
        </tr>
          
   <tr>
        <td  align="center">
            <label> 
            <?php  $SelectExam="SELECT `examsetup`.`question_title`,`examsetup`.`time`,`examsetup`.`num_question`,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `examsetup` 
INNER JOIN `add_class` ON `add_class`.`id` = `examsetup`.`Class_id`
INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`examsetup`.`Subject_id`
WHERE `examsetup`.`id`='".$_GET["exid"]."'";
           
            $queryexamType=$db->link->query($SelectExam);
            $queryExam=$queryexamType->fetch_array();
    
             
            print "Class : ".$queryExam['3'];
            

             ?>,

             </label>

            <label> Subject : <?php  
            print  $queryExam[4];

             ?>,  </label>
            <label> Exam Title : <?php  
            print  $queryExam[0];

             ?></label>
        </td>
 
        </tr>

         <tr>
        <td align="center">
            <label> 
            Time : <?php  print    $queryExam[1];

             ?>,

             </label>
            <label> Marks : <?php  print   $queryExam[2];


             ?> </label>
        </td>
 
        </tr>




        <tr>
        <td align="center"> 
        <?php
            $std="SELECT `student_personal_info`.`student_name`,`running_student_info`.`class_roll` FROM `student_personal_info` 
INNER JOIN  `running_student_info` ON `running_student_info`.`student_id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='$newIDStd'";
            $stdQuery=$db->link->query($std);
            if($stdQuery)
            {
                $stdfetchinfo=$stdQuery->fetch_array();
                print "<b> <label><h3>Student Name : ".$stdfetchinfo[0].', </h3></label></b>';
                print "<b> <label><h3>Student Roll : ".$stdfetchinfo[1].'</h3></label></b>';
            }
        ?>
          <h3 style="color: #ff0000; text-align: center;" > (সঠিক উত্তরের বৃত্তটিতে ক্লিক কর) </h3><br>
           <form method="POST">
                     <input type="button" name="ShowQuestion" value=" If the questions do not show, Please click  here" class="btn btn-success " onclick="return showQuestion()" > 
              </form>
          <hr style="border: 1px #000 dotted;">
        </td>
        </tr>
</table>
 
 <span id="questionView"> 
 
 </span>
 
 
    </div>
        <?php
   
    
        }
        else
        {
              print "<script>alert('Invlide Exam. Please Check Your Link!!')</script>";
            print "<script>location='../'</script>";
        }
        
        ?>

