/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/

/* 
* Detect User Agent Script
* This is by far the best detection script I've found. 
* Using javascript means that this will work with caching. W00t.
* 
* Get it here: http://cssuseragent.org
* Adds user agent classes to html element including OS and browser version.
* With support for about every device imaginable so if you want to create
* styles for a symbian browser, do your thang.
*/

var cssua=function(n,l,p){var q=/\s*([\-\w ]+)[\s\/\:]([\d_]+\b(?:[\-\._\/]\w+)*)/,r=/([\w\-\.]+[\s\/][v]?[\d_]+\b(?:[\-\._\/]\w+)*)/g,s=/\b(?:(blackberry\w*|bb10)|(rim tablet os))(?:\/(\d+\.\d+(?:\.\w+)*))?/,t=/\bsilk-accelerated=true\b/,u=/\bfluidapp\b/,v=/(\bwindows\b|\bmacintosh\b|\blinux\b|\bunix\b)/,w=/(\bandroid\b|\bipad\b|\bipod\b|\bwindows phone\b|\bwpdesktop\b|\bxblwp7\b|\bzunewp7\b|\bwindows ce\b|\bblackberry\w*|\bbb10\b|\brim tablet os\b|\bmeego|\bwebos\b|\bpalm|\bsymbian|\bj2me\b|\bdocomo\b|\bpda\b|\bchtml\b|\bmidp\b|\bcldc\b|\w*?mobile\w*?|\w*?phone\w*?)/,
x=/(\bxbox\b|\bplaystation\b|\bnintendo\s+\w+)/,k={parse:function(b,d){var a={};d&&(a.standalone=d);b=(""+b).toLowerCase();if(!b)return a;for(var c,e,g=b.split(/[()]/),f=0,k=g.length;f<k;f++)if(f%2){var m=g[f].split(";");c=0;for(e=m.length;c<e;c++)if(q.exec(m[c])){var h=RegExp.$1.split(" ").join("_"),l=RegExp.$2;if(!a[h]||parseFloat(a[h])<parseFloat(l))a[h]=l}}else if(m=g[f].match(r))for(c=0,e=m.length;c<e;c++)h=m[c].split(/[\/\s]+/),h.length&&"mozilla"!==h[0]&&(a[h[0].split(" ").join("_")]=h.slice(1).join("-"));
w.exec(b)?(a.mobile=RegExp.$1,s.exec(b)&&(delete a[a.mobile],a.blackberry=a.version||RegExp.$3||RegExp.$2||RegExp.$1,RegExp.$1?a.mobile="blackberry":"0.0.1"===a.version&&(a.blackberry="7.1.0.0"))):v.exec(b)?a.desktop=RegExp.$1:x.exec(b)&&(a.game=RegExp.$1,c=a.game.split(" ").join("_"),a.version&&!a[c]&&(a[c]=a.version));a.intel_mac_os_x?(a.mac_os_x=a.intel_mac_os_x.split("_").join("."),delete a.intel_mac_os_x):a.cpu_iphone_os?(a.ios=a.cpu_iphone_os.split("_").join("."),delete a.cpu_iphone_os):a.cpu_os?
(a.ios=a.cpu_os.split("_").join("."),delete a.cpu_os):"iphone"!==a.mobile||a.ios||(a.ios="1");a.opera&&a.version?(a.opera=a.version,delete a.blackberry):t.exec(b)?a.silk_accelerated=!0:u.exec(b)&&(a.fluidapp=a.version);if(a.applewebkit)a.webkit=a.applewebkit,delete a.applewebkit,a.opr&&(a.opera=a.opr,delete a.opr,delete a.chrome),a.safari&&(a.chrome||a.crios||a.opera||a.silk||a.fluidapp||a.phantomjs||a.mobile&&!a.ios?delete a.safari:a.safari=a.version&&!a.rim_tablet_os?a.version:{419:"2.0.4",417:"2.0.3",
416:"2.0.2",412:"2.0",312:"1.3",125:"1.2",85:"1.0"}[parseInt(a.safari,10)]||a.safari);else if(a.msie||a.trident)if(a.opera||(a.ie=a.msie||a.rv),delete a.msie,a.windows_phone_os)a.windows_phone=a.windows_phone_os,delete a.windows_phone_os;else{if("wpdesktop"===a.mobile||"xblwp7"===a.mobile||"zunewp7"===a.mobile)a.mobile="windows desktop",a.windows_phone=9>+a.ie?"7.0":10>+a.ie?"7.5":"8.0",delete a.windows_nt}else if(a.gecko||a.firefox)a.gecko=a.rv;a.rv&&delete a.rv;a.version&&delete a.version;return a},
format:function(b){var d="",a;for(a in b)if(a&&b.hasOwnProperty(a)){var c=a,e=b[a],c=c.split(".").join("-"),g=" ua-"+c;if("string"===typeof e){for(var e=e.split(" ").join("_").split(".").join("-"),f=e.indexOf("-");0<f;)g+=" ua-"+c+"-"+e.substring(0,f),f=e.indexOf("-",f+1);g+=" ua-"+c+"-"+e}d+=g}return d},encode:function(b){var d="",a;for(a in b)a&&b.hasOwnProperty(a)&&(d&&(d+="\x26"),d+=encodeURIComponent(a)+"\x3d"+encodeURIComponent(b[a]));return d}};k.userAgent=k.ua=k.parse(l,p);l=k.format(k.ua)+
" js";n.className=n.className?n.className.replace(/\bno-js\b/g,"")+l:l.substr(1);return k}(document.documentElement,navigator.userAgent,navigator.standalone);


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();

  // $('.user-trigger, .user-menu-item, .user-meta').hover(function(){
  //   $('.user-meta').show();
  // }, function() {
  //   $('.user-meta').delay(1000).fadeOut(200);
  // });

  $(".user-menu-item").mouseenter(function () {
    $('.user-meta').show();
});

$(".user-menu-item").mouseleave(function () {
    $('.user-meta').delay(1000).hide();
});

