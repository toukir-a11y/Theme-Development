<?php
$sidebar_show= "col-md-8";
if (!is_active_sidebar("sidebar-1")){
    $sidebar_show= "col-md-10 offset-md-1";
}

?>

<?php get_header();?>
<body <?php body_class();?>>
    <?php get_template_part("hero");?>

    <div class="container">
        <div class="row">
            <div class="<?php echo $sidebar_show; ?>">

                <!-- post section start-->

                <div class="posts">

                    <?php
                    while(have_posts()){
                    the_post();
                    ?>
                    <div <?php post_class();?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <h2 class="post-title ">
                                        <?php the_title();?>
                                    </h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <p class="text-center">
                                        <strong><?php the_author_posts_link();?></strong><br/>
                                        <?php echo get_the_date();?>
                                    </p>
                                </div>
                                <div class="col-md-12 ">
                                    <p>
                                        <?php 
                                       if (has_post_thumbnail()){
                                       	$thumbnail_url = get_the_post_thumbnail_url(null,"large");
                                       	echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                        the_post_thumbnail("large", array ("class"=>"img-fluid"));
                                         echo '</a>';

                        }
                       ?>
                                    </p>
                                    <?php the_content();
                                    wp_link_pages();

                                      /*next_post_link();
                                      echo"</br>";
                                      previous_post_link();
                                     */

                      ?>
                                </div>
                                <div class="container border">
                                    <div class="row">
                                        <div class=" col-md-2 ">
                                            <?php  echo get_avatar(get_the_author_meta("id"));?>
                                        </div>
                                        <div class="col-md-8">
                                            <?php echo get_the_author_meta("display_name");?>
                                        </br>
                                        <?php echo get_the_author_meta("description");?>

                                    </div>
                                </div>
                            </div>

                            <?php if(!post_password_required()):?>
                            <div class="col-md-6  cmnt ">
                             <?php comments_template();?>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <?php
    }
    ?>
                </div>
            </div>
        </div>

        <!-- post section end -->

        <div class="col-md-4">
            <?php 
            
            if (is_active_sidebar("sidebar-1")){
             dynamic_sidebar("sidebar-1");
}
?>
        </div>
    </div>
</div>
<?php get_footer();
?>

