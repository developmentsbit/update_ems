<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	

    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();
    global $msg;
    global $table;
    global $chek_query;
	$prefix=date("y"."m"."d");
	$fetch_query[0]=$db->withoutPrefix('downloadfile','id',$prefix,'18');
    
	if(isset($_POST["add"]))
    {   
        $date=$db->escape($_POST["date"]);
        $title=$db->escape($_POST["title"]);
        $id=$db->escape($_POST["idd"]);
       
        if(!empty($title)) {
           
       
       
        $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

        $expensions= array("jpeg","jpg","png","pdf","docx","doc","xlsx");         
                
              
                  
                
                
                @$inserquery="INSERT INTO `downloadfile`(`id`,`Date_time`,`Title`,`Extension`) VALUES('".$id."','$date','$title','$file_ext')";
              // print $inserquery;
                  $path="../other_img/".$id.'.'.$file_ext;
                 @move_uploaded_file($_FILES['file']['tmp_name'],$path);
               $db->insert_query($inserquery);
            
                    
             
      
      } 
  }
      
if(isset($_POST["view"]))
{
    $query="select * from downloadfile ORDER BY `Date_time` DESC";
        $result=$db->select_query($query);
        $table="<div class='col-md-12' style='margin-top:30px'>"."<table class='table table-responsive table-hover table-bordered' align='center' style='margin-top:-20px;'>";
        $table.="<tr>"."<td align='left'>"."<a href='download_file.php' class='btn btn-primary'>"."<span class='link text-center'>Back<span>"."</a>"."</td>".
        "<td colspan='6' align='center'>"."<span class='text-success' style='font-size:18px; font-weight:blod;'>View File </span>"."</td>"."</tr>";
        if($result){
            $table.="<tr>"."<td>Date</td>"."<td>Title</td>"."<td>File</td>"."<td>Edit Or Delete</td>"."</tr>";
            $count=mysqli_num_fields($result);
                while($fetch_All=$result->fetch_array())
                {
                   $table.="<tr>";
                    for ($i=1; $i <$count-1 ; $i++) { 
                        $table.="<td>".$fetch_All[$i]."</td>";
                    }
                    
                    if($fetch_All[4]=="")

                    {$table.="<td>".'<a href="../other_img/'.$fetch_All[0].'.'.$fetch_All[3].'" class="btn btn-primary" target="_blank">Download</a>'."</td>";}
                    else
                    {
                        $table.="<td>".$fetch_All[4]."</td>";
                    }
                        $table.="<td>";
                         $table.="<a style='width:80px; margin-left:5px; margin-top:2px;' href='?edit=$fetch_All[0]' class='btn btn-danger' onclick='return confirm_delete()'>Edit</a>";
                        $table.="<a style='width:80px; margin-left:5px; margin-top:2px;' href='?dlt=$fetch_All[0]&ext=$fetch_All[3]' class='btn btn-danger' onclick='return confirm_delete()'>Delete</a>";
                        $table.="</td>";
                 $table.="</tr>";
                   

                }
        }

        $table.="</table>"."</div>";
}

if(isset($_GET["dlt"]))
{
    $Delete="DELETE FROM `downloadfile` WHERE `id`='".$_GET["dlt"]."'";
    $db->delete_query($Delete);
    @unlink("../other_img/".$_GET['dlt'].".".$_GET['ext']."");
    print "<script>location='download_file.php'</script>";
    $fetch_query[0]=$db->withoutPrefix('downloadfile','id',"file".$prefix,'10');
    


}