$('#logo > a > img').on({
    "mouseover" : function() {
          this.src = 'https://s3.amazonaws.com/vizual/images/vizual_promo_logo_sf_hover@2x.png';
        },
        "mouseout" : function() {
          this.src='https://s3.amazonaws.com/vizual/images/vizual_promo_logo_sf@2x.png';
     }
    
  });

//   $('#cat').hover(function()
// {
//      if($('#dog').is(':visible'))
//         $('#dog').fadeOut(750 /* Animation Time */, function()
//      {
//         // animation complete callback
//          $('#cat').fadeIn(750);
//      });
// }, function()
// { 
//      // Mouse Leave callback
// });


}); /* end of as page load scripts */


/*!
 * Retina.js v1.3.0
 *
 * Copyright 2014 Imulus, LLC
 * Released under the MIT license
 *
 * Retina.js is an open source script that makes it easy to serve
 * high-resolution images to devices with retina displays.
 */

(function() {
    var root = (typeof exports === 'undefined' ? window : exports);
    var config = {
        // An option to choose a suffix for 2x images
        retinaImageSuffix : '@2x',

        // Ensure Content-Type is an image before trying to load @2x image
        // https://github.com/imulus/retinajs/pull/45)
        check_mime_type: true,

        // Resize high-resolution images to original image's pixel dimensions
        // https://github.com/imulus/retinajs/issues/8
        force_original_dimensions: true
    };

    function Retina() {}

    root.Retina = Retina;

    Retina.configure = function(options) {
        if (options === null) {
            options = {};
        }

        for (var prop in options) {
            if (options.hasOwnProperty(prop)) {
                config[prop] = options[prop];
            }
        }
    };

    Retina.init = function(context) {
        if (context === null) {
            context = root;
        }

        var existing_onload = context.onload || function(){};

        context.onload = function() {
            var images = document.getElementsByTagName('img'), retinaImages = [], i, image;
            for (i = 0; i < images.length; i += 1) {
                image = images[i];
                if (!!!image.getAttributeNode('data-no-retina')) {
                    retinaImages.push(new RetinaImage(image));
                }
            }
            existing_onload();
        };
    };

    Retina.isRetina = function(){
        var mediaQuery = '(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx)';

        if (root.devicePixelRatio > 1) {
            return true;
        }

        if (root.matchMedia && root.matchMedia(mediaQuery).matches) {
            return true;
        }

        return false;
    };


    var regexMatch = /\.\w+$/;
    function suffixReplace (match) {
        return config.retinaImageSuffix + match;
    }

    function RetinaImagePath(path, at_2x_path) {
        this.path = path || '';
        if (typeof at_2x_path !== 'undefined' && at_2x_path !== null) {
            this.at_2x_path = at_2x_path;
            this.perform_check = false;
        } else {
            if (undefined !== document.createElement) {
                var locationObject = document.createElement('a');
                locationObject.href = this.path;
                locationObject.pathname = locationObject.pathname.replace(regexMatch, suffixReplace);
                this.at_2x_path = locationObject.href;
            } else {
                var parts = this.path.split('?');
                parts[0] = parts[0].replace(regexMatch, suffixReplace);
                this.at_2x_path = parts.join('?');
            }
            this.perform_check = true;
        }
    }

    root.RetinaImagePath = RetinaImagePath;

    RetinaImagePath.confirmed_paths = [];

    RetinaImagePath.prototype.is_external = function() {
        return !!(this.path.match(/^https?\:/i) && !this.path.match('//' + document.domain) );
    };

    RetinaImagePath.prototype.check_2x_variant = function(callback) {
        var http, that = this;
        if (this.is_external() && !this.path.match(/s3.amazonaws.com/i)) {
            return callback(false);
        } else if (!this.perform_check && typeof this.at_2x_path !== 'undefined' && this.at_2x_path !== null) {
            return callback(true);
        } else if (this.at_2x_path in RetinaImagePath.confirmed_paths) {
            return callback(true);
        } else {
            http = new XMLHttpRequest();
            http.open('HEAD', this.at_2x_path);
            http.onreadystatechange = function() {
                if (http.readyState !== 4) {
                    return callback(false);
                }

                if (http.status >= 200 && http.status <= 399) {
                    if (config.check_mime_type) {
                        var type = http.getResponseHeader('Content-Type');
                        if (type === null || !type.match(/^image/i)) {
                            return callback(false);
                        }
                    }

                    RetinaImagePath.confirmed_paths.push(that.at_2x_path);
                    return callback(true);
                } else {
                    return callback(false);
                }
            };
            http.send();
        }
    };


    function RetinaImage(el) {
        this.el = el;
        this.path = new RetinaImagePath(this.el.getAttribute('src'), this.el.getAttribute('data-at2x'));
        var that = this;
        this.path.check_2x_variant(function(hasVariant) {
            if (hasVariant) {
                that.swap();
            }
        });
    }

    root.RetinaImage = RetinaImage;

    RetinaImage.prototype.swap = function(path) {
        if (typeof path === 'undefined') {
            path = this.path.at_2x_path;
        }

        var that = this;
        function load() {
            if (! that.el.complete) {
                setTimeout(load, 5);
            } else {
                if (config.force_original_dimensions) {
                    that.el.setAttribute('width', that.el.offsetWidth);
                    that.el.setAttribute('height', that.el.offsetHeight);
                }

                that.el.setAttribute('src', path);
            }
        }
        load();
    };


    if (Retina.isRetina()) {
        Retina.init(root);
    }
})();

