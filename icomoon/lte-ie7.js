/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-home' : '&#xe000;',
			'icon-address-book' : '&#xe001;',
			'icon-envelop' : '&#xe002;',
			'icon-location' : '&#xe003;',
			'icon-facebook' : '&#xe004;',
			'icon-twitter' : '&#xe005;',
			'icon-instagram' : '&#xe006;',
			'icon-google-plus' : '&#xe007;',
			'icon-mail' : '&#xe008;',
			'icon-feed' : '&#xe009;',
			'icon-youtube' : '&#xe00a;',
			'icon-vimeo' : '&#xe00b;',
			'icon-flickr' : '&#xe00c;',
			'icon-picassa' : '&#xe00d;',
			'icon-dribbble' : '&#xe00e;',
			'icon-forrst' : '&#xe00f;',
			'icon-deviantart' : '&#xe010;',
			'icon-github' : '&#xe011;',
			'icon-wordpress' : '&#xe012;',
			'icon-blogger' : '&#xe013;',
			'icon-tumblr' : '&#xe014;',
			'icon-skype' : '&#xe015;',
			'icon-reddit' : '&#xe016;',
			'icon-linkedin' : '&#xe017;',
			'icon-lastfm' : '&#xe018;',
			'icon-delicious' : '&#xe019;',
			'icon-pinterest' : '&#xe01a;',
			'icon-foursquare' : '&#xe01b;',
			'icon-paypal' : '&#xe01c;',
			'icon-yelp' : '&#xe01d;',
			'icon-pencil' : '&#xe01e;',
			'icon-image' : '&#xe01f;',
			'icon-profile' : '&#xe020;',
			'icon-file' : '&#xe021;',
			'icon-bookmark' : '&#xe022;',
			'icon-search' : '&#xe023;',
			'icon-comment-fill' : '&#xe024;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};