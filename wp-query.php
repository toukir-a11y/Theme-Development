<?php 
/*
Template Name:wp query 
*/
?>

<?php get_header();?>
 <body <?php body_class();?>>
    <?php get_template_part("hero");?>

    <!-- post section start-->

    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;   //for pagination 

        $wq= new WP_Query(
            array (

                'posts_per_page'=> 4,
                'paged'=> $paged,
                'meta_key'=> 'future',
                'meta_value'=> '1',
                
                //'post__in'=> array(19,28,26,1),
                //'category_name'=>'test', 
                // 'tag'=> 'special',     
               
                //  'tax_query'=>array(
                //      'relation'=> 'OR',
                //      array(
                //          'taxonomy'=>'post_format',  
                //          'field'=>'slug',  
                //          'terms'=>array(
                //              'post-format-audio',  
                //              'post-format-video',  
                            
                //             ),

                            
                //      )


                  //   'tax_query'=>array(
                  //      'relation'=> 'OR',
                 //    array(
                 //           'taxonomy'=> 'categoty',
                //            'field'=> 'slug',
                //            'terms'=> array('test')
                

                //      array (
                //         'taxonomy'=> 'post_tag',
                //         'field'=> 'slug',
                //         'terms'=> array('special')
                //      )
                //  )    
                    
                //  'monthnum'           => 04,                        //  for month post show 
                //  'year'               =>2021,                          //  for year post show 
                //  'post_status'        => 'draft',              //  for draft post show
                //  'post_status'        => 'future',            //  for future post show
                
            )
            );

            while ($wq-> have_posts(  )){
                $wq-> the_post( )
       
        ?>
            <h4><?php the_title();?></h4>
        
        <?php
        }
        wp_reset_query();
        ?>
        
    <!-- post section end -->

    <!-- post_pagination section start-->

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <p>
                    <?php
                        echo paginate_links(
                        array (
                            'total'=>$wq->max_num_pages,
                            'current'=> $paged,
                        )
                        );               
                    ?>
                </p>
            </div>
        </div>
    </div>

    <!-- post_pagination section end-->

    <?php get_footer();?>