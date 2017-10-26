<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header();
$latest_post = get_lat_posts();
function get_excerpt_by_id($post_id){
$the_post = get_post($post_id); //Gets post ID
$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
$excerpt_length = 5; //Sets excerpt length by word count
$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
$words = explode(' ', $the_excerpt, $excerpt_length + 1);
if(count($words) > $excerpt_length) :
array_pop($words);
array_push($words, '…');
$the_excerpt = implode(' ', $words);
endif;
$the_excerpt = '<p>' . $the_excerpt . '</p>';
return $the_excerpt;
}
 ?>

	
			<?php while ( have_posts() ) : the_post(); ?>

				<!-- UNSER BLOG-POST -->
		<div class="blog_post_wrp main_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center"><?php the_title(); ?></h3>
						<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
					</div>				
				</div>
				<div class="row">
					<div class="blogpost_content col-md-8 col-sm-8 col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<img class="img-responsive" src="<?php $b_img_url=wp_get_attachment_url(get_post_thumbnail_id()); echo $b_img_url; ?>" alt="" />
							</div>
							<div class="col-md-12">
								<h2><?php the_title(); ?></h2>
								<span class="von_admin"><?php the_author(); ?> |</span> <span class="blog_date"><?php the_date(); ?></span>
							</div>

							<div class="col-md-12 blogpost_txt">

								<?php the_content(); ?>
							</div>
							<?php comments_template('/small-comments.php'); ?>
						</div>
					</div>
					<div class="blogpost_rightbar col-md-4 col-sm-4 col-xs-12">
						<h4>Letzte Posts:</h4>
						<?php foreach ($latest_post as $lpkey => $lpvalue) {?>

						<div class="letzte_post">
							<?php $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($lpvalue->ID) ); ?>
							<img class="pull-left hidden-xs img-responsive" src="<?php echo $thumb_url; ?>" alt="" />
							<div class="letzte_post_txt pull-left">
								<p><a href="<?php echo get_permalink($lpvalue->ID); ?>"><?php echo get_the_title($lpvalue->ID); ?></a></p>
								<p>
									<?php $post_id=$lpvalue->ID; 
								$my_excerpt = get_excerpt_by_id($post_id); 
								echo $my_excerpt;

								?>	
								</p>
								<span class="von_admin"><?php echo get_the_author($lpvalue->ID); ?> |</span> <span class="blog_date"> <?php echo get_the_time('Y-m-d',$lpvalue->ID); ?></span>
							</div>
						</div>
						<div class="border_btm"></div>
						<?php } ?>					
					</div>
				</div>
			</div>
		</div>

			<?php endwhile; // end of the loop. ?>



<?php //get_sidebar(); ?>
<?php get_footer(); ?>