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
      end = getTop(el) - 100;
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


function ready(fn) {
  if (document.readyState !== 'loading'){
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

ready(function(){
  function getElementByIdFromNode(id, rootNode) {
  /* Based on http://stackoverflow.com/questions/3902671/getelementbyid-doesnt-work-on-a-node */
    var nodes = [];
    nodes.push(rootNode);
    while ( nodes && nodes.length > 0 ) {
      var children = [];
      for ( var i = 0; i<nodes.length; i++ ) {
        var node = nodes[i];
        if ( node && node['id'] !== undefined ) {
          if ( node.id == id ) {
            return node;
          }
        }

        var childNodes = node.childNodes;
        if ( childNodes && childNodes.length > 0 ) {
          for ( var j = 0 ; j < childNodes.length; j++ ) {
            children.push( childNodes[j] );
          }
        }
      }
      nodes = children;
    }
    return null;
  }

  try{
    hljs.initHighlightingOnLoad();      
  }
  catch(err){/*noop*/}

  if(window.location.hash) {
    smoothScroll(document.getElementById(window.location.hash.substring(1)), 200, function(el){});
  }

  var backToTopLinks = document.querySelectorAll('.back-to-top'), a;

  for(var i = backToTopLinks.length; a = backToTopLinks[--i];){
    a.addEventListener("click", function(ev){
      ev.preventDefault();
      smoothScroll(0, 500);      
    }, false);
  }

  var articleImages = document.querySelectorAll('article img');

  for (var i = 0, j = articleImages.length; i < j; i++){
    articleImages[i].dataset.src = articleImages[i].src;
    articleImages[i].classList.add('lazy-load');    
  }

  var lazyLoadedImages = document.getElementsByClassName('search-text-after-image');
  if (lazyLoadedImages.length){
    lazyLoadedImages.
      classList.remove('search-text-after-image').
      classList.add('search-text');
  }

/*
TODO: Work in progress: AJAXifying the site.
  window.addEventListener('click', function(ev){
    if (ev.target.tagName.toLowerCase() === 'a' && (ev.target.href.indexOf('#') === -1 && (ev.target.href.indexOf('botwiki.org') > -1 || ev.target.href.indexOf('http://localhost') > -1 ))){
      ev.preventDefault();
      var request = new XMLHttpRequest();
      request.open('GET', ev.target.href, true);

      request.onload = function() {

        if (request.status >= 200 && request.status < 400) {
          var el = document.createElement('div');
          el.innerHTML = request.responseText;
          // var elMain = el.getElementById('main');
          var elMain = getElementByIdFromNode('main', el);
          document.getElementById('main').innerHTML = elMain.getElementsByTagName('article')[0].innerHTML;
        } else {
          // TODO: Error handling.
          return false;
        }
      };

      request.onerror = function() {
          // TODO: Error handling.
          console.log(":-(");
      };

      request.send();
      return false;
    }
  });
*/

});


/*
  Lazy Load Images without jQuery
  http://kaizau.github.com/Lazy-Load-Images-without-jQuery/
  Original by Mike Pulaski - http://www.mikepulaski.com
  Modified by Kai Zau - http://kaizau.com
*/
(function() {
  var addEventListener =  window.addEventListener || function(n,f) { window.attachEvent('on'+n, f); },
      removeEventListener = window.removeEventListener || function(n,f,b) { window.detachEvent('on'+n, f); };

  var lazyLoader = {
    cache: [],
    mobileScreenSize: 500,
    //tinyGif: 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',

    addObservers: function() {
      addEventListener('scroll', lazyLoader.throttledLoad);
      addEventListener('resize', lazyLoader.throttledLoad);
    },

    removeObservers: function() {
      removeEventListener('scroll', lazyLoader.throttledLoad, false);
      removeEventListener('resize', lazyLoader.throttledLoad, false);
    },

    throttleTimer: new Date().getTime(),

    throttledLoad: function() {
      var now = new Date().getTime();
      if ((now - lazyLoader.throttleTimer) >= 200) {
        lazyLoader.throttleTimer = now;
        lazyLoader.loadVisibleImages();
      }
    },

    loadVisibleImages: function() {
      var scrollY = window.pageYOffset || document.documentElement.scrollTop;
      var pageHeight = window.innerHeight || document.documentElement.clientHeight;
      var range = {
        min: scrollY - 200,
        max: scrollY + pageHeight + 200
      };

      var i = 0;
      while (i < lazyLoader.cache.length) {
        var image = lazyLoader.cache[i];
        var imagePosition = getOffsetTop(image);
        var imageHeight = image.height || 0;

        if ((imagePosition >= range.min - imageHeight) && (imagePosition <= range.max)) {
          var mobileSrc = image.getAttribute('data-src-mobile');

          // image.onload = function() {
          //   this.className = this.className.replace(/(^|\s+)lazy-load(\s+|$)/, '$1lazy-loaded$2');
          // };
//        Temporary fix for Safari!

          image.className = image.className.replace(/(^|\s+)lazy-load(\s+|$)/, '$1lazy-loaded$2');


          if (mobileSrc && screen.width <= lazyLoader.mobileScreenSize) {
            image.src = mobileSrc;
          }
          else {
            image.src = image.getAttribute('data-src');
          }

          image.removeAttribute('data-src');
          image.removeAttribute('data-src-mobile');

          lazyLoader.cache.splice(i, 1);
          continue;
        }

        i++;
      }

      if (lazyLoader.cache.length === 0) {
        lazyLoader.removeObservers();
      }
    },

    init: function() {
      // Patch IE7- (querySelectorAll)
      if (!document.querySelectorAll) {
        document.querySelectorAll = function(selector) {
          var doc = document,
              head = doc.documentElement.firstChild,
              styleTag = doc.createElement('STYLE');
          head.appendChild(styleTag);
          doc.__qsaels = [];
          styleTag.styleSheet.cssText = selector + "{x:expression(document.__qsaels.push(this))}";
          window.scrollBy(0, 0);
          return doc.__qsaels;
        };
      }

      addEventListener('load', function _lazyLoaderInit() {
        var imageNodes = document.querySelectorAll('img[data-src]');

        for (var i = 0; i < imageNodes.length; i++) {
          var imageNode = imageNodes[i];

          // Add a placeholder if one doesn't exist
          //imageNode.src = imageNode.src || lazyLoader.tinyGif;

          lazyLoader.cache.push(imageNode);
        }

        lazyLoader.addObservers();
        lazyLoader.loadVisibleImages();

        removeEventListener('load', _lazyLoaderInit, false);
      });
    }
  };

  // For IE7 compatibility
  // Adapted from http://www.quirksmode.org/js/findpos.html
  function getOffsetTop(el) {
    var val = 0;
    if (el.offsetParent) {
      do {
        val += el.offsetTop;
      } while (el = el.offsetParent);
      return val;
    }
  }

  lazyLoader.init();
})();