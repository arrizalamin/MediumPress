<?php get_header(); ?>
<?php
if(function_exists('ot_get_option')){
	$facebook = ot_get_option('facebook');
	$gplus = ot_get_option('gplus');
	$twitter = ot_get_option('twitter');
	$disqus_username = ot_get_option('disqus_username');
}
?>

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>

	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2 class="pagetitle">Blog Archives</h2>
	
	<?php } ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php while (have_posts()) : the_post(); ?>
	
	<div class="index-box">


		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="author-pic">
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_avatar(get_the_author_meta('ID'),50) ?></a>
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
<div>

<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

<?php else : ?>

	<h2>Nothing found</h2>

<?php endif; ?>

<?php get_footer(); ?>
