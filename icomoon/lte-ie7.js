/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-home' : '&#xe000;',
			'icon-image' : '&#xe001;',
			'icon-play' : '&#xe002;',
			'icon-file' : '&#xe003;',
			'icon-calendar' : '&#xe005;',
			'icon-address-book' : '&#xe006;',
			'icon-envelop' : '&#xe007;',
			'icon-pencil' : '&#xe008;',
			'icon-user' : '&#xe009;',
			'icon-cog' : '&#xe00a;',
			'icon-location' : '&#xe00b;',
			'icon-search' : '&#xe00c;',
			'icon-bookmark' : '&#xe004;',
			'icon-link' : '&#xe00d;',
			'icon-facebook' : '&#xe00e;',
			'icon-twitter' : '&#xe010;',
			'icon-google-plus' : '&#xe00f;',
			'icon-feed' : '&#xe011;',
			'icon-vimeo' : '&#xe012;',
			'icon-flickr' : '&#xe013;',
			'icon-picassa' : '&#xe014;',
			'icon-dribbble' : '&#xe015;',
			'icon-forrst' : '&#xe016;',
			'icon-deviantart' : '&#xe017;',
			'icon-github' : '&#xe018;',
			'icon-tumblr' : '&#xe019;',
			'icon-soundcloud' : '&#xe01a;',
			'icon-reddit' : '&#xe01b;',
			'icon-linkedin' : '&#xe01c;',
			'icon-lastfm' : '&#xe01d;',
			'icon-delicious' : '&#xe01e;',
			'icon-stumbleupon' : '&#xe01f;',
			'icon-pinterest' : '&#xe020;',
			'icon-foursquare' : '&#xe021;',
			'icon-paypal' : '&#xe022;',
			'icon-chevron-left' : '&#xf053;',
			'icon-chevron-right' : '&#xf054;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
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