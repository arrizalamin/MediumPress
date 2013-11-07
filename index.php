<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class('index-box') ?> id="post-<?php the_ID(); ?>">

			<div class="author-pic">
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_avatar(get_the_author_meta('ID'),50) ?></a>
			</div>

			<div class="post-title">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</div>

			<div class="post-content">
				<?php the_excerpt(); ?>
			</div>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

		</div>

	<?php endwhile; ?>

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div>

<?php get_footer(); ?>
