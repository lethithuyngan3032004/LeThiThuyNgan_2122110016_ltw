<?php

use App\Models\order;

$id = $_REQUEST['id'];
$order = order::find($id);
if($order==null){
    header("location:index.php?option=order&cat=trash");
}
$order->delete();// xóa vv
header("location:index.php?option=order&cat=trash");