<?php
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  Prefab
 */
get_header();
?>
    <div class="services-area pt-100 pb-40">
        <div class="container">
			<?php 
				if( have_posts() ):
					while( have_posts() ): the_post();
						$br_list = get_post_meta(get_the_ID(),'brochure_file',true);
						?>
							<div class="row">
								<div class="col-xl-4 col-lg-4">
									<div class="servicee-sidebar mb-70">
										<div class="sidebar-link gray-bg">
											<h3><?php esc_html_e('Services','prefab-core'); ?></h3>
											<?php 
												$q = new WP_Query(array('posts_per_page' => 6,'post_type' => 'prefab-service','post__not_in'=>array(get_the_ID())));
												if($q->have_posts()):
											?>
												<ul>
													<?php while($q->have_posts()): $q->the_post();  ?>
														<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
													<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
												</ul>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="col-xl-8 col-lg-8">
									<div class="row">
										<div class="col-xl-12">
											<div class="service-box service-3 mb-60">
												<?php the_post_thumbnail('full'); ?>
												<h3><?php the_title(); ?></h3>
												<?php the_content(); ?>
											</div>
										</div>
										<?php 
											$terms = get_the_terms( get_the_ID() ,'service-cat', 'string');
											$term_ids = wp_list_pluck($terms,'term_id');
											$rel = new WP_Query(array('posts_per_page' => 2,'post_type' => 'prefab-service','post__not_in'=>array(get_the_ID(),'tax_query' => array(
												array(
													'taxonomy' => 'service-cat',
													'field' => 'id',
													'terms' => $term_ids,
													'operator'=> 'IN'
												 )))));
											if($rel->have_posts()):
												while($rel->have_posts()): $rel->the_post();
										?>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="service-box service-3 mb-60">
														<?php the_post_thumbnail(array(370,280)); ?>
														<h4>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h4>
														<p> <?php print get_the_excerpt(); ?></p>
													</div>
												</div>
												
											<?php endwhile;endif; ?>
											<?php wp_reset_postdata(); ?>
									</div>
								</div>
							</div>
						<?php 
					endwhile;
				endif; 
			?>
        </div>
    </div>
<?php get_footer(); ?>