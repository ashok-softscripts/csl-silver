!function(t,e){var i=function(t,e,i){var a;return function(){function n(){i||t.apply(o,r),a=null}var o=this,r=arguments;a?clearTimeout(a):i&&t.apply(o,r),a=setTimeout(n,e||100)}};jQuery.fn[e]=function(t){return t?this.bind("resize",i(t)):this.trigger(e)}}(jQuery,"smartresize"),function(t){"use strict";function e(){p.length>0&&p.matchHeight(!0),m.length>0&&(m.matchHeight(!0),m.each(function(){var e=t(this).height();t(this).children("a").css("line-height",e+"px")})),f.length>0&&(w.matchHeight(!0),w.each(function(){var e=t(this).height();t(this).css("line-height",e+"px")}),f.matchHeight(!0)),d.length>0&&d.matchHeight(!0),g.length>0&&g.matchHeight(!0),u.length>0&&u.matchHeight(!0),v.length>0&&v.matchHeight(!0),_.length>0&&_.matchHeight(!0),x.length>0&&x.matchHeight(!0),k.length>0&&k.matchHeight(!0),H.length>0&&H.matchHeight(!0),j.length>0&&j.matchHeight(!0),z.length>0&&z.matchHeight(!0),T.length>0&&T.matchHeight(!0)}function i(){if(y.length>0){var t=c.width(),e=l.width(),i=parseInt(t-e)/2;r.width()>=1148?y.css("right",i):y.css("right",0)}}function a(){if(s.length>0){var t=c.width(),e=l.width(),i=parseInt(t-e)/2;c.hasClass("content--has-nav")?s.removeAttr("style"):s.css({"margin-left":i,"padding-left":0})}}function n(){i(),a()}function o(e){if("success"===e.result)t("#mc-form").empty(),t("#mc-form").html("<p>"+Newsletter.success_msg+"</p>");else if(q===!1&&(q=!0,t("<p class='message_error'></p>").appendTo("#mc-form")),e.msg.indexOf("0 - ")>=0){var i=e.msg.replace("0 - ","");console.log(i),t(".message_error").text(i)}else t(".message_error").html(e.msg);p.matchHeight(!0)}var r=t(window),c=(t("body"),t("html"),t("html, body"),t(".js-top"),t(".logo-thick"),t(".content")),l=t(".container"),s=t(".is-offset"),h=t(".nav__badge"),d=t(".pre-footer > div"),p=t(".features__block"),g=t(".news__content"),m=t(".partners__item"),f=t(".all_partners__item"),w=t(".all_partners__logo"),u=t(".alumni__excerpt"),v=t(".alumni__item"),_=t(".programs h3"),x=t(".programs__excerpt"),k=t(".programs__item"),b=t(".header"),y=t(".indexnav"),C=(t("#overview"),t("img.inject-me")),H=t(".instructors__item"),j=t(".speakers__item"),T=t(".program-applicants__item"),z=t(".program-applicants__item blockquote");if(h.length>0&&h.click(function(){return t("#primary-nav").toggleClass("nav--open"),t(".content").toggleClass("content--has-nav"),e(),i(),a(),!1}),y.length>0&&t(y).find(".indexnav__link").click(function(){var e=t(this).attr("data-target");if(e.length){var i=t("#"+e);t("html,body").animate({scrollTop:i.offset().top},1e3),t(y).find(".indexnav__link").removeClass("is-active"),t(this).addClass("is-active")}return!1}),t(".drop-down").each(function(){var e=t(this),i=e.find(".label span");e.find(".filter").hasClass("active")&&i.text(e.find(".filter.active").text())}),t(".drop-down").on("click",function(e){var i,a=t(this);a.hasClass("expanded")?(a.removeClass("expanded"),i=t(".drop-down").not(this).find(".label span"),i.text(i.attr("data-label")),a.find(".label span").text(t(e.target).text())):(a.addClass("expanded"),i=a.find(".label span"),i.text(i.attr("data-label")))}),t(".drop-down").mouseleave(function(){t(this).removeClass("expanded")}),t(".filter-by-programs .filter").on("click",function(){window.location.origin||(window.location.origin=window.location.protocol+"//"+(window.location.port?":"+window.location.port:""));var e=window.location.origin+window.location.pathname,i=t(this).data("filter");location.href=e+"?filter_program="+i}),t(".filter-by-role .filter").on("click",function(){window.location.origin||(window.location.origin=window.location.protocol+"//"+(window.location.port?":"+window.location.port:""));var e=window.location.origin+window.location.pathname,i=t(this).data("filter");location.href=e+"?filter_role="+i}),t("input[type=radio]").wrap('<div class="radio-wrapper"></div>'),t("input[type=radio]:checked").parent(".radio-wrapper").addClass("checked"),t("input[type=checkbox]").wrap('<div class="checkbox-wrapper"></div>'),t("input[type=checkbox]:checked").parent(".checkbox").addClass("checked"),t(".radio-wrapper input[type=radio]").click(function(){t(".radio-wrapper").removeClass("checked"),t(this).parent().addClass("checked")}),t(".checkbox-wrapper input[type=checkbox]").click(function(){t(this).parent(".checkbox-wrapper").toggleClass("checked")}),e(),n(),r.smartresize(n),svgeezy.init("injectme","png"),new SVGInjector(C,{pngFallback:"."}),b.length>0&&y.length>0){var Q=b.outerHeight(),I="#"+y.find(".indexnav__item:last-child").children("a").attr("data-target"),N=t(I).offset().top;t(window).scroll(function(){var t=jQuery(this).scrollTop();t>Q&&N>t?y.addClass("fixed"):y.removeClass("fixed")})}var q=!1;t("#mc-form").ajaxChimp({url:Newsletter.campaign_url,callback:o})}(jQuery);