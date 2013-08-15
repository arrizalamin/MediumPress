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

	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2>Archive for <?php the_time('F jS, Y'); ?></h2>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2>Archive for <?php the_time('F, Y'); ?></h2>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>

	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h2 class="pagetitle">Stuff I Wrote</h2>

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2 class="pagetitle">Blog Archives</h2>
	
	<?php } ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php while (have_posts()) : the_post(); ?>
	
	<div <?php post_class() ?>>
		
		<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		
		<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

		<div class="entry">
			<?php the_content(); ?>
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
<div>

<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

<?php else : ?>

	<h2>Nothing found</h2>

<?php endif; ?>

<?php get_footer(); ?>
