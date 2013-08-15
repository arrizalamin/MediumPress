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
				<div class="author-social">
					<ul>
						<li><a href="<?php echo $facebook ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook_circle_gray32x32.png" width="32" height="32" alt="Facebook"/></a></li>
						<li><a href="<?php echo $gplus ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/google_circle_gray32x32.png" width="32" height="32" alt="Google+"/></a></li>
						<li><a href="http://twitter.com/<?php echo $twitter ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter_circle_gray32x32.png" width="32" height="32" alt="Twitter"/></a></li>
					</ul>
				</div>



		<?php endwhile; endif; ?>

		<?php get_footer(); ?>
