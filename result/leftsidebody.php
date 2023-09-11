<div class="col-md-9 col-xs-12" style="padding:0px ; margin:0px; margin-top:10px;">
											
											
											<!-- news tricker -->		
											<div class="content">
													<div class="simple-marquee-container" style="background: #fff;">
														<div class="marquee-sibling" >
															<span style="font-family:'Times New Roman', Times, serif;  padding:18px; background: rgb(61, 61, 61);">Notice</span>
														</div>
														<div class="marquee" >
															<ul class="marquee-content-items" style="background:#fff; padding-left:70px;" >
															
																 <?php
												 $select_notice="SELECT * FROM notice ORDER BY `Notice_id` DESC LIMIT 5";
												$chek_notice=$db->select_query($select_notice);
												if($chek_notice)
												{
												while($fetch_notice=$chek_notice->fetch_array())
												{
													
				?>
																<li style=" background: #fff;"><a href="?page=noticeview&noticeid=<?php echo $fetch_notice["Notice_id"] ?>"   style="font-family:'Times New Roman', Times, serif; color:#FF0000; font-size:16px;border-right:3px #ff0000 solid;"><?php   $strEvents= $fetch_notice["Title"];
																	 $sevents = $strEvents;
																	//$textEvents = substr($sevents, 0, strrpos($sevents, ' '));
																	print $sevents."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
														?>
																	
														</a></li>
																<?php }  } ?>
															
															</ul>
														</div>
													</div>
												</div>
												
													<!-- end news tricker -->
													
											<center> 	<h3> <a href="http://fgc.gov.bd/?page=OnlineClasses" style="color:#ff0000;text-align:center">  বিষয় ভিত্তিক অনলাইন লেকচার পেতে ক্লিক করুন </a> <h3>	
											</center>		
													<!-- notice board -->
													<div style="padding:0px ; margin:0px; margin-top:20px;" class="col-md-12 col-xs-12  well" id="grad">
												
															
															<div class="col-md-10 col-xs-12 col-md-offset-1" style="padding-top:30px; padding-bottom:20px;">
																<span style="color:#000000; font-size:18px; padding-left:10px;  font-family:'Times New Roman', Times, serif">Notice Board</span>
																
																		<ul class="noticeul">
																		
																 <?php
													$chek_notice=$db->select_query($select_notice);
												if($chek_notice)
												{
												while($fetch_notice=$chek_notice->fetch_array())
												{
													
				?>
													
			
															<li><a href="?page=noticeview&noticeid=<?php echo $fetch_notice["Notice_id"] ?>" style="font-size:16px;" ><i class="glyphicon glyphicon-certificate"></i>&nbsp;<?php                    $strEvents= $fetch_notice["Title"];
																	 $sevents = $strEvents;
																	//$textEvents = substr($sevents, 0, strrpos($sevents, ' '));
																	print $sevents;
														?></a></li>	<?php }  } ?>
																			
																		</ul>
																		
																	<div class="col-md-1 col-xs-1" style=" width:150px; text-align:center; float:right; margin-top:10px; height:25px; padding-top:2px;  background: -webkit-linear-gradient(top, #999999 , white);">
																			<a href="?page=allnotice" style="color:#000000; font-weight:400">ALL NOTICE</a>
																	</div>
															</div>	
																		
													</div>
													
														<!-- end notice board -->
														
														
											
											
												<div class="col-md-12 col-xs-12"  id="introduced" style="height: 35px; margin-left: 0px; padding-left: 0px;">
														<span style="font-weight: bold;; color: #fff; font-size: 18px;">ফেনী সরকারী কলেজ  এর পক্ষ থেকে স্বাগতম </span>
															
												</div>
												
													<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
													
															<p style="text-align:justify; font-size:16px; line-height:25px; padding:10px; font-family:'Times New Roman', Times, serif;   ">

																ফেনী সরকারী কলেজ শিক্ষা মন্ত্রণালয়ের অধীনে মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তরের প্রত্যক্ষ নিয়ন্ত্রণে উচ্চ মাধ্যমিক স্নাতক ও স্নাতকোত্তর পর্যায়ে পাঠদানকারী একটি সরকারী শিক্ষা প্রতিষ্ঠান।

 দক্ষিণ- পূর্ব বাংলার অন্যতম প্রাচীন ও ঐতিহ্যবাহী শিক্ষা প্রতিষ্ঠান ফেনী সরকারী কলেজ প্রতিষ্ঠার গোড়াপত্তন হয় ১৯১৮ সালে খান বাহাদুর বজলুল হকের নেতৃত্বে একটি ট্রাস্ট বোর্ড গঠনের মাধ্যমে। কলেজের জম্ম- লগ্নে প্রথম গভর্ণিং বডির সদস্য ছিলেন মরহুম খান বাহাদুর আবদুল আজিজ, মরহুম খান সাহেব মৌলভী বজলুল হক, মরহুম মৌলভী আব্দুল খালেক, মরহুম মৌলভী হাছান আলী, মরহুম মৌলভী আবদুস সাত্তার, সর্বপ্রয়াত শ্রীরমণী মোহান গোস্বাামী, সর্বপ্রয়াত শ্রীগুরু দাস কর, শ্রীকালিজয় চক্রবতী প্রমুখ। 
