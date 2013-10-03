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
				<hr class="hratas"/>
			</div>
		</div>
		<?php if(!is_home()): ?>
		<div class="bio">
			<div class="author-picture"><?php echo get_avatar( get_the_author_meta( 'ID' ),73 ); ?></div>
			<div class="author-name"><?php the_author_posts_link(); ?></div>
			<div class="author-bio"><?php the_author_meta('description') ?></div>
			<div class="post-date"><span style="font-weight:bold;"><?php echo (get_the_modified_time() != get_the_time())?"Updated</span><br />".get_the_modified_time('F j, Y'):"Posted: ".get_the_time('F j, Y') ?></div>
		</div>
		<?php endif; ?>
		<hr class="hrbawah"/>
	</div>


	<?php endwhile; ?>

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div>

<?php get_footer(); ?>
