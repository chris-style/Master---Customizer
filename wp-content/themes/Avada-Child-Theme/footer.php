<?php
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<?php do_action('avada_after_main_content'); ?>

</div>  <!-- fusion-row -->
</main>  <!-- #main -->
<?php do_action('avada_after_main_container'); ?>

<?php global $social_icons; ?>

<?php
/**
 * Get the correct page ID.
 */
$c_page_id = Avada()->fusion_library->get_page_id();
?>

<?php
/**
 * Only include the footer.
 */
?>
<?php if (!is_page_template('blank.php')) : ?>
    <?php $footer_parallax_class = ( 'footer_parallax_effect' === Avada()->settings->get('footer_special_effects') ) ? ' fusion-footer-parallax' : ''; ?>

    <div class="fusion-footer<?php echo esc_attr($footer_parallax_class); ?>">
        <?php get_template_part('templates/footer-content'); ?>
    </div> <!-- fusion-footer -->
<?php endif; // End is not blank page check. ?>

<?php
/**
 * Add sliding bar.
 */
?>
<?php if (Avada()->settings->get('slidingbar_widgets') && !is_page_template('blank.php')) : ?>
    <?php get_template_part('sliding_bar'); ?>
<?php endif; ?>
</div> <!-- wrapper -->

<?php
/**
 * Check if boxed side header layout is used; if so close the #boxed-wrapper container.
 */
$page_bg_layout = 'default';
if ($c_page_id && is_numeric($c_page_id)) {
    $fpo_page_bg_layout = get_post_meta($c_page_id, 'pyre_page_bg_layout', true);
    $page_bg_layout = ( $fpo_page_bg_layout ) ? $fpo_page_bg_layout : $page_bg_layout;
}
?>
<?php if (( ( 'Boxed' === Avada()->settings->get('layout') && 'default' === $page_bg_layout ) || 'boxed' === $page_bg_layout ) && 'Top' !== Avada()->settings->get('header_position')) : ?>
    </div> <!-- #boxed-wrapper -->
<?php endif; ?>
<?php if (( ( 'Boxed' === Avada()->settings->get('layout') && 'default' === $page_bg_layout ) || 'boxed' === $page_bg_layout ) && 'framed' === Avada()->settings->get('scroll_offset') && 0 !== intval(Avada()->settings->get('margin_offset', 'top'))) : ?>
    <div class="fusion-top-frame"></div>
    <div class="fusion-bottom-frame"></div>
    <?php if ('None' !== Avada()->settings->get('boxed_modal_shadow')) : ?>
        <div class="fusion-boxed-shadow"></div>
    <?php endif; ?>
<?php endif; ?>
<a class="fusion-one-page-text-link fusion-page-load-link"></a>
<div class="popup-wrapper-overlay" id="custommats" style="display:none;">		
    <div  class="card popup-wrapper customMats" >
        <div class="card-body">
            <div class="popup-header-sec">
                <div class="popup-close-btn">X</div>

                <h4 class="card-title">Select  Shape</h4>
            </div>

            <p class="card-description">

            </p>
            <form id="dddd" class="forms-sample" method="post" onsubmit="return false;" action="">

                <div class="form-group" id="shape_section">
                    <div id="shape_option" class="shapeOptionRadio">
                        <ul class="shapeOptionRadioIn">
                            <li><input type="radio" id="select_circle" class="shapeselect" name="shape" value="Circle" for="exampleInputEmail1">Circle</li>
                            <li><input type="radio" id="select_square" class="shapeselect" name="shape" value="Square" for="exampleInputEmail1">Square</li>
                            <li><input type="radio" id="select_rectangle" class="shapeselect" name="shape" value="Rectangle" for="exampleInputEmail1">Rectangle</li>
                        </ul>


                    </div>



                </div>

            </form>
        </div> 
    </div>
</div>                    

<?php wp_footer(); ?>
<?php
$url1 = get_permalink();
$url = site_url() . '/';



