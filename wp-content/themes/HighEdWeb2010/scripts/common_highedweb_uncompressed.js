/**
 * @fileoverview Methods and functions added to ALL templates (html4 and html5)
 * @author Chad Killingsworth (Missouri State University)
 */

if (!document.getElementsByClassName) {
    /**
    * @param {string} names
    * @this {Document}
    * @return {!NodeList}
    */
    document.getElementsByClassName = function (names) {
        var tag = "*", elm = document;
        var classes = names.split(" "),
			classesToCheck = [],
			elements = document.getElementsByTagName("*"),
			current,
			match;
        /** @type {Array.<Element>} */
        var returnElements = [];
        for (var k = 0, kl = classes.length; k < kl; k++) {
            classesToCheck.push(new RegExp("(^|\\s)" + classes[k] + "(\\s|$)"));
        }
        for (var l = 0, ll = elements.length; l < ll; l++) {
            current = elements[l];
            match = false;
            for (var m = 0, ml = classesToCheck.length; m < ml; m += 1) {
                match = classesToCheck[m].test(current.className);
                if (!match) {
                    break;
                }
            }
            if (match) {
                returnElements.push(current);
            }
        }
        return /** @type {!NodeList} */(returnElements);
    };
}
window["highedweb"] = window["highedweb"] || {};
/**
* Cross browser method of attaching an event to an HTML node.
* @param {(Window|Document|Node)} node - target of the event
* @param {string} eventName - Name of the event (not including the "on" prefix"
* @param {function(Object=)} eventHandler - function to process the event.
* example: highedweb.addEvent(document.getElementById('myImage'), 'mouseover', function() {alert("mouseover")});
*/
function addEvent(node, eventName, eventHandler) {
    node.addEventListener ? node.addEventListener(eventName, eventHandler, false) : node.attachEvent("on" + eventName, function () { eventHandler.call(window.event.srcElement, window.event); });
}
window["highedweb"]["addEvent"] = addEvent;

var documentLoaded = false;
/** @type {Array.<function(Object=)>} */
var onLoadEvents = [];
var boxModelSupported = false;
var DOMContentLoaded = function () {
    if (documentLoaded)
        return;
    documentLoaded = true;

    for (var i = 0; i < onLoadEvents.length; i++)
        onLoadEvents[i]();
}
// Mozilla, Opera and webkit nightlies currently support this event
ContentLoaded(window, DOMContentLoaded);

/**
* Execute the provided event when the document is ready to be accessed.
* Does not wait on all images, etc to execute.
* @param {function()} eventHandler
*/
function addLoadEvent(eventHandler) {
    if (documentLoaded)
        eventHandler();
    else
        onLoadEvents.push(eventHandler);
};
window["highedweb"]["addLoadEvent"] = addLoadEvent;


/**
 * @constructor
 * @param {Element} script
 * @param {boolean} loaded
 */
function ScriptInfo(script, loaded) {
    this.script = script;
    this.loaded = loaded;
}

/** @type {boolean} */
ScriptInfo.prototype.loaded = false;

/** @type {Element} */
ScriptInfo.prototype.script = null;


/** @type {Object.<string, ScriptInfo>} */
var ScriptLoadCache = {};

/**
 * @param {Node} script
 * @param {function(this:Node)=} callback
 */
function ScriptLoadedHandler(script, callback) {
    if (UserAgentProduct['IE'] && compareVersions(UserAgentVersion, "9.0") < 0)
        addEvent(script, "readystatechange", function () {
            if (this.readyState == "loaded" || this.readyState == "complete") {
                if (ScriptLoadCache[script.src])
                    ScriptLoadCache[script.src].loaded = true;
                if (callback)
                    callback.call(this);
            }
        });
    else
        addEvent(script, "load", function (evt) {
            if (ScriptLoadCache[script.src])
                ScriptLoadCache[script.src].loaded = true;
            if(callback)
                callback.call(this);
        });
}

