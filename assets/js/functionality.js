// Incapsolate all scripts
// namespace

this.SimpleTheme = this.SimpleTheme || {};


(function(){
	SystemCheck = function() {
	}

	proto = SystemCheck.prototype;


	/**
	 * Checks screen pixel density and displays contents accordingly
	 *
	 * @return null
	 */
	proto.isRetinaDevice = function() {
		var isretina = window.devicePixelRatio > 1,
			retinaElements = document.querySelectorAll('.retina'),
			nonretinaElements = document.querySelectorAll('.nonretina');

		if (isretina) {

			for (var i = 0; i < retinaElements.length; i++) {
				retinaElements[i].style.display = 'block';
			}

			for (var i = 0; i < nonretinaElements.length; i++) {
				nonretinaElements[i].style.display = 'none';
			}

		} else {

			for (var i = 0; i < retinaElements.length; i++) {

				retinaElements[i].style.display = 'none';
			}

			for (var i = 0; i < nonretinaElements.length; i++) {
				nonretinaElements[i].style.display = 'block';
			}
		}


		return this;
	}


	proto.isOperaMini = function() {

	}

	/**
	 * Checks for Versions of Internet Explorer
	 *
	 * @method isIE
	 * @param {Number/String} version - If set this method will check for a specific version of IE
	 * @param {function} f[Optional] - A callback function called if a specific version is difined.
	 * @return {Boolean}
	 */
	proto.isIE = function( version, f ) {
		var appName = window.navigator.appName;
		var userAgent = window.navigator.userAgent;
		var regexOld = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
		var regexModern = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");

		if ( version != null  ) {
			isver = getVersion() == version;

			if ( isver && f && typeof f == 'function' ) {
				f();
				return isver;
			} else if ( isver ) {
				return isver;
			} else {
				return false;
			}
		}

		if ( version == null ) {
			if ( appName == 'Microsoft Internet Explorer' ) {
				return regex.test(userAgent);
			} else if (appName == 'Netscape') {
				return regexModern.test(userAgent);
			}
		}




		function getVersion() {
			var ver = null;
			// IE 10 and below
			if ( appName == 'Microsoft Internet Explorer' ) {

				if ( regexOld.test(userAgent) ) {
					ver = parseFloat(regexOld.exec(userAgent)[1])
				}

				return ver;

			} else if (appName == 'Netscape') {

				if ( regexModern.test(userAgent) ) {
					ver = parseFloat(regexModern.exec(userAgent)[1])
				}

				return ver;
			}

			return ver;
		}
	}

	/**
	 * Checks if users browser is a mobile browser
	 *
	 * @method isMobile
	 * @param  {function} f[Optional] - A callback function called if a browser is mobile.
	 * @return {Boolean}
	 */
	proto.isMobile = function( f ) {
		var mobile = function() {
		  var check = false;
		  (function(a,b){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
		  return check;
		}

		var m = mobile();
		// alert(m);

		if (!m) {
			return false;
		}

		if (f && typeof f === 'function') {
			f()
			return this;
		}

		return true;
	}

	/**
	 * Checks if users is using an iphone
	 *
	 * @method isMobile
	 * @param  {function} f[Optional] - A callback function called if a browser is mobile.
	 * @return {Boolean}
	 */
	proto.isiPhone = function( f ) {
		var iPhone = navigator.userAgent.match(/iPhone/i) != null;
		var iPod = navigator.userAgent.match(/iPod/i) != null;

		if ( !iPhone || !iPod) {
			return false;
		}

		if (f && typeof f === 'function') {
			f()
			return this;
		}

		return true;
	}

	/**
	 * Checks if users browser is a ipad browser
	 *
	 * @method isMobile
	 * @param  {function} f[Optional]- A callback function called if a browser is mobile.
	 * @return {Boolean}
	 */
	proto.isiPad = function( f ) {
		var iPad = navigator.userAgent.match(/iPad/i) != null;

		if (!iPad) {
			 return false;
		}

		if (f && typeof f === 'function') {
			f()
			return this;
		}

		return true;
	}

	/*
	 * Checks if current browser is a modern bowser. Returns Browser name & version
	 *
	 * @param {String} retAsObj[Optional] - Dertimes whether a String on an Object is returned.
	 * â€“â€“ Returned Object properties {name, version}.
	 * @retun {String || Object}
	 */
	proto.whichBrowser = function ( retAsObj ) {
		var uAgent = navigator.userAgent;
		var browserName = null;
		var browsers = ['OPR', 'Chrome', 'Firefox'];
		var re = null;

		// Check if Chrome
		if ( inUserAgent( 'Safari' ) && !inUserAgent( 'Chrome' ) ) {
			re = new RegExp("Safari/([0-9]{1,}[\.0-9]{0,})");

			if (!retAsObj) {
				return "Safari | " + re.exec(uAgent)[1];
			} else {
				return { name: "Safari", version: re.exec(uAgent)[1]}
			}

		} else {
			for (var i = 0; i < browsers.length; i++) {
				re = new RegExp( browsers[i] + "/([0-9]{1,}[\.0-9]{0,})");

				if (re.test(uAgent)) {
					if (!retAsObj) {
						return browsers[i] + " | " + re.exec(uAgent)[1];
					} else {
						return { name: browsers[i] , version: re.exec(uAgent)[1]}
					}
				}
			}
		}

		function inUserAgent( s ) {
			return uAgent.indexOf( s ) > -1;
		}

	}

	return SimpleTheme.SystemCheck = SystemCheck;

}())


// C L A S S   Utils
var cutil = (function(){
	var classUtilities = {

		getClass: function( el ) {
			return el.className.split(" ");
		},

		removeClass: function( el, value ) {
			var currentClasses = cutil.getClass( el );
			var classPos,
				firstHalf,
				secondHal,
				proceed = typeof value === "string";

			if (proceed) {
				if (currentClasses.indexOf(value) > -1) {
					classPos = currentClasses.indexOf(value);

					if (classPos === 0) {
						el.className = currentClasses.slice(1).join(" ");
					} else {
						firstHalf = currentClasses.slice(0, classPos);
						secondHalf = currentClasses.slice( classPos + 1);
						el.className = firstHalf.concat(secondHalf).join(" ");
					}
				}
			}

			return el;
		},

		addClass: function( el, value ) {
			var currentClasses = cutil.getClass( el );
			var proceed = typeof value === "string";

			if (proceed) {
				if (currentClasses.indexOf(value) == -1) {
					currentClasses.push(value);
				}

				el.className = currentClasses.join(" ");
			}

			return el;
		},

		hasClass: function( el, value ) {
			var currentClasses = cutil.getClass( el );
			var proceed = typeof value === "string";

			if (proceed) {
				if (currentClasses.indexOf(value) > -1) {
					return true;
				}
			}

			return false;
		}
	}

	return classUtilities;
}());


// G E N E R A L   Utils
var genUtil = (function(){
	"use strict";
	var generalUtilities = {

        // get class default or user's params
        inherit: function( context, newObj ) {
			var obj = {};

			if (typeof newObj != 'object' && !Array.isArray(newObj)) {
				return null;
			}

			for (var prop in context) {
				if (newObj.hasOwnProperty(prop)) {
					obj[prop] = newObj[prop];
				} else {
					obj[prop] = context[prop];
				}
			}

			return obj;
		},

		extends: function( subClass, superClass, root ) {
			var self = this;

			if ( !subClass && !superClass ) return false;

			if ( !root ) {
				if ( window[ superClass ] ) {
					subClass.prototype = Object.create( window[ superClass ].prototype );
					subClass.prototype.contstructor = subClass;
				} else {
					setTimeout( function() { self.extends( subClass, superClass, window ); }, 500 );
				}
			} else {
				if ( root[ superClass ] ) {
					subClass.prototype = Object.create( root[ superClass ].prototype );
					subClass.prototype.contstructor = subClass;
				} else {
					setTimeout( function() { self.extends( subClass, superClass, root ); }, 500 );
				}
			}
		},

		defineConst: function( name, value, opts ) {
			var o, prop, settings;
			var defaults = {
				enumerable: true,
				configurable: true,
				context: window,
			};

			settings = genUtil.inherit( defaults, opts ) || defaults;
			settings.value = value;
			settings.writable = false;

			if ( !typeof settings.context == "object" ) {
				settings.context = window;
			}

			prop = name.toString();

			o = settings.context;

			Object.defineProperty( o, prop, settings );
		},

		stripTags: function( htmlString ) {
			return htmlString.replace(/(<([^>]+)>)/ig, "");
		},

        debounce: function( func, wait ) {
            // we need to save these in the closure
            var timeout;
            var args;
            var context;
            var timestamp;

            return function() {
                // save details of latest call
                context = this;

                args = [].slice.call(arguments, 0);

                // this is where the magic happens
                function later() {
                    // how long ago was the last call
                    var last = (new Date()) - timestamp;

                    // if the latest call was less that the wait period ago
                    // then we reset the timeout to wait for the difference
                    if (last < wait) {
                        timeout = setTimeout(later, wait - last);

                    // or if not we can null out the timer and run the latest
                    } else {
                        timeout = null;
                        func.apply(context, args);
                    }
                }

                // we only need to set the timer now if one isn't already running
                if (!timeout) {
                    timeout = setTimeout(later, wait);
                }
            };

            /*
                // http://modernjavascript.blogspot.com/2013/08/building-better-debounce.html
                * Method call example:

                var debouncedResizing = genUtil.debounce( myFunction, 300 );
                window.addEventListener( "resize", function() {
                    debouncedResizing();
                }, false );
            */
        },

        // Throttle Method
        throttle: function( callback, limit ) {
            var wait = false;                 // Initially, we're not waiting

            return function () {              // We return a throttled function
                if ( !wait ) {                  // If we're not waiting
                    callback.call();          // Execute users function
                    wait = true;              // Prevent future invocations

                    setTimeout( function () {  // After a period of time
                        wait = false;         // And allow future invocations
                    }, limit );
                }
            }

            /*
                * Method call example:

                window.addEventListener( "resize", throttle( myFunc, 100 ), false );
            */
        },

        isTarget: function( e, targetClassOrTagName ) {
            /* Bubbling event target node catcher - returns TRUE (which is reference to the node) or FALSE

                Check / capture target on click event (Event Delegation)
                - neededTargetNodeName should be in capital letters: "A", "P", "LI" etc.
                - eventParentWrapper - container which holds all children which we want to "listen"

                Method call example:
                checkContainerEventTarget( e, (target class name, ex. "menu-btn"), targetParentContainer );
                */
            var target        = e.target;
            var parent        = e.currentTarget;
            var result        = false;
            var classListArr  = [];

            e.stopPropagation();

            // First check if we clicked the needed target from the 1-st attempt
            if ( ( cutil.hasClass( target, targetClassOrTagName ) || target.tagName === targetClassOrTagName ) && target !== parent ) {
                result = target;

            } else {
                while ( target !== parent ) {
                    target = target.parentNode;

                    if ( ( cutil.hasClass( target, targetClassOrTagName ) || target.tagName === targetClassOrTagName ) && target !== parent ) {
                        result = target;
                        break;
                    }
                }
            }

            return result;
        },

        getDocumentScrollTopDistance: function() {
            var scrolledDistance = null;

            scrolledDistance = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
            return scrolledDistance;
        },

        getElemHeight: function( elem ) {
            var computedStyle   = null;
            var topMargin       = 0;
            var bottomMargin    = 0;

            computedStyle = window.getComputedStyle ? getComputedStyle( elem, null ) : elem.currentStyle;
            topMargin     =  parseInt( computedStyle.marginTop )    || 0;
            bottomMargin  =  parseInt( computedStyle.marginBottom ) || 0;

            // offsetHeight includes border and padding
            return elem.offsetHeight + topMargin + bottomMargin;
        },

		getUrlParamValue: function(name, url) {
		    if (!url) url = window.location.href;
		    name = name.replace(/[\[\]]/g, "\\$&");
		    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		        results = regex.exec(url);
		    if (!results) return null;
		    if (!results[2]) return '';

			return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
	};

	return generalUtilities;
}());