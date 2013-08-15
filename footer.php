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

	<script type="text/javascript" src="<?php echo (is_single())?bloginfo('template_url')."/js/comment.js":"" ?>"></script>
</body>

</html>
