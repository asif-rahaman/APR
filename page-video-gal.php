<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 
//$vid_gal = get_vid_gal();
?>



			
			<!-- VIDEOS -->
		<div class="videos_wrp main_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center"><?php the_title(); ?></h3>
						<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
					</div>				
				</div>
				<div class="row">
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$wp_query = new WP_Query( array(
					'post_type' => 'video_gal',
					'posts_per_page' => 6,
					'orderby' => 'menu_order',
					'order'   => 'DESC',
					'paged'=>$paged
					) ); ?>
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php ?>
						
					<div class="col-md-12">
						<div class="videos_content">
							<iframe class="vid" width="853" height="480" src="<?php echo get_field('video_url',$wp_query->ID); ?>" frameborder="0" allowfullscreen></iframe>
							<h4><?php echo get_the_title($wp_query->ID); ?></h4>
						</div>				
					</div>
					<?php endwhile; ?>	
											
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php wp_custom_pagination(); ?>
					</div>
				</div>
			</div>
		</div>
		
			

<?php get_footer(); ?>