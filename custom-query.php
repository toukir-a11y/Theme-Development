<?php 
/*
Template Name: custom query 
*/
?>

<?php get_header();?>
 <body <?php body_class();?>>
    <?php get_template_part("hero");?>

    <!-- post section start-->

<?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
   // $total=10;
    $post_ids=array(19,28,23,26,1,122);
    //$author_ids= array(1);
      $cq= get_posts(
          array(
            'post__in'=>$post_ids,
           // 'author__in'=> array(1),
            'order_by'=>'post_in',
            'posts_per_page'=> $posts_per_page,
            'paged'=>$paged,
            'nop'=>$total,
        )
        );
        setup_postdata($post);
        foreach($cq as $post){
       ?> 
<h2>
    <a href="<?php the_permalink();?>">
        <?php the_title();?></a>
</h2>
<?php
        }
        wp_reset_postdata();
    ?>
    <!-- post section end -->

    <!-- post_pagination section start-->

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <p>
                   <?php echo paginate_links(
                       
                       array(
                           'total'=> ceil(count($post_ids)/$posts_per_page),
                       ) 
                       );
                       ?>
                </p>
            </div>
        </div>
    </div>

    <!-- post_pagination section end-->

    <?php get_footer();?>