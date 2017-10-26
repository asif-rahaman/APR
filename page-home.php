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
$track_slider=get_track_sliders();
$r_termine=get_race_termine();
$partner=get_partners();
$team=get_das_team();
$latest_post = get_lat_post();
function get_excerpt_by_id($post_id){
$the_post = get_post($post_id); //Gets post ID
$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
$excerpt_length = 20; //Sets excerpt length by word count
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
	<!-- Banner -->
			<div class="banner_wrp">
				<div class="banner">
					<img class="img-responsive" src="<?php echo get_field('banner_image',5); ?>" alt="banner" />
				</div>
				<h1 class="hidden-xs"><?php echo get_field('banner_heading',5); ?></h1>
				<p class="hidden-xs"><?php echo get_field('banner_text',5); ?></p>	
			</div>
			<!-- AKTUELLE NEWS -->
			<div class="aktuelle_news_wrp" id="_news">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">Aktuelle News</h3>
							<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
						</div>
						<?php foreach ($latest_post as $lpkey => $lpvalue) {?>
						<div class="col-md-6 col-sm-6 aktuelle_news_img">
							<?php $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($lpvalue->ID) ); ?>
							<span><img class="img-responsive" src="<?php echo $thumb_url; ?>" alt="" /></span>
						</div>
						<div class="col-md-6 col-sm-6 aktuelle_news_txt">
							<h6><?php echo get_the_title($lpvalue->ID); ?></h6>
							<p><?php $post_id=$lpvalue->ID; 
								$my_excerpt = get_excerpt_by_id($post_id); 
								echo $my_excerpt; ?> 
							</p>
							<a href="<?php echo get_permalink($lpvalue->ID); ?>">weiter lesen</a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- RENNSERIE -->
			<div class="rennserie_wrp" id="_renns">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">Rennserie</h3>
							<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
							<p class="rennserie_txt_top"><?php echo get_field('rennserie_top_text',5); ?></p>
							<p class="adac_logo"><img src="<?php echo get_field('rennserie_image',5); ?>" alt="" /></p>
							<div class="rennserie_txt">
								<?php echo get_field('rennserie_after_image_text',5); ?>
							</div>	
							<div class="rennserie_btn">
								<a href="" class="btn btn-default btn-lg">zu den Ergebnissen</a>
								<a href="#_termine" class="btn btn-default btn-lg">zu den Terminen</a>
							</div>
							<div class="rennserie_down">
								<img src="<?php bloginfo('template_url'); ?>/images/icon-rennstrecken.png" alt="" />
							</div>
						</div>				
					</div>
				</div>
			</div>
			<!-- RENNSTRECKEN SLIDER-->
			<div class="rennstrecken_slider_wrp" id="_rennstre">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">rennstrecken</h3>
							<p class="rennstrecken_txt text-center"><?php echo get_field('rennstrecken_text',5); ?></p>
						</div>
					</div>
				</div>
				<?php if ($track_slider){ ?>
				<div class="rennstrecken_slider fix">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="renn_slider">
									
										<?php foreach ($track_slider as $tskey => $tsvalue) {
											$thumb_url = wp_get_attachment_url( get_post_thumbnail_id($tsvalue->ID) );

											?>
										<div>
											<a class="example-image-link" href="<?php echo $thumb_url;?>" data-lightbox="example-set" title=""><img class="example-image" src="<?php echo $thumb_url;?>" alt="Project-1"/></a>
										</div>
										<?php } ?>													
									
								</div>
							</div>
						</div>		
					</div>		
				</div>
				<?php } ?>
				<div class="rennstrecken_date">
					<img src="<?php bloginfo('template_url'); ?>/images/icon-termine.png" alt="" />
				</div>
			</div>
			<!-- TERMINE -->
			<?php if($r_termine){ ?>
			<div class="termine_wrp" id="_termine">
				<div class="container">
					<div class="row">
						<div class="col-md-12 termine_top">
							<h3 class="text-center">termine <span><?php echo get_field('termine_sub_head',5); ?></span></h3>
							<p class="termine_text1 text-center"><?php echo get_field('termine_text',5); ?></p>
							<p class="termine_text2 text-center"><?php echo get_field('termine_condition',5); ?></p>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 termine_post_wrp1">
						<?php foreach ($r_termine as $rtrmkey => $rtrmvalue) {?>
							<div class="termine_post termine_post_top">
								<span class="color_orange"><?php echo get_field('termine_date',$rtrmvalue->ID); ?></span>
								<p><?php echo get_field('termine_text',$rtrmvalue->ID); ?></p>
								<a class="web_addr" href="<?php echo get_field('termine_web_url',$rtrmvalue->ID); ?>"><?php echo get_field('termine_web_url',$rtrmvalue->ID); ?></a>
								<?php if(get_field('ergebnisse_url',$rtrmvalue->ID)){?>
								<a class="btn btn-default btn-lg" href="<?php echo get_field('ergebnisse_url',$rtrmvalue->ID); ?>">Ergebnisse</a><?php } ?>
							</div>	
							<?php if (($rtrmkey+1) % 4 == 0){?>				
						</div><!--loop finish-->
						<div class="col-md-6 col-sm-6 col-xs-12 termine_post_wrp2">
							<?php } ?>
						<?php } ?>
						</div><!--loop finish ex-->							

					</div>
				</div>
			</div>
			<?php } ?>
			<?php if($team){ ?>
			<!-- DAS TEAM -->
			<div class="dasteam_wrp" id="_team">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">Das team</h3>
							<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
							<p class="text-center dasteam_txt"><?php echo get_field('das_team_text',5); ?></p>
						</div>
					</div>
					<div class="row">
						<?php foreach ($team as $tmkey => $tmvalue) {?>

						<div class="col-md-2 col-sm-2 col-xs-4">
							<div class="dasteam_thumbnail">
							  <img src="<?php echo get_field('member_image',$tmvalue->ID); ?>" alt="">
							  <div class="caption">
								<p><?php echo get_field('member_name',$tmvalue->ID); ?></p>
								<a href="<?php echo get_field('fahrer_url',$tmvalue->ID); ?>" class="color_light_orange">Fahrer</a>
							  </div>
							</div>						
						</div>
						<?php if (($rtrmkey+1) % 6 == 0){?>							
					</div>
					<div class="row">
						<?php } ?>	
					<?php } ?>
											
					</div>				
				</div>
			</div>
			<?php } ?>
			<!-- MEDIA -->
			<div class="media_wrp" id="_media">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">Media</h3>
							<p class="text-center"><?php echo get_field('media_text',5); ?></p>
						</div>
						<div class="col-md-4 col-sm-4 media_col">
							<img src="<?php bloginfo('template_url'); ?>/images/icon-fotos.png" alt="" />
							<h4 class="text-center"><?php echo get_field('media_1_heading',5); ?></h4>
							<p class="text-center"><?php echo get_field('media_1_text',5); ?></p>
							<a href="<?php echo get_field('media_1_button',5); ?>" class="btn btn-default btn-lg">ansehen</a>
						</div>
						<div class="col-md-4 col-sm-4 col-sm-4 media_col">
							<img src="<?php bloginfo('template_url'); ?>/images/icon-videos.png" alt="" />
							<h4 class="text-center"><?php echo get_field('media_2_heading',5); ?></h4>
							<p class="text-center"><?php echo get_field('media_2_text',5); ?></p>
							<a href="<?php echo get_field('media_2_button_url',5); ?>" class="btn btn-default btn-lg">ansehen</a>
						</div>
						<div class="col-md-4 col-sm-4 media_col">
							<img src="<?php bloginfo('template_url'); ?>/images/icon-tv.png" alt="" />
							<h4 class="text-center"><?php echo get_field('media_3_heading',5); ?></h4>
							<p class="text-center"><?php echo get_field('media_3_text',5); ?></p>
							<a href="<?php echo get_field('media_3_button_url',5); ?>" class="btn btn-default btn-lg">ansehen</a>
						</div>					
					</div>
				</div>
			</div>
			<!-- UNSERE PARTNER -->
			<div class="unserepartner_wrp">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">unsere partner</h3>
							<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />					
						</div>
					</div>
					<div class="row unserepartner_logo_row">
						<?php foreach ($partner as $prtkey => $prtvalue) {?>
						<div class="col-md-2 unserepartner_logo"><img src="<?php echo get_field('partner_logo',$prtvalue->ID); ?>" alt="" /></div>
							<?php } ?>		
					</div>				
				</div>
			</div>
		
	<?php endwhile; // end of the loop. ?>

		

<?php //get_sidebar(); ?>
<?php get_footer(); ?>