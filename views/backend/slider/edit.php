<?php
use App\Models\slider;
$id = $_REQUEST['id'];
$slider =  slider::find($id);
if($slider==null){
    header("location:index.php?option=slider");
}
?>

<?php require_once "../views/backend/header.php";?>
<form action="index.php?option=slider&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chỉnh sửa slider</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
            <div class="card-header text-right">

                  <button class="btn btn-sm btn-success" type="subumit"name ="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
                  <a href="index.php?option=slider" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $slider->id; ?>" />
                           <label>Tên slider (*)</label>
                           <input type="text" value="<?=$slider->name; ?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Liên kết</label>
                           <input type="text" value="<?=$slider->link; ?>" name="gender" class="form-control">
                           </div>
                        <div class="mb-3">
                           <label>Hình</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Vị trí</label>
                           <input type="text" value="<?=$slider->position; ?>" name="gender" class="form-control">
                           </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" value="1" <?=($slider->status ==1 ) ? 'selected':''; ?> >Xuất bản</option>
                              <option value="2" value="1" <?=($slider->status ==2 ) ? 'selected':''; ?> >Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>   