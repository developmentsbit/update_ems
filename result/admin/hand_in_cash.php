<?php
    error_reporting(1);
    @session_start();
    if($_SESSION["logstatus"] === "Active")
    {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();


$selectDate="SELECT * FROM `hand_in_cash` WHERE `date`='".date('Y-m-d')."'";
$queryDate=$db->select_query($selectDate);
    if($queryDate)
    {
        $lastCashCloseDate=$queryDate->fetch_array();
        $LastDateCashclose=$lastCashCloseDate[1];
    }
    else
    {
        $selectDate="SELECT * FROM `hand_in_cash` ORDER BY `date` DESC LIMIT 0,1";
        $queryDate=$db->select_query($selectDate);
          if($queryDate)
          {
              $lastCashCloseDate=$queryDate->fetch_array();
              $LastDateCashclose=$lastCashCloseDate[3];

          }
    }
   
$cashcloselast=explode('-', $LastDateCashclose);

if($cashcloselast[2]!="")
{
  $x=$cashcloselast[2]+1;
  if($x<=9)
  {
  		$x='0'.$x;
  }

  $cashcloselastDate="$cashcloselast[0]-$cashcloselast[1]-$x";
}



$duration=$cashcloselastDate.' &nbsp;&nbsp; -  &nbsp;&nbsp; '.date('Y-m-d');
    
$User_Name=$_SESSION["name"];


$Close_date=isset($_POST["Close_date"])?$_POST["Close_date"]:"";
$Previous_Cash=isset($_POST["Previous_Cash"])?$_POST["Previous_Cash"]:"";
$date=isset($_POST["date"])?$_POST["date"]:"";
$total=isset($_POST["total"])?$_POST["total"]:"";
$student_collection=isset($_POST["student_collection"])?$_POST["student_collection"]:"";
$Expences_Cash=isset($_POST["Expences_Cash"])?$_POST["Expences_Cash"]:"";
$other_collection=isset($_POST["other_collection"])?$_POST["other_collection"]:"";
$bank_deposit=isset($_POST["bank_deposit"])?$_POST["bank_deposit"]:"";
$bank_withdraw=isset($_POST["bank_withdraw"])?$_POST["bank_withdraw"]:"";
$Hend_In_Cash=isset($_POST["Hend_In_Cash"])?$_POST["Hend_In_Cash"]:"";

$comment=isset($_POST["comment"])?$_POST["comment"]:"";
$totalExpense=isset($_POST["totalExpense"])?$_POST["totalExpense"]:"";
$bankbalance=isset($_POST["bankbalance"])?$_POST["bankbalance"]:"";
$total_bankbalance=isset($_POST["total_bankbalance"])?$_POST["total_bankbalance"]:"";



$type="null";



if(isset($_POST["addbtn"]))
{
    if(!empty($Close_date))
    {

        $sql="INSERT INTO `hand_in_cash`(`cash_close_date`, `previous_balance`, `date`, `total_cash`, `student_collection`, `expences`, `other_collection`, `bank_deposit`, `bank_withdraw`, `hend_in_cash`, `comment`, `admin`,`TotalExpense`,`BankBalanceDetails`,`TotalBankBalance`,`CashCloseDuraton`) VALUES ('$Close_date','$Previous_Cash','$date','$total','$student_collection','$Expences_Cash','$other_collection','$bank_deposit','$bank_withdraw','$Hend_In_Cash','$comment','$User_Name','$totalExpense','$bankbalance','$total_bankbalance','$duration')";
      

        $resultisnsert=$db->insert_query($sql);       
    }

}






if(isset($_POST['viewbtn']))
    {
         echo "<script>location='hand_in_cash_view.php'</script>";
    }


//link edit data................................... 
$fetch[0]="";
$fetch[1]="";
$fetch[2]="";
$fetch[3]="";
$fetch[4]="";
$fetch[5]="";
$fetch[6]="";
$fetch[7]="";
$fetch[8]="";
$fetch[9]="";
$fetch[10]="";
$fetch[11]="";
$fetch[12]="";
$fetch[13]="";
    if(isset($_GET['edit']))
    {
        $src_text=$_GET['edit'];
        $query="SELECT * FROM `hand_in_cash` WHERE `id`='$src_text'";
        $chek=$db->select_query($query);
        if($chek)
            {
                $fetch=$chek->fetch_array();
                
            }
    }

$id=$fetch[0];

if(isset($_POST["editbtn"]))
{
   if(!empty($Close_date))
    {

        $sql="REPLACE INTO `hand_in_cash`(`cash_close_date`, `previous_balance`, `date`, `total_cash`, `student_collection`, `expences`, `other_collection`, `bank_deposit`, `bank_withdraw`, `hend_in_cash`, `comment`, `admin`,`TotalExpense`,`BankBalanceDetails`,`TotalBankBalance`,`CashCloseDuraton`) VALUES ('$Close_date','$Previous_Cash','$date','$total','$student_collection','$Expences_Cash','$other_collection','$bank_deposit','$bank_withdraw','$Hend_In_Cash','$comment','$User_Name','$totalExpense','$bankbalance','$total_bankbalance','$duration')";
      

        $resultisnsert=$db->insert_query($sql);       
    }


}


    if (isset($_POST["refresh"])) {
        echo "<script>location='hand_in_cash.php'</script>";
    }




// print $cashcloselastDate;


$studentCollection="SELECT SUM(`paid_amount`) FROM `student_paid_table`
WHERE `defult_Date` BETWEEN '$cashcloselastDate' AND '".date("Y-m-d")."'";



$StudentCollectionAmount[0]=0;
$StudentCollectionQuery=$db->select_query($studentCollection);
if($StudentCollectionQuery)
{
      $StudentCollectionAmount=$StudentCollectionQuery->fetch_array();


}

$OthersIncome="SELECT SUM(`amount`) FROM `other_income`
WHERE `EntryDate` BETWEEN '$cashcloselastDate' AND '".date("Y-m-d")."'";


$fetchOthersIncome[0]=0;
$selectOthersIncome=$db->select_query($OthersIncome);
if($selectOthersIncome)
{
      $fetchOthersIncome=$selectOthersIncome->fetch_array();


}

$bankWithdraw="SELECT SUM(`amount`) FROM `bank_transaction` WHERE `EntryDate` BETWEEN '$cashcloselastDate' AND '".date("Y-m-d")."'  AND  `transaction_type`='Withdraw'";


$fetchbankWithdraw[0]=0;
$selectbankWithdraw=$db->select_query($bankWithdraw);
if($selectbankWithdraw)
{
      $fetchbankWithdraw=$selectbankWithdraw->fetch_array();


}

$totalHendIncash=$lastCashCloseDate['previous_balance']+$StudentCollectionAmount[0]+$fetchOthersIncome[0]+abs($fetchbankWithdraw[0]);



$expense="SELECT SUM(`amount`) FROM `other_cost`
WHERE `Entry_Date` BETWEEN '$cashcloselastDate' AND '".date("Y-m-d")."'";



$fetchExpense[0]=0;
$selectexpense=$db->select_query($expense);
if($selectexpense)
{
      $fetchExpense=$selectexpense->fetch_array();


}



$bankdiposit="SELECT SUM(`amount`) FROM `bank_transaction` WHERE `EntryDate` BETWEEN '$cashcloselastDate' AND '".date("Y-m-d")."'  AND  `transaction_type`='Deposit'";


$fetchbankdiposit[0]=0;
$selectbankdiposit=$db->select_query($bankdiposit);
if($selectbankdiposit)
{
      $fetchbankdiposit=$selectbankdiposit->fetch_array();


}

$totalExpense=$fetchExpense[0]+$fetchbankdiposit[0];

$HendIncashBalance=$totalHendIncash-$totalExpense;


$equalBalance=$totalExpense+$HendIncashBalance;


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>

<div class="wrapper">

     <section class="content">
      <div class="container">
        <div class="row">


<div class="col-md-12 " style="margin: auto; margin-top: 50px;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h2 class="card-title">Cash Close</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
        <form method="post" enctype="multipart/form-data">
        <div class="card-body">

                 <div class="row">

                    <div class="col-md-6">  
                         <div class="form-group">
                           <label>Date</label>  

                            <input type="text" readonly name="date" class="form-control"  value='<?php echo date("Y-m-d");?>' >
                        </div>
                    </div>

                   <div class="col-md-6">
                      <div class="form-group">
                           <label>Last Cash Close Date : </label> 

                            <input type="text" name="Close_date" class="form-control"  value='<?php echo $LastDateCashclose;?>' readonly>
                        </div>
                 </div>


                </div>



                    <div class="row">

                    <div class="col-md-6">



                      

                        <div class="form-group">
                            <label>Previous Balance</label>

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="Previous_Cash" value="<?php echo $lastCashCloseDate['previous_balance'];?>"  readonly>
                        </div>


                       

                        <div class="form-group">
                           <label>Fees Collection</label> 

                            <input type="text" name="student_collection" class="form-control"  value="<?php echo $StudentCollectionAmount[0]; ?>" readonly>
                        </div>

                        <div class="form-group">
                           <label>Bank withdraw</label> 

                            <input type="text" name="bank_withdraw" class="form-control"  value="<?php echo  abs($fetchbankWithdraw[0]); ?>" readonly>
                        </div>

                         <div class="form-group">
                           <label>Other's Collection</label> 

                            <input type="text" name="other_collection" class="form-control"  value="<?php echo $fetchOthersIncome[0]; ?>" readonly>
                        </div>

                       <div class="form-group">
                            <label>Total Cash</label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="total" value="<?php echo $totalHendIncash;?>"  readonly>
                        </div>


                    </div>

<!-- /////////////////////////////////////Expense /////////////////////////// -->

                    <div class="col-md-6">
                        

                    
                        <div class="form-group">
                            <label>Expences</label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="Expences_Cash" value="<?php echo $fetchExpense[0];?>"  readonly>
                        </div>
               
                      <div class="form-group">
                            <label>Bank Deposit</label> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="bank_deposit" value="<?php echo $fetchbankdiposit[0];?>" readonly>
                        </div>

                            <div class="form-group">
                            <label>Total Expense </label> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="totalExpense" value="<?php echo $totalExpense;?>" readonly>
                        </div>

                        <div class="form-group">
                            <label> Cash In Hend</label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="Hend_In_Cash" value="<?php echo $HendIncashBalance;?>" readonly>
                        </div>   

                         <div class="form-group">
                            <label>Equal</label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="equal"  value="<?php echo $equalBalance;?>" readonly>
                        </div>




                    </div>
                </div>


              
<?php
      $bankAccounts=""; 

        $totalAccountBalance=0;
    $selectBankAccount="SELECT `bank_transaction`.*,`bank_information`.`bank_name`,`bank_information`.`account_type` FROM `bank_transaction`
INNER JOIN `bank_information` ON `bank_information`.`account_number`=`bank_transaction`.`account_name`  GROUP BY `account_name`";

    $QueryBankAccount=$db->select_query($selectBankAccount);
    if($QueryBankAccount)
    {
          while($fetchAccount=$QueryBankAccount->fetch_array())
          {
              $sql="SELECT SUM(`amount`) AS 'Total' FROM `bank_transaction` WHERE `account_name`='$fetchAccount[1]'";
             

              $selectAccounBalance=$db->select_query($sql);
              if($selectAccounBalance)
              {
                  $fetch_Balance=$selectAccounBalance->fetch_array();
                  $totalAccountBalance=$totalAccountBalance+$fetch_Balance[0];

                  $bankAccounts.="$fetchAccount[9]->$fetchAccount[10]->$fetchAccount[1]->Balance : &nbsp; $fetch_Balance[0] TK.<br>";
              }

          }

           $bankAccounts.="<p>Total Bank Balance :  $totalAccountBalance TK.";

    }
?>

                


               
                
     <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Account Balance</label> 
                            <br>

                            <span><?php print $bankAccounts;?></span> 

                            <input type="hidden" name="bankbalance" class="form-control"   readonly  value="<?php print $bankAccounts;?>"> 

                              <input type="hidden" name="total_bankbalance" class="form-control"   readonly  value="<?php print $totalAccountBalance;?>"> 
                        </div>
                    </div>

     </div>



                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Comment</label> <span> 

                            <textarea name="comment" class="form-control"  placeholder="Enter Comment..."></textarea>
                        </div>
                    </div>

                </div>


                  <br>

                  <span><h5 align="center"><?php echo $db->sms; ?></h5> </span> 


        </div>
               <div class="card-footer bg-white" style="text-align: center;">
                    
                    <button type="submit" name="addbtn" class="btn btn-success">Submit</button>
                    <button type="submit" name="editbtn" class="btn btn-primary">Update</button>
                    <button type="submit" name="viewbtn" class="btn btn-warning">View</button>
                    <button type="submit" name="refresh" class="btn btn-danger">Refresh</button>

                </div>
        </form>
         </div>  
          </div>

          </div>


          </div>
          </section>
</div>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
