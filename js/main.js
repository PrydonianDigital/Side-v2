Gumby.init();
$(function() {
	if($('.type-post').data('current') == 'active'){
		$(this).addClass('active');
	}
	$('#cbp-qtrotator').cbpQTRotator();
	$("#ch-carousel").owlCarousel({
		items: 1,
		lazyLoad : true,
		navigation : false,
		pagination: false,
		slideSpeed : 2500,
		paginationSpeed : 500,
		navigationText: ["",""],
		autoPlay: true,
		itemsDesktop: false,
		itemsDesktopSmall: false,
		itemsTablet: false,
		itemsTabletSmall: false,
		itemsMobile: false,
		stopOnHover: true,
		rewindSpeed: 1500
	});
	if(element_exists('.single-projects')) {
		$('#menu-item-612').addClass('active');
	}
	$('.whatWeDo .what-we-do:first-child .title').addClass('active');
	$('.whatWeDo2 span:first-child').addClass('active');
	//$('.whatWeDoContent').hide();
	$('.whatWeDoContent:first-child').show();
	$('.whatWeDo2 .what-we-do .title a').click(function(e){
		e.preventDefault();
		$('.title').removeClass('active');
		var $title = $(this).parent(),
			$content = $(this).attr('id');
		//alert($content);
		if($title.hasClass('active')){
			$title.removeClass('active');
		} else {
			$title.addClass('active');
		}
		//$('.whatWeDoContent').hide();
		//$('.whatWeDoContent').hide();
		$('.whatWeDoContent[data-slug='+$content+']').slideDown('slow');
	});
	$('.whatWeDo2 span a').click(function(e){
		e.preventDefault();
		$('.title').removeClass('active');
		var $title = $(this).parent(),
			$content = $(this).attr('id');
		//alert($content);
		if($title.hasClass('active')){
			$title.removeClass('active');
		} else {
			$title.addClass('active');
		}
		$( ".whatWeDoContent" ).load($content+'/', function(){

			$('#cbp-qtrotator').cbpQTRotator();
			$("#ch-carousel").owlCarousel({
				items: 1,
				lazyLoad : true,
				navigation : false,
				pagination: false,
				slideSpeed : 2000,
				paginationSpeed : 500,
				navigationText: ["",""],
				autoPlay: true,
				itemsDesktop: false,
				itemsDesktopSmall: false,
				itemsTablet: false,
				itemsTabletSmall: false,
				itemsMobile: false,
				stopOnHover: true,
				rewindSpeed: 1500
			});
		});
	});
		$( ".whatWeDoContent" ).load('/what-we-do/casting/', function(){
			$("#ch-carousel").owlCarousel({
				items: 1,
				lazyLoad : true,
				navigation : false,
				pagination: false,
				slideSpeed : 2000,
				paginationSpeed : 500,
				navigationText: ["",""],
				autoPlay: true,
				itemsDesktop: false,
				itemsDesktopSmall: false,
				itemsTablet: false,
				itemsTabletSmall: false,
				itemsMobile: false,
				stopOnHover: true,
				rewindSpeed: 1500
			});
			$('#cbp-qtrotator').cbpQTRotator();
		});
	$('.founder .content').hide();
	$('a').each(function(i) {
		var classes = this.className.split(/\s+/);
		for (var i=0,len=classes.length; i<len; i++){
			if ($('body').hasClass(classes[i])){
				$(this).addClass('bodySharesClass');
			}
		}
	});
	$('.founder').on('click', 'a', function(e){
		e.preventDefault();
		var $title = $(this).parent(),
			$content = $(this).attr('id');
		//alert($content);
		if($title.hasClass('closed')){
			$title.removeClass('closed').addClass('open');
		} else {
			$title.removeClass('open').addClass('closed');
		}
		$(this).parent().next().toggle('slow');
	});
	$('.mejs-video').sixteenbynine();
	$('#newsContent iframe').attr('style', 'width: 100%;').sixteenbynine();
});

$(window).on('load', function() {
	$('iframe#twitter-widget-0').attr('style', 'width: 100%');
	$('iframe#twitter-widget-0').each(function () {
		var head = $(this).contents().find('head');
		console.log(head);
		if (head.length) {
			head.append('<style>.timeline-Widget { max-width: 100% !important; width: 100% !important; } @media only screen and (max-width: 600px) { .timeline-Widget { max-width: 300px !important; width: 300px !important; } }</style>');
		}
	});
});

function element_exists(id){
	if($(id).length > 0){
		return true;
	}
	return false;
}
(function(c,b,e){var d=b.Modernizr;c.CBPQTRotator=function(f,g){this.$el=c(g);this._init(f)};c.CBPQTRotator.defaults={speed:700,easing:"ease",interval:8000};c.CBPQTRotator.prototype={_init:function(f){this.options=c.extend(true,{},c.CBPQTRotator.defaults,f);this._config();this.$items.eq(this.current).addClass("cbp-qtcurrent");if(this.support){this._setTransition()}this._startRotator()},_config:function(){this.$items=this.$el.children("div.cbp-qtcontent");this.itemsCount=this.$items.length;this.current=0;this.support=d.csstransitions;if(this.support){this.$progress=c('<span class="cbp-qtprogress"></span>').appendTo(this.$el)}},_setTransition:function(){setTimeout(c.proxy(function(){this.$items.css("transition","opacity "+this.options.speed+"ms "+this.options.easing)},this),25)},_startRotator:function(){if(this.support){this._startProgress()}setTimeout(c.proxy(function(){if(this.support){this._resetProgress()}this._next();this._startRotator()},this),this.options.interval)},_next:function(){this.$items.eq(this.current).removeClass("cbp-qtcurrent");this.current=this.current<this.itemsCount-1?this.current+1:0;this.$items.eq(this.current).addClass("cbp-qtcurrent")},_startProgress:function(){setTimeout(c.proxy(function(){this.$progress.css({transition:"width "+this.options.interval+"ms linear",width:"100%"})},this),25)},_resetProgress:function(){this.$progress.css({transition:"none",width:"0%"})},destroy:function(){if(this.support){this.$items.css("transition","none");this.$progress.remove()}this.$items.removeClass("cbp-qtcurrent").css({position:"relative","z-index":100,"pointer-events":"auto",opacity:1})}};var a=function(f){if(b.console){b.console.error(f)}};c.fn.cbpQTRotator=function(g){if(typeof g==="string"){var f=Array.prototype.slice.call(arguments,1);this.each(function(){var h=c.data(this,"cbpQTRotator");if(!h){a("cannot call methods on cbpQTRotator prior to initialization; attempted to call method '"+g+"'");return}if(!c.isFunction(h[g])||g.charAt(0)==="_"){a("no such method '"+g+"' for cbpQTRotator instance");return}h[g].apply(h,f)})}else{this.each(function(){var h=c.data(this,"cbpQTRotator");if(h){h._init()}else{h=c.data(this,"cbpQTRotator",new c.CBPQTRotator(g,this))}})}return this}})(jQuery,window);
(function($){
	$.fn.sixteenbynine=function(){
		var width=this.width();
		this.height(width*9/16);
	};
})(jQuery);