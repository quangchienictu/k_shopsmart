
<nav class="navbar navbar-expand-lg navbar-custom"> <a class='navbar-brand' href="check_book.php">Tít </a> 
    
        <div class="collapse navbar-collapse">
        <?php if(isset($_SESSION['login_user'])): ?>
            <ul class="navbar-nav nav mr-auto">
            
            <li class="reg_form"> 
                <label for="" style="margin-right: 20px;color: white;"><?=$data['ten_user']?></label>  
                <a class="btn btn-warning" href="logout.php" >Logout</a> 
                </li>
            </ul>
        <?php endif; ?>
            <ul class="navbar-nav nav navbar-right ">
                 <li class="header__notify-list-item notify__menu">
                    <a href="check_book.php" class="header__notify-list-link"  >Chọn bàn</a>
                </li>
                <li class="header__notify-list-item notify__menu">
                    <a href="#1" class="header__notify-list-link"  >Món Gà</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="#2" class="header__notify-list-link">Món Vịt</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="#3" class="header__notify-list-link">Món Bò </a>
                </li>
                <li class="header__notify-list-item">
                    <a href="#4" class="header__notify-list-link">Món Dê</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="#5" class="header__notify-list-link">Món Lẩu </a>
                </li>
                <li class="header__notify-list-item">
                    <a href="#8" class="header__notify-list-link">Món Hải Sản</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="#6" class="header__notify-list-link">Món Khai Vị</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="#7" class="header__notify-list-link">Đồ Uống</a>
                </li>
                

            </ul>   
        </div>
    </nav>
