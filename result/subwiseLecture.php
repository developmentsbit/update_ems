

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
				All Lecture
						
						</span>
						
				</div>
			
				
				
		<div class="col-md-12 col-xs-12" style="margin:0px; padding:0px; margin-top:5px;">
				
				<table class="table table-bordered table-responsive">
				<tr><td>
				<?php

				$sqlsub="SELECT * FROM `online_lecture` WHERE `class_ID`='".$_GET["cls"]."' AND `Group_ID`='".$_GET["gpid"]."' AND `subject_Id`='".$_GET["subId"]."'";


				$allsub=$db->select_query($sqlsub);
					if($allsub)
					{
						$i=1;
						while($fetch_Name=$allsub->fetch_array())
						{
				?>
				<div class=" col-lg-4 col-md-4 col-sm-12  col-xs-12" >

				<label><h2>  <a href="?page=viewLecture&id=<?php print $fetch_Name[id]?>"> <?php print $fetch_Name["title"]?></h2></label> 
				
				
				<?php if($fetch_Name['video_url']=="")
				{
					?>
				<label>	 <a href="?page=viewLecture&id=<?php print $fetch_Name[id]?>"> <img src="img/pdf.jpg"></a>  </label>
				<?php
						}
						else
						{


				?>
				
				<label>	 <a href="?page=viewLecture&id=<?php print $fetch_Name[id]?>"> <img src="img/video.png"> </a> </label>

					<?php
				}
					?>

				</div>
				
					<?php

					}
				}
					?>
</td></tr>
				<tbody>
						
						
		</tbody>
		</table>
				
				
		
				
			
				
			
		</div>
		
		
</div>


