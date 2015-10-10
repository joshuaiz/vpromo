<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php
						$user_id = get_current_user_id();
						if( is_user_logged_in() && is_author($user_id)) { ?>
    
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<!-- <?php
									$user_id = get_current_user_id();
  									$all_meta_for_user = get_user_meta( $user_id );
	
  									$allmeta = maybe_unserialize( $all_meta_for_user );
	
  									print_r($allmeta);
									?> -->

									<section class="top-avatar cf">
	
									<?php 
											
									$current_user = wp_get_current_user();
											
									if ( ($current_user instanceof WP_User) ) {
									$avatar = get_avatar( $current_user->user_email, 96 );
										if($avatar) {
											echo $avatar;
										}
									}
											
									?>	
	
									</section>

									<h1 class="page-title"><?php echo $current_user->nickname; ?></h1>

								</header>
								
								<div class="user-content-wrap cf">

								<section class="entry-content profile-form cf" itemprop="articleBody">

									<h2>Your Profile</h2>

									<p class="small">To make changes to your profile, enter them in the fields below. Be sure to click 'Update Profile' at the bottom of the form to save your changes.</p>

									<?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true tabindex=49]' ); ?>

									<div class="profile-success">Your profile has been updated.</div>

									<div class="delete-user">

										<?php echo do_shortcode('[plugin_delete_me /]' ); ?>

								</section>

								<section class="user-promos">

									<h2>Your Promos</h2>

									<p class="small">Click on the image or catalog number to view and react to promos and download audio files. Promos you have previously reacted to will be grayed out. You can still re-download the files at any time. We cool like that.</p>

								<?php // Get all active promos
									$args = array (
										'post_type'              => array( 'promos' ),
										'post_status'            => array( 'publish' ),
										'cat' 					 => '-3',
									);
									
									// The Query
									$query = new WP_Query( $args ); ?>

									<ul class="promo-list">
									
									<?php // The Loop
									if ( $query->have_posts() ) {
										while ( $query->have_posts() ) {
											$query->the_post(); ?>
											
										<li>
										<?php // Get promo fields ?>
										<?php $cat = get_field('catalog_number'); ?>
										<?php $artist = get_field('artist'); ?>
										<?php $title = get_field('promo_title'); ?>
										<?php // Change catalog number to lowercase ?>
										<?php $catl = strtolower($cat); ?>
										<?php // [submit_data_VIZ025] => Array ( [0] => VIZ025 )
								
  										$user_id = get_current_user_id();
  										$key = 'submit_data_' . $cat;
  										$single = true;
  										$viewed = get_user_meta( $user_id, $key, $single );

  										// if (isset($ccat)

  										if (isset($viewed['sub_date'])) {
  											$sdate = $viewed['sub_date'];
  										}
  										
  										if (isset($viewed['catalog_number'])) {
  											$ccat = $viewed['catalog_number'];
  										}
  										
  										
										$time = strtotime($sdate);
											

										// Get local timezone
										date_default_timezone_set('America/Chicago');
										
										$dateInLocal = date("Y-m-d", $time);
										$timeInLocal = date("H:i:s a", $time);
  										
  										?>

											<?php $image = get_field('promo_image'); ?>


                                        		<div class="promo-list-image cf">

                                        		<?php if (isset($ccat) && $ccat == $cat) { ?>
	
                                            		<img class="promo-viewed" class="<?php echo $class; ?>" src="<?php echo $image['url']; ?>"  />

                                            	<?php } else { ?>

                                            	<a href="/promo/<?php echo $catl; ?>/"/><img class="<?php echo $class; ?>" src="<?php echo $image["url"]; ?>"  /></a>

                                            		
                                            	<?php } ?>
                                    
                                        		</div>

                                        	<?php if($ccat == $cat) { ?>

                                        		<h2 class="track-cat"><?php echo $cat; ?></h2>

                                        <?php } else { ?>
                                        		<h2 class="track-cat"><a href="/promo/<?php echo $catl; ?>/"/><?php echo $cat; ?></a></h2>
                                        	<?php } ?>

                                        		<h3><?php echo $artist; ?></h3>
                                        		<h4><?php echo $title; ?></h4>
											
										<?php if($ccat == $cat) { ?>

											<p class="small viewed">You responded to this promo on <?php echo $dateInLocal; ?> at <?php echo $timeInLocal; ?>.</p>

											 <?php $project = get_field('project_download'); ?>

                                    <a class="" href="<?php echo $project; ?>">Download Zip</a>

                                    <?php $project = get_field('project_download'); ?>

										<a href="<?php echo $project; ?>" class="dropbox-saver">Save to Dropbox</a>

										<?php } ?>
                                        	
                                        	</li>
											
										<?php }
									} else { ?>
										
									<? }
									
									// Restore original Post Data
									wp_reset_postdata(); ?>

								</ul>

								</section>

								</div>

								<section class="user-avatar cf">

									<h3>Avatar</h3>

									<?php echo do_shortcode('[basic-user-avatars]' ); ?>

								</section>

								<footer class="article-footer">

								</footer>							

							</article>						

						<?php } else {

							echo '<h2>Nope. You must be logged in to view this page.</h2>'; ?>

   							<div class="login-form">

   							<?php echo do_shortcode('[clef_render_login_button]' ); ?>

   							</div> 
   							<?php } ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>

<script>

jQuery(document).ready(function($){
 
    var $formID = $('.gform_wrapper > form').attr('id');
    $('.gform_button').click(function (e) {
    e.preventDefault();

    //start your AJAX validation
    checkAndSubmit();
});
    
function checkAndSubmit() {

    var $formID = $('.gform_wrapper > form').attr('id');
    // console.log($formID);
    // var review = $('.promo-review').find( 'textarea').first().val();
    // var rating = $('input[name="score"]').val();
    // var favorite = $('.promo-drop-down').find('select').first().val();

        var submit = $.ajax({
    
            url: $($formID).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $('#' + $formID).serialize(),
             success: function(data) {
                   console.log(data);
                 }
        });
    
        submit.always(function() {
    

            $(".profile-success").fadeIn(200).delay(2000).fadeOut(200);
        
            
            })

        // }

    }

});

jQuery(document).ready(function($){
	$('.gfield_select').show();
	$('.user-avatar').insertAfter('.email-day');
	var $url = $(location).attr('href');
	$("input#basic-local-avatar").change(function (){
       console.log('file uploaded');
       $('#basic-user-avatar-form').attr('action', $url);
		$('.gform_button').click(function() {

			$('input[name="manage_avatar_submit"]').trigger('click');
			// $('.profile-success').show();
		});
     });
});


</script>
