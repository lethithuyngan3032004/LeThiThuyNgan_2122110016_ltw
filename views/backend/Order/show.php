<?php
use App\Models\Order;
use App\Models\Orderdetail;
$id = $_REQUEST['id'];
$order =  Order::find($id);
$orderdetail=Orderdetail::find($id);
if($order==null){
    header("location:index.php?option=order");
}

$list = Order::where('status','=',0)->orderBy('Created_at','DESC')->get();

?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->


      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết đơn hàng</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
               <div class="row">
               
                  Noi dung
                  <div class="col-md-11 text-right">
                  <a href="index.php?option=order" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về đơn hàng
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
                               <td><?= $order->id;?></td>
                           </tr>
                           <tr>
                              <td>user_id</td>
                               <td><?= $order->user_id;?></td>
                           </tr>
                           <tr>
                              <td>Tên người nhận</td>
                               <td><?= $order->deliveryname;?></td>
                           </tr>
                           <tr>
                              <td>Địa chỉ người nhận</td>
                               <td><?= $order->deliveryaddress;?></td>
                           </tr>
                           <tr>
                              <td>email</td>
                               <td><?= $order->email;?></td>
                           </tr>
                           <tr>
                              <td>phone</td>
                               <td><?= $order->phone;?></td>
                           </tr>
                           <tr>
                           <tr>
                              <td>Mã sản phẩm</td>
                               <td><?= $orderdetail->product_id;?></td>
                           </tr>
                           <tr>
                              <td>Giá sản phẩm</td>
                               <td><?= $orderdetail->price;?></td>
                           </tr>
                           <tr>
                              <td>Số lượng</td>
                               <td><?= $orderdetail->qty;?></td>
                           </tr>
                           <tr>
                              <td>Tổng tiền</td>
                               <td><?= $orderdetail->amount;?></td>
                           </tr>
                           <tr>
                              <td>Chú ý</td>
                               <td><?= $order->note;?></td>
                           </tr>
                           <tr>
                              <td>created_at</td>
                               <td><?= $order->created_at;?></td>
                           </tr>
                           <tr>
                              <td>updated_at</td>
                               <td><?= $order->updated_at;?></td>
                           </tr>
                           <tr>
                              <td>updated_by</td>
                               <td><?= $order->updated_by;?></td>
                           </tr>
                           <tr>
                              <td>status</td>
                               <td><?= $order->status;?></td>
                           </tr>

                    
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>