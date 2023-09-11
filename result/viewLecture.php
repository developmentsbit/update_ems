

  

<?php
		if(isset($_GET["id"])){
				$sql = "SELECT * FROM `online_lecture` WHERE `id`='".$_GET["id"]."'";
		}
			
		
		
		
		$resultsql = $db->select_query($sql);
			if($resultsql->num_rows > 0){
						$fetchsql = $resultsql->fetch_array();
						//print_r($fetchsql);
			}


	
?>
 
  

<style type="text/css">
	@media print{

.print{ display: none; }

}

</style>


<div class="col-md-9 col-xs-12 print" style="padding:0px ; margin:0px; margin-top:10px; ">
						
							<div class="col-md-4 col-xs-12 print" id="noticetopdiv" style="margin-top:2px">
									
										<span>Text Size</span>
									
										&nbsp;&nbsp;&nbsp;&nbsp; <a  style="text-decoration:none; cursor:pointer" onclick="fontsize16()"><span style="font-size:14px">A</span></a>
										
									    &nbsp;&nbsp;<a style="text-decoration:none; cursor:pointer" onclick="fontsize18()">	<span style="font-size:18px">A</span></a>
										
										&nbsp;&nbsp;<a  style="text-decoration:none; cursor:pointer" onclick="fontsize20()"> <span style="font-size:20px">A</span></a>
							</div>
							
							
							<div class="col-md-4 col-xs-12 print" id="noticetopdiv" style="margin-top:2px;">
									
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

		
				<div class="col-md-12 col-xs-12 print" style="margin:0px;
					padding:0px;  text-align:left; " >
							<img src="img/Printer-icon.png"  style="height:40px; width:40px;" alt="Print"  onclick="window.print()" />
				</div>
				
				<div class="col-md-12 col-xs-12" style="margin:0px;
				padding:0px;  padding-top:20px; "> 
				<span style="float:left; text-align: left;padding-left:5px; font-size: 18px; "> </span>
				<span style="float:right; text-align:right; padding-right: 10px;"><?php echo $fetchsql['date'];?></span>

				</div>
				
				<div class="col-md-12 col-xs-12"  style="width:100%; border-bottom:1px #E4E4E4 solid; margin-top:10px;">
				
				</div>
				
				
				
				
		<div class="col-md-12 col-xs-12" style="margin:0px; padding:0px; margin-top:5px;">
				
				
				
				<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
						
						<span  class="changetitle"   style="font-size:24px;" ><h2><?php echo $fetchsql["title"];?> </h2></sapn><br/>	
						Share with :<div class="addthis_inline_share_toolbox"></div>
					

			<?php if($fetchsql["pdf"] == "pdf" or $fetchsql["pdf"] == "pptx" or $fetchsql["pdf"] == "docx"){ ?>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">	
						<label>	<h3>  <a href="onlineClass/<?php echo $fetchsql["id"];?>.<?php echo $fetchsql["pdf"];?>" download="download"> Download PDF </a> </h3></label>
						</div>
						
							 	<div class=" col-sm-6 col-xs-6  hidden-lg  hidden-md">
							 	    <h3>		
						<object data="data/<?php echo $fetchsql["title"];?>.pdf" type="application/pdf" width="400" height="800">
<a href="onlineClass/<?php echo $fetchsql["id"];?>.<?php echo $fetchsql["pdf"];?>" target="_blank">Preview PDF </a>
</object>		</h3> 


						</div>
						
							
						<div class="col-lg-12 col-md-12 col-sm-12  hidden-xs">			
				<object height="800" width="100%" data="onlineClass/<?php echo $fetchsql["id"];?>.<?php echo $fetchsql["pdf"];?>"></object>
									</div>
									
									
				
								<br/>
								<br/>
							

																	 <?php }
																	 else
																	 {
																	        if($fetchsql["pdf"] == "pdf" or $fetchsql["pdf"] == "pptx" or $fetchsql["pdf"] == "docx"){ ?>
					
							<label> <a href="onlineClass/<?php echo $fetchsql["id"];?>.<?php echo $fetchsql["pdf"];?>" download="download"> Download PDF </a>  </label><br>
							<?php
																	        }
																	        
																	        
																	        ?>

																		<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="<?php echo $fetchsql["video_url"];?>" allowfullscreen></iframe>
  
</div>


																	<?php

																	 }
?>



		

				<p style="text-align:justify; font-family:'Times New Roman', Times, serif">
									<?php  
														$string=$fetchsql["details"];
														
														$a=array("\r\n", "\n", "\r");
														$replace='<br />';
														$about=str_replace($a, $replace, $string);
														print $about;
													  
													  
													  ?>
													</p>
								



					
						<!-- share with : <div class="addthis_inline_share_toolbox"></div> -->


				</div>
				
		</div>



</div>

