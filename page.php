<?php get_header();?>
<body <?php body_class();?>>
    <?php get_template_part("hero");?>

    <!-- post section start-->

    <div class="posts">

        <?php
 while(have_posts()){
 the_post();
 ?>
        <div <?php post_class();?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-4  ">
                        <h2 class="post-title">
                            <?php the_title();?>
                            <?php today_date();?>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <strong><?php the_author();?></strong><br/>
                            <?php echo get_the_date();?>
                        </p>
                    </div>

                    <div class="col-md-10 offset-md-1">
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
                        <?php the_content();?>
                    </div>

                </div>
            </div>

            <?php
    }
    ?>
        </div>
    </div>
</div>

<!-- post section end -->

<?php get_footer();?>