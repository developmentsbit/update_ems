

<div class="col-md-9 col-xs-12" style="padding:0px ; margin:0px; margin-top:10px; ">
						
							<div class="col-md-4 col-xs-12" id="noticetopdiv" style="margin-top:2px">
									
										<span>Text Size</span>
									
										&nbsp;&nbsp;&nbsp;&nbsp; <a  style="text-decoration:none; cursor:pointer" onclick="fontsize16()"><span style="font-size:14px">A</span></a>
										
									    &nbsp;&nbsp;<a style="text-decoration:none; cursor:pointer" onclick="fontsize18()">	<span style="font-size:18px">A</span></a>
										
										&nbsp;&nbsp;<a  style="text-decoration:none; cursor:pointer" onclick="fontsize20()"> <span style="font-size:20px">A</span></a>
							</div>
							
							<div class="col-md-4 col-xs-12" id="noticetopdiv" style="margin-top:2px;">
							
							
							
									<div class="col-md-2 col-xs-2" style="padding:0px; margin:0px;  font-size:14px;
		 color:#FFFFFF;" >Color</div>
										
										<div class="col-md-10 col-xs-10" style="padding:0px; margin:0px;">
										&nbsp;&nbsp;&nbsp;&nbsp; <a  style="cursor:pointer" onclick="backgroupcolone()"> <div id="colordiv">C</div></a>
										
									    &nbsp;&nbsp;	 <a  style="cursor:pointer"  onclick="backgroupcoltwo()"> <div  id="colordivone">C</div></a>
										
										&nbsp;&nbsp; <a  style="cursor:pointer"  onclick="backgroupcolthree()"> <div  id="colordivtwo">C</div></a>
										
										&nbsp;&nbsp;<a   style="cursor:pointer" onclick="backgroupcolfour()">  <div  id="colordivthree">C</div> </a>
										</div>
							</div>
							
														
</div>		
<style>
       #boxshadow {
        position: relative;
        box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
      
        background: white;
}


</style>

<div class="col-md-9 col-xs-12 fontsize backgroundcol"  style="padding:0px ; margin:0px; margin-top:10px; padding-top:10px;" >

				<div class="col-md-6 col-xs-6" style="margin:0px;
				padding:0px; float:left; clear:right; text-align:left;">
						<span id="noticetitle"  style="color:#000000; font-size:20px; font-family:'Times New Roman', Times, serif; font-weight:300;">
					All Subject
						
						</span>
						
				</div>
			
				
				
		<div class="col-md-12 col-xs-12" style="margin:0px; padding:0px; margin-top:5px;">
				
				<table class="table table-bordered table-responsive">
				<?php

				$sqlsub="SELECT * FROM `add_subject_info` WHERE `class_id`='".$_GET["cls"]."' AND `group_id`='".$_GET["gpid"]."' GROUP BY `subject_name` ORDER BY `serial` ASC ";

				
				$allsub=$db->select_query($sqlsub);
					if($allsub)
					{
						$i=1;
						while($fetch_Name=$allsub->fetch_array())
						{



				?>
						<tr>
									<td><?php print $i++;?></td>
									<td><a href="?page=subwiseLecture&cls=<?php print $_GET['cls'];?>&gpid=<?php print $_GET['gpid'];?>&subId=<?php print $fetch_Name[0]?>"> <?php print $fetch_Name[3]?> </a> </td>


						</tr>

						<?php

					}
				}


					?>

				<tbody>
				    
				    
	<br>
		



		</tbody>
		</table>
				
				
		
				
			
				
			
		</div>
		
		
</div>


