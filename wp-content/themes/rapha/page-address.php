<?php /* Template Name: Address */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");
include(APP_PATH."libs-user/head.php");
?>
</head>

<body id="top" class="dashboard">
    <div id="wrapper">
        <!--Header-->
        <?php include(APP_PATH."libs-user/header.php"); ?>
        <!--/Header-->
        
        <div class="flex-box flex-box--between flex-box--wrap">
        <?php include(APP_PATH."libs-user/sidebar.php"); ?>
            <div class="main-content">
                
                <h2 class="h2_page">Sổ địa chỉ</h2>
                <div class="mt--30">
                    <ul id="list-address" class="flex-box flex-box--between flex-box--wrap" data-action="<?php echo APP_URL; ?>data/rmvAddress.php" data-id="<?php echo $userID; ?>">
                        <?php
                        $i=0;
                        while(has_sub_field('address',$userID)):
                        $main_address = get_sub_field('main_address',$userID);
                        
                        ?>
                        <li class="grid--48"><?php  echo get_sub_field('address'); ?>
                            <a href="javascript:void(0)" class="js-rmv-address" data-numb="<?php echo $i; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </li>
                        <?php $i++; endwhile; ?>
                    </ul>
                </div>

                <form method="post" class="mt--70" action="" id="form-address">
                    <h2 class="h2_page">Thêm địa chỉ mới</h2>
                    <table class="table-page mt--30">
                        <tr>
                            <td> Địa chỉ mới</td>
                            <td><input type='text' class="input-page" name="address" id="address" placeholder="Nhập địa chỉ mới"></td>
                        </tr>
                    </table>
                    <input type="hidden" name="iduser" id="iduser" value="<?php echo $userID; ?>" >
                    <a href="javascript:void(0)" class="btn-page js-add-address mt--30" data-action="<?php echo APP_URL; ?>data/addAddress.php">Thêm</a>
                </form>
            </div>
        </div>

        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>        
    <script type="text/javascript" src="<?php echo APP_ASSETS; ?>js/checkout.js"></script>
</body>
</html>	