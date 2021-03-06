<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( 'Epic 404 - Article Not Found', 'bonestheme' ); ?></h1>

								<h2><?php random_sentence(); ?></h2>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The article you were looking for was not found, maybe searching will help you find it:', 'bonestheme' ); ?></p>

								<p><?php get_search_form(); ?></p>

							</section>


							<footer class="article-footer">

									

							</footer>

						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