&nbsp;&nbsp; <a href="?page=about"> Read More...</a>

															</p>
													
													</div>
											
											<!--  mid div loop -->
											
												
											
													<div class="col-md-12 col-xs-12"  id="introduced" style="height: 35px; margin-left: 0px; padding-left: 0px;">
														<span style="font-weight: bold;; color: #fff; font-size: 18px;">আমাদের  লক্ষ্য ও উদ্দেশ্য </span>
															
												</div>
												

													<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
													
															<p style="text-align:justify; font-size:16px; line-height:25px; padding:10px; font-family:'Times New Roman', Times, serif">
															<?php  
		$stringmission=$fetch_mission_vission[2];
		
		$a=array("\r\n", "\n", "\r");
		$replace='<br />';
		$aboutmission=str_replace($a, $replace, $stringmission);
		print $aboutmission;
	  
	  
	  ?>
															</p>
													
													</div>
											
											
											<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
													
												<div class="col-md-6 col-xs-12 well" id="bodyDiv">
																		
																		<div class="col-md-12 col-xs-12" style="0px; padding:0px; padding-bottom:5px;">	<span class="spantext">About Institute</span>	</div>
																	
																		<div class="col-md-3 col-xs-3" style="padding:0px; margin:0px; display:block">
																				<img src="img/order.jpg" style="height:100px"/>
																		</div>
																		
																		<div   class="col-md-9 col-xs-9"  class="middivul">
																					<ul id="midul">
																					
																								<li><a  href="http://fgc.gov.bd/?page=OnlineClasses"><i class="glyphicon glyphicon-play"></i> &nbsp;Online Classes</a></li>
																								<li><a  href="?page=about"><i class="glyphicon glyphicon-play"></i> &nbsp; About Us</a></li>
																								<!--<li><a  href="?page=mission"><i class="glyphicon glyphicon-play"></i>&nbsp; Mission and Vision</a></li>-->
																								<li><a  href="?page=history"><i class="glyphicon glyphicon-play"></i>&nbsp; History</a></li>
																								<li><a  href="?page=contact"><i class="glyphicon glyphicon-play"></i>&nbsp; Contact Us</a></li>
																								
																					</ul>
																		</div>
																		
													</div>
															
										

													
												
											<div class="col-md-6 col-xs-12 well" id="bodyDiv">
																		
																		<div class="col-md-12 col-xs-12" style="0px; padding:0px; padding-bottom:5px;">	<span class="spantext">Academic </span>	</div>
																	
																		<div class="col-md-3 col-xs-3" style="padding:0px; margin:0px; display:block">
																				<img src="img/management-information-systems-52.jpg" style="height:100px"/>
																		</div>
																		
																		<div   class="col-md-9 col-xs-9"  class="middivul">
																					<ul id="midul">
																					
																								<li><a  href="?page=allnotice"><i class="glyphicon glyphicon-play"></i> &nbsp; Notice</a></li>
																								<li><a  href="?page=event"><i class="glyphicon glyphicon-play"></i>&nbsp; News & Events</a></li>
																								
																								<li><a  href="?page=officeorder"><i class="glyphicon glyphicon-play"></i>&nbsp; Office Order </a></li>
																								<li><a  href="?page=Organogram"><i class="glyphicon glyphicon-play"></i>&nbsp; Organogram</a></li>
																								
																					</ul>
																		</div>
																		
													</div>
															
										

															
											</div>
											
											<!--  end mid div loop -->
											
											
											
											<!-- 3rd mid div loop -->
											
											
											<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
													
											
												
												
															
													
												<div class="col-md-6 col-xs-12 well" id="bodyDiv">
																		
																		<div class="col-md-12 col-xs-12" style="0px; padding:0px; padding-bottom:5px;">	<span class="spantext">Admission</span>	</div>
																	
																		<div class="col-md-3 col-xs-3" style="padding:0px; margin:0px; display:block">
																				<img src="img/admission.png" style="height:100px"/>
																		</div>
																		
																		<div  class="col-md-9 col-xs-9"   class="middivul">
																					<ul id="midul">
																					

																					

	<li><a  href="?page=AdmissionInfo" target="_blank"><i class="glyphicon glyphicon-play"></i>&nbsp;Admission Information</a></li>


																								<li><a  href="http://app1.nu.edu.bd/" target="_blank"><i class="glyphicon glyphicon-play"></i>&nbsp; Apply Online (Under Graduate)</a></li>
																								<li><a  href="http://www.xiclassadmission.gov.bd/" target="_blank"><i class="glyphicon glyphicon-play"></i>&nbsp; HSC Admission</a></li>
																							
																			<li><a  href="http://app1.nu.edu.bd/" target="_blank"><i class="glyphicon glyphicon-play"></i>&nbsp;  NU Admission </a></li>
																								
																								




																					</ul>
																		</div>
																		
													</div>

											
											<div class="col-md-6 col-xs-12 well" id="bodyDiv">
																		
																		<div class="col-md-12 col-xs-12" style="0px; padding:0px; padding-bottom:5px;">	<span class="spantext">Result</span>	</div>
																	
																		<div class="col-md-3 col-xs-3" style="padding:0px; margin:0px; display:block">
																				<img src="img/karnataka-results.jpg" style="height:100px"/>
																		</div>
																		
																		<div  class="col-md-9 col-xs-9"   class="middivul">
																					<ul id="midul">
																					
																								<li><a  href="showResult.php" target="_blank"><i class="glyphicon glyphicon-play"></i> &nbsp; Internal Results</a></li>
																								<li><a  href="http://www.educationboardresults.gov.bd/" target="_blank"><i class="glyphicon glyphicon-play"></i>&nbsp; HSC Result

