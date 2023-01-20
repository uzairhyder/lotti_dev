<?php
$favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
  <link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
  <!-- <link rel="icon" type="image/x-icon" href="./../assets/images/fabIcon.webp"> -->
  <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/style.css')); ?>">
  <!-- <link rel="stylesheet" href="./../assets/css/style.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/style.css')); ?>">
  <!-- <link rel="stylesheet" href="./../assets/css/dashboard.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/dashboard.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<!-- Toaster -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  toastr.options = {
      "positionClass": "toast-top-right",
      "showDuration": "9000",
      "hideDuration": "9000",
      "timeOut": "9000",
      "extendedTimeOut": "9000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
  };
</script> 
</head>
<div class="loader-bg loader-active noPrint">
  <h3>Lotti</h3>
  <div class="loader">
      <span></span>
  </div>
</div> 


<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/common/head.blade.php ENDPATH**/ ?>