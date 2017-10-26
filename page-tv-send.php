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
$send_tv=get_tv_send();
?>



			<?php while ( have_posts() ) : the_post(); ?>
			<!-- SEND -->
		<div class="send_wrp main_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center"><?php the_title(); ?></h3>
						<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
					</div>				
				</div>

				<div class="row">
					<?php foreach ($send_tv as $stkey => $stvalue) {?>
					<div class="col-md-6 col-sm-6 col-xs-12<?php if(($stkey+1) % 2==0){ echo " send_content_right"; }else{ echo " send_content_left"; }?>">
						<p><?php echo get_the_title($stvalue->ID); ?></p>
						<p><strong><?php echo get_field('send_title',$stvalue->ID); ?></strong></p>
						<a href="<?php echo get_field('ard_url',$stvalue->ID); ?>">ARD</a>
					</div>
					<?php } ?>																	
				</div>
			</div>
		</div>
			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>