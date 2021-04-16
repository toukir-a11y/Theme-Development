
<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("hero");?>

<!-- post section start-->

<div class="posts">

 <?php
 while(have_posts()){
 the_post();
 ?>
         <div class="post" <?php post_class();?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title text-center">
                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <strong><?php the_author();?></strong><br/>
                        <?php echo get_the_date();?>
                    </p>

                   <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>");?> 
                </div>

                <div class="col-md-12">
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

                        <?php
                        if (post_password_required()){
                          echo get_the_password_form();
                        
                        }else  the_excerpt(); 
                        ?> 


                        <p class=" text-left" >
                            <a href="<?php the_permalink();?>">Read More.....</a>   
                        </p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>

<!-- post section end -->


<!-- post_pagination  section start-->


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


<!-- post_pagination  section end-->

<?php get_footer();?>
