


<?php
		
require_once("db_connect/config.php");
require_once("db_connect/conect.php");
$db = new database();

$slelit="SELECT `emp_pin`,`emp_firstname`,`emp_emergencyphone1`,`emp_phone`,`emp_gender`,`department_id`,`emp_ssn`,`hr_department`.`dept_name` FROM `hr_employee`
INNER JOIN `hr_department` ON `hr_department`.`id`=`hr_employee`.`department_id` ORDER BY `emp_pin` ASC";
	$resultit=$db->select_query($slelit);

	if($resultit){

?>
<!DOCTYPE html>
<html>
<head>
	<title>All Student Information </title>
	<style type="text/css">
	td{
			border-right:1px #000 solid;
			border-top:1px #000 solid;
		

		 }

</style>
</head>
<body>

		<table width="960"> 

		<tr>
				<td colspan="7" style="border-left:1px #000 solid;">
					<table width="100%">
						<tr>
								<td align="center"> 

								<h1 style="font-size: 40px; line-height:20px;"> Feni Govt. College</h1> 

								<h1 style="font-size: 18px; line-height: 10px;"> Student Information Class-Eleven</h1></td>
						</tr>

						

					</table>

				</td>
		</tr>
				<tr>
					<td width="20" height="40" style="border-left:1px #000 solid;"> Machine ID </td>
					<td> Name </td>
					<td> Guardian Phone No.</td>
					<td> STD Phone No.</td>
					<td> Gender </td>
					<td > Department </td>
					<td> Class Roll </td>
				

				</tr>

				<?php

while($fetchlit=$resultit->fetch_array())
	{
		$x=intval($fetchlit[0]);
	?>

			<tr>
				<td width="20" height="30" style="border-left:1px #000 solid; "> <?php print $x; ?></td>

					<td> <?php print $fetchlit[1]; ?> </td>
					<td > <?php print $fetchlit[2]; ?></td>
					<td> <?php print $fetchlit[3]; ?></td>
					<td> <?php  
							if($fetchlit[4]==0)
							{
								print "Male";
							}

							if($fetchlit[4]==1)
							{
								print "Female";
							}

						

						?> </td>
					<td> <?php
							
								 print $fetchlit[7];
							?> </td>


					<td> <?php

							if($fetchlit[6]!=0)
							{
								 print $fetchlit[6];
							}
					

					 ?> </td>
				</tr>

<?php
	
}
?>

<tr>
					<td ></td>
					<td>  </td>
					<td> </td>
					<td> </td>
					<td>  </td>
					<td >  </td>
					<td> </td>
				

				</tr>

		</table>


<?php
}	
?>

</body>
</html>
