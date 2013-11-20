			<?php echo (!is_home())?'</div>':'' ?> <!-- clear -->
			<?php echo (!is_home())?'</div>':'' ?>
			<footer id="footer">
				&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>
			</footer>

		</div> <!-- page wrap -->

			<?php if(is_single()): ?>
				<aside id="comment-sidebar">
					<?php comments_template(); ?>
				</aside>
			<?php endif; ?>
	</div>

		<?php wp_footer(); ?>
		
		<!-- Don't forget analytics -->
	</div>
</div>

	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.jscrollpane.min.js"></script>

	<?php if(is_single()): ?>
	<script type="text/javascript">
		$(function() {
			$('#nav').jScrollPane();
			$('.jspVerticalBar, .jspTrack').css('background', 'transparent');
			$('.jspDrag').css({
				'background': 'rgb(45, 45, 45)',
				'border-radius': '16px'
			});
		});

		var a = $('.post-content p, .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6, .post-content img');
		a.each(function(){
			$(this).prepend('<div class="comment-count" style="background:url(<?php bloginfo('template_url') ?>/images/bubble.png) no-repeat center bottom;"><p style="text-align:center;line-height:1;"><?php comments_number('+',1,'%') ?></p></div>');
		});
		a.hover(function(){
			$(this).addClass('comment-visible');
		},function(){
			$(this).removeClass('comment-visible');
		});

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
