/* jshint devel:true */
(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          }

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

              timeout = setTimeout(delayed, threshold || 100);
          };
      };
      // smartresize
      jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

    })(jQuery,'smartresize');
$(function() {
    'use strict';
    
	var $containerMax = 1248;
	var $window = $(window);
    var $body = $('body');
    var $html = $('html');
    var $scrollTarget = $('html, body');
    var $backToTop = $('.js-top');
    var $logoThick = $('.logo-thick');
    var $page = $('.content');
	var $container = $('.container');
	var $offsetContainer = $('.is-offset');
	var $navToggle = $('.nav__badge');
	var $pre_footer = $('.pre-footer > div');
	var $features = $('.features__block');
	var $news_excerpt = $('.news__excerpt');
	var $partners_item = $('.partners__item');	
	var $all_partners_item = $('.all_partners__item');	
	var $all_partners_logo = $('.all_partners__logo');
	var $alumni_excerpt = $('.alumni__excerpt');		
	var $alumni_item = $('.alumni__item');
	var $programs_title = $('.programs h3');
	var $programs_excerpt = $('.programs__excerpt');		
	var $programs_item = $('.programs__item');
	var $indexnav = $('.indexnav');
	var $section_overview = $('#overview');
	var $injectedSVGs = $('img.inject-me');
	var $instructors_item = $('.instructors__item');
	var $speakers_item = $('.speakers__item');
	var $programs_applicants = $('.program-applicants__item');
	var $programs_applicants_quote = $('.program-applicants__item blockquote');
	
	
	// Nav togggle
	if($navToggle.length > 0) {
		$navToggle.click(function(){
			$('#primary-nav').toggleClass('nav--open');
			$('.content').toggleClass('content--has-nav');			
			adjustHeight();
			setIndexnav();
			offsetContainer();
			return false;	
		});
	}
	
	// Anchor spots
	if ($indexnav.length > 0) {	
		$($indexnav).find('.indexnav__link').click(function(){
			var section_id = $(this).attr('data-target');
			if(section_id.length) {
				var target = $('#' + section_id);
				$('html,body').animate({ scrollTop: target.offset().top }, 1000);
				$($indexnav).find('.indexnav__link').removeClass('is-active');
				$(this).addClass('is-active');
			}
			return false;
		});
	}
	function adjustHeight(){
		// match height of feature blocks
		if ($features.length > 0) {
			$features.matchHeight(true);
		}
		// match height of partners blocks
		if ($partners_item.length > 0) {
			$partners_item.matchHeight(true);
			$partners_item.each(function(){
				var $partner_height = $(this).height();
				$(this).children('a').css('line-height',$partner_height + 'px');
			});
		}
		// match height of partners blocks
		if ($all_partners_item.length > 0) {
			$all_partners_logo.matchHeight(true);
			$all_partners_logo.each(function(){
				var $partner_logo_height = $(this).height();
				$(this).css('line-height',$partner_logo_height + 'px');
			});
			$all_partners_item.matchHeight(true);			
		}
			
		// match height of footer blocks
		if ($pre_footer.length > 0) {
			$pre_footer.matchHeight(true);
		}
		// match height of news excerpt
		if ($news_excerpt.length > 0) {
			$news_excerpt.matchHeight(true);
		}
		// match height of alumni excerpt
		if ($alumni_excerpt.length > 0) {
			$alumni_excerpt.matchHeight(true);
		}
		// match height of alumni item
		if ($alumni_item.length > 0) {
			$alumni_item.matchHeight(true);
		}
		// match height of programs title
		if ($programs_title.length > 0) {
			$programs_title.matchHeight(true);
		}
		// match height of programs excerpt
		if ($programs_excerpt.length > 0) {
			$programs_excerpt.matchHeight(true);
		}
		// match height of programs item
		if ($programs_item.length > 0) {
			$programs_item.matchHeight(true);
		}
		// match height of instructors item
		if ($instructors_item.length > 0) {
			$instructors_item.matchHeight(true);
		}
		// match height of instructors item
		if ($speakers_item.length > 0) {
			$speakers_item.matchHeight(true);
		}
		// match height of program applicants quote
		if ($programs_applicants_quote.length > 0) {
			$programs_applicants_quote.matchHeight(true);
		}
		// match height of program applicants
		if ($programs_applicants.length > 0) {
			$programs_applicants.matchHeight(true);
		}
		
				
	}
	
	function setIndexnav(){
		if ($indexnav.length > 0) {
			var page_width = $page.width();
			var cont_width = $container.width();
			var p_right = parseInt(page_width - cont_width)/2;
			$indexnav.css('right', p_right);
		}
	}
	
	function offsetContainer(){
		if ($offsetContainer.length > 0) {
			var page_width = $page.width();
			var cont_width = $container.width();			
			var $offsetRight = parseInt(page_width - cont_width)/2;
			if($page.hasClass('content--has-nav')){
				$offsetContainer.removeAttr('style');
			}
			else{
				$offsetContainer.css({'margin-left':$offsetRight, 'padding-left': 0 });
			}
		}
	}
	
	
	// init resize functions
	function resizeUpdates(){
		setIndexnav();
		offsetContainer();
	}
	
	
	// init
	adjustHeight();
	resizeUpdates();
	
	
	$window.smartresize(resizeUpdates);
	
	// png fallback on svg imgs
    svgeezy.init('injectme', 'png');
	
    // Do SVG injection
    new SVGInjector($injectedSVGs, {
        pngFallback: '.'
    });
	
	if (($section_overview.length > 0) && ($indexnav.length > 0) ) {
		var firstScrollTop = $section_overview.offset().top;
		var lastSection = '#' + $indexnav.find('.indexnav__item:last-child').children('a').attr('data-target');
		var lastScrollTop = $(lastSection).offset().top + ($(lastSection).height()/2); 
		$(window).scroll(function(event){
			var st = jQuery(this).scrollTop();
			if (st > firstScrollTop && st < lastScrollTop){
				$indexnav.addClass('fixed');
			} else {
				$indexnav.removeClass('fixed');
			} 
			
		});       
	}
	
});