if ($url == $url1) {
    ?>
    <div class="popup-wrapper-overlay" id="1popup" style="display:none;">		
        <div  class="card popup-wrapper newsLetterPopup" >
            <div class="card-body">
                <div class="popup-header-sec">
                    <div class="popup-close-btn nl_close" onclick="myFunction()">X</div>
                    <h4 class="card-title">Newsletter</h4>
                </div>

                <p class="card-description">

                </p>

                <?php echo do_shortcode('[contact-form-7 id="1655" title="popup"]'); ?>
            </div> 
        </div> 
    </div>
<?php } ?>



<script>
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }


</script>
<script>

    jQuery(document).ready(function () {
		
		 jQuery('#alg_wc_pif_local_1').prop('readonly', true);
        jQuery('#alg_wc_pif_local_2').prop('readonly', true);
        var radius_width = '<?php
if (isset($_GET['r'])) {
    echo $_GET['r'];
} else {
    echo '';
}
?>';
        var rec_height = '<?php
if (isset($_GET['h'])) {
    echo $_GET['h'];
} else {
    echo '';
}
?>';

        jQuery(document).on('click', '.fpd-icon-close', function () {

            location.href = "/";
        })
		jQuery(document).on('change', '#mat_radius', function () {
            var price_circle =jQuery('#mat_radius').val();
            jQuery('.price').html('$'+price_circle*3);
        })
       jQuery(document).on('change', '#mat_square_width', function () {
            var price_square =jQuery('#mat_square_width').val();
            jQuery('.price').html('$'+price_square*3);
        })

       jQuery(document).on('change', '#mat_rec_width, #mat_rec_height', function () {
            var price_rec =jQuery('#mat_rec_width').val();
            var price_rec1 =jQuery('#mat_rec_height').val();
            if(price_rec>price_rec1){
                var new_price = price_rec;
            }
            else
            {
                 var new_price = price_rec1;

            }
		   jQuery('.price').html('$'+new_price*3);
        })
        jQuery(document).on('click', '.nl_close', function () {

            setCookie("popupmsg", 'closebtn', 7);
        })
        jQuery(document).on('click', '.fpd-btn', function () {
            jQuery('.fpd-element-toolbar').css('opacity', '1');

        })
        jQuery(document).on('click', '.popup-close-btn', function () {

            jQuery('#custommats').hide();
            //location.href = "";
        })
        jQuery(document).on('click', '.popup-back-btn', function () {
            jQuery('.step_2').remove();
            jQuery('.card-title').show();
            jQuery('#shape_option').show();
            jQuery('.popup-close-btn').show();


        })
        var url = '<?php the_permalink(); ?>';


        if ((url == '<?php echo site_url() . '/' ?>product/circle_shaped/') || (url == '<?php echo site_url() . '/' ?>product/square-shaped/')) {
            jQuery('#alg_wc_pif_local_1').val(radius_width);
			 
			
        }

        if (url == '<?php echo site_url() . '/' ?>product/rectangle_shaped/') {
			

            jQuery('#alg_wc_pif_local_1').val(radius_width);
            jQuery('#alg_wc_pif_local_2').val(rec_height);

        }







        jQuery(document).on("submit", "#dddd", function () {
            var radius = jQuery("#alg_wc_pif_global_1").val();
            var height = jQuery("#alg_wc_pif_local_1").val();

            var new_url = jQuery("#url").val();

            if (new_url == 'Circle')
            {
                location.href = "/product/circle_shaped?r=" + radius;
            }
            if (new_url == 'Square')
            {
                location.href = "/product/square-shaped?r=" + radius;
            }
            if (new_url == 'Rectangle')
            {
                location.href = "/product/rectangle_shaped?r=" + radius + "&h=" + height;
            }

        });

        jQuery("#menu-item-1085").click(function () {

            jQuery('#custommats').show();


        })

        jQuery('.shapeselect').click(function () {
//      alert();

            jQuery('.card-title').hide();
            jQuery('#shape_option').hide();
            //jQuery('.popup-close-btn').hide();
            jQuery('.popup-back-btn').show();

            var selected_shape = jQuery(this).val();
            //alert(selected_shape);
            if (selected_shape == 'Circle')
            {

//    alert('circle');

                jQuery(".popup-header-sec").append('<h4 class="card-title step_2">' + selected_shape + '</h4>');
                jQuery("#shape_section").append('<div class="step_2"><label for="exampleInputUsername1">Radius</label><input type="hidden" id="url" value="Circle"><input type="text" class="form-control" required="" id="alg_wc_pif_global_1" placeholder="Enter Radius"><span></span><br><div style="text-align:center;"><div class="popupButtonWrap"><button type="submit"  class="btn btn-gradient-primary mr-2 single_add_to_cart_button customButton">Submit</button><button class="btn popup-back-btn step_2 customButton" >Back</button></div></div></div>');

            }
            if (selected_shape == 'Square')
            {

//    alert('square');
                jQuery(".popup-header-sec").append(' <h4 class="card-title step_2">' + selected_shape + '</h4>');
                jQuery("#shape_section").append('<div class="step_2"> <label for="exampleInputUsername1">Width</label><input type="hidden" id="url" value="Square"><input type="text" class="form-control" required="" id="alg_wc_pif_global_1" placeholder="Enter Width"><span></span><br><div style="text-align:center;"><div class="popupButtonWrap"><button type="submit"  class="btn btn-gradient-primary mr-2 single_add_to_cart_button customButton">Submit</button><button class="btn popup-back-btn step_2 customButton" >Back</button></div></div></div>');
            }
            if (selected_shape == 'Rectangle')
            {

//    alert('rectangle');
                jQuery(".popup-header-sec").append('<h4 class="card-title step_2">' + selected_shape + '</h4>');
                jQuery("#shape_section").append('<div class="step_2"> <label for="exampleInputUsername1">Width</label><input type="hidden" id="url" value="Rectangle"><input type="text" class="form-control" required="" id="alg_wc_pif_global_1" placeholder="Enter Width"><span></span><label for="exampleInputUsername1">Height</label><input type="text" class="form-control" required="" id="alg_wc_pif_local_1" placeholder="Enter Height"><span></span><br><div style="text-align:center;"><div class="popupButtonWrap"><button type="submit"  class="btn btn-gradient-primary mr-2 single_add_to_cart_button customButton">Submit</button><button class="btn popup-back-btn step_2 customButton" >Back</button></div></div></div>');

            }



        })

        jQuery(document).on("click", ".fpd-done", function () {


            jQuery("#fpd-start-customizing-button").css("display", 'none');


        });
        jQuery(document).on("keyup", "#alg_wc_pif_global_1", function () {
            var _this = jQuery(this);
            var value = jQuery("#alg_wc_pif_global_1").val();
            var letters = /^[0-9]+$/;
            if (value < 12 || value > 72 || !(value.match(letters))) {
                _this.next("span").css("display", "block");
                _this.next("span").css("color", "red");
                _this.next("span").html("please enter in 12-72 range");

                jQuery(".single_add_to_cart_button").attr("disabled", true);
                jQuery("#alg_wc_pif_local_1").attr("disabled", "disabled");
                return false;
            } else {
                jQuery(".single_add_to_cart_button").removeAttr("disabled");
                jQuery("#alg_wc_pif_local_1").removeAttr("disabled");
                _this.next("span").css("display", "none");
                return false;
            }
        });



        jQuery(document).on("keyup", "#mat_square_width", function () {
            var _this = jQuery(this);
            var value = jQuery("#mat_square_width").val();
            var letters = /^[0-9]+$/;
            if (value < 12 || value > 72 || !(value.match(letters))) {
                _this.next("span").css("display", "block");
                _this.next("span").css("color", "red");
                _this.next("span").html("please enter in 12-72 range");
               // jQuery('.fpd-view-stage').css("display", "none");

                return false;
            } else {

                _this.next("span").css("display", "none");
                jQuery('.fpd-view-stage').css("display", "block");
                jQuery('#alg_wc_pif_local_1').val(value);
                return false;
            }
        });

        jQuery(document).on("keyup", "#mat_radius", function () {
            var _this = jQuery(this);
            var value = jQuery("#mat_radius").val();
            var letters = /^[0-9]+$/;
            if (value < 12 || value > 72 || !(value.match(letters))) {
                _this.next("span").css("display", "block");
                _this.next("span").css("color", "red");
                _this.next("span").html("please enter in 12-72 range");
                //jQuery('.fpd-view-stage').css("display", "none");

                return false;
            } else {

                _this.next("span").css("display", "none");
                jQuery('.fpd-view-stage').css("display", "block");
                jQuery('#alg_wc_pif_local_1').val(value);
                return false;
            }
        });


        jQuery(document).on("keyup", "#mat_rec_width", function () {
            var _this = jQuery(this);
            var value = jQuery("#mat_rec_width").val();
            var letters = /^[0-9]+$/;
            if (value < 12 || value > 72 || !(value.match(letters))) {
                _this.next("span").css("display", "block");
                _this.next("span").css("color", "red");
                _this.next("span").html("please enter in 12-72 range");
               // jQuery('.fpd-view-stage').css("display", "none");

                return false;
            } else {

                _this.next("span").css("display", "none");
                jQuery('.fpd-view-stage').css("display", "block");
                jQuery('#alg_wc_pif_local_1').val(value);
                return false;
            }
        });

        jQuery(document).on("keyup", "#mat_rec_height", function () {
            var _this = jQuery(this);
            var value = jQuery("#mat_rec_height").val();
            var letters = /^[0-9]+$/;
            if (value < 12 || value > 72 || !(value.match(letters))) {
                _this.next("span").css("display", "block");
                _this.next("span").css("color", "red");
                _this.next("span").html("please enter in 12-72 range");
               // jQuery('.fpd-view-stage').css("display", "none");

                return false;
            } else {

                _this.next("span").css("display", "none");
//                 jQuery('.fpd-view-stage').css("display", "block");
                jQuery('#alg_wc_pif_local_2').val(value);
                return false;
            }
        });



        jQuery(document).on("keyup", "#alg_wc_pif_local_1", function () {
            var _this = jQuery(this);
            var value = jQuery("#alg_wc_pif_local_1").val();
            var letters = /^[0-9]+$/;
            if (value < 12 || value > 72 || !(value.match(letters))) {
                _this.next("span").css("display", "block");
                _this.next("span").css("color", "red");
                _this.next("span").html("please enter in 12-72 range");

                jQuery(".single_add_to_cart_button").attr("disabled", true);
                return false;
            } else {
                jQuery(".single_add_to_cart_button").removeAttr("disabled");
                jQuery("#alg_wc_pif_local_1").removeAttr("disabled");
                _this.next("span").css("display", "none");
                return false;
            }
        });

        jQuery("#fpd-start-customizing-button").bind('click', function () {
            calculater(rec_height, radius_width);
// 			console.log(rec_height);
// 		console.log('yyyy');
// 		console.log(radius_width);
        });
   setTimeout(function () {
            jQuery("#fpd-start-customizing-button").trigger("click");
        }, 2000);

    });

