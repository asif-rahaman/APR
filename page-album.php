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
//$album = get_gal_img();
?>
		
    




			<?php //while ( have_posts() ) : the_post(); ?>
			<!-- Album-Gallery -->
		<div class="album_gallery_wrp main_wrapper">
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
					$wp_query1 = new WP_Query( array(
					'post_type' => 'img_album',
					'posts_per_page' => 12,
					'orderby' => 'menu_order',
					'order'   => 'DESC',
					'paged'=>$paged
					) ); ?>
					<?php while ( $wp_query1->have_posts() ) : $wp_query1->the_post(); ?>
					<?php ?>
					<div class="col-md-4 col-sm-4">
						<div class="album_gallery_content_border">
							<div class="album_gallery_content">
								<?php 
								$aid=$wp_query1->ID;
								 $albm_images = get_posts(array(
								'post_parent' => $post->ID,
								'post_type' => 'attachment',
								'numberposts' => 1,
								'post_mime_type' => 'image'));

								$a_img_url = wp_get_attachment_image_src($albm_images[0]->ID,'full'); ?>
								<?php if($a_img_url) {?>
								<img class="img-responsive" src="<?php echo $a_img_url[0];  ?>" alt="" />
								<?php } else{
									echo "No Image";
								} ?>
								<div>
								<?php //print_r($a_img_url);  ?></div>

								<h2><?php echo get_the_title($wp_query1->ID); ?></h2>
								<a class="btn btn-default btn-lg" href="<?php echo get_permalink($wp_query1->ID); ?>">ansehen</a>
							</div>
						</div>								
					</div>
					<?php// if (($aimgkey+1) % 3 == 0){?>	
					<?php if (($wp_query1->current_post+1)%3 ==0){ ?>
				</div>		
				<div class="row">
					<?php } ?>
					<?php //} ?>
				
				<?php endwhile; // end of the loop. ?>	
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- <ul class="pagination pagination-lg">
							<li><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">weiter</a></li>
						</ul> -->
						<?php wp_custom_pagination(); ?>
					</div>
				</div>
			</div>
		</div>
		
			

<?php get_footer(); ?>