</a></li>
																								<li><a  href="http://www.nu.edu.bd/"><i class="glyphicon glyphicon-play"></i>&nbsp; National University Result</a></li>
																								<li><a  href="http://app9.nu.edu.bd/nu-web/applicantLogin"><i class="glyphicon glyphicon-play"></i>&nbsp; NU Admission Result</a></li>
																					</ul>
																					







																		</div>
																		
													</div>
													
											
															
											</div>
											
											<!-- end 3rd mid div loop -->
											
											<!-- 2nd mid div loop -->
											
											
											
											
											<!-- end 2nd mid div loop -->
												
												
												
												
											<!-- 4th mid div loop -->
											
											
											
											
											<!-- end 4th mid div loop -->
												
													<!-- 5th mid div loop -->
											
											
											<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
													
											
											
													<div class="col-md-6 col-xs-12 well" id="bodyDiv">
																		
																		
																		<div class="col-md-12 col-xs-12" style="0px; padding:0px; padding-bottom:5px;">	<span class="spantext">Academic Information</span>	</div>
																	
																		<div class="col-md-3 col-xs-3" style="padding:0px; margin:0px; display:block">
																				<img src="img/academic-icons-pack_23-2147501134.jpg" style="height:100px; "/>
																		</div>
																		
																		<div  class="col-md-9 col-xs-9"   class="middivul">
																					<ul id="midul">
																					
																								<li><a  href="?page=calendar"><i class="glyphicon glyphicon-play"></i> &nbsp; Academic Calendar</a></li>
																								<li><a  href="?page=uniform"><i class="glyphicon glyphicon-play"></i>&nbsp; Uniform Picture and Details</a></li>
																								<li><a  href="?page=examroutine&ID=routine_id"><i class="glyphicon glyphicon-play"></i>&nbsp; Exam Routine</a></li>
																								<li><a  href="?page=holiday"><i class="glyphicon glyphicon-play"></i>&nbsp; Holiday List</a></li>
																								
																								








																					</ul>
																		</div>
																		
													</div>
													
												
													
													
													

												<div class="col-md-6 col-xs-12 well" id="bodyDiv">
																		
																		<div class="col-md-12 col-xs-12" style="0px; padding:0px; padding-bottom:5px;">	<span class="spantext">Voluntary force</span>	</div>
																	
																		<div class="col-md-3 col-xs-3" style="padding:0px; margin:0px; display:block">
																				<img src="img/collaboration-512.png" style="height:100px"/>
																		</div>
																		
																		<div  class="col-md-9 col-xs-9"  class="middivul">
																					<ul id="midul">
																					
																								<li><a  href="?page=scout"><i class="glyphicon glyphicon-play"></i> &nbsp; Rover Scout</a></li>
																								<li><a  href="?page=BNCC"><i class="glyphicon glyphicon-play"></i>&nbsp; BNCC</a></li>
																								<li><a  href="?page=red"><i class="glyphicon glyphicon-play"></i>&nbsp; Red Cricent</a></li>
																								<li><a  href="#"><i class="glyphicon glyphicon-play"></i>&nbsp; Liberary</a></li>
																					</ul>
																		</div>
																		
													</div>

											
												
										





												
											
															
											</div>
											
											<!-- end 5th mid div loop -->
												
												
												
																<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
													

