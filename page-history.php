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
$history = get_history();
?>



			<?php while ( have_posts() ) : the_post(); ?>
			<div class="historie_wrp main_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center"><?php the_title(); ?></h3>
						<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
					</div>				
				</div>
				<?php foreach ($history as $hkey => $hvalue) { ?>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12 historie_img">
						<?php $img_url=wp_get_attachment_url(get_post_thumbnail_id($hvalue->ID,'full')); ?>
						<img class="pull-right" src="<?php echo $img_url; ?>" alt="" />
					</div>	
					<div class="col-md-8 col-sm-8 col-xs-12 historie_content">
						<h2><?php echo get_the_title($hvalue->ID); ?></h2>
						<?php echo $hvalue -> post_content;  ?>
					</div>					
				</div>	
				<?php } ?>				
			</div>
		</div>
			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>