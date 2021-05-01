<?php

if (site_url()=="http://localhost/try"){
    define ("VERSION",time());
}else define("VERSION", wp_get_theme()->get("Version"));


function boot (){
	load_theme_textdomain ("neptune");
	add_theme_support("post-thumbnails");
	add_theme_support("title-tag");
    add_theme_support("custom-background");
    add_theme_support( 'html5', array( 'search-form' ) );

    
    $logo_size= array (

        "width"=> '100',
        "height"=>'100'
    );

    add_theme_support("custom-logo", $logo_size );
 
    $custom_header_details= array(

        'header-text' => true,
        'default-text-color'=> '#222',
    );

    add_theme_support("custom-header",  $custom_header_details );
    register_nav_menu("Top Menu",__("Top Menu","neptune"));
    register_nav_menu("footer Menu",__("footer Menu","neptune"));

    add_theme_support("post-formats", array("audio","video","image","quate","link"));


    add_image_size("test",400,400,true);

}
add_action ("after_setup_theme", "boot");




function bcj_load(){
    
	wp_enqueue_style("bload", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("father-light-cssload", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_style("dashicons");
    wp_enqueue_style("cload", get_stylesheet_uri(), null,VERSION );
    wp_enqueue_script("father-light-jsload", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"),"0.1",true);
    wp_enqueue_style("demo-css-file",get_template_directory_uri()."/assets/parent.css");
   // wp_enqueue_script("internal_js",get_template_directory_uri()."/internal/js/main.js",null,"0.1",true);   
}

add_action ("wp_enqueue_scripts", "bcj_load");

function sidebar(){

	register_sidebar( 
		array(
        'name'          => __( 'Sidebar', 'neptune' ),
        "description"   => __( "neptune sidebar", "neptune"),
        'id'            => 'sidebar-1',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );


    register_sidebar( 
		array(
        'name'          => __( 'footer Sidebar', 'neptune' ),
        "description"   => __( "footer sidebar right", "neptune"),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}

add_action("widgets_init","sidebar");


function change_format (){
    return "%s";
}
add_filter("protected_title_format", "change_format"); // this hook remove for pretected tag in password protected post 


function css_class($classes ,$item){
    $classes []= "list-inline-item";
    return $classes;
}

add_filter("nav_menu_css_class", "css_class",10, 2);



function header_support(){
    if (is_front_page()){
        if(current_theme_supports("custom-header")){
            ?>
<style>
    .header {
        background-image: url(<?php echo header_image();?>);
        background-repeat: no-repeat;
        background-size: cover;
    }

    .header h1 {
        color: #<?php echo get_header_textcolor();
        ?>;
    }
    .header h3 {
        color: #<?php echo get_header_textcolor();
        ?>;
    }
</style>

<?php

        }
    }
}

add_action("wp_head","header_support");


function remove($classes){
    unset($classes[array_search("format-audio",$classes)]);
    return $classes;
}

add_filter("post_class", "remove");




function search_highlight($text){
    if(is_search()){
        $pattern = '/('.join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }

    return $text;
}


add_filter('the_content', 'search_highlight');
add_filter('the_excerpt', 'search_highlight');
add_filter('the_title',   'search_highlight');


?>