<?php
error_reporting(1);
@session_start();

require_once("../../db_connect/conect.php");
$db = new database();

require_once(__DIR__."/lib/AdnSmsNotification.php");
use AdnSms\AdnSmsNotification;


if (isset($_POST["add"])) 
{
$number="";
	
		for($i = 0; $i < count($_POST["mytext"]);$i++){

		$recipient  = $_POST["mytext"][$i]; 
    $number=$number.$recipient;
		$message=$_POST["details"]; 

		$requestType = 'SINGLE_SMS';    
		$messageType = 'TEXT';  

	    $sms = new AdnSmsNotification();
		$sms->sendSms($requestType, $message, $recipient, $messageType);
		 
		 }

    //   $smsSent="INSERT INTO `sms_sent_tab` (`date`,`Roll`,`Number`,`Message`,`Admin`) VALUES('".date('Y-m-d')."','Indivisual',' $number','$message','".$_SESSION["name"]."')";
    //     $db->select_query($smsSent);
		  // print "Message Send Successfully";


	
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Bar counchil membar information</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>



    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: capitalize;"><b>Send Individual Message</b></div>
  <div class="panel-body">


<form method="post" enctype="multipart/form-data" action="">

  	<div class="form-group">
  		<button class="add_field_button btn btn-info" style="border-radius: 0px; ">Add More Fields</button>
  		
  	</div>
  	

  	<div class="form-group">
       <label >Number :</label>
    	<div class="input_fields_wrap">
        <div><input type="text" name="mytext[]" class="form-control"  style="border-radius: 0px; height: 40px;" value="88"></div>
      </div>


  </div>  


  	<div class="form-group">
       <label >Message :</label>
    	<textarea rows="10" class="form-control" name="details" style="border-radius: 0px;"></textarea>

  </div> 




   

<center>
	<input type="submit" name="add" class="btn btn-success" style="width: 120px; border-radius: 0px;" value="Send">
<input type="submit" name="view" class="btn btn-danger" style="width: 120px; border-radius: 0px;" value="Reset">
</center>


</form>




</div>
</div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]" class="form-control" style="border-radius:0px;" value="88"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

</form>
</body>
</html>