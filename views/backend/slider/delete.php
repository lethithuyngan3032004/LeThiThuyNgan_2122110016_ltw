<?php

use App\Models\slider;

$id = $_REQUEST['id'];
$slider =  slider::find($id);
if($slider==null){
    header("location:index.php?option=slider");
}
//
$slider->status =0;
$slider->updated_at = date('Y-m-d H:i:s');
$slider->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$slider->save();
header("location:index.php?option=slider");