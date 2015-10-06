<?php
/*
 Template Name: Profile Page
 *
 * 
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php
if ( !is_user_logged_in() ) {
    echo '<h2>Nope. You must be logged in to view this page.</h2>'; ?>

    <div class="login-form">

    <?php echo do_shortcode('[clef_render_login_button]' ); ?>

    </div>


<?php } else { ?>


							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<header class="article-header">

							<!-- <?php
								$user_id = get_current_user_id();
  $all_meta_for_user = get_user_meta( $user_id );

  $allmeta = maybe_unserialize( $all_meta_for_user );

  $am = unserialize($all_meta_for_user );

  print_r($allmeta);
?>  -->




								

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

								</section><h1 class="page-title"><?php the_title(); ?></h1>


								</header>

								
								<div class="user-content-wrap cf">

								<section class="entry-content profile-form cf" itemprop="articleBody">

								
									<?php
										// the content (pretty self explanatory huh)
										the_content();

									?>

									<div class="profile-success">Your profile has been updated.</div>

								</section>

								<section class="user-promos">

								<h2>Your Promos</h2>

								<?php // WP_Query arguments
									$args = array (
										'post_type'              => array( 'promos' ),
										'post_status'            => array( 'publish' ),
									);
									
									// The Query
									$query = new WP_Query( $args ); ?>

									<ul class="promo-list">
									
									<?php // The Loop
									if ( $query->have_posts() ) {
										while ( $query->have_posts() ) {
											$query->the_post(); ?>
											
											<li>

											<?php $cat = get_field('catalog_number'); ?>
											<?php $artist = get_field('artist'); ?>
											<?php $title = get_field('promo_title'); ?>

											<?php $catl = strtolower($cat); ?>

											<!-- <?php 

								// [submit_data_VIZ025] => Array ( [0] => VIZ025 )
  								$user_id = get_current_user_id();
  								$key = 'submit_data_' . $cat;
  								// $single = true;
  								$viewed = get_user_meta( $user_id, $key, $single ); 
  								
									?>  -->

									<?php // [submit_data_VIZ025] => Array ( [0] => VIZ025 )
  								$user_id = get_current_user_id();
  								$key = 'submit_data_' . $cat;
  								$single = true;
  								$viewed = get_user_meta( $user_id, $key, $single ); 
  								$viewed = maybe_unserialize($viewed);
  								// print_r($viewed);
  								?>

											

										<?php if(!$viewed == '') {

											$class = 'promo-viewed';


										} else {
											$class = 'not-viewed';
										} ?>



											<?php $image = get_field('promo_image'); ?>

                                        		<div class="promo-list-image cf">

                                        		<?php if($viewed['catalog_number'] == $cat) { ?>
	
                                            		<img class="<?php echo $class; ?>" src="<?php echo $image['url']; ?>"  />

                                            	<?php } else { ?>

                                            	<a href="/promo/<?php echo $catl; ?>/"/><img class="<?php echo $class; ?>" src="<?php echo $image['url']; ?>"  /></a>

                                            		
                                            	<?php } ?>
                                    
                                        		</div>

                                        	<?php if($viewed['catalog_number'] == $cat) { ?>

                                        		<h2 class="track-cat"><?php echo $cat; ?></h2>

                                        <?php } else { ?>
                                        		<h2 class="track-cat"><a href="/promo/<?php echo $catl; ?>/"/><?php echo $cat; ?></a></h2>
                                        	<?php } ?>

                                        		<h3><?php echo $artist; ?></h3>
                                        		<h4><?php echo $title; ?></h4>
											
										<?php if($viewed['catalog_number'] == $cat) { ?>

											<p class="small viewed">You responded to this promo on <?php echo $viewed['sub_date']; ?> GMT.</p>

											 <?php $project = get_field('project_download'); ?>

                                    <a class="" href="<?php echo $project; ?>">Download Zip</a>

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

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

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
	$('.user-avatar').insertAfter('.user-affiliations');
});

</script>
