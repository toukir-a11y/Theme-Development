<div class="comment">
    <h3 class="comment-title">
    <?php 
    $comment_count= get_comments_number();
    if (1==$comment_count){
        echo _e("1 commnet");
    }else echo $comment_count." ".__("comment");  
    
    ?>
    </h3>

    <div class="comment-list">
        <?php wp_list_comments();?>
    </div>

    <div class="pagination">
        <?php the_comments_pagination(
            array(
                'screen_reader_text'=> '    '
            )

        );
        
        ?>

    </div>

    <div class="comment-form">
        <?php
        if(!comments_open()){
         ?>
        <h3><?php _e("comment are  closed")?></h3>
        <?php
        }
        comment_form();
     ?>

    </div>

</div>






<?php
/*
//Get only the approved comments
$args = array(
    'status' => 'approve',
    'post_id'=> get_the_ID()
);
 
// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );
 
// Comment Loop
if ( $comments ) {
 foreach ( $comments as $comment ) {

 ?>
<div class="media">
    <?php echo get_avatar($comments);?>
    <div class="media-body">
        <h5 class="mt-0"><?php comment_author($comments);?></h5>
        <?php comment_text($comments);?>
    </div>
</div>
<?php

 }
} else {
 echo 'No comments found.';
}

comment_form();
*/
?>