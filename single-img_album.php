<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


			<?php while ( have_posts() ) : the_post(); ?>
		<div class="image_gallery_wrp main_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center">FOTOS: <?php the_title(); ?></h3>
						<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
					</div>				
				</div>
				<div class="row">
					<?php function wpse124169_get_attachment_gallery() {
    global $post;
    $gallery_page = (get_query_var('gallery_page')) ? get_query_var('gallery_page') : 1;
    $args = array(
        'posts_per_page' => -1, 
        'orderby' => 'menu_order', 
        'order' => 'ASC', 
        'post_type' => 'attachment',
        'post_status' => 'inherit', 
        'post_mime_type' => 'image', 
        'post_parent' => $post->ID, 
        'paged' => $gallery_page
    ); 
    $gallery = new WP_Query($args);
        if ( $gallery->have_posts() ) :
            echo '<div class="my_cpt_gallery_paged">';
                    while ( $gallery->have_posts() ) : $gallery->the_post();
                        echo wp_get_attachment_image( $post->ID, 'medium' );
                    endwhile;
            echo '</div>';
            echo '<div class="my_cpt_gallery_paginate_links">';
                    if ( get_option('permalink_structure') ) {
                        $format = 'gallery/image/%#%';
                    } else {
                        $format = '&gallery_page=%#%';
                    }
                    $args = array(
                        'base' => get_permalink( $post->post_parent ) . '%_%',
                        'format' => $format,
                        'current' => $gallery_page,
                        'total' => $gallery->max_num_pages
                    );
                    echo paginate_links( $args );
                    wp_reset_postdata();
            echo '</div>';
        endif;
}
 ?>

					<?php $pagedgl = (get_query_var('pagedgl')) ? get_query_var('pagedgl') : 1;
											if ( $albm_images = get_posts(array(
								'post_parent' => $post->ID,
								'post_type' => 'attachment',
								'post_mime_type' => 'image',
								'posts_per_page'    => -1,
        						'paged'            => $pagedgl)))
							{
								foreach( $albm_images as $aimgkey => $alm_img ) {
									$attachmenturl=wp_get_attachment_url($alm_img->ID);
									//$attachmentimage=wp_get_attachment_image_src( $alm_image->ID, full );
									//$imageDescription = apply_filters( 'the_description' , $alm_image->post_content );
									//$imageTitle = apply_filters( 'the_title' , $alm_image->post_title );

					 ?>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="image_gallery_content">
							<a class="example-image-link" href="<?php echo $attachmenturl; ?>" data-lightbox="example-set" title=""><img class="example-image img-responsive" src="<?php echo $attachmenturl; ?>" alt="Project-1"/></a>
						</div>							
					</div>	
					<?php if (($aimgkey+1) % 4 == 0){?>	
									
				</div>	
				<div class="row">
					<?php	}
				} ?>

				</div><?php
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => get_permalink( $post->post_parent ) . '%_%',
	'format' => '?pagedgl=%#%',
	'current' => max( 1, get_query_var('pagedgl') ),
	'total' => $albm_images->max_num_pages
) );
?>
				<?php if ($paged > 1) { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
			<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
		</nav>

		<?php } else { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
		</nav>

		<?php } 
							} else {
								echo "No Image";
							}		
							?>

				<div class="row">
					<div class="col-md-12">
						<?php
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $albm_images->max_num_pages
) );
?>


						<!-- <ul class="pagination pagination-lg">
							<li><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">weiter</a></li>
						</ul> -->
						<?php
global $wp_query;

$big = 999999999; // need an unlikely integer
$translated = __( 'Page', 'mytextdomain' ); // Supply translatable string

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
) );
?>
<?php ?>




					</div>
				</div>
			</div>
		</div>

			<?php endwhile; // end of the loop. ?>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>