if(isset($_GET["edit"]))
{
        $select_query="SELECT * FROM `downloadfile` WHERE `id`='".$_GET["edit"]."'";
        $chek_query=$db->select_query($select_query);
        if($chek_query){
            $fetch_query=$chek_query->fetch_array();
        }
}
     if(isset($_POST["Update"]))
    {   
        $date=$db->escape($_POST["date"]);
        $title=$db->escape($_POST["title"]);
        
        if(!empty($title)) {
                if(isset($_FILES["file"])){

        @$file_name = $_FILES['file']['name'];
        @$file_size =$_FILES['file']['size'];
        @$file_tmp =$_FILES['file']['tmp_name'];
        @$file_type=$_FILES['file']['type'];   
        @$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

        $expensions= array("jpeg","jpg","png","pdf","docx","doc","xlsx");         
                
                if(in_array($file_ext,$expensions) === false){
                    $msg="extension not allowed, please choose another file.";
                } 
                else  if($file_size > 2097152){
                 $msg='File size must be excately 2 MB';
                }  
                else{
                @$inserquery="REPLACE INTO `downloadfile`(`id`,`Date_time`,`Title`,`Extension`) VALUES('".$_POST["id"]."','$date','$title','$file_ext')";
                  
                     @move_uploaded_file($file_tmp,"../other_img/".$_POST["id"].'.'.$file_ext);
            }  
                }   
                else{
				//print "dd";
					
					$selext = "SELECT `Extension` FROM `downloadfile` WHERE `id`='".$_POST["id"]."'";
					$resultext =  $db->select_query($selext);
					if($resultext > 0){
						$fetch_ext = $resultext->fetch_array();
					}
					
                                    @$inserquery="REPLACE INTO `downloadfile`(`id`,`Date_time`,`Title`,`Extension`) VALUES('".$_POST["id"]."','$date','$title','$fetch_ext[0]')";
                  
                   
                }  
                  @$chek_insert=$db->update_query($inserquery);
				   $select_query="SELECT * FROM `downloadfile` WHERE `id`='".$_POST["id"]."'";
        $chek_query=$db->select_query($select_query);
        if($chek_query){
            $fetch_query=$chek_query->fetch_array();
        }
        }
        else
        {
            $msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
        }
      } 
    
      if (isset($_POST["Exit"])) {
            print exit;
      }
    ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>
        
     <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
  
  
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
	
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
     <script src="datespicker/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
    $(document).ready(
        function()
        {
            $('#redactor').redactor();
        }
    );
    
    	function confirm_click()
    	{
    		$confirm_click=confirm('Are You Confirm Update');
    		if($confirm_click===true)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}

    	function confirm_delete()
    	{
    		$confirm_click=confirm('Are You Confirm Delete');
    		if($confirm_click===true)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}
          $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "dd/mm/yyyy"
                    });  
                
                });

 function checkforText()
    {
        if (document.getElementById("forText").checked == true)
        {
            //alert("aa");
            document.notice.descreption.disabled=false;
            document.notice.file.disabled=true;
    

        }
        else
        {
            //alert("bb");
            document.notice.descreption.disabled=true;
            document.notice.file.disabled=true;
    

        }
    }   
    
    function checkforboth()
    {
        if (document.getElementById("both").checked == true )
        {
        //alert("aa");
            document.notice.descreption.disabled=false;
            document.notice.file.disabled=false;
        }
    }

    function checkforFile()
    {
        if (document.getElementById("forFile").checked)
        {
        //alert("aa");
            document.notice.file.disabled=false;
            document.notice.descreption.disabled=true;  

        }
        else
        {
            //alert("bb");
            document.notice.file.disabled=true;
            document.notice.descreption.disabled=true;
            //document.routine.notice_details.disabled=true;

        }
    }

      </script>
    </head>
    <body>
    <form name="notice" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >
    <?php if(isset($_POST["view"]))
    {
        if(!$result)
        {
            echo "<span class='text-danger' style='font-size:22px;'>"."<strong>"."No Notice  Found"."<a href='download_file.php'>"."Go Back"."</a>"."<strong>"."</span>";
        }
        else
        {
        echo $table;
        }
    }
    else
    {?>
        <div class="has-feedback col-xs-12 col-sm-8 col-lg-8 col-md-8 col-sm-offset-2 col-md-offset-2">
            <table align="center" class="table table-responsive box" style="border:1px #CCCCCC solid; margin-top:30px; color: #000;">
                            <tr>
                <td  class="warning" colspan="3" align="center"><span style="font-size:22px; color:#333; display:block;">
Download File </span> </td>
            </tr>
         <tr class="info">
        <td align="right">Date&nbsp;</td>
        <td>:</td>
        <td>
          <div class="col-sm-12 col-md-12">
          <input type="text" name="date" id="example1" <?php if($chek_query){?> value="<?php echo $fetch_query[1];?>"  <?php } else  {?> value="<?php print date('d/m/Y')?>" <?php }?> class="form-control" placeholder="Date" autocomplete="off"/>
          </div>
          </td>
      </tr>
      
         <tr class="info">
        <td align="right">ID &nbsp;</td>
        <td>:</td>
        <td>
          <div class="col-sm-12 col-md-12">
         
          <input type="text" name="idd" autocomplete="off" class="form-control"  />
          </div>
          </td>
      </tr>
      
      
      <tr class="info">
        <td align="right">Title &nbsp;</td>
        <td>:</td>
        <td>
          <div class="col-sm-12 col-md-12">
          <input type="hidden" name="id" value="<?php echo @$fetch_query[0];?>"></input>
          <input type="text" name="title" autocomplete="off" <?php if($chek_query){?> value="<?php echo $fetch_query[2];?>"  <?php } else {?> value="" <?php }?> class="form-control" placeholder="Title"   />
          </div>
          </td>
      </tr>
  

  
    <tr class="info">
            <td align="right" width="180"> File Upload &nbsp; </td>
            <td>:</td>
            <td><input type="file" name="file" accept="image/*"  />
            
            </td>
          </tr>  
    <tr>
                <td class="danger" colspan="3" align="center"><span>
                    <?php 
                        if(isset($msg))
                        {
                            echo "<strong>".$msg."</strong>";
                        }
                        else
                        {
                             echo "<strong>".$db->sms."</strong>";
                        }

                    ?>

                </span> </td>
            </tr>
          
    <tr>
                <td bgcolor="#f4f4f4" class="warning" colspan="3"align="center" >
                <?php if(!$chek_query){ ?>
                    <input type="submit" value="Add" name="add" class="btn btn-primary btn-sm" style="width:80px;" />
                    <?php } else {?>
                    <input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-primary btn-sm" style="width:80px;"/>
                    <?php } ?>
                    <input type="submit" value="View" name="view" class="btn btn-primary btn-sm" style="width:80px;"/>
                                 
                    <input type="submit" value="Exit" name="Exit" class="btn btn-primary btn-sm" style="width:80px;"/>
                </td>
            </tr>
            </table>
        </div>
        <?php 
        } ?>
    </form>
    </body>
    </html>
    	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>


