(function (name, context, definition) {
    if (typeof module !== 'undefined' && module.exports) { module.exports = definition(); }
    else if (typeof define === 'function' && define.amd) { define(definition); }
    else { context[name] = definition(); }
})

var Fingerprint = function (options) {
    var nativeForEach, nativeMap;
    nativeForEach = Array.prototype.forEach;
    nativeMap = Array.prototype.map;

    this.each = function (obj, iterator, context) {
        if (obj === null) {
            return;
        }
        if (nativeForEach && obj.forEach === nativeForEach) {
            obj.forEach(iterator, context);
        } else if (obj.length === +obj.length) {
            for (var i = 0, l = obj.length; i < l; i++) {
                if (iterator.call(context, obj[i], i, obj) === {}) return;
            }
        } else {
            for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                    if (iterator.call(context, obj[key], key, obj) === {}) return;
                }
            }
        }
    };

    this.map = function (obj, iterator, context) {
        var results = [];
        // Not using strict equality so that this acts as a
        // shortcut to checking for `null` and `undefined`.
        if (obj == null) return results;
        if (nativeMap && obj.map === nativeMap) return obj.map(iterator, context);
        this.each(obj, function (value, index, list) {
            results[results.length] = iterator.call(context, value, index, list);
        });
        return results;
    };

    if (typeof options == 'object') {
        this.hasher = options.hasher;
        this.screen_resolution = options.screen_resolution;
        this.screen_orientation = options.screen_orientation;
        this.canvas = options.canvas;
        this.ie_activex = options.ie_activex;
    } else if (typeof options == 'function') {
        this.hasher = options;
    }
};
Fingerprint.prototype = {
    get: function () {
        var keys = [];
        keys.push(navigator.userAgent);
        keys.push(navigator.language);
        keys.push(screen.colorDepth);
        if (this.screen_resolution) {
            var resolution = this.getScreenResolution();
            if (typeof resolution !== 'undefined') { // headless browsers, such as phantomjs
                keys.push(resolution.join('x'));
            }
        }
        keys.push(new Date().getTimezoneOffset());
        keys.push(this.hasSessionStorage());
        keys.push(this.hasLocalStorage());
        keys.push(!!window.indexedDB);
        //body might not be defined at this point or removed programmatically
        if (document.body) {
            keys.push(typeof (document.body.addBehavior));
        } else {
            keys.push(typeof undefined);
        }
        keys.push(typeof (window.openDatabase));
        keys.push(navigator.cpuClass);
        keys.push(navigator.platform);
        keys.push(navigator.doNotTrack);
        keys.push(this.getPluginsString());
        if (this.canvas && this.isCanvasSupported()) {
            keys.push(this.getCanvasFingerprint());
        }
        if (this.hasher) {
            return this.hasher(keys.join('###'), 31);
        } else {
            return this.murmurhash3_32_gc(keys.join('###'), 31);
        }
    },
    murmurhash3_32_gc: function (key, seed) {
        var remainder, bytes, h1, h1b, c1, c2, k1, i;

        remainder = key.length & 3; // key.length % 4
        bytes = key.length - remainder;
        h1 = seed;
        c1 = 0xcc9e2d51;
        c2 = 0x1b873593;
        i = 0;

        while (i < bytes) {
            k1 =
              ((key.charCodeAt(i) & 0xff)) |
              ((key.charCodeAt(++i) & 0xff) << 8) |
              ((key.charCodeAt(++i) & 0xff) << 16) |
              ((key.charCodeAt(++i) & 0xff) << 24);
            ++i;

            k1 = ((((k1 & 0xffff) * c1) + ((((k1 >>> 16) * c1) & 0xffff) << 16))) & 0xffffffff;
            k1 = (k1 << 15) | (k1 >>> 17);
            k1 = ((((k1 & 0xffff) * c2) + ((((k1 >>> 16) * c2) & 0xffff) << 16))) & 0xffffffff;

            h1 ^= k1;
            h1 = (h1 << 13) | (h1 >>> 19);
            h1b = ((((h1 & 0xffff) * 5) + ((((h1 >>> 16) * 5) & 0xffff) << 16))) & 0xffffffff;
            h1 = (((h1b & 0xffff) + 0x6b64) + ((((h1b >>> 16) + 0xe654) & 0xffff) << 16));
        }

        k1 = 0;

        switch (remainder) {
            case 3: k1 ^= (key.charCodeAt(i + 2) & 0xff) << 16;
            case 2: k1 ^= (key.charCodeAt(i + 1) & 0xff) << 8;
            case 1: k1 ^= (key.charCodeAt(i) & 0xff);

                k1 = (((k1 & 0xffff) * c1) + ((((k1 >>> 16) * c1) & 0xffff) << 16)) & 0xffffffff;
                k1 = (k1 << 15) | (k1 >>> 17);
                k1 = (((k1 & 0xffff) * c2) + ((((k1 >>> 16) * c2) & 0xffff) << 16)) & 0xffffffff;
                h1 ^= k1;
        }

        h1 ^= key.length;

        h1 ^= h1 >>> 16;
        h1 = (((h1 & 0xffff) * 0x85ebca6b) + ((((h1 >>> 16) * 0x85ebca6b) & 0xffff) << 16)) & 0xffffffff;
        h1 ^= h1 >>> 13;
        h1 = ((((h1 & 0xffff) * 0xc2b2ae35) + ((((h1 >>> 16) * 0xc2b2ae35) & 0xffff) << 16))) & 0xffffffff;
        h1 ^= h1 >>> 16;

        return h1 >>> 0;
    },
    hasLocalStorage: function () {
        try {
            return !!window.localStorage;
        } catch (e) {
            return true; // SecurityError when referencing it means it exists
        }
    },
    hasSessionStorage: function () {
        try {
            return !!window.sessionStorage;
        } catch (e) {
            return true; // SecurityError when referencing it means it exists
        }
    },
    isCanvasSupported: function () {
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    },
    isIE: function () {
        if (navigator.appName === 'Microsoft Internet Explorer') {
            return true;
        } else if (navigator.appName === 'Netscape' && /Trident/.test(navigator.userAgent)) {// IE 11
            return true;
        }
        return false;
    },
    getPluginsString: function () {
        if (this.isIE() && this.ie_activex) {
            return this.getIEPluginsString();
        } else {
            return this.getRegularPluginsString();
        }
    },
    getRegularPluginsString: function () {
        return this.map(navigator.plugins, function (p) {
            var mimeTypes = this.map(p, function (mt) {
                return [mt.type, mt.suffixes].join('~');
            }).join(',');
            return [p.name, p.description, mimeTypes].join('::');
        }, this).join(';');
    },
    getIEPluginsString: function () {
        if (window.ActiveXObject) {
            var names = ['ShockwaveFlash.ShockwaveFlash',//flash plugin
              'AcroPDF.PDF', // Adobe PDF reader 7+
              'PDF.PdfCtrl', // Adobe PDF reader 6 and earlier, brrr
              'QuickTime.QuickTime', // QuickTime
              // 5 versions of real players
              'rmocx.RealPlayer G2 Control',
              'rmocx.RealPlayer G2 Control.1',
              'RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)',
              'RealVideo.RealVideo(tm) ActiveX Control (32-bit)',
              'RealPlayer',
              'SWCtl.SWCtl', // ShockWave player
              'WMPlayer.OCX', // Windows media player
              'AgControl.AgControl', // Silverlight
              'Skype.Detection'];

            // starting to detect plugins in IE
            return this.map(names, function (name) {
                try {
                    new ActiveXObject(name);
                    return name;
                } catch (e) {
                    return null;
                }
            }).join(';');
        } else {
            return ""; // behavior prior version 0.5.0, not breaking backwards compat.
        }
    },
    getScreenResolution: function () {
        var resolution;
        if (this.screen_orientation) {
            resolution = (screen.height > screen.width) ? [screen.height, screen.width] : [screen.width, screen.height];
        } else {
            resolution = [screen.height, screen.width];
        }
        return resolution;
    },
    getCanvasFingerprint: function () {
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var txt = 'http://valve.github.io';
        ctx.textBaseline = "top";
        ctx.font = "14px 'Arial'";
        ctx.textBaseline = "alphabetic";
        ctx.fillStyle = "#f60";
        ctx.fillRect(125, 1, 62, 20);
        ctx.fillStyle = "#069";
        ctx.fillText(txt, 2, 15);
        ctx.fillStyle = "rgba(102, 204, 0, 0.7)";
        ctx.fillText(txt, 4, 17);
        return canvas.toDataURL();
    }
};

