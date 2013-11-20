<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; ?>

	<?php while (have_posts()) : the_post(); ?>
	
	<div <?php post_class('index-box') ?>>
		
		<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

		<div id="post-<?php the_ID(); ?>" class="post-title">
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</div>
		
		<div class="post-content">
			<?php the_excerpt(); ?>
		</div>
		<div class="post-meta-data">
			<?php the_tags('Tags: ', ', ', '<br />'); ?>
		</div>
	</div>

<?php endwhile; ?>
<div>

<?php else : ?>

	<h2>Nothing found</h2>

<?php endif; ?>

<?php get_footer(); ?>