</script>
<script type="text/javascript">
    function calculater(height, width) {

        //rectangle
        if (height != '') {

            if (height < 20 && height >= 12) {
                var new_height = 120 + 'px';
            }
            if (height < 26 && height >= 20) {
                var new_height = 140 + 'px';
            }
            if (height < 31 && height >= 25) {
                var new_height = 180 + 'px';
            }
            if (height < 36 && height >= 30) {
                var new_height = 220 + 'px';
            }
            if (height < 41 && height >= 35) {
                var new_height = 260 + 'px';
            }
            if (height < 46 && height >= 40) {
                var new_height = 300 + 'px';
            }
            if (height < 51 && height >= 45) {
                var new_height = 340 + 'px';
            }
            if (height < 56 && height >= 50) {
                var new_height = 380 + 'px';
            }
            if (height < 61 && height >= 55) {
                var new_height = 420 + 'px';
            }
            if (height < 66 && height >= 60) {
                var new_height = 460 + 'px';
            }
            if (height < 71 && height >= 65) {
                var new_height = 500 + 'px';
            }
            if (height < 73 && height >= 70) {
                var new_height = 520 + 'px';
            }

            if (width < 20 && width >= 12) {
                var new_width = 120 + 'px';
            }
            if (width < 26 && width >= 20) {
                var new_width = 140 + 'px';
            }
            if (width < 31 && width >= 25) {
                var new_width = 180 + 'px';
            }
            if (width < 36 && width >= 30) {
                var new_width = 220 + 'px';
            }
            if (width < 41 && width >= 35) {
                var new_width = 260 + 'px';
            }
            if (width < 46 && width >= 40) {
                var new_width = 300 + 'px';
            }
            if (width < 51 && width >= 45) {
                var new_width = 340 + 'px';
            }
            if (width < 56 && width >= 50) {
                var new_width = 380 + 'px';
            }
            if (width < 61 && width >= 55) {
                var new_width = 420 + 'px';
            }
            if (width < 66 && width >= 60) {
                var new_width = 460 + 'px';
            }
            if (width < 71 && width >= 65) {
                var new_width = 500 + 'px';
            }
            if (width < 73 && width >= 70) {
                var new_width = 520 + 'px';
            }
//            alert(new_width);
//             alert(new_height);

            jQuery(".fpd-pos-left").append('<div class="shape_edit"><input id="mat_rec_width" type="text" style="text-align:center; " value="' + width + '" ><span></span>x <input id="mat_rec_height" type="text" style="text-align:center; " value="' + height + '" ><span></span></div>');
            jQuery(".fpd-product-stage").css({"width": new_width, "height": new_height});
            jQuery(".fpd-view-stage").css({"position": "absolute", "top": "50%", "left": "50%", "margin": "0 auto", "transform": "translate(-50% , -50%)", "width": "100%", "height": "100%"});
            jQuery(".upper-canvas").css("width", "100%");
            jQuery(".upper-canvas").css("height", "100%");
            jQuery(".lower-canvas").css("width", "100%");
            jQuery(".lower-canvas").css("height", "100%");
             
            

        } else {
            //circle
            var circle_url = '<?php the_permalink(); ?>';

            if (circle_url == '<?php echo site_url('/'); ?>product/circle_shaped/') {
                var height = width;

                if (height < 20 && height >= 12) {
                    var new_height = 120 + 'px';
                }
                if (height < 26 && height >= 20) {
                    var new_height = 140 + 'px';
                }
                if (height < 31 && height >= 25) {
                    var new_height = 180 + 'px';
                }
                if (height < 36 && height >= 30) {
                    var new_height = 220 + 'px';
                }
                if (height < 41 && height >= 35) {
                    var new_height = 260 + 'px';
                }
                if (height < 46 && height >= 40) {
                    var new_height = 300 + 'px';
                }
                if (height < 51 && height >= 45) {
                    var new_height = 340 + 'px';
                }
                if (height < 56 && height >= 50) {
                    var new_height = 380 + 'px';
                }
                if (height < 61 && height >= 55) {
                    var new_height = 420 + 'px';
                }
                if (height < 66 && height >= 60) {
                    var new_height = 460 + 'px';
                }
                if (height < 71 && height >= 65) {
                    var new_height = 500 + 'px';
                }
                if (height < 73 && height >= 70) {
                    var new_height = 520 + 'px';
                }

                if (width < 20 && width >= 12) {
                    var new_width = 120 + 'px';
                }
                if (width < 26 && width >= 20) {
                    var new_width = 140 + 'px';
                }
                if (width < 31 && width >= 25) {
                    var new_width = 180 + 'px';
                }
                if (width < 36 && width >= 30) {
                    var new_width = 220 + 'px';
                }
                if (width < 41 && width >= 35) {
                    var new_width = 260 + 'px';
                }
                if (width < 46 && width >= 40) {
                    var new_width = 300 + 'px';
                }
                if (width < 51 && width >= 45) {
                    var new_width = 340 + 'px';
                }
                if (width < 56 && width >= 50) {
                    var new_width = 380 + 'px';
                }
                if (width < 61 && width >= 55) {
                    var new_width = 420 + 'px';
                }
                if (width < 66 && width >= 60) {
                    var new_width = 460 + 'px';
                }
                if (width < 71 && width >= 65) {
                    var new_width = 500 + 'px';
                }
                if (width < 73 && width >= 70) {
                    var new_width = 520 + 'px';
                }


                jQuery(".fpd-pos-left").append('<div> <h5>Radius is : <input style="" id="mat_radius" value =' + height + ' type="text"><span></span></h5> </div>');
                jQuery(".fpd-product-stage").css({"width": new_width, "height": new_width});
                jQuery(".fpd-view-stage").css({"position": "absolute", "top": "50%", "left": "50%", "margin": "0 auto", "transform": "translate(-50% , -50%)", "width": "100%", "height": "100%"});
                jQuery(".upper-canvas").css("width", "100%");
                jQuery(".upper-canvas").css("height", "auto");
                jQuery(".lower-canvas").css("width", "100%");
                jQuery(".lower-canvas").css("height", "auto");
                
            

            } else {
                //square
                var height = width;

                if (height < 20 && height >= 12) {
                    var new_height = 120 + 'px';
                }
                if (height < 26 && height >= 20) {
                    var new_height = 140 + 'px';
                }
                if (height < 31 && height >= 25) {
                    var new_height = 180 + 'px';
                }
                if (height < 36 && height >= 30) {
                    var new_height = 220 + 'px';
                }
                if (height < 41 && height >= 35) {
                    var new_height = 260 + 'px';
                }
                if (height < 46 && height >= 40) {
                    var new_height = 300 + 'px';
                }
                if (height < 51 && height >= 45) {
                    var new_height = 340 + 'px';
                }
                if (height < 56 && height >= 50) {
                    var new_height = 380 + 'px';
                }
                if (height < 61 && height >= 55) {
                    var new_height = 420 + 'px';
                }
                if (height < 66 && height >= 60) {
                    var new_height = 460 + 'px';
                }
                if (height < 71 && height >= 65) {
                    var new_height = 500 + 'px';
                }
                if (height < 73 && height >= 70) {
                    var new_height = 520 + 'px';
                }

                if (width < 20 && width >= 12) {
                    var new_width = 120 + 'px';
                }
                if (width < 26 && width >= 20) {
                    var new_width = 140 + 'px';
                }
                if (width < 31 && width >= 25) {
                    var new_width = 180 + 'px';
                }
                if (width < 36 && width >= 30) {
                    var new_width = 220 + 'px';
                }
                if (width < 41 && width >= 35) {
                    var new_width = 260 + 'px';
                }
                if (width < 46 && width >= 40) {
                    var new_width = 300 + 'px';
                }
                if (width < 51 && width >= 45) {
                    var new_width = 340 + 'px';
                }
                if (width < 56 && width >= 50) {
                    var new_width = 380 + 'px';
                }
                if (width < 61 && width >= 55) {
                    var new_width = 420 + 'px';
                }
                if (width < 66 && width >= 60) {
                    var new_width = 460 + 'px';
                }
                if (width < 71 && width >= 65) {
                    var new_width = 500 + 'px';
                }
                if (width < 73 && width >= 70) {
                    var new_width = 520 + 'px';
                }

                jQuery(".fpd-pos-left").append('<div>Width is :<input id="mat_square_width" value=' + width + ' type="text" style=""><span></span></div>');
                jQuery(".fpd-product-stage").css({"width": new_width, "height": new_height});
                jQuery(".fpd-view-stage").css({"position": "absolute", "top": "50%", "left": "50%", "margin": "0 auto", "transform": "translate(-50% , -50%)", "width": "100%", "height": "100%"});
                jQuery(".upper-canvas").css("width", "100%");
                jQuery(".upper-canvas").css("height", "auto");
                jQuery(".lower-canvas").css("width", "100%");
                jQuery(".lower-canvas").css("height", "auto");
                
            
            }
        }
    }
</script>
</body>
</html>
