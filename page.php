<?php get_header(); ?>
<?php
if(function_exists('ot_get_option')){
	$facebook = ot_get_option('facebook');
	$gplus = ot_get_option('gplus');
	$twitter = ot_get_option('twitter');
	$disqus_username = ot_get_option('disqus_username');
}
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="featured-image">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('full', array( 'class' => "featured-img"));
		}
		?>
	</div>
	<div id="page-wrap">
		<div class="group">
			
			<div class="post" id="post-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>

				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

				<div class="entry">

					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

				</div>

				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

			</div>
			<div class="bio">
				<div class="author-picture"><?php echo get_avatar( get_the_author_meta( 'ID' ),73 ); ?></div>
				<div class="author-name"><?php the_author_posts_link(); ?></div>
				<div class="author-bio"><?php the_author_meta('description') ?></div>
				<div class="post-date"><span style="font-weight:bold;"><?php echo (get_the_modified_time() != get_the_time())?"Updated</span><br />".get_the_modified_time('F j, Y'):"Posted: ".get_the_time('F j, Y') ?></div>

		<?php endwhile; endif; ?>

		<?php get_footer(); ?>
