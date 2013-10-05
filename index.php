<?php get_header(); ?>
<?php
if(function_exists('ot_get_option')){
	$facebook = ot_get_option('facebook');
	$gplus = ot_get_option('gplus');
	$twitter = ot_get_option('twitter');
}
?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="index-box">


		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="author-pucture">
				<a href="#"><?php echo get_avatar(get_the_author_meta('ID'),50) ?></a>
			</div>

			<div class="post_title">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</div>

			<div class="entry">
				<?php the_excerpt(); ?>
			</div>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

		</div>
	</div>


	<?php endwhile; ?>

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div>

<?php get_footer(); ?>
