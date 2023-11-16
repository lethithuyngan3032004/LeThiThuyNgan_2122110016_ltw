<?php
use App\Models\slider;
$list = slider::where('status','!=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
<form action ="index.php?option=slider&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả slider</h1>
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
                     <a href="index.php?option=slider" class="btn btn-sm btn-primary">Tất cả</a>
                     <a href="index.php?option=slider&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="index.php?option=slider&cat=create" class="btn btn-sm btn-success">Thêm slider</a>
                  </div>
               </div>
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
       
                           <th>Tên slider</th>
                           <th>Liên kết</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item   ):?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                          
                           <td>
                              <div class="name">
                              <?= $item->name ; ?> 
                              </div>
                              <div class="function_style">
                                 <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=slider&cat=status&id=<?=$item->id; ?>" class="btn 
                                       btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện
                                       </a>
                                       <?php else : ?>
                                       <a href="index.php?option=slider&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i> Ẩn
                                       </a>
                                       <?php endif; ?>
                                       <a href="index.php?option=slider&cat=edit&id=<?=$item->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa
                                       <a href="index.php?option=slider&cat=show&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                       </a>
                                       <a href="index.php?option=slider&cat=delete&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá
                                       </a>
                                 </div>
                           </td>
                           <td>    <?= $item->link ; ?> </td>
                        </tr>
                        <?php endforeach;?>
                              <?php endif;?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
</form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>