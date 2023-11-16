<?php

use App\Models\user;

$id = $_REQUEST['id'];
$customer =  user::find($id);
if($customer==null){
    header("location:index.php?option=customer");
}
?>
<?php require_once "../views/backend/header.php";?>

      <!-- CONTENT -->
      <form action ="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">

      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật khách hàng</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=customer" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Cập nhật
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                
                        <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $customer->id; ?>" />
                           <label>Họ tên (*)</label>
                           <input type="text" value="<?=$customer->name; ?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Giới tính</label>
                           <input type="text" value="<?=$customer->gender; ?>" name="gender" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Điện thoại</label>
                           <input type="text" value="<?=$customer->phone; ?>" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Email</label>
                           <input type="text" value="<?=$customer->email; ?>" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Tên đăng nhập</label>
                           <input type="text" value="<?=$customer->username; ?>" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mật khẩu</label>
                           <textarea type="password"  name="password" class="form-control"><?=$customer->password; ?></textarea>
                        </div>
                     
                        <div class="mb-3">
                           <label>Địa Chỉ</label>
                           <input type="address" value="<?=$customer->address; ?>" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Vai Trò</label>
                        <input type="roles" value="<?=$customer->roles; ?>" name="roles" class="form-control">
                        </div>
                       
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" value="1" <?=($customer->status ==1 ) ? 'selected':''; ?> >Xuất bản</option>
                              <option value="2" value="1" <?=($customer->status ==2 ) ? 'selected':''; ?> >Chưa xuất bản</option>
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