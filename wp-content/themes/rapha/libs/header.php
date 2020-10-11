<header id="header">
    <div class="nav-bar">
        <div class="flex-box flex-box--between flex-box--aligncenter">
            <a href="<?php echo APP; ?>" class="logo">
                <img src="<?php echo APP_ASSETS ?>img/header/logo.svg" alt="" class="img-logo">
            </a>
            <div class="navbar--right flex-box flex-box--end">
                <ul class="nav-menu flex-box">
                    <li><a href="<?php echo APP_URL; ?>#about-us" class="nav-link"><?php echo ${'lang_'.$lang_web}['menu']['about'] ?></a></li>
                    <li><a href="<?php echo APP_URL; ?>#menu-section" class="nav-link"><?php echo ${'lang_'.$lang_web}['menu']['menu'] ?></a></li>
                    <li><a href="<?php echo APP_URL; ?>#location-section" class="nav-link"><?php echo ${'lang_'.$lang_web}['menu']['location'] ?></a></li>
                    <li><a href="<?php echo APP_URL; ?>#contact-section" class="nav-link"><?php echo ${'lang_'.$lang_web}['menu']['contact'] ?></a></li>
                </ul>
                <ul class="flex-box lang-menu">
                    <li id="en" <?php if($lang_web == 'en') { ?> class="active" <?php } ?>><a href="javascript:void(0)" data-attribute="en">EN</a></li>
                    <li id="vn" <?php if($lang_web == 'vn') { ?> class="active" <?php } ?>><a href="javascript:void(0)" data-attribute="vn">VN</a></li>
                </ul>
                <a href="<?php echo APP_URL_USER; ?>" class="header-link"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                <div class="nav-menu-button sp">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
        </div>
    </div>
</header>