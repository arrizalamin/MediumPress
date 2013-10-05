<div class="meta">
	<?php if(!is_page()){
		if(is_home()){
			the_author_posts_link();
		}
		echo ' in ';
		the_category(', ');
	}else{
		echo 'WordPress Page';
	} ?>
	 - <span class="meta-time"><i class="icon-bookmark"></i> <?php echo floor(wcount() / 200) + 1 . ' min read' ?></span>
</div>