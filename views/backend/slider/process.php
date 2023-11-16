<?php
use App\Models\Slider;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $slider = new Slider();
    //Lấy từ form
    $slider->name= $_POST['name'];
    $slider->link = $_POST['link'];
    $slider->position= $_POST['position'];
    $slider->status= $_POST['status'];
    //Xử lý upload file
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/slider/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=date('YmdHis').'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $slider->image =$filename;
        }
    }
    //Tự sinh ra
    $slider->created_at = date('Y-m-d H:i:s');
    $slider->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($slider);
    //Lưu vào CSDL
    //INSERT INTO slider 
    $slider->save();
    //Chuyển hướng về index
    header("location:index.php?option=slider");
}



if (isset($_POST['CAPNHAT'])) {
    $id=$_POST ['id'];
    $slider= Slider::find($id);
    if($slider==null){
        header("location:index.php?option=slider");
    }
    //Lấy từ form
    $slider->name= $_POST['name'];
    $slider->link = $_POST['link'];
    $slider->position= $_POST['position'];
    $slider->status= $_POST['status'];
    //Xử lý upload file
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/slider/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=date('YmdHis').'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $slider->image =$filename;
        }
    }
    //Tự sinh ra
    $slider->created_at = date('Y-m-d H:i:s');
    $slider->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($slider);
    //Lưu vào CSDL
    $slider->save();
    //Chuyển hướng về index
    header("location:index.php?option=slider");
}