function loadfile(filename, filetype) {
    if (filetype == "js") {
        var fileref = document.createElement('script');
        fileref.setAttribute("type", "text/javascript");
        fileref.setAttribute("src", filename);
    } else if (filetype == "css") {
        var fileref = document.createElement('link');
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
    }
    if (typeof fileref != "undefined") {
        document.getElementsByTagName("head")[0].appendChild(fileref);
    }
}

//特殊设置 ，设置参数值
function getRequest() {
    var b = document.getElementById("geewise").src;

    var url_2 = b.split("?");

    var url_1 = '';
    if (url_2.length >= 2) {
        for (var i = 1; i < url_2.length; i++) {
            url_1 += url_2[i];
        }
    }
    var theRequest = new Object(),
        str = url_1.substr(0),
        strs = str.split("&");
    for (var i = 0; i < strs.length; i++) {
        theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
    }
    return theRequest;
}
var Rq = getRequest(), rootflag = 1;

var geewiseJsParam = {
    pub: Rq["u"],
    host: Rq["o"] || window.location.host,   
    width: parseInt(Rq["w"]),
    height: parseInt(Rq["h"]),
    type: Rq["t"].split(","),
    excludedUrls: Rq["r"],
    excludedKeywords: Rq["k"],
    category: Rq["y"],
    test: Rq["test"] || 0,
    _uname: Rq["_uname"] || '',
    getcloseflg: Rq["noclose"] || 0,
    getnumion: Rq["unionnum"] || 2,
    icls: Rq["icls"],
    adInsetIa: Rq["ia"],
    tags: encodeURIComponent(Rq["c"]),
    showclickRand: '&d=0912',
    root_domain: 'http://jdwx01.b0.upaiyun.com/ssp_sc/v6_0912/',
    rqDataurl: "http://ax.ggfeng.com/check/getGG?d=0912",
    pageLogUrl: "http://sc.ggfeng.com/log/pageLog?d=0912",
    initUrl: "http://ax.ggfeng.com/check/Init?d=0912"
}
//特殊设置结束
var dealDoubFram = 0;
if (dealDoubFram == 1 || (parent.dealDoubFram && parent.dealDoubFram == 1)) {
}
else {
    if (!document.getElementById("ssp_media_count")) {
        var t = document.createElement("div");
        t.id = "ssp_media_count", //ssp 去重标签
        document.getElementsByTagName("head")[0].appendChild(t);
        if (!document.getElementById("media_count")) {
            var r = document.createElement("div");
            r.id = "media_count", //探针媒体统计标签
            document.getElementsByTagName("head")[0].appendChild(r);
        }
        var rand = Math.random().toString(36).substr(2);
        loadfile(geewiseJsParam.root_domain + "css/swiper.js", 'js');
        loadfile(geewiseJsParam.root_domain + "css/sspmain.css?v=" + rand, "css");
        loadfile(geewiseJsParam.root_domain + "css/swiper.css?v=" + rand, "css");
        checkBody();
    }
}
dealDoubFram++;
var fg = 25;
function checkBody() {
    if (document.body) {
        loadfile(geewiseJsParam.root_domain + "ssp_main.js?v=" + rand, 'js');
    } else {
        setTimeout(function () {
            fg = fg - 1;
            if (fg >= 0) {
                checkBody();
            }
        }, 10);
    }
}


