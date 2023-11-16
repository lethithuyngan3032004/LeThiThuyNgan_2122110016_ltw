<?php
use App\Models\Slider;

$id = $_REQUEST['id'];
$slider =  Slider::find($id);
if($slider==null){
    header("location:index.php?option=slider");
}

$list = Slider::where('status','=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết slider</h1>
                     <a href="index.php?option=slider&cat=create" class="btn btn-sm btn-primary">Thêm thành viên</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="text-right">
                  <a href="index.php?option=slider" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  </div>
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th>Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr>
                     <td>ID</td>
                         <td><?= $slider->id;?></td>
                     </tr>
                     <tr>
                     <td>name</td>
                         <td><?= $slider->name;?></td>
                     </tr>
                     <tr>
                     <td>link</td>
                         <td><?= $slider->link;?></td>
                     </tr>
                     <tr>
                        <td>Hình</td>
                        <td><img class="img-fluid" width="300px;" src="../public/images/slider/<?=$slider->image;?>" alt="<?=$slider->image;?>"></td>
                     </tr>
                     <tr>
                     <td>Vị trí</td>
                         <td><?= $slider->position;?></td>
                     </tr>
                     <tr>
                     <td>sort_order</td>
                         <td><?= $slider->sort_order;?></td>
                     </tr>
                     <tr>
                     <td>created_at</td>
                         <td><?= $slider->created_at;?></td>
                     </tr>
                     <tr>
                     <td>created_by</td>
                         <td><?= $slider->created_by;?></td>
                     </tr>
                     <tr>
                     <td>updated_at</td>
                         <td><?= $slider->updated_at;?></td>
                     </tr>
                     <tr>
                     <td>updated_by</td>
                         <td><?= $slider->updated_by;?></td>
                     </tr>
                     <tr>
                     <td>Trạng thái</td>
                         <td><?= $slider->status;?></td>
                     </tr>


                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>