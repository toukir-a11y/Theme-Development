<?php get_header();?>
<body <?php body_class();?>>
    <?php get_template_part("hero");?>

    <!-- post section start-->

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

<?php
    while(have_posts()){
        the_post();
       ?>
<h1>
    <a href="<?php the_permalink();?>">
        <?php the_title();?></a>
</h1>

<?php
    }
    ?>

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