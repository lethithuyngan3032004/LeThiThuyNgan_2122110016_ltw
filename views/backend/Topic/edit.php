<?php

use App\Libraries\MyClass;
use App\Models\Topic;

$id = $_REQUEST['id'];
$list = Topic::where([['status', '!=', 0], ['id', '!=', $id]])->get();
$topic =  Topic::find($id);
if ($topic == null) {
   MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
   header("location:index.php?option=topic");
}
?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật chủ đề</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=topic" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Cập nhật
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-8">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $topic->id; ?>" />
                        <label>Tên chủ đề (*)</label>
                        <input type="text" value="<?= $topic['name']; ?>" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>slug</label>
                        <input type="text" value="<?= $topic['slug']; ?>" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" value="<?= $topic["description"]; ?>" class="form-control"></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($topic->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($topic->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
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
<?php require_once "../views/backend/footer.php"; ?>