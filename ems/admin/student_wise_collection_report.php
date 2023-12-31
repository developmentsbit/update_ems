<?php
@session_start();

require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>
	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">

        function totalStudent(){
			var ClassId=$('#className').val();
			var Session=$('#session').val();
			if(ClassId == "Select One")
			{
					alert("Please Select Class Name");
					return false;
			}

			if(Session == "Select Session")
			{
					alert("Please Select Session");
					return false;
			}
			var feeCollectionReport="feeCollectionReport";
			
		$.ajax({
				url:"student_fees_collection_report.php",
				type:"POST",
				data:{ClassId:ClassId,Session:Session,feeCollectionReport:feeCollectionReport},
				cache:false,
				success:function(data){
					$('#showDAta').html(data);
					
				}
			});
	}

  </script>
	
	<style type="text/css">
@media print{
	#print{display: none;}
}
	</style>
  </head>
	
  <body>
  	<form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal addfee">
  	 <div class="col-md-8 col-md-offset-2" id="print" ><br/> <br/>
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px">student wise fee collection report </strong></span><br/>
			
                <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                    <tr>
                    	<td ><strong><span class="text-success" style="font-size: 15px;">Select Class</span></strong></td>
                        <td ><div class="col-md-8">
                        <select class="form-control" name="className" id="className" style="width:280px; border-radius:0px;">
                        <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class` GROUP BY `id` ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo "$fetch_class[0]and$fetch_class[2]"?>"><?php echo $fetch_class[2];?></option><span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
                        </select></div>
                    </tr>

                   
                    
                <tr>
                    <td ><strong><span class="text-success" style="font-size: 15px;">Year</span></strong></td>
                        <td><div class="col-md-8"><select class="form-control" id="session" name="session" style="width:280px; border-radius:0px;">
                        <option>Select Session</option>
                         <?php 
								$sessionsql = "SELECT `year` FROM `student_account_info` GROUP BY `year` ORDER BY `year` DESC";
								$result = $db->select_query($sessionsql);
								if($result > 0){
										
								while($fetchsession = $result->fetch_array()){		
								?>
										<option><?php print $fetchsession[0];?></option>
								<?php   } } ?>

                        </select>
                        </div>
                        </td>
                </tr>
				
				<tr>
					<td colspan="2" align="right">
								<strong style="font-weight:bold; font-size:15px"><span id="showMsg" class="text-danger"></span></strong>
								<strong id="runnigmsg" class="text-danger" style="font-weight:bold; font-size:15px"></strong>
								
					</td>
				</tr>
				
                <tr><td></td>
                		<td>
				<input type="button" name="submit" value="Submit" class="btn btn-info btn-md"  style="width: 180px;  border-radius:0px;" onClick="return totalStudent()"></input>
				</td>

				</tr>
                </table>
							
                </div>

				<div class="col-md-10 col-md-offset-1" id="showDAta"><br/> <br/>
				</div>

	</form>
  
   
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>