<div class="col-md-6 col-xs-12 well" id="bodyDiv">
																		
																		<div class="col-md-12 col-xs-12" style="0px; padding:0px; padding-bottom:5px;">	<span class="spantext">Other Link</span>	</div>
																	
																		<div class="col-md-3 col-xs-3" style="padding:0px; margin:0px; display:block">
																				<img src="img/link-page.jpg" style="height:100px; "/>
																		</div>
																		
																		<div  class="col-md-9 col-xs-9"   class="middivul">
																					<ul id="midul">
																					
																								<li><a  href="#"><i class="glyphicon glyphicon-play"></i> &nbsp; College Mosque</a></li>
																								<li><a  href="?page=Hostel Information"><i class="glyphicon glyphicon-play"></i>&nbsp; Hostel </a></li>
																								<li><a  href="?page=Transport Information"><i class="glyphicon glyphicon-play"></i>&nbsp; Science LAB </a></li>
																								<li><a  href="#"><i class="glyphicon glyphicon-play"></i>&nbsp; FLTC-2</a></li>
																				</ul>
																		</div>
																		
													</div>
									
									</div>
												
											<!-- photo gallery -->

														<div class="col-md-12 col-xs-12" style="padding:0px; margin:0px;">
																

																<?php
								$selectVideo= "SELECT * FROM `video_gallery` where  sl='1'";
								$queryVideo=$db->select_query($selectVideo);
								if($queryVideo)
								{
									$fetchVideoLink = $queryVideo->fetch_array();
																?>
																	<iframe style="height:400px; width:100%;" src="<?php print $fetchVideoLink ['url']?>" frameborder="0" allow="autoplay; encrypted-media" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
									<?php
								}
								?>
											
														</div>
											<!--  end gallery -->
												
												
												</div>