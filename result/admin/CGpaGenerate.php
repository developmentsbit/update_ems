<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	
	if(isset($_POST["stotalstd"])){
		$ClassId=explode('and',$_POST["ClassId"]);
		//print_r($ClassId);
		$ExamId=explode('and',$_POST["ExamId"]);
		$Session=$db->escape($_POST["Session"]);
		$sql="SELECT *  FROM `gnerate_marks` WHERE `ClassID`='$ClassId[0]' AND `ExamID`='$ExamId[0]' AND `session`='$Session' GROUP BY `studentID`";
		$result=$db->select_query($sql);
		if($result){
				$rows=$result->num_rows;
				print "Total Student &nbsp;=&nbsp;".$rows;
		}
	}
	
	if(isset($_POST["resultGen"])){
			$ClassId=explode('and',$_POST["ClassId"]);
		//print_r($ClassId);
		$ExamId=explode('and',$_POST["ExamId"]);
		$Session=$db->escape($_POST["Session"]);
		
		
		
		if(isset($ClassId) && $ClassId != "Select One" && isset($ExamId) && $ExamId != "Select Exam Name" && isset($Session) && !empty($Session))
		{
				$sqlg="SELECT *  FROM `gnerate_marks` WHERE `ClassID`='$ClassId[0]' AND `ExamID`='$ExamId[0]' AND `session`='$Session' GROUP BY `studentID`";
		$result=$db->select_query($sqlg);
		if($result){
						$rows=$result->num_rows;
						print "<input type='hidden' value='$rows' id='tstd' />";
				}
		
				$from=$db->escape($_POST["from"]);
				$to=$db->escape($_POST["to"]);
				if(isset($from) && $from != "" && isset($to) && $to != ""){
						$countStudent="SELECT * FROM `gnerate_marks` WHERE `ClassID`='$ClassId[0]' AND `ExamID`='$ExamId[0]' AND `session`='$Session'  GROUP BY `studentID` ORDER BY `studentRoll` ASC LIMIT $_POST[from],$_POST[to]";
						//print $countStudent;
						$countStudent=$db->select_query($countStudent);
						if($countStudent){
								while($fetch_student=$countStudent->fetch_array()){
								$delet="DELETE FROM `result` WHERE `STD_ID`='$fetch_student[studentID]' AND `classId`='$fetch_student[ClassID]' AND `session`='$fetch_student[session]' AND `examId`='$fetch_student[ExamID]'";
								$db->delete_query($delet);
										$sqlCountSubject="SELECT `add_subject_info`.`subject_name`,`select_subject_type`,`gnerate_marks`.* FROM `gnerate_marks` 
INNER JOIN `add_subject_info` ON `add_subject_info`.`id`=`gnerate_marks`.`subjectID`
WHERE `gnerate_marks`.`studentID`='$fetch_student[studentID]' AND `gnerate_marks`.`ClassID`='$fetch_student[ClassID]' AND `gnerate_marks`.`ExamID`='$fetch_student[ExamID]' AND `gnerate_marks`.`session`='$fetch_student[session]'";
//print $sqlCountSubject;

										$flag=0;
										$total_sub=0;
										$total_grade=0;
										$cgpa=0;
										$withOutOp=0;
										$failsubcount=0;
										$resultCSubje=$db->select_query($sqlCountSubject);
										if($resultCSubje){
										
										
											while($fetchCsub=$resultCSubje->fetch_array()){
											
												if($fetchCsub["select_subject_type"] == 'OptionalSubject')
												{
														if($fetchCsub['gradePoint']>2)
														$total_grade=($total_grade+($fetchCsub['gradePoint']-2));
														//print $total_grade;
												
												}
												else
											 {
													
												
														if($fetchCsub['letterGrade']=='F' &&  $fetchCsub["select_subject_type"] != 'OptionalSubject')
															{
																$flag=1;
																 $failsubcount=$failsubcount+1;		
																//print $flag;
															}
															
														
															$withOutOp=$withOutOp+$fetchCsub['gradePoint'];
															//print $withOutOp;
														
															 $total_sub++;
															$total_grade=$total_grade+$fetchCsub['gradePoint'];		
															 								//print $total_grade;
												}
												
											
											}//2nd loop
										$total_sub=6;
										
									
												if($total_grade>0 and $total_sub>0)
												{
													$cgpa=$total_grade/$total_sub;
												//print $cgpa;
													
													if($withOutOp>0 and $total_sub>0)
													$wopcgpa=$withOutOp/$total_sub;
												//print $wopcgpa;
												
													$wgpa=$wopcgpa;
													
													$wadditional=$wopcgpa;
													
													//print $wgpa; 
													
													
													
													$gpa=$cgpa;
													
													
													$additional=$cgpa;
													
													
													
													//print $gpa;
													if($flag==1)
													{
														$wgpa="0.00";
														$gpa="0.00";
													}
													
													if($gpa > 5.00)
													{
														$gpa = 5.00;
													
													}
												}
													
													
			$selectpasedSub="SELECT `gradePoint`,`add_subject_info`.`select_subject_type` FROM `gnerate_marks` INNER JOIN `add_subject_info` ON `add_subject_info`.`id`=`gnerate_marks`.`subjectID` WHERE `studentID`='$fetch_student[studentID]' AND `ExamID`='$fetch_student[ExamID]' AND `session`='$fetch_student[session]' AND `ClassID`='$fetch_student[ClassID]' AND `add_subject_info`.`select_subject_type`!='OptionalSubject'";


			$resultPassSub=$db->select_query($selectpasedSub);
			if($resultPassSub){
			$passsubstd=0;
				while($fetchpassSubStd=$resultPassSub->fetch_array()){

					if($fetchpassSubStd[0]!='0.00')
					{
						$passsubstd++;
						
					}
				}

			}
					$failsubcount=5-$passsubstd;
					if($failsubcount>0)
					{
						$failsubcount=$failsubcount;
						$wgpa="0.00";
						$gpa="0.00";
					}


													$insertSql="INSERT INTO `result` (`STD_ID`,`std_roll`,`classId`,`GroupID`,`session`,`examId`,`CGPA`,`witoutOptional`,`totalFailSub`,`Year`) 
													VALUES('$fetch_student[studentID]','$fetch_student[studentRoll]','$fetch_student[ClassID]',$fetch_student[GroupID],'$fetch_student[session]','$fetch_student[ExamID]','$gpa','$wgpa','$failsubcount','".date('Y')."')";
													$db->insert_query($insertSql);
										}
								
								}//1st loop
								if(isset($db->sms)){echo $db->sms;}
						}
				}
				else {
				
					print "Please Enter the Limit";
				}
		}else {
			print "Please Fill Up All Fields";
		}
	}
 
?>