<aside class="hideSide">
    <h3>Hello, <?php echo $fullname; ?></h3>
    <ul>
        <li><a href="<?php echo APP_URL; ?>dashboard"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Order product</a></li>
        <li><a href="<?php echo APP_URL; ?>orders"><i class="fa fa-file-text-o" aria-hidden="true"></i>Manage your orders</a></li>
        <li><a href="<?php echo APP_URL; ?>info"><i class="fa fa-cog" aria-hidden="true"></i>Manage your info</a></li>
        <li><a href="<?php echo APP_URL; ?>address"><i class="fa fa-address-book" aria-hidden="true"></i>Address book</a></li>
        <!-- <li><a href="<?php echo APP_URL; ?>dashboard/contact/"><i class="fa fa-envelope-o" aria-hidden="true"></i>Liên hệ Admin</a></li> -->
        <li><a href="<?php echo APP_URL; ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
    </ul>
    <div id="copyright">Develop by Teddycoder - <?php echo date('Y') ?>
        <div class="logo_teddy">
            <img src="<?php echo APP_ASSETS ?>img/other/logo_teddy.svg">
            <p class="dot"></p>
        </div>
    </div>    
</aside>