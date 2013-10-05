<div class="meta">
	<?php (is_home())?the_author_posts_link():'' ?> in <?php the_category(', ') ?> - <span class="meta-time"><i class="icon-bookmark"></i> <?php echo floor(wcount() / 200) + 1 . ' min read' ?></span>
</div>