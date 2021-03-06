<?php get_header();?>
<body <?php body_class();?>>
    <?php get_template_part("hero");?>

    <!-- post section start-->

    <div class="posts">

        <?php
 
    while(have_posts()){
        the_post();
        get_template_part("post-formats/content", get_post_format());
    }
    ?>
    </div>

    <!-- post section end -->

    <!-- post_pagination section start-->

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <p>
                    <?php the_posts_pagination(array("screen_reader_text"=>' '));?>
                </p>
            </div>
        </div>
    </div>

    <!-- post_pagination section end-->

    <?php get_footer();?>