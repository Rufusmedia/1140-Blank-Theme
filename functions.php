<?php
/*
| ===================================================
| RM FUNCTIONS SHEET V1.0
| ===================================================
*/

/*
|====================================================
| WIDGETIZED SIDEBAR SUPPORT
|====================================================
*/
if (function_exists('register_sidebar')) {

	register_sidebar(array('name'=>'sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<p class="title">',
		'after_title' => '</p>',
	));
}

/*
|====================================================
| ADDS SUPPORT FOR WORDPRESS CUSTOM MENUS
| ===================================================
*/

function register_my_menus() {
	register_nav_menus(
		array('header-menu' => __( 'Header Menu' ))
	);
}

add_action( 'init', 'register_my_menus' );

/*
|====================================================
| REMOVE UNNEEDED CALLS TO WP-HEAD
| ===================================================
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/*
|====================================================
| REMOVE DEFAULT DASHBOARD WIDGETS
|====================================================
*/
function disable_default_dashboard_widgets() {

	//COMMENT AND UN-COMMENT AS NEEDED TO CUSTOMIZE.
	//remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	//remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

/*
|====================================================
| CUSTOM COMMENT FUNCTION
|====================================================
*/
function rm_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
		<div class="comment-meta commentmetadata"><?php printf(__('%s'), get_comment_date()) ?><?php edit_comment_link(__('Edit Comment'),'  <span class="post-edit-link">','</span>') ?></div>
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?>
         <?php echo(__('<p><strong>'.get_comment_author().':</strong></p>')) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' =>'Reply to this comment'))) ?>
	  </div>
    </div>
<?php
        }

/*
|====================================================
| ADD POST THUMBNAIL SUPPORT TO THEME
|====================================================
*/
// ENABLE THIS AS NEEDED, PREFER ADVANCED CUSTOM FIELDS PLUGIN
// add_theme_support( 'post-thumbnails' );

/*
|====================================================
| REMOVES DEFAULT MENUS
|====================================================
*/
function remove_menus () {
global $menu;
	$restricted = array( __('Links'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

/*
|====================================================
| CUSTOMIZE THE ADMIN FOOTER AREA
|====================================================
*/
function custom_admin_footer() {
	echo 'Website design by <a href="http://rufusmedia.com/">Rufusmedia</a> &copy; '.date("Y").'. For site support please <a href="http://rufusmedia.com/contact">contact us</a>.';
} 
add_filter('admin_footer_text', 'custom_admin_footer');

/*
|====================================================
| INCLUDE JQUERY
|====================================================
*/
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

/*
|====================================================
|  CODE TO CHANGE LOGIN LOGO / LINK / TITLE
|====================================================
*/
// REMEMBER TO PUT A LOGIN-LOGO FILE IN THE SITE ASSETS FOLDER OF THE THEME
function login_styles() {
echo '<style type="text/css">.login h1 a { background: url('. get_bloginfo("template_directory") .'/site-assets/login-logo.png) no-repeat center top; margin-bottom:15px; }</style>';
}
add_action('login_head', 'login_styles');

function loginpage_custom_link() {
	return 'http://www.rufusmedia.com';
}
add_filter('login_headerurl','loginpage_custom_link');

function change_title_on_logo() {
	return 'Site by Rufusmedia';
}
add_filter('login_headertitle', 'change_title_on_logo');
