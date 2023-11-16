<?php

use App\Models\Slider;

$id = $_REQUEST['id'];
$slider =  Slider::find($id);
if($slider==null){
    header("location:index.php?option=slider");
}
//
$slider->delete();// xóa vv
header("location:index.php?option=slider&cat=trash");