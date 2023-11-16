<?php
use App\Models\Contact;
use App\Models\Customer;
use App\Models\User;
$customer=User::where([['status','=',1],['id','=',$_SESSION['user_id']]])->first();
if(isset($_POST['XATNHAN'])) {
   $contact= new contact();
   $contact->id=$_SESSION['user_id'];
   $contact->name=$customer->name;
   $contact->phone=$customer->phone;
   $contact->email=$customer->email;
   $contact->title=$_POST['title'];
   $contact->content=$_POST['content'];
   $contact->created_at=date('Y-m-d H:i:s');
   $contact->status=1;
   if($contact->save()) {
      header("location:index.php");
   }
}
?>
<?php require_once "views/frontend/header.php"?>
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">
                  Liên hệ
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096385!2d106.77242407468411!3d10.830680489321376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1692683712719!5m2!1svi!2s"
                  width="600" height="450" style="bcontact:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
            <form action="index.php?option=contact" method="post">
            <div class="mb-3">
                     <label for="name">Họ tên</label>
                     <input type="text" name="name" id="name" value="<?=$customer->name;?>" class="form-control" placeholder="Nhập họ tên" readonly>
                  </div>
                  <div class="mb-3">
                     <label for="phone">Điện thoại</label>
                     <input type="text" name="phone" id="phone" value="<?=$customer->phone;?>" class="form-control" placeholder="Nhập điện thoại"readonly>
                  </div>
                  <div class="mb-3">
                     <label for="phone">Email</label>
                     <input type="text" name="email" id="email" value="<?=$customer->email;?>" class="form-control" placeholder="Nhập email"readonly>
                  </div>
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề">
               </div>
               <div class="mb-3">
                  <label for="content" class="mediumtext">Nội dung</label>
                  <input type="textarea" name="content" id="content" class="form-control" placeholder="Nhập nội dung liên hệ">
               </div>
               <div class="mb-3">
               <button type="submit" name="XATNHAN" class="btn btn-main px-4">GỬI LIÊN HỆ</button>
               </div>
</form>
            </div>
         </div>
      </div>
   </section>
   <?php require_once "views/frontend/footer.php"?>