/*! wavesurfer.js 1.0.42
* https://github.com/katspaugh/wavesurfer.js
* @license CC-BY-3.0 */
"use strict";
var WaveSurfer = {
    defaultParams: {
        height: 128,
        waveColor: "#999",
        progressColor: "#555",
        cursorColor: "#333",
        cursorWidth: 1,
        skipLength: 2,
        minPxPerSec: 20,
        pixelRatio: window.devicePixelRatio,
        fillParent: !0,
        scrollParent: !1,
        hideScrollbar: !1,
        normalize: !1,
        audioContext: null,
        container: null,
        dragSelection: !0,
        loopSelection: !0,
        audioRate: 1,
        interact: !0,
        splitChannels: !1,
        renderer: "Canvas",
        backend: "WebAudio",
        mediaType: "audio"
    },
    init: function(a) {
        if (this.params = WaveSurfer.util.extend({}, this.defaultParams, a), this.container = "string" == typeof a.container ? document.querySelector(this.params.container) : this.params.container, !this.container)
            throw new Error("Container element not found");
        if ("undefined" == typeof this.params.mediaContainer ? this.mediaContainer = this.container : "string" == typeof this.params.mediaContainer ? this.mediaContainer = document.querySelector(this.params.mediaContainer) : this.mediaContainer = this.params.mediaContainer, !this.mediaContainer)
            throw new Error("Media Container element not found");
        this.savedVolume = 0, this.isMuted=!1, this.tmpEvents = [], this.createDrawer(), this.createBackend()
    },
    createDrawer: function() {
        var a = this;
        this.drawer = Object.create(WaveSurfer.Drawer[this.params.renderer]), this.drawer.init(this.container, this.params), this.drawer.on("redraw", function() {
            a.drawBuffer(), a.drawer.progress(a.backend.getPlayedPercents())
        }), this.drawer.on("click", function(b, c) {
            setTimeout(function() {
                a.seekTo(c)
            }, 0)
        }), this.drawer.on("scroll", function(b) {
            a.fireEvent("scroll", b)
        })
    },
    createBackend: function() {
        var a = this;
        this.backend && this.backend.destroy(), "AudioElement" == this.params.backend && (this.params.backend = "MediaElement"), "WebAudio" != this.params.backend || WaveSurfer.WebAudio.supportsWebAudio() || (this.params.backend = "MediaElement"), this.backend = Object.create(WaveSurfer[this.params.backend]), this.backend.init(this.params), this.backend.on("finish", function() {
            a.fireEvent("finish")
        }), this.backend.on("play", function() {
            a.fireEvent("play")
        }), this.backend.on("pause", function() {
            a.fireEvent("pause")
        }), this.backend.on("audioprocess", function(b) {
            a.drawer.progress(a.backend.getPlayedPercents()), a.fireEvent("audioprocess", b)
        })
    },
    getDuration: function() {
        return this.backend.getDuration()
    },
    getCurrentTime: function() {
        return this.backend.getCurrentTime()
    },
    play: function(a, b) {
        this.backend.play(a, b)
    },
    pause: function() {
        this.backend.pause()
    },
    playPause: function() {
        this.backend.isPaused() ? this.play() : this.pause()
    },
    isPlaying: function() {
        return !this.backend.isPaused()
    },
    skipBackward: function(a) {
        this.skip( - a||-this.params.skipLength)
    },
    skipForward: function(a) {
        this.skip(a || this.params.skipLength)
    },
    skip: function(a) {
        var b = this.getCurrentTime() || 0, c = this.getDuration() || 1;
        b = Math.max(0, Math.min(c, b + (a || 0))), this.seekAndCenter(b / c)
    },
    seekAndCenter: function(a) {
        this.seekTo(a), this.drawer.recenter(a)
    },
    seekTo: function(a) {
        var b = this.backend.isPaused(), c = this.params.scrollParent;
        b && (this.params.scrollParent=!1), this.backend.seekTo(a * this.getDuration()), this.drawer.progress(this.backend.getPlayedPercents()), b || (this.backend.pause(), this.backend.play()), this.params.scrollParent = c, this.fireEvent("seek", a)
    },
    stop: function() {
        this.pause(), this.seekTo(0), this.drawer.progress(0)
    },
    setVolume: function(a) {
        this.backend.setVolume(a)
    },
    setPlaybackRate: function(a) {
        this.backend.setPlaybackRate(a)
    },
    toggleMute: function() {
        this.isMuted ? (this.backend.setVolume(this.savedVolume), this.isMuted=!1) : (this.savedVolume = this.backend.getVolume(), this.backend.setVolume(0), this.isMuted=!0)
    },
    toggleScroll: function() {
        this.params.scrollParent=!this.params.scrollParent, this.drawBuffer()
    },
    toggleInteraction: function() {
        this.params.interact=!this.params.interact
    },
    drawBuffer: function() {
        var a = Math.round(this.getDuration() * this.params.minPxPerSec * this.params.pixelRatio), b = this.drawer.getWidth(), c = a;
        this.params.fillParent && (!this.params.scrollParent || b > a) && (c = b);
        var d = this.backend.getPeaks(c);
        this.drawer.drawPeaks(d, c), this.fireEvent("redraw", d, c)
    },
    zoom: function(a) {
        this.params.minPxPerSec = a, this.params.scrollParent=!0, this.drawBuffer(), this.seekAndCenter(this.getCurrentTime() / this.getDuration())
    },
    loadArrayBuffer: function(a) {
        this.decodeArrayBuffer(a, function(a) {
            this.loadDecodedBuffer(a)
        }.bind(this))
    },
    loadDecodedBuffer: function(a) {
        this.backend.load(a), this.drawBuffer(), this.fireEvent("ready")
    },
    loadBlob: function(a) {
        var b = this, c = new FileReader;
        c.addEventListener("progress", function(a) {
            b.onProgress(a)
        }), c.addEventListener("load", function(a) {
            b.loadArrayBuffer(a.target.result)
        }), c.addEventListener("error", function() {
            b.fireEvent("error", "Error reading file")
        }), c.readAsArrayBuffer(a), this.empty()
    },
    load: function(a, b) {
        switch (this.params.backend) {
        case"WebAudio":
            return this.loadBuffer(a);
        case"MediaElement":
            return this.loadMediaElement(a, b)
        }
    },
    loadBuffer: function(a) {
        return this.empty(), this.getArrayBuffer(a, this.loadArrayBuffer.bind(this))
    },
    loadMediaElement: function(a, b) {
        this.empty(), this.backend.load(a, this.mediaContainer, b), this.tmpEvents.push(this.backend.once("canplay", function() {
            this.drawBuffer(), this.fireEvent("ready")
        }.bind(this)), this.backend.once("error", function(a) {
            this.fireEvent("error", a)
        }.bind(this))), !b && this.backend.supportsWebAudio() && this.getArrayBuffer(a, function(a) {
            this.decodeArrayBuffer(a, function(a) {
                this.backend.buffer = a, this.drawBuffer()
            }.bind(this))
        }.bind(this))
    },
    decodeArrayBuffer: function(a, b) {
        this.backend.decodeArrayBuffer(a, this.fireEvent.bind(this, "decoded"), this.fireEvent.bind(this, "error", "Error decoding audiobuffer")), this.tmpEvents.push(this.once("decoded", b))
    },
    getArrayBuffer: function(a, b) {
        var c = this, d = WaveSurfer.util.ajax({
            url: a,
            responseType: "arraybuffer"
        });
        return this.tmpEvents.push(d.on("progress", function(a) {
            c.onProgress(a)
        }), d.on("success", b), d.on("error", function(a) {
            c.fireEvent("error", "XHR error: " + a.target.statusText)
        })), d
    },
    onProgress: function(a) {
        if (a.lengthComputable)
            var b = a.loaded / a.total;
        else 
            b = a.loaded / (a.loaded + 1e6);
        this.fireEvent("loading", Math.round(100 * b), a.target)
    },
    exportPCM: function(a, b, c) {
        a = a || 1024, b = b || 1e4, c = c ||!1;
        var d = this.backend.getPeaks(a, b), e = [].map.call(d, function(a) {
            return Math.round(a * b) / b
        }), f = JSON.stringify(e);
        return c || window.open("data:application/json;charset=utf-8," + encodeURIComponent(f)), f
    },
    clearTmpEvents: function() {
        this.tmpEvents.forEach(function(a) {
            a.un()
        })
    },
    empty: function() {
        this.backend.isPaused() || (this.stop(), this.backend.disconnectSource()), this.clearTmpEvents(), this.drawer.progress(0), this.drawer.setWidth(0), this.drawer.drawPeaks({
            length: this.drawer.getWidth()
        }, 0)
    },
    destroy: function() {
        this.fireEvent("destroy"), this.clearTmpEvents(), this.unAll(), this.backend.destroy(), this.drawer.destroy()
    }
};
WaveSurfer.create = function(a) {
    var b = Object.create(WaveSurfer);
    return b.init(a), b
}, WaveSurfer.util = {
    extend: function(a) {
        var b = Array.prototype.slice.call(arguments, 1);
        return b.forEach(function(b) {
            Object.keys(b).forEach(function(c) {
                a[c] = b[c]
            })
        }), a
    },
    getId: function() {
        return "wavesurfer_" + Math.random().toString(32).substring(2)
    },
    ajax: function(a) {
        var b = Object.create(WaveSurfer.Observer), c = new XMLHttpRequest, d=!1;
        return c.open(a.method || "GET", a.url, !0), c.responseType = a.responseType || "json", c.addEventListener("progress", function(a) {
            b.fireEvent("progress", a), a.lengthComputable && a.loaded == a.total && (d=!0)
        }), c.addEventListener("load", function(a) {
            d || b.fireEvent("progress", a), b.fireEvent("load", a), 200 == c.status || 206 == c.status ? b.fireEvent("success", c.response, a) : b.fireEvent("error", a)
        }), c.addEventListener("error", function(a) {
            b.fireEvent("error", a)
        }), c.send(), b.xhr = c, b
    }
}, WaveSurfer.Observer = {
    on: function(a, b) {
        this.handlers || (this.handlers = {});
        var c = this.handlers[a];
        return c || (c = this.handlers[a] = []), c.push(b), {
            name: a,
            callback: b,
            un: this.un.bind(this, a, b)
        }
    },
    un: function(a, b) {
        if (this.handlers) {
            var c = this.handlers[a];
            if (c)
                if (b)
                    for (var d = c.length - 1; d >= 0; d--)
                        c[d] == b && c.splice(d, 1);
                else 
                    c.length = 0
        }
    },
    unAll: function() {
        this.handlers = null
    },
    once: function(a, b) {
        var c = this, d = function() {
            b.apply(this, arguments), setTimeout(function() {
                c.un(a, d)
            }, 0)
        };
        return this.on(a, d)
    },
    fireEvent: function(a) {
        if (this.handlers) {
            var b = this.handlers[a], c = Array.prototype.slice.call(arguments, 1);
            b && b.forEach(function(a) {
                a.apply(null, c)
            })
        }
    }
}, WaveSurfer.util.extend(WaveSurfer, WaveSurfer.Observer), WaveSurfer.WebAudio = {
    scriptBufferSize: 256,
    PLAYING_STATE: 0,
    PAUSED_STATE: 1,
    FINISHED_STATE: 2,
    supportsWebAudio: function() {
        return !(!window.AudioContext&&!window.webkitAudioContext)
    },
    getAudioContext: function() {
        return WaveSurfer.WebAudio.audioContext || (WaveSurfer.WebAudio.audioContext = new (window.AudioContext || window.webkitAudioContext)), WaveSurfer.WebAudio.audioContext
    },
    getOfflineAudioContext: function(a) {
        return WaveSurfer.WebAudio.offlineAudioContext || (WaveSurfer.WebAudio.offlineAudioContext = new (window.OfflineAudioContext || window.webkitOfflineAudioContext)(1, 2, a)), WaveSurfer.WebAudio.offlineAudioContext
    },
    init: function(a) {
        this.params = a, this.ac = a.audioContext || this.getAudioContext(), this.lastPlay = this.ac.currentTime, this.startPosition = 0, this.scheduledPause = null, this.states = [Object.create(WaveSurfer.WebAudio.state.playing), Object.create(WaveSurfer.WebAudio.state.paused), Object.create(WaveSurfer.WebAudio.state.finished)], this.createVolumeNode(), this.createScriptNode(), this.createAnalyserNode(), this.setState(this.PAUSED_STATE), this.setPlaybackRate(this.params.audioRate)
    },
    disconnectFilters: function() {
        this.filters && (this.filters.forEach(function(a) {
            a && a.disconnect()
        }), this.filters = null, this.analyser.connect(this.gainNode))
    },
    setState: function(a) {
        this.state !== this.states[a] && (this.state = this.states[a], this.state.init.call(this))
    },
    setFilter: function() {
        this.setFilters([].slice.call(arguments))
    },
    setFilters: function(a) {
        this.disconnectFilters(), a && a.length && (this.filters = a, this.analyser.disconnect(), a.reduce(function(a, b) {
            return a.connect(b), b
        }, this.analyser).connect(this.gainNode))
    },
    createScriptNode: function() {
        this.ac.createScriptProcessor ? this.scriptNode = this.ac.createScriptProcessor(this.scriptBufferSize) : this.scriptNode = this.ac.createJavaScriptNode(this.scriptBufferSize), this.scriptNode.connect(this.ac.destination)
    },
    addOnAudioProcess: function() {
        var a = this;
        this.scriptNode.onaudioprocess = function() {
            var b = a.getCurrentTime();
            b >= a.getDuration() ? (a.setState(a.FINISHED_STATE), a.fireEvent("pause")) : b >= a.scheduledPause ? (a.setState(a.PAUSED_STATE), a.fireEvent("pause")) : a.state === a.states[a.PLAYING_STATE] && a.fireEvent("audioprocess", b)
        }
    },
    removeOnAudioProcess: function() {
        this.scriptNode.onaudioprocess = null
    },
    createAnalyserNode: function() {
        this.analyser = this.ac.createAnalyser(), this.analyser.connect(this.gainNode)
    },
    createVolumeNode: function() {
        this.ac.createGain ? this.gainNode = this.ac.createGain() : this.gainNode = this.ac.createGainNode(), this.gainNode.connect(this.ac.destination)
    },
    setVolume: function(a) {
        this.gainNode.gain.value = a
    },
    getVolume: function() {
        return this.gainNode.gain.value
    },
    decodeArrayBuffer: function(a, b, c) {
        this.offlineAc || (this.offlineAc = this.getOfflineAudioContext(this.ac ? this.ac.sampleRate : 44100)), this.offlineAc.decodeAudioData(a, function(a) {
            b(a)
        }.bind(this), c)
    },
    getPeaks: function(a) {
        for (var b = this.buffer.length / a, c=~~(b / 10) || 1, d = this.buffer.numberOfChannels, e = [], f = [], g = 0; d > g; g++)
            for (var h = e[g] = [], i = this.buffer.getChannelData(g), j = 0; a > j; j++) {
                for (var k=~~(j * b), l=~~(k + b), m = i[0], n = i[0], o = k; l > o; o += c) {
                    var p = i[o];
                    p > n && (n = p), m > p && (m = p)
                }
                h[2 * j] = n, h[2 * j + 1] = m, (0 == g || n > f[2 * j]) && (f[2 * j] = n), (0 == g || m < f[2 * j + 1]) && (f[2 * j + 1] = m)
            }
        return this.params.splitChannels ? e : f
    },
    getPlayedPercents: function() {
        return this.state.getPlayedPercents.call(this)
    },
    disconnectSource: function() {
        this.source && this.source.disconnect()
    },
    destroy: function() {
        this.isPaused() || this.pause(), this.unAll(), this.buffer = null, this.disconnectFilters(), this.disconnectSource(), this.gainNode.disconnect(), this.scriptNode.disconnect(), this.analyser.disconnect()
    },
    load: function(a) {
        this.startPosition = 0, this.lastPlay = this.ac.currentTime, this.buffer = a, this.createSource()
    },
    createSource: function() {
        this.disconnectSource(), this.source = this.ac.createBufferSource(), this.source.start = this.source.start || this.source.noteGrainOn, this.source.stop = this.source.stop || this.source.noteOff, this.source.playbackRate.value = this.playbackRate, this.source.buffer = this.buffer, this.source.connect(this.analyser)
    },
    isPaused: function() {
        return this.state !== this.states[this.PLAYING_STATE]
    },
    getDuration: function() {
        return this.buffer ? this.buffer.duration : 0
    },
    seekTo: function(a, b) {
        return this.scheduledPause = null, null == a && (a = this.getCurrentTime(), a >= this.getDuration() && (a = 0)), null == b && (b = this.getDuration()), this.startPosition = a, this.lastPlay = this.ac.currentTime, this.state === this.states[this.FINISHED_STATE] && this.setState(this.PAUSED_STATE), {
            start: a,
            end: b
        }
    },
    getPlayedTime: function() {
        return (this.ac.currentTime - this.lastPlay) * this.playbackRate
    },
    play: function(a, b) {
        this.createSource();
        var c = this.seekTo(a, b);
        a = c.start, b = c.end, this.scheduledPause = b, this.source.start(0, a, b - a), this.setState(this.PLAYING_STATE), this.fireEvent("play")
    },
    pause: function() {
        this.scheduledPause = null, this.startPosition += this.getPlayedTime(), this.source && this.source.stop(0), this.setState(this.PAUSED_STATE), this.fireEvent("pause")
    },
    getCurrentTime: function() {
        return this.state.getCurrentTime.call(this)
    },
    setPlaybackRate: function(a) {
        a = a || 1, this.isPaused() ? this.playbackRate = a : (this.pause(), this.playbackRate = a, this.play())
    }
}, WaveSurfer.WebAudio.state = {}, WaveSurfer.WebAudio.state.playing = {
    init: function() {
        this.addOnAudioProcess()
    },
    getPlayedPercents: function() {
        var a = this.getDuration();
        return this.getCurrentTime() / a || 0
    },
    getCurrentTime: function() {
        return this.startPosition + this.getPlayedTime()
    }
}, WaveSurfer.WebAudio.state.paused = {
    init: function() {
        this.removeOnAudioProcess()
    },
    getPlayedPercents: function() {
        var a = this.getDuration();
        return this.getCurrentTime() / a || 0
    },
    getCurrentTime: function() {
        return this.startPosition
    }
}, WaveSurfer.WebAudio.state.finished = {
    init: function() {
        this.removeOnAudioProcess(), this.fireEvent("finish")
    },
    getPlayedPercents: function() {
        return 1
    },
    getCurrentTime: function() {
        return this.getDuration()
    }
}, WaveSurfer.util.extend(WaveSurfer.WebAudio, WaveSurfer.Observer), WaveSurfer.MediaElement = Object.create(WaveSurfer.WebAudio), WaveSurfer.util.extend(WaveSurfer.MediaElement, {
    init: function(a) {
        this.params = a, this.media = {
            currentTime: 0,
            duration: 0,
            paused: !0,
            playbackRate: 1,
            play: function() {},
            pause: function() {}
        }, this.mediaType = a.mediaType.toLowerCase(), this.elementPosition = a.elementPosition
    },
    load: function(a, b, c) {
        var d = this, e = document.createElement(this.mediaType);
        e.controls=!1, e.autoplay=!1, e.preload = "auto", e.src = a, e.addEventListener("error", function() {
            d.fireEvent("error", "Error loading media element")
        }), e.addEventListener("canplay", function() {
            d.fireEvent("canplay")
        }), e.addEventListener("ended", function() {
            d.fireEvent("finish")
        }), e.addEventListener("timeupdate", function() {
            d.fireEvent("audioprocess", d.getCurrentTime())
        });
        var f = b.querySelector(this.mediaType);
        f && b.removeChild(f), b.appendChild(e), this.media = e, this.peaks = c, this.onPlayEnd = null, this.buffer = null, this.setPlaybackRate(this.playbackRate)
    },
    isPaused: function() {
        return !this.media || this.media.paused
    },
    getDuration: function() {
        var a = this.media.duration;
        return a >= 1 / 0 && (a = this.media.seekable.end()), a
    },
    getCurrentTime: function() {
        return this.media && this.media.currentTime
    },
    getPlayedPercents: function() {
        return this.getCurrentTime() / this.getDuration() || 0
    },
    setPlaybackRate: function(a) {
        this.playbackRate = a || 1, this.media.playbackRate = this.playbackRate
    },
    seekTo: function(a) {
        null != a && (this.media.currentTime = a), this.clearPlayEnd()
    },
    play: function(a, b) {
        this.seekTo(a), this.media.play(), b && this.setPlayEnd(b), this.fireEvent("play")
    },
    pause: function() {
        this.media && this.media.pause(), this.clearPlayEnd(), this.fireEvent("pause")
    },
    setPlayEnd: function(a) {
        var b = this;
        this.onPlayEnd = function(c) {
            c >= a && (b.pause(), b.seekTo(a))
        }, this.on("audioprocess", this.onPlayEnd)
    },
    clearPlayEnd: function() {
        this.onPlayEnd && (this.un("audioprocess", this.onPlayEnd), this.onPlayEnd = null)
    },
    getPeaks: function(a) {
        return this.buffer ? WaveSurfer.WebAudio.getPeaks.call(this, a) : this.peaks || []
    },
    getVolume: function() {
        return this.media.volume
    },
    setVolume: function(a) {
        this.media.volume = a
    },
    destroy: function() {
        this.pause(), this.unAll(), this.media && this.media.parentNode && this.media.parentNode.removeChild(this.media), this.media = null
    }
}), WaveSurfer.AudioElement = WaveSurfer.MediaElement, WaveSurfer.Drawer = {
    init: function(a, b) {
        this.container = a, this.params = b, this.width = 0, this.height = b.height * this.params.pixelRatio, this.lastPos = 0, this.createWrapper(), this.createElements()
    },
    createWrapper: function() {
        this.wrapper = this.container.appendChild(document.createElement("wave")), this.style(this.wrapper, {
            display: "block",
            position: "relative",
            userSelect: "none",
            webkitUserSelect: "none",
            height: this.params.height + "px"
        }), (this.params.fillParent || this.params.scrollParent) && this.style(this.wrapper, {
            width: "100%",
            overflowX: this.params.hideScrollbar ? "hidden": "auto",
            overflowY: "hidden"
        }), this.setupWrapperEvents()
    },
    handleEvent: function(a) {
        a.preventDefault();
        var b = this.wrapper.getBoundingClientRect();
        return (a.clientX - b.left + this.wrapper.scrollLeft) / this.wrapper.scrollWidth || 0
    },
    setupWrapperEvents: function() {
        var a = this;
        this.wrapper.addEventListener("click", function(b) {
            var c = a.wrapper.offsetHeight - a.wrapper.clientHeight;
            if (0 != c) {
                var d = a.wrapper.getBoundingClientRect();
                if (b.clientY >= d.bottom - c)
                    return 
            }
            a.params.interact && a.fireEvent("click", b, a.handleEvent(b))
        }), this.wrapper.addEventListener("scroll", function(b) {
            a.fireEvent("scroll", b)
        })
    },
    drawPeaks: function(a, b) {
        this.resetScroll(), this.setWidth(b), this.params.barWidth ? this.drawBars(a) : this.drawWave(a)
    },
    style: function(a, b) {
        return Object.keys(b).forEach(function(c) {
            a.style[c] !== b[c] && (a.style[c] = b[c])
        }), a
    },
    resetScroll: function() {
        null !== this.wrapper && (this.wrapper.scrollLeft = 0)
    },
    recenter: function(a) {
        var b = this.wrapper.scrollWidth * a;
        this.recenterOnPosition(b, !0)
    },
    recenterOnPosition: function(a, b) {
        var c = this.wrapper.scrollLeft, d=~~(this.wrapper.clientWidth / 2), e = a - d, f = e - c, g = this.wrapper.scrollWidth - this.wrapper.clientWidth;
        if (0 != g) {
            if (!b && f>=-d && d > f) {
                var h = 5;
                f = Math.max( - h, Math.min(h, f)), e = c + f
            }
            e = Math.max(0, Math.min(g, e)), e != c && (this.wrapper.scrollLeft = e)
        }
    },
    getWidth: function() {
        return Math.round(this.container.clientWidth * this.params.pixelRatio)
    },
    setWidth: function(a) {
        a != this.width && (this.width = a, this.params.fillParent || this.params.scrollParent ? this.style(this.wrapper, {
            width: ""
        }) : this.style(this.wrapper, {
            width: ~~(this.width / this.params.pixelRatio) + "px"
        }), this.updateSize())
    },
    setHeight: function(a) {
        a != this.height && (this.height = a, this.style(this.wrapper, {
            height: ~~(this.height / this.params.pixelRatio) + "px"
        }), this.updateSize())
    },
    progress: function(a) {
        var b = 1 / this.params.pixelRatio, c = Math.round(a * this.width) * b;
        if (c < this.lastPos || c - this.lastPos >= b) {
            if (this.lastPos = c, this.params.scrollParent) {
                var d=~~(this.wrapper.scrollWidth * a);
                this.recenterOnPosition(d)
            }
            this.updateProgress(a)
        }
    },
    destroy: function() {
        this.unAll(), this.wrapper && (this.container.removeChild(this.wrapper), this.wrapper = null)
    },
    createElements: function() {},
    updateSize: function() {},
    drawWave: function(a, b) {},
    clearWave: function() {},
    updateProgress: function(a) {}
}, WaveSurfer.util.extend(WaveSurfer.Drawer, WaveSurfer.Observer), WaveSurfer.Drawer.Canvas = Object.create(WaveSurfer.Drawer), WaveSurfer.util.extend(WaveSurfer.Drawer.Canvas, {
    createElements: function() {
        var a = this.wrapper.appendChild(this.style(document.createElement("canvas"), {
            position: "absolute",
            zIndex: 1,
            left: 0,
            top: 0,
            bottom: 0
        }));
        if (this.waveCc = a.getContext("2d"), this.progressWave = this.wrapper.appendChild(this.style(document.createElement("wave"), {
            position: "absolute",
            zIndex: 2,
            left: 0,
            top: 0,
            bottom: 0,
            overflow: "hidden",
            width: "0",
            display: "none",
            boxSizing: "border-box",
            borderRightStyle: "solid",
            borderRightWidth: this.params.cursorWidth + "px",
            borderRightColor: this.params.cursorColor
        })), this.params.waveColor != this.params.progressColor) {
            var b = this.progressWave.appendChild(document.createElement("canvas"));
            this.progressCc = b.getContext("2d")
        }
    },
    updateSize: function() {
        var a = Math.round(this.width / this.params.pixelRatio);
        this.waveCc.canvas.width = this.width, this.waveCc.canvas.height = this.height, this.style(this.waveCc.canvas, {
            width: a + "px"
        }), this.style(this.progressWave, {
            display: "block"
        }), this.progressCc && (this.progressCc.canvas.width = this.width, this.progressCc.canvas.height = this.height, this.style(this.progressCc.canvas, {
            width: a + "px"
        })), this.clearWave()
    },
    clearWave: function() {
        this.waveCc.clearRect(0, 0, this.width, this.height), this.progressCc && this.progressCc.clearRect(0, 0, this.width, this.height)
    },
    drawBars: function(a, b) {
        if (a[0]instanceof Array) {
            var c = a;
            if (this.params.splitChannels)
                return this.setHeight(c.length * this.params.height * this.params.pixelRatio), void c.forEach(this.drawBars, this);
            a = c[0]
        }
        var d = .5 / this.params.pixelRatio, e = this.width, f = this.params.height * this.params.pixelRatio, g = f * b || 0, h = f / 2, i=~~(a.length / 2), j = this.params.barWidth * this.params.pixelRatio, k = Math.max(this.params.pixelRatio, ~~(j / 2)), l = j + k, m = 1;
        if (this.params.normalize) {
            var n, o;
            o = Math.max.apply(Math, a), n = Math.min.apply(Math, a), m = o, - n > m && (m =- n)
        }
        var p = i / e;
        this.waveCc.fillStyle = this.params.waveColor, this.progressCc && (this.progressCc.fillStyle = this.params.progressColor), [this.waveCc, this.progressCc].forEach(function(b) {
            if (b)
                if (this.params.reflection)
                    for (var c = 0; e > c; c += l) {
                        var f = Math.round(a[2 * c * p] / m * h);
                        b.fillRect(c + d, h - f + g, j + d, 2 * f)
                    } else {
                        for (var c = 0; e > c; c += l) {
                            var f = Math.round(a[2 * c * p] / m * h);
                            b.fillRect(c + d, h - f + g, j + d, f)
                        }
                        for (var c = 0; e > c; c += l) {
                            var f = Math.round(a[2 * c * p + 1] / m * h);
                            b.fillRect(c + d, h - f + g, j + d, f)
                        }
                    }
                }, this)
    },
    drawWave: function(a, b) {
        if (a[0]instanceof Array) {
            var c = a;
            if (this.params.splitChannels)
                return this.setHeight(c.length * this.params.height * this.params.pixelRatio), void c.forEach(this.drawWave, this);
            a = c[0]
        }
        var d = .5 / this.params.pixelRatio, e = this.params.height * this.params.pixelRatio, f = e * b || 0, g = e / 2, h=~~(a.length / 2), i = 1;
        this.params.fillParent && this.width != h && (i = this.width / h);
        var j = 1;
        if (this.params.normalize) {
            var k, l;
            l = Math.max.apply(Math, a), k = Math.min.apply(Math, a), j = l, - k > j && (j =- k)
        }
        this.waveCc.fillStyle = this.params.waveColor, this.progressCc && (this.progressCc.fillStyle = this.params.progressColor), [this.waveCc, this.progressCc].forEach(function(b) {
            if (b) {
                b.beginPath(), b.moveTo(d, g + f);
                for (var c = 0; h > c; c++) {
                    var e = Math.round(a[2 * c] / j * g);
                    b.lineTo(c * i + d, g - e + f)
                }
                for (var c = h - 1; c >= 0; c--) {
                    var e = Math.round(a[2 * c + 1] / j * g);
                    b.lineTo(c * i + d, g - e + f)
                }
                b.closePath(), b.fill(), b.fillRect(0, g + f - d, this.width, d)
            }
        }, this)
    },
    updateProgress: function(a) {
        var b = Math.round(this.width * a) / this.params.pixelRatio;
        this.style(this.progressWave, {
            width: b + "px"
        })
    }
});

