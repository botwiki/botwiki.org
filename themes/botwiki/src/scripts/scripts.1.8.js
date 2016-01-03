"strict";
/*
  https://github.com/alicelieutier/smoothScroll
  Modified by Stefan Bohacek to use the HTML5 History API.
*/
window.smoothScroll = (function(){
if(document.querySelectorAll === void 0 || window.pageYOffset === void 0 || history.pushState === void 0) { return; }
var getTop = function(element) {
    if(element.nodeName === 'HTML'){
      return -window.pageYOffset;
    } 
    return element.getBoundingClientRect().top + window.pageYOffset;
};
var easeInOutCubic = function (t) { return t<0.5 ? 4*t*t*t : (t-1)*(2*t-2)*(2*t-2)+1; };
var position = function(start, end, elapsed, duration) {
    if (elapsed > duration){
      return end;
    } 
    return start + (end - start) * easeInOutCubic(elapsed / duration); // <-- you can change the easing funtion there
};
var smoothScroll = function(el, duration, callback){
    duration = duration || 500;
    var start = window.pageYOffset,
        end;
    if (typeof el === 'number') {
      end = parseInt(el);
    } else {

    if (window.innerWidth > 910){
      end = getTop(el) - 70;
    }
    else{
      end = getTop(el);      
    }


    }
    var clock = Date.now();
    var requestAnimationFrame = window.requestAnimationFrame ||
        window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame ||
        function(fn){window.setTimeout(fn, 15);};
    var step = function(){
        var elapsed = Date.now() - clock;
        window.scroll(0, position(start, end, elapsed, duration));
        if (elapsed > duration) {
            if (typeof callback === 'function') {
                callback(el);
            }
        } else {
            requestAnimationFrame(step);
        }
    };
    step();
};
var linkHandler = function(ev) {
    ev.preventDefault();
    var hash = this.hash.substring(1);
    if (window.history && window.history.pushState){
      history.pushState(null, null, '#' + hash);
    }
    smoothScroll(document.getElementById(hash), 500, function(el) {
    });
};
document.addEventListener("DOMContentLoaded", function () {
    var internal = document.querySelectorAll('a[href^="#"]'), a;
    for(var i=internal.length; a=internal[--i];){
        a.addEventListener("click", linkHandler, false);
    }
});
return smoothScroll;
})();

var sticky = document.getElementById('breadcrumbs-wrapper');

function checkBreadcrumbsPosition(){
  // TODO: Get this value dynamically!
  if( document.body.scrollTop + document.documentElement.scrollTop > 259){
    document.body.style.paddingTop = sticky.clientHeight + 'px'; 
    sticky.className = 'sticky';
  }
  else{
    document.body.style.paddingTop = '0';
    sticky.className = '';
  }  
}

