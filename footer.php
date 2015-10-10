			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">


					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <a href="/faq/">FAQ</a> | <a href="/contact/">Contact</a> | <a href="/terms/">Terms &amp; Conditions</a> | <a href="/privacy/">Privacy Policy</a> | <a href="/vps/">Get VPS for your label</a></p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>

		<?php if ( is_page_template(array('page-promo.php','page-promo-demo.php', 'author.php', 'page-promo_163935.php' ) ) || is_author() ) { ?>
		<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="bau0s330yo2yr4o"></script>
		<?php } ?>

		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
