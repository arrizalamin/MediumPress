$(document).ready(function(){
	var pagebody = $(".wrapper");
	var pagecontent = $(".page-wrap");
	var cover = $(".cover-body");
	var button = $("#nav-toggle");
	var nav = $("#nav");
	var comment = $("#comment-sidebar");
	var bubble = $(".comment-count");
	var search_icon = $(".search-icon");
	var search_form = $("#nav-list-search");
	var comment_toggle = $("#comment-toggle, .comment-reply-link");
	var comment_form = $("#commentform");
	
	function open_nav() { 
		nav.delay(200).animate({
			left: "0px"
		}, 300);
		cover.delay(200).animate({
			left: "280px"
		}, 300),
		pagebody.delay(200).animate({
			left: "280px"
		}, 300);
		button.animate({
		    top: "-30px"
		}, { duration: 300, queue: false });
		button.fadeOut('fast');
	};
	
	function close_nav() {
		cover.animate({
			left: "0px"
		}, 180),
		pagebody.animate({
	        left: "0px"
	    }, 180);
		nav.animate({
			left: "-280px"
		}, 180, function(){
			button.animate({
		        top: "10px"
		    }, { duration: 180, queue: false });
			button.fadeIn('slow');
	    });
		search_form.slideUp('fast');
	};

	function open_comment(top) {
		if(pagecontent.css('left') != "-50%"){
			pagecontent.animate({
				'left': "-50%",
				'margin-right': 0
			}, 300, function(){
				comment.css({
					'visibility': 'visible',
					'margin-top': top
				});
			});
		}
	}

	function close_comment() {
		comment.css('visibility', 'hidden');
		pagecontent.css('margin', '0 auto').animate({
	        'left': "0px"
	    }, 180);
	    $(".bubble-active").removeClass('bubble-active');
	}

	function open_form() {
		comment_form.slideDown('slow');
		comment_toggle.fadeOut('fast');
	}

	button.on("click", function(e){
		e.preventDefault();
		var leftval = pagebody.css('left');
		
		if(leftval == "0px") {
			open_nav();
		}
	});

	bubble.on("click", function(e){
		e.preventDefault();
		var leftval = pagebody.css('left');
		var position = $(this).offset();

		$(this).addClass('bubble-active');
		if(leftval == "0px"){
			open_comment(position.top);
		}
	});

	pagebody.on("click", function(){
		var leftval = pagebody.css('left');

		if(leftval == "280px") {
			close_nav();
		}
	});

	pagecontent.on("click", function(){
		var leftval = pagecontent.css('left');
		if(leftval == "-50%") {
			close_comment();
		}
	})

	search_icon.on("click", function(){
		if(search_form.css('display') == "none"){
			search_form.slideDown('slow');
		} else {
			$("form[id=searchform]").submit();
		}
	});

	comment_toggle.click(function(){
		open_form();
	});
});