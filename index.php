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

			<div class="post_title">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</div>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				<?php the_excerpt(); ?>
			</div>

			<div class="postmetadata">
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
				Posted in <?php the_category(', ') ?>
				<hr class="hratas"/>
			</div>
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
		</div>
		<hr class="hrbawah"/>


	<?php endwhile; ?>

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div>

<?php get_footer(); ?>