function ready(fn) {
  if (document.readyState !== 'loading'){
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

ready(function(){
if(window.location.hash) {
  if (window.innerWidth > 910){
    checkBreadcrumbsPosition();
  }
  smoothScroll(document.getElementById(window.location.hash.substring(1)), 200, function(el){});
  return false;
}


var backToTopLinks = document.querySelectorAll('.back-to-top'), a;

for(var i = backToTopLinks.length; a = backToTopLinks[--i];){
    a.addEventListener("click", function(ev){
      ev.preventDefault();
      smoothScroll(0, 500);      
    }, false);
}



console.log('                                                                                                                    ');
console.log('88888888ba                                            88  88         88                                             ');
console.log('88      "8b                ,d                         ""  88         ""                                             ');
console.log('88      ,8P                88                             88                                                        ');
console.log('88aaaaaa8P\'   ,adPPYba,  MM88MMM  8b      db      d8  88  88   ,d8   88        ,adPPYba,   8b,dPPYba,   ,adPPYb,d8  ');
console.log('88""""""8b,  a8"     "8a   88     `8b    d88b    d8\'  88  88 ,a8"    88       a8"     "8a  88P\'   "Y8  a8"    `Y88  ');
console.log('88      `8b  8b       d8   88      `8b  d8\'`8b  d8\'   88  8888[      88       8b       d8  88          8b       88  ');
console.log('88      a8P  "8a,   ,a8"   88,      `8bd8\'  `8bd8\'    88  88`"Yba,   88  888  "8a,   ,a8"  88          "8a,   ,d88  ');
console.log('88888888P"    `"YbbdP"\'    "Y888      YP      YP      88  88   `Y8a  88  888   `"YbbdP"\'   88           `"YbbdP"Y8  ');
console.log('                                                                                                        aa,    ,88  ');
console.log('                                                                                                         "Y8bbdP"   ');
  console.log('\nHello there! Are you a #botmaker? Join us! https://botmakers.org/\n');
  console.log('Want to get more involved? https://github.com/botwiki/botwiki.org/blob/master/HELP-WANTED.md\n\n');
  var articleImages = document.querySelectorAll('article img');

  for (var i = 0, j = articleImages.length; i < j; i++){
    articleImages[i].dataset.src = articleImages[i].src;
    articleImages[i].classList.add('lazy-load');    
  }

  var lazyLoadedImages = document.getElementsByClassName('search-text-after-image');
  if (lazyLoadedImages.lenght){
    lazyLoadedImages.
      classList.remove('search-text-after-image').
      classList.add('search-text');
  }
});

window.onscroll = function() {
  if (window.innerWidth > 910){
    checkBreadcrumbsPosition();
  }
};

/*!
 * Lazy Load Images without jQuery
 * http://kaizau.github.com/Lazy-Load-Images-without-jQuery/
 *
 * Original by Mike Pulaski - http://www.mikepulaski.com
 * Modified by Kai Zau - http://kaizau.com
 */
!function(){function d(a){var b=0;if(a.offsetParent){do b+=a.offsetTop;while(a=a.offsetParent);return b}}var a=window.addEventListener||function(a,b){window.attachEvent("on"+a,b)},b=window.removeEventListener||function(a,b){window.detachEvent("on"+a,b)},c={cache:[],mobileScreenSize:500,addObservers:function(){a("scroll",c.throttledLoad),a("resize",c.throttledLoad)},removeObservers:function(){b("scroll",c.throttledLoad,!1),b("resize",c.throttledLoad,!1)},throttleTimer:(new Date).getTime(),throttledLoad:function(){var a=(new Date).getTime();a-c.throttleTimer>=200&&(c.throttleTimer=a,c.loadVisibleImages())},loadVisibleImages:function(){for(var a=window.pageYOffset||document.documentElement.scrollTop,b=window.innerHeight||document.documentElement.clientHeight,e={min:a-200,max:a+b+200},f=0;f<c.cache.length;){var g=c.cache[f],h=d(g),i=g.height||0;if(h>=e.min-i&&h<=e.max){var j=g.getAttribute("data-src-mobile");g.onload=function(){this.className=this.className.replace(/(^|\s+)lazy-load(\s+|$)/,"$1lazy-loaded$2")},g.src=j&&screen.width<=c.mobileScreenSize?j:g.getAttribute("data-src"),g.removeAttribute("data-src"),g.removeAttribute("data-src-mobile"),c.cache.splice(f,1)}else f++}0===c.cache.length&&c.removeObservers()},init:function(){document.querySelectorAll||(document.querySelectorAll=function(a){var b=document,c=b.documentElement.firstChild,d=b.createElement("STYLE");return c.appendChild(d),b.__qsaels=[],d.styleSheet.cssText=a+"{x:expression(document.__qsaels.push(this))}",window.scrollBy(0,0),b.__qsaels}),a("load",function d(){for(var a=document.querySelectorAll("img[data-src]"),e=0;e<a.length;e++){var f=a[e];c.cache.push(f)}c.addObservers(),c.loadVisibleImages(),b("load",d,!1)})}};c.init()}();