/**
* Dynamically include a script tag if it is not already present.
* @param {string} src - source of the script
* @param {boolean=} async
* @param {boolean=} allowDuplicates
* @param {function(this:Element, Event=)=} completeCallback
* example: highedweb.requireScript("myscript.js");
*/
function requireScript(src, async, allowDuplicates, completeCallback) {
    /** @type {NodeList} */
    var scripts = null;

    /** @type {Element} */
    var script = null;

    if (!allowDuplicates) {

        //Check the cache to see if we already know about this script
        if (ScriptLoadCache[src]) {
            if (completeCallback) {
                if (ScriptLoadCache[src].loaded)
                    completeCallback.call(ScriptLoadCache[src].script);
                else
                    ScriptLoadedHandler(ScriptLoadCache[src].script, completeCallback);
            }

            return;
        }

        //Search static scripts on page
        scripts = document.getElementsByTagName("script");
        for (var i = 0; i < scripts.length; i++) {
            if (scripts[i].src == src) {
                ScriptLoadCache[src] = new ScriptInfo(scripts[i], true);

                if (completeCallback)
                    completeCallback.call(scripts[i]);

                return;
            }
        }
    }

    script = document.createElement("script");
    script.type = "text/javascript";
    script.src = src;
    if (async)
        script.async = true;

    ScriptLoadCache[src] = new ScriptInfo(script, false);
    ScriptLoadedHandler(script, completeCallback);

    if(!scripts)
        scripts = document.getElementsByTagName("script");
    scripts[0].parentNode.insertBefore(script, scripts[0]);
}
window["highedweb"]["requireScript"] = requireScript;

/** @type {Object.<string, boolean>} */
var LinkLoadCache = {};

/**
* Dynamically include a link tag if it is not already present.
* @param {string} src - source of the script
* example: highedweb.requireLink("myscript.js");
*/
window["highedweb"]["requireLink"] = function (src) {
    if (LinkLoadCache[src])
        return;

    var head = document.getElementsByTagName("head");
    if (!head)
        return;
    head = head[0];

    var links = head.getElementsByTagName("link");
    for (var i = 0; i < links.length; i++) {
        if (links[i].href == src) {
            LinkLoadCache[src] = true;
            return;
        }
    }

    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = src;
    link.type = "text/css";
    link.media = "all";


    if (links)
        head.insertBefore(link, links[0]);
    else
        head.appendChild(link);
};

window["highedweb"]["outputLastModifiedDate"] = function () {
    if (document.lastModified) {
        var error, s, dt;
        error = false;
        dt = new Date(document.lastModified);
        if (dt.getTime() + 5000 >= (new Date()).getTime()) {
            document.write("unknown");
            return;
        }

        var m = dt.getMonth();
        var d = dt.getDate();
        var y = dt.getFullYear();
        switch (m) {
            case 0: s = "January"; break;
            case 1: s = "February"; break;
            case 2: s = "March"; break;
            case 3: s = "April"; break;
            case 4: s = "May"; break;
            case 5: s = "June"; break;
            case 6: s = "July"; break;
            case 7: s = "August"; break;
            case 8: s = "September"; break;
            case 9: s = "October"; break;
            case 10: s = "November"; break;
            case 11: s = "December"; break;
            default: error = true;
        }
        if (error) {
            s = "unknown";
        } else {
            s += " " + d + ", " + y;
        }
        document.write(s);
    }
    else
        document.write("unknown");
}

window["highedweb"]["outputDocumentLocation"] = function () {
    document.write(document.location.protocol + "//" + document.location.host);
    if (document.location.port != "")
        document.write(":" + document.location.port);
    document.write(document.location.pathname + document.location.search);
}

/** @type {Object.<string, boolean>} */
var UserAgentProduct = {
    'OPERA': false,
    'IE': false,
    'GECKO': false,
    'WEBKIT': false,
    'MOBILE': false
}
UserAgentProduct['OPERA'] = navigator.userAgent.indexOf('Opera') == 0;
UserAgentProduct['IE'] = !UserAgentProduct['OPERA'] && navigator.userAgent.indexOf('MSIE') != -1;
UserAgentProduct['WEBKIT'] = !UserAgentProduct['OPERA'] && navigator.userAgent.indexOf('WebKit') != -1;
UserAgentProduct['MOBILE'] = UserAgentProduct['WEBKIT'] && navigator.userAgent.indexOf('Mobile') != -1;
UserAgentProduct['GECKO'] = !UserAgentProduct['OPERA'] && !UserAgentProduct['WEBKIT'] && navigator.product == "Gecko";

