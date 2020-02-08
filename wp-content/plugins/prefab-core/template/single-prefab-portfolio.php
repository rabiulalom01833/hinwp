<?php
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  Prefab
 */
get_header();
?>
    <div class="portfolio-area pt-100 ">
        <div class="container">
			<?php 
				if( have_posts() ):
					while( have_posts() ): the_post();
						$gallery_image = get_post_meta(get_the_ID(),'images',true);
						$company_name = get_post_meta(get_the_ID(),'company_name',true);
						$portfolio_date = get_post_meta(get_the_ID(),'portfolio_date',true);
						?>
				<div class="row">
					<div class="col-xl-8 col-lg-8">
						<div class="project-desc mb-40">
							<h3 class="project-details-title mb-20"><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4">
						<div class="project-status gray-bg mb-40">
							<h3 class="project-details-title mb-20">
								 <?php esc_html_e('Project Details','prefab-core'); ?>
							</h3>
							<ul>
								<li><b><?php esc_html_e('Date','prefab-core'); ?></b> <span><?php print ($portfolio_date!='')?date('F, Y',strtotime($portfolio_date)):''; ?></span></li>
								<li><b><?php esc_html_e('Location','prefab-core'); ?></b> <span><?php print prefab_get_terms(get_the_ID(),'portfolio-location'); ?></span></li>
								<li><b><?php esc_html_e('CLIENT','prefab-core'); ?></b> <span><?php print ($company_name!='')?$company_name:''; ?></span></li>
								<li><b><?php esc_html_e('Category','prefab-core'); ?></b> <span><?php print prefab_get_terms(get_the_ID(),'portfolio-cat'); ?></span></li>
							</ul>
						</div>
					</div>	
				</div>
				<?php if($gallery_image): ?>
					<div class="row pt-60">
						<div class="col-xl-12">
							<h3 class="project-details-title mb-30">
								<?php esc_html_e('Project Gallery','prefab-core'); ?>
							</h3>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6">
						<?php $i=0; ?>
						<?php foreach($gallery_image as $item): ?>
								<div class="portfolio-details-img mb-30">
									<img src="<?php print $item; ?>" alt="<?php esc_attr_e('image','prefab-core'); ?>">
								</div>
								<?php if($i==1) echo '</div><div class="col-xl-6 col-lg-6 col-md-6">'; ?>
								<?php $i++; ?>
						<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php 
				endwhile;
			endif; ?>
        </div>
    </div>
<?php get_footer(); ?>