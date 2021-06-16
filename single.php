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
                                    if (get_post_format()=="image" && function_exists("the_field")){
                                        ?>
                                        <div class="metainfo">
                                            <?php 
                                        
                                            $camera_name= get_field("camera_name");
                                            echo esc_html($camera_name);
                                             ?> </br>
                                            <?php 
                                            $camera_model= get_field("camera_model");
                                            echo esc_html($camera_model);
                                            ?> </br>
                                            <?php 
                                            $location= get_field("click_location");
                                            echo esc_html($location);
                                            ?> </br>
                                            <?php 
                                            $date= get_field("date");
                                            echo esc_html($date);
                                            ?> </br>
                                            <?php
                                            if(get_field("licensed")){
                                                echo apply_filters("the_content", get_field("license_information"));
                                            }
                                            
                                            ?>

                                            <p>
                                            <?php
                                            $id= get_field("image");
                                            $image_size= get_field("image_size");

                                            $image_details= wp_get_attachment_image_src( $id, array ($image_size,$image_size));
                                            //echo "<img src = '".esc_url($image_details[0] )."'/>'";
                                            echo esc_url($image_details[0]);                                        
                                            ?>
                                            </p>

                                            <p>                                        
                                            <?php 
                                            //  $file = get_field("attachment");
                                            //  $file_url= wp_get_attachment_url($file);
                                            //  if ($file){
                                            //      $file_thumb = get_field("thumbnail",$file);
                                            //      if($file_thumb){
                                            //          $thumb_details=  wp_get_attachment_image_src($file_thumb);
                                            //         echo "<a target='_blank' href='{$file_url}'><img src = '".esc_url($thumb_details[0] )."'/></a>";
                                            //      }else{
                                            //         echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";

                                            //      }
                                            //  }

                                                $file = get_field("attachment");
                                                $file_url= wp_get_attachment_url($file);
                                                echo "<a target='blank' href='{$file_url}'>$file_url</a>";

                                            ?>                                          
                                            </p>

                                            <?php if (function_exists("the_field")):?>
                                                <div class="releted_post">
                                                <h1><?php _e("releted post", "demo");?></h1>
                                                    <?php
                                                        $releated_post = get_field("releted_post");
                                                        $rp = new WP_Query( array(
                                                            'post__in'=>$releated_post,
                                                            'orderby' => 'post__in',

                                                        ));

                                                        while ($rp -> have_posts()){
                                                            $rp -> the_post();
                                                            ?>
                                                            <h4><a href="<?php the_permalink();?>"><?php the_title();?></h4></a>
                                                            <?php
                                                        }
                                                        wp_reset_query();
                        
                                                    ?>                                                
                                                </div>
                                            <?php endif ;?>
                                                                  
                                        </div>
                                        <?php
                                    }
                                    wp_link_pages();
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

                                    <?php if(function_exists("the_field")):?>                   
                                    <p>                                  
                                        facebook: <?php the_field("facebook","user_". get_the_author_meta("id"));?></br>
                                        twitter : <?php the_field("twitter","user_". get_the_author_meta("id"));?>                                   
                                    </p>
                                    <?php endif; ?>
                                    
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