/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-backgroundsize-borderimage-flexbox-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-applicationcache-hashchange-history-audio-video-input-inputtypes-localstorage-websockets-geolocation-svg-svgclippaths-touch-webgl-shiv-mq-cssclasses-addtest-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-css_mediaqueries-css_regions-css_supports-load
 */
;window.Modernizr=function(a,b,c){function D(a){j.cssText=a}function E(a,b){return D(n.join(a+";")+(b||""))}function F(a,b){return typeof a===b}function G(a,b){return!!~(""+a).indexOf(b)}function H(a,b){for(var d in a){var e=a[d];if(!G(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function I(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:F(f,"function")?f.bind(d||b):f}return!1}function J(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return F(b,"string")||F(b,"undefined")?H(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),I(e,b,c))}function K(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)u[c[d]]=c[d]in k;return u.list&&(u.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),u}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),t[a[d]]=!!e;return t}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={svg:"http://www.w3.org/2000/svg"},s={},t={},u={},v=[],w=v.slice,x,y=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},z=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b).matches;var d;return y("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},A=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=F(e[d],"function"),F(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),B={}.hasOwnProperty,C;!F(B,"undefined")&&!F(B.call,"undefined")?C=function(a,b){return B.call(a,b)}:C=function(a,b){return b in a&&F(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=w.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(w.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(w.call(arguments)))};return e}),s.flexbox=function(){return J("flexWrap")},s.webgl=function(){return!!a.WebGLRenderingContext},s.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:y(["@media (",n.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},s.geolocation=function(){return"geolocation"in navigator},s.hashchange=function(){return A("hashchange",a)&&(b.documentMode===c||b.documentMode>7)},s.history=function(){return!!a.history&&!!history.pushState},s.websockets=function(){return"WebSocket"in a||"MozWebSocket"in a},s.rgba=function(){return D("background-color:rgba(150,255,150,.5)"),G(j.backgroundColor,"rgba")},s.hsla=function(){return D("background-color:hsla(120,40%,100%,.5)"),G(j.backgroundColor,"rgba")||G(j.backgroundColor,"hsla")},s.multiplebgs=function(){return D("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},s.backgroundsize=function(){return J("backgroundSize")},s.borderimage=function(){return J("borderImage")},s.textshadow=function(){return b.createElement("div").style.textShadow===""},s.opacity=function(){return E("opacity:.55"),/^0.55$/.test(j.opacity)},s.cssanimations=function(){return J("animationName")},s.csscolumns=function(){return J("columnCount")},s.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return D((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),G(j.backgroundImage,"gradient")},s.cssreflections=function(){return J("boxReflect")},s.csstransforms=function(){return!!J("transform")},s.csstransforms3d=function(){var a=!!J("perspective");return a&&"webkitPerspective"in g.style&&y("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},s.csstransitions=function(){return J("transition")},s.fontface=function(){var a;return y('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},s.generatedcontent=function(){var a;return y(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a},s.video=function(){var a=b.createElement("video"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),c.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(d){}return c},s.audio=function(){var a=b.createElement("audio"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),c.mp3=a.canPlayType("audio/mpeg;").replace(/^no$/,""),c.wav=a.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),c.m4a=(a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")).replace(/^no$/,"")}catch(d){}return c},s.localstorage=function(){try{return localStorage.setItem(h,h),localStorage.removeItem(h),!0}catch(a){return!1}},s.applicationcache=function(){return!!a.applicationCache},s.svg=function(){return!!b.createElementNS&&!!b.createElementNS(r.svg,"svg").createSVGRect},s.svgclippaths=function(){return!!b.createElementNS&&/SVGClipPath/.test(m.call(b.createElementNS(r.svg,"clipPath")))};for(var L in s)C(s,L)&&(x=L.toLowerCase(),e[x]=s[L](),v.push((e[x]?"":"no-")+x));return e.input||K(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)C(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},D(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.mq=z,e.hasEvent=A,e.testProp=function(a){return H([a])},e.testAllProps=J,e.testStyles=y,e.prefixed=function(a,b,c){return b?J(a,b,c):J(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+v.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))},Modernizr.addTest("mediaqueries",Modernizr.mq("only all")),Modernizr.addTest("regions",function(){var a=Modernizr.prefixed("flowFrom"),b=Modernizr.prefixed("flowInto");if(!a||!b)return!1;var c=document.createElement("div"),d=document.createElement("div"),e=document.createElement("div"),f="modernizr_flow_for_regions_check";d.innerText="M",c.style.cssText="top: 150px; left: 150px; padding: 0px;",e.style.cssText="width: 50px; height: 50px; padding: 42px;",e.style[a]=f,c.appendChild(d),c.appendChild(e),document.documentElement.appendChild(c);var g,h,i=d.getBoundingClientRect();return d.style[b]=f,g=d.getBoundingClientRect(),h=g.left-i.left,document.documentElement.removeChild(c),d=e=c=undefined,h==42}),Modernizr.addTest("supports","CSSSupportsRule"in window);