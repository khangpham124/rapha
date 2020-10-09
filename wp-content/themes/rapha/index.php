<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(APP_PATH."libs/head.php");
?>
</head>

<body id="top">
<!--===================================================-->

    
    <!--===================================================-->
        <!--Header-->
        <?php include(APP_PATH."libs/header.php"); ?>
        <!--/Header-->


        <div class="container">

		<svg version="1.1" id="svg-animation-shape" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
	 y="0px" viewBox="0 0 456.9 195.5" style="enable-background:new 0 0 456.9 195.5;" xml:space="preserve" width="100%" height="100%"  >
<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo APP_ASSETS; ?>img/other/kv_inner_catch_b_1.svg" mask="url(#clipmask)" id="shape_mask" width="100%" height="100%" ></image>

<mask id="clipmask" maskUnits="objectBoundingBox">

<path class="st0" d="M171.3,11.7L168,3.3l-8.8-1.5c-15.1,2.5-29.3,6.1-42.2,14.9c-5.9,4-11.7,10.3-10.4,17.3
	c20.7,22,52.6,24.4,74.1,44c0.9,0.8,1.8,1.7,2.2,2.8c0.6,1.5,0.3,3.2-0.2,4.7c-4.3,14-19.1,17.9-31,23.4c-7,3.3-15.6,4.2-22.9,6.6
	c-11.9,3.9-23.2,8-35.6,10.3c-14.3,2.6-28.9,3.6-43.5,3.3c-13.4-0.3-29.8,1.8-41.7-5.6c-18.1-11.2,6.9-28.8,15-36.9"/>
<path class="st0" d="M250.9,0.9c-16.1,24.9-32.6,49.6-49.2,74.2c-4.3,6.4-8.6,12.9-10.8,20.3c17.6-7.6,34.1-16.9,50.6-26.4
	c-4.1,9.9-8.1,19.9-9.8,30.4c10.6-5.6,20.6-12.1,30-19.4"/>
<path class="st0" d="M297.2,60.8c-17.2,6.8-41.3,11.7-44.1,34.7c14.4,4.8,38.7-16.9,51.3-22.8c-6.7,3.4-8.4,15.9-8.8,22.4
	c12.8-2.8,26.3-11.5,38.4-17"/>
<path class="st0" d="M337,61c-26.3,44.8-52.7,89.7-79,134.5c0-10.8,8.7-26.3,12.2-36.6c3.8-11.4,5.7-23.7,14.5-32.2
	c11.3-10.9,22.5-22,33.7-33c9.8-9.6,19.8-23.2,32.2-29.3c6.9-3.4,31.6-19.5,30.8-3.2c-0.7,13.2-14.4,21.2-24.9,25.3
	c-13.6,5.4-23.5,4.7-38,3.8"/>
<path class="st0" d="M393.3,77.4c12.8-5.6,27.1-10.4,39.1-17.3c-0.5-2.9-2.2-7.7-5.6-8.2c-2.4-0.4-9.1,3.9-11.5,4.9
	c-7.6,3.2-15.3,6.4-21.6,11.9c-4.6,3.9-8.2,8.9-10.7,14.3c-6.6,14.7,17.2,7.8,23.4,5.8c19.7-6.3,38.6-16,57.5-24.1"/>
	</mask>
</svg>

        </div>
        


        <!--Footer-->
        <?php include(APP_PATH."libs/footer.php"); ?>
        <!--/Footer-->
        
    <script src="<?php echo APP_ASSETS; ?>js/vivus.js"></script>
    <script>
        var st0 = document.querySelectorAll('.st0');
        var animation_shape = function(){
        new Vivus('svg-animation-shape', {type: 'scenario-sync',duration: 12,forceRender: false ,animTimingFunction:Vivus.EASE},function(){
            setTimeout(function(){
                
                for(var i =0;i < st0.length; i ++)
                    st0[i].removeAttribute('style');
                animation_shape();
            },10000000000)
        });        
        }
        animation_shape();

    </script>

</body>
</html>	