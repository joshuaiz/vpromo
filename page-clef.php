<?php
/*
 Template Name: Clef Page
 *
 * 
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap-clef cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

									


								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

									?>
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

							<div class="login-outer">
								<?php if ( !is_user_logged_in() ) { ?>

								<h3 class="login-password"><a href="<?php echo wp_login_url(); ?>" title="Login">Login with a password</a></h3>
							<?php } ?>

							</div>

						</main>

				

				</div>

			</div>


<?php get_footer(); ?>

<script>
jQuery(document).ready(function($){
	$('link[href="http://promo.vizual.dev:8888/wp-admin/css/wp-admin.min.css"]').remove();
	// $('link[href="http://promo.vizual.dev:8888/wp-content/plugins/wpclef/assets/dist/css/admin.min.css"]').remove();
	// $('link[href="http://promo.vizual.dev:8888/wp-includes/css/buttons.min.css"]').remove();
	$('link[href="https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&subset=latin%2Clatin-ext"]').remove();
	// $('script[src="http://promo.vizual.dev:8888/wp-includes/js/underscore.min.js"]').remove();
	// $('script[src="http://promo.vizual.dev:8888/wp-includes/js/backbone.min.js"]').remove();

	$('#phone_number').css('background', '#FFFFFF');
});

</script>
