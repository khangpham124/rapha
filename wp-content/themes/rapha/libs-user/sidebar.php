<aside class="hideSide">
    <h3>Hello, <?php echo $fullname; ?></h3>
    <ul>
        <li><a href="<?php echo APP_URL; ?>dashboard"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Mua hàng hoá</a></li>
        <li><a href="<?php echo APP_URL; ?>orders"><i class="fa fa-file-text-o" aria-hidden="true"></i>Quản lý đơn hàng</a></li>
        <li><a href="<?php echo APP_URL; ?>info"><i class="fa fa-cog" aria-hidden="true"></i>Thông tin tài khoản</a></li>
        <li><a href="<?php echo APP_URL; ?>address"><i class="fa fa-address-book" aria-hidden="true"></i>Sổ địa chỉ</a></li>
        <li><a href="<?php echo APP_URL; ?>dashboard/contact/"><i class="fa fa-envelope-o" aria-hidden="true"></i>Liên hệ Admin</a></li>
        <li><a href="<?php echo APP_URL; ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Thoát</a></li>
    </ul>
    <p id="copyright">Develop by Teddycoder - <?php echo date('Y') ?></p>    
</aside>