var UserAgentVersion = '', versionRe, Engine, arr;
if (UserAgentProduct['OPERA'])
    UserAgentVersion = typeof window.opera.version == 'function' ? window.opera.version() : window.opera.version;
else {
    if (UserAgentProduct['GECKO'])
        versionRe = /rv\:([^\);]+)(\)|;)/;
    else if (UserAgentProduct['IE'])
        versionRe = /MSIE\s+([^\);]+)(\)|;)/;
    else if (UserAgentProduct['WEBKIT'])
        versionRe = /WebKit\/(\S+)/;

    if (versionRe) {
        arr = versionRe.exec(navigator.userAgent);
        UserAgentVersion = arr ? arr[1] : '';
    }

    if (UserAgentProduct['IE']) {
        versionRe = /Trident\/(\S+)/;
        arr = versionRe.exec(navigator.userAgent);
        if (arr) {
            arr = parseFloat(arr[1]);
            if (arr != NaN) {
              if(arr >= 5.0)
                UserAgentVersion = "9.0";
              else if(arr >= 4.0)
                UserAgentVersion = "8.0";
            }
        }
    }
}
var userAgent = {
    'product': UserAgentProduct,
    'platform': navigator.platform,
    'version': UserAgentVersion
};
window['highedweb']['userAgent'] = userAgent;

function isVersion(version) {
    return isVersionCache[String(version)] || (isVersionCache[String(version)] = compareVersions(UserAgentVersion, version) == 0);
}

/** @type {Object.<string, boolean>} */
var isVersionCache = {};

/**
* Compares two version numbers.
* @see http://closure-library.googlecode.com/svn/trunk/closure/goog/string/string.js
* @param {string|number} version1 Version of first item.
* @param {string|number} version2 Version of second item.
*
* @return {number}  1 if {@code version1} is higher.
*                   0 if arguments are equal.
*                  -1 if {@code version2} is higher.
*/
function compareVersions(version1, version2) {
    var order = 0;
    // Trim leading and trailing whitespace and split the versions into
    // subversions.
    var v1Subs = version1.replace(/(^\s*|\s*$)/g, "").split('.');
    var v2Subs = version2.replace(/(^\s*|\s*$)/g, "").split('.');
    var subCount = Math.max(v1Subs.length, v2Subs.length);

    // Iterate over the subversions, as long as they appear to be equivalent.
    for (var subIdx = 0; order == 0 && subIdx < subCount; subIdx++) {
        var v1Sub = v1Subs[subIdx] || '';
        var v2Sub = v2Subs[subIdx] || '';

        // Split the subversions into pairs of numbers and qualifiers (like 'b').
        // Two different RegExp objects are needed because they are both using
        // the 'g' flag.
        var v1CompParser = new RegExp('(\\d*)(\\D*)', 'g');
        var v2CompParser = new RegExp('(\\d*)(\\D*)', 'g');
        do {
            var v1Comp = v1CompParser.exec(v1Sub) || ['', '', ''];
            var v2Comp = v2CompParser.exec(v2Sub) || ['', '', ''];
            // Break if there are no more matches.
            if (v1Comp[0].length == 0 && v2Comp[0].length == 0) {
                break;
            }

            // Parse the numeric part of the subversion. A missing number is
            // equivalent to 0.
            var v1CompNum = v1Comp[1].length == 0 ? 0 : parseInt(v1Comp[1], 10);
            var v2CompNum = v2Comp[1].length == 0 ? 0 : parseInt(v2Comp[1], 10);

            // Compare the subversion components. The number has the highest
            // precedence. Next, if the numbers are equal, a subversion without any
            // qualifier is always higher than a subversion with any qualifier. Next,
            // the qualifiers are compared as strings.
            order = compareElements(v1CompNum, v2CompNum) ||
	compareElements(v1Comp[2].length == 0, v2Comp[2].length == 0) ||
	compareElements(v1Comp[2], v2Comp[2]);
            // Stop as soon as an inequality is discovered.
        } while (order == 0);
    }

    return order;
}
window['highedweb']['compareVersions'] = compareVersions;

