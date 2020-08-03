
<nav class="navbar navbar-expand-lg navbar-custom"> <a class='navbar-brand' href=''>Tít </a> 
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav nav mr-auto">
            <li class="reg_form"> 
                <label for="" style="color: white;"><?=isset($data)?$data['ten_user']:'Admin'?></label>  
                <a class="btn btn-warning" href="logout.php"    >Logout</a> 
                </li>
            </ul>
            <ul class="navbar-nav nav navbar-right ">
                <li class="header__notify-list-item">
                    <a href="admin.php" class="header__notify-list-link notification"  >Quản Lý Thực Đơn </a>
                </li>
                <li class="header__notify-list-item">
                    <a href="manage_admin.php" class="header__notify-list-link notification"  >Quản Lý Truy Cập </a>
                </li>
                     <!-- <span class="badge" id="sl">0</span> -->
              <!--   <li class="header__notify-list-item">
                  <a href="" class="header__notify-list-link"  >Quản Lý Truy Cập</a>
              </li> -->
                <li class="header__notify-list-item">
                    <a href="manage_product.php" class="header__notify-list-link"  >Quản Lý Món Ăn</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="quanlyhoadon.php" class="header__notify-list-link"  >Quản Lý Hóa Đơn</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="thongke.php" class="header__notify-list-link"  >Thống Kê Doanh Thu</a>
                </li>
               <!--  <li class="header__notify-list-item">
                   <a href="" class="header__notify-list-link"  >Hóa Đơn </a>
               </li>
               <li class="header__notify-list-item">
                   <a href="" class="header__notify-list-link" >Thông Báo</a>
               </li> -->
                
            </ul>   
        </div>
    </nav>