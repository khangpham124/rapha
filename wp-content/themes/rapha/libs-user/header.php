<header class="header">
    <div class="nav-bar">
            <div class="flex-box flex-box--between flex-box--aligncenter">
                <a href="<?php echo APP; ?>" class="logo">
                    <img src="<?php echo APP_ASSETS ?>img/header/logo_white.svg">
                </a>
                <div class="nav-bar--right flex-box">
                    <div class="wrap-form">
                        <form action="<?php echo APP_URL; ?>tracking" method="post">
                            <input class="input-page" placeholder="Tracking your order" id="idBooking" name="idBooking">
                            <button><i class="fa fa-search" aria-hidden="true"></i></a></button>
                        </form>                        
                    </div>
                    <a href="javascript:void(0)" class="js-toogle-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="js-numbCart numb-cart numbCart">0</span></a>
                    
                    <div class="navbar--right flex-box flex-box--end">
                        <div class="nav-menu-button sp">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="cart-head">
                <ul id='cart-head' class="list-cart">
                There are no items in your cart
                </ul>
                <p class="taC btn-checkout"><a href="<?php echo APP_URL; ?>checkout" class="btn-page">Checkout</a></p>
            </div>
    </div>
</header>