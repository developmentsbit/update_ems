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
    global $chek_all;
 
 $select_all="select * from presedent_info";
 $chek_all=$db->select_query($select_all);
 if($chek_all)
 {
    $fetch_all=$chek_all->fetch_array();
 }
    if(isset($_POST["add"]))
    {   
        $name=$db->escape($_POST["name"]);
        $title=$db->escape($_POST["title"]);
        $detaile=$db->escape(isset($_POST["descreption"])?$_POST["descreption"]:"");
        if(!empty($_POST["name"])  &&  !empty($_POST["title"]) && !empty($detaile))

         {
             @$inserquery="INSERT INTO `presedent_info` (`id`,`name`,`title`,`details`) VALUES('1','$name','$title','$detaile')";
              @$chek_insert=$db->insert_query($inserquery);
                    //print_r($inserquery);
                @$path="../other_img/Prasidenimg.jpg";
                @move_uploaded_file($_FILES["file"]["tmp_name"], $path);
				$select_all="select * from presedent_info";
 $chek_all=$db->select_query($select_all);
 if($chek_all)
 {
    $fetch_all=$chek_all->fetch_array();
 }
        }
        else
        {
            $msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
        }
      } 
      

if(isset($_POST["Delete"]))
{
    $Delete="DELETE FROM `presedent_info` WHERE `id`='1'";
    $db->delete_query($Delete);
    print "<script>location='Prasident_speek.php'</script>";
    unlink("../other_img/Prasidenimg.jpg");
    


}

     if(isset($_POST["Update"]))
    {   
         $name=$db->escape($_POST["name"]);
        $title=$db->escape($_POST["title"]);
        $detaile=$db->escape(isset($_POST["descreption"])?$_POST["descreption"]:"");
        if(!empty($_POST["name"])  &&  !empty($_POST["title"]) && !empty($detaile))

         {
                  @$inserquery="REPLACE INTO `presedent_info` (`id`,`name`,`title`,`details`) VALUES('1','$name','$title','$detaile')";
                  
                  @$chek_insert=$db->update_query($inserquery);
                 @$path="../other_img/Prasidenimg.jpg";
                @move_uploaded_file($_FILES["file"]["tmp_name"], $path);

 $select_all="select * from presedent_info";
 $chek_all=$db->select_query($select_all);
 if($chek_all)
 {
    $fetch_all=$chek_all->fetch_array();
 }
                    //print_r($inserquery);
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

 
      </script>
    </head>
    <body>


       <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>President Message</b></div>
  <div class="panel-body">
    <form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >
   <div class="col-md-9 col-md-offset-1" id="AddMarksStep1" style="margin-top: 20px;">




      <div class="form-group">
    <label > Name  :</label>
   <input type="text" name="name" <?php if($chek_all){?>  value="<?php echo $fetch_all[1];?>" <?php } else {?> value="" <?php }?> class="form-control" placeholder="Name" style="border-radius: 0px; height: 40px;" />


  </div>  




      <div class="form-group">
    <label >Title :</label>
     <input type="text" name="title" <?php if($chek_all){?> value="<?php echo $fetch_all[2];?>" <?php } else {?> value="" <?php }?> class="form-control" placeholder="Title" style="border-radius: 0px; height: 40px;" />


  </div>  




      <div class="form-group">
    <label >Message :</label>
      <textarea  name="descreption" class="form-control" id="redactor"><?php if($chek_all){echo $fetch_all[3]; } else { echo ""; }?> </textarea>

  </div>  





      <div class="form-group">
    <label >Picture  :</label>
    <input type="file" name="file"  />

          <?php
            if($chek_all){

           ?>
           <img src="../other_img/Prasidenimg.jpg" class="img-responsive img-thumbnail" height="120" width="100">
           <?php }?>


  </div>  


<span>
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

                </span>


      <br><br>

       <?php 
                    if(!$chek_all){?>
   
                    <input type="submit" value="Add" name="add" class="btn btn-info btn-sm" style="width:80px; border-radius: 0px;" />
                    <?php } else {?>
                    <input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-primary btn-sm" style="width:80px;"/>
                 <?php } ?>
                    <input type="submit" value="Delete" name="Delete" class="btn btn-danger btn-sm" style="width:80px; border-radius: 0px;"  onclick='return confirm_delete()'/>               
                    <input type="submit" value="Exit" name="Exit" class="btn btn-warning btn-sm" style="width:80px; border-radius: 0px;"/>




   </div>
 </form>
</div>
</div>
</div>



    </body>
    </html>
	        	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

    

