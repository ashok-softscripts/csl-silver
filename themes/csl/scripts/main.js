!function(t,e){var n=function(t,e,n){var i;return function(){function a(){n||t.apply(h,s),i=null}var h=this,s=arguments;i?clearTimeout(i):n&&t.apply(h,s),i=setTimeout(a,e||100)}};jQuery.fn[e]=function(t){return t?this.bind("resize",n(t)):this.trigger(e)}}(jQuery,"smartresize"),$(function(){"use strict";function t(){o.length>0&&o.matchHeight(!0),m.length>0&&(m.matchHeight(!0),m.each(function(){var t=$(this).height();$(this).children("a").css("line-height",t+"px")})),l.length>0&&l.matchHeight(!0),g.length>0&&g.matchHeight(!0),f.length>0&&f.matchHeight(!0),p.length>0&&p.matchHeight(!0),u.length>0&&u.matchHeight(!0),d.length>0&&d.matchHeight(!0),v.length>0&&v.matchHeight(!0),H.length>0&&H.matchHeight(!0),x.length>0&&x.matchHeight(!0)}function e(){if(_.length>0){var t=h.width(),e=s.width(),n=parseInt(t-e)/2;_.css("right",n)}}function n(){if(r.length>0){var t=h.width(),e=s.width(),n=parseInt(t-e)/2;h.hasClass("content--has-nav")?r.removeAttr("style"):r.css({"margin-left":n,"padding-left":0})}}function i(){e(),n()}var a=$(window),h=($("body"),$("html"),$("html, body"),$(".js-top"),$(".logo-thick"),$(".content")),s=$(".container"),r=$(".is-offset"),c=$(".nav__badge"),l=$(".pre-footer > div"),o=$(".features__block"),g=$(".news__excerpt"),m=$(".partners__item"),f=$(".alumni__excerpt"),p=$(".alumni__item"),u=$(".programs h3"),d=$(".programs__excerpt"),v=$(".programs__item"),_=$(".indexnav"),w=$("#overview"),y=$("img.inject-me"),H=$(".instructors__item"),x=$(".speakers__item");if(c.length>0&&c.click(function(){return $("#primary-nav").toggleClass("nav--open"),$(".content").toggleClass("content--has-nav"),t(),e(),n(),!1}),$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);if(t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length)return $("html,body").animate({scrollTop:t.offset().top},1e3),!1}}),_.length>0&&$(_).find(".indexnav__link").click(function(){$(this).attr("href");$(_).find(".indexnav__link").removeClass("is-active"),$(this).addClass("is-active")}),t(),i(),a.smartresize(i),svgeezy.init("injectme","png"),new SVGInjector(y,{pngFallback:"."}),w.length>0&&_.length>0){var k=w.offset().top,b=_.find(".indexnav__item:last-child").children("a").attr("href"),j=$(b).offset().top+$(b).height()/2;$(window).scroll(function(){var t=jQuery(this).scrollTop();t>k&&j>t?_.addClass("fixed"):_.removeClass("fixed")})}});