<?php
use App\Models\Category;
$list =Category::where('status','!=',0)->orderBy('created_at','DESC')->get();
?>
<?php require_once '../views/backend/header.php';?>
<!-- CONTENT -->
<form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả danh mục</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header">
                 <div class="row">
                 <div div class="col-md-6">
                     <a href="index.php?option=category" class="btn btn-sm btn-primary">Tất cả</a>
                     <a href="index.php?option=category&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
                  <div div class="col-md-6 text-right">
                     <a href="index.php?option=category&cat=create" class="btn btn-sm btn-success">Thêm danh mục</a>
                  </div>
      
               </div>
               </div>
               <div class="card-body">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:100px;">Hình ảnh</th>
                                 <th>Tên danh mục</th>
                                 <th>Tên slug</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if(count($list)>0): ?>
                                 <?php foreach ($list as $item) : ?>
                                    <tr class="datarow">
                                       <td>
                                          <input type="checkbox">
                                       </td>
                                       <td>
                                          <img src="../public/images/category/<?= $item ->image; ?>" alt="<?= $item ->image; ?>" style="width:70px;height:140px;">
                                       </td>
                                       <td>
                                          <div class="name">
                                             <?= $item ->name; ?>
                                          </div>
                                          <div class="function_style">
                                       <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=category&cat=status&id=<?=$item->id; ?>" class="btn 
                                       btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện
                                       </a>
                                       <?php else : ?>
                                       <a href="index.php?option=category&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i> Ẩn
                                       </a>
                                       <?php endif; ?>
                                          <a href="index.php?option=category&cat=edit&id=<?=$item->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa

                                       </a>
                                       <a href="index.php?option=category&cat=show&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                       </a>
                                       <a href="index.php?option=category&cat=delete&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá
                                          
                                       </a>
                                          </div>
                                       </td>
                                       <td><?= $item -> slug;?></td>
                                    </tr>

                                 <?php endforeach; ?>
                              <?php endif;?>
                           </tbody>
                        </table>

                  </div>
               </div>
            </div>
         </section>
      </div>
</form>
      <!-- END CONTENT-->
      <?php require_once '../views/backend/footer.php';?>