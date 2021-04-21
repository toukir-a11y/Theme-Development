<!-- footer section start-->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <?php 
			if (is_active_sidebar("sidebar-2")){
				dynamic_sidebar("sidebar-2 ");
			}
			?>
            </div>

            <div class="col-md-6 text-right style-unstyle">
                <?php 
			if (is_active_sidebar("sidebar-3")){
				dynamic_sidebar("sidebar-3 ");
			}
			?>
            </div>

            <div class="navigation text-right">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">

                            <?php
            		wp_nav_menu(
            			array (

            				"theme_location" =>"footer Menu",
            				"menu_id" => "footermenucontainer",
            				"menu_class" => "list-inlline text-right",

            				)
            				);
            			?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                &copy; Toukir - All Rights Reserved
            </div>
        </div>
    </div>
</div>

<?php wp_footer();?>

<!-- footer section end-->

</body>
</html>