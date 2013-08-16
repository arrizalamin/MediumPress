			</div> <!-- clear -->
			</div>
			<div id="footer">
				&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>
			</div>

		</div> <!-- page wrap -->

			<?php (is_single())?include_once(TEMPLATEPATH . '/disqus.php' ):"" ?>
	</div>

		<?php wp_footer(); ?>
		
		<!-- Don't forget analytics -->
	</div>
</div>
	<?php if(is_single()): ?>
	<script type="text/javascript">
		$('.entry>p, .entry>h1, .entry>h2, .entry>h3, .entry>h4, .entry>h5, .entry>h6, .entry>img').each(function(){
			$(this).prepend('<span class="icon-comment-fill"></span>');
		});
	</script>
	<script type="text/javascript">
		var comment1 = $("#comment1");
		var comment2 = $("#comment2");
		var nav_form_comment = $(".nav-form-comment");
		var input_name = $("#author");
		var input_email = $("#email");
		var p = $("#pic-and-name");
		var my_name = $("#my-name");

		nav_form_comment.click(function(e){
			e.preventDefault();
			if($(this).text() == "Next" && input_name.val() != "" && input_email.val() != ""){
				if($("#url").val() != ""){
					p.wrap('<a href="'+$("#url").val()+'" />');
				}
				my_name.text(input_name.val());
				comment1.slideUp('slow', function(){
					comment2.slideDown('slow');
				});
			} else if($(this).text() == "Back"){
				comment2.slideUp('slow', function(){
					comment1.slideDown('slow');
				});
			}
		});
	</script>
	<?php endif; ?>

</body>

</html>
