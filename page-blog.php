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
 ?>
 <!-- UNSER BLOG -->
		<div class="blog_wrp main_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center"><?php the_title(); ?></h3>
						<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
					</div>				
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4">
				<?php 
					$temp = $wp_query; $wp_query= null;
					$wp_query = new WP_Query(array ( 'orderby' => 'modified','order' => 'DESC' )); $wp_query->query('showposts=12' . '&paged='.$paged);
					while ($wp_query->have_posts()) : $wp_query->the_post(); 
				?>
				
					
						<div class="blog_content_border">
							<div class="blog_content">
								<?php  $thumb_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
								<img class="img-responsive" src="<?php echo $thumb_url; ?>" alt="" />
								<h2><?php the_title();?></h2>
								<div class="blog_update">
									<span class="v_admin"><?php the_author_link(); ?> | </span>
									<span class="v_date"><?php the_time('F jS, Y'); ?></span>
								</div>
								<p><?php the_excerpt(); ?></p>
								<a class="btn btn-default btn-lg" href="<?php the_permalink(); ?>">zu den Ergebnissen</a>
							</div>
						</div>
						<?php if (($wp_query->current_post+1)%4 ==0){ ?>	
					</div>
					<div class="col-md-4 col-sm-4">
						<?php } ?>
						<?php /*
						if ($wp_query->current_post ==7){ ?>	
					</div>
					<div class="col-md-4 col-sm-4">
						<?php } */?>

					
					<?php endwhile; ?>	
					</div>				
				</div>
				 
				 

		<?php wp_reset_postdata(); ?>

				<div class="row">
					<div class="col-md-12">
						<?php wp_custom_pagination(); ?>

 						<?php wp_link_pages(); ?>
					</div>
				</div>

			</div>
		</div>

	

<?php get_footer(); ?>