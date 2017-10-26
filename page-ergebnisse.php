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
$res_archive=get_res_archive();
?>



			<?php while ( have_posts() ) : the_post(); ?>
			<!-- ERGEBNISSE -->
		<div class="ergebnisse_wrp main_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center"><?php the_title(); ?></h3>
						<img class="img_slice" src="<?php bloginfo('template_url'); ?>/images/slice1.png" alt="" />
					</div>				
				</div>
				<div class="row">
					<div class="col-md-12 ergebnisse_txt">
						<?php the_content(); ?>
						<ul class="nav navbar-nav nav-tabs">
							<?php foreach ($res_archive as $rakey => $ravalue) {?>
							<li class="<?php if($rakey==0){ echo "active"; }  ?>"><a href="#tb<?php echo $rakey; ?>" data-toggle="tab"><span class="hidden-xs">Archiv </span><?php echo get_the_title( $ravalue->ID ); ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="tab-content">
					<?php foreach ($res_archive as $rakey => $ravalue) {?>
					<div class="tab-pane<?php if($rakey==0){ echo " active"; }  ?>" id="tb<?php echo $rakey; ?>">
						<div class="row">
							<div class="col-md-12">
								<div class="ergebnisse_logo">
									<p class="text-center"><?php echo get_the_post_thumbnail( $ravalue->ID,'full'); ?></p>
									<p class="text-center"><strong><?php echo get_field('featured_name',$ravalue->ID); ?></strong></p>
									<div class="punkt_pdf">
										<?php echo get_field('featurd_results',$ravalue->ID); ?>
									</div>	
								</div>
							</div>
						</div>
						<div class="row">

							<?php 
							
							$ar_id=$ravalue->ID;
							
							$field_group_values = simple_fields_fieldgroup("archive_res",$ar_id);
							//print_r($field_group_values);
							if($field_group_values){
							foreach ($field_group_values as $fgkey => $fgvalue) {
							?>

							<div class="col-md-6 col-sm-6 col-xs-12 ergebnisse_content_<?php if(($fgkey%2)==0){echo "left";}else{echo "right";} ?>">
							<p><?php echo $fgvalue["ar_res_date"];

							?></p>
								<p><strong><?php echo $fgvalue["ar_race_res_name"];  ?></strong></p>
								<?php if($fgvalue["arc_race_res_link1"]){ ?>
								<a href="<?php echo $fgvalue["arc_race_res_link1"]; ?>">Result Race 1.pdf </a>
								<?php } ?>
								<?php  if($fgvalue["arc_race_res_link2"]){?>
								<a href="<?php echo $fgvalue["arc_race_res_link2"];?>">Result Race 2.pdf </a>
								<?php } ?>
							</div>

						 	<?php  }
						 		}

						 	?>	
						</div>
					</div>
					<?php } ?>
				</div>	
			</div>
		</div>
			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>