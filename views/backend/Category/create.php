<?php
use App\Models\Category;
use App\Models\Brand;

$list_category = Category::where('status','!=',0)->orderBy('Created_at','DESC')->get();
$category_id_html ="";
foreach ($list_category as $category)
{
   $category_id_html .="<option value ='$category->id'>$category->name</option>";
}
?>
\<?php require_once "../views/backend/header.php";?>

<!-- CONTENT -->
<form action ="index.php?option=Category&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thêm mới danh mục</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=Category" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button type="submit" class="btn btn-sm btn-success" type="submit" name="THEM">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Thêm
               </button>
            </div>
            <div class="card-body">
                     <div class="row">
                        <div class="col-md-9">
                        <div class="mb-3">
                      
                           <label>Tên danh mục (*)</label>
                           <input type="text" name="name" id="name" placeholder="Nhập tên danh mục" class="form-control"
                              onkeydown="handle_slug(this.value);">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" id="slug" placeholder="Nhập slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mô tả</label>
                           <textarea name="description" placeholder="Nhập slug" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Danh mục cha (*)</label>
                           <select name="parent_id" class="form-control">
                              <option value="">None</option>
                              <?= $category_id_html;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
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