<?php 

session_start();
error_reporting(1);
@date_default_timezone_set('Asia/Dhaka');
require_once("conect.php");
$db = new database();

$class = $_POST['class_id'];

$class_id = explode('and',$_POST['class_id']);


$data = $db->link->query("SELECT * FROM `add_group` WHERE `class_id`='$class_id[0]'");

$output = '';

if($data)
{
    while($fetch = $data->fetch_assoc())
    {
        $output .= '<option value="'.$fetch['id'].'">'.$fetch['group_name'].'</option>';
    }
}


echo $output;




?>