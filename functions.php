<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );

add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  // load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  // require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  // wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');


add_action( 'gform_after_submission', 'show_download', 10, 2 );
function show_download( $entry, $form ) { 

    return 20; 

    echo '<script>jQuery(".promo-download").show();</script>';
 }

/**
 * to exclude field from notification add 'exclude[ID]' option to {all_fields} tag
 * 'include[ID]' option includes HTML field / Section Break field description / Signature image in notification
 * see http://www.gravityhelp.com/documentation/page/Merge_Tags for a list of standard options
 * example: {all_fields:exclude[2,3]}
 * example: {all_fields:include[6]}
 * example: {all_fields:include[6],exclude[2,3]}
 */
add_filter( 'gform_merge_tag_filter', 'all_fields_extra_options', 11, 5 );
function all_fields_extra_options( $value, $merge_tag, $options, $field, $raw_value ) {
    if ( $merge_tag != 'all_fields' ) {
        return $value;
    }

    // usage: {all_fields:include[ID],exclude[ID,ID]}
    $include = preg_match( "/include\[(.*?)\]/", $options , $include_match );
    $include_array = explode( ',', rgar( $include_match, 1 ) );

    $exclude = preg_match( "/exclude\[(.*?)\]/", $options , $exclude_match );
    $exclude_array = explode( ',', rgar( $exclude_match, 1 ) );

    $log = "all_fields_extra_options(): {$field['label']}({$field['id']} - {$field['type']}) - ";

    if ( $include && in_array( $field['id'], $include_array ) ) {
        switch ( $field['type'] ) {
            case 'html' :
                $value = $field['content'];
                break;
            case 'section' :
                $value .= sprintf( '<tr bgcolor="#FFFFFF">
                                                        <td width="20">&nbsp;</td>
                                                        <td>
                                                            <font style="font-family: sans-serif; font-size:12px;">%s</font>
                                                        </td>
                                                   </tr>
                                                   ', $field['description'] );
                break;
            case 'signature' :
                $url = GFSignature::get_signature_url( $raw_value );
                $value = "<img alt='signature' src='{$url}'/>";
                break;
        }
        GFCommon::log_debug( $log . 'included.' );
    }
    if ( $exclude && in_array( $field['id'], $exclude_array ) ) {
        GFCommon::log_debug( $log . 'excluded.' );
        return false;
    }
    return $value;
}

// Register Custom Post Type
function vizual_promos_cpt() {

  $labels = array(
    'name'                => _x( 'Promos', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Promo', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Promos', 'text_domain' ),
    'name_admin_bar'      => __( 'Promo', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Promo:', 'text_domain' ),
    'all_items'           => __( 'All Promos', 'text_domain' ),
    'add_new_item'        => __( 'Add New Promo', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'new_item'            => __( 'New Promo', 'text_domain' ),
    'edit_item'           => __( 'Edit Promo', 'text_domain' ),
    'update_item'         => __( 'Update Promo', 'text_domain' ),
    'view_item'           => __( 'View Promo', 'text_domain' ),
    'search_items'        => __( 'Search Promo', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Promo', 'text_domain' ),
    'description'         => __( 'Digital music promos', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', 'page-attributes', ),
    'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-album',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,    
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'promos', $args );

}
add_action( 'init', 'vizual_promos_cpt', 0 );


// add_filter('gform_confirmation_anchor', '__return_false');

// removes auto-formatting for ACF fields
remove_filter ('acf_the_content', 'wpautop');

/**
 * Save the confirmation number of the wire transfer to the user's meta
 */
add_action( 'gform_after_submission_2', 'promo_input_fields', 10, 2 );

function promo_input_fields( $entry, $form ) {

  $user_id = get_current_user_id();

    $affiliation = $entry[8];

    update_user_meta( $user_id, 'user_affiliation', $affiliation );


      $formID = rgar( $entry, 'form_id' );
      $cat = rgar( $entry, '10' );
      $date = rgar($entry, 'date_created');
      
      // $submit_data = $cat;

      $submit_data = array(
        "catalog_number" => $cat,
        "sub_date" => $date,
      );
      

      // add_user_meta( $user_id, 'submit_data', $submit_data);

      update_user_meta( $user_id, 'submit_data'. '_' . $cat, $submit_data, '' ); 

}

add_action( 'gform_after_submission_3', 'profile_input_fields', 10, 2 );

function profile_input_fields( $entry, $form ) {

  $user_id = get_current_user_id();

    $affiliation = $entry[5];

    update_user_meta( $user_id, 'user_affiliation', $affiliation );

    $email = $entry[7];

    update_user_meta( $user_id, 'email_schedule', $email );

    $location = $entry[8];

    update_user_meta( $user_id, 'user_location', $location );

    $password = $entry[9];

    update_user_meta( $user_id, 'user_pass', $password );

}


// // Redirect users who arent logged in...
// function login_redirect() {

//     // Current Page
//     global $pagenow;

//     // Check to see if user in not logged in and not on the login page
//     if(!is_user_logged_in() && $pagenow != 'wp-login.php')
//           // If user is, Redirect to Login form.
//           auth_redirect();
// }
// // add the block of code above to the WordPress template
// add_action( 'wp', 'login_redirect' );

function change_author_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'user';
    $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';
}
add_action('init','change_author_permalinks');

// add_filter('wp_nav_menu_items','add_custom_in_menu', 10, 2);
// function add_custom_in_menu( $items, $args ) {
//   if ( is_user_logged_in() ) {
//   $current_user = wp_get_current_user();
//   $slug = $current_user->user_login;

//   $avatar = get_avatar( $current_user->user_email, 24 );
//   $logout = wp_logout_url( home_url() );
                    
                    
//     if( $args->theme_location == 'main-nav')  {
         
//         $items .=  '<li class="user-menu-item menu-item"><a href="/user/' . $slug . '/' . '">' . $avatar . 'My Account' . '</a></li><li class="logout-menu-item menu-item sub-menu-item"><a href="' . $logout . '">Log Out</a></li>';
  
//     }
//     return $items;
//   }
// }

add_action('wp_ajax_myprefix_delete_user','myprefix_delete_user_cb');
function myprefix_delete_user_cb(){
    //You should check nonces and user permissions at this point.
    $user_id = int_val($_REQUEST['user_id']);
    wp_delete_user($user_id);
    exit();
}

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

function random_sentence() {
$quotes = array(
"Oooooooops...",
"Awwwww Hell...",
"The internets are hard.",
"Say what? Say huh?",
"We speak English 'round these parts...",
"Give me something I can use...",
"Oh hell naw! You are not trying to make me go find that again...",
"Say '?' again, I dare you, I double dare you...",
"I love you, but I've chosen 404...",
"You're looking for stuffs that's not here...",
"Bloop, bleep, blop, bloop...",
"Uh, hello?!? That's, like, totally not here...",
"Sort it out, mate...try again.",
"That's 'Vizual', with a 'z'.",
"Either our servers crapped out or you made a boo-boo.",
"Oh dear, you've done it again.",
"Type it with the thing on the other thing at the end there.",
"Bless your poor typing little heart.",
"Well hai, welcomes to mi sitez. I helps you find stuffz.",
"Ain't no party like a 404 party.",
"In Epic 404, no one can hear you scream.",
"The who with the what now? Let's try this again.",
"You've done ended up here. Again."
);

echo $quotes[rand(0, count($quotes) - 1)];
}

function random_loggedout() {
$quotes = array(
"Ummmmmmmm. We don't know you...yet. Please login.",
"Pretty sneaky. But you're gonna have to log in first.",
"Shyeeeeeeah, right. Just log in, and you'll be all set.",
"You're all \"Promo Me.\" And we're all \"Log in first.\"",
"Whoooops. You need to log in with the thingy.",
"Just one more step and you can promo.",
"Good music awaits...for those who log in.",
"You're all \"Promo Me.\" And we're all \"Log in first.\"",
"I'm sure you're cool but you need to authenticate.",
"Do the logging in thing and then you can do the music thing.",
"Music wants to be free. But you still need to log in first.",
"Do you even log in, bro?",
"You're all \"Promo Me.\" And we're all \"Log in first.\"",
"Logging in is kinda lumberjacky. It has \"log\" in it.",
"Every time you log in, a big booty girl starts jackin'.",
"Good things come to those who log in.",
);

echo $quotes[rand(0, count($quotes) - 1)];
}



function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/* DON'T DELETE THIS CLOSING TAG */ ?>
