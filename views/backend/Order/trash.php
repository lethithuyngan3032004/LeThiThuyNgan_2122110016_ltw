<?php
use App\Models\order;
$list = order::where('status','=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=order&cat=process" method="order" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng rác đơn hàng</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header">
               <div class="row">
               <div class="text-right">
               <a href="index.php?option=order" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
            </div>
               <div class="card-body p-2">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>User_id</th>
                           <th>Tên người nhận hàng</th>
                           <th>Điện Thoại</th>
                           <th>Email</th>
                           <th>Địa Chỉ Giao Hàng</th>
                           <th>Ghi Chú</th>
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
                              <div class="User_id">
                              <?= $item->user_id ; ?> 
                              </div>
                           <td>
                              <div class="deliveryname">
                              <?= $item->deliveryname ; ?> 
                              <div class="function_style">                                                                     
                                       <a href="index.php?option=order&cat=restore&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i> Khôi Phục 
                                       </a>
                                       <a href="index.php?option=order&cat=destroy&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xóa VV
                                       </a>  
                                 </div>
                              <td>
                              <div class="deliveryphone">
                              <?= $item->deliveryphone ; ?> 
                            
                           </td>
                           <td>
                              <div class="deliveryemail">
                              <?= $item->deliveryemail ; ?> 
                            
                           </td>
                           <td>
                              <div class="deliveryaddress">
                              <?= $item->deliveryaddress ; ?> 
                                 
                           </td>
                           <td>
                              <div class="note">
                              <?= $item->note ; ?> 
                            
                           </td>
                              
                                 
                           </td> 
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