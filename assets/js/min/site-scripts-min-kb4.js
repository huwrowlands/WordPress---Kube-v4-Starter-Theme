!function(){var t=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,e=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(t||e||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t=document.getElementById(location.hash.substring(1));t&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1)}(),function($){function t(e,n){return new t.prototype.init(e,n)}$.fn.navigationToggle=function(e){return this.each(function(){$.data(this,"navigationToggle",{}),$.data(this,"navigationToggle",t(this,e))})},$.NavigationToggle=t,$.NavigationToggle.NAME="navigation-toggle",$.NavigationToggle.VERSION="1.0",$.NavigationToggle.opts={target:!1},t.fn=$.NavigationToggle.prototype={init:function(t,e){this.$element=t!==!1?$(t):!1,this.loadOptions(e),this.$target=$(this.opts.target),this.$toggle=this.$element.find("span"),this.$toggle.on("click",$.proxy(this.onClick,this)),this.build(),$(window).resize($.proxy(this.build,this))},loadOptions:function(t){this.opts=$.extend({},$.extend(!0,{},$.NavigationToggle.opts),this.$element.data(),t)},setCallback:function(t,e,n){var i=$._data(this.$element[0],"events");if(i&&"undefined"!=typeof i[t]){for(var o=[],a=i[t].length,s=0;a>s;s++){var g=i[t][s].namespace;if(g=="tools."+$.NavigationToggle.NAME||g==$.NavigationToggle.NAME+".tools"){var l=i[t][s].handler;o.push("undefined"==typeof n?l.call(this,e):l.call(this,e,n))}}return 1==o.length?o[0]:o}return"undefined"==typeof n?e:n},build:function(){var t=window.matchMedia("(max-width: 767px)");t.matches?this.$target.hasClass("navigation-target-show")||(this.$element.addClass("navigation-toggle-show").show(),this.$target.addClass("navigation-target-show").hide()):(this.$element.removeClass("navigation-toggle-show").hide(),this.$target.removeClass("navigation-target-show").show())},onClick:function(t){t.stopPropagation(),t.preventDefault(),this.isTargetHide()?(this.$element.addClass("navigation-toggle-show"),this.$target.show(),this.setCallback("show",this.$target)):(this.$element.removeClass("navigation-toggle-show"),this.$target.hide(),this.setCallback("hide",this.$target))},isTargetHide:function(){return"none"==this.$target[0].style.display?!0:!1}},$(window).on("load.tools.navigation-toggle",function(){$('[data-tools="navigation-toggle"]').navigationToggle()}),t.prototype.init.prototype=t.prototype}(jQuery),function(t,e){"function"==typeof define&&define.amd?define(e):"object"==typeof exports?module.exports=e:t.conditionizr=e()}(this,function(){"use strict";function t(t,e,i){function o(e){var o,a=i?t:n+t+("style"===e?".css":".js");switch(e){case"script":o=document.createElement("script"),o.src=a;break;case"style":o=document.createElement("link"),o.href=a,o.rel="stylesheet";break;case"class":document.documentElement.className+=" "+t}!!o&&(document.head||document.getElementsByTagName("head")[0]).appendChild(o)}for(var a=e.length;a--;)o(e[a])}var e={},n;return e.config=function(i){n=i.assets||"";for(var o in i.tests)e[o]&&t(o,i.tests[o])},e.add=function(t,n){e[t]="function"==typeof n?n():n},e.on=function(t,n){(e[t]||/\!/.test(t)&&!e[t.slice(1)])&&n()},e.load=e.polyfill=function(n,i){for(var o=i.length;o--;)e[i[o]]&&t(n,[/\.js$/.test(n)?"script":"style"],!0)},e});
//# sourceMappingURL=./site-scripts-min-kb4.js.map