<?php /* Template Name: Checkout */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs-user/head.php");
?>
<script>
    if(!localStorage.getItem('minicart')) {
    window.location.href = 'http://raphatea.org/dashboard';
    }
</script>
</head>

<body id="checkout" class="dashboard">
    <div id="wrapper">
        <!--Header-->
        <?php include(APP_PATH."libs-user/header.php"); ?>
        <!--/Header-->
        
        <div class="flex-box flex-box--between flex-box--wrap">
        <?php include(APP_PATH."libs-user/sidebar.php"); ?>
            <div class="main-content">
                <div class="flex-box flex-box--between">
                    <div class="blockPage blockPage--full grid--48">
                        <h2 class="h2_page">Order Detail</h2>
                        <div id="list-products" class="mt--30">
                            <table class="table-page">
                                <thead>
                                    <tr>
                                        <td>Products</td>
                                        <td>Quantity</td>
                                        <td>Price</td>
                                        <td>Total</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody id="checkout-list">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="blockPage blockPage--full grid--48">
                        <h2 class="h2_page">Order Information</h2>
                        <table class="table-page mt--30">
                            <tr>
                                <td>Fullname</td>
                                <td><?php echo $fullname; ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $phone; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>
                                    <div class="styled-select">
                                        <select id="addressDeliver">
                                            <?php
                                                while(has_sub_field('address',$userID)):
                                            ?>
                                                <option><?php echo get_sub_field('address'); ?></option>    
                                            <?php endwhile; ?>
                                        </select>
                                        <span class="fa fa-sort-desc"></span>
                                    </div>

                                    <div class="toggleSection">
                                        <form method="post" action="" id="form-address">
                                            <input type='text' class="input-page mt--10" name="address" id="address" placeholder="New address">
                                            <input type="hidden" name="iduser" id="iduser" value="<?php echo $userID; ?>" >
                                            <a href="javascript:void(0)" class="btn-page js-add-address mt--30" data-action="<?php echo APP_URL; ?>data/addAddress.php">Add</a>
                                        </form>
                                    </div>
                                    <a href="javascript:void(0)" class="js-toogle-click text-link mt--10"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add new address</p>
                                </td>
                   </tr>
                            <tr>
                                <td>Note</td>
                                <td>
                                    <textarea id="noted" class="input-page"></textarea>
                                </td>
                        </table>
                    </div>
                </div>
                <div class="mt--30">
                    <a href="<?php echo APP_URL; ?>dashboard" class="btn-page">Back</a>
                    <a href="javascript:void(0)" class="btn-page js-get-booking">Order</a>
                </div>
            </div>
        </div>
        <input type="hidden" id="iduser" value="<?php echo $userID; ?>">
        <input type="hidden" id="fullname" value="<?php echo $fullname; ?>">
        <input type="hidden" id="phone" value="<?php echo $phone; ?>">
        <input type="hidden" id="email" value="<?php echo $email; ?>">
        <input type="hidden" id="dateorder" value="<?php echo date("d-m-Y H:i:s"); ?>">
        <input type="hidden" id="urlBooking" value="<?php echo APP_URL; ?>data/addBooking.php">
        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>        
    <script type="text/javascript" src="<?php echo APP_ASSETS; ?>js/checkout.js"></script>
</body>
</html>	