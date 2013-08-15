<div class="meta">
	<span class="meta-time"><?php echo (get_the_modified_time() != get_the_time())?"Updated: ".get_the_modified_time('F j, Y'):"Posted: ".get_the_time('F j, Y') ?></span> - <span class="meta-time"><?php echo floor(wcount() / 200) + 1; echo (floor(wcount() / 200) + 1 > 1)?" minutes read":" minute read"; ?></span>
</div>