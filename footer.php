<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div>
		<!-- End of Body wrapper -->
		<!-- FOOTER -->
		<footer>
			<div class="container">
				<div class="row hidden-xs">
					<div class="col-md-3 col-sm-3 col-xs-4 footer_nav">
						<ul>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Footer Menu 1', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-4 footer_nav">
						<ul>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Footer Menu 2', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-4 footer_nav">
						<ul>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Footer Menu 3', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 social_media">
						<div class="social_net pull-right">
							<a href="<?php echo get_field('youtube_url',5); ?>" class="" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/youtube.png" alt="Youtube" /></a>
							<a href="<?php echo get_field('facebook_url',5); ?>" class="" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Facebook" /></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 footer_media">
						<a href="<?php echo get_permalink(113); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icon-gallerie-2.png" alt="" />galerie</a>
						<a href="<?php echo get_permalink(155); ?>"><img src="<?php bloginfo('template_url'); ?>/images/iocn-videos-2.png" alt="" />videos</a>
						<a href="<?php echo get_permalink(138); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icon-tv-2.png" alt="" />TV</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 copyright">
						<p>Copyright 2014 kfzteile24 APR Motorsport - Alle Rechte vorbehalten</p>
					</div>
				</div>
			</div>
		</footer>

    <!-- jQuery -->
	<!--<script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/js/jquery-1.10.2.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lightbox-2.6.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.scrollUp.min.js"></script>
    <?php if(is_page(5)){ ?>
    <!-- Slick slider -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		jQuery(window).load(function() {
		  jQuery('.flexslider').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 216,
			minItems: 1,
			maxItems: 5,
			itemMargin: 36,
			move: 1,
		  });
		});
	</script>
	<!-- Slick slider js code -->
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.renn_slider').slick({
                  infinite: true,
                  speed: 600,
                  arrows: true,
                  slidesToShow: 5,
                  slidesToScroll: 1,
			  responsive: [
				{
				  breakpoint: 1250,
				  settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
					infinite: true,
				  }
				},
				{
				  breakpoint: 1075,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
				  }
				},
				{
				  breakpoint: 820,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
				  }
				},								
				{
				  breakpoint: 768,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				  }
				},
				{
				  breakpoint: 580,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			  ]			
			});
		});
	</script>
	<script type="text/javascript">
		// scrollUp full options
		jQuery(function () {
			jQuery.scrollUp({
		        scrollName: 'scrollUp', // Element ID
		        scrollDistance: 300, // Distance from top/bottom before showing element (px)
		        scrollFrom: 'top', // 'top' or 'bottom'
		        scrollSpeed: 700, // Speed back to top (ms)
		        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
		        animation: 'fade', // Fade, slide, none
		        animationInSpeed: 200, // Animation in speed (ms)
		        animationOutSpeed: 200, // Animation out speed (ms)
		        scrollText: 'Scroll to top', // Text for element, can contain HTML
		        scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
		        scrollImg: true, // Set true to use image
		        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		        zIndex: 2147483647 // Z-Index for the overlay
			});
		});

	</script>
	<script type="text/javascript">
		jQuery(function() {
		  jQuery('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			  var target = jQuery(this.hash);
			  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			  if (target.length) {
				jQuery('html,body').animate({
				  scrollTop: target.offset().top
				}, 1000);
				return false;
			  }
			}
		  });
		});	
	</script>
	<?php } ?>

<?php wp_footer(); ?>
</body>
</html>