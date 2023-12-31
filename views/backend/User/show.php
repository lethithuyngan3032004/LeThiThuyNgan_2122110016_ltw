<?php
use App\Models\User;

$id = $_REQUEST['id'];
$user =  User::find($id);
if($user==null){
    header("location:index.php?option=user");
}

$list = user::where('status','=',0)->orderBy('Created_at','DESC')->get();

?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->


      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thành viên</h1>
                     <a href="index.php?option=user&cat=create" class="btn btn-sm btn-primary">Thêm thành viên</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
               <div class="row">
                  <div class="col-md-11 text-right">
                  <a href="index.php?option=user" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về trang thành viên
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
                               <td><?= $user->id;?></td>
                           </tr>
                           <tr>
                              <td>Tên khách hàng</td>
                               <td><?= $user->name;?></td>
                           </tr>
                           <tr>
                              <td>Email</td>
                               <td><?= $user->email;?></td>
                           </tr>
                           <tr>
                              <td>Số điện thoại</td>
                               <td><?= $user->phone;?></td>
                           </tr>
                           <tr>
                              <td>Tên đăng nhập</td>
                               <td><?= $user->username;?></td>
                           </tr>
                           <tr>
                              <td>Mật khẩu</td>
                               <td><?= $user->password;?></td>
                           </tr>
                           <tr>
                              <td>Địa chỉ</td>
                               <td><?= $user->address;?></td>
                           </tr>
                           <tr>
                           <tr>
                                 <td>Hình</td>
                                 <td><img class="img-fluid" width="300px;" src="../public/images/user/<?=$user->image;?>" alt="<?=$user->image;?>"></td>
                              </tr>
                           <tr>
                              <td>Quyền truy cập</td>
                               <td><?= $user->roles;?></td>
                           </tr>
                           <tr>
                              <td>Ngày tạo</td>
                               <td><?= $user->created_at;?></td>
                           </tr>
                           <tr>
                              <td>Người tạo</td>
                               <td><?= $user->created_by;?></td>
                           </tr>
                           <tr>
                              <td>Ngày sửa</td>
                               <td><?= $user->updated_at;?></td>
                           </tr>
                           <tr>
                              <td>Người sửa</td>
                               <td><?= $user->updated_by;?></td>
                           </tr>
                           <tr>
                              <td>Trạng thái</td>
                               <td><?= $user->status;?></td>
                           </tr>


                    
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>