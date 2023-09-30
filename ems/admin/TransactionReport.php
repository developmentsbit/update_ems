
<?php
  error_reporting(1);
  @session_start();
  if($_SESSION["logstatus"] === "Active")
  {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();

    $projectinfo="SELECT * FROM project_info";
    $query=$db->select_query($projectinfo);
    if($query){
        $fetchinfo=$query->fetch_array();
    }



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Bank Transaction Report</title>
    
    <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">
    <script src="datespicker/bootstrap-datepicker.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <style>
  @media print{
      .print{
        display:none;
      }


    </style>
  </head>
  <body>

<br>
 <table  width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="border-bottom:1px solid #333333" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    <?php print $fetchinfo['institute_name']?></p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetchinfo['location']?>  </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetchinfo['phone_number']?> ,<?php print $fetchinfo['email']?>  </p>
         </td>

           <td height="50" width="76" align="center" style="border-bottom:1px solid #333333">

 

  </td>
     </tr>

     <tr>
          <td colspan="3" align="center">
           
             <h3>Bank Transaction Report</h3>

          </td>

     </tr>

     <tr>
          <td colspan="3">
           
         <table class="table table-bordered"> 
         <thead> 
          <tr>
              <th>SL</th>
              <th>Bank Name</th>
              <th>Account Type</th>
              <th>Account Number</th>
              <th>Deposit</th>
              <th>Withdraw</th>
              <th>Cost</th>
              <th>Interest</th>
              <th>Balance</th>
          </tr> 
          </thead>  

            <?php
$i=1;

  $sql=$db->link->query("SELECT * FROM `bank_information` ");
  while($fetch_info=$sql->fetch_array())
  {

$deposit=$db->link->query("SELECT SUM(`amount`) FROM `bank_transaction` WHERE `account_name`='$fetch_info[2]' AND `transaction_type`='Deposit' ");

$Withdraw=$db->link->query("SELECT SUM(`amount`) FROM `bank_transaction` WHERE `account_name`='$fetch_info[2]' AND `transaction_type`='Withdraw' ");

$BankCost=$db->link->query("SELECT SUM(`amount`) FROM `bank_transaction` WHERE `account_name`='$fetch_info[2]' AND `transaction_type`='Bank Cost' ");

$BankInterest=$db->link->query("SELECT SUM(`amount`) FROM `bank_transaction` WHERE `account_name`='$fetch_info[2]' AND `transaction_type`='Bank Interest' ");

$balance=$db->link->query("SELECT SUM(`amount`) FROM `bank_transaction` WHERE `account_name`='$fetch_info[2]' ");

$Totalbalance=$db->link->query("SELECT SUM(`amount`) FROM `bank_transaction`");


?>
          <tr>
              <td style="height: 20px;"><?php print $i++;?></td>
              <td><?php print $fetch_info['bank_name'] ;?></td>
              <td><?php print $fetch_info['bankingType'] ;?></td>
              <td><?php print $fetch_info['account_number'] ;?></td>

              <td><?php if($deposit){ $fetchdeposit=$deposit->fetch_array(); echo $fetchdeposit[0]; }?> </td>

                <td><?php if($Withdraw){ $fetchWithdraw=$Withdraw->fetch_array(); echo $fetchWithdraw[0]; }?> </td>

                <td><?php if($BankCost){ $fetchBankCost=$BankCost->fetch_array(); echo $fetchBankCost[0]; }?> </td>

                <td><?php if($BankInterest){ $fetchBankInterest=$BankInterest->fetch_array(); echo $fetchBankInterest[0]; }?> </td> 

                <td><?php if($balance){ $fetchbalance=$balance->fetch_array(); echo $fetchbalance[0]; }?> </td>
              
          </tr>
     <?php
         }
    ?>

    <tr>
        <td colspan="8" align="right">Total Bank Balance:</td>
        
        <td><b><?php if($Totalbalance){ $fetchTotalbalance=$Totalbalance->fetch_array(); echo $fetchTotalbalance[0]; }?> </b></td>
    

    </tr>


         
         </table>

          </td>

     </tr>

     </table>

<br>

<table width="1000" align="center">
  
  <tr>
      <td height="70" valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ......................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

      Office Assistant
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 12px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
        <br>
        <br>
..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-right:60px; ">

        Headmaster
        </p>

         </td>
    </tr>
</table>
<br>
<center> 
<input type="button" name="print" value="Print" class="print" style="height: 30px; width: 150px; background: GREEN; color: #fff; border: 0px;" 
onclick="window.print()">
</center>


<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>


  
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