/**
* Compares elements of a version number.
*
* @param {string|number|boolean} left An element from a version number.
* @param {string|number|boolean} right An element from a version number.
*
* @return {number}  1 if {@code left} is higher.
*                   0 if arguments are equal.
*                  -1 if {@code right} is higher.
* @private
*/
function compareElements(left, right) {
    if (left < right)
        return -1;
    else if (left > right)
        return 1;

    return 0;
};


/**
*
* ContentLoaded.js
*
* Author: Diego Perini (diego.perini at gmail.com)
* Summary: Cross-browser wrapper for DOMContentLoaded
* Updated: 17/05/2008
* License: MIT
* Version: 1.1
*
* URL:
* http://javascript.nwbox.com/ContentLoaded/
* http://javascript.nwbox.com/ContentLoaded/MIT-LICENSE
*
* Notes:
* based on code by Dean Edwards and John Resig
* http://dean.edwards.name/weblog/2006/06/again/
*
* @param {Window} w
* @param {function(*)} f
*/
function ContentLoaded(w, f) {
    var d = w.document,
	D = 'DOMContentLoaded',
    // user agent, version
	u = w.navigator.userAgent.toLowerCase(),
	v = parseFloat(u.match(/.+(?:rv|it|ml|ra|ie)[\/: ]([\d.]+)/)[1]);

    function init(e) {
        if (!document.loaded) {
            document.loaded = true;
            // pass a fake event if needed
            f((e.type && e.type == D) ? e : {
                type: D,
                target: d,
                eventPhase: 0,
                currentTarget: d,
                timeStamp: +new Date,
                eventType: e.type || e
            });
        }
    }

    // safari < 525.13
    if (/webkit\//.test(u) && v < 525.13) {

        (function () {
            if (/complete|loaded/.test(d.readyState)) {
                init('khtml-poll');
            } else {
                window.setTimeout(arguments.callee, 10);
            }
        })();

        // internet explorer all versions
    } else if (/msie/.test(u) && !w.opera) {

        d.attachEvent('onreadystatechange',
		function (e) {
		    if (d.readyState == 'complete') {
		        d.detachEvent('on' + e.type, arguments.callee);
		        init(e);
		    }
		}
	);
        if (w == top) {
            (function () {
                try {
                    d.documentElement.doScroll('left');
                } catch (e) {
                    window.setTimeout(arguments.callee, 10);
                    return;
                }
                init('msie-poll');
            })();
        }

        // browsers having native DOMContentLoaded
    } else if (d.addEventListener &&
	(/opera\//.test(u) && v > 9) ||
	(/gecko\//.test(u) && v >= 1.8) ||
	(/khtml\//.test(u) && v >= 4.0) ||
	(/webkit\//.test(u) && v >= 525.13)) {

        d.addEventListener(D,
		function (e) {
		    d.removeEventListener(D, arguments.callee, false);
		    init(e);
		}, false
	);

        // fallback to last resort for older browsers
    } else {

        // from Simon Willison
        var oldonload = w.onload;
        w.onload = function (e) {
            init(e || w.event);
            if (typeof oldonload == 'function') {
                oldonload(e || w.event);
            }
        };
    }
}


//Google Analytics Code.
/** @type {Array.<*>} */
var _gaq = window["_gaq"] || [];
_gaq.push(["_setAccount", "UA-7826679-2"]);
_gaq.push(["_trackPageview"]);
window["_gaq"] = _gaq;
requireScript(("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js", true, false);

//Page Startup tasks
addLoadEvent(function () {
    //Add Google Analytics click tracking for mailto links and external domains
    var docTypes = /\.(?:doc|docx|eps|jpg|png|svg|xls|xlsx|ppt|pptx|pdf|zip|txt|vsd|vxd|js|css|rar|exe|wma|mov|avi|wmv|mp3)($|\&|\?)/i
    // Initialize external link handlers
    var hrefs = document.getElementsByTagName("a");
    for (var l = 0; l < hrefs.length; l++) {
        // try {} catch{} block added by erikvold VKI
        try {
            //protocol, host, hostname, port, pathname, search, hash
            if (hrefs[l].protocol && hrefs[l].protocol != "javascript:") {
                if (hrefs[l].protocol == "mailto:") {
                    addEvent(hrefs[l], "click", (function (href) { return function (evt) { window['_gaq'].push(["_trackPageview", '/mailto/' + href.substring(7)]); }; })(hrefs[l]));
                }
                else if (hrefs[l].hostname == window.location.host) {
                    if (docTypes.test(hrefs[l].pathname + hrefs[l].search)) {
                        var pathname = hrefs[l].pathname.replace(/\\|%5C/ig, "/");
                        var lnk = (pathname.charAt(0) == "/") ? pathname : "/" + pathname;
                        if (hrefs[l].search && pathname.indexOf(hrefs[l].search) == -1) lnk += hrefs[l].search;
                        addEvent(hrefs[l], "click", (function (href) { return function (evt) { window['_gaq'].push(["_trackPageview", href]); }; })(lnk));
                    }
                }
                else {
                    addEvent(hrefs[l], "click", (function (href) { return function (evt) { window['_gaq'].push(["_trackPageview", '/external/' + href.host + href.pathname + href.search + href.hash]); }; })(hrefs[l]));
                }
            }
        }
        catch (e) {
            continue;
        }
    }
});

// Flash
/** Taken from AC_OETags.js */
var isIEonWin = (userAgent.platform.indexOf("Win") >= 0 && !userAgent.product["Opera"]);
function ControlVersion() {
    var version;
    var axo;

    // NOTE : new ActiveXObject(strFoo) throws an exception if strFoo isn't in the registry

    try {
        // version will be set for 7.X or greater players
        axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");
        version = axo.GetVariable("$version");
        return version;
    } catch (e) {
    }

    return -1;
}

// JavaScript helper required to detect Flash Player PlugIn version information
function GetSwfVer() {
    // NS/Opera version >= 3 check for Flash plugin in plugin array
    var flashVer = -1;

    if (navigator.plugins != null && navigator.plugins.length > 0) {
        if (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]) {
            var swVer2 = navigator.plugins["Shockwave Flash 2.0"] ? " 2.0" : "";
            var flashDescription = navigator.plugins["Shockwave Flash" + swVer2].description;
            var descArray = flashDescription.split(" ");
            var tempArrayMajor = descArray[2].split(".");
            var tempArrayMinor = [];
            var versionMajor = tempArrayMajor[0];
            var versionMinor = tempArrayMajor[1];
            if (descArray[3] != "") {
                tempArrayMinor = descArray[3].split("r");
            } else {
                tempArrayMinor = descArray[4].split("r");
            }
            var versionRevision = tempArrayMinor[1] > 0 ? tempArrayMinor[1] : 0;
            flashVer = versionMajor + "." + versionMinor + "." + versionRevision;
        }
    }
    else if (isIEonWin)
        flashVer = ControlVersion();

    return flashVer;
}

/**
* @param {string} reqVersion
* @returns {boolean}
*/
window["highedweb"]["requireFlashVersion"] = window["highedweb"]["detectFlashVersion"] = function (reqVersion) {
    var versionStr = GetSwfVer();
    if (versionStr == -1) {
        return false;
    }
    else if (versionStr != 0) {
        if (isIEonWin) {
            // Given "WIN 2,0,0,11"
            var tempArray = versionStr.split(" "); 	// ["WIN", "2,0,0,11"]
            var tempString = tempArray[0];
            if (tempArray.length > 1)
                tempString = tempArray[1]; 		// "2,0,0,11"
            //versionArray = tempString.split(","); // ['2', '0', '0', '11']
            versionStr = tempString.replace(/,/g, ".");
        }

        return compareVersions(versionStr, reqVersion) >= 0;
    }
}

/** @param {Object.<string, string>} objAttrs */
window["highedweb"]["generateFlashObject"] = function (objAttrs) {
    var html = ["<object type=\"application/x-shockwave-flash\""];
    html.push(" data=\"", objAttrs["movie"], "\"");
    if (objAttrs["width"])
        html.push(" width=\"", objAttrs["width"], "\"");

    if (objAttrs["height"])
        html.push(" height=\"", objAttrs["height"], "\"");

    if (objAttrs["id"])
        html.push(" id=\"", objAttrs["id"], "\"");

    if (objAttrs["class"])
        html.push(" class=\"", objAttrs["class"], "\"");

    if (objAttrs["style"])
        html.push(" style=\"", objAttrs["style"], "\"");

    html.push(">\n");

    for (var param in objAttrs) {
        switch (param.toLowerCase()) {
            case "id":
            case "class":
            case "width":
            case "height":
            case "style":
                break;
            default:
                html.push("<param name=\"", param, "\" value=\"", objAttrs[param], "\"/>\n");
        }
    }

    html.push("</object>");
    document.write(html.join(""));
}

// Internet Explorer Print Protector code
if (UserAgentProduct["IE"] && compareVersions(UserAgentVersion, "9.0") < 0) {
    var html5_elements = "abbr|article|aside|audio|canvas|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
		html5_elements_array = html5_elements.split("|"),
		html5_elements_array_length = html5_elements_array.length,
		html5_elements_replace = new RegExp("<(\/*)(" + html5_elements + ")", "gi"),
		html5_selector_match = new RegExp("(^|[^\\n]*?\\s)(" + html5_elements + ")([^\\n]*)({[\\n\\w\\W]*?})", "gi"),
		html5_selector_replace = new RegExp("(^|\\s)(" + html5_elements + ")", "gi"),
		doc_fragment = document.createDocumentFragment(),
		html = document.documentElement,
        head_tags = document.getElementsByTagName("head"),
		head = head_tags ? head_tags[0] : null,
		style = document.createElement("style"),
		body = document.createElement("body");
    for (var html5_elements_array_count = 0; html5_elements_array_count < html5_elements_array_length; html5_elements_array_count++) {
        document["createElement"](html5_elements_array[html5_elements_array_count]);
        doc_fragment["createElement"](html5_elements_array[html5_elements_array_count]);
    }

    style.media = "all";

    function parse_style_sheet_list(style_sheet_list, media) {
        var style_sheet_list_length = style_sheet_list.length,
			style_sheet_list_each,
			css_text_array = [];
        for(var style_sheet_list_count = 0; style_sheet_list_count < style_sheet_list_length; style_sheet_list_count++) {
            style_sheet_list_each = style_sheet_list[style_sheet_list_count];
            media = style_sheet_list_each.media || media;
            css_text_array.push(parse_style_sheet_list(style_sheet_list_each.imports, media));
            css_text_array.push(style_sheet_list_each.cssText);
        }
        return css_text_array.join("");
    }
    window.attachEvent(
		"onbeforeprint",
		function () {
		    var html5_selector_matches,
				html5_selector_matches_array = [], html5_elements_nodeList_length,
				style_sheet_cssText, html5_elements_nodeList, html5_elements_nodeList_count;
		    for (var html5_elements_array_count = 0; html5_elements_array_count < html5_elements_array_length; html5_elements_array_count++) {
		        html5_elements_nodeList = document.getElementsByTagName(html5_elements_array[html5_elements_array_count]);
			    html5_elements_nodeList_length = html5_elements_nodeList.length;
		        for (html5_elements_nodeList_count = 0; html5_elements_nodeList_count < html5_elements_nodeList_length; html5_elements_nodeList_count++)
		            if (html5_elements_nodeList[html5_elements_nodeList_count].className.indexOf("iepp_") < 0)
		                html5_elements_nodeList[html5_elements_nodeList_count].className += " iepp_" + html5_elements_array[html5_elements_array_count];
		    }
		    style_sheet_cssText = parse_style_sheet_list(document.styleSheets, "all");
		    while ((html5_selector_matches = html5_selector_match.exec(style_sheet_cssText)) != null)
		        html5_selector_matches_array.push(
					(html5_selector_matches[1] + html5_selector_matches[2] + html5_selector_matches[3]).replace(html5_selector_replace, "$1.iepp_$2") + html5_selector_matches[4]
                );
		    head.insertBefore(style, head.firstChild);
		    style.styleSheet.cssText = html5_selector_matches_array.join("\n");
		    doc_fragment.appendChild(document.body);
		    html.appendChild(body);
		    body.innerHTML = doc_fragment.firstChild.innerHTML.replace(html5_elements_replace, "<$1bdo");
		}
	);
    window.attachEvent(
		"onafterprint",
		function () {
		    html.removeChild(body);
            body.innerHTML = "";
		    head.removeChild(style);
		    html.appendChild(doc_fragment.firstChild);
		}
	);
};