 <div class="sidebar">
   <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     <div class="image">
       <img src="img/health_logo.png" class="img-circle elevation-1" alt="User Image">
     </div>
     <div class="info">
       <a href="#" class="d-block"><?php echo $_SESSION['nama'] . ' | ' . $_SESSION['level']; ?></a>
     </div>
   </div>

   <!-- SidebarSearch Form -->
   <!-- <div class="form-inline">
     <div class="input-group" data-widget="sidebar-search">
       <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
       <div class="input-group-append">
         <button class="btn btn-sidebar">
           <i class="fas fa-search fa-fw"></i>
         </button>
       </div>
     </div>
   </div> -->

   <!-- Sidebar Menu -->
   <?php
    //  include('logout/logout_popup.php');
   if ($_SESSION['level'] == 'Lab'){
      include('menu/Lab.php');
   }
   elseif ($_SESSION['level'] == 'Dinkes'){
      include('menu/Dinkes.php');
    } 
    elseif ($_SESSION['level'] == 'Admin') {
      include('menu/Admin.php');
    }
   else{
    include('menu/Faskes.php');
   }
   ?>
   <!-- /.sidebar-menu -->
 </div>
 