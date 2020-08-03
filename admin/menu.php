<li class="nav-item <?php if($page == 'user') echo 'active' ?>">
    <a class="nav-link" href="?page=user">
	    <i class="material-icons">person</i>
	   	<p>Quản trị</p>
    </a>
</li>
<li class="nav-item <?php if($page == 'guess') echo 'active' ?>">
	<a class="nav-link" href="?page=guess">
		<i class="material-icons">group</i>
		<p>Quản lý Khách hàng</p>
	</a>
</li>
<li class="nav-item <?php if($page == 'group') echo 'active' ?>">
	<a class="nav-link" href="?page=group">
		<i class="material-icons">group</i>
		<p>Quản lý Danh mục</p>
	</a>
</li>
<li class="nav-item <?php if($page == 'item') echo 'active' ?>">
	<a class="nav-link" href="?page=item">
		<i class="material-icons">group</i>
		<p>Quản lý Sản phẩm</p>
	</a>
</li>
<li class="nav-item <?php if($page == 'item_danger') echo 'active' ?>">
	<a class="nav-link" href="?page=item_danger">
		<i class="material-icons">group</i>
		<p>Quản lý tồn kho</p>
	</a>
</li>
<li class="nav-item <?php if($page == 'request') echo 'active' ?>">
	<a class="nav-link" href="?page=request">
		<i class="material-icons">group</i>
		<p>Đơn đặt hàng</p>
	</a>
</li>
<li class="nav-item <?php if($page == 'news') echo 'active' ?>">
	<a class="nav-link" href="?page=news">
		<i class="material-icons">credit_card</i>
		<p>Quản lý Tin tức</p>
	</a>
</li>
<li class="nav-item <?php if($page == 'report') echo 'active' ?>">
	<a class="nav-link" href="?page=report">
		<i class="material-icons">credit_card</i>
		<p>Thống kê - Báo cáo</p>
	</a>
</li>
<li class="nav-item">
	<a class="nav-link" href="../admin/login.php?logout=logout">
		<i class="material-icons">exit_to_app</i>
		<p>Đăng xuất</p>
	</a>
</li>