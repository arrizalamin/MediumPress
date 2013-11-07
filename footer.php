			<?php echo (!is_home())?'</div>':'' ?> <!-- clear -->
			<?php echo (!is_home())?'</div>':'' ?>
			<div id="footer">
				&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>
			</div>

		</div> <!-- page wrap -->

			<?php (is_single())?include_once(TEMPLATEPATH . '/comment-template.php' ):"" ?>
	</div>

		<?php wp_footer(); ?>
		
		<!-- Don't forget analytics -->
	</div>
</div>

	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.jscrollpane.min.js"></script>

	<?php if(is_single()): ?>
	<script type="text/javascript">
		$(function()
		{
			$('#nav').jScrollPane();
			$('.jspVerticalBar, .jspTrack').css('background', 'transparent');
			$('.jspDrag').css({
				'background': 'rgb(45, 45, 45)',
				'border-radius': '16px'
			});
		});
	</script>
	<script type="text/javascript">
		var a = $('.entry>p, .entry>h1, .entry>h2, .entry>h3, .entry>h4, .entry>h5, .entry>h6, .entry>img');
		a.each(function(){
			$(this).prepend('<div class="comment-count" style="background:url(<?php bloginfo('template_url') ?>/images/bubble.png) no-repeat center bottom;"><p style="text-align:center;line-height:1;"><?php comments_number('+',1,'%') ?></p></div>');
		});
		a.hover(function(){
			$(this).addClass('comment-visible');
		},function(){
			$(this).removeClass('comment-visible');
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
