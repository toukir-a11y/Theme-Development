<!-- hero section start -->
<div class="navigation text-right">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">

                <?php
            		wp_nav_menu(
            			array (

            				"theme_location"  => "Top Menu",
            				"menu_id"         => "topmenucontainer",
            				"menu_class"      => "list-inlline text-right",

            				)
            				);
            			?>
            </div>
        </div>
    </div>

    <div class="container search-form">
        <div class="row">
            <div class="col-md-12">
                <?php 
                 if(is_search()){
                ?>
                <h3>
                    <?php _e("you seacrh for :");?><?php echo  get_search_query();?>
                </h3>

                <?php
                 }
                ?>
                <?php echo get_search_form();?>
            </div>
        </div>
    </div>

</div>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="header_logo  text-center">
                    <?php the_custom_logo();?>
                </div>

                <h3 class="tagline"><?php bloginfo("description");?></h3>
                <a href="<?php echo site_url();?>">
                    <h1 class="align-self-center display-1 text-center heading"><?php bloginfo("name");?></h1>
                </a>
            </div>

        </div>
    </div>
</div>

<!-- header section end-->