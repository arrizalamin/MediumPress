<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="featured-image">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('full', array( 'class' => "featured-img"));
		}
		?>
	</div>
	<div class="group-and-comment">
	<div class="page-wrap">
		<div class="group">
			<div class="bio-and-post-group">		
				<div <?php post_class('index-box') ?> id="post-<?php the_ID(); ?>">

					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

					<div class="post-title"><?php the_title(); ?></div>

					<div class="post-content">
						<?php the_content(); ?>
					</div>
					<div class="post-meta-data">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
					</div>

				</div>

				<div class="bio">
					<div class="author-picture"><?php echo get_avatar( get_the_author_meta( 'ID' ),73 ); ?></div>
					<div class="author-name"><?php the_author_posts_link(); ?></div>
					<div class="author-bio"><?php the_author_meta('description') ?></div>
					<div class="post-date"><?php echo (get_the_modified_time() !== get_the_time())?"Updated ".get_the_modified_time('F j, Y'):"Posted ".get_the_time('F j, Y') ?></div>
				</div>

			<?php endwhile; endif; ?>    

			<?php get_footer(); ?>