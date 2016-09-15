<?php

// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 225, 175, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size

// Custom title-switching function.
function title($is_shelf) {
   $title = wp_title('',false,'');
   $cap = ucwords($title);

   if (is_search()) {
   echo "Search for " .  get_search_query() . ' | ';
   }
   elseif (is_archive()) {
   echo 'Archive for ' . $cap . ' | ';
   }
   if ((is_404()) && !($GLOBALS['is_shelf'] == 'yes')) {
   echo "Error?! Oh noes!" . ' | ';
   }
   elseif (is_feed()) {
   echo 'Feed for ' . $cap . ' | ';
   }
   elseif ($GLOBALS['is_shelf'] == "yes") {
   echo 'MediaShelf | ';
   }
   else {
   echo $cap . ' | ';
   }
}

//jquery
function my_init_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action('init', 'my_init_method');
 
if (!is_admin() ) {
	wp_register_script('script_nivo_slider',
	get_bloginfo('template_directory'). '/jquery.nivo.slider.pack.js',
	array('jquery'));
	wp_enqueue_script('script_nivo_slider');
	
	wp_register_script('script',
	get_bloginfo('template_directory'). '/script.js',
	array('jquery'));
	wp_enqueue_script('script');
}


// Sidebar Widgets
// http://automattic.com/code/widgets/themes/
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
    
function replace_the_password_form($content) {
  global $post;
  // if there's a password and it doesn't match the cookie
  if ( !empty($post->post_password) && stripslashes($_COOKIE['wp-postpass_'.COOKIEHASH])!=$post->post_password ) {
    $output = '
	<p>You are trying to view a page that is password protected. If you feel you reached this message in error please contact us.</p>
    <form action="'.get_option('siteurl').'/wp-pass.php" method="post">
		<p>
        <label>Password:</label>
        <input name="post_password" class="input" type="password" size="25" />
        <input type="submit" name="Submit" class="button" value="'.__("Submit").'" />
		</p>
    </form>
    ';
    return $output;
  }
  else return $content;
}
add_filter('the_content','replace_the_password_form');

// 404 Error Email Notification
// http://codex.wordpress.org/Conditional_Tags#Helpful_404_page
function errorNotify() {
$adminemail = get_bloginfo('admin_email');
$website = get_bloginfo('url');
$websitename = get_bloginfo('name');
if (!isset($_SERVER['HTTP_REFERER'])) {
	
	$casemessage = "<p>What you were looking for doesn't exist!</p>"; // If the visitor purposefully tried to go to something that wasn't there.
	
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
	$failuremess = "404 Error: $website" .$_SERVER['REQUEST_URI']."\n\n";
	$failuremess .= "Referred: ".$_SERVER['HTTP_REFERER']. "\n\n";
	$failuremess .= "IP: " .$_SERVER['REMOTE_ADDR']. "\n\n";
	$failuremess .= "Browser: " .$_SERVER['HTTP_USER_AGENT']. "\n\n";
	mail($adminemail, "[404] ".$_SERVER['REQUEST_URI'], $failuremess, "From: $websitename <noreply@$website>");

	$casemessage = '<p>I have been notified about this error.</p>'; // If the visitor accidentally tried to go to something that wasn't there.
 
 }  echo ' <span class="searchquery">'.$website.$_SERVER['REQUEST_URI'] . '</span> '; 
 
 echo $casemessage; } ?>