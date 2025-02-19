﻿if (function (e) {
		var t = function () {};
		t.dumy = document.createElement("div"), t.trim = function (e) {
			return e.replace(/\s/gi, "")
		}, t.trimAndFormatUrl = function (e) {
			return e = (e = e.toLocaleLowerCase()).replace(/ /g, "-")
		}, t.hexToRgb = function (e) {
			e = e.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i, function (e, t, o, s) {
				return t + t + o + o + s + s
			});
			var t = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);
			return "rgb(" + (t = t ? {
				r: parseInt(t[1], 16),
				g: parseInt(t[2], 16),
				b: parseInt(t[3], 16)
			} : null).r + "," + t.g + "," + t.b + ")"
		}, t.splitAndTrim = function (e, o) {
			for (var s = e.split(","), i = s.length, l = 0; l < i; l++) o && (s[l] = t.trim(s[l]));
			return s
		}, t.checkTime = function (e) {
			return !!/^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/.test(e)
		}, t.formatTime = function (e) {
			var t = Math.floor(e / 3600),
				o = e % 3600,
				s = Math.floor(o / 60),
				i = o % 60,
				l = Math.ceil(i);
			return s = s >= 10 ? s : "0" + s, l = l >= 10 ? l : "0" + l, isNaN(l) ? "00:00" : self.hasHours_bl ? t + ":" + s + ":" + l : s + ":" + l
		}, t.MD5 = function (e) {
			function t(e, t) {
				return e << t | e >>> 32 - t
			}

			function o(e, t) {
				var o, s, i, l, n;
				return i = 2147483648 & e, l = 2147483648 & t, n = (1073741823 & e) + (1073741823 & t), (o = 1073741824 & e) & (s = 1073741824 & t) ? 2147483648 ^ n ^ i ^ l : o | s ? 1073741824 & n ? 3221225472 ^ n ^ i ^ l : 1073741824 ^ n ^ i ^ l : n ^ i ^ l
			}

			function s(e, s, i, l, n, r, a) {
				var d;
				return o(t(e = o(e, o(o((d = s) & i | ~d & l, n), a)), r), s)
			}

			function i(e, s, i, l, n, r, a) {
				var d;
				return o(t(e = o(e, o(o(s & (d = l) | i & ~d, n), a)), r), s)
			}

			function l(e, s, i, l, n, r, a) {
				return o(t(e = o(e, o(o(s ^ i ^ l, n), a)), r), s)
			}

			function n(e, s, i, l, n, r, a) {
				return o(t(e = o(e, o(o(i ^ (s | ~l), n), a)), r), s)
			}

			function r(e) {
				var t, o = "",
					s = "";
				for (t = 0; t <= 3; t++) o += (s = "0" + (e >>> 8 * t & 255).toString(16)).substr(s.length - 2, 2);
				return o
			}
			var a, d, u, h, _, c, f, p, b, m = Array();
			for (m = function (e) {
					for (var t, o = e.length, s = o + 8, i = 16 * ((s - s % 64) / 64 + 1), l = Array(i - 1), n = 0, r = 0; r < o;) n = r % 4 * 8, l[t = (r - r % 4) / 4] = l[t] | e.charCodeAt(r) << n, r++;
					return n = r % 4 * 8, l[t = (r - r % 4) / 4] = l[t] | 128 << n, l[i - 2] = o << 3, l[i - 1] = o >>> 29, l
				}(e = function (e) {
					e = e.replace(/\r\n/g, "\n");
					for (var t = "", o = 0; o < e.length; o++) {
						var s = e.charCodeAt(o);
						s < 128 ? t += String.fromCharCode(s) : s > 127 && s < 2048 ? (t += String.fromCharCode(s >> 6 | 192), t += String.fromCharCode(63 & s | 128)) : (t += String.fromCharCode(s >> 12 | 224), t += String.fromCharCode(s >> 6 & 63 | 128), t += String.fromCharCode(63 & s | 128))
					}
					return t
				}(e)), c = 1732584193, f = 4023233417, p = 2562383102, b = 271733878, a = 0; a < m.length; a += 16) d = c, u = f, h = p, _ = b, f = n(f = n(f = n(f = n(f = l(f = l(f = l(f = l(f = i(f = i(f = i(f = i(f = s(f = s(f = s(f = s(f, p = s(p, b = s(b, c = s(c, f, p, b, m[a + 0], 7, 3614090360), f, p, m[a + 1], 12, 3905402710), c, f, m[a + 2], 17, 606105819), b, c, m[a + 3], 22, 3250441966), p = s(p, b = s(b, c = s(c, f, p, b, m[a + 4], 7, 4118548399), f, p, m[a + 5], 12, 1200080426), c, f, m[a + 6], 17, 2821735955), b, c, m[a + 7], 22, 4249261313), p = s(p, b = s(b, c = s(c, f, p, b, m[a + 8], 7, 1770035416), f, p, m[a + 9], 12, 2336552879), c, f, m[a + 10], 17, 4294925233), b, c, m[a + 11], 22, 2304563134), p = s(p, b = s(b, c = s(c, f, p, b, m[a + 12], 7, 1804603682), f, p, m[a + 13], 12, 4254626195), c, f, m[a + 14], 17, 2792965006), b, c, m[a + 15], 22, 1236535329), p = i(p, b = i(b, c = i(c, f, p, b, m[a + 1], 5, 4129170786), f, p, m[a + 6], 9, 3225465664), c, f, m[a + 11], 14, 643717713), b, c, m[a + 0], 20, 3921069994), p = i(p, b = i(b, c = i(c, f, p, b, m[a + 5], 5, 3593408605), f, p, m[a + 10], 9, 38016083), c, f, m[a + 15], 14, 3634488961), b, c, m[a + 4], 20, 3889429448), p = i(p, b = i(b, c = i(c, f, p, b, m[a + 9], 5, 568446438), f, p, m[a + 14], 9, 3275163606), c, f, m[a + 3], 14, 4107603335), b, c, m[a + 8], 20, 1163531501), p = i(p, b = i(b, c = i(c, f, p, b, m[a + 13], 5, 2850285829), f, p, m[a + 2], 9, 4243563512), c, f, m[a + 7], 14, 1735328473), b, c, m[a + 12], 20, 2368359562), p = l(p, b = l(b, c = l(c, f, p, b, m[a + 5], 4, 4294588738), f, p, m[a + 8], 11, 2272392833), c, f, m[a + 11], 16, 1839030562), b, c, m[a + 14], 23, 4259657740), p = l(p, b = l(b, c = l(c, f, p, b, m[a + 1], 4, 2763975236), f, p, m[a + 4], 11, 1272893353), c, f, m[a + 7], 16, 4139469664), b, c, m[a + 10], 23, 3200236656), p = l(p, b = l(b, c = l(c, f, p, b, m[a + 13], 4, 681279174), f, p, m[a + 0], 11, 3936430074), c, f, m[a + 3], 16, 3572445317), b, c, m[a + 6], 23, 76029189), p = l(p, b = l(b, c = l(c, f, p, b, m[a + 9], 4, 3654602809), f, p, m[a + 12], 11, 3873151461), c, f, m[a + 15], 16, 530742520), b, c, m[a + 2], 23, 3299628645), p = n(p, b = n(b, c = n(c, f, p, b, m[a + 0], 6, 4096336452), f, p, m[a + 7], 10, 1126891415), c, f, m[a + 14], 15, 2878612391), b, c, m[a + 5], 21, 4237533241), p = n(p, b = n(b, c = n(c, f, p, b, m[a + 12], 6, 1700485571), f, p, m[a + 3], 10, 2399980690), c, f, m[a + 10], 15, 4293915773), b, c, m[a + 1], 21, 2240044497), p = n(p, b = n(b, c = n(c, f, p, b, m[a + 8], 6, 1873313359), f, p, m[a + 15], 10, 4264355552), c, f, m[a + 6], 15, 2734768916), b, c, m[a + 13], 21, 1309151649), p = n(p, b = n(b, c = n(c, f, p, b, m[a + 4], 6, 4149444226), f, p, m[a + 11], 10, 3174756917), c, f, m[a + 2], 15, 718787259), b, c, m[a + 9], 21, 3951481745), c = o(c, d), f = o(f, u), p = o(p, h), b = o(b, _);
			return (r(c) + r(f) + r(p) + r(b)).toLowerCase()
		}, t.getSecondsFromString = function (e) {
			var t = 0,
				o = 0,
				s = 0;
			if (e) return "0" == (t = (e = e.split(":"))[0])[0] && "0" != t[1] && (t = parseInt(t[1])), "00" == t && (t = 0), "0" == (o = e[1])[0] && "0" != o[1] && (o = parseInt(o[1])), "00" == o && (o = 0), secs = parseInt(e[2].replace(/,.*/gi, "")), "0" == secs[0] && "0" != secs[1] && (secs = parseInt(secs[1])), "00" == secs && (secs = 0), 0 != t && (s += 60 * t * 60), 0 != o && (s += 60 * o), s += secs
		}, t.getCanvasWithModifiedColor = function (e, t, o, s, i) {
			if (e) {
				var l, n, r = document.createElement("canvas"),
					a = r.getContext("2d"),
					d = null,
					u = parseInt(t.replace(/^#/, ""), 16),
					h = u >>> 16 & 255,
					_ = u >>> 8 & 255,
					c = 255 & u;
				r.style.position = "absolute", r.style.left = "0px", r.style.top = "0px", r.style.margin = "0px", r.style.padding = "0px", r.style.maxWidth = "none", r.style.maxHeight = "none", r.style.border = "none", r.style.lineHeight = "1", r.style.backgroundColor = "transparent", r.style.backfaceVisibility = "hidden", r.style.webkitBackfaceVisibility = "hidden", r.style.MozBackfaceVisibility = "hidden", r.style.MozImageRendering = "optimizeSpeed", r.style.WebkitImageRendering = "optimizeSpeed", null == s && (s = e.width, i = e.height), r.width = s, r.height = i, a.drawImage(e, 0, 0, e.naturalWidth, e.naturalHeight, 0, 0, s, i), n = a.getImageData(0, 0, s, i), d = a.getImageData(0, 0, s, i);
				for (var f = 0, p = n.data.length; f < p; f += 4) d.data[f + 3] > 0 && (d.data[f] = n.data[f] / 255 * h, d.data[f + 1] = n.data[f + 1] / 255 * _, d.data[f + 2] = n.data[f + 2] / 255 * c);
				return a.globalAlpha = .5, a.putImageData(d, 0, 0), a.drawImage(r, 0, 0), o && ((l = new Image).src = r.toDataURL()), {
					canvas: r,
					image: l
				}
			}
		}, t.changeCanvasHEXColor = function (e, t, o, s, i, l) {
			if (e) {
				var n, r = (t = t).getContext("2d"),
					a = null,
					d = parseInt(o.replace(/^#/, ""), 16),
					u = d >>> 16 & 255,
					h = d >>> 8 & 255,
					_ = 255 & d;
				i || (i = e.width, l = e.height), t.width = i, t.height = l, r.drawImage(e, 0, 0, e.naturalWidth, e.naturalHeight, 0, 0, i, l), n = r.getImageData(0, 0, i, l), a = r.getImageData(0, 0, i, l);
				for (var c = 0, f = n.data.length; c < f; c += 4) a.data[c + 3] > 0 && (a.data[c] = n.data[c] / 255 * u, a.data[c + 1] = n.data[c + 1] / 255 * h, a.data[c + 2] = n.data[c + 2] / 255 * _);
				if (r.globalAlpha = .5, r.putImageData(a, 0, 0), r.drawImage(t, 0, 0), s) {
					var p = new Image;
					return p.src = t.toDataURL(), p
				}
			}
		}, t.indexOfArray = function (e, t) {
			for (var o = e.length, s = 0; s < o; s++)
				if (e[s] === t) return s;
			return -1
		}, t.randomizeArray = function (e) {
			for (var t = [], o = e.concat(), s = o.length, i = 0; i < s; i++) {
				var l = Math.floor(Math.random() * o.length);
				t.push(o[l]), o.splice(l, 1)
			}
			return t
		}, t.parent = function (e, t) {
			for (void 0 === t && (t = 1); t-- && e;) e = e.parentNode;
			return e && 1 === e.nodeType ? e : null
		}, t.sibling = function (e, t) {
			for (; e && 0 !== t;)
				if (t > 0) {
					if (e.nextElementSibling) e = e.nextElementSibling;
					else
						for (e = e.nextSibling; e && 1 !== e.nodeType; e = e.nextSibling);
					t--
				} else {
					if (e.previousElementSibling) e = e.previousElementSibling;
					else
						for (e = e.previousSibling; e && 1 !== e.nodeType; e = e.previousSibling);
					t++
				}
			return e
		}, t.getChildAt = function (e, o) {
			var s = t.getChildren(e);
			return o < 0 && (o += s.length), o < 0 ? null : s[o]
		}, t.getChildById = function (e) {
			return document.getElementById(e) || void 0
		}, t.getChildren = function (e, t) {
			for (var o = [], s = e.firstChild; null != s; s = s.nextSibling) t ? o.push(s) : 1 === s.nodeType && o.push(s);
			return o
		}, t.getChildrenFromAttribute = function (e, o, s) {
			for (var i = [], l = e.firstChild; null != l; l = l.nextSibling) s && t.hasAttribute(l, o) ? i.push(l) : 1 === l.nodeType && t.hasAttribute(l, o) && i.push(l);
			return 0 == i.length ? void 0 : i
		}, t.getChildFromNodeListFromAttribute = function (e, o, s) {
			for (var i = e.firstChild; null != i; i = i.nextSibling) {
				if (s && t.hasAttribute(i, o)) return i;
				if (1 === i.nodeType && t.hasAttribute(i, o)) return i
			}
		}, t.getAttributeValue = function (e, o) {
			if (t.hasAttribute(e, o)) return e.getAttribute(o)
		}, t.hasAttribute = function (e, t) {
			return e.hasAttribute ? e.hasAttribute(t) : !!e.attributes[t]
		}, t.insertNodeAt = function (e, o, s) {
			var i = t.children(e);
			if (s < 0 || s > i.length) throw new Error("invalid index!");
			e.insertBefore(o, i[s])
		}, t.hasCanvas = function () {
			return Boolean(document.createElement("canvas"))
		}, t.hitTest = function (e, o, s) {
			if (!e) throw Error("Hit test target is null!");
			var i = e.getBoundingClientRect();
			if (parseInt(i.width) == i.width || t.isIEAndLessThen9) {
				if (o >= parseInt(i.left) && o <= parseInt(i.left + (i.right - i.left)) && s >= parseInt(i.top) && s <= parseInt(i.top + (i.bottom - i.top))) return !0
			} else if (o >= 100 * i.left && o <= 100 * i.left + (100 * i.right - 100 * i.left) && s >= 100 * i.top && s <= 100 * i.top + (100 * i.bottom - 100 * i.top)) return !0;
			return !1
		}, t.hitBuggyTest = function (e, t, o) {
			if (!e) throw Error("Hit test target is null!");
			e.getBoundingClientRect();
			return !1
		}, t.hasWEBGL = function () {
			try {
				var t = document.createElement("canvas");
				return !!e.WebGLRenderingContext && (t.getContext("webgl") || t.getContext("experimental-webgl"))
			} catch (e) {
				return !1
			}
		}(), t.isLocal = "file:" == document.location.protocol, t.getScrollOffsets = function () {
			return null != e.pageXOffset ? {
				x: e.pageXOffset,
				y: e.pageYOffset
			} : "CSS1Compat" == document.compatMode ? {
				x: document.documentElement.scrollLeft,
				y: document.documentElement.scrollTop
			} : void 0
		}, t.getViewportSize = function () {
			return t.hasPointerEvent && navigator.msMaxTouchPoints > 1 ? {
				w: document.documentElement.clientWidth || e.innerWidth,
				h: document.documentElement.clientHeight || e.innerHeight
			} : t.isMobile ? {
				w: e.innerWidth,
				h: e.innerHeight
			} : {
				w: document.documentElement.clientWidth || e.innerWidth,
				h: document.documentElement.clientHeight || e.innerHeight
			}
		}, t.getViewportMouseCoordinates = function (e) {
			var o = t.getScrollOffsets();
			return e.touches ? {
				screenX: null == e.touches[0] ? e.touches.pageX - o.x : e.touches[0].pageX - o.x,
				screenY: null == e.touches[0] ? e.touches.pageY - o.y : e.touches[0].pageY - o.y
			} : {
				screenX: null == e.clientX ? e.pageX - o.x : e.clientX,
				screenY: null == e.clientY ? e.pageY - o.y : e.clientY
			}
		}, t.hasPointerEvent = Boolean(e.navigator.msPointerEnabled) || Boolean(e.navigator.pointerEnabled), t.isMobile = function () {
			var e = ["android", "webos", "iphone", "ipad", "blackberry", "kfsowi"];
			for (i in e)
				if (-1 != navigator.userAgent.toLowerCase().indexOf(String(e[i]).toLowerCase())) return !0;
			return !1
		}(), t.isAndroid = -1 != navigator.userAgent.toLowerCase().indexOf("android".toLowerCase()), t.isChrome = -1 != navigator.userAgent.toLowerCase().indexOf("chrome"), t.isSafari = -1 != navigator.userAgent.toLowerCase().indexOf("safari") && -1 == navigator.userAgent.toLowerCase().indexOf("chrome"), t.isOpera = -1 != navigator.userAgent.toLowerCase().indexOf("opr"), t.isFirefox = -1 != navigator.userAgent.toLowerCase().indexOf("firefox"), t.isIEWebKit = Boolean(document.documentElement.msRequestFullscreen), t.isIE = Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("msie")) || Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("edge")) || Boolean(document.documentElement.msRequestFullscreen), t.isIEAndLessThen9 = Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("msie 7")) || Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("msie 8")), t.isIEAnd9OrLess = Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("msie 7")) || Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("msie 8")) || Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("msie 9")), t.isIE7 = Boolean(-1 != navigator.userAgent.toLowerCase().indexOf("msie 7")), t.isMac = Boolean(-1 != navigator.appVersion.toLowerCase().indexOf("mac")), t.isWin = Boolean(-1 != navigator.appVersion.toLowerCase().indexOf("win")), t.isIOS = navigator.userAgent.match(/(iPad|iPhone|iPod)/g), t.isIphone = navigator.userAgent.match(/(iPhone|iPod)/g), t.hasFullScreen = t.dumy.requestFullScreen || t.dumy.mozRequestFullScreen || t.dumy.webkitRequestFullScreen || t.dumy.msieRequestFullScreen, t.volumeCanBeSet = function () {
			var e = document.createElement("audio");
			if (e) return e.volume = 0, 0 == e.volume
		}(), t.getVideoFormat = function () {
			var e, t = document.createElement("video");
			if (t.canPlayType) return "probably" == t.canPlayType("video/mp4") || "maybe" == t.canPlayType("video/mp4") ? e = ".mp4" : "probably" == t.canPlayType("video/ogg") || "maybe" == t.canPlayType("video/ogg") ? e = ".ogg" : "probably" != t.canPlayType("video/webm") && "maybe" != t.canPlayType("video/webm") || (e = ".webm"), t = null, e
		}(), t.onReady = function (o) {
			document.addEventListener ? e.addEventListener("DOMContentLoaded", function () {
				t.checkIfHasTransofrms(), t.hasFullScreen = t.checkIfHasFullscreen(), setTimeout(o, 100)
			}) : document.onreadystatechange = function () {
				t.checkIfHasTransofrms(), t.hasFullScreen = t.checkIfHasFullscreen(), "complete" == document.readyState && setTimeout(o, 100)
			}
		}, t.checkIfHasTransofrms = function () {
			document.documentElement.appendChild(t.dumy), t.hasTransform3d = function () {
				for (var e, o, s = ["transform", "msTransform", "WebkitTransform", "MozTransform", "OTransform", "KhtmlTransform"]; e = s.shift();)
					if (void 0 !== t.dumy.style[e] && (t.dumy.style.position = "absolute", o = t.dumy.getBoundingClientRect().left, t.dumy.style[e] = "translate3d(500px, 0px, 0px)", (o = Math.abs(t.dumy.getBoundingClientRect().left - o)) > 100 && o < 900)) {
						try {
							document.documentElement.removeChild(t.dumy)
						} catch (e) {}
						return !0
					}
				try {
					document.documentElement.removeChild(t.dumy)
				} catch (e) {}
				return !1
			}(), t.hasTransform2d = function () {
				for (var e, o = ["transform", "msTransform", "WebkitTransform", "MozTransform", "OTransform", "KhtmlTransform"]; e = o.shift();)
					if (void 0 !== t.dumy.style[e]) return !0;
				try {
					document.documentElement.removeChild(t.dumy)
				} catch (e) {}
				return !1
			}(), t.isReadyMethodCalled_bl = !0
		}, t.checkIfHasFullscreen = function () {
			return Boolean(document.documentElement.requestFullScreen || document.documentElement.mozRequestFullScreen || document.documentElement.webkitRequestFullScreen || document.documentElement.msRequestFullscreen)
		}, t.disableElementSelection = function (e) {
			try {
				e.style.userSelect = "none"
			} catch (e) {}
			try {
				e.style.MozUserSelect = "none"
			} catch (e) {}
			try {
				e.style.webkitUserSelect = "none"
			} catch (e) {}
			try {
				e.style.khtmlUserSelect = "none"
			} catch (e) {}
			try {
				e.style.oUserSelect = "none"
			} catch (e) {}
			try {
				e.style.msUserSelect = "none"
			} catch (e) {}
			try {
				e.msUserSelect = "none"
			} catch (e) {}
			e.onselectstart = function () {
				return !1
			}
		}, t.getUrlArgs = function (e) {
			for (var t = {}, o = e.substr(e.indexOf("?") + 1) || location.search.substring(1), s = (o = o.replace(/(\?*)(\/*)/g, "")).split("&"), i = 0; i < s.length; i++) {
				var l = s[i].indexOf("="),
					n = s[i].substring(0, l),
					r = s[i].substring(l + 1);
				r = decodeURIComponent(r), t[n] = r
			}
			return t
		}, t.getHashUrlArgs = function (e) {
			for (var t = {}, o = e.substr(e.indexOf("#") + 1) || location.search.substring(1), s = (o = o.replace(/(\?*)(\/*)/g, "")).split("&"), i = 0; i < s.length; i++) {
				var l = s[i].indexOf("="),
					n = s[i].substring(0, l),
					r = s[i].substring(l + 1);
				r = decodeURIComponent(r), t[n] = r
			}
			return t
		}, t.validateEmail = function (e) {
			return !!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e)
		}, t.isReadyMethodCalled_bl = !1, e.FWDUVPUtils = t
	}(window), !window.FWDAnimation) {
	var _fwd_gsScope = "undefined" != typeof fwd_module && fwd_module.exports && "undefined" != typeof fwd_global ? fwd_global : this || window;
	(_fwd_gsScope._fwd_gsQueue || (_fwd_gsScope._fwd_gsQueue = [])).push(function () {
			"use strict";
			var e, t, o, s, i, l, n, r, a, d, u, h, _, c, f, p, b;
			_fwd_gsScope.FWDFWD_gsDefine("FWDAnimation", ["core.FWDAnim", "core.FWDSimpleTimeline", "FWDTweenLite"], function (e, t, o) {
				var s = function (e) {
						var t, o = [],
							s = e.length;
						for (t = 0; t !== s; o.push(e[t++]));
						return o
					},
					i = function (e, t, o) {
						var s, i, l = e.cycle;
						for (s in l) i = l[s], e[s] = "function" == typeof i ? i(o, t[o]) : i[o % i.length];
						delete e.cycle
					},
					l = function (e, t, s) {
						o.call(this, e, t, s), this._cycle = 0, this._yoyo = !0 === this.vars.yoyo, this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._dirty = !0, this.render = l.prototype.render
					},
					n = 1e-10,
					r = o._internals,
					a = r.isSelector,
					d = r.isArray,
					u = l.prototype = o.to({}, .1, {}),
					h = [];
				l.version = "1.19.0", u.constructor = l, u.kill()._gc = !1, l.killTweensOf = l.killDelayedCallsTo = o.killTweensOf, l.getTweensOf = o.getTweensOf, l.lagSmoothing = o.lagSmoothing, l.ticker = o.ticker, l.render = o.render, u.invalidate = function () {
					return this._yoyo = !0 === this.vars.yoyo, this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._uncache(!0), o.prototype.invalidate.call(this)
				}, u.updateTo = function (e, t) {
					var s, i = this.ratio,
						l = this.vars.immediateRender || e.immediateRender;
					for (s in t && this._startTime < this._timeline._time && (this._startTime = this._timeline._time, this._uncache(!1), this._gc ? this._enabled(!0, !1) : this._timeline.insert(this, this._startTime - this._delay)), e) this.vars[s] = e[s];
					if (this._initted || l)
						if (t) this._initted = !1, l && this.render(0, !0, !0);
						else if (this._gc && this._enabled(!0, !1), this._notifyPluginsOfEnabled && this._firstPT && o._onPluginEvent("_onDisable", this), this._time / this._duration > .998) {
						var n = this._totalTime;
						this.render(0, !0, !1), this._initted = !1, this.render(n, !0, !1)
					} else if (this._initted = !1, this._init(), this._time > 0 || l)
						for (var r, a = 1 / (1 - i), d = this._firstPT; d;) r = d.s + d.c, d.c *= a, d.s = r - d.c, d = d._next;
					return this
				}, u.render = function (e, t, o) {
					this._initted || 0 === this._duration && this.vars.repeat && this.invalidate();
					var s, i, l, a, d, u, h, _, c = this._dirty ? this.totalDuration() : this._totalDuration,
						f = this._time,
						p = this._totalTime,
						b = this._cycle,
						m = this._duration,
						g = this._rawPrevTime;
					if (e >= c - 1e-7 ? (this._totalTime = c, this._cycle = this._repeat, this._yoyo && 0 != (1 & this._cycle) ? (this._time = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0) : (this._time = m, this.ratio = this._ease._calcEnd ? this._ease.getRatio(1) : 1), this._reversed || (s = !0, i = "onComplete", o = o || this._timeline.autoRemoveChildren), 0 === m && (this._initted || !this.vars.lazy || o) && (this._startTime === this._timeline._duration && (e = 0), (g < 0 || e <= 0 && e >= -1e-7 || g === n && "isPause" !== this.data) && g !== e && (o = !0, g > n && (i = "onReverseComplete")), this._rawPrevTime = _ = !t || e || g === e ? e : n)) : e < 1e-7 ? (this._totalTime = this._time = this._cycle = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0, (0 !== p || 0 === m && g > 0) && (i = "onReverseComplete", s = this._reversed), e < 0 && (this._active = !1, 0 === m && (this._initted || !this.vars.lazy || o) && (g >= 0 && (o = !0), this._rawPrevTime = _ = !t || e || g === e ? e : n)), this._initted || (o = !0)) : (this._totalTime = this._time = e, 0 !== this._repeat && (a = m + this._repeatDelay, this._cycle = this._totalTime / a >> 0, 0 !== this._cycle && this._cycle === this._totalTime / a && p <= e && this._cycle--, this._time = this._totalTime - this._cycle * a, this._yoyo && 0 != (1 & this._cycle) && (this._time = m - this._time), this._time > m ? this._time = m : this._time < 0 && (this._time = 0)), this._easeType ? (d = this._time / m, (1 === (u = this._easeType) || 3 === u && d >= .5) && (d = 1 - d), 3 === u && (d *= 2), 1 === (h = this._easePower) ? d *= d : 2 === h ? d *= d * d : 3 === h ? d *= d * d * d : 4 === h && (d *= d * d * d * d), 1 === u ? this.ratio = 1 - d : 2 === u ? this.ratio = d : this._time / m < .5 ? this.ratio = d / 2 : this.ratio = 1 - d / 2) : this.ratio = this._ease.getRatio(this._time / m)), f !== this._time || o || b !== this._cycle) {
						if (!this._initted) {
							if (this._init(), !this._initted || this._gc) return;
							if (!o && this._firstPT && (!1 !== this.vars.lazy && this._duration || this.vars.lazy && !this._duration)) return this._time = f, this._totalTime = p, this._rawPrevTime = g, this._cycle = b, r.lazyTweens.push(this), void(this._lazy = [e, t]);
							this._time && !s ? this.ratio = this._ease.getRatio(this._time / m) : s && this._ease._calcEnd && (this.ratio = this._ease.getRatio(0 === this._time ? 0 : 1))
						}
						for (!1 !== this._lazy && (this._lazy = !1), this._active || !this._paused && this._time !== f && e >= 0 && (this._active = !0), 0 === p && (2 === this._initted && e > 0 && this._init(), this._startAt && (e >= 0 ? this._startAt.render(e, t, o) : i || (i = "_dummyGS")), this.vars.onStart && (0 === this._totalTime && 0 !== m || t || this._callback("onStart"))), l = this._firstPT; l;) {
							if (l.f) l.t[l.p](l.c * this.ratio + l.s);
							else {
								var y = l.c * this.ratio + l.s;
								"x" == l.p ? l.t.setX(y) : "y" == l.p ? l.t.setY(y) : "z" == l.p ? l.t.setZ(y) : "angleX" == l.p ? l.t.setAngleX(y) : "angleY" == l.p ? l.t.setAngleY(y) : "angleZ" == l.p ? l.t.setAngleZ(y) : "w" == l.p ? l.t.setWidth(y) : "h" == l.p ? l.t.setHeight(y) : "alpha" == l.p ? l.t.setAlpha(y) : "scale" == l.p ? l.t.setScale2(y) : l.t[l.p] = y
							}
							l = l._next
						}
						this._onUpdate && (e < 0 && this._startAt && this._startTime && this._startAt.render(e, t, o), t || (this._totalTime !== p || i) && this._callback("onUpdate")), this._cycle !== b && (t || this._gc || this.vars.onRepeat && this._callback("onRepeat")), i && (this._gc && !o || (e < 0 && this._startAt && !this._onUpdate && this._startTime && this._startAt.render(e, t, o), s && (this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[i] && this._callback(i), 0 === m && this._rawPrevTime === n && _ !== n && (this._rawPrevTime = 0)))
					} else p !== this._totalTime && this._onUpdate && (t || this._callback("onUpdate"))
				}, l.to = function (e, t, o) {
					return new l(e, t, o)
				}, l.from = function (e, t, o) {
					return o.runBackwards = !0, o.immediateRender = 0 != o.immediateRender, new l(e, t, o)
				}, l.fromTo = function (e, t, o, s) {
					return s.startAt = o, s.immediateRender = 0 != s.immediateRender && 0 != o.immediateRender, new l(e, t, s)
				}, l.staggerTo = l.allTo = function (e, t, n, r, u, _, c) {
					r = r || 0;
					var f, p, b, m, g = 0,
						y = [],
						v = function () {
							n.onComplete && n.onComplete.apply(n.onCompleteScope || this, arguments), u.apply(c || n.callbackScope || this, _ || h)
						},
						S = n.cycle,
						P = n.startAt && n.startAt.cycle;
					for (d(e) || ("string" == typeof e && (e = o.selector(e) || e), a(e) && (e = s(e))), e = e || [], r < 0 && ((e = s(e)).reverse(), r *= -1), f = e.length - 1, b = 0; b <= f; b++) {
						for (m in p = {}, n) p[m] = n[m];
						if (S && (i(p, e, b), null != p.duration && (t = p.duration, delete p.duration)), P) {
							for (m in P = p.startAt = {}, n.startAt) P[m] = n.startAt[m];
							i(p.startAt, e, b)
						}
						p.delay = g + (p.delay || 0), b === f && u && (p.onComplete = v), y[b] = new l(e[b], t, p), g += r
					}
					return y
				}, l.staggerFrom = l.allFrom = function (e, t, o, s, i, n, r) {
					return o.runBackwards = !0, o.immediateRender = 0 != o.immediateRender, l.staggerTo(e, t, o, s, i, n, r)
				}, l.staggerFromTo = l.allFromTo = function (e, t, o, s, i, n, r, a) {
					return s.startAt = o, s.immediateRender = 0 != s.immediateRender && 0 != o.immediateRender, l.staggerTo(e, t, s, i, n, r, a)
				}, l.delayedCall = function (e, t, o, s, i) {
					return new l(t, 0, {
						delay: e,
						onComplete: t,
						onCompleteParams: o,
						callbackScope: s,
						onReverseComplete: t,
						onReverseCompleteParams: o,
						immediateRender: !1,
						useFrames: i,
						overwrite: 0
					})
				}, l.set = function (e, t) {
					return new l(e, 0, t)
				}, l.isTweening = function (e) {
					return o.getTweensOf(e, !0).length > 0
				};
				var _ = function (e, t) {
						for (var s = [], i = 0, l = e._first; l;) l instanceof o ? s[i++] = l : (t && (s[i++] = l), i = (s = s.concat(_(l, t))).length), l = l._next;
						return s
					},
					c = l.getAllTweens = function (t) {
						return _(e._rootTimeline, t).concat(_(e._rootFramesTimeline, t))
					};
				l.killAll = function (e, o, s, i) {
					null == o && (o = !0), null == s && (s = !0);
					var l, n, r, a = c(0 != i),
						d = a.length,
						u = o && s && i;
					for (r = 0; r < d; r++) n = a[r], (u || n instanceof t || (l = n.target === n.vars.onComplete) && s || o && !l) && (e ? n.totalTime(n._reversed ? 0 : n.totalDuration()) : n._enabled(!1, !1))
				}, l.killChildTweensOf = function (e, t) {
					if (null != e) {
						var i, n, u, h, _, c = r.tweenLookup;
						if ("string" == typeof e && (e = o.selector(e) || e), a(e) && (e = s(e)), d(e))
							for (h = e.length; --h > -1;) l.killChildTweensOf(e[h], t);
						else {
							for (u in i = [], c)
								for (n = c[u].target.parentNode; n;) n === e && (i = i.concat(c[u].tweens)), n = n.parentNode;
							for (_ = i.length, h = 0; h < _; h++) t && i[h].totalTime(i[h].totalDuration()), i[h]._enabled(!1, !1)
						}
					}
				};
				var f = function (e, o, s, i) {
					o = !1 !== o, s = !1 !== s;
					for (var l, n, r = c(i = !1 !== i), a = o && s && i, d = r.length; --d > -1;) n = r[d], (a || n instanceof t || (l = n.target === n.vars.onComplete) && s || o && !l) && n.paused(e)
				};
				return l.pauseAll = function (e, t, o) {
					f(!0, e, t, o)
				}, l.resumeAll = function (e, t, o) {
					f(!1, e, t, o)
				}, l.globalTimeScale = function (t) {
					var s = e._rootTimeline,
						i = o.ticker.time;
					return arguments.length ? (t = t || n, s._startTime = i - (i - s._startTime) * s._timeScale / t, s = e._rootFramesTimeline, i = o.ticker.frame, s._startTime = i - (i - s._startTime) * s._timeScale / t, s._timeScale = e._rootTimeline._timeScale = t, t) : s._timeScale
				}, u.progress = function (e, t) {
					return arguments.length ? this.totalTime(this.duration() * (this._yoyo && 0 != (1 & this._cycle) ? 1 - e : e) + this._cycle * (this._duration + this._repeatDelay), t) : this._time / this.duration()
				}, u.totalProgress = function (e, t) {
					return arguments.length ? this.totalTime(this.totalDuration() * e, t) : this._totalTime / this.totalDuration()
				}, u.time = function (e, t) {
					return arguments.length ? (this._dirty && this.totalDuration(), e > this._duration && (e = this._duration), this._yoyo && 0 != (1 & this._cycle) ? e = this._duration - e + this._cycle * (this._duration + this._repeatDelay) : 0 !== this._repeat && (e += this._cycle * (this._duration + this._repeatDelay)), this.totalTime(e, t)) : this._time
				}, u.duration = function (t) {
					return arguments.length ? e.prototype.duration.call(this, t) : this._duration
				}, u.totalDuration = function (e) {
					return arguments.length ? -1 === this._repeat ? this : this.duration((e - this._repeat * this._repeatDelay) / (this._repeat + 1)) : (this._dirty && (this._totalDuration = -1 === this._repeat ? 999999999999 : this._duration * (this._repeat + 1) + this._repeatDelay * this._repeat, this._dirty = !1), this._totalDuration)
				}, u.repeat = function (e) {
					return arguments.length ? (this._repeat = e, this._uncache(!0)) : this._repeat
				}, u.repeatDelay = function (e) {
					return arguments.length ? (this._repeatDelay = e, this._uncache(!0)) : this._repeatDelay
				}, u.yoyo = function (e) {
					return arguments.length ? (this._yoyo = e, this) : this._yoyo
				}, l
			}, !0), _fwd_gsScope.FWDFWD_gsDefine("FWDTimelineLite", ["core.FWDAnim", "core.FWDSimpleTimeline", "FWDTweenLite"], function (e, t, o) {
				var s = function (e) {
						t.call(this, e), this._labels = {}, this.autoRemoveChildren = !0 === this.vars.autoRemoveChildren, this.smoothChildTiming = !0 === this.vars.smoothChildTiming, this._sortChildren = !0, this._onUpdate = this.vars.onUpdate;
						var o, s, i = this.vars;
						for (s in i) o = i[s], a(o) && -1 !== o.join("").indexOf("{self}") && (i[s] = this._swapSelfInParams(o));
						a(i.tweens) && this.add(i.tweens, 0, i.align, i.stagger)
					},
					i = 1e-10,
					l = o._internals,
					n = s._internals = {},
					r = l.isSelector,
					a = l.isArray,
					d = l.lazyTweens,
					u = l.lazyRender,
					h = _fwd_gsScope.FWDFWD_gsDefine.globals,
					_ = function (e) {
						var t, o = {};
						for (t in e) o[t] = e[t];
						return o
					},
					c = function (e, t, o) {
						var s, i, l = e.cycle;
						for (s in l) i = l[s], e[s] = "function" == typeof i ? i.call(t[o], o) : i[o % i.length];
						delete e.cycle
					},
					f = n.pauseCallback = function () {},
					p = function (e) {
						var t, o = [],
							s = e.length;
						for (t = 0; t !== s; o.push(e[t++]));
						return o
					},
					b = s.prototype = new t;
				return s.version = "1.19.0", b.constructor = s, b.kill()._gc = b._forcingPlayhead = b._hasPause = !1, b.to = function (e, t, s, i) {
					var l = s.repeat && h.FWDAnimation || o;
					return t ? this.add(new l(e, t, s), i) : this.set(e, s, i)
				}, b.from = function (e, t, s, i) {
					return this.add((s.repeat && h.FWDAnimation || o).from(e, t, s), i)
				}, b.fromTo = function (e, t, s, i, l) {
					var n = i.repeat && h.FWDAnimation || o;
					return t ? this.add(n.fromTo(e, t, s, i), l) : this.set(e, i, l)
				}, b.staggerTo = function (e, t, i, l, n, a, d, u) {
					var h, f, b = new s({
							onComplete: a,
							onCompleteParams: d,
							callbackScope: u,
							smoothChildTiming: this.smoothChildTiming
						}),
						m = i.cycle;
					for ("string" == typeof e && (e = o.selector(e) || e), r(e = e || []) && (e = p(e)), (l = l || 0) < 0 && ((e = p(e)).reverse(), l *= -1), f = 0; f < e.length; f++)(h = _(i)).startAt && (h.startAt = _(h.startAt), h.startAt.cycle && c(h.startAt, e, f)), m && (c(h, e, f), null != h.duration && (t = h.duration, delete h.duration)), b.to(e[f], t, h, f * l);
					return this.add(b, n)
				}, b.staggerFrom = function (e, t, o, s, i, l, n, r) {
					return o.immediateRender = 0 != o.immediateRender, o.runBackwards = !0, this.staggerTo(e, t, o, s, i, l, n, r)
				}, b.staggerFromTo = function (e, t, o, s, i, l, n, r, a) {
					return s.startAt = o, s.immediateRender = 0 != s.immediateRender && 0 != o.immediateRender, this.staggerTo(e, t, s, i, l, n, r, a)
				}, b.call = function (e, t, s, i) {
					return this.add(o.delayedCall(0, e, t, s), i)
				}, b.set = function (e, t, s) {
					return s = this._parseTimeOrLabel(s, 0, !0), null == t.immediateRender && (t.immediateRender = s === this._time && !this._paused), this.add(new o(e, 0, t), s)
				}, s.exportRoot = function (e, t) {
					null == (e = e || {}).smoothChildTiming && (e.smoothChildTiming = !0);
					var i, l, n = new s(e),
						r = n._timeline;
					for (null == t && (t = !0), r._remove(n, !0), n._startTime = 0, n._rawPrevTime = n._time = n._totalTime = r._time, i = r._first; i;) l = i._next, t && i instanceof o && i.target === i.vars.onComplete || n.add(i, i._startTime - i._delay), i = l;
					return r.add(n, 0), n
				}, b.add = function (i, l, n, r) {
					var d, u, h, _, c, f;
					if ("number" != typeof l && (l = this._parseTimeOrLabel(l, 0, !0, i)), !(i instanceof e)) {
						if (i instanceof Array || i && i.push && a(i)) {
							for (n = n || "normal", r = r || 0, d = l, u = i.length, h = 0; h < u; h++) a(_ = i[h]) && (_ = new s({
								tweens: _
							})), this.add(_, d), "string" != typeof _ && "function" != typeof _ && ("sequence" === n ? d = _._startTime + _.totalDuration() / _._timeScale : "start" === n && (_._startTime -= _.delay())), d += r;
							return this._uncache(!0)
						}
						if ("string" == typeof i) return this.addLabel(i, l);
						if ("function" != typeof i) throw "Cannot add " + i + " into the timeline; it is not a tween, timeline, function, or string.";
						i = o.delayedCall(0, i)
					}
					if (t.prototype.add.call(this, i, l), (this._gc || this._time === this._duration) && !this._paused && this._duration < this.duration())
						for (f = (c = this).rawTime() > i._startTime; c._timeline;) f && c._timeline.smoothChildTiming ? c.totalTime(c._totalTime, !0) : c._gc && c._enabled(!0, !1), c = c._timeline;
					return this
				}, b.remove = function (t) {
					if (t instanceof e) {
						this._remove(t, !1);
						var o = t._timeline = t.vars.useFrames ? e._rootFramesTimeline : e._rootTimeline;
						return t._startTime = (t._paused ? t._pauseTime : o._time) - (t._reversed ? t.totalDuration() - t._totalTime : t._totalTime) / t._timeScale, this
					}
					if (t instanceof Array || t && t.push && a(t)) {
						for (var s = t.length; --s > -1;) this.remove(t[s]);
						return this
					}
					return "string" == typeof t ? this.removeLabel(t) : this.kill(null, t)
				}, b._remove = function (e, o) {
					t.prototype._remove.call(this, e, o);
					var s = this._last;
					return s ? this._time > s._startTime + s._totalDuration / s._timeScale && (this._time = this.duration(), this._totalTime = this._totalDuration) : this._time = this._totalTime = this._duration = this._totalDuration = 0, this
				}, b.append = function (e, t) {
					return this.add(e, this._parseTimeOrLabel(null, t, !0, e))
				}, b.insert = b.insertMultiple = function (e, t, o, s) {
					return this.add(e, t || 0, o, s)
				}, b.appendMultiple = function (e, t, o, s) {
					return this.add(e, this._parseTimeOrLabel(null, t, !0, e), o, s)
				}, b.addLabel = function (e, t) {
					return this._labels[e] = this._parseTimeOrLabel(t), this
				}, b.addPause = function (e, t, s, i) {
					var l = o.delayedCall(0, f, s, i || this);
					return l.vars.onComplete = l.vars.onReverseComplete = t, l.data = "isPause", this._hasPause = !0, this.add(l, e)
				}, b.removeLabel = function (e) {
					return delete this._labels[e], this
				}, b.getLabelTime = function (e) {
					return null != this._labels[e] ? this._labels[e] : -1
				}, b._parseTimeOrLabel = function (t, o, s, i) {
					var l;
					if (i instanceof e && i.timeline === this) this.remove(i);
					else if (i && (i instanceof Array || i.push && a(i)))
						for (l = i.length; --l > -1;) i[l] instanceof e && i[l].timeline === this && this.remove(i[l]);
					if ("string" == typeof o) return this._parseTimeOrLabel(o, s && "number" == typeof t && null == this._labels[o] ? t - this.duration() : 0, s);
					if (o = o || 0, "string" != typeof t || !isNaN(t) && null == this._labels[t]) null == t && (t = this.duration());
					else {
						if (-1 === (l = t.indexOf("="))) return null == this._labels[t] ? s ? this._labels[t] = this.duration() + o : o : this._labels[t] + o;
						o = parseInt(t.charAt(l - 1) + "1", 10) * Number(t.substr(l + 1)), t = l > 1 ? this._parseTimeOrLabel(t.substr(0, l - 1), 0, s) : this.duration()
					}
					return Number(t) + o
				}, b.seek = function (e, t) {
					return this.totalTime("number" == typeof e ? e : this._parseTimeOrLabel(e), !1 !== t)
				}, b.stop = function () {
					return this.paused(!0)
				}, b.gotoAndPlay = function (e, t) {
					return this.play(e, t)
				}, b.gotoAndStop = function (e, t) {
					return this.pause(e, t)
				}, b.render = function (e, t, o) {
					this._gc && this._enabled(!0, !1);
					var s, l, n, r, a, h, _, c = this._dirty ? this.totalDuration() : this._totalDuration,
						f = this._time,
						p = this._startTime,
						b = this._timeScale,
						m = this._paused;
					if (e >= c - 1e-7) this._totalTime = this._time = c, this._reversed || this._hasPausedChild() || (l = !0, r = "onComplete", a = !!this._timeline.autoRemoveChildren, 0 === this._duration && (e <= 0 && e >= -1e-7 || this._rawPrevTime < 0 || this._rawPrevTime === i) && this._rawPrevTime !== e && this._first && (a = !0, this._rawPrevTime > i && (r = "onReverseComplete"))), this._rawPrevTime = this._duration || !t || e || this._rawPrevTime === e ? e : i, e = c + 1e-4;
					else if (e < 1e-7)
						if (this._totalTime = this._time = 0, (0 !== f || 0 === this._duration && this._rawPrevTime !== i && (this._rawPrevTime > 0 || e < 0 && this._rawPrevTime >= 0)) && (r = "onReverseComplete", l = this._reversed), e < 0) this._active = !1, this._timeline.autoRemoveChildren && this._reversed ? (a = l = !0, r = "onReverseComplete") : this._rawPrevTime >= 0 && this._first && (a = !0), this._rawPrevTime = e;
						else {
							if (this._rawPrevTime = this._duration || !t || e || this._rawPrevTime === e ? e : i, 0 === e && l)
								for (s = this._first; s && 0 === s._startTime;) s._duration || (l = !1), s = s._next;
							e = 0, this._initted || (a = !0)
						}
					else {
						if (this._hasPause && !this._forcingPlayhead && !t) {
							if (e >= f)
								for (s = this._first; s && s._startTime <= e && !h;) s._duration || "isPause" !== s.data || s.ratio || 0 === s._startTime && 0 === this._rawPrevTime || (h = s), s = s._next;
							else
								for (s = this._last; s && s._startTime >= e && !h;) s._duration || "isPause" === s.data && s._rawPrevTime > 0 && (h = s), s = s._prev;
							h && (this._time = e = h._startTime, this._totalTime = e + this._cycle * (this._totalDuration + this._repeatDelay))
						}
						this._totalTime = this._time = this._rawPrevTime = e
					}
					if (this._time !== f && this._first || o || a || h) {
						if (this._initted || (this._initted = !0), this._active || !this._paused && this._time !== f && e > 0 && (this._active = !0), 0 === f && this.vars.onStart && (0 === this._time && this._duration || t || this._callback("onStart")), (_ = this._time) >= f)
							for (s = this._first; s && (n = s._next, _ === this._time && (!this._paused || m));)(s._active || s._startTime <= _ && !s._paused && !s._gc) && (h === s && this.pause(), s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (e - s._startTime) * s._timeScale, t, o) : s.render((e - s._startTime) * s._timeScale, t, o)), s = n;
						else
							for (s = this._last; s && (n = s._prev, _ === this._time && (!this._paused || m));) {
								if (s._active || s._startTime <= f && !s._paused && !s._gc) {
									if (h === s) {
										for (h = s._prev; h && h.endTime() > this._time;) h.render(h._reversed ? h.totalDuration() - (e - h._startTime) * h._timeScale : (e - h._startTime) * h._timeScale, t, o), h = h._prev;
										h = null, this.pause()
									}
									s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (e - s._startTime) * s._timeScale, t, o) : s.render((e - s._startTime) * s._timeScale, t, o)
								}
								s = n
							}
						this._onUpdate && (t || (d.length && u(), this._callback("onUpdate"))), r && (this._gc || p !== this._startTime && b === this._timeScale || (0 === this._time || c >= this.totalDuration()) && (l && (d.length && u(), this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[r] && this._callback(r)))
					}
				}, b._hasPausedChild = function () {
					for (var e = this._first; e;) {
						if (e._paused || e instanceof s && e._hasPausedChild()) return !0;
						e = e._next
					}
					return !1
				}, b.getChildren = function (e, t, s, i) {
					i = i || -9999999999;
					for (var l = [], n = this._first, r = 0; n;) n._startTime < i || (n instanceof o ? !1 !== t && (l[r++] = n) : (!1 !== s && (l[r++] = n), !1 !== e && (r = (l = l.concat(n.getChildren(!0, t, s))).length))), n = n._next;
					return l
				}, b.getTweensOf = function (e, t) {
					var s, i, l = this._gc,
						n = [],
						r = 0;
					for (l && this._enabled(!0, !0), i = (s = o.getTweensOf(e)).length; --i > -1;)(s[i].timeline === this || t && this._contains(s[i])) && (n[r++] = s[i]);
					return l && this._enabled(!1, !0), n
				}, b.recent = function () {
					return this._recent
				}, b._contains = function (e) {
					for (var t = e.timeline; t;) {
						if (t === this) return !0;
						t = t.timeline
					}
					return !1
				}, b.shiftChildren = function (e, t, o) {
					o = o || 0;
					for (var s, i = this._first, l = this._labels; i;) i._startTime >= o && (i._startTime += e), i = i._next;
					if (t)
						for (s in l) l[s] >= o && (l[s] += e);
					return this._uncache(!0)
				}, b._kill = function (e, t) {
					if (!e && !t) return this._enabled(!1, !1);
					for (var o = t ? this.getTweensOf(t) : this.getChildren(!0, !0, !1), s = o.length, i = !1; --s > -1;) o[s]._kill(e, t) && (i = !0);
					return i
				}, b.clear = function (e) {
					var t = this.getChildren(!1, !0, !0),
						o = t.length;
					for (this._time = this._totalTime = 0; --o > -1;) t[o]._enabled(!1, !1);
					return !1 !== e && (this._labels = {}), this._uncache(!0)
				}, b.invalidate = function () {
					for (var t = this._first; t;) t.invalidate(), t = t._next;
					return e.prototype.invalidate.call(this)
				}, b._enabled = function (e, o) {
					if (e === this._gc)
						for (var s = this._first; s;) s._enabled(e, !0), s = s._next;
					return t.prototype._enabled.call(this, e, o)
				}, b.totalTime = function (t, o, s) {
					this._forcingPlayhead = !0;
					var i = e.prototype.totalTime.apply(this, arguments);
					return this._forcingPlayhead = !1, i
				}, b.duration = function (e) {
					return arguments.length ? (0 !== this.duration() && 0 !== e && this.timeScale(this._duration / e), this) : (this._dirty && this.totalDuration(), this._duration)
				}, b.totalDuration = function (e) {
					if (!arguments.length) {
						if (this._dirty) {
							for (var t, o, s = 0, i = this._last, l = 999999999999; i;) t = i._prev, i._dirty && i.totalDuration(), i._startTime > l && this._sortChildren && !i._paused ? this.add(i, i._startTime - i._delay) : l = i._startTime, i._startTime < 0 && !i._paused && (s -= i._startTime, this._timeline.smoothChildTiming && (this._startTime += i._startTime / this._timeScale), this.shiftChildren(-i._startTime, !1, -9999999999), l = 0), (o = i._startTime + i._totalDuration / i._timeScale) > s && (s = o), i = t;
							this._duration = this._totalDuration = s, this._dirty = !1
						}
						return this._totalDuration
					}
					return e && this.totalDuration() ? this.timeScale(this._totalDuration / e) : this
				}, b.paused = function (t) {
					if (!t)
						for (var o = this._first, s = this._time; o;) o._startTime === s && "isPause" === o.data && (o._rawPrevTime = 0), o = o._next;
					return e.prototype.paused.apply(this, arguments)
				}, b.usesFrames = function () {
					for (var t = this._timeline; t._timeline;) t = t._timeline;
					return t === e._rootFramesTimeline
				}, b.rawTime = function () {
					return this._paused ? this._totalTime : (this._timeline.rawTime() - this._startTime) * this._timeScale
				}, s
			}, !0), _fwd_gsScope.FWDFWD_gsDefine("TimelineMax", ["FWDTimelineLite", "FWDTweenLite", "easing.Ease"], function (e, t, o) {
				var s = function (t) {
						e.call(this, t), this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._cycle = 0, this._yoyo = !0 === this.vars.yoyo, this._dirty = !0
					},
					i = 1e-10,
					l = t._internals,
					n = l.lazyTweens,
					r = l.lazyRender,
					a = _fwd_gsScope.FWDFWD_gsDefine.globals,
					d = new o(null, null, 1, 0),
					u = s.prototype = new e;
				return u.constructor = s, u.kill()._gc = !1, s.version = "1.19.0", u.invalidate = function () {
					return this._yoyo = !0 === this.vars.yoyo, this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._uncache(!0), e.prototype.invalidate.call(this)
				}, u.addCallback = function (e, o, s, i) {
					return this.add(t.delayedCall(0, e, s, i), o)
				}, u.removeCallback = function (e, t) {
					if (e)
						if (null == t) this._kill(null, e);
						else
							for (var o = this.getTweensOf(e, !1), s = o.length, i = this._parseTimeOrLabel(t); --s > -1;) o[s]._startTime === i && o[s]._enabled(!1, !1);
					return this
				}, u.removePause = function (t) {
					return this.removeCallback(e._internals.pauseCallback, t)
				}, u.tweenTo = function (e, o) {
					o = o || {};
					var s, i, l, n = {
							ease: d,
							useFrames: this.usesFrames(),
							immediateRender: !1
						},
						r = o.repeat && a.FWDAnimation || t;
					for (i in o) n[i] = o[i];
					return n.time = this._parseTimeOrLabel(e), s = Math.abs(Number(n.time) - this._time) / this._timeScale || .001, l = new r(this, s, n), n.onStart = function () {
						l.target.paused(!0), l.vars.time !== l.target.time() && s === l.duration() && l.duration(Math.abs(l.vars.time - l.target.time()) / l.target._timeScale), o.onStart && l._callback("onStart")
					}, l
				}, u.tweenFromTo = function (e, t, o) {
					o = o || {}, e = this._parseTimeOrLabel(e), o.startAt = {
						onComplete: this.seek,
						onCompleteParams: [e],
						callbackScope: this
					}, o.immediateRender = !1 !== o.immediateRender;
					var s = this.tweenTo(t, o);
					return s.duration(Math.abs(s.vars.time - e) / this._timeScale || .001)
				}, u.render = function (e, t, o) {
					this._gc && this._enabled(!0, !1);
					var s, l, a, d, u, h, _, c, f = this._dirty ? this.totalDuration() : this._totalDuration,
						p = this._duration,
						b = this._time,
						m = this._totalTime,
						g = this._startTime,
						y = this._timeScale,
						v = this._rawPrevTime,
						S = this._paused,
						P = this._cycle;
					if (e >= f - 1e-7) this._locked || (this._totalTime = f, this._cycle = this._repeat), this._reversed || this._hasPausedChild() || (l = !0, d = "onComplete", u = !!this._timeline.autoRemoveChildren, 0 === this._duration && (e <= 0 && e >= -1e-7 || v < 0 || v === i) && v !== e && this._first && (u = !0, v > i && (d = "onReverseComplete"))), this._rawPrevTime = this._duration || !t || e || this._rawPrevTime === e ? e : i, this._yoyo && 0 != (1 & this._cycle) ? this._time = e = 0 : (this._time = p, e = p + 1e-4);
					else if (e < 1e-7)
						if (this._locked || (this._totalTime = this._cycle = 0), this._time = 0, (0 !== b || 0 === p && v !== i && (v > 0 || e < 0 && v >= 0) && !this._locked) && (d = "onReverseComplete", l = this._reversed), e < 0) this._active = !1, this._timeline.autoRemoveChildren && this._reversed ? (u = l = !0, d = "onReverseComplete") : v >= 0 && this._first && (u = !0), this._rawPrevTime = e;
						else {
							if (this._rawPrevTime = p || !t || e || this._rawPrevTime === e ? e : i, 0 === e && l)
								for (s = this._first; s && 0 === s._startTime;) s._duration || (l = !1), s = s._next;
							e = 0, this._initted || (u = !0)
						}
					else if (0 === p && v < 0 && (u = !0), this._time = this._rawPrevTime = e, this._locked || (this._totalTime = e, 0 !== this._repeat && (h = p + this._repeatDelay, this._cycle = this._totalTime / h >> 0, 0 !== this._cycle && this._cycle === this._totalTime / h && m <= e && this._cycle--, this._time = this._totalTime - this._cycle * h, this._yoyo && 0 != (1 & this._cycle) && (this._time = p - this._time), this._time > p ? (this._time = p, e = p + 1e-4) : this._time < 0 ? this._time = e = 0 : e = this._time)), this._hasPause && !this._forcingPlayhead && !t) {
						if ((e = this._time) >= b)
							for (s = this._first; s && s._startTime <= e && !_;) s._duration || "isPause" !== s.data || s.ratio || 0 === s._startTime && 0 === this._rawPrevTime || (_ = s), s = s._next;
						else
							for (s = this._last; s && s._startTime >= e && !_;) s._duration || "isPause" === s.data && s._rawPrevTime > 0 && (_ = s), s = s._prev;
						_ && (this._time = e = _._startTime, this._totalTime = e + this._cycle * (this._totalDuration + this._repeatDelay))
					}
					if (this._cycle !== P && !this._locked) {
						var w = this._yoyo && 0 != (1 & P),
							T = w === (this._yoyo && 0 != (1 & this._cycle)),
							D = this._totalTime,
							B = this._cycle,
							H = this._rawPrevTime,
							W = this._time;
						if (this._totalTime = P * p, this._cycle < P ? w = !w : this._totalTime += p, this._time = b, this._rawPrevTime = 0 === p ? v - 1e-4 : v, this._cycle = P, this._locked = !0, b = w ? 0 : p, this.render(b, t, 0 === p), t || this._gc || this.vars.onRepeat && this._callback("onRepeat"), b !== this._time) return;
						if (T && (b = w ? p + 1e-4 : -1e-4, this.render(b, !0, !1)), this._locked = !1, this._paused && !S) return;
						this._time = W, this._totalTime = D, this._cycle = B, this._rawPrevTime = H
					}
					if (this._time !== b && this._first || o || u || _) {
						if (this._initted || (this._initted = !0), this._active || !this._paused && this._totalTime !== m && e > 0 && (this._active = !0), 0 === m && this.vars.onStart && (0 === this._totalTime && this._totalDuration || t || this._callback("onStart")), (c = this._time) >= b)
							for (s = this._first; s && (a = s._next, c === this._time && (!this._paused || S));)(s._active || s._startTime <= this._time && !s._paused && !s._gc) && (_ === s && this.pause(), s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (e - s._startTime) * s._timeScale, t, o) : s.render((e - s._startTime) * s._timeScale, t, o)), s = a;
						else
							for (s = this._last; s && (a = s._prev, c === this._time && (!this._paused || S));) {
								if (s._active || s._startTime <= b && !s._paused && !s._gc) {
									if (_ === s) {
										for (_ = s._prev; _ && _.endTime() > this._time;) _.render(_._reversed ? _.totalDuration() - (e - _._startTime) * _._timeScale : (e - _._startTime) * _._timeScale, t, o), _ = _._prev;
										_ = null, this.pause()
									}
									s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (e - s._startTime) * s._timeScale, t, o) : s.render((e - s._startTime) * s._timeScale, t, o)
								}
								s = a
							}
						this._onUpdate && (t || (n.length && r(), this._callback("onUpdate"))), d && (this._locked || this._gc || g !== this._startTime && y === this._timeScale || (0 === this._time || f >= this.totalDuration()) && (l && (n.length && r(), this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[d] && this._callback(d)))
					} else m !== this._totalTime && this._onUpdate && (t || this._callback("onUpdate"))
				}, u.getActive = function (e, t, o) {
					null == e && (e = !0), null == t && (t = !0), null == o && (o = !1);
					var s, i, l = [],
						n = this.getChildren(e, t, o),
						r = 0,
						a = n.length;
					for (s = 0; s < a; s++)(i = n[s]).isActive() && (l[r++] = i);
					return l
				}, u.getLabelAfter = function (e) {
					e || 0 !== e && (e = this._time);
					var t, o = this.getLabelsArray(),
						s = o.length;
					for (t = 0; t < s; t++)
						if (o[t].time > e) return o[t].name;
					return null
				}, u.getLabelBefore = function (e) {
					null == e && (e = this._time);
					for (var t = this.getLabelsArray(), o = t.length; --o > -1;)
						if (t[o].time < e) return t[o].name;
					return null
				}, u.getLabelsArray = function () {
					var e, t = [],
						o = 0;
					for (e in this._labels) t[o++] = {
						time: this._labels[e],
						name: e
					};
					return t.sort(function (e, t) {
						return e.time - t.time
					}), t
				}, u.progress = function (e, t) {
					return arguments.length ? this.totalTime(this.duration() * (this._yoyo && 0 != (1 & this._cycle) ? 1 - e : e) + this._cycle * (this._duration + this._repeatDelay), t) : this._time / this.duration()
				}, u.totalProgress = function (e, t) {
					return arguments.length ? this.totalTime(this.totalDuration() * e, t) : this._totalTime / this.totalDuration()
				}, u.totalDuration = function (t) {
					return arguments.length ? -1 !== this._repeat && t ? this.timeScale(this.totalDuration() / t) : this : (this._dirty && (e.prototype.totalDuration.call(this), this._totalDuration = -1 === this._repeat ? 999999999999 : this._duration * (this._repeat + 1) + this._repeatDelay * this._repeat), this._totalDuration)
				}, u.time = function (e, t) {
					return arguments.length ? (this._dirty && this.totalDuration(), e > this._duration && (e = this._duration), this._yoyo && 0 != (1 & this._cycle) ? e = this._duration - e + this._cycle * (this._duration + this._repeatDelay) : 0 !== this._repeat && (e += this._cycle * (this._duration + this._repeatDelay)), this.totalTime(e, t)) : this._time
				}, u.repeat = function (e) {
					return arguments.length ? (this._repeat = e, this._uncache(!0)) : this._repeat
				}, u.repeatDelay = function (e) {
					return arguments.length ? (this._repeatDelay = e, this._uncache(!0)) : this._repeatDelay
				}, u.yoyo = function (e) {
					return arguments.length ? (this._yoyo = e, this) : this._yoyo
				}, u.currentLabel = function (e) {
					return arguments.length ? this.seek(e, !0) : this.getLabelBefore(this._time + 1e-8)
				}, s
			}, !0), e = 180 / Math.PI, t = [], o = [], s = [], i = {}, l = _fwd_gsScope.FWDFWD_gsDefine.globals, n = function (e, t, o, s) {
				o === s && (o = s - (s - t) / 1e6), e === t && (t = e + (o - e) / 1e6), this.a = e, this.b = t, this.c = o, this.d = s, this.da = s - e, this.ca = o - e, this.ba = t - e
			}, r = function (e, t, o, s) {
				var i = {
						a: e
					},
					l = {},
					n = {},
					r = {
						c: s
					},
					a = (e + t) / 2,
					d = (t + o) / 2,
					u = (o + s) / 2,
					h = (a + d) / 2,
					_ = (d + u) / 2,
					c = (_ - h) / 8;
				return i.b = a + (e - a) / 4, l.b = h + c, i.c = l.a = (i.b + l.b) / 2, l.c = n.a = (h + _) / 2, n.b = _ - c, r.b = u + (s - u) / 4, n.c = r.a = (n.b + r.b) / 2, [i, l, n, r]
			}, a = function (e, i, l, n, a) {
				var d, u, h, _, c, f, p, b, m, g, y, v, S, P = e.length - 1,
					w = 0,
					T = e[0].a;
				for (d = 0; d < P; d++) u = (c = e[w]).a, h = c.d, _ = e[w + 1].d, a ? (y = t[d], S = ((v = o[d]) + y) * i * .25 / (n ? .5 : s[d] || .5), b = h - ((f = h - (h - u) * (n ? .5 * i : 0 !== y ? S / y : 0)) + (((p = h + (_ - h) * (n ? .5 * i : 0 !== v ? S / v : 0)) - f) * (3 * y / (y + v) + .5) / 4 || 0))) : b = h - ((f = h - (h - u) * i * .5) + (p = h + (_ - h) * i * .5)) / 2, f += b, p += b, c.c = m = f, c.b = 0 !== d ? T : T = c.a + .6 * (c.c - c.a), c.da = h - u, c.ca = m - u, c.ba = T - u, l ? (g = r(u, T, m, h), e.splice(w, 1, g[0], g[1], g[2], g[3]), w += 4) : w++, T = p;
				(c = e[w]).b = T, c.c = T + .4 * (c.d - T), c.da = c.d - c.a, c.ca = c.c - c.a, c.ba = T - c.a, l && (g = r(c.a, T, c.c, c.d), e.splice(w, 1, g[0], g[1], g[2], g[3]))
			}, d = function (e, s, i, l) {
				var r, a, d, u, h, _, c = [];
				if (l)
					for (a = (e = [l].concat(e)).length; --a > -1;) "string" == typeof (_ = e[a][s]) && "=" === _.charAt(1) && (e[a][s] = l[s] + Number(_.charAt(0) + _.substr(2)));
				if ((r = e.length - 2) < 0) return c[0] = new n(e[0][s], 0, 0, e[r < -1 ? 0 : 1][s]), c;
				for (a = 0; a < r; a++) d = e[a][s], u = e[a + 1][s], c[a] = new n(d, 0, 0, u), i && (h = e[a + 2][s], t[a] = (t[a] || 0) + (u - d) * (u - d), o[a] = (o[a] || 0) + (h - u) * (h - u));
				return c[a] = new n(e[a][s], 0, 0, e[a + 1][s]), c
			}, u = function (e, l, n, r, u, h) {
				var _, c, f, p, b, m, g, y, v = {},
					S = [],
					P = h || e[0];
				for (c in u = "string" == typeof u ? "," + u + "," : ",x,y,z,left,top,right,bottom,marginTop,marginLeft,marginRight,marginBottom,paddingLeft,paddingTop,paddingRight,paddingBottom,backgroundPosition,backgroundPosition_y,", null == l && (l = 1), e[0]) S.push(c);
				if (e.length > 1) {
					for (y = e[e.length - 1], g = !0, _ = S.length; --_ > -1;)
						if (c = S[_], Math.abs(P[c] - y[c]) > .05) {
							g = !1;
							break
						}
					g && (e = e.concat(), h && e.unshift(h), e.push(e[1]), h = e[e.length - 3])
				}
				for (t.length = o.length = s.length = 0, _ = S.length; --_ > -1;) c = S[_], i[c] = -1 !== u.indexOf("," + c + ","), v[c] = d(e, c, i[c], h);
				for (_ = t.length; --_ > -1;) t[_] = Math.sqrt(t[_]), o[_] = Math.sqrt(o[_]);
				if (!r) {
					for (_ = S.length; --_ > -1;)
						if (i[c])
							for (m = (f = v[S[_]]).length - 1, p = 0; p < m; p++) b = f[p + 1].da / o[p] + f[p].da / t[p] || 0, s[p] = (s[p] || 0) + b * b;
					for (_ = s.length; --_ > -1;) s[_] = Math.sqrt(s[_])
				}
				for (_ = S.length, p = n ? 4 : 1; --_ > -1;) f = v[c = S[_]], a(f, l, n, r, i[c]), g && (f.splice(0, p), f.splice(f.length - p, p));
				return v
			}, h = function (e, t, o) {
				for (var s, i, l, n, r, a, d, u, h, _, c, f = 1 / o, p = e.length; --p > -1;)
					for (l = (_ = e[p]).a, n = _.d - l, r = _.c - l, a = _.b - l, s = i = 0, u = 1; u <= o; u++) s = i - (i = ((d = f * u) * d * n + 3 * (h = 1 - d) * (d * r + h * a)) * d), t[c = p * o + u - 1] = (t[c] || 0) + s * s
			}, _ = _fwd_gsScope.FWDFWD_gsDefine.plugin({
				propName: "bezier",
				priority: -1,
				version: "1.3.7",
				API: 2,
				fwd_global: !0,
				init: function (e, t, o) {
					this._target = e, t instanceof Array && (t = {
						values: t
					}), this._func = {}, this._mod = {}, this._props = [], this._timeRes = null == t.timeResolution ? 6 : parseInt(t.timeResolution, 10);
					var s, i, l, r, a, d = t.values || [],
						_ = {},
						c = d[0],
						f = t.autoRotate || o.vars.orientToBezier;
					for (s in this._autoRotate = f ? f instanceof Array ? f : [
							["x", "y", "rotation", !0 === f ? 0 : Number(f) || 0]
						] : null, c) this._props.push(s);
					for (l = this._props.length; --l > -1;) s = this._props[l], this._overwriteProps.push(s), i = this._func[s] = "function" == typeof e[s], _[s] = i ? e[s.indexOf("set") || "function" != typeof e["get" + s.substr(3)] ? s : "get" + s.substr(3)]() : parseFloat(e[s]), a || _[s] !== d[0][s] && (a = _);
					if (this._beziers = "cubic" !== t.type && "quadratic" !== t.type && "soft" !== t.type ? u(d, isNaN(t.curviness) ? 1 : t.curviness, !1, "thruBasic" === t.type, t.correlate, a) : function (e, t, o) {
							var s, i, l, r, a, d, u, h, _, c, f, p = {},
								b = "cubic" === (t = t || "soft") ? 3 : 2,
								m = "soft" === t,
								g = [];
							if (m && o && (e = [o].concat(e)), null == e || e.length < b + 1) throw "invalid Bezier data";
							for (_ in e[0]) g.push(_);
							for (d = g.length; --d > -1;) {
								for (p[_ = g[d]] = a = [], c = 0, h = e.length, u = 0; u < h; u++) s = null == o ? e[u][_] : "string" == typeof (f = e[u][_]) && "=" === f.charAt(1) ? o[_] + Number(f.charAt(0) + f.substr(2)) : Number(f), m && u > 1 && u < h - 1 && (a[c++] = (s + a[c - 2]) / 2), a[c++] = s;
								for (h = c - b + 1, c = 0, u = 0; u < h; u += b) s = a[u], i = a[u + 1], l = a[u + 2], r = 2 === b ? 0 : a[u + 3], a[c++] = f = 3 === b ? new n(s, i, l, r) : new n(s, (2 * i + s) / 3, (2 * i + l) / 3, l);
								a.length = c
							}
							return p
						}(d, t.type, _), this._segCount = this._beziers[s].length, this._timeRes) {
						var p = function (e, t) {
							var o, s, i, l, n = [],
								r = [],
								a = 0,
								d = 0,
								u = (t = t >> 0 || 6) - 1,
								_ = [],
								c = [];
							for (o in e) h(e[o], n, t);
							for (i = n.length, s = 0; s < i; s++) a += Math.sqrt(n[s]), c[l = s % t] = a, l === u && (d += a, _[l = s / t >> 0] = c, r[l] = d, a = 0, c = []);
							return {
								length: d,
								lengths: r,
								segments: _
							}
						}(this._beziers, this._timeRes);
						this._length = p.length, this._lengths = p.lengths, this._segments = p.segments, this._l1 = this._li = this._s1 = this._si = 0, this._l2 = this._lengths[0], this._curSeg = this._segments[0], this._s2 = this._curSeg[0], this._prec = 1 / this._curSeg.length
					}
					if (f = this._autoRotate)
						for (this._initialRotations = [], f[0] instanceof Array || (this._autoRotate = f = [f]), l = f.length; --l > -1;) {
							for (r = 0; r < 3; r++) s = f[l][r], this._func[s] = "function" == typeof e[s] && e[s.indexOf("set") || "function" != typeof e["get" + s.substr(3)] ? s : "get" + s.substr(3)];
							s = f[l][2], this._initialRotations[l] = (this._func[s] ? this._func[s].call(this._target) : this._target[s]) || 0, this._overwriteProps.push(s)
						}
					return this._startRatio = o.vars.runBackwards ? 1 : 0, !0
				},
				set: function (t) {
					var o, s, i, l, n, r, a, d, u, h, _ = this._segCount,
						c = this._func,
						f = this._target,
						p = t !== this._startRatio;
					if (this._timeRes) {
						if (u = this._lengths, h = this._curSeg, t *= this._length, i = this._li, t > this._l2 && i < _ - 1) {
							for (d = _ - 1; i < d && (this._l2 = u[++i]) <= t;);
							this._l1 = u[i - 1], this._li = i, this._curSeg = h = this._segments[i], this._s2 = h[this._s1 = this._si = 0]
						} else if (t < this._l1 && i > 0) {
							for (; i > 0 && (this._l1 = u[--i]) >= t;);
							0 === i && t < this._l1 ? this._l1 = 0 : i++, this._l2 = u[i], this._li = i, this._curSeg = h = this._segments[i], this._s1 = h[(this._si = h.length - 1) - 1] || 0, this._s2 = h[this._si]
						}
						if (o = i, t -= this._l1, i = this._si, t > this._s2 && i < h.length - 1) {
							for (d = h.length - 1; i < d && (this._s2 = h[++i]) <= t;);
							this._s1 = h[i - 1], this._si = i
						} else if (t < this._s1 && i > 0) {
							for (; i > 0 && (this._s1 = h[--i]) >= t;);
							0 === i && t < this._s1 ? this._s1 = 0 : i++, this._s2 = h[i], this._si = i
						}
						r = (i + (t - this._s1) / (this._s2 - this._s1)) * this._prec || 0
					} else r = (t - (o = t < 0 ? 0 : t >= 1 ? _ - 1 : _ * t >> 0) * (1 / _)) * _;
					for (s = 1 - r, i = this._props.length; --i > -1;) l = this._props[i], a = (r * r * (n = this._beziers[l][o]).da + 3 * s * (r * n.ca + s * n.ba)) * r + n.a, this._mod[l] && (a = this._mod[l](a, f)), c[l] ? f[l](a) : "x" == l ? f.setX(a) : "y" == l ? f.setY(a) : "z" == l ? f.setZ(a) : "angleX" == l ? f.setAngleX(a) : "angleY" == l ? f.setAngleY(a) : "angleZ" == l ? f.setAngleZ(a) : "w" == l ? f.setWidth(a) : "h" == l ? f.setHeight(a) : "alpha" == l ? f.setAlpha(a) : "scale" == l ? f.setScale2(a) : f[l] = a;
					if (this._autoRotate) {
						var b, m, g, y, v, S, P, w = this._autoRotate;
						for (i = w.length; --i > -1;) l = w[i][2], S = w[i][3] || 0, P = !0 === w[i][4] ? 1 : e, n = this._beziers[w[i][0]], b = this._beziers[w[i][1]], n && b && (n = n[o], b = b[o], m = n.a + (n.b - n.a) * r, m += ((y = n.b + (n.c - n.b) * r) - m) * r, y += (n.c + (n.d - n.c) * r - y) * r, g = b.a + (b.b - b.a) * r, g += ((v = b.b + (b.c - b.b) * r) - g) * r, v += (b.c + (b.d - b.c) * r - v) * r, a = p ? Math.atan2(v - g, y - m) * P + S : this._initialRotations[i], this._mod[l] && (a = this._mod[l](a, f)), c[l] ? f[l](a) : f[l] = a)
					}
				}
			}), c = _.prototype, _.bezierThrough = u, _.cubicToQuadratic = r, _._autoCSS = !0, _.quadraticToCubic = function (e, t, o) {
				return new n(e, (2 * t + e) / 3, (2 * t + o) / 3, o)
			}, _._cssRegister = function () {
				var e = l.CSSPlugin;
				if (e) {
					var t = e._internals,
						o = t._parseToProxy,
						s = t._setPluginRatio,
						i = t.CSSPropTween;
					t._registerComplexSpecialProp("bezier", {
						parser: function (e, t, l, n, r, a) {
							t instanceof Array && (t = {
								values: t
							}), a = new _;
							var d, u, h, c = t.values,
								f = c.length - 1,
								p = [],
								b = {};
							if (f < 0) return r;
							for (d = 0; d <= f; d++) h = o(e, c[d], n, r, a, f !== d), p[d] = h.end;
							for (u in t) b[u] = t[u];
							return b.values = p, (r = new i(e, "bezier", 0, 0, h.pt, 2)).data = h, r.plugin = a, r.setRatio = s, 0 === b.autoRotate && (b.autoRotate = !0), !b.autoRotate || b.autoRotate instanceof Array || (d = !0 === b.autoRotate ? 0 : Number(b.autoRotate), b.autoRotate = null != h.end.left ? [
								["left", "top", "rotation", d, !1]
							] : null != h.end.x && [
								["x", "y", "rotation", d, !1]
							]), b.autoRotate && (n._transform || n._enableTransforms(!1), h.autoRotate = n._target._gsTransform, h.proxy.rotation = h.autoRotate.rotation || 0, n._overwriteProps.push("rotation")), a._onInitTween(h.proxy, b, n._tween), r
						}
					})
				}
			}, c._mod = function (e) {
				for (var t, o = this._overwriteProps, s = o.length; --s > -1;)(t = e[o[s]]) && "function" == typeof t && (this._mod[o[s]] = t)
			}, c._kill = function (e) {
				var t, o, s = this._props;
				for (t in this._beziers)
					if (t in e)
						for (delete this._beziers[t], delete this._func[t], o = s.length; --o > -1;) s[o] === t && s.splice(o, 1);
				if (s = this._autoRotate)
					for (o = s.length; --o > -1;) e[s[o][2]] && s.splice(o, 1);
				return this._super._kill.call(this, e)
			}, _fwd_gsScope.FWDFWD_gsDefine("plugins.CSSPlugin", ["plugins.TweenPlugin", "FWDTweenLite"], function (e, t) {
				var o, s, i, l, n = function () {
						e.call(this, "css"), this._overwriteProps.length = 0, this.setRatio = n.prototype.setRatio
					},
					r = _fwd_gsScope.FWDFWD_gsDefine.globals,
					a = {},
					d = n.prototype = new e("css");
				d.constructor = n, n.version = "1.19.0", n.API = 2, n.defaultTransformPerspective = 0, n.defaultSkewType = "compensated", n.defaultSmoothOrigin = !0, d = "px", n.suffixMap = {
					top: d,
					right: d,
					bottom: d,
					left: d,
					width: d,
					height: d,
					fontSize: d,
					padding: d,
					margin: d,
					perspective: d,
					lineHeight: ""
				};
				var u, h, _, c, f, p, b, m, g, y, v = /(?:\-|\.|\b)(\d|\.|e\-)+/g,
					S = /(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,
					P = /(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,
					w = /(?![+-]?\d*\.?\d+|[+-]|e[+-]\d+)[^0-9]/g,
					T = /(?:\d|\-|\+|=|#|\.)*/g,
					D = /opacity *= *([^)]*)/i,
					B = /opacity:([^;]*)/i,
					H = /alpha\(opacity *=.+?\)/i,
					W = /^(rgb|hsl)/,
					F = /([A-Z])/g,
					C = /-([a-z])/gi,
					E = /(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,
					U = function (e, t) {
						return t.toUpperCase()
					},
					O = /(?:Left|Right|Width)/i,
					k = /(M11|M12|M21|M22)=[\d\-\.e]+/gi,
					V = /progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,
					A = /,(?=[^\)]*(?:\(|$))/gi,
					x = /[\s,\(]/i,
					I = Math.PI / 180,
					L = 180 / Math.PI,
					M = {},
					R = document,
					N = function (e) {
						return R.createElementNS ? R.createElementNS("http://www.w3.org/1999/xhtml", e) : R.createElement(e)
					},
					Y = N("div"),
					j = N("img"),
					X = n._internals = {
						_specialProps: a
					},
					z = navigator.userAgent,
					Q = (g = z.indexOf("Android"), y = N("a"), _ = -1 !== z.indexOf("Safari") && -1 === z.indexOf("Chrome") && (-1 === g || Number(z.substr(g + 8, 1)) > 3), f = _ && Number(z.substr(z.indexOf("Version/") + 8, 1)) < 6, c = -1 !== z.indexOf("Firefox"), (/MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(z) || /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/.exec(z)) && (p = parseFloat(RegExp.$1)), !!y && (y.style.cssText = "top:1px;opacity:.55;", /^0.55/.test(y.style.opacity))),
					G = function (e) {
						return D.test("string" == typeof e ? e : (e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? parseFloat(RegExp.$1) / 100 : 1
					},
					q = function (e) {
						window.console && console.log(e)
					},
					J = "",
					K = "",
					$ = function (e, t) {
						var o, s, i = (t = t || Y).style;
						if (void 0 !== i[e]) return e;
						for (e = e.charAt(0).toUpperCase() + e.substr(1), o = ["O", "Moz", "ms", "Ms", "Webkit"], s = 5; --s > -1 && void 0 === i[o[s] + e];);
						return s >= 0 ? (J = "-" + (K = 3 === s ? "ms" : o[s]).toLowerCase() + "-", K + e) : null
					},
					Z = R.defaultView ? R.defaultView.getComputedStyle : function () {},
					ee = n.getStyle = function (e, t, o, s, i) {
						var l;
						return Q || "opacity" !== t ? (!s && e.style[t] ? l = e.style[t] : (o = o || Z(e)) ? l = o[t] || o.getPropertyValue(t) || o.getPropertyValue(t.replace(F, "-$1").toLowerCase()) : e.currentStyle && (l = e.currentStyle[t]), null == i || l && "none" !== l && "auto" !== l && "auto auto" !== l ? l : i) : G(e)
					},
					te = X.convertToPixels = function (e, o, s, i, l) {
						if ("px" === i || !i) return s;
						if ("auto" === i || !s) return 0;
						var r, a, d, u = O.test(o),
							h = e,
							_ = Y.style,
							c = s < 0,
							f = 1 === s;
						if (c && (s = -s), f && (s *= 100), "%" === i && -1 !== o.indexOf("border")) r = s / 100 * (u ? e.clientWidth : e.clientHeight);
						else {
							if (_.cssText = "border:0 solid red;position:" + ee(e, "position") + ";line-height:0;", "%" !== i && h.appendChild && "v" !== i.charAt(0) && "rem" !== i) _[u ? "borderLeftWidth" : "borderTopWidth"] = s + i;
							else {
								if (a = (h = e.parentNode || R.body)._gsCache, d = t.ticker.frame, a && u && a.time === d) return a.width * s / 100;
								_[u ? "width" : "height"] = s + i
							}
							h.appendChild(Y), r = parseFloat(Y[u ? "offsetWidth" : "offsetHeight"]), h.removeChild(Y), u && "%" === i && !1 !== n.cacheWidths && ((a = h._gsCache = h._gsCache || {}).time = d, a.width = r / s * 100), 0 !== r || l || (r = te(e, o, s, i, !0))
						}
						return f && (r /= 100), c ? -r : r
					},
					oe = X.calculateOffset = function (e, t, o) {
						if ("absolute" !== ee(e, "position", o)) return 0;
						var s = "left" === t ? "Left" : "Top",
							i = ee(e, "margin" + s, o);
						return e["offset" + s] - (te(e, t, parseFloat(i), i.replace(T, "")) || 0)
					},
					se = function (e, t) {
						var o, s, i, l = {};
						if (t = t || Z(e, null))
							if (o = t.length)
								for (; --o > -1;) - 1 !== (i = t[o]).indexOf("-transform") && ke !== i || (l[i.replace(C, U)] = t.getPropertyValue(i));
							else
								for (o in t) - 1 !== o.indexOf("Transform") && Oe !== o || (l[o] = t[o]);
						else if (t = e.currentStyle || e.style)
							for (o in t) "string" == typeof o && void 0 === l[o] && (l[o.replace(C, U)] = t[o]);
						return Q || (l.opacity = G(e)), s = ze(e, t, !1), l.rotation = s.rotation, l.skewX = s.skewX, l.scaleX = s.scaleX, l.scaleY = s.scaleY, l.x = s.x, l.y = s.y, Ae && (l.z = s.z, l.rotationX = s.rotationX, l.rotationY = s.rotationY, l.scaleZ = s.scaleZ), l.filters && delete l.filters, l
					},
					ie = function (e, t, o, s, i) {
						var l, n, r, a = {},
							d = e.style;
						for (n in o) "cssText" !== n && "length" !== n && isNaN(n) && (t[n] !== (l = o[n]) || i && i[n]) && -1 === n.indexOf("Origin") && ("number" != typeof l && "string" != typeof l || (a[n] = "auto" !== l || "left" !== n && "top" !== n ? "" !== l && "auto" !== l && "none" !== l || "string" != typeof t[n] || "" === t[n].replace(w, "") ? l : 0 : oe(e, n), void 0 !== d[n] && (r = new ye(d, n, d[n], r))));
						if (s)
							for (n in s) "className" !== n && (a[n] = s[n]);
						return {
							difs: a,
							firstMPT: r
						}
					},
					le = {
						width: ["Left", "Right"],
						height: ["Top", "Bottom"]
					},
					ne = ["marginLeft", "marginRight", "marginTop", "marginBottom"],
					re = function (e, t, o) {
						if ("svg" === (e.nodeName + "").toLowerCase()) return (o || Z(e))[t] || 0;
						if (e.getBBox && Ye(e)) return e.getBBox()[t] || 0;
						var s = parseFloat("width" === t ? e.offsetWidth : e.offsetHeight),
							i = le[t],
							l = i.length;
						for (o = o || Z(e, null); --l > -1;) s -= parseFloat(ee(e, "padding" + i[l], o, !0)) || 0, s -= parseFloat(ee(e, "border" + i[l] + "Width", o, !0)) || 0;
						return s
					},
					ae = function (e, t) {
						if ("contain" === e || "auto" === e || "auto auto" === e) return e + " ";
						null != e && "" !== e || (e = "0 0");
						var o, s = e.split(" "),
							i = -1 !== e.indexOf("left") ? "0%" : -1 !== e.indexOf("right") ? "100%" : s[0],
							l = -1 !== e.indexOf("top") ? "0%" : -1 !== e.indexOf("bottom") ? "100%" : s[1];
						if (s.length > 3 && !t) {
							for (s = e.split(", ").join(",").split(","), e = [], o = 0; o < s.length; o++) e.push(ae(s[o]));
							return e.join(",")
						}
						return null == l ? l = "center" === i ? "50%" : "0" : "center" === l && (l = "50%"), ("center" === i || isNaN(parseFloat(i)) && -1 === (i + "").indexOf("=")) && (i = "50%"), e = i + " " + l + (s.length > 2 ? " " + s[2] : ""), t && (t.oxp = -1 !== i.indexOf("%"), t.oyp = -1 !== l.indexOf("%"), t.oxr = "=" === i.charAt(1), t.oyr = "=" === l.charAt(1), t.ox = parseFloat(i.replace(w, "")), t.oy = parseFloat(l.replace(w, "")), t.v = e), t || e
					},
					de = function (e, t) {
						return "function" == typeof e && (e = e(m, b)), "string" == typeof e && "=" === e.charAt(1) ? parseInt(e.charAt(0) + "1", 10) * parseFloat(e.substr(2)) : parseFloat(e) - parseFloat(t) || 0
					},
					ue = function (e, t) {
						return "function" == typeof e && (e = e(m, b)), null == e ? t : "string" == typeof e && "=" === e.charAt(1) ? parseInt(e.charAt(0) + "1", 10) * parseFloat(e.substr(2)) + t : parseFloat(e) || 0
					},
					he = function (e, t, o, s) {
						var i, l, n, r, a;
						return "function" == typeof e && (e = e(m, b)), null == e ? r = t : "number" == typeof e ? r = e : (i = 360, l = e.split("_"), n = ((a = "=" === e.charAt(1)) ? parseInt(e.charAt(0) + "1", 10) * parseFloat(l[0].substr(2)) : parseFloat(l[0])) * (-1 === e.indexOf("rad") ? 1 : L) - (a ? 0 : t), l.length && (s && (s[o] = t + n), -1 !== e.indexOf("short") && (n %= i) !== n % 180 && (n = n < 0 ? n + i : n - i), -1 !== e.indexOf("_cw") && n < 0 ? n = (n + 3599999999640) % i - (n / i | 0) * i : -1 !== e.indexOf("ccw") && n > 0 && (n = (n - 3599999999640) % i - (n / i | 0) * i)), r = t + n), r < 1e-6 && r > -1e-6 && (r = 0), r
					},
					_e = {
						aqua: [0, 255, 255],
						lime: [0, 255, 0],
						silver: [192, 192, 192],
						black: [0, 0, 0],
						maroon: [128, 0, 0],
						teal: [0, 128, 128],
						blue: [0, 0, 255],
						navy: [0, 0, 128],
						white: [255, 255, 255],
						fuchsia: [255, 0, 255],
						olive: [128, 128, 0],
						yellow: [255, 255, 0],
						orange: [255, 165, 0],
						gray: [128, 128, 128],
						purple: [128, 0, 128],
						green: [0, 128, 0],
						red: [255, 0, 0],
						pink: [255, 192, 203],
						cyan: [0, 255, 255],
						transparent: [255, 255, 255, 0]
					},
					ce = function (e, t, o) {
						return 255 * (6 * (e = e < 0 ? e + 1 : e > 1 ? e - 1 : e) < 1 ? t + (o - t) * e * 6 : e < .5 ? o : 3 * e < 2 ? t + (o - t) * (2 / 3 - e) * 6 : t) + .5 | 0
					},
					fe = n.parseColor = function (e, t) {
						var o, s, i, l, n, r, a, d, u, h, _;
						if (e)
							if ("number" == typeof e) o = [e >> 16, e >> 8 & 255, 255 & e];
							else {
								if ("," === e.charAt(e.length - 1) && (e = e.substr(0, e.length - 1)), _e[e]) o = _e[e];
								else if ("#" === e.charAt(0)) 4 === e.length && (e = "#" + (s = e.charAt(1)) + s + (i = e.charAt(2)) + i + (l = e.charAt(3)) + l), o = [(e = parseInt(e.substr(1), 16)) >> 16, e >> 8 & 255, 255 & e];
								else if ("hsl" === e.substr(0, 3))
									if (o = _ = e.match(v), t) {
										if (-1 !== e.indexOf("=")) return e.match(S)
									} else n = Number(o[0]) % 360 / 360, r = Number(o[1]) / 100, s = 2 * (a = Number(o[2]) / 100) - (i = a <= .5 ? a * (r + 1) : a + r - a * r), o.length > 3 && (o[3] = Number(e[3])), o[0] = ce(n + 1 / 3, s, i), o[1] = ce(n, s, i), o[2] = ce(n - 1 / 3, s, i);
								else o = e.match(v) || _e.transparent;
								o[0] = Number(o[0]), o[1] = Number(o[1]), o[2] = Number(o[2]), o.length > 3 && (o[3] = Number(o[3]))
							}
						else o = _e.black;
						return t && !_ && (s = o[0] / 255, i = o[1] / 255, l = o[2] / 255, a = ((d = Math.max(s, i, l)) + (u = Math.min(s, i, l))) / 2, d === u ? n = r = 0 : (h = d - u, r = a > .5 ? h / (2 - d - u) : h / (d + u), n = d === s ? (i - l) / h + (i < l ? 6 : 0) : d === i ? (l - s) / h + 2 : (s - i) / h + 4, n *= 60), o[0] = n + .5 | 0, o[1] = 100 * r + .5 | 0, o[2] = 100 * a + .5 | 0), o
					},
					pe = function (e, t) {
						var o, s, i, l = e.match(be) || [],
							n = 0,
							r = l.length ? "" : e;
						for (o = 0; o < l.length; o++) s = l[o], n += (i = e.substr(n, e.indexOf(s, n) - n)).length + s.length, 3 === (s = fe(s, t)).length && s.push(1), r += i + (t ? "hsla(" + s[0] + "," + s[1] + "%," + s[2] + "%," + s[3] : "rgba(" + s.join(",")) + ")";
						return r + e.substr(n)
					},
					be = "(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#(?:[0-9a-f]{3}){1,2}\\b";
				for (d in _e) be += "|" + d + "\\b";
				be = new RegExp(be + ")", "gi"), n.colorStringFilter = function (e) {
					var t, o = e[0] + e[1];
					be.test(o) && (t = -1 !== o.indexOf("hsl(") || -1 !== o.indexOf("hsla("), e[0] = pe(e[0], t), e[1] = pe(e[1], t)), be.lastIndex = 0
				}, t.defaultStringFilter || (t.defaultStringFilter = n.colorStringFilter);
				var me = function (e, t, o, s) {
						if (null == e) return function (e) {
							return e
						};
						var i, l = t ? (e.match(be) || [""])[0] : "",
							n = e.split(l).join("").match(P) || [],
							r = e.substr(0, e.indexOf(n[0])),
							a = ")" === e.charAt(e.length - 1) ? ")" : "",
							d = -1 !== e.indexOf(" ") ? " " : ",",
							u = n.length,
							h = u > 0 ? n[0].replace(v, "") : "";
						return u ? i = t ? function (e) {
							var t, _, c, f;
							if ("number" == typeof e) e += h;
							else if (s && A.test(e)) {
								for (f = e.replace(A, "|").split("|"), c = 0; c < f.length; c++) f[c] = i(f[c]);
								return f.join(",")
							}
							if (t = (e.match(be) || [l])[0], c = (_ = e.split(t).join("").match(P) || []).length, u > c--)
								for (; ++c < u;) _[c] = o ? _[(c - 1) / 2 | 0] : n[c];
							return r + _.join(d) + d + t + a + (-1 !== e.indexOf("inset") ? " inset" : "")
						} : function (e) {
							var t, l, _;
							if ("number" == typeof e) e += h;
							else if (s && A.test(e)) {
								for (l = e.replace(A, "|").split("|"), _ = 0; _ < l.length; _++) l[_] = i(l[_]);
								return l.join(",")
							}
							if (_ = (t = e.match(P) || []).length, u > _--)
								for (; ++_ < u;) t[_] = o ? t[(_ - 1) / 2 | 0] : n[_];
							return r + t.join(d) + a
						} : function (e) {
							return e
						}
					},
					ge = function (e) {
						return e = e.split(","),
							function (t, o, s, i, l, n, r) {
								var a, d = (o + "").split(" ");
								for (r = {}, a = 0; a < 4; a++) r[e[a]] = d[a] = d[a] || d[(a - 1) / 2 >> 0];
								return i.parse(t, r, l, n)
							}
					},
					ye = (X._setPluginRatio = function (e) {
						this.plugin.setRatio(e);
						for (var t, o, s, i, l, n = this.data, r = n.proxy, a = n.firstMPT; a;) t = r[a.v], a.r ? t = Math.round(t) : t < 1e-6 && t > -1e-6 && (t = 0), a.t[a.p] = t, a = a._next;
						if (n.autoRotate && (n.autoRotate.rotation = n.mod ? n.mod(r.rotation, this.t) : r.rotation), 1 === e || 0 === e)
							for (a = n.firstMPT, l = 1 === e ? "e" : "b"; a;) {
								if ((o = a.t).type) {
									if (1 === o.type) {
										for (i = o.xs0 + o.s + o.xs1, s = 1; s < o.l; s++) i += o["xn" + s] + o["xs" + (s + 1)];
										o[l] = i
									}
								} else o[l] = o.s + o.xs0;
								a = a._next
							}
					}, function (e, t, o, s, i) {
						this.t = e, this.p = t, this.v = o, this.r = i, s && (s._prev = this, this._next = s)
					}),
					ve = (X._parseToProxy = function (e, t, o, s, i, l) {
						var n, r, a, d, u, h = s,
							_ = {},
							c = {},
							f = o._transform,
							p = M;
						for (o._transform = null, M = t, s = u = o.parse(e, t, s, i), M = p, l && (o._transform = f, h && (h._prev = null, h._prev && (h._prev._next = null))); s && s !== h;) {
							if (s.type <= 1 && (c[r = s.p] = s.s + s.c, _[r] = s.s, l || (d = new ye(s, "s", r, d, s.r), s.c = 0), 1 === s.type))
								for (n = s.l; --n > 0;) a = "xn" + n, c[r = s.p + "_" + a] = s.data[a], _[r] = s[a], l || (d = new ye(s, a, r, d, s.rxp[a]));
							s = s._next
						}
						return {
							proxy: _,
							end: c,
							firstMPT: d,
							pt: u
						}
					}, X.CSSPropTween = function (e, t, s, i, n, r, a, d, u, h, _) {
						this.t = e, this.p = t, this.s = s, this.c = i, this.n = a || t, e instanceof ve || l.push(this.n), this.r = d, this.type = r || 0, u && (this.pr = u, o = !0), this.b = void 0 === h ? s : h, this.e = void 0 === _ ? s + i : _, n && (this._next = n, n._prev = this)
					}),
					Se = function (e, t, o, s, i, l) {
						var n = new ve(e, t, o, s - o, i, -1, l);
						return n.b = o, n.e = n.xs0 = s, n
					},
					Pe = n.parseComplex = function (e, t, o, s, i, l, r, a, d, h) {
						o = o || l || "", "function" == typeof s && (s = s(m, b)), r = new ve(e, t, 0, 0, r, h ? 2 : 1, null, !1, a, o, s), s += "", i && be.test(s + o) && (s = [o, s], n.colorStringFilter(s), o = s[0], s = s[1]);
						var _, c, f, p, g, y, P, w, T, D, B, H, W, F = o.split(", ").join(",").split(" "),
							C = s.split(", ").join(",").split(" "),
							E = F.length,
							U = !1 !== u;
						for (-1 === s.indexOf(",") && -1 === o.indexOf(",") || (F = F.join(" ").replace(A, ", ").split(" "), C = C.join(" ").replace(A, ", ").split(" "), E = F.length), E !== C.length && (E = (F = (l || "").split(" ")).length), r.plugin = d, r.setRatio = h, be.lastIndex = 0, _ = 0; _ < E; _++)
							if (p = F[_], g = C[_], (w = parseFloat(p)) || 0 === w) r.appendXtra("", w, de(g, w), g.replace(S, ""), U && -1 !== g.indexOf("px"), !0);
							else if (i && be.test(p)) H = ")" + ((H = g.indexOf(")") + 1) ? g.substr(H) : ""), W = -1 !== g.indexOf("hsl") && Q, p = fe(p, W), g = fe(g, W), (T = p.length + g.length > 6) && !Q && 0 === g[3] ? (r["xs" + r.l] += r.l ? " transparent" : "transparent", r.e = r.e.split(C[_]).join("transparent")) : (Q || (T = !1), W ? r.appendXtra(T ? "hsla(" : "hsl(", p[0], de(g[0], p[0]), ",", !1, !0).appendXtra("", p[1], de(g[1], p[1]), "%,", !1).appendXtra("", p[2], de(g[2], p[2]), T ? "%," : "%" + H, !1) : r.appendXtra(T ? "rgba(" : "rgb(", p[0], g[0] - p[0], ",", !0, !0).appendXtra("", p[1], g[1] - p[1], ",", !0).appendXtra("", p[2], g[2] - p[2], T ? "," : H, !0), T && (p = p.length < 4 ? 1 : p[3], r.appendXtra("", p, (g.length < 4 ? 1 : g[3]) - p, H, !1))), be.lastIndex = 0;
						else if (y = p.match(v)) {
							if (!(P = g.match(S)) || P.length !== y.length) return r;
							for (f = 0, c = 0; c < y.length; c++) B = y[c], D = p.indexOf(B, f), r.appendXtra(p.substr(f, D - f), Number(B), de(P[c], B), "", U && "px" === p.substr(D + B.length, 2), 0 === c), f = D + B.length;
							r["xs" + r.l] += p.substr(f)
						} else r["xs" + r.l] += r.l || r["xs" + r.l] ? " " + g : g;
						if (-1 !== s.indexOf("=") && r.data) {
							for (H = r.xs0 + r.data.s, _ = 1; _ < r.l; _++) H += r["xs" + _] + r.data["xn" + _];
							r.e = H + r["xs" + _]
						}
						return r.l || (r.type = -1, r.xs0 = r.e), r.xfirst || r
					},
					we = 9;
				for ((d = ve.prototype).l = d.pr = 0; --we > 0;) d["xn" + we] = 0, d["xs" + we] = "";
				d.xs0 = "", d._next = d._prev = d.xfirst = d.data = d.plugin = d.setRatio = d.rxp = null, d.appendXtra = function (e, t, o, s, i, l) {
					var n = this,
						r = n.l;
					return n["xs" + r] += l && (r || n["xs" + r]) ? " " + e : e || "", o || 0 === r || n.plugin ? (n.l++, n.type = n.setRatio ? 2 : 1, n["xs" + n.l] = s || "", r > 0 ? (n.data["xn" + r] = t + o, n.rxp["xn" + r] = i, n["xn" + r] = t, n.plugin || (n.xfirst = new ve(n, "xn" + r, t, o, n.xfirst || n, 0, n.n, i, n.pr), n.xfirst.xs0 = 0), n) : (n.data = {
						s: t + o
					}, n.rxp = {}, n.s = t, n.c = o, n.r = i, n)) : (n["xs" + r] += t + (s || ""), n)
				};
				var Te = function (e, t) {
						t = t || {}, this.p = t.prefix && $(e) || e, a[e] = a[this.p] = this, this.format = t.formatter || me(t.defaultValue, t.color, t.collapsible, t.multi), t.parser && (this.parse = t.parser), this.clrs = t.color, this.multi = t.multi, this.keyword = t.keyword, this.dflt = t.defaultValue, this.pr = t.priority || 0
					},
					De = X._registerComplexSpecialProp = function (e, t, o) {
						"object" != typeof t && (t = {
							parser: o
						});
						var s, i = e.split(","),
							l = t.defaultValue;
						for (o = o || [l], s = 0; s < i.length; s++) t.prefix = 0 === s && t.prefix, t.defaultValue = o[s] || l, new Te(i[s], t)
					},
					Be = X._registerPluginProp = function (e) {
						if (!a[e]) {
							var t = e.charAt(0).toUpperCase() + e.substr(1) + "Plugin";
							De(e, {
								parser: function (e, o, s, i, l, n, d) {
									var u = r.com.greensock.plugins[t];
									return u ? (u._cssRegister(), a[s].parse(e, o, s, i, l, n, d)) : (q("Error: " + t + " js file not loaded."), l)
								}
							})
						}
					};
				(d = Te.prototype).parseComplex = function (e, t, o, s, i, l) {
					var n, r, a, d, u, h, _ = this.keyword;
					if (this.multi && (A.test(o) || A.test(t) ? (r = t.replace(A, "|").split("|"), a = o.replace(A, "|").split("|")) : _ && (r = [t], a = [o])), a) {
						for (d = a.length > r.length ? a.length : r.length, n = 0; n < d; n++) t = r[n] = r[n] || this.dflt, o = a[n] = a[n] || this.dflt, _ && (u = t.indexOf(_)) !== (h = o.indexOf(_)) && (-1 === h ? r[n] = r[n].split(_).join("") : -1 === u && (r[n] += " " + _));
						t = r.join(", "), o = a.join(", ")
					}
					return Pe(e, this.p, t, o, this.clrs, this.dflt, s, this.pr, i, l)
				}, d.parse = function (e, t, o, s, l, n, r) {
					return this.parseComplex(e.style, this.format(ee(e, this.p, i, !1, this.dflt)), this.format(t), l, n)
				}, n.registerSpecialProp = function (e, t, o) {
					De(e, {
						parser: function (e, s, i, l, n, r, a) {
							var d = new ve(e, i, 0, 0, n, 2, i, !1, o);
							return d.plugin = r, d.setRatio = t(e, s, l._tween, i), d
						},
						priority: o
					})
				}, n.useSVGTransformAttr = _ || c;
				var He, We, Fe, Ce, Ee, Ue = "scaleX,scaleY,scaleZ,x,y,z,skewX,skewY,rotation,rotationX,rotationY,perspective,xPercent,yPercent".split(","),
					Oe = $("transform"),
					ke = J + "transform",
					Ve = $("transformOrigin"),
					Ae = null !== $("perspective"),
					xe = X.Transform = function () {
						this.perspective = parseFloat(n.defaultTransformPerspective) || 0, this.force3D = !(!1 === n.defaultForce3D || !Ae) && (n.defaultForce3D || "auto")
					},
					Ie = window.SVGElement,
					Le = function (e, t, o) {
						var s, i = R.createElementNS("http://www.w3.org/2000/svg", e),
							l = /([a-z])([A-Z])/g;
						for (s in o) i.setAttributeNS(null, s.replace(l, "$1-$2").toLowerCase(), o[s]);
						return t.appendChild(i), i
					},
					Me = R.documentElement,
					Re = (Ee = p || /Android/i.test(z) && !window.chrome, R.createElementNS && !Ee && (We = Le("svg", Me), Ce = (Fe = Le("rect", We, {
						width: 100,
						height: 50,
						x: 100
					})).getBoundingClientRect().width, Fe.style[Ve] = "50% 50%", Fe.style[Oe] = "scaleX(0.5)", Ee = Ce === Fe.getBoundingClientRect().width && !(c && Ae), Me.removeChild(We)), Ee),
					Ne = function (e, t, o, s, i, l) {
						var r, a, d, u, h, _, c, f, p, b, m, g, y, v, S = e._gsTransform,
							P = Xe(e, !0);
						S && (y = S.xOrigin, v = S.yOrigin), (!s || (r = s.split(" ")).length < 2) && (c = e.getBBox(), r = [(-1 !== (t = ae(t).split(" "))[0].indexOf("%") ? parseFloat(t[0]) / 100 * c.width : parseFloat(t[0])) + c.x, (-1 !== t[1].indexOf("%") ? parseFloat(t[1]) / 100 * c.height : parseFloat(t[1])) + c.y]), o.xOrigin = u = parseFloat(r[0]), o.yOrigin = h = parseFloat(r[1]), s && P !== je && (_ = P[0], c = P[1], f = P[2], p = P[3], b = P[4], a = u * (p / (g = _ * p - c * f)) + h * (-f / g) + (f * (m = P[5]) - p * b) / g, d = u * (-c / g) + h * (_ / g) - (_ * m - c * b) / g, u = o.xOrigin = r[0] = a, h = o.yOrigin = r[1] = d), S && (l && (o.xOffset = S.xOffset, o.yOffset = S.yOffset, S = o), i || !1 !== i && !1 !== n.defaultSmoothOrigin ? (a = u - y, d = h - v, S.xOffset += a * P[0] + d * P[2] - a, S.yOffset += a * P[1] + d * P[3] - d) : S.xOffset = S.yOffset = 0), l || e.setAttribute("data-svg-origin", r.join(" "))
					},
					Ye = function (e) {
						return !!(Ie && e.getBBox && e.getCTM && function (e) {
							try {
								return e.getBBox()
							} catch (e) {}
						}(e) && (!e.parentNode || e.parentNode.getBBox && e.parentNode.getCTM))
					},
					je = [1, 0, 0, 1, 0, 0],
					Xe = function (e, t) {
						var o, s, i, l, n, r, a = e._gsTransform || new xe,
							d = e.style;
						if (Oe ? s = ee(e, ke, null, !0) : e.currentStyle && (s = (s = e.currentStyle.filter.match(k)) && 4 === s.length ? [s[0].substr(4), Number(s[2].substr(4)), Number(s[1].substr(4)), s[3].substr(4), a.x || 0, a.y || 0].join(",") : ""), (o = !s || "none" === s || "matrix(1, 0, 0, 1, 0, 0)" === s) && Oe && ((r = "none" === Z(e).display) || !e.parentNode) && (r && (l = d.display, d.display = "block"), e.parentNode || (n = 1, Me.appendChild(e)), o = !(s = ee(e, ke, null, !0)) || "none" === s || "matrix(1, 0, 0, 1, 0, 0)" === s, l ? d.display = l : r && Je(d, "display"), n && Me.removeChild(e)), (a.svg || e.getBBox && Ye(e)) && (o && -1 !== (d[Oe] + "").indexOf("matrix") && (s = d[Oe], o = 0), i = e.getAttribute("transform"), o && i && (-1 !== i.indexOf("matrix") ? (s = i, o = 0) : -1 !== i.indexOf("translate") && (s = "matrix(1,0,0,1," + i.match(/(?:\-|\b)[\d\-\.e]+\b/gi).join(",") + ")", o = 0))), o) return je;
						for (i = (s || "").match(v) || [], we = i.length; --we > -1;) l = Number(i[we]), i[we] = (n = l - (l |= 0)) ? (1e5 * n + (n < 0 ? -.5 : .5) | 0) / 1e5 + l : l;
						return t && i.length > 6 ? [i[0], i[1], i[4], i[5], i[12], i[13]] : i
					},
					ze = X.getTransform = function (e, o, s, i) {
						if (e._gsTransform && s && !i) return e._gsTransform;
						var l, r, a, d, u, h, _ = s && e._gsTransform || new xe,
							c = _.scaleX < 0,
							f = Ae && (parseFloat(ee(e, Ve, o, !1, "0 0 0").split(" ")[2]) || _.zOrigin) || 0,
							p = parseFloat(n.defaultTransformPerspective) || 0;
						if (_.svg = !(!e.getBBox || !Ye(e)), _.svg && (Ne(e, ee(e, Ve, o, !1, "50% 50%") + "", _, e.getAttribute("data-svg-origin")), He = n.useSVGTransformAttr || Re), (l = Xe(e)) !== je) {
							if (16 === l.length) {
								var b, m, g, y, v, S = l[0],
									P = l[1],
									w = l[2],
									T = l[3],
									D = l[4],
									B = l[5],
									H = l[6],
									W = l[7],
									F = l[8],
									C = l[9],
									E = l[10],
									U = l[12],
									O = l[13],
									k = l[14],
									V = l[11],
									A = Math.atan2(H, E);
								_.zOrigin && (U = F * (k = -_.zOrigin) - l[12], O = C * k - l[13], k = E * k + _.zOrigin - l[14]), _.rotationX = A * L, A && (b = D * (y = Math.cos(-A)) + F * (v = Math.sin(-A)), m = B * y + C * v, g = H * y + E * v, F = D * -v + F * y, C = B * -v + C * y, E = H * -v + E * y, V = W * -v + V * y, D = b, B = m, H = g), A = Math.atan2(-w, E), _.rotationY = A * L, A && (m = P * (y = Math.cos(-A)) - C * (v = Math.sin(-A)), g = w * y - E * v, C = P * v + C * y, E = w * v + E * y, V = T * v + V * y, S = b = S * y - F * v, P = m, w = g), A = Math.atan2(P, S), _.rotation = A * L, A && (S = S * (y = Math.cos(-A)) + D * (v = Math.sin(-A)), m = P * y + B * v, B = P * -v + B * y, H = w * -v + H * y, P = m), _.rotationX && Math.abs(_.rotationX) + Math.abs(_.rotation) > 359.9 && (_.rotationX = _.rotation = 0, _.rotationY = 180 - _.rotationY), _.scaleX = (1e5 * Math.sqrt(S * S + P * P) + .5 | 0) / 1e5, _.scaleY = (1e5 * Math.sqrt(B * B + C * C) + .5 | 0) / 1e5, _.scaleZ = (1e5 * Math.sqrt(H * H + E * E) + .5 | 0) / 1e5, _.rotationX || _.rotationY ? _.skewX = 0 : (_.skewX = D || B ? Math.atan2(D, B) * L + _.rotation : _.skewX || 0, Math.abs(_.skewX) > 90 && Math.abs(_.skewX) < 270 && (c ? (_.scaleX *= -1, _.skewX += _.rotation <= 0 ? 180 : -180, _.rotation += _.rotation <= 0 ? 180 : -180) : (_.scaleY *= -1, _.skewX += _.skewX <= 0 ? 180 : -180))), _.perspective = V ? 1 / (V < 0 ? -V : V) : 0, _.x = U, _.y = O, _.z = k, _.svg && (_.x -= _.xOrigin - (_.xOrigin * S - _.yOrigin * D), _.y -= _.yOrigin - (_.yOrigin * P - _.xOrigin * B))
							} else if (!Ae || i || !l.length || _.x !== l[4] || _.y !== l[5] || !_.rotationX && !_.rotationY) {
								var x = l.length >= 6,
									I = x ? l[0] : 1,
									M = l[1] || 0,
									R = l[2] || 0,
									N = x ? l[3] : 1;
								_.x = l[4] || 0, _.y = l[5] || 0, a = Math.sqrt(I * I + M * M), d = Math.sqrt(N * N + R * R), u = I || M ? Math.atan2(M, I) * L : _.rotation || 0, h = R || N ? Math.atan2(R, N) * L + u : _.skewX || 0, Math.abs(h) > 90 && Math.abs(h) < 270 && (c ? (a *= -1, h += u <= 0 ? 180 : -180, u += u <= 0 ? 180 : -180) : (d *= -1, h += h <= 0 ? 180 : -180)), _.scaleX = a, _.scaleY = d, _.rotation = u, _.skewX = h, Ae && (_.rotationX = _.rotationY = _.z = 0, _.perspective = p, _.scaleZ = 1), _.svg && (_.x -= _.xOrigin - (_.xOrigin * I + _.yOrigin * R), _.y -= _.yOrigin - (_.xOrigin * M + _.yOrigin * N))
							}
							for (r in _.zOrigin = f, _) _[r] < 2e-5 && _[r] > -2e-5 && (_[r] = 0)
						}
						return s && (e._gsTransform = _, _.svg && (He && e.style[Oe] ? t.delayedCall(.001, function () {
							Je(e.style, Oe)
						}) : !He && e.getAttribute("transform") && t.delayedCall(.001, function () {
							e.removeAttribute("transform")
						}))), _
					},
					Qe = function (e) {
						var t, o, s = this.data,
							i = -s.rotation * I,
							l = i + s.skewX * I,
							n = 1e5,
							r = (Math.cos(i) * s.scaleX * n | 0) / n,
							a = (Math.sin(i) * s.scaleX * n | 0) / n,
							d = (Math.sin(l) * -s.scaleY * n | 0) / n,
							u = (Math.cos(l) * s.scaleY * n | 0) / n,
							h = this.t.style,
							_ = this.t.currentStyle;
						if (_) {
							o = a, a = -d, d = -o, t = _.filter, h.filter = "";
							var c, f, b = this.t.offsetWidth,
								m = this.t.offsetHeight,
								g = "absolute" !== _.position,
								y = "progid:DXImageTransform.Microsoft.Matrix(M11=" + r + ", M12=" + a + ", M21=" + d + ", M22=" + u,
								v = s.x + b * s.xPercent / 100,
								S = s.y + m * s.yPercent / 100;
							if (null != s.ox && (v += (c = (s.oxp ? b * s.ox * .01 : s.ox) - b / 2) - (c * r + (f = (s.oyp ? m * s.oy * .01 : s.oy) - m / 2) * a), S += f - (c * d + f * u)), y += g ? ", Dx=" + ((c = b / 2) - (c * r + (f = m / 2) * a) + v) + ", Dy=" + (f - (c * d + f * u) + S) + ")" : ", sizingMethod='auto expand')", -1 !== t.indexOf("DXImageTransform.Microsoft.Matrix(") ? h.filter = t.replace(V, y) : h.filter = y + " " + t, 0 !== e && 1 !== e || 1 === r && 0 === a && 0 === d && 1 === u && (g && -1 === y.indexOf("Dx=0, Dy=0") || D.test(t) && 100 !== parseFloat(RegExp.$1) || -1 === t.indexOf(t.indexOf("Alpha")) && h.removeAttribute("filter")), !g) {
								var P, w, B, H = p < 8 ? 1 : -1;
								for (c = s.ieOffsetX || 0, f = s.ieOffsetY || 0, s.ieOffsetX = Math.round((b - ((r < 0 ? -r : r) * b + (a < 0 ? -a : a) * m)) / 2 + v), s.ieOffsetY = Math.round((m - ((u < 0 ? -u : u) * m + (d < 0 ? -d : d) * b)) / 2 + S), we = 0; we < 4; we++) B = (o = -1 !== (P = _[w = ne[we]]).indexOf("px") ? parseFloat(P) : te(this.t, w, parseFloat(P), P.replace(T, "")) || 0) !== s[w] ? we < 2 ? -s.ieOffsetX : -s.ieOffsetY : we < 2 ? c - s.ieOffsetX : f - s.ieOffsetY, h[w] = (s[w] = Math.round(o - B * (0 === we || 2 === we ? 1 : H))) + "px"
							}
						}
					},
					Ge = X.set3DTransformRatio = X.setTransformRatio = function (e) {
						var t, o, s, i, l, n, r, a, d, u, h, _, f, p, b, m, g, y, v, S, P, w, T, D = this.data,
							B = this.t.style,
							H = D.rotation,
							W = D.rotationX,
							F = D.rotationY,
							C = D.scaleX,
							E = D.scaleY,
							U = D.scaleZ,
							O = D.x,
							k = D.y,
							V = D.z,
							A = D.svg,
							x = D.perspective,
							L = D.force3D;
						if (!((1 !== e && 0 !== e || "auto" !== L || this.tween._totalTime !== this.tween._totalDuration && this.tween._totalTime) && L || V || x || F || W || 1 !== U) || He && A || !Ae) H || D.skewX || A ? (H *= I, w = D.skewX * I, T = 1e5, t = Math.cos(H) * C, i = Math.sin(H) * C, o = Math.sin(H - w) * -E, l = Math.cos(H - w) * E, w && "simple" === D.skewType && (g = Math.tan(w - D.skewY * I), o *= g = Math.sqrt(1 + g * g), l *= g, D.skewY && (g = Math.tan(D.skewY * I), t *= g = Math.sqrt(1 + g * g), i *= g)), A && (O += D.xOrigin - (D.xOrigin * t + D.yOrigin * o) + D.xOffset, k += D.yOrigin - (D.xOrigin * i + D.yOrigin * l) + D.yOffset, He && (D.xPercent || D.yPercent) && (p = this.t.getBBox(), O += .01 * D.xPercent * p.width, k += .01 * D.yPercent * p.height), O < (p = 1e-6) && O > -p && (O = 0), k < p && k > -p && (k = 0)), v = (t * T | 0) / T + "," + (i * T | 0) / T + "," + (o * T | 0) / T + "," + (l * T | 0) / T + "," + O + "," + k + ")", A && He ? this.t.setAttribute("transform", "matrix(" + v) : B[Oe] = (D.xPercent || D.yPercent ? "translate(" + D.xPercent + "%," + D.yPercent + "%) matrix(" : "matrix(") + v) : B[Oe] = (D.xPercent || D.yPercent ? "translate(" + D.xPercent + "%," + D.yPercent + "%) matrix(" : "matrix(") + C + ",0,0," + E + "," + O + "," + k + ")";
						else {
							if (c && (C < (p = 1e-4) && C > -p && (C = U = 2e-5), E < p && E > -p && (E = U = 2e-5), !x || D.z || D.rotationX || D.rotationY || (x = 0)), H || D.skewX) H *= I, b = t = Math.cos(H), m = i = Math.sin(H), D.skewX && (H -= D.skewX * I, b = Math.cos(H), m = Math.sin(H), "simple" === D.skewType && (g = Math.tan((D.skewX - D.skewY) * I), b *= g = Math.sqrt(1 + g * g), m *= g, D.skewY && (g = Math.tan(D.skewY * I), t *= g = Math.sqrt(1 + g * g), i *= g))), o = -m, l = b;
							else {
								if (!(F || W || 1 !== U || x || A)) return void(B[Oe] = (D.xPercent || D.yPercent ? "translate(" + D.xPercent + "%," + D.yPercent + "%) translate3d(" : "translate3d(") + O + "px," + k + "px," + V + "px)" + (1 !== C || 1 !== E ? " scale(" + C + "," + E + ")" : ""));
								t = l = 1, o = i = 0
							}
							d = 1, s = n = r = a = u = h = 0, _ = x ? -1 / x : 0, f = D.zOrigin, p = 1e-6, S = ",", P = "0", (H = F * I) && (b = Math.cos(H), r = -(m = Math.sin(H)), u = _ * -m, s = t * m, n = i * m, d = b, _ *= b, t *= b, i *= b), (H = W * I) && (g = o * (b = Math.cos(H)) + s * (m = Math.sin(H)), y = l * b + n * m, a = d * m, h = _ * m, s = o * -m + s * b, n = l * -m + n * b, d *= b, _ *= b, o = g, l = y), 1 !== U && (s *= U, n *= U, d *= U, _ *= U), 1 !== E && (o *= E, l *= E, a *= E, h *= E), 1 !== C && (t *= C, i *= C, r *= C, u *= C), (f || A) && (f && (O += s * -f, k += n * -f, V += d * -f + f), A && (O += D.xOrigin - (D.xOrigin * t + D.yOrigin * o) + D.xOffset, k += D.yOrigin - (D.xOrigin * i + D.yOrigin * l) + D.yOffset), O < p && O > -p && (O = P), k < p && k > -p && (k = P), V < p && V > -p && (V = 0)), v = D.xPercent || D.yPercent ? "translate(" + D.xPercent + "%," + D.yPercent + "%) matrix3d(" : "matrix3d(", v += (t < p && t > -p ? P : t) + S + (i < p && i > -p ? P : i) + S + (r < p && r > -p ? P : r), v += S + (u < p && u > -p ? P : u) + S + (o < p && o > -p ? P : o) + S + (l < p && l > -p ? P : l), W || F || 1 !== U ? (v += S + (a < p && a > -p ? P : a) + S + (h < p && h > -p ? P : h) + S + (s < p && s > -p ? P : s), v += S + (n < p && n > -p ? P : n) + S + (d < p && d > -p ? P : d) + S + (_ < p && _ > -p ? P : _) + S) : v += ",0,0,0,0,1,0,", v += O + S + k + S + V + S + (x ? 1 + -V / x : 1) + ")", B[Oe] = v
						}
					};
				(d = xe.prototype).x = d.y = d.z = d.skewX = d.skewY = d.rotation = d.rotationX = d.rotationY = d.zOrigin = d.xPercent = d.yPercent = d.xOffset = d.yOffset = 0, d.scaleX = d.scaleY = d.scaleZ = 1, De("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,svgOrigin,transformPerspective,directionalRotation,parseTransform,force3D,skewType,xPercent,yPercent,smoothOrigin", {
					parser: function (e, t, o, s, l, r, a) {
						if (s._lastParsedTransform === a) return l;
						var d;
						s._lastParsedTransform = a, "function" == typeof a[o] && (d = a[o], a[o] = t);
						var u, h, _, c, f, p, g, y, v, S = e._gsTransform,
							P = e.style,
							w = Ue.length,
							T = a,
							D = {},
							B = "transformOrigin",
							H = ze(e, i, !0, T.parseTransform),
							W = T.transform && ("function" == typeof T.transform ? T.transform(m, b) : T.transform);
						if (s._transform = H, W && "string" == typeof W && Oe)(h = Y.style)[Oe] = W, h.display = "block", h.position = "absolute", R.body.appendChild(Y), u = ze(Y, null, !1), H.svg && (p = H.xOrigin, g = H.yOrigin, u.x -= H.xOffset, u.y -= H.yOffset, (T.transformOrigin || T.svgOrigin) && (W = {}, Ne(e, ae(T.transformOrigin), W, T.svgOrigin, T.smoothOrigin, !0), p = W.xOrigin, g = W.yOrigin, u.x -= W.xOffset - H.xOffset, u.y -= W.yOffset - H.yOffset), (p || g) && (y = Xe(Y, !0), u.x -= p - (p * y[0] + g * y[2]), u.y -= g - (p * y[1] + g * y[3]))), R.body.removeChild(Y), u.perspective || (u.perspective = H.perspective), null != T.xPercent && (u.xPercent = ue(T.xPercent, H.xPercent)), null != T.yPercent && (u.yPercent = ue(T.yPercent, H.yPercent));
						else if ("object" == typeof T) {
							if (u = {
									scaleX: ue(null != T.scaleX ? T.scaleX : T.scale, H.scaleX),
									scaleY: ue(null != T.scaleY ? T.scaleY : T.scale, H.scaleY),
									scaleZ: ue(T.scaleZ, H.scaleZ),
									x: ue(T.x, H.x),
									y: ue(T.y, H.y),
									z: ue(T.z, H.z),
									xPercent: ue(T.xPercent, H.xPercent),
									yPercent: ue(T.yPercent, H.yPercent),
									perspective: ue(T.transformPerspective, H.perspective)
								}, null != (f = T.directionalRotation))
								if ("object" == typeof f)
									for (h in f) T[h] = f[h];
								else T.rotation = f;
							"string" == typeof T.x && -1 !== T.x.indexOf("%") && (u.x = 0, u.xPercent = ue(T.x, H.xPercent)), "string" == typeof T.y && -1 !== T.y.indexOf("%") && (u.y = 0, u.yPercent = ue(T.y, H.yPercent)), u.rotation = he("rotation" in T ? T.rotation : "shortRotation" in T ? T.shortRotation + "_short" : "rotationZ" in T ? T.rotationZ : H.rotation - H.skewY, H.rotation - H.skewY, "rotation", D), Ae && (u.rotationX = he("rotationX" in T ? T.rotationX : "shortRotationX" in T ? T.shortRotationX + "_short" : H.rotationX || 0, H.rotationX, "rotationX", D), u.rotationY = he("rotationY" in T ? T.rotationY : "shortRotationY" in T ? T.shortRotationY + "_short" : H.rotationY || 0, H.rotationY, "rotationY", D)), u.skewX = he(T.skewX, H.skewX - H.skewY), (u.skewY = he(T.skewY, H.skewY)) && (u.skewX += u.skewY, u.rotation += u.skewY)
						}
						for (Ae && null != T.force3D && (H.force3D = T.force3D, c = !0), H.skewType = T.skewType || H.skewType || n.defaultSkewType, (_ = H.force3D || H.z || H.rotationX || H.rotationY || u.z || u.rotationX || u.rotationY || u.perspective) || null == T.scale || (u.scaleZ = 1); --w > -1;)((W = u[v = Ue[w]] - H[v]) > 1e-6 || W < -1e-6 || null != T[v] || null != M[v]) && (c = !0, l = new ve(H, v, H[v], W, l), v in D && (l.e = D[v]), l.xs0 = 0, l.plugin = r, s._overwriteProps.push(l.n));
						return W = T.transformOrigin, H.svg && (W || T.svgOrigin) && (p = H.xOffset, g = H.yOffset, Ne(e, ae(W), u, T.svgOrigin, T.smoothOrigin), l = Se(H, "xOrigin", (S ? H : u).xOrigin, u.xOrigin, l, B), l = Se(H, "yOrigin", (S ? H : u).yOrigin, u.yOrigin, l, B), p === H.xOffset && g === H.yOffset || (l = Se(H, "xOffset", S ? p : H.xOffset, H.xOffset, l, B), l = Se(H, "yOffset", S ? g : H.yOffset, H.yOffset, l, B)), W = He ? null : "0px 0px"), (W || Ae && _ && H.zOrigin) && (Oe ? (c = !0, v = Ve, W = (W || ee(e, v, i, !1, "50% 50%")) + "", (l = new ve(P, v, 0, 0, l, -1, B)).b = P[v], l.plugin = r, Ae ? (h = H.zOrigin, W = W.split(" "), H.zOrigin = (W.length > 2 && (0 === h || "0px" !== W[2]) ? parseFloat(W[2]) : h) || 0, l.xs0 = l.e = W[0] + " " + (W[1] || "50%") + " 0px", (l = new ve(H, "zOrigin", 0, 0, l, -1, l.n)).b = h, l.xs0 = l.e = H.zOrigin) : l.xs0 = l.e = W) : ae(W + "", H)), c && (s._transformType = H.svg && He || !_ && 3 !== this._transformType ? 2 : 3), d && (a[o] = d), l
					},
					prefix: !0
				}), De("boxShadow", {
					defaultValue: "0px 0px 0px 0px #999",
					prefix: !0,
					color: !0,
					multi: !0,
					keyword: "inset"
				}), De("borderRadius", {
					defaultValue: "0px",
					parser: function (e, t, o, l, n, r) {
						t = this.format(t);
						var a, d, u, h, _, c, f, p, b, m, g, y, v, S, P, w, T = ["borderTopLeftRadius", "borderTopRightRadius", "borderBottomRightRadius", "borderBottomLeftRadius"],
							D = e.style;
						for (b = parseFloat(e.offsetWidth), m = parseFloat(e.offsetHeight), a = t.split(" "), d = 0; d < T.length; d++) this.p.indexOf("border") && (T[d] = $(T[d])), -1 !== (_ = h = ee(e, T[d], i, !1, "0px")).indexOf(" ") && (_ = (h = _.split(" "))[0], h = h[1]), c = u = a[d], f = parseFloat(_), y = _.substr((f + "").length), (v = "=" === c.charAt(1)) ? (p = parseInt(c.charAt(0) + "1", 10), c = c.substr(2), p *= parseFloat(c), g = c.substr((p + "").length - (p < 0 ? 1 : 0)) || "") : (p = parseFloat(c), g = c.substr((p + "").length)), "" === g && (g = s[o] || y), g !== y && (S = te(e, "borderLeft", f, y), P = te(e, "borderTop", f, y), "%" === g ? (_ = S / b * 100 + "%", h = P / m * 100 + "%") : "em" === g ? (_ = S / (w = te(e, "borderLeft", 1, "em")) + "em", h = P / w + "em") : (_ = S + "px", h = P + "px"), v && (c = parseFloat(_) + p + g, u = parseFloat(h) + p + g)), n = Pe(D, T[d], _ + " " + h, c + " " + u, !1, "0px", n);
						return n
					},
					prefix: !0,
					formatter: me("0px 0px 0px 0px", !1, !0)
				}), De("borderBottomLeftRadius,borderBottomRightRadius,borderTopLeftRadius,borderTopRightRadius", {
					defaultValue: "0px",
					parser: function (e, t, o, s, l, n) {
						return Pe(e.style, o, this.format(ee(e, o, i, !1, "0px 0px")), this.format(t), !1, "0px", l)
					},
					prefix: !0,
					formatter: me("0px 0px", !1, !0)
				}), De("backgroundPosition", {
					defaultValue: "0 0",
					parser: function (e, t, o, s, l, n) {
						var r, a, d, u, h, _, c = "background-position",
							f = i || Z(e, null),
							b = this.format((f ? p ? f.getPropertyValue(c + "-x") + " " + f.getPropertyValue(c + "-y") : f.getPropertyValue(c) : e.currentStyle.backgroundPositionX + " " + e.currentStyle.backgroundPositionY) || "0 0"),
							m = this.format(t);
						if (-1 !== b.indexOf("%") != (-1 !== m.indexOf("%")) && m.split(",").length < 2 && (_ = ee(e, "backgroundImage").replace(E, "")) && "none" !== _) {
							for (r = b.split(" "), a = m.split(" "), j.setAttribute("src", _), d = 2; --d > -1;)(u = -1 !== (b = r[d]).indexOf("%")) !== (-1 !== a[d].indexOf("%")) && (h = 0 === d ? e.offsetWidth - j.width : e.offsetHeight - j.height, r[d] = u ? parseFloat(b) / 100 * h + "px" : parseFloat(b) / h * 100 + "%");
							b = r.join(" ")
						}
						return this.parseComplex(e.style, b, m, l, n)
					},
					formatter: ae
				}), De("backgroundSize", {
					defaultValue: "0 0",
					formatter: function (e) {
						return ae(-1 === (e += "").indexOf(" ") ? e + " " + e : e)
					}
				}), De("perspective", {
					defaultValue: "0px",
					prefix: !0
				}), De("perspectiveOrigin", {
					defaultValue: "50% 50%",
					prefix: !0
				}), De("transformStyle", {
					prefix: !0
				}), De("backfaceVisibility", {
					prefix: !0
				}), De("userSelect", {
					prefix: !0
				}), De("margin", {
					parser: ge("marginTop,marginRight,marginBottom,marginLeft")
				}), De("padding", {
					parser: ge("paddingTop,paddingRight,paddingBottom,paddingLeft")
				}), De("clip", {
					defaultValue: "rect(0px,0px,0px,0px)",
					parser: function (e, t, o, s, l, n) {
						var r, a, d;
						return p < 9 ? (a = e.currentStyle, d = p < 8 ? " " : ",", r = "rect(" + a.clipTop + d + a.clipRight + d + a.clipBottom + d + a.clipLeft + ")", t = this.format(t).split(",").join(d)) : (r = this.format(ee(e, this.p, i, !1, this.dflt)), t = this.format(t)), this.parseComplex(e.style, r, t, l, n)
					}
				}), De("textShadow", {
					defaultValue: "0px 0px 0px #999",
					color: !0,
					multi: !0
				}), De("autoRound,strictUnits", {
					parser: function (e, t, o, s, i) {
						return i
					}
				}), De("border", {
					defaultValue: "0px solid #000",
					parser: function (e, t, o, s, l, n) {
						var r = ee(e, "borderTopWidth", i, !1, "0px"),
							a = this.format(t).split(" "),
							d = a[0].replace(T, "");
						return "px" !== d && (r = parseFloat(r) / te(e, "borderTopWidth", 1, d) + d), this.parseComplex(e.style, this.format(r + " " + ee(e, "borderTopStyle", i, !1, "solid") + " " + ee(e, "borderTopColor", i, !1, "#000")), a.join(" "), l, n)
					},
					color: !0,
					formatter: function (e) {
						var t = e.split(" ");
						return t[0] + " " + (t[1] || "solid") + " " + (e.match(be) || ["#000"])[0]
					}
				}), De("borderWidth", {
					parser: ge("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")
				}), De("float,cssFloat,styleFloat", {
					parser: function (e, t, o, s, i, l) {
						var n = e.style,
							r = "cssFloat" in n ? "cssFloat" : "styleFloat";
						return new ve(n, r, 0, 0, i, -1, o, !1, 0, n[r], t)
					}
				});
				var qe = function (e) {
					var t, o = this.t,
						s = o.filter || ee(this.data, "filter") || "",
						i = this.s + this.c * e | 0;
					100 === i && (-1 === s.indexOf("atrix(") && -1 === s.indexOf("radient(") && -1 === s.indexOf("oader(") ? (o.removeAttribute("filter"), t = !ee(this.data, "filter")) : (o.filter = s.replace(H, ""), t = !0)), t || (this.xn1 && (o.filter = s = s || "alpha(opacity=" + i + ")"), -1 === s.indexOf("pacity") ? 0 === i && this.xn1 || (o.filter = s + " alpha(opacity=" + i + ")") : o.filter = s.replace(D, "opacity=" + i))
				};
				De("opacity,alpha,autoAlpha", {
					defaultValue: "1",
					parser: function (e, t, o, s, l, n) {
						var r = parseFloat(ee(e, "opacity", i, !1, "1")),
							a = e.style,
							d = "autoAlpha" === o;
						return "string" == typeof t && "=" === t.charAt(1) && (t = ("-" === t.charAt(0) ? -1 : 1) * parseFloat(t.substr(2)) + r), d && 1 === r && "hidden" === ee(e, "visibility", i) && 0 !== t && (r = 0), Q ? l = new ve(a, "opacity", r, t - r, l) : ((l = new ve(a, "opacity", 100 * r, 100 * (t - r), l)).xn1 = d ? 1 : 0, a.zoom = 1, l.type = 2, l.b = "alpha(opacity=" + l.s + ")", l.e = "alpha(opacity=" + (l.s + l.c) + ")", l.data = e, l.plugin = n, l.setRatio = qe), d && ((l = new ve(a, "visibility", 0, 0, l, -1, null, !1, 0, 0 !== r ? "inherit" : "hidden", 0 === t ? "hidden" : "inherit")).xs0 = "inherit", s._overwriteProps.push(l.n), s._overwriteProps.push(o)), l
					}
				});
				var Je = function (e, t) {
						t && (e.removeProperty ? ("ms" !== t.substr(0, 2) && "webkit" !== t.substr(0, 6) || (t = "-" + t), e.removeProperty(t.replace(F, "-$1").toLowerCase())) : e.removeAttribute(t))
					},
					Ke = function (e) {
						if (this.t._gsClassPT = this, 1 === e || 0 === e) {
							this.t.setAttribute("class", 0 === e ? this.b : this.e);
							for (var t = this.data, o = this.t.style; t;) t.v ? o[t.p] = t.v : Je(o, t.p), t = t._next;
							1 === e && this.t._gsClassPT === this && (this.t._gsClassPT = null)
						} else this.t.getAttribute("class") !== this.e && this.t.setAttribute("class", this.e)
					};
				De("className", {
					parser: function (e, t, s, l, n, r, a) {
						var d, u, h, _, c, f = e.getAttribute("class") || "",
							p = e.style.cssText;
						if ((n = l._classNamePT = new ve(e, s, 0, 0, n, 2)).setRatio = Ke, n.pr = -11, o = !0, n.b = f, u = se(e, i), h = e._gsClassPT) {
							for (_ = {}, c = h.data; c;) _[c.p] = 1, c = c._next;
							h.setRatio(1)
						}
						return e._gsClassPT = n, n.e = "=" !== t.charAt(1) ? t : f.replace(new RegExp("(?:\\s|^)" + t.substr(2) + "(?![\\w-])"), "") + ("+" === t.charAt(0) ? " " + t.substr(2) : ""), e.setAttribute("class", n.e), d = ie(e, u, se(e), a, _), e.setAttribute("class", f), n.data = d.firstMPT, e.style.cssText = p, n = n.xfirst = l.parse(e, d.difs, n, r)
					}
				});
				var $e = function (e) {
					if ((1 === e || 0 === e) && this.data._totalTime === this.data._totalDuration && "isFromStart" !== this.data.data) {
						var t, o, s, i, l, n = this.t.style,
							r = a.transform.parse;
						if ("all" === this.e) n.cssText = "", i = !0;
						else
							for (s = (t = this.e.split(" ").join("").split(",")).length; --s > -1;) o = t[s], a[o] && (a[o].parse === r ? i = !0 : o = "transformOrigin" === o ? Ve : a[o].p), Je(n, o);
						i && (Je(n, Oe), (l = this.t._gsTransform) && (l.svg && (this.t.removeAttribute("data-svg-origin"), this.t.removeAttribute("transform")), delete this.t._gsTransform))
					}
				};
				for (De("clearProps", {
						parser: function (e, t, s, i, l) {
							return (l = new ve(e, s, 0, 0, l, 2)).setRatio = $e, l.e = t, l.pr = -10, l.data = i._tween, o = !0, l
						}
					}), d = "bezier,throwProps,physicsProps,physics2D".split(","), we = d.length; we--;) Be(d[we]);
				(d = n.prototype)._firstPT = d._lastParsedTransform = d._transform = null, d._onInitTween = function (e, t, r, d) {
					if (!e.nodeType) return !1;
					this._target = b = e, this._tween = r, this._vars = t, m = d, u = t.autoRound, o = !1, s = t.suffixMap || n.suffixMap, i = Z(e, ""), l = this._overwriteProps;
					var c, p, g, y, v, S, P, w, T, D = e.style;
					if (h && "" === D.zIndex && ("auto" !== (c = ee(e, "zIndex", i)) && "" !== c || this._addLazySet(D, "zIndex", 0)), "string" == typeof t && (y = D.cssText, c = se(e, i), D.cssText = y + ";" + t, c = ie(e, c, se(e)).difs, !Q && B.test(t) && (c.opacity = parseFloat(RegExp.$1)), t = c, D.cssText = y), t.className ? this._firstPT = p = a.className.parse(e, t.className, "className", this, null, null, t) : this._firstPT = p = this.parse(e, t, null), this._transformType) {
						for (T = 3 === this._transformType, Oe ? _ && (h = !0, "" === D.zIndex && ("auto" !== (P = ee(e, "zIndex", i)) && "" !== P || this._addLazySet(D, "zIndex", 0)), f && this._addLazySet(D, "WebkitBackfaceVisibility", this._vars.WebkitBackfaceVisibility || (T ? "visible" : "hidden"))) : D.zoom = 1, g = p; g && g._next;) g = g._next;
						w = new ve(e, "transform", 0, 0, null, 2), this._linkCSSP(w, null, g), w.setRatio = Oe ? Ge : Qe, w.data = this._transform || ze(e, i, !0), w.tween = r, w.pr = -1, l.pop()
					}
					if (o) {
						for (; p;) {
							for (S = p._next, g = y; g && g.pr > p.pr;) g = g._next;
							(p._prev = g ? g._prev : v) ? p._prev._next = p: y = p, (p._next = g) ? g._prev = p : v = p, p = S
						}
						this._firstPT = y
					}
					return !0
				}, d.parse = function (e, t, o, l) {
					var n, r, d, h, _, c, f, p, g, y, v = e.style;
					for (n in t) "function" == typeof (c = t[n]) && (c = c(m, b)), (r = a[n]) ? o = r.parse(e, c, n, this, o, l, t) : (_ = ee(e, n, i) + "", g = "string" == typeof c, "color" === n || "fill" === n || "stroke" === n || -1 !== n.indexOf("Color") || g && W.test(c) ? (g || (c = ((c = fe(c)).length > 3 ? "rgba(" : "rgb(") + c.join(",") + ")"), o = Pe(v, n, _, c, !0, "transparent", o, 0, l)) : g && x.test(c) ? o = Pe(v, n, _, c, !0, null, o, 0, l) : (f = (d = parseFloat(_)) || 0 === d ? _.substr((d + "").length) : "", "" !== _ && "auto" !== _ || ("width" === n || "height" === n ? (d = re(e, n, i), f = "px") : "left" === n || "top" === n ? (d = oe(e, n, i), f = "px") : (d = "opacity" !== n ? 0 : 1, f = "")), (y = g && "=" === c.charAt(1)) ? (h = parseInt(c.charAt(0) + "1", 10), c = c.substr(2), h *= parseFloat(c), p = c.replace(T, "")) : (h = parseFloat(c), p = g ? c.replace(T, "") : ""), "" === p && (p = n in s ? s[n] : f), c = h || 0 === h ? (y ? h + d : h) + p : t[n], f !== p && "" !== p && (h || 0 === h) && d && (d = te(e, n, d, f), "%" === p ? (d /= te(e, n, 100, "%") / 100, !0 !== t.strictUnits && (_ = d + "%")) : "em" === p || "rem" === p || "vw" === p || "vh" === p ? d /= te(e, n, 1, p) : "px" !== p && (h = te(e, n, h, p), p = "px"), y && (h || 0 === h) && (c = h + d + p)), y && (h += d), !d && 0 !== d || !h && 0 !== h ? void 0 !== v[n] && (c || c + "" != "NaN" && null != c) ? (o = new ve(v, n, h || d || 0, 0, o, -1, n, !1, 0, _, c)).xs0 = "none" !== c || "display" !== n && -1 === n.indexOf("Style") ? c : _ : q("invalid " + n + " tween value: " + t[n]) : (o = new ve(v, n, d, h - d, o, 0, n, !1 !== u && ("px" === p || "zIndex" === n), 0, _, c)).xs0 = p)), l && o && !o.plugin && (o.plugin = l);
					return o
				}, d.setRatio = function (e) {
					var t, o, s, i = this._firstPT;
					if (1 !== e || this._tween._time !== this._tween._duration && 0 !== this._tween._time)
						if (e || this._tween._time !== this._tween._duration && 0 !== this._tween._time || -1e-6 === this._tween._rawPrevTime)
							for (; i;) {
								if (t = i.c * e + i.s, i.r ? t = Math.round(t) : t < 1e-6 && t > -1e-6 && (t = 0), i.type)
									if (1 === i.type)
										if (2 === (s = i.l)) i.t[i.p] = i.xs0 + t + i.xs1 + i.xn1 + i.xs2;
										else if (3 === s) i.t[i.p] = i.xs0 + t + i.xs1 + i.xn1 + i.xs2 + i.xn2 + i.xs3;
								else if (4 === s) i.t[i.p] = i.xs0 + t + i.xs1 + i.xn1 + i.xs2 + i.xn2 + i.xs3 + i.xn3 + i.xs4;
								else if (5 === s) i.t[i.p] = i.xs0 + t + i.xs1 + i.xn1 + i.xs2 + i.xn2 + i.xs3 + i.xn3 + i.xs4 + i.xn4 + i.xs5;
								else {
									for (o = i.xs0 + t + i.xs1, s = 1; s < i.l; s++) o += i["xn" + s] + i["xs" + (s + 1)];
									i.t[i.p] = o
								} else -1 === i.type ? i.t[i.p] = i.xs0 : i.setRatio && i.setRatio(e);
								else i.t[i.p] = t + i.xs0;
								i = i._next
							} else
								for (; i;) 2 !== i.type ? i.t[i.p] = i.b : i.setRatio(e), i = i._next;
						else
							for (; i;) {
								if (2 !== i.type)
									if (i.r && -1 !== i.type)
										if (t = Math.round(i.s + i.c), i.type) {
											if (1 === i.type) {
												for (s = i.l, o = i.xs0 + t + i.xs1, s = 1; s < i.l; s++) o += i["xn" + s] + i["xs" + (s + 1)];
												i.t[i.p] = o
											}
										} else i.t[i.p] = t + i.xs0;
								else i.t[i.p] = i.e;
								else i.setRatio(e);
								i = i._next
							}
				}, d._enableTransforms = function (e) {
					this._transform = this._transform || ze(this._target, i, !0), this._transformType = this._transform.svg && He || !e && 3 !== this._transformType ? 2 : 3
				};
				var Ze = function (e) {
					this.t[this.p] = this.e, this.data._linkCSSP(this, this._next, null, !0)
				};
				d._addLazySet = function (e, t, o) {
					var s = this._firstPT = new ve(e, t, 0, 0, this._firstPT, 2);
					s.e = o, s.setRatio = Ze, s.data = this
				}, d._linkCSSP = function (e, t, o, s) {
					return e && (t && (t._prev = e), e._next && (e._next._prev = e._prev), e._prev ? e._prev._next = e._next : this._firstPT === e && (this._firstPT = e._next, s = !0), o ? o._next = e : s || null !== this._firstPT || (this._firstPT = e), e._next = t, e._prev = o), e
				}, d._mod = function (e) {
					for (var t = this._firstPT; t;) "function" == typeof e[t.p] && e[t.p] === Math.round && (t.r = 1), t = t._next
				}, d._kill = function (t) {
					var o, s, i, l = t;
					if (t.autoAlpha || t.alpha) {
						for (s in l = {}, t) l[s] = t[s];
						l.opacity = 1, l.autoAlpha && (l.visibility = 1)
					}
					for (t.className && (o = this._classNamePT) && ((i = o.xfirst) && i._prev ? this._linkCSSP(i._prev, o._next, i._prev._prev) : i === this._firstPT && (this._firstPT = o._next), o._next && this._linkCSSP(o._next, o._next._next, i._prev), this._classNamePT = null), o = this._firstPT; o;) o.plugin && o.plugin !== s && o.plugin._kill && (o.plugin._kill(t), s = o.plugin), o = o._next;
					return e.prototype._kill.call(this, l)
				};
				var et = function (e, t, o) {
					var s, i, l, n;
					if (e.slice)
						for (i = e.length; --i > -1;) et(e[i], t, o);
					else
						for (i = (s = e.childNodes).length; --i > -1;) n = (l = s[i]).type, l.style && (t.push(se(l)), o && o.push(l)), 1 !== n && 9 !== n && 11 !== n || !l.childNodes.length || et(l, t, o)
				};
				return n.cascadeTo = function (e, o, s) {
					var i, l, n, r, a = t.to(e, o, s),
						d = [a],
						u = [],
						h = [],
						_ = [],
						c = t._internals.reservedProps;
					for (e = a._targets || a.target, et(e, u, _), a.render(o, !0, !0), et(e, h), a.render(0, !0, !0), a._enabled(!0), i = _.length; --i > -1;)
						if ((l = ie(_[i], u[i], h[i])).firstMPT) {
							for (n in l = l.difs, s) c[n] && (l[n] = s[n]);
							for (n in r = {}, l) r[n] = u[i][n];
							d.push(t.fromTo(_[i], o, r, l))
						}
					return d
				}, e.activate([n]), n
			}, !0), f = _fwd_gsScope.FWDFWD_gsDefine.plugin({
				propName: "roundProps",
				version: "1.6.0",
				priority: -1,
				API: 2,
				init: function (e, t, o) {
					return this._tween = o, !0
				}
			}), p = function (e) {
				for (; e;) e.f || e.blob || (e.m = Math.round), e = e._next
			}, (b = f.prototype)._onInitAllProps = function () {
				for (var e, t, o, s = this._tween, i = s.vars.roundProps.join ? s.vars.roundProps : s.vars.roundProps.split(","), l = i.length, n = {}, r = s._propLookup.roundProps; --l > -1;) n[i[l]] = Math.round;
				for (l = i.length; --l > -1;)
					for (e = i[l], t = s._firstPT; t;) o = t._next, t.pg ? t.t._mod(n) : t.n === e && (2 === t.f && t.t ? p(t.t._firstPT) : (this._add(t.t, e, t.s, t.c), o && (o._prev = t._prev), t._prev ? t._prev._next = o : s._firstPT === t && (s._firstPT = o), t._next = t._prev = null, s._propLookup[e] = r)), t = o;
				return !1
			}, b._add = function (e, t, o, s) {
				this._addTween(e, t, o, o + s, t, Math.round), this._overwriteProps.push(t)
			}, _fwd_gsScope.FWDFWD_gsDefine.plugin({
				propName: "attr",
				API: 2,
				version: "0.6.0",
				init: function (e, t, o, s) {
					var i, l;
					if ("function" != typeof e.setAttribute) return !1;
					for (i in t) "function" == typeof (l = t[i]) && (l = l(s, e)), this._addTween(e, "setAttribute", e.getAttribute(i) + "", l + "", i, !1, i), this._overwriteProps.push(i);
					return !0
				}
			}), _fwd_gsScope.FWDFWD_gsDefine.plugin({
				propName: "directionalRotation",
				version: "0.3.0",
				API: 2,
				init: function (e, t, o, s) {
					"object" != typeof t && (t = {
						rotation: t
					}), this.finals = {};
					var i, l, n, r, a, d, u = !0 === t.useRadians ? 2 * Math.PI : 360;
					for (i in t) "useRadians" !== i && ("function" == typeof (r = t[i]) && (r = r(s, e)), l = (d = (r + "").split("_"))[0], n = parseFloat("function" != typeof e[i] ? e[i] : e[i.indexOf("set") || "function" != typeof e["get" + i.substr(3)] ? i : "get" + i.substr(3)]()), a = (r = this.finals[i] = "string" == typeof l && "=" === l.charAt(1) ? n + parseInt(l.charAt(0) + "1", 10) * Number(l.substr(2)) : Number(l) || 0) - n, d.length && (-1 !== (l = d.join("_")).indexOf("short") && (a %= u) !== a % (u / 2) && (a = a < 0 ? a + u : a - u), -1 !== l.indexOf("_cw") && a < 0 ? a = (a + 9999999999 * u) % u - (a / u | 0) * u : -1 !== l.indexOf("ccw") && a > 0 && (a = (a - 9999999999 * u) % u - (a / u | 0) * u)), (a > 1e-6 || a < -1e-6) && (this._addTween(e, i, n, n + a, i), this._overwriteProps.push(i)));
					return !0
				},
				set: function (e) {
					var t;
					if (1 !== e) this._super.setRatio.call(this, e);
					else
						for (t = this._firstPT; t;) t.f ? t.t[t.p](this.finals[t.p]) : t.t[t.p] = this.finals[t.p], t = t._next
				}
			})._autoCSS = !0, _fwd_gsScope.FWDFWD_gsDefine("easing.Back", ["easing.Ease"], function (e) {
				var t, o, s, i = _fwd_gsScope.FWDGreenSockGlobals || _fwd_gsScope,
					l = i.com.greensock,
					n = 2 * Math.PI,
					r = Math.PI / 2,
					a = l._class,
					d = function (t, o) {
						var s = a("easing." + t, function () {}, !0),
							i = s.prototype = new e;
						return i.constructor = s, i.getRatio = o, s
					},
					u = e.register || function () {},
					h = function (e, t, o, s, i) {
						var l = a("easing." + e, {
							easeOut: new t,
							easeIn: new o,
							easeInOut: new s
						}, !0);
						return u(l, e), l
					},
					_ = function (e, t, o) {
						this.t = e, this.v = t, o && (this.next = o, o.prev = this, this.c = o.v - t, this.gap = o.t - e)
					},
					c = function (t, o) {
						var s = a("easing." + t, function (e) {
								this._p1 = e || 0 === e ? e : 1.70158, this._p2 = 1.525 * this._p1
							}, !0),
							i = s.prototype = new e;
						return i.constructor = s, i.getRatio = o, i.config = function (e) {
							return new s(e)
						}, s
					},
					f = h("Back", c("BackOut", function (e) {
						return (e -= 1) * e * ((this._p1 + 1) * e + this._p1) + 1
					}), c("BackIn", function (e) {
						return e * e * ((this._p1 + 1) * e - this._p1)
					}), c("BackInOut", function (e) {
						return (e *= 2) < 1 ? .5 * e * e * ((this._p2 + 1) * e - this._p2) : .5 * ((e -= 2) * e * ((this._p2 + 1) * e + this._p2) + 2)
					})),
					p = a("easing.SlowMo", function (e, t, o) {
						t = t || 0 === t ? t : .7, null == e ? e = .7 : e > 1 && (e = 1), this._p = 1 !== e ? t : 0, this._p1 = (1 - e) / 2, this._p2 = e, this._p3 = this._p1 + this._p2, this._calcEnd = !0 === o
					}, !0),
					b = p.prototype = new e;
				return b.constructor = p, b.getRatio = function (e) {
					var t = e + (.5 - e) * this._p;
					return e < this._p1 ? this._calcEnd ? 1 - (e = 1 - e / this._p1) * e : t - (e = 1 - e / this._p1) * e * e * e * t : e > this._p3 ? this._calcEnd ? 1 - (e = (e - this._p3) / this._p1) * e : t + (e - t) * (e = (e - this._p3) / this._p1) * e * e * e : this._calcEnd ? 1 : t
				}, p.ease = new p(.7, .7), b.config = p.config = function (e, t, o) {
					return new p(e, t, o)
				}, (b = (t = a("easing.SteppedEase", function (e) {
					e = e || 1, this._p1 = 1 / e, this._p2 = e + 1
				}, !0)).prototype = new e).constructor = t, b.getRatio = function (e) {
					return e < 0 ? e = 0 : e >= 1 && (e = .999999999), (this._p2 * e >> 0) * this._p1
				}, b.config = t.config = function (e) {
					return new t(e)
				}, (b = (o = a("easing.RoughEase", function (t) {
					for (var o, s, i, l, n, r, a = (t = t || {}).taper || "none", d = [], u = 0, h = 0 | (t.points || 20), c = h, f = !1 !== t.randomize, p = !0 === t.clamp, b = t.template instanceof e ? t.template : null, m = "number" == typeof t.strength ? .4 * t.strength : .4; --c > -1;) o = f ? Math.random() : 1 / h * c, s = b ? b.getRatio(o) : o, i = "none" === a ? m : "out" === a ? (l = 1 - o) * l * m : "in" === a ? o * o * m : o < .5 ? (l = 2 * o) * l * .5 * m : (l = 2 * (1 - o)) * l * .5 * m, f ? s += Math.random() * i - .5 * i : c % 2 ? s += .5 * i : s -= .5 * i, p && (s > 1 ? s = 1 : s < 0 && (s = 0)), d[u++] = {
						x: o,
						y: s
					};
					for (d.sort(function (e, t) {
							return e.x - t.x
						}), r = new _(1, 1, null), c = h; --c > -1;) n = d[c], r = new _(n.x, n.y, r);
					this._prev = new _(0, 0, 0 !== r.t ? r : r.next)
				}, !0)).prototype = new e).constructor = o, b.getRatio = function (e) {
					var t = this._prev;
					if (e > t.t) {
						for (; t.next && e >= t.t;) t = t.next;
						t = t.prev
					} else
						for (; t.prev && e <= t.t;) t = t.prev;
					return this._prev = t, t.v + (e - t.t) / t.gap * t.c
				}, b.config = function (e) {
					return new o(e)
				}, o.ease = new o, h("Bounce", d("BounceOut", function (e) {
					return e < 1 / 2.75 ? 7.5625 * e * e : e < 2 / 2.75 ? 7.5625 * (e -= 1.5 / 2.75) * e + .75 : e < 2.5 / 2.75 ? 7.5625 * (e -= 2.25 / 2.75) * e + .9375 : 7.5625 * (e -= 2.625 / 2.75) * e + .984375
				}), d("BounceIn", function (e) {
					return (e = 1 - e) < 1 / 2.75 ? 1 - 7.5625 * e * e : e < 2 / 2.75 ? 1 - (7.5625 * (e -= 1.5 / 2.75) * e + .75) : e < 2.5 / 2.75 ? 1 - (7.5625 * (e -= 2.25 / 2.75) * e + .9375) : 1 - (7.5625 * (e -= 2.625 / 2.75) * e + .984375)
				}), d("BounceInOut", function (e) {
					var t = e < .5;
					return (e = t ? 1 - 2 * e : 2 * e - 1) < 1 / 2.75 ? e *= 7.5625 * e : e = e < 2 / 2.75 ? 7.5625 * (e -= 1.5 / 2.75) * e + .75 : e < 2.5 / 2.75 ? 7.5625 * (e -= 2.25 / 2.75) * e + .9375 : 7.5625 * (e -= 2.625 / 2.75) * e + .984375, t ? .5 * (1 - e) : .5 * e + .5
				})), h("Circ", d("CircOut", function (e) {
					return Math.sqrt(1 - (e -= 1) * e)
				}), d("CircIn", function (e) {
					return -(Math.sqrt(1 - e * e) - 1)
				}), d("CircInOut", function (e) {
					return (e *= 2) < 1 ? -.5 * (Math.sqrt(1 - e * e) - 1) : .5 * (Math.sqrt(1 - (e -= 2) * e) + 1)
				})), h("Elastic", (s = function (t, o, s) {
					var i = a("easing." + t, function (e, t) {
							this._p1 = e >= 1 ? e : 1, this._p2 = (t || s) / (e < 1 ? e : 1), this._p3 = this._p2 / n * (Math.asin(1 / this._p1) || 0), this._p2 = n / this._p2
						}, !0),
						l = i.prototype = new e;
					return l.constructor = i, l.getRatio = o, l.config = function (e, t) {
						return new i(e, t)
					}, i
				})("ElasticOut", function (e) {
					return this._p1 * Math.pow(2, -10 * e) * Math.sin((e - this._p3) * this._p2) + 1
				}, .3), s("ElasticIn", function (e) {
					return -this._p1 * Math.pow(2, 10 * (e -= 1)) * Math.sin((e - this._p3) * this._p2)
				}, .3), s("ElasticInOut", function (e) {
					return (e *= 2) < 1 ? this._p1 * Math.pow(2, 10 * (e -= 1)) * Math.sin((e - this._p3) * this._p2) * -.5 : this._p1 * Math.pow(2, -10 * (e -= 1)) * Math.sin((e - this._p3) * this._p2) * .5 + 1
				}, .45)), h("Expo", d("ExpoOut", function (e) {
					return 1 - Math.pow(2, -10 * e)
				}), d("ExpoIn", function (e) {
					return Math.pow(2, 10 * (e - 1)) - .001
				}), d("ExpoInOut", function (e) {
					return (e *= 2) < 1 ? .5 * Math.pow(2, 10 * (e - 1)) : .5 * (2 - Math.pow(2, -10 * (e - 1)))
				})), h("Sine", d("SineOut", function (e) {
					return Math.sin(e * r)
				}), d("SineIn", function (e) {
					return 1 - Math.cos(e * r)
				}), d("SineInOut", function (e) {
					return -.5 * (Math.cos(Math.PI * e) - 1)
				})), a("easing.EaseLookup", {
					find: function (t) {
						return e.map[t]
					}
				}, !0), u(i.SlowMo, "SlowMo", "ease,"), u(o, "RoughEase", "ease,"), u(t, "SteppedEase", "ease,"), f
			}, !0)
		}), _fwd_gsScope.FWDFWD_gsDefine && _fwd_gsScope._fwd_gsQueue.pop()(),
		function (e, t) {
			"use strict";
			var o = {},
				s = e.FWDGreenSockGlobals = e.FWDGreenSockGlobals || e;
			if (!s.FWDTweenLite) {
				var i, l, n, r, a, d, u, h = function (e) {
						var t, o = e.split("."),
							i = s;
						for (t = 0; t < o.length; t++) i[o[t]] = i = i[o[t]] || {};
						return i
					},
					_ = h("com.greensock"),
					c = 1e-10,
					f = function (e) {
						var t, o = [],
							s = e.length;
						for (t = 0; t !== s; o.push(e[t++]));
						return o
					},
					p = function () {},
					b = (d = Object.prototype.toString, u = d.call([]), function (e) {
						return null != e && (e instanceof Array || "object" == typeof e && !!e.push && d.call(e) === u)
					}),
					m = {},
					g = function (i, l, n, r) {
						this.sc = m[i] ? m[i].sc : [], m[i] = this, this.gsClass = null, this.func = n;
						var a = [];
						this.check = function (d) {
							for (var u, _, c, f, p, b = l.length, y = b; --b > -1;)(u = m[l[b]] || new g(l[b], [])).gsClass ? (a[b] = u.gsClass, y--) : d && u.sc.push(this);
							if (0 === y && n) {
								if (c = (_ = ("com.greensock." + i).split(".")).pop(), f = h(_.join("."))[c] = this.gsClass = n.apply(n, a), r)
									if (s[c] = o[c] = f, !(p = "undefined" != typeof fwd_module && fwd_module.exports) && "function" == typeof define && define.amd) define((e.FWDGreenSockAMDPath ? e.FWDGreenSockAMDPath + "/" : "") + i.split(".").pop(), [], function () {
										return f
									});
									else if (p)
									if (i === t)
										for (b in fwd_module.exports = o[t] = f, o) f[b] = o[b];
									else o[t] && (o[t][c] = f);
								for (b = 0; b < this.sc.length; b++) this.sc[b].check()
							}
						}, this.check(!0)
					},
					y = e.FWDFWD_gsDefine = function (e, t, o, s) {
						return new g(e, t, o, s)
					},
					v = _._class = function (e, t, o) {
						return t = t || function () {}, y(e, [], function () {
							return t
						}, o), t
					};
				y.globals = s;
				var S = [0, 0, 1, 1],
					P = v("easing.Ease", function (e, t, o, s) {
						this._func = e, this._type = o || 0, this._power = s || 0, this._params = t ? S.concat(t) : S
					}, !0),
					w = P.map = {},
					T = P.register = function (e, t, o, s) {
						for (var i, l, n, r, a = t.split(","), d = a.length, u = (o || "easeIn,easeOut,easeInOut").split(","); --d > -1;)
							for (l = a[d], i = s ? v("easing." + l, null, !0) : _.easing[l] || {}, n = u.length; --n > -1;) r = u[n], w[l + "." + r] = w[r + l] = i[r] = e.getRatio ? e : e[r] || new e
					};
				for ((n = P.prototype)._calcEnd = !1, n.getRatio = function (e) {
						if (this._func) return this._params[0] = e, this._func.apply(null, this._params);
						var t = this._type,
							o = this._power,
							s = 1 === t ? 1 - e : 2 === t ? e : e < .5 ? 2 * e : 2 * (1 - e);
						return 1 === o ? s *= s : 2 === o ? s *= s * s : 3 === o ? s *= s * s * s : 4 === o && (s *= s * s * s * s), 1 === t ? 1 - s : 2 === t ? s : e < .5 ? s / 2 : 1 - s / 2
					}, l = (i = ["Linear", "Quad", "Cubic", "Quart", "Quint,Strong"]).length; --l > -1;) n = i[l] + ",Power" + l, T(new P(null, null, 1, l), n, "easeOut", !0), T(new P(null, null, 2, l), n, "easeIn" + (0 === l ? ",easeNone" : "")), T(new P(null, null, 3, l), n, "easeInOut");
				w.linear = _.easing.Linear.easeIn, w.swing = _.easing.Quad.easeInOut;
				var D = v("events.EventDispatcher", function (e) {
					this._listeners = {}, this._eventTarget = e || this
				});
				(n = D.prototype).addEventListener = function (e, t, o, s, i) {
					i = i || 0;
					var l, n, d = this._listeners[e],
						u = 0;
					for (this !== r || a || r.wake(), null == d && (this._listeners[e] = d = []), n = d.length; --n > -1;)(l = d[n]).c === t && l.s === o ? d.splice(n, 1) : 0 === u && l.pr < i && (u = n + 1);
					d.splice(u, 0, {
						c: t,
						s: o,
						up: s,
						pr: i
					})
				}, n.removeEventListener = function (e, t) {
					var o, s = this._listeners[e];
					if (s)
						for (o = s.length; --o > -1;)
							if (s[o].c === t) return void s.splice(o, 1)
				}, n.dispatchEvent = function (e) {
					var t, o, s, i = this._listeners[e];
					if (i)
						for ((t = i.length) > 1 && (i = i.slice(0)), o = this._eventTarget; --t > -1;)(s = i[t]) && (s.up ? s.c.call(s.s || o, {
							type: e,
							target: o
						}) : s.c.call(s.s || o))
				};
				var B = e.requestAnimationFrame,
					H = e.cancelAnimationFrame,
					W = Date.now || function () {
						return (new Date).getTime()
					},
					F = W();
				for (l = (i = ["ms", "moz", "webkit", "o"]).length; --l > -1 && !B;) B = e[i[l] + "RequestAnimationFrame"], H = e[i[l] + "CancelAnimationFrame"] || e[i[l] + "CancelRequestAnimationFrame"];
				v("Ticker", function (e, t) {
					var o, s, i, l, n, d = this,
						u = W(),
						h = !(!1 === t || !B) && "auto",
						_ = 500,
						c = 33,
						f = function (e) {
							var t, r, a = W() - F;
							a > _ && (u += a - c), F += a, d.time = (F - u) / 1e3, t = d.time - n, (!o || t > 0 || !0 === e) && (d.frame++, n += t + (t >= l ? .004 : l - t), r = !0), !0 !== e && (i = s(f)), r && d.dispatchEvent("tick")
						};
					D.call(d), d.time = d.frame = 0, d.tick = function () {
						f(!0)
					}, d.lagSmoothing = function (e, t) {
						_ = e || 1e10, c = Math.min(t, _, 0)
					}, d.sleep = function () {
						null != i && (h && H ? H(i) : clearTimeout(i), s = p, i = null, d === r && (a = !1))
					}, d.wake = function (e) {
						null !== i ? d.sleep() : e ? u += -F + (F = W()) : d.frame > 10 && (F = W() - _ + 5), s = 0 === o ? p : h && B ? B : function (e) {
							return setTimeout(e, 1e3 * (n - d.time) + 1 | 0)
						}, d === r && (a = !0), f(2)
					}, d.fps = function (e) {
						if (!arguments.length) return o;
						l = 1 / ((o = e) || 60), n = this.time + l, d.wake()
					}, d.useRAF = function (e) {
						if (!arguments.length) return h;
						d.sleep(), h = e, d.fps(o)
					}, d.fps(e), setTimeout(function () {
						"auto" === h && d.frame < 5 && "hidden" !== document.visibilityState && d.useRAF(!1)
					}, 1500)
				}), (n = _.Ticker.prototype = new _.events.EventDispatcher).constructor = _.Ticker;
				var C = v("core.FWDAnim", function (e, t) {
					if (this.vars = t = t || {}, this._duration = this._totalDuration = e || 0, this._delay = Number(t.delay) || 0, this._timeScale = 1, this._active = !0 === t.immediateRender, this.data = t.data, this._reversed = !0 === t.reversed, G) {
						a || r.wake();
						var o = this.vars.useFrames ? Q : G;
						o.add(this, o._time), this.vars.paused && this.paused(!0)
					}
				});
				r = C.ticker = new _.Ticker, (n = C.prototype)._dirty = n._gc = n._initted = n._paused = !1, n._totalTime = n._time = 0, n._rawPrevTime = -1, n._next = n._last = n._onUpdate = n._timeline = n.timeline = null, n._paused = !1;
				var E = function () {
					a && W() - F > 2e3 && r.wake(), setTimeout(E, 2e3)
				};
				E(), n.play = function (e, t) {
					return null != e && this.seek(e, t), this.reversed(!1).paused(!1)
				}, n.pause = function (e, t) {
					return null != e && this.seek(e, t), this.paused(!0)
				}, n.resume = function (e, t) {
					return null != e && this.seek(e, t), this.paused(!1)
				}, n.seek = function (e, t) {
					return this.totalTime(Number(e), !1 !== t)
				}, n.restart = function (e, t) {
					return this.reversed(!1).paused(!1).totalTime(e ? -this._delay : 0, !1 !== t, !0)
				}, n.reverse = function (e, t) {
					return null != e && this.seek(e || this.totalDuration(), t), this.reversed(!0).paused(!1)
				}, n.render = function (e, t, o) {}, n.invalidate = function () {
					return this._time = this._totalTime = 0, this._initted = this._gc = !1, this._rawPrevTime = -1, !this._gc && this.timeline || this._enabled(!0), this
				}, n.isActive = function () {
					var e, t = this._timeline,
						o = this._startTime;
					return !t || !this._gc && !this._paused && t.isActive() && (e = t.rawTime()) >= o && e < o + this.totalDuration() / this._timeScale
				}, n._enabled = function (e, t) {
					return a || r.wake(), this._gc = !e, this._active = this.isActive(), !0 !== t && (e && !this.timeline ? this._timeline.add(this, this._startTime - this._delay) : !e && this.timeline && this._timeline._remove(this, !0)), !1
				}, n._kill = function (e, t) {
					return this._enabled(!1, !1)
				}, n.kill = function (e, t) {
					return this._kill(e, t), this
				}, n._uncache = function (e) {
					for (var t = e ? this : this.timeline; t;) t._dirty = !0, t = t.timeline;
					return this
				}, n._swapSelfInParams = function (e) {
					for (var t = e.length, o = e.concat(); --t > -1;) "{self}" === e[t] && (o[t] = this);
					return o
				}, n._callback = function (e) {
					var t = this.vars,
						o = t[e],
						s = t[e + "Params"],
						i = t[e + "Scope"] || t.callbackScope || this;
					switch (s ? s.length : 0) {
						case 0:
							o.call(i);
							break;
						case 1:
							o.call(i, s[0]);
							break;
						case 2:
							o.call(i, s[0], s[1]);
							break;
						default:
							o.apply(i, s)
					}
				}, n.eventCallback = function (e, t, o, s) {
					if ("on" === (e || "").substr(0, 2)) {
						var i = this.vars;
						if (1 === arguments.length) return i[e];
						null == t ? delete i[e] : (i[e] = t, i[e + "Params"] = b(o) && -1 !== o.join("").indexOf("{self}") ? this._swapSelfInParams(o) : o, i[e + "Scope"] = s), "onUpdate" === e && (this._onUpdate = t)
					}
					return this
				}, n.delay = function (e) {
					return arguments.length ? (this._timeline.smoothChildTiming && this.startTime(this._startTime + e - this._delay), this._delay = e, this) : this._delay
				}, n.duration = function (e) {
					return arguments.length ? (this._duration = this._totalDuration = e, this._uncache(!0), this._timeline.smoothChildTiming && this._time > 0 && this._time < this._duration && 0 !== e && this.totalTime(this._totalTime * (e / this._duration), !0), this) : (this._dirty = !1, this._duration)
				}, n.totalDuration = function (e) {
					return this._dirty = !1, arguments.length ? this.duration(e) : this._totalDuration
				}, n.time = function (e, t) {
					return arguments.length ? (this._dirty && this.totalDuration(), this.totalTime(e > this._duration ? this._duration : e, t)) : this._time
				}, n.totalTime = function (e, t, o) {
					if (a || r.wake(), !arguments.length) return this._totalTime;
					if (this._timeline) {
						if (e < 0 && !o && (e += this.totalDuration()), this._timeline.smoothChildTiming) {
							this._dirty && this.totalDuration();
							var s = this._totalDuration,
								i = this._timeline;
							if (e > s && !o && (e = s), this._startTime = (this._paused ? this._pauseTime : i._time) - (this._reversed ? s - e : e) / this._timeScale, i._dirty || this._uncache(!1), i._timeline)
								for (; i._timeline;) i._timeline._time !== (i._startTime + i._totalTime) / i._timeScale && i.totalTime(i._totalTime, !0), i = i._timeline
						}
						this._gc && this._enabled(!0, !1), this._totalTime === e && 0 !== this._duration || (V.length && J(), this.render(e, t, !1), V.length && J())
					}
					return this
				}, n.progress = n.totalProgress = function (e, t) {
					var o = this.duration();
					return arguments.length ? this.totalTime(o * e, t) : o ? this._time / o : this.ratio
				}, n.startTime = function (e) {
					return arguments.length ? (e !== this._startTime && (this._startTime = e, this.timeline && this.timeline._sortChildren && this.timeline.add(this, e - this._delay)), this) : this._startTime
				}, n.endTime = function (e) {
					return this._startTime + (0 != e ? this.totalDuration() : this.duration()) / this._timeScale
				}, n.timeScale = function (e) {
					if (!arguments.length) return this._timeScale;
					if (e = e || c, this._timeline && this._timeline.smoothChildTiming) {
						var t = this._pauseTime,
							o = t || 0 === t ? t : this._timeline.totalTime();
						this._startTime = o - (o - this._startTime) * this._timeScale / e
					}
					return this._timeScale = e, this._uncache(!1)
				}, n.reversed = function (e) {
					return arguments.length ? (e != this._reversed && (this._reversed = e, this.totalTime(this._timeline && !this._timeline.smoothChildTiming ? this.totalDuration() - this._totalTime : this._totalTime, !0)), this) : this._reversed
				}, n.paused = function (e) {
					if (!arguments.length) return this._paused;
					var t, o, s = this._timeline;
					return e != this._paused && s && (a || e || r.wake(), o = (t = s.rawTime()) - this._pauseTime, !e && s.smoothChildTiming && (this._startTime += o, this._uncache(!1)), this._pauseTime = e ? t : null, this._paused = e, this._active = this.isActive(), !e && 0 !== o && this._initted && this.duration() && (t = s.smoothChildTiming ? this._totalTime : (t - this._startTime) / this._timeScale, this.render(t, t === this._totalTime, !0))), this._gc && !e && this._enabled(!0, !1), this
				};
				var U = v("core.FWDSimpleTimeline", function (e) {
					C.call(this, 0, e), this.autoRemoveChildren = this.smoothChildTiming = !0
				});
				(n = U.prototype = new C).constructor = U, n.kill()._gc = !1, n._first = n._last = n._recent = null, n._sortChildren = !1, n.add = n.insert = function (e, t, o, s) {
					var i, l;
					if (e._startTime = Number(t || 0) + e._delay, e._paused && this !== e._timeline && (e._pauseTime = e._startTime + (this.rawTime() - e._startTime) / e._timeScale), e.timeline && e.timeline._remove(e, !0), e.timeline = e._timeline = this, e._gc && e._enabled(!0, !0), i = this._last, this._sortChildren)
						for (l = e._startTime; i && i._startTime > l;) i = i._prev;
					return i ? (e._next = i._next, i._next = e) : (e._next = this._first, this._first = e), e._next ? e._next._prev = e : this._last = e, e._prev = i, this._recent = e, this._timeline && this._uncache(!0), this
				}, n._remove = function (e, t) {
					return e.timeline === this && (t || e._enabled(!1, !0), e._prev ? e._prev._next = e._next : this._first === e && (this._first = e._next), e._next ? e._next._prev = e._prev : this._last === e && (this._last = e._prev), e._next = e._prev = e.timeline = null, e === this._recent && (this._recent = this._last), this._timeline && this._uncache(!0)), this
				}, n.render = function (e, t, o) {
					var s, i = this._first;
					for (this._totalTime = this._time = this._rawPrevTime = e; i;) s = i._next, (i._active || e >= i._startTime && !i._paused) && (i._reversed ? i.render((i._dirty ? i.totalDuration() : i._totalDuration) - (e - i._startTime) * i._timeScale, t, o) : i.render((e - i._startTime) * i._timeScale, t, o)), i = s
				}, n.rawTime = function () {
					return a || r.wake(), this._totalTime
				};
				var O = v("FWDTweenLite", function (t, o, s) {
						if (C.call(this, o, s), this.render = O.prototype.render, null == t) throw "Cannot tween a null target.";
						this.target = t = "string" != typeof t ? t : O.selector(t) || t;
						var i, l, n, r = t.jquery || t.length && t !== e && t[0] && (t[0] === e || t[0].nodeType && t[0].style && !t.nodeType),
							a = this.vars.overwrite;
						if (this._overwrite = a = null == a ? z[O.defaultOverwrite] : "number" == typeof a ? a >> 0 : z[a], (r || t instanceof Array || t.push && b(t)) && "number" != typeof t[0])
							for (this._targets = n = f(t), this._propLookup = [], this._siblings = [], i = 0; i < n.length; i++)(l = n[i]) ? "string" != typeof l ? l.length && l !== e && l[0] && (l[0] === e || l[0].nodeType && l[0].style && !l.nodeType) ? (n.splice(i--, 1), this._targets = n = n.concat(f(l))) : (this._siblings[i] = K(l, this, !1), 1 === a && this._siblings[i].length > 1 && Z(l, this, null, 1, this._siblings[i])) : "string" == typeof (l = n[i--] = O.selector(l)) && n.splice(i + 1, 1) : n.splice(i--, 1);
						else this._propLookup = {}, this._siblings = K(t, this, !1), 1 === a && this._siblings.length > 1 && Z(t, this, null, 1, this._siblings);
						(this.vars.immediateRender || 0 === o && 0 === this._delay && !1 !== this.vars.immediateRender) && (this._time = -c, this.render(Math.min(0, -this._delay)))
					}, !0),
					k = function (t) {
						return t && t.length && t !== e && t[0] && (t[0] === e || t[0].nodeType && t[0].style && !t.nodeType)
					};
				(n = O.prototype = new C).constructor = O, n.kill()._gc = !1, n.ratio = 0, n._firstPT = n._targets = n._overwrittenProps = n._startAt = null, n._notifyPluginsOfEnabled = n._lazy = !1, O.version = "1.19.0", O.defaultEase = n._ease = new P(null, null, 1, 1), O.defaultOverwrite = "auto", O.ticker = r, O.autoSleep = 120, O.lagSmoothing = function (e, t) {
					r.lagSmoothing(e, t)
				}, O.selector = e.$ || e.jQuery || function (t) {
					var o = e.$ || e.jQuery;
					return o ? (O.selector = o, o(t)) : "undefined" == typeof document ? t : document.querySelectorAll ? document.querySelectorAll(t) : document.getElementById("#" === t.charAt(0) ? t.substr(1) : t)
				};
				var V = [],
					A = {},
					x = /(?:(-|-=|\+=)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,
					I = function (e) {
						for (var t, o = this._firstPT; o;) t = o.blob ? e ? this.join("") : this.start : o.c * e + o.s, o.m ? t = o.m(t, this._target || o.t) : t < 1e-6 && t > -1e-6 && (t = 0), o.f ? o.fp ? o.t[o.p](o.fp, t) : o.t[o.p](t) : o.t[o.p] = t, o = o._next
					},
					L = function (e, t, o, s) {
						var i, l, n, r, a, d, u, h = [e, t],
							_ = 0,
							c = "",
							f = 0;
						for (h.start = e, o && (o(h), e = h[0], t = h[1]), h.length = 0, i = e.match(x) || [], l = t.match(x) || [], s && (s._next = null, s.blob = 1, h._firstPT = h._applyPT = s), a = l.length, r = 0; r < a; r++) u = l[r], c += (d = t.substr(_, t.indexOf(u, _) - _)) || !r ? d : ",", _ += d.length, f ? f = (f + 1) % 5 : "rgba(" === d.substr(-5) && (f = 1), u === i[r] || i.length <= r ? c += u : (c && (h.push(c), c = ""), n = parseFloat(i[r]), h.push(n), h._firstPT = {
							_next: h._firstPT,
							t: h,
							p: h.length - 1,
							s: n,
							c: ("=" === u.charAt(1) ? parseInt(u.charAt(0) + "1", 10) * parseFloat(u.substr(2)) : parseFloat(u) - n) || 0,
							f: 0,
							m: f && f < 4 ? Math.round : 0
						}), _ += u.length;
						return (c += t.substr(_)) && h.push(c), h.setRatio = I, h
					},
					M = function (e, t, o, s, i, l, n, r, a) {
						"function" == typeof s && (s = s(a || 0, e));
						var d, u = "get" === o ? e[t] : o,
							h = typeof e[t],
							_ = "string" == typeof s && "=" === s.charAt(1),
							c = {
								t: e,
								p: t,
								s: u,
								f: "function" === h,
								pg: 0,
								n: i || t,
								m: l ? "function" == typeof l ? l : Math.round : 0,
								pr: 0,
								c: _ ? parseInt(s.charAt(0) + "1", 10) * parseFloat(s.substr(2)) : parseFloat(s) - u || 0
							};
						if ("number" !== h && ("function" === h && "get" === o && (d = t.indexOf("set") || "function" != typeof e["get" + t.substr(3)] ? t : "get" + t.substr(3), c.s = u = n ? e[d](n) : e[d]()), "string" == typeof u && (n || isNaN(u)) ? (c.fp = n, c = {
								t: L(u, s, r || O.defaultStringFilter, c),
								p: "setRatio",
								s: 0,
								c: 1,
								f: 2,
								pg: 0,
								n: i || t,
								pr: 0,
								m: 0
							}) : _ || (c.s = parseFloat(u), c.c = parseFloat(s) - c.s || 0)), c.c) return (c._next = this._firstPT) && (c._next._prev = c), this._firstPT = c, c
					},
					R = O._internals = {
						isArray: b,
						isSelector: k,
						lazyTweens: V,
						blobDif: L
					},
					N = O._plugins = {},
					Y = R.tweenLookup = {},
					j = 0,
					X = R.reservedProps = {
						ease: 1,
						delay: 1,
						overwrite: 1,
						onComplete: 1,
						onCompleteParams: 1,
						onCompleteScope: 1,
						useFrames: 1,
						runBackwards: 1,
						startAt: 1,
						onUpdate: 1,
						onUpdateParams: 1,
						onUpdateScope: 1,
						onStart: 1,
						onStartParams: 1,
						onStartScope: 1,
						onReverseComplete: 1,
						onReverseCompleteParams: 1,
						onReverseCompleteScope: 1,
						onRepeat: 1,
						onRepeatParams: 1,
						onRepeatScope: 1,
						easeParams: 1,
						yoyo: 1,
						immediateRender: 1,
						repeat: 1,
						repeatDelay: 1,
						data: 1,
						paused: 1,
						reversed: 1,
						autoCSS: 1,
						lazy: 1,
						onOverwrite: 1,
						callbackScope: 1,
						stringFilter: 1,
						id: 1
					},
					z = {
						none: 0,
						all: 1,
						auto: 2,
						concurrent: 3,
						allOnStart: 4,
						preexisting: 5,
						true: 1,
						false: 0
					},
					Q = C._rootFramesTimeline = new U,
					G = C._rootTimeline = new U,
					q = 30,
					J = R.lazyRender = function () {
						var e, t = V.length;
						for (A = {}; --t > -1;)(e = V[t]) && !1 !== e._lazy && (e.render(e._lazy[0], e._lazy[1], !0), e._lazy = !1);
						V.length = 0
					};
				G._startTime = r.time, Q._startTime = r.frame, G._active = Q._active = !0, setTimeout(J, 1), C._updateRoot = O.render = function () {
					var e, t, o;
					if (V.length && J(), G.render((r.time - G._startTime) * G._timeScale, !1, !1), Q.render((r.frame - Q._startTime) * Q._timeScale, !1, !1), V.length && J(), r.frame >= q) {
						for (o in q = r.frame + (parseInt(O.autoSleep, 10) || 120), Y) {
							for (e = (t = Y[o].tweens).length; --e > -1;) t[e]._gc && t.splice(e, 1);
							0 === t.length && delete Y[o]
						}
						if ((!(o = G._first) || o._paused) && O.autoSleep && !Q._first && 1 === r._listeners.tick.length) {
							for (; o && o._paused;) o = o._next;
							o || r.sleep()
						}
					}
				}, r.addEventListener("tick", C._updateRoot);
				var K = function (e, t, o) {
						var s, i, l = e._gsTweenID;
						if (Y[l || (e._gsTweenID = l = "t" + j++)] || (Y[l] = {
								target: e,
								tweens: []
							}), t && ((s = Y[l].tweens)[i = s.length] = t, o))
							for (; --i > -1;) s[i] === t && s.splice(i, 1);
						return Y[l].tweens
					},
					$ = function (e, t, o, s) {
						var i, l, n = e.vars.onOverwrite;
						return n && (i = n(e, t, o, s)), (n = O.onOverwrite) && (l = n(e, t, o, s)), !1 !== i && !1 !== l
					},
					Z = function (e, t, o, s, i) {
						var l, n, r, a;
						if (1 === s || s >= 4) {
							for (a = i.length, l = 0; l < a; l++)
								if ((r = i[l]) !== t) r._gc || r._kill(null, e, t) && (n = !0);
								else if (5 === s) break;
							return n
						}
						var d, u = t._startTime + c,
							h = [],
							_ = 0,
							f = 0 === t._duration;
						for (l = i.length; --l > -1;)(r = i[l]) === t || r._gc || r._paused || (r._timeline !== t._timeline ? (d = d || ee(t, 0, f), 0 === ee(r, d, f) && (h[_++] = r)) : r._startTime <= u && r._startTime + r.totalDuration() / r._timeScale > u && ((f || !r._initted) && u - r._startTime <= 2e-10 || (h[_++] = r)));
						for (l = _; --l > -1;)
							if (r = h[l], 2 === s && r._kill(o, e, t) && (n = !0), 2 !== s || !r._firstPT && r._initted) {
								if (2 !== s && !$(r, t)) continue;
								r._enabled(!1, !1) && (n = !0)
							}
						return n
					},
					ee = function (e, t, o) {
						for (var s = e._timeline, i = s._timeScale, l = e._startTime; s._timeline;) {
							if (l += s._startTime, i *= s._timeScale, s._paused) return -100;
							s = s._timeline
						}
						return (l /= i) > t ? l - t : o && l === t || !e._initted && l - t < 2 * c ? c : (l += e.totalDuration() / e._timeScale / i) > t + c ? 0 : l - t - c
					};
				n._init = function () {
					var e, t, o, s, i, l, n = this.vars,
						r = this._overwrittenProps,
						a = this._duration,
						d = !!n.immediateRender,
						u = n.ease;
					if (n.startAt) {
						for (s in this._startAt && (this._startAt.render(-1, !0), this._startAt.kill()), i = {}, n.startAt) i[s] = n.startAt[s];
						if (i.overwrite = !1, i.immediateRender = !0, i.lazy = d && !1 !== n.lazy, i.startAt = i.delay = null, this._startAt = O.to(this.target, 0, i), d)
							if (this._time > 0) this._startAt = null;
							else if (0 !== a) return
					} else if (n.runBackwards && 0 !== a)
						if (this._startAt) this._startAt.render(-1, !0), this._startAt.kill(), this._startAt = null;
						else {
							for (s in 0 !== this._time && (d = !1), o = {}, n) X[s] && "autoCSS" !== s || (o[s] = n[s]);
							if (o.overwrite = 0, o.data = "isFromStart", o.lazy = d && !1 !== n.lazy, o.immediateRender = d, this._startAt = O.to(this.target, 0, o), d) {
								if (0 === this._time) return
							} else this._startAt._init(), this._startAt._enabled(!1), this.vars.immediateRender && (this._startAt = null)
						}
					if (this._ease = u = u ? u instanceof P ? u : "function" == typeof u ? new P(u, n.easeParams) : w[u] || O.defaultEase : O.defaultEase, n.easeParams instanceof Array && u.config && (this._ease = u.config.apply(u, n.easeParams)), this._easeType = this._ease._type, this._easePower = this._ease._power, this._firstPT = null, this._targets)
						for (l = this._targets.length, e = 0; e < l; e++) this._initProps(this._targets[e], this._propLookup[e] = {}, this._siblings[e], r ? r[e] : null, e) && (t = !0);
					else t = this._initProps(this.target, this._propLookup, this._siblings, r, 0);
					if (t && O._onPluginEvent("_onInitAllProps", this), r && (this._firstPT || "function" != typeof this.target && this._enabled(!1, !1)), n.runBackwards)
						for (o = this._firstPT; o;) o.s += o.c, o.c = -o.c, o = o._next;
					this._onUpdate = n.onUpdate, this._initted = !0
				}, n._initProps = function (t, o, s, i, l) {
					var n, r, a, d, u, h;
					if (null == t) return !1;
					for (n in A[t._gsTweenID] && J(), this.vars.css || t.style && t !== e && t.nodeType && N.css && !1 !== this.vars.autoCSS && function (e, t) {
							var o, s = {};
							for (o in e) X[o] || o in t && "transform" !== o && "x" !== o && "y" !== o && "width" !== o && "height" !== o && "className" !== o && "border" !== o || !(!N[o] || N[o] && N[o]._autoCSS) || (s[o] = e[o], delete e[o]);
							e.css = s
						}(this.vars, t), this.vars)
						if (h = this.vars[n], X[n]) h && (h instanceof Array || h.push && b(h)) && -1 !== h.join("").indexOf("{self}") && (this.vars[n] = h = this._swapSelfInParams(h, this));
						else if (N[n] && (d = new N[n])._onInitTween(t, this.vars[n], this, l)) {
						for (this._firstPT = u = {
								_next: this._firstPT,
								t: d,
								p: "setRatio",
								s: 0,
								c: 1,
								f: 1,
								n: n,
								pg: 1,
								pr: d._priority,
								m: 0
							}, r = d._overwriteProps.length; --r > -1;) o[d._overwriteProps[r]] = this._firstPT;
						(d._priority || d._onInitAllProps) && (a = !0), (d._onDisable || d._onEnable) && (this._notifyPluginsOfEnabled = !0), u._next && (u._next._prev = u)
					} else o[n] = M.call(this, t, n, "get", h, n, 0, null, this.vars.stringFilter, l);
					return i && this._kill(i, t) ? this._initProps(t, o, s, i, l) : this._overwrite > 1 && this._firstPT && s.length > 1 && Z(t, this, o, this._overwrite, s) ? (this._kill(o, t), this._initProps(t, o, s, i, l)) : (this._firstPT && (!1 !== this.vars.lazy && this._duration || this.vars.lazy && !this._duration) && (A[t._gsTweenID] = !0), a)
				}, n.render = function (e, t, o) {
					var s, i, l, n, r = this._time,
						a = this._duration,
						d = this._rawPrevTime;
					if (e >= a - 1e-7) this._totalTime = this._time = a, this.ratio = this._ease._calcEnd ? this._ease.getRatio(1) : 1, this._reversed || (s = !0, i = "onComplete", o = o || this._timeline.autoRemoveChildren), 0 === a && (this._initted || !this.vars.lazy || o) && (this._startTime === this._timeline._duration && (e = 0), (d < 0 || e <= 0 && e >= -1e-7 || d === c && "isPause" !== this.data) && d !== e && (o = !0, d > c && (i = "onReverseComplete")), this._rawPrevTime = n = !t || e || d === e ? e : c);
					else if (e < 1e-7) this._totalTime = this._time = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0, (0 !== r || 0 === a && d > 0) && (i = "onReverseComplete", s = this._reversed), e < 0 && (this._active = !1, 0 === a && (this._initted || !this.vars.lazy || o) && (d >= 0 && (d !== c || "isPause" !== this.data) && (o = !0), this._rawPrevTime = n = !t || e || d === e ? e : c)), this._initted || (o = !0);
					else if (this._totalTime = this._time = e, this._easeType) {
						var u = e / a,
							h = this._easeType,
							_ = this._easePower;
						(1 === h || 3 === h && u >= .5) && (u = 1 - u), 3 === h && (u *= 2), 1 === _ ? u *= u : 2 === _ ? u *= u * u : 3 === _ ? u *= u * u * u : 4 === _ && (u *= u * u * u * u), this.ratio = 1 === h ? 1 - u : 2 === h ? u : e / a < .5 ? u / 2 : 1 - u / 2
					} else this.ratio = this._ease.getRatio(e / a);
					if (this._time !== r || o) {
						if (!this._initted) {
							if (this._init(), !this._initted || this._gc) return;
							if (!o && this._firstPT && (!1 !== this.vars.lazy && this._duration || this.vars.lazy && !this._duration)) return this._time = this._totalTime = r, this._rawPrevTime = d, V.push(this), void(this._lazy = [e, t]);
							this._time && !s ? this.ratio = this._ease.getRatio(this._time / a) : s && this._ease._calcEnd && (this.ratio = this._ease.getRatio(0 === this._time ? 0 : 1))
						}
						for (!1 !== this._lazy && (this._lazy = !1), this._active || !this._paused && this._time !== r && e >= 0 && (this._active = !0), 0 === r && (this._startAt && (e >= 0 ? this._startAt.render(e, t, o) : i || (i = "_dummyGS")), this.vars.onStart && (0 === this._time && 0 !== a || t || this._callback("onStart"))), l = this._firstPT; l;) l.f ? l.t[l.p](l.c * this.ratio + l.s) : l.t[l.p] = l.c * this.ratio + l.s, l = l._next;
						this._onUpdate && (e < 0 && this._startAt && -1e-4 !== e && this._startAt.render(e, t, o), t || (this._time !== r || s || o) && this._callback("onUpdate")), i && (this._gc && !o || (e < 0 && this._startAt && !this._onUpdate && -1e-4 !== e && this._startAt.render(e, t, o), s && (this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[i] && this._callback(i), 0 === a && this._rawPrevTime === c && n !== c && (this._rawPrevTime = 0)))
					}
				}, n._kill = function (e, t, o) {
					if ("all" === e && (e = null), null == e && (null == t || t === this.target)) return this._lazy = !1, this._enabled(!1, !1);
					t = "string" != typeof t ? t || this._targets || this.target : O.selector(t) || t;
					var s, i, l, n, r, a, d, u, h, _ = o && this._time && o._startTime === this._startTime && this._timeline === o._timeline;
					if ((b(t) || k(t)) && "number" != typeof t[0])
						for (s = t.length; --s > -1;) this._kill(e, t[s], o) && (a = !0);
					else {
						if (this._targets) {
							for (s = this._targets.length; --s > -1;)
								if (t === this._targets[s]) {
									r = this._propLookup[s] || {}, this._overwrittenProps = this._overwrittenProps || [], i = this._overwrittenProps[s] = e ? this._overwrittenProps[s] || {} : "all";
									break
								}
						} else {
							if (t !== this.target) return !1;
							r = this._propLookup, i = this._overwrittenProps = e ? this._overwrittenProps || {} : "all"
						}
						if (r) {
							if (d = e || r, u = e !== i && "all" !== i && e !== r && ("object" != typeof e || !e._tempKill), o && (O.onOverwrite || this.vars.onOverwrite)) {
								for (l in d) r[l] && (h || (h = []), h.push(l));
								if ((h || !e) && !$(this, o, t, h)) return !1
							}
							for (l in d)(n = r[l]) && (_ && (n.f ? n.t[n.p](n.s) : n.t[n.p] = n.s, a = !0), n.pg && n.t._kill(d) && (a = !0), n.pg && 0 !== n.t._overwriteProps.length || (n._prev ? n._prev._next = n._next : n === this._firstPT && (this._firstPT = n._next), n._next && (n._next._prev = n._prev), n._next = n._prev = null), delete r[l]), u && (i[l] = 1);
							!this._firstPT && this._initted && this._enabled(!1, !1)
						}
					}
					return a
				}, n.invalidate = function () {
					return this._notifyPluginsOfEnabled && O._onPluginEvent("_onDisable", this), this._firstPT = this._overwrittenProps = this._startAt = this._onUpdate = null, this._notifyPluginsOfEnabled = this._active = this._lazy = !1, this._propLookup = this._targets ? {} : [], C.prototype.invalidate.call(this), this.vars.immediateRender && (this._time = -c, this.render(Math.min(0, -this._delay))), this
				}, n._enabled = function (e, t) {
					if (a || r.wake(), e && this._gc) {
						var o, s = this._targets;
						if (s)
							for (o = s.length; --o > -1;) this._siblings[o] = K(s[o], this, !0);
						else this._siblings = K(this.target, this, !0)
					}
					return C.prototype._enabled.call(this, e, t), !(!this._notifyPluginsOfEnabled || !this._firstPT) && O._onPluginEvent(e ? "_onEnable" : "_onDisable", this)
				}, O.to = function (e, t, o) {
					return new O(e, t, o)
				}, O.from = function (e, t, o) {
					return o.runBackwards = !0, o.immediateRender = 0 != o.immediateRender, new O(e, t, o)
				}, O.fromTo = function (e, t, o, s) {
					return s.startAt = o, s.immediateRender = 0 != s.immediateRender && 0 != o.immediateRender, new O(e, t, s)
				}, O.delayedCall = function (e, t, o, s, i) {
					return new O(t, 0, {
						delay: e,
						onComplete: t,
						onCompleteParams: o,
						callbackScope: s,
						onReverseComplete: t,
						onReverseCompleteParams: o,
						immediateRender: !1,
						lazy: !1,
						useFrames: i,
						overwrite: 0
					})
				}, O.set = function (e, t) {
					return new O(e, 0, t)
				}, O.getTweensOf = function (e, t) {
					if (null == e) return [];
					var o, s, i, l;
					if (e = "string" != typeof e ? e : O.selector(e) || e, (b(e) || k(e)) && "number" != typeof e[0]) {
						for (o = e.length, s = []; --o > -1;) s = s.concat(O.getTweensOf(e[o], t));
						for (o = s.length; --o > -1;)
							for (l = s[o], i = o; --i > -1;) l === s[i] && s.splice(o, 1)
					} else
						for (o = (s = K(e).concat()).length; --o > -1;)(s[o]._gc || t && !s[o].isActive()) && s.splice(o, 1);
					return s
				}, O.killTweensOf = O.killDelayedCallsTo = function (e, t, o) {
					"object" == typeof t && (o = t, t = !1);
					for (var s = O.getTweensOf(e, t), i = s.length; --i > -1;) s[i]._kill(o, e)
				};
				var te = v("plugins.TweenPlugin", function (e, t) {
					this._overwriteProps = (e || "").split(","), this._propName = this._overwriteProps[0], this._priority = t || 0, this._super = te.prototype
				}, !0);
				if (n = te.prototype, te.version = "1.19.0", te.API = 2, n._firstPT = null, n._addTween = M, n.setRatio = I, n._kill = function (e) {
						var t, o = this._overwriteProps,
							s = this._firstPT;
						if (null != e[this._propName]) this._overwriteProps = [];
						else
							for (t = o.length; --t > -1;) null != e[o[t]] && o.splice(t, 1);
						for (; s;) null != e[s.n] && (s._next && (s._next._prev = s._prev), s._prev ? (s._prev._next = s._next, s._prev = null) : this._firstPT === s && (this._firstPT = s._next)), s = s._next;
						return !1
					}, n._mod = n._roundProps = function (e) {
						for (var t, o = this._firstPT; o;)(t = e[this._propName] || null != o.n && e[o.n.split(this._propName + "_").join("")]) && "function" == typeof t && (2 === o.f ? o.t._applyPT.m = t : o.m = t), o = o._next
					}, O._onPluginEvent = function (e, t) {
						var o, s, i, l, n, r = t._firstPT;
						if ("_onInitAllProps" === e) {
							for (; r;) {
								for (n = r._next, s = i; s && s.pr > r.pr;) s = s._next;
								(r._prev = s ? s._prev : l) ? r._prev._next = r: i = r, (r._next = s) ? s._prev = r : l = r, r = n
							}
							r = t._firstPT = i
						}
						for (; r;) r.pg && "function" == typeof r.t[e] && r.t[e]() && (o = !0), r = r._next;
						return o
					}, te.activate = function (e) {
						for (var t = e.length; --t > -1;) e[t].API === te.API && (N[(new e[t])._propName] = e[t]);
						return !0
					}, y.plugin = function (e) {
						if (!(e && e.propName && e.init && e.API)) throw "illegal plugin definition.";
						var t, o = e.propName,
							s = e.priority || 0,
							i = e.overwriteProps,
							l = {
								init: "_onInitTween",
								set: "setRatio",
								kill: "_kill",
								round: "_mod",
								mod: "_mod",
								initAll: "_onInitAllProps"
							},
							n = v("plugins." + o.charAt(0).toUpperCase() + o.substr(1) + "Plugin", function () {
								te.call(this, o, s), this._overwriteProps = i || []
							}, !0 === e.fwd_global),
							r = n.prototype = new te(o);
						for (t in r.constructor = n, n.API = e.API, l) "function" == typeof e[t] && (r[l[t]] = e[t]);
						return n.version = e.version, te.activate([n]), n
					}, i = e._fwd_gsQueue) {
					for (l = 0; l < i.length; l++) i[l]();
					for (n in m) m[n].func || e.console.log("GSAP encountered missing dependency: " + n)
				}
				a = !1
			}
		}("undefined" != typeof fwd_module && fwd_module.exports && "undefined" != typeof fwd_global ? fwd_global : this || window, "FWDAnimation")
}

function A(e, t, o) {
	var s = t || 0,
		i = 0;
	"string" == typeof e ? (i = o || e.length, this.a = function (t) {
		return 255 & e.charCodeAt(t + s)
	}) : "unknown" == typeof e && (i = o || IEBinary_getLength(e), this.a = function (t) {
		return IEBinary_getByteAt(e, t + s)
	}), this.l = function (e, t) {
		for (var o = Array(t), s = 0; s < t; s++) o[s] = this.a(e + s);
		return o
	}, this.h = function () {
		return i
	}, this.d = function (e, t) {
		return 0 != (this.a(e) & 1 << t)
	}, this.w = function (e) {
		return 0 > (e = (this.a(e + 1) << 8) + this.a(e)) && (e += 65536), e
	}, this.i = function (e) {
		var t = this.a(e);
		return 0 > (t = (((t << 8) + this.a(e + 1) << 8) + this.a(e + 2) << 8) + (e = this.a(e + 3))) && (t += 4294967296), t
	}, this.o = function (e) {
		var t = this.a(e);
		return 0 > (t = ((t << 8) + this.a(e + 1) << 8) + (e = this.a(e + 2))) && (t += 16777216), t
	}, this.c = function (e, t) {
		for (var o = [], s = e, i = 0; s < e + t; s++, i++) o[i] = String.fromCharCode(this.a(s));
		return o.join("")
	}, this.e = function (e, t, o) {
		switch (e = this.l(e, t), o.toLowerCase()) {
			case "utf-16":
			case "utf-16le":
			case "utf-16be":
				t = o;
				var s, i = 0,
					l = 1;
				o = 0, s = Math.min(s || e.length, e.length), 254 == e[0] && 255 == e[1] ? (t = !0, i = 2) : 255 == e[0] && 254 == e[1] && (t = !1, i = 2), t && (l = 0, o = 1), t = [];
				for (var n = 0; i < s; n++) {
					var r = e[i + l],
						a = (r << 8) + e[i + o];
					i = i + 2;
					if (0 == a) break;
					216 > r || 224 <= r ? t[n] = String.fromCharCode(a) : (r = (e[i + l] << 8) + e[i + o], i += 2, t[n] = String.fromCharCode(a, r))
				}(e = new String(t.join(""))).g = i;
				break;
			case "utf-8":
				for (s = 0, i = Math.min(i || e.length, e.length), 239 == e[0] && 187 == e[1] && 191 == e[2] && (s = 3), l = [], o = 0; s < i && 0 != (t = e[s++]); o++) 128 > t ? l[o] = String.fromCharCode(t) : 194 <= t && 224 > t ? (n = e[s++], l[o] = String.fromCharCode(((31 & t) << 6) + (63 & n))) : 224 <= t && 240 > t ? (n = e[s++], a = e[s++], l[o] = String.fromCharCode(((255 & t) << 12) + ((63 & n) << 6) + (63 & a))) : 240 <= t && 245 > t && (t = ((7 & t) << 18) + ((63 & (n = e[s++])) << 12) + ((63 & (a = e[s++])) << 6) + (63 & (r = e[s++])) - 65536, l[o] = String.fromCharCode(55296 + (t >> 10), 56320 + (1023 & t)));
				(e = new String(l.join(""))).g = s;
				break;
			default:
				for (i = [], l = l || e.length, s = 0; s < l && 0 != (o = e[s++]);) i[s - 1] = String.fromCharCode(o);
				(e = new String(i.join(""))).g = s
		}
		return e
	}, this.f = function (e, t) {
		t()
	}
}

function B(e, t, o) {
	function s() {
		var e = null;
		return window.XMLHttpRequest ? e = new XMLHttpRequest : window.ActiveXObject && (e = new ActiveXObject("Microsoft.XMLHTTP")), e
	}

	function i(e, t) {
		var i, l;

		function n(e) {
			var t = ~~(e[0] / i) - l;
			return 0 > t && (t = 0), (e = 1 + ~~(e[1] / i) + l) >= blockTotal && (e = blockTotal - 1), [t, e]
		}

		function r(l, n) {
			for (; u[l[0]];)
				if (l[0]++, l[0] > l[1]) return void(n && n());
			for (; u[l[1]];)
				if (l[1]--, l[0] > l[1]) return void(n && n());
			var r, d, h, _, c, f, p, b = [l[0] * i, (l[1] + 1) * i - 1];
			r = e, d = function (e) {
				parseInt(e.getResponseHeader("Content-Length"), 10) == t && (l[0] = 0, l[1] = blockTotal - 1, b[0] = 0, b[1] = t - 1), e = {
					data: e.N || e.responseText,
					offset: b[0]
				};
				for (var o = l[0]; o <= l[1]; o++) u[o] = e;
				n && n()
			}, h = o, _ = b, c = a, f = !!n, (p = s()) ? (void 0 === f && (f = !0), d && (void 0 !== p.onload ? p.onload = function () {
				"200" == p.status || "206" == p.status ? (p.fileSize = c || p.getResponseHeader("Content-Length"), d(p)) : h && h(), p = null
			} : p.onreadystatechange = function () {
				4 == p.readyState && ("200" == p.status || "206" == p.status ? (p.fileSize = c || p.getResponseHeader("Content-Length"), d(p)) : h && h(), p = null)
			}), p.open("GET", r, f), p.overrideMimeType && p.overrideMimeType("text/plain; charset=x-user-defined"), _ && p.setRequestHeader("Range", "bytes=" + _[0] + "-" + _[1]), p.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 1970 00:00:00 GMT"), p.send(null)) : h && h()
		}
		var a, d = new A("", 0, t),
			u = [];
		for (var h in i = i || 2048, l = void 0 === l ? 0 : l, blockTotal = 1 + ~~((t - 1) / i), d) d.hasOwnProperty(h) && "function" == typeof d[h] && (this[h] = d[h]);
		this.a = function (e) {
			var t;
			return r(n([e, e])), "string" == typeof (t = u[~~(e / i)]).data ? 255 & t.data.charCodeAt(e - t.offset) : "unknown" == typeof t.data ? IEBinary_getByteAt(t.data, e - t.offset) : void 0
		}, this.f = function (e, t) {
			r(n(e), t)
		}
	}
	var l, n, r;
	l = e, n = function (o) {
		o = parseInt(o.getResponseHeader("Content-Length"), 10) || -1, t(new i(e, o))
	}, (r = s()) && (n && (void 0 !== r.onload ? r.onload = function () {
		"200" == r.status && n(this), r = null
	} : r.onreadystatechange = function () {
		4 == r.readyState && ("200" == r.status && n(this), r = null)
	}), r.open("HEAD", l, !0), r.send(null))
}
if (function (e) {
		var t = function () {
			var o = this;
			t.prototype;
			this.main_do = null, this.init = function () {
				this.setupScreen(), e.onerror = this.showError, this.screen.style.zIndex = 1e25, setTimeout(this.addConsoleToDom, 100), setInterval(this.position, 100)
			}, this.position = function () {
				var e = FWDUVPUtils.getScrollOffsets();
				o.setX(e.x), o.setY(e.y)
			}, this.addConsoleToDom = function () {
				-1 != navigator.userAgent.toLowerCase().indexOf("msie 7") ? document.getElementsByTagName("body")[0].appendChild(o.screen) : document.documentElement.appendChild(o.screen)
			}, this.setupScreen = function () {
				this.main_do = new FWDUVPDisplayObject("div", "absolute"), this.main_do.setOverflow("auto"), this.main_do.setWidth(300), this.main_do.setHeight(100), this.setWidth(300), this.setHeight(100), this.main_do.setBkColor("#FFFFFF"), this.addChild(this.main_do)
			}, this.showError = function (e, t, s) {
				var i = o.main_do.getInnerHTML() + "<br>JavaScript error: " + e + " on line " + s + " for " + t;
				o.main_do.setInnerHTML(i), o.main_do.screen.scrollTop = o.main_do.screen.scrollHeight
			}, this.log = function (e) {
				var t = o.main_do.getInnerHTML() + "<br>" + e;
				o.main_do.setInnerHTML(t), o.main_do.getScreen().scrollTop = 1e4
			}, this.init()
		};
		t.setPrototype = function () {
			t.prototype = new FWDUVPDisplayObject("div", "absolute")
		}, t.prototype = null, e.FWDConsole = t
	}(window), document.write("<script type='text/vbscript'>\r\nFunction IEBinary_getByteAt(strBinary, iOffset)\r\n\tIEBinary_getByteAt = AscB(MidB(strBinary,iOffset+1,1))\r\nEnd Function\r\nFunction IEBinary_getLength(strBinary)\r\n\tIEBinary_getLength = LenB(strBinary)\r\nEnd Function\r\n<\/script>\r\n"), function (e) {
		e.FileAPIReader = function (e, t) {
			return function (o, s) {
				var i = t || new FileReader;
				i.onload = function (e) {
					s(new A(e.target.result))
				}, i.readAsBinaryString(e)
			}
		}
	}(this), function (e) {
		var t = e.p = {},
			o = {},
			s = [0, 7];
		t.t = function (e) {
			delete o[e]
		}, t.s = function () {
			o = {}
		}, t.B = function (e, t, i) {
			((i = i || {}).dataReader || B)(e, function (l) {
				l.f(s, function () {
					var s = "ftypM4A" == l.c(4, 7) ? ID4 : "ID3" == l.c(0, 3) ? ID3v2 : ID3v1;
					s.m(l, function () {
						var n, r = i.tags,
							a = s.n(l, r);
						r = o[e] || {};
						for (n in a) a.hasOwnProperty(n) && (r[n] = a[n]);
						o[e] = r, t && t()
					})
				})
			})
		}, t.v = function (e) {
			if (!o[e]) return null;
			var t, s = {};
			for (t in o[e]) o[e].hasOwnProperty(t) && (s[t] = o[e][t]);
			return s
		}, t.A = function (e, t) {
			return o[e] ? o[e][t] : null
		}, e.ID3 = e.p, t.loadTags = t.B, t.getAllTags = t.v, t.getTag = t.A, t.clearTags = t.t, t.clearAll = t.s
	}(this), function (e) {
		var t = e.q = {},
			o = "Blues;Classic Rock;Country;Dance;Disco;Funk;Grunge;Hip-Hop;Jazz;Metal;New Age;Oldies;Other;Pop;R&B;Rap;Reggae;Rock;Techno;Industrial;Alternative;Ska;Death Metal;Pranks;Soundtrack;Euro-Techno;Ambient;Trip-Hop;Vocal;Jazz+Funk;Fusion;Trance;Classical;Instrumental;Acid;House;Game;Sound Clip;Gospel;Noise;AlternRock;Bass;Soul;Punk;Space;Meditative;Instrumental Pop;Instrumental Rock;Ethnic;Gothic;Darkwave;Techno-Industrial;Electronic;Pop-Folk;Eurodance;Dream;Southern Rock;Comedy;Cult;Gangsta;Top 40;Christian Rap;Pop/Funk;Jungle;Native American;Cabaret;New Wave;Psychadelic;Rave;Showtunes;Trailer;Lo-Fi;Tribal;Acid Punk;Acid Jazz;Polka;Retro;Musical;Rock & Roll;Hard Rock;Folk;Folk-Rock;National Folk;Swing;Fast Fusion;Bebob;Latin;Revival;Celtic;Bluegrass;Avantgarde;Gothic Rock;Progressive Rock;Psychedelic Rock;Symphonic Rock;Slow Rock;Big Band;Chorus;Easy Listening;Acoustic;Humour;Speech;Chanson;Opera;Chamber Music;Sonata;Symphony;Booty Bass;Primus;Porn Groove;Satire;Slow Jam;Club;Tango;Samba;Folklore;Ballad;Power Ballad;Rhythmic Soul;Freestyle;Duet;Punk Rock;Drum Solo;Acapella;Euro-House;Dance Hall".split(";");
		t.m = function (e, t) {
			var o = e.h();
			e.f([o - 128 - 1, o], t)
		}, t.n = function (e) {
			var t = e.h() - 128;
			if ("TAG" == e.c(t, 3)) {
				var s = e.c(t + 3, 30).replace(/\0/g, ""),
					i = e.c(t + 33, 30).replace(/\0/g, ""),
					l = e.c(t + 63, 30).replace(/\0/g, ""),
					n = e.c(t + 93, 4).replace(/\0/g, "");
				if (0 == e.a(t + 97 + 28)) var r = e.c(t + 97, 28).replace(/\0/g, ""),
					a = e.a(t + 97 + 29);
				else r = "", a = 0;
				return {
					version: "1.1",
					title: s,
					artist: i,
					album: l,
					year: n,
					comment: r,
					track: a,
					genre: 255 > (e = e.a(t + 97 + 30)) ? o[e] : ""
				}
			}
			return {}
		}, e.ID3v1 = e.q
	}(this), function (e) {
		function t(e, t) {
			var o = t.a(e),
				s = t.a(e + 1),
				i = t.a(e + 2);
			return 127 & t.a(e + 3) | (127 & i) << 7 | (127 & s) << 14 | (127 & o) << 21
		}
		var o = e.D = {};
		o.b = {}, o.frames = {
			BUF: "Recommended buffer size",
			CNT: "Play counter",
			COM: "Comments",
			CRA: "Audio encryption",
			CRM: "Encrypted meta frame",
			ETC: "Event timing codes",
			EQU: "Equalization",
			GEO: "General encapsulated object",
			IPL: "Involved people list",
			LNK: "Linked information",
			MCI: "Music CD Identifier",
			MLL: "MPEG location lookup table",
			PIC: "Attached picture",
			POP: "Popularimeter",
			REV: "Reverb",
			RVA: "Relative volume adjustment",
			SLT: "Synchronized lyric/text",
			STC: "Synced tempo codes",
			TAL: "Album/Movie/Show title",
			TBP: "BPM (Beats Per Minute)",
			TCM: "Composer",
			TCO: "Content type",
			TCR: "Copyright message",
			TDA: "Date",
			TDY: "Playlist delay",
			TEN: "Encoded by",
			TFT: "File type",
			TIM: "Time",
			TKE: "Initial key",
			TLA: "Language(s)",
			TLE: "Length",
			TMT: "Media type",
			TOA: "Original artist(s)/performer(s)",
			TOF: "Original filename",
			TOL: "Original Lyricist(s)/text writer(s)",
			TOR: "Original release year",
			TOT: "Original album/Movie/Show title",
			TP1: "Lead artist(s)/Lead performer(s)/Soloist(s)/Performing group",
			TP2: "Band/Orchestra/Accompaniment",
			TP3: "Conductor/Performer refinement",
			TP4: "Interpreted, remixed, or otherwise modified by",
			TPA: "Part of a set",
			TPB: "Publisher",
			TRC: "ISRC (International Standard Recording Code)",
			TRD: "Recording dates",
			TRK: "Track number/Position in set",
			TSI: "Size",
			TSS: "Software/hardware and settings used for encoding",
			TT1: "Content group description",
			TT2: "Title/Songname/Content description",
			TT3: "Subtitle/Description refinement",
			TXT: "Lyricist/text writer",
			TXX: "User defined text information frame",
			TYE: "Year",
			UFI: "Unique file identifier",
			ULT: "Unsychronized lyric/text transcription",
			WAF: "Official audio file webpage",
			WAR: "Official artist/performer webpage",
			WAS: "Official audio source webpage",
			WCM: "Commercial information",
			WCP: "Copyright/Legal information",
			WPB: "Publishers official webpage",
			WXX: "User defined URL link frame",
			AENC: "Audio encryption",
			APIC: "Attached picture",
			COMM: "Comments",
			COMR: "Commercial frame",
			ENCR: "Encryption method registration",
			EQUA: "Equalization",
			ETCO: "Event timing codes",
			GEOB: "General encapsulated object",
			GRID: "Group identification registration",
			IPLS: "Involved people list",
			LINK: "Linked information",
			MCDI: "Music CD identifier",
			MLLT: "MPEG location lookup table",
			OWNE: "Ownership frame",
			PRIV: "Private frame",
			PCNT: "Play counter",
			POPM: "Popularimeter",
			POSS: "Position synchronisation frame",
			RBUF: "Recommended buffer size",
			RVAD: "Relative volume adjustment",
			RVRB: "Reverb",
			SYLT: "Synchronized lyric/text",
			SYTC: "Synchronized tempo codes",
			TALB: "Album/Movie/Show title",
			TBPM: "BPM (beats per minute)",
			TCOM: "Composer",
			TCON: "Content type",
			TCOP: "Copyright message",
			TDAT: "Date",
			TDLY: "Playlist delay",
			TENC: "Encoded by",
			TEXT: "Lyricist/Text writer",
			TFLT: "File type",
			TIME: "Time",
			TIT1: "Content group description",
			TIT2: "Title/songname/content description",
			TIT3: "Subtitle/Description refinement",
			TKEY: "Initial key",
			TLAN: "Language(s)",
			TLEN: "Length",
			TMED: "Media type",
			TOAL: "Original album/movie/show title",
			TOFN: "Original filename",
			TOLY: "Original lyricist(s)/text writer(s)",
			TOPE: "Original artist(s)/performer(s)",
			TORY: "Original release year",
			TOWN: "File owner/licensee",
			TPE1: "Lead performer(s)/Soloist(s)",
			TPE2: "Band/orchestra/accompaniment",
			TPE3: "Conductor/performer refinement",
			TPE4: "Interpreted, remixed, or otherwise modified by",
			TPOS: "Part of a set",
			TPUB: "Publisher",
			TRCK: "Track number/Position in set",
			TRDA: "Recording dates",
			TRSN: "Internet radio station name",
			TRSO: "Internet radio station owner",
			TSIZ: "Size",
			TSRC: "ISRC (international standard recording code)",
			TSSE: "Software/Hardware and settings used for encoding",
			TYER: "Year",
			TXXX: "User defined text information frame",
			UFID: "Unique file identifier",
			USER: "Terms of use",
			USLT: "Unsychronized lyric/text transcription",
			WCOM: "Commercial information",
			WCOP: "Copyright/Legal information",
			WOAF: "Official audio file webpage",
			WOAR: "Official artist/performer webpage",
			WOAS: "Official audio source webpage",
			WORS: "Official internet radio station homepage",
			WPAY: "Payment",
			WPUB: "Publishers official webpage",
			WXXX: "User defined URL link frame"
		};
		var s = {
				title: ["TIT2", "TT2"],
				artist: ["TPE1", "TP1"],
				album: ["TALB", "TAL"],
				year: ["TYER", "TYE"],
				comment: ["COMM", "COM"],
				track: ["TRCK", "TRK"],
				genre: ["TCON", "TCO"],
				picture: ["APIC", "PIC"],
				lyrics: ["USLT", "ULT"]
			},
			i = ["title", "artist", "album", "track"];
		o.m = function (e, o) {
			e.f([0, t(6, e)], o)
		}, o.n = function (e, l) {
			var n = 0;
			if (4 < (c = e.a(n + 3))) return {
				version: ">2.4"
			};
			var r = e.a(n + 4),
				a = e.d(n + 5, 7),
				d = e.d(n + 5, 6),
				u = e.d(n + 5, 5),
				h = t(n + 6, e);
			n += 10;
			if (d) n = n + ((p = e.i(n)) + 4);
			var _, c = {
				version: "2." + c + "." + r,
				major: c,
				revision: r,
				flags: {
					unsynchronisation: a,
					extended_header: d,
					experimental_indicator: u
				},
				size: h
			};
			if (a) _ = {};
			else {
				h = h - 10, a = e, r = l, d = {}, u = c.major;
				for (var f, p = [], b = 0; f = (r || i)[b]; b++) p = p.concat(s[f] || [f]);
				for (r = p; n < h;) {
					p = null, b = a, f = n;
					var m = null;
					switch (u) {
						case 2:
							_ = b.c(f, 3);
							var g = b.o(f + 3),
								y = 6;
							break;
						case 3:
							_ = b.c(f, 4), g = b.i(f + 4), y = 10;
							break;
						case 4:
							_ = b.c(f, 4), g = t(f + 4, b), y = 10
					}
					if ("" == _) break;
					n += y + g, 0 > r.indexOf(_) || (2 < u && (m = {
						message: {
							P: b.d(f + 8, 6),
							I: b.d(f + 8, 5),
							M: b.d(f + 8, 4)
						},
						k: {
							K: b.d(f + 8 + 1, 7),
							F: b.d(f + 8 + 1, 3),
							H: b.d(f + 8 + 1, 2),
							C: b.d(f + 8 + 1, 1),
							u: b.d(f + 8 + 1, 0)
						}
					}), f += y, m && m.k.u && (t(f, b), f += 4, g -= 4), m && m.k.C || (_ in o.b ? p = o.b[_] : "T" == _[0] && (p = o.b["T*"]), p = p ? p(f, g, b, m) : void 0, p = {
						id: _,
						size: g,
						description: _ in o.frames ? o.frames[_] : "Unknown",
						data: p
					}, _ in d ? (d[_].id && (d[_] = [d[_]]), d[_].push(p)) : d[_] = p))
				}
				_ = d
			}
			for (var v in s)
				if (s.hasOwnProperty(v)) {
					e: {
						for ("string" == typeof (g = s[v]) && (g = [g]), y = 0, n = void 0; n = g[y]; y++)
							if (n in _) {
								e = _[n].data;
								break e
							}
						e = void 0
					}
					e && (c[v] = e)
				}
			for (var S in _) _.hasOwnProperty(S) && (c[S] = _[S]);
			return c
		}, e.ID3v2 = o
	}(this), function () {
		function e(e) {
			var t;
			switch (e) {
				case 0:
					t = "iso-8859-1";
					break;
				case 1:
					t = "utf-16";
					break;
				case 2:
					t = "utf-16be";
					break;
				case 3:
					t = "utf-8"
			}
			return t
		}
		var t = "32x32 pixels 'file icon' (PNG only);Other file icon;Cover (front);Cover (back);Leaflet page;Media (e.g. lable side of CD);Lead artist/lead performer/soloist;Artist/performer;Conductor;Band/Orchestra;Composer;Lyricist/text writer;Recording Location;During recording;During performance;Movie/video screen capture;A bright coloured fish;Illustration;Band/artist logotype;Publisher/Studio logotype".split(";");
		ID3v2.b.APIC = function (o, s, i, l, n) {
			n = n || "3", l = o;
			var r = e(i.a(o));
			switch (n) {
				case "2":
					var a = i.c(o + 1, 3);
					o += 4;
					break;
				case "3":
				case "4":
					o += 1 + (a = i.e(o + 1, s - (o - l), r)).g
			}
			return n = i.a(o, 1), n = t[n], o += 1 + (r = i.e(o + 1, s - (o - l), r)).g, {
				format: a.toString(),
				type: n,
				description: r.toString(),
				data: i.l(o, l + s - o)
			}
		}, ID3v2.b.COMM = function (t, o, s) {
			var i = t,
				l = e(s.a(t)),
				n = s.c(t + 1, 3),
				r = s.e(t + 4, o - 4, l);
			return t += 4 + r.g, t = s.e(t, i + o - t, l), {
				language: n,
				O: r.toString(),
				text: t.toString()
			}
		}, ID3v2.b.COM = ID3v2.b.COMM, ID3v2.b.PIC = function (e, t, o, s) {
			return ID3v2.b.APIC(e, t, o, s, "2")
		}, ID3v2.b.PCNT = function (e, t, o) {
			return o.J(e)
		}, ID3v2.b.CNT = ID3v2.b.PCNT, ID3v2.b["T*"] = function (t, o, s) {
			var i = e(s.a(t));
			return s.e(t + 1, o - 1, i).toString()
		}, ID3v2.b.TCON = function (e, t, o) {
			return ID3v2.b["T*"].apply(this, arguments).replace(/^\(\d+\)/, "")
		}, ID3v2.b.TCO = ID3v2.b.TCON, ID3v2.b.USLT = function (t, o, s) {
			var i = t,
				l = e(s.a(t)),
				n = s.c(t + 1, 3),
				r = s.e(t + 4, o - 4, l);
			return t += 4 + r.g, t = s.e(t, i + o - t, l), {
				language: n,
				G: r.toString(),
				L: t.toString()
			}
		}, ID3v2.b.ULT = ID3v2.b.USLT
	}(), function (e) {
		var t = e.r = {};
		t.types = {
			0: "uint8",
			1: "text",
			13: "jpeg",
			14: "png",
			21: "uint8"
		}, t.j = {
			"©alb": ["album"],
			"©art": ["artist"],
			"©ART": ["artist"],
			aART: ["artist"],
			"©day": ["year"],
			"©nam": ["title"],
			"©gen": ["genre"],
			trkn: ["track"],
			"©wrt": ["analysis"],
			"©too": ["encoder"],
			cprt: ["copyright"],
			covr: ["picture"],
			"©grp": ["grouping"],
			keyw: ["keyword"],
			"©lyr": ["lyrics"],
			"©cmt": ["comment"],
			tmpo: ["tempo"],
			cpil: ["compilation"],
			disk: ["disc"]
		}, t.m = function (e, o) {
			e.f([0, 7], function () {
				! function e(o, s, i, l) {
					var n = o.i(s);
					if (0 == n) l();
					else {
						var r = o.c(s + 4, 4); - 1 < ["moov", "udta", "meta", "ilst"].indexOf(r) ? ("meta" == r && (s += 4), o.f([s + 8, s + 8 + 8], function () {
							e(o, s + 8, n - 8, l)
						})) : o.f([s + (r in t.j ? 0 : n), s + n + 8], function () {
							e(o, s + n, i, l)
						})
					}
				}(e, 0, e.h(), o)
			})
		}, t.n = function (e) {
			var o = {};
			return function e(o, s, i, l, n) {
				n = void 0 === n ? "" : n + "  ";
				for (var r = i; r < i + l;) {
					var a = s.i(r);
					if (0 == a) break;
					var d = s.c(r + 4, 4);
					if (-1 < ["moov", "udta", "meta", "ilst"].indexOf(d)) {
						"meta" == d && (r += 4), e(o, s, r + 8, a - 8, n);
						break
					}
					if (t.j[d]) {
						var u = s.o(r + 16 + 1),
							h = t.j[d];
						if (u = t.types[u], "trkn" == d) o[h[0]] = s.a(r + 16 + 11), o.count = s.a(r + 16 + 13);
						else {
							d = r + 16 + 4 + 4;
							var _, c = a - 16 - 4 - 4;
							switch (u) {
								case "text":
									_ = s.e(d, c, "UTF-8");
									break;
								case "uint8":
									_ = s.w(d);
									break;
								case "jpeg":
								case "png":
									_ = {
										k: "image/" + u,
										data: s.l(d, c)
									}
							}
							o[h[0]] = "comment" === h[0] ? {
								text: _
							} : _
						}
					}
					r += a
				}
			}(o, e, 0, e.h()), o
		}, e.ID4 = e.r
	}(this), function (e) {
		var t = navigator.platform,
			o = !1;
		if ("iPad" != t && "iPhone" != t || (o = !0), o) {
			var s = !1;
			if (-1 != navigator.userAgent.indexOf("6") && (s = !0), s) {
				var i = {},
					l = {},
					n = e.setTimeout,
					r = e.setInterval,
					a = e.clearTimeout,
					d = e.clearInterval;
				e.setTimeout = function () {
					return u(n, i, arguments)
				}, e.setInterval = function () {
					return u(r, l, arguments)
				}, e.clearTimeout = function (e) {
					var t = i[e];
					t && (delete i[e], a(t.id))
				}, e.clearInterval = function (e) {
					var t = l[e];
					t && (delete l[e], d(t.id))
				}, e.addEventListener("scroll", function () {
					var e;
					for (e in i) h(n, a, i, e);
					for (e in l) h(r, d, l, e)
				})
			}
		}

		function u(t, o, s) {
			var i, l = s[0],
				n = t === r;
			return s[0] = function () {
				l && (l.apply(e, arguments), n || (delete o[i], l = null))
			}, i = t.apply(e, s), o[i] = {
				args: s,
				created: Date.now(),
				cb: l,
				id: i
			}, i
		}

		function h(t, o, s, i, l) {
			var n = s[i];
			if (n) {
				var a = t === r;
				if (o(n.id), !a) {
					var d = n.args[1],
						u = Date.now() - n.created;
					u < 0 && (u = 0), (d -= u) < 0 && (d = 0), n.args[1] = d
				}
				n.args[0] = function () {
					n.cb && (n.cb.apply(e, arguments), a || (delete s[i], n.cb = null))
				}, n.created = Date.now(), n.id = t.apply(e, n.args)
			}
		}
	}(window), function (e) {
		var t = function (e, o, s, i, l, n, r, a, d, u, h, _) {
			var c = this;
			t.prototype;
			this.main_do = null, this.icon_do = null, this.iconS_do = null, this.bk_do = null, this.text_do = null, this.border_do = null, this.thumbHolder_do = null, this.icon_img = e, c.useHEXColorsForSkin_bl = u, c.normalButtonsColor_str = h, c.selectedButtonsColor_str = _, this.borderNColor_str = l, this.borderSColor_str = n, this.adsBackgroundPath_str = r, this.position_str = i, this.textNormalColor_str = a, this.textSelectedColor_str = d, this.text_str = s, this.iconOverPath_str = o, this.totalWidth = 215, this.totalHeight = 64, this.fontSize = 12, this.hasThumbanil_bl = !1, this.isShowed_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, c.init = function () {
				c.setOverflow("visible"), c.setupMainContainers(), c.hide(!1, !0)
			}, c.setupMainContainers = function () {
				this.main_do = new FWDUVPDisplayObject("div"), this.main_do.hasTransform3d_bl = !1, this.main_do.hasTransform2d_bl = !1, this.main_do.setBackfaceVisibility(), this.bk_do = new FWDUVPDisplayObject("div"), this.bk_do.getStyle().background = "url('" + this.adsBackgroundPath_str + "')", this.text_do = new FWDUVPDisplayObject("div"), this.text_do.hasTransform3d_bl = !1, this.text_do.hasTransform2d_bl = !1, this.text_do.setBackfaceVisibility(), this.text_do.setOverflow("visible"), this.text_do.getStyle().display = "inline", this.text_do.getStyle().fontFamily = "Arial", this.text_do.getStyle().fontSize = "22px", this.text_do.getStyle().whiteSpace = "nowrap", this.text_do.getStyle().color = this.textNormalColor_str, this.text_do.getStyle().fontSmoothing = "antialiased", this.text_do.getStyle().webkitFontSmoothing = "antialiased", this.text_do.getStyle().textRendering = "optimizeLegibility", this.thumbHolder_do = new FWDUVPDisplayObject("div"), this.thumbHolder_do.setWidth(this.totalHeight - 8), this.thumbHolder_do.setHeight(this.totalHeight - 8), this.thumbHolder_do.setX(this.totalWidth - this.thumbHolder_do.w - 4), this.thumbHolder_do.setY(4), this.border_do = new FWDUVPDisplayObject("div"), this.border_do.getStyle().border = "1px solid " + this.borderNColor_str, this.border_do.setButtonMode(!0), this.main_do.setWidth(this.totalWidth), this.main_do.setHeight(this.totalHeight), this.bk_do.setWidth(this.totalWidth), this.bk_do.setHeight(this.totalHeight), "left" == this.position_str ? (this.border_do.setX(-1), this.border_do.setWidth(this.totalWidth - 1), this.border_do.setHeight(this.totalHeight - 2)) : (this.border_do.setWidth(this.totalWidth), this.border_do.setHeight(this.totalHeight - 2)), this.setWidth(this.totalWidth), this.setHeight(this.totalHeight), this.useHEXColorsForSkin_bl ? (this.icon_do = new FWDUVPDisplayObject("div"), this.icon_do.setWidth(c.icon_img.width), this.icon_do.setHeight(c.icon_img.height), this.icon_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(this.icon_img, this.normalButtonsColor_str).canvas, this.icon_do.screen.appendChild(c.icon_do_canvas)) : (this.icon_do = new FWDUVPDisplayObject("img"), this.icon_do.setScreen(this.icon_img), this.icon_do.setWidth(this.icon_img.width), this.icon_do.setHeight(this.icon_img.height)), this.iconS_img = new Image, this.iconS_img.src = this.iconOverPath_str, this.useHEXColorsForSkin_bl ? (this.iconS_do = new FWDUVPDisplayObject("div"), this.iconS_do.setWidth(this.icon_do.w), this.iconS_do.setHeight(this.icon_do.h), this.iconS_img.onload = function () {
					c.iconS_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(c.iconS_img, c.selectedButtonsColor_str).canvas, c.iconS_do.screen.appendChild(c.iconS_do_canvas)
				}) : (this.iconS_do = new FWDUVPDisplayObject("img"), this.iconS_do.setScreen(this.iconS_img), this.iconS_do.setWidth(this.icon_do.w), this.iconS_do.setHeight(this.icon_do.h)), this.iconS_do.setAlpha(0), this.main_do.addChild(this.bk_do), this.main_do.addChild(this.text_do), this.main_do.addChild(this.thumbHolder_do), this.main_do.addChild(this.icon_do), this.main_do.addChild(this.iconS_do), this.main_do.addChild(this.border_do), FWDUVPUtils.isIEAndLessThen9 && (this.dumy_do = new FWDUVPDisplayObject("div"), this.dumy_do.setBkColor("#00FF00"), this.dumy_do.setAlpha(1e-4), this.dumy_do.setWidth(this.totalWidth), this.dumy_do.setHeight(this.totalHeight), this.dumy_do.setButtonMode(!0), this.main_do.addChild(this.dumy_do)), this.addChild(this.main_do), this.updateText(c.text_str), FWDUVPUtils.isIEAndLessThen9 ? c.isMobile_bl ? c.hasPointerEvent_bl ? (c.dumy_do.screen.addEventListener("pointerup", c.onMouseUp), c.dumy_do.screen.addEventListener("pointerover", c.onMouseOver), c.dumy_do.screen.addEventListener("pointerout", c.onMouseOut)) : c.dumy_do.screen.addEventListener("touchend", c.onMouseUp) : c.dumy_do.screen.addEventListener ? (c.dumy_do.screen.addEventListener("mouseover", c.onMouseOver), c.dumy_do.screen.addEventListener("mouseout", c.onMouseOut), c.dumy_do.screen.addEventListener("mouseup", c.onMouseUp)) : c.dumy_do.screen.attachEvent && (c.dumy_do.screen.attachEvent("onmouseover", c.onMouseOver), c.dumy_do.screen.attachEvent("onmouseout", c.onMouseOut), c.dumy_do.screen.attachEvent("onmouseup", c.onMouseUp)) : c.isMobile_bl ? c.hasPointerEvent_bl ? (c.border_do.screen.addEventListener("pointerup", c.onMouseUp), c.border_do.screen.addEventListener("pointerover", c.onMouseOver), c.border_do.screen.addEventListener("pointerout", c.onMouseOut)) : c.border_do.screen.addEventListener("touchend", c.onMouseUp) : c.border_do.screen.addEventListener ? (c.border_do.screen.addEventListener("mouseover", c.onMouseOver), c.border_do.screen.addEventListener("mouseout", c.onMouseOut), c.border_do.screen.addEventListener("mouseup", c.onMouseUp)) : c.border_do.screen.attachEvent && (c.border_do.screen.attachEvent("onmouseover", c.onMouseOver), c.border_do.screen.attachEvent("onmouseout", c.onMouseOut), c.border_do.screen.attachEvent("onmouseup", c.onMouseUp))
			}, c.onMouseOver = function (e) {
				e.pointerType && e.pointerType != e.MSPOINTER_TYPE_MOUSE && "mouse" != e.pointerType || c.setSelectedState()
			}, c.onMouseOut = function (e) {
				e.pointerType && e.pointerType != e.MSPOINTER_TYPE_MOUSE && "mouse" != e.pointerType || c.setNormalState()
			}, c.onMouseUp = function (e) {
				e.preventDefault && e.preventDefault(), 2 != e.button && c.isShowed_bl && c.dispatchEvent(t.MOUSE_UP)
			}, this.updateText = function (e) {
				var t;
				this.text_do.setInnerHTML(e), setTimeout(function () {
					t = c.text_do.getWidth() + 8 + c.iconS_do.w, c.text_do.setX(parseInt(c.totalWidth - t) / 2), c.text_do.setY(parseInt((c.totalHeight - c.text_do.getHeight()) / 2) + 2), c.icon_do.setX(c.text_do.x + t - c.iconS_do.w), c.icon_do.setY(parseInt((c.totalHeight - c.iconS_do.h) / 2) + 2), c.iconS_do.setX(c.text_do.x + t - c.iconS_do.w), c.iconS_do.setY(parseInt((c.totalHeight - c.iconS_do.h) / 2) + 2)
				}, 50)
			}, this.setNormalState = function () {
				FWDAnimation.to(c.iconS_do, .5, {
					alpha: 0,
					ease: Expo.easeOut
				}), FWDAnimation.to(c.text_do.screen, .5, {
					css: {
						color: c.textNormalColor_str
					},
					ease: Expo.easeOut
				}), FWDAnimation.to(c.border_do.screen, .5, {
					css: {
						borderColor: c.borderNColor_str
					},
					ease: Expo.easeOut
				})
			}, this.setSelectedState = function () {
				FWDAnimation.to(c.iconS_do, .5, {
					alpha: 1,
					ease: Expo.easeOut
				}), FWDAnimation.to(c.text_do.screen, .5, {
					css: {
						color: c.textSelectedColor_str
					},
					ease: Expo.easeOut
				}), FWDAnimation.to(c.border_do.screen, .5, {
					css: {
						borderColor: c.borderSColor_str
					},
					ease: Expo.easeOut
				})
			}, this.show = function (e) {
				this.isShowed_bl || (this.isShowed_bl = !0, this.setVisible(!0), FWDAnimation.killTweensOf(this.main_do), e && !c.isMobile_bl ? "left" == this.position_str ? FWDAnimation.to(this.main_do, .8, {
					x: 0,
					delay: .8,
					ease: Expo.easeInOut
				}) : FWDAnimation.to(this.main_do, .8, {
					x: 1 - this.totalWidth,
					delay: .8,
					ease: Expo.easeInOut
				}) : "left" == this.position_str ? this.main_do.setX(0) : this.main_do.setX(-this.totalWidth), this.text_do.getStyle().color = this.textNormalColor_str)
			}, this.hide = function (e, t) {
				(this.isShowed_bl || t) && (this.isShowed_bl = !1, this.hasThumbanil_bl = !1, FWDAnimation.killTweensOf(this.main_do), e && !c.isMobile_bl ? "left" == this.position_str ? FWDAnimation.to(this.main_do, .8, {
					x: -this.totalWidth,
					ease: Expo.easeInOut,
					onComplete: this.hideCompleteHandler
				}) : FWDAnimation.to(this.main_do, .8, {
					x: 0,
					ease: Expo.easeInOut,
					onComplete: this.hideCompleteHandler
				}) : ("left" == this.position_str ? this.main_do.setX(-this.totalWidth) : this.main_do.setX(0), this.hideCompleteHandler()))
			}, this.hideCompleteHandler = function () {
				c.smallImage_img && (c.smallImage_img.onload = null, c.smallImage_img.src = "", FWDAnimation.killTweensOf(c.icon_do)), 1 != c.main_do.alpha && c.main_do.setAlpha(1), c.thumbHolder_do.setVisible(!1), c.setVisible(!1)
			}, this.hideWithOpacity = function () {
				FWDUVPUtils.isIEAndLessThen9 || FWDAnimation.to(this.main_do, .8, {
					alpha: .5
				})
			}, this.showWithOpacity = function () {
				FWDUVPUtils.isIEAndLessThen9 || FWDAnimation.to(this.main_do, .8, {
					alpha: 1
				})
			}, this.updateHEXColors = function (e, t) {
				this.textNormalColor_str = e, this.textSelectedColor_str = t;
				try {
					FWDUVPUtils.changeCanvasHEXColor(c.icon_img, c.icon_do_canvas, e), FWDUVPUtils.changeCanvasHEXColor(c.iconS_img, c.iconS_do_canvas, t), this.text_do.getStyle().color = this.textNormalColor_str, this.borderNColor_str = e, this.borderSColor_str = t, this.border_do.getStyle().border = "1px solid " + this.borderNColor_str
				} catch (e) {}
			}, c.init()
		};
		t.setPrototype = function () {
			t.prototype = null, t.prototype = new FWDUVPTransformDisplayObject("div")
		}, t.CLICK = "onClick", t.MOUSE_OVER = "onMouseOver", t.SHOW_TOOLTIP = "showTooltip", t.MOUSE_OUT = "onMouseOut", t.MOUSE_UP = "onMouseDown", t.prototype = null, e.FWDUVPAdsButton = t
	}(window), function (e) {
		var t = function (e, o, s, i, l) {
			var n = this;
			t.prototype;
			this.main_do = null, this.bk_do = null, this.text_do = null, this.border_do = null, this.thumbHolder_do = null, this.borderNColor_str = o, this.borderSColor_str = s, this.adsBackgroundPath_str = i, this.position_str = e, this.timeColor_str = l, this.totalWidth = 215, this.totalHeight = 64, this.fontSize = 12, this.hasThumbanil_bl = !1, this.isShowed_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, n.init = function () {
				n.setOverflow("visible"), n.setupMainContainers(), n.hide(!1, !0)
			}, n.setupMainContainers = function () {
				this.main_do = new FWDUVPDisplayObject("div"), this.main_do.hasTransform3d_bl = !1, this.main_do.hasTransform2d_bl = !1, this.main_do.setBackfaceVisibility(), this.bk_do = new FWDUVPDisplayObject("div"), this.bk_do.getStyle().background = "url('" + this.adsBackgroundPath_str + "')", this.text_do = new FWDUVPDisplayObject("div"), this.text_do.hasTransform3d_bl = !1, this.text_do.hasTransform2d_bl = !1, this.text_do.setBackfaceVisibility(), this.text_do.getStyle().fontFamily = "Arial", this.text_do.getStyle().fontSize = "12px", this.text_do.getStyle().lineHeight = "18px", this.text_do.getStyle().textAlign = "center", this.text_do.getStyle().color = this.timeColor_str, this.text_do.getStyle().fontSmoothing = "antialiased", this.text_do.getStyle().webkitFontSmoothing = "antialiased", this.text_do.getStyle().textRendering = "optimizeLegibility", this.text_do.setInnerHTML("..."), this.thumbHolder_do = new FWDUVPDisplayObject("div"), this.thumbHolder_do.setWidth(this.totalHeight - 8), this.thumbHolder_do.setHeight(this.totalHeight - 8), this.thumbHolder_do.setX(this.totalWidth - this.thumbHolder_do.w - 4), this.thumbHolder_do.setY(4), this.border_do = new FWDUVPDisplayObject("div"), this.border_do.getStyle().border = "1px solid " + this.borderNColor_str, this.main_do.setWidth(this.totalWidth), this.main_do.setHeight(this.totalHeight), this.bk_do.setWidth(this.totalWidth), this.bk_do.setHeight(this.totalHeight), "left" == this.position_str ? (this.border_do.setX(-1), this.border_do.setWidth(this.totalWidth - 1), this.border_do.setHeight(this.totalHeight - 2)) : (this.border_do.setWidth(this.totalWidth), this.border_do.setHeight(this.totalHeight - 2)), this.setWidth(this.totalWidth), this.setHeight(this.totalHeight), this.main_do.addChild(this.bk_do), this.main_do.addChild(this.text_do), this.main_do.addChild(this.thumbHolder_do), this.main_do.addChild(this.border_do), this.addChild(this.main_do)
			}, this.loadThumbnail = function (e) {
				if (this.hasThumbanil_bl = !0, this.smallImage_img) {
					this.smallImage_img.removeAttribute("width"), this.smallImage_img.removeAttribute("height"), this.smallImage_img.onload = null, this.smallImage_img.src = "";
					try {
						FWDUVPUtils.isIE || this.thumbHolder_do.removeChild(n.thumbnail_do)
					} catch (e) {}
				}
				this.thumbnail_do || (this.thumbnail_do = new FWDUVPDisplayObject("img"), this.smallImage_img = new Image), this.thumbHolder_do.setVisible(!0), this.smallImage_img.onload = this.onSmallImageLoad, this.smallImage_img.src = e
			}, this.onSmallImageLoad = function () {
				n.smallImageOriginalW = n.smallImage_img.width, n.smallImageOriginalH = n.smallImage_img.height, n.thumbnail_do.setScreen(n.smallImage_img), n.thumbHolder_do.addChild(n.thumbnail_do);
				var e = n.thumbHolder_do.w / n.smallImageOriginalW,
					t = n.thumbHolder_do.h / n.smallImageOriginalH,
					o = 0;
				e >= t ? o = e : e <= t && (o = t), n.thumbnail_do.setWidth(Math.round(n.smallImageOriginalW * o)), n.thumbnail_do.setHeight(Math.round(n.smallImageOriginalH * o)), n.thumbnail_do.setX(Math.round((n.thumbHolder_do.w - n.thumbnail_do.w) / 2)), n.thumbnail_do.setY(Math.round((n.thumbHolder_do.h - n.thumbnail_do.h) / 2)), n.thumbnail_do.setAlpha(0), FWDAnimation.to(n.thumbnail_do, .8, {
					alpha: 1
				}), n.updateText()
			}, this.updateText = function (e) {
				e && this.text_do.setInnerHTML(e), this.hasThumbanil_bl ? (this.text_do.setX(16), this.text_do.setWidth(this.totalWidth - this.totalHeight - 26)) : (this.text_do.setX(8), this.text_do.setWidth(this.totalWidth - 16)), this.text_do.setY(parseInt((n.totalHeight - n.text_do.getHeight()) / 2))
			}, this.show = function (e) {
				this.isShowed_bl || (this.isShowed_bl = !0, this.setVisible(!0), FWDAnimation.killTweensOf(this.main_do), e && !n.isMobile_bl ? "left" == this.position_str ? FWDAnimation.to(this.main_do, .8, {
					x: 0,
					delay: .2,
					ease: Expo.easeInOut
				}) : FWDAnimation.to(this.main_do, .8, {
					x: 1 - this.totalWidth,
					delay: .2,
					ease: Expo.easeInOut
				}) : "left" == this.position_str ? this.main_do.setX(0) : this.main_do.setX(-this.totalWidth))
			}, this.hide = function (e, t) {
				(this.isShowed_bl || t) && (this.isShowed_bl = !1, this.hasThumbanil_bl = !1, FWDAnimation.killTweensOf(this.main_do), e && !n.isMobile_bl ? "left" == this.position_str ? FWDAnimation.to(this.main_do, .8, {
					x: -this.totalWidth,
					ease: Expo.easeInOut,
					onComplete: this.hideCompleteHandler
				}) : FWDAnimation.to(this.main_do, .8, {
					x: 0,
					ease: Expo.easeInOut,
					onComplete: this.hideCompleteHandler
				}) : ("left" == this.position_str ? this.main_do.setX(-this.totalWidth) : this.main_do.setX(0), this.hideCompleteHandler()))
			}, this.hideCompleteHandler = function () {
				n.smallImage_img && (n.smallImage_img.onload = null, n.smallImage_img.src = "", FWDAnimation.killTweensOf(n.thumbnail_do)), 1 != n.main_do.alpha && n.main_do.setAlpha(1), n.thumbHolder_do.setVisible(!1), n.setVisible(!1)
			}, this.hideWithOpacity = function () {
				FWDUVPUtils.isIEAndLessThen9 || FWDAnimation.to(this.main_do, .8, {
					alpha: .5
				})
			}, this.showWithOpacity = function () {
				FWDUVPUtils.isIEAndLessThen9 || FWDAnimation.to(this.main_do, .8, {
					alpha: 1
				})
			}, this.updateHEXColors = function (e, t) {
				this.timeColor_str = e, this.text_do.getStyle().color = this.timeColor_str, this.borderNColor_str = e, this.borderSColor_str = t, this.border_do.getStyle().border = "1px solid " + this.borderNColor_str
			}, n.init()
		};
		t.setPrototype = function () {
			t.prototype = null, t.prototype = new FWDUVPTransformDisplayObject("div")
		}, t.CLICK = "onClick", t.MOUSE_OVER = "onMouseOver", t.SHOW_TOOLTIP = "showTooltip", t.MOUSE_OUT = "onMouseOut", t.MOUSE_UP = "onMouseDown", t.prototype = null, e.FWDUVPAdsStart = t
	}(window), function (window) {
		var FWDUVPAnnotation = function (props_obj) {
			var self = this,
				prototype = FWDUVPAnnotation.prototype;
			this.id = props_obj.id, this.startTime = props_obj.start, this.endTime = props_obj.end, this.htmlContent_str = props_obj.content, this.left = props_obj.left, this.top = props_obj.top, this.showCloseButton_bl = props_obj.showCloseButton_bl, this.clickSource = props_obj.clickSource, this.clickSourceTarget = props_obj.clickSourceTarget, this.closeButtonNpath = props_obj.closeButtonNpath, this.closeButtonSPath = props_obj.closeButtonSPath, this.normalStateClass = props_obj.normalStateClass, this.selectedStateClass = props_obj.selectedStateClass, this.showAnnotationsPositionTool_bl = props_obj.showAnnotationsPositionTool_bl, this.parent = props_obj.parent, this.curX = this.left, this.curY = this.top, this.data = props_obj.data, this.useHEXColorsForSkin_bl = props_obj.useHEXColorsForSkin_bl, this.normalButtonsColor_str = props_obj.normalButtonsColor_str, this.selectedButtonsColor_str = props_obj.selectedButtonsColor_str, this.handPath_str = props_obj.handPath_str, this.grabPath_str = props_obj.grabPath_str, this.dummy_do = null, this.isShowed_bl = !1, this.isClosed_bl = !1, self.init = function () {
				-1 != this.data.skinPath_str.indexOf("hex_white") && (self.selectedButtonsColor_str = "#FFFFFF"), self.setOverflow("visible"), self.setAlpha(0), self.setVisible(!1), FWDUVPUtils.hasTransform2d && (this.getStyle().transformOrigin = "0% 0%"), this.screen.innerHTML = this.htmlContent_str, this.screen.className = this.normalStateClass, this.setBackfaceVisibility(), this.getStyle().fontSmoothing = "antialiased", this.getStyle().webkitFontSmoothing = "antialiased", this.getStyle().textRendering = "optimizeLegibility", this.dummy_do = new FWDUVPDisplayObject("div"), this.dummy_do.getStyle().width = "100%", this.dummy_do.getStyle().height = "100%", this.addChild(this.dummy_do), setTimeout(function () {
					self.w = self.getWidth(), self.h = self.getHeight()
				}, 100), self.showCloseButton_bl && !self.showAnnotationsPositionTool_bl && (FWDUVPSimpleSizeButton.setPrototype(), self.closeButton_do = new FWDUVPSimpleSizeButton(self.closeButtonNpath, self.closeButtonSPath, 21, 21, this.useHEXColorsForSkin_bl, this.normalButtonsColor_str, this.selectedButtonsColor_str), self.closeButton_do.setScale2(0), self.closeButton_do.addListener(FWDUVPSimpleSizeButton.MOUSE_UP, self.closeClickButtonCloseHandler), self.closeButton_do.getStyle().position = "absolute", self.addChild(self.closeButton_do)), self.showAnnotationsPositionTool_bl && (self.info_do = new FWDUVPDisplayObject("div"), self.info_do.getStyle().backgroundColor = "#FFFFFF", self.info_do.getStyle().boxShadow = "2px 2px 2px #888888;", this.info_do.getStyle().fontSmoothing = "antialiased", this.info_do.getStyle().webkitFontSmoothing = "antialiased", this.info_do.getStyle().textRendering = "optimizeLegibility", this.addChild(this.info_do), setTimeout(function () {
					self.info_do.screen.innerHTML = "<div style='padding:4px; maring:4px; color:#000000'> data-left=" + Math.round(self.curX * self.parent.scaleInverse) + "</div><div style='padding:4px; margin:4px; color:#000000;'> data-top=" + Math.round(self.curY * self.parent.scaleInverse) + "</div>", self.setX(Math.round(self.curX * self.parent.scale)), self.setY(Math.round(self.curY * self.parent.scale))
				}, 100), self.isMobile_bl ? self.hasPointerEvent_bl ? self.screen.addEventListener("pointerdown", self.selfOnDownHandler) : self.screen.addEventListener("touchdown", self.selfOnDownHandler) : window.addEventListener && self.screen.addEventListener("mousedown", self.selfOnDownHandler), self.getStyle().cursor = "url(" + self.handPath_str + "), default"), self.clickSource && !self.showAnnotationsPositionTool_bl && (self.dummy_do.setButtonMode(!0), self.dummy_do.screen.addEventListener("click", this.onClickHandler), self.dummy_do.screen.addEventListener("mouseover", this.onMouseOverHandler), self.dummy_do.screen.addEventListener("mouseout", this.onMouseOutHandler))
			}, this.selfOnDownHandler = function (e) {
				e.preventDefault && e.preventDefault(), self.getStyle().cursor = "url(" + self.grabPath_str + "), default", self.parent.addChild(self);
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				self.startX = t.screenX - self.parent.getGlobalX(), self.startY = t.screenY - self.parent.getGlobalY(), self.curX = self.x, self.curY = self.y, self.isMobile_bl ? self.hasPointerEvent_bl ? (window.addEventListener("pointermove", self.selfMoveHandler), window.addEventListener("pointerup", self.selfEndHandler)) : (window.addEventListener("touchmove", self.selfMoveHandler), window.addEventListener("touchend", self.selfEndHandler)) : window.addEventListener && (window.addEventListener("mousemove", self.selfMoveHandler), window.addEventListener("mouseup", self.selfEndHandler))
			}, this.selfMoveHandler = function (e) {
				e.preventDefault && e.preventDefault();
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				self.localX = t.screenX - self.parent.getGlobalX(), self.localY = t.screenY - self.parent.getGlobalY(), self.curX = self.x, self.curY = self.y, self.curX += self.localX - self.startX, self.curY += self.localY - self.startY, self.setX(self.curX), self.setY(self.curY), self.startX = t.screenX - self.parent.getGlobalX(), self.startY = t.screenY - self.parent.getGlobalY(), self.info_do.screen.innerHTML = "<div style='padding:4px; maring:4px; color:#000000'> data-left=" + Math.round(self.curX * self.parent.scaleInverse) + "</div><div style='padding:4px; margin:4px; color:#000000;'> data-top=" + Math.round(self.curY * self.parent.scaleInverse) + "</div>"
			}, this.selfEndHandler = function (e) {
				self.getStyle().cursor = "url(" + self.handPath_str + "), default", self.isMobile_bl ? self.hasPointerEvent_bl ? (window.removeEventListener("pointermove", self.selfMoveHandler), window.removeEventListener("pointerup", self.selfEndHandler)) : (window.removeEventListener("touchmove", self.selfMoveHandler), window.removeEventListener("touchend", self.selfEndHandler)) : window.removeEventListener && (window.removeEventListener("mousemove", self.selfMoveHandler), window.removeEventListener("mouseup", self.selfEndHandler))
			}, this.onMouseOverHandler = function (e) {
				self.setSelectedAtate()
			}, this.onMouseOutHandler = function (e) {
				self.setNormalState()
			}, this.onClickHandler = function () {
				-1 != self.clickSource.indexOf("http") ? window.open(self.clickSource, self.target) : eval(self.clickSource)
			}, this.closeClickButtonCloseHandler = function () {
				self.hide(), self.isClosed_bl = !0
			}, this.show = function () {
				this.isShowed_bl || this.isClosed_bl || (self.isShowed_bl = !0, self.setVisible(!0), FWDAnimation.killTweensOf(self), FWDAnimation.to(self, .8, {
					alpha: 1,
					ease: Quint.easeOut
				}), self.closeButton_do && FWDAnimation.to(self.closeButton_do, .8, {
					scale: 1,
					delay: .2,
					ease: Elastic.easeOut
				}))
			}, this.hide = function () {
				this.isShowed_bl && (FWDAnimation.killTweensOf(self), self.isShowed_bl = !1, self.setVisible(!1), self.setAlpha(0), self.closeButton_do && (FWDAnimation.killTweensOf(self.closeButton_do), self.closeButton_do.setScale2(0)))
			}, this.setNormalState = function () {
				self.selectedStateClass && FWDAnimation.to(self.screen, .8, {
					className: self.normalStateClass,
					ease: Quint.easeOut
				})
			}, this.setSelectedAtate = function () {
				self.selectedStateClass && FWDAnimation.to(self.screen, .8, {
					className: self.selectedStateClass,
					ease: Quint.easeOut
				})
			}, this.updateHEXColors = function (e, t) {
				self.closeButton_do && self.closeButton_do.updateHEXColors(e, t, self.buttonWidth, self.buttonHeight)
			}, self.init()
		};
		FWDUVPAnnotation.setPrototype = function () {
			FWDUVPAnnotation.prototype = null, FWDUVPUtils.hasTransform2d ? FWDUVPAnnotation.prototype = new FWDUVPTransformDisplayObject("div") : FWDUVPAnnotation.prototype = new FWDUVPDisplayObject("div")
		}, FWDUVPAnnotation.prototype = null, window.FWDUVPAnnotation = FWDUVPAnnotation
	}(window), function (e) {
		var t = function (e, o) {
			var s = this;
			t.prototype;
			s.normalButtonsColor_str = o.normalButtonsColor_str, s.selectedButtonsColor_str = o.selectedButtonsColor_str, this.ann_ar = [], this.showAnnotationsPositionTool_bl = o.showAnnotationsPositionTool_bl, s.init = function () {
				s.setOverflow("visible")
			}, s.setupAnnotations = function (e) {
				if (s.ann_ar)
					for (var t = 0; t < s.ann_ar.length; t++) try {
						this.removeChild(s.ann_ar[t])
					} catch (e) {}
				if (s.source_ar = e, null != e) {
					s.setVisible(!0), this.source_ar = e, this.ann_ar = [], this.totalAnnotations = s.source_ar.length;
					for (t = 0; t < s.totalAnnotations; t++) {
						FWDUVPAnnotation.setPrototype();
						var i = new FWDUVPAnnotation({
							id: t,
							start: this.source_ar[t].start,
							end: this.source_ar[t].end,
							left: this.source_ar[t].left,
							top: this.source_ar[t].top,
							clickSource: this.source_ar[t].clickSource,
							clickSourceTarget: this.source_ar[t].clickSourceTarget,
							content: this.source_ar[t].content,
							showCloseButton_bl: this.source_ar[t].showCloseButton_bl,
							closeButtonNpath: o.annotationAddCloseNPath_str,
							closeButtonSPath: o.annotationAddCloseSPath_str,
							normalStateClass: this.source_ar[t].normalStateClass,
							selectedStateClass: this.source_ar[t].selectedStateClass,
							showAnnotationsPositionTool_bl: s.showAnnotationsPositionTool_bl,
							parent: s,
							handPath_str: o.handPath_str,
							grabPath_str: o.grabPath_str,
							useHEXColorsForSkin_bl: o.useHEXColorsForSkin_bl,
							normalButtonsColor_str: s.normalButtonsColor_str,
							selectedButtonsColor_str: s.selectedButtonsColor_str,
							data: o
						});
						this.ann_ar[t] = i, this.addChild(i)
					}
				} else s.setVisible(!1)
			}, this.update = function (e) {
				if (0 != s.totalAnnotations)
					for (var t, o = 0; o < s.totalAnnotations; o++) t = s.ann_ar[o], e <= 0 ? t.hide() : e >= t.startTime && e <= t.endTime ? (t.show(), s.position()) : t.hide()
			}, this.position = function (t) {
				var o = e.stageWidth / e.maxWidth;
				if (s.setX(Math.round((e.stageWidth - o * e.maxWidth) / 2)), s.setY(Math.round((e.tempVidStageHeight - o * e.maxHeight) / 2)), s.scale = e.stageWidth / e.maxWidth, s.scaleY = s.scale, s.scaleX = s.scale, s.scaleInverse = e.maxWidth / e.stageWidth, !s.showAnnotationsPositionTool_bl)
					for (var i = 0; i < s.totalAnnotations; i++) {
						var l = this.ann_ar[i];
						l.setScale2(s.scale), l.finalX = Math.floor(l.left * s.scaleX), e.playlist_do && e.isPlaylistShowed_bl && "right" == e.tempPlaylistPosition_str && !e.isFullScreen_bl && l.left > e.maxWidth / 3 && (l.finalX -= e.playlistWidth + e.spaceBetweenControllerAndPlaylist), l.finalY = Math.floor(l.top * s.scaleY), l.closeButton_do && (l.closeButton_do.setWidth(Math.round(l.closeButton_do.buttonWidth * s.scaleInverse)), l.closeButton_do.setHeight(Math.round(l.closeButton_do.buttonHeight * s.scaleInverse)), l.closeButton_do.n_do.setWidth(Math.round(l.closeButton_do.buttonWidth * s.scaleInverse)), l.closeButton_do.n_do.setHeight(Math.round(l.closeButton_do.buttonHeight * s.scaleInverse)), l.closeButton_do.n_do_canvas && (l.closeButton_do.n_do_canvas.style.width = Math.round(l.closeButton_do.buttonWidth * s.scaleInverse) + "px", l.closeButton_do.n_do_canvas.style.height = Math.round(l.closeButton_do.buttonheight * s.scaleInverse) + "px", l.closeButton_do.s_do_canvas.style.width = Math.round(l.closeButton_do.buttonWidth * s.scaleInverse) + "px", l.closeButton_do.s_do_canvas.style.height = Math.round(l.closeButton_do.buttonheight * s.scaleInverse) + "px"), l.closeButton_do.s_do.setWidth(Math.round(l.closeButton_do.buttonWidth * s.scaleInverse)), l.closeButton_do.s_do.setHeight(Math.round(l.closeButton_do.buttonHeight * s.scaleInverse)), l.closeButton_do.setX(Math.floor(l.getWidth() - l.closeButton_do.w / 2)), l.closeButton_do.setY(Math.floor(-l.closeButton_do.h / 2))), l.prevFinalX != l.finalX && (t ? FWDAnimation.to(l, .8, {
							x: l.finalX,
							ease: Expo.easeInOut
						}) : l.setX(l.finalX)), l.prevFinalY != l.finalY && (t ? FWDAnimation.to(l, .8, {
							y: l.finalY,
							ease: Expo.easeInOut
						}) : l.setY(l.finalY)), l.prevFinalX = l.finalX, l.prevFinalY = l.finalY
					}
			}, this.updateHEXColors = function (e, t) {
				if (s.normalButtonsColor_str = e, s.selectedButtonsColor_str = t, s.ann_ar)
					for (var o = 0; o < s.ann_ar.length; o++) s.ann_ar[o].updateHEXColors(e, t)
			}, s.init()
		};
		t.setPrototype = function () {
			t.prototype = null, t.prototype = new FWDUVPDisplayObject("div", "absolute")
		}, t.prototype = null, e.FWDUVPAnnotations = t
	}(window), function (e) {
		var t = function (o, s) {
			var i = this;
			t.prototype;
			this.audio_el = null, this.sourcePath_str = null, this.lastPercentPlayed = 0, this.volume = s, this.curDuration = 0, this.countNormalMp3Errors = 0, this.countShoutCastErrors = 0, this.maxShoutCastCountErrors = 5, this.maxNormalCountErrors = 1, this.testShoutCastId_to, this.audioVisualizerLinesColor_str = FWDUVPUtils.hexToRgb(o.data.audioVisualizerLinesColor_str), this.audioVisualizerCircleColor_str = FWDUVPUtils.hexToRgb(o.data.audioVisualizerCircleColor_str), this.preload_bl = !1, this.allowScrubing_bl = !1, this.hasError_bl = !0, this.isPlaying_bl = !1, this.isStopped_bl = !0, this.hasPlayedOnce_bl = !1, this.isStartEventDispatched_bl = !1, this.isSafeToBeControlled_bl = !1, this.isShoutcast_bl = !1, this.isNormalMp3_bl = !1, this.init = function () {
				i.setupAudio(), FWDUVPUtils.isLocal || i.setupSpectrum()
			}, this.resizeAndPosition = function (e, t) {
				e && (i.stageWidth = e, i.stageHeight = t), i.setWidth(i.stageWidth), i.setHeight(i.stageHeight), i.resizeSpectrumCanvas()
			}, this.setupAudio = function () {
				null == i.audio_el && (i.audio_el = document.createElement("audio"), i.screen.appendChild(i.audio_el), i.audio_el.controls = !1, i.audio_el.preload = "auto", i.audio_el.volume = i.volume, i.audio_el.crossOrigin = "anonymous", i.setPlaybackRate(o.data.defaultPlaybackRate_ar[o.data.startAtPlaybackIndex])), i.audio_el.addEventListener("error", i.errorHandler), i.audio_el.addEventListener("canplay", i.safeToBeControlled), i.audio_el.addEventListener("canplaythrough", i.safeToBeControlled), i.audio_el.addEventListener("progress", i.updateProgress), i.audio_el.addEventListener("timeupdate", i.updateAudio), i.audio_el.addEventListener("pause", i.pauseHandler), i.audio_el.addEventListener("play", i.playHandler), i.audio_el.addEventListener("ended", i.endedHandler)
			}, this.destroyAudio = function () {
				i.audio_el && (i.audio_el.removeEventListener("error", i.errorHandler), i.audio_el.removeEventListener("canplay", i.safeToBeControlled), i.audio_el.removeEventListener("canplaythrough", i.safeToBeControlled), i.audio_el.removeEventListener("progress", i.updateProgress), i.audio_el.removeEventListener("timeupdate", i.updateAudio), i.audio_el.removeEventListener("pause", i.pauseHandler), i.audio_el.removeEventListener("play", i.playHandler), i.audio_el.removeEventListener("ended", i.endedHandler), i.audio_el.removeEventListener("waiting", i.startToBuffer), i.audio_el.removeEventListener("playing", i.stopToBuffer), i.audio_el.src = "", i.audio_el.load())
			}, this.startToBuffer = function (e) {
				i.dispatchEvent(FWDUVPVideoScreen.START_TO_BUFFER)
			}, this.stopToBuffer = function () {
				i.dispatchEvent(FWDUVPVideoScreen.STOP_TO_BUFFER)
			}, this.togglePlayPause = function () {
				null != i && i.isSafeToBeControlled_bl && (i.isPlaying_bl ? i.pause() : i.play())
			}, this.errorHandler = function (o) {
				if (null != i.sourcePath_str && null != i.sourcePath_str) {
					if (i.isNormalMp3_bl && i.countNormalMp3Errors <= i.maxNormalCountErrors) return i.stop(), i.testShoutCastId_to = setTimeout(i.play, 200), void i.countNormalMp3Errors++;
					if (i.isShoutcast_bl && i.countShoutCastErrors <= i.maxShoutCastCountErrors && 0 == i.audio_el.networkState) return i.testShoutCastId_to = setTimeout(i.play, 200), void i.countShoutCastErrors++;
					var s;
					i.hasError_bl = !0, i.stop(), s = 0 == i.audio_el.networkState ? "error 'self.audio_el.networkState = 1'" : 1 == i.audio_el.networkState ? "error 'self.audio_el.networkState = 1'" : 2 == i.audio_el.networkState ? "'self.audio_el.networkState = 2'" : 3 == i.audio_el.networkState ? "source not found <font color='#FF0000'>" + i.sourcePath_str + "</font>" : o, e.console && e.console.log(i.audio_el.networkState), i.dispatchEvent(t.ERROR, {
						text: s
					})
				}
			}, this.setSource = function (e) {
				i.sourcePath_str = e, clearTimeout(i.testShoutCastId_to), -1 != i.sourcePath_str.indexOf(";") ? (i.isShoutcast_bl = !0, i.countShoutCastErrors = 0) : i.isShoutcast_bl = !1, -1 == i.sourcePath_str.indexOf(";") ? (i.isNormalMp3_bl = !0, i.countNormalMp3Errors = 0) : i.isNormalMp3_bl = !1, i.lastPercentPlayed = 0, i.audio_el && i.stop(!0)
			}, this.play = function (e) {
				if (i.isStopped_bl) i.isPlaying_bl = !1, i.hasError_bl = !1, i.allowScrubing_bl = !1, i.isStopped_bl = !1, i.setupAudio(), i.audio_el.src = i.sourcePath_str, i.play(), i.setVisible(!0);
				else if (!i.audio_el.ended || e) try {
					i.isPlaying_bl = !0, i.hasPlayedOnce_bl = !0, i.audio_el.play(), FWDUVPUtils.isIE && i.dispatchEvent(t.PLAY)
				} catch (e) {}
			}, this.resume = function () {
				i.isStopped_bl || i.play()
			}, this.pause = function () {
				null != i && null != i.audio_el && (i.audio_el.ended || (i.audio_el.pause(), i.isPlaying_bl = !1, FWDUVPUtils.isIE && i.dispatchEvent(t.PAUSE)))
			}, this.pauseHandler = function () {
				i.allowScrubing_bl || (i.stopSpectrum(), i.dispatchEvent(t.PAUSE))
			}, this.playHandler = function () {
				i.allowScrubing_bl || (i.isStartEventDispatched_bl || (i.dispatchEvent(t.START), i.isStartEventDispatched_bl = !0), i.startSpectrum(), i.dispatchEvent(t.PLAY))
			}, this.endedHandler = function () {
				i.dispatchEvent(t.PLAY_COMPLETE)
			}, this.stop = function (e) {
				(null != i && null != i.audio_el && !i.isStopped_bl || e) && (i.isPlaying_bl = !1, i.isStopped_bl = !0, i.hasPlayedOnce_bl = !0, i.isSafeToBeControlled_bl = !1, i.isStartEventDispatched_bl = !1, i.setVisible(!1), clearTimeout(i.testShoutCastId_to), i.stopSpectrum(), i.audio_el.pause(), i.destroyAudio(), i.dispatchEvent(t.STOP), i.dispatchEvent(t.LOAD_PROGRESS, {
					percent: 0
				}))
			}, this.safeToBeControlled = function () {
				i.isSafeToBeControlled_bl || (i.hasHours_bl = Math.floor(i.audio_el.duration / 3600) > 0, i.isPlaying_bl = !0, i.isSafeToBeControlled_bl = !0, i.dispatchEvent(t.SAFE_TO_SCRUBB), i.dispatchEvent(t.SAFE_TO_UPDATE_VOLUME))
			}, this.updateProgress = function () {
				var e = 0;
				i.audio_el.buffered.length > 0 && (e = i.audio_el.buffered.end(i.audio_el.buffered.length - 1).toFixed(1) / i.audio_el.duration.toFixed(1), !isNaN(e) && e || (e = 0)), 1 == e && i.audio_el.removeEventListener("progress", i.updateProgress), i.dispatchEvent(t.LOAD_PROGRESS, {
					percent: e
				})
			}, this.updateAudio = function () {
				var e;
				i.allowScrubing_bl || (e = i.audio_el.currentTime / i.audio_el.duration, i.dispatchEvent(t.UPDATE, {
					percent: e
				}));
				var o = i.formatTime(i.audio_el.duration),
					s = i.formatTime(i.audio_el.currentTime);
				isNaN(i.video_el.duration) ? i.dispatchEvent(FWDUVPVideoScreen.UPDATE_TIME, {
					curTime: "00:00",
					totalTime: "00:00",
					seconds: 0
				}) : i.dispatchEvent(FWDUVPVideoScreen.UPDATE_TIME, {
					curTime: s,
					totalTime: o,
					seconds: parseInt(i.video_el.currentTime)
				}), i.lastPercentPlayed = e, i.curDuration = s
			}, this.startToScrub = function () {
				i.allowScrubing_bl = !0
			}, this.stopToScrub = function () {
				i.allowScrubing_bl = !1
			}, this.scrubbAtTime = function (e) {
				i.audio_el.currentTime = e;
				var t = FWDUVPVideoScreen.formatTime(i.audio_el.duration),
					o = FWDUVPVideoScreen.formatTime(i.audio_el.currentTime);
				i.dispatchEvent(FWDUVPVideoScreen.UPDATE_TIME, {
					curTime: o,
					totalTime: t
				})
			}, this.scrub = function (e, o) {
				if (null != i.audio_el && i.audio_el.duration) {
					o && i.startToScrub();
					try {
						i.audio_el.currentTime = i.audio_el.duration * e;
						var s = i.formatTime(i.audio_el.duration),
							l = i.formatTime(i.audio_el.currentTime);
						i.dispatchEvent(t.UPDATE_TIME, {
							curTime: l,
							totalTime: s
						})
					} catch (o) {}
				}
			}, this.replay = function () {
				i.scrub(0), i.play()
			}, this.setVolume = function (e) {
				e && (i.volume = e), i.audio_el && (i.audio_el.volume = i.volume)
			}, this.formatTime = function (e) {
				var t = Math.floor(e / 3600),
					o = e % 3600,
					s = Math.floor(o / 60),
					l = o % 60,
					n = Math.ceil(l);
				return s = s >= 10 ? s : "0" + s, n = n >= 10 ? n : "0" + n, isNaN(n) ? "00:00" : i.hasHours_bl ? t + ":" + s + ":" + n : s + ":" + n
			}, this.setPlaybackRate = function (e) {
				i.audio_el && (.25 == e && (e = "0.5"), i.audio_el.defaultPlaybackRate = e, i.audio_el.playbackRate = e)
			}, this.setupSpectrum = function () {
				if (!(this.canvas_do || t.countAudioContext > 4)) {
					t.countAudioContext++;
					var o = e.AudioContext || e.webkitAudioContext;
					o && (this.canvas_do = new FWDUVPDisplayObject("canvas"), this.addChild(this.canvas_do), this.canvas = this.canvas_do.screen, this.ctx = this.canvas.getContext("2d"), this.resizeSpectrumCanvas(), this.context = new o, this.analyser = this.context.createAnalyser(), this.source = this.context.createMediaElementSource(this.audio_el), this.source.connect(this.analyser), this.analyser.connect(this.context.destination), this.fbc_array = new Uint8Array(this.analyser.frequencyBinCount), this.renderSpectrum())
				}
			}, this.resizeSpectrumCanvas = function () {
				i.canvas_do && (i.canvas_do.setWidth(i.stageWidth), i.canvas_do.setHeight(i.stageHeight), i.canvas.width = i.stageWidth, i.canvas.height = i.stageHeight)
			}, i.bars = 200, FWDUVPUtils.isMobile && (i.bars = 100), i.react_x = 0, i.react_y = 0, i.radius = 0, i.deltarad = 0, i.shockwave = 0, i.rot = 0, i.intensity = 0, i.isSeeking = 0, i.center_x, i.center_y, this.renderSpectrum = function () {
				if (i.canvas_do) {
					i.resizeSpectrumCanvas();
					var e = i.ctx.createLinearGradient(0, 0, 0, i.canvas.height);
					e.addColorStop(0, "rgba(0, 0, 0, 1)"), e.addColorStop(1, "rgba(0, 0, 0, 1)"), i.ctx.fillStyle = e, i.ctx.fillRect(0, 0, i.canvas.width, i.canvas.height), i.ctx.fillStyle = "rgba(255, 255, 255, " + (125e-7 * i.intensity - .4) + ")", i.ctx.fillRect(0, 0, i.canvas.width, i.canvas.height), i.rot = i.rot + 1e-7 * i.intensity, i.react_x = 0, i.react_y = 0, i.intensity = 0, i.analyser.getByteFrequencyData(i.fbc_array);
					for (var t = 0; t < i.bars; t++) {
						rads = 2 * Math.PI / i.bars, bar_x = i.center_x, bar_y = i.center_y;
						var o = i.stageHeight / 3;
						isNaN(o) && (o = 10), bar_height = Math.round(i.fbc_array[t] / 256 * o), bar_width = Math.round(.02 * bar_height), bar_x_term = i.center_x + Math.cos(rads * t + i.rot) * (i.radius + bar_height), bar_y_term = i.center_y + Math.sin(rads * t + i.rot) * (i.radius + bar_height), i.ctx.save();
						var s = i.audioVisualizerLinesColor_str;
						i.ctx.strokeStyle = s, i.ctx.lineWidth = bar_width, i.ctx.beginPath(), i.ctx.moveTo(bar_x, bar_y), i.ctx.lineTo(bar_x_term, bar_y_term), i.ctx.stroke(), i.react_x += Math.cos(rads * t + i.rot) * (i.radius + bar_height), i.react_y += Math.sin(rads * t + i.rot) * (i.radius + bar_height), i.intensity += bar_height
					}
					i.center_x = i.canvas.width / 2 - .007 * i.react_x, i.center_y = i.canvas.height / 2 - .007 * i.react_y, radius_old = i.radius, i.radius = 25 + .002 * i.intensity, i.deltarad = i.radius - radius_old, i.ctx.fillStyle = i.audioVisualizerCircleColor_str, i.ctx.beginPath(), i.ctx.arc(i.center_x, i.center_y, i.radius + 2, 0, 2 * Math.PI, !1), i.ctx.fill(), i.shockwave += 60, i.ctx.lineWidth = 15, i.ctx.strokeStyle = i.audioVisualizerCircleColor_str, i.ctx.beginPath(), i.ctx.arc(i.center_x, i.center_y, i.shockwave + i.radius, 0, 2 * Math.PI, !1), i.ctx.stroke(), i.deltarad > 15 && (i.shockwave = 0, i.ctx.fillStyle = "rgba(255, 255, 255, 0.7)", i.ctx.fillRect(0, 0, i.canvas.width, i.canvas.height), i.rot = i.rot + .4), i.startSpectrum()
				}
			}, this.startSpectrum = function () {
				i.canvas_do && (i.stopSpectrum(), i.spectrumAnimationFrameId = e.requestAnimationFrame(i.renderSpectrum))
			}, this.stopSpectrum = function () {
				i.canvas_do && cancelAnimationFrame(i.spectrumAnimationFrameId)
			}, this.init()
		};
		t.setPrototype = function () {
			t.prototype = new FWDUVPDisplayObject("div")
		}, t.ERROR = "error", t.UPDATE = "update", t.UPDATE = "update", t.UPDATE_TIME = "updateTime", t.SAFE_TO_SCRUBB = "safeToControll", t.SAFE_TO_UPDATE_VOLUME = "safeToUpdateVolume", t.LOAD_PROGRESS = "loadProgress", t.START = "start", t.PLAY = "play", t.PAUSE = "pause", t.STOP = "stop", t.PLAY_COMPLETE = "playComplete", t.countAudioContext = 0, e.FWDUVPAudioScreen = t
	}(window), function () {
		var e = function (t, o) {
			var s = this;
			e.prototype;
			this.image_img, this.catThumbBk_img = t.catThumbBk_img, this.catNextN_img = t.catNextN_img, this.catPrevN_img = t.catPrevN_img, this.catCloseN_img = t.catCloseN_img, this.mainHolder_do = null, this.closeButton_do = null, this.nextButton_do = null, this.prevButton_do = null, this.thumbs_ar = [], this.categories_ar = t.cats_ar, this.catBkPath_str = t.catBkPath_str, this.id = 0, this.mouseX = 0, this.mouseY = 0, this.dif = 0, this.tempId = s.id, this.stageWidth = 0, this.stageHeight = 0, this.thumbW = 0, this.thumbH = 0, this.buttonsMargins = t.buttonsMargins, this.thumbnailMaxWidth = t.thumbnailMaxWidth, this.thumbnailMaxHeight = t.thumbnailMaxHeight, this.spacerH = t.horizontalSpaceBetweenThumbnails, this.spacerV = t.verticalSpaceBetweenThumbnails, this.dl, this.howManyThumbsToDisplayH = 0, this.howManyThumbsToDisplayV = 0, this.categoriesOffsetTotalWidth = 2 * s.catNextN_img.width + 30, this.categoriesOffsetTotalHeight = s.catNextN_img.height + 30, this.totalThumbnails = s.categories_ar.length, this.delayRate = .06, this.countLoadedThumbs = 0, this.inputBackgroundColor_str = t.inputBackgroundColor_str, this.inputColor_str = t.inputColor_str, this.hideCompleteId_to, this.showCompleteId_to, this.loadThumbnailsId_to, this.preventMouseWheelNavigId_to, this.preventMouseWheelNavig_bl = !1, this.areThumbnailsCreated_bl = !1, this.areThumbnailsLoaded_bl = !1, this.isShowed_bl = !1, this.isOnDOM_bl = !1, this.showSearchInput_bl = t.showPlaylistsSearchInput_bl, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, s.init = function () {
				-1 != t.skinPath_str.indexOf("hex_white") ? s.selectedButtonsColor_str = "#FFFFFF" : s.selectedButtonsColor_str = t.selectedButtonsColor_str, s.getStyle().zIndex = 16777271, s.getStyle().msTouchAction = "none", s.getStyle().webkitTapHighlightColor = "rgba(0, 0, 0, 0)", s.getStyle().width = "100%", s.mainHolder_do = new FWDUVPDisplayObject("div"), s.mainHolder_do.getStyle().background = "url('" + s.catBkPath_str + "')", s.mainHolder_do.setY(-3e3), s.addChild(s.mainHolder_do), s.setupButtons(), s.setupDisable(), s.isMobile_bl && (s.setupMobileMove(), FWDUVPUtils.isChrome && (FWDUVPUtils.isIEAndLessThen9 ? document.getElementsByTagName("body")[0].appendChild(s.screen) : document.documentElement.appendChild(s.screen))), (!s.isMobile_bl || s.isMobile_bl && s.hasPointerEvent_bl) && s.setSelectable(!1), window.addEventListener ? (s.screen.addEventListener("mousewheel", s.mouseWheelDumyHandler), s.screen.addEventListener("DOMMouseScroll", s.mouseWheelDumyHandler)) : document.attachEvent && s.screen.attachEvent("onmousewheel", s.mouseWheelDumyHandler), s.showSearchInput_bl && s.setupInput()
			}, this.mouseWheelDumyHandler = function (e) {
				var t;
				if (FWDAnimation.isTweening(s.mainHolder_do)) return e.preventDefault && e.preventDefault(), !1;
				for (var o = 0; o < s.totalThumbnails; o++)
					if (t = s.thumbs_ar[o], FWDAnimation.isTweening(t)) return e.preventDefault && e.preventDefault(), !1;
				var i = e.detail || e.wheelDelta;
				if (e.wheelDelta && (i *= -1), FWDUVPUtils.isOpera && (i *= -1), i > 0) s.nextButtonOnMouseUpHandler();
				else if (i < 0) {
					if (s.leftId <= 0) return;
					s.prevButtonOnMouseUpHandler()
				}
				if (!e.preventDefault) return !1;
				e.preventDefault()
			}, s.resizeAndPosition = function (e) {
				if (s.isShowed_bl || e) {
					var t = FWDUVPUtils.getScrollOffsets(),
						i = FWDUVPUtils.getViewportSize();
					s.stageWidth = i.w, s.stageHeight = i.h, FWDAnimation.killTweensOf(s.mainHolder_do), s.mainHolder_do.setX(0), s.mainHolder_do.setWidth(s.stageWidth), s.mainHolder_do.setHeight(s.stageHeight), s.setX(t.x), s.setY(t.y), s.setHeight(s.stageHeight), (s.isMobile_bl || o.isEmbedded_bl) && s.setWidth(s.stageWidth), s.positionButtons(), s.tempId = s.id, s.resizeAndPositionThumbnails(), s.disableEnableNextAndPrevButtons(), s.input_do && (s.input_do.setX(s.stageWidth - s.input_do.getWidth() - s.buttonsMargins), s.input_do.setY(s.stageHeight - s.input_do.getHeight() - s.buttonsMargins), s.inputArrow_do.setX(s.input_do.x + s.input_do.getWidth() - 14), s.inputArrow_do.setY(s.input_do.y + s.input_do.getHeight() / 2 - s.inputArrow_do.getHeight() / 2))
				}
			}, s.onScrollHandler = function () {
				var e = FWDUVPUtils.getScrollOffsets();
				s.setX(e.x), s.setY(e.y)
			}, this.setupInput = function () {
				s.input_do = new FWDUVPDisplayObject("input"), s.input_do.screen.maxLength = 20, s.input_do.getStyle().textAlign = "left", s.input_do.getStyle().outline = "none", s.input_do.getStyle().boxShadow = "none", s.input_do.getStyle().fontSmoothing = "antialiased", s.input_do.getStyle().webkitFontSmoothing = "antialiased", s.input_do.getStyle().textRendering = "optimizeLegibility", s.input_do.getStyle().fontFamily = "Arial", s.input_do.getStyle().fontSize = "12px", s.input_do.getStyle().padding = "6px", FWDUVPUtils.isIEAndLessThen9 || (s.input_do.getStyle().paddingRight = "-6px"), s.input_do.getStyle().paddingTop = "2px", s.input_do.getStyle().paddingBottom = "3px", s.input_do.getStyle().backgroundColor = s.inputBackgroundColor_str, s.input_do.getStyle().color = s.inputColor_str, s.input_do.getStyle().borderRadius = "6px", s.input_do.screen.value = "search", s.input_do.setHeight(20), s.input_do.setX(18), s.noSearchFound_do = new FWDUVPDisplayObject("div"), s.noSearchFound_do.setX(0), s.noSearchFound_do.getStyle().textAlign = "center", s.noSearchFound_do.getStyle().width = "100%", s.noSearchFound_do.getStyle().fontSmoothing = "antialiased", s.noSearchFound_do.getStyle().webkitFontSmoothing = "antialiased", s.noSearchFound_do.getStyle().textRendering = "optimizeLegibility", s.noSearchFound_do.getStyle().fontFamily = "Arial", s.noSearchFound_do.getStyle().fontSize = "12px", s.noSearchFound_do.getStyle().color = s.inputColor_str, s.noSearchFound_do.setInnerHTML("NOTHING FOUND!"), s.noSearchFound_do.setVisible(!1), s.addChild(s.noSearchFound_do);
				var e = new Image;
				e.src = t.inputArrowPath_str, s.inputArrow_do = new FWDUVPDisplayObject("img"), s.inputArrow_do.setScreen(e), s.inputArrow_do.setWidth(9), s.inputArrow_do.setHeight(10), s.hasPointerEvent_bl ? s.input_do.screen.addEventListener("pointerdown", s.inputFocusInHandler) : s.input_do.screen.addEventListener && (s.input_do.screen.addEventListener("mousedown", s.inputFocusInHandler), s.input_do.screen.addEventListener("touchstart", s.inputFocusInHandler)), s.input_do.screen.addEventListener("keyup", s.keyUpHandler), s.mainHolder_do.addChild(s.input_do), s.mainHolder_do.addChild(s.inputArrow_do)
			}, this.inputFocusInHandler = function () {
				s.hasInputFocus_bl || (s.hasInputFocus_bl = !0, "search" == s.input_do.screen.value && (s.input_do.screen.value = ""), s.input_do.screen.focus(), setTimeout(function () {
					s.hasPointerEvent_bl ? window.addEventListener("pointerdown", s.inputFocusOutHandler) : window.addEventListener && (window.addEventListener("mousedown", s.inputFocusOutHandler), window.addEventListener("touchstart", s.inputFocusOutHandler))
				}, 50))
			}, this.inputFocusOutHandler = function (e) {
				if (s.hasInputFocus_bl) {
					var t = FWDUVPUtils.getViewportMouseCoordinates(e);
					return FWDUVPUtils.hitTest(s.input_do.screen, t.screenX, t.screenY) ? void 0 : (s.hasInputFocus_bl = !1, void("" == s.input_do.screen.value && (s.input_do.screen.value = "search", s.hasPointerEvent_bl ? window.removeEventListener("pointerdown", s.inputFocusOutHandler) : window.removeEventListener && (window.removeEventListener("mousedown", s.inputFocusOutHandler), window.removeEventListener("touchstart", s.inputFocusOutHandler)))))
				}
			}, this.keyUpHandler = function (e) {
				e.stopPropagation && e.stopPropagation(), s.prevInputValue_str != s.input_do.screen.value && (clearTimeout(s.keyPressedId_to), s.keyPressed_bl = !0, clearTimeout(s.rsId_to), s.rsId_to = setTimeout(function () {
					s.resizeAndPositionThumbnails(!0), s.disableEnableNextAndPrevButtons()
				}, 400)), s.prevInputValue_str = s.input_do.screen.value, s.keyPressedId_to = setTimeout(function () {
					s.keyPressed_bl = !1
				}, 450)
			}, this.showNothingFound = function () {
				s.isShowNothingFound_bl || (s.isShowNothingFound_bl = !0, s.noSearchFound_do.setVisible(!0), s.noSearchFound_do.setY(parseInt((s.stageHeight - s.noSearchFound_do.getHeight()) / 2)), s.noSearchFound_do.setAlpha(0), FWDAnimation.to(s.noSearchFound_do, .1, {
					alpha: 1,
					yoyo: !0,
					repeat: 4
				}))
			}, this.hideNothingFound = function () {
				s.isShowNothingFound_bl && (s.isShowNothingFound_bl = !1, FWDAnimation.killTweensOf(s.noSearchFound_do), s.noSearchFound_do.setVisible(!1))
			}, this.setupDisable = function () {
				s.disable_do = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIE && (s.disable_do.setBkColor("#FFFFFF"), s.disable_do.setAlpha(.01)), s.addChild(s.disable_do)
			}, this.showDisable = function () {
				s.disable_do.w != s.stageWidth && (s.disable_do.setWidth(s.stageWidth), s.disable_do.setHeight(s.stageHeight))
			}, this.hideDisable = function () {
				0 != s.disable_do.w && (s.disable_do.setWidth(0), s.disable_do.setHeight(0))
			}, this.setupButtons = function () {
				FWDUVPSimpleButton.setPrototype(), s.closeButton_do = new FWDUVPSimpleButton(s.catCloseN_img, t.catCloseSPath_str, void 0, !0, t.useHEXColorsForSkin_bl, t.normalButtonsColor_str, s.selectedButtonsColor_str), s.closeButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.closeButtonOnMouseUpHandler), FWDUVPSimpleButton.setPrototype(), s.nextButton_do = new FWDUVPSimpleButton(s.catNextN_img, t.catNextSPath_str, void 0, !0, t.useHEXColorsForSkin_bl, t.normalButtonsColor_str, s.selectedButtonsColor_str), s.nextButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.nextButtonOnMouseUpHandler), FWDUVPSimpleButton.setPrototype(), s.prevButton_do = new FWDUVPSimpleButton(s.catPrevN_img, t.catPrevSPath_str, void 0, !0, t.useHEXColorsForSkin_bl, t.normalButtonsColor_str, s.selectedButtonsColor_str), s.prevButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.prevButtonOnMouseUpHandler)
			}, this.closeButtonOnMouseUpHandler = function () {
				s.hide()
			}, this.nextButtonOnMouseUpHandler = function () {
				var e = s.howManyThumbsToDisplayH * s.howManyThumbsToDisplayV;
				s.tempId += e, s.tempId > s.totalThumbnails - 1 && (s.tempId = s.totalThumbnails - 1);
				var t = Math.floor(s.tempId / e);
				s.tempId = t * e, s.resizeAndPositionThumbnails(!0, "next"), s.disableEnableNextAndPrevButtons(!1, !0)
			}, this.prevButtonOnMouseUpHandler = function () {
				var e = s.howManyThumbsToDisplayH * s.howManyThumbsToDisplayV;
				s.tempId -= e, s.tempId < 0 && (s.tempId = 0);
				var t = Math.floor(s.tempId / e);
				s.tempId = t * e, s.resizeAndPositionThumbnails(!0, "prev"), s.disableEnableNextAndPrevButtons(!0, !1)
			}, this.positionButtons = function () {
				s.closeButton_do.setX(s.stageWidth - s.closeButton_do.w - s.buttonsMargins), s.closeButton_do.setY(s.buttonsMargins), s.nextButton_do.setX(s.stageWidth - s.nextButton_do.w - s.buttonsMargins), s.nextButton_do.setY(parseInt((s.stageHeight - s.nextButton_do.h) / 2)), s.prevButton_do.setX(s.buttonsMargins), s.prevButton_do.setY(parseInt((s.stageHeight - s.prevButton_do.h) / 2))
			}, this.disableEnableNextAndPrevButtons = function (e, t) {
				var o = s.howManyThumbsToDisplayH * s.howManyThumbsToDisplayV,
					i = Math.floor(s.tempId / o),
					l = Math.ceil(s.totalThumbnails / o) - 1;
				s.howManyThumbsToDisplayH, s.howManyThumbsToDisplayH;
				o >= s.totalThumbnails ? (s.nextButton_do.disable(), s.prevButton_do.disable(), s.nextButton_do.setDisabledState(), s.prevButton_do.setDisabledState()) : 0 == i ? (s.nextButton_do.enable(), s.prevButton_do.disable(), s.nextButton_do.setEnabledState(), s.prevButton_do.setDisabledState()) : i == l ? (s.nextButton_do.disable(), s.prevButton_do.enable(), s.nextButton_do.setDisabledState(), s.prevButton_do.setEnabledState()) : (s.nextButton_do.enable(), s.prevButton_do.enable(), s.nextButton_do.setEnabledState(), s.prevButton_do.setEnabledState()), e || s.prevButton_do.setNormalState(), t || s.nextButton_do.setNormalState()
			}, this.setupMobileMove = function () {
				s.hasPointerEvent_bl ? s.screen.addEventListener("pointerdown", s.mobileDownHandler) : s.screen.addEventListener("touchstart", s.mobileDownHandler)
			}, this.mobileDownHandler = function (e) {
				if (!e.touches || 1 == e.touches.length) {
					var t = FWDUVPUtils.getViewportMouseCoordinates(e);
					s.mouseX = t.screenX, s.mouseY = t.screenY, s.hasPointerEvent_bl ? (window.addEventListener("pointerup", s.mobileUpHandler), window.addEventListener("pointermove", s.mobileMoveHandler)) : (window.addEventListener("touchend", s.mobileUpHandler), window.addEventListener("touchmove", s.mobileMoveHandler))
				}
			}, this.mobileMoveHandler = function (e) {
				if (e.preventDefault && e.preventDefault(), !e.touches || 1 == e.touches.length) {
					s.showDisable();
					var t = FWDUVPUtils.getViewportMouseCoordinates(e);
					s.dif = s.mouseX - t.screenX, s.mouseX = t.screenX, s.mouseY = t.screenY
				}
			}, this.mobileUpHandler = function (e) {
				s.hideDisable(), s.dif > 10 ? s.nextButtonOnMouseUpHandler() : s.dif < -10 && s.prevButtonOnMouseUpHandler(), s.dif = 0, s.hasPointerEvent_bl ? (window.removeEventListener("pointerup", s.mobileUpHandler), window.removeEventListener("pointermove", s.mobileMoveHandler)) : (window.removeEventListener("touchend", s.mobileUpHandler), window.removeEventListener("touchmove", s.mobileMoveHandler))
			}, this.setupThumbnails = function () {
				if (!s.areThumbnailsCreated_bl) {
					var e;
					s.areThumbnailsCreated_bl = !0;
					for (var o = 0; o < s.totalThumbnails; o++) FWDUVPCategoriesThumb.setPrototype(), (e = new FWDUVPCategoriesThumb(s, o, t.catThumbBkPath_str, t.catThumbBkTextPath_str, t.thumbnailSelectedType_str, s.categories_ar[o].htmlContent, s.categories_ar[o].htmlText_str)).addListener(FWDUVPCategoriesThumb.MOUSE_UP, s.thumbnailOnMouseUpHandler), s.thumbs_ar[o] = e, s.mainHolder_do.addChild(e);
					s.mainHolder_do.addChild(s.closeButton_do), s.mainHolder_do.addChild(s.nextButton_do), s.mainHolder_do.addChild(s.prevButton_do)
				}
			}, this.thumbnailOnMouseUpHandler = function (e) {
				s.id = e.id, s.disableOrEnableThumbnails(), s.hide()
			}, this.resizeAndPositionThumbnails = function (e, t) {
				if (s.areThumbnailsCreated_bl) {
					var o, i, l, n, r, a, d, u, h, _ = [].concat(s.thumbs_ar);
					if (s.isSearched_bl = !1, s.input_do && (inputValue = s.input_do.screen.value.toLowerCase(), "search" != inputValue))
						for (var c = 0; c < _.length; c++) - 1 == (o = _[c]).htmlText_str.toLowerCase().indexOf(inputValue.toLowerCase()) && (FWDAnimation.killTweensOf(o), o.hide(), _.splice(c, 1), c--);
					s.totalThumbnails = _.length, s.totalThumbnails != s.thumbs_ar.length && (s.isSearched_bl = !0), 0 == s.totalThumbnails ? s.showNothingFound() : s.hideNothingFound(), this.remainWidthSpace = this.stageWidth - n;
					var f = s.stageWidth - s.categoriesOffsetTotalWidth,
						p = s.stageHeight - s.categoriesOffsetTotalHeight;
					s.howManyThumbsToDisplayH = Math.ceil((f - s.spacerH) / (s.thumbnailMaxWidth + s.spacerH)), s.thumbW = Math.floor((f - s.spacerH * (s.howManyThumbsToDisplayH - 1)) / s.howManyThumbsToDisplayH), s.thumbW > s.thumbnailMaxWidth && (s.howManyThumbsToDisplayH += 1, s.thumbW = Math.floor((f - s.spacerH * (s.howManyThumbsToDisplayH - 1)) / s.howManyThumbsToDisplayH)), s.thumbH = Math.floor(s.thumbW / s.thumbnailMaxWidth * s.thumbnailMaxHeight), s.howManyThumbsToDisplayV = Math.floor(p / (s.thumbH + s.spacerV)), s.howManyThumbsToDisplayV < 1 && (s.howManyThumbsToDisplayV = 1), n = Math.min(s.howManyThumbsToDisplayH, s.totalThumbnails) * (s.thumbW + s.spacerH) - s.spacerH, r = Math.min(Math.ceil(s.totalThumbnails / s.howManyThumbsToDisplayH), s.howManyThumbsToDisplayV) * (s.thumbH + s.spacerV) - s.spacerV, a = s.howManyThumbsToDisplayH > s.totalThumbnails ? 0 : f - n, s.howManyThumbsToDisplayH > s.totalThumbnails && (s.howManyThumbsToDisplayH = s.totalThumbnails), h = s.howManyThumbsToDisplayH * s.howManyThumbsToDisplayV, i = Math.floor(s.tempId / h), s.isSearched_bl && (i = 0), u = s.howManyThumbsToDisplayH * i, firstId = i * h, (d = firstId + h) > s.totalThumbnails && (d = s.totalThumbnails);
					for (c = 0; c < s.totalThumbnails; c++)(o = _[c]).finalW = s.thumbW, c % s.howManyThumbsToDisplayH == s.howManyThumbsToDisplayH - 1 && (o.finalW += a), o.finalH = s.thumbH, o.finalX = c % s.howManyThumbsToDisplayH * (s.thumbW + s.spacerH), o.finalX += Math.floor(c / h) * s.howManyThumbsToDisplayH * (s.thumbW + s.spacerH), o.finalX += (s.stageWidth - n) / 2, o.finalX = Math.floor(o.finalX - u * (s.thumbW + s.spacerH)), o.finalY = c % h, o.finalY = Math.floor(o.finalY / s.howManyThumbsToDisplayH) * (s.thumbH + s.spacerV), o.finalY += (p - r) / 2, o.finalY += s.categoriesOffsetTotalHeight / 2, o.finalY = Math.floor(o.finalY), (l = Math.floor(c / h)) > i ? o.finalX += 150 : l < i && (o.finalX -= 150), e ? c >= firstId && c < d ? (dl = "next" == t ? c % h * s.delayRate + .1 : (h - c % h) * s.delayRate + .1, s.keyPressed_bl && (dl = 0), o.resizeAndPosition(!0, dl)) : o.resizeAndPosition(!0, 0) : o.resizeAndPosition(), o.show();
					s.howManyThumbsToDisplayH * s.howManyThumbsToDisplayV >= s.totalThumbnails ? (s.nextButton_do.setVisible(!1), s.prevButton_do.setVisible(!1)) : (s.nextButton_do.setVisible(!0), s.prevButton_do.setVisible(!0))
				}
			}, this.loadImages = function () {
				s.countLoadedThumbs > s.totalThumbnails - 1 || (s.image_img && (s.image_img.onload = null, s.image_img.onerror = null), s.image_img = new Image, s.image_img.onerror = s.onImageLoadError, s.image_img.onload = s.onImageLoadComplete, s.image_img.src = s.categories_ar[s.countLoadedThumbs].thumbnailPath)
			}, this.onImageLoadError = function (e) {}, this.onImageLoadComplete = function (e) {
				s.thumbs_ar[s.countLoadedThumbs].setImage(s.image_img), s.countLoadedThumbs++, s.loadWithDelayId_to = setTimeout(s.loadImages, 40)
			}, this.disableOrEnableThumbnails = function () {
				for (var e, t = 0; t < s.totalThumbnails; t++) e = s.thumbs_ar[t], t == s.id ? e.disable() : e.enable()
			}, this.show = function (e) {
				s.isShowed_bl || (s.isShowed_bl = !0, s.isOnDOM_bl = !0, s.id = e, FWDUVPUtils.isChrome && s.isMobile_bl ? s.setVisible(!0) : FWDUVPUtils.isIEAndLessThen9 ? document.getElementsByTagName("body")[0].appendChild(s.screen) : document.documentElement.appendChild(s.screen), window.addEventListener ? window.addEventListener("scroll", s.onScrollHandler) : window.attachEvent && window.attachEvent("onscroll", s.onScrollHandler), s.setupThumbnails(), s.resizeAndPosition(!0), s.showDisable(), s.disableOrEnableThumbnails(), clearTimeout(s.hideCompleteId_to), clearTimeout(s.showCompleteId_to), s.mainHolder_do.setY(-s.stageHeight), s.isMobile_bl ? (s.showCompleteId_to = setTimeout(s.showCompleteHandler, 1200), FWDAnimation.to(s.mainHolder_do, .8, {
					y: 0,
					delay: .4,
					ease: Expo.easeInOut
				})) : (s.showCompleteId_to = setTimeout(s.showCompleteHandler, 800), FWDAnimation.to(s.mainHolder_do, .8, {
					y: 0,
					ease: Expo.easeInOut
				})))
			}, this.showCompleteHandler = function () {
				s.mainHolder_do.setY(0), s.hideDisable(), FWDUVPUtils.isIphone && (o.videoScreen_do && o.videoScreen_do.setY(-5e3), o.ytb_do && o.ytb_do.setY(-5e3)), s.resizeAndPosition(!0), s.areThumbnailsLoaded_bl || (s.loadImages(), s.areThumbnailsLoaded_bl = !0)
			}, this.hide = function () {
				s.isShowed_bl && (s.isShowed_bl = !1, FWDUVPUtils.isIphone && (o.videoScreen_do && o.videoScreen_do.setY(0), o.ytb_do && o.ytb_do.setY(0)), clearTimeout(s.hideCompleteId_to), clearTimeout(s.showCompleteId_to), s.showDisable(), s.hideCompleteId_to = setTimeout(s.hideCompleteHandler, 800), FWDAnimation.killTweensOf(s.mainHolder_do), FWDAnimation.to(s.mainHolder_do, .8, {
					y: -s.stageHeight,
					ease: Expo.easeInOut
				}), window.addEventListener ? window.removeEventListener("scroll", s.onScrollHandler) : window.detachEvent && window.detachEvent("onscroll", s.onScrollHandler), s.resizeAndPosition())
			}, this.hideCompleteHandler = function () {
				FWDUVPUtils.isChrome && s.isMobile_bl ? s.setVisible(!1) : FWDUVPUtils.isIEAndLessThen9 ? document.getElementsByTagName("body")[0].removeChild(s.screen) : document.documentElement.removeChild(s.screen), s.isOnDOM_bl = !1, s.dispatchEvent(e.HIDE_COMPLETE)
			}, this.updateHEXColors = function (e, o) {
				-1 != t.skinPath_str.indexOf("hex_white") ? s.selectedColor_str = "#FFFFFF" : s.selectedColor_str = o, s.closeButton_do.updateHEXColors(e, s.selectedColor_str), s.nextButton_do.updateHEXColors(e, s.selectedColor_str), s.prevButton_do.updateHEXColors(e, s.selectedColor_str)
			}, this.init()
		};
		e.setPrototype = function () {
			e.prototype = new FWDUVPDisplayObject("div")
		}, e.HIDE_COMPLETE = "hideComplete", e.prototype = null, window.FWDUVPCategories = e
	}(), function (e) {
		var t = function (e, o, s, i, l, n, r) {
			var a = this;
			t.prototype;
			this.backgroundImagePath_str = s, this.catThumbTextBkPath_str = i, this.canvas_el = null, this.htmlContent = n, this.htmlText_str = r, this.simpleText_do = null, this.effectImage_do = null, this.imageHolder_do = null, this.normalImage_do = null, this.effectImage_do = null, this.dumy_do = null, this.thumbnailSelectedType_str = l, this.id = o, this.imageOriginalW, this.imageOriginalH, this.finalX, this.finalY, this.finalW, this.finalH, this.imageFinalX, this.imageFinalY, this.imageFinalW, this.imageFinalH, this.dispatchShowWithDelayId_to, this.isShowed_bl = !1, this.hasImage_bl = !1, this.isSelected_bl = !1, this.isDisabled_bl = !1, this.hasCanvas_bl = FWDUVPlayer.hasCanvas, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.init = function () {
				a.getStyle().background = "url('" + a.backgroundImagePath_str + "')", a.setupMainContainers(), a.setupDescription(), a.setupDumy()
			}, this.setupMainContainers = function () {
				a.imageHolder_do = new FWDUVPDisplayObject("div"), a.addChild(a.imageHolder_do)
			}, this.setupDumy = function () {
				a.dumy_do = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIE && (a.dumy_do.setBkColor("#FFFFFF"), a.dumy_do.setAlpha(0)), a.addChild(a.dumy_do)
			}, this.setupDescription = function () {
				a.simpleText_do = new FWDUVPDisplayObject("div"), a.simpleText_do.getStyle().background = "url('" + a.catThumbTextBkPath_str + "')", FWDUVPUtils.isFirefox && (a.simpleText_do.hasTransform3d_bl = !1, a.simpleText_do.hasTransform2d_bl = !1), a.simpleText_do.setBackfaceVisibility(), a.simpleText_do.getStyle().width = "100%", a.simpleText_do.getStyle().fontFamily = "Arial", a.simpleText_do.getStyle().fontSize = "12px", a.simpleText_do.getStyle().textAlign = "left", a.simpleText_do.getStyle().color = "#FFFFFF", a.simpleText_do.getStyle().fontSmoothing = "antialiased", a.simpleText_do.getStyle().webkitFontSmoothing = "antialiased", a.simpleText_do.getStyle().textRendering = "optimizeLegibility", a.simpleText_do.setInnerHTML(a.htmlContent), a.addChild(a.simpleText_do)
			}, this.positionDescription = function () {
				a.simpleText_do.setY(parseInt(a.finalH - a.simpleText_do.getHeight()))
			}, this.setupBlackAndWhiteImage = function (e) {
				if (a.hasCanvas_bl && "opacity" != a.thumbnailSelectedType_str) {
					var t = document.createElement("canvas"),
						o = t.getContext("2d");
					t.width = a.imageOriginalW, t.height = a.imageOriginalH, o.drawImage(e, 0, 0);
					var s = o.getImageData(0, 0, t.width, t.height),
						i = s.data;
					if ("threshold" == a.thumbnailSelectedType_str)
						for (var l = 0; l < i.length; l += 4) {
							var n = .2126 * i[l] + .7152 * i[l + 1] + .0722 * i[l + 2] >= 150 ? 255 : 0;
							i[l] = i[l + 1] = i[l + 2] = n
						} else if ("blackAndWhite" == a.thumbnailSelectedType_str)
							for (l = 0; l < i.length; l += 4) {
								n = .2126 * i[l] + .7152 * i[l + 1] + .0722 * i[l + 2];
								i[l] = i[l + 1] = i[l + 2] = n
							}
					o.putImageData(s, 0, 0, 0, 0, s.width, s.height), a.effectImage_do = new FWDUVPDisplayObject("canvas"), a.effectImage_do.screen = t, a.effectImage_do.setAlpha(.9), a.effectImage_do.setMainProperties()
				}
			}, this.setImage = function (t) {
				a.normalImage_do = new FWDUVPDisplayObject("img"), a.normalImage_do.setScreen(t), a.imageOriginalW = a.normalImage_do.w, a.imageOriginalH = a.normalImage_do.h, a.setButtonMode(!0), a.setupBlackAndWhiteImage(t), a.resizeImage(), a.imageHolder_do.setX(parseInt(a.finalW / 2)), a.imageHolder_do.setY(parseInt(a.finalH / 2)), a.imageHolder_do.setWidth(0), a.imageHolder_do.setHeight(0), a.normalImage_do.setX(-parseInt(a.normalImage_do.w / 2)), a.normalImage_do.setY(-parseInt(a.normalImage_do.h / 2)), a.normalImage_do.setAlpha(0), a.effectImage_do && (a.effectImage_do.setX(-parseInt(a.normalImage_do.w / 2)), a.effectImage_do.setY(-parseInt(a.normalImage_do.h / 2)), a.effectImage_do.setAlpha(.01)), FWDAnimation.to(a.imageHolder_do, .8, {
					x: 0,
					y: 0,
					w: a.finalW,
					h: a.finalH,
					ease: Expo.easeInOut
				}), FWDAnimation.to(a.normalImage_do, .8, {
					alpha: 1,
					x: a.imageFinalX,
					y: a.imageFinalY,
					ease: Expo.easeInOut
				}), a.effectImage_do && FWDAnimation.to(a.effectImage_do, .8, {
					x: a.imageFinalX,
					y: a.imageFinalY,
					ease: Expo.easeInOut
				}), a.hasPointerEvent_bl ? (a.screen.addEventListener("pointerup", a.onMouseUp), a.screen.addEventListener("pointerover", a.onMouseOver), a.screen.addEventListener("pointerout", a.onMouseOut)) : a.screen.addEventListener && (a.isMobile_bl || (a.screen.addEventListener("mouseover", a.onMouseOver), a.screen.addEventListener("mouseout", a.onMouseOut), a.screen.addEventListener("mouseup", a.onMouseUp)), a.screen.addEventListener("touchend", a.onMouseUp)), this.imageHolder_do.addChild(a.normalImage_do), a.effectImage_do && a.imageHolder_do.addChild(a.effectImage_do), this.hasImage_bl = !0, a.id == e.id && a.disable()
			}, a.onMouseOver = function (e, t) {
				a.isDisabled_bl || e.pointerType && e.pointerType != e.MSPOINTER_TYPE_MOUSE || a.setSelectedState(!0)
			}, a.onMouseOut = function (e) {
				a.isDisabled_bl || e.pointerType && e.pointerType != e.MSPOINTER_TYPE_MOUSE || a.setNormalState(!0)
			}, a.onMouseUp = function (e) {
				a.isDisabled_bl || 2 == e.button || (e.preventDefault && e.preventDefault(), a.dispatchEvent(t.MOUSE_UP, {
					id: a.id
				}))
			}, this.resizeAndPosition = function (e, t) {
				FWDAnimation.killTweensOf(a), FWDAnimation.killTweensOf(a.imageHolder_do), e ? FWDAnimation.to(a, .8, {
					x: a.finalX,
					y: a.finalY,
					delay: t,
					ease: Expo.easeInOut
				}) : (a.setX(a.finalX), a.setY(a.finalY)), a.setWidth(a.finalW), a.setHeight(a.finalH), a.imageHolder_do.setX(0), a.imageHolder_do.setY(0), a.imageHolder_do.setWidth(a.finalW), a.imageHolder_do.setHeight(a.finalH), a.dumy_do.setWidth(a.finalW), a.dumy_do.setHeight(a.finalH), a.resizeImage(), a.positionDescription()
			}, this.resizeImage = function (e) {
				if (a.normalImage_do) {
					FWDAnimation.killTweensOf(a.normalImage_do);
					var t, o = a.finalW / a.imageOriginalW,
						s = a.finalH / a.imageOriginalH;
					t = o >= s ? o : s, a.imageFinalW = Math.ceil(t * a.imageOriginalW), a.imageFinalH = Math.ceil(t * a.imageOriginalH), a.imageFinalX = Math.round((a.finalW - a.imageFinalW) / 2), a.imageFinalY = Math.round((a.finalH - a.imageFinalH) / 2), a.effectImage_do && (FWDAnimation.killTweensOf(a.effectImage_do), a.effectImage_do.setX(a.imageFinalX), a.effectImage_do.setY(a.imageFinalY), a.effectImage_do.setWidth(a.imageFinalW), a.effectImage_do.setHeight(a.imageFinalH), a.isDisabled_bl && a.setSelectedState(!1, !0)), a.normalImage_do.setX(a.imageFinalX), a.normalImage_do.setY(a.imageFinalY), a.normalImage_do.setWidth(a.imageFinalW), a.normalImage_do.setHeight(a.imageFinalH), a.isDisabled_bl ? a.normalImage_do.setAlpha(.3) : a.normalImage_do.setAlpha(1)
				}
			}, this.setNormalState = function (e) {
				a.isSelected_bl && (a.isSelected_bl = !1, "threshold" == a.thumbnailSelectedType_str || "blackAndWhite" == a.thumbnailSelectedType_str ? e ? FWDAnimation.to(a.effectImage_do, 1, {
					alpha: .01,
					ease: Quart.easeOut
				}) : a.effectImage_do.setAlpha(.01) : "opacity" == a.thumbnailSelectedType_str && (e ? FWDAnimation.to(a.normalImage_do, 1, {
					alpha: 1,
					ease: Quart.easeOut
				}) : a.normalImage_do.setAlpha(1)))
			}, this.setSelectedState = function (e, t) {
				a.isSelected_bl && !t || (a.isSelected_bl = !0, "threshold" == a.thumbnailSelectedType_str || "blackAndWhite" == a.thumbnailSelectedType_str ? e ? FWDAnimation.to(a.effectImage_do, 1, {
					alpha: 1,
					ease: Expo.easeOut
				}) : a.effectImage_do.setAlpha(1) : "opacity" == a.thumbnailSelectedType_str && (e ? FWDAnimation.to(a.normalImage_do, 1, {
					alpha: .3,
					ease: Expo.easeOut
				}) : a.normalImage_do.setAlpha(.3)))
			}, this.show = function () {
				FWDAnimation.to(a, .8, {
					scale: 1,
					ease: Expo.easeInOut
				})
			}, this.hide = function () {
				FWDAnimation.to(a, .8, {
					scale: 0,
					ease: Expo.easeInOut
				})
			}, this.enable = function () {
				a.hasImage_bl && (a.isDisabled_bl = !1, a.setButtonMode(!0), a.setNormalState(!0))
			}, this.disable = function () {
				a.hasImage_bl && (a.isDisabled_bl = !0, a.setButtonMode(!1), a.setSelectedState(!0))
			}, this.init()
		};
		t.setPrototype = function () {
			t.prototype = new FWDUVPTransformDisplayObject("div")
		}, t.MOUSE_UP = "onMouseUp", t.prototype = null, e.FWDUVPCategoriesThumb = t
	}(window), function (e) {
		var t = function (o, s) {
			var i = this;
			t.prototype;
			this.categories_ar = s.categories_ar, this.buttons_ar = [], this.mainHolder_do = null, this.selector_do = null, this.mainButtonsHolder_do = null, this.buttonsHolder_do = null, this.arrowW = s.arrowW, this.arrowH = s.arrowH, i.useHEXColorsForSkin_bl = o.data.useHEXColorsForSkin_bl, i.normalButtonsColor_str = o.data.normalButtonsColor_str, i.selectedButtonsColor_str = o.data.selectedButtonsColor_str, this.arrowN_str = s.arrowN_str, this.arrowS_str = s.arrowS_str, this.selectorLabel_str = s.selectorLabel, this.selectorBkColorN_str = s.selectorBackgroundNormalColor, this.selectorBkColorS_str = s.selectorBackgroundSelectedColor, this.selectorTextColorN_str = s.selectorTextNormalColor, this.selectorTextColorS_str = s.selectorTextSelectedColor, this.itemBkColorN_str = s.buttonBackgroundNormalColor, this.itemBkColorS_str = s.buttonBackgroundSelectedColor, this.itemTextColorN_str = s.buttonTextNormalColor, this.itemTextColorS_str = s.buttonTextSelectedColor, this.scrollBarHandlerFinalY = 0, this.finalX, this.finalY, this.totalButtons = i.categories_ar.length, this.curId = s.startAtPlaylist, this.buttonsHolderWidth = 0, this.buttonsHolderHeight = 0, this.totalWidth = o.stageWidth, this.buttonHeight = s.buttonHeight, this.totalButtonsHeight = 0, this.sapaceBetweenButtons = 1, this.thumbnailsFinalY = 0, this.vy = 0, this.vy2 = 0, this.friction = .9, this.hideMenuTimeOutId_to, this.getMaxWidthResizeAndPositionId_to, this.isShowed_bl = !1, this.addMouseWheelSupport_bl = o.data.addMouseWheelSupport_bl, this.scollbarSpeedSensitivity = o.data.scollbarSpeedSensitivity, this.isOpened_bl = !1, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
				i.setOverflow("visible"), i.setupMainContainers(), i.setupScrollLogic(), i.getMaxWidthResizeAndPosition(), i.mainButtonsHolder_do.setVisible(!1), i.bk_do.setVisible(!1)
			}, this.setupMainContainers = function () {
				var e;
				if (i.mainHolder_do = new FWDUVPDisplayObject("div"), i.mainHolder_do.setOverflow("visible"), i.addChild(i.mainHolder_do), i.bk_do = new FWDUVPDisplayObject("div"), i.bk_do.setY(i.buttonHeight), i.bk_do.setBkColor(o.playlistBackgroundColor_str), i.bk_do.setAlpha(0), i.mainHolder_do.addChild(i.bk_do), i.mainButtonsHolder_do = new FWDUVPDisplayObject("div"), i.mainButtonsHolder_do.setY(i.buttonHeight), i.mainHolder_do.addChild(i.mainButtonsHolder_do), o.repeatBackground_bl) i.dummyBk_do = new FWDUVPDisplayObject("div"), i.dummyBk_do.getStyle().background = "url('" + o.bkPath_str + "')";
				else {
					i.dummyBk_do = new FWDUVPDisplayObject("img");
					var t = new Image;
					t.src = o.bkPath_str, i.dummyBk_do.setScreen(t)
				}
				i.dummyBk_do.setHeight(i.buttonHeight), i.mainHolder_do.addChild(i.dummyBk_do), i.buttonsHolder_do = new FWDUVPDisplayObject("div"), i.mainButtonsHolder_do.addChild(i.buttonsHolder_do);
				var l = i.selectorLabel_str;
				"default" == i.selectorLabel_str && (l = i.categories_ar[i.curId]), FWDUVPComboBoxSelector.setPrototype(), i.selector_do = new FWDUVPComboBoxSelector(11, 6, s.arrowN_str, s.arrowS_str, l, i.selectorBkColorN_str, i.selectorBkColorS_str, i.selectorTextColorN_str, i.selectorTextColorS_str, i.buttonHeight, i.useHEXColorsForSkin_bl, i.normalButtonsColor_str, i.selectedButtonsColor_str), i.mainHolder_do.addChild(i.selector_do), i.selector_do.setNormalState(!1), i.selector_do.addListener(FWDUVPComboBoxSelector.CLICK, i.openMenuHandler);
				for (var n = 0; n < i.totalButtons; n++) FWDUVPComboBoxButton.setPrototype(), e = new FWDUVPComboBoxButton(i, i.categories_ar[n], i.itemBkColorN_str, i.itemBkColorS_str, i.itemTextColorN_str, i.itemTextColorS_str, n, i.buttonHeight), i.buttons_ar[n] = e, e.addListener(FWDUVPComboBoxButton.CLICK, i.buttonOnMouseDownHandler), i.buttonsHolder_do.addChild(e)
			}, this.buttonOnMouseDownHandler = function (o) {
				i.curId = o.target.id, clearTimeout(i.hideMenuTimeOutId_to), i.hide(!0), i.selector_do.enable(), i.hasPointerEvent_bl ? e.removeEventListener("pointerdown", i.checkOpenedMenu) : (e.removeEventListener("touchstart", i.checkOpenedMenu), i.isMobile_bl || (e.removeEventListener("mousedown", i.checkOpenedMenu), e.removeEventListener("mousemove", i.checkOpenedMenu))), i.selector_do.setText(i.buttons_ar[i.curId].label1_str), i.dispatchEvent(t.BUTTON_PRESSED, {
					id: i.curId
				})
			}, this.openMenuHandler = function (e) {
				FWDAnimation.isTweening(i.mainButtonsHolder_do) || (i.isShowed_bl ? i.checkOpenedMenu(e.e, !0) : (i.selector_do.disable(), i.show(!0), i.startToCheckOpenedMenu(), i.dispatchEvent(t.OPEN)))
			}, this.setButtonsStateBasedOnId = function (e) {
				i.curId = e;
				for (var t = 0; t < i.totalButtons; t++) button_do = i.buttons_ar[t], t == i.curId ? button_do.disable() : button_do.enable();
				i.selector_do.setText(i.buttons_ar[i.curId].label1_str), i.scrHandler_do ? (i.updateScrollBarSizeActiveAndDeactivate(), i.updateScrollBarHandlerAndContent(!1, !0)) : i.thumbnailsFinalY = 0
			}, this.setValue = function (e) {
				i.curId = e, i.setButtonsStateBasedOnId()
			}, this.startToCheckOpenedMenu = function (t) {
				i.hasPointerEvent_bl ? e.addEventListener("pointerdown", i.checkOpenedMenu) : (e.addEventListener("touchstart", i.checkOpenedMenu), i.isMobile_bl || e.addEventListener("mousedown", i.checkOpenedMenu))
			}, this.checkOpenedMenu = function (t, o) {
				t.preventDefault && t.preventDefault();
				var s = FWDUVPUtils.getViewportMouseCoordinates(t);
				t.type, !FWDUVPUtils.hitTest(i.screen, s.screenX, s.screenY) && !FWDUVPUtils.hitTest(i.mainButtonsHolder_do.screen, s.screenX, s.screenY) || o ? (i.hide(!0), i.selector_do.enable(), i.hasPointerEvent_bl ? e.removeEventListener("pointerdown", i.checkOpenedMenu) : (i.isMobile_bl || (e.removeEventListener("touchstart", i.checkOpenedMenu), e.removeEventListener("mousemove", i.checkOpenedMenu)), e.removeEventListener("mousedown", i.checkOpenedMenu))) : clearTimeout(i.hideMenuTimeOutId_to)
			}, i.getMaxWidthResizeAndPosition = function () {
				var e;
				i.totalButtonsHeight = 0;
				for (var t = 0; t < i.totalButtons; t++)(e = i.buttons_ar[t]).setY(1 + t * (e.totalHeight + i.sapaceBetweenButtons)), i.allowToScrollAndScrollBarIsActive_bl && !i.isMobile_bl ? i.totalWidth = o.stageWidth - 6 : i.totalWidth = o.stageWidth, e.totalWidth = i.totalWidth, e.setWidth(i.totalWidth), e.centerText();
				i.totalButtonsHeight = e.getY() + e.totalHeight - i.sapaceBetweenButtons, i.dummyBk_do.setWidth(i.totalWidth + 6), i.setWidth(i.totalWidth), i.setHeight(i.buttonHeight), i.selector_do.totalWidth = i.totalWidth + 6, i.selector_do.setWidth(i.totalWidth + 6), i.selector_do.centerText(), i.buttonsHolder_do.setWidth(i.totalWidth), i.buttonsHolder_do.setHeight(i.totalButtonsHeight)
			}, this.position = function () {
				FWDUVPUtils.isAndroid ? (i.setX(Math.floor(i.finalX)), i.setY(Math.floor(i.finalY - 1)), setTimeout(i.poscombo - box, 100)) : (i.poscombo, box())
			}, this.resizeAndPosition = function () {
				i.stageWidth = o.stageWidth, i.stageHeight = o.stageHeight, i.bk_do.setWidth(i.stageWidth), i.bk_do.setHeight(i.stageHeight - o.removeFromThumbsHolderHeight + 3), i.mainButtonsHolder_do.setWidth(i.stageWidth), i.mainButtonsHolder_do.setHeight(i.stageHeight - o.removeFromThumbsHolderHeight + 3), i.totalButtonsHeight > i.mainButtonsHolder_do.h ? i.allowToScrollAndScrollBarIsActive_bl = !0 : i.allowToScrollAndScrollBarIsActive_bl = !1, !i.allowToScrollAndScrollBarIsActive_bl && i.scrMainHolder_do ? i.scrMainHolder_do.setVisible(!1) : i.allowToScrollAndScrollBarIsActive_bl && i.scrMainHolder_do && i.isShowed_bl && i.scrMainHolder_do.setVisible(!0), i.scrHandler_do && i.updateScrollBarSizeActiveAndDeactivate(), this.getMaxWidthResizeAndPosition(), i.updateScrollBarHandlerAndContent()
			}, this.hide = function (e, t) {
				(i.isShowed_bl || t) && (FWDAnimation.killTweensOf(this), i.isShowed_bl = !1, FWDAnimation.killTweensOf(i.mainButtonsHolder_do), FWDAnimation.killTweensOf(i.bk_do), e ? (FWDAnimation.to(i.mainButtonsHolder_do, .8, {
					y: -i.totalButtonsHeight,
					ease: Expo.easeInOut,
					onComplete: i.hideComplete
				}), FWDAnimation.to(i.bk_do, .8, {
					alpha: 0
				})) : (i.mainButtonsHolder_do.setY(i.buttonHeight - i.totalButtonsHeight), i.bk_do.setAlpha(0), i.setHeight(i.buttonHeight)))
			}, this.hideComplete = function () {
				i.mainButtonsHolder_do.setVisible(!1), i.bk_do.setVisible(!1)
			}, this.show = function (e, t) {
				i.isShowed_bl && !t || (FWDAnimation.killTweensOf(this), i.mainButtonsHolder_do.setY(-i.totalButtonsHeight), i.isShowed_bl = !0, i.mainButtonsHolder_do.setVisible(!0), i.bk_do.setVisible(!0), i.resizeAndPosition(), FWDAnimation.killTweensOf(i.mainButtonsHolder_do), FWDAnimation.killTweensOf(i.bk_do), i.scrMainHolder_do && i.allowToScrollAndScrollBarIsActive_bl && i.scrMainHolder_do.setVisible(!0), e ? (FWDAnimation.to(i.bk_do, .8, {
					alpha: 1
				}), FWDAnimation.to(i.mainButtonsHolder_do, .8, {
					y: i.buttonHeight,
					ease: Expo.easeInOut
				})) : (i.bk_do.setAlpha(1), i.mainButtonsHolder_do.setY(i.buttonHeight)))
			}, this.setupScrollLogic = function () {
				i.setupMobileScrollbar(), i.isMobile_bl || i.setupScrollbar(), i.addMouseWheelSupport_bl && i.addMouseWheelSupport()
			}, this.setupMobileScrollbar = function () {
				i.hasPointerEvent_bl ? i.mainButtonsHolder_do.screen.addEventListener("pointerdown", i.scrollBarTouchStartHandler) : i.mainButtonsHolder_do.screen.addEventListener("touchstart", i.scrollBarTouchStartHandler), i.isMobile_bl && (i.updateMobileScrollBarId_int = setInterval(i.updateMobileScrollBar, 16))
			}, this.scrollBarTouchStartHandler = function (t) {
				t.preventDefault && t.preventDefault(), i.isScrollingOnMove_bl = !1, FWDAnimation.killTweensOf(i.buttonsHolder_do);
				var o = FWDUVPUtils.getViewportMouseCoordinates(t);
				i.isDragging_bl = !0, i.lastPresedY = o.screenY, i.checkLastPresedY = o.screenY, i.hasPointerEvent_bl ? (e.addEventListener("pointerup", i.scrollBarTouchEndHandler), e.addEventListener("pointermove", i.scrollBarTouchMoveHandler)) : (e.addEventListener("touchend", i.scrollBarTouchEndHandler), e.addEventListener("touchmove", i.scrollBarTouchMoveHandler)), e.addEventListener("mouseup", i.scrollBarTouchEndHandler), e.addEventListener("mousemove", i.scrollBarTouchMoveHandler), clearInterval(i.updateMoveMobileScrollbarId_int), i.updateMoveMobileScrollbarId_int = setInterval(i.updateMoveMobileScrollbar, 20)
			}, this.scrollBarTouchMoveHandler = function (e) {
				if (e.preventDefault && e.preventDefault(), e.stopImmediatePropagation(), !(i.totalButtonsHeight < i.mainButtonsHolder_do.h)) {
					o.parent.showDisable();
					var t = FWDUVPUtils.getViewportMouseCoordinates(e);
					(t.screenY >= i.checkLastPresedY + 6 || t.screenY <= i.checkLastPresedY - 6) && (i.isScrollingOnMove_bl = !0);
					var s = t.screenY - i.lastPresedY;
					if (i.thumbnailsFinalY += s, i.thumbnailsFinalY = Math.round(i.thumbnailsFinalY), i.lastPresedY = t.screenY, i.vy = 2 * s, !i.isMobile) {
						i.thumbnailsFinalY > 0 ? i.thumbnailsFinalY = 0 : i.thumbnailsFinalY < i.mainButtonsHolder_do.h - i.totalButtonsHeight && (i.thumbnailsFinalY = i.mainButtonsHolder_do.h - i.totalButtonsHeight);
						var l = Math.max(0, i.thumbnailsFinalY / (i.mainButtonsHolder_do.h - i.totalButtonsHeight));
						i.scrMainHolder_do && (i.scrollBarHandlerFinalY = Math.round((i.scrMainHolder_do.h - i.scrHandler_do.h) * l), i.scrollBarHandlerFinalY < 0 ? i.scrollBarHandlerFinalY = 0 : i.scrollBarHandlerFinalY > i.scrMainHolder_do.h - i.scrHandler_do.h - 1 && (i.scrollBarHandlerFinalY = i.scrMainHolder_do.h - i.scrHandler_do.h - 1), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.killTweensOf(i.scrHandlerLines_do), i.scrHandler_do.setY(i.scrollBarHandlerFinalY), i.scrHandlerLines_do.setY(i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLinesN_do.h) / 2)))
					}
				}
			}, this.scrollBarTouchEndHandler = function (t) {
				i.isDragging_bl = !1, clearInterval(i.updateMoveMobileScrollbarId_int), clearTimeout(i.disableOnMoveId_to), i.disableOnMoveId_to = setTimeout(function () {
					o.parent.hideDisable()
				}, 100), i.hasPointerEvent_bl ? (e.removeEventListener("pointerup", i.scrollBarTouchEndHandler), e.removeEventListener("pointermove", i.scrollBarTouchMoveHandler)) : (e.removeEventListener("touchend", i.scrollBarTouchEndHandler), e.removeEventListener("touchmove", i.scrollBarTouchMoveHandler)), e.removeEventListener("mousemove", i.scrollBarTouchMoveHandler)
			}, this.updateMoveMobileScrollbar = function () {
				i.buttonsHolder_do.setY(i.thumbnailsFinalY)
			}, this.updateMobileScrollBar = function (e) {
				i.isDragging_bl || (i.totalButtonsHeight < i.mainButtonsHolder_do.h && (i.thumbnailsFinalY = .01), i.vy *= i.friction, i.thumbnailsFinalY += i.vy, i.thumbnailsFinalY > 0 ? (i.vy2 = .3 * (0 - i.thumbnailsFinalY), i.vy *= i.friction, i.thumbnailsFinalY += i.vy2) : i.thumbnailsFinalY < i.mainButtonsHolder_do.h - i.totalButtonsHeight && (i.vy2 = .3 * (i.mainButtonsHolder_do.h - i.totalButtonsHeight - i.thumbnailsFinalY), i.vy *= i.friction, i.thumbnailsFinalY += i.vy2), i.buttonsHolder_do.setY(Math.round(i.thumbnailsFinalY)))
			}, this.setupScrollbar = function () {
				i.scrMainHolder_do = new FWDUVPDisplayObject("div"), i.scrMainHolder_do.setVisible(!1), i.scrMainHolder_do.setWidth(o.scrWidth), i.scrTrack_do = new FWDUVPDisplayObject("div"), i.scrTrack_do.setWidth(o.scrWidth);
				var e = new Image;
				e.src = o.scrBkTop_img.src, i.scrTrackTop_do = new FWDUVPDisplayObject("img"), i.scrTrackTop_do.setWidth(o.scrTrackTop_do.w), i.scrTrackTop_do.setHeight(o.scrTrackTop_do.h), i.scrTrackTop_do.setScreen(e), i.scrTrackMiddle_do = new FWDUVPDisplayObject("div"), i.scrTrackMiddle_do.getStyle().background = "url('" + o.data.scrBkMiddlePath_str + "')", i.scrTrackMiddle_do.setWidth(o.scrWidth), i.scrTrackMiddle_do.setY(i.scrTrackTop_do.h);
				var t = new Image;
				t.src = o.data.scrBkBottomPath_str, i.scrTrackBottom_do = new FWDUVPDisplayObject("img"), i.scrTrackBottom_do.setScreen(t), i.scrTrackBottom_do.setWidth(i.scrTrackTop_do.w), i.scrTrackBottom_do.setHeight(i.scrTrackTop_do.h), i.scrHandler_do = new FWDUVPDisplayObject("div"), i.scrHandler_do.setWidth(o.scrWidth), i.scrDragTop_img = new Image, i.scrDragTop_img.src = o.scrDragTop_img.src, i.scrDragTop_img.width = o.scrDragTop_img.width, i.scrDragTop_img.height = o.scrDragTop_img.height, i.scrHandlerTop_do = new FWDUVPDisplayObject("img"), i.useHEXColorsForSkin_bl ? (i.scrHandlerTop_do = new FWDUVPDisplayObject("div"), i.scrHandlerTop_do.setWidth(i.scrDragTop_img.width), i.scrHandlerTop_do.setHeight(i.scrDragTop_img.height), i.mainScrubberDragTop_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.scrDragTop_img, i.normalButtonsColor_str).canvas, i.scrHandlerTop_do.screen.appendChild(i.mainScrubberDragTop_canvas)) : (i.scrHandlerTop_do = new FWDUVPDisplayObject("img"), i.scrHandlerTop_do.setScreen(i.scrDragTop_img)), i.scrHandlerMiddle_do = new FWDUVPDisplayObject("div"), i.middleImage = new Image, i.middleImage.src = o.data.scrDragMiddlePath_str, i.useHEXColorsForSkin_bl ? i.middleImage.onload = function () {
					i.scrubberDragMiddle_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.middleImage, i.normalButtonsColor_str, !0), i.scrubberDragImage_img = i.scrubberDragMiddle_canvas.image, i.scrHandlerMiddle_do.getStyle().background = "url('" + i.scrubberDragImage_img.src + "') repeat-y"
				} : i.scrHandlerMiddle_do.getStyle().background = "url('" + o.data.scrDragMiddlePath_str + "')", i.scrHandlerMiddle_do.setWidth(o.scrWidth), i.scrHandlerMiddle_do.setY(i.scrHandlerTop_do.h), i.scrHandlerBottom_do = new FWDUVPDisplayObject("div"), i.bottomImage = new Image, i.bottomImage.src = o.data.scrDragMiddlePath_str, i.useHEXColorsForSkin_bl ? i.bottomImage.onload = function () {
					i.scrubberDragBottom_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.bottomImage, i.normalButtonsColor_str, !0), i.scrubberDragBottomImage_img = i.scrubberDragBottom_canvas.image, i.scrHandlerBottom_do.getStyle().background = "url('" + i.scrubberDragBottomImage_img.src + "') repeat-y"
				} : i.scrHandlerBottom_do.getStyle().background = "url('" + o.data.scrDragBottomPath_str + "')", i.scrHandlerBottom_do.setWidth(o.scrWidth), i.scrHandlerBottom_do.setY(i.scrHandlerTop_do.h), i.scrHandlerBottom_do.setWidth(i.scrHandlerTop_do.w), i.scrHandlerBottom_do.setHeight(i.scrHandlerTop_do.h), i.scrHandler_do.setButtonMode(!0), i.scrLinesN_img = new Image, i.scrLinesN_img.src = o.scrLinesN_img.src, i.scrLinesN_img.width = o.scrLinesN_img.width, i.scrLinesN_img.height = o.scrLinesN_img.height, i.useHEXColorsForSkin_bl ? (i.scrHandlerLinesN_do = new FWDUVPDisplayObject("div"), i.scrHandlerLinesN_do.setWidth(i.scrLinesN_img.width), i.scrHandlerLinesN_do.setHeight(i.scrLinesN_img.height), i.mainhandlerN_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.scrLinesN_img, i.selectedButtonsColor_str).canvas, i.scrHandlerLinesN_do.screen.appendChild(i.mainhandlerN_canvas)) : (i.scrHandlerLinesN_do = new FWDUVPDisplayObject("img"), i.scrHandlerLinesN_do.setScreen(i.scrLinesN_img)), i.scrHandlerLinesS_img = new Image, i.scrHandlerLinesS_img.src = o.data.scrLinesSPath_str, i.useHEXColorsForSkin_bl ? (i.scrHandlerLinesS_do = new FWDUVPDisplayObject("div"), i.scrHandlerLinesS_img.onload = function () {
					i.scrHandlerLinesS_do.setWidth(i.scrHandlerLinesN_do.w), i.scrHandlerLinesS_do.setHeight(i.scrHandlerLinesN_do.h), i.scrubberLines_s_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.scrHandlerLinesS_img, i.selectedButtonsColor_str, !0), i.scrubbelinesSImage_img = i.scrubberLines_s_canvas.image, i.scrHandlerLinesS_do.getStyle().background = "url('" + i.scrubbelinesSImage_img.src + "') repeat-y"
				}) : (i.scrHandlerLinesS_do = new FWDUVPDisplayObject("img"), i.scrHandlerLinesS_do.setScreen(i.scrHandlerLinesS_img), i.scrHandlerLinesS_do.setWidth(i.scrHandlerLinesN_do.w), i.scrHandlerLinesS_do.setHeight(i.scrHandlerLinesN_do.h)), i.scrHandlerLinesS_do.setAlpha(0), i.scrHandlerLines_do = new FWDUVPDisplayObject("div"), i.scrHandlerLines_do.setWidth(i.scrHandlerLinesN_do.w), i.scrHandlerLines_do.setHeight(i.scrHandlerLinesN_do.h), i.scrHandlerLines_do.setButtonMode(!0), i.scrTrack_do.addChild(i.scrTrackTop_do), i.scrTrack_do.addChild(i.scrTrackMiddle_do), i.scrTrack_do.addChild(i.scrTrackBottom_do), i.scrHandler_do.addChild(i.scrHandlerTop_do), i.scrHandler_do.addChild(i.scrHandlerMiddle_do), i.scrHandler_do.addChild(i.scrHandlerBottom_do), i.scrHandlerLines_do.addChild(i.scrHandlerLinesN_do), i.scrHandlerLines_do.addChild(i.scrHandlerLinesS_do), i.scrMainHolder_do.addChild(i.scrTrack_do), i.scrMainHolder_do.addChild(i.scrHandler_do), i.scrMainHolder_do.addChild(i.scrHandlerLines_do), i.mainButtonsHolder_do.addChild(i.scrMainHolder_do), i.scrHandler_do.screen.addEventListener ? (i.scrHandler_do.screen.addEventListener("mouseover", i.scrollBarHandlerOnMouseOver), i.scrHandler_do.screen.addEventListener("mouseout", i.scrollBarHandlerOnMouseOut), i.scrHandler_do.screen.addEventListener("mousedown", i.scrollBarHandlerOnMouseDown), i.scrHandlerLines_do.screen.addEventListener("mouseover", i.scrollBarHandlerOnMouseOver), i.scrHandlerLines_do.screen.addEventListener("mouseout", i.scrollBarHandlerOnMouseOut), i.scrHandlerLines_do.screen.addEventListener("mousedown", i.scrollBarHandlerOnMouseDown)) : i.scrHandler_do.screen.attachEvent && (i.scrHandler_do.screen.attachEvent("onmouseover", i.scrollBarHandlerOnMouseOver), i.scrHandler_do.screen.attachEvent("onmouseout", i.scrollBarHandlerOnMouseOut), i.scrHandler_do.screen.attachEvent("onmousedown", i.scrollBarHandlerOnMouseDown), i.scrHandlerLines_do.screen.attachEvent("onmouseover", i.scrollBarHandlerOnMouseOver), i.scrHandlerLines_do.screen.attachEvent("onmouseout", i.scrollBarHandlerOnMouseOut), i.scrHandlerLines_do.screen.attachEvent("onmousedown", i.scrollBarHandlerOnMouseDown))
			}, this.scrollBarHandlerOnMouseOver = function (e) {
				i.allowToScrollAndScrollBarIsActive_bl && (FWDAnimation.killTweensOf(i.scrHandlerLinesN_do), FWDAnimation.killTweensOf(i.scrHandlerLinesS_do), FWDAnimation.to(i.scrHandlerLinesN_do, .8, {
					alpha: 0,
					ease: Expo.easeOut
				}), FWDAnimation.to(i.scrHandlerLinesS_do, .8, {
					alpha: 1,
					ease: Expo.easeOut
				}))
			}, this.scrollBarHandlerOnMouseOut = function (e) {
				!i.isDragging_bl && i.allowToScrollAndScrollBarIsActive_bl && (FWDAnimation.killTweensOf(i.scrHandlerLinesN_do), FWDAnimation.killTweensOf(i.scrHandlerLinesS_do), FWDAnimation.to(i.scrHandlerLinesN_do, .8, {
					alpha: 1,
					ease: Expo.easeOut
				}), FWDAnimation.to(i.scrHandlerLinesS_do, .8, {
					alpha: 0,
					ease: Expo.easeOut
				}))
			}, this.scrollBarHandlerOnMouseDown = function (t) {
				if (i.allowToScrollAndScrollBarIsActive_bl) {
					var s = FWDUVPUtils.getViewportMouseCoordinates(t);
					i.isDragging_bl = !0, i.yPositionOnPress = i.scrHandler_do.y, i.lastPresedY = s.screenY, FWDAnimation.killTweensOf(i.scrHandler_do), o.parent.showDisable(), e.addEventListener ? (e.addEventListener("mousemove", i.scrollBarHandlerMoveHandler), e.addEventListener("mouseup", i.scrollBarHandlerEndHandler)) : document.attachEvent && (document.attachEvent("onmousemove", i.scrollBarHandlerMoveHandler), document.attachEvent("onmouseup", i.scrollBarHandlerEndHandler))
				}
			}, this.scrollBarHandlerMoveHandler = function (e) {
				e.preventDefault && e.preventDefault();
				var t = FWDUVPUtils.getViewportMouseCoordinates(e),
					o = i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLines_do.h) / 2);
				i.scrollBarHandlerFinalY = Math.round(i.yPositionOnPress + t.screenY - i.lastPresedY), i.scrollBarHandlerFinalY >= i.scrTrack_do.h - i.scrHandler_do.h ? i.scrollBarHandlerFinalY = i.scrTrack_do.h - i.scrHandler_do.h : i.scrollBarHandlerFinalY <= 0 && (i.scrollBarHandlerFinalY = 0), i.scrHandler_do.setY(i.scrollBarHandlerFinalY), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.to(i.scrHandlerLines_do, .8, {
					y: o,
					ease: Quart.easeOut
				}), i.updateScrollBarHandlerAndContent(!0)
			}, i.scrollBarHandlerEndHandler = function (t) {
				var s = FWDUVPUtils.getViewportMouseCoordinates(t);
				i.isDragging_bl = !1, FWDUVPUtils.hitTest(i.scrHandler_do.screen, s.screenX, s.screenY) || (FWDAnimation.killTweensOf(i.scrHandlerLinesN_do), FWDAnimation.killTweensOf(i.scrHandlerLinesS_do), FWDAnimation.to(i.scrHandlerLinesN_do, .8, {
					alpha: 1,
					ease: Expo.easeOut
				}), FWDAnimation.to(i.scrHandlerLinesS_do, .8, {
					alpha: 0,
					ease: Expo.easeOut
				})), o.parent.hideDisable(), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.to(i.scrHandler_do, .4, {
					y: i.scrollBarHandlerFinalY,
					ease: Quart.easeOut
				}), e.removeEventListener ? (e.removeEventListener("mousemove", i.scrollBarHandlerMoveHandler), e.removeEventListener("mouseup", i.scrollBarHandlerEndHandler)) : document.detachEvent && (document.detachEvent("onmousemove", i.scrollBarHandlerMoveHandler), document.detachEvent("onmouseup", i.scrollBarHandlerEndHandler))
			}, this.updateScrollBarSizeActiveAndDeactivate = function () {
				i.disableForAWhileAfterThumbClick_bl || (i.allowToScrollAndScrollBarIsActive_bl ? (i.allowToScrollAndScrollBarIsActive_bl = !0, i.scrMainHolder_do.setX(i.stageWidth - i.scrMainHolder_do.w), i.scrMainHolder_do.setHeight(i.mainButtonsHolder_do.h), i.scrTrack_do.setHeight(i.scrMainHolder_do.h), i.scrTrackMiddle_do.setHeight(i.scrTrack_do.h - 2 * i.scrTrackTop_do.h), i.scrTrackBottom_do.setY(i.scrTrackMiddle_do.y + i.scrTrackMiddle_do.h), i.scrMainHolder_do.setAlpha(1), i.scrHandler_do.setButtonMode(!0), i.scrHandlerLines_do.setButtonMode(!0)) : (i.allowToScrollAndScrollBarIsActive_bl = !1, i.scrMainHolder_do.setX(i.stageWidth - i.scrMainHolder_do.w), i.scrMainHolder_do.setHeight(i.mainButtonsHolder_do.h), i.scrTrack_do.setHeight(i.scrMainHolder_do.h), i.scrTrackMiddle_do.setHeight(i.scrTrack_do.h - 2 * i.scrTrackTop_do.h), i.scrTrackBottom_do.setY(i.scrTrackMiddle_do.y + i.scrTrackMiddle_do.h), i.scrMainHolder_do.setAlpha(.5), i.scrHandler_do.setY(0), i.scrHandler_do.setButtonMode(!1), i.scrHandlerLines_do.setButtonMode(!1)), i.scrHandler_do.setHeight(Math.max(120, Math.round(Math.min(1, i.scrMainHolder_do.h / i.totalButtonsHeight) * i.scrMainHolder_do.h))), i.scrHandlerMiddle_do.setHeight(i.scrHandler_do.h - 2 * i.scrHandlerTop_do.h), i.scrHandlerBottom_do.setY(i.scrHandlerMiddle_do.y + i.scrHandlerMiddle_do.h), FWDAnimation.killTweensOf(i.scrHandlerLines_do), i.scrHandlerLines_do.setY(i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLines_do.h) / 2)), i.scrHandlerBottom_do.setY(i.scrHandler_do.h - i.scrHandlerBottom_do.h))
			}, this.addMouseWheelSupport = function () {
				i.screen.addEventListener ? (i.screen.addEventListener("DOMMouseScroll", i.mouseWheelHandler), i.screen.addEventListener("mousewheel", i.mouseWheelHandler)) : i.screen.attachEvent && i.screen.attachEvent("onmousewheel", i.mouseWheelHandler)
			}, i.mouseWheelHandler = function (e) {
				if (e.preventDefault && e.preventDefault(), i.disableMouseWheel_bl || i.isDragging_bl) return !1;
				var t = e.detail || e.wheelDelta;
				e.wheelDelta && (t *= -1), t > 0 ? i.scrollBarHandlerFinalY += Math.round(160 * i.scollbarSpeedSensitivity * (i.mainButtonsHolder_do.h / i.totalButtonsHeight)) : t < 0 && (i.scrollBarHandlerFinalY -= Math.round(160 * i.scollbarSpeedSensitivity * (i.mainButtonsHolder_do.h / i.totalButtonsHeight))), i.scrollBarHandlerFinalY >= i.scrTrack_do.h - i.scrHandler_do.h ? i.scrollBarHandlerFinalY = i.scrTrack_do.h - i.scrHandler_do.h : i.scrollBarHandlerFinalY <= 0 && (i.scrollBarHandlerFinalY = 0);
				var o = i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLines_do.h) / 2);
				if (FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.killTweensOf(i.scrHandlerLines_do), FWDAnimation.to(i.scrHandlerLines_do, .8, {
						y: o,
						ease: Quart.easeOut
					}), FWDAnimation.to(i.scrHandler_do, .5, {
						y: i.scrollBarHandlerFinalY,
						ease: Quart.easeOut
					}), i.isDragging_bl = !0, i.updateScrollBarHandlerAndContent(!0), i.isDragging_bl = !1, !e.preventDefault) return !1;
				e.preventDefault()
			}, this.updateScrollBarHandlerAndContent = function (e, t) {
				if (!i.disableForAWhileAfterThumbClick_bl && (i.allowToScrollAndScrollBarIsActive_bl || t)) {
					var o = 0;
					i.isDragging_bl && !i.isMobile_bl ? ("Infinity" == (o = i.scrollBarHandlerFinalY / (i.scrMainHolder_do.h - i.scrHandler_do.h)) ? o = 0 : o >= 1 && (scrollPercent = 1), i.thumbnailsFinalY = -1 * Math.round(o * (i.totalButtonsHeight - i.mainButtonsHolder_do.h))) : (o = i.curId / (i.totalButtons - 1), i.thumbnailsFinalY = Math.min(0, -1 * Math.round(o * (i.totalButtonsHeight - i.mainButtonsHolder_do.h))), i.scrMainHolder_do && (i.scrollBarHandlerFinalY = Math.round((i.scrMainHolder_do.h - i.scrHandler_do.h) * o), i.scrollBarHandlerFinalY < 0 ? i.scrollBarHandlerFinalY = 0 : i.scrollBarHandlerFinalY > i.scrMainHolder_do.h - i.scrHandler_do.h - 1 && (i.scrollBarHandlerFinalY = i.scrMainHolder_do.h - i.scrHandler_do.h - 1), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.killTweensOf(i.scrHandlerLines_do), e ? (FWDAnimation.to(i.scrHandler_do, .4, {
						y: i.scrollBarHandlerFinalY,
						ease: Quart.easeOut
					}), FWDAnimation.to(i.scrHandlerLines_do, .8, {
						y: i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLinesN_do.h) / 2),
						ease: Quart.easeOut
					})) : (i.scrHandler_do.setY(i.scrollBarHandlerFinalY), i.scrHandlerLines_do.setY(i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLinesN_do.h) / 2))))), i.lastThumbnailFinalY != i.thumbnailsFinalY && (FWDAnimation.killTweensOf(i.buttonsHolder_do), e ? FWDAnimation.to(i.buttonsHolder_do, .5, {
						y: i.thumbnailsFinalY,
						ease: Quart.easeOut
					}) : i.buttonsHolder_do.setY(i.thumbnailsFinalY)), i.lastThumbnailFinalY = i.thumbnailsFinalY
				}
			}, this.init()
		};
		t.setPrototype = function () {
			t.prototype = new FWDUVPDisplayObject("div")
		}, t.OPEN = "open", t.HIDE_COMPLETE = "infoWindowHideComplete", t.BUTTON_PRESSED = "buttonPressed", t.prototype = null, e.FWDUVPComboBox = t
	}(window), function () {
		var e = function (t, o, s, i, l, n, r, a) {
			var d = this;
			e.prototype;
			this.bk_sdo = null, this.text_sdo = null, this.dumy_sdo = null, this.label1_str = o, this.backgroundNormalColor_str = s, this.backgroundSelectedColor_str = i, this.textNormalColor_str = l, this.textSelectedColor_str = n, this.totalWidth = 400, this.totalHeight = a, this.id = r, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.isMobile_bl = FWDUVPUtils.isMobile, this.isDisabled_bl = !1, d.init = function () {
				d.setBackfaceVisibility(), d.setButtonMode(!0), d.setupMainContainers(), d.setWidth(d.totalWidth), d.setHeight(d.totalHeight), d.setNormalState()
			}, d.setupMainContainers = function () {
				d.bk_sdo = new FWDUVPDisplayObject("div"), d.bk_sdo.setBkColor(d.backgroundNormalColor_str), d.addChild(d.bk_sdo), d.text_sdo = new FWDUVPDisplayObject("div"), d.text_sdo.getStyle().whiteSpace = "nowrap", d.text_sdo.setBackfaceVisibility(), d.text_sdo.setOverflow("visible"), d.text_sdo.setDisplay("inline-block"), d.text_sdo.getStyle().fontFamily = "Arial", d.text_sdo.getStyle().fontSize = "13px", d.text_sdo.getStyle().padding = "6px", d.text_sdo.getStyle().fontWeight = "100", d.text_sdo.getStyle().color = d.normalColor_str, d.text_sdo.getStyle().fontSmoothing = "antialiased", d.text_sdo.getStyle().webkitFontSmoothing = "antialiased", d.text_sdo.getStyle().textRendering = "optimizeLegibility", FWDUVPUtils.isIEAndLessThen9 ? d.text_sdo.screen.innerText = d.label1_str : d.text_sdo.setInnerHTML(d.label1_str), d.addChild(d.text_sdo), d.dumy_sdo = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIE && (d.dumy_sdo.setBkColor("#FF0000"), d.dumy_sdo.setAlpha(0)), d.addChild(d.dumy_sdo), d.hasPointerEvent_bl ? (d.screen.addEventListener("pointerup", d.onClick), d.screen.addEventListener("pointerover", d.onMouseOver), d.screen.addEventListener("pointerout", d.onMouseOut)) : d.screen.addEventListener && (d.isMobile_bl || (d.screen.addEventListener("mouseover", d.onMouseOver), d.screen.addEventListener("mouseout", d.onMouseOut), d.screen.addEventListener("mouseup", d.onClick)), d.screen.addEventListener("touchend", d.onClick))
			}, d.onMouseOver = function (t) {
				d.isDisabled_bl || t.pointerType && t.pointerType != t.MSPOINTER_TYPE_MOUSE || (FWDAnimation.killTweensOf(d.text_sdo), d.setSelectedState(!0), d.dispatchEvent(e.MOUSE_OVER))
			}, d.onMouseOut = function (t) {
				d.isDisabled_bl || t.pointerType && t.pointerType != t.MSPOINTER_TYPE_MOUSE || (FWDAnimation.killTweensOf(d.text_sdo), d.setNormalState(!0), d.dispatchEvent(e.MOUSE_OUT))
			}, d.onClick = function (o) {
				d.isDisabled_bl || t.isScrollingOnMove_bl || (o.preventDefault && o.preventDefault(), d.dispatchEvent(e.CLICK))
			}, d.onMouseDown = function (o) {
				d.isDisabled_bl || t.isScrollingOnMove_bl || (o.preventDefault && o.preventDefault(), d.dispatchEvent(e.MOUSE_DOWN, {
					e: o
				}))
			}, this.setSelectedState = function (e) {
				e ? (FWDAnimation.to(d.bk_sdo.screen, .6, {
					css: {
						backgroundColor: d.backgroundSelectedColor_str
					},
					ease: Quart.easeOut
				}), FWDAnimation.to(d.text_sdo.screen, .6, {
					css: {
						color: d.textSelectedColor_str
					},
					ease: Quart.easeOut
				})) : (d.bk_sdo.setBkColor(d.backgroundSelectedColor_str), d.text_sdo.getStyle().color = d.textSelectedColor_str)
			}, this.setNormalState = function (e) {
				e ? (FWDAnimation.to(d.bk_sdo.screen, .6, {
					css: {
						backgroundColor: d.backgroundNormalColor_str
					},
					ease: Quart.easeOut
				}), FWDAnimation.to(d.text_sdo.screen, .6, {
					css: {
						color: d.textNormalColor_str
					},
					ease: Quart.easeOut
				})) : (d.bk_sdo.setBkColor(d.backgroundNormalColor_str), d.text_sdo.getStyle().color = d.textNormalColor_str)
			}, d.centerText = function () {
				d.dumy_sdo.setWidth(d.totalWidth), d.dumy_sdo.setHeight(d.totalHeight), d.bk_sdo.setWidth(d.totalWidth), d.bk_sdo.setHeight(d.totalHeight), d.text_sdo.setX(4), d.text_sdo.setY(Math.round((d.totalHeight - d.text_sdo.getHeight()) / 2))
			}, d.getMaxTextWidth = function () {
				return d.text_sdo.getWidth()
			}, this.disable = function () {
				d.isDisabled_bl = !0, d.setButtonMode(!1), d.setSelectedState(!0)
			}, this.enable = function () {
				d.isDisabled_bl = !1, d.setNormalState(!0), d.setButtonMode(!0)
			}, d.init()
		};
		e.setPrototype = function () {
			e.prototype = new FWDUVPDisplayObject("div")
		}, e.FIRST_BUTTON_CLICK = "onFirstClick", e.SECOND_BUTTON_CLICK = "secondButtonOnClick", e.MOUSE_OVER = "onMouseOver", e.MOUSE_OUT = "onMouseOut", e.MOUSE_DOWN = "onMouseDown", e.CLICK = "onClick", e.prototype = null, window.FWDUVPComboBoxButton = e
	}(window), function () {
		var e = function (t, o, s, i, l, n, r, a, d, u, h, _, c) {
			var f = this,
				p = e.prototype;
			this.arrow_do = null, this.arrowN_sdo = null, this.arrowS_sdo = null, this.arrowN_str = s, this.arrowS_str = i, this.label1_str = l, this.backgroundNormalColor_str = n, this.backgroundSelectedColor_str = r, this.textNormalColor_str = a, this.textSelectedColor_str = d, f.useHEXColorsForSkin_bl = h, f.normalButtonsColor_str = _, f.selectedButtonsColor_str = c, this.totalWidth = 400, this.totalHeight = u, this.arrowWidth = t, this.arrowHeight = o, this.bk_sdo = null, this.text_sdo = null, this.dumy_sdo = null, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.isMobile_bl = FWDUVPUtils.isMobile, this.isDisabled_bl = !1, f.init = function () {
				f.setBackfaceVisibility(), f.setButtonMode(!0), f.setupMainContainers(), f.setWidth(f.totalWidth), f.setHeight(f.totalHeight)
			}, f.setupMainContainers = function () {
				f.bk_sdo = new FWDUVPDisplayObject("div"), f.bk_sdo.getStyle().backgroundColor = f.backgroundNormalColor_str, f.addChild(f.bk_sdo), f.text_sdo = new FWDUVPDisplayObject("div"), f.text_sdo.getStyle().whiteSpace = "nowrap", f.text_sdo.setBackfaceVisibility(), f.text_sdo.setOverflow("visible"), f.text_sdo.setDisplay("inline-block"), f.text_sdo.getStyle().fontFamily = "Arial", f.text_sdo.getStyle().fontSize = "13px", f.text_sdo.getStyle().fontWeight = "100", f.text_sdo.getStyle().padding = "6px", f.text_sdo.getStyle().color = f.normalColor_str, f.text_sdo.getStyle().fontSmoothing = "antialiased", f.text_sdo.getStyle().webkitFontSmoothing = "antialiased", f.text_sdo.getStyle().textRendering = "optimizeLegibility", FWDUVPUtils.isIEAndLessThen9 ? f.text_sdo.screen.innerText = f.label1_str : f.text_sdo.setInnerHTML(f.label1_str), f.addChild(f.text_sdo), f.arrow_do = new FWDUVPDisplayObject("div"), f.arrow_do.setOverflow("visible"), f.useHEXColorsForSkin_bl ? (f.arrowN_img = new Image, f.arrowN_img.src = f.arrowN_str, f.arrowS_img = new Image, f.arrowS_img.src = f.arrowS_str, f.arrowN_sdo = new FWDUVPDisplayObject("div"), f.arrowS_sdo = new FWDUVPDisplayObject("div"), f.arrowN_img.onload = function () {
					f.arrowN_sdo.setWidth(f.arrowN_img.width), f.arrowN_sdo.setHeight(f.arrowN_img.height), f.scrubberLines_n_canvas = FWDUVPUtils.getCanvasWithModifiedColor(f.arrowN_img, f.normalButtonsColor_str, !0), f.scrubbelinesNImage_img = f.scrubberLines_n_canvas.image, f.arrowN_sdo.getStyle().background = "url('" + f.scrubbelinesNImage_img.src + "') repeat-y", f.arrowS_sdo.setWidth(f.arrowS_img.width), f.arrowS_sdo.setHeight(f.arrowS_img.height), f.scrubberLines_s_canvas = FWDUVPUtils.getCanvasWithModifiedColor(f.arrowS_img, f.selectedButtonsColor_str, !0), f.scrubbelinesSImage_img = f.scrubberLines_s_canvas.image, f.arrowS_sdo.getStyle().background = "url('" + f.scrubbelinesSImage_img.src + "') repeat-y"
				}) : (f.arrowN_sdo = new FWDUVPDisplayObject("div"), f.arrowN_sdo.screen.style.backgroundImage = "url(" + f.arrowN_str + ")", f.arrowS_sdo = new FWDUVPDisplayObject("div"), f.arrowS_sdo.screen.style.backgroundImage = "url(" + f.arrowS_str + ")"), f.arrowS_sdo.setAlpha(0), f.arrow_do.addChild(f.arrowN_sdo), f.arrow_do.addChild(f.arrowS_sdo), f.addChild(f.arrow_do), f.arrowN_sdo.setWidth(f.arrowWidth), f.arrowN_sdo.setHeight(f.arrowHeight), f.arrowS_sdo.setWidth(f.arrowWidth), f.arrowS_sdo.setHeight(f.arrowHeight), f.dumy_sdo = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIE && (f.dumy_sdo.setBkColor("#FF0000"), f.dumy_sdo.setAlpha(0)), f.addChild(f.dumy_sdo), f.hasPointerEvent_bl ? (f.screen.addEventListener("pointerup", f.onClick), f.screen.addEventListener("pointerover", f.onMouseOver), f.screen.addEventListener("pointerout", f.onMouseOut)) : f.screen.addEventListener && (f.screen.addEventListener("mouseover", f.onMouseOver), f.screen.addEventListener("mouseout", f.onMouseOut), f.screen.addEventListener("mouseup", f.onClick), f.screen.addEventListener("touchend", f.onClick))
			}, f.onMouseOver = function (t) {
				f.isDisabled_bl || t.pointerType && t.pointerType != t.MSPOINTER_TYPE_MOUSE || (FWDAnimation.killTweensOf(f.text_sdo), f.setSelectedState(!0, 0), f.dispatchEvent(e.MOUSE_OVER))
			}, f.onMouseOut = function (t) {
				f.isDisabled_bl || t.pointerType && t.pointerType != t.MSPOINTER_TYPE_MOUSE || (FWDAnimation.killTweensOf(f.text_sdo), f.setNormalState(!0, !0), f.dispatchEvent(e.MOUSE_OUT))
			}, f.onClick = function (t) {
				f.isDeveleper_bl ? window.open("http://www.webdesign-flash.ro", "_blank") : (t.preventDefault && t.preventDefault(), f.dispatchEvent(e.CLICK, {
					e: t
				}))
			}, f.onMouseDown = function (t) {
				t.preventDefault && t.preventDefault(), f.dispatchEvent(e.MOUSE_DOWN, {
					e: t
				})
			}, this.setSelectedState = function (e, t) {
				e ? (FWDAnimation.to(f.bk_sdo, .6, {
					alpha: 1,
					ease: Expo.easeOut
				}), FWDAnimation.to(f.text_sdo.screen, .6, {
					css: {
						color: f.textSelectedColor_str
					},
					ease: Expo.easeOut
				}), FWDAnimation.to(f.arrowS_sdo, .6, {
					alpha: 1,
					ease: Expo.easeOut
				})) : (f.bk_sdo.setAlpha(1), f.text_sdo.getStyle().color = f.textSelectedColor_str, f.arrowS_sdo.alpha = 1)
			}, this.setNormalState = function (e, t) {
				var o = .6;
				t && (o = 0), o = 0, e ? (FWDAnimation.to(f.bk_sdo, .6, {
					alpha: 0,
					delay: o,
					ease: Expo.easeOut
				}), FWDAnimation.to(f.text_sdo.screen, .6, {
					css: {
						color: f.textNormalColor_str
					},
					delay: o,
					ease: Expo.easeOut
				}), FWDAnimation.to(f.arrowS_sdo, .6, {
					alpha: 0,
					delay: o,
					ease: Expo.easeOut
				})) : (f.bk_sdo.setAlpha(0), f.text_sdo.getStyle().color = f.textNormalColor_str, f.arrowS_sdo.alpha = 0)
			}, f.centerText = function () {
				f.dumy_sdo.setWidth(f.totalWidth), f.dumy_sdo.setHeight(f.totalHeight), f.bk_sdo.setWidth(f.totalWidth), f.bk_sdo.setHeight(f.totalHeight), f.text_sdo.setX(2), f.text_sdo.setY(Math.round((f.totalHeight - f.text_sdo.getHeight()) / 2)), f.arrow_do.setX(f.totalWidth - f.arrowWidth - 8), f.arrow_do.setY(Math.round((f.totalHeight - f.arrowHeight) / 2))
			}, f.getMaxTextWidth = function () {
				return f.text_sdo.getWidth()
			}, this.disable = function () {
				f.isDisabled_bl = !0, f.setSelectedState(!0), FWDUVPUtils.hasTransform2d && (FWDAnimation.to(f.arrowN_sdo.screen, .8, {
					css: {
						rotation: 180
					},
					ease: Quart.easeOut
				}), FWDAnimation.to(f.arrowS_sdo.screen, .8, {
					css: {
						rotation: 180
					},
					ease: Quart.easeOut
				})), f.setButtonMode(!1)
			}, this.enable = function () {
				f.isDisabled_bl = !1, f.setNormalState(!0), FWDUVPUtils.hasTransform2d && (FWDAnimation.to(f.arrowN_sdo.screen, .8, {
					css: {
						rotation: 0
					},
					ease: Quart.easeOut
				}), FWDAnimation.to(f.arrowS_sdo.screen, .8, {
					css: {
						rotation: 0
					},
					ease: Quart.easeOut
				})), f.setButtonMode(!0)
			}, this.setText = function (e) {
				FWDUVPUtils.isIEAndLessThen9 ? f.text_sdo.screen.innerText = e : f.text_sdo.setInnerHTML(e)
			}, f.destroy = function () {
				f.isMobile_bl ? f.screen.removeEventListener("touchstart", f.onMouseDown) : f.screen.removeEventListener ? (f.screen.removeEventListener("mouseover", f.onMouseOver), f.screen.removeEventListener("mouseout", f.onMouseOut), f.screen.removeEventListener("mousedown", f.onMouseDown), f.screen.removeEventListener("click", f.onClick)) : f.screen.detachEvent && (f.screen.detachEvent("onmouseover", f.onMouseOver), f.screen.detachEvent("onmouseout", f.onMouseOut), f.screen.detachEvent("onmousedown", f.onMouseDown), f.screen.detachEvent("onclick", f.onClick)), FWDAnimation.killTweensOf(f.text_sdo), FWDAnimation.killTweensOf(f.colorObj), f.text_sdo.destroy(), f.dumy_sdo.destroy(), f.text_sdo = null, f.dumy_sdo = null, f.label1_str = null, f.normalColor_str = null, f.textSelectedColor_str = null, f.disabledColor_str = null, l = null, normalColor = null, selectedColor = null, disabledColor = null, f.setInnerHTML(""), p.destroy(), f = null, p = null, e.prototype = null
			}, f.init()
		};
		e.setPrototype = function () {
			e.prototype = new FWDUVPDisplayObject("div")
		}, e.FIRST_BUTTON_CLICK = "onFirstClick", e.SECOND_BUTTON_CLICK = "secondButtonOnClick", e.MOUSE_OVER = "onMouseOver", e.MOUSE_OUT = "onMouseOut", e.MOUSE_DOWN = "onMouseDown", e.CLICK = "onClick", e.prototype = null, window.FWDUVPComboBoxSelector = e
	}(window), function () {
		var e = function (t, o, s, i, l, n, r, a) {
			var d = this;
			e.prototype;
			this.n1Img = t, this.s1Path_str = o, this.n2Img = s, this.s2Path_str = i, this.firstButton_do, this.n1_do, this.s1_do, this.secondButton_do, this.n2_do, this.s2_do, this.buttonWidth = d.n1Img.width, this.buttonHeight = d.n1Img.height, this.useHEXColorsForSkin_bl = n, this.normalButtonsColor_str = r, this.selectedButtonsColor_str = a, this.isSelectedState_bl = !1, this.currentState = 1, this.isDisabled_bl = !1, this.isMaximized_bl = !1, this.disptachMainEvent_bl = l, this.isDisabled_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.allowToCreateSecondButton_bl = !d.isMobile_bl || d.hasPointerEvent_bl, d.init = function () {
				d.hasTransform2d_bl = !1, d.setButtonMode(!0), d.setWidth(d.buttonWidth), d.setHeight(d.buttonHeight), d.setupMainContainers(), d.secondButton_do.setVisible(!1)
			}, d.setupMainContainers = function () {
				d.firstButton_do = new FWDUVPDisplayObject("div"), d.firstButton_do.setWidth(d.buttonWidth), d.firstButton_do.setHeight(d.buttonHeight), d.useHEXColorsForSkin_bl ? (d.n1_do = new FWDUVPDisplayObject("div"), d.n1_do.setWidth(d.buttonWidth), d.n1_do.setHeight(d.buttonHeight), d.n1_sdo_canvas = FWDUVPUtils.getCanvasWithModifiedColor(d.n1Img, d.normalButtonsColor_str).canvas, d.n1_do.screen.appendChild(d.n1_sdo_canvas)) : (d.n1_do = new FWDUVPDisplayObject("img"), d.n1_do.setScreen(d.n1Img)), d.firstButton_do.addChild(d.n1_do), d.allowToCreateSecondButton_bl && (d.s1_img = new Image, d.s1_img.src = d.s1Path_str, d.useHEXColorsForSkin_bl ? (d.s1_do = new FWDUVPTransformDisplayObject("div"), d.s1_do.setWidth(d.buttonWidth), d.s1_do.setHeight(d.buttonHeight), d.s1_img.onload = function () {
					d.s1_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(d.s1_img, d.selectedButtonsColor_str).canvas, d.s1_do.screen.appendChild(d.s1_do_canvas)
				}, d.s1_do.setAlpha(0)) : (d.s1_do = new FWDUVPDisplayObject("img"), d.s1_do.setScreen(d.s1_img), d.s1_do.setWidth(d.buttonWidth), d.s1_do.setHeight(d.buttonHeight), d.s1_do.setAlpha(0)), d.firstButton_do.addChild(d.s1_do)), d.secondButton_do = new FWDUVPDisplayObject("div"), d.secondButton_do.setWidth(d.buttonWidth), d.secondButton_do.setHeight(d.buttonHeight), d.useHEXColorsForSkin_bl ? (d.n2_do = new FWDUVPDisplayObject("div"), d.n2_do.setWidth(d.buttonWidth), d.n2_do.setHeight(d.buttonHeight), d.n2_sdo_canvas = FWDUVPUtils.getCanvasWithModifiedColor(d.n2Img, d.normalButtonsColor_str).canvas, d.n2_do.screen.appendChild(d.n2_sdo_canvas)) : (d.n2_do = new FWDUVPDisplayObject("img"), d.n2_do.setScreen(d.n2Img)), d.secondButton_do.addChild(d.n2_do), d.allowToCreateSecondButton_bl && (d.s2_img = new Image, d.s2_img.src = d.s2Path_str, d.useHEXColorsForSkin_bl ? (d.s2_do = new FWDUVPTransformDisplayObject("div"), d.s2_do.setWidth(d.buttonWidth), d.s2_do.setHeight(d.buttonHeight), d.s2_img.onload = function () {
					d.s2_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(d.s2_img, d.selectedButtonsColor_str).canvas, d.s2_do.screen.appendChild(d.s2_do_canvas)
				}, d.s2_do.setAlpha(0)) : (d.s2_do = new FWDUVPDisplayObject("img"), d.s2_do.setScreen(d.s2_img), d.s2_do.setWidth(d.buttonWidth), d.s2_do.setHeight(d.buttonHeight), d.s2_do.setAlpha(0)), d.secondButton_do.addChild(d.s2_do)), d.addChild(d.secondButton_do), d.addChild(d.firstButton_do), d.hasPointerEvent_bl ? (d.screen.addEventListener("pointerup", d.onMouseUp), d.screen.addEventListener("pointerover", d.onMouseOver), d.screen.addEventListener("pointerout", d.onMouseOut)) : d.screen.addEventListener && (d.isMobile_bl || (d.screen.addEventListener("mouseover", d.onMouseOver), d.screen.addEventListener("mouseout", d.onMouseOut), d.screen.addEventListener("mouseup", d.onMouseUp)), d.screen.addEventListener("toustart", d.onDown), d.screen.addEventListener("touchend", d.onMouseUp))
			}, d.onMouseOver = function (t, o) {
				d.isDisabled_bl || d.isSelectedState_bl || t.pointerType && t.pointerType != t.MSPOINTER_TYPE_MOUSE && "mouse" != t.pointerType || (d.dispatchEvent(e.MOUSE_OVER, {
					e: t
				}), d.dispatchEvent(e.SHOW_TOOLTIP, {
					e: t
				}), d.setSelectedState(!0))
			}, d.onMouseOut = function (t) {
				!d.isDisabled_bl && d.isSelectedState_bl && (t.pointerType && t.pointerType != t.MSPOINTER_TYPE_MOUSE && "mouse" != t.pointerType || (d.setNormalState(), d.dispatchEvent(e.MOUSE_OUT)))
			}, d.onDown = function (e) {
				e.preventDefault && e.preventDefault()
			}, d.onMouseUp = function (t) {
				d.isDisabled_bl || 2 == t.button || (t.preventDefault && t.preventDefault(), d.disptachMainEvent_bl && d.dispatchEvent(e.MOUSE_UP, {
					e: t
				}))
			}, d.toggleButton = function () {
				1 == d.currentState ? (d.firstButton_do.setVisible(!1), d.secondButton_do.setVisible(!0), d.currentState = 0, d.dispatchEvent(e.FIRST_BUTTON_CLICK)) : (d.firstButton_do.setVisible(!0), d.secondButton_do.setVisible(!1), d.currentState = 1, d.dispatchEvent(e.SECOND_BUTTON_CLICK))
			}, d.setButtonState = function (e) {
				1 == e ? (d.firstButton_do.setVisible(!0), d.secondButton_do.setVisible(!1), d.currentState = 1) : (d.firstButton_do.setVisible(!1), d.secondButton_do.setVisible(!0), d.currentState = 0)
			}, this.setNormalState = function () {
				d.isMobile_bl && !d.hasPointerEvent_bl || (d.isSelectedState_bl = !1, FWDAnimation.killTweensOf(d.s1_do), FWDAnimation.killTweensOf(d.s2_do), FWDAnimation.to(d.s1_do, .5, {
					alpha: 0,
					ease: Expo.easeOut
				}), FWDAnimation.to(d.s2_do, .5, {
					alpha: 0,
					ease: Expo.easeOut
				}))
			}, this.setSelectedState = function (e) {
				d.isSelectedState_bl = !0, FWDAnimation.killTweensOf(d.s1_do), FWDAnimation.killTweensOf(d.s2_do), FWDAnimation.to(d.s1_do, .5, {
					alpha: 1,
					delay: .1,
					ease: Expo.easeOut
				}), FWDAnimation.to(d.s2_do, .5, {
					alpha: 1,
					delay: .1,
					ease: Expo.easeOut
				})
			}, this.disable = function () {
				d.isDisabled_bl || (d.isDisabled_bl = !0, d.setButtonMode(!1), FWDAnimation.killTweensOf(d), FWDAnimation.to(d, .6, {
					alpha: .4
				}), d.setNormalState())
			}, this.enable = function () {
				d.isDisabled_bl && (d.isDisabled_bl = !1, d.setButtonMode(!0), FWDAnimation.killTweensOf(d), FWDAnimation.to(d, .6, {
					alpha: 1
				}))
			}, this.updateHEXColors = function (e, t) {
				FWDUVPUtils.changeCanvasHEXColor(d.n1Img, d.n1_sdo_canvas, e), FWDUVPUtils.changeCanvasHEXColor(d.s1_img, d.s1_do_canvas, t), FWDUVPUtils.changeCanvasHEXColor(d.n2Img, d.n2_sdo_canvas, e), FWDUVPUtils.changeCanvasHEXColor(d.s2_img, d.s2_do_canvas, t)
			}, d.init()
		};
		e.setPrototype = function () {
			e.prototype = new FWDUVPDisplayObject("div")
		}, e.FIRST_BUTTON_CLICK = "onFirstClick", e.SECOND_BUTTON_CLICK = "secondButtonOnClick", e.MOUSE_OVER = "onMouseOver", e.MOUSE_OUT = "onMouseOut", e.MOUSE_UP = "onMouseUp", e.CLICK = "onClick", e.SHOW_TOOLTIP = "showToolTip", e.prototype = null, window.FWDUVPComplexButton = e
	}(window), function () {
		var e = function (e, t) {
			var o = this;
			this.parent = e, this.url = "http://www.webdesign-flash.ro", this.menu_do = null, this.normalMenu_do = null, this.selectedMenu_do = null, this.over_do = null, this.isDisabled_bl = !1, this.showMenu_bl = t, this.init = function () {
				o.updateParent(o.parent)
			}, this.updateParent = function (e) {
				o.parent && (o.parent.screen.addEventListener ? o.parent.screen.removeEventListener("contextmenu", this.contextMenuHandler) : o.parent.screen.detachEvent("oncontextmenu", this.contextMenuHandler)), o.parent = e, o.parent.screen.addEventListener ? o.parent.screen.addEventListener("contextmenu", this.contextMenuHandler) : o.parent.screen.attachEvent("oncontextmenu", this.contextMenuHandler)
			}, this.contextMenuHandler = function (e) {
				if (!o.isDisabled_bl) {
					if ("disabled" == t) return !!e.preventDefault && void e.preventDefault();
					if ("default" != t && -1 != o.url.indexOf("sh.r")) {
						if (o.setupMenus(), o.parent.addChild(o.menu_do), o.menu_do.setVisible(!0), o.positionButtons(e), window.addEventListener ? window.addEventListener("mousedown", o.contextMenuWindowOnMouseDownHandler) : document.documentElement.attachEvent("onclick", o.contextMenuWindowOnMouseDownHandler), !e.preventDefault) return !1;
						e.preventDefault()
					}
				}
			}, this.contextMenuWindowOnMouseDownHandler = function (e) {
				var t = FWDUVPUtils.getViewportMouseCoordinates(e),
					s = t.screenX,
					i = t.screenY;
				FWDUVPUtils.hitTest(o.menu_do.screen, s, i) || (window.removeEventListener ? window.removeEventListener("mousedown", o.contextMenuWindowOnMouseDownHandler) : document.documentElement.detachEvent("onclick", o.contextMenuWindowOnMouseDownHandler), o.menu_do.setX(-500))
			}, this.setupMenus = function () {
				this.menu_do || (this.menu_do = new FWDUVPDisplayObject("div"), o.menu_do.setX(-500), this.menu_do.getStyle().width = "100%", this.normalMenu_do = new FWDUVPDisplayObject("div"), this.normalMenu_do.getStyle().fontFamily = "Arial, Helvetica, sans-serif", this.normalMenu_do.getStyle().padding = "4px", this.normalMenu_do.getStyle().fontSize = "12px", this.normalMenu_do.getStyle().color = "#000000", this.normalMenu_do.setInnerHTML("&#0169; made by FWD"), this.normalMenu_do.setBkColor("#FFFFFF"), this.selectedMenu_do = new FWDUVPDisplayObject("div"), this.selectedMenu_do.getStyle().fontFamily = "Arial, Helvetica, sans-serif", this.selectedMenu_do.getStyle().padding = "4px", this.selectedMenu_do.getStyle().fontSize = "12px", this.selectedMenu_do.getStyle().color = "#FFFFFF", this.selectedMenu_do.setInnerHTML("&#0169; made by FWD"), this.selectedMenu_do.setBkColor("#000000"), this.selectedMenu_do.setAlpha(0), this.over_do = new FWDUVPDisplayObject("div"), this.over_do.setBkColor("#FF0000"), this.over_do.setAlpha(0), this.menu_do.addChild(this.normalMenu_do), this.menu_do.addChild(this.selectedMenu_do), this.menu_do.addChild(this.over_do), this.parent.addChild(this.menu_do), this.over_do.setWidth(this.selectedMenu_do.getWidth()), this.menu_do.setWidth(this.selectedMenu_do.getWidth()), this.over_do.setHeight(this.selectedMenu_do.getHeight()), this.menu_do.setHeight(this.selectedMenu_do.getHeight()), this.menu_do.setVisible(!1), this.menu_do.setButtonMode(!0), this.menu_do.screen.onmouseover = this.mouseOverHandler, this.menu_do.screen.onmouseout = this.mouseOutHandler, this.menu_do.screen.onclick = this.onClickHandler)
			}, this.mouseOverHandler = function () {
				-1 == o.url.indexOf("w.we") && (o.menu_do.visible = !1), FWDAnimation.to(o.normalMenu_do, .8, {
					alpha: 0,
					ease: Expo.easeOut
				}), FWDAnimation.to(o.selectedMenu_do, .8, {
					alpha: 1,
					ease: Expo.easeOut
				})
			}, this.mouseOutHandler = function () {
				FWDAnimation.to(o.normalMenu_do, .8, {
					alpha: 1,
					ease: Expo.easeOut
				}), FWDAnimation.to(o.selectedMenu_do, .8, {
					alpha: 0,
					ease: Expo.easeOut
				})
			}, this.onClickHandler = function () {
				window.open(o.url, "_blank")
			}, this.positionButtons = function (e) {
				var t = FWDUVPUtils.getViewportMouseCoordinates(e),
					s = t.screenX - o.parent.getGlobalX(),
					i = t.screenY - o.parent.getGlobalY(),
					l = s + 2,
					n = i + 2;
				l > o.parent.getWidth() - o.menu_do.getWidth() - 2 && (l = s - o.menu_do.getWidth() - 2), n > o.parent.getHeight() - o.menu_do.getHeight() - 2 && (n = i - o.menu_do.getHeight() - 2), o.menu_do.setX(l), o.menu_do.setY(n)
			}, this.disable = function () {
				o.isDisabled_bl = !0
			}, this.enable = function () {
				o.isDisabled_bl = !1
			}, this.init()
		};
		e.prototype = null, window.FWDUVPContextMenu = e
	}(window), function () {
		var e = function (t, o) {
			var s = this;
			e.prototype;
			this.bkLeft_img = t.bkLeft_img, this.bkRight_img = t.bkRight_img, this.playN_img = t.playN_img, this.pauseN_img = t.pauseN_img, this.mainScrubberBkLeft_img = t.mainScrubberBkLeft_img, this.mainScrubberDragLeft_img = t.mainScrubberDragLeft_img, this.mainScrubberDragLeftSource = t.mainScrubberDragLeft_img.src, this.mainScrubberLine_img = t.mainScrubberLine_img, this.volumeScrubberBkLeft_img = t.volumeScrubberBkLeft_img, this.volumeScrubberDragBottom_img = t.volumeScrubberDragBottom_img, this.volumeScrubberLine_img = t.volumeScrubberLine_img, this.volumeN_img = t.volumeN_img, this.progressLeft_img = t.progressLeft_img, this.categoriesN_img = t.categoriesN_img, this.playlistN_img = t.playlistN_img, this.ytbQualityN_img = t.ytbQualityN_img, this.infoN_img = t.infoN_img, this.downloadN_img = t.downloadN_img, this.facebookN_img = t.facebookN_img, this.fullScreenN_img = t.fullScreenN_img, this.normalScreenN_img = t.normalScreenN_img, this.hidePlaylistN_img = t.hidePlaylistN_img, this.showPlaylistN_img = t.showPlaylistN_img, this.embedN_img = t.embedN_img, this.buttons_ar = [], this.ytbQuality_ar = null, this.ytbButtons_ar = null, this.prevButton_do = null, this.nextButton_do = null, this.pointer_do, this.ytbDisabledButton_do = null, this.disable_do = null, this.mainHolder_do = null, this.ytbButtonsHolder_do = null, this.playPauseButton_do = null, this.mainScrubber_do = null, this.mainScrubberBkLeft_do = null, this.mainScrubberBkMiddle_do = null, this.mainScrubberBkRight_do = null, this.mainScrubberDrag_do = null, this.mainScrubberDragLeft_do = null, this.mainScrubberDragMiddle_do = null, this.mainScrubberBarLine_do = null, this.mainProgress_do = null, this.progressLeft_do = null, this.progressMiddle_do = null, this.time_do = null, this.volumeButton_do = null, this.volumeScrubber_do = null, this.volumeScrubberBkBottom_do = null, this.volumeScrubberBkMiddle_do = null, this.volumeScrubberBkTop_do = null, this.volumeScrubberDrag_do = null, this.volumeScrubberDragBottom_do = null, this.volumeScrubberDragMiddle_do = null, this.volumeScrubberBarLine_do = null, this.ytbQualityButton_do = null, this.shareButton_do = null, this.fullScreenButton_do = null, this.ytbQualityArrow_do = null, this.bk_do = null, this.playlistButton_do = null, this.embedButton_do = null, this.playPauseToolTip_do = null, this.playlistsButtonToolTip_do = null, this.volumeButtonToolTip_do = null, this.playlistsButtonToolTip_do = null, this.playlistButtonToolTip_do = null, this.embedButtonToolTip_do = null, this.infoButtonToolTip_do = null, this.downloadButtonToolTip_do = null, this.facebookButtonToolTip_do = null, this.fullscreenButtonToolTip_do = null, s.useHEXColorsForSkin_bl = t.useHEXColorsForSkin_bl, s.normalButtonsColor_str = t.normalButtonsColor_str, s.selectedButtonsColor_str = t.selectedButtonsColor_str, this.bkMiddlePath_str = t.bkMiddlePath_str, this.mainScrubberBkMiddlePath_str = t.mainScrubberBkMiddlePath_str, this.volumeScrubberBkMiddlePath_str = t.volumeScrubberBkMiddlePath_str, this.mainScrubberDragMiddlePath_str = t.mainScrubberDragMiddlePath_str, this.volumeScrubberDragMiddlePath_str = t.volumeScrubberDragMiddlePath_str, this.timeColor_str = t.timeColor_str, this.progressMiddlePath_str = t.progressMiddlePath_str, this.youtubeQualityButtonNormalColor_str = t.youtubeQualityButtonNormalColor_str, this.youtubeQualityButtonSelectedColor_str = t.youtubeQualityButtonSelectedColor_str, this.youtubeQualityArrowPath_str = t.youtubeQualityArrowPath_str, this.controllerBkPath_str = t.controllerBkPath_str, this.ytbQualityButtonPointerPath_str = t.ytbQualityButtonPointerPath_str, this.buttonsToolTipFontColor_str = t.buttonsToolTipFontColor_str, this.buttonsToolTipHideDelay = t.buttonsToolTipHideDelay, this.totalYtbButtons = 0, this.stageWidth = 0, this.stageHeight = t.controllerHeight, this.scrubbersBkLeftAndRightWidth = this.mainScrubberBkLeft_img.width, this.mainScrubberWidth = 0, this.mainScrubberMinWidth = 100, this.volumeScrubberOfsetHeight = t.volumeScrubberOfsetHeight, this.volumeScrubberHeight = t.volumeScrubberHeight + s.volumeScrubberOfsetHeight, this.volumeScrubberWidth = s.mainScrubberBkLeft_img.height, this.mainScrubberHeight = this.mainScrubberBkLeft_img.height, this.mainScrubberDragLeftWidth = s.mainScrubberDragLeft_img.width, this.scrubbersOffsetWidth = t.scrubbersOffsetWidth, this.volume = t.volume, this.lastVolume = s.volume, this.startSpaceBetweenButtons = t.startSpaceBetweenButtons, this.spaceBetweenButtons = t.spaceBetweenButtons, this.percentPlayed = 0, this.percentLoaded = 0, this.lastTimeLength = 0, this.prevYtbQualityButtonsLength = 0, this.pointerWidth = 8, this.pointerHeight = 5, this.timeOffsetLeftWidth = t.timeOffsetLeftWidth, this.timeOffsetRightWidth = t.timeOffsetRightWidth, this.timeOffsetTop = t.timeOffsetTop, this.mainScrubberOffestTop = t.mainScrubberOffestTop, this.isVolumeScrubberShowed_bl = !0, this.volumeScrubberIsDragging_bl = !1, this.showButtonsToolTip_bl = t.showButtonsToolTip_bl, this.showPlaylistsButtonAndPlaylists_bl = t.showPlaylistsButtonAndPlaylists_bl, this.showPlaylistButtonAndPlaylist_bl = t.showPlaylistButtonAndPlaylist_bl, this.showEmbedButton_bl = t.showEmbedButton_bl, this.showPlaylistByDefault_bl = t.showPlaylistByDefault_bl, this.showShuffleButton_bl = t.showShuffleButton_bl, this.showLoopButton_bl = t.showLoopButton_bl, this.showNP_bl = o.data.showNextAndPrevButtonsInController_bl, this.showNextAndPrevButtonsInController_bl = t.showNextAndPrevButtonsInController_bl, this.showFullScreenButton_bl = t.showFullScreenButton_bl, this.disableVideoScrubber_bl = t.disableVideoScrubber_bl, this.showYoutubeQualityButton_bl = t.showYoutubeQualityButton_bl, this.showShareButton_bl = t.showShareButton_bl, this.showInfoButton_bl = t.showInfoButton_bl, this.showDownloadVideoButton_bl = t.showDownloadVideoButton_bl, this.showVolumeScrubber_bl = t.showVolumeScrubber_bl, this.allowToChangeVolume_bl = t.allowToChangeVolume_bl, this.showTime_bl = t.showTime_bl, this.showVolumeButton_bl = t.showVolumeButton_bl, this.showControllerWhenVideoIsStopped_bl = t.showControllerWhenVideoIsStopped_bl, this.isMainScrubberScrubbing_bl = !1, this.isMainScrubberDisabled_bl = !1, this.isVolumeScrubberDisabled_bl = !1, this.isMainScrubberLineVisible_bl = !1, this.isVolumeScrubberLineVisible_bl = !1, this.showSubtitleButton_bl = t.showSubtitleButton_bl, this.hasYtbButton_bl = !1, this.isMute_bl = !1, this.isShowed_bl = !0, this.forceToShowMainScrubberOverCotroller_bl = !1, this.isMainScrubberOnTop_bl = !1, this.showNextAndPrevButtons_bl = t.showNextAndPrevButtons_bl, this.isPlaylistShowed_bl = t.isPlaylistShowed_bl, this.areYtbQualityButtonsShowed_bl = !0, this.repeatBackground_bl = t.repeatBackground_bl, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, s.init = function () {
				if (s.setOverflow("visible"), s.mainHolder_do = new FWDUVPDisplayObject("div"), s.repeatBackground_bl) s.mainHolder_do.getStyle().background = "url('" + s.controllerBkPath_str + "')";
				else {
					s.bk_do = new FWDUVPDisplayObject("img");
					var e = new Image;
					e.src = s.controllerBkPath_str, s.bk_do.setScreen(e), s.bk_do.getStyle().backgroundColor = "#000000", s.mainHolder_do.addChild(s.bk_do)
				}
				s.mainHolder_do.setOverflow("visible"), s.mainHolder_do.getStyle().zIndex = 1, s.addChild(s.mainHolder_do), s.showYoutubeQualityButton_bl && (s.ytbQuality_ar = ["hd2160", "hd1440", "hd1080", "hd720", "large", "medium", "small", "tiny"], s.ytbButtons_ar = [], s.totalYtbButtons = s.ytbQuality_ar.length, s.setupYtbButtons()), s.showNextAndPrevButtonsInController_bl && s.setupPrevButton(), s.setupPlayPauseButton(), s.showNextAndPrevButtonsInController_bl && s.setupNextButton(), s.setupMainScrubber(), s.showTime_bl && s.setupTime(), s.showVolumeButton_bl && s.setupVolumeButton(), s.showPlaylistsButtonAndPlaylists_bl && s.setupCategoriesButton(), s.showPlaylistButtonAndPlaylist_bl && s.setupPlaylistButton(), s.showYoutubeQualityButton_bl && s.setupYoutubeQualityButton(), s.showShareButton_bl && s.setupShareButton(), s.showEmbedButton_bl && s.setupEmbedButton(), s.showInfoButton_bl && s.setupInfoButton(), t.showPlaybackRateButton_bl && s.setupPlaybackRateButton(), s.showDownloadVideoButton_bl && s.setupDownloadButton(), s.showSubtitleButton_bl && s.setupSubtitleButton(), s.showFullScreenButton_bl && s.setupFullscreenButton(), s.showButtonsToolTip_bl && s.setupToolTips(), s.showVolumeScrubber_bl && (s.setupVolumeScrubber(), s.hideVolumeScrubber()), s.hide(!1)
			}, s.resizeAndPosition = function () {
				s.stageWidth = o.tempVidStageWidth, s.positionButtons(), s.setY(o.tempVidStageHeight - s.stageHeight), s.hideQualityButtons(!1), s.ytbButtonsHolder_do && (FWDAnimation.killTweensOf(s.ytbButtonsHolder_do), s.ytbButtonsHolder_do.setY(o.tempStageHeight)), s.subtitlesButtonsHolder_do && (FWDAnimation.killTweensOf(s.subtitlesButtonsHolder_do), s.subtitlesButtonsHolder_do.setY(o.stageHeight)), s.playbackRatesButtonsHolder_do && (FWDAnimation.killTweensOf(s.playbackRatesButtonsHolder_do), s.playbackRatesButtonsHolder_do.setY(o.stageHeight)), s.positionAdsLines()
			}, s.positionButtons = function () {
				if (s.stageWidth) {
					var e, i, l = 0,
						n = 0,
						r = 0,
						a = 0,
						d = s.showTime_bl;
					if (t.playlist_ar[o.id]) {
						if (s.showDownloadVideoButton_bl)
							if (t.playlist_ar[o.id].downloadable) - 1 == FWDUVPUtils.indexOfArray(s.buttons_ar, s.downloadButton_do) && (s.fullScreenButton_do ? s.embedButton_do && s.facebookButton_do ? s.buttons_ar.splice(s.buttons_ar.length - 3, 0, s.downloadButton_do) : s.buttons_ar.splice(s.buttons_ar.length - 2, 0, s.downloadButton_do) : s.facebookButton_do ? s.embedButton_do ? s.buttons_ar.splice(s.buttons_ar.length - 2, 0, s.downloadButton_do) : s.buttons_ar.splice(s.buttons_ar.length - 1, 0, s.downloadButton_do) : s.embedButton_do ? s.buttons_ar.splice(s.buttons_ar.length - 1, 0, s.downloadButton_do) : s.buttons_ar.splice(s.buttons_ar.length, 0, s.downloadButton_do), s.downloadButton_do.setVisible(!0));
							else {
								var u = FWDUVPUtils.indexOfArray(s.buttons_ar, s.downloadButton_do); - 1 != u && (s.buttons_ar.splice(u, 1), s.downloadButton_do.setVisible(!1))
							}
						var h;
						if (s.showInfoButton_bl)
							if (t.playlist_ar[o.id].desc) - 1 == FWDUVPUtils.indexOfArray(s.buttons_ar, s.infoButton_do) && (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.downloadButton_do), s.downloadButton_do && -1 != u ? s.buttons_ar.splice(h, 0, s.infoButton_do) : s.embedButton_do ? (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.embedButton_do), s.buttons_ar.splice(h, 0, s.infoButton_do)) : s.facebookButton_do ? (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.facebookButton_do), s.buttons_ar.splice(h, 0, s.infoButton_do)) : s.fullScreenButton_do ? (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.fullScreenButton_do), s.buttons_ar.splice(h, 0, s.infoButton_do)) : s.fullScreenButton_do ? (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.fullScreenButton_do), s.buttons_ar.splice(h, 0, s.infoButton_do)) : s.buttons_ar.splice(s.buttons_ar.length, 0, s.infoButton_do)), s.infoButton_do.setVisible(!0);
							else {
								var _ = FWDUVPUtils.indexOfArray(s.buttons_ar, s.infoButton_do); - 1 != _ && (s.buttons_ar.splice(_, 1), s.infoButton_do.setVisible(!1))
							}
						if (s.showSubtitleButton_bl)
							if (t.playlist_ar[o.id].subtitleSource) - 1 == FWDUVPUtils.indexOfArray(s.buttons_ar, s.subtitleButton_do) && s.fullScreenButton_do && (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.fullScreenButton_do), s.buttons_ar.splice(h, 0, s.subtitleButton_do));
							else {
								var c = FWDUVPUtils.indexOfArray(s.buttons_ar, s.subtitleButton_do); - 1 != c && (s.buttons_ar.splice(c, 1), s.subtitleButton_do.setVisible(!1), s.subtitleButton_do.setX(-5e3))
							}
						if (o.videoType_str == FWDUVPlayer.VIMEO) {
							var f = FWDUVPUtils.indexOfArray(s.buttons_ar, s.playPauseButton_do);
							if (-1 != f && (s.buttons_ar.splice(f, 1), s.playPauseButton_do.setVisible(!1), s.playPauseButton_do.setX(-500)), s.showVolumeButton_bl) {
								var p = FWDUVPUtils.indexOfArray(s.buttons_ar, s.volumeButton_do); - 1 != p && (s.buttons_ar.splice(p, 1), s.volumeButton_do.setVisible(!1), s.volumeButton_do.setX(-500))
							}
							s.mainScrubber_do.setVisible(!1)
						} else -1 == FWDUVPUtils.indexOfArray(s.buttons_ar, s.playPauseButton_do) && s.playPauseButton_do && (h = 0, s.buttons_ar.splice(h, 0, s.playPauseButton_do), s.playPauseButton_do.setVisible(!0)), s.showVolumeButton_bl && (s.showTime_bl ? -1 == FWDUVPUtils.indexOfArray(s.buttons_ar, s.volumeButton_do) && (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.time_do) + 1, s.buttons_ar.splice(h, 0, s.volumeButton_do), s.volumeButton_do.setVisible(!0)) : -1 == FWDUVPUtils.indexOfArray(s.buttons_ar, s.volumeButton_do) && (h = FWDUVPUtils.indexOfArray(s.buttons_ar, s.mainScrubber_do) + 1, s.buttons_ar.splice(h, 0, s.volumeButton_do), s.volumeButton_do.setVisible(!0))), s.mainScrubber_do.setVisible(!0);
						for (var b = [], m = 0; m < s.buttons_ar.length; m++) b[m] = s.buttons_ar[m];
						"right" == o.tempPlaylistPosition_str && s.showNextAndPrevButtonsInController_bl && !s.showNP_bl && -1 != FWDUVPUtils.indexOfArray(b, s.nextButton_do) && (b.splice(FWDUVPUtils.indexOfArray(b, s.nextButton_do), 1), b.splice(FWDUVPUtils.indexOfArray(b, s.prevButton_do), 1), s.nextButton_do.setX(-1e3), s.prevButton_do.setX(-1e3)), s.mainScrubberWidth = s.stageWidth - 2 * s.startSpaceBetweenButtons;
						for (m = 0; m < b.length; m++)(e = b[m]) != s.mainScrubber_do && (s.mainScrubberWidth -= e.w + s.spaceBetweenButtons);
						if (o.videoType_str == FWDUVPlayer.VIMEO && s.mainScrubberWidth >= 120) {
							s.mainScrubber_do && -1 != FWDUVPUtils.indexOfArray(b, s.mainScrubber_do) && (b.splice(FWDUVPUtils.indexOfArray(b, s.mainScrubber_do), 1), s.positionScrollBarOnTopOfTheController()), s.time_do && -1 != FWDUVPUtils.indexOfArray(b, s.time_do) && (b.splice(FWDUVPUtils.indexOfArray(b, s.time_do), 1), s.time_do.setX(-1e3)), l = b.length;
							for (m = 0; m < l; m++) n += b[m].w;
							r = s.spaceBetweenButtons, a = s.stageWidth - b[l - 1].w - s.startSpaceBetweenButtons - 2;
							for (m = l - 1; m >= 0; m--) e = b[m], m == l - 1 ? e.setX(a) : (i = b[m + 1], e.setX(i.x - e.w - r))
						} else if (s.mainScrubberWidth <= 120 || o.videoType_str == FWDUVPlayer.VIMEO) {
							s.mainScrubber_do && -1 != FWDUVPUtils.indexOfArray(b, s.mainScrubber_do) && (b.splice(FWDUVPUtils.indexOfArray(b, s.mainScrubber_do), 1), s.positionScrollBarOnTopOfTheController()), s.time_do && -1 != FWDUVPUtils.indexOfArray(b, s.time_do) && (b.splice(FWDUVPUtils.indexOfArray(b, s.time_do), 1), s.time_do.setX(-1e3)), l = b.length;
							for (m = 0; m < l; m++) n += b[m].w;
							r = parseInt((s.stageWidth - n - 2 * s.startSpaceBetweenButtons) / (l - 1)), a = parseInt((s.stageWidth - n - (l - 1) * r) / 2);
							for (m = 0; m < l; m++) e = b[m], 0 == m ? e.setX(a) : (i = b[m - 1], e.setX(i.x + i.w + r))
						} else {
							for (; s.mainScrubberWidth < s.mainScrubberMinWidth;) {
								s.mainScrubberWidth = s.stageWidth - 2 * s.startSpaceBetweenButtons, s.time_do && -1 != FWDUVPUtils.indexOfArray(b, s.time_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.time_do), 1), s.time_do.setX(-1e3), d = !1) : s.shareButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.shareButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.shareButton_do), 1), s.shareButton_do.setX(-1e3)) : s.downloadButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.downloadButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.downloadButton_do), 1), s.downloadButton_do.setX(-1e3)) : s.embedButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.embedButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.embedButton_do), 1), s.embedButton_do.setX(-1e3)) : s.volumeButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.volumeButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.volumeButton_do), 1), s.volumeButton_do.setX(-1e3)) : s.playbackRateButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.playbackRateButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.playbackRateButton_do), 1), s.playbackRateButton_do.setX(-1e3)) : s.ytbQualityButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.ytbQualityButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.ytbQualityButton_do), 1), s.ytbQualityButton_do.setX(-1e3)) : s.playlistButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.playlistButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.playlistButton_do), 1), s.playlistButton_do.setX(-1e3)) : s.infoButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.infoButton_do) ? (b.splice(FWDUVPUtils.indexOfArray(b, s.infoButton_do), 1), s.infoButton_do.setX(-1e3)) : s.categoriesButton_do && -1 != FWDUVPUtils.indexOfArray(b, s.categoriesButton_do) && (b.splice(FWDUVPUtils.indexOfArray(b, s.categoriesButton_do), 1), s.categoriesButton_do.setX(-1e3)), l = b.length;
								for (m = 0; m < l; m++)(e = b[m]) != s.mainScrubber_do && (s.mainScrubberWidth -= e.w + s.spaceBetweenButtons)
							}
							s.showNextAndPrevButtonsInController_bl && s.mainScrubberWidth, d && (s.mainScrubberWidth -= 2 * s.timeOffsetLeftWidth), l = b.length;
							for (m = 0; m < l; m++) e = b[m], 0 == m ? e.setX(s.startSpaceBetweenButtons) : e == s.mainScrubber_do ? (i = b[m - 1], FWDAnimation.killTweensOf(s.mainScrubber_do), s.mainScrubber_do.setX(i.x + i.w + s.spaceBetweenButtons), s.mainScrubber_do.setY(parseInt((s.stageHeight - s.mainScrubberHeight) / 2)), s.mainScrubber_do.setWidth(s.mainScrubberWidth), s.mainScrubberBkMiddle_do.setWidth(s.mainScrubberWidth - 2 * s.scrubbersBkLeftAndRightWidth), s.mainScrubberBkRight_do.setX(s.mainScrubberWidth - s.scrubbersBkLeftAndRightWidth), s.mainScrubberDragMiddle_do.setWidth(s.mainScrubberWidth - s.scrubbersBkLeftAndRightWidth - s.scrubbersOffsetWidth)) : e == s.time_do ? (i = b[m - 1], e.setX(i.x + i.w + s.spaceBetweenButtons + s.timeOffsetLeftWidth)) : e == s.volumeButton_do && d ? (i = b[m - 1], e.setX(i.x + i.w + s.spaceBetweenButtons + s.timeOffsetRightWidth)) : (i = b[m - 1], e.setX(i.x + i.w + s.spaceBetweenButtons));
							s.isShowed_bl ? s.isMainScrubberOnTop_bl = !1 : (s.isMainScrubberOnTop_bl = !0, s.positionScrollBarOnTopOfTheController())
						}
						s.bk_do && (s.bk_do.setWidth(s.stageWidth), s.bk_do.setHeight(s.stageHeight)), s.progressMiddle_do && s.progressMiddle_do.setWidth(Math.max(s.mainScrubberWidth - s.scrubbersBkLeftAndRightWidth - s.scrubbersOffsetWidth, 0)), s.updateMainScrubber(s.percentPlayed), s.updatePreloaderBar(s.percentLoaded), s.mainHolder_do.setWidth(s.stageWidth), s.mainHolder_do.setHeight(s.stageHeight), s.setWidth(s.stageWidth), s.setHeight(s.stageHeight)
					}
				}
			}, this.positionScrollBarOnTopOfTheController = function () {
				s.mainScrubberWidth = s.stageWidth, s.updatePreloaderBar(s.percentLoaded), s.mainScrubber_do.setWidth(s.mainScrubberWidth), s.mainScrubberBkMiddle_do.setWidth(s.mainScrubberWidth - 2 * s.scrubbersBkLeftAndRightWidth), s.mainScrubberBkRight_do.setX(s.mainScrubberWidth - s.scrubbersBkLeftAndRightWidth), s.mainScrubberDragMiddle_do.setWidth(s.mainScrubberWidth - s.scrubbersBkLeftAndRightWidth - s.scrubbersOffsetWidth), FWDAnimation.killTweensOf(s.mainScrubber_do), s.mainScrubber_do.setX(0), s.mainScrubber_do.setAlpha(1), s.isMainScrubberOnTop_bl || s.isShowed_bl ? s.mainScrubber_do.setY(-s.mainScrubberOffestTop) : (s.mainScrubber_do.setY(s.mainScrubber_do.h), FWDAnimation.to(s.mainScrubber_do, .8, {
					y: -s.mainScrubberOffestTop,
					ease: Expo.easeOut
				})), s.isMainScrubberOnTop_bl = !0
			}, this.setupToolTips = function () {
				FWDUVPToolTip.setPrototype(), s.playPauseToolTip_do = new FWDUVPToolTip(s.playPauseButton_do, t.toopTipBk_str, t.toopTipPointer_str, "play / pause", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.playPauseToolTip_do.screen), s.showControllerWhenVideoIsStopped_bl && (FWDUVPToolTip.setPrototype(), s.prevButtonToolTip_do = new FWDUVPToolTip(s.prevButton_do, t.toopTipBk_str, t.toopTipPointer_str, "previous video", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.prevButtonToolTip_do.screen), FWDUVPToolTip.setPrototype(), s.nextButtonToolTip_do = new FWDUVPToolTip(s.nextButton_do, t.toopTipBk_str, t.toopTipPointer_str, "next video", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.nextButtonToolTip_do.screen)), s.showPlaylistsButtonAndPlaylists_bl && (FWDUVPToolTip.setPrototype(), s.playlistsButtonToolTip_do = new FWDUVPToolTip(s.categoriesButton_do, t.toopTipBk_str, t.toopTipPointer_str, "show playlists", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.playlistsButtonToolTip_do.screen)), s.showPlaylistButtonAndPlaylist_bl && (FWDUVPToolTip.setPrototype(), s.playlistButtonToolTip_do = new FWDUVPToolTip(s.playlistButton_do, t.toopTipBk_str, t.toopTipPointer_str, "show / hide playlist", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.playlistButtonToolTip_do.screen)), s.showEmbedButton_bl && (FWDUVPToolTip.setPrototype(), s.embedButtonToolTip_do = new FWDUVPToolTip(s.embedButton_do, t.toopTipBk_str, t.toopTipPointer_str, "show embed window", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.embedButtonToolTip_do.screen)), s.showShareButton_bl && (FWDUVPToolTip.setPrototype(), s.facebookButtonToolTip_do = new FWDUVPToolTip(s.shareButton_do, t.toopTipBk_str, t.toopTipPointer_str, "share", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.facebookButtonToolTip_do.screen)), s.showSubtitleButton_bl && (FWDUVPToolTip.setPrototype(), s.subtitleButtonToolTip_do = new FWDUVPToolTip(s.subtitleButton_do, t.toopTipBk_str, t.toopTipPointer_str, "show / hide subtitle", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.subtitleButtonToolTip_do.screen)), s.showInfoButton_bl && (FWDUVPToolTip.setPrototype(), s.infoButtonToolTip_do = new FWDUVPToolTip(s.infoButton_do, t.toopTipBk_str, t.toopTipPointer_str, "more info", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.infoButtonToolTip_do.screen)), s.showDownloadVideoButton_bl && (FWDUVPToolTip.setPrototype(), s.downloadButtonToolTip_do = new FWDUVPToolTip(s.downloadButton_do, t.toopTipBk_str, t.toopTipPointer_str, "download video", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.downloadButtonToolTip_do.screen)), s.fullScreenButton_do && (FWDUVPToolTip.setPrototype(), s.fullscreenButtonToolTip_do = new FWDUVPToolTip(s.fullScreenButton_do, t.toopTipBk_str, t.toopTipPointer_str, "fullscreen / normalscreen", s.buttonsToolTipFontColor_str, s.buttonsToolTipHideDelay), document.documentElement.appendChild(s.fullscreenButtonToolTip_do.screen))
			}, this.showToolTip = function (e, t, o) {
				if (s.showButtonsToolTip_bl) {
					var i, l, n = FWDUVPUtils.getViewportSize();
					FWDUVPUtils.getViewportMouseCoordinates(o);
					e.screen.offsetWidth < 3 ? (i = parseInt(100 * e.getGlobalX() + e.w / 2 - t.w / 2), l = parseInt(100 * e.getGlobalY() - t.h - 8)) : (i = parseInt(e.getGlobalX() + e.w / 2 - t.w / 2), l = parseInt(e.getGlobalY() - t.h - 8));
					var r = 0;
					i < 0 ? (r = i, i = 0) : i + t.w > n.w && (i += -1 * (r = -1 * (n.w - (i + t.w)))), t.positionPointer(r, !1), t.setX(i), t.setY(l), t.show()
				}
			}, this.setupAdsLines = function (e, o, i) {
				if (s.curLinesId != o || s.curLinesCat != i) {
					if (s.line_ar) {
						for (var l = 0; l < s.line_ar.length; l++) FWDAnimation.killTweensOf(s.line_ar[l]), s.linesHolder_do.removeChild(s.line_ar[l]);
						s.line_ar = null
					}
					if (s.curLinesId = o, s.curLinesCat = i, e) {
						if (this.linesHolder_do || (this.linesHolder_do = new FWDUVPDisplayObject("div"), this.linesHolder_do.setOverflow("visible"), this.mainScrubber_do.addChild(this.linesHolder_do)), this.lines_ar = e, this.lines_ar) {
							var n;
							this.line_ar = [];
							for (l = 0; l < this.lines_ar.length; l++)(n = new FWDUVPDisplayObject("div")).getStyle().background = "url('" + t.adLinePat_str + "') repeat-x", n.timeStart = e[l].timeStart, n.setWidth(2), n.setHeight(s.mainScrubberDragLeft_img.height), n.isUsed_bl = !1, n.isShowed_bl = !1, this.lines_ar[l].played_bl && n.setVisible(!1), n.setAlpha(0), this.line_ar[l] = n, this.linesHolder_do.addChild(n)
						}
						s.totalDuration = 0
					}
				}
			}, this.hideAdsLines = function () {
				if (s.linesHolder_do && s.linesHolder_do.setX(-5e3), this.line_ar)
					for (var e = 0; e < this.line_ar.length; e++) this.line_ar[e].setAlpha(0), this.line_ar[e].isShowed_bl = !1
			}, this.positionAdsLines = function (e) {
				if (s.linesHolder_do && (e && (s.totalDuration = e), o.isAdd_bl ? this.linesHolder_do.setX(-5e3) : this.linesHolder_do.setX(0), this.line_ar))
					for (var t, i = 0; i < this.line_ar.length; i++)(t = this.line_ar[i]).setX(Math.round(t.timeStart / s.totalDuration * s.mainScrubberWidth) - 1), t.x < 0 && t.setX(0), t.isUsed_bl || 0 == s.totalDuration || t.isShowed_bl || (FWDAnimation.to(t, 1, {
						alpha: 1,
						delay: 1.5,
						ease: Expo.easeOut
					}), t.isShowed_bl = !0)
			}, this.playbackRatesSource_ar = t.defaultPlaybackRate_ar, this.playbackRateButtons_ar = [], this.totalPlaybackRateButtons = 6, this.arePlaybackRateButtonsShowed_bl = !0, this.showPlaybackRateButton_bl || (this.arePlaybackRateButtonsShowed_bl = !1), this.setupPlaybackRateButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.playbackRateButton_do = new FWDUVPSimpleButton(t.playbackRateNPath_img, t.playbackRateSPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.playbackRateButton_do.setY(parseInt((s.stageHeight - s.playbackRateButton_do.h) / 2)), s.playbackRateButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.playbackRateButtonMouseUpHandler), s.mainHolder_do.addChild(s.playbackRateButton_do), s.playbackRateButton_do.setX(-500), s.disablePlaybackRateButton(), s.setupPlaybackRateButtons()
			}, this.playbackRateButtonMouseUpHandler = function () {
				s.arePlaybackRateButtonsShowed_bl ? s.hidePlaybackRateButtons(!0) : s.showPlaybackRateButtons(!0)
			}, this.disablePlaybackRateButton = function () {
				s.playbackRateButton_do && s.playbackRateButton_do.disable()
			}, this.enablePlaybackRateButton = function () {
				s.playbackRateButton_do && s.playbackRateButton_do.enable()
			}, this.removePlaybackRateButton = function () {
				s.playbackRateButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.playbackRateButton_do) && (s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.playbackRateButton_do), 1), s.playbackRateButton_do.setX(-300), s.positionButtons())
			}, this.addPlaybackRateButton = function (e) {
				s.playbackRateButton_do && -1 == FWDUVPUtils.indexOfArray(s.buttons_ar, s.playbackRateButton_do) && (s.downloadButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.downloadButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.downloadButton_do) + 1, 0, s.playbackRateButton_do) : s.embedButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.embedButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.embedButton_do) + 1, 0, s.playbackRateButton_do) : s.shareButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.shareButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.shareButton_do) + 1, 0, s.playbackRateButton_do) : s.fullScreenButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.fullScreenButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.fullScreenButton_do), 0, s.playbackRateButton_do) : s.buttons_ar.splice(s.buttons_ar.length, 0, s.playbackRateButton_do), s.updatePlaybackRateButtons(e))
			}, this.updatePlaybackRateButtons = function (e) {
				s.playbackRateButton_do && (setTimeout(function () {
					s.disablePlaybackRateButtons(e)
				}, 65), s.prevplaybackRateIndex = e)
			}, this.setupPlaybackRateButtons = function () {
				var e, t;
				(s.playbackRatesButtonsHolder_do = new FWDUVPDisplayObject("div"), s.playbackRatesButtonsHolder_do.setOverflow("visible"), s.repeatBackground_bl) ? s.playbackRatesButtonsHolder_do.getStyle().background = "url('" + s.controllerBkPath_str + "')": (s.playbackRatesButtonsBackground_do = new FWDUVPDisplayObject("img"), (e = new Image).src = s.controllerBkPath_str, s.playbackRatesButtonsBackground_do.setScreen(e), s.playbackRatesButtonsHolder_do.addChild(s.playbackRatesButtonsBackground_do));
				s.playbackRatesButtonsHolder_do.setX(300), s.playbackRatesButtonsHolder_do.setY(-300), o.videoHolder_do.addChild(s.playbackRatesButtonsHolder_do), (e = new Image).src = s.ytbQualityButtonPointerPath_str, s.playbackRatesPonter_do = new FWDUVPDisplayObject("img"), s.playbackRatesPonter_do.setScreen(e), s.playbackRatesPonter_do.setWidth(s.pointerWidth), s.playbackRatesPonter_do.setHeight(s.pointerHeight), s.playbackRatesButtonsHolder_do.addChild(s.playbackRatesPonter_do), (e = new Image).src = s.youtubeQualityArrowPath_str, s.playbackRateQualityArrow_do = new FWDUVPDisplayObject("img"), s.playbackRateQualityArrow_do.setScreen(e), s.playbackRateQualityArrow_do.setX(7), s.playbackRateQualityArrow_do.setWidth(5), s.playbackRateQualityArrow_do.setHeight(7), s.playbackRatesButtonsHolder_do.addChild(s.playbackRateQualityArrow_do);
				for (var i = 0; i < s.totalPlaybackRateButtons; i++) FWDUVPYTBQButton.setPrototype(), (t = new FWDUVPYTBQButton("no source", s.youtubeQualityButtonNormalColor_str, s.youtubeQualityButtonSelectedColor_str, void 0, i)).addListener(FWDUVPYTBQButton.MOUSE_OVER, s.plbkQualityOver), t.addListener(FWDUVPYTBQButton.MOUSE_OUT, s.plbkQualityOut), t.addListener(FWDUVPYTBQButton.CLICK, s.plbkQualityClick), s.playbackRateButtons_ar[i] = t, s.playbackRatesButtonsHolder_do.addChild(t);
				s.positionAndResizePlaybackRateButtons(s.playbackRatesSource_ar), s.hidePlaybackRateButtons(!1)
			}, this.plbkQualityOver = function (e) {
				s.setPlaybackRateArrowPosition(e.target)
			}, this.plbkQualityOut = function (e) {
				s.setPlaybackRateArrowPosition(void 0)
			}, this.plbkQualityClick = function (t) {
				s.startAtPlaybackRate = t.id, s.disablePlaybackRateButtons(s.startAtPlaybackRate), s.hidePlaybackRateButtons(!0), s.dispatchEvent(e.CHANGE_PLAYBACK_RATES, {
					rate: s.playbackRatesSource_ar[t.id]
				})
			}, this.positionAndResizePlaybackRateButtons = function (e) {
				if (e) {
					var t = e.length;
					if (s.prevplaybackRatesQualityButtonsLength != t) {
						var o;
						this.prevplaybackRatesQualityButtonsLength = t;
						for (var i = 5, l = 0, n = 0, r = 0; r < t; r++) o = s.playbackRateButtons_ar[r], 1 == e[r] ? o.updateText("normal") : o.updateText(e[r]), o.setFinalSize();
						setTimeout(function () {
							for (var e = 0; e < t; e++) o = s.playbackRateButtons_ar[e], e < t ? (0 != o.x && o.setX(0), o.w > l && (l = o.w), o.setY(i), i += o.h) : -3e3 != o.x && o.setX(-3e3);
							for (e = 0; e < t; e++)(o = s.playbackRateButtons_ar[e]).dumy_do.w < l && (o.setWidth(l), o.dumy_do.setWidth(l));
							n = i + 5, s.playbackRatesPonter_do.setX(parseInt((l - s.playbackRatesPonter_do.w) / 2)), s.playbackRatesPonter_do.setY(n), s.playbackRatesButtonsBackground_do && (s.playbackRatesButtonsBackground_do.setWidth(l), s.playbackRatesButtonsBackground_do.setHeight(n)), s.playbackRatesButtonsHolder_do.setWidth(l), s.playbackRatesButtonsHolder_do.setHeight(n)
						}, 60)
					}
				}
			}, this.disablePlaybackRateButtons = function (e) {
				if (null != e)
					for (var t = 0; t < s.totalPlaybackRateButtons; t++) btn = s.playbackRateButtons_ar[t], t == e ? (FWDAnimation.killTweensOf(s.playbackRateQualityArrow_do), s.playbackRateQualityArrow_do.setY(btn.y + parseInt((btn.h - s.playbackRateQualityArrow_do.h) / 2) - 1), btn.disable(), s.playbackRateDisabledButton_do = btn) : btn.enable()
			}, this.setPlaybackRateArrowPosition = function (e) {
				var t = 0;
				t = e ? e.y + parseInt((e.h - s.playbackRateQualityArrow_do.h) / 2 - 1) : s.playbackRateDisabledButton_do.y + parseInt((s.playbackRateDisabledButton_do.h - s.playbackRateQualityArrow_do.h) / 2 - 1), FWDAnimation.killTweensOf(s.playbackRateQualityArrow_do), FWDAnimation.to(s.playbackRateQualityArrow_do, .6, {
					y: t,
					delay: .1,
					ease: Expo.easeInOut
				})
			}, this.showPlaybackRateButtons = function (e) {
				if (!s.arePlaybackRateButtonsShowed_bl) {
					s.hideQualityButtons(), s.arePlaybackRateButtonsShowed_bl = !0;
					var t = parseInt(s.playbackRateButton_do.x + parseInt(s.playbackRateButton_do.w - s.playbackRatesButtonsHolder_do.w) / 2),
						i = parseInt(o.tempVidStageHeight - s.stageHeight - s.playbackRatesButtonsHolder_do.h - 6);
					s.hasPointerEvent_bl ? window.addEventListener("pointerdown", s.hideplaybackRatesButtonsHandler) : (s.isMobile_bl || window.addEventListener("mousedown", s.hideplaybackRatesButtonsHandler), window.addEventListener("touchstart", s.hideplaybackRatesButtonsHandler)), s.playbackRatesButtonsHolder_do.setX(t), e ? FWDAnimation.to(s.playbackRatesButtonsHolder_do, .6, {
						y: i,
						ease: Expo.easeInOut
					}) : (FWDAnimation.killTweensOf(s.playbackRatesButtonsHolder_do), s.playbackRatesButtonsHolder_do.setY(i))
				}
			}, this.hidePlaybackRateButtons = function (e) {
				s.arePlaybackRateButtonsShowed_bl && s.playbackRatesButtonsHolder_do && (s.arePlaybackRateButtonsShowed_bl = !1, e ? FWDAnimation.to(s.playbackRatesButtonsHolder_do, .6, {
					y: o.stageHeight,
					ease: Expo.easeInOut
				}) : (FWDAnimation.killTweensOf(s.playbackRatesButtonsHolder_do), s.playbackRatesButtonsHolder_do.setY(o.stageHeight)), s.hasPointerEvent_bl ? window.removeEventListener("pointerdown", s.hideplaybackRatesButtonsHandler) : (s.isMobile_bl || window.removeEventListener("mousedown", s.hideplaybackRatesButtonsHandler), window.removeEventListener("touchstart", s.hideplaybackRatesButtonsHandler)))
			}, this.hideplaybackRatesButtonsHandler = function (e) {
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				FWDUVPUtils.hitTest(s.playbackRateButton_do.screen, t.screenX, t.screenY) || FWDUVPUtils.hitTest(s.playbackRatesButtonsHolder_do.screen, t.screenX, t.screenY) || s.hidePlaybackRateButtons(!0)
			}, this.setupMainScrubber = function () {
				s.mainScrubber_do = new FWDUVPDisplayObject("div"), s.mainScrubber_do.setY(parseInt((s.stageHeight - s.mainScrubberHeight) / 2)), s.mainScrubber_do.setHeight(s.mainScrubberHeight), s.mainScrubberBkLeft_do = new FWDUVPDisplayObject("img"), s.mainScrubberBkLeft_do.setScreen(s.mainScrubberBkLeft_img);
				var e = new Image;
				e.src = t.mainScrubberBkRightPath_str, s.mainScrubberBkRight_do = new FWDUVPDisplayObject("img"), s.mainScrubberBkRight_do.setScreen(e), s.mainScrubberBkRight_do.setWidth(s.mainScrubberBkLeft_do.w), s.mainScrubberBkRight_do.setHeight(s.mainScrubberBkLeft_do.h);
				var o = new Image;
				o.src = s.mainScrubberBkMiddlePath_str, s.isMobile_bl ? (s.mainScrubberBkMiddle_do = new FWDUVPDisplayObject("div"), s.mainScrubberBkMiddle_do.getStyle().background = "url('" + s.mainScrubberBkMiddlePath_str + "') repeat-x") : (s.mainScrubberBkMiddle_do = new FWDUVPDisplayObject("img"), s.mainScrubberBkMiddle_do.setScreen(o)), s.mainScrubberBkMiddle_do.setHeight(s.mainScrubberHeight), s.mainScrubberBkMiddle_do.setX(s.scrubbersBkLeftAndRightWidth), s.mainProgress_do = new FWDUVPDisplayObject("div"), s.mainProgress_do.setHeight(s.mainScrubberHeight), s.progressLeft_do = new FWDUVPDisplayObject("img"), s.progressLeft_do.setScreen(s.progress), (o = new Image).src = s.progressMiddlePath_str, s.progressMiddle_do = new FWDUVPDisplayObject("div"), s.progressMiddle_do.getStyle().background = "url('" + s.progressMiddlePath_str + "') repeat-x", s.progressMiddle_do.setHeight(s.mainScrubberHeight), s.progressMiddle_do.setX(s.mainScrubberDragLeftWidth), s.mainScrubberDrag_do = new FWDUVPDisplayObject("div"), s.mainScrubberDrag_do.setHeight(s.mainScrubberHeight), s.useHEXColorsForSkin_bl ? (s.mainScrubberDragLeft_do = new FWDUVPDisplayObject("div"), s.mainScrubberDragLeft_do.setWidth(s.mainScrubberDragLeft_img.width), s.mainScrubberDragLeft_do.setHeight(s.mainScrubberDragLeft_img.height), s.mainScrubberDragLeft_canvas = FWDUVPUtils.getCanvasWithModifiedColor(s.mainScrubberDragLeft_img, s.normalButtonsColor_str).canvas, s.mainScrubberDragLeft_do.screen.appendChild(s.mainScrubberDragLeft_canvas)) : (s.mainScrubberDragLeft_do = new FWDUVPDisplayObject("img"), s.mainScrubberDragLeft_do.setScreen(s.mainScrubberDragLeft_img)), s.mainScrubberMiddleImage = new Image, s.mainScrubberMiddleImage.src = s.mainScrubberDragMiddlePath_str, s.volumeScrubberDragMiddle_do = new FWDUVPDisplayObject("div"), s.useHEXColorsForSkin_bl ? (s.mainScrubberDragMiddle_do = new FWDUVPDisplayObject("div"), s.mainScrubberMiddleImage.onload = function () {
					var e = FWDUVPUtils.getCanvasWithModifiedColor(s.mainScrubberMiddleImage, s.normalButtonsColor_str, !0);
					s.mainSCrubberMiddleCanvas = e.canvas, s.mainSCrubberDragMiddleImageBackground = e.image, s.mainScrubberDragMiddle_do.getStyle().background = "url('" + s.mainSCrubberDragMiddleImageBackground.src + "') repeat-x"
				}) : (s.mainScrubberDragMiddle_do = new FWDUVPDisplayObject("div"), s.mainScrubberDragMiddle_do.getStyle().background = "url('" + s.mainScrubberDragMiddlePath_str + "') repeat-x"), s.mainScrubberDragMiddle_do.setHeight(s.mainScrubberHeight), s.mainScrubberDragMiddle_do.setX(s.mainScrubberDragLeftWidth), s.mainScrubberBarLine_do = new FWDUVPDisplayObject("img"), s.mainScrubberBarLine_do.setScreen(s.mainScrubberLine_img), s.mainScrubberBarLine_do.setAlpha(0), s.mainScrubberBarLine_do.hasTransform3d_bl = !1, s.mainScrubberBarLine_do.hasTransform2d_bl = !1, s.buttons_ar.push(s.mainScrubber_do), s.mainScrubber_do.addChild(s.mainScrubberBkLeft_do), s.mainScrubber_do.addChild(s.mainScrubberBkMiddle_do), s.mainScrubber_do.addChild(s.mainScrubberBkRight_do), s.mainScrubber_do.addChild(s.mainScrubberBarLine_do), s.mainScrubberDrag_do.addChild(s.mainScrubberDragLeft_do), s.mainScrubberDrag_do.addChild(s.mainScrubberDragMiddle_do), s.mainProgress_do.addChild(s.progressLeft_do), s.mainProgress_do.addChild(s.progressMiddle_do), s.mainScrubber_do.addChild(s.mainProgress_do), s.mainScrubber_do.addChild(s.mainScrubberDrag_do), s.mainScrubber_do.addChild(s.mainScrubberBarLine_do), s.mainHolder_do.addChild(s.mainScrubber_do), s.disableVideoScrubber_bl || (s.hasPointerEvent_bl ? (s.mainScrubber_do.screen.addEventListener("pointerover", s.mainScrubberOnOverHandler), s.mainScrubber_do.screen.addEventListener("pointerout", s.mainScrubberOnOutHandler), s.mainScrubber_do.screen.addEventListener("pointerdown", s.mainScrubberOnDownHandler)) : s.screen.addEventListener && (s.isMobile_bl || (s.mainScrubber_do.screen.addEventListener("mouseover", s.mainScrubberOnOverHandler), s.mainScrubber_do.screen.addEventListener("mouseout", s.mainScrubberOnOutHandler), s.mainScrubber_do.screen.addEventListener("mousedown", s.mainScrubberOnDownHandler)), s.mainScrubber_do.screen.addEventListener("touchstart", s.mainScrubberOnDownHandler))), s.disableMainScrubber(), s.updateMainScrubber(0)
			}, this.mainScrubberOnOverHandler = function (e) {
				s.isMainScrubberDisabled_bl
			}, this.mainScrubberOnOutHandler = function (e) {
				s.isMainScrubberDisabled_bl
			}, this.mainScrubberOnDownHandler = function (t) {
				if (!s.isMainScrubberDisabled_bl && 2 != t.button) {
					o.showDisable(), t.preventDefault && t.preventDefault(), s.isMainScrubberScrubbing_bl = !0;
					var i = FWDUVPUtils.getViewportMouseCoordinates(t).screenX - s.mainScrubber_do.getGlobalX();
					i < 0 ? i = 0 : i > s.mainScrubberWidth - s.scrubbersOffsetWidth && (i = s.mainScrubberWidth - s.scrubbersOffsetWidth);
					var l = i / s.mainScrubberWidth;
					s.updateMainScrubber(l), s.dispatchEvent(e.START_TO_SCRUB), s.dispatchEvent(e.SCRUB, {
						percent: l
					}), s.hasPointerEvent_bl ? (window.addEventListener("pointermove", s.mainScrubberMoveHandler), window.addEventListener("pointerup", s.mainScrubberEndHandler)) : (window.addEventListener("mousemove", s.mainScrubberMoveHandler), window.addEventListener("mouseup", s.mainScrubberEndHandler), window.addEventListener("touchmove", s.mainScrubberMoveHandler), window.addEventListener("touchend", s.mainScrubberEndHandler))
				}
			}, this.mainScrubberMoveHandler = function (t) {
				t.preventDefault && t.preventDefault();
				var o = FWDUVPUtils.getViewportMouseCoordinates(t).screenX - s.mainScrubber_do.getGlobalX();
				o < 0 ? o = 0 : o > s.mainScrubberWidth - s.scrubbersOffsetWidth && (o = s.mainScrubberWidth - s.scrubbersOffsetWidth);
				var i = o / s.mainScrubberWidth;
				s.updateMainScrubber(i), s.dispatchEvent(e.SCRUB, {
					percent: i
				})
			}, this.mainScrubberEndHandler = function (t) {
				o.hideDisable(), s.dispatchEvent(e.STOP_TO_SCRUB), s.hasPointerEvent_bl ? (window.removeEventListener("pointermove", s.mainScrubberMoveHandler), window.removeEventListener("pointerup", s.mainScrubberEndHandler)) : (window.removeEventListener("mousemove", s.mainScrubberMoveHandler), window.removeEventListener("mouseup", s.mainScrubberEndHandler), window.removeEventListener("touchmove", s.mainScrubberMoveHandler), window.removeEventListener("touchend", s.mainScrubberEndHandler))
			}, this.disableMainScrubber = function () {
				s.mainScrubber_do && (s.isMainScrubberDisabled_bl = !0, s.mainScrubber_do.setButtonMode(!1), s.mainScrubberEndHandler(), s.updateMainScrubber(0), s.updatePreloaderBar(0))
			}, this.enableMainScrubber = function () {
				s.mainScrubber_do && (s.isMainScrubberDisabled_bl = !1, s.disableVideoScrubber_bl || s.mainScrubber_do.setButtonMode(!0))
			}, this.updateMainScrubber = function (e) {
				if (s.mainScrubber_do) {
					var t = parseInt(e * s.mainScrubberWidth);
					isNaN(t) || null == t || (t < 0 && (t = 0), s.percentPlayed = e, !FWDUVPlayer.hasHTML5Video && t >= s.mainProgress_do.w && (t = s.mainProgress_do.w), t < 1 && s.isMainScrubberLineVisible_bl ? (s.isMainScrubberLineVisible_bl = !1, FWDAnimation.to(s.mainScrubberBarLine_do, .5, {
						alpha: 0
					})) : t > 1 && !s.isMainScrubberLineVisible_bl && (s.isMainScrubberLineVisible_bl = !0, FWDAnimation.to(s.mainScrubberBarLine_do, .5, {
						alpha: 1
					})), s.mainScrubberDrag_do.setWidth(t), t > s.mainScrubberWidth - s.scrubbersOffsetWidth && (t = s.mainScrubberWidth - s.scrubbersOffsetWidth), t < 0 && (t = 0), FWDAnimation.to(s.mainScrubberBarLine_do, .8, {
						x: t + 1,
						ease: Expo.easeOut
					}))
				}
			}, this.updatePreloaderBar = function (e) {
				if (s.mainProgress_do) {
					s.percentLoaded = e;
					var t = parseInt(s.percentLoaded * s.mainScrubberWidth);
					isNaN(t) || null == t || (t < 0 && (t = 0), s.percentLoaded >= .98 ? (s.percentLoaded = 1, s.mainProgress_do.setY(-30)) : 0 != s.mainProgress_do.y && 1 != s.percentLoaded && s.mainProgress_do.setY(0), t > s.mainScrubberWidth - s.scrubbersOffsetWidth && (t = s.mainScrubberWidth - s.scrubbersOffsetWidth), t < 0 && (t = 0), s.mainProgress_do.setWidth(t))
				}
			}, this.setupPrevButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.prevButton_do = new FWDUVPSimpleButton(t.prev2N_img, t.prevSPath_str, t.prev2N_img.width, t.prev2N_img.height, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.prevButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, s.prevButtonShowTooltipHandler), s.prevButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.prevButtonOnMouseUpHandler), s.prevButton_do.setY(parseInt((s.stageHeight - s.prevButton_do.h) / 2)), s.buttons_ar.push(s.prevButton_do), s.mainHolder_do.addChild(s.prevButton_do)
			}, this.prevButtonShowTooltipHandler = function (e) {
				s.showToolTip(s.prevButton_do, s.prevButtonToolTip_do, e.e)
			}, this.prevButtonOnMouseUpHandler = function () {
				s.dispatchEvent(FWDUVPPlaylist.PLAY_PREV_VIDEO)
			}, this.setupNextButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.nextButton_do = new FWDUVPSimpleButton(t.next2N_img, t.nextSPath_str, t.next2N_img.width, t.next2N_img.height, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.nextButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, s.nextButtonShowTooltipHandler), s.nextButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.nextButtonOnMouseUpHandler), s.nextButton_do.setY(parseInt((s.stageHeight - s.nextButton_do.h) / 2)), s.buttons_ar.push(s.nextButton_do), s.mainHolder_do.addChild(s.nextButton_do)
			}, this.nextButtonShowTooltipHandler = function (e) {
				s.showToolTip(s.nextButton_do, s.nextButtonToolTip_do, e.e)
			}, this.nextButtonOnMouseUpHandler = function () {
				s.dispatchEvent(FWDUVPPlaylist.PLAY_NEXT_VIDEO)
			}, this.setupPlayPauseButton = function () {
				FWDUVPComplexButton.setPrototype(), s.playPauseButton_do = new FWDUVPComplexButton(s.playN_img, t.playSPath_str, s.pauseN_img, t.pauseSPath_str, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.buttons_ar.push(s.playPauseButton_do), s.playPauseButton_do.setY(parseInt((s.stageHeight - s.playPauseButton_do.buttonHeight) / 2)), s.playPauseButton_do.addListener(FWDUVPComplexButton.SHOW_TOOLTIP, s.playButtonShowTooltipHandler), s.playPauseButton_do.addListener(FWDUVPComplexButton.MOUSE_UP, s.playButtonMouseUpHandler), s.mainHolder_do.addChild(s.playPauseButton_do)
			}, this.playButtonShowTooltipHandler = function (e) {
				s.showToolTip(s.playPauseButton_do, s.playPauseToolTip_do, e.e)
			}, this.showPlayButton = function () {
				s.playPauseButton_do && s.playPauseButton_do.setButtonState(1)
			}, this.showPauseButton = function () {
				s.playPauseButton_do && s.playPauseButton_do.setButtonState(0)
			}, this.playButtonMouseUpHandler = function () {
				0 == s.playPauseButton_do.currentState ? s.dispatchEvent(e.PAUSE) : s.dispatchEvent(e.PLAY)
			}, this.disablePlayButton = function () {
				s.playPauseButton_do.disable(), s.playPauseButton_do.setNormalState(), s.showPlayButton()
			}, this.enablePlayButton = function () {
				s.playPauseButton_do.enable()
			}, this.setupCategoriesButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.categoriesButton_do = new FWDUVPSimpleButton(s.categoriesN_img, t.categoriesSPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.categoriesButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, s.categoriesButtonShowTooltipHandler), s.categoriesButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.categoriesButtonOnMouseUpHandler), s.categoriesButton_do.setY(parseInt((s.stageHeight - s.categoriesButton_do.h) / 2)), s.buttons_ar.push(s.categoriesButton_do), s.mainHolder_do.addChild(s.categoriesButton_do)
			}, this.categoriesButtonShowTooltipHandler = function (e) {
				s.showToolTip(s.categoriesButton_do, s.playlistsButtonToolTip_do, e.e)
			}, this.categoriesButtonOnMouseUpHandler = function () {
				s.dispatchEvent(e.SHOW_CATEGORIES)
			}, this.setCategoriesButtonState = function (e) {
				s.categoriesButton_do && ("selected" == e ? s.categoriesButton_do.setSelected() : "unselected" == e && s.categoriesButton_do.setUnselected())
			}, this.setupPlaylistButton = function () {
				FWDUVPComplexButton.setPrototype(), s.playlistButton_do = new FWDUVPComplexButton(s.hidePlaylistN_img, t.hidePlaylistSPath_str, s.showPlaylistN_img, t.showPlaylistSPath_str, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.buttons_ar.push(s.playlistButton_do), s.playlistButton_do.setY(parseInt((s.stageHeight - s.playlistButton_do.buttonHeight) / 2)), s.playlistButton_do.addListener(FWDUVPComplexButton.SHOW_TOOLTIP, s.playlistButtonShowToolTipHandler), s.playlistButton_do.addListener(FWDUVPComplexButton.MOUSE_UP, s.playlistButtonMouseUpHandler), s.showPlaylistByDefault_bl || s.playlistButton_do.setButtonState(0), s.mainHolder_do.addChild(s.playlistButton_do)
			}, this.playlistButtonShowToolTipHandler = function (e) {
				s.showToolTip(s.playlistButton_do, s.playlistButtonToolTip_do, e.e)
			}, this.showShowPlaylistButton = function () {
				s.playlistButton_do && s.playlistButton_do.setButtonState(1)
			}, this.showHidePlaylistButton = function () {
				s.playlistButton_do && s.playlistButton_do.setButtonState(0)
			}, this.playlistButtonMouseUpHandler = function () {
				1 == s.playlistButton_do.currentState ? s.dispatchEvent(e.SHOW_PLAYLIST) : s.dispatchEvent(e.HIDE_PLAYLIST), s.playlistButton_do.setNormalState(), s.playlistButtonToolTip_do && s.playlistButtonToolTip_do.hide()
			}, this.disablePlaylistButton = function () {
				s.playlistButton_do && (s.playlistButton_do.disable(), s.playlistButton_do.setAlpha(.4))
			}, this.enablePlaylistButton = function () {
				s.playlistButton_do && (s.playlistButton_do.enable(), s.playlistButton_do.setAlpha(1))
			}, this.setupEmbedButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.embedButton_do = new FWDUVPSimpleButton(s.embedN_img, t.embedPathS_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.embedButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, s.embedButtonShowToolTipHandler), s.embedButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.embedButtonOnMouseUpHandler), s.embedButton_do.setY(parseInt((s.stageHeight - s.embedButton_do.h) / 2)), s.buttons_ar.push(s.embedButton_do), s.mainHolder_do.addChild(s.embedButton_do)
			}, this.embedButtonShowToolTipHandler = function (e) {
				s.showToolTip(s.embedButton_do, s.embedButtonToolTip_do, e.e)
			}, this.embedButtonOnMouseUpHandler = function () {
				s.dispatchEvent(e.SHOW_EMBED_WINDOW), s.embedButtonToolTip_do && s.embedButtonToolTip_do.hide()
			}, this.setupYtbButtons = function () {
				var e, i;
				(s.ytbButtonsHolder_do = new FWDUVPDisplayObject("div"), s.ytbButtonsHolder_do.setOverflow("visible"), s.repeatBackground_bl) ? s.ytbButtonsHolder_do.getStyle().background = "url('" + s.controllerBkPath_str + "')": (s.ytbButtonBackground_do = new FWDUVPDisplayObject("img"), (e = new Image).src = s.controllerBkPath_str, s.ytbButtonBackground_do.setScreen(e), s.ytbButtonsHolder_do.addChild(s.ytbButtonBackground_do));
				s.ytbButtonsHolder_do.setX(300), s.ytbButtonsHolder_do.setY(-300), o.videoHolder_do.addChild(s.ytbButtonsHolder_do, 0), (e = new Image).src = s.ytbQualityButtonPointerPath_str, s.pointer_do = new FWDUVPDisplayObject("img"), s.pointer_do.setScreen(e), s.pointer_do.setWidth(s.pointerWidth), s.pointer_do.setHeight(s.pointerHeight), s.ytbButtonsHolder_do.addChild(s.pointer_do), (e = new Image).src = s.youtubeQualityArrowPath_str, s.ytbQualityArrow_do = new FWDUVPDisplayObject("img"), s.ytbQualityArrow_do.setScreen(e), s.ytbQualityArrow_do.setX(7), s.ytbQualityArrow_do.setWidth(5), s.ytbQualityArrow_do.setHeight(7), s.ytbButtonsHolder_do.addChild(s.ytbQualityArrow_do);
				for (var l = 0; l < s.totalYtbButtons; l++) FWDUVPYTBQButton.setPrototype(), (i = new FWDUVPYTBQButton(s.ytbQuality_ar[l], s.youtubeQualityButtonNormalColor_str, s.youtubeQualityButtonSelectedColor_str, t.hdPath_str, l)).addListener(FWDUVPYTBQButton.MOUSE_OVER, s.ytbQualityOver), i.addListener(FWDUVPYTBQButton.MOUSE_OUT, s.ytbQualityOut), i.addListener(FWDUVPYTBQButton.CLICK, s.ytbQualityClick), s.ytbButtons_ar[l] = i, s.ytbButtonsHolder_do.addChild(i);
				s.hideQualityButtons(!1)
			}, this.ytbQualityOver = function (e) {
				s.setYtbQualityArrowPosition(e.target)
			}, this.ytbQualityOut = function (e) {
				s.setYtbQualityArrowPosition(void 0)
			}, this.ytbQualityClick = function (t) {
				s.hideQualityButtons(!0), s.dispatchEvent(e.CHANGE_YOUTUBE_QUALITY, {
					quality: t.target.label_str,
					id: t.id
				})
			}, this.positionAndResizeYtbQualityButtons = function (e) {
				if (e) {
					var t = e.length;
					if (s.prevYtbQualityButtonsLength != t) {
						var o;
						this.prevYtbQualityButtonsLength = t;
						for (var i = 5, l = 0, n = 0, r = 0; r < t; r++)(o = s.ytbButtons_ar[r]) && (o.updateText(e[r]), o.setFinalSize());
						setTimeout(function () {
							for (var e = 0; e < s.totalYtbButtons; e++) o = s.ytbButtons_ar[e], e < t ? (0 != o.x && o.setX(0), o.w > l && (l = o.w), o.setY(i), i += o.h) : -3e3 != o.x && o.setX(-3e3);
							for (e = 0; e < s.totalYtbButtons; e++)(o = s.ytbButtons_ar[e]).dumy_do.w < l && (o.setWidth(l), o.dumy_do.setWidth(l));
							n = i + 5, s.pointer_do.setX(parseInt((l - s.pointer_do.w) / 2)), s.pointer_do.setY(n), s.ytbButtonBackground_do && (s.ytbButtonBackground_do.setWidth(l), s.ytbButtonBackground_do.setHeight(n)), s.ytbButtonsHolder_do.setWidth(l), s.ytbButtonsHolder_do.setHeight(n)
						}, 70)
					}
				}
			}, this.disableQualityButtons = function (e) {
				"highres" == e || "hd1080" == e || "hd720" == e || "hd1440" == e || "hd2160" == e ? s.ytbQualityButton_do.showDisabledState() : s.ytbQualityButton_do.hideDisabledState();
				for (var t = 0; t < s.totalYtbButtons; t++) btn = s.ytbButtons_ar[t], btn.label_str == e ? (FWDAnimation.killTweensOf(s.ytbQualityArrow_do), 0 != btn.y && (s.ytbQualityArrow_do.setY(btn.y + Math.round((btn.h - s.ytbQualityArrow_do.h) / 2)), s.ytbDisabledButton_do = btn), btn.disable()) : btn.enable()
			}, this.setYtbQualityArrowPosition = function (e) {
				var t = 0;
				t = e ? e.y + parseInt((e.h - s.ytbQualityArrow_do.h) / 2) : s.ytbDisabledButton_do.y + parseInt((s.ytbDisabledButton_do.h - s.ytbQualityArrow_do.h) / 2), FWDAnimation.killTweensOf(s.ytbQualityArrow_do), FWDAnimation.to(s.ytbQualityArrow_do, .6, {
					y: t,
					delay: .1,
					ease: Expo.easeInOut
				})
			}, this.showQualityButtons = function (e) {
				if (!s.areYtbQualityButtonsShowed_bl && s.showYoutubeQualityButton_bl) {
					s.hideSubtitleButtons(), s.areYtbQualityButtonsShowed_bl = !0;
					var t = parseInt(s.ytbQualityButton_do.x + parseInt(s.ytbQualityButton_do.w - s.ytbButtonsHolder_do.w) / 2),
						i = parseInt(o.tempVidStageHeight - s.stageHeight - s.ytbButtonsHolder_do.h - 6);
					window.hasPointerEvent_bl ? window.addEventListener("pointerdown", s.hideQualityButtonsHandler) : (s.isMobile_bl || window.addEventListener("mousedown", s.hideQualityButtonsHandler), window.addEventListener("touchstart", s.hideQualityButtonsHandler)), s.ytbButtonsHolder_do.setX(t), e ? FWDAnimation.to(s.ytbButtonsHolder_do, .6, {
						y: i,
						ease: Expo.easeInOut
					}) : (FWDAnimation.killTweensOf(s.ytbButtonsHolder_do), s.ytbButtonsHolder_do.setY(i))
				}
			}, this.hideQualityButtons = function (e) {
				s.areYtbQualityButtonsShowed_bl && s.showYoutubeQualityButton_bl && (s.hideSubtitleButtons(), s.areYtbQualityButtonsShowed_bl = !1, e ? FWDAnimation.to(s.ytbButtonsHolder_do, .6, {
					y: o.stageHeight,
					ease: Expo.easeInOut
				}) : (FWDAnimation.killTweensOf(s.ytbButtonsHolder_do), s.ytbButtonsHolder_do.setY(o.stageHeight)), window.hasPointerEvent_bl ? window.removeEventListener("pointerdown", s.hideQualityButtonsHandler) : (s.isMobile_bl || window.removeEventListener("mousedown", s.hideQualityButtonsHandler), window.removeEventListener("touchstart", s.hideQualityButtonsHandler)))
			}, this.showSubtitleButton_bl, this.subtitlesSource_ar = t.subtitles_ar, this.subtitleButtons_ar = [], this.totalSubttleButtons = 10, this.setupSubtitleButton = function () {
				FWDUVPComplexButton.setPrototype(), s.subtitleButton_do = new FWDUVPComplexButton(t.showSubtitleNPath_img, t.showSubtitleSPath_str, t.hideSubtitleNPath_img, t.hideSubtitleSPath_str, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.buttons_ar.push(s.subtitleButton_do), s.subtitleButton_do.setY(parseInt((s.stageHeight - s.subtitleButton_do.h) / 2)), s.subtitleButton_do.addListener(FWDUVPComplexButton.MOUSE_UP, s.subtitleButtonMouseUpHandler), s.mainHolder_do.addChild(s.subtitleButton_do), s.setupSubtitleButtons(), -1 != location.protocol.indexOf("file:") && s.disableSubtitleButton(), o.subtitle_do.showSubtitileByDefault_bl && s.subtitleButton_do.setButtonState(0)
			}, this.subtitleButtonMouseUpHandler = function () {
				s.areSubtitleButtonsShowed_bl ? s.hideSubtitleButtons(!0) : s.showSubtitleButtons(!0)
			}, this.disableSubtitleButton = function () {
				s.subtitleButton_do && s.subtitleButton_do.disable()
			}, this.enableSubtitleButton = function () {
				s.subtitleButton_do && s.subtitleButton_do.enable()
			}, this.updateSubtitleButtons = function (e, t) {
				s.subtitleButton_do && (s.subtitlesSource_ar = e, s.positionAndResizeSubtitleButtons(e), setTimeout(function () {
					t = s.subtitlesSource_ar.length - 1 - t, s.disableSubtitleButtons(t)
				}, 65), s.prevSubtitleIndex = t)
			}, this.setupSubtitleButtons = function () {
				var e, i;
				(s.subtitlesButtonsHolder_do = new FWDUVPDisplayObject("div"), s.subtitlesButtonsHolder_do.setOverflow("visible"), s.repeatBackground_bl) ? s.subtitlesButtonsHolder_do.getStyle().background = "url('" + s.controllerBkPath_str + "')": (s.subtitlesButtonsBackground_do = new FWDUVPDisplayObject("img"), (e = new Image).src = s.controllerBkPath_str, s.subtitlesButtonsBackground_do.setScreen(e), s.subtitlesButtonsHolder_do.addChild(s.subtitlesButtonsBackground_do));
				s.subtitlesButtonsHolder_do.setX(300), s.subtitlesButtonsHolder_do.setY(-300), o.videoHolder_do.addChild(s.subtitlesButtonsHolder_do, 0), (e = new Image).src = s.ytbQualityButtonPointerPath_str, s.subtitlesPonter_do = new FWDUVPDisplayObject("img"), s.subtitlesPonter_do.setScreen(e), s.subtitlesPonter_do.setWidth(s.pointerWidth), s.subtitlesPonter_do.setHeight(s.pointerHeight), s.subtitlesButtonsHolder_do.addChild(s.subtitlesPonter_do), (e = new Image).src = s.youtubeQualityArrowPath_str, s.subtitleQualityArrow_do = new FWDUVPDisplayObject("img"), s.subtitleQualityArrow_do.setScreen(e), s.subtitleQualityArrow_do.setX(7), s.subtitleQualityArrow_do.setWidth(5), s.subtitleQualityArrow_do.setHeight(7), s.subtitlesButtonsHolder_do.addChild(s.subtitleQualityArrow_do);
				for (var l = 0; l < s.totalSubttleButtons; l++) FWDUVPYTBQButton.setPrototype(), (i = new FWDUVPYTBQButton("no source", s.youtubeQualityButtonNormalColor_str, s.youtubeQualityButtonSelectedColor_str, t.hdPath_str, l)).addListener(FWDUVPYTBQButton.MOUSE_OVER, s.sbtQualityOver), i.addListener(FWDUVPYTBQButton.MOUSE_OUT, s.sbtQualityOut), i.addListener(FWDUVPYTBQButton.CLICK, s.sbtQualityClick), s.subtitleButtons_ar[l] = i, s.subtitlesButtonsHolder_do.addChild(i);
				s.hideSubtitleButtons(!1)
			}, this.sbtQualityOver = function (e) {
				s.setSubtitleArrowPosition(e.target)
			}, this.sbtQualityOut = function (e) {
				s.setSubtitleArrowPosition(void 0)
			}, this.sbtQualityClick = function (t) {
				s.startAtSubtitle = t.id, s.disableSubtitleButtons(s.startAtSubtitle), s.hideSubtitleButtons(!0), s.dispatchEvent(e.CHANGE_SUBTITLE, {
					id: s.subtitlesSource_ar.length - 1 - t.id
				})
			}, this.positionAndResizeSubtitleButtons = function (e) {
				if (e) {
					var t = e.length;
					if (s.prevSubtitlesQualityButtonsLength != t) {
						var o;
						this.prevSubtitlesQualityButtonsLength = t;
						for (var i = 5, l = 0, n = 0, r = 0; r < t; r++)(o = s.subtitleButtons_ar[r]).updateText(e[r].label), o.setFinalSize();
						setTimeout(function () {
							for (var e = 0; e < s.totalSubttleButtons; e++) o = s.subtitleButtons_ar[e], e < t ? (0 != o.x && o.setX(0), o.w > l && (l = o.w), o.setY(i), i += o.h) : -3e3 != o.x && o.setX(-3e3);
							for (e = 0; e < s.totalSubttleButtons; e++)(o = s.subtitleButtons_ar[e]).dumy_do.w < l && (o.setWidth(l), o.dumy_do.setWidth(l));
							n = i + 5, s.subtitlesPonter_do.setX(parseInt((l - s.subtitlesPonter_do.w) / 2)), s.subtitlesPonter_do.setY(n), s.subtitlesButtonsBackground_do && (s.subtitlesButtonsBackground_do.setWidth(l), s.subtitlesButtonsBackground_do.setHeight(n)), s.subtitlesButtonsHolder_do.setWidth(l), s.subtitlesButtonsHolder_do.setHeight(n)
						}, 60)
					}
				}
			}, this.disableSubtitleButtons = function (e) {
				for (var t = 0; t < s.totalSubttleButtons; t++) btn = s.subtitleButtons_ar[t], t == e ? (FWDAnimation.killTweensOf(s.subtitleQualityArrow_do), s.subtitleQualityArrow_do.setY(btn.y + parseInt((btn.h - s.subtitleQualityArrow_do.h) / 2) + 1), btn.disable(), s.subtitleDisabledButton_do = btn) : btn.enable();
				s.subtitlesSource_ar.length - 1 - e == 0 ? s.subtitleButton_do.setButtonState(0) : s.subtitleButton_do.setButtonState(1)
			}, this.setSubtitleArrowPosition = function (e) {
				var t = 0;
				t = e ? e.y + parseInt((e.h - s.subtitleQualityArrow_do.h) / 2) : s.subtitleDisabledButton_do.y + parseInt((s.subtitleDisabledButton_do.h - s.subtitleQualityArrow_do.h) / 2), FWDAnimation.killTweensOf(s.subtitleQualityArrow_do), FWDAnimation.to(s.subtitleQualityArrow_do, .6, {
					y: t,
					delay: .1,
					ease: Expo.easeInOut
				})
			}, this.showSubtitleButtons = function (e) {
				if (!s.areSubtitleButtonsShowed_bl) {
					s.hideQualityButtons(), s.areSubtitleButtonsShowed_bl = !0;
					var t = parseInt(s.subtitleButton_do.x + parseInt(s.subtitleButton_do.w - s.subtitlesButtonsHolder_do.w) / 2),
						i = parseInt(o.tempVidStageHeight - s.stageHeight - s.subtitlesButtonsHolder_do.h - 6);
					s.hasPointerEvent_bl ? window.addEventListener("pointerdown", s.hideSubtitlesButtonsHandler) : (s.isMobile_bl || window.addEventListener("mousedown", s.hideSubtitlesButtonsHandler), window.addEventListener("touchstart", s.hideSubtitlesButtonsHandler)), s.subtitlesButtonsHolder_do.setX(t), e ? FWDAnimation.to(s.subtitlesButtonsHolder_do, .6, {
						y: i,
						ease: Expo.easeInOut
					}) : (FWDAnimation.killTweensOf(s.subtitlesButtonsHolder_do), s.subtitlesButtonsHolder_do.setY(i))
				}
			}, this.hideSubtitleButtons = function (e) {
				s.areSubtitleButtonsShowed_bl && s.subtitlesButtonsHolder_do && (s.areSubtitleButtonsShowed_bl = !1, e ? FWDAnimation.to(s.subtitlesButtonsHolder_do, .6, {
					y: o.stageHeight,
					ease: Expo.easeInOut
				}) : (FWDAnimation.killTweensOf(s.subtitlesButtonsHolder_do), s.subtitlesButtonsHolder_do.setY(o.stageHeight)), s.hasPointerEvent_bl ? window.removeEventListener("pointerdown", s.hideSubtitlesButtonsHandler) : (s.isMobile_bl || window.removeEventListener("mousedown", s.hideSubtitlesButtonsHandler), window.removeEventListener("touchstart", s.hideSubtitlesButtonsHandler)))
			}, this.hideSubtitlesButtonsHandler = function (e) {
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				FWDUVPUtils.hitTest(s.subtitleButton_do.screen, t.screenX, t.screenY) || FWDUVPUtils.hitTest(s.subtitlesButtonsHolder_do.screen, t.screenX, t.screenY) || s.hideSubtitleButtons(!0)
			}, this.setupYoutubeQualityButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.ytbQualityButton_do = new FWDUVPSimpleButton(s.ytbQualityN_img, t.ytbQualitySPath_str, t.ytbQualityDPath_str, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.ytbQualityButton_do.setX(-300), s.ytbQualityButton_do.setY(parseInt((s.stageHeight - s.ytbQualityButton_do.h) / 2)), s.ytbQualityButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.ytbQualityMouseUpHandler), s.mainHolder_do.addChild(s.ytbQualityButton_do)
			}, this.ytbQualityMouseUpHandler = function () {
				s.areYtbQualityButtonsShowed_bl ? (s.hideQualityButtons(!0), s.isMainScrubberOnTop_bl && (s.mainScrubber_do.setX(0), FWDAnimation.to(s.mainScrubber_do, .6, {
					alpha: 1
				}))) : s.showQualityButtons(!0)
			}, this.hideQualityButtonsHandler = function (e) {
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				FWDUVPUtils.hitTest(s.ytbQualityButton_do.screen, t.screenX, t.screenY) || FWDUVPUtils.hitTest(s.ytbButtonsHolder_do.screen, t.screenX, t.screenY) || (s.hideQualityButtons(!0), s.isMainScrubberOnTop_bl && (s.mainScrubber_do.setX(0), FWDAnimation.to(s.mainScrubber_do, .6, {
					alpha: 1
				})))
			}, this.addYtbQualityButton = function () {
				!s.hasYtbButton_bl && s.showYoutubeQualityButton_bl && (s.hasYtbButton_bl = !0, s.embedButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.downloadButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.downloadButton_do) + 1, 0, s.ytbQualityButton_do) : s.embedButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.embedButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.embedButton_do) + 1, 0, s.ytbQualityButton_do) : s.shareButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.shareButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.shareButton_do) + 1, 0, s.ytbQualityButton_do) : s.fullScreenButton_do && -1 != FWDUVPUtils.indexOfArray(s.buttons_ar, s.fullScreenButton_do) ? s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.fullScreenButton_do), 0, s.ytbQualityButton_do) : s.buttons_ar.splice(s.buttons_ar.length, 0, s.ytbQualityButton_do), s.ytbQualityButton_do.disable(), s.ytbQualityButton_do.rotation = 0, s.ytbQualityButton_do.setRotation(s.ytbQualityButton_do.rotation), s.ytbQualityButton_do.hideDisabledState(), s.hideQualityButtons(!1), s.positionButtons())
			}, this.removeYtbQualityButton = function () {
				s.hasYtbButton_bl && s.showYoutubeQualityButton_bl && (s.hasYtbButton_bl = !1, s.buttons_ar.splice(FWDUVPUtils.indexOfArray(s.buttons_ar, s.ytbQualityButton_do), 1), s.ytbQualityButton_do.setX(-300), s.ytbQualityButton_do.hideDisabledState(), s.hideQualityButtons(!1), s.positionButtons())
			}, this.updateQuality = function (e, t) {
				s.hasYtbButton_bl && s.showYoutubeQualityButton_bl && (s.positionAndResizeYtbQualityButtons(e), setTimeout(function () {
					s.disableQualityButtons(t)
				}, 300))
			}, this.setupInfoButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.infoButton_do = new FWDUVPSimpleButton(s.infoN_img, t.infoSPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.infoButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, s.infoButtonShowToolTipHandler), s.infoButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.infoButtonOnMouseUpHandler), s.infoButton_do.setX(-300), s.infoButton_do.setY(parseInt((s.stageHeight - s.infoButton_do.h) / 2)), s.mainHolder_do.addChild(s.infoButton_do)
			}, this.infoButtonShowToolTipHandler = function (e) {
				s.showToolTip(s.infoButton_do, s.infoButtonToolTip_do, e.e)
			}, this.infoButtonOnMouseUpHandler = function () {
				s.dispatchEvent(e.SHOW_INFO_WINDOW)
			}, this.setupDownloadButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.downloadButton_do = new FWDUVPSimpleButton(s.downloadN_img, t.downloadSPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.downloadButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, s.downloadButtonShowToolTipHandler), s.downloadButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.downloadButtonOnMouseUpHandler), s.downloadButton_do.setX(-300), s.downloadButton_do.setY(parseInt((s.stageHeight - s.downloadButton_do.h) / 2)), s.mainHolder_do.addChild(s.downloadButton_do)
			}, this.downloadButtonShowToolTipHandler = function (e) {
				s.showToolTip(s.downloadButton_do, s.downloadButtonToolTip_do, e.e)
			}, this.downloadButtonOnMouseUpHandler = function () {
				s.dispatchEvent(e.DOWNLOAD_VIDEO)
			}, this.setupShareButton = function () {
				FWDUVPSimpleButton.setPrototype(), s.shareButton_do = new FWDUVPSimpleButton(t.shareN_img, t.shareSPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.buttons_ar.push(s.shareButton_do), s.shareButton_do.setY(parseInt((s.stageHeight - s.shareButton_do.h) / 2)), s.shareButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, s.facebookButtonShowTooltipHandler), s.shareButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.facebookButtonMouseUpHandler), s.mainHolder_do.addChild(s.shareButton_do)
			}, this.facebookButtonShowTooltipHandler = function (e) {
				s.showToolTip(s.shareButton_do, s.facebookButtonToolTip_do, e.e)
			}, this.facebookButtonMouseUpHandler = function () {
				s.dispatchEvent(e.SHOW_SHARE_WINDOW)
			}, this.setupFullscreenButton = function () {
				FWDUVPComplexButton.setPrototype(), s.fullScreenButton_do = new FWDUVPComplexButton(s.fullScreenN_img, t.fullScreenSPath_str, s.normalScreenN_img, t.normalScreenSPath_str, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.buttons_ar.push(s.fullScreenButton_do), s.fullScreenButton_do.setY(parseInt((s.stageHeight - s.fullScreenButton_do.buttonHeight) / 2)), s.fullScreenButton_do.addListener(FWDUVPComplexButton.SHOW_TOOLTIP, s.fullscreenButtonShowToolTipHandler), s.fullScreenButton_do.addListener(FWDUVPComplexButton.MOUSE_UP, s.fullScreenButtonMouseUpHandler), s.mainHolder_do.addChild(s.fullScreenButton_do)
			}, this.fullscreenButtonShowToolTipHandler = function (e) {
				s.showToolTip(s.fullScreenButton_do, s.fullscreenButtonToolTip_do, e.e)
			}, this.showFullScreenButton = function () {
				s.fullScreenButton_do && s.fullScreenButton_do.setButtonState(1)
			}, this.showNormalScreenButton = function () {
				s.fullScreenButton_do && s.fullScreenButton_do.setButtonState(0)
			}, this.setNormalStateToFullScreenButton = function () {
				s.fullScreenButton_do && (s.fullScreenButton_do.setNormalState(), s.hideQualityButtons(!1))
			}, this.fullScreenButtonMouseUpHandler = function () {
				s.fullscreenButtonToolTip_do && s.fullscreenButtonToolTip_do.hide(), 1 == s.fullScreenButton_do.currentState ? s.dispatchEvent(e.FULL_SCREEN) : s.dispatchEvent(e.NORMAL_SCREEN)
			}, this.setupTime = function () {
				s.time_do = new FWDUVPDisplayObject("div"), s.time_do.hasTransform3d_bl = !1, s.time_do.hasTransform2d_bl = !1, s.time_do.setBackfaceVisibility(), s.time_do.getStyle().fontFamily = "Arial", s.time_do.getStyle().fontSize = "12px", s.time_do.getStyle().whiteSpace = "nowrap", s.time_do.getStyle().textAlign = "center", s.time_do.getStyle().color = s.timeColor_str, s.time_do.getStyle().fontSmoothing = "antialiased", s.time_do.getStyle().webkitFontSmoothing = "antialiased", s.time_do.getStyle().textRendering = "optimizeLegibility", s.mainHolder_do.addChild(s.time_do), s.updateTime("00:00/00:00"), s.buttons_ar.push(s.time_do)
			}, this.updateTime = function (e) {
				s.time_do && (s.time_do.setInnerHTML(e), s.lastTimeLength != e.length && (s.time_do.w = s.time_do.getWidth(), s.positionButtons(), setTimeout(function () {
					s.time_do.w = s.time_do.getWidth(), s.time_do.h = s.time_do.getHeight(), s.time_do.setY(parseInt((s.stageHeight - s.time_do.h) / 2) + 1 + s.timeOffsetTop), s.positionButtons()
				}, 50), s.lastTimeLength = e.length))
			}, this.setupVolumeButton = function () {
				FWDUVPVolumeButton.setPrototype(), s.volumeButton_do = new FWDUVPVolumeButton(s.volumeN_img, t.volumeSPath_str, t.volumeDPath_str, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.volumeButton_do.addListener(FWDUVPVolumeButton.SHOW_TOOLTIP, s.volumeButtonShowTooltipHandler), s.volumeButton_do.addListener(FWDUVPVolumeButton.MOUSE_OVER, s.volumeOnMouseOverHandler), s.volumeButton_do.addListener(FWDUVPVolumeButton.MOUSE_UP, s.volumeOnMouseUpHandler), s.volumeButton_do.setY(parseInt((s.stageHeight - s.volumeButton_do.h) / 2)), s.buttons_ar.push(s.volumeButton_do), s.mainHolder_do.addChild(s.volumeButton_do), s.allowToChangeVolume_bl || s.volumeButton_do.disable()
			}, this.volumeButtonShowTooltipHandler = function (e) {}, this.volumeOnMouseOverHandler = function () {
				s.showVolumeScrubber(!0), s.hideQualityButtons(!0), s.isMainScrubberOnTop_bl && FWDAnimation.to(s.mainScrubber_do, .4, {
					alpha: 0,
					onComplete: function () {
						s.mainScrubber_do.setX(-5e3)
					}
				})
			}, this.volumeOnMouseUpHandler = function () {
				var e = s.lastVolume;
				s.isMute_bl ? (e = s.lastVolume, s.isMute_bl = !1) : (e = 1e-6, s.isMute_bl = !0), s.updateVolume(e)
			}, this.setupVolumeScrubber = function () {
				if (s.volumeScrubberHolder_do = new FWDUVPDisplayObject("div"), s.repeatBackground_bl) s.volumeBk_do = new FWDUVPDisplayObject("div"), s.volumeBk_do.getStyle().background = "url('" + s.controllerBkPath_str + "')";
				else {
					s.volumeBk_do = new FWDUVPDisplayObject("img");
					var e = new Image;
					e.src = s.controllerBkPath_str, s.volumeBk_do.setScreen(e)
				}
				s.volumeScrubberHolder_do.addChild(s.volumeBk_do), s.volumeScrubber_do = new FWDUVPDisplayObject("div"), s.volumeScrubber_do.setHeight(s.mainScrubberHeight), s.volumeScrubber_do.setY(parseInt(s.volumeScrubberOfsetHeight / 2));
				var o = new Image;
				o.src = t.volumeScrubberBkBottomPath_str, s.volumeScrubberBkBottom_do = new FWDUVPDisplayObject("img"), s.volumeScrubberBkBottom_do.setScreen(o), s.volumeScrubberBkBottom_do.setWidth(s.mainScrubberBkLeft_img.height), s.volumeScrubberBkBottom_do.setHeight(s.mainScrubberBkLeft_img.width), s.volumeScrubberBkBottom_do.setY(s.volumeScrubberHeight - s.volumeScrubberOfsetHeight - s.volumeScrubberBkBottom_do.h);
				var i = new Image;
				i.src = t.volumeScrubberBkTopPath_str, s.volumeScrubberBkTop_do = new FWDUVPDisplayObject("img"), s.volumeScrubberBkTop_do.setScreen(i), s.volumeScrubberBkTop_do.setWidth(s.volumeScrubberBkBottom_do.w), s.volumeScrubberBkTop_do.setHeight(s.volumeScrubberBkBottom_do.h);
				var l = new Image;
				l.src = t.volumeScrubberBkMiddlePath_str, s.isMobile_bl ? (s.volumeScrubberBkMiddle_do = new FWDUVPDisplayObject("div"), s.volumeScrubberBkMiddle_do.getStyle().background = "url('" + s.volumeScrubberBkMiddlePath_str + "') repeat-x") : (s.volumeScrubberBkMiddle_do = new FWDUVPDisplayObject("img"), s.volumeScrubberBkMiddle_do.setScreen(l)), s.volumeScrubberBkMiddle_do.setWidth(s.volumeScrubberBkBottom_do.w), s.volumeScrubberBkMiddle_do.setHeight(s.volumeScrubberHeight - s.volumeScrubberOfsetHeight - 2 * s.volumeScrubberBkTop_do.h), s.volumeScrubberBkMiddle_do.setY(s.volumeScrubberBkTop_do.h), s.volumeScrubberDrag_do = new FWDUVPDisplayObject("div"), s.volumeScrubberDrag_do.setWidth(s.volumeScrubberBkBottom_do.w), s.useHEXColorsForSkin_bl ? (s.volumeScrubberDragBottom_do = new FWDUVPDisplayObject("div"), s.volumeScrubberDragBottom_do.setWidth(s.volumeScrubberDragBottom_img.width), s.volumeScrubberDragBottom_do.setHeight(s.volumeScrubberDragBottom_img.height), s.volumeScrubberDragBottom_canvas = FWDUVPUtils.getCanvasWithModifiedColor(s.volumeScrubberDragBottom_img, s.normalButtonsColor_str).canvas, s.volumeScrubberDragBottom_do.screen.appendChild(s.volumeScrubberDragBottom_canvas)) : (s.volumeScrubberDragBottom_do = new FWDUVPDisplayObject("img"), s.volumeScrubberDragBottom_do.setScreen(s.volumeScrubberDragBottom_img)), s.volumeScrubberDragBottom_do.setWidth(s.mainScrubberDragLeft_img.height), s.volumeScrubberDragBottom_do.setHeight(s.mainScrubberDragLeft_img.width), s.volumeScrubberDragBottom_do.setY(s.volumeScrubberHeight - s.volumeScrubberOfsetHeight - s.volumeScrubberDragBottom_do.h), s.middleImage = new Image, s.middleImage.src = s.volumeScrubberDragMiddlePath_str, s.useHEXColorsForSkin_bl ? (s.volumeScrubberDragMiddle_do = new FWDUVPDisplayObject("div"), s.middleImage.onload = function () {
					s.volumeScrubberDragMiddle_canvas = FWDUVPUtils.getCanvasWithModifiedColor(s.middleImage, s.normalButtonsColor_str, !0), s.volumeScrubberDragImage_img = s.volumeScrubberDragMiddle_canvas.image, s.volumeScrubberDragMiddle_do.getStyle().background = "url('" + s.volumeScrubberDragImage_img.src + "') repeat-y"
				}) : (s.volumeScrubberDragMiddle_do = new FWDUVPDisplayObject("img"), s.volumeScrubberDragMiddle_do.setScreen(s.middleImage)), s.volumeScrubberDragMiddle_do.setWidth(s.volumeScrubberDragBottom_do.w), s.volumeScrubberDragMiddle_do.setHeight(s.volumeScrubberHeight);
				var n = new Image;
				n.src = t.volumeScrubberLinePath_str, s.volumeScrubberBarLine_do = new FWDUVPDisplayObject("img"), s.volumeScrubberBarLine_do.setScreen(n), s.volumeScrubberBarLine_do.setWidth(s.mainScrubberLine_img.height), s.volumeScrubberBarLine_do.setHeight(s.mainScrubberLine_img.width), s.volumeScrubberBarLine_do.setAlpha(0), s.volumeScrubberBarLine_do.hasTransform3d_bl = !1, s.volumeScrubberBarLine_do.hasTransform2d_bl = !1, s.volumeScrubberHolder_do.setWidth(s.volumeScrubberWidth), s.volumeScrubberHolder_do.setHeight(s.volumeScrubberHeight + s.stageHeight), s.volumeBk_do.setWidth(s.volumeScrubberWidth), s.volumeBk_do.setHeight(s.volumeScrubberHeight + s.stageHeight), s.volumeScrubber_do.setWidth(s.volumeScrubberWidth), s.volumeScrubber_do.setHeight(s.volumeScrubberHeight - s.volumeScrubberOfsetHeight), s.volumeScrubber_do.addChild(s.volumeScrubberBkBottom_do), s.volumeScrubber_do.addChild(s.volumeScrubberBkMiddle_do), s.volumeScrubber_do.addChild(s.volumeScrubberBkTop_do), s.volumeScrubber_do.addChild(s.volumeScrubberBarLine_do), s.volumeScrubber_do.addChild(s.volumeScrubberDragBottom_do), s.volumeScrubberDrag_do.addChild(s.volumeScrubberDragMiddle_do), s.volumeScrubber_do.addChild(s.volumeScrubberDrag_do), s.volumeScrubber_do.addChild(s.volumeScrubberBarLine_do), s.volumeScrubberHolder_do.addChild(s.volumeScrubber_do), s.addChild(s.volumeScrubberHolder_do), s.allowToChangeVolume_bl && (s.isMobile_bl ? s.hasPointerEvent_bl ? (s.volumeScrubber_do.screen.addEventListener("pointerover", s.volumeScrubberOnOverHandler), s.volumeScrubber_do.screen.addEventListener("pointerout", s.volumeScrubberOnOutHandler), s.volumeScrubber_do.screen.addEventListener("pointerdown", s.volumeScrubberOnDownHandler)) : s.volumeScrubber_do.screen.addEventListener("touchstart", s.volumeScrubberOnDownHandler) : s.screen.addEventListener && (s.volumeScrubber_do.screen.addEventListener("mouseover", s.volumeScrubberOnOverHandler), s.volumeScrubber_do.screen.addEventListener("mouseout", s.volumeScrubberOnOutHandler), s.volumeScrubber_do.screen.addEventListener("mousedown", s.volumeScrubberOnDownHandler))), s.enableVolumeScrubber(), s.updateVolumeScrubber(s.volume)
			}, this.volumeScrubberOnOverHandler = function (e) {
				s.isVolumeScrubberDisabled_bl
			}, this.volumeScrubberOnOutHandler = function (e) {
				s.isVolumeScrubberDisabled_bl
			}, this.volumeScrubberOnDownHandler = function (e) {
				if (!s.isVolumeScrubberDisabled_bl && 2 != e.button) {
					e.preventDefault && e.preventDefault(), s.volumeScrubberIsDragging_bl = !0;
					var t = FWDUVPUtils.getViewportMouseCoordinates(e).screenY - s.volumeScrubber_do.getGlobalY();
					o.showDisable(), t < 0 ? t = 0 : t > s.volumeScrubber_do.h - s.scrubbersOffsetWidth && (t = s.volumeScrubber_do.h - s.scrubbersOffsetWidth);
					var i = 1 - t / s.volumeScrubber_do.h;
					s.lastVolume = i, s.updateVolume(i), s.isMobile_bl ? s.hasPointerEvent_bl ? (window.addEventListener("MSPointerMove", s.volumeScrubberMoveHandler), window.addEventListener("pointerup", s.volumeScrubberEndHandler)) : (window.addEventListener("touchmove", s.volumeScrubberMoveHandler), window.addEventListener("touchend", s.volumeScrubberEndHandler)) : window.addEventListener ? (window.addEventListener("mousemove", s.volumeScrubberMoveHandler), window.addEventListener("mouseup", s.volumeScrubberEndHandler)) : document.attachEvent && (document.attachEvent("onmousemove", s.volumeScrubberMoveHandler), document.attachEvent("onmouseup", s.volumeScrubberEndHandler))
				}
			}, this.volumeScrubberMoveHandler = function (e) {
				if (!s.isVolumeScrubberDisabled_bl) {
					e.preventDefault && e.preventDefault();
					var t = FWDUVPUtils.getViewportMouseCoordinates(e).screenY - s.volumeScrubber_do.getGlobalY();
					t < s.scrubbersOffsetWidth ? t = s.scrubbersOffsetWidth : t > s.volumeScrubber_do.h && (t = s.volumeScrubber_do.h);
					var o = 1 - t / s.volumeScrubber_do.h;
					s.lastVolume = o, s.updateVolume(o)
				}
			}, this.volumeScrubberEndHandler = function () {
				o.hideDisable(), s.volumeScrubberIsDragging_bl = !1, s.isMobile_bl ? s.hasPointerEvent_bl ? (window.removeEventListener("MSPointerMove", s.volumeScrubberMoveHandler), window.removeEventListener("pointerup", s.volumeScrubberEndHandler)) : (window.removeEventListener("touchmove", s.volumeScrubberMoveHandler), window.removeEventListener("touchend", s.volumeScrubberEndHandler)) : window.removeEventListener ? (window.removeEventListener("mousemove", s.volumeScrubberMoveHandler), window.removeEventListener("mouseup", s.volumeScrubberEndHandler)) : document.detachEvent && (document.detachEvent("onmousemove", s.volumeScrubberMoveHandler), document.detachEvent("onmouseup", s.volumeScrubberEndHandler))
			}, this.disableVolumeScrubber = function () {
				s.isVolumeScrubberDisabled_bl = !0, s.volumeScrubber_do.setButtonMode(!1), s.volumeScrubberEndHandler()
			}, this.enableVolumeScrubber = function () {
				s.isVolumeScrubberDisabled_bl = !1, s.volumeScrubber_do.setButtonMode(!0)
			}, this.updateVolumeScrubber = function (e) {
				var t = s.volumeScrubberHeight - s.volumeScrubberOfsetHeight,
					o = Math.round(e * t);
				s.volumeScrubberDrag_do.setHeight(Math.max(0, o - s.volumeScrubberDragBottom_do.h)), s.volumeScrubberDrag_do.setY(t - o), o < 1 && s.isVolumeScrubberLineVisible_bl ? (s.isVolumeScrubberLineVisible_bl = !1, FWDAnimation.to(s.volumeScrubberBarLine_do, .5, {
					alpha: 0
				}), FWDAnimation.to(s.volumeScrubberDragBottom_do, .5, {
					alpha: 0
				})) : o > 1 && !s.isVolumeScrubberLineVisible_bl && (s.isVolumeScrubberLineVisible_bl = !0, FWDAnimation.to(s.volumeScrubberBarLine_do, .5, {
					alpha: 1
				}), FWDAnimation.to(s.volumeScrubberDragBottom_do, .5, {
					alpha: 1
				})), o > t && (o = t), FWDAnimation.to(s.volumeScrubberBarLine_do, .8, {
					y: t - o - 2,
					ease: Expo.easeOut
				})
			}, this.updateVolume = function (t, o) {
				s.showVolumeScrubber_bl && (s.volume = t, s.volume <= 1e-6 ? (s.isMute_bl = !0, s.volume = 1e-6) : s.voume >= 1 ? (s.isMute_bl = !1, s.volume = 1) : s.isMute_bl = !1, 1e-6 == s.volume ? s.volumeButton_do && s.volumeButton_do.setDisabledState() : s.volumeButton_do && s.volumeButton_do.setEnabledState(), s.volumeScrubberBarLine_do && s.updateVolumeScrubber(s.volume), o || s.dispatchEvent(e.CHANGE_VOLUME, {
					percent: s.volume
				}))
			}, this.showVolumeScrubber = function (e) {
				if (!s.isVolumeScrubberShowed_bl) {
					s.isVolumeScrubberShowed_bl = !0;
					var t = -s.volumeScrubberHolder_do.h + s.h;
					s.volumeScrubberHolder_do.setVisible(!0), window.addEventListener ? window.addEventListener("mousemove", s.hideVolumeSchubberOnMoveHandler) : document.attachEvent && (document.detachEvent("onmousemove", s.hideVolumeSchubberOnMoveHandler), document.attachEvent("onmousemove", s.hideVolumeSchubberOnMoveHandler)), s.volumeScrubberHolder_do.setX(parseInt(s.volumeButton_do.x + (s.volumeButton_do.w - s.volumeScrubberHolder_do.w) / 2)), e ? FWDAnimation.to(s.volumeScrubberHolder_do, .6, {
						y: t,
						ease: Expo.easeInOut
					}) : (FWDAnimation.killTweensOf(s.volumeScrubberHolder_do), s.volumeScrubberHolder_do.setY(t))
				}
			}, this.hideVolumeSchubberOnMoveHandler = function (e) {
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				FWDUVPUtils.hitTest(s.volumeScrubberHolder_do.screen, t.screenX, t.screenY) || FWDUVPUtils.hitTest(s.volumeButton_do.screen, t.screenX, t.screenY) || s.volumeScrubberIsDragging_bl || (s.hideVolumeScrubber(!0), s.isMainScrubberOnTop_bl && (s.mainScrubber_do.setX(0), FWDAnimation.to(s.mainScrubber_do, .6, {
					alpha: 1
				})))
			}, this.hideVolumeScrubber = function (e) {
				s.isVolumeScrubberShowed_bl && (s.isVolumeScrubberShowed_bl = !1, s.volumeButton_do.setNormalState(!0), e ? FWDAnimation.to(s.volumeScrubberHolder_do, .6, {
					y: o.stageHeight,
					ease: Expo.easeInOut,
					onComplete: function () {
						s.volumeScrubberHolder_do.setVisible(!1)
					}
				}) : (FWDAnimation.killTweensOf(s.ytbButtonsHolder_do), s.volumeScrubberHolder_do.setY(o.stageHeight), s.volumeScrubberHolder_do.setVisible(!1)), window.removeEventListener ? window.removeEventListener("mousemove", s.hideVolumeSchubberOnMoveHandler) : document.detachEvent && document.detachEvent("onmousemove", s.hideVolumeSchubberOnMoveHandler))
			}, this.show = function (e) {
				s.isShowed_bl || (s.isShowed_bl = !0, s.setX(0), e ? FWDAnimation.to(s.mainHolder_do, .8, {
					y: 0,
					ease: Expo.easeInOut
				}) : (FWDAnimation.killTweensOf(s.mainHolder_do), s.mainHolder_do.setY(0)), setTimeout(s.positionButtons, 200))
			}, this.hide = function (e, t) {
				s.isShowed_bl && (t || (t = 0), s.isShowed_bl = !1, e ? FWDAnimation.to(s.mainHolder_do, .8, {
					y: s.stageHeight + t,
					ease: Expo.easeInOut,
					onComplete: function () {
						t && s.setX(-5e3)
					}
				}) : (FWDAnimation.killTweensOf(s.mainHolder_do), t && s.setX(-5e3), s.mainHolder_do.setY(s.stageHeight + t)), s.hideQualityButtons(!0), s.hideSubtitleButtons(!0), s.hidePlaybackRateButtons(!0))
			}, this.mainScrubberDragMiddleAddPath_str = t.mainScrubberDragMiddleAddPath_str, this.updateHexColorForScrubber = function (e) {
				e ? (s.mainScrubberDragMiddle_do.getStyle().background = "url('" + s.mainScrubberDragMiddleAddPath_str + "') repeat-x", s.mainScrubberDragLeft_do.screen.src = t.mainScrubberDragLeftAddPath_str) : (s.mainScrubberDragMiddle_do.getStyle().background = "url('" + s.mainScrubberDragMiddlePath_str + "') repeat-x", s.mainScrubberDragLeft_do.screen.src = s.mainScrubberDragLeftSource)
			}, s.updateHEXColors = function (e, t) {
				s.normalColor_str = e, s.selectedColor_str = t, FWDUVPUtils.changeCanvasHEXColor(s.mainScrubberDragLeft_img, s.mainScrubberDragLeft_canvas, e);
				try {
					FWDUVPUtils.changeCanvasHEXColor(s.volumeScrubberDragBottom_img, s.volumeScrubberDragBottom_canvas, e)
				} catch (e) {}
				var o = FWDUVPUtils.changeCanvasHEXColor(s.mainScrubberMiddleImage, s.mainSCrubberMiddleCanvas, e, !0);
				s.mainScrubberDragMiddle_do.getStyle().background = "url('" + o.src + "') repeat-x";
				try {
					s.volumeScrubberDragMiddle_do && (s.volumeScrubberDragMiddle_do.getStyle().background = "url('" + s.volumeScrubberDragImage_img.src + "') repeat-y");
					var i = FWDUVPUtils.changeCanvasHEXColor(s.middleImage, s.volumeScrubberDragMiddle_canvas.canvas, e, !0);
					s.volumeScrubberDragMiddle_do.getStyle().background = "url('" + i.src + "') repeat-y"
				} catch (e) {}
				if (s.playPauseButton_do.updateHEXColors(e, t), s.subtitleButton_do && s.subtitleButton_do.updateHEXColors(e, t), s.playbackRateButton_do && s.playbackRateButton_do.updateHEXColors(e, t), s.volumeButton_do && s.volumeButton_do.updateHEXColors(e, t), s.playlistButton_do && s.playlistButton_do.updateHEXColors(e, t), s.downloadButton_do && s.downloadButton_do.updateHEXColors(e, t), s.infoButton_do && s.infoButton_do.updateHEXColors(e, t), s.categoriesButton_do && s.categoriesButton_do.updateHEXColors(e, t), s.ytbQualityButton_do && s.ytbQualityButton_do.updateHEXColors(e, t), s.shareButton_do && s.shareButton_do.updateHEXColors(e, t), s.embedButton_do && s.embedButton_do.updateHEXColors(e, t), s.fullScreenButton_do && s.fullScreenButton_do.updateHEXColors(e, t), s.time_do && (s.time_do.getStyle().color = e), s.ytbButtons_ar)
					for (var l = 0; l < s.totalYtbButtons; l++) {
						(n = s.ytbButtons_ar[l]).normalColor_str = e, n.selectedColor_str = t, n.isSelected_bl ? n.isSelected_bl || n.setSelectedState() : n.setNormalState()
					}
				if (s.playbackRateButtons_ar)
					for (l = 0; l < s.playbackRateButtons_ar.length; l++) {
						(n = s.playbackRateButtons_ar[l]).normalColor_str = e, n.selectedColor_str = t, n.isSelected_bl ? n.isSelected_bl || n.setSelectedState() : n.setNormalState()
					}
				if (s.subtitleButtons_ar)
					for (l = 0; l < s.totalSubttleButtons; l++) {
						var n;
						(n = s.subtitleButtons_ar[l]) && (n.normalColor_str = e, n.selectedColor_str = t, n.isSelected_bl ? n.setSelectedState() : n.setNormalState())
					}
			}, this.init()
		};
		e.setPrototype = function () {
			e.prototype = new FWDUVPDisplayObject("div")
		}, e.SHOW_SHARE_WINDOW = "showShareWindow", e.SHOW_SUBTITLE = "showSubtitle", e.HIDE_SUBTITLE = "hideSubtitle", e.SHOW_PLAYLIST = "showPlaylist", e.HIDE_PLAYLIST = "hidePlaylist", e.SHOW_CATEGORIES = "showCategories", e.DOWNLOAD_VIDEO = "downloadVideo", e.FULL_SCREEN = "fullScreen", e.NORMAL_SCREEN = "normalScreen", e.PLAY = "play", e.PAUSE = "pause", e.START_TO_SCRUB = "startToScrub", e.SCRUB = "scrub", e.STOP_TO_SCRUB = "stopToScrub", e.CHANGE_VOLUME = "changeVolume", e.CHANGE_YOUTUBE_QUALITY = "changeYoutubeQuality", e.SHOW_EMBED_WINDOW = "showEmbedWindow", e.SHOW_INFO_WINDOW = "showInfoWindow", e.CHANGE_SUBTITLE = "changeSubtitle", e.CHANGE_PLAYBACK_RATES = "changePlaybackRate", e.prototype = null, window.FWDUVPController = e
	}(), function (window) {
		var FWDUVPData = function (props, playListElement, parent) {
			var self = this,
				prototype = FWDUVPData.prototype;
			this.xhr = null, this.ytb = null, this.scs_el = null, this.dumy_img = null, this.mainPreloader_img = null, this.bkLeft_img = null, this.bkMiddle_img = null, this.bkRight_img = null, this.nextN_img = null, this.prevN_img = null, this.playN_img = null, this.pauseN_img = null, this.mainScrubberBkLeft_img = null, this.mainScrubberDragLeft_img = null, this.mainScrubberLine_img = null, this.volumeScrubberBkLeft_img = null, this.volumeScrubberDragLeft_img = null, this.volumeScrubberLine_img = null, this.volumeN_img = null, this.progressLeft_img = null, this.largePlayN_img = null, this.categoriesN_img = null, this.replayN_img = null, this.shuffleN_img = null, this.fullScreenN_img = null, this.ytbQualityN_img = null, this.ytbQualityD_img = null, this.facebookN_img = null, this.infoN_img = null, this.downloadN_img = null, this.normalScreenN_img = null, this.catNextN_img = null, this.catPrevN_img = null, this.catPrevD_img = null, this.hidePlaylistN_img = null, this.showPlaylistN_img = null, this.prevThumbsSetN_img = null, this.nextThumbsSetN_img = null, this.embedN_img = null, this.embedColoseN_img = null, this.scrLinesN_img = null, this.scrDragTop_img = null, this.scrLinesN_img = null, this.prevSPath_str = null, this.nextSPath_str = null, this.props_obj = props, this.skinPaths_ar = [], this.images_ar = [], this.cats_ar = [], this.catsRef_ar = [], this.youtubeObject_ar = null, this.skinPath_str = null, this.flashPath_str = null, this.flashCopyToCBPath_str = null, this.proxyPath_str = null, this.proxyFolderPath_str = null, this.mailPath_str = null, this.sendToAFriendPath_str = null, this.videoDownloaderPath_str = null, this.mainFolderPath_str = null, this.bkMiddlePath_str = null, this.hdPath_str = null, this.youtubeQualityArrowPath_str = null, this.mainScrubberBkMiddlePath_str = null, this.volumeScrubberBkMiddlePath_str = null, this.mainScrubberDragMiddlePath_str = null, this.volumeScrubberDragMiddlePath_str = null, this.timeColor_str = null, this.playlistPosition_str = null, this.progressMiddlePath_str = null, this.facebookAppId_str = null, this.ytbQualityButtonPointerPath_str = null, this.youtubeQualityButtonNormalColor_str = null, this.youtubeQualityButtonSelectedColor_str = null, this.controllerBkPath_str = null, this.logoPosition_str = null, this.logoPath_str = null, this.pauseSPath_str = null, this.playSPath_str = null, this.volumeSPath_str = null, this.volumeDPath_str = null, this.categoriesSPath_str = null, this.replaySPath_str = null, this.toopTipBk_str = null, this.toolTipsButtonFontColor_str = null, this.toopTipPointer_str = null, this.hidePlaylistSPath_str = null, this.showPlaylistSPath_str = null, this.prevThumbsSetSPath_str = null, this.nextThumbsSetSPath_str = null, this.playlistThumbnailsBackgroundPath_str = null, this.playlistToolTipPointerPath_str = null, this.playlistToolTipBackgroundPath_str = null, this.folderVideoLabel_str = null, this.embedPathS_str = null, this.embedCopyButtonNPath_str = null, this.embedWindowPathS_str = null, this.embedCopyButtonSPath_str = null, this.embedWindowBackground_str = null, this.sendButtonNPath_str = null, this.sendButtonSPath_str = null, this.shareAndEmbedTextColor_str = null, this.searchInputBackgroundColor_str = null, this.borderColor_str = null, this.searchInputColor_str = null, this.secondaryLabelsColor_str = null, this.mainLabelsColor_str = null, this.controllerHeight = 0, this.countLoadedSkinImages = 0, this.volume = 1, this.controllerHideDelay = 0, this.startSpaceBetweenButtons = 0, this.spaceBetweenButtons = 0, this.scrubbersOffsetWidth = 0, this.volumeScrubberOffsetTopWidth = 0, this.timeOffsetLeftWidth = 0, this.timeOffsetTop = 0, this.logoMargins = 0, this.startAtPlaylist = 0, this.startAtVideo = 0, this.playlistBottomHeight = 0, this.maxPlaylistItems = 0, this.totalPlaylists = 0, this.thumbnailMaxWidth = 0, this.buttonsMargins = 0, this.nextAndPrevSetButtonsMargins = 0, this.thumbnailMaxHeight = 0, this.horizontalSpaceBetweenThumbnails = 0, this.verticalSpaceBetweenThumbnails = 0, this.buttonsToolTipHideDelay = 0, this.thumbnailWidth = 0, this.thumbnailHeight = 0, this.timeOffsetTop = 0, this.embedWindowCloseButtonMargins = 0, this.loadImageId_to, this.dispatchLoadSkinCompleteWithDelayId_to, this.dispatchPlaylistLoadCompleteWidthDelayId_to, this.JSONPRequestTimeoutId_to, this.isYoutbe_bl = !1, this.showPlaylistsButtonAndPlaylists_bl = !1, this.showEmbedButton_bl = !1, this.showPlaylistButtonAndPlaylist_bl = !1, this.showPlaylistByDefault_bl = !1, this.showSearchInput_bl = !1, this.forceDisableDownloadButtonForFolder_bl = !1, this.allowToChangeVolume_bl = !0, this.showContextMenu_bl = !1, this.showButtonsToolTip_bl = !1, this.addMouseWheelSupport_bl = !1, this.addKeyboardSupport_bl = !1, this.autoPlay_bl = !1, this.showPoster_bl = !1, this.loop_bl = !1, this.shuffle_bl = !1, this.showLoopButton_bl = !1, this.showDownloadVideoButton_bl = !1, this.showInfoButton_bl = !1, this.showVolumeScrubber_bl = !1, this.showVolumeButton_bl = !1, this.showControllerWhenVideoIsStopped_bl = !1, this.showNextAndPrevButtonsInController_bl = !1, this.showLogo_bl = !1, this.hideLogoWithController_bl = !1, this.isPlaylistDispatchingError_bl = !1, this.useYoutube_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, self.init = function () {
				self.parseProperties()
			}, self.parseProperties = function (e) {
				if (self.useHEXColorsForSkin_bl = self.props_obj.useHEXColorsForSkin, self.useHEXColorsForSkin_bl = "yes" == self.useHEXColorsForSkin_bl, -1 != location.protocol.indexOf("file:") && (self.useHEXColorsForSkin_bl = !1), self.categoriesId_str = self.props_obj.playlistsId, self.categoriesId_str)
					if (self.mainFolderPath_str = self.props_obj.mainFolderPath, self.mainFolderPath_str)
						if (self.mainFolderPath_str.lastIndexOf("/") + 1 != self.mainFolderPath_str.length && (self.mainFolderPath_str += "/"), self.skinPath_str = self.props_obj.skinPath, self.skinPath_str)
							if (self.skinPath_str.lastIndexOf("/") + 1 != self.skinPath_str.length && (self.skinPath_str += "/"), self.skinPath_str = self.mainFolderPath_str + self.skinPath_str, self.flashPath_str = self.mainFolderPath_str + "flashlsChromeless.swf", self.flashCopyToCBPath_str = self.mainFolderPath_str + "cb.swf", self.proxyPath_str = self.mainFolderPath_str + "proxy.php", self.proxyFolderPath_str = self.mainFolderPath_str + "proxyFolder.php", self.mailPath_str = self.mainFolderPath_str + "sendMail.php", self.sendToAFriendPath_str = self.mainFolderPath_str + "sendMailToAFriend.php", self.videoDownloaderPath_str = self.mainFolderPath_str + "downloader.php", self.handPath_str = self.skinPath_str + "hand.cur", self.grabPath_str = self.skinPath_str + "grab.cur", self.categories_el = document.getElementById(self.categoriesId_str), self.categories_el) {
								var t = FWDUVPUtils.getChildren(self.categories_el);
								if (self.totalCats = t.length, 0 != self.totalCats) {
									for (var o = 0; o < self.totalCats; o++) {
										var s = {},
											i = null;
										if (child = t[o], !FWDUVPUtils.hasAttribute(child, "data-source")) return void setTimeout(function () {
											null != self && self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
												text: "Attribute <font color='#ff0000'>data-source</font> is required in the plalists html element at position <font color='#ff0000'>" + (o + 1)
											})
										}, 50);
										if (!FWDUVPUtils.hasAttribute(child, "data-thumbnail-path")) return void setTimeout(function () {
											null != self && self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
												text: "Attribute <font color='#ff0000'>data-thumbnail-path</font> is required in the playlists html element at position <font color='#ff0000'>" + (o + 1)
											})
										}, 50);
										s.source = FWDUVPUtils.getAttributeValue(child, "data-source"), i = -1 == s.source.indexOf("=") && -1 == s.source.indexOf(".xml") ? document.getElementById(s.source) : s.source, self.catsRef_ar.push(i), s.thumbnailPath = FWDUVPUtils.getAttributeValue(child, "data-thumbnail-path"), s.htmlContent = child.innerHTML, s.htmlText_str = child.innerText, FWDUVPUtils.hasAttribute(child, "data-playlist-name") ? s.playlistName = FWDUVPUtils.getAttributeValue(child, "data-playlist-name") : s.playlistName = "not defined!", self.cats_ar[o] = s
									}
									for (o = 0; o < self.totalCats; o++) {
										s = {}, i = null;
										child = t[o], i = document.getElementById(FWDUVPUtils.getAttributeValue(child, "data-source"))
									}
									self.startAtPlaylist = self.props_obj.startAtPlaylist || 0, isNaN(self.startAtPlaylist) && (self.startAtPlaylist = 0), self.startAtPlaylist < 0 ? self.startAtPlaylist = 0 : self.startAtPlaylist > self.totalCats - 1 && (self.startAtPlaylist = self.totalCats - 1), self.playlistBottomHeight = self.props_obj.playlistBottomHeight || 0, self.playlistBottomHeight = Math.min(800, self.playlistBottomHeight), self.subtitlesOffLabel_str = self.props_obj.subtitlesOffLabel || "Subtitle off", self.videoSourcePath_str = self.props_obj.videoSourcePath || void 0, self.timeColor_str = self.props_obj.timeColor || "#FF0000", self.youtubeQualityButtonNormalColor_str = self.props_obj.youtubeQualityButtonNormalColor || "#FF0000", self.youtubeQualityButtonSelectedColor_str = self.props_obj.youtubeQualityButtonSelectedColor || "#FF0000", self.posterBackgroundColor_str = self.props_obj.posterBackgroundColor || "transparent", self.showPlaylistButtonAndPlaylist_bl = self.props_obj.showPlaylistButtonAndPlaylist, self.showPlaylistButtonAndPlaylist_bl = "no" != self.showPlaylistButtonAndPlaylist_bl, self.stopAfterLastVideoHasPlayed_bl = self.props_obj.stopAfterLastVideoHasPlayed, self.stopAfterLastVideoHasPlayed_bl = "yes" == self.stopAfterLastVideoHasPlayed_bl, self.usePlaylistsSelectBox_bl = self.props_obj.usePlaylistsSelectBox, self.usePlaylistsSelectBox_bl = "yes" == self.usePlaylistsSelectBox_bl, self.executeCuepointsOnlyOnce_bl = self.props_obj.executeCuepointsOnlyOnce, self.executeCuepointsOnlyOnce_bl = "yes" == self.executeCuepointsOnlyOnce_bl, self.showPlaylistByDefault_bl = self.props_obj.showPlaylistByDefault, self.showPlaylistByDefault_bl = "no" != self.showPlaylistByDefault_bl, self.showThumbnail_bl = self.props_obj.showThumbnail, self.showThumbnail_bl = "no" != self.showThumbnail_bl, self.playAfterVideoStop_bl = self.props_obj.playAfterVideoStop, self.playAfterVideoStop_bl = "no" != self.playAfterVideoStop_bl, self.showAnnotationsPositionTool_bl = self.props_obj.showAnnotationsPositionTool, self.showAnnotationsPositionTool_bl = "yes" == self.showAnnotationsPositionTool_bl, self.showAnnotationsPositionTool_bl && (self.showPlaylistByDefault_bl = !1), self.showPlaylistName_bl = self.props_obj.showPlaylistName, self.showPlaylistName_bl = "no" != self.showPlaylistName_bl, self.showSearchInput_bl = self.props_obj.showSearchInput, self.showSearchInput_bl = "no" != self.showSearchInput_bl, self.showSubtitleByDefault_bl = self.props_obj.showSubtitleByDefault, self.showSubtitleByDefault_bl = "no" != self.showSubtitleByDefault_bl, self.showSubtitleButton_bl = self.props_obj.showSubtitleButton, self.showSubtitleButton_bl = "no" != self.showSubtitleButton_bl, self.forceDisableDownloadButtonForFolder_bl = self.props_obj.forceDisableDownloadButtonForFolder, self.forceDisableDownloadButtonForFolder_bl = "yes" == self.forceDisableDownloadButtonForFolder_bl, self.normalButtonsColor_str = self.props_obj.normalHEXButtonsColor || "#FFFFFF", self.selectedButtonsColor_str = self.props_obj.selectedHEXButtonsColor || "#999999", self.playlistPosition_str = self.props_obj.playlistPosition || "bottom", test = "bottom" == self.playlistPosition_str || "right" == self.playlistPosition_str, test || (self.playlistPosition_str = "right"), self.folderVideoLabel_str = self.props_obj.folderVideoLabel || "Video ", self.logoPosition_str = self.props_obj.logoPosition || "topleft", self.logoPosition_str = String(self.logoPosition_str).toLowerCase(), test = "topleft" == self.logoPosition_str || "topright" == self.logoPosition_str || "bottomleft" == self.logoPosition_str || "bottomright" == self.logoPosition_str, test || (self.logoPosition_str = "topleft"), self.thumbnailSelectedType_str = self.props_obj.thumbnailSelectedType || "opacity", "blackAndWhite" != self.thumbnailSelectedType_str && "threshold" != self.thumbnailSelectedType_str && "opacity" != self.thumbnailSelectedType_str && (self.thumbnailSelectedType_str = "opacity"), (self.isMobile_bl || FWDUVPUtils.isIEAndLessThen9) && (self.thumbnailSelectedType_str = "opacity"), "file:" == document.location.protocol && (self.thumbnailSelectedType_str = "opacity"), self.adsButtonsPosition_str = self.props_obj.adsButtonsPosition || "left", self.adsButtonsPosition_str = String(self.adsButtonsPosition_str).toLowerCase(), test = "left" == self.adsButtonsPosition_str || "right" == self.adsButtonsPosition_str, test || (self.adsButtonsPosition_str = "left"), self.skipToVideoButtonText_str = self.props_obj.skipToVideoButtonText || "not defined", self.skipToVideoText_str = self.props_obj.skipToVideoText, self.adsTextNormalColor = self.props_obj.adsTextNormalColor || "#FF0000", self.adsTextSelectedColor = self.props_obj.adsTextSelectedColor || "#FF0000", self.adsBorderNormalColor_str = self.props_obj.adsBorderNormalColor || "#FF0000", self.adsBorderSelectedColor_str = self.props_obj.adsBorderSelectedColor || "#FF0000", self.volume = self.props_obj.volume, null == self.volume && (self.volume = 1), isNaN(self.volume) && (volume = 1), self.volume > 1 || self.isMobile_bl ? self.volume = 1 : self.volume < 0 && (self.volume = 0), self.rightClickContextMenu_str = self.props_obj.rightClickContextMenu || "developer", test = "developer" == self.rightClickContextMenu_str || "disabled" == self.rightClickContextMenu_str || "default" == self.rightClickContextMenu_str, test || (self.rightClickContextMenu_str = "developer"), self.buttonsToolTipFontColor_str = self.props_obj.buttonsToolTipFontColor || "#FF0000", self.toolTipsButtonFontColor_str = self.props_obj.toolTipsButtonFontColor || "#FF0000", self.shareAndEmbedTextColor_str = self.props_obj.shareAndEmbedTextColor || "#FF0000", self.inputBackgroundColor_str = self.props_obj.inputBackgroundColor || "#FF0000", self.inputColor_str = self.props_obj.inputColor || "#FF0000", self.searchInputBackgroundColor_str = self.props_obj.searchInputBackgroundColor || "#FF0000", self.borderColor_str = self.props_obj.borderColor || "#FF0000", self.searchInputColor_str = self.props_obj.searchInputColor || "#FF0000", self.youtubeAndFolderVideoTitleColor_str = self.props_obj.youtubeAndFolderVideoTitleColor || "#FF0000", self.folderAudioSecondTitleColor_str = self.props_obj.folderAudioSecondTitleColor || "#666666", self.youtubeDescriptionColor_str = self.props_obj.youtubeDescriptionColor || "#FF0000", self.youtubeOwnerColor_str = self.props_obj.youtubeOwnerColor || "#FF0000", self.secondaryLabelsColor_str = self.props_obj.secondaryLabelsColor || "#FF0000", self.mainLabelsColor_str = self.props_obj.mainLabelsColor || "#FF0000", self.playlistBackgroundColor_str = self.props_obj.playlistBackgroundColor || "#FF0000", self.thumbnailNormalBackgroundColor_str = self.props_obj.thumbnailNormalBackgroundColor || "#FF0000", self.playlistNameColor_str = self.props_obj.playlistNameColor || "#FF0000", self.thumbnailHoverBackgroundColor_str = self.props_obj.thumbnailHoverBackgroundColor || "#FF0000", self.thumbnailDisabledBackgroundColor_str = self.props_obj.thumbnailDisabledBackgroundColor || "#FF0000", self.mainSelectorBackgroundSelectedColor = self.props_obj.mainSelectorBackgroundSelectedColor || "#FFFFFF", self.mainSelectorTextNormalColor = self.props_obj.mainSelectorTextNormalColor || "#FFFFFF", self.mainSelectorTextSelectedColor = self.props_obj.mainSelectorTextSelectedColor || "#000000", self.mainButtonBackgroundNormalColor = self.props_obj.mainButtonBackgroundNormalColor || "#212021", self.mainButtonBackgroundSelectedColor = self.props_obj.mainButtonBackgroundSelectedColor || "#FFFFFF", self.mainButtonTextNormalColor = self.props_obj.mainButtonTextNormalColor || "#FFFFFF", self.mainButtonTextSelectedColor = self.props_obj.mainButtonTextSelectedColor || "#000000", self.logoLink_str = self.props_obj.logoLink || "none", self.startAtVideo = parseInt(self.props_obj.startAtVideo) || 0, self.audioVisualizerLinesColor_str = self.props_obj.audioVisualizerLinesColor || "#0099FF", self.audioVisualizerCircleColor_str = self.props_obj.audioVisualizerCircleColor || "#FFFFFF", self.privateVideoPassword_str = self.props_obj.privateVideoPassword, self.nextAndPrevSetButtonsMargins = self.props_obj.nextAndPrevSetButtonsMargins || 0, self.buttonsMargins = self.props_obj.buttonsMargins || 0, self.thumbnailMaxWidth = self.props_obj.thumbnailMaxWidth || 330, self.thumbnailMaxHeight = self.props_obj.thumbnailMaxHeight || 330, self.horizontalSpaceBetweenThumbnails = self.props_obj.horizontalSpaceBetweenThumbnails, self.verticalSpaceBetweenThumbnails = self.props_obj.verticalSpaceBetweenThumbnails, self.totalPlaylists = self.cats_ar.length, self.controllerHeight = self.props_obj.controllerHeight || 50, self.startSpaceBetweenButtons = self.props_obj.startSpaceBetweenButtons || 0, self.controllerHideDelay = self.props_obj.controllerHideDelay || 2, self.controllerHideDelay *= 1e3, self.spaceBetweenButtons = self.props_obj.spaceBetweenButtons || 0, self.scrubbersOffsetWidth = self.props_obj.scrubbersOffsetWidth || 0, self.mainScrubberOffestTop = self.props_obj.mainScrubberOffestTop || 0, self.volumeScrubberOffsetTopWidth = self.props_obj.volumeScrubberOffsetTopWidth || 0, self.timeOffsetLeftWidth = self.props_obj.timeOffsetLeftWidth || 0, self.timeOffsetRightWidth = self.props_obj.timeOffsetRightWidth || 0, self.timeOffsetTop = self.props_obj.timeOffsetTop || 0, self.embedWindowCloseButtonMargins = self.props_obj.embedAndInfoWindowCloseButtonMargins || 0, self.logoMargins = self.props_obj.logoMargins || 0, self.maxPlaylistItems = self.props_obj.maxPlaylistItems || 50, self.volumeScrubberHeight = self.props_obj.volumeScrubberHeight || 10, self.volumeScrubberOfsetHeight = self.props_obj.volumeScrubberOfsetHeight || 0, self.volumeScrubberHeight > 200 && (self.volumeScrubberHeight = 200), self.buttonsToolTipHideDelay = self.props_obj.buttonsToolTipHideDelay || 1.5, self.thumbnailWidth = self.props_obj.thumbnailWidth || 80, self.thumbnailWidth = Math.min(150, self.thumbnailWidth), self.thumbnailHeight = self.props_obj.thumbnailHeight || 80, self.spaceBetweenThumbnails = self.props_obj.spaceBetweenThumbnails || 0, self.thumbnailHeight = Math.min(150, self.thumbnailHeight), self.timeOffsetTop = self.props_obj.timeOffsetTop || 0, self.scrollbarOffestWidth = self.props_obj.scrollbarOffestWidth || 0, self.scollbarSpeedSensitivity = self.props_obj.scollbarSpeedSensitivity || .5, self.facebookAppId_str = self.props_obj.facebookAppId, self.aopwBorderSize = self.props_obj.aopwBorderSize || 0, self.aopwTitle = self.props_obj.aopwTitle || "Advertisement", self.aopwTitleColor_str = self.props_obj.aopwTitleColor || "#FFFFFF", self.aopwWidth = self.props_obj.aopwWidth || 200, self.aopwHeight = self.props_obj.aopwHeight || 200, self.isMobile_bl && (self.allowToChangeVolume_bl = !1), self.fillEntireVideoScreen_bl = self.props_obj.fillEntireVideoScreen, self.fillEntireVideoScreen_bl = "yes" == self.fillEntireVideoScreen_bl, self.showContextMenu_bl = self.props_obj.showContextMenu, self.showContextMenu_bl = "no" != self.showContextMenu_bl, self.showController_bl = self.props_obj.showController, self.showController_bl = "no" != self.showController_bl, self.showButtonsToolTip_bl = self.props_obj.showButtonsToolTips, self.showButtonsToolTip_bl = "no" != self.showButtonsToolTip_bl, self.isMobile_bl && (self.showButtonsToolTip_bl = !1), self.showButtonsToolTip_bl = self.props_obj.showButtonsToolTip, self.showButtonsToolTip_bl = "no" != self.showButtonsToolTip_bl, self.isMobile_bl && (self.showButtonsToolTip_bl = !1), self.addKeyboardSupport_bl = self.props_obj.addKeyboardSupport, self.addKeyboardSupport_bl = "no" != self.addKeyboardSupport_bl, self.addMouseWheelSupport_bl = self.props_obj.addMouseWheelSupport, self.addMouseWheelSupport_bl = "no" != self.addMouseWheelSupport_bl, self.showPlaylistsSearchInput_bl = self.props_obj.showPlaylistsSearchInput, self.showPlaylistsSearchInput_bl = "yes" == self.showPlaylistsSearchInput_bl, self.inputBackgroundColor_str = self.props_obj.inputBackgroundColor || "#FFFFFF", self.inputColor_str = self.props_obj.inputColor || "#FFFFFF", self.autoPlay_bl = self.props_obj.autoPlay, self.autoPlay_bl = "yes" == self.autoPlay_bl, FWDUVPUtils.isMobile && (self.autoPlay_bl = !1), self.showNextAndPrevButtons_bl = self.props_obj.showNextAndPrevButtons, self.showNextAndPrevButtons_bl = "no" != self.showNextAndPrevButtons_bl, self.showPlaylistsButtonAndPlaylists_bl = self.props_obj.showPlaylistsButtonAndPlaylists, self.showPlaylistsButtonAndPlaylists_bl = "no" != self.showPlaylistsButtonAndPlaylists_bl, self.showEmbedButton_bl = self.props_obj.showEmbedButton, self.showEmbedButton_bl = "no" != self.showEmbedButton_bl, self.showPlaylistsByDefault_bl = self.props_obj.showPlaylistsByDefault, self.showPlaylistsByDefault_bl = "yes" == self.showPlaylistsByDefault_bl, self.loop_bl = self.props_obj.loop, self.loop_bl = "yes" == self.loop_bl, self.shuffle_bl = self.props_obj.shuffle, self.shuffle_bl = "yes" == self.shuffle_bl, self.showLoopButton_bl = self.props_obj.showLoopButton, self.showLoopButton_bl = "no" != self.props_obj.showLoopButton, self.showShuffleButton_bl = self.props_obj.showShuffleButton, self.showShuffleButton_bl = "no" != self.props_obj.showShuffleButton, self.showDownloadVideoButton_bl = self.props_obj.showDownloadButton, self.showDownloadVideoButton_bl = "no" != self.showDownloadVideoButton_bl, self.showInfoButton_bl = self.props_obj.showInfoButton, self.showInfoButton_bl = "no" != self.showInfoButton_bl, self.showLogo_bl = self.props_obj.showLogo, self.showLogo_bl = "yes" == self.showLogo_bl, self.hideLogoWithController_bl = self.props_obj.hideLogoWithController, self.hideLogoWithController_bl = "yes" == self.hideLogoWithController_bl, self.showPoster_bl = self.props_obj.showPoster, self.showPoster_bl = "yes" == self.showPoster_bl, self.showVolumeButton_bl = self.props_obj.showVolumeButton, self.showVolumeButton_bl = "no" != self.showVolumeButton_bl, self.isMobile_bl && (self.showVolumeButton_bl = !1), self.showVolumeScrubber_bl = self.showVolumeButton_bl, self.showControllerWhenVideoIsStopped_bl = self.props_obj.showControllerWhenVideoIsStopped, self.showControllerWhenVideoIsStopped_bl = "yes" == self.showControllerWhenVideoIsStopped_bl, self.showNextAndPrevButtonsInController_bl = self.props_obj.showNextAndPrevButtonsInController, self.showNextAndPrevButtonsInController_bl = "yes" == self.showNextAndPrevButtonsInController_bl, self.showTime_bl = self.props_obj.showTime, self.showTime_bl = "no" != self.showTime_bl, self.showPopupAdsCloseButton_bl = self.props_obj.showPopupAdsCloseButton, self.showPopupAdsCloseButton_bl = "no" != self.showPopupAdsCloseButton_bl, self.showFullScreenButton_bl = self.props_obj.showFullScreenButton, self.showFullScreenButton_bl = "no" != self.showFullScreenButton_bl, self.disableVideoScrubber_bl = self.props_obj.disableVideoScrubber, self.disableVideoScrubber_bl = "yes" == self.disableVideoScrubber_bl, self.showPlaybackRateButton_bl = self.props_obj.showPlaybackRateButton, self.showPlaybackRateButton_bl = "yes" == self.showPlaybackRateButton_bl, self.defaultPlaybackRate_str = self.props_obj.defaultPlaybackRate, null == self.defaultPlaybackRate_str && (self.defaultPlaybackRate_str = 1), self.defaultPlaybackRate_ar = ["0.25", "0.5", "1", "1.25", "1.5", "2"], self.defaultPlaybackRate_ar.reverse();
									var l = !1;
									for (o = 0; o < self.defaultPlaybackRate_ar.length; o++) self.defaultPlaybackRate_ar[o] == self.defaultPlaybackRate_str && (l = !0, self.startAtPlaybackIndex = o);
									if (l || (self.startAtPlaybackIndex = 3, self.defaultPlaybackRate_str = self.defaultPlaybackRate_ar[self.startAtPlaybackIndex]), self.showFullScreenButton_bl = self.props_obj.showFullScreenButton, self.showFullScreenButton_bl = "no" != self.showFullScreenButton_bl, self.repeatBackground_bl = self.props_obj.repeatBackground, self.repeatBackground_bl = "no" != self.repeatBackground_bl, self.playVideoOnlyWhenLoggedIn_bl = self.props_obj.playVideoOnlyWhenLoggedIn, self.playVideoOnlyWhenLoggedIn_bl = "yes" == self.playVideoOnlyWhenLoggedIn_bl, self.isLoggedIn_bl = self.props_obj.isLoggedIn, self.isLoggedIn_bl = "yes" == self.isLoggedIn_bl, self.loggedInMessage_str = self.props_obj.loggedInMessage || "Only loggedin users can View this video", self.showShareButton_bl = self.props_obj.showShareButton, self.showShareButton_bl = "no" != self.showShareButton_bl, self.openNewPageAtTheEndOfTheAds_bl = self.props_obj.openNewPageAtTheEndOfTheAds, self.openNewPageAtTheEndOfTheAds_bl = "yes" == self.openNewPageAtTheEndOfTheAds_bl, self.playAdsOnlyOnce_bl = self.props_obj.playAdsOnlyOnce, self.playAdsOnlyOnce_bl = "yes" == self.playAdsOnlyOnce_bl, self.startAtRandomVideo_bl = self.props_obj.startAtRandomVideo, self.startAtRandomVideo_bl = "yes" == self.startAtRandomVideo_bl, self.stopVideoWhenPlayComplete_bl = self.props_obj.stopVideoWhenPlayComplete, self.stopVideoWhenPlayComplete_bl = "yes" == self.stopVideoWhenPlayComplete_bl, self.showYoutubeQualityButton_bl = self.props_obj.showQualityButton, self.showYoutubeQualityButton_bl = "no" != self.showYoutubeQualityButton_bl, self.arrowN_str = self.skinPath_str + "combobox-arrow-normal.png", self.arrowS_str = self.skinPath_str + "combobox-arrow-selected.png", self.hlsPath_str = self.mainFolderPath_str + "hls.js", self.threeJsPath_str = self.mainFolderPath_str + "three.js", self.threeJsControlsPath_str = self.mainFolderPath_str + "threeControled.js", self.logoPath_str = self.skinPath_str + "logo.png", self.adLinePat_str = self.skinPath_str + "ad-line.png", self.props_obj.logoPath && (self.logoPath_str = self.props_obj.logoPath), self.mainScrubberDragLeftAddPath_str = self.skinPath_str + "scrubber-left-drag-add.png", self.mainScrubberDragMiddleAddPath_str = self.skinPath_str + "scrubber-middle-drag-add.png", self.mainPreloader_img = new Image, self.mainPreloader_img.onerror = self.onSkinLoadErrorHandler, self.mainPreloader_img.onload = self.onPreloaderLoadHandler, self.mainPreloader_img.src = self.skinPath_str + "preloader.jpg", self.skinPaths_ar = [{
											img: self.prevN_img = new Image,
											src: self.skinPath_str + "prev-video.png"
										}, {
											img: self.nextN_img = new Image,
											src: self.skinPath_str + "next-video.png"
										}, {
											img: self.playN_img = new Image,
											src: self.skinPath_str + "play.png"
										}, {
											img: self.pauseN_img = new Image,
											src: self.skinPath_str + "pause.png"
										}, {
											img: self.mainScrubberBkLeft_img = new Image,
											src: self.skinPath_str + "scrubber-left-background.png"
										}, {
											img: self.mainScrubberDragLeft_img = new Image,
											src: self.skinPath_str + "scrubber-left-drag.png"
										}, {
											img: self.mainScrubberLine_img = new Image,
											src: self.skinPath_str + "scrubber-line.png"
										}, {
											img: self.volumeN_img = new Image,
											src: self.skinPath_str + "volume.png"
										}, {
											img: self.progressLeft_img = new Image,
											src: self.skinPath_str + "progress-left.png"
										}, {
											img: self.largePlayN_img = new Image,
											src: self.skinPath_str + "large-play.png"
										}, {
											img: self.categoriesN_img = new Image,
											src: self.skinPath_str + "categories-button.png"
										}, {
											img: self.replayN_img = new Image,
											src: self.skinPath_str + "replay-button.png"
										}, {
											img: self.shuffleN_img = new Image,
											src: self.skinPath_str + "shuffle-button.png"
										}, {
											img: self.fullScreenN_img = new Image,
											src: self.skinPath_str + "full-screen.png"
										}, {
											img: self.ytbQualityN_img = new Image,
											src: self.skinPath_str + "youtube-quality.png"
										}, {
											img: self.shareN_img = new Image,
											src: self.skinPath_str + "share.png"
										}, {
											img: self.facebookN_img = new Image,
											src: self.skinPath_str + "facebook.png"
										}, {
											img: self.infoN_img = new Image,
											src: self.skinPath_str + "info-button.png"
										}, {
											img: self.downloadN_img = new Image,
											src: self.skinPath_str + "download-button.png"
										}, {
											img: self.normalScreenN_img = new Image,
											src: self.skinPath_str + "normal-screen.png"
										}, {
											img: self.embedN_img = new Image,
											src: self.skinPath_str + "embed.png"
										}, {
											img: self.embedColoseN_img = new Image,
											src: self.skinPath_str + "embed-close-button.png"
										}, {
											img: self.passColoseN_img = new Image,
											src: self.skinPath_str + "embed-close-button.png"
										}, {
											img: self.skipIconPath_img = new Image,
											src: self.skinPath_str + "skip-icon.png"
										}, {
											img: self.showSubtitleNPath_img = new Image,
											src: self.skinPath_str + "show-subtitle-icon.png"
										}, {
											img: self.hideSubtitleNPath_img = new Image,
											src: self.skinPath_str + "hide-subtitle-icon.png"
										}, {
											img: self.volumeScrubberDragBottom_img = new Image,
											src: self.skinPath_str + "volume-scrubber-bottom-drag.png"
										}, {
											img: self.playbackRateNPath_img = new Image,
											src: self.skinPath_str + "playback-rate-normal.png"
										}, {
											img: self.popwColseN_img = new Image,
											src: self.skinPath_str + "popw-close-button.png"
										}], self.showNextAndPrevButtonsInController_bl && self.skinPaths_ar.push({
											img: self.next2N_img = new Image,
											src: self.skinPath_str + "next-video.png"
										}, {
											img: self.prev2N_img = new Image,
											src: self.skinPath_str + "prev-video.png"
										}), self.showShareButton_bl && (self.skinPaths_ar.push({
											img: self.shareClooseN_img = new Image,
											src: self.skinPath_str + "embed-close-button.png"
										}, {
											img: self.facebookN_img = new Image,
											src: self.skinPath_str + "facebook.png"
										}, {
											img: self.googleN_img = new Image,
											src: self.skinPath_str + "google-plus.png"
										}, {
											img: self.twitterN_img = new Image,
											src: self.skinPath_str + "twitter.png"
										}, {
											img: self.likedInkN_img = new Image,
											src: self.skinPath_str + "likedin.png"
										}, {
											img: self.bufferkN_img = new Image,
											src: self.skinPath_str + "buffer.png"
										}, {
											img: self.diggN_img = new Image,
											src: self.skinPath_str + "digg.png"
										}, {
											img: self.redditN_img = new Image,
											src: self.skinPath_str + "reddit.png"
										}, {
											img: self.thumbrlN_img = new Image,
											src: self.skinPath_str + "thumbrl.png"
										}), self.facebookSPath_str = self.skinPath_str + "facebook-over.png", self.googleSPath_str = self.skinPath_str + "google-plus-over.png", self.twitterSPath_str = self.skinPath_str + "twitter-over.png", self.likedInSPath_str = self.skinPath_str + "likedin-over.png", self.bufferSPath_str = self.skinPath_str + "buffer-over.png", self.diggSPath_str = self.skinPath_str + "digg-over.png", self.redditSPath_str = self.skinPath_str + "reddit-over.png", self.thumbrlSPath_str = self.skinPath_str + "thumbrl-over.png"), self.popwColseSPath_str = self.skinPath_str + "popw-close-button-over.png", self.popwWindowBackgroundPath_str = self.skinPath_str + "popw-window-background.png", self.popwBarBackgroundPath_str = self.skinPath_str + "popw-bar-background.png", self.playbackRateSPath_str = self.skinPath_str + "playback-rate-selected.png", self.prevSPath_str = self.skinPath_str + "prev-video-over.png", self.nextSPath_str = self.skinPath_str + "next-video-over.png", self.playSPath_str = self.skinPath_str + "play-over.png", self.pauseSPath_str = self.skinPath_str + "pause-over.png", self.bkMiddlePath_str = self.skinPath_str + "controller-middle.png", self.hdPath_str = self.skinPath_str + "hd.png", self.youtubeQualityArrowPath_str = self.skinPath_str + "youtube-quality-arrow.png", self.ytbQualityButtonPointerPath_str = self.skinPath_str + "youtube-quality-pointer.png", self.controllerBkPath_str = self.skinPath_str + "controller-background.png", self.skipIconSPath_str = self.skinPath_str + "skip-icon-over.png", self.adsBackgroundPath_str = self.skinPath_str + "ads-background.png", self.shareSPath_str = self.skinPath_str + "share-over.png", self.mainScrubberBkRightPath_str = self.skinPath_str + "scrubber-right-background.png", self.mainScrubberBkMiddlePath_str = self.skinPath_str + "scrubber-middle-background.png", self.mainScrubberDragMiddlePath_str = self.skinPath_str + "scrubber-middle-drag.png", self.volumeScrubberBkBottomPath_str = self.skinPath_str + "volume-scrubber-bottom-background.png", self.volumeScrubberBkMiddlePath_str = self.skinPath_str + "volume-scrubber-middle-background.png", self.volumeScrubberBkTopPath_str = self.skinPath_str + "volume-scrubber-top-background.png", self.volumeScrubberDragBottomPath_str = self.skinPath_str + "volume-scrubber-bottom-drag.png", self.volumeScrubberLinePath_str = self.skinPath_str + "volume-scrubber-line.png", self.volumeScrubberDragMiddlePath_str = self.skinPath_str + "volume-scrubber-middle-drag.png", self.volumeSPath_str = self.skinPath_str + "volume-over.png", self.volumeDPath_str = self.skinPath_str + "volume-disabled.png", self.categoriesSPath_str = self.skinPath_str + "categories-button-over.png", self.replaySPath_str = self.skinPath_str + "replay-button-over.png", self.toopTipBk_str = self.skinPath_str + "tooltip-background.png", self.toopTipPointer_str = self.skinPath_str + "tooltip-pointer.png", self.shufflePathS_str = self.skinPath_str + "shuffle-button-over.png", self.passButtonNPath_str = self.skinPath_str + "pass-button.png", self.passButtonSPath_str = self.skinPath_str + "pass-button-over.png", self.largePlayS_str = self.skinPath_str + "large-play-over.png", self.fullScreenSPath_str = self.skinPath_str + "full-screen-over.png", self.ytbQualitySPath_str = self.skinPath_str + "youtube-quality-over.png", self.ytbQualityDPath_str = self.skinPath_str + "youtube-quality-hd.png", self.facebookSPath_str = self.skinPath_str + "facebook-over.png", self.infoSPath_str = self.skinPath_str + "info-button-over.png", self.downloadSPath_str = self.skinPath_str + "download-button-over.png", self.normalScreenSPath_str = self.skinPath_str + "normal-screen-over.png", self.progressMiddlePath_str = self.skinPath_str + "progress-middle.png", self.embedPathS_str = self.skinPath_str + "embed-over.png", self.embedWindowClosePathS_str = self.skinPath_str + "embed-close-button-over.png", self.embedWindowInputBackgroundPath_str = self.skinPath_str + "embed-window-input-background.png", self.embedCopyButtonNPath_str = self.skinPath_str + "embed-copy-button.png", self.embedCopyButtonSPath_str = self.skinPath_str + "embed-copy-button-over.png", self.sendButtonNPath_str = self.skinPath_str + "send-button.png", self.sendButtonSPath_str = self.skinPath_str + "send-button-over.png", self.embedWindowBackground_str = self.skinPath_str + "embed-window-background.png", self.showSubtitleSPath_str = self.skinPath_str + "show-subtitle-icon-over.png", self.hideSubtitleSPath_str = self.skinPath_str + "hide-subtitle-icon-over.png", self.inputArrowPath_str = self.skinPath_str + "input-arrow.png", self.showPlaylistsButtonAndPlaylists_bl && (self.skinPaths_ar.push({
											img: self.catNextN_img = new Image,
											src: self.skinPath_str + "categories-next-button.png"
										}, {
											img: self.catPrevN_img = new Image,
											src: self.skinPath_str + "categories-prev-button.png"
										}, {
											img: self.catCloseN_img = new Image,
											src: self.skinPath_str + "categories-close-button.png"
										}, {
											img: new Image,
											src: self.skinPath_str + "categories-background.png"
										}), self.catBkPath_str = self.skinPath_str + "categories-background.png", self.catThumbBkPath_str = self.skinPath_str + "categories-thumbnail-background.png", self.catThumbBkTextPath_str = self.skinPath_str + "categories-thumbnail-text-backgorund.png", self.catNextSPath_str = self.skinPath_str + "categories-next-button-over.png", self.catPrevSPath_str = self.skinPath_str + "categories-prev-button-over.png", self.catCloseSPath_str = self.skinPath_str + "categories-close-button-over.png"), self.popupAddCloseNPath_str = self.skinPath_str + "close-button-normal.png", self.popupAddCloseSPath_str = self.skinPath_str + "close-button-selected.png", self.annotationAddCloseNPath_str = self.skinPath_str + "annotation-close-button-normal.png", self.annotationAddCloseSPath_str = self.skinPath_str + "annotation-close-button-selected.png", self.showPlaylistButtonAndPlaylist_bl) self.playlistThumbnailsBkPath_str = self.skinPath_str + "playlist-thumbnail-background.png", self.playlistBkPath_str = self.skinPath_str + "playlist-background.png", "bottom" == self.playlistPosition_str ? (self.skinPaths_ar.push({
										img: self.hidePlaylistN_img = new Image,
										src: self.skinPath_str + "hide-horizontal-playlist.png"
									}, {
										img: self.showPlaylistN_img = new Image,
										src: self.skinPath_str + "show-horizontal-playlist.png"
									}), self.hidePlaylistSPath_str = self.skinPath_str + "hide-horizontal-playlist-over.png", self.showPlaylistSPath_str = self.skinPath_str + "show-horizontal-playlist-over.png") : (self.skinPaths_ar.push({
										img: self.hidePlaylistN_img = new Image,
										src: self.skinPath_str + "hide-vertical-playlist.png"
									}, {
										img: self.showPlaylistN_img = new Image,
										src: self.skinPath_str + "show-vertical-playlist.png"
									}), self.hidePlaylistSPath_str = self.skinPath_str + "hide-vertical-playlist-over.png", self.showPlaylistSPath_str = self.skinPath_str + "show-vertical-playlist-over.png"), self.skinPaths_ar.push({
										img: self.scrBkTop_img = new Image,
										src: self.skinPath_str + "playlist-scrollbar-background-top.png"
									}, {
										img: self.scrDragTop_img = new Image,
										src: self.skinPath_str + "playlist-scrollbar-drag-top.png"
									}, {
										img: self.scrLinesN_img = new Image,
										src: self.skinPath_str + "playlist-scrollbar-lines.png"
									}), self.scrBkMiddlePath_str = self.skinPath_str + "playlist-scrollbar-background-middle.png", self.scrBkBottomPath_str = self.skinPath_str + "playlist-scrollbar-background-bottom.png", self.scrDragMiddlePath_str = self.skinPath_str + "playlist-scrollbar-drag-middle.png", self.scrDragBottomPath_str = self.skinPath_str + "playlist-scrollbar-drag-bottom.png", self.scrLinesSPath_str = self.skinPath_str + "playlist-scrollbar-lines-over.png", self.inputArrowPath_str = self.skinPath_str + "input-arrow.png";
									self.totalGraphics = self.skinPaths_ar.length, self.loadSkin()
								} else setTimeout(function () {
									null != self && (errorMessage_str = "At least one playlist is required!", self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
										text: errorMessage_str
									}))
								}, 50)
							} else setTimeout(function () {
								null != self && (errorMessage_str = "This Broker Does Not Have Any Video", self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
									text: errorMessage_str
								}))
							}, 50);
				else setTimeout(function () {
					null != self && (errorMessage_str = "The <font color='#ff0000'>skinPath</font> property is not defined in the constructor function!", self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: errorMessage_str
					}))
				}, 50);
				else setTimeout(function () {
					null != self && (errorMessage_str = "The <font color='#ff0000'>mainFolderPath</font> property is not defined in the constructor function!", self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: errorMessage_str
					}))
				}, 50);
				else setTimeout(function () {
					null != self && (errorMessage_str = "The <font color='#ff0000'>playlistsId</font> property is not defined in the constructor function!", self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: errorMessage_str
					}))
				}, 50)
			}, this.onPreloaderLoadHandler = function () {
				setTimeout(function () {
					self.dispatchEvent(FWDUVPData.PRELOADER_LOAD_DONE)
				}, 50)
			}, self.loadSkin = function () {
				for (var e, t, o = 0; o < self.totalGraphics; o++) e = self.skinPaths_ar[o].img, t = self.skinPaths_ar[o].src, e.onload = self.onSkinLoadHandler, e.onerror = self.onSkinLoadErrorHandler, e.src = t
			}, this.onSkinLoadHandler = function (e) {
				self.countLoadedSkinImages++, self.countLoadedSkinImages == self.totalGraphics && setTimeout(function () {
					self.dispatchEvent(FWDUVPData.SKIN_LOAD_COMPLETE)
				}, 50)
			}, self.onSkinLoadErrorHandler = function (e) {
				FWDUVPUtils.isIEAndLessThen9 ? message = "Graphics image not found!" : message = "The skin icon with label <font color='#ff0000'>" + e.target.src + "</font> can't be loaded, check path!", window.console && console.log(e);
				var t = {
					text: message
				};
				setTimeout(function () {
					self.dispatchEvent(FWDUVPData.LOAD_ERROR, t)
				}, 50)
			}, this.downloadVideo = function (e, t) {
				if ("file:" == document.location.protocol) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
					self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Downloading video files local is not allowed or possible! To function properly please test online."
					}), self.isPlaylistDispatchingError_bl = !1
				}, 50));
				if (!e) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
					self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Not allowed to download this video!"
					}), self.isPlaylistDispatchingError_bl = !1
				}, 50));
				if (-1 == String(e.indexOf(".mp4"))) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
					self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Only mp4 video files hosted on your server can be downloaded."
					}), self.isPlaylistDispatchingError_bl = !1
				}, 50));
				((t = t.replace(/[^A-Z0-9\-\_\.]+/gi, "_")).length > 40 && (t = t.substr(0, 40) + "..."), -1 == e.indexOf("http:")) && (e = (e = e.split(",")[0]).substr(e.indexOf("/") + 1), e = encodeURIComponent(e));
				var o = self.videoDownloaderPath_str;
				if (self.dlIframe || (self.dlIframe = document.createElement("IFRAME"), self.dlIframe.style.display = "none", document.documentElement.appendChild(self.dlIframe)), self.isMobile_bl) {
					var s = self.getValidEmail();
					if (!s) return;
					if (null != self.emailXHR) {
						try {
							self.emailXHR.abort()
						} catch (e) {}
						self.emailXHR.onreadystatechange = null, self.emailXHR.onerror = null, self.emailXHR = null
					}
					return self.emailXHR = new XMLHttpRequest, self.emailXHR.onreadystatechange = function (e) {
						4 == self.emailXHR.readyState && (200 == self.emailXHR.status ? "sent" == self.emailXHR.responseText ? alert("Email sent.") : alert("Error sending email, this is a server side error, the php file can't send the email!") : alert("Error sending email: " + self.emailXHR.status + ": " + self.emailXHR.statusText))
					}, self.emailXHR.onerror = function (e) {
						try {
							window.console && console.log(e), window.console && console.log(e.message)
						} catch (e) {}
						alert("Error sending email: " + e.message)
					}, self.emailXHR.open("get", self.mailPath_str + "?mail=" + s + "&name=" + t + "&path=" + e, !0), void self.emailXHR.send()
				}
				self.dlIframe.src = o + "?path=" + e + "&name=" + t
			}, this.getValidEmail = function () {
				for (var e = prompt("Please enter your email address where the video download link will be sent:"), t = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; !t.test(e) || "" == e;) {
					if (null === e) return;
					e = prompt("Please enter a valid email address:")
				}
				return e
			}, this.loadPlaylist = function (e) {
				if (self.stopToLoadPlaylist(), !self.isPlaylistDispatchingError_bl) {
					clearTimeout(self.dispatchPlaylistLoadCompleteWidthDelayId_to);
					var t = self.catsRef_ar[e];
					if (void 0 === t) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
						self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "<font color='#ff0000'>loadPlaylist()</font> - Please specify a DOM playlist id or youtube playlist id!"
						}), self.isPlaylistDispatchingError_bl = !1
					}, 50));
					if (null === t) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
						self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "The playlist with id <font color='#ff0000'>" + self.cats_ar[e].source + "</font> is not found in the DOM."
						}), self.isPlaylistDispatchingError_bl = !1
					}, 50));
					if (!isNaN(t)) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
						self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "<font color='#ff0000'>loadPlaylist()</font> - The parameter must be of type string!"
						}), self.isPlaylistDispatchingError_bl = !1
					}, 50));
					if (self.resetYoutubePlaylistLoader(), self.isYoutbe_bl = !1, self.playlist_ar = [], t.length)
						if (-1 != t.indexOf("list=")) self.isYoutbe_bl = !0, self.loadYoutubePlaylist(t);
						else {
							if (-1 != t.indexOf("list=")) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
								self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
									text: "Loading youtube playlist is only possible by setting <font color='#ff0000'>useYoutube=\"yes\"</font>."
								}), self.isPlaylistDispatchingError_bl = !1
							}, 50)); - 1 != t.indexOf("folder=") ? self.loadFolderPlaylist(t) : -1 == t.indexOf(".xml") && -1 == t.indexOf("http:") && -1 == t.indexOf("https:") && -1 == t.indexOf("www.") || self.loadXMLPlaylist(t)
						}
					else self.parseDOMPlaylist(t, self.cats_ar[e].source)
				}
			}, this.loadXMLPlaylist = function (e) {
				if (!self.isPlaylistDispatchingError_bl) {
					if ("file:" == document.location.protocol) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
						self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "Loading XML files local is not allowed or possible!. To function properly please test online."
						}), self.isPlaylistDispatchingError_bl = !1
					}, 50));
					self.loadFromFolder_bl = !1, self.sourceURL_str = e, self.xhr = new XMLHttpRequest, self.xhr.onreadystatechange = self.ajaxOnLoadHandler, self.xhr.onerror = self.ajaxOnErrorHandler;
					try {
						self.xhr.open("get", self.proxyPath_str + "?url=" + self.sourceURL_str + "&rand=" + parseInt(99999999 * Math.random()), !0), self.xhr.send()
					} catch (e) {
						var t = e;
						e && e.message && (t = e.message), self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "XML file can't be loaded! <font color='#ff0000'>" + self.sourceURL_str + "</font>. " + t
						})
					}
				}
			}, this.loadFolderPlaylist = function (e) {
				if (!self.isPlaylistDispatchingError_bl) {
					if ("file:" == document.location.protocol) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
						self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "Creating a video playlist from a folder is not allowed or possible local! To function properly please test online."
						}), self.isPlaylistDispatchingError_bl = !1
					}, 50));
					self.loadFromFolder_bl = !0, self.sourceURL_str = e.substr(e.indexOf("=") + 1), self.xhr = new XMLHttpRequest, self.xhr.onreadystatechange = self.ajaxOnLoadHandler, self.xhr.onerror = self.ajaxOnErrorHandler;
					try {
						self.xhr.open("get", self.proxyFolderPath_str + "?dir=" + encodeURIComponent(self.sourceURL_str) + "&videoLabel=" + self.folderVideoLabel_str + "&rand=" + parseInt(9999999 * Math.random()), !0), self.xhr.send()
					} catch (e) {
						e && e.message && e.message, self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "Folder proxy file path is not found: <font color='#ff0000'>" + self.proxyFolderPath_str + "</font>"
						})
					}
				}
			}, this.loadYoutubePlaylist = function (e) {
				if (!self.isPlaylistDispatchingError_bl || self.isYoutbe_bl) {
					if (self.youtubeUrl_str || (e = e.substr(e.indexOf("=") + 1), self.youtubeUrl_str = e), self.loadFromFolder_bl = !0, self.nextPageToken_str ? self.sourceURL_str = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&pageToken=" + self.nextPageToken_str + "&playlistId=" + self.youtubeUrl_str + "&key=AIzaSyAlyhJ-C5POyo4hofPh3b7ECAxWy6t6lyg&maxResults=50&callback=" + parent.instanceName_str + ".data.parseYoutubePlaylist" : self.sourceURL_str = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=" + self.youtubeUrl_str + "&key=AIzaSyAlyhJ-C5POyo4hofPh3b7ECAxWy6t6lyg&maxResults=50&callback=" + parent.instanceName_str + ".data.parseYoutubePlaylist", null == self.scs_el) try {
						self.scs_el = document.createElement("script"), self.scs_el.src = self.sourceURL_str, self.scs_el.id = parent.instanceName_str + ".data.parseYoutubePlaylist", document.documentElement.appendChild(self.scs_el)
					} catch (e) {}
					self.JSONPRequestTimeoutId_to = setTimeout(self.JSONPRequestTimeoutError, 6e3)
				}
			}, this.JSONPRequestTimeoutError = function () {
				self.stopToLoadPlaylist(), self.isPlaylistDispatchingError_bl = !0, showLoadPlaylistErrorId_to = setTimeout(function () {
					self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Error loading youtube playlist!<font color='#ff0000'>" + self.youtubeUrl_str + "</font>"
					}), self.isPlaylistDispatchingError_bl = !1
				}, 50)
			}, this.resetYoutubePlaylistLoader = function () {
				self.isYoutbe_bl = !1, self.youtubeObject_ar = null, self.nextPageToken_str = null, self.youtubeUrl_str = null
			}, this.ajaxOnErrorHandler = function (e) {
				try {
					window.console && console.log(e), window.console && console.log(e.message)
				} catch (e) {}
				self.loadFromFolder_bl ? self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
					text: "Error loading file : <font color='#ff0000'>" + self.proxyFolderPath_str + "</font>. Make sure the path is correct"
				}) : self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
					text: "Error loading file : <font color='#ff0000'>" + self.proxyPath_str + "</font>. Make sure the path is correct"
				})
			}, this.ajaxOnLoadHandler = function (e) {
				var response, isXML = !1;
				if (4 == self.xhr.readyState)
					if (404 == self.xhr.status) self.loadFromFolder_bl ? self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Folder proxy file path is not found: <font color='#ff0000'>" + self.proxyFolderPath_str + "</font>"
					}) : self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Proxy file path is not found: <font color='#ff0000'>" + self.proxyPath_str + "</font>"
					});
					else if (408 == self.xhr.status) self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
					text: "Proxy file request load timeout!"
				});
				else if (200 == self.xhr.status) {
					if (-1 != self.xhr.responseText.indexOf("<b>Warning</b>:")) return void self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Error loading folder: <font color='#ff0000'>" + self.sourceURL_str + "</font>. Make sure that the folder path is correct!"
					});
					response = window.JSON ? JSON.parse(self.xhr.responseText) : eval("(" + self.xhr.responseText + ")"), response.folder ? self.parseFolderJSON(response) : response.li ? self.parseXML(response) : response.error && self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
						text: "Error loading file: <font color='#ff0000'>" + self.sourceURL_str + "</font>. Make sure the file path (xml or podcast) is correct and well formatted!"
					})
				}
			}, this.parseYoutubePlaylist = function (e) {
				if (!self.isPlaylistDispatchingError_bl && self.isYoutbe_bl) {
					if (e.error) return self.JSONPRequestTimeoutError(), void(console && console.dir(e));
					var t, o;
					self.playlist_ar = [], self.youtubeObject_ar || (self.youtubeObject_ar = []);
					for (var s = 0; s < e.items.length; s++) self.youtubeObject_ar.push(e.items[s]);
					if (t = self.youtubeObject_ar.length, self.stopToLoadPlaylist(), e.nextPageToken && t < self.maxPlaylistItems) return self.nextPageToken_str = e.nextPageToken, void self.loadYoutubePlaylist();
					for (s = 0; s < t && !(s > self.maxPlaylistItems - 1); s++) {
						var i = {};
						if ((o = self.youtubeObject_ar[s]).snippet.thumbnails) {
							i.videoSource = o.snippet.resourceId.videoId, i.startAtVideo = 0, i.videoSource = [{
								source: "https://www.youtube.com/watch?v=" + o.snippet.resourceId.videoId
							}], i.owner = o.snippet.channelTitle, i.title = "<p class='ytbChangeColor' style='color:" + self.youtubeAndFolderVideoTitleColor_str + ";margin:0px;padding:0px;margin-top:2px;margin-bottom:4x;line-height:16px;'>" + o.snippet.title + "</p>";
							var l = o.snippet.description;
							l = (l = i.title.length > 165 ? l.substr(0, 60) : l.substr(0, 90)).substr(0, l.lastIndexOf(" ")) + " ...", i.title += "<p style='color:" + self.youtubeOwnerColor_str + ";margin:0px;padding:0px;margin-top:6px;margin-bottom:4x;line-height:16px;'> " + l + "</p>", i.titleText = o.snippet.title, i.desc = void 0, i.desc = "<p style='color:" + self.youtubeAndFolderVideoTitleColor_str + ";margin:10px;margin-top:12px;margin-bottom:0px;padding:0px;'>" + o.snippet.title + "</p><p style='color:" + self.youtubeDescriptionColor_str + ";margin:0;padding:10px;padding-top:8px;line-height:16px;'>" + o.snippet.description + "</p>", i.downloadable = !1;
							try {
								i.thumbSource = o.snippet.thumbnails.default.url
							} catch (e) {}
							i.posterSource = "none", -1 == o.snippet.title.indexOf("eleted video") && -1 == o.snippet.title.indexOf("his video is unavailable") && (self.playlist_ar.push(i), self.youtubelist_ar = self.playlist_ar)
						}
					}
					clearTimeout(self.dispatchPlaylistLoadCompleteWidthDelayId_to), self.dispatchPlaylistLoadCompleteWidthDelayId_to = setTimeout(function () {
						self.dispatchEvent(FWDUVPData.PLAYLIST_LOAD_COMPLETE)
					}, 50), self.isDataLoaded_bl = !0
				}
			}, this.setYoutubePlaylistHEXColor = function (e) {
				self.youtubeAndFolderVideoTitleColor_str = e
			}, this.closeJsonPLoader = function () {
				clearTimeout(self.JSONPRequestTimeoutId_to)
			}, this.parseDOMPlaylist = function (element, id) {
				if (!self.isPlaylistDispatchingError_bl) {
					var children_ar = FWDUVPUtils.getChildren(element),
						totalChildren = children_ar.length,
						child, has360Video = !1;
					if (self.playlist_ar = [], 0 != totalChildren) {
						for (var i = 0; i < totalChildren; i++) {
							var obj = {},
								adsObj, annotations_ar;
							if (child = children_ar[i], !FWDUVPUtils.hasAttribute(child, "data-thumb-source")) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
								self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
									text: "Attribute <font color='#ff0000'>data-thumb-source</font> is required in the playlist at position <font color='#ff0000'>" + (i + 1)
								})
							}, 50));
							if (!FWDUVPUtils.hasAttribute(child, "data-video-source")) return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
								self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
									text: "Attribute <font color='#ff0000'>data-video-source</font> is required in the playlist at position <font color='#ff0000'>" + (i + 1)
								})
							}, 50));
							if (i > self.maxPlaylistItems - 1) break;
							if (obj.thumbSource = encodeURI(FWDUVPUtils.getAttributeValue(child, "data-thumb-source")), obj.videoSource = FWDUVPUtils.getAttributeValue(child, "data-video-source"), obj.dataPlaybackRate = FWDUVPUtils.getAttributeValue(child, "data-playback-rate"), obj.startAtVideo = FWDUVPUtils.getAttributeValue(child, "data-start-at-video") || 0, obj.isPrivate = FWDUVPUtils.getAttributeValue(child, "data-is-private"), "yes" == obj.isPrivate ? obj.isPrivate = !0 : obj.isPrivate = !1, obj.privateVideoPassword_str = FWDUVPUtils.getAttributeValue(child, "data-private-video-password"), obj.startAtTime = FWDUVPUtils.getAttributeValue(child, "data-start-at-time"), "00:00:00" != obj.startAtTime && FWDUVPUtils.checkTime(obj.startAtTime) || (obj.startAtTime = void 0), obj.stopAtTime = FWDUVPUtils.getAttributeValue(child, "data-stop-at-time"), "00:00:00" != obj.stopAtTime && FWDUVPUtils.checkTime(obj.stopAtTime) || (obj.stopAtTime = void 0), -1 != obj.videoSource.indexOf("{source:")) try {
								obj.videoLabels_ar = [], obj.videoSource = eval(obj.videoSource);
								for (var m = 0; m < obj.videoSource.length; m++) obj.videoLabels_ar[m] = obj.videoSource[m].label;
								for (var m = 0; m < obj.videoSource.length; m++) obj.videoSource[m].source = encodeURI(obj.videoSource[m].source);
								for (var m = 0; m < obj.videoSource.length; m++) obj.videoSource[m].is360 = obj.videoSource[m].is360, "yes" == obj.videoSource[m].is360 && (obj.videoSource[m].is360 = !0), "no" == obj.videoSource[m].is360 && (obj.videoSource[m].is360 = !1), 1 == obj.videoSource[m].is360 && (has360Video = !0);
								obj.videoLabels_ar.reverse()
							} catch (e) {
								return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
									self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
										text: "Please make sure that the <font color='#ff0000'>data-video-source</font> attribute contains an array of videos at position <font color='#ff0000'>" + (i + 1) + "</font>"
									})
								}, 50))
							} else obj.videoSource = [{
								source: obj.videoSource
							}];
							if (FWDUVPUtils.hasAttribute(child, "data-subtitle-soruce"))
								if (obj.subtitleSource = FWDUVPUtils.getAttributeValue(child, "data-subtitle-soruce"), -1 != obj.subtitleSource.indexOf("{source:")) {
									if (obj.startAtSubtitle = FWDUVPUtils.getAttributeValue(child, "data-start-at-subtitle") || 0, -1 != obj.subtitleSource.indexOf("{source:")) {
										try {
											obj.subtitleSource = eval(obj.subtitleSource)
										} catch (e) {
											return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
												self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
													text: "Please make sure that the <font color='#ff0000'>data-subtitle-source</font> attribute contains an array of subtitles at position <font color='#ff0000'>" + (i + 1) + "</font>"
												})
											}, 50))
										}
										obj.subtitleSource.splice(0, 0, {
											source: "none",
											label: self.subtitlesOffLabel_str
										}), obj.subtitleSource.reverse()
									}
								} else obj.subtitleSource = [{
									source: obj.subtitleSource
								}];
							obj.dataAdvertisementOnPauseSource = FWDUVPUtils.getAttributeValue(child, "data-advertisement-on-pause-source"), obj.scrubAtTimeAtFirstPlay = FWDUVPUtils.getAttributeValue(child, "data-scrub-at-time-at-first-play") || "none", /^((?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$)/g.test(obj.scrubAtTimeAtFirstPlay) ? obj.scrubAtTimeAtFirstPlay = FWDUVPUtils.getSecondsFromString(obj.scrubAtTimeAtFirstPlay) : obj.scrubAtTimeAtFirstPlay = void 0, FWDUVPUtils.hasAttribute(child, "data-poster-source") ? obj.posterSource = encodeURI(FWDUVPUtils.getAttributeValue(child, "data-poster-source")) : obj.posterSource = "none", obj.downloadPath = obj.videoSource[obj.startAtVideo], FWDUVPUtils.hasAttribute(child, "data-downloadable") && self.showDownloadVideoButton_bl ? (obj.downloadable = "yes" == FWDUVPUtils.getAttributeValue(child, "data-downloadable"), -1 == obj.downloadPath.source.indexOf(".") && (obj.downloadable = !1)) : obj.downloadable = !1;
							for (var mainPopupAds_ar = FWDUVPUtils.getChildren(child), tempPopupAds_ar, popupAds_ar, popupOrAnnotationChild, finalPopupChild, popupObj, k = 0; k < mainPopupAds_ar.length; k++) {
								if (popupOrAnnotationChild = mainPopupAds_ar[k], FWDUVPUtils.hasAttribute(popupOrAnnotationChild, "data-add-popup")) {
									tempPopupAds_ar = FWDUVPUtils.getChildren(popupOrAnnotationChild), popupAds_ar = [];
									for (var x = 0; x < mainPopupAds_ar.length; x++) finalPopupChild = tempPopupAds_ar[x], finalPopupChild && (popupObj = {}, popupObj.source = encodeURI(FWDUVPUtils.getAttributeValue(finalPopupChild, "image-path")), popupObj.start = FWDUVPUtils.getSecondsFromString(FWDUVPUtils.getAttributeValue(finalPopupChild, "data-time-start")), popupObj.end = FWDUVPUtils.getSecondsFromString(FWDUVPUtils.getAttributeValue(finalPopupChild, "data-time-end")), popupObj.link = FWDUVPUtils.getAttributeValue(finalPopupChild, "data-link"), popupObj.target = FWDUVPUtils.getAttributeValue(finalPopupChild, "data-target"), popupAds_ar.push(popupObj));
									obj.popupAds_ar = popupAds_ar
								}
								if (FWDUVPUtils.hasAttribute(popupOrAnnotationChild, "data-ads")) {
									var adsChild;
									adsData_ar = FWDUVPUtils.getChildren(popupOrAnnotationChild), ads_ar = [];
									for (var tt = adsData_ar.length, m = 0; m < tt; m++) {
										var adsObj = {};
										adsChild = adsData_ar[m], adsObj.timeStart = FWDUVPUtils.getSecondsFromString(FWDUVPUtils.getAttributeValue(adsChild, "data-time-start")), FWDUVPUtils.hasAttribute(adsChild, "data-add-duration") && (adsObj.addDuration = FWDUVPUtils.getSecondsFromString(FWDUVPUtils.getAttributeValue(adsChild, "data-add-duration"))), adsObj.thumbnailSource = FWDUVPUtils.getAttributeValue(adsChild, "data-thumbnail-source"), "" != adsObj.thumbnailSource && " " != adsObj.thumbnailSource || (adsObj.thumbnailSource = void 0), adsObj.timeToHoldAds = FWDUVPUtils.getAttributeValue(adsChild, "data-time-to-hold-ads") || 4, adsObj.source = FWDUVPUtils.getAttributeValue(adsChild, "data-source"), adsObj.link = FWDUVPUtils.getAttributeValue(adsChild, "data-link"), adsObj.target = FWDUVPUtils.getAttributeValue(adsChild, "data-target"), ads_ar[m] = adsObj
									}
									obj.ads_ar = ads_ar
								}
								if (FWDUVPUtils.hasAttribute(popupOrAnnotationChild, "data-cuepoints")) {
									var cuepointsChild;
									cuepointsData_ar = FWDUVPUtils.getChildren(popupOrAnnotationChild), cuepoints_ar = [];
									for (var tt = cuepointsData_ar.length, m = 0; m < tt; m++) {
										var cuepointsObj = {};
										cuepointsChild = cuepointsData_ar[m], cuepointsObj.timeStart = FWDUVPUtils.getSecondsFromString(FWDUVPUtils.getAttributeValue(cuepointsChild, "data-time-start")), cuepointsObj.javascriptCall = FWDUVPUtils.getAttributeValue(cuepointsChild, "data-javascript-call"), cuepointsObj.isPlayed_bl = !1, cuepoints_ar[m] = cuepointsObj
									}
									obj.cuepoints_ar = cuepoints_ar
								}
								if (FWDUVPUtils.hasAttribute(popupOrAnnotationChild, "data-annotations")) {
									var annotationChild;
									annotations_ar = FWDUVPUtils.getChildren(popupOrAnnotationChild);
									for (var tt = annotations_ar.length, m = 0; m < tt; m++) {
										var annotationObj = {};
										annotationChild = annotations_ar[m], annotationObj.start = FWDUVPUtils.getSecondsFromString(FWDUVPUtils.getAttributeValue(annotationChild, "data-start-time")), annotationObj.end = FWDUVPUtils.getSecondsFromString(FWDUVPUtils.getAttributeValue(annotationChild, "data-end-time")), annotationObj.left = parseInt(FWDUVPUtils.getAttributeValue(annotationChild, "data-left"), 10), annotationObj.top = parseInt(FWDUVPUtils.getAttributeValue(annotationChild, "data-top"), 10), annotationObj.showCloseButton_bl = "yes" == FWDUVPUtils.getAttributeValue(annotationChild, "data-show-close-button"), annotationObj.clickSource = FWDUVPUtils.getAttributeValue(annotationChild, "data-click-source"), annotationObj.clickSourceTarget = FWDUVPUtils.getAttributeValue(annotationChild, "data-click-source-target"), annotationObj.normalStateClass = FWDUVPUtils.getAttributeValue(annotationChild, "data-normal-state-class"), annotationObj.selectedStateClass = FWDUVPUtils.getAttributeValue(annotationChild, "data-selected-state-class"), annotationObj.content = annotationChild.innerHTML, annotations_ar[m] = annotationObj
									}
									obj.annotations_ar = annotations_ar
								}
							}
							var descChidren_ar = FWDUVPUtils.getChildren(child),
								descChild;
							obj.title = "not defined!", obj.titleText = "not defined!";
							for (var k = 0; k < descChidren_ar.length; k++) descChild = descChidren_ar[k], FWDUVPUtils.hasAttribute(descChild, "data-video-short-description") ? (obj.title = descChild.innerHTML, FWDUVPUtils.isIEAndLessThen9 ? obj.titleText = descChild.innerText : obj.titleText = descChild.textContent) : FWDUVPUtils.hasAttribute(descChild, "data-video-long-description") && (obj.desc = descChild.innerHTML);
							FWDUVPUtils.hasAttribute(child, "data-ads-source") && (adsObj = {}, adsObj.source = FWDUVPUtils.getAttributeValue(child, "data-ads-source"), adsObj.pageToOpen = FWDUVPUtils.getAttributeValue(child, "data-ads-page-to-open-url"), adsObj.pageTarget = FWDUVPUtils.getAttributeValue(child, "data-ads-page-target") || "_blank", adsObj.timeToHoldAds = parseInt(FWDUVPUtils.getAttributeValue(child, "data-time-to-hold-ads")) || 0, obj.ads = adsObj), self.playlist_ar[i] = obj
						}
						clearTimeout(self.dispatchPlaylistLoadCompleteWidthDelayId_to), self.dispatchPlaylistLoadCompleteWidthDelayId_to = setTimeout(function () {
							self.dispatchEvent(FWDUVPData.PLAYLIST_LOAD_COMPLETE)
						}, 50), self.isDataLoaded_bl = !0
					} else showLoadPlaylistErrorId_to = setTimeout(function () {
						self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
							text: "This Broker Does Not Have Any Video"
						}), self.isPlaylistDispatchingError_bl = !1
					}, 50)
				}
			}, this.parseFolderJSON = function (e) {
				var t;
				self.playlist_ar = [];
				for (var o = e.folder, s = 0; s < o.length && ((t = {}).videoSource = encodeURI(o[s]["@attributes"]["data-video-path"]), t.videoSource = o[s]["@attributes"]["data-video-path"], t.dataPlaybackRate = o[s]["@attributes"]["data-playback-rate"], t.startAtVideo = o[s]["@attributes"]["data-start-at-video"] || 0, t.videoSource = [{
						source: encodeURI(t.videoSource)
					}], t.thumbSource = encodeURI(o[s]["@attributes"]["data-thumb-path"]), t.posterSource = encodeURI(o[s]["@attributes"]["data-poster-path"]), t.downloadPath = encodeURIComponent(o[s]["@attributes"]["download-path"]), t.downloadable = self.showDownloadVideoButton_bl, self.forceDisableDownloadButtonForFolder_bl && (t.downloadable = !1), t.titleText = "...", t.title = "<p style='color:" + self.youtubeAndFolderVideoTitleColor_str + ";margin:0px;padding:0px;margin-top:2px;margin-bottom:4x;line-height:16px;'>...</p>", t.desc = void 0, self.playlist_ar[s] = t, !(s > self.maxPlaylistItems - 1)); s++);
				clearTimeout(self.dispatchPlaylistLoadCompleteWidthDelayId_to), self.dispatchPlaylistLoadCompleteWidthDelayId_to = setTimeout(function () {
					self.dispatchEvent(FWDUVPData.PLAYLIST_LOAD_COMPLETE)
				}, 50), self.isDataLoaded_bl = !0
			}, this.parseXML = function (response) {
				var obj;
				self.playlist_ar = [];
				var obj_ar = response.li,
					has360Video = !1;
				obj_ar.length || (obj_ar = [obj_ar]);
				for (var i = 0; i < obj_ar.length; i++) {
					if (obj = {}, obj.videoSource = obj_ar[i]["@attributes"]["data-video-source"], obj.startAtVideo = obj_ar[i]["@attributes"]["data-start-at-video"] || 0, obj.isPrivate = obj_ar[i]["@attributes"]["data-is-private"], "yes" == obj.isPrivate ? obj.isPrivate = !0 : obj.isPrivate = !1, obj.privateVideoPassword_str = obj_ar[i]["@attributes"]["data-private-video-password"], obj.startAtTime = obj_ar[i]["@attributes"]["data-start-at-time"], "00:00:00" != obj.startAtTime && FWDUVPUtils.checkTime(obj.startAtTime) || (obj.startAtTime = void 0), obj.stopAtTime = obj_ar[i]["@attributes"]["data-stop-at-time"], "00:00:00" != obj.stopAtTime && FWDUVPUtils.checkTime(obj.stopAtTime) || (obj.stopAtTime = void 0), -1 != obj.videoSource.indexOf("{source:")) try {
						obj.videoLabels_ar = [], obj.videoSource = eval(obj.videoSource);
						for (var m = 0; m < obj.videoSource.length; m++) obj.videoLabels_ar[m] = obj.videoSource[m].label;
						for (var m = 0; m < obj.videoSource.length; m++) obj.videoSource[m].source = encodeURI(obj.videoSource[m].source);
						for (var m = 0; m < obj.videoSource.length; m++) obj.videoSource[m].is360 = obj.videoSource[m].is360, "yes" == obj.videoSource[m].is360 && (obj.videoSource[m].is360 = !0), "no" == obj.videoSource[m].is360 && (obj.videoSource[m].is360 = !1), 1 == obj.videoSource[m].is360 && (has360Video = !0);
						obj.videoLabels_ar.reverse()
					} catch (e) {
						return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
							self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
								text: "Please make sure that the <font color='#ff0000'>data-video-source</font> attribute contains an array of videos at position <font color='#ff0000'>" + (i + 1) + "</font>"
							})
						}, 50))
					} else obj.videoSource = [{
						source: encodeURI(obj.videoSource)
					}];
					if (obj.subtitleSource = obj_ar[i]["@attributes"]["data-subtitle-soruce"], obj.startAtSubtitle = obj_ar[i]["@attributes"]["data-start-at-subtitle"] || 0, obj.subtitleSource)
						if (-1 != obj.subtitleSource.indexOf("{source:")) {
							if (-1 != obj.subtitleSource.indexOf("{source:")) {
								try {
									obj.subtitleSource = eval(obj.subtitleSource)
								} catch (e) {
									return self.isPlaylistDispatchingError_bl = !0, void(showLoadPlaylistErrorId_to = setTimeout(function () {
										self.dispatchEvent(FWDRVPData.LOAD_ERROR, {
											text: "Please make sure that the <font color='#ff0000'>data-subtitle-source</font> attribute contains an array of subtitles at position <font color='#ff0000'>" + (i + 1) + "</font>"
										})
									}, 50))
								}
								obj.subtitleSource.splice(0, 0, {
									source: "none",
									label: self.subtitlesOffLabel_str
								}), obj.subtitleSource.reverse()
							}
						} else obj.subtitleSource = [{
							source: obj.subtitleSource
						}];
					if (obj.dataAdvertisementOnPauseSource = obj_ar[i]["@attributes"]["data-advertisement-on-pause-source"], obj.scrubAtTimeAtFirstPlay = obj_ar[i]["@attributes"]["data-scrub-at-time-at-first-play"], obj.scrubAtTimeAtFirstPlay && /^((?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$)/g.test(obj.scrubAtTimeAtFirstPlay) && (obj.scrubAtTimeAtFirstPlay = FWDRVPUtils.getSecondsFromString(obj.scrubAtTimeAtFirstPlay)), obj.downloadPath = obj.videoSource[obj.startAtVideo], obj.downloadable = "yes" == obj_ar[i]["@attributes"]["data-downloadable"], -1 == obj.videoSource[0].source.indexOf(".") && (obj.downloadable = !1), obj.posterSource = encodeURI(obj_ar[i]["@attributes"]["data-poster-source"]), obj.thumbSource = obj_ar[i]["@attributes"]["data-thumb-source"], obj.title = obj_ar[i]["@attributes"]["data-title"], obj.titleText = obj_ar[i]["@attributes"]["data-title"], obj.desc = obj_ar[i]["@attributes"]["data-desc"], obj_ar[i]["@attributes"]["data-ads-source"] && (adsObj = {}, adsObj.source = obj_ar[i]["@attributes"]["data-ads-source"], adsObj.pageToOpen = obj_ar[i]["@attributes"]["data-ads-page-to-open-url"], adsObj.pageTarget = obj_ar[i]["@attributes"]["data-ads-page-target"] || "_blank", adsObj.timeToHoldAds = obj_ar[i]["@attributes"]["data-time-to-hold-ads"] || 0, obj.ads = adsObj), obj_ar[i]["@attributes"]["data-cuepoints"] && (adsObj = {}, adsObj.timeStart = obj_ar[i]["@attributes"]["data-time-start"], adsObj.javascriptCall = obj_ar[i]["@attributes"]["data-javascript-call"], adsObj.isPlayed_bl = !1, obj.cuepoints_ar = adsObj), self.playlist_ar[i] = obj, i > self.maxPlaylistItems - 1) break
				}
				clearTimeout(self.dispatchPlaylistLoadCompleteWidthDelayId_to), self.dispatchPlaylistLoadCompleteWidthDelayId_to = setTimeout(function () {
					self.dispatchEvent(FWDUVPData.PLAYLIST_LOAD_COMPLETE)
				}, 50), self.isDataLoaded_bl = !0
			}, this.stopToLoadPlaylist = function () {
				self.closeJsonPLoader();
				try {
					self.scs_el.src = null, document.documentElement.removeChild(self.scs_el), self.scs_el = null
				} catch (e) {}
				if (null != self.xhr) {
					try {
						self.xhr.abort()
					} catch (e) {}
					self.xhr.onreadystatechange = null, self.xhr.onerror = null, self.xhr = null
				}
			}, self.showPropertyError = function (e) {
				self.dispatchEvent(FWDUVPData.LOAD_ERROR, {
					text: "The property called <font color='#ff0000'>" + e + "</font> is not defined."
				})
			}, self.init()
		};
		FWDUVPData.setPrototype = function () {
			FWDUVPData.prototype = new FWDUVPEventDispatcher
		}, FWDUVPData.prototype = null, FWDUVPData.PLAYLIST_LOAD_COMPLETE = "playlistLoadComplete", FWDUVPData.PRELOADER_LOAD_DONE = "onPreloaderLoadDone", FWDUVPData.LOAD_DONE = "onLoadDone", FWDUVPData.LOAD_ERROR = "onLoadError", FWDUVPData.IMAGE_LOADED = "onImageLoaded", FWDUVPData.SKIN_LOAD_COMPLETE = "onSkinLoadComplete", FWDUVPData.SKIN_PROGRESS = "onSkinProgress", FWDUVPData.IMAGES_PROGRESS = "onImagesPogress", window.FWDUVPData = FWDUVPData
	}(window), window.FWDUVPDisplayObject = function (e, t, o, s) {
		var i = this;
		i.listeners = {
			events_ar: []
		}, i.type = e, this.children_ar = [], this.style, this.screen, this.transform, this.position = t || "absolute", this.overflow = o || "hidden", this.display = s || "inline-block", this.visible = !0, this.buttonMode, this.x = 0, this.y = 0, this.w = 0, this.h = 0, this.rect, this.alpha = 1, this.innerHTML = "", this.opacityType = "", this.isHtml5_bl = !1, this.hasTransform3d_bl = FWDUVPUtils.hasTransform3d, this.hasTransform2d_bl = FWDUVPUtils.hasTransform2d, (FWDUVPUtils.isFirefox || FWDUVPUtils.isIE) && (i.hasTransform3d_bl = !1), (FWDUVPUtils.isFirefox || FWDUVPUtils.isIE) && (i.hasTransform2d_bl = !1), this.hasBeenSetSelectable_bl = !1, i.init = function () {
			i.setScreen()
		}, i.getTransform = function () {
			for (var e, t = ["transform", "msTransform", "WebkitTransform", "MozTransform", "OTransform"]; e = t.shift();)
				if (void 0 !== i.screen.style[e]) return e;
			return !1
		}, i.getOpacityType = function () {
			return void 0 !== i.screen.style.opacity ? "opacity" : "filter"
		}, i.setScreen = function (e) {
			"img" == i.type && e ? (i.screen = null, i.screen = e, i.setMainProperties()) : (i.screen = document.createElement(i.type), i.setMainProperties())
		}, i.setMainProperties = function () {
			i.transform = i.getTransform(), i.setPosition(i.position), i.setOverflow(i.overflow), i.opacityType = i.getOpacityType(), "opacity" == i.opacityType && (i.isHtml5_bl = !0), "filter" == i.opacityType && (i.screen.style.filter = "inherit"), i.screen.style.left = "0px", i.screen.style.top = "0px", i.screen.style.margin = "0px", i.screen.style.padding = "0px", i.screen.style.maxWidth = "none", i.screen.style.maxHeight = "none", i.screen.style.border = "none", i.screen.style.lineHeight = "1", i.screen.style.backgroundColor = "transparent", i.screen.style.backfaceVisibility = "hidden", i.screen.style.webkitBackfaceVisibility = "hidden", i.screen.style.MozBackfaceVisibility = "hidden", "img" == e && (i.setWidth(i.screen.width), i.setHeight(i.screen.height))
		}, i.setBackfaceVisibility = function () {
			i.screen.style.backfaceVisibility = "visible", i.screen.style.webkitBackfaceVisibility = "visible", i.screen.style.MozBackfaceVisibility = "visible"
		}, i.setSelectable = function (e) {
			e ? (FWDUVPUtils.isFirefox || FWDUVPUtils.isIE ? (i.screen.style.userSelect = "element", i.screen.style.MozUserSelect = "element", i.screen.style.msUserSelect = "element") : FWDUVPUtils.isSafari ? (i.screen.style.userSelect = "text", i.screen.style.webkitUserSelect = "text") : (i.screen.style.userSelect = "all", i.screen.style.webkitUserSelect = "all"), i.screen.style.khtmlUserSelect = "all", i.screen.style.oUserSelect = "all", FWDUVPUtils.isIEAndLessThen9 ? (i.screen.ondragstart = null, i.screen.onselectstart = null, i.screen.ontouchstart = null) : (i.screen.ondragstart = void 0, i.screen.onselectstart = void 0, i.screen.ontouchstart = void 0), i.screen.style.webkitTouchCallout = "default", i.hasBeenSetSelectable_bl = !1) : (i.screen.style.userSelect = "none", i.screen.style.MozUserSelect = "none", i.screen.style.webkitUserSelect = "none", i.screen.style.khtmlUserSelect = "none", i.screen.style.oUserSelect = "none", i.screen.style.msUserSelect = "none", i.screen.msUserSelect = "none", i.screen.ondragstart = function (e) {
				return !1
			}, i.screen.onselectstart = function () {
				return !1
			}, i.screen.ontouchstart = function () {
				return !1
			}, i.screen.style.webkitTouchCallout = "none", i.hasBeenSetSelectable_bl = !0)
		}, i.getScreen = function () {
			return i.screen
		}, i.setVisible = function (e) {
			i.visible = e, 1 == i.visible ? i.screen.style.visibility = "visible" : i.screen.style.visibility = "hidden"
		}, i.getVisible = function () {
			return i.visible
		}, i.setResizableSizeAfterParent = function () {
			i.screen.style.width = "100%", i.screen.style.height = "100%"
		}, i.getStyle = function () {
			return i.screen.style
		}, i.setOverflow = function (e) {
			i.overflow = e, i.screen.style.overflow = i.overflow
		}, i.setPosition = function (e) {
			i.position = e, i.screen.style.position = i.position
		}, i.setDisplay = function (e) {
			i.display = e, i.screen.style.display = i.display
		}, i.setButtonMode = function (e) {
			i.buttonMode = e, 1 == i.buttonMode ? i.screen.style.cursor = "pointer" : i.screen.style.cursor = "default"
		}, i.setBkColor = function (e) {
			i.screen.style.backgroundColor = e
		}, i.setInnerHTML = function (e) {
			i.innerHTML = e, i.screen.innerHTML = i.innerHTML
		}, i.getInnerHTML = function () {
			return i.innerHTML
		}, i.getRect = function () {
			return i.screen.getBoundingClientRect()
		}, i.setAlpha = function (e) {
			i.alpha = e, "opacity" == i.opacityType ? i.screen.style.opacity = i.alpha : "filter" == i.opacityType && (i.screen.style.filter = "alpha(opacity=" + 100 * i.alpha + ")", i.screen.style.filter = "progid:DXImageTransform.Microsoft.Alpha(Opacity=" + Math.round(100 * i.alpha) + ")")
		}, i.getAlpha = function () {
			return i.alpha
		}, i.getRect = function () {
			return i.screen.getBoundingClientRect()
		}, i.getGlobalX = function () {
			return i.getRect().left
		}, i.getGlobalY = function () {
			return i.getRect().top
		}, i.setX = function (e) {
			i.x = e, i.hasTransform3d_bl ? i.screen.style[i.transform] = "translate3d(" + i.x + "px," + i.y + "px,0)" : i.hasTransform2d_bl ? i.screen.style[i.transform] = "translate(" + i.x + "px," + i.y + "px)" : i.screen.style.left = i.x + "px"
		}, i.getX = function () {
			return i.x
		}, i.setY = function (e) {
			i.y = e, i.hasTransform3d_bl ? i.screen.style[i.transform] = "translate3d(" + i.x + "px," + i.y + "px,0)" : i.hasTransform2d_bl ? i.screen.style[i.transform] = "translate(" + i.x + "px," + i.y + "px)" : i.screen.style.top = i.y + "px"
		}, i.getY = function () {
			return i.y
		}, i.setWidth = function (e) {
			i.w = e, "img" == i.type ? (i.screen.width = i.w, i.screen.style.width = i.w + "px") : i.screen.style.width = i.w + "px"
		}, i.getWidth = function () {
			return "div" == i.type || "input" == i.type ? 0 != i.screen.offsetWidth ? i.screen.offsetWidth : i.w : "img" == i.type ? 0 != i.screen.offsetWidth ? i.screen.offsetWidth : 0 != i.screen.width ? i.screen.width : i._w : "canvas" == i.type ? 0 != i.screen.offsetWidth ? i.screen.offsetWidth : i.w : void 0
		}, i.setHeight = function (e) {
			i.h = e, "img" == i.type ? (i.screen.height = i.h, i.screen.style.height = i.h + "px") : i.screen.style.height = i.h + "px"
		}, i.getHeight = function () {
			return "div" == i.type || "input" == i.type ? 0 != i.screen.offsetHeight ? i.screen.offsetHeight : i.h : "img" == i.type ? 0 != i.screen.offsetHeight ? i.screen.offsetHeight : 0 != i.screen.height ? i.screen.height : i.h : "canvas" == i.type ? 0 != i.screen.offsetHeight ? i.screen.offsetHeight : i.h : void 0
		}, i.addChild = function (e) {
			i.contains(e) ? (i.children_ar.splice(FWDUVPUtils.indexOfArray(i.children_ar, e), 1), i.children_ar.push(e), i.screen.appendChild(e.screen)) : (i.children_ar.push(e), i.screen.appendChild(e.screen))
		}, i.removeChild = function (e) {
			if (!i.contains(e)) throw Error("##removeChild()## Child dose't exist, it can't be removed!");
			i.children_ar.splice(FWDUVPUtils.indexOfArray(i.children_ar, e), 1), i.screen.removeChild(e.screen)
		}, i.contains = function (e) {
			return -1 != FWDUVPUtils.indexOfArray(i.children_ar, e)
		}, i.addChildAt = function (e, t) {
			if (0 == i.getNumChildren()) i.children_ar.push(e), i.screen.appendChild(e.screen);
			else if (1 == t) i.screen.insertBefore(e.screen, i.children_ar[0].screen), i.screen.insertBefore(i.children_ar[0].screen, e.screen), i.contains(e) ? i.children_ar.splice(FWDUVPUtils.indexOfArray(i.children_ar, e), 1, e) : i.children_ar.splice(FWDUVPUtils.indexOfArray(i.children_ar, e), 0, e);
			else {
				if (t < 0 || t > i.getNumChildren() - 1) throw Error("##getChildAt()## Index out of bounds!");
				i.screen.insertBefore(e.screen, i.children_ar[t].screen), i.contains(e) ? i.children_ar.splice(FWDUVPUtils.indexOfArray(i.children_ar, e), 1, e) : i.children_ar.splice(FWDUVPUtils.indexOfArray(i.children_ar, e), 0, e)
			}
		}, i.getChildAt = function (e) {
			if (e < 0 || e > i.getNumChildren() - 1) throw Error("##getChildAt()## Index out of bounds!");
			if (0 == i.getNumChildren()) throw Error("##getChildAt## Child dose not exist!");
			return i.children_ar[e]
		}, i.getChildIndex = function (e) {
			return i.contains(e) ? FWDUVPUtils.indexOfArray(i.children_ar, e) : 0
		}, i.removeChildAtZero = function () {
			i.screen.removeChild(i.children_ar[0].screen), i.children_ar.shift()
		}, i.getNumChildren = function () {
			return i.children_ar.length
		}, i.addListener = function (e, t) {
			if (null == e) throw Error("type is required.");
			if ("object" == typeof e) throw Error("type must be of type String.");
			if ("function" != typeof t) throw Error("listener must be of type Function.");
			var o = {};
			o.type = e, o.listener = t, o.target = this, this.listeners.events_ar.push(o)
		}, i.dispatchEvent = function (e, t) {
			if (null != this.listeners) {
				if (null == e) throw Error("type is required.");
				if ("object" == typeof e) throw Error("type must be of type String.");
				for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
					if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e) {
						if (t)
							for (var i in t) this.listeners.events_ar[o][i] = t[i];
						this.listeners.events_ar[o].listener.call(this, this.listeners.events_ar[o])
					}
			}
		}, i.removeListener = function (e, t) {
			if (null == e) throw Error("type is required.");
			if ("object" == typeof e) throw Error("type must be of type String.");
			if ("function" != typeof t) throw Error("listener must be of type Function." + e);
			for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
				if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e && this.listeners.events_ar[o].listener === t) {
					this.listeners.events_ar.splice(o, 1);
					break
				}
		}, i.disposeImage = function () {
			"img" == i.type && (i.screen.src = null)
		}, i.destroy = function () {
			i.hasBeenSetSelectable_bl && (i.screen.ondragstart = null, i.screen.onselectstart = null, i.screen.ontouchstart = null), i.screen.removeAttribute("style"), i.listeners = [], i.listeners = null, i.children_ar = [], i.children_ar = null, i.style = null, i.screen = null, i.transform = null, i.position = null, i.overflow = null, i.display = null, i.visible = null, i.buttonMode = null, i.x = null, i.y = null, i.w = null, i.h = null, i.rect = null, i.alpha = null, i.innerHTML = null, i.opacityType = null, i.isHtml5_bl = null, i.hasTransform3d_bl = null, i.hasTransform2d_bl = null, i = null
		}, i.init()
	}, void 0 === asual) var asual = {};
void 0 === asual.util && (asual.util = {}), asual.util.Browser = new function () {
	var e = navigator.userAgent.toLowerCase(),
		t = /webkit/.test(e),
		o = /opera/.test(e),
		s = /msie/.test(e) && !/opera/.test(e),
		i = /mozilla/.test(e) && !/(compatible|webkit)/.test(e),
		l = parseFloat(s ? e.substr(e.indexOf("msie") + 4) : (e.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [0, "0"])[1]);
	this.toString = function () {
		return "[class Browser]"
	}, this.getVersion = function () {
		return l
	}, this.isMSIE = function () {
		return s
	}, this.isSafari = function () {
		return t
	}, this.isOpera = function () {
		return o
	}, this.isMozilla = function () {
		return i
	}
}, asual.util.Events = new function () {
	var e = "DOMContentLoaded",
		t = "onstop",
		o = window,
		s = document,
		i = [],
		l = asual.util,
		n = l.Browser,
		r = n.isMSIE(),
		a = n.isSafari();
	this.toString = function () {
		return "[class Events]"
	}, this.addListener = function (t, o, s) {
		i.push({
			o: t,
			t: o,
			l: s
		}), o == e && (r || a) || (t.addEventListener ? t.addEventListener(o, s, !1) : t.attachEvent && t.attachEvent("on" + o, s))
	}, this.removeListener = function (t, o, s) {
		for (var l, n = 0; l = i[n]; n++)
			if (l.o == t && l.t == o && l.l == s) {
				i.splice(n, 1);
				break
			}
		o == e && (r || a) || (t.removeEventListener ? t.removeEventListener(o, s, !1) : t.detachEvent && t.detachEvent("on" + o, s))
	};
	var d = function () {
		for (var t, o = 0; t = i[o]; o++) t.t != e && l.Events.removeListener(t.o, t.t, t.l)
	};
	(r || a) && function () {
		try {
			(r && s.body || !/loaded|complete/.test(s.readyState)) && s.documentElement.doScroll("left")
		} catch (t) {
			return setTimeout(arguments.callee, 0)
		}
		for (var t, o = 0; t = i[o]; o++) t.t == e && t.l.call(null)
	}(), r && o.attachEvent && o.attachEvent("onbeforeunload", function () {
		if ("interactive" == s.readyState) {
			function e() {
				s.detachEvent(t, e), d()
			}
			s.attachEvent(t, e), o.setTimeout(function () {
				s.detachEvent(t, e)
			}, 0)
		}
	}), this.addListener(o, "unload", d)
}, asual.util.Functions = new function () {
	this.toString = function () {
		return "[class Functions]"
	}, this.bind = function (e, t, o) {
		for (var s, i = 2, l = []; s = arguments[i]; i++) l.push(s);
		return function () {
			return e.apply(t, l)
		}
	}
};
var FWDAddressEvent = function (e) {
	this.toString = function () {
		return "[object FWDAddressEvent]"
	}, this.type = e, this.target = FWDAddress, this.value = FWDAddress.getValue(), this.path = FWDAddress.getPath(), this.pathNames = FWDAddress.getPathNames(), this.parameters = {};
	for (var t = FWDAddress.getParameterNames(), o = 0, s = t.length; o < s; o++) this.parameters[t[o]] = FWDAddress.getParameter(t[o]);
	this.parameterNames = t
};
FWDAddressEvent.INIT = "init", FWDAddressEvent.CHANGE = "change", FWDAddressEvent.INTERNAL_CHANGE = "internalChange", FWDAddressEvent.EXTERNAL_CHANGE = "externalChange";
var FWDAddress = new function () {
	var _getHash = function () {
			var e = _l.href.indexOf("#");
			return -1 != e ? _ec(_dc(_l.href.substr(e + 1))) : ""
		},
		_getWindow = function () {
			try {
				return top.document, top
			} catch (e) {
				return window
			}
		},
		_strictCheck = function (e, t) {
			return _opts.strict && (e = t ? "/" != e.substr(0, 1) ? "/" + e : e : "" == e ? "/" : e), e
		},
		_ieLocal = function (e, t) {
			return _msie && "file:" == _l.protocol ? t ? _value.replace(/\?/, "%3F") : _value.replace(/%253F/, "?") : e
		},
		_searchScript = function (e) {
			if (e.childNodes)
				for (var t, o = 0, s = e.childNodes.length; o < s; o++)
					if (e.childNodes[o].src && (_url = String(e.childNodes[o].src)), t = _searchScript(e.childNodes[o])) return t
		},
		_titleCheck = function () {
			_d.title != _title && -1 != _d.title.indexOf("#") && (_d.title = _title)
		},
		_listen = function () {
			if (!_silent) {
				var e = _getHash(),
					t = !(_value == e);
				_safari && _version < 523 ? _length != _h.length && (_length = _h.length, typeof _stack[_length - 1] != UNDEFINED && (_value = _stack[_length - 1]), _update.call(this, !1)) : _msie && t ? _version < 7 ? _l.reload() : this.setValue(e) : t && (_value = e, _update.call(this, !1)), _msie && _titleCheck.call(this)
			}
		},
		_bodyClick = function (e) {
			if (_popup.length > 0) {
				var popup = window.open(_popup[0], _popup[1], eval(_popup[2]));
				typeof _popup[3] != UNDEFINED && eval(_popup[3])
			}
			_popup = []
		},
		_swfChange = function () {
			for (var e, t, o = 0, s = FWDAddress.getValue(), i = "setFWDAddressValue"; e = _ids[o]; o++)
				if (t = document.getElementById(e))
					if (t.parentNode && typeof t.parentNode.so != UNDEFINED) t.parentNode.so.call(i, s);
					else {
						if (!t || typeof t[i] == UNDEFINED) {
							var l = t.getElementsByTagName("object"),
								n = t.getElementsByTagName("embed");
							t = l[0] && typeof l[0][i] != UNDEFINED ? l[0] : n[0] && typeof n[0][i] != UNDEFINED ? n[0] : null
						}
						t && t[i](s)
					}
			else(t = document[e]) && typeof t[i] != UNDEFINED && t[i](s)
		},
		_jsDispatch = function (e) {
			this.dispatchEvent(new FWDAddressEvent(e)), typeof this["on" + (e = e.substr(0, 1).toUpperCase() + e.substr(1))] == FUNCTION && this["on" + e]()
		},
		_jsInit = function () {
			_util.Browser.isSafari() && _d.body.addEventListener("click", _bodyClick), _jsDispatch.call(this, "init")
		},
		_jsChange = function () {
			_swfChange(), _jsDispatch.call(this, "change")
		},
		_update = function (e) {
			_jsChange.call(this), e ? _jsDispatch.call(this, "internalChange") : _jsDispatch.call(this, "externalChange"), _st(_functions.bind(_track, this), 10)
		},
		_track = function () {
			var e = (_l.pathname + (/\/$/.test(_l.pathname) ? "" : "/") + this.getValue()).replace(/\/\//, "/").replace(/^\/$/, ""),
				t = _t[_opts.tracker];
			typeof t == FUNCTION ? t(e) : typeof _t.pageTracker != UNDEFINED && typeof _t.pageTracker._trackPageview == FUNCTION ? _t.pageTracker._trackPageview(e) : typeof _t.urchinTracker == FUNCTION && _t.urchinTracker(e)
		},
		_htmlWrite = function () {
			var e = _frame.contentWindow.document;
			e.open(), e.write("<html><head><title>" + _d.title + "</title><script>var " + ID + ' = "' + _getHash() + '";<\/script></head></html>'), e.close()
		},
		_htmlLoad = function () {
			var e = _frame.contentWindow;
			e.location.href;
			(_value = typeof e[ID] != UNDEFINED ? e[ID] : "") != _getHash() && (_update.call(FWDAddress, !1), _l.hash = _ieLocal(_value, TRUE))
		},
		_load = function () {
			if (!_loaded) {
				if (_loaded = TRUE, _msie && _version < 8) {
					var e = _d.getElementsByTagName("frameset")[0];
					_frame = _d.createElement((e ? "" : "i") + "frame"), e ? (e.insertAdjacentElement("beforeEnd", _frame), e[e.cols ? "cols" : "rows"] += ",0", _frame.src = "javascript:false", _frame.noResize = !0, _frame.frameBorder = _frame.frameSpacing = 0) : (_frame.src = "javascript:false", _frame.style.display = "none", _d.body.insertAdjacentElement("afterBegin", _frame)), _st(function () {
						_events.addListener(_frame, "load", _htmlLoad), typeof _frame.contentWindow[ID] == UNDEFINED && _htmlWrite()
					}, 50)
				} else _safari && (_version < 418 && (_d.body.innerHTML += '<form id="' + ID + '" style="position:absolute;top:-9999px;" method="get"></form>', _form = _d.getElementById(ID)), typeof _l[ID] == UNDEFINED && (_l[ID] = {}), typeof _l[ID][_l.pathname] != UNDEFINED && (_stack = _l[ID][_l.pathname].split(",")));
				_st(_functions.bind(function () {
					_jsInit.call(this), _jsChange.call(this), _track.call(this)
				}, this), 1), _msie && _version >= 8 ? (_d.body.onhashchange = _functions.bind(_listen, this), _si(_functions.bind(_titleCheck, this), 50)) : _si(_functions.bind(_listen, this), 50)
			}
		},
		ID = "swfaddress",
		FUNCTION = "function",
		UNDEFINED = "undefined",
		TRUE = !0,
		FALSE = !1,
		_util = asual.util,
		_browser = _util.Browser,
		_events = _util.Events,
		_functions = _util.Functions,
		_version = _browser.getVersion(),
		_msie = _browser.isMSIE(),
		_mozilla = _browser.isMozilla(),
		_opera = _browser.isOpera(),
		_safari = _browser.isSafari(),
		_supported = FALSE,
		_t = _getWindow(),
		_d = _t.document,
		_h = _t.history,
		_l = _t.location,
		_si = setInterval,
		_st = setTimeout,
		_dc = decodeURI,
		_ec = encodeURI,
		_frame, _form, _url, _title = _d.title,
		_length = _h.length,
		_silent = FALSE,
		_loaded = FALSE,
		_justset = TRUE,
		_juststart = TRUE,
		_ref = this,
		_stack = [],
		_ids = [],
		_popup = [],
		_listeners = {},
		_value = _getHash(),
		_opts = {
			history: TRUE,
			strict: TRUE
		};
	if (_msie && _d.documentMode && _d.documentMode != _version && (_version = 8 != _d.documentMode ? 7 : 8), _supported = _mozilla && _version >= 1 || _msie && _version >= 6 || _opera && _version >= 9.5 || _safari && _version >= 312, _supported) {
		_opera && (history.navigationMode = "compatible");
		for (var i = 1; i < _length; i++) _stack.push("");
		_stack.push(_getHash()), _msie && _l.hash != _getHash() && (_l.hash = "#" + _ieLocal(_getHash(), TRUE)), _searchScript(document);
		var _qi = _url ? _url.indexOf("?") : -1;
		if (-1 != _qi)
			for (var param, params = _url.substr(_qi + 1).split("&"), i = 0, p; p = params[i]; i++) param = p.split("="), /^(history|strict)$/.test(param[0]) && (_opts[param[0]] = isNaN(param[1]) ? /^(true|yes)$/i.test(param[1]) : 0 != parseInt(param[1])), /^tracker$/.test(param[0]) && (_opts[param[0]] = param[1]);
		_msie && _titleCheck.call(this), window == _t && _events.addListener(document, "DOMContentLoaded", _functions.bind(_load, this)), _events.addListener(_t, "load", _functions.bind(_load, this))
	} else !_supported && -1 != _l.href.indexOf("#") || _safari && _version < 418 && -1 != _l.href.indexOf("#") && "" != _l.search ? (_d.open(), _d.write('<html><head><meta http-equiv="refresh" content="0;url=' + _l.href.substr(0, _l.href.indexOf("#")) + '" /></head></html>'), _d.close()) : _track();
	this.toString = function () {
			return "[class FWDAddress]"
		}, this.back = function () {
			_h.back()
		}, this.forward = function () {
			_h.forward()
		}, this.up = function () {
			var e = this.getPath();
			this.setValue(e.substr(0, e.lastIndexOf("/", e.length - 2) + ("/" == e.substr(e.length - 1) ? 1 : 0)))
		}, this.go = function (e) {
			_h.go(e)
		}, this.href = function (e, t) {
			"_self" == (t = typeof t != UNDEFINED ? t : "_self") ? self.location.href = e: "_top" == t ? _l.href = e : "_blank" == t ? window.open(e) : _t.frames[t].location.href = e
		}, this.popup = function (url, name, options, handler) {
			try {
				var popup = window.open(url, name, eval(options));
				typeof handler != UNDEFINED && eval(handler)
			} catch (e) {}
			_popup = arguments
		}, this.getIds = function () {
			return _ids
		}, this.getId = function (e) {
			return _ids[0]
		}, this.setId = function (e) {
			_ids[0] = e
		}, this.addId = function (e) {
			this.removeId(e), _ids.push(e)
		}, this.removeId = function (e) {
			for (var t = 0; t < _ids.length; t++)
				if (e == _ids[t]) {
					_ids.splice(t, 1);
					break
				}
		}, this.addEventListener = function (e, t) {
			typeof _listeners[e] == UNDEFINED && (_listeners[e] = []), _listeners[e].push(t)
		}, this.removeEventListener = function (e, t) {
			if (typeof _listeners[e] != UNDEFINED) {
				for (var o, s = 0;
					(o = _listeners[e][s]) && o != t; s++);
				_listeners[e].splice(s, 1)
			}
		}, this.dispatchEvent = function (e) {
			if (this.hasEventListener(e.type)) {
				e.target = this;
				for (var t, o = 0; t = _listeners[e.type][o]; o++) t(e);
				return TRUE
			}
			return FALSE
		}, this.hasEventListener = function (e) {
			return typeof _listeners[e] != UNDEFINED && _listeners[e].length > 0
		}, this.getBaseURL = function () {
			var e = _l.href;
			return -1 != e.indexOf("#") && (e = e.substr(0, e.indexOf("#"))), "/" == e.substr(e.length - 1) && (e = e.substr(0, e.length - 1)), e
		}, this.getStrict = function () {
			return _opts.strict
		}, this.setStrict = function (e) {
			_opts.strict = e
		}, this.getHistory = function () {
			return _opts.history
		}, this.setHistory = function (e) {
			_opts.history = e
		}, this.getTracker = function () {
			return _opts.tracker
		}, this.setTracker = function (e) {
			_opts.tracker = e
		}, this.getTitle = function () {
			return _d.title
		}, this.setTitle = function (e) {
			if (!_supported) return null;
			typeof e != UNDEFINED && ("null" == e && (e = ""), e = _dc(e), _st(function () {
				_title = _d.title = e, _juststart && _frame && _frame.contentWindow && _frame.contentWindow.document && (_frame.contentWindow.document.title = e, _juststart = FALSE), !_justset && _mozilla && _l.replace(-1 != _l.href.indexOf("#") ? _l.href : _l.href + "#"), _justset = FALSE
			}, 10))
		}, this.getStatus = function () {
			return _t.status
		}, this.setStatus = function (e) {
			if (!_supported) return null;
			if (typeof e != UNDEFINED && ("null" == e && (e = ""), e = _dc(e), !_safari)) {
				if ("/" == (e = _strictCheck("null" != e ? e : "", TRUE)) && (e = ""), !/http(s)?:\/\//.test(e)) {
					var t = _l.href.indexOf("#");
					e = (-1 == t ? _l.href : _l.href.substr(0, t)) + "#" + e
				}
				_t.status = e
			}
		}, this.resetStatus = function () {
			_t.status = ""
		}, this.getValue = function () {
			return _supported ? _dc(_strictCheck(_ieLocal(_value, FALSE), FALSE)) : null
		}, this.setValue = function (e) {
			if (!_supported) return null;
			if (typeof e != UNDEFINED && ("null" == e && (e = ""), "/" == (e = _ec(_dc(_strictCheck(e, TRUE)))) && (e = ""), _value != e)) {
				if (_justset = TRUE, _value = e, _silent = TRUE, _update.call(FWDAddress, !0), _stack[_h.length] = _value, _safari)
					if (_opts.history)
						if (_l[ID][_l.pathname] = _stack.toString(), _length = _h.length + 1, _version < 418) "" == _l.search && (_form.action = "#" + _value, _form.submit());
						else if (_version < 523 || "" == _value) {
					var t = _d.createEvent("MouseEvents");
					t.initEvent("click", TRUE, TRUE);
					var o = _d.createElement("a");
					o.href = "#" + _value, o.dispatchEvent(t)
				} else _l.hash = "#" + _value;
				else _l.replace("#" + _value);
				else _value != _getHash() && (_opts.history ? _l.hash = "#" + _dc(_ieLocal(_value, TRUE)) : _l.replace("#" + _dc(_value)));
				_msie && _version < 8 && _opts.history && _st(_htmlWrite, 50), _safari ? _st(function () {
					_silent = FALSE
				}, 1) : _silent = FALSE
			}
		}, this.getPath = function () {
			var e = this.getValue();
			return -1 != e.indexOf("?") ? e.split("?")[0] : -1 != e.indexOf("#") ? e.split("#")[0] : e
		}, this.getPathNames = function () {
			var e = this.getPath(),
				t = e.split("/");
			return "/" != e.substr(0, 1) && 0 != e.length || t.splice(0, 1), "/" == e.substr(e.length - 1, 1) && t.splice(t.length - 1, 1), t
		}, this.getQueryString = function () {
			var e = this.getValue(),
				t = e.indexOf("?");
			if (-1 != t && t < e.length) return e.substr(t + 1)
		}, this.getParameter = function (e) {
			var t = this.getValue(),
				o = t.indexOf("?");
			if (-1 != o) {
				for (var s, i = (t = t.substr(o + 1)).split("&"), l = i.length, n = []; l--;)(s = i[l].split("="))[0] == e && n.push(s[1]);
				if (0 != n.length) return 1 != n.length ? n : n[0]
			}
		}, this.getParameterNames = function () {
			var e = this.getValue(),
				t = e.indexOf("?"),
				o = [];
			if (-1 != t && "" != (e = e.substr(t + 1)) && -1 != e.indexOf("="))
				for (var s = e.split("&"), i = 0; i < s.length;) o.push(s[i].split("=")[0]), i++;
			return o
		}, this.onInit = null, this.onChange = null, this.onInternalChange = null, this.onExternalChange = null,
		function () {
			var e;
			if (typeof FlashObject != UNDEFINED && (SWFObject = FlashObject), typeof SWFObject != UNDEFINED && SWFObject.prototype && SWFObject.prototype.write) {
				var t = SWFObject.prototype.write;
				SWFObject.prototype.write = function () {
					var o;
					return e = arguments, this.getAttribute("version").major < 8 && (this.addVariable("$swfaddress", FWDAddress.getValue()), ("string" == typeof e[0] ? document.getElementById(e[0]) : e[0]).so = this), (o = t.apply(this, e)) && _ref.addId(this.getAttribute("id")), o
				}
			}
			if (typeof swfobject != UNDEFINED) {
				var o = swfobject.registerObject;
				swfobject.registerObject = function () {
					e = arguments, o.apply(this, e), _ref.addId(e[0])
				};
				var s = swfobject.createSWF;
				swfobject.createSWF = function () {
					e = arguments;
					var t = s.apply(this, e);
					return t && _ref.addId(e[0].id), t
				};
				var i = swfobject.embedSWF;
				swfobject.embedSWF = function () {
					typeof (e = arguments)[8] == UNDEFINED && (e[8] = {}), typeof e[8].id == UNDEFINED && (e[8].id = e[1]), i.apply(this, e), _ref.addId(e[8].id)
				}
			}
			if (typeof UFO != UNDEFINED) {
				var l = UFO.create;
				UFO.create = function () {
					e = arguments, l.apply(this, e), _ref.addId(e[0].id)
				}
			}
			if (typeof AC_FL_RunContent != UNDEFINED) {
				var n = AC_FL_RunContent;
				AC_FL_RunContent = function () {
					e = arguments, n.apply(this, e);
					for (var t = 0, o = e.length; t < o; t++) "id" == e[t] && _ref.addId(e[t + 1])
				}
			}
		}()
};
! function (e) {
	var t = function (o, s) {
		var i = this;
		t.prototype;

		function l() {
			var t, o;
			e.top != e && FWDUVPUtils.isIE || (document.body.createTextRange ? ((t = document.body.createTextRange()).moveToElementText(this), t.select()) : e.getSelection && document.createRange && (o = e.getSelection(), (t = document.createRange()).selectNodeContents(this), o.removeAllRanges(), o.addRange(t)))
		}
		this.xhr = null, this.embedColoseN_img = o.embedColoseN_img, this.bk_do = null, this.mainHolder_do = null, this.embedAndLinkMainLabel_do = null, this.linkAndEmbedHolderBk_do = null, this.linkText_do = null, this.linkLabel_do = null, this.embedText_do = null, this.embedLabel_do = null, this.linkAndEmbedHolder_do = null, this.copyLinkButton_do = null, this.copyEmbedButton_do = null, this.infoText_do = null, this.sendMainHolder_do = null, this.sendMainHolderBk_do = null, this.sendMainLabel_do = null, this.yourEmailLabel_do = null, this.yourEmailInput_do = null, this.friendEmailLabel_do = null, this.friendEmailInput_do = null, this.closeButton_do = null, this.useHEXColorsForSkin_bl = o.useHEXColorsForSkin_bl, this.normalButtonsColor_str = o.normalButtonsColor_str, this.selectedButtonsColor_str = o.selectedButtonsColor_str, this.videoLink_str = null, this.embedWindowBackground_str = o.embedWindowBackground_str, this.embedWindowInputBackgroundPath_str = o.embedWindowInputBackgroundPath_str, this.secondaryLabelsColor_str = o.secondaryLabelsColor_str, this.inputColor_str = o.inputColor_str, this.mainLabelsColor_str = o.mainLabelsColor_str, this.sendButtonNPath_str = o.sendButtonNPath_str, this.sendButtonSPath_str = o.sendButtonSPath_str, this.inputBackgroundColor_str = o.inputBackgroundColor_str, this.borderColor_str = o.borderColor_str, this.sendToAFriendPath_str = o.sendToAFriendPath_str, this.maxTextWidth = 0, this.totalWidth = 0, this.stageWidth = 0, this.stageHeight = 0, this.buttonWidth = 44, this.buttonHeight = 19, this.embedWindowCloseButtonMargins = o.embedWindowCloseButtonMargins, this.finalEmbedPath_str = null, this.finalEmbedCode_str = null, this.linkToVideo_str = null, this.shareAndEmbedTextColor_str = o.shareAndEmbedTextColor_str, this.isSending_bl = !1, this.isShowed_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
			-1 != o.skinPath_str.indexOf("hex_white") && (i.selectedButtonsColor_str = "#FFFFFF"), i.setBackfaceVisibility(), i.mainHolder_do = new FWDUVPDisplayObject("div"), i.bk_do = new FWDUVPDisplayObject("div"), i.bk_do.getStyle().width = "100%", i.bk_do.getStyle().height = "100%", i.bk_do.setAlpha(.9), i.bk_do.getStyle().background = "url('" + i.embedWindowBackground_str + "')", i.linkAndEmbedHolder_do = new FWDUVPDisplayObject("div"), i.linkAndEmbedHolderBk_do = new FWDUVPDisplayObject("div"), i.linkAndEmbedHolderBk_do.getStyle().background = "url('" + i.embedWindowBackground_str + "')", i.linkAndEmbedHolderBk_do.getStyle().borderStyle = "solid", i.linkAndEmbedHolderBk_do.getStyle().borderWidth = "1px", i.linkAndEmbedHolderBk_do.getStyle().borderColor = i.borderColor_str, i.embedAndLinkMainLabel_do = new FWDUVPDisplayObject("div"), i.embedAndLinkMainLabel_do.setBackfaceVisibility(), i.embedAndLinkMainLabel_do.getStyle().fontFamily = "Arial", i.embedAndLinkMainLabel_do.getStyle().fontSize = "12px", i.embedAndLinkMainLabel_do.getStyle().color = i.mainLabelsColor_str, i.embedAndLinkMainLabel_do.getStyle().whiteSpace = "nowrap", i.embedAndLinkMainLabel_do.getStyle().fontSmoothing = "antialiased", i.embedAndLinkMainLabel_do.getStyle().webkitFontSmoothing = "antialiased", i.embedAndLinkMainLabel_do.getStyle().textRendering = "optimizeLegibility", i.embedAndLinkMainLabel_do.getStyle().padding = "0px", i.embedAndLinkMainLabel_do.setInnerHTML("SHARE & EMBED"), i.linkLabel_do = new FWDUVPDisplayObject("div"), i.linkLabel_do.setBackfaceVisibility(), i.linkLabel_do.getStyle().fontFamily = "Arial", i.linkLabel_do.getStyle().fontSize = "12px", i.linkLabel_do.getStyle().color = i.secondaryLabelsColor_str, i.linkLabel_do.getStyle().whiteSpace = "nowrap", i.linkLabel_do.getStyle().fontSmoothing = "antialiased", i.linkLabel_do.getStyle().webkitFontSmoothing = "antialiased", i.linkLabel_do.getStyle().textRendering = "optimizeLegibility", i.linkLabel_do.getStyle().padding = "0px", i.linkLabel_do.setInnerHTML("Link to this video:"), i.linkText_do = new FWDUVPDisplayObject("div"), i.linkText_do.setBackfaceVisibility(), i.linkText_do.getStyle().fontFamily = "Arial", i.linkText_do.getStyle().fontSize = "12px", i.linkText_do.getStyle().color = i.shareAndEmbedTextColor_str, FWDUVPUtils.isIEAndLessThen9 || (i.linkText_do.getStyle().wordBreak = "break-all"), i.linkText_do.getStyle().fontSmoothing = "antialiased", i.linkText_do.getStyle().webkitFontSmoothing = "antialiased", i.linkText_do.getStyle().textRendering = "optimizeLegibility", i.linkText_do.getStyle().padding = "6px", i.linkText_do.getStyle().paddingTop = "4px", i.linkText_do.getStyle().paddingBottom = "4px", i.linkText_do.getStyle().backgroundColor = i.inputBackgroundColor_str, i.linkText_do.screen.onclick = l, i.embedLabel_do = new FWDUVPDisplayObject("div"), i.embedLabel_do.setBackfaceVisibility(), i.embedLabel_do.getStyle().fontFamily = "Arial", i.embedLabel_do.getStyle().fontSize = "12px", i.embedLabel_do.getStyle().color = i.secondaryLabelsColor_str, i.embedLabel_do.getStyle().whiteSpace = "nowrap", i.embedLabel_do.getStyle().fontSmoothing = "antialiased", i.embedLabel_do.getStyle().webkitFontSmoothing = "antialiased", i.embedLabel_do.getStyle().textRendering = "optimizeLegibility", i.embedLabel_do.getStyle().padding = "0px", i.embedLabel_do.setInnerHTML("Embed this video:"), i.embedText_do = new FWDUVPDisplayObject("div"), i.embedText_do.setBackfaceVisibility(), FWDUVPUtils.isIEAndLessThen9 || (i.embedText_do.getStyle().wordBreak = "break-all"), i.embedText_do.getStyle().fontFamily = "Arial", i.embedText_do.getStyle().fontSize = "12px", i.embedText_do.getStyle().lineHeight = "16px", i.embedText_do.getStyle().color = i.shareAndEmbedTextColor_str, i.embedText_do.getStyle().fontSmoothing = "antialiased", i.embedText_do.getStyle().webkitFontSmoothing = "antialiased", i.embedText_do.getStyle().textRendering = "optimizeLegibility", i.embedText_do.getStyle().backgroundColor = i.inputBackgroundColor_str, i.embedText_do.getStyle().padding = "6px", i.embedText_do.getStyle().paddingTop = "4px", i.embedText_do.getStyle().paddingBottom = "4px", i.embedText_do.screen.onclick = l, FWDUVPFlashButton.setPrototype(), i.copyLinkButton_do = new FWDUVPFlashButton(o.embedCopyButtonNPath_str, o.embedCopyButtonSPath_str, o.flashCopyToCBPath_str, s.instanceName_str + "copyLink", s.instanceName_str + ".copyLinkButtonOnMouseOver", s.instanceName_str + ".copyLinkButtonOnMouseOut", s.instanceName_str + ".copyLinkButtonOnMouseClick", s.instanceName_str + ".getLinkCopyPath", i.buttonWidth, i.buttonHeight, i.useHEXColorsForSkin_bl, i.normalButtonsColor_str, i.selectedButtonsColor_str), i.copyLinkButton_do.addListener(FWDUVPFlashButton.CLICK, i.showFlashButtonInstallError), FWDUVPFlashButton.setPrototype(), i.copyEmbedButton_do = new FWDUVPFlashButton(o.embedCopyButtonNPath_str, o.embedCopyButtonSPath_str, o.flashCopyToCBPath_str, s.instanceName_str + "embedCode", s.instanceName_str + ".embedkButtonOnMouseOver", s.instanceName_str + ".embedButtonOnMouseOut", s.instanceName_str + ".embedButtonOnMouseClick", s.instanceName_str + ".getEmbedCopyPath", i.buttonWidth, i.buttonHeight, i.useHEXColorsForSkin_bl, i.normalButtonsColor_str, i.selectedButtonsColor_str), i.copyEmbedButton_do.addListener(FWDUVPFlashButton.CLICK, i.showFlashButtonInstallError), i.sendMainHolder_do = new FWDUVPDisplayObject("div"), i.sendMainHolderBk_do = new FWDUVPDisplayObject("div"), i.sendMainHolderBk_do.getStyle().background = "url('" + i.embedWindowBackground_str + "')", i.sendMainHolderBk_do.getStyle().borderStyle = "solid", i.sendMainHolderBk_do.getStyle().borderWidth = "1px", i.sendMainHolderBk_do.getStyle().borderColor = i.borderColor_str, i.sendMainLabel_do = new FWDUVPDisplayObject("div"), i.sendMainLabel_do.setBackfaceVisibility(), i.sendMainLabel_do.getStyle().fontFamily = "Arial", i.sendMainLabel_do.getStyle().fontSize = "12px", i.sendMainLabel_do.getStyle().color = i.mainLabelsColor_str, i.sendMainLabel_do.getStyle().whiteSpace = "nowrap", i.sendMainLabel_do.getStyle().fontSmoothing = "antialiased", i.sendMainLabel_do.getStyle().webkitFontSmoothing = "antialiased", i.sendMainLabel_do.getStyle().textRendering = "optimizeLegibility", i.sendMainLabel_do.getStyle().padding = "0px", i.sendMainLabel_do.setInnerHTML("SEND TO A FRIEND"), i.yourEmailLabel_do = new FWDUVPDisplayObject("div"), i.yourEmailLabel_do.setBackfaceVisibility(), i.yourEmailLabel_do.getStyle().fontFamily = "Arial", i.yourEmailLabel_do.getStyle().fontSize = "12px", i.yourEmailLabel_do.getStyle().color = i.secondaryLabelsColor_str, i.yourEmailLabel_do.getStyle().whiteSpace = "nowrap", i.yourEmailLabel_do.getStyle().fontSmoothing = "antialiased", i.yourEmailLabel_do.getStyle().webkitFontSmoothing = "antialiased", i.yourEmailLabel_do.getStyle().textRendering = "optimizeLegibility", i.yourEmailLabel_do.getStyle().padding = "0px", i.yourEmailLabel_do.setInnerHTML("Your email:"), i.yourEmailInput_do = new FWDUVPDisplayObject("input"), i.yourEmailInput_do.setBackfaceVisibility(), i.yourEmailInput_do.getStyle().fontFamily = "Arial", i.yourEmailInput_do.getStyle().fontSize = "12px", i.yourEmailInput_do.getStyle().backgroundColor = i.inputBackgroundColor_str, i.yourEmailInput_do.getStyle().color = i.inputColor_str, i.yourEmailInput_do.getStyle().outline = 0, i.yourEmailInput_do.getStyle().whiteSpace = "nowrap", i.yourEmailInput_do.getStyle().fontSmoothing = "antialiased", i.yourEmailInput_do.getStyle().webkitFontSmoothing = "antialiased", i.yourEmailInput_do.getStyle().textRendering = "optimizeLegibility", i.yourEmailInput_do.getStyle().padding = "6px", i.yourEmailInput_do.getStyle().paddingTop = "4px", i.yourEmailInput_do.getStyle().paddingBottom = "4px", i.friendEmailLabel_do = new FWDUVPDisplayObject("div"), i.friendEmailLabel_do.setBackfaceVisibility(), i.friendEmailLabel_do.getStyle().fontFamily = "Arial", i.friendEmailLabel_do.getStyle().fontSize = "12px", i.friendEmailLabel_do.getStyle().color = i.secondaryLabelsColor_str, i.friendEmailLabel_do.getStyle().whiteSpace = "nowrap", i.friendEmailLabel_do.getStyle().fontSmoothing = "antialiased", i.friendEmailLabel_do.getStyle().webkitFontSmoothing = "antialiased", i.friendEmailLabel_do.getStyle().textRendering = "optimizeLegibility", i.friendEmailLabel_do.getStyle().padding = "0px", i.friendEmailLabel_do.setInnerHTML("Your friend's email:"), i.friendEmailInput_do = new FWDUVPDisplayObject("input"), i.friendEmailInput_do.setBackfaceVisibility(), i.friendEmailInput_do.getStyle().fontFamily = "Arial", i.friendEmailInput_do.getStyle().fontSize = "12px", i.friendEmailInput_do.getStyle().backgroundColor = i.inputBackgroundColor_str, i.friendEmailInput_do.getStyle().color = i.inputColor_str, i.friendEmailInput_do.getStyle().outline = 0, i.friendEmailInput_do.getStyle().whiteSpace = "nowrap", i.friendEmailInput_do.getStyle().fontSmoothing = "antialiased", i.friendEmailInput_do.getStyle().webkitFontSmoothing = "antialiased", i.friendEmailInput_do.getStyle().textRendering = "optimizeLegibility", i.friendEmailInput_do.getStyle().padding = "6px", i.friendEmailInput_do.getStyle().paddingTop = "4px", i.friendEmailInput_do.getStyle().paddingBottom = "4px", FWDUVPSimpleSizeButton.setPrototype(), i.sendButton_do = new FWDUVPSimpleSizeButton(i.sendButtonNPath_str, i.sendButtonSPath_str, i.buttonWidth, i.buttonHeight, i.useHEXColorsForSkin_bl, i.normalButtonsColor_str, i.selectedButtonsColor_str), i.sendButton_do.addListener(FWDUVPSimpleSizeButton.MOUSE_UP, i.sendClickHandler), i.infoText_do = new FWDUVPDisplayObject("div"), i.infoText_do.setBackfaceVisibility(), i.infoText_do.getStyle().fontFamily = "Arial", i.infoText_do.getStyle().fontSize = "12px", i.infoText_do.getStyle().color = i.secondaryLabelsColor_str, i.infoText_do.getStyle().whiteSpace = "nowrap", i.infoText_do.getStyle().fontSmoothing = "antialiased", i.infoText_do.getStyle().webkitFontSmoothing = "antialiased", i.infoText_do.getStyle().textRendering = "optimizeLegibility", i.infoText_do.getStyle().padding = "0px", i.infoText_do.getStyle().paddingTop = "4px", i.infoText_do.getStyle().textAlign = "center", i.infoText_do.getStyle().color = i.mainLabelsColor_str, FWDUVPSimpleButton.setPrototype(), i.closeButton_do = new FWDUVPSimpleButton(i.embedColoseN_img, o.embedWindowClosePathS_str, void 0, !0, i.useHEXColorsForSkin_bl, i.normalButtonsColor_str, i.selectedButtonsColor_str), i.closeButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.closeButtonOnMouseUpHandler), i.addChild(i.mainHolder_do), i.mainHolder_do.addChild(i.bk_do), i.linkAndEmbedHolder_do.addChild(i.linkAndEmbedHolderBk_do), i.linkAndEmbedHolder_do.addChild(i.embedAndLinkMainLabel_do), i.linkAndEmbedHolder_do.addChild(i.linkLabel_do), i.linkAndEmbedHolder_do.addChild(i.linkText_do), i.linkAndEmbedHolder_do.addChild(i.embedLabel_do), i.linkAndEmbedHolder_do.addChild(i.embedText_do), i.linkAndEmbedHolder_do.addChild(i.copyLinkButton_do), i.linkAndEmbedHolder_do.addChild(i.copyEmbedButton_do), i.sendMainHolder_do.addChild(i.sendMainHolderBk_do), i.sendMainHolder_do.addChild(i.sendMainLabel_do), i.sendMainHolder_do.addChild(i.yourEmailLabel_do), i.sendMainHolder_do.addChild(i.yourEmailInput_do), i.sendMainHolder_do.addChild(i.friendEmailLabel_do), i.sendMainHolder_do.addChild(i.friendEmailInput_do), i.sendMainHolder_do.addChild(i.sendButton_do), i.mainHolder_do.addChild(i.linkAndEmbedHolder_do), i.mainHolder_do.addChild(i.sendMainHolder_do), i.mainHolder_do.addChild(i.closeButton_do)
		}, this.closeButtonOnMouseUpHandler = function () {
			i.isShowed_bl && i.hide()
		}, this.showFlashButtonInstallError = function () {
			i.dispatchEvent(t.ERROR, {
				error: "Please install Adobe Flash Player in order to use this feature! To copy text in the clipboard currently flash is the only safe option. <a href='http://www.adobe.com/go/getflashplayer' target='_blank'>Click here to install</a>. <br><br>The video link or embed code can be copyed by selecting the text, right click and copy."
			})
		}, this.positionAndResize = function () {
			i.stageWidth = s.stageWidth, i.stageHeight = s.stageHeight, i.maxTextWidth = Math.min(i.stageWidth - 150, 500), i.totalWidth = i.maxTextWidth + i.buttonWidth + 40, i.isMobile_bl ? (i.linkText_do.setWidth(i.maxTextWidth + 52), i.embedText_do.setWidth(i.maxTextWidth + 52)) : (i.linkText_do.setWidth(i.maxTextWidth), i.embedText_do.setWidth(i.maxTextWidth)), i.positionFinal(), i.closeButton_do.setX(i.stageWidth - i.closeButton_do.w - i.embedWindowCloseButtonMargins), i.closeButton_do.setY(i.embedWindowCloseButtonMargins), i.setWidth(i.stageWidth), i.setHeight(i.stageHeight), i.mainHolder_do.setWidth(i.stageWidth), i.mainHolder_do.setHeight(i.stageHeight)
		}, this.positionFinal = function () {
			var e, t, o, s, l, n, r, a = !1;
			i.stageHeight < 360 || i.stageWidth < 350 ? (i.linkText_do.getStyle().whiteSpace = "nowrap", i.embedText_do.getStyle().whiteSpace = "nowrap") : (i.linkText_do.getStyle().whiteSpace = "normal", i.embedText_do.getStyle().whiteSpace = "normal"), i.linkLabel_do.screen.offsetHeight < 6 && (a = !0), t = a ? Math.round(100 * i.embedAndLinkMainLabel_do.screen.getBoundingClientRect().height) : i.embedAndLinkMainLabel_do.getHeight(), i.embedAndLinkMainLabel_do.setX(16), i.linkLabel_do.setX(16), i.linkLabel_do.setY(t + 14), a ? (o = Math.round(100 * i.linkLabel_do.screen.getBoundingClientRect().height), s = Math.round(100 * i.linkText_do.screen.getBoundingClientRect().height)) : (o = i.linkLabel_do.getHeight(), s = i.linkText_do.getHeight()), i.linkText_do.setX(10), i.linkText_do.setY(i.linkLabel_do.y + o + 5), i.isMobile_bl ? i.copyLinkButton_do.setX(-100) : i.copyLinkButton_do.setX(i.maxTextWidth + 30), i.copyLinkButton_do.setY(i.linkText_do.y + s - i.buttonHeight), i.embedLabel_do.setX(16), i.embedLabel_do.setY(i.copyLinkButton_do.y + i.copyLinkButton_do.h + 14), l = a ? Math.round(100 * i.embedText_do.screen.getBoundingClientRect().height) : i.embedText_do.getHeight(), i.embedText_do.setX(10), i.embedText_do.setY(i.embedLabel_do.y + o + 5), i.isMobile_bl ? i.copyEmbedButton_do.setX(-100) : i.copyEmbedButton_do.setX(i.maxTextWidth + 30), i.copyEmbedButton_do.setY(i.embedText_do.y + l - i.buttonHeight), i.linkAndEmbedHolderBk_do.setY(i.linkLabel_do.y - 9), i.linkAndEmbedHolderBk_do.setWidth(i.totalWidth - 2), i.linkAndEmbedHolderBk_do.setHeight(i.embedText_do.y + l - 9), i.linkAndEmbedHolder_do.setWidth(i.totalWidth), i.linkAndEmbedHolder_do.setHeight(i.embedText_do.y + l + 14), a ? (n = Math.round(100 * i.sendMainLabel_do.screen.getBoundingClientRect().height), r = Math.round(100 * i.yourEmailInput_do.screen.getBoundingClientRect().height)) : (n = i.sendMainLabel_do.getHeight(), r = i.yourEmailInput_do.getHeight()), i.sendMainLabel_do.setX(16), i.yourEmailLabel_do.setX(16), i.yourEmailLabel_do.setY(n + 14), i.stageWidth > 400 ? (i.yourEmailInput_do.setX(10), i.yourEmailInput_do.setWidth(parseInt(i.totalWidth - 52 - i.buttonWidth) / 2), i.yourEmailInput_do.setY(i.yourEmailLabel_do.y + o + 5), i.friendEmailLabel_do.setX(i.yourEmailInput_do.x + i.yourEmailInput_do.w + 26), i.friendEmailLabel_do.setY(i.yourEmailLabel_do.y), i.friendEmailInput_do.setX(i.yourEmailInput_do.x + i.yourEmailInput_do.w + 20), i.friendEmailInput_do.setWidth(parseInt((i.maxTextWidth - 30) / 2)), i.friendEmailInput_do.setY(i.yourEmailLabel_do.y + o + 5), i.sendButton_do.setX(i.friendEmailInput_do.x + i.yourEmailInput_do.w + 10), i.sendButton_do.setY(i.friendEmailInput_do.y + r - i.buttonHeight)) : (i.yourEmailInput_do.setX(10), i.yourEmailInput_do.setWidth(i.totalWidth - 32), i.yourEmailInput_do.setY(i.yourEmailLabel_do.y + o + 5), i.friendEmailLabel_do.setX(16), i.friendEmailLabel_do.setY(i.yourEmailInput_do.y + r + 14), i.friendEmailInput_do.setX(10), i.friendEmailInput_do.setY(i.friendEmailLabel_do.y + o + 5), i.friendEmailInput_do.setWidth(i.totalWidth - 32), i.sendButton_do.setX(i.totalWidth - i.buttonWidth - 10), i.sendButton_do.setY(i.friendEmailInput_do.y + r + 10)), i.sendMainHolderBk_do.setY(i.yourEmailLabel_do.y - 9), i.sendMainHolderBk_do.setWidth(i.totalWidth - 2), i.sendMainHolderBk_do.setHeight(i.sendButton_do.y + i.sendButton_do.h - 9), i.sendMainHolder_do.setWidth(i.totalWidth), i.sendMainHolder_do.setHeight(i.sendButton_do.y + i.sendButton_do.h + 14), e = a ? Math.round(100 * i.linkAndEmbedHolder_do.screen.getBoundingClientRect().height + 100 * i.sendMainHolder_do.screen.getBoundingClientRect().height) : i.linkAndEmbedHolder_do.getHeight() + i.sendMainHolder_do.getHeight(), i.linkAndEmbedHolder_do.setX(parseInt((i.stageWidth - i.totalWidth) / 2)), i.linkAndEmbedHolder_do.setY(parseInt((i.stageHeight - e) / 2) - 8), i.sendMainHolder_do.setX(parseInt((i.stageWidth - i.totalWidth) / 2)), a ? i.sendMainHolder_do.setY(Math.round(i.linkAndEmbedHolder_do.y + 100 * i.linkAndEmbedHolder_do.screen.getBoundingClientRect().height + 20)) : i.sendMainHolder_do.setY(i.linkAndEmbedHolder_do.y + i.linkAndEmbedHolder_do.getHeight() + 20)
		}, this.sendClickHandler = function () {
			var e = !1;
			if (!i.getValidEmail(i.yourEmailInput_do.screen.value)) {
				if (FWDAnimation.isTweening(i.yourEmailInput_do.screen)) return;
				FWDAnimation.to(i.yourEmailInput_do.screen, .1, {
					css: {
						backgroundColor: "#FF0000"
					},
					yoyo: !0,
					repeat: 3
				}), e = !0
			}
			if (!i.getValidEmail(i.friendEmailInput_do.screen.value)) {
				if (FWDAnimation.isTweening(i.friendEmailInput_do.screen)) return;
				FWDAnimation.to(i.friendEmailInput_do.screen, .1, {
					css: {
						backgroundColor: "#FF0000"
					},
					yoyo: !0,
					repeat: 3
				}), e = !0
			}
			e || i.sendEmail()
		}, this.sendEmail = function () {
			if (!i.isSending_bl) {
				i.isSending_bl = !0, i.xhr = new XMLHttpRequest, i.xhr.onreadystatechange = i.onChange, i.xhr.onerror = i.ajaxOnErrorHandler;
				try {
					i.xhr.open("get", i.sendToAFriendPath_str + "?friendMail=" + i.friendEmailInput_do.screen.value + "&yourMail=" + i.yourEmailInput_do.screen.value + "&link=" + encodeURIComponent(i.linkToVideo_str), !0), i.xhr.send()
				} catch (t) {
					i.showInfo("ERROR", !0), console && console.log(t), t.message && e.console && console.log(t.message)
				}
				i.resetInputs()
			}
		}, this.ajaxOnErrorHandler = function (t) {
			i.showInfo("ERROR", !0);
			try {
				e.console && console.log(t), e.console && console.log(t.message)
			} catch (t) {}
			i.isSending_bl = !1
		}, this.onChange = function (t) {
			4 == i.xhr.readyState && 200 == i.xhr.status && ("sent" == i.xhr.responseText ? i.showInfo("SENT") : (i.showInfo("ERROR", !0), e.console && console.log("Error The server can't send the email!")), i.isSending_bl = !1)
		}, this.resetInputs = function () {
			i.yourEmailInput_do.screen.value = "", i.friendEmailInput_do.screen.value = ""
		}, this.getValidEmail = function (e) {
			return !(!/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(e) || "" == e)
		}, this.setEmbedData = function () {
			var e = location.href,
				t = location.protocol + "//" + location.host,
				o = location.pathname,
				l = location.hash,
				n = location.search,
				r = t + o;
			n = n.replace(/&?RVPInstanceName=.+RVPVideoId=[0-9]+/g, ""), e = e.replace(/&?RVPInstanceName=.+RVPVideoId=[0-9]+/g, ""), i.finalEmbedPath_str = n ? l ? r + n + "&RVPInstanceName=" + s.instanceName_str + "&RVPPlaylistId=" + s.catId + "&RVPVideoId=" + s.id + l : r + n + "&RVPInstanceName=" + s.instanceName_str + "&RVPPlaylistId=" + s.catId + "&RVPVideoId=" + s.id : l ? r + "?RVPInstanceName=" + s.instanceName_str + "&RVPPlaylistId=" + s.catId + "&RVPVideoId=" + s.id + l : r + "?RVPInstanceName=" + s.instanceName_str + "&RVPPlaylistId=" + s.catId + "&RVPVideoId=" + s.id, l ? -1 == l.indexOf("playlistId=") ? i.linkToVideo_str = r + n + l + "&playlistId=" + s.catId + "&videoId=" + s.id : i.linkToVideo_str = e : i.linkToVideo_str = e + "#/?playlistId=" + s.catId + "&videoId=" + s.id, i.finalEmbedPath_str = encodeURI(i.finalEmbedPath_str), i.linkToVideo_str = encodeURI(i.linkToVideo_str), i.finalEmbedCode_str = "<iframe src='" + i.finalEmbedPath_str + "' width='" + s.stageWidth + "' height='" + s.stageHeight + "' frameborder='0' scrolling='no' allowfullscreen></iframe>", FWDUVPUtils.isIE ? (i.linkText_do.screen.innerText = i.linkToVideo_str, i.embedText_do.screen.innerText = i.finalEmbedCode_str) : (i.linkText_do.screen.textContent = i.linkToVideo_str, i.embedText_do.screen.textContent = i.finalEmbedCode_str)
		}, this.showInfo = function (e, t) {
			i.infoText_do.setInnerHTML(e), i.sendMainHolder_do.addChild(i.infoText_do), i.infoText_do.setWidth(i.buttonWidth), i.infoText_do.setHeight(i.buttonHeight - 4), i.infoText_do.setX(i.sendButton_do.x), i.infoText_do.setY(i.sendButton_do.y - 23), i.infoText_do.setAlpha(0), i.infoText_do.getStyle().color = t ? "#FF0000" : i.mainLabelsColor_str, FWDAnimation.killTweensOf(i.infoText_do), FWDAnimation.to(i.infoText_do, .16, {
				alpha: 1,
				yoyo: !0,
				repeat: 7
			})
		}, this.show = function (e) {
			i.isShowed_bl || (i.isShowed_bl = !0, s.main_do.addChild(i), i.resetInputs(), i.setEmbedData(), i.positionAndResize(), clearTimeout(i.hideCompleteId_to), clearTimeout(i.showCompleteId_to), i.mainHolder_do.setY(-i.stageHeight), i.showCompleteId_to = setTimeout(i.showCompleteHandler, 900), setTimeout(function () {
				FWDAnimation.to(i.mainHolder_do, .8, {
					y: 0,
					delay: .1,
					ease: Expo.easeInOut
				}), (!FWDUVPUtils.isMobile || FWDUVPUtils.isMobile && FWDUVPUtils.hasPointerEvent) && s.main_do.setSelectable(!0)
			}, 100))
		}, this.showCompleteHandler = function () {}, this.hide = function () {
			i.isShowed_bl && (i.isShowed_bl = !1, s.customContextMenu_do && s.customContextMenu_do.enable(), i.positionAndResize(), clearTimeout(i.hideCompleteId_to), clearTimeout(i.showCompleteId_to), (!FWDUVPUtils.isMobile || FWDUVPUtils.isMobile && FWDUVPUtils.hasPointerEvent) && s.main_do.setSelectable(!1), i.hideCompleteId_to = setTimeout(i.hideCompleteHandler, 800), FWDAnimation.killTweensOf(i.mainHolder_do), FWDAnimation.to(i.mainHolder_do, .8, {
				y: -i.stageHeight,
				ease: Expo.easeInOut
			}))
		}, this.hideCompleteHandler = function () {
			s.main_do.removeChild(i), i.dispatchEvent(t.HIDE_COMPLETE)
		}, this.updateHEXColors = function (e, t) {
			i.copyEmbedButton_do.updateHEXColors(e, t), i.copyLinkButton_do.updateHEXColors(e, t), i.sendButton_do.updateHEXColors(e, t), i.closeButton_do.updateHEXColors(e, t), i.embedAndLinkMainLabel_do.getStyle().color = e, i.sendMainLabel_do.getStyle().color = e, i.linkAndEmbedHolderBk_do.getStyle().borderColor = e, i.sendMainHolderBk_do.getStyle().borderColor = e
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.ERROR = "error", t.HIDE_COMPLETE = "hideComplete", t.prototype = null, e.FWDUVPEmbedWindow = t
}(window), window, window.FWDUVPEventDispatcher = function () {
		this.listeners = {
			events_ar: []
		}, this.addListener = function (e, t) {
			if (null == e) throw Error("type is required.");
			if ("object" == typeof e) throw Error("type must be of type String.");
			if ("function" != typeof t) throw Error("listener must be of type Function.");
			var o = {};
			o.type = e, o.listener = t, o.target = this, this.listeners.events_ar.push(o)
		}, this.dispatchEvent = function (e, t) {
			if (null != this.listeners) {
				if (null == e) throw Error("type is required.");
				if ("object" == typeof e) throw Error("type must be of type String.");
				for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
					if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e) {
						if (t)
							for (var i in t) this.listeners.events_ar[o][i] = t[i];
						this.listeners.events_ar[o].listener.call(this, this.listeners.events_ar[o])
					}
			}
		}, this.removeListener = function (e, t) {
			if (null == e) throw Error("type is required.");
			if ("object" == typeof e) throw Error("type must be of type String.");
			if ("function" != typeof t) throw Error("listener must be of type Function." + e);
			for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
				if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e && this.listeners.events_ar[o].listener === t) {
					this.listeners.events_ar.splice(o, 1);
					break
				}
		}, this.destroy = function () {
			this.listeners = null, this.addListener = null, this.dispatchEvent = null, this.removeListener = null
		}
	},
	function (e) {
		var t = function (e, o, s, i, l, n, r, a, d, u, h, _, c) {
			var f = this;
			t.prototype;
			this.useHEXColorsForSkin_bl = h, this.normalButtonsColor_str = _, this.selectedButtonsColor_str = c, this.nImg_img = null, this.sImg_img = null, this.n_do, this.s_do, this.nImgPath_str = e, this.sImgPath_str = o, this.flashPath_str = s, this.flashButtonName_str = i, this.overPath_str = l, this.outPath_str = n, this.clickPath_str = r, this.copyPath_str = a, this.linkFlashObject = null, this.buttonWidth = d, this.buttonHeight = u, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.isDisabled_bl = !1, this.init = function () {
				f.setWidth(f.buttonWidth), f.setHeight(f.buttonHeight), f.isMobile_bl || (f.setupMainContainers(), f.setupFalshButton(), f.setButtonMode(!0))
			}, this.setupMainContainers = function () {
				f.nImg = new Image, f.nImg.src = f.nImgPath_str, f.useHEXColorsForSkin_bl ? (f.n_do = new FWDUVPTransformDisplayObject("div"), f.n_do.setWidth(f.buttonWidth), f.n_do.setHeight(f.buttonHeight), f.nImg.onload = function () {
					f.n_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(f.nImg, f.normalButtonsColor_str).canvas, f.n_do.screen.appendChild(f.n_do_canvas)
				}, f.addChild(f.n_do)) : (f.n_do = new FWDUVPDisplayObject("img"), f.n_do.setScreen(f.nImg), f.n_do.setWidth(f.buttonWidth), f.n_do.setHeight(f.buttonHeight), f.addChild(f.n_do)), f.sImg = new Image, f.sImg.src = f.sImgPath_str, f.useHEXColorsForSkin_bl ? (f.s_do = new FWDUVPTransformDisplayObject("div"), f.s_do.setWidth(f.buttonWidth), f.s_do.setHeight(f.buttonHeight), f.sImg.onload = function () {
					f.s_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(f.sImg, f.selectedButtonsColor_str).canvas, f.s_do.screen.appendChild(f.s_do_canvas)
				}, f.s_do.setAlpha(0), f.addChild(f.s_do)) : (f.s_do = new FWDUVPDisplayObject("img"), f.s_do.setScreen(f.sImg), f.s_do.setWidth(f.buttonWidth), f.s_do.setHeight(f.buttonHeight), f.s_do.setAlpha(0), f.addChild(f.s_do)), f.screen.addEventListener ? (f.screen.addEventListener("mouseover", f.onMouseOver), f.screen.addEventListener("mouseout", f.onMouseOut), f.screen.addEventListener("mouseup", f.onMouseUp)) : f.screen.attachEvent && (f.screen.attachEvent("onmouseover", f.onMouseOver), f.screen.attachEvent("onmouseout", f.onMouseOut), f.screen.attachEvent("onmouseup", f.onMouseUp))
			}, this.onMouseOver = function (e) {
				if (!e.pointerType || "mouse" == e.pointerType) {
					if (f.isDisabled_bl || f.isSelectedFinal_bl) return;
					f.setSelectedState()
				}
			}, this.onMouseOut = function (e) {
				e.pointerType && "mouse" != e.pointerType || f.setNormalState()
			}, this.onMouseUp = function (e) {
				FWDUVPFlashTest.hasFlashPlayerVersion("9.0.18") || (e.preventDefault && e.preventDefault(), f.isDisabled_bl || 2 == e.button || f.dispatchEvent(t.CLICK))
			}, this.setupFalshButton = function () {
				if (FWDUVPFlashTest.hasFlashPlayerVersion("9.0.18")) {
					var e = '<object id="' + f.flashButtonName_str + '"classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%"><param name="movie" value="' + f.flashPath_str + '"/><param name="wmode" value="transparent"/><param name="scale" value="noscale"/><param name=FlashVars value="clickPath_str=' + f.clickPath_str + "&overPath_str=" + f.overPath_str + "&outPath_str=" + f.outPath_str + "&copyPath_str=" + f.copyPath_str + '"/><object type="application/x-shockwave-flash" data="' + f.flashPath_str + '" width="100%" height="100%"><param name="movie" value="' + f.flashPath_str + '"/><param name="wmode" value="transparent"/><param name="scale" value="noscale"/><param name=FlashVars value="clickPath_str=' + f.clickPath_str + "&overPath_str=" + f.overPath_str + "&outPath_str=" + f.outPath_str + "&copyPath_str=" + f.copyPath_str + '"/></object></object>',
						t = new FWDUVPDisplayObject("div");
					t.setBackfaceVisibility(), t.setResizableSizeAfterParent(), t.screen.innerHTML = e, f.addChild(t), f.linkFlashObject = t.screen.firstChild, FWDUVPUtils.isIE || (f.linkFlashObject = f.linkFlashObject.getElementsByTagName("object")[0])
				}
			}, this.setNormalState = function () {
				FWDAnimation.killTweensOf(f.s_do), FWDAnimation.to(f.s_do, .5, {
					alpha: 0,
					ease: Expo.easeOut
				})
			}, this.setSelectedState = function () {
				FWDAnimation.killTweensOf(f.s_do), FWDAnimation.to(f.s_do, .5, {
					alpha: 1,
					ease: Expo.easeOut
				})
			}, f.updateHEXColors = function (e, t) {
				FWDUVPUtils.changeCanvasHEXColor(f.nImg, f.n_do_canvas, e), FWDUVPUtils.changeCanvasHEXColor(f.sImg, f.s_do_canvas, t)
			}, f.init()
		};
		t.setPrototype = function () {
			t.prototype = null, t.prototype = new FWDUVPDisplayObject("div")
		}, t.CLICK = "onClick", t.MOUSE_OVER = "onMouseOver", t.SHOW_TOOLTIP = "showTooltip", t.MOUSE_OUT = "onMouseOut", t.MOUSE_UP = "onMouseDown", t.prototype = null, e.FWDUVPFlashButton = t
	}(window);
var FWDUVPFlashTest = function () {
	var e = "undefined",
		t = "object",
		o = "Shockwave Flash",
		s = "application/x-shockwave-flash",
		i = window,
		l = document,
		n = navigator,
		r = function () {
			var r = typeof l.getElementById != e && typeof l.getElementsByTagName != e && typeof l.createElement != e,
				a = n.userAgent.toLowerCase(),
				d = n.platform.toLowerCase(),
				u = /win/.test(d || a),
				h = /mac/.test(d || a),
				_ = !!/webkit/.test(a) && parseFloat(a.replace(/^.*webkit\/(\d+(\.\d+)?).*$/, "$1")),
				c = !1,
				f = [0, 0, 0],
				p = null;
			if (typeof n.plugins != e && typeof n.plugins[o] == t) !(p = n.plugins[o].description) || typeof n.mimeTypes != e && n.mimeTypes[s] && !n.mimeTypes[s].enabledPlugin || (!0, c = !1, p = p.replace(/^.*\s+(\S+\s+\S+$)/, "$1"), f[0] = parseInt(p.replace(/^(.*)\..*$/, "$1"), 10), f[1] = parseInt(p.replace(/^.*\.(.*)\s.*$/, "$1"), 10), f[2] = /[a-zA-Z]/.test(p) ? parseInt(p.replace(/^.*[a-zA-Z]+(.*)$/, "$1"), 10) : 0);
			else if (typeof i.ActiveXObject != e) try {
				var b = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
				b && (p = b.GetVariable("$version")) && (c = !0, p = p.split(" ")[1].split(","), f = [parseInt(p[0], 10), parseInt(p[1], 10), parseInt(p[2], 10)])
			} catch (e) {}
			return {
				w3: r,
				pv: f,
				wk: _,
				ie: c,
				win: u,
				mac: h
			}
		}();

	function a(e) {
		var t = r.pv,
			o = e.split(".");
		return o[0] = parseInt(o[0], 10), o[1] = parseInt(o[1], 10) || 0, o[2] = parseInt(o[2], 10) || 0, t[0] > o[0] || t[0] == o[0] && t[1] > o[1] || t[0] == o[0] && t[1] == o[1] && t[2] >= o[2]
	}
	return {
		hasFlashPlayerVersion: a
	}
}();
! function (e) {
	var t = function (o, s, i) {
		var l = this,
			n = t.prototype;
		this.screenToTest = o, this.screenToTest2 = s, this.hideDelay = i, this.globalX = 0, this.globalY = 0, this.currentTime, this.checkIntervalId_int, this.hideCompleteId_to, this.hasInitialTestEvents_bl = !1, this.addSecondTestEvents_bl = !1, this.dispatchOnceShow_bl = !0, this.dispatchOnceHide_bl = !1, this.isStopped_bl = !0, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, l.init = function () {}, l.start = function () {
			l.currentTime = (new Date).getTime(), clearInterval(l.checkIntervalId_int), l.checkIntervalId_int = setInterval(l.update, 100), l.addMouseOrTouchCheck(), l.isStopped_bl = !1
		}, l.stop = function () {
			clearInterval(l.checkIntervalId_int), l.isStopped_bl = !0, l.removeMouseOrTouchCheck(), l.removeMouseOrTouchCheck2()
		}, l.addMouseOrTouchCheck = function () {
			l.hasInitialTestEvents_bl || (l.hasInitialTestEvents_bl = !0, l.isMobile_bl ? l.hasPointerEvent_bl ? (l.screenToTest.screen.addEventListener("pointerdown", l.onMouseOrTouchUpdate), l.screenToTest.screen.addEventListener("MSPointerMove", l.onMouseOrTouchUpdate)) : l.screenToTest.screen.addEventListener("touchstart", l.onMouseOrTouchUpdate) : e.addEventListener ? e.addEventListener("mousemove", l.onMouseOrTouchUpdate) : document.attachEvent && document.attachEvent("onmousemove", l.onMouseOrTouchUpdate))
		}, l.removeMouseOrTouchCheck = function () {
			l.hasInitialTestEvents_bl && (l.hasInitialTestEvents_bl = !1, l.isMobile_bl ? l.hasPointerEvent_bl ? (l.screenToTest.screen.removeEventListener("pointerdown", l.onMouseOrTouchUpdate), l.screenToTest.screen.removeEventListener("MSPointerMove", l.onMouseOrTouchUpdate)) : l.screenToTest.screen.removeEventListener("touchstart", l.onMouseOrTouchUpdate) : e.removeEventListener ? e.removeEventListener("mousemove", l.onMouseOrTouchUpdate) : document.detachEvent && document.detachEvent("onmousemove", l.onMouseOrTouchUpdate))
		}, l.addMouseOrTouchCheck2 = function () {
			l.addSecondTestEvents_bl || (l.addSecondTestEvents_bl = !0, l.screenToTest.screen.addEventListener ? l.screenToTest.screen.addEventListener("mousemove", l.secondTestMoveDummy) : l.screenToTest.screen.attachEvent && l.screenToTest.screen.attachEvent("onmousemove", l.secondTestMoveDummy))
		}, l.removeMouseOrTouchCheck2 = function () {
			l.addSecondTestEvents_bl && (l.addSecondTestEvents_bl = !1, l.screenToTest.screen.removeEventListener ? l.screenToTest.screen.removeEventListener("mousemove", l.secondTestMoveDummy) : l.screenToTest.screen.detachEvent && l.screenToTest.screen.detachEvent("onmousemove", l.secondTestMoveDummy))
		}, this.secondTestMoveDummy = function () {
			l.removeMouseOrTouchCheck2(), l.addMouseOrTouchCheck()
		}, l.onMouseOrTouchUpdate = function (e) {
			var t = FWDUVPUtils.getViewportMouseCoordinates(e);
			l.globalX != t.screenX && l.globalY != t.screenY && (l.currentTime = (new Date).getTime()), l.globalX = t.screenX, l.globalY = t.screenY, l.isMobile_bl || FWDUVPUtils.hitTest(l.screenToTest.screen, l.globalX, l.globalY) || (l.removeMouseOrTouchCheck(), l.addMouseOrTouchCheck2())
		}, l.update = function (e) {
			(new Date).getTime() > l.currentTime + l.hideDelay ? l.dispatchOnceShow_bl && (l.dispatchOnceHide_bl = !0, l.dispatchOnceShow_bl = !1, l.dispatchEvent(t.HIDE), clearTimeout(l.hideCompleteId_to), l.hideCompleteId_to = setTimeout(function () {
				l.dispatchEvent(t.HIDE_COMPLETE)
			}, 1e3)) : l.dispatchOnceHide_bl && (clearTimeout(l.hideCompleteId_to), l.dispatchOnceHide_bl = !1, l.dispatchOnceShow_bl = !0, l.dispatchEvent(t.SHOW))
		}, l.reset = function () {
			clearTimeout(l.hideCompleteId_to), l.currentTime = (new Date).getTime(), l.dispatchEvent(t.SHOW)
		}, l.destroy = function () {
			l.removeMouseOrTouchCheck(), clearInterval(l.checkIntervalId_int), l.screenToTest = null, o = null, l.init = null, l.start = null, l.stop = null, l.addMouseOrTouchCheck = null, l.removeMouseOrTouchCheck = null, l.onMouseOrTouchUpdate = null, l.update = null, l.reset = null, l.destroy = null, n.destroy(), n = null, l = null, t.prototype = null
		}, l.init()
	};
	t.HIDE = "hide", t.SHOW = "show", t.HIDE_COMPLETE = "hideComplete", t.setPrototype = function () {
		t.prototype = new FWDUVPEventDispatcher
	}, e.FWDUVPHider = t
}(window),
function (e) {
	var t = function (e, o, s) {
		var i = this;
		t.prototype;
		this.bk_do = null, this.textHolder_do = null, this.warningIconPath_str = o, this.showErrorInfo_bl = s, this.show_to = null, this.isShowed_bl = !1, this.isShowedOnce_bl = !1, this.allowToRemove_bl = !0, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.init = function () {
			i.setResizableSizeAfterParent(), i.bk_do = new FWDUVPDisplayObject("div"), i.bk_do.setAlpha(.6), i.bk_do.setBkColor("#000000"), i.addChild(i.bk_do), i.textHolder_do = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIEAndLessThen9 || (i.textHolder_do.getStyle().font = "Arial"), i.textHolder_do.getStyle().wordWrap = "break-word", i.textHolder_do.getStyle().padding = "10px", i.textHolder_do.getStyle().paddingLeft = "42px", i.textHolder_do.getStyle().lineHeight = "18px", i.textHolder_do.getStyle().color = "#000000", i.textHolder_do.setBkColor("#EEEEEE");
			var e = new Image;
			e.src = this.warningIconPath_str, this.img_do = new FWDUVPDisplayObject("img"), this.img_do.setScreen(e), this.img_do.setWidth(28), this.img_do.setHeight(28), i.addChild(i.textHolder_do), i.addChild(i.img_do)
		}, this.showText = function (e) {
			i.isShowedOnce_bl || (i.hasPointerEvent_bl ? i.screen.addEventListener("pointerdown", i.closeWindow) : (i.screen.addEventListener("mousedown", i.closeWindow), i.screen.addEventListener("touchstart", i.closeWindow)), i.isShowedOnce_bl = !0), i.setVisible(!1), i.textHolder_do.getStyle().paddingBottom = "10px", i.textHolder_do.setInnerHTML(e), clearTimeout(i.show_to), i.show_to = setTimeout(i.show, 60), setTimeout(function () {
				i.positionAndResize()
			}, 10)
		}, this.show = function () {
			var t = Math.min(640, e.stageWidth - 120);
			i.isShowed_bl = !0, i.textHolder_do.setWidth(t), setTimeout(function () {
				i.showErrorInfo_bl && i.setVisible(!0), i.positionAndResize()
			}, 100)
		}, this.positionAndResize = function () {
			var t = i.textHolder_do.getWidth(),
				o = i.textHolder_do.getHeight(),
				s = parseInt((e.stageWidth - t) / 2),
				l = parseInt((e.stageHeight - o) / 2);
			i.bk_do.setWidth(e.stageWidth), i.bk_do.setHeight(e.stageHeight), i.textHolder_do.setX(s), i.textHolder_do.setY(l), i.img_do.setX(s + 6), i.img_do.setY(l + parseInt((i.textHolder_do.getHeight() - i.img_do.h) / 2))
		}, this.closeWindow = function () {
			if (i.allowToRemove_bl) {
				i.isShowed_bl = !1, clearTimeout(i.show_to);
				try {
					e.main_do.removeChild(i)
				} catch (e) {}
			}
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div", "relative")
	}, t.prototype = null, e.FWDUVPInfo = t
}(window),
function (e) {
	var t = function (e, o) {
		var s = this;
		t.prototype;
		this.xhr = null, this.embedColoseN_img = o.embedColoseN_img, this.mainBk_do = null, this.mainHolder_do = null, this.mainTextHolder_do = null, this.text_do = null, this.bk_do = null, this.closeButton_do = null, this.embedWindowBackground_str = o.embedWindowBackground_str, this.embedWindowInputBackgroundPath_str = o.embedWindowInputBackgroundPath_str, this.secondaryLabelsColor_str = o.secondaryLabelsColor_str, this.inputColor_str = o.inputColor_str, this.sendButtonNPath_str = o.sendButtonNPath_str, this.sendButtonSPath_str = o.sendButtonSPath_str, this.inputBackgroundColor_str = o.inputBackgroundColor_str, this.borderColor_str = o.borderColor_str, this.sendToAFriendPath_str = o.sendToAFriendPath_str, this.maxTextWidth = 0, this.totalWidth = 0, this.stageWidth = 0, this.stageHeight = 0, this.buttonWidth = 44, this.buttonHeight = 19, this.embedWindowCloseButtonMargins = o.embedWindowCloseButtonMargins, this.finalEmbedPath_str = null, this.finalEmbedCode_str = null, this.linkToVideo_str = null, this.shareAndEmbedTextColor_str = o.shareAndEmbedTextColor_str, this.isYTB_bl = !1, this.isShowed_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
			s.setBackfaceVisibility(), s.mainHolder_do = new FWDUVPDisplayObject("div"), s.mainBk_do = new FWDUVPDisplayObject("div"), s.mainBk_do.getStyle().width = "100%", s.mainBk_do.getStyle().height = "100%", s.mainBk_do.setAlpha(.9), s.mainBk_do.getStyle().background = "url('" + s.embedWindowBackground_str + "')", s.mainTextHolder_do = new FWDUVPDisplayObject("div", "absolute"), s.bk_do = new FWDUVPDisplayObject("div"), s.bk_do.getStyle().background = "url('" + s.embedWindowBackground_str + "')", s.bk_do.getStyle().borderStyle = "solid", s.bk_do.getStyle().borderWidth = "1px", s.bk_do.getStyle().borderColor = s.borderColor_str, s.text_do = new FWDUVPDisplayObject("div", "relative"), s.text_do.hasTransform3d_bl = !1, s.text_do.hasTransform2d_bl = !1, s.text_do.getStyle().fontFamily = "Arial", s.text_do.getStyle().fontSize = "12px", s.text_do.getStyle().fontSmoothing = "antialiased", s.text_do.getStyle().webkitFontSmoothing = "antialiased", s.text_do.getStyle().textRendering = "optimizeLegibility", FWDUVPSimpleSizeButton.setPrototype(), s.closeButton_do = new FWDUVPSimpleSizeButton(s.embedColoseN_img.src, o.embedWindowClosePathS_str, s.embedColoseN_img.width, s.embedColoseN_img.height, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), s.closeButton_do.addListener(FWDUVPSimpleSizeButton.MOUSE_UP, s.closeButtonOnMouseUpHandler), s.mainHolder_do.addChild(s.mainBk_do), s.mainTextHolder_do.addChild(s.bk_do), s.mainTextHolder_do.addChild(s.text_do), s.mainHolder_do.addChild(s.mainTextHolder_do), s.addChild(s.mainHolder_do), s.mainHolder_do.addChild(s.closeButton_do)
		}, this.closeButtonOnMouseUpHandler = function () {
			s.isShowed_bl && s.hide()
		}, this.positionAndResize = function () {
			s.stageWidth = e.stageWidth, s.stageHeight = e.stageHeight, s.maxTextWidth = Math.min(s.stageWidth - 150, 500), s.totalWidth = s.maxTextWidth + s.buttonWidth + 40, s.positionFinal(), s.closeButton_do.setX(s.stageWidth - s.closeButton_do.w - s.embedWindowCloseButtonMargins), s.closeButton_do.setY(s.embedWindowCloseButtonMargins), s.setWidth(s.stageWidth), s.setHeight(s.stageHeight), s.mainHolder_do.setWidth(s.stageWidth), s.mainHolder_do.setHeight(s.stageHeight)
		}, this.positionFinal = function () {
			var e;
			s.mainTextHolder_do.setWidth(s.totalWidth), e = s.mainTextHolder_do.getHeight(), s.bk_do.setWidth(s.totalWidth - 2), s.bk_do.setHeight(e - 2), s.mainTextHolder_do.setX(parseInt((s.stageWidth - s.totalWidth) / 2)), s.mainTextHolder_do.setY(parseInt((s.stageHeight - e) / 2) - 8)
		}, this.show = function (t) {
			s.isShowed_bl || (s.isShowed_bl = !0, e.main_do.addChild(s), s.text_do.setInnerHTML(t), s.positionAndResize(), clearTimeout(s.hideCompleteId_to), clearTimeout(s.showCompleteId_to), s.mainHolder_do.setY(-s.stageHeight), s.showCompleteId_to = setTimeout(s.showCompleteHandler, 900), setTimeout(function () {
				FWDAnimation.to(s.mainHolder_do, .8, {
					y: 0,
					delay: .1,
					ease: Expo.easeInOut
				})
			}, 100))
		}, this.showCompleteHandler = function () {}, this.hide = function () {
			s.isShowed_bl && (s.isShowed_bl = !1, e.customContextMenu_do && e.customContextMenu_do.enable(), s.positionAndResize(), clearTimeout(s.hideCompleteId_to), clearTimeout(s.showCompleteId_to), s.hideCompleteId_to = setTimeout(s.hideCompleteHandler, 800), FWDAnimation.killTweensOf(s.mainHolder_do), FWDAnimation.to(s.mainHolder_do, .8, {
				y: -s.stageHeight,
				ease: Expo.easeInOut
			}))
		}, this.hideCompleteHandler = function () {
			e.main_do.removeChild(s), s.dispatchEvent(t.HIDE_COMPLETE)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.ERROR = "error", t.HIDE_COMPLETE = "hideComplete", t.prototype = null, e.FWDUVPInfoWindow = t
}(window),
function (window) {
	var FWDUVPlayer = function (props) {
			var self = this,
				recoverDecodingErrorDate, recoverSwapAudioCodecDate;

			function handleMediaError() {
				if (autoRecoverError) {
					var e = performance.now();
					!recoverDecodingErrorDate || e - recoverDecodingErrorDate > 3e3 ? (recoverDecodingErrorDate = performance.now(), self.HLSError_str = "try to recover media Error ...", self.hlsJS.recoverMediaError()) : !recoverSwapAudioCodecDate || e - recoverSwapAudioCodecDate > 3e3 ? (recoverSwapAudioCodecDate = performance.now(), self.HLSError_str = "try to swap Audio Codec and recover media Error ...", self.hlsJS.swapAudioCodec(), self.hlsJS.recoverMediaError()) : self.HLSError_str = "cannot recover, last media error recovery failed ..."
				}
				self.HLSError_str && (console && console.log(self.HLSError_str), self.main_do.addChild(self.info_do), self.info_do.showText(self.HLSError_str), self.resizeHandler())
			}
			this.isInstantiate_bl = !1, this.displayType = props.displayType || FWDUVPlayer.RESPONSIVE, self.displayType.toLowerCase() != FWDUVPlayer.RESPONSIVE && self.displayType.toLowerCase() != FWDUVPlayer.FULL_SCREEN && (self.displayType = FWDUVPlayer.RESPONSIVE), this.maxWidth = props.maxWidth || 640, this.maxHeight = props.maxHeight || 380, this.embeddedPlaylistId, this.embeddedVideoId, this.isEmbedded_bl = !1, this.useYoutube_bl = props.useYoutube || "no", this.useYoutube_bl = "yes" == self.useYoutube_bl, this.useVimeo_bl = props.useVimeo || "no", this.useVimeo_bl = "yes" == self.useVimeo_bl, self.mainFolderPath_str = props.mainFolderPath, self.mainFolderPath_str.lastIndexOf("/") + 1 != self.mainFolderPath_str.length && (self.mainFolderPath_str += "/"), this.skinPath_str = props.skinPath, self.skinPath_str.lastIndexOf("/") + 1 != self.skinPath_str.length && (self.skinPath_str += "/"), this.warningIconPath_str = self.mainFolderPath_str + this.skinPath_str + "warningIcon.png", FWDUVPlayer.YTAPIReady = !1, this.fillEntireVideoScreen_bl = !1, self.init = function () {
				self.isInstantiate_bl || (FWDUVPlayer.instaces_ar.push(this), FWDTweenLite.ticker.useRAF(!1), this.props_obj = props, this.mustHaveHolderDiv_bl = !1, this.instanceName_str = this.props_obj.instanceName, this.instanceName_str ? window[this.instanceName_str] ? alert("FWDUVPlayer instance name " + this.instanceName_str + " is already defined and contains a different instance reference, set a different instance name.") : (window[this.instanceName_str] = this, this.props_obj ? this.props_obj.parentId ? (self.displayType == FWDUVPlayer.RESPONSIVE && (self.mustHaveHolderDiv_bl = !0), !self.mustHaveHolderDiv_bl || FWDUVPUtils.getChildById(self.props_obj.parentId) ? (this.body = document.getElementsByTagName("body")[0], this.stageContainer = null, this.isEmbedded_bl && (this.displayType = FWDUVPlayer.FULL_SCREEN), self.displayType == FWDUVPlayer.FULL_SCREEN ? (window.scrollTo(0, 0), FWDUVPUtils.isIEAndLessThen9 ? self.stageContainer = self.body : self.stageContainer = document.documentElement) : this.stageContainer = FWDUVPUtils.getChildById(self.props_obj.parentId), this.listeners = {
					events_ar: []
				}, this.customContextMenu_do = null, this.info_do = null, this.categories_do = null, this.playlist_do = null, this.main_do = null, this.ytb_do = null, this.preloader_do = null, this.controller_do = null, this.videoScreen_do = null, this.flash_do = null, this.flashObject = null, this.videoPoster_do = null, this.largePlayButton_do = null, this.hider = null, this.videoHolder_do = null, this.videoHider_do = null, this.disableClick_do = null, this.embedWindow_do = null, this.spaceBetweenControllerAndPlaylist = self.props_obj.spaceBetweenControllerAndPlaylist || 1, this.autoScale_bl = self.props_obj.autoScale, this.autoScale_bl = "yes" == self.autoScale_bl, self.showPreloader_bl = self.props_obj.showPreloader, self.showPreloader_bl = "yes" == self.showPreloader_bl, this.backgroundColor_str = self.props_obj.backgroundColor || "transparent", this.videoBackgroundColor_str = self.props_obj.videoBackgroundColor || "transparent", this.flashObjectMarkup_str = null, this.lastX = 0, this.lastY = 0, this.tempStageWidth = 0, this.tempStageHeight = 0, this.tempVidStageWidth = 0, this.tempVidStageHeight = 0, this.stageWidth = 0, this.stageHeight = 0, this.vidStageWidth = 0, this.vidStageHeight = 0, this.firstTapX, this.firstTapY, this.curTime, this.totalTime, this.catId = -1, this.id = -1, this.totalVideos = 0, this.prevCatId = -1, this.videoSourcePath_str = "", this.prevVideoSourcePath_str, this.posterPath_str = self.props_obj.posterPath, this.videoType_str, this.videoStartBehaviour_str, this.prevVideoSource_str, this.prUVPosterSource_str, this.finalVideoPath_str, this.playListThumbnailWidth = self.props_obj.thumbnailWidth || 80, this.playListThumbnailHeight = self.props_obj.thumbnailHeight || 80, this.playlistWidth = self.props_obj.playlistRightWidth || 250, this.playlistHeight = 0, this.resizeHandlerId_to, this.resizeHandler2Id_to, this.hidePreloaderId_to, this.orientationChangeId_to, this.disableClickId_to, this.clickDelayId_to, this.secondTapId_to, this.videoHiderId_to, this.showPlaylistButtonAndPlaylist_bl = self.props_obj.showPlaylistButtonAndPlaylist, this.showPlaylistButtonAndPlaylist_bl = "no" != self.showPlaylistButtonAndPlaylist_bl, this.isPlaylistShowed_bl = self.props_obj.showPlaylistByDefault, this.isPlaylistShowed_bl = "no" != self.isPlaylistShowed_bl, self.showErrorInfo_bl = self.props_obj.showErrorInfo, self.showErrorInfo_bl = "no" != self.showErrorInfo_bl, self.showAnnotationsPositionTool_bl = self.props_obj.showAnnotationsPositionTool, self.showAnnotationsPositionTool_bl = "yes" == self.showAnnotationsPositionTool_bl, self.showAnnotationsPositionTool_bl && (self.isPlaylistShowed_bl = !1), self.addPrevId = 999999999 * Math.random(), this.isVideoPlayingWhenOpenWindows_bl = !1, this.isFirstPlaylistLoaded_bl = !1, this.isVideoHiderShowed_bl = !1, this.isSpaceDown_bl = !1, this.isPlaying_bl = !1, this.firstTapPlaying_bl = !1, this.stickOnCurrentInstanceKey_bl = !1, this.isFullScreen_bl = !1, this.isFlashScreenReady_bl = !1, this.orintationChangeComplete_bl = !0, this.disableClick_bl = !1, this.isAPIReady_bl = !1, this.isInstantiate_bl = !0, this.isPlaylistLoaded_bl = !1, this.isPlaylistLoadedFirstTime_bl = !1, this.useDeepLinking_bl = self.props_obj.useDeepLinking, this.useDeepLinking_bl = "yes" == self.useDeepLinking_bl, this.isAdd_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.setupMainDo(), this.startResizeHandler(), self.initializeOnlyWhenVisible_bl = self.props_obj.initializeOnlyWhenVisible, self.initializeOnlyWhenVisible_bl = "yes" == self.initializeOnlyWhenVisible_bl, self.initializeOnlyWhenVisible_bl ? (window.addEventListener("scroll", self.onInitlalizeScrollHandler), setTimeout(self.onInitlalizeScrollHandler, 500)) : self.setupPlayer()) : alert("FWDUVPlayer holder div is not found, please make sure that the div exsists and the id is correct! " + self.props_obj.parentId)) : alert("Property parentId is not defined in the FWDUVPlayer constructor, self property represents the div id into which the megazoom is added as a child!") : alert("FWDUVPlayer constructor properties object is not defined!")) : alert("FWDUVPlayer instance name is required please make sure that the instanceName parameter exsists and it's value is uinique."))
			}, self.onInitlalizeScrollHandler = function () {
				var e = FWDUVPUtils.getScrollOffsets();
				self.pageXOffset = e.x, self.pageYOffset = e.y, self.main_do.getRect().top >= -self.stageHeight && self.main_do.getRect().top < self.ws.h && (window.removeEventListener("scroll", self.onInitlalizeScrollHandler), self.setupPlayer())
			}, this.setupPlayer = function () {
				this.setupInfo(), this.setupData()
			}, self.setupMainDo = function () {
				self.main_do = new FWDUVPDisplayObject("div", "relative"), self.hasPointerEvent_bl && (self.main_do.getStyle().touchAction = "none"), self.main_do.getStyle().webkitTapHighlightColor = "rgba(0, 0, 0, 0)", self.main_do.getStyle().webkitFocusRingColor = "rgba(0, 0, 0, 0)", self.main_do.getStyle().width = "100%", self.main_do.getStyle().height = "100%", self.main_do.setBackfaceVisibility(), self.main_do.setBkColor(self.backgroundColor_str), (!FWDUVPUtils.isMobile || FWDUVPUtils.isMobile && FWDUVPUtils.hasPointerEvent) && self.main_do.setSelectable(!1), self.videoHolder_do = new FWDUVPDisplayObject("div"), self.main_do.addChild(self.videoHolder_do), self.stageContainer.style.overflow = "hidden", self.displayType == FWDUVPlayer.FULL_SCREEN ? (self.main_do.getStyle().position = "absolute", document.documentElement.appendChild(self.main_do.screen), self.main_do.getStyle().zIndex = 9999999999998) : self.stageContainer.appendChild(self.main_do.screen)
			}, self.setupInfo = function () {
				FWDUVPInfo.setPrototype(), self.info_do = new FWDUVPInfo(self, self.warningIconPath_str, self.showErrorInfo_bl), self.info_do.getStyle().zIndex = "9999999999999999"
			}, self.startResizeHandler = function () {
				window.addEventListener ? window.addEventListener("resize", self.onResizeHandler) : window.attachEvent && window.attachEvent("onresize", self.onResizeHandler), self.onResizeHandler(!0), self.resizeHandlerId_to = setTimeout(function () {
					self.resizeHandler()
				}, 500)
			}, self.stopResizeHandler = function () {
				window.removeEventListener ? window.removeEventListener("resize", self.onResizeHandler) : window.detachEvent && window.detachEvent("onresize", self.onResizeHandler), clearTimeout(self.resizeHandlerId_to)
			}, self.onResizeHandler = function (e) {
				self.resizeHandler(), clearTimeout(self.resizeHandler2Id_to), self.resizeHandler2Id_to = setTimeout(function () {
					self.resizeHandler()
				}, 300)
			}, self.resizeHandler = function (e, t) {
				self.tempPlaylistPosition_str;
				var o = FWDUVPUtils.getViewportSize();
				self.ws = o, self.isFullScreen_bl || self.displayType == FWDUVPlayer.FULL_SCREEN ? (self.main_do.setX(0), self.main_do.setY(0), self.stageWidth = o.w, self.stageHeight = o.h) : (self.stageContainer.style.width = "100%", self.stageContainer.offsetWidth > self.maxWidth && (self.stageContainer.style.width = self.maxWidth + "px"), self.stageWidth = self.stageContainer.offsetWidth, self.autoScale_bl ? (self.stageHeight = parseInt(self.maxHeight * (self.stageWidth / self.maxWidth)), self.tempStageHeight = self.stageHeight) : (self.stageHeight = self.maxHeight, self.tempStageHeight = self.stageHeight)), FWDUVPUtils.isIEAndLessThen9 && self.stageWidth < 400 && (self.stageWidth = 400), self.stageHeight < 320 && (self.stageHeight = 320), self.stageHeight > o.h && self.isFullScreen_bl && (self.stageHeight = o.h), self.data && self.playlist_do && (self.playlistHeight = parseInt(self.data.playlistBottomHeight * (self.stageWidth / self.maxWidth)), self.playlistHeight < 300 && (self.playlistHeight = 300)), self.data && (self.tempPlaylistPosition_str = self.data.playlistPosition_str, self.stageWidth < 600 && (self.tempPlaylistPosition_str = "bottom"), self.playlistPosition_str = self.tempPlaylistPosition_str, self.playlist_do && (self.playlist_do.position_str = self.tempPlaylistPosition_str)), self.playlist_do && self.isPlaylistShowed_bl ? "bottom" == self.playlistPosition_str ? (self.vidStageWidth = self.stageWidth, self.stageHeight += self.playlistHeight + self.spaceBetweenControllerAndPlaylist, self.vidStageHeight = self.stageHeight - self.playlistHeight - self.spaceBetweenControllerAndPlaylist, self.displayType == FWDUVPlayer.FULL_SCREEN && self.controller_do.disablePlaylistButton()) : "right" == self.playlistPosition_str && (self.isFullScreen_bl ? self.vidStageWidth = self.stageWidth : self.vidStageWidth = self.stageWidth - self.playlistWidth - self.spaceBetweenControllerAndPlaylist, self.controller_do && self.controller_do.enablePlaylistButton(), self.vidStageHeight = self.stageHeight) : (self.vidStageWidth = self.stageWidth, self.vidStageHeight = self.stageHeight), self.controller_do && self.playlist_do && ("right" == self.playlistPosition_str ? self.isFullScreen_bl ? self.controller_do.disablePlaylistButton() : self.controller_do.enablePlaylistButton() : self.isEmbedded_bl && self.controller_do.disablePlaylistButton()), e && !self.isMobile_bl || (FWDAnimation.killTweensOf(self), self.tempStageWidth = self.stageWidth, self.tempStageHeight = self.stageHeight, self.tempVidStageWidth = self.vidStageWidth, self.tempVidStageHeight = Math.max(0, self.vidStageHeight), self.resizeFinal(t))
			}, this.resizeFinal = function (e) {
				if (self.stageContainer.style.height = self.tempStageHeight + "px", self.main_do.setWidth(self.tempStageWidth), self.showPlaylistButtonAndPlaylist_bl && self.isPlaylistShowed_bl && self.playlistPosition_str, self.main_do.setHeight(self.tempStageHeight), self.videoHolder_do.setWidth(self.tempVidStageWidth), self.videoHolder_do.setHeight(self.tempVidStageHeight), self.audioScreen_do && self.videoType_str == FWDUVPlayer.MP3 && self.audioScreen_do.resizeAndPosition(self.tempVidStageWidth, self.tempVidStageHeight), self.ytb_do && self.videoType_str == FWDUVPlayer.YOUTUBE && (self.ytb_do.setWidth(self.tempVidStageWidth), self.ytb_do.setHeight(self.tempVidStageHeight)), self.logo_do && self.logo_do.positionAndResize(), self.playlist_do && !FWDAnimation.isTweening(self) && (self.isMobile_bl ? self.playlist_do.resizeAndPosition(!1) : self.playlist_do.resizeAndPosition(e)), self.annotations_do && (FWDAnimation.isTweening(self) ? self.annotations_do.position(!0) : self.annotations_do.position(!1)), self.controller_do && self.controller_do.resizeAndPosition(), self.categories_do && self.categories_do.resizeAndPosition(), self.videoScreen_do && (self.videoType_str == FWDUVPlayer.VIDEO || self.videoType_str == FWDUVPlayer.HLS_JS)) {
					if (self.fillEntireVideoScreen_bl) {
						if (self.videoScreen_do && self.videoScreen_do.video_el && 0 != self.videoScreen_do.video_el.videoWidth) {
							var t = self.videoScreen_do.video_el.videoWidth,
								o = self.videoScreen_do.video_el.videoHeight,
								s = self.tempVidStageWidth / t,
								i = self.tempVidStageHeight / o;
							totalScale = 0, s >= i ? totalScale = s : s <= i && (totalScale = i), self.finalVideoScreenW = parseInt(t * totalScale), self.finalVideoScreenH = parseInt(o * totalScale), self.finalVideoScreenX = parseInt((self.tempVidStageWidth - self.finalVideoScreenW) / 2), self.finalVideoScreenY = parseInt((self.tempVidStageHeight - self.finalVideoScreenH) / 2)
						}
					} else self.finalVideoScreenW = self.tempVidStageWidth, self.finalVideoScreenH = self.tempVidStageHeight, self.finalVideoScreenX = self.finalVideoScreenY = 0;
					self.videoScreen_do.resizeAndPosition(self.finalVideoScreenW, self.tempVidStageHeight, self.finalVideoScreenX, self.finalVideoScreenY)
				}
				self.ytb_do && self.ytb_do.ytb && self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do.resizeAndPosition(), self.vimeo_do && self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do.resizeAndPosition(), self.preloader_do && self.positionPreloader(), self.dumyClick_do && (self.is360 && self.videoType_str == FWDUVPlayer.YOUTUBE ? self.dumyClick_do.setWidth(0) : (self.dumyClick_do.setWidth(self.tempVidStageWidth), self.isMobile_bl ? self.dumyClick_do.setHeight(self.tempVidStageHeight) : self.videoType_str != FWDUVPlayer.YOUTUBE || self.isAdd_bl ? self.dumyClick_do.setHeight(self.tempVidStageHeight) : self.dumyClick_do.setHeight(self.tempVidStageHeight - 93))), self.videoHider_do && self.resizeVideoHider(), self.largePlayButton_do && self.positionLargePlayButton(), self.videoPoster_do && self.videoPoster_do.allowToShow_bl && self.videoPoster_do.positionAndResize(), self.popw_do && self.popw_do.isShowed_bl && self.popw_do.positionAndResize(), self.embedWindow_do && self.embedWindow_do.isShowed_bl && self.embedWindow_do.positionAndResize(), self.passWindow_do && self.passWindow_do.isShowed_bl && self.passWindow_do.positionAndResize(), self.infoWindow_do && self.infoWindow_do.isShowed_bl && self.infoWindow_do.positionAndResize(), self.info_do && self.info_do.isShowed_bl && self.info_do.positionAndResize(), self.shareWindow_do && self.shareWindow_do.isShowed_bl && self.shareWindow_do.positionAndResize(), self.adsStart_do && self.positionAds(), self.subtitle_do && self.subtitle_do.position(e), self.popupAds_do && self.popupAds_do.position(e), self.positionAdsImage()
			}, this.setupClickScreen = function () {
				self.dumyClick_do = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIE && (self.dumyClick_do.setBkColor("#00FF00"), self.dumyClick_do.setAlpha(1e-6)), self.hasPointerEvent_bl ? (self.dumyClick_do.screen.addEventListener("pointerdown", self.playPauseDownHandler), self.dumyClick_do.screen.addEventListener("pointerup", self.playPauseClickHandler), self.dumyClick_do.screen.addEventListener("pointermove", self.playPauseMoveHandler)) : self.isMobile_bl ? self.dumyClick_do.screen.addEventListener("click", self.playPauseClickHandler) : (self.dumyClick_do.screen.addEventListener("mousedown", self.playPauseDownHandler), self.dumyClick_do.screen.addEventListener("mouseup", self.playPauseClickHandler), self.dumyClick_do.screen.addEventListener("mousemove", self.playPauseMoveHandler)), self.hideClickScreen(), self.videoHolder_do.addChild(self.dumyClick_do)
			}, this.playPauseDownHandler = function (e) {
				self.isClickHandlerMoved_bl = !1;
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				self.firstDommyTapX = t.screenX, self.firstDommyTapY = t.screenY, self.is360 && (self.dumyClick_do.getStyle().cursor = "url(" + self.data.handPath_str + "), default")
			}, this.playPauseMoveHandler = function (e) {
				var t, o, s = FWDUVPUtils.getViewportMouseCoordinates(e);
				e.touches && 1 != e.touches.length || (t = Math.abs(s.screenX - self.firstDommyTapX), o = Math.abs(s.screenY - self.firstDommyTapY), self.isMobile_bl && (t > 10 || o > 10) ? self.isClickHandlerMoved_bl = !0 : !self.isMobile_bl && (t > 2 || o > 2) && (self.isClickHandlerMoved_bl = !0))
			}, this.playPauseClickHandler = function (e) {
				self.is360 && (self.dumyClick_do.getStyle().cursor = "url(" + self.data.handPath_str + "), default"), 2 != e.button && (self.isClickHandlerMoved_bl || (self.isAdd_bl ? self.data.adsPageToOpenURL_str && "none" != self.data.adsPageToOpenURL_str && (window.open(self.data.adsPageToOpenURL_str, self.data.adsPageToOpenTarget_str), self.pause()) : self.disableClick_bl || (self.firstTapPlaying_bl = self.isPlaying_bl, FWDUVPlayer.keyboardCurInstance = self, self.controller_do && 0 != self.controller_do.mainHolder_do.y && self.isMobile_bl || (self.videoType_str == FWDUVPlayer.YOUTUBE ? self.ytb_do.togglePlayPause() : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do.togglePlayPause() : FWDUVPlayer.hasHTML5Video ? self.videoScreen_do && self.videoScreen_do.togglePlayPause() : self.isFlashScreenReady_bl && self.flashObject.togglePlayPause()))))
			}, this.showClickScreen = function () {
				self.dumyClick_do.setVisible(!0), self.isAdd_bl && self.data.adsPageToOpenURL_str && "none" != self.data.adsPageToOpenURL_str ? self.dumyClick_do.setButtonMode(!0) : self.is360 ? self.dumyClick_do.getStyle().cursor = "url(" + self.data.handPath_str + "), default" : self.dumyClick_do.setButtonMode(!1)
			}, this.hideClickScreen = function () {
				self.dumyClick_do.setVisible(!1)
			}, this.setupDisableClick = function () {
				self.disableClick_do = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIE && (self.disableClick_do.setBkColor("#ff0000"), self.disableClick_do.setAlpha(.001)), self.main_do.addChild(self.disableClick_do)
			}, this.disableClick = function () {
				self.disableClick_bl = !0, clearTimeout(self.disableClickId_to), self.disableClick_do && (self.disableClick_do.setWidth(self.stageWidth), self.disableClick_do.setHeight(self.stageHeight)), self.disableClickId_to = setTimeout(function () {
					self.disableClick_do && (self.disableClick_do.setWidth(0), self.disableClick_do.setHeight(0)), self.disableClick_bl = !1
				}, 500)
			}, this.showDisable = function () {
				self.disableClick_do.w != self.stageWidth && (self.disableClick_do.setWidth(self.stageWidth), self.disableClick_do.setHeight(self.stageHeight))
			}, this.hideDisable = function () {
				self.disableClick_do && 0 != self.disableClick_do.w && (self.disableClick_do.setWidth(0), self.disableClick_do.setHeight(0))
			}, this.addDoubleClickSupport = function () {
				self.hasPointerEvent_bl ? self.dumyClick_do.screen.addEventListener("pointerdown", self.onFirstDown) : (self.isMobile_bl || (self.dumyClick_do.screen.addEventListener("mousedown", self.onFirstDown), FWDUVPUtils.isIEWebKit && self.dumyClick_do.screen.addEventListener("dblclick", self.onSecondDown)), self.dumyClick_do.screen.addEventListener("touchstart", self.onFirstDown))
			}, this.onFirstDown = function (e) {
				if (2 != e.button) {
					self.isFullscreen_bl && e.preventDefault && e.preventDefault();
					var t = FWDUVPUtils.getViewportMouseCoordinates(e);
					self.firstTapX = t.screenX, self.firstTapY = t.screenY, self.firstTapPlaying_bl = self.isPlaying_bl, FWDUVPUtils.isIEWebKit || (self.hasPointerEvent_bl ? (self.dumyClick_do.screen.removeEventListener("pointerdown", self.onFirstDown), self.dumyClick_do.screen.addEventListener("pointerdown", self.onSecondDown)) : (self.isMobile_bl || (self.dumyClick_do.screen.addEventListener("mousedown", self.onSecondDown), self.dumyClick_do.screen.removeEventListener("mousedown", self.onFirstDown)), self.dumyClick_do.screen.addEventListener("touchstart", self.onSecondDown), self.dumyClick_do.screen.removeEventListener("touchstart", self.onFirstDown)), clearTimeout(self.secondTapId_to), self.secondTapId_to = setTimeout(self.doubleTapExpired, 500))
				}
			}, this.doubleTapExpired = function () {
				clearTimeout(self.secondTapId_to), self.hasPointerEvent_bl ? (self.dumyClick_do.screen.removeEventListener("pointerdown", self.onSecondDown), self.dumyClick_do.screen.addEventListener("pointerdown", self.onFirstDown)) : (self.dumyClick_do.screen.removeEventListener("touchstart", self.onSecondDown), self.dumyClick_do.screen.addEventListener("touchstart", self.onFirstDown), self.isMobile_bl || (self.dumyClick_do.screen.removeEventListener("mousedown", self.onSecondDown), self.dumyClick_do.screen.addEventListener("mousedown", self.onFirstDown)))
			}, this.onSecondDown = function (e) {
				e.preventDefault && e.preventDefault();
				var t, o, s = FWDUVPUtils.getViewportMouseCoordinates(e);
				FWDUVPUtils.isIEWebKit && (self.firstTapPlaying_bl = self.isPlaying_bl), e.touches && 1 != e.touches.length || (t = Math.abs(s.screenX - self.firstTapX), o = Math.abs(s.screenY - self.firstTapY), t > 10 || o > 10 || (self.switchFullScreenOnDoubleClick(), FWDUVPUtils.isIEWebKit || (self.firstTapPlaying_bl ? self.play() : self.pause())))
			}, this.switchFullScreenOnDoubleClick = function () {
				self.disableClick(), self.isFullScreen_bl ? self.goNormalScreen() : self.goFullScreen()
			}, this.setupVideoHider = function () {
				self.videoHider_do = new FWDUVPDisplayObject("div"), self.videoHider_do.setBkColor(self.backgroundColor_str), self.videoHolder_do.addChild(self.videoHider_do)
			}, this.showVideoHider = function () {
				!self.isVideoHiderShowed_bl && self.videoHider_do && (self.isVideoHiderShowed_bl = !0, self.videoHider_do.setVisible(!0), self.resizeVideoHider())
			}, this.hideVideoHider = function () {
				self.isVideoHiderShowed_bl && (self.isVideoHiderShowed_bl = !1, clearTimeout(self.videoHilderId_to), self.videoHilderId_to = setTimeout(function () {
					self.videoHider_do.setVisible(!1)
				}, 300))
			}, this.resizeVideoHider = function () {
				self.isVideoHiderShowed_bl && (self.videoHider_do.setWidth(self.tempStageWidth), self.videoHider_do.setHeight(self.tempStageHeight))
			}, this.setupYoutubeAPI = function () {
				if (!self.ytb_do)
					if ("undefined" != typeof YT && YT.Player) self.setupYoutubePlayer();
					else if (FWDUVPlayer.isYoutubeAPILoadedOnce_bl) self.keepCheckingYoutubeAPI_int = setInterval(function () {
					"undefined" != typeof YT && YT && YT.Player && (-1 == self.videoSourcePath_str.indexOf("youtube.") && clearInterval(self.keepCheckingYoutubeAPI_int), clearInterval(self.keepCheckingYoutubeAPI_int), self.setupYoutubePlayer())
				}, 50);
				else {
					var e = document.createElement("script");
					e.src = "https://www.youtube.com/iframe_api";
					var t = document.getElementsByTagName("script")[0];
					t.parentNode.insertBefore(e, t), e.onload = function () {
						self.checkIfYoutubePlayerIsReadyId_int = setInterval(function () {
							YT && YT.Player && (clearInterval(self.checkIfYoutubePlayerIsReadyId_int), self.setupYoutubePlayer())
						}, 50)
					}, e.onerror = function () {
						setTimeout(function () {
							self.main_do.addChild(self.info_do), self.info_do.showText("Error loading Youtube API"), self.preloader_do.hide()
						}, 500)
					}, FWDUVPlayer.isYoutubeAPILoadedOnce_bl = !0
				}
			}, this.setupYoutubePlayer = function () {
				FWDUVPYoutubeScreen.setPrototype(), self.ytb_do = new FWDUVPYoutubeScreen(self, self.data.volume), self.ytb_do.addListener(FWDUVPYoutubeScreen.READY, self.youtubeReadyHandler), self.ytb_do.addListener(FWDUVPVideoScreen.ERROR, self.videoScreenErrorHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.SAFE_TO_SCRUBB, self.videoScreenSafeToScrubbHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.STOP, self.videoScreenStopHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.PLAY, self.videoScreenPlayHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.PAUSE, self.videoScreenPauseHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.UPDATE, self.videoScreenUpdateHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.UPDATE_TIME, self.videoScreenUpdateTimeHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.LOAD_PROGRESS, self.videoScreenLoadProgressHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.PLAY_COMPLETE, self.videoScreenPlayCompleteHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.CUED, self.youtubeScreenCuedHandler), self.ytb_do.addListener(FWDUVPYoutubeScreen.QUALITY_CHANGE, self.youtubeScreenQualityChangeHandler), clearTimeout(self.ytb_do)
			}, this.youtubeReadyHandler = function (e) {
				self.isYoutubeReady_bl = !0, self.hidePreloaderId_to = setTimeout(function () {
					self.preloader_do && self.preloader_do.hide(!0)
				}, 50), self.isTempYoutubeAdd_bl = self.isAdd_bl, self.isAdd_bl ? self.videoType_str == FWDUVPlayer.YOUTUBE && self.setSource(self.addSource_str) : self.videoType_str == FWDUVPlayer.YOUTUBE && self.updateAds(0, !0)
			}, this.youtubeScreenCuedHandler = function () {
				self.main_do && self.main_do.contains(self.info_do) && self.main_do.removeChild(self.info_do)
			}, this.youtubeScreenQualityChangeHandler = function (e) {
				self.videoType_str == FWDUVPlayer.VIDEO && (self.curDurration = self.videoScreen_do.curDuration), self.controller_do && self.controller_do.updateQuality(e.levels, e.qualityLevel)
			}, this.setupVimeoAPI = function () {
				if (!self.vimeo_do)
					if ("undefined" != typeof Vimeo && Vimeo.Player) self.setupVimeoPlayer();
					else if (FWDUVPlayer.isVimeoAPILoadedOnce_bl) self.keepCheckingVimeoAPI_int = setInterval(function () {
					"undefined" != typeof Vimeo && Vimeo && Vimeo.Player && (-1 == self.videoSourcePath_str.indexOf("vimeo.") && clearInterval(self.keepCheckingVimeoAPI_int), clearInterval(self.keepCheckingVimeoAPI_int), self.setupVimeoPlayer())
				}, 50);
				else {
					var e = document.createElement("script");
					e.src = "https://player.vimeo.com/api/player.js";
					var t = document.getElementsByTagName("script")[0];
					t.parentNode.insertBefore(e, t), e.onload = function () {
						self.keepCheckingVimeoAPI_int = setInterval(function () {
							"undefined" != typeof Vimeo && Vimeo && Vimeo.Player && (clearInterval(self.keepCheckingVimeoAPI_int), self.setupVimeoPlayer())
						}, 50)
					}, e.onerror = function () {
						setTimeout(function () {
							self.main_do.addChild(self.info_do), self.info_do.showText("Error loading Vimeo API"), self.preloader_do.hide()
						}, 500)
					}, FWDUVPlayer.isVimeoAPILoadedOnce_bl = !0
				}
			}, this.setupVimeoPlayer = function () {
				self.vimeo_do || (FWDUVPVimeoScreen.setPrototype(), self.vimeo_do = new FWDUVPVimeoScreen(self, self.data.volume), self.vimeo_do.addListener(FWDUVPVimeoScreen.ERROR, self.vimeoInitErrorHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.READY, self.vimeoReadyHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.STOP, self.videoScreenStopHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.PLAY, self.videoScreenPlayHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.PAUSE, self.videoScreenPauseHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.UPDATE, self.videoScreenUpdateHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.UPDATE_TIME, self.videoScreenUpdateTimeHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.LOAD_PROGRESS, self.videoScreenLoadProgressHandler), self.vimeo_do.addListener(FWDUVPVimeoScreen.PLAY_COMPLETE, self.videoScreenPlayCompleteHandler))
			}, this.vimeoInitErrorHandler = function (e) {
				self.main_do.addChild(self.info_do), self.info_do.showText(e.error), self.preloader_do.hide()
			}, this.vimeoReadyHandler = function (e) {
				self.isVimeoReady_bl = !0, clearInterval(self.hidePreloaderId_to), self.hidePreloaderId_to = setTimeout(function () {
					self.preloader_do && self.preloader_do.hide(!0)
				}, 50), self.isAdd_bl ? self.videoType_str == FWDUVPlayer.VIMEO && self.setSource(self.addSource_str) : self.videoType_str == FWDUVPlayer.VIMEO && self.updateAds(0, !0)
			}, self.setupContextMenu = function () {
				self.customContextMenu_do = new FWDUVPContextMenu(self.main_do, self.data.rightClickContextMenu_str)
			}, self.setupData = function () {
				FWDUVPData.setPrototype(), self.data = new FWDUVPData(self.props_obj, self.rootElement_el, self), self.data.useYoutube_bl = self.useYoutube_bl, self.data.addListener(FWDUVPData.PRELOADER_LOAD_DONE, self.onPreloaderLoadDone), self.data.addListener(FWDUVPData.LOAD_ERROR, self.dataLoadError), self.data.addListener(FWDUVPData.SKIN_PROGRESS, self.dataSkinProgressHandler), self.data.addListener(FWDUVPData.SKIN_LOAD_COMPLETE, self.dataSkinLoadComplete), self.data.addListener(FWDUVPData.PLAYLIST_LOAD_COMPLETE, self.dataPlayListLoadComplete)
			}, self.onPreloaderLoadDone = function () {
				self.showPreloader_bl && self.setupPreloader(), self.isMobile_bl || self.setupContextMenu(), self.fillEntireVideoScreen_bl = self.data.fillEntireVideoScreen_bl, self.resizeHandler()
			}, self.dataLoadError = function (e) {
				self.main_do.addChild(self.info_do), self.info_do.showText(e.text), self.preloader_do && self.preloader_do.hide(!1), self.resizeHandler(), self.playlist_do && (self.playlist_do.catId = -1), self.dispatchEvent(FWDUVPlayer.ERROR, {
					error: e.text
				})
			}, self.dataSkinProgressHandler = function (e) {}, self.dataSkinLoadComplete = function () {
				if (-1 != location.protocol.indexOf("file:") && (FWDUVPUtils.isOpera || FWDUVPUtils.isIEAndLessThen9)) return self.main_do.addChild(self.info_do), self.info_do.showText("This browser can't play video local, please test online or use a browser like Firefox of Chrome."), void(self.preloader_do && self.preloader_do.hide());
				if (self.volume = self.data.volume, self.playlistHeight = self.data.playlistBottomHeight, self.displayType != FWDUVPlayer.FULL_SCREEN || FWDUVPUtils.hasFullScreen || (self.data.showFullScreenButton_bl = !1), self.isEmbedded_bl && (self.useDeepLinking_bl = !1, self.data.playlistPosition_str = "right"), FWDUVPlayer.atLeastOnePlayerHasDeeplinking_bl && (self.useDeepLinking_bl = !1), self.useDeepLinking_bl && (FWDUVPlayer.atLeastOnePlayerHasDeeplinking_bl = !0), self.useDeepLinking_bl) setTimeout(function () {
					self.setupDL()
				}, 200);
				else {
					if (self.isEmbedded_bl) self.catId = self.embeddedPlaylistId, self.id = self.embeddedVideoId;
					else {
						var e = FWDUVPUtils.getHashUrlArgs(window.location.hash);
						self.useDeepLinking_bl && void 0 !== e.playlistId && void 0 !== e.videoId ? (self.catId = e.playlistId, self.id = e.videoId) : (self.catId = self.data.startAtPlaylist, self.id = self.data.startAtVideo)
					}
					self.loadInternalPlaylist()
				}
			}, this.dataPlayListLoadComplete = function () {
				self.loadAddFirstTime_bl = !0, self.isPlaylistLoadedFirstTime_bl || (self.setupNormalVideoPlayers(), FWDUVPUtils.isIEAndLessThen9 || self.updatePlaylist()), self.isPlaylistLoadedFirstTime_bl && self.updatePlaylist(), self.isPlaylistLoaded_bl = !0, self.preloader_do && self.positionPreloader()
			}, this.updatePlaylist = function () {
				self.videoType_str = "none.:", self.main_do && self.main_do.contains(self.info_do) && self.main_do.removeChild(self.info_do), self.preloader_do && self.preloader_do.hide(!0), self.totalVideos = self.data.playlist_ar.length, self.id < 0 ? self.id = 0 : self.id > self.totalVideos - 1 && (self.id = self.totalVideos - 1), self.playlist_do && self.playlist_do.updatePlaylist(self.data.playlist_ar, self.catId, self.id, self.data.cats_ar[self.catId].playlistName), self.hideVideoHider(), self.data.startAtRandomVideo_bl && (self.id = parseInt(Math.random() * self.data.playlist_ar.length), self.useDeepLinking_bl) ? FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id) : (self.prevSource = 99999999999 * Math.random(), self.posterPath_str = self.data.playlist_ar[self.id].posterSource, self.updateAds(0), self.isFirstPlaylistLoaded_bl && !self.isMobile_bl && !self.data.startAtRandomVideo_bl && self.data.autoPlay_bl && self.play(), self.data.startAtRandomVideo_bl = !1, self.isFirstPlaylistLoaded_bl = !0, self.dispatchEvent(FWDUVPlayer.LOAD_PLAYLIST_COMPLETE))
			}, this.loadInternalPlaylist = function () {
				self.isPlaylistLoaded_bl = !1, self.isAdd_bl = !1, self.prvAdSource = 999999999 * Math.random(), self.prevCatId != self.catId && (self.prevCatId = self.catId, self.stop(), self.hider && self.hider.stop(), self.setPosterSource("none"), self.videoPoster_do && self.videoPoster_do.hide(!0), self.preloader_do && self.preloader_do.show(!0), self.largePlayButton_do && self.largePlayButton_do.hide(), self.controller_do && self.controller_do.hide(!1, 10), self.showVideoHider(), self.data.loadPlaylist(self.catId), self.logo_do && self.logo_do.hide(!1, !0), self.isAdd_bl && (self.adsSkip_do.hide(!1), self.adsStart_do.hide(!1)), self.playlist_do && self.playlist_do.destroyPlaylist(), self.preloader_do && self.positionPreloader(), self.isAPIReady_bl && self.dispatchEvent(FWDUVPlayer.START_TO_LOAD_PLAYLIST))
			}, this.setupDL = function () {
				FWDAddress.onChange = self.dlChangeHandler, self.isEmbedded_bl && FWDAddress.setValue("?playlistId=" + self.embeddedPlaylistId + "&videoId=" + self.embeddedVideoId), self.dlChangeHandler()
			}, this.dlChangeHandler = function () {
				if (!self.hasOpenedInPopup_bl) {
					var e = !1;
					self.categories_do && self.categories_do.isOnDOM_bl ? self.categories_do.hide() : (self.catId = parseInt(FWDAddress.getParameter("playlistId")), self.id = parseInt(FWDAddress.getParameter("videoId")), (null == self.catId || null == self.id || isNaN(self.catId) || isNaN(self.id)) && (self.catId = self.data.startAtPlaylist, self.id = self.data.startAtVideo, e = !0), (self.catId < 0 || self.catId > self.data.totalCategories - 1 && !e) && (self.catId = self.data.startAtPlaylist, self.id = self.data.startAtVideo, e = !0), self.data.playlist_ar && (self.id < 0 && !e ? (self.id = self.data.startAtVideo, e = !0) : self.prevCatId == self.catId && self.id > self.data.playlist_ar.length - 1 && !e && (self.id = self.data.playlist_ar.length - 1, e = !0)), e ? FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id) : self.prevCatId != self.catId ? (self.loadInternalPlaylist(), self.prevCatId = self.catId) : (self.isThumbClick_bl = !0, self.updateAds(0, !0), self.data.startAtRandomVideo_bl = !1))
				}
			}, this.playVimeoWithDelay = function () {
				self.isMobile_bl || (self.vimeo_do.isVideoLoaded_bl ? (self.hasVimeoStarted_bl = !0, self.play(), self.vimeo_do.play(), clearTimeout(self.playVimeoWhenLoadedId_to)) : self.playVimeoWhenLoadedId_to = setTimeout(self.playVimeoWithDelay, 50))
			}, this.setupNormalVideoPlayers = function () {
				self.videoScreen_do || (self.isAPIReady_bl = !0, self.setupVideoScreen(), self.setupAudioScreen(), self.setupVideoPoster(), self.preloader_do && self.main_do.addChild(self.preloader_do), self.setupSubtitle(), self.setupClickScreen(), self.setupPopupAds(), self.data.showLogo_bl && self.setupLogo(), self.addDoubleClickSupport(), self.setupVideoHider(), self.setupAnnotations(), self.data.showController_bl && self.setupController(), self.setupAdsStart(), self.data.showPlaylistButtonAndPlaylist_bl && self.setupPlaylist(), self.setupLargePlayPauseButton(), self.data.showController_bl && self.setupHider(), self.data.showPlaylistsButtonAndPlaylists_bl && self.setupCategories(), self.setupDisableClick(), self.data.showEmbedButton_bl && self.setupEmbedWindow(), self.setupPasswordWindow(), self.data.showShareButton_bl && self.setupShareWindow(), self.setupAopw(), self.setupInfoWindow(), "no" == FWDUVPlayer.useYoutube && (self.isPlaylistLoadedFirstTime_bl = !0), self.isAPIReady_bl = !0, self.dispatchEvent(FWDUVPlayer.READY), self.data.addKeyboardSupport_bl && self.addKeyboardSupport(), self.resizeHandler())
			}, this.setupPreloader = function () {
				FWDUVPPreloader.setPrototype(), self.preloader_do = new FWDUVPPreloader(self.data.mainPreloader_img, 38, 30, 36, 80), self.preloader_do.show(!0), self.main_do.addChild(self.preloader_do)
			}, this.positionPreloader = function () {
				self.isAPIReady_bl && self.isPlaylistLoaded_bl ? (self.preloader_do.setX(parseInt((self.tempVidStageWidth - self.preloader_do.w) / 2)), self.preloader_do.setY(parseInt((self.tempVidStageHeight - self.preloader_do.h) / 2))) : (self.preloader_do.setX(parseInt((self.tempStageWidth - self.preloader_do.w) / 2)), self.preloader_do.setY(parseInt((self.tempStageHeight - self.preloader_do.h) / 2)))
			}, this.setupCategories = function () {
				FWDUVPCategories.setPrototype(), self.categories_do = new FWDUVPCategories(self.data, self), self.categories_do.getStyle().zIndex = "2147483647", self.categories_do.addListener(FWDUVPCategories.HIDE_COMPLETE, self.categoriesHideCompleteHandler), self.data.showPlaylistsByDefault_bl && (self.showCatWidthDelayId_to = setTimeout(function () {
					self.showCategories()
				}, 1400))
			}, this.categoriesHideCompleteHandler = function (e) {
				if (self.controller_do && self.controller_do.setCategoriesButtonState("unselected"), self.customContextMenu_do && self.customContextMenu_do.updateParent(self.main_do), self.useDeepLinking_bl) {
					if (self.categories_do.id != self.catId) return self.catId = self.categories_do.id, self.id = 0, void FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id)
				} else {
					if (self.catId == self.categories_do.id) return;
					self.catId = self.categories_do.id, self.id = 0, self.loadInternalPlaylist(self.catId)
				}
				self.isVideoPlayingWhenOpenWindows_bl && self.resume()
			}, this.setupVideoPoster = function () {
				FWDUVPPoster.setPrototype(), self.videoPoster_do = new FWDUVPPoster(self, self.data.show, self.data.posterBackgroundColor_str), self.videoHolder_do.addChild(self.videoPoster_do)
			}, this.setupInfoWindow = function () {
				FWDUVPInfoWindow.setPrototype(), self.infoWindow_do = new FWDUVPInfoWindow(self, self.data), self.infoWindow_do.addListener(FWDUVPInfoWindow.HIDE_COMPLETE, self.infoWindowHideCompleteHandler), self.main_do.addChild(self.infoWindow_do)
			}, this.infoWindowHideCompleteHandler = function () {
				self.isVideoPlayingWhenOpenWindows_bl && self.resume(), self.controller_do && !self.isMobile_bl && (self.controller_do.infoButton_do.isDisabled_bl = !1, self.controller_do.infoButton_do.setNormalState())
			}, this.setupLargePlayPauseButton = function () {
				FWDUVPSimpleButton.setPrototype(), -1 != this.skinPath_str.indexOf("hex_white") ? self.largePlayButton_do = new FWDUVPSimpleButton(self.data.largePlayN_img, self.data.largePlayS_str, void 0, !0, self.data.useHEXColorsForSkin_bl, self.data.normalButtonsColor_str, "#FFFFFF") : self.largePlayButton_do = new FWDUVPSimpleButton(self.data.largePlayN_img, self.data.largePlayS_str, void 0, !0, self.data.useHEXColorsForSkin_bl, self.data.normalButtonsColor_str, self.data.selectedButtonsColor_str), self.largePlayButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, self.largePlayButtonUpHandler), self.largePlayButton_do.setOverflow("visible"), self.largePlayButton_do.hide(!1), self.main_do.addChild(self.largePlayButton_do)
			}, this.largePlayButtonUpHandler = function () {
				self.disableClick(), self.largePlayButton_do.hide(), self.play()
			}, this.positionLargePlayButton = function () {
				self.largePlayButton_do.setX(parseInt((self.tempVidStageWidth - self.largePlayButton_do.w) / 2)), self.largePlayButton_do.setY(parseInt((self.tempVidStageHeight - self.largePlayButton_do.h) / 2))
			}, this.setupLogo = function () {
				FWDUVPLogo.setPrototype(), self.logo_do = new FWDUVPLogo(self, self.data.logoPath_str, self.data.logoPosition_str, self.data.logoMargins), self.main_do.addChild(self.logo_do)
			}, this.setupPlaylist = function () {
				FWDUVPPlaylist.setPrototype(), self.playlist_do = new FWDUVPPlaylist(self, self.data), self.playlist_do.addListener(FWDUVPPlaylist.THUMB_MOUSE_UP, self.playlistThumbMouseUpHandler), self.playlist_do.addListener(FWDUVPPlaylist.PLAY_PREV_VIDEO, self.playPrevVideoHandler), self.playlist_do.addListener(FWDUVPPlaylist.PLAY_NEXT_VIDEO, self.playNextVideoHandler), self.playlist_do.addListener(FWDUVPPlaylist.ENABLE_SHUFFLE, self.enableShuffleHandler), self.playlist_do.addListener(FWDUVPPlaylist.DISABLE_SHUFFLE, self.disableShuffleHandler), self.playlist_do.addListener(FWDUVPPlaylist.ENABLE_LOOP, self.enableLoopHandler), self.playlist_do.addListener(FWDUVPPlaylist.DISABLE_LOOP, self.disableLoopHandler), self.playlist_do.addListener(FWDUVPPlaylist.CHANGE_PLAYLIST, self.changePlaylistHandler), self.main_do.addChildAt(self.playlist_do, 0)
			}, this.changePlaylistHandler = function (e) {
				self.loadPlaylist(e.id)
			}, this.playlistThumbMouseUpHandler = function (e) {
				self.disableClick_bl || (self.useDeepLinking_bl && self.id != e.id ? (FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + e.id), self.id = e.id, self.isThumbClick_bl = !0) : (self.id = e.id, self.changeHLS_bl = !0, self.isThumbClick_bl = !0, self.isAdd_bl = !1, self.updateAds(0)))
			}, this.playPrevVideoHandler = function () {
				self.isThumbClick_bl = !0, self.data.shuffle_bl ? self.playShuffle() : self.playPrev()
			}, this.playNextVideoHandler = function () {
				self.isThumbClick_bl = !0, self.data.shuffle_bl ? self.playShuffle() : self.playNext()
			}, this.enableShuffleHandler = function (e) {
				self.data.shuffle_bl = !0, self.data.loop_bl = !1, self.playlist_do.setShuffleButtonState("selected"), self.playlist_do.setLoopStateButton("unselected")
			}, this.disableShuffleHandler = function (e) {
				self.data.shuffle_bl = !1, self.playlist_do.setShuffleButtonState("unselected")
			}, this.enableLoopHandler = function (e) {
				self.data.loop_bl = !0, self.data.shuffle_bl = !1, self.playlist_do.setLoopStateButton("selected"), self.playlist_do.setShuffleButtonState("unselected")
			}, this.disableLoopHandler = function (e) {
				self.data.loop_bl = !1, self.playlist_do.setLoopStateButton("unselected")
			}, this.setupPopupAds = function () {
				FWDUVPPupupAds.setPrototype(), self.popupAds_do = new FWDUVPPupupAds(self, self.data), self.videoHolder_do.addChild(self.popupAds_do)
			}, this.setupSubtitle = function () {
				FWDUVPSubtitle.setPrototype(), self.subtitle_do = new FWDUVPSubtitle(self, self.data), self.subtitle_do.addListener(FWDUVPSubtitle.LOAD_COMPLETE, self.subtitleLoadComplete)
			}, this.subtitleLoadComplete = function () {
				self.subtitle_do.show(), self.controller_do && self.controller_do.enableSubtitleButton()
			}, this.loadSubtitle = function (e) {
				self.controller_do && self.controller_do.disableSubtitleButton(), e && (self.subtitle_do.loadSubtitle(e), self.videoHolder_do.addChildAt(self.subtitle_do, self.videoHolder_do.getChildIndex(self.dumyClick_do) - 1))
			}, this.setupController = function () {
				FWDUVPController.setPrototype(), self.controller_do = new FWDUVPController(self.data, self), self.controller_do.addListener(FWDUVPController.CHANGE_PLAYBACK_RATES, self.changePlaybackRateHandler), self.controller_do.addListener(FWDUVPController.CHANGE_SUBTITLE, self.changeSubtitileHandler), self.controller_do.addListener(FWDUVPController.SHOW_CATEGORIES, self.showCategoriesHandler), self.controller_do.addListener(FWDUVPController.SHOW_PLAYLIST, self.showPlaylistHandler), self.controller_do.addListener(FWDUVPController.HIDE_PLAYLIST, self.hidePlaylistHandler), self.controller_do.addListener(FWDUVPController.PLAY, self.controllerOnPlayHandler), self.controller_do.addListener(FWDUVPController.PAUSE, self.controllerOnPauseHandler), self.controller_do.addListener(FWDUVPController.START_TO_SCRUB, self.controllerStartToScrubbHandler), self.controller_do.addListener(FWDUVPController.SCRUB, self.controllerScrubbHandler), self.controller_do.addListener(FWDUVPController.STOP_TO_SCRUB, self.controllerStopToScrubbHandler), self.controller_do.addListener(FWDUVPController.CHANGE_VOLUME, self.controllerChangeVolumeHandler), self.controller_do.addListener(FWDUVPController.DOWNLOAD_VIDEO, self.controllerDownloadVideoHandler), self.controller_do.addListener(FWDUVPController.CHANGE_YOUTUBE_QUALITY, self.controllerChangeYoutubeQualityHandler), self.controller_do.addListener(FWDUVPController.FULL_SCREEN, self.controllerFullScreenHandler), self.controller_do.addListener(FWDUVPController.NORMAL_SCREEN, self.controllerNormalScreenHandler), self.controller_do.addListener(FWDUVPPlaylist.PLAY_PREV_VIDEO, self.playPrevVideoHandler), self.controller_do.addListener(FWDUVPPlaylist.PLAY_NEXT_VIDEO, self.playNextVideoHandler), self.controller_do.addListener(FWDUVPController.SHOW_EMBED_WINDOW, self.showEmbedWindowHandler), self.controller_do.addListener(FWDUVPController.SHOW_INFO_WINDOW, self.showInfoWindowHandler), self.controller_do.addListener(FWDUVPController.SHOW_SHARE_WINDOW, self.controllerShareHandler), self.controller_do.addListener(FWDUVPController.SHOW_SUBTITLE, self.showSubtitleHandler), self.controller_do.addListener(FWDUVPController.HIDE_SUBTITLE, self.hideSubtitleHandler), self.videoHolder_do.addChild(self.controller_do)
			}, this.changePlaybackRateHandler = function (e) {
				self.setPlaybackRate(e.rate)
			}, this.changeSubtitileHandler = function (e) {
				self.data.playlist_ar[self.id].startAtSubtitle = e.id, self.controller_do.updateSubtitleButtons(self.data.playlist_ar[self.id].subtitleSource, self.data.playlist_ar[self.id].startAtSubtitle), self.isAdd_bl || self.loadSubtitle(self.data.playlist_ar[self.id].subtitleSource[self.data.playlist_ar[self.id].subtitleSource.length - 1 - self.data.playlist_ar[self.id].startAtSubtitle].source)
			}, this.showSubtitleHandler = function () {
				self.subtitle_do.show(), self.subtitle_do.isShowed_bl = !0
			}, this.hideSubtitleHandler = function () {
				self.subtitle_do.isShowed_bl = !1, self.subtitle_do.hide()
			}, this.showCategoriesHandler = function (e) {
				self.showCategories(), self.controller_do && self.controller_do.setCategoriesButtonState("selected")
			}, this.showPlaylistHandler = function (e) {
				self.disableClick(), self.showPlaylist()
			}, this.hidePlaylistHandler = function (e) {
				self.disableClick(), self.hidePlaylist()
			}, this.controllerOnPlayHandler = function (e) {
				self.play()
			}, this.controllerOnPauseHandler = function (e) {
				self.pause()
			}, this.controllerStartToScrubbHandler = function (e) {
				self.startToScrub()
			}, this.controllerScrubbHandler = function (e) {
				self.scrub(e.percent)
			}, this.controllerStopToScrubbHandler = function (e) {
				self.stopToScrub()
			}, this.controllerChangeVolumeHandler = function (e) {
				self.setVolume(e.percent)
			}, this.controllerDownloadVideoHandler = function () {
				self.downloadVideo()
			}, this.controllerShareHandler = function (e) {
				self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do ? self.isVideoPlayingWhenOpenWindows_bl = self.ytb_do.isPlaying_bl : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do ? self.isVideoPlayingWhenOpenWindows_bl = self.vimeo_do.isPlaying_bl : FWDUVPlayer.hasHTML5Video && self.videoScreen_do && (self.isVideoPlayingWhenOpenWindows_bl = self.videoScreen_do.isPlaying_bl), self.pause(), self.shareWindow_do.show(), self.controller_do && !self.isMobile_bl && (self.controller_do.shareButton_do.setSelectedState(), self.controller_do.shareButton_do.isDisabled_bl = !0)
			}, this.controllerChangeYoutubeQualityHandler = function (e) {
				self.videoType_str == FWDUVPlayer.YOUTUBE ? self.ytb_do.setQuality(e.quality) : (self.data.playlist_ar[self.id].startAtVideo = self.data.playlist_ar[self.id].videoSource.length - 1 - e.id, self.setSource(self.data.playlist_ar[self.id].videoSource[self.data.playlist_ar[self.id].startAtVideo].source, !1, self.data.playlist_ar[self.id].videoSource[self.data.playlist_ar[self.id].startAtVideo].is360), self.isQualityChanging_bl = !0, self.play())
			}, this.controllerFullScreenHandler = function () {
				self.goFullScreen()
			}, this.controllerNormalScreenHandler = function () {
				self.goNormalScreen()
			}, this.showEmbedWindowHandler = function () {
				if (-1 != location.protocol.indexOf("file:")) return self.main_do.addChild(self.info_do), void self.info_do.showText("Embedding video files local is not allowed or possible! To function properly please test online");
				self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do ? self.isVideoPlayingWhenOpenWindows_bl = self.ytb_do.isPlaying_bl : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do ? self.isVideoPlayingWhenOpenWindows_bl = self.vimeo_do.isPlaying_bl : FWDUVPlayer.hasHTML5Video && self.videoScreen_do && (self.isVideoPlayingWhenOpenWindows_bl = self.videoScreen_do.isPlaying_bl), self.pause(), self.customContextMenu_do && self.customContextMenu_do.disable(), self.embedWindow_do.show(), self.controller_do && !self.isMobile_bl && (self.controller_do.embedButton_do.setSelectedState(), self.controller_do.embedButton_do.isDisabled_bl = !0)
			}, this.showInfoWindowHandler = function () {
				self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do ? self.isVideoPlayingWhenOpenWindows_bl = self.ytb_do.isPlaying_bl : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do ? self.isVideoPlayingWhenOpenWindows_bl = self.vimeo_do.isPlaying_bl : FWDUVPlayer.hasHTML5Video && self.videoScreen_do && (self.isVideoPlayingWhenOpenWindows_bl = self.videoScreen_do.isPlaying_bl), self.pause(), self.infoWindow_do.show(self.data.playlist_ar[self.id].desc), self.controller_do && !self.isMobile_bl && (self.controller_do.infoButton_do.setSelectedState(), self.controller_do.infoButton_do.isDisabled_bl = !0)
			}, this.setupAudioScreen = function () {
				self.audioScreen_do || (FWDUVPAudioScreen.setPrototype(), self.audioScreen_do = new FWDUVPAudioScreen(self, self.data.volume), self.audioScreen_do.addListener(FWDUVPAudioScreen.ERROR, self.videoScreenErrorHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.SAFE_TO_SCRUBB, self.videoScreenSafeToScrubbHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.STOP, self.videoScreenStopHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.PLAY, self.videoScreenPlayHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.PAUSE, self.videoScreenPauseHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.UPDATE, self.videoScreenUpdateHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.UPDATE_TIME, self.videoScreenUpdateTimeHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.LOAD_PROGRESS, self.videoScreenLoadProgressHandler), self.audioScreen_do.addListener(FWDUVPVideoScreen.START_TO_BUFFER, self.videoScreenStartToBuferHandler), self.audioScreen_do.addListener(FWDUVPVideoScreen.STOP_TO_BUFFER, self.videoScreenStopToBuferHandler), self.audioScreen_do.addListener(FWDUVPAudioScreen.PLAY_COMPLETE, self.videoScreenPlayCompleteHandler), self.videoHolder_do.addChild(self.audioScreen_do))
			}, this.setupVideoScreen = function () {
				FWDUVPVideoScreen.setPrototype(), self.videoScreen_do = new FWDUVPVideoScreen(self, self.data.volume), self.videoScreen_do.addListener(FWDUVPVideoScreen.ERROR, self.videoScreenErrorHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.SAFE_TO_SCRUBB, self.videoScreenSafeToScrubbHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.STOP, self.videoScreenStopHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.PLAY, self.videoScreenPlayHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.PAUSE, self.videoScreenPauseHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.UPDATE, self.videoScreenUpdateHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.UPDATE_TIME, self.videoScreenUpdateTimeHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.LOAD_PROGRESS, self.videoScreenLoadProgressHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.START_TO_BUFFER, self.videoScreenStartToBuferHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.STOP_TO_BUFFER, self.videoScreenStopToBuferHandler), self.videoScreen_do.addListener(FWDUVPVideoScreen.PLAY_COMPLETE, self.videoScreenPlayCompleteHandler), self.videoHolder_do.addChild(self.videoScreen_do)
			}, this.videoScreenErrorHandler = function (e) {
				var t;
				self.isPlaying_bl = !1, FWDUVPlayer.hasHTML5Video || self.videoType_str == FWDUVPlayer.YOUTUBE ? (t = e.text, window.console && console.log(e.text), self.main_do && self.main_do.addChild(self.info_do), self.info_do && self.info_do.showText(t), self.controller_do && (self.controller_do.disableMainScrubber(), self.controller_do.disablePlayButton(), self.data.showControllerWhenVideoIsStopped_bl || self.controller_do.hide(!self.isMobile_bl), self.largePlayButton_do.hide(), self.hideClickScreen(), self.hider && self.hider.stop())) : (t = e, self.main_do && self.main_do.addChild(self.info_do), self.info_do && self.info_do.showText(t)), self.logo_do && self.logo_do.hide(!1), self.preloader_do && self.preloader_do.hide(!1), self.showCursor(), self.dispatchEvent(FWDUVPlayer.ERROR, {
					error: t
				})
			}, this.videoScreenSafeToScrubbHandler = function () {
				self.controller_do && (self.isAdd_bl ? (self.controller_do.disableMainScrubber(), 0 != self.data.timeToHoldAds && self.adsStart_do.show(!0), self.data.adsThumbnailPath_str && "none" != self.data.adsThumbnailPath_str && self.adsStart_do.loadThumbnail(self.data.adsThumbnailPath_str), self.positionAds()) : self.controller_do.enableMainScrubber(), self.controller_do.enablePlayButton(), self.controller_do.show(!0), self.isAdd_bl || (self.controller_do.ytbQualityButton_do.enable(), self.controller_do.enablePlaybackRateButton()), !self.isAdd_bl && self.controller_do.playbackRateButton_do && self.controller_do.enablePlaybackRateButton(), self.fillEntireVideoScreen_bl && self.resizeHandler(), self.hider && self.hider.start()), !self.isAdd_bl && self.data.playlist_ar[self.id].subtitleSource && self.loadSubtitle(self.data.playlist_ar[self.id].subtitleSource[self.data.playlist_ar[self.id].subtitleSource.length - 1 - self.data.playlist_ar[self.id].startAtSubtitle].source), self.controller_do && !self.isQualityChanging_bl && self.controller_do.disableSubtitleButton(), self.isMobile_bl && self.adsSkip_do.hide(!1), self.videoType_str != FWDUVPlayer.VIMEO && self.showClickScreen(), setTimeout(function () {
					self.totalDuration && self.controller_do && self.controller_do.positionAdsLines(self.totalDuration)
				}, 1500)
			}, this.videoScreenStopHandler = function (e) {
				self.main_do && self.main_do.contains(self.info_do) && self.main_do.removeChild(self.info_do), self.videoPoster_do.allowToShow_bl = !0, self.isPlaying_bl = !1, self.controller_do && (self.controller_do.disableMainScrubber(), self.controller_do.showPlayButton(), self.data.showControllerWhenVideoIsStopped_bl ? self.controller_do.show(!self.isMobile_bl) : self.controller_do.hide(!self.isMobile_bl), self.hider && self.hider.stop()), self.useYoutube_bl && self.ytb_do && (self.isMobile_bl ? self.ytb_do.destroyYoutube() : self.ytb_do.stopVideo()), self.logo_do && self.logo_do.hide(!0), self.hideClickScreen(), self.isMobile_bl && self.videoType_str == FWDUVPlayer.YOUTUBE && (self.videoPoster_do.hide(), self.largePlayButton_do.hide()), self.isMobile_bl && (self.adsSkip_do.hide(!1), self.adsStart_do.hide(!1)), self.showCursor(), self.dispatchEvent(FWDUVPlayer.STOP)
			}, this.videoScreenPlayHandler = function () {
				self.is360 && (self.dumyClick_do.getStyle().cursor = "url(" + self.data.handPath_str + "), default"), FWDUVPlayer.keyboardCurInstance = self, self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do && self.ytb_do.isStopped_bl || (FWDUVPlayer.stopAllVideos(self), self.isPlaying_bl = !0, self.isThumbClick_bl = !1, self.loadAddFirstTime_bl = !1, self.logo_do && self.logo_do.show(!0), self.controller_do && (self.controller_do.showPauseButton(), self.controller_do.show(!0)), self.playAtTime_bl = !1, self.hasHlsPlayedOnce_bl = !0, self.largePlayButton_do && self.largePlayButton_do.hide(), self.hider && self.hider.start(), self.showCursor(), self.popw_do && self.popw_do.hide(), self.isQualityChanging_bl && (self.scrubbAtTime(self.curDurration), self.curDurration = 0, self.isQualityChanging_bl = !1), self.wasAdd_bl && (FWDUVPUtils.isIOS ? setTimeout(function () {
					self.scrubbAtTime(self.scrubAfterAddDuration)
				}, 500) : self.videoType_str == FWDUVPlayer.VIMEO ? setTimeout(function () {
					self.scrubbAtTime(self.scrubAfterAddDuration)
				}, 500) : self.scrubbAtTime(self.scrubAfterAddDuration), self.wasAdd_bl = !1), !self.hasStartedToPlay_bl && self.data.playlist_ar[self.id].startAtTime && self.scrubbAtTime(self.data.playlist_ar[self.id].startAtTime), self.hasStartedToPlay_bl = !0, self.dispatchEvent(FWDUVPlayer.PLAY))
			}, this.videoScreenPauseHandler = function () {
				if (!(self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do && self.ytb_do.isStopped_bl || self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do && self.vimeo_do.isStopped_bl)) {
					self.isPlaying_bl = !1, self.controller_do && (self.controller_do.showPlayButton(), self.controller_do.show(!0));
					var e = self.shareWindow_do && self.shareWindow_do.isShowed_bl,
						t = self.embedWindow_do && self.embedWindow_do.isShowed_bl;
					e || t || self.showPopW_bl && self.popw_do.show(self.popwSource), !self.largePlayButton_do || self.isAdd_bl || self.data.showAnnotationsPositionTool_bl || self.largePlayButton_do.show(), self.hider && (self.hider.reset(), self.hider.stop()), self.videoType_str != FWDUVPlayer.VIMEO && self.showClickScreen(), self.showCursor(), self.dispatchEvent(FWDUVPlayer.PAUSE)
				}
			}, this.videoScreenUpdateHandler = function (e) {
				var t;
				FWDUVPlayer.hasHTML5Video || self.videoType_str == FWDUVPlayer.YOUTUBE ? (t = e.percent, self.controller_do && self.controller_do.updateMainScrubber(t)) : (t = e, self.controller_do && self.controller_do.updateMainScrubber(t)), self.dispatchEvent(FWDUVPlayer.UPDATE, {
					percent: t
				})
			}, this.videoScreenUpdateTimeHandler = function (e, e2, e3) {
				var time, seconds;
				if (FWDUVPlayer.hasHTML5Video || self.videoType_str == FWDUVPlayer.YOUTUBE || self.videoType_str == FWDUVPlayer.VIMEO ? (self.curTime = e.curTime, self.totalTime = e.totalTime, time = self.curTime + "/" + self.totalTime, seconds = e.seconds, self.controller_do && self.controller_do.updateTime(time)) : (self.curTime = e, self.totalTime = e2, time = self.curTime + "/" + self.totalTime, null != e && null != e2 || (time = "00:00/00:00"), seconds = e3, self.controller_do && self.controller_do.updateTime(time)), self.currentSecconds = e.seconds, self.subtitle_do && !self.isAdd_bl && self.subtitle_do.updateSubtitle(parseInt(e.seconds)), self.popupAds_do && !self.isAdd_bl && self.popupAds_do.update(parseInt(e.seconds)), self.annotations_do && !self.isAdd_bl && self.annotations_do.update(parseInt(e.seconds)), self.cuePointsSource_ar && !self.isAdd_bl)
					for (var i = 0; i < self.cuePointsSource_ar.length; i++) {
						var cuePoint = self.cuePointsSource_ar[i];
						cuePoint.timeStart == e.seconds && (self.data.executeCuepointsOnlyOnce_bl && cuePoint.isPlayed_bl || eval(cuePoint.javascriptCall), cuePoint.isPlayed_bl = !0)
					}
				self.isAdd_bl || (self.totalTime.length > 5 ? self.totalDuration = FWDUVPUtils.getSecondsFromString(self.totalTime) : self.totalDuration = FWDUVPUtils.getSecondsFromString("00:" + self.totalTime)), self.isAdd_bl ? self.data.timeToHoldAds > seconds ? (self.adsStart_do.updateText(self.data.skipToVideoText_str + Math.abs(self.data.timeToHoldAds - seconds)), self.isMobile_bl && self.adsSkip_do.hide(!1), self.videoType_str == FWDUVPlayer.IMAGE && self.adsStart_do.show(!0)) : self.isPlaying_bl && (self.adsStart_do.hide(!0), self.adsSkip_do.show(!0)) : (self.adsStart_do.hide(!0), self.adsSkip_do.hide(!0)), 0 != seconds && (self.curDurration = seconds, self.updateAds(seconds)), self.isPlaying_bl && FWDUVPUtils.getSecondsFromString(self.data.playlist_ar[self.id].stopAtTime) <= e.seconds && (self.data.playAfterVideoStop_bl ? self.data.stopAfterLastVideoHasPlayed_bl && self.data.playlist_ar.length - 1 == self.id ? self.stop() : self.playNext() : self.data.stopAfterLastVideoHasPlayed_bl || self.data.playlist_ar.length - 1 != self.id ? self.stop() : self.playNext()), self.dispatchEvent(FWDUVPlayer.UPDATE_TIME, {
					currentTime: self.curTime,
					totalTime: self.totalTime
				})
			}, this.videoScreenLoadProgressHandler = function (e) {
				FWDUVPlayer.hasHTML5Video || self.videoType_str == FWDUVPlayer.YOUTUBE ? self.controller_do && self.controller_do.updatePreloaderBar(e.percent) : self.controller_do && self.controller_do.updatePreloaderBar(e)
			}, this.videoScreenStartToBuferHandler = function () {
				self.preloader_do && self.preloader_do.show()
			}, this.videoScreenStopToBuferHandler = function () {
				self.preloader_do && self.preloader_do.hide(!0)
			}, this.videoScreenPlayCompleteHandler = function (e, t) {
				var o = self.isAdd_bl;
				self.isAdd_bl && (self.isThumbClick_bl = !0, self.data.openNewPageAtTheEndOfTheAds_bl && "none" != self.data.adsPageToOpenURL_str && !t && ("_self" == self.data.adsPageToOpenTarget_str ? location.href = self.data.adsPageToOpenURL_str : window.open(self.data.adsPageToOpenURL_str, self.data.adsPageToOpenTarget_str)), self.isAdd_bl = !1, self.updateAds(0), self.wasAdd_bl = !0, t && self.videoType_str == FWDUVPlayer.VIDEO ? self.play() : self.isMobile_bl || self.play()), o || (self.data.stopVideoWhenPlayComplete_bl || 1 == self.data.playlist_ar.length || self.data.stopAfterLastVideoHasPlayed_bl && self.data.playlist_ar.length - 1 == self.id ? self.stop() : self.data.loop_bl ? "hls_flash" == self.videoType_str ? setTimeout(function () {
					self.scrub(0), self.resume()
				}, 50) : (self.scrub(0), self.play()) : self.data.shuffle_bl ? (self.playShuffle(), self.isMobile_bl && self.stop()) : (self.playNext(), self.isMobile_bl && self.stop())), self.hider && self.hider.reset(), self.dispatchEvent(FWDUVPlayer.PLAY_COMPLETE)
			}, this.setupAnnotations = function () {
				FWDUVPAnnotations.setPrototype(), self.annotations_do = new FWDUVPAnnotations(self, self.data), self.videoHolder_do.addChild(self.annotations_do)
			}, this.setupAdsStart = function () {
				FWDUVPAdsStart.setPrototype(), self.adsStart_do = new FWDUVPAdsStart(self.data.adsButtonsPosition_str, self.data.adsBorderNormalColor_str, "", self.data.adsBackgroundPath_str, self.data.adsTextNormalColor), FWDUVPAdsButton.setPrototype(), self.adsSkip_do = new FWDUVPAdsButton(self.data.skipIconPath_img, self.data.skipIconSPath_str, self.data.skipToVideoButtonText_str, self.data.adsButtonsPosition_str, self.data.adsBorderNormalColor_str, self.data.adsBorderSelectedColor_str, self.data.adsBackgroundPath_str, self.data.adsTextNormalColor, self.data.adsTextSelectedColor, self.data.useHEXColorsForSkin_bl, self.data.normalButtonsColor_str, self.data.selectedButtonsColor_str), self.adsSkip_do.addListener(FWDUVPAdsButton.MOUSE_UP, self.skipAdsMouseUpHandler), self.videoHolder_do.addChild(self.adsSkip_do), self.videoHolder_do.addChild(self.adsStart_do)
			}, this.skipAdsMouseUpHandler = function () {
				self.isThumbClick_bl = !0, self.videoScreenPlayCompleteHandler(null, !0)
			}, this.positionAds = function (e) {
				var t, o;
				t = "left" == self.data.adsButtonsPosition_str ? 0 : self.tempVidStageWidth, o = self.controller_do ? self.controller_do.isShowed_bl ? self.tempVidStageHeight - self.adsStart_do.h - self.data.controllerHeight - 30 : self.tempVidStageHeight - self.adsStart_do.h - self.data.controllerHeight : self.tempVidStageHeight - self.adsStart_do.h, FWDAnimation.killTweensOf(this.adsStart_do), e ? FWDAnimation.to(this.adsStart_do, .8, {
					y: o,
					ease: Expo.easeInOut
				}) : this.adsStart_do.setY(o), self.adsStart_do.setX(t), t = "left" == self.data.adsButtonsPosition_str ? 0 : self.tempVidStageWidth, o = self.controller_do ? self.controller_do.isShowed_bl ? self.tempVidStageHeight - self.adsSkip_do.h - self.data.controllerHeight - 30 : self.tempVidStageHeight - self.adsSkip_do.h - self.data.controllerHeight : self.tempVidStageHeight - self.adsSkip_do.h, FWDAnimation.killTweensOf(this.adsSkip_do), e ? FWDAnimation.to(this.adsSkip_do, .8, {
					y: o,
					ease: Expo.easeInOut
				}) : this.adsSkip_do.setY(o), self.adsSkip_do.setX(t)
			}, this.setupShareWindow = function () {
				FWDUVPShareWindow.setPrototype(), self.shareWindow_do = new FWDUVPShareWindow(self.data, self), self.shareWindow_do.addListener(FWDUVPShareWindow.HIDE_COMPLETE, self.shareWindowHideCompleteHandler)
			}, this.shareWindowHideCompleteHandler = function () {
				self.isVideoPlayingWhenOpenWindows_bl && self.resume(), self.controller_do && !self.isMobile_bl && (self.controller_do.shareButton_do.isDisabled_bl = !1, self.controller_do.shareButton_do.setNormalState())
			}, this.setupPasswordWindow = function () {
				FWDUVPPassword.setPrototype(), self.passWindow_do = new FWDUVPPassword(self.data, self), self.passWindow_do.addListener(FWDUVPPassword.CORRECT, self.passordCorrect)
			}, this.passordCorrect = function () {
				self.passWindow_do.hide(), self.hasPassedPassowrd_bl = !0, self.play()
			}, this.setupEmbedWindow = function () {
				FWDUVPEmbedWindow.setPrototype(), self.embedWindow_do = new FWDUVPEmbedWindow(self.data, self), self.embedWindow_do.addListener(FWDUVPEmbedWindow.ERROR, self.embedWindowErrorHandler), self.embedWindow_do.addListener(FWDUVPEmbedWindow.HIDE_COMPLETE, self.embedWindowHideCompleteHandler)
			}, this.embedWindowErrorHandler = function (e) {
				self.main_do.addChild(self.info_do), self.info_do.showText(e.error)
			}, this.embedWindowHideCompleteHandler = function () {
				self.isVideoPlayingWhenOpenWindows_bl && self.resume(), self.controller_do && !self.isMobile_bl && (self.controller_do.embedButton_do.isDisabled_bl = !1, self.controller_do.embedButton_do.setNormalState())
			}, this.copyLinkButtonOnMouseOver = function () {
				self.embedWindow_do.copyLinkButton_do.setSelectedState()
			}, this.copyLinkButtonOnMouseOut = function () {
				self.embedWindow_do.copyLinkButton_do.setNormalState()
			}, this.getLinkCopyPath = function () {
				return self.embedWindow_do.linkToVideo_str
			}, this.embedkButtonOnMouseOver = function () {
				self.embedWindow_do.copyEmbedButton_do.setSelectedState()
			}, this.embedButtonOnMouseOut = function () {
				self.embedWindow_do.copyEmbedButton_do.setNormalState()
			}, this.getEmbedCopyPath = function () {
				return self.embedWindow_do.finalEmbedCode_str
			}, this.setupFlashScreen = function () {
				self.flash_do || FWDUVPFlashTest.hasFlashPlayerVersion("9.0.18") && (self.flash_do = new FWDUVPDisplayObject("div"), self.flash_do.setBackfaceVisibility(), self.flash_do.setWidth(1), self.flash_do.setHeight(1), self.videoHolder_do.addChild(self.flash_do), window[self.instanceName_str + "HLSFlashReady"] = function (e, t) {
					if ("error" == e && (self.main_do.addChild(self.info_do), self.info_do.showText(t[2] + " - " + t[1])), "manifest" == e && (self.setVolume(self.data.volume), (self.data.autoPlay_bl || self.changeHLS_bl) && self.play(), self.changeHLS_bl = !1), "state" == e && (self.hlsState = t[0], "PLAYING" == t[0] ? (self.isVideoPlayingWhenOpenWindows_bl = !0, self.isHLSVideoPlayng_bl = !0, self.videoScreenSafeToScrubbHandler(), self.videoScreenPlayHandler()) : "PAUSED" == t[0] && (self.videoScreenPauseHandler(), self.isHLSVideoPlayng_bl = !1)), "position" == e && self.isPlaying_bl) {
						self.HLSDuration = Math.round(t[0].duration);
						var o = FWDUVPVideoScreen.formatTime(Math.round(t[0].duration)),
							s = {
								curTime: FWDUVPVideoScreen.formatTime(Math.round(t[0].position)),
								totalTime: o
							};
						self.hlsPosition = t[0].position, self.videoScreenUpdateTimeHandler(s), self.videoScreenUpdateHandler({
							percent: Math.round(t[0].position) / Math.round(t[0].duration)
						})
					}
					"complete" == e && self.videoScreenPlayCompleteHandler()
				}, self.flashObjectMarkup_str = '<object id="' + self.instanceName_str + '"classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%"><param name="movie" value="' + self.data.flashPath_str + '"/><param name="allowScriptAccess" value="sameDomain"/><param name="wmode" value="opaque"/><param name="scale" value="noscale"/><param name=FlashVars value="callback=' + self.instanceName_str + "HLSFlashReady&instanceName=" + self.instanceName_str + "&volume=" + self.data.volume + "&bkColor_str=" + self.videoBackgroundColor_str + '"/><object type="application/x-shockwave-flash" data="' + self.data.flashPath_str + '" width="100%" height="100%"><param name="movie" value="' + self.data.flashPath_str + '"/><param name="wmode" value="opaque"/><param name="scale" value="noscale"/><param name=FlashVars value="callback=' + self.instanceName_str + "HLSFlashReady&instanceName=" + self.instanceName_str + "&volume=" + self.data.volume + "&bkColor_str=" + self.videoBackgroundColor_str + '"/></object></object>', self.flash_do.screen.innerHTML = self.flashObjectMarkup_str, self.registerHLSEvents_int = setInterval(function () {
					self.flashObject.playerLoad && (self.isHLSFlashReady_bl = !0, clearInterval(self.registerHLSEvents_int))
				}, 50), self.flashObject = self.flash_do.screen.firstChild, FWDUVPUtils.isIE || (self.flashObject = self.flashObject.getElementsByTagName("object")[0]))
			}, this.flashScreenFail = function () {
				self.main_do.addChild(self.info_do), self.info_do.showText("External interface error!"), self.resizeHandler()
			}, this.addKeyboardSupport = function () {
				document.addEventListener ? (document.addEventListener("keydown", this.onKeyDownHandler), document.addEventListener("keyup", this.onKeyUpHandler)) : document.attachEvent && (document.attachEvent("onkeydown", this.onKeyDownHandler), document.attachEvent("onkeyup", this.onKeyUpHandler))
			}, this.onKeyDownHandler = function (e) {
				if (!self.isSpaceDown_bl && (self.isSpaceDown_bl = !0, 32 == e.keyCode)) {
					if (self.videoType_str == FWDUVPlayer.IMAGE) self.isImageAdsPlaying_bl ? self.stopUpdateImageInterval() : self.startUpdateImageInterval();
					else if (self.videoType_str == FWDUVPlayer.YOUTUBE) {
						if (!self.ytb_do.isSafeToBeControlled_bl) return;
						self.ytb_do.togglePlayPause()
					} else if (self.videoType_str == FWDUVPlayer.MP3) {
						if (!self.audioScreen_do.isSafeToBeControlled_bl) return;
						self.audioScreen_do.togglePlayPause()
					} else if (self.videoType_str == FWDUVPlayer.VIMEO) {
						if (!self.vimeo_do.isSafeToBeControlled_bl) return;
						self.vimeo_do.togglePlayPause()
					} else if (FWDUVPlayer.hasHTML5Video)
						if (self.videoType_str == FWDUVPlayer.HLS_JS) 1 == self.isHLSVideoPlayng_bl ? self.pause() : self.resume();
						else {
							if (!self.videoScreen_do.isSafeToBeControlled_bl) return;
							self.videoScreen_do && self.videoScreen_do.togglePlayPause()
						}
					else self.isFlashScreenReady_bl && self.flashObject.togglePlayPause();
					return e.preventDefault && e.preventDefault(), !1
				}
			}, this.onKeyUpHandler = function (e) {
				self.isSpaceDown_bl = !1
			}, this.setupAopw = function () {
				FWDUVPOPWindow.setPrototype(), self.popw_do = new FWDUVPOPWindow(self.data, self)
			}, this.setupHider = function () {
				FWDUVPHider.setPrototype(), self.hider = new FWDUVPHider(self.main_do, self.controller_do, self.data.controllerHideDelay), self.hider.addListener(FWDUVPHider.SHOW, self.hiderShowHandler), self.hider.addListener(FWDUVPHider.HIDE, self.hiderHideHandler), self.hider.addListener(FWDUVPHider.HIDE_COMPLETE, self.hiderHideCompleteHandler)
			}, this.hiderShowHandler = function () {
				self.controller_do && self.controller_do.show(!0), self.logo_do && self.data.hideLogoWithController_bl && self.isPlaying_bl && self.logo_do.show(!0), self.showCursor(), self.isAdd_bl && (self.positionAds(!0), self.adsStart_do.showWithOpacity(), self.adsSkip_do.showWithOpacity()), self.subtitle_do && self.subtitle_do.position(!0), self.popupAds_do && self.popupAds_do.position(!0)
			}, this.hiderHideHandler = function () {
				self.videoType_str != FWDUVPlayer.VIMEO ? self.controller_do.volumeScrubber_do && self.controller_do.isVolumeScrubberShowed_bl ? self.hider.reset() : self.data.showYoutubeQualityButton_bl && FWDUVPUtils.hitTest(self.controller_do.ytbButtonsHolder_do.screen, self.hider.globalX, self.hider.globalY) ? self.hider.reset() : self.data.showPlaybackRateButton_bl && self.controller_do && FWDUVPUtils.hitTest(self.controller_do.playbackRatesButtonsHolder_do.screen, self.hider.globalX, self.hider.globalY) ? self.hider.reset() : self.controller_do && self.data.showSubtitleButton_bl && FWDUVPUtils.hitTest(self.controller_do.subtitlesButtonsHolder_do.screen, self.hider.globalX, self.hider.globalY) ? self.hider.reset() : FWDUVPUtils.hitTest(self.controller_do.screen, self.hider.globalX, self.hider.globalY) ? self.hider.reset() : FWDUVPUtils.hitTest(self.controller_do.mainScrubber_do.screen, self.hider.globalX, self.hider.globalY) ? self.hider.reset() : (self.controller_do.hide(!0), self.logo_do && self.data.hideLogoWithController_bl && self.logo_do.hide(!0), self.isFullScreen_bl && self.hideCursor(), self.isAdd_bl && (self.positionAds(!0), self.adsStart_do.hideWithOpacity(), self.adsSkip_do.hideWithOpacity()), self.subtitle_do.position(!0), self.popupAds_do && self.popupAds_do.position(!0)) : self.hider.reset()
			}, this.hiderHideCompleteHandler = function () {
				self.controller_do.positionScrollBarOnTopOfTheController()
			}, this.play = function () {
				if (self.isAPIReady_bl && (!self.isMobile_bl || self.videoType_str != FWDUVPlayer.YOUTUBE || !self.ytb_do || self.ytb_do.isSafeToBeControlled_bl)) {
					if (self.videoType_str == FWDUVPlayer.HLS_JS && location.protocol.indexOf("file:") >= 0) return self.main_do.addChild(self.info_do), void self.info_do.showText("HLS m3u8 videos can't be played local on this browser, please test it online!.");
					if (!self.isAdd_bl && self.data.playlist_ar[self.id].isPrivate && !self.hasPassedPassowrd_bl && self.passWindow_do) return self.largePlayButton_do && self.largePlayButton_do.show(), void self.passWindow_do.show();
					self.hasPassedPassowrd_bl = !0, FWDUVPlayer.stopAllVideos(self), self.videoType_str == FWDUVPlayer.IMAGE ? self.startUpdateImageInterval() : self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do ? self.ytb_do.play() : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.play() : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do ? self.vimeo_do.play() : FWDUVPlayer.hasHTML5Video ? self.videoType_str != FWDUVPlayer.HLS_JS || self.isHLSManifestReady_bl ? self.videoScreen_do && self.videoScreen_do.play() : (self.videoScreen_do.initVideo(), self.setupHLS(), self.hlsJS.loadSource(self.videoSourcePath_str), self.hlsJS.attachMedia(self.videoScreen_do.video_el), self.hlsJS.on(Hls.Events.MANIFEST_PARSED, function (e) {
						self.isHLSManifestReady_bl = !0, self.videoType_str == FWDUVPlayer.HLS_JS && self.play()
					})) : self.isFlashScreenReady_bl && (self.flashObject.playVideo(), self.scrub(0)), FWDUVPlayer.keyboardCurInstance = self, self.videoPoster_do.allowToShow_bl = !1, self.largePlayButton_do.hide(), self.videoPoster_do.hide()
				}
			}, this.pause = function () {
				self.isAPIReady_bl && (self.videoType_str == FWDUVPlayer.IMAGE ? self.stopUpdateImageInterval() : self.videoType_str == FWDUVPlayer.YOUTUBE ? self.ytb_do.pause() : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.pause() : self.videoType_str == FWDUVPlayer.VIMEO ? self.vimeo_do.pause() : FWDUVPlayer.hasHTML5Video ? self.videoScreen_do && self.videoScreen_do.pause() : self.isFlashScreenReady_bl && self.flashObject.pauseVideo())
			}, this.resume = function () {
				self.isAPIReady_bl && (self.videoType_str == FWDUVPlayer.IMAGE ? self.startUpdateImageInterval() : self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do ? self.ytb_do.resume() : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.resume() : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do ? self.vimeo_do.resume() : FWDUVPlayer.hasHTML5Video ? self.videoScreen_do && self.videoScreen_do.resume() : self.isFlashScreenReady_bl && self.flashObject.resume())
			}, this.stop = function (e) {
				self.isAPIReady_bl && (self.hasPassedPassowrd_bl = !1, self.isHLSManifestReady_bl = !1, clearInterval(self.tryHLS_int), clearInterval(self.checkIfYoutubePlayerIsReadyId_int), clearInterval(self.keepCheckingYoutubeAPI_int), self.destroyHLS(), self.isPlaying_bl = !1, self.videoType_str == FWDUVPlayer.IMAGE ? self.stopUpdateImageInterval() : self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do ? self.ytb_do.stop() : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.stop() : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do ? self.vimeo_do.stop() : FWDUVPlayer.hasHTML5Video && self.videoScreen_do.stop(), clearTimeout(self.playVimeoWhenLoadedId_to), self.popw_do && self.popw_do.hide(), self.isMobile_bl ? (self.data.showControllerWhenVideoIsStopped_bl && self.controller_do && self.controller_do.show(!0), e || self.videoType_str == FWDUVPlayer.YOUTUBE ? self.useYoutube_bl && self.ytb_do && !self.ytb_do.ytb && self.ytb_do.setupVideo() : (self.videoPoster_do.show(), self.videoType_str != FWDUVPlayer.VIMEO && self.largePlayButton_do.show())) : self.isThumbClick_bl || self.isAdd_bl || (self.controller_do && self.data.showControllerWhenVideoIsStopped_bl && self.controller_do.show(!0), self.videoPoster_do && self.videoPoster_do.show(), self.largePlayButton_do && self.largePlayButton_do.show()), self.controller_do && (self.controller_do.subtitleButton_do && (self.controller_do.disableSubtitleButton(), self.subtitle_do && (self.subtitle_do.showSubtitleByDefault_bl ? self.controller_do.subtitleButton_do.setButtonState(0) : self.controller_do.subtitleButton_do.setButtonState(1))), self.controller_do.ytbQualityButton_do && self.controller_do.ytbQualityButton_do.disable(), self.controller_do.playbackRateButton_do && self.controller_do.playbackRateButton_do.disable()), self.popupAds_do && self.popupAds_do.hideAllPopupButtons(!1), self.hasHlsPlayedOnce_bl = !1, self.isSafeToScrub_bl = !1, self.hlsState = void 0, self.changeHLS_bl = !1, self.controller_do && self.controller_do.disablePlaybackRateButton(), self.subtitle_do && self.subtitle_do.hide(), self.annotations_do && self.annotations_do.update(-1), self.hider && self.hider.reset(), self.showCursor(), self.adsStart_do && self.adsStart_do.hide(!0), self.adsSkip_do && self.adsSkip_do.hide(!0), self.controller_do && self.controller_do.hideAdsLines(), self.totalDuration = 0, self.hasStartedToPlay_bl = !1)
			}, this.startToScrub = function () {
				self.isAPIReady_bl && (self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do && self.ytb_do.isSafeToBeControlled_bl ? self.ytb_do.startToScrub() : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.startToScrub() : FWDUVPlayer.hasHTML5Video ? self.videoScreen_do && self.videoScreen_do.startToScrub() : self.isFlashScreenReady_bl && self.flashObject.startToScrub())
			}, this.stopToScrub = function () {
				self.isAPIReady_bl && (self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do && self.ytb_do.isSafeToBeControlled_bl ? self.ytb_do.stopToScrub() : FWDUVPlayer.hasHTML5Video ? self.videoScreen_do && self.videoScreen_do.stopToScrub() : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.stopToScrub() : self.isFlashScreenReady_bl && self.flashObject.stopToScrub())
			}, this.scrubbAtTime = function (e) {
				self.isAPIReady_bl && e && (-1 != String(e).indexOf(":") && (e = FWDUVPUtils.getSecondsFromString(e)), self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do && self.ytb_do.isSafeToBeControlled_bl ? self.ytb_do.scrubbAtTime(e) : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do ? self.vimeo_do.scrubbAtTime(e) : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.scrubbAtTime(e) : FWDUVPlayer.hasHTML5Video && self.videoScreen_do && self.videoScreen_do.scrubbAtTime(e))
			}, this.scrub = function (e) {
				self.isAPIReady_bl && (isNaN(e) || (e < 0 ? e = 0 : e > 1 && (e = 1), self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do && self.ytb_do.isSafeToBeControlled_bl ? self.ytb_do.scrub(e) : self.videoType_str == FWDUVPlayer.MP3 ? self.audioScreen_do && self.audioScreen_do.scrub(e) : self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do && self.vimeo_do.isSafeToBeControlled_bl ? self.vimeo_do.scrub(e) : FWDUVPlayer.hasHTML5Video ? self.videoScreen_do && self.videoScreen_do.scrub(e) : self.isFlashScreenReady_bl && self.flashObject.scrub(e)))
			}, this.setVolume = function (e) {
				self.isAPIReady_bl && (self.volume = e, self.controller_do && self.controller_do.updateVolume(e, !0), self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do && self.ytb_do.setVolume(e), self.videoType_str == FWDUVPlayer.VIMEO && self.vimeo_do && self.vimeo_do.setVolume(e), self.audioScreen_do && self.audioScreen_do.setVolume(e), FWDUVPlayer.hasHTML5Video && self.videoScreen_do && self.videoScreen_do.setVolume(e), self.isFlashScreenReady_bl && self.flashObject.setVolume(e), self.dispatchEvent(FWDUVPlayer.VOLUME_SET, {
					volume: e
				}))
			}, this.showCategories = function () {
				self.isAPIReady_bl && (self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do ? self.isVideoPlayingWhenOpenWindows_bl = self.ytb_do.isPlaying_bl : FWDUVPlayer.hasHTML5Video && self.videoScreen_do && (self.isVideoPlayingWhenOpenWindows_bl = self.videoScreen_do.isPlaying_bl), self.categories_do && (self.categories_do.show(self.catId), self.customContextMenu_do && self.customContextMenu_do.updateParent(self.categories_do), self.controller_do && self.controller_do.setCategoriesButtonState("selected"), self.pause()))
			}, this.hideCategories = function () {
				self.isAPIReady_bl && self.categories_do && (self.categories_do.hide(), self.controller_do && self.controller_do.setCategoriesButtonState("unselected"))
			}, this.showPlaylist = function () {
				self.isAPIReady_bl && self.showPlaylistButtonAndPlaylist_bl && (self.isPlaylistShowed_bl = !1, self.controller_do && self.controller_do.showHidePlaylistButton(), self.playlist_do.hide(!self.isMobile_bl), self.resizeHandler(!self.isMobile_bl), FWDUVPUtils.isSafari && FWDUVPUtils.isWin ? (self.playlist_do.hide(!1), self.resizeHandler(!1)) : self.isMobile_bl || FWDAnimation.to(self, .8, {
					tempStageWidth: self.stageWidth,
					tempStageHeight: self.stageHeight,
					tempVidStageWidth: self.vidStageWidth,
					tempVidStageHeight: self.vidStageHeight,
					ease: Expo.easeInOut,
					onUpdate: self.resizeFinal
				}))
			}, this.hidePlaylist = function () {
				self.isAPIReady_bl && self.showPlaylistButtonAndPlaylist_bl && (self.isPlaylistShowed_bl = !0, self.controller_do && self.controller_do.showShowPlaylistButton(), self.playlist_do.show(!self.isMobile_bl), self.resizeHandler(!self.isMobile_bl), FWDUVPUtils.isSafari && FWDUVPUtils.isWin ? (self.playlist_do.show(!1), self.resizeHandler(!1)) : self.isMobile_bl || FWDAnimation.to(self, .8, {
					tempStageWidth: self.stageWidth,
					tempStageHeight: self.stageHeight,
					tempVidStageWidth: self.vidStageWidth,
					tempVidStageHeight: self.vidStageHeight,
					ease: Expo.easeInOut,
					onUpdate: self.resizeFinal
				}))
			}, this.setPosterSource = function (e) {
				if (self.isAPIReady_bl && e) {
					var t = e.split(",");
					e = self.isMobile_bl && null != t[1] ? t[1] : t[0], self.videoPoster_do && (self.posterPath_str = e, -1 == self.videoSourcePath_str.indexOf(".") && self.videoType_str == FWDUVPlayer.YOUTUBE && self.isMobile_bl || -1 == self.videoSourcePath_str.indexOf("vimeo.com") && self.videoType_str == FWDUVPlayer.VIMEO && self.isMobile_bl ? self.videoPoster_do.setPoster("youtubemobile") : (self.videoPoster_do.setPoster(self.posterPath_str), self.prUVPosterSource_str != e && self.dispatchEvent(FWDUVPlayer.UPDATE_POSTER_SOURCE)), self.prUVPosterSource_str = e)
				}
			}, this.updateAds = function (e, t) {
				if (self.data.playlist_ar[self.id]) {
					if (self.curAddData = self.data.playlist_ar[self.id].ads_ar, !this.isAdd_bl && self.curAddData) {
						self.curSource = self.data.playlist_ar[self.id].videoSource[self.data.playlist_ar[self.id].startAtVideo].source;
						for (var o = 0; o < self.data.playlist_ar[self.id].ads_ar.length; o++) e >= self.curAddData[o].timeStart && e <= self.curAddData[o].timeStart + 1 && (self.addSource_str = self.curAddData[o].source);
						for (o = 0; o < self.curAddData.length; o++)
							if (e >= self.curAddData[o].timeStart && e <= self.curAddData[o].timeStart + 1 && !self.curAddData[o].played_bl && self.addSource_str != self.prvAdSource) return self.addId = o, 0 == self.curAddData[o].timeStart && (t = !1), self.isAdd_bl = !0, self.addSource_str = self.curAddData[o].source, self.curAddData[self.addId].played_bl = !0, self.curAddData && (self.curAddData[self.addId].played_bl = !0), setTimeout(function () {
								self.curAddData && (self.curAddData[self.addId].played_bl = !0)
							}, 50), self.data.adsThumbnailPath_str = self.curAddData[o].thumbnailSource, self.data.timeToHoldAds = self.curAddData[o].timeToHoldAds, self.data.adsPageToOpenURL_str = self.curAddData[o].link, self.data.adsPageToOpenTarget_str = self.curAddData[o].target, self.scrubAfterAddDuration = self.curAddData[o].timeStart, self.curImageTotalTime = self.curAddData[o].addDuration, self.setSource(self.addSource_str), this.controller_do && this.controller_do.line_ar && this.controller_do.line_ar[o].setVisible(!1), void(self.prvAdSource = self.addSource_str)
					} else this.isAdd_bl ? self.curSource = "FWDUVPDummy" + (new Date).getTime() : self.curSource = self.data.playlist_ar[self.id].videoSource[self.data.playlist_ar[self.id].startAtVideo].source;
					this.controller_do && (self.controller_do.setupAdsLines(self.curAddData, self.id, self.catId), self.totalDuration && self.controller_do.positionAdsLines(self.totalDuration)), (!this.isAdd_bl && self.prevSource != self.curSource && -1 == self.curSource.indexOf("FWDUVPDummy") || t) && (t && (this.isAdd_bl = !1, self.curSource = self.data.playlist_ar[self.id].videoSource[self.data.playlist_ar[self.id].startAtVideo].source), self.setSource(self.curSource, !1, self.data.playlist_ar[self.id].videoSource[self.data.playlist_ar[self.id].startAtVideo].is360)), this.controller_do && this.controller_do.positionAdsLines(self.curDuration), self.prevDuration = e, self.prevSource = self.curSource
				}
			}, this.updateImageScreen = function (e) {
				this.imageSceeenHolder_do || (this.imageSceeenHolder_do = new FWDUVPDisplayObject("div"), this.imageSceeenHolder_do.setX(0), this.imageSceeenHolder_do.setY(0), this.imageSceeenHolder_do.setBkColor("#000000")), self.videoHolder_do.addChildAt(self.imageSceeenHolder_do, self.videoHolder_do.getChildIndex(self.dumyClick_do) - 1), self.showClickScreen(), self.imageSceeenHolder_do.contains(self.imageScreen_do) && self.imageSceeenHolder_do.removeChild(this.imageScreen_do), this.imageScreen_do = null, self.imageScreen_do = new FWDUVPDisplayObject("img"), self.imageAdd_img = new Image, self.imageAdd_img.src = e, self.preloader_do && self.preloader_do.show(), self.largePlayButton_do && self.largePlayButton_do.hide(), self.imageAdd_img.onload = function () {
					self.imageScreen_do.setScreen(self.imageAdd_img), self.imageScreen_do.setAlpha(0), FWDAnimation.to(self.imageScreen_do, 1, {
						alpha: 1
					}), self.imageAddOriginalWidth = self.imageAdd_img.width, self.imageAddOriginalHeight = self.imageAdd_img.height, self.preloader_do && self.preloader_do.hide(), self.imageSceeenHolder_do.addChild(self.imageScreen_do), self.positionAdsImage(), self.startToUpdateAdsButton()
				}, self.imageAdd_img.onerror = function () {
					self.main_do.addChild(self.info_do), self.info_do.showText("Advertisment image with path " + e + " can't be found"), self.preloader_do && self.preloader_do.hide()
				}
			}, this.positionAdsImage = function () {
				if (self.imageScreen_do && self.videoType_str == FWDUVPlayer.IMAGE) {
					var e = self.tempVidStageWidth / self.imageAddOriginalWidth,
						t = self.tempVidStageHeight / self.imageAddOriginalHeight;
					totalScale = 0, e >= t ? totalScale = e : e <= t && (totalScale = t), finalW = parseInt(self.imageAddOriginalWidth * totalScale), finalH = parseInt(self.imageAddOriginalHeight * totalScale), finalX = parseInt((self.tempVidStageWidth - finalW) / 2), finalY = parseInt((self.tempVidStageHeight - finalH) / 2), self.imageScreen_do.setWidth(finalW), self.imageScreen_do.setHeight(finalH), self.imageScreen_do.setX(finalX), self.imageScreen_do.setY(finalY), self.imageSceeenHolder_do.setWidth(self.tempVidStageWidth), self.imageSceeenHolder_do.setHeight(self.tempVidStageHeight)
				}
			}, this.startToUpdateAdsButton = function () {
				self.curImageTime = 0, self.updateAdsButton(), self.stopUpdateImageInterval(), self.startUpdateImageInterval(), self.setPlayAndPauseButtonState()
			}, this.stopUpdateImageInterval = function () {
				self.isImageAdsPlaying_bl = !1, clearInterval(self.startUpdateAdsId_int), self.setPlayAndPauseButtonState(), self.isPlaying_bl = !1, self.hider.stop()
			}, this.startUpdateImageInterval = function () {
				self.isImageAdsPlaying_bl = !0, self.startUpdateAdsId_int = setInterval(self.updateAdsButton, 1e3), self.setPlayAndPauseButtonState(), self.isPlaying_bl = !0, self.hider.start()
			}, this.updateAdsButton = function () {
				self.videoScreenUpdateTimeHandler({
					curTime: FWDUVPUtils.formatTime(self.curImageTime),
					totalTime: FWDUVPUtils.formatTime(self.curImageTotalTime),
					seconds: self.curImageTime
				}), self.videoScreenUpdateHandler({
					percent: self.curImageTime / self.curImageTotalTime
				}), self.curImageTime == self.curImageTotalTime && self.videoScreenPlayCompleteHandler(), self.curImageTime += 1
			}, this.setPlayAndPauseButtonState = function () {
				this.isImageAdsPlaying_bl ? self.controller_do && self.controller_do.showPauseButton() : self.controller_do && self.controller_do.showPlayButton()
			}, self.isThreeJsOrbigLoaded_bl = !1, self.isThreeJsOrbitLoaded_bl = !1, this.setSource = function (e, t, o) {
				if (self.data.playVideoOnlyWhenLoggedIn_bl && !self.data.isLoggedIn_bl) return self.main_do.addChild(self.info_do), self.info_do.showText(self.data.loggedInMessage_str), self.info_do.allowToRemove_bl = !1, void(self.largePlayButton_do && self.largePlayButton_do.show());
				if (self.isAPIReady_bl && -1 != self.id && (-1 != e.indexOf("encrypt:") && (e = atob(e.substr(8))), self.id < 0 ? self.id = 0 : self.id > self.totalVideos - 1 && (self.id = self.totalVideos - 1), null != self.data.playlist_ar[self.id])) {
					if (self.stop(e), self.playlist_do && self.playlist_do.curId != self.id && (self.prvAdSource = 999999999 * Math.random(), !self.data.playAdsOnlyOnce_bl))
						for (var s = 0; s < self.data.playlist_ar.length; s++)
							if (self.data.playlist_ar[s].ads_ar)
								for (var i = 0; i < self.data.playlist_ar[s].ads_ar.length; i++) self.data.playlist_ar[s].ads_ar[i].played_bl = !1;
					if (-1 != e.indexOf("vimeo.com") ? self.videoType_str = FWDUVPlayer.VIMEO : -1 != e.indexOf("youtube.") ? self.videoType_str = FWDUVPlayer.YOUTUBE : -1 != e.toLowerCase().indexOf(".mp3") ? (self.videoType_str = FWDUVPlayer.MP3, self.controller_do && self.controller_do.setX(0)) : -1 != e.indexOf(".jpg") || -1 != e.indexOf(".jpeg") || -1 != e.indexOf(".png") ? (self.videoType_str = FWDUVPlayer.IMAGE, self.controller_do && self.controller_do.setX(0)) : (self.controller_do && self.controller_do.setX(0), self.isMobile_bl || FWDUVPlayer.hasHTMLHLS || -1 == e.indexOf(".m3u8") ? self.videoType_str = FWDUVPlayer.VIDEO : self.videoType_str = FWDUVPlayer.HLS_JS), !(self.isMobile_bl || FWDUVPlayer.hasHTMLHLS || -1 == e.indexOf(".m3u8") || self.isHLSJsLoaded_bl || FWDUVPlayer.isHLSJsLoaded_bl)) return -1 != location.protocol.indexOf("file:") ? (self.main_do.addChild(self.info_do), self.info_do.showText("This browser dosen't allow playing HLS / live streaming videos local, please test online."), void self.resizeHandler()) : ((l = document.createElement("script")).src = self.data.hlsPath_str, document.head.appendChild(l), l.onerror = function () {
						self.main_do.addChild(self.info_do), self.info_do.showText("Error loading HLS library <font color='#FF0000'>" + self.data.hlsPath_str + "</font>."), self.preloader_do && self.preloader_do.hide()
					}, l.onload = function () {
						self.isHLSJsLoaded_bl = !0, FWDUVPlayer.isHLSJsLoaded_bl = !0, self.setupHLS(), self.setSource(e)
					}, void(self.autoPlay_bl || self.isThumbClick_bl || (self.setPosterSource(self.posterPath_str), self.videoPoster_do && self.videoPoster_do.show(), self.largePlayButton_do && self.largePlayButton_do.show())));
					if (-1 != e.indexOf("youtube.") && !self.ytb_do) return setTimeout(function () {
						self.showPreloader_bl && (self.main_do.addChild(self.preloader_do), self.preloader_do.show(!0), self.largePlayButton_do && self.largePlayButton_do.hide(), -1 != location.protocol.indexOf("file:") && FWDUVPUtils.isIE && self.main_do.addChild(self.info_do))
					}, 50), -1 != location.protocol.indexOf("file:") && FWDUVPUtils.isIE ? (self.main_do.addChild(self.info_do), self.info_do.showText("This browser dosen't allow the Youtube API to run local, please test it online or in another browser like Firefox or Chrome."), void self.resizeHandler()) : void self.setupYoutubeAPI();
					if (-1 != e.indexOf("vimeo.") && !self.vimeo_do && self.videoType_str == FWDUVPlayer.VIMEO) return -1 != location.protocol.indexOf("file:") ? (self.main_do.addChild(self.info_do), self.info_do.showText("This browser dosen't allow playing Vimeo videos local, please test online."), void self.resizeHandler()) : (self.showPreloader_bl && (self.main_do.addChild(self.preloader_do), self.preloader_do.show(!0)), self.largePlayButton_do && self.largePlayButton_do.hide(), void self.setupVimeoAPI());
					if (self.is360 = o, self.videoType_str != FWDUVPlayer.VIDEO && (self.is360 = !1), self.is360 && !self.isThreeJsOrbigLoaded_bl) {
						if (FWDUVPUtils.isLocal) return self.main_do.addChild(self.info_do), self.info_do.showText("This browser dosen't allow playing 360 videos local, please test online."), void(self.preloader_do && self.preloader_do.hide());
						if (!FWDUVPUtils.hasWEBGL) return self.main_do.addChild(self.info_do), self.info_do.showText("Playing 360 videos in this browser is not possible because it dosen't support WEBGL."), void(self.preloader_do && self.preloader_do.hide());
						var l;
						if (!self.isThreeJsLoaded_bl && !FWDUVPlayer.hasThreeJsLoaded_bl) return (l = document.createElement("script")).src = self.data.threeJsPath_str, l.onerror = function () {
							self.main_do.addChild(self.info_do), self.info_do.showText("Error loading 360 degree library <font color='#FF0000'>" + self.data.threeJsPath_str + "</font>."), self.preloader_do && self.preloader_do.hide()
						}, l.onload = function () {
							self.isThreeJsOrbigLoaded_bl = !0;
							var t = document.createElement("script");
							t.src = self.data.threeJsControlsPath_str, t.onerror = function () {
								self.main_do.addChild(self.info_do), self.info_do.showText("Error loading three.js from <font color='#FF0000'>" + self.data.threeJsControlsPath_str + "</font>."), self.preloader_do && self.preloader_do.hide()
							}, t.onload = function () {
								FWDUVPlayer.hasThreeJsLoaded_bl = !0, self.isThreeJsOrbitLoaded_bl = !0, self.isThreeJsOrbigLoaded_bl && self.isThreeJsOrbitLoaded_bl && self.setSource(e, !0, !0), clearTimeout(self.load360ScriptsId_to), self.preloader_do && self.preloader_do.hide()
							}, document.head.appendChild(t)
						}, document.head.appendChild(l), void(this.load360ScriptsId_to = setTimeout(function () {
							self.showPreloader_bl && self.preloader_do.show()
						}, 1e3))
					}
					if (self.videoSourcePath_str = e, self.finalVideoPath_str = e, self.is360 && (self.dumyClick_do.getStyle().cursor = "url(" + self.data.handPath_str + "), default"), self.data.playlist_ar[self.id] && self.data.playlist_ar[self.id].scrubAtTimeAtFirstPlay && (self.playAtTime_bl = !0), self.popwSource = self.data.playlist_ar[self.id].dataAdvertisementOnPauseSource, self.data.playlist_ar[self.id] && self.data.playlist_ar[self.id].dataAdvertisementOnPauseSource ? self.showPopW_bl = !0 : self.showPopW_bl = !1, self.cuePointsSource_ar = self.data.playlist_ar[self.id].cuepoints_ar, e || (e = self.data.playlist_ar[self.id].videoSource[self.data.playlist_ar[self.id].startAtVideo].source), -1 != e.indexOf("youtube.")) {
						e = e.match(/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/)[2]
					}
					if (self.controller_do && self.controller_do.enablePlayButton(), self.prevVideoSource_str = e, !e) return self.main_do.addChild(self.info_do), void self.info_do.showText("Video source is not defined!");
					if (self.playlist_do && (self.playlist_do.curId = self.id, self.playlist_do.checkThumbsState()), self.controller_do && self.data.playlist_ar[self.id].subtitleSource && self.data.playlist_ar[self.id].subtitleSource.length > 1 && self.controller_do.updateSubtitleButtons(self.data.playlist_ar[self.id].subtitleSource, self.data.playlist_ar[self.id].startAtSubtitle), self.controller_do && self.controller_do.updateHexColorForScrubber(self.isAdd_bl), self.posterPath_str = self.data.playlist_ar[self.id].posterSource, self.annotations_ar = self.data.playlist_ar[self.id].annotations_ar, self.annotations_do.setupAnnotations(self.annotations_ar), self.popupAds_do && (self.data.playlist_ar[self.id].popupAds_ar ? (self.popupAds_do.resetPopups(self.data.playlist_ar[self.id].popupAds_ar), self.popupAds_do.id = self.curId) : self.popupAds_do.hideAllPopupButtons(!0)), self.startAtPlaybackIndex = self.data.startAtPlaybackIndex, "0.25" == self.data.playlist_ar[self.id].dataPlaybackRate ? self.startAtPlaybackIndex = 5 : "0.5" == self.data.playlist_ar[self.id].dataPlaybackRate ? self.startAtPlaybackIndex = 4 : "1" == self.data.playlist_ar[self.id].dataPlaybackRate ? self.startAtPlaybackIndex = 3 : "1.25" == self.data.playlist_ar[self.id].dataPlaybackRate ? self.startAtPlaybackIndex = 2 : "1.5" == self.data.playlist_ar[self.id].dataPlaybackRate ? self.startAtPlaybackIndex = 1 : "2" == self.data.playlist_ar[self.id].dataPlaybackRate && (self.startAtPlaybackIndex = 0), self.prevVideoSourcePath_str = self.videoSourcePath_str, self.resizeHandler(!1, !0), self.videoType_str == FWDUVPlayer.IMAGE) return self.updateImageScreen(self.videoSourcePath_str), void(self.videoPoster_do && self.videoPoster_do.setX(-5e3));
					if (self.videoHolder_do.contains(self.imageSceeenHolder_do) && self.videoHolder_do.removeChild(self.imageSceeenHolder_do), self.videoPoster_do && self.videoPoster_do.setX(0), self.getVideoSource() && self.dispatchEvent(FWDUVPlayer.UPDATE_VIDEO_SOURCE), self.videoType_str == FWDUVPlayer.VIMEO) return self.ytb_do && self.ytb_do.setX(-5e3), self.videoScreen_do && self.videoScreen_do.setX(-5e3), 0 != self.vimeo_do.x && self.vimeo_do.setX(0), self.isAdd_bl ? self.showClickScreen() : self.hideClickScreen(), self.audioScreen_do && self.audioScreen_do.setX(-5e3), self.audioScreen_do.setVisible(!1), self.flash_do && (self.flash_do.setWidth(1), self.flash_do.setHeight(1)), self.videoScreen_do && self.videoScreen_do.setVisible(!1), self.controller_do && self.controller_do.removePlaybackRateButton(), self.vimeo_do.setSource(e), self.controller_do && (self.controller_do.hideQualityButtons(!1), self.controller_do.removeYtbQualityButton()), self.isMobile_bl ? (self.videoPoster_do.hide(), self.largePlayButton_do && self.largePlayButton_do.hide()) : self.data.autoPlay_bl || self.isThumbClick_bl || (self.setPosterSource(self.posterPath_str), self.videoPoster_do && self.videoPoster_do.show(), self.largePlayButton_do && self.largePlayButton_do.show()), self.getVideoSource() && self.dispatchEvent(FWDUVPlayer.UPDATE_VIDEO_SOURCE), void this.resizeHandler();
					if (self.videoType_str == FWDUVPlayer.YOUTUBE) return self.vimeo_do && self.vimeo_do.setX(-5e3), self.videoScreen_do.setX(-5e3), self.videoScreen_do.setVisible(!1), self.audioScreen_do && self.audioScreen_do.setX(-5e3), self.audioScreen_do.setVisible(!1), self.setPosterSource(self.posterPath_str), self.ytb_do && self.ytb_do.setX(0), self.flash_do && (self.flash_do.setWidth(1), self.flash_do.setHeight(1)), self.isTempYoutubeAdd_bl = !1, self.ytb_do.setSource(e), self.isMobile_bl ? setTimeout(function () {
						self.videoPoster_do.hide(), self.largePlayButton_do.hide()
					}, 100) : self.data.autoPlay_bl || self.isThumbClick_bl || (self.videoPoster_do && self.videoPoster_do.show(), self.largePlayButton_do && self.largePlayButton_do.show()), self.controller_do && (self.controller_do.addYtbQualityButton(), self.controller_do && (self.isMobile_bl && FWDUVPUtils.isAndroid || self.isMobile_bl && self.videoType_str == FWDUVPlayer.YOUTUBE || self.videoType_str == FWDUVPlayer.VIMEO || self.videoType_str == FWDUVPlayer.HLS_JS || self.videoType_str == FWDUVPlayer.IMAGE ? self.controller_do.removePlaybackRateButton() : self.controller_do.addPlaybackRateButton(self.startAtPlaybackIndex))), self.isAdd_bl ? self.setPlaybackRate(1) : self.setPlaybackRate(self.data.defaultPlaybackRate_ar[self.data.startAtPlaybackIndex]), self.controller_do && self.data.showPlaybackRateButton_bl && self.controller_do.updatePlaybackRateButtons(self.startAtPlaybackIndex), self.resizeHandler(!1, !0), void(self.getVideoSource() && self.dispatchEvent(FWDUVPlayer.UPDATE_VIDEO_SOURCE));
					if (-1 == e.indexOf("google.com")) {
						var n = e.split(",");
						e = self.isMobile_bl && null != n[1] ? n[1] : n[0]
					}
					self.finalVideoPath_str = e, self.videoType_str == FWDUVPlayer.MP3 && (self.vimeo_do && self.vimeo_do.setX(-5e3), self.ytb_do && self.ytb_do.setX(-5e3), self.audioScreen_do && self.audioScreen_do.setX(-5e3), self.audioScreen_do.setVisible(!1), self.videoScreen_do.setVisible(!0), self.controller_do && self.data.playlist_ar[self.id].videoSource.length > 1 ? (self.controller_do.updatePreloaderBar(0), self.controller_do && self.controller_do.addYtbQualityButton(), self.controller_do.updateQuality(self.data.playlist_ar[self.id].videoLabels_ar, self.data.playlist_ar[self.id].videoLabels_ar[self.data.playlist_ar[self.id].videoLabels_ar.length - 1 - self.data.playlist_ar[self.id].startAtVideo])) : self.controller_do && self.controller_do.removeYtbQualityButton(), self.controller_do && (self.isMobile_bl && FWDUVPUtils.isAndroid || self.isMobile_bl && self.videoType_str == FWDUVPlayer.YOUTUBE || self.videoType_str == FWDUVPlayer.VIMEO || self.videoType_str == FWDUVPlayer.HLS_JS || self.videoType_str == FWDUVPlayer.IMAGE || self.videoType_str == FWDUVPlayer.MP3 ? self.controller_do.removePlaybackRateButton() : self.controller_do.addPlaybackRateButton(self.startAtPlaybackIndex)), self.audioScreen_do.setX(0), self.audioScreen_do.setVisible(!0), self.audioScreen_do.setSource(e), self.data.autoPlay_bl || self.isThumbClick_bl || !self.isMobile_bl && self.isAdd_bl && !self.loadAddFirstTime_bl ? (self.play(), self.videoPoster_do.hide(), self.largePlayButton_do.hide()) : (self.setPosterSource(self.posterPath_str), self.videoPoster_do && self.videoPoster_do.show(), self.largePlayButton_do && self.largePlayButton_do.show())), (FWDUVPlayer.hasHTML5Video && self.videoType_str == FWDUVPlayer.VIDEO || self.videoType_str == FWDUVPlayer.HLS_JS) && (self.vimeo_do && self.vimeo_do.setX(-5e3), self.ytb_do && self.ytb_do.setX(-5e3), self.audioScreen_do && self.audioScreen_do.setX(-5e3), self.audioScreen_do.setVisible(!1), self.videoScreen_do.setVisible(!0), self.controller_do && self.data.playlist_ar[self.id].videoSource.length > 1 ? (self.controller_do.updatePreloaderBar(0), self.controller_do && self.controller_do.addYtbQualityButton(), self.controller_do.updateQuality(self.data.playlist_ar[self.id].videoLabels_ar, self.data.playlist_ar[self.id].videoLabels_ar[self.data.playlist_ar[self.id].videoLabels_ar.length - 1 - self.data.playlist_ar[self.id].startAtVideo])) : self.controller_do && self.controller_do.removeYtbQualityButton(), self.controller_do && (self.isMobile_bl && FWDUVPUtils.isAndroid || self.isMobile_bl && self.videoType_str == FWDUVPlayer.YOUTUBE || self.videoType_str == FWDUVPlayer.VIMEO || self.videoType_str == FWDUVPlayer.HLS_JS || self.videoType_str == FWDUVPlayer.IMAGE ? self.controller_do.removePlaybackRateButton() : self.controller_do.addPlaybackRateButton(self.startAtPlaybackIndex)), self.flash_do && (self.flash_do.setWidth(1), self.flash_do.setHeight(1)), self.videoType_str == FWDUVPlayer.HLS_JS ? (self.videoScreen_do.setSource(e), self.videoScreen_do.initVideo(), self.setupHLS(), self.hlsJS.loadSource(self.videoSourcePath_str), self.hlsJS.attachMedia(self.videoScreen_do.video_el), self.hlsJS.on(Hls.Events.MANIFEST_PARSED, function (e) {
						self.videoType_str == FWDUVPlayer.HLS_JS && (self.isHLSManifestReady_bl = !0, (self.data.autoPlay_bl || self.isThumbClick_bl || !self.isMobile_bl && self.isAdd_bl && !self.loadAddFirstTime_bl) && self.play(), self.isAdd_bl ? self.setPlaybackRate(1) : self.setPlaybackRate(self.data.defaultPlaybackRate_ar[self.startAtPlaybackIndex]), self.controller_do && self.data.showPlaybackRateButton_bl && self.controller_do.updatePlaybackRateButtons(self.startAtPlaybackIndex))
					})) : (self.videoScreen_do.setSource(e), self.data.autoPlay_bl || self.isThumbClick_bl || !self.isMobile_bl && self.isAdd_bl && !self.loadAddFirstTime_bl ? self.play() : (self.setPosterSource(self.posterPath_str), self.videoPoster_do.show(), self.largePlayButton_do.show()), self.isAdd_bl ? self.setPlaybackRate(1) : self.setPlaybackRate(self.data.defaultPlaybackRate_ar[self.startAtPlaybackIndex]), self.controller_do && self.data.showPlaybackRateButton_bl && self.controller_do.updatePlaybackRateButtons(self.startAtPlaybackIndex))), this.resizeHandler()
				}
			}, this.destroyHLS = function () {
				self.hlsJS && (self.hlsJS.destroy(), self.hlsJS = null)
			}, this.setupHLS = function () {
				self.hlsJS || (self.isHLSJsLoaded_bl = !0, self.hlsJS = new Hls, self.hlsJS.on(Hls.Events.ERROR, function (e, t) {
					switch (self.HLSError_str, t.details) {
						case Hls.ErrorDetails.MANIFEST_LOAD_ERROR:
							try {
								self.HLSError_str = 'cannot load <a href="' + t.context.url + '">' + url + "</a><br>HTTP response code:" + t.response.code + " <br>" + t.response.text, 0 === t.response.code && (self.HLSError_str += 'this might be a CORS issue, consider installing <a href="https://chrome.google.com/webstore/detail/allow-control-allow-origi/nlfbmbojpeacfghkpbjhddihlkkiljbi">Allow-Control-Allow-Origin</a> Chrome Extension')
							} catch (e) {
								self.HLSError_str = "cannot load " + self.videoSourcePath_str
							}
							break;
						case Hls.ErrorDetails.MANIFEST_LOAD_TIMEOUT:
							self.HLSError_str = "timeout while loading manifest";
							break;
						case Hls.ErrorDetails.MANIFEST_PARSING_ERROR:
							self.HLSError_str = "error while parsing manifest:" + t.reason;
							break;
						case Hls.ErrorDetails.LEVEL_LOAD_ERROR:
							self.HLSError_str = "error while loading level playlist";
							break;
						case Hls.ErrorDetails.LEVEL_LOAD_TIMEOUT:
							self.HLSError_str = "timeout while loading level playlist";
							break;
						case Hls.ErrorDetails.LEVEL_SWITCH_ERROR:
							self.HLSError_str = "error while trying to switch to level " + t.level;
							break;
						case Hls.ErrorDetails.FRAG_LOAD_ERROR:
							self.HLSError_str = "error while loading fragment " + t.frag.url;
							break;
						case Hls.ErrorDetails.FRAG_LOAD_TIMEOUT:
							self.HLSError_str = "timeout while loading fragment " + t.frag.url;
							break;
						case Hls.ErrorDetails.FRAG_LOOP_LOADING_ERROR:
							self.HLSError_str = "Frag Loop Loading Error";
							break;
						case Hls.ErrorDetails.FRAG_DECRYPT_ERROR:
							self.HLSError_str = "Decrypting Error:" + t.reason;
							break;
						case Hls.ErrorDetails.FRAG_PARSING_ERROR:
							self.HLSError_str = "Parsing Error:" + t.reason;
							break;
						case Hls.ErrorDetails.KEY_LOAD_ERROR:
							self.HLSError_str = "error while loading key " + t.frag.decryptdata.uri;
							break;
						case Hls.ErrorDetails.KEY_LOAD_TIMEOUT:
							self.HLSError_str = "timeout while loading key " + t.frag.decryptdata.uri;
							break;
						case Hls.ErrorDetails.BUFFER_APPEND_ERROR:
							self.HLSError_str = "Buffer Append Error";
							break;
						case Hls.ErrorDetails.BUFFER_ADD_CODEC_ERROR:
							self.HLSError_str = "Buffer Add Codec Error for " + t.mimeType + ":" + t.err.message;
							break;
						case Hls.ErrorDetails.BUFFER_APPENDING_ERROR:
							self.HLSError_str = "Buffer Appending Error"
					}
					self.HLSError_str && (console && console.log(self.HLSError_str), self.main_do.addChild(self.info_do), self.info_do.showText(self.HLSError_str), self.resizeHandler())
				}))
			}, this.goFullScreen = function () {
				if (self.isAPIReady_bl) {
					self.isFullScreen_bl = !0, document.addEventListener && (document.addEventListener("fullscreenchange", self.onFullScreenChange), document.addEventListener("mozfullscreenchange", self.onFullScreenChange), document.addEventListener("webkitfullscreenchange", self.onFullScreenChange), document.addEventListener("MSFullscreenChange", self.onFullScreenChange)), FWDUVPUtils.isSafari && FWDUVPUtils.isWin || (document.documentElement.requestFullScreen ? self.main_do.screen.requestFullScreen() : document.documentElement.mozRequestFullScreen ? self.main_do.screen.mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen ? self.main_do.screen.webkitRequestFullScreen() : document.documentElement.msRequestFullscreen && self.main_do.screen.msRequestFullscreen()), self.disableClick(), self.isEmbedded_bl || (self.main_do.getStyle().position = "fixed", document.documentElement.style.overflow = "hidden", self.main_do.getStyle().zIndex = 9999999999998), self.controller_do && (self.controller_do.showNormalScreenButton(), self.controller_do.setNormalStateToFullScreenButton());
					var e = FWDUVPUtils.getScrollOffsets();
					self.lastX = e.x, self.lastY = e.y, window.scrollTo(0, 0), self.isMobile_bl && window.addEventListener("touchmove", self.disableFullScreenOnMobileHandler), self.dispatchEvent(FWDUVPlayer.GO_FULLSCREEN), self.resizeHandler()
				}
			}, this.disableFullScreenOnMobileHandler = function (e) {
				e.preventDefault && e.preventDefault()
			}, this.goNormalScreen = function () {
				self.isAPIReady_bl && (document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen ? document.webkitCancelFullScreen() : document.msExitFullscreen && document.msExitFullscreen(), self.disableClick(), self.addMainDoToTheOriginalParent(), self.isFullScreen_bl = !1)
			}, this.addMainDoToTheOriginalParent = function () {
				self.isFullScreen_bl && (document.removeEventListener && (document.removeEventListener("fullscreenchange", self.onFullScreenChange), document.removeEventListener("mozfullscreenchange", self.onFullScreenChange), document.removeEventListener("webkitfullscreenchange", self.onFullScreenChange), document.removeEventListener("MSFullscreenChange", self.onFullScreenChange)), self.controller_do && self.controller_do.setNormalStateToFullScreenButton(), self.isEmbedded_bl || (self.displayType == FWDUVPlayer.RESPONSIVE ? (FWDUVPUtils.isIEAndLessThen9 ? document.documentElement.style.overflow = "auto" : document.documentElement.style.overflow = "visible", self.main_do.getStyle().position = "relative", self.main_do.getStyle().zIndex = 0) : (self.main_do.getStyle().position = "absolute", self.main_do.getStyle().zIndex = 9999999999998)), self.displayType != FWDUVPlayer.FULL_SCREEN && self.controller_do.enablePlaylistButton(), self.controller_do.showFullScreenButton(), window.scrollTo(self.lastX, self.lastY), self.showCursor(), self.resizeHandler(), setTimeout(self.resizeHandler, 500), window.scrollTo(self.lastX, self.lastY), FWDUVPUtils.isIE || setTimeout(function () {
					window.scrollTo(self.lastX, self.lastY)
				}, 150), self.isMobile_bl && window.removeEventListener("touchmove", self.disableFullScreenOnMobileHandler), self.dispatchEvent(FWDUVPlayer.GO_NORMALSCREEN))
			}, this.onFullScreenChange = function (e) {
				document.fullScreen || document.msFullscreenElement || document.mozFullScreen || document.webkitIsFullScreen || document.msieFullScreen || (self.controller_do.showNormalScreenButton(), self.addMainDoToTheOriginalParent(), self.isFullScreen_bl = !1)
			}, this.loadPlaylist = function (e) {
				self.isAPIReady_bl && self.isPlaylistLoaded_bl && self.data.prevId != e && (self.catId = e, self.id = 0, self.catId < 0 ? self.catId = 0 : self.catId > self.data.totalPlaylists - 1 && (self.catId = self.data.totalPlaylists - 1), self.useDeepLinking_bl ? FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id) : self.loadInternalPlaylist())
			}, this.playNext = function () {
				self.isAPIReady_bl && self.isPlaylistLoaded_bl && (self.id++, self.id < 0 ? self.id = self.totalVideos - 1 : self.id > self.totalVideos - 1 && (self.id = 0), self.useDeepLinking_bl ? FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id) : (self.isThumbClick_bl = !0, self.updateAds(0, !0)))
			}, this.playPrev = function () {
				self.isAPIReady_bl && self.isPlaylistLoaded_bl && (self.id--, self.id < 0 ? self.id = self.totalVideos - 1 : self.id > self.totalVideos - 1 && (self.id = 0), self.useDeepLinking_bl ? FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id) : (self.isThumbClick_bl = !0, self.updateAds(0, !0)))
			}, this.playShuffle = function () {
				if (self.isAPIReady_bl && self.isPlaylistLoaded_bl) {
					for (var e = parseInt(Math.random() * self.totalVideos); e == self.id;) e = parseInt(Math.random() * self.totalVideos);
					self.id = e, self.id < 0 ? self.id = self.totalVideos - 1 : self.id > self.totalVideos - 1 && (self.id = 0), self.useDeepLinking_bl ? FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id) : (self.isThumbClick_bl = !0, self.updateAds(0, !0))
				}
			}, this.playVideo = function (e) {
				self.isAPIReady_bl && self.isPlaylistLoaded_bl && (self.id = e, self.id < 0 ? self.id = self.totalVideos - 1 : self.id > self.totalVideos - 1 && (self.id = 0), self.useDeepLinking_bl ? FWDAddress.setValue("?playlistId=" + self.catId + "&videoId=" + self.id) : (self.updateAds(0, !0), self.isMobile_bl && self.videoType_str == FWDUVPlayer.VIDEO && self.play(), self.isMobile_bl || self.play()))
			}, this.setVideoSource = function (e, t) {
				self.isAdd_bl = !1;
				self.setSource(e, !1, t)
			}, this.downloadVideo = function (e) {
				var t;
				null == e && (e = self.id);
				var o = self.data.playlist_ar[e].videoSource[self.data.playlist_ar[self.id].startAtVideo].source;
				t = -1 != o.indexOf("/") ? o.substr(o.lastIndexOf("/") + 1) : o, self.data.downloadVideo(o, t)
			}, this.share = function () {
				self.isAPIReady_bl && self.controllerShareHandler()
			}, this.getVideoSource = function () {
				if (self.isAPIReady_bl) return self.finalVideoPath_str
			}, this.getPosterSource = function () {
				if (self.isAPIReady_bl) return self.posterPath_str
			}, this.getPlaylistId = function () {
				return self.catId
			}, this.getVideoId = function () {
				return self.id
			}, this.getCurrentTime = function () {
				return self.curTime ? self.curTime : "00:00"
			}, this.setPlaybackRate = function (e) {
				self.isAPIReady_bl && (self.videoType_str == FWDUVPlayer.VIDEO && self.videoScreen_do ? self.videoScreen_do.setPlaybackRate(e) : self.videoType_str == FWDUVPlayer.YOUTUBE && self.ytb_do.setPlaybackRate(e))
			}, this.getTotalTime = function () {
				return self.totalTime ? self.totalTime : "00:00"
			}, this.fillEntireVideoScreen = function (e) {
				this.fillEntireVideoScreen_bl = e, this.resizeHandler()
			}, this.updateHEXColors = function (e, t) {
				self.isAPIReady_bl && (self.controller_do.updateHEXColors(e, t), self.largePlayButton_do && self.largePlayButton_do.updateHEXColors(e, "#FFFFFF"), self.shareWindow_do && self.shareWindow_do.updateHEXColors(e, t), self.embedWindow_do && (-1 != self.skinPath_str.indexOf("hex_white") ? self.embedWindow_do.updateHEXColors(e, "#FFFFFF") : self.embedWindow_do.updateHEXColors(e, t)), self.annotations_do && self.annotations_do.updateHEXColors(e, t), self.adsSkip_do && self.adsSkip_do.updateHEXColors(e, t), self.categories_do && self.categories_do.updateHEXColors(e, t), self.playlist_do && self.playlist_do.updateHEXColors(e, t), self.data.setYoutubePlaylistHEXColor(e), self.popupAds_do && self.popupAds_do.updateHEXColors(e, "#FFFFFF"), self.adsStart_do && self.adsStart_do.updateHEXColors(e, t))
			}, this.hideCursor = function () {
				document.documentElement.style.cursor = "none", document.getElementsByTagName("body")[0].style.cursor = "none", self.isAdd_bl || (self.dumyClick_do.getStyle().cursor = "none")
			}, this.showCursor = function () {
				self.dumyClick_do && (document.documentElement.style.cursor = "auto", document.getElementsByTagName("body")[0].style.cursor = "auto", self.isAdd_bl ? self.dumyClick_do.setButtonMode(!0) : self.dumyClick_do.getStyle().cursor = "auto")
			}, this.addListener = function (e, t) {
				if (null == e) throw Error("type is required.");
				if ("object" == typeof e) throw Error("type must be of type String.");
				if ("function" != typeof t) throw Error("listener must be of type Function.");
				var o = {};
				o.type = e, o.listener = t, o.target = this, this.listeners.events_ar.push(o)
			}, this.dispatchEvent = function (e, t) {
				if (null != this.listeners) {
					if (null == e) throw Error("type is required.");
					if ("object" == typeof e) throw Error("type must be of type String.");
					for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
						if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e) {
							if (t)
								for (var i in t) this.listeners.events_ar[o][i] = t[i];
							this.listeners.events_ar[o].listener.call(this, this.listeners.events_ar[o])
						}
				}
			}, this.removeListener = function (e, t) {
				if (null == e) throw Error("type is required.");
				if ("object" == typeof e) throw Error("type must be of type String.");
				if ("function" != typeof t) throw Error("listener must be of type Function." + e);
				for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
					if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e && this.listeners.events_ar[o].listener === t) {
						this.listeners.events_ar.splice(o, 1);
						break
					}
			}, self.cleanMainEvents = function () {
				window.removeEventListener ? window.removeEventListener("resize", self.onResizeHandler) : window.detachEvent && window.detachEvent("onresize", self.onResizeHandler), clearTimeout(self.resizeHandlerId_to), clearTimeout(self.resizeHandler2Id_to), clearTimeout(self.hidePreloaderId_to), clearTimeout(self.orientationChangeId_to)
			};
			var args = FWDUVPUtils.getUrlArgs(window.location.search),
				embedTest = args.RVPInstanceName,
				instanceName = args.RVPInstanceName;
			if (embedTest && (self.isEmbedded_bl = props.instanceName == instanceName), self.isEmbedded_bl) {
				var ws = FWDUVPUtils.getViewportSize();
				self.embeddedPlaylistId = parseInt(args.RVPPlaylistId), self.embeddedVideoId = parseInt(args.RVPVideoId);
				var dumy_do = new FWDUVPDisplayObject("div");
				dumy_do.setBkColor(props.backgroundColor), dumy_do.setWidth(ws.w), dumy_do.setHeight(ws.h), document.documentElement.style.overflow = "hidden", document.getElementsByTagName("body")[0].style.overflow = "hidden", FWDUVPUtils.isIEAndLessThen9 ? document.getElementsByTagName("body")[0].appendChild(dumy_do.screen) : document.documentElement.appendChild(dumy_do.screen)
			}
			self.init()
		},
		Raa, Saa, Taa, Uaa;
	FWDUVPlayer.setPrototype = function () {
		FWDUVPlayer.prototype = new FWDUVPEventDispatcher
	}, FWDUVPlayer.stopAllVideos = function (e) {
		for (var t, o = FWDUVPlayer.instaces_ar.length, s = 0; s < o; s++)(t = FWDUVPlayer.instaces_ar[s]) != e && t.stop()
	}, FWDUVPlayer.hasHTML5VideoTestIsDone = !1, FWDUVPlayer.hasHTML5VideoTestIsDone || (FWDUVPlayer.hasHTML5Video = (Raa = document.createElement("video"), Saa = !1, Raa.canPlayType && (Saa = Boolean("probably" == Raa.canPlayType("video/mp4") || "maybe" == Raa.canPlayType("video/mp4")), FWDUVPlayer.canPlayMp4 = Boolean("probably" == Raa.canPlayType("video/mp4") || "maybe" == Raa.canPlayType("video/mp4")), FWDUVPlayer.canPlayOgg = Boolean("probably" == Raa.canPlayType("video/ogg") || "maybe" == Raa.canPlayType("video/ogg")), FWDUVPlayer.canPlayWebm = Boolean("probably" == Raa.canPlayType("video/webm") || "maybe" == Raa.canPlayType("video/webm"))), !!self.isMobile_bl || (FWDUVPlayer.hasHTML5VideoTestIsDone = !0, Saa))), FWDUVPlayer.hasCanvas = Boolean(document.createElement("canvas")), FWDUVPlayer.instaces_ar = [], FWDUVPlayer.hasHTMLHLS = (Taa = document.createElement("video"), Uaa = !1, Taa.canPlayType && (Uaa = Boolean("probably" === Taa.canPlayType("application/vnd.apple.mpegurl") || "maybe" === Taa.canPlayType("application/vnd.apple.mpegurl"))), Uaa), FWDUVPlayer.areMainInstancesInitialized_bl = !1, FWDUVPlayer.curInstance = null, FWDUVPlayer.keyboardCurInstance = null, FWDUVPlayer.isYoutubeAPICreated_bl = !1, FWDUVPlayer.HLS_JS = "HLS", FWDUVPlayer.PAUSE_ALL_VIDEOS = "pause", FWDUVPlayer.STOP_ALL_VIDEOS = "stop", FWDUVPlayer.DO_NOTHING = "none", FWDUVPlayer.YOUTUBE = "youtube", FWDUVPlayer.VIMEO = "vimeo", FWDUVPlayer.VIDEO = "video", FWDUVPlayer.atLeastOnePlayerHasDeeplinking_bl = !1, FWDUVPlayer.MP3 = "mp3", FWDUVPlayer.START_TO_LOAD_PLAYLIST = "startToLoadPlaylist", FWDUVPlayer.LOAD_PLAYLIST_COMPLETE = "loadPlaylistComplete", FWDUVPlayer.READY = "ready", FWDUVPlayer.STOP = "stop", FWDUVPlayer.PLAY = "play", FWDUVPlayer.PAUSE = "pause", FWDUVPlayer.UPDATE = "update", FWDUVPlayer.UPDATE_TIME = "updateTime", FWDUVPlayer.UPDATE_VIDEO_SOURCE = "updateVideoSource", FWDUVPlayer.UPDATE_POSTER_SOURCE = "udpatePosterSource", FWDUVPlayer.ERROR = "error", FWDUVPlayer.PLAY_COMPLETE = "playComplete", FWDUVPlayer.VOLUME_SET = "volumeSet", FWDUVPlayer.GO_FULLSCREEN = "goFullScreen", FWDUVPlayer.GO_NORMALSCREEN = "goNormalScreen", FWDUVPlayer.IMAGE = "image", FWDUVPlayer.HLS_JS = "hls_flash", FWDUVPlayer.RESPONSIVE = "responsive", FWDUVPlayer.FULL_SCREEN = "fullscreen", window.FWDUVPlayer = FWDUVPlayer
}(window),
function (e) {
	var t = function (o, s, i, l) {
		var n = this;
		t.prototype;
		this.img_img = null, this.logoImage_do = null, this.position_str = i, this.source_str = s, this.logoLink_str = o.data.logoLink_str, this.margins = l, this.isShowed_bl = !0, this.allowToShow_bl = !0, this.init = function () {
			"none" == n.logoLink_str ? n.getStyle().pointerEvents = "none" : (n.setButtonMode(!0), n.screen.onclick = function () {
				e.open(n.logoLink_str, "_blank")
			}), n.logoImage_do = new FWDUVPDisplayObject("img"), n.img_img = new Image, n.img_img.onerror = null, n.img_img.onload = n.loadDone, n.img_img.src = n.source_str + "?" + (new Date).getTime(), n.hide()
		}, this.loadDone = function () {
			n.setWidth(n.img_img.width), n.setHeight(n.img_img.height), n.logoImage_do.setScreen(n.img_img), n.addChild(n.logoImage_do), n.logoImage_do.setWidth(n.img_img.width), n.logoImage_do.setHeight(n.img_img.height), n.positionAndResize()
		}, this.positionAndResize = function () {
			o.tempVidStageWidth && ("topleft" == n.position_str ? (n.finalX = n.margins, n.finalY = n.margins) : "topright" == n.position_str ? (n.finalX = o.tempVidStageWidth - n.w - n.margins, n.finalY = n.margins) : "bottomright" == n.position_str ? (n.finalX = o.tempVidStageWidth - n.w - n.margins, n.finalY = o.tempVidStageHeight - n.h - n.margins) : "bottomleft" == n.position_str && (n.finalX = n.margins, n.finalY = o.tempVidStageHeight - n.h - n.margins), n.setX(n.finalX), n.setY(n.finalY))
		}, this.show = function (e) {
			n.isShowed_bl || (n.isShowed_bl = !0, n.setVisible(!0), FWDAnimation.killTweensOf(n), e ? FWDAnimation.to(n, .8, {
				alpha: 1,
				ease: Expo.easeInOut
			}) : n.setAlpha(1))
		}, this.hide = function (e, t) {
			(n.isShowed_bl || t) && (n.isShowed_bl = !1, FWDAnimation.killTweensOf(n), e ? FWDAnimation.to(n, .8, {
				alpha: 0,
				ease: Expo.easeInOut,
				onComplete: function () {
					n.setVisible(!1)
				}
			}) : (n.setAlpha(0), n.setVisible(!1)))
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.prototype = null, e.FWDUVPLogo = t
}(window),
function (e) {
	var t = function (e, o) {
		var s = this;
		t.prototype;
		this.adHolder_do = null, this.mainHolder_do = null, this.closeButton_do = null, this.buttons_ar = [], this.maxWidth = e.aopwWidth, this.maxHeight = e.aopwHeight + e.popwColseN_img.height + 1, this.stageWidth = 0, this.stageHeight = 0, this.aopwSource = e.aopwSource, this.aopwTitle = e.aopwTitle, this.aopwTitleColor_str = e.aopwTitleColor_str, this.aopwBorderSize = e.aopwBorderSize, this.isShowed_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
			s.setBackfaceVisibility(), s.mainBar_do = new FWDUVPDisplayObject("div"), s.bar_do = new FWDUVPDisplayObject("div"), s.bar_do.getStyle().background = "url('" + e.popwBarBackgroundPath_str + "')", s.adHolder_do = new FWDUVPDisplayObject("div"), s.adBk_do = new FWDUVPDisplayObject("div"), s.adBk_do.getStyle().background = "url('" + e.popwWindowBackgroundPath_str + "')", FWDUVPSimpleButton.setPrototype(), s.closeButton_do = new FWDUVPSimpleButton(e.popwColseN_img, e.popwColseSPath_str, void 0, !0, e.useHEXColorsForSkin_bl, e.normalButtonsColor_str, e.selectedButtonsColor_str), s.closeButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.closeButtonOnMouseUpHandler), s.title_do = new FWDUVPDisplayObject("div"), s.title_do.getStyle().width = "100%", s.title_do.getStyle().textAlign = "left", s.title_do.getStyle().fontFamily = "Arial", s.title_do.getStyle().fontSize = "14px", s.title_do.getStyle().fontWeight = "100", s.title_do.getStyle().color = s.aopwTitleColor_str, s.title_do.setInnerHTML(s.aopwTitle), s.bar_do.addChild(s.title_do), s.addChild(s.adBk_do), s.mainBar_do.addChild(s.bar_do), s.mainBar_do.addChild(s.closeButton_do), s.mainBar_do.setHeight(s.closeButton_do.h), s.addChild(s.mainBar_do), s.addChild(s.adHolder_do), s.bar_do.setHeight(s.mainBar_do.h)
		}, this.closeButtonOnMouseUpHandler = function () {
			s.isShowed_bl && (s.hide(), o.play())
		}, this.positionAndResize = function () {
			s.stageWidth = Math.min(o.tempVidStageWidth, s.maxWidth), s.stageHeight = Math.min(o.tempVidStageHeight, s.maxHeight);
			var e = 1,
				t = o.tempVidStageWidth / s.maxWidth,
				i = o.tempVidStageHeight / s.maxHeight;
			t < i ? e = t : t > i && (e = i), e > 1 && (e = 1), s.stageWidth = e * s.maxWidth, s.stageHeight = e * s.maxHeight, s.setWidth(s.stageWidth), s.setHeight(s.stageHeight), s.setHeight(s.stageHeight), s.setX(Math.round((o.tempVidStageWidth - s.stageWidth) / 2)), s.setY(Math.round((o.tempVidStageHeight - s.stageHeight) / 2)), s.mainBar_do.setWidth(s.stageWidth), s.closeButton_do.setX(s.stageWidth - s.closeButton_do.w), s.bar_do.setWidth(s.stageWidth - s.closeButton_do.w - 1), s.adBk_do.setWidth(s.stageWidth), s.adBk_do.setHeight(s.stageHeight - s.mainBar_do.h - 1), s.adBk_do.setY(s.mainBar_do.h + 1), s.adHolder_do.setWidth(s.stageWidth - 2 * s.aopwBorderSize), s.adHolder_do.setX(s.aopwBorderSize), s.adHolder_do.setY(s.mainBar_do.h + s.aopwBorderSize + 1), s.adHolder_do.setHeight(s.stageHeight - s.mainBar_do.h - 2 * s.aopwBorderSize - 1)
		}, this.show = function (e) {
			s.isShowed_bl || (s.isShowed_bl = !0, e && (s.aopwSource = e), o.main_do.addChild(s), s.adHolder_do.setInnerHTML("<iframe width='100%' height='100%' scrolling='no' frameBorder='0' src=" + s.aopwSource + "></iframe>"), s.positionAndResize(), s.title_do.setX(8), s.title_do.setY(Math.round((s.bar_do.h - s.title_do.getHeight()) / 2)))
		}, this.showCompleteHandler = function () {}, this.hide = function () {
			s.isShowed_bl && (s.isShowed_bl = !1, o.main_do.contains(s) && o.main_do.removeChild(s))
		}, this.hideCompleteHandler = function () {
			o.main_do.removeChild(s), s.dispatchEvent(t.HIDE_COMPLETE)
		}, this.updateHEXColors = function (e, t) {
			s.closeButton_do.updateHEXColors(e, t)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.HIDE_COMPLETE = "hideComplete", t.prototype = null, e.FWDUVPOPWindow = t
}(window),
function (e) {
	var t = function (e, o) {
		var s = this;
		t.prototype;
		this.xhr = null, this.passColoseN_img = e.passColoseN_img, this.privateVideoPassword_str = e.privateVideoPassword_str, this.bk_do = null, this.mainHolder_do = null, this.passMainHolder_do = null, this.passMainHolderBk_do = null, this.passMainLabel_do = null, this.passLabel_do = null, this.passInput_do = null, this.closeButton_do = null, this.embedWindowBackground_str = e.embedWindowBackground_str, this.secondaryLabelsColor_str = e.secondaryLabelsColor_str, this.inputColor_str = e.inputColor_str, this.mainLabelsColor_str = e.mainLabelsColor_str, this.passButtonNPath_str = e.passButtonNPath_str, this.passButtonSPath_str = e.passButtonSPath_str, this.inputBackgroundColor_str = e.inputBackgroundColor_str, this.borderColor_str = e.borderColor_str, this.maxTextWidth = 0, this.totalWidth = 0, this.stageWidth = 0, this.stageHeight = 0, this.buttonWidth = 28, this.buttonHeight = 19, this.embedWindowCloseButtonMargins = e.embedWindowCloseButtonMargins, this.finalEmbedPath_str = null, this.isShowed_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
			s.setBackfaceVisibility(), s.mainHolder_do = new FWDUVPDisplayObject("div"), s.mainHolder_do.hasTransform3d_bl = !1, s.mainHolder_do.hasTransform2d_bl = !1, s.mainHolder_do.setBackfaceVisibility(), s.bk_do = new FWDUVPDisplayObject("div"), s.bk_do.getStyle().width = "100%", s.bk_do.getStyle().height = "100%", s.bk_do.setAlpha(.9), s.bk_do.getStyle().background = "url('" + s.embedWindowBackground_str + "')", s.passMainHolder_do = new FWDUVPDisplayObject("div"), s.passMainHolderBk_do = new FWDUVPDisplayObject("div"), s.passMainHolderBk_do.getStyle().background = "url('" + s.embedWindowBackground_str + "')", s.passMainHolderBk_do.getStyle().borderStyle = "solid", s.passMainHolderBk_do.getStyle().borderWidth = "1px", s.passMainHolderBk_do.getStyle().borderColor = s.borderColor_str, s.passMainLabel_do = new FWDUVPDisplayObject("div"), s.passMainLabel_do.setBackfaceVisibility(), s.passMainLabel_do.getStyle().fontFamily = "Arial", s.passMainLabel_do.getStyle().fontSize = "12px", s.passMainLabel_do.getStyle().color = s.mainLabelsColor_str, s.passMainLabel_do.getStyle().whiteSpace = "nowrap", s.passMainLabel_do.getStyle().fontSmoothing = "antialiased", s.passMainLabel_do.getStyle().webkitFontSmoothing = "antialiased", s.passMainLabel_do.getStyle().textRendering = "optimizeLegibility", s.passMainLabel_do.getStyle().padding = "0px", s.passMainLabel_do.setInnerHTML("PRIVATE VIDEO"), s.passLabel_do = new FWDUVPDisplayObject("div"), s.passLabel_do.setBackfaceVisibility(), s.passLabel_do.getStyle().fontFamily = "Arial", s.passLabel_do.getStyle().fontSize = "12px", s.passLabel_do.getStyle().color = s.secondaryLabelsColor_str, s.passLabel_do.getStyle().whiteSpace = "nowrap", s.passLabel_do.getStyle().fontSmoothing = "antialiased", s.passLabel_do.getStyle().webkitFontSmoothing = "antialiased", s.passLabel_do.getStyle().textRendering = "optimizeLegibility", s.passLabel_do.getStyle().padding = "0px", s.passLabel_do.setInnerHTML("Please enter password:"), s.passInput_do = new FWDUVPDisplayObject("input"), s.passInput_do.setBackfaceVisibility(), s.passInput_do.getStyle().fontFamily = "Arial", s.passInput_do.getStyle().fontSize = "12px", s.passInput_do.getStyle().backgroundColor = s.inputBackgroundColor_str, s.passInput_do.getStyle().color = s.inputColor_str, s.passInput_do.getStyle().outline = 0, s.passInput_do.getStyle().whiteSpace = "nowrap", s.passInput_do.getStyle().fontSmoothing = "antialiased", s.passInput_do.getStyle().webkitFontSmoothing = "antialiased", s.passInput_do.getStyle().textRendering = "optimizeLegibility", s.passInput_do.getStyle().padding = "6px", s.passInput_do.getStyle().paddingTop = "4px", s.passInput_do.getStyle().paddingBottom = "4px", s.passInput_do.screen.setAttribute("type", "password"), FWDUVPSimpleSizeButton.setPrototype(), s.passButton_do = new FWDUVPSimpleSizeButton(s.passButtonNPath_str, s.passButtonSPath_str, s.buttonWidth, s.buttonHeight, e.useHEXColorsForSkin_bl, e.normalButtonsColor_str, e.selectedButtonsColor_str), s.passButton_do.addListener(FWDUVPSimpleSizeButton.MOUSE_UP, s.passClickHandler), FWDUVPSimpleButton.setPrototype(), s.closeButton_do = new FWDUVPSimpleButton(s.passColoseN_img, e.embedWindowClosePathS_str, void 0, !0, e.useHEXColorsForSkin_bl, e.normalButtonsColor_str, e.selectedButtonsColor_str), s.closeButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, s.closeButtonOnMouseUpHandler), s.addChild(s.mainHolder_do), s.mainHolder_do.addChild(s.bk_do), s.passMainHolder_do.addChild(s.passMainHolderBk_do), s.passMainHolder_do.addChild(s.passMainLabel_do), s.passMainHolder_do.addChild(s.passLabel_do), s.passMainHolder_do.addChild(s.passInput_do), s.passMainHolder_do.addChild(s.passButton_do), s.mainHolder_do.addChild(s.passMainHolder_do), s.mainHolder_do.addChild(s.closeButton_do)
		}, this.closeButtonOnMouseUpHandler = function () {
			s.isShowed_bl && s.hide()
		}, this.positionAndResize = function () {
			s.stageWidth = o.stageWidth, s.stageHeight = o.stageHeight, s.maxTextWidth = Math.min(s.stageWidth - 150, 300), s.totalWidth = s.maxTextWidth + s.buttonWidth, s.positionFinal(), s.closeButton_do.setX(s.stageWidth - s.closeButton_do.w - s.embedWindowCloseButtonMargins), s.closeButton_do.setY(s.embedWindowCloseButtonMargins), s.setWidth(s.stageWidth), s.setHeight(s.stageHeight), s.mainHolder_do.setWidth(s.stageWidth), s.mainHolder_do.setHeight(s.stageHeight)
		}, this.positionFinal = function () {
			var e, t, o = s.passLabel_do.getHeight();
			t = s.passMainLabel_do.getHeight(), s.passMainLabel_do.setX(16), s.passLabel_do.setX(16), s.passLabel_do.setY(t + 14), s.passInput_do.setX(10), s.passInput_do.setWidth(parseInt(s.totalWidth - 40 - s.buttonWidth)), s.passInput_do.setY(s.passLabel_do.y + o + 5), s.passButton_do.setX(10 + s.passInput_do.w + 20), s.passButton_do.setY(s.passLabel_do.y + o + 6), s.passMainHolderBk_do.setY(s.passLabel_do.y - 9), s.passMainHolderBk_do.setWidth(s.totalWidth - 2), s.passMainHolderBk_do.setHeight(s.passButton_do.y + s.passButton_do.h - 9), s.passMainHolder_do.setWidth(s.totalWidth), s.passMainHolder_do.setHeight(s.passButton_do.y + s.passButton_do.h + 14), s.passMainHolder_do.setX(Math.round((s.stageWidth - s.totalWidth) / 2)), e = s.passMainHolderBk_do.getHeight(), s.passMainHolder_do.setY(Math.round((s.stageHeight - e) / 2) - 10)
		}, this.passClickHandler = function () {
			s.privateVideoPassword_str = e.privateVideoPassword_str, e.playlist_ar[o.id].privateVideoPassword_str && (s.privateVideoPassword_str = e.playlist_ar[o.id].privateVideoPassword_str), s.privateVideoPassword_str == FWDUVPUtils.MD5(s.passInput_do.screen.value) ? s.dispatchEvent(t.CORRECT) : FWDAnimation.isTweening(s.passInput_do.screen) || FWDAnimation.to(s.passInput_do.screen, .1, {
				css: {
					backgroundColor: "#FF0000"
				},
				yoyo: !0,
				repeat: 3
			})
		}, this.updateHEXColors = function (e, t) {
			s.passButton_do.updateHEXColors(e, t), s.closeButton_do.updateHEXColors(e, t)
		}, this.showInfo = function (e, t) {
			s.infoText_do.setInnerHTML(e), s.passMainHolder_do.addChild(s.infoText_do), s.infoText_do.setWidth(s.buttonWidth), s.infoText_do.setHeight(s.buttonHeight - 4), s.infoText_do.setX(s.passButton_do.x), s.infoText_do.setY(s.passButton_do.y - 23), s.infoText_do.setAlpha(0), s.infoText_do.getStyle().color = t ? "#FF0000" : s.mainLabelsColor_str, FWDAnimation.killTweensOf(s.infoText_do), FWDAnimation.to(s.infoText_do, .16, {
				alpha: 1,
				yoyo: !0,
				repeat: 7
			})
		}, this.show = function (e) {
			s.isShowed_bl || (s.isShowed_bl = !0, o.main_do.addChild(s), s.passButton_do.setSelectedState(), s.passInput_do.setInnerHTML(""), (!FWDUVPUtils.isMobile || FWDUVPUtils.isMobile && FWDUVPUtils.hasPointerEvent) && o.main_do.setSelectable(!0), s.positionAndResize(), clearTimeout(s.hideCompleteId_to), clearTimeout(s.showCompleteId_to), s.mainHolder_do.setY(-s.stageHeight), s.showCompleteId_to = setTimeout(s.showCompleteHandler, 900), setTimeout(function () {
				FWDAnimation.to(s.mainHolder_do, .8, {
					y: 0,
					delay: .1,
					ease: Expo.easeInOut
				})
			}, 100))
		}, this.showCompleteHandler = function () {}, this.hide = function () {
			s.isShowed_bl && (s.isShowed_bl = !1, o.customContextMenu_do && o.customContextMenu_do.enable(), s.positionAndResize(), clearTimeout(s.hideCompleteId_to), clearTimeout(s.showCompleteId_to), (!FWDUVPUtils.isMobile || FWDUVPUtils.isMobile && FWDUVPUtils.hasPointerEvent) && o.main_do.setSelectable(!1), s.hideCompleteId_to = setTimeout(s.hideCompleteHandler, 800), FWDAnimation.killTweensOf(s.mainHolder_do), FWDAnimation.to(s.mainHolder_do, .8, {
				y: -s.stageHeight,
				ease: Expo.easeInOut
			}))
		}, this.hideCompleteHandler = function () {
			o.main_do.removeChild(s), s.dispatchEvent(t.HIDE_COMPLETE)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.ERROR = "error", t.CORRECT = "correct", t.HIDE_COMPLETE = "hideComplete", t.prototype = null, e.FWDUVPPassword = t
}(window),
function (e) {
	var t = function (o, s) {
		var i = this;
		t.prototype;
		this.moveEvent = null, this.parent = o, this.data = s, this.image_img = null, this.prevN_img = s.prevN_img, this.nextN_img = s.nextN_img, this.replayN_img = s.replayN_img, this.shuffleN_img = s.shuffleN_img, this.scrBkTop_img = s.scrBkTop_img, this.scrDragTop_img = s.scrDragTop_img, this.scrLinesN_img = s.scrLinesN_img, this.playlist_ar = null, this.buttons_ar = [], this.thumbs_ar = null, this.playlistNameHolder_do = null, this.playlistName_do = null, this.scrMainHolder_do = null, this.scrTrack_do = null, this.scrTrackTop_do = null, this.scrTrackMiddle_do = null, this.scrTrackBottom_do = null, this.scrHandler_do = null, this.scrHandlerTop_do = null, this.scrHandlerMiddle_do = null, this.scrHandlerBottom_do = null, this.scrHandlerLines_do = null, this.scrHandlerLinesN_do = null, this.scrHandlerLinesS_do = null, this.mainHolder_do = null, this.mainThumbsHolder_do = null, this.controllBar_do = null, this.input_do = null, this.inputArrow_do = null, this.bk_do = null, this.thumbsHolder_do = null, this.nextButton_do = null, this.prevButton_do = null, this.toolTip_do = null, this.shuffleButton_do = null, this.loopButton_do = null, this.prevButtonToolTip_do = null, this.loopButtonToolTip_do = null, this.shuffleButtonToolTip_do = null, this.nextButtonToolTip_do = null, this.noSearchFound_do = null, i.useHEXColorsForSkin_bl = s.useHEXColorsForSkin_bl, i.normalButtonsColor_str = s.normalButtonsColor_str, i.selectedButtonsColor_str = s.selectedButtonsColor_str, this.bkPath_str = s.controllerBkPath_str, this.position_str = o.playlistPosition_str, this.playlistBackgroundColor_str = s.playlistBackgroundColor_str, this.inputBackgroundColor_str = s.searchInputBackgroundColor_str, this.inputColor_str = s.searchInputColor_str, this.prevInputValue_str = "none", this.scrWidth = i.scrBkTop_img.width, this.mouseX = 0, this.mouseY = 0, this.catId = -1, this.dif = 0, this.countLoadedThumbs = 0, this.curId = -1, this.finalX = 0, this.finalY = 0, this.controlBarHeight = s.controllerHeight, this.totalThumbs = 0, this.totalWidth = o.playlistWidth, this.totalHeight = o.playlistHeight, this.thumbImageW = s.thumbnailWidth, this.thumbImageH = s.thumbnailHeight, this.thumbInPadding = 2, this.spaceBetweenThumbnails = s.spaceBetweenThumbnails, this.startSpaceBetweenButtons = s.startSpaceBetweenButtons, this.spaceBetweenButtons = s.spaceBetweenButtons, this.totalButtons = 0, this.buttonsToolTipHideDelay = s.buttonsToolTipHideDelay, this.removeFromThumbsHolderHeight = 0, this.totalThumbsHeight = 0, this.scrollBarHandlerFinalY = 0, this.stageWidth = i.totalWidth, this.stageHeight = i.totalHeight, this.scrollbarOffestWidth = s.scrollbarOffestWidth, this.lastThumbnailFinalY = -1, this.thumbnailsFinalY = 0, this.scollbarSpeedSensitivity = s.scollbarSpeedSensitivity, this.vy = 0, this.vy2 = 0, this.friction = .9, this.loadWithDelayId_to, this.showToolTipId_to, this.disableThumbsId_to, this.disableMouseWheelId_to, this.thumbnailsAnimDoneId_to, this.disableForAWhileAfterThumbClickId_to, this.updateMobileScrollBarId_int, this.showThumbnail_bl = s.showThumbnail_bl, this.disableForAWhileAfterThumbClick_bl = !1, this.showPlaylistName_bl = s.showPlaylistName_bl, this.isShowNothingFound_bl = !1, this.hasInputFocus_bl = !1, this.showController_bl = s.showSearchInput_bl || s.showNextAndPrevButtons_bl || s.showLoopButton_bl || s.showShuffleButton_bl, this.loop_bl = s.loop_bl, this.shuffle_bl = s.shuffle_bl, this.showSearchInput_bl = s.showSearchInput_bl, this.allowToScrollAndScrollBarIsActive_bl = !0, this.showPlaylistToolTips_bl = s.showPlaylistToolTips_bl, this.hasPlaylist_bl = !1, this.showPlaylistByDefault_bl = s.showPlaylistByDefault_bl, this.repeatBackground_bl = s.repeatBackground_bl, this.addMouseWheelSupport_bl = s.addMouseWheelSupport_bl, this.showNextAndPrevButtons_bl = s.showNextAndPrevButtons_bl, this.showShuffleButton_bl = s.showShuffleButton_bl, this.showLoopButton_bl = s.showLoopButton_bl, this.showButtonsToolTip_bl = s.showButtonsToolTip_bl, this.isShowed_bl = !0, this.allowToSwipe_bl = !1, this.disableThumbs_bl = !1, this.disableMouseWheel_bl = !1, this.usePlaylistsSelectBox_bl = s.usePlaylistsSelectBox_bl, this.isMobile_bl = FWDUVPUtils.isMobile, this.isDragging_bl = !1, this.isSearched_bl = !1, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.init = function () {
			if (i.mainHolder_do = new FWDUVPDisplayObject("div"), i.mainHolder_do.setBkColor(i.playlistBackgroundColor_str), i.mainThumbsHolder_do = new FWDUVPDisplayObject("div"), i.thumbsHolder_do = new FWDUVPDisplayObject("div"), i.thumbsHolder_do.setOverflow("visible"), i.mainThumbsHolder_do.addChild(i.thumbsHolder_do), i.mainHolder_do.addChild(i.mainThumbsHolder_do), i.addChild(i.mainHolder_do), i.showController_bl) {
				if (i.controllBar_do = new FWDUVPDisplayObject("div"), i.repeatBackground_bl) i.controllerBk_do = new FWDUVPDisplayObject("div"), i.controllerBk_do.getStyle().background = "url('" + i.bkPath_str + "')";
				else {
					i.controllerBk_do = new FWDUVPDisplayObject("img");
					var e = new Image;
					e.src = i.bkPath_str, i.controllerBk_do.setScreen(e)
				}
				i.controllerBk_do.setHeight(i.controlBarHeight), i.controllerBk_do.getStyle().width = "100%", i.controllBar_do.addChild(i.controllerBk_do), i.controllBar_do.setHeight(i.controlBarHeight), i.mainHolder_do.addChild(i.controllBar_do)
			}
			i.showShuffleButton_bl && i.setupShuffleButton(), i.showLoopButton_bl && i.setupLoopButton(), i.showNextAndPrevButtons_bl && (i.setupPrevButton(), i.setupNextButton()), i.showButtonsToolTip_bl && i.setupToolTips(), i.totalButtons = i.buttons_ar.length, i.showSearchInput_bl && i.showController_bl && i.setupInput(), i.showController_bl && (i.removeFromThumbsHolderHeight = i.controllBar_do.h + i.spaceBetweenThumbnails), i.setupMobileScrollbar(), i.isMobile_bl || i.setupScrollbar(), i.addMouseWheelSupport_bl && i.addMouseWheelSupport(), i.showPlaylistName_bl && (i.setupPlaylistName(), i.removeFromThumbsHolderHeight += i.controlBarHeight + i.spaceBetweenThumbnails, i.mainThumbsHolder_do.setY(i.controlBarHeight + i.spaceBetweenThumbnails), i.scrMainHolder_do && i.scrMainHolder_do.setY(i.mainThumbsHolder_do.y)), i.showPlaylistByDefault_bl ? i.hideAndShow() : i.hide()
		}, this.resizeAndPosition = function (e) {
			o.stageWidth && ("bottom" == i.position_str ? (i.stageWidth = o.stageWidth, i.stageHeight = o.playlistHeight, i.finalX = 0, i.finalY = o.tempVidStageHeight + o.spaceBetweenControllerAndPlaylist) : (i.stageWidth = i.totalWidth, i.stageHeight = o.stageHeight, i.finalX = o.stageWidth - i.totalWidth, i.finalY = 0), i.comboBox_do && i.comboBox_do.resizeAndPosition(), i.bk_do && (i.bk_do.setWidth(i.stageWidth), i.bk_do.setHeight(i.stageHeight)), i.positionThumbs(e), i.allowToScrollAndScrollBarIsActive_bl && i.scrMainHolder_do ? i.mainThumbsHolder_do.setWidth(i.stageWidth - i.scrollbarOffestWidth) : i.mainThumbsHolder_do.setWidth(i.stageWidth), i.mainThumbsHolder_do.setHeight(i.stageHeight - i.removeFromThumbsHolderHeight), i.scrHandler_do && i.updateScrollBarSizeActiveAndDeactivate(), i.controllBar_do && i.positionControllBar(), i.updateScrollBarHandlerAndContent(e), i.setX(i.finalX), i.setY(i.finalY), i.mainHolder_do.setWidth(i.stageWidth), i.mainHolder_do.setHeight(i.stageHeight))
		}, this.updatePlaylist = function (e, t, o, s) {
			i.catId != t && (clearTimeout(i.populateNextItemId_to), i.hasPlaylist_bl = !0, i.catId = t, i.curId = o, i.playlist_ar = e, i.countLoadedThumbs = 0, i.allowToScrollAndScrollBarIsActive_bl = !1, i.input_do && (i.hasInputFocus_bl = !1, i.input_do.screen.value = "search for video"), i.setupThumbnails(), i.updatePlaylistName(s), i.showThumbnail_bl && i.loadImages(), i.comboBox_do && i.comboBox_do.setButtonsStateBasedOnId(i.catId), FWDAnimation.to(i.mainHolder_do, .8, {
				x: 0,
				y: 0,
				ease: Expo.easeInOut
			}), i.resizeAndPosition(), i.scrHandler_do && (i.updateScrollBarSizeActiveAndDeactivate(), i.updateScrollBarHandlerAndContent(!1, !0)), e[0] && "..." == e[0].titleText && i.loadId3())
		}, this.loadId3 = function () {
			clearTimeout(i.populateNextItemId_to);
			for (var e = 0; e < i.totalPlayListItems; e++)
				if ("..." != i.playlist_ar[e].title) return void(i.countID3 = 2001);
			i.countID3 = 0, i.countVideo = 1, i.loadID3AndPopulate()
		}, this.loadID3AndPopulate = function () {
			if (i.thumbs_ar && i.playlist_ar[i.countID3]) {
				var e, t = "",
					o = i.thumbs_ar[i.countID3],
					l = i.playlist_ar[i.countID3].videoSource[0].source + "?rand=" + parseInt(99999999 * Math.random()),
					n = i.playlist_ar[i.countID3];
				if (-1 != l.toLowerCase().indexOf(".mp4")) e = i.countVideo < 10 ? "0" + i.countVideo : i.countVideo, i.countVideo++, o.titleText = "Video " + e, o.titleText_str = "<p style='color:" + i.data.youtubeAndFolderVideoTitleColor_str + ";margin:0px;padding:0px;margin-top:2px;margin-bottom:4x;line-height:16px;'>Video " + e + "</p>", i.playlist_ar[i.countID3].titleText = o.titleText, i.playlist_ar[i.countID3].title = o.title, o.updateText(o.titleText_str);
				else ID3.loadTags(l, function () {
					if (i.countID3 > i.playlist_ar.length || 2001 == i.countID3) clearTimeout(i.populateNextItemId_to);
					else {
						var e = ID3.getAllTags(l);
						e.artist && (n.titleText_str = e.artist, s.showTracksNumbers_bl ? (i.countTrack < 9 && (t = "0"), t = t + (i.countTrack + 1) + ". ", n.title = t + n.titleText_str) : n.title = n.titleText_str, i.countTrack++), o.title_str = n.title, o.titleText_str = "<p style='color:" + i.data.youtubeAndFolderVideoTitleColor_str + ";margin:0px;padding:0px;margin-top:2px;margin-bottom:0x;line-height:16px;'>" + n.titleText_str + "</p><p style='color:" + i.data.folderAudioSecondTitleColor_str + ";margin:0px;padding:0px;margin-top:2px;margin-bottom:0x;line-height:16px;'>" + e.title + "</p>", o.updateText(o.titleText_str)
					}
				});
				i.populateNextItemId_to = setTimeout(i.loadID3AndPopulate, 150), i.countID3++
			}
		}, this.destroyPlaylist = function () {
			if (i.thumbs_ar) {
				var e;
				i.hasPlaylist_bl = !1, i.image_img.onerror = null, i.image_img.onload = null, FWDAnimation.killTweensOf(i.mainHolder_do), "bottom" == i.position_str ? i.mainHolder_do.setY(-i.stageHeight - 5) : i.mainHolder_do.setX(-i.stageWidth - 5), clearTimeout(i.loadWithDelayId_to);
				for (var t = 0; t < i.totalThumbs; t++) e = i.thumbs_ar[t], i.thumbsHolder_do.removeChild(e), e.destroy();
				i.thumbs_ar = null
			}
		}, this.setupcomboBox = function () {
			i.labels_ar = [];
			for (var e = 0; e < s.cats_ar.length; e++) i.labels_ar[e] = s.cats_ar[e].playlistName;
			var t = {
				categories_ar: i.labels_ar,
				selectorLabel: i.labels_ar[0],
				selectorBackgroundNormalColor: s.mainSelectorBackgroundSelectedColor,
				selectorTextNormalColor: s.mainSelectorTextNormalColor,
				selectorTextSelectedColor: s.mainSelectorTextSelectedColor,
				buttonBackgroundNormalColor: s.mainButtonBackgroundNormalColor,
				buttonBackgroundSelectedColor: s.mainButtonBackgroundSelectedColor,
				buttonTextNormalColor: s.mainButtonTextNormalColor,
				buttonTextSelectedColor: s.mainButtonTextSelectedColor,
				buttonHeight: i.controlBarHeight,
				arrowN_str: s.arrowN_str,
				arrowS_str: s.arrowS_str,
				arrowW: 11,
				arrowH: 6
			};
			FWDUVPComboBox.setPrototype(), i.comboBox_do = new FWDUVPComboBox(i, t), i.comboBox_do.addListener(FWDUVPComboBox.BUTTON_PRESSED, i.changePlaylistOnClick), i.mainHolder_do.addChild(i.comboBox_do)
		}, i.changePlaylistOnClick = function (e) {
			i.dispatchEvent(t.CHANGE_PLAYLIST, {
				id: e.id
			})
		}, this.setupPlaylistName = function () {
			if (i.playlistNameHolder_do = new FWDUVPDisplayObject("div"), i.playlistNameHolder_do.setHeight(i.controlBarHeight), i.playlistNameHolder_do.getStyle().width = "100%", i.repeatBackground_bl) i.playlistNameBk_do = new FWDUVPDisplayObject("div"), i.playlistNameBk_do.getStyle().background = "url('" + i.bkPath_str + "')";
			else {
				i.playlistNameBk_do = new FWDUVPDisplayObject("img");
				var e = new Image;
				e.src = i.bkPath_str, i.playlistNameBk_do.setScreen(e)
			}
			i.playlistNameBk_do.getStyle().width = "100%", i.playlistNameBk_do.getStyle().height = "100%", i.playlistName_do = new FWDUVPDisplayObject("div"), i.playlistName_do.getStyle().width = "100%", i.playlistName_do.getStyle().textAlign = "center", i.playlistName_do.getStyle().fontSmoothing = "antialiased", i.playlistName_do.getStyle().webkitFontSmoothing = "antialiased", i.playlistName_do.getStyle().textRendering = "optimizeLegibility", i.playlistName_do.getStyle().fontFamily = "Arial", i.playlistName_do.getStyle().fontSize = "14px", i.playlistName_do.getStyle().color = s.playlistNameColor_str, i.playlistNameHolder_do.addChild(i.playlistNameBk_do), i.usePlaylistsSelectBox_bl || i.playlistNameHolder_do.addChild(i.playlistName_do), i.mainHolder_do.addChild(i.playlistNameHolder_do), i.usePlaylistsSelectBox_bl && i.setupcomboBox()
		}, this.updatePlaylistName = function (e) {
			i.playlistName_do && (i.playlistName_do.setInnerHTML(e), setTimeout(function () {
				i.playlistName_do.setY(parseInt((i.playlistNameHolder_do.h - i.playlistName_do.getHeight()) / 2) + 1)
			}, 50))
		}, this.setupInput = function () {
			i.input_do = new FWDUVPDisplayObject("input"), i.input_do.screen.maxLength = 20, i.input_do.getStyle().textAlign = "left", i.input_do.getStyle().outline = "none", i.input_do.getStyle().boxShadow = "none", i.input_do.getStyle().fontSmoothing = "antialiased", i.input_do.getStyle().webkitFontSmoothing = "antialiased", i.input_do.getStyle().textRendering = "optimizeLegibility", i.input_do.getStyle().fontFamily = "Arial", i.input_do.getStyle().fontSize = "12px", i.input_do.getStyle().padding = "6px", FWDUVPUtils.isIEAndLessThen9 || (i.input_do.getStyle().paddingRight = "-6px"), i.input_do.getStyle().paddingTop = "2px", i.input_do.getStyle().paddingBottom = "3px", i.input_do.getStyle().backgroundColor = i.inputBackgroundColor_str, i.input_do.getStyle().color = i.inputColor_str, i.input_do.screen.value = "search for video", i.noSearchFound_do = new FWDUVPDisplayObject("div"), i.noSearchFound_do.setX(0), i.noSearchFound_do.getStyle().textAlign = "center", i.noSearchFound_do.getStyle().width = "100%", i.noSearchFound_do.getStyle().fontSmoothing = "antialiased", i.noSearchFound_do.getStyle().webkitFontSmoothing = "antialiased", i.noSearchFound_do.getStyle().textRendering = "optimizeLegibility", i.noSearchFound_do.getStyle().fontFamily = "Arial", i.noSearchFound_do.getStyle().fontSize = "12px", i.noSearchFound_do.getStyle().color = i.inputColor_str, i.noSearchFound_do.setInnerHTML("NOTHING FOUND!"), i.noSearchFound_do.setVisible(!1), i.mainHolder_do.addChild(i.noSearchFound_do), i.hasPointerEvent_bl ? i.input_do.screen.addEventListener("pointerdown", i.inputFocusInHandler) : i.input_do.screen.addEventListener && (i.input_do.screen.addEventListener("mousedown", i.inputFocusInHandler), i.input_do.screen.addEventListener("touchstart", i.inputFocusInHandler)), i.input_do.screen.addEventListener("keyup", i.keyUpHandler);
			var e = new Image;
			e.src = s.inputArrowPath_str, i.inputArrow_do = new FWDUVPDisplayObject("img"), i.inputArrow_do.setScreen(e), i.inputArrow_do.setWidth(9), i.inputArrow_do.setHeight(10), i.controllBar_do.addChild(i.inputArrow_do), i.controllBar_do.addChild(i.input_do)
		}, this.inputFocusInHandler = function () {
			i.hasInputFocus_bl || (i.hasInputFocus_bl = !0, "search for video" == i.input_do.screen.value && (i.input_do.screen.value = ""), i.input_do.screen.focus(), setTimeout(function () {
				i.hasPointerEvent_bl ? e.addEventListener("pointerdown", i.inputFocusOutHandler) : e.addEventListener && (e.addEventListener("mousedown", i.inputFocusOutHandler), e.addEventListener("touchstart", i.inputFocusOutHandler))
			}, 50))
		}, this.inputFocusOutHandler = function (t) {
			if (i.hasInputFocus_bl) {
				var o = FWDUVPUtils.getViewportMouseCoordinates(t);
				return FWDUVPUtils.hitTest(i.input_do.screen, o.screenX, o.screenY) ? void 0 : (i.hasInputFocus_bl = !1, void("" == i.input_do.screen.value && (i.input_do.screen.value = "search for video", i.hasPointerEvent_bl ? e.removeEventListener("pointerdown", i.inputFocusOutHandler) : e.removeEventListener && (e.removeEventListener("mousedown", i.inputFocusOutHandler), e.removeEventListener("touchstart", i.inputFocusOutHandler)))))
			}
		}, this.keyUpHandler = function (e) {
			e.stopPropagation && e.stopPropagation(), i.prevInputValue_str != i.input_do.screen.value && (i.isMobile_bl ? (i.positionThumbs(!1), i.thumbnailsFinalY = -1 * Math.round(i.curId / (i.totalThumbs - 1) * (i.totalThumbsHeight - i.mainThumbsHolder_do.h))) : i.positionThumbs(!0)), i.prevInputValue_str = i.input_do.screen.value, i.scrHandler_do && (i.updateScrollBarSizeActiveAndDeactivate(), i.updateScrollBarHandlerAndContent(!0, !0))
		}, this.showNothingFound = function () {
			i.isShowNothingFound_bl || (i.isShowNothingFound_bl = !0, i.noSearchFound_do.setVisible(!0), i.noSearchFound_do.setY(parseInt((i.stageHeight - i.noSearchFound_do.getHeight()) / 2)), i.noSearchFound_do.setAlpha(0), FWDAnimation.to(i.noSearchFound_do, .1, {
				alpha: 1,
				yoyo: !0,
				repeat: 4
			}))
		}, this.hideNothingFound = function () {
			i.isShowNothingFound_bl && (i.isShowNothingFound_bl = !1, FWDAnimation.killTweensOf(i.noSearchFound_do), i.noSearchFound_do.setVisible(!1))
		}, this.positionControllBar = function () {
			var e, t, o;
			if (i.input_do && i.stageWidth <= 340) {
				e = i.stageWidth - 2 * i.startSpaceBetweenButtons - i.inputArrow_do.w - i.spaceBetweenButtons, i.nextButton_do && (e -= i.nextButton_do.w + i.spaceBetweenButtons), i.prevButton_do && (e -= i.prevButton_do.w + i.spaceBetweenButtons), i.shuffleButton_do && (e -= i.shuffleButton_do.w + i.spaceBetweenButtons), i.loopButton_do && (e -= i.loopButton_do.w + i.spaceBetweenButtons);
				for (var s = 0; s < i.totalButtons; s++) t = i.buttons_ar[i.totalButtons - 1 - s], o = i.buttons_ar[i.totalButtons - s], 0 == s ? t.setX(i.stageWidth - t.w - i.startSpaceBetweenButtons) : t.setX(o.x - o.w - i.spaceBetweenButtons), t.setY(parseInt((i.controllBar_do.h - t.h) / 2))
			} else if (i.input_do && i.stageWidth > 340) {
				(e = i.stageWidth - 2 * i.startSpaceBetweenButtons - i.inputArrow_do.w - 12) > 350 && (e = 350), i.nextButton_do && (e -= i.nextButton_do.w + i.spaceBetweenButtons), i.prevButton_do && (e -= i.prevButton_do.w + i.spaceBetweenButtons), i.shuffleButton_do && (e -= i.shuffleButton_do.w + i.spaceBetweenButtons), i.loopButton_do && (e -= i.loopButton_do.w + i.spaceBetweenButtons);
				for (s = 0; s < i.totalButtons; s++) t = i.buttons_ar[i.totalButtons - 1 - s], o = i.buttons_ar[i.totalButtons - s], 0 == s ? t.setX(i.stageWidth - t.w - i.startSpaceBetweenButtons) : t.setX(o.x - o.w - i.spaceBetweenButtons), t.setY(parseInt((i.controllBar_do.h - t.h) / 2))
			} else i.shuffleButton_do ? (i.shuffleButton_do.setX(i.spaceBetweenButtons), i.shuffleButton_do.setY(parseInt((i.controllBar_do.h - i.shuffleButton_do.h) / 2)), i.loopButton_do && (i.loopButton_do.setX(i.shuffleButton_do.x + i.shuffleButton_do.w + i.spaceBetweenButtons), i.loopButton_do.setY(parseInt((i.controllBar_do.h - i.shuffleButton_do.h) / 2)))) : i.loopButton_do && (i.loopButton_do.setX(i.spaceBetweenButtons), i.loopButton_do.setY(parseInt((i.controllBar_do.h - i.loopButton_do.h) / 2))), i.nextButton_do && (i.nextButton_do.setX(i.stageWidth - i.nextButton_do.w - i.startSpaceBetweenButtons), i.nextButton_do.setY(parseInt((i.controllBar_do.h - i.nextButton_do.h) / 2)), i.prevButton_do.setX(i.nextButton_do.x - i.nextButton_do.w - i.spaceBetweenButtons), i.prevButton_do.setY(parseInt((i.controllBar_do.h - i.prevButton_do.h) / 2)));
			i.input_do && (i.input_do.setWidth(e), i.input_do.setX(i.startSpaceBetweenButtons), i.input_do.setY(parseInt((i.controllBar_do.h - i.input_do.getHeight()) / 2) + 1), i.inputArrow_do.setX(parseInt(i.input_do.x + i.input_do.getWidth()) + 1), i.inputArrow_do.setY(parseInt((i.controllBar_do.h - i.inputArrow_do.h) / 2) + 1)), i.controllBar_do.setWidth(i.stageWidth), i.controllBar_do.setY(i.stageHeight - i.controllBar_do.h)
		}, this.setupPrevButton = function () {
			FWDUVPSimpleButton.setPrototype(), i.prevButton_do = new FWDUVPSimpleButton(i.prevN_img, s.prevSPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), i.prevButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, i.prevButtonShowTooltipHandler), i.prevButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.prevButtonOnMouseUpHandler), i.buttons_ar.push(i.prevButton_do), i.controllBar_do.addChild(i.prevButton_do)
		}, this.prevButtonShowTooltipHandler = function (e) {
			i.showToolTip(i.prevButton_do, i.prevButtonToolTip_do, e.e)
		}, this.prevButtonOnMouseUpHandler = function () {
			i.dispatchEvent(t.PLAY_PREV_VIDEO)
		}, this.setupNextButton = function () {
			FWDUVPSimpleButton.setPrototype(), i.nextButton_do = new FWDUVPSimpleButton(i.nextN_img, s.nextSPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), i.nextButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, i.nextButtonShowTooltipHandler), i.nextButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.nextButtonOnMouseUpHandler), i.buttons_ar.push(i.nextButton_do), i.controllBar_do.addChild(i.nextButton_do)
		}, this.nextButtonShowTooltipHandler = function (e) {
			i.showToolTip(i.nextButton_do, i.nextButtonToolTip_do, e.e)
		}, this.nextButtonOnMouseUpHandler = function () {
			i.dispatchEvent(t.PLAY_NEXT_VIDEO)
		}, this.setupShuffleButton = function () {
			FWDUVPSimpleButton.setPrototype(), i.shuffleButton_do = new FWDUVPSimpleButton(i.shuffleN_img, s.shufflePathS_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), i.shuffleButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, i.shuffleButtonShowToolTipHandler), i.shuffleButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.shuffleButtonOnMouseUpHandler), i.buttons_ar.push(i.shuffleButton_do), i.controllBar_do.addChild(i.shuffleButton_do), !i.loop_bl && i.shuffle_bl && i.setShuffleButtonState("selected")
		}, this.shuffleButtonShowToolTipHandler = function (e) {
			i.showToolTip(i.shuffleButton_do, i.shuffleButtonToolTip_do, e.e)
		}, this.shuffleButtonOnMouseUpHandler = function () {
			i.shuffleButton_do.isSelectedFinal_bl ? i.dispatchEvent(t.DISABLE_SHUFFLE) : i.dispatchEvent(t.ENABLE_SHUFFLE)
		}, this.setShuffleButtonState = function (e) {
			i.shuffleButton_do && ("selected" == e ? i.shuffleButton_do.setSelected() : "unselected" == e && i.shuffleButton_do.setUnselected())
		}, this.setupLoopButton = function () {
			FWDUVPSimpleButton.setPrototype(), i.loopButton_do = new FWDUVPSimpleButton(i.replayN_img, s.replaySPath_str, void 0, !0, s.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), i.loopButton_do.addListener(FWDUVPSimpleButton.SHOW_TOOLTIP, i.loopButtonShowTooltipHandler), i.loopButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.loopButtonOnMouseUpHandler), i.buttons_ar.push(i.loopButton_do), i.controllBar_do.addChild(i.loopButton_do), i.loop_bl && i.setLoopStateButton("selected")
		}, this.loopButtonShowTooltipHandler = function (e) {
			i.showToolTip(i.loopButton_do, i.loopButtonToolTip_do, e.e)
		}, this.loopButtonOnMouseUpHandler = function () {
			i.loopButton_do.isSelectedFinal_bl ? i.dispatchEvent(t.DISABLE_LOOP) : i.dispatchEvent(t.ENABLE_LOOP)
		}, this.setLoopStateButton = function (e) {
			i.loopButton_do && ("selected" == e ? i.loopButton_do.setSelected() : "unselected" == e && i.loopButton_do.setUnselected())
		}, this.setupToolTips = function () {
			i.showNextAndPrevButtons_bl && (FWDUVPToolTip.setPrototype(), i.prevButtonToolTip_do = new FWDUVPToolTip(i.prevButton_do, s.toopTipBk_str, s.toopTipPointer_str, "previous video", i.buttonsToolTipFontColor_str, i.buttonsToolTipHideDelay), document.documentElement.appendChild(i.prevButtonToolTip_do.screen), FWDUVPToolTip.setPrototype(), i.nextButtonToolTip_do = new FWDUVPToolTip(i.nextButton_do, s.toopTipBk_str, s.toopTipPointer_str, "next video", i.buttonsToolTipFontColor_str, i.buttonsToolTipHideDelay), document.documentElement.appendChild(i.nextButtonToolTip_do.screen)), i.showShuffleButton_bl && (FWDUVPToolTip.setPrototype(), i.shuffleButtonToolTip_do = new FWDUVPToolTip(i.shuffleButton_do, s.toopTipBk_str, s.toopTipPointer_str, "shuffle", i.buttonsToolTipFontColor_str, i.buttonsToolTipHideDelay), document.documentElement.appendChild(i.shuffleButtonToolTip_do.screen)), i.showLoopButton_bl && (FWDUVPToolTip.setPrototype(), i.loopButtonToolTip_do = new FWDUVPToolTip(i.loopButton_do, s.toopTipBk_str, s.toopTipPointer_str, "loop", i.buttonsToolTipFontColor_str, i.buttonsToolTipHideDelay), document.documentElement.appendChild(i.loopButtonToolTip_do.screen))
		}, this.showToolTip = function (e, t, o) {
			if (i.showButtonsToolTip_bl) {
				var s, l, n = FWDUVPUtils.getViewportSize();
				FWDUVPUtils.getViewportMouseCoordinates(o);
				e.screen.offsetWidth < 3 ? (s = parseInt(100 * e.getGlobalX() + e.w / 2 - t.w / 2), l = parseInt(100 * e.getGlobalY() - t.h - 8)) : (s = parseInt(e.getGlobalX() + e.w / 2 - t.w / 2), l = parseInt(e.getGlobalY() - t.h - 8));
				var r = 0;
				s < 0 ? (r = s, s = 0) : s + t.w > n.w && (s += -1 * (r = -1 * (n.w - (s + t.w)))), t.positionPointer(r, !1), t.setX(s), t.setY(l), t.show()
			}
		}, this.setupThumbnails = function () {
			var e;
			i.totalThumbs = i.playlist_ar.length, i.thumbs_ar = [];
			for (var t = 0; t < i.totalThumbs; t++) FWDUVPPlaylistThumb.setPrototype(), e = new FWDUVPPlaylistThumb(i, t, s.playlistThumbnailsBkPath_str, s.thumbnailNormalBackgroundColor_str, s.thumbnailHoverBackgroundColor_str, s.thumbnailDisabledBackgroundColor_str, i.thumbImageW, i.thumbImageH, i.thumbInPadding, i.playlist_ar[t].title, i.playlist_ar[t].titleText, i.showThumbnail_bl), i.thumbs_ar[t] = e, e.addListener(FWDUVPPlaylistThumb.MOUSE_UP, i.thumbMouseUpHandler), i.thumbsHolder_do.addChild(e)
		}, this.thumbMouseUpHandler = function (e) {
			i.disableThumbs_bl || (i.disableForAWhileAfterThumbClick_bl = !0, clearTimeout(i.disableForAWhileAfterThumbClickId_to), i.disableForAWhileAfterThumbClickId_to = setTimeout(function () {
				i.disableForAWhileAfterThumbClick_bl = !1
			}, 50), i.dispatchEvent(t.THUMB_MOUSE_UP, {
				id: e.id
			}))
		}, this.loadImages = function () {
			i.playlist_ar[i.countLoadedThumbs] && (i.image_img && (i.image_img.onload = null, i.image_img.onerror = null), i.image_img = new Image, i.image_img.onerror = i.onImageLoadError, i.image_img.onload = i.onImageLoadComplete, i.image_img.src = i.playlist_ar[i.countLoadedThumbs].thumbSource)
		}, this.onImageLoadError = function (e) {}, this.onImageLoadComplete = function (e) {
			i.thumbs_ar[i.countLoadedThumbs].setImage(i.image_img), i.countLoadedThumbs++, i.loadWithDelayId_to = setTimeout(i.loadImages, 40)
		}, this.checkThumbsState = function () {
			if (i.thumbs_ar)
				for (var e, t = 0; t < i.totalThumbs; t++) e = i.thumbs_ar[t], t == i.curId ? e.disable() : e.enable()
		}, this.positionThumbs = function (e) {
			if (i.thumbs_ar) {
				i.stageWidth;
				var t, o, s = [].concat(i.thumbs_ar);
				if (i.isSearched_bl = !1, i.input_do && "search for video" != (o = i.input_do.screen.value.toLowerCase()))
					for (var l = 0; l < s.length; l++) - 1 == (t = s[l]).htmlText_str.indexOf(o) && (FWDAnimation.killTweensOf(t), t.setX(-t.w - 20), s.splice(l, 1), l--);
				var n = s.length;
				i.totalThumbs != n && (i.isSearched_bl = !0);
				for (l = 0; l < n; l++)(t = s[l]).finalW = i.stageWidth, t.finalX = 0, t.finalY = l * (t.finalH + i.spaceBetweenThumbnails), t.resizeAndPosition(e);
				0 == n ? i.showNothingFound() : i.hideNothingFound(), t && (i.totalThumbsHeight = Math.max(0, n * (t.h + i.spaceBetweenThumbnails) - i.spaceBetweenThumbnails), i.totalThumbsHeight > i.stageHeight - i.removeFromThumbsHolderHeight ? i.allowToScrollAndScrollBarIsActive_bl = !0 : i.allowToScrollAndScrollBarIsActive_bl = !1)
			}
		}, this.setupMobileScrollbar = function () {
			i.hasPointerEvent_bl ? i.mainThumbsHolder_do.screen.addEventListener("pointerdown", i.scrollBarTouchStartHandler) : i.mainThumbsHolder_do.screen.addEventListener("touchstart", i.scrollBarTouchStartHandler), i.isMobile_bl && (i.updateMobileScrollBarId_int = setInterval(i.updateMobileScrollBar, 16))
		}, this.scrollBarTouchStartHandler = function (t) {
			t.preventDefault && t.preventDefault(), i.isScrollingOnMove_bl = !1, FWDAnimation.killTweensOf(i.thumbsHolder_do);
			var o = FWDUVPUtils.getViewportMouseCoordinates(t);
			i.isDragging_bl = !0, i.lastPresedY = o.screenY, i.checkLastPresedY = o.screenY, i.hasPointerEvent_bl ? (e.addEventListener("pointerup", i.scrollBarTouchEndHandler), e.addEventListener("pointermove", i.scrollBarTouchMoveHandler)) : (e.addEventListener("touchend", i.scrollBarTouchEndHandler), e.addEventListener("touchmove", i.scrollBarTouchMoveHandler)), clearInterval(i.updateMoveMobileScrollbarId_int), i.updateMoveMobileScrollbarId_int = setInterval(i.updateMoveMobileScrollbar, 20)
		}, this.scrollBarTouchMoveHandler = function (e) {
			if (e.preventDefault && e.preventDefault(), e.stopImmediatePropagation(), !(i.totalThumbsHeight < i.mainThumbsHolder_do.h || i.comboBox_do && i.comboBox_do.isShowed_bl)) {
				o.showDisable();
				var t = FWDUVPUtils.getViewportMouseCoordinates(e);
				(t.screenY >= i.checkLastPresedY + 6 || t.screenY <= i.checkLastPresedY - 6) && (i.isScrollingOnMove_bl = !0);
				var s = t.screenY - i.lastPresedY;
				if (i.thumbnailsFinalY += s, i.thumbnailsFinalY = Math.round(i.thumbnailsFinalY), i.lastPresedY = t.screenY, i.vy = 2 * s, !i.isMobile) {
					i.thumbnailsFinalY > 0 ? i.thumbnailsFinalY = 0 : i.thumbnailsFinalY < i.mainThumbsHolder_do.h - i.totalThumbsHeight && (i.thumbnailsFinalY = i.mainThumbsHolder_do.h - i.totalThumbsHeight);
					var l = Math.max(0, i.thumbnailsFinalY / (i.mainThumbsHolder_do.h - i.totalThumbsHeight));
					i.scrMainHolder_do && (i.scrollBarHandlerFinalY = Math.round((i.scrMainHolder_do.h - i.scrHandler_do.h) * l), i.scrollBarHandlerFinalY < 0 ? i.scrollBarHandlerFinalY = 0 : i.scrollBarHandlerFinalY > i.scrMainHolder_do.h - i.scrHandler_do.h - 1 && (i.scrollBarHandlerFinalY = i.scrMainHolder_do.h - i.scrHandler_do.h - 1), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.killTweensOf(i.scrHandlerLines_do), i.scrHandler_do.setY(i.scrollBarHandlerFinalY), i.scrHandlerLines_do.setY(i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLinesN_do.h) / 2)))
				}
			}
		}, this.scrollBarTouchEndHandler = function (t) {
			i.isDragging_bl = !1, clearInterval(i.updateMoveMobileScrollbarId_int), clearTimeout(i.disableOnMoveId_to), i.disableOnMoveId_to = setTimeout(function () {
				o.hideDisable()
			}, 100), i.hasPointerEvent_bl ? (e.removeEventListener("pointerup", i.scrollBarTouchEndHandler), e.removeEventListener("pointermove", i.scrollBarTouchMoveHandler)) : (e.removeEventListener("touchend", i.scrollBarTouchEndHandler), e.removeEventListener("touchmove", i.scrollBarTouchMoveHandler))
		}, this.updateMoveMobileScrollbar = function () {
			i.thumbsHolder_do.setY(i.thumbnailsFinalY)
		}, this.updateMobileScrollBar = function (e) {
			i.isDragging_bl || (i.isSearched_bl && (i.thumbnailsFinalY = 0), i.totalThumbsHeight < i.mainThumbsHolder_do.h && (i.thumbnailsFinalY = .01), i.vy *= i.friction, i.thumbnailsFinalY += i.vy, i.thumbnailsFinalY > 0 ? (i.vy2 = .3 * (0 - i.thumbnailsFinalY), i.vy *= i.friction, i.thumbnailsFinalY += i.vy2) : i.thumbnailsFinalY < i.mainThumbsHolder_do.h - i.totalThumbsHeight && (i.vy2 = .3 * (i.mainThumbsHolder_do.h - i.totalThumbsHeight - i.thumbnailsFinalY), i.vy *= i.friction, i.thumbnailsFinalY += i.vy2), i.thumbsHolder_do.setY(Math.round(i.thumbnailsFinalY)))
		}, this.setupScrollbar = function () {
			i.scrMainHolder_do = new FWDUVPDisplayObject("div"), i.scrMainHolder_do.setWidth(i.scrWidth), i.scrTrack_do = new FWDUVPDisplayObject("div"), i.scrTrack_do.setWidth(i.scrWidth), i.scrTrackTop_do = new FWDUVPDisplayObject("img"), i.scrTrackTop_do.setScreen(i.scrBkTop_img), i.scrTrackMiddle_do = new FWDUVPDisplayObject("div"), i.scrTrackMiddle_do.getStyle().background = "url('" + s.scrBkMiddlePath_str + "')", i.scrTrackMiddle_do.setWidth(i.scrWidth), i.scrTrackMiddle_do.setY(i.scrTrackTop_do.h);
			var e = new Image;
			e.src = s.scrBkBottomPath_str, i.scrTrackBottom_do = new FWDUVPDisplayObject("img"), i.scrTrackBottom_do.setScreen(e), i.scrTrackBottom_do.setWidth(i.scrTrackTop_do.w), i.scrTrackBottom_do.setHeight(i.scrTrackTop_do.h), i.scrHandler_do = new FWDUVPDisplayObject("div"), i.scrHandler_do.setWidth(i.scrWidth), i.scrHandlerTop_do = new FWDUVPDisplayObject("img"), i.useHEXColorsForSkin_bl ? (i.scrHandlerTop_do = new FWDUVPDisplayObject("div"), i.scrHandlerTop_do.setWidth(i.scrDragTop_img.width), i.scrHandlerTop_do.setHeight(i.scrDragTop_img.height), i.mainScrubberDragTop_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.scrDragTop_img, i.normalButtonsColor_str).canvas, i.scrHandlerTop_do.screen.appendChild(i.mainScrubberDragTop_canvas)) : (i.scrHandlerTop_do = new FWDUVPDisplayObject("img"), i.scrHandlerTop_do.setScreen(i.scrDragTop_img)), i.scrHandlerMiddle_do = new FWDUVPDisplayObject("div"), i.middleImage = new Image, i.middleImage.src = s.scrDragMiddlePath_str, i.useHEXColorsForSkin_bl ? i.middleImage.onload = function () {
				i.scrubberDragMiddle_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.middleImage, i.normalButtonsColor_str, !0), i.scrubberDragImage_img = i.scrubberDragMiddle_canvas.image, i.scrHandlerMiddle_do.getStyle().background = "url('" + i.scrubberDragImage_img.src + "') repeat-y"
			} : i.scrHandlerMiddle_do.getStyle().background = "url('" + s.scrDragMiddlePath_str + "')", i.scrHandlerMiddle_do.setWidth(i.scrWidth), i.scrHandlerMiddle_do.setY(i.scrHandlerTop_do.h), i.scrHandlerBottom_do = new FWDUVPDisplayObject("div"), i.bottomImage = new Image, i.bottomImage.src = s.scrDragMiddlePath_str, i.useHEXColorsForSkin_bl ? i.bottomImage.onload = function () {
				i.scrubberDragBottom_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.bottomImage, i.normalButtonsColor_str, !0), i.scrubberDragBottomImage_img = i.scrubberDragBottom_canvas.image, i.scrHandlerBottom_do.getStyle().background = "url('" + i.scrubberDragBottomImage_img.src + "') repeat-y"
			} : i.scrHandlerBottom_do.getStyle().background = "url('" + s.scrDragBottomPath_str + "')", i.scrHandlerBottom_do.setWidth(i.scrWidth), i.scrHandlerBottom_do.setY(i.scrHandlerTop_do.h), i.scrHandlerBottom_do.setWidth(i.scrHandlerTop_do.w), i.scrHandlerBottom_do.setHeight(i.scrHandlerTop_do.h), i.scrHandler_do.setButtonMode(!0), i.useHEXColorsForSkin_bl ? (i.scrHandlerLinesN_do = new FWDUVPDisplayObject("div"), i.scrHandlerLinesN_do.setWidth(i.scrLinesN_img.width), i.scrHandlerLinesN_do.setHeight(i.scrLinesN_img.height), i.mainhandlerN_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.scrLinesN_img, i.selectedButtonsColor_str).canvas, i.scrHandlerLinesN_do.screen.appendChild(i.mainhandlerN_canvas)) : (i.scrHandlerLinesN_do = new FWDUVPDisplayObject("img"), i.scrHandlerLinesN_do.setScreen(i.scrLinesN_img)), i.scrHandlerLinesS_img = new Image, i.scrHandlerLinesS_img.src = s.scrLinesSPath_str, i.useHEXColorsForSkin_bl ? (i.scrHandlerLinesS_do = new FWDUVPDisplayObject("div"), i.scrHandlerLinesS_img.onload = function () {
				i.scrHandlerLinesS_do.setWidth(i.scrHandlerLinesN_do.w), i.scrHandlerLinesS_do.setHeight(i.scrHandlerLinesN_do.h), i.scrubberLines_s_canvas = FWDUVPUtils.getCanvasWithModifiedColor(i.scrHandlerLinesS_img, i.selectedButtonsColor_str, !0), i.scrubbelinesSImage_img = i.scrubberLines_s_canvas.image, i.scrHandlerLinesS_do.getStyle().background = "url('" + i.scrubbelinesSImage_img.src + "') repeat-y"
			}) : (i.scrHandlerLinesS_do = new FWDUVPDisplayObject("img"), i.scrHandlerLinesS_do.setScreen(i.scrHandlerLinesS_img), i.scrHandlerLinesS_do.setWidth(i.scrHandlerLinesN_do.w), i.scrHandlerLinesS_do.setHeight(i.scrHandlerLinesN_do.h)), i.scrHandlerLinesS_do.setAlpha(0), i.scrHandlerLines_do = new FWDUVPDisplayObject("div"), i.scrHandlerLines_do.setWidth(i.scrHandlerLinesN_do.w), i.scrHandlerLines_do.setHeight(i.scrHandlerLinesN_do.h), i.scrHandlerLines_do.setButtonMode(!0), i.scrTrack_do.addChild(i.scrTrackTop_do), i.scrTrack_do.addChild(i.scrTrackMiddle_do), i.scrTrack_do.addChild(i.scrTrackBottom_do), i.scrHandler_do.addChild(i.scrHandlerTop_do), i.scrHandler_do.addChild(i.scrHandlerMiddle_do), i.scrHandler_do.addChild(i.scrHandlerBottom_do), i.scrHandlerLines_do.addChild(i.scrHandlerLinesN_do), i.scrHandlerLines_do.addChild(i.scrHandlerLinesS_do), i.scrMainHolder_do.addChild(i.scrTrack_do), i.scrMainHolder_do.addChild(i.scrHandler_do), i.scrMainHolder_do.addChild(i.scrHandlerLines_do), i.mainHolder_do.addChild(i.scrMainHolder_do), i.scrHandler_do.screen.addEventListener ? (i.scrHandler_do.screen.addEventListener("mouseover", i.scrollBarHandlerOnMouseOver), i.scrHandler_do.screen.addEventListener("mouseout", i.scrollBarHandlerOnMouseOut), i.scrHandler_do.screen.addEventListener("mousedown", i.scrollBarHandlerOnMouseDown), i.scrHandlerLines_do.screen.addEventListener("mouseover", i.scrollBarHandlerOnMouseOver), i.scrHandlerLines_do.screen.addEventListener("mouseout", i.scrollBarHandlerOnMouseOut), i.scrHandlerLines_do.screen.addEventListener("mousedown", i.scrollBarHandlerOnMouseDown)) : i.scrHandler_do.screen.attachEvent && (i.scrHandler_do.screen.attachEvent("onmouseover", i.scrollBarHandlerOnMouseOver), i.scrHandler_do.screen.attachEvent("onmouseout", i.scrollBarHandlerOnMouseOut), i.scrHandler_do.screen.attachEvent("onmousedown", i.scrollBarHandlerOnMouseDown), i.scrHandlerLines_do.screen.attachEvent("onmouseover", i.scrollBarHandlerOnMouseOver), i.scrHandlerLines_do.screen.attachEvent("onmouseout", i.scrollBarHandlerOnMouseOut), i.scrHandlerLines_do.screen.attachEvent("onmousedown", i.scrollBarHandlerOnMouseDown))
		}, this.scrollBarHandlerOnMouseOver = function (e) {
			i.allowToScrollAndScrollBarIsActive_bl && (FWDAnimation.killTweensOf(i.scrHandlerLinesN_do), FWDAnimation.killTweensOf(i.scrHandlerLinesS_do), FWDAnimation.to(i.scrHandlerLinesN_do, .8, {
				alpha: 0,
				ease: Expo.easeOut
			}), FWDAnimation.to(i.scrHandlerLinesS_do, .8, {
				alpha: 1,
				ease: Expo.easeOut
			}))
		}, this.scrollBarHandlerOnMouseOut = function (e) {
			!i.isDragging_bl && i.allowToScrollAndScrollBarIsActive_bl && (FWDAnimation.killTweensOf(i.scrHandlerLinesN_do), FWDAnimation.killTweensOf(i.scrHandlerLinesS_do), FWDAnimation.to(i.scrHandlerLinesN_do, .8, {
				alpha: 1,
				ease: Expo.easeOut
			}), FWDAnimation.to(i.scrHandlerLinesS_do, .8, {
				alpha: 0,
				ease: Expo.easeOut
			}))
		}, this.scrollBarHandlerOnMouseDown = function (t) {
			if (i.allowToScrollAndScrollBarIsActive_bl) {
				var s = FWDUVPUtils.getViewportMouseCoordinates(t);
				i.isDragging_bl = !0, i.yPositionOnPress = i.scrHandler_do.y, i.lastPresedY = s.screenY, FWDAnimation.killTweensOf(i.scrHandler_do), o.showDisable(), e.addEventListener ? (e.addEventListener("mousemove", i.scrollBarHandlerMoveHandler), e.addEventListener("mouseup", i.scrollBarHandlerEndHandler)) : document.attachEvent && (document.attachEvent("onmousemove", i.scrollBarHandlerMoveHandler), document.attachEvent("onmouseup", i.scrollBarHandlerEndHandler))
			}
		}, this.scrollBarHandlerMoveHandler = function (e) {
			e.preventDefault && e.preventDefault();
			var t = FWDUVPUtils.getViewportMouseCoordinates(e),
				o = i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLines_do.h) / 2);
			i.scrollBarHandlerFinalY = Math.round(i.yPositionOnPress + t.screenY - i.lastPresedY), i.scrollBarHandlerFinalY >= i.scrTrack_do.h - i.scrHandler_do.h ? i.scrollBarHandlerFinalY = i.scrTrack_do.h - i.scrHandler_do.h : i.scrollBarHandlerFinalY <= 0 && (i.scrollBarHandlerFinalY = 0), i.scrHandler_do.setY(i.scrollBarHandlerFinalY), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.to(i.scrHandlerLines_do, .8, {
				y: o,
				ease: Quart.easeOut
			}), i.updateScrollBarHandlerAndContent(!0)
		}, i.scrollBarHandlerEndHandler = function (t) {
			var s = FWDUVPUtils.getViewportMouseCoordinates(t);
			i.isDragging_bl = !1, FWDUVPUtils.hitTest(i.scrHandler_do.screen, s.screenX, s.screenY) || (FWDAnimation.killTweensOf(i.scrHandlerLinesN_do), FWDAnimation.killTweensOf(i.scrHandlerLinesS_do), FWDAnimation.to(i.scrHandlerLinesN_do, .8, {
				alpha: 1,
				ease: Expo.easeOut
			}), FWDAnimation.to(i.scrHandlerLinesS_do, .8, {
				alpha: 0,
				ease: Expo.easeOut
			})), o.hideDisable(), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.to(i.scrHandler_do, .4, {
				y: i.scrollBarHandlerFinalY,
				ease: Quart.easeOut
			}), e.removeEventListener ? (e.removeEventListener("mousemove", i.scrollBarHandlerMoveHandler), e.removeEventListener("mouseup", i.scrollBarHandlerEndHandler)) : document.detachEvent && (document.detachEvent("onmousemove", i.scrollBarHandlerMoveHandler), document.detachEvent("onmouseup", i.scrollBarHandlerEndHandler))
		}, this.updateScrollBarSizeActiveAndDeactivate = function () {
			i.disableForAWhileAfterThumbClick_bl || (i.allowToScrollAndScrollBarIsActive_bl ? (i.allowToScrollAndScrollBarIsActive_bl = !0, i.scrMainHolder_do.setX(i.stageWidth - i.scrMainHolder_do.w), i.scrMainHolder_do.setHeight(i.stageHeight - i.removeFromThumbsHolderHeight), i.scrTrack_do.setHeight(i.scrMainHolder_do.h), i.scrTrackMiddle_do.setHeight(i.scrTrack_do.h - 2 * i.scrTrackTop_do.h), i.scrTrackBottom_do.setY(i.scrTrackMiddle_do.y + i.scrTrackMiddle_do.h), i.scrMainHolder_do.setAlpha(1), i.scrHandler_do.setButtonMode(!0), i.scrHandlerLines_do.setButtonMode(!0)) : (i.allowToScrollAndScrollBarIsActive_bl = !1, i.scrMainHolder_do.setX(i.stageWidth - i.scrMainHolder_do.w), i.scrMainHolder_do.setHeight(i.stageHeight - i.removeFromThumbsHolderHeight), i.scrTrack_do.setHeight(i.scrMainHolder_do.h), i.scrTrackMiddle_do.setHeight(i.scrTrack_do.h - 2 * i.scrTrackTop_do.h), i.scrTrackBottom_do.setY(i.scrTrackMiddle_do.y + i.scrTrackMiddle_do.h), i.scrMainHolder_do.setAlpha(.5), i.scrHandler_do.setY(0), i.scrHandler_do.setButtonMode(!1), i.scrHandlerLines_do.setButtonMode(!1)), i.scrHandler_do.setHeight(Math.max(120, Math.round(Math.min(1, i.scrMainHolder_do.h / i.totalThumbsHeight) * i.scrMainHolder_do.h))), i.scrHandlerMiddle_do.setHeight(i.scrHandler_do.h - 2 * i.scrHandlerTop_do.h), i.scrHandlerBottom_do.setY(i.scrHandlerMiddle_do.y + i.scrHandlerMiddle_do.h), FWDAnimation.killTweensOf(i.scrHandlerLines_do), i.scrHandlerLines_do.setY(i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLines_do.h) / 2)), i.scrHandlerBottom_do.setY(i.scrHandler_do.h - i.scrHandlerBottom_do.h))
		}, this.updateScrollBarHandlerAndContent = function (e, t) {
			if (!i.disableForAWhileAfterThumbClick_bl && (i.allowToScrollAndScrollBarIsActive_bl || t)) {
				var o = 0;
				i.isDragging_bl && !i.isMobile_bl ? ("Infinity" == (o = i.scrollBarHandlerFinalY / (i.scrMainHolder_do.h - i.scrHandler_do.h)) ? o = 0 : o >= 1 && (scrollPercent = 1), i.thumbnailsFinalY = -1 * Math.round(o * (i.totalThumbsHeight - i.mainThumbsHolder_do.h))) : (i.isSearched_bl ? (i.percentScrolled = 0, o = 0) : o = i.curId / (i.totalThumbs - 1), i.thumbnailsFinalY = Math.min(0, -1 * Math.round(o * (i.totalThumbsHeight - i.mainThumbsHolder_do.h))), i.scrMainHolder_do && (i.scrollBarHandlerFinalY = Math.round((i.scrMainHolder_do.h - i.scrHandler_do.h) * o), i.scrollBarHandlerFinalY < 0 ? i.scrollBarHandlerFinalY = 0 : i.scrollBarHandlerFinalY > i.scrMainHolder_do.h - i.scrHandler_do.h - 1 && (i.scrollBarHandlerFinalY = i.scrMainHolder_do.h - i.scrHandler_do.h - 1), FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.killTweensOf(i.scrHandlerLines_do), e ? (FWDAnimation.to(i.scrHandler_do, .4, {
					y: i.scrollBarHandlerFinalY,
					ease: Quart.easeOut
				}), FWDAnimation.to(i.scrHandlerLines_do, .8, {
					y: i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLinesN_do.h) / 2),
					ease: Quart.easeOut
				})) : (i.scrHandler_do.setY(i.scrollBarHandlerFinalY), i.scrHandlerLines_do.setY(i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLinesN_do.h) / 2))))), i.lastThumbnailFinalY != i.thumbnailsFinalY && (FWDAnimation.killTweensOf(i.thumbsHolder_do), e ? FWDAnimation.to(i.thumbsHolder_do, .5, {
					y: i.thumbnailsFinalY,
					ease: Quart.easeOut
				}) : i.thumbsHolder_do.setY(i.thumbnailsFinalY)), i.lastThumbnailFinalY = i.thumbnailsFinalY
			}
		}, this.addMouseWheelSupport = function () {
			i.screen.addEventListener ? (i.screen.addEventListener("DOMMouseScroll", i.mouseWheelHandler), i.screen.addEventListener("mousewheel", i.mouseWheelHandler)) : i.screen.attachEvent && i.screen.attachEvent("onmousewheel", i.mouseWheelHandler)
		}, i.mouseWheelHandler = function (e) {
			if (e.preventDefault && e.preventDefault(), i.disableMouseWheel_bl || i.isDragging_bl) return !1;
			if (!i.comboBox_do || !i.comboBox_do.isShowed_bl) {
				var t = e.detail || e.wheelDelta;
				e.wheelDelta && (t *= -1), t > 0 ? i.scrollBarHandlerFinalY += Math.round(160 * i.scollbarSpeedSensitivity * (i.mainThumbsHolder_do.h / i.totalThumbsHeight)) : t < 0 && (i.scrollBarHandlerFinalY -= Math.round(160 * i.scollbarSpeedSensitivity * (i.mainThumbsHolder_do.h / i.totalThumbsHeight))), i.scrollBarHandlerFinalY >= i.scrTrack_do.h - i.scrHandler_do.h ? i.scrollBarHandlerFinalY = i.scrTrack_do.h - i.scrHandler_do.h : i.scrollBarHandlerFinalY <= 0 && (i.scrollBarHandlerFinalY = 0);
				var o = i.scrollBarHandlerFinalY + parseInt((i.scrHandler_do.h - i.scrHandlerLines_do.h) / 2);
				if (FWDAnimation.killTweensOf(i.scrHandler_do), FWDAnimation.killTweensOf(i.scrHandlerLines_do), FWDAnimation.to(i.scrHandlerLines_do, .8, {
						y: o,
						ease: Quart.easeOut
					}), FWDAnimation.to(i.scrHandler_do, .5, {
						y: i.scrollBarHandlerFinalY,
						ease: Quart.easeOut
					}), i.isDragging_bl = !0, i.updateScrollBarHandlerAndContent(!0), i.isDragging_bl = !1, !e.preventDefault) return !1;
				e.preventDefault()
			}
		}, this.hideAndShow = function (e) {
			"bottom" == i.position_str ? (i.mainHolder_do.setY(-i.stageHeight), FWDAnimation.to(i.mainHolder_do, .8, {
				y: 0,
				ease: Expo.easeInOut
			})) : (i.mainHolder_do.setX(-i.stageWidth), FWDAnimation.to(i.mainHolder_do, .8, {
				x: 0,
				ease: Expo.easeInOut
			}))
		}, this.hide = function (e) {
			i.isShowed_bl = !1, e ? "bottom" == i.position_str && FWDAnimation.to(i.mainHolder_do, .8, {
				y: -i.stageHeight,
				ease: Expo.easeInOut
			}) : (FWDAnimation.killTweensOf(i.mainHolder_do), "bottom" == i.position_str && i.mainHolder_do.setY(-i.stageHeight))
		}, this.show = function (e) {
			i.isShowed_bl = !0, FWDAnimation.isTweening(i.mainHolder_do) || i.hide(!1), e ? "bottom" == i.position_str ? FWDAnimation.to(i.mainHolder_do, .8, {
				y: 0,
				ease: Expo.easeInOut
			}) : i.mainHolder_do.setY(0) : (FWDAnimation.killTweensOf(i.mainHolder_do), i.mainHolder_do.setX(0), i.mainHolder_do.setY(0), clearTimeout(i.disableThumbsId_to), i.disableThumbsId_to = setTimeout(function () {
				i.disableThumbs_bl = !1
			}, 200), i.disableThumbs_bl = !0)
		}, i.updateHEXColors = function (e, t) {
			i.normalColor_str = e, i.selectedColor_str = t;
			try {
				FWDUVPUtils.changeCanvasHEXColor(i.scrLinesN_img, i.mainhandlerN_canvas, i.selectedColor_str);
				var o = FWDUVPUtils.changeCanvasHEXColor(i.scrHandlerLinesS_img, i.scrubberLines_s_canvas.canvas, i.selectedColor_str, !0);
				i.scrHandlerLinesS_do.getStyle().background = "url('" + o.src + "') repeat-x", FWDUVPUtils.changeCanvasHEXColor(i.scrDragTop_img, i.mainScrubberDragTop_canvas, i.normalColor_str);
				var s = FWDUVPUtils.changeCanvasHEXColor(i.middleImage, i.scrubberDragMiddle_canvas.canvas, i.normalColor_str, !0);
				i.scrHandlerMiddle_do.getStyle().background = "url('" + s.src + "') repeat-y";
				var l = FWDUVPUtils.changeCanvasHEXColor(i.bottomImage, i.scrubberDragBottom_canvas.canvas, i.normalColor_str, !0);
				i.scrHandlerBottom_do.getStyle().background = "url('" + l.src + "') repeat-y"
			} catch (e) {}
			i.nextButton_do && i.nextButton_do.updateHEXColors(e, t), i.prevButton_do && i.prevButton_do.updateHEXColors(e, t), i.loopButton_do && i.loopButton_do.updateHEXColors(e, t), i.shuffleButton_do && i.shuffleButton_do.updateHEXColors(e, t), i.input_do && (i.input_do.getStyle().color = i.normalColor_str), i.playlistName_do && (i.playlistName_do.getStyle().color = i.normalColor_str)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div", "absolute", "visible")
	}, t.THUMB_MOUSE_UP = "thumbMouseOut", t.PLAY_PREV_VIDEO = "playPrevVideo", t.PLAY_NEXT_VIDEO = "playNextVideo", t.DISABLE_LOOP = "disableLoop", t.ENABLE_LOOP = "enableLoop", t.DISABLE_SHUFFLE = "disableShuffle", t.ENABLE_SHUFFLE = "enableShuffle", t.CHANGE_PLAYLIST = "changePlaylist", t.prototype = null, e.FWDUVPPlaylist = t
}(window),
function (e) {
	var t = function (e, o, s, i, l, n, r, a, d, u, h, _) {
		var c = this;
		t.prototype;
		this.mainImageHolder_do = null, this.imageHolder_do = null, this.normalImage_do = null, this.dumy_do = null, this.text_do = null, this.backgroundImagePath_str = s, this.thumbnailNormalBackgroundColor_str = i, this.thumbnailHoverBackgroundColor_str = l, this.thumbnailDisabledBackgroundColor_str = n, this.htmlContent_str = u, this.htmlText_str = h.toLowerCase(), this.curState_str = "none", this.id = o, this.padding = d, this.imageOriginalW, this.imageOriginalH, this.finalX, this.finalY, this.thumbImageWidth = r, this.thumbImageHeight = a, this.finalW, this.finalH = 2 * c.padding + c.thumbImageHeight, this.imageFinalX, this.imageFinalY, this.imageFinalW, this.imageFinalH, this.mouseX, this.mouseY, this.showId_to, this.disableForAWhileId_to, this.hasImage_bl = !1, this.isSelected_bl = !1, this.isDisabled_bl = !1, this.disableForAWhile_bl = !1, this.hasToolTipShowed_bl = !1, this.hasCanvas_bl = FWDUVPlayer.hasCanvas, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.hasDispatchedOverEvent_bl = !1, this.showThumbnail_bl = _, this.init = function () {
			c.setupMainContainers(), c.setButtonMode(!0), c.setNormalState(), c.hasPointerEvent_bl ? (c.screen.addEventListener("pointerover", c.onMouseOver), c.screen.addEventListener("pointerout", c.onMouseOut), c.screen.addEventListener("pointerup", c.onMouseUp)) : c.screen.addEventListener && (c.screen.addEventListener("mouseover", c.onMouseOver), c.screen.addEventListener("mouseout", c.onMouseOut), c.screen.addEventListener("mouseup", c.onMouseUp), c.screen.addEventListener("touchend", c.onMouseUp))
		}, this.onMouseUp = function (o) {
			e.isScrollingOnMove_bl || c.isDisabled_bl || 2 == o.button || (o.preventDefault && o.preventDefault(), c.dispatchEvent(t.MOUSE_UP, {
				id: c.id
			}))
		}, this.onMouseOver = function (e) {
			if (!e.pointerType || e.pointerType == e.MSPOINTER_TYPE_MOUSE) {
				if (c.isDisabled_bl) return;
				c.setSelectedState(!0)
			}
		}, this.onMouseOut = function (e) {
			if (!e.pointerType || e.pointerType == e.MSPOINTER_TYPE_MOUSE) {
				if (c.isDisabled_bl) return;
				c.setNormalState(!0)
			}
		}, this.setupMainContainers = function () {
			c.mainImageHolder_do = new FWDUVPDisplayObject("div"), c.mainImageHolder_do.getStyle().background = "url('" + c.backgroundImagePath_str + "')", c.mainImageHolder_do.setX(c.padding), c.mainImageHolder_do.setY(c.padding), c.mainImageHolder_do.setWidth(c.thumbImageWidth), c.mainImageHolder_do.setHeight(c.thumbImageHeight), c.imageHolder_do = new FWDUVPDisplayObject("div"), c.text_do = new FWDUVPDisplayObject("div"), c.text_do.hasTransform3d_bl = !1, c.text_do.hasTransform2d_bl = !1, c.text_do.setHeight(c.finalH - 6), c.text_do.setBackfaceVisibility(), c.text_do.getStyle().fontFamily = "Arial", c.text_do.getStyle().fontSize = "12px", c.text_do.getStyle().color = c.fontColor_str, c.text_do.getStyle().fontSmoothing = "antialiased", c.text_do.getStyle().webkitFontSmoothing = "antialiased", c.text_do.getStyle().textRendering = "optimizeLegibility", c.showThumbnail_bl ? c.text_do.setX(2 * c.padding + c.thumbImageWidth + 4) : c.text_do.setX(2 * c.padding), c.text_do.setInnerHTML(c.htmlContent_str), c.addChild(c.text_do), c.dumy_do = new FWDUVPDisplayObject("div"), c.dumy_do.getStyle().width = "100%", c.dumy_do.getStyle().height = "100%", FWDUVPUtils.isIE && (c.dumy_do.setBkColor("#FF0000"), c.dumy_do.setAlpha(.01)), c.showThumbnail_bl && c.addChild(c.mainImageHolder_do), c.mainImageHolder_do.addChild(c.imageHolder_do), c.addChild(c.dumy_do)
		}, this.updateText = function (e) {
			try {
				c.htmlContent_str = e, c.text_do.setInnerHTML(c.htmlContent_str)
			} catch (e) {}
		}, this.setImage = function (t) {
			var o;
			(c.normalImage_do = new FWDUVPDisplayObject("img"), c.normalImage_do.setScreen(t), c.imageOriginalW = c.normalImage_do.w, c.imageOriginalH = c.normalImage_do.h, c.resizeImage(), c.imageHolder_do.setX(parseInt(c.thumbImageWidth / 2)), c.imageHolder_do.setY(parseInt(c.thumbImageHeight / 2)), c.imageHolder_do.setWidth(0), c.imageHolder_do.setHeight(0), c.normalImage_do.setX(-parseInt(c.normalImage_do.w / 2)), c.normalImage_do.setY(-parseInt(c.normalImage_do.h / 2)), FWDAnimation.to(c.imageHolder_do, .8, {
				x: 0,
				y: 0,
				w: c.thumbImageWidth,
				h: c.thumbImageHeight,
				ease: Expo.easeInOut
			}), c.normalImage_do.setAlpha(0), c.isMobile_bl) ? (o = c.id == e.curId ? .3 : 1, FWDAnimation.to(c.normalImage_do, .8, {
				alpha: o,
				x: c.imageFinalX,
				y: c.imageFinalY,
				ease: Expo.easeInOut
			})) : FWDAnimation.to(c.normalImage_do, .8, {
				alpha: 1,
				x: c.imageFinalX,
				y: c.imageFinalY,
				ease: Expo.easeInOut
			});
			c.imageHolder_do.addChild(c.normalImage_do), this.hasImage_bl = !0
		}, this.resizeAndPosition = function (e) {
			c.showThumbnail_bl ? c.text_do.setWidth(c.finalW - (2 * c.padding + c.thumbImageWidth) - 16) : c.text_do.setWidth(c.finalW - 2 * c.padding - 16), c.setWidth(c.finalW), c.setHeight(c.finalH), e ? FWDAnimation.to(c, .6, {
				x: c.finalX,
				y: c.finalY,
				ease: Expo.easeInOut
			}) : (FWDAnimation.killTweensOf(c), c.setX(c.finalX), c.setY(c.finalY)), c.resizeImage()
		}, this.resizeImage = function (e) {
			if (c.normalImage_do) {
				c.isMobile_bl ? 1 == c.normalImage_do.alpha || c.isDisabled_bl || c.normalImage_do.setAlpha(1) : 1 == c.imageHolder_do.alpha || c.isDisabled_bl || c.imageHolder_do.setAlpha(1);
				var t, o = c.thumbImageWidth / c.imageOriginalW,
					s = c.thumbImageHeight / c.imageOriginalH;
				t = o <= s ? o : s, c.imageFinalW = Math.ceil(t * c.imageOriginalW), c.imageFinalH = Math.ceil(t * c.imageOriginalH), c.imageFinalX = Math.round((c.thumbImageWidth - c.imageFinalW) / 2), c.imageFinalY = Math.round((c.thumbImageHeight - c.imageFinalH) / 2), c.normalImage_do.setX(c.imageFinalX), c.normalImage_do.setY(c.imageFinalY), c.normalImage_do.setWidth(c.imageFinalW), c.normalImage_do.setHeight(c.imageFinalH)
			}
		}, this.setNormalState = function (e) {
			"normal" != c.curState_str && (c.curState_str = "normal", e ? FWDAnimation.to(c.screen, .8, {
				css: {
					backgroundColor: c.thumbnailNormalBackgroundColor_str
				},
				ease: Expo.easeOut
			}) : (FWDAnimation.killTweensOf(c.screen), c.getStyle().backgroundColor = c.thumbnailNormalBackgroundColor_str))
		}, this.setSelectedState = function (e) {
			"selected" != c.curState_str && (c.curState_str = "selected", e ? FWDAnimation.to(c.screen, .8, {
				css: {
					backgroundColor: c.thumbnailHoverBackgroundColor_str
				},
				ease: Expo.easeOut
			}) : (FWDAnimation.killTweensOf(c.screen), c.getStyle().backgroundColor = c.thumbnailNormalBackgroundColor_str))
		}, this.setDisabledState = function (e) {
			"disabled" != c.curState_str && (c.curState_str = "disabled", e ? FWDAnimation.to(c.screen, .8, {
				css: {
					backgroundColor: c.thumbnailDisabledBackgroundColor_str
				},
				ease: Expo.easeOut
			}) : (FWDAnimation.killTweensOf(c.screen), c.getStyle().backgroundColor = c.thumbnailNormalBackgroundColor_str))
		}, this.enable = function () {
			c.isDisabled_bl && (c.isDisabled_bl = !1, c.setButtonMode(!0), c.setNormalState(!0), c.isMobile_bl ? c.normalImage_do && c.normalImage_do.setAlpha(1) : FWDAnimation.to(c.imageHolder_do, .6, {
				alpha: 1
			}))
		}, this.disable = function () {
			c.isDisabled_bl || (c.disableForAWhile_bl = !0, clearTimeout(c.disableForAWhileId_to), c.disableForAWhileId_to = setTimeout(function () {
				c.disableForAWhile_bl = !1
			}, 200), c.isDisabled_bl = !0, c.setButtonMode(!1), c.setDisabledState(!0), c.isMobile_bl ? c.normalImage_do && c.normalImage_do.setAlpha(.3) : FWDAnimation.to(c.imageHolder_do, .6, {
				alpha: .3
			}))
		}, this.destroy = function () {
			FWDAnimation.killTweensOf(c), c.normalImage_do && (FWDAnimation.killTweensOf(c.normalImage_do), c.normalImage_do.destroy()), FWDAnimation.killTweensOf(c.imageHolder_do), c.imageHolder_do.destroy(), c.dumy_do.destroy(), c.text_do.destroy(), c.backgroundImagePath_str = s, c.imageHolder_do = null, c.normalImage_do = null, c.dumy_do = null, c.text_do = null, c.htmlContent_str = null, c.htmlText_str = null, c.curState_str = null
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.SHOW_TOOL_TIP = "showToolTip", t.HIDE_TOOL_TIP = "hideToolTip", t.MOUSE_UP = "onMouseUp", t.prototype = null, e.FWDUVPPlaylistThumb = t
}(window),
function (e) {
	var t = function (e, o, s, i, l) {
		var n = this;
		t.prototype;
		this.buttonRef_do = null, this.bkPath_str = e, this.pointerPath_str = o, this.text_do = null, this.pointer_do = null, this.fontColor_str = s, this.position_str = i, this.id = -1, "bottom" == this.position_str ? (this.pointerWidth = 7, this.pointerHeight = 4) : (this.pointerWidth = 4, this.pointerHeight = 7), this.maxWidth = l, this.showWithDelayId_to, this.isMobile_bl = FWDUVPUtils.isMobile, this.isShowed_bl = !0, this.init = function () {
			n.setOverflow("visible"), n.setupMainContainers(), n.hide(), n.getStyle().background = "url('" + n.bkPath_str + "')", n.getStyle().zIndex = 9999999999999
		}, this.setupMainContainers = function () {
			n.text_do = new FWDUVPDisplayObject("div"), n.text_do.hasTransform3d_bl = !1, n.text_do.hasTransform2d_bl = !1, n.text_do.setBackfaceVisibility(), n.text_do.setDisplay("inline-block"), n.text_do.getStyle().fontFamily = "Arial", n.text_do.getStyle().fontSize = "12px", n.text_do.getStyle().color = n.fontColor_str, n.text_do.getStyle().fontSmoothing = "antialiased", n.text_do.getStyle().webkitFontSmoothing = "antialiased", n.text_do.getStyle().textRendering = "optimizeLegibility", n.text_do.getStyle().lineHeight = "16px", n.text_do.getStyle().padding = "6px", n.text_do.getStyle().paddingTop = "4px", n.text_do.getStyle().paddingBottom = "4px", n.text_do.getStyle().textAlign = "center", n.addChild(n.text_do);
			var e = new Image;
			e.src = n.pointerPath_str, n.pointer_do = new FWDUVPDisplayObject("img"), n.pointer_do.setScreen(e), n.pointer_do.setWidth(n.pointerWidth), n.pointer_do.setHeight(n.pointerHeight), n.addChild(n.pointer_do)
		}, this.setLabel = function (e, t) {
			n.id != t && (n.setVisible(!1), n.text_do.getStyle().whiteSpace = "normal", n.setWidth(n.maxWidth), n.text_do.setInnerHTML(e)), setTimeout(function () {
				if (null != n) {
					var e = n.text_do.screen.getBoundingClientRect().width;
					e < 8 && null != e ? (n.setHeight(Math.round(100 * n.text_do.screen.getBoundingClientRect().height)), e = Math.round(100 * e)) : (n.setHeight(n.text_do.screen.offsetHeight), e = Math.round(n.text_do.screen.offsetWidth)), e < n.w - 15 && n.setWidth(e), e < n.maxWidth && (n.text_do.getStyle().whiteSpace = "nowrap"), n.positionPointer(), n.id = t
				}
			}, 60)
		}, this.positionPointer = function (e) {
			var t, o;
			e || (e = 0), "bottom" == n.position_str ? (t = parseInt((n.w - n.pointerWidth) / 2) + e, o = n.h) : (t = n.w, o = parseInt((n.h - n.pointerHeight) / 2)), n.pointer_do.setX(t), n.pointer_do.setY(o)
		}, this.show = function () {
			n.isShowed_bl || (n.isShowed_bl = !0, FWDAnimation.killTweensOf(n), clearTimeout(n.showWithDelayId_to), n.showWithDelayId_to = setTimeout(n.showFinal, 100))
		}, this.showFinal = function () {
			n.setVisible(!0), n.setAlpha(0), FWDAnimation.to(n, .4, {
				alpha: 1,
				onComplete: function () {
					n.setVisible(!0)
				},
				ease: Quart.easeOut
			})
		}, this.hide = function () {
			n.isShowed_bl && (clearTimeout(n.showWithDelayId_to), FWDAnimation.killTweensOf(n), n.setVisible(!1), n.isShowed_bl = !1)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = null, t.prototype = new FWDUVPDisplayObject("div", "fixed")
	}, t.CLICK = "onClick", t.MOUSE_DOWN = "onMouseDown", t.prototype = null, e.FWDUVPPlaylistToolTip = t
}(window),
function () {
	var e = function (t, o, s, i, l, n, r, a, d, u, h, _, c) {
		var f = this;
		e.prototype;
		this.closeButton_do, this.image_do, this.imageSource = o, this.link = l, this.target = n, this.start = s, this.end = i, this.finalW = 0, this.finalH = 0, this.id = r, this.useHEXColorsForSkin_bl = h, this.normalButtonsColor_str = _, this.selectedButtonsColor_str = c, this.showPopupAdsCloseButton_bl = u, this.popupAddCloseNPath_str = a, this.popupAddCloseSPath_str = d, this.isClosed_bl = !1, this.isLoaded_bl = !1, this.isShowed_bl = !1, this.init = function () {
			this.image = new Image, this.image.src = this.imageSource, this.image.onload = this.onLoadHandler, f.link && f.setButtonMode(!0), f.showPopupAdsCloseButton_bl && (FWDUVPSimpleSizeButton.setPrototype(), f.closeButton_do = new FWDUVPSimpleSizeButton(f.popupAddCloseNPath_str, f.popupAddCloseSPath_str, 21, 21, f.useHEXColorsForSkin_bl, f.normalButtonsColor_str, f.selectedButtonsColor_str), f.closeButton_do.addListener(FWDUVPSimpleSizeButton.MOUSE_UP, f.closeClickButtonCloseHandler)), f.setVisible(!1)
		}, this.closeClickButtonCloseHandler = function () {
			f.hide(), f.isClosed_bl = !0
		}, this.clickHandler = function () {
			f.link && (t.parent.pause(), window.open(f.link, f.target))
		}, this.onLoadHandler = function () {
			f.originalW = f.image.width, f.originalH = f.image.height, f.image_do = new FWDUVPDisplayObject("img"), f.image_do.setScreen(f.image), f.image_do.setWidth(f.originalW), f.image_do.setHeight(f.originalH), f.addChild(f.image_do), f.isLoaded_bl = !0, f.closeButton_do && f.addChild(f.closeButton_do), f.screen.addEventListener ? f.image_do.screen.addEventListener("click", f.clickHandler) : f.image_do.screen.attachEvent("onclick", f.clickHandler)
		}, this.hide = function (e) {
			if (this.isShowed_bl) {
				this.isShowed_bl = !1;
				var o = Math.min(1, t.parent.tempVidStageWidth / (f.originalW + t.parent.spaceBetweenControllerAndPlaylist)),
					s = parseInt(o * f.originalH);
				t.parent.controller_do.isShowed_bl ? finalY = parseInt(t.parent.vidStageHeight - t.parent.controller_do.h - s + 2) : finalY = parseInt(t.parent.vidStageHeight - s + 2), t.setY(finalY), FWDAnimation.killTweensOf(t), e ? (t.removeChild(f), t.setWidth(0), t.setHeight(0)) : (f.setWidth(0), f.setHeight(0), t.setVisible(!1), f.setVisible(!1))
			}
		}, this.show = function () {
			this.isShowed_bl || this.isClosed_bl || !f.isLoaded_bl || (this.isShowed_bl = !0, setTimeout(function () {
				FWDAnimation.killTweensOf(t), t.setVisible(!0), f.setVisible(!0);
				var e = Math.min(1, t.parent.tempVidStageWidth / (f.originalW + t.parent.spaceBetweenControllerAndPlaylist)),
					o = parseInt(e * f.originalH) - 2;
				t.parent.controller_do.isShowed_bl ? finalY = parseInt(t.parent.vidStageHeight - t.parent.controller_do.h - f.originalH * e + 2 + o) : finalY = parseInt(t.parent.vidStageHeight - f.originalH * e + 2 + o), t.setY(finalY), f.resizeAndPosition(!0)
			}, 100))
		}, this.resizeAndPosition = function (e) {
			if (f.isLoaded_bl && !f.isClosed_bl && f.isShowed_bl) {
				var o, s;
				FWDUVPUtils.isIEAndLessThen9;
				s = Math.min(1, t.parent.tempVidStageWidth / (f.originalW + t.parent.spaceBetweenControllerAndPlaylist)), f.finalW = parseInt(s * f.originalW), f.finalH = parseInt(s * f.originalH), f.finalW == f.prevFinalW && f.finalH == f.prevFinalH || (f.setWidth(f.finalW), f.setHeight(f.finalH), f.image_do.setWidth(f.finalW), f.image_do.setHeight(f.finalH), o = t.parent.controller_do ? t.parent.controller_do.isShowed_bl ? parseInt(t.parent.vidStageHeight - t.parent.controller_do.h - f.originalH * s - 10) : parseInt(t.parent.vidStageHeight - f.originalH * s - 10) : parseInt(t.parent.vidStageHeight - f.originalH * s), t.setX(parseInt((t.parent.tempVidStageWidth - f.finalW) / 2)), FWDAnimation.killTweensOf(t), e ? FWDAnimation.to(t, .8, {
					y: o,
					ease: Expo.easeInOut
				}) : t.setY(o), f.closeButton_do && (f.closeButton_do.setY(2), f.closeButton_do.setX(parseInt(f.finalW - 21 - 2))), f.prevFinalW = f.finalW, f.prevFinallH = f.finalH, t.setWidth(f.finalW), t.setHeight(f.finalH))
			}
		}, this.updateHEXColors = function (e, t) {
			f.closeButton_do && f.closeButton_do.updateHEXColors(e, t)
		}, f.init()
	};
	e.setPrototype = function () {
		e.prototype = null, e.prototype = new FWDUVPDisplayObject("div")
	}, e.MOUSE_OVER = "onMouseOver", e.MOUSE_OUT = "onMouseOut", e.CLICK = "onClick", e.prototype = null, window.FWDUVPPopupAddButton = e
}(window),
function (e) {
	var t = function (e, o, s) {
		var i = this;
		t.prototype;
		this.img_img = new Image, this.img_do = null, this.imgW = 0, this.imgH = 0, this.finalW = 0, this.finalH = 0, this.finalX = 0, this.finalY = 0, this.curPath_str, this.posterBackgroundColor_str = s, this.isTransparent_bl = !1, this.showPoster_bl = o, this.showOrLoadOnMobile_bl = !1, this.isShowed_bl = !0, this.allowToShow_bl = !0, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
			i.img_img = new Image, i.img_do = new FWDUVPDisplayObject("img"), i.hide()
		}, this.positionAndResize = function () {
			if (e.vidStageWidth && (i.setWidth(e.tempVidStageWidth), i.setHeight(e.tempVidStageHeight), i.imgW)) {
				var t, o = e.tempVidStageWidth / i.imgW,
					s = e.tempVidStageHeight / i.imgH;
				t = o <= s ? o : s, i.finalW = Math.round(t * i.imgW), i.finalH = Math.round(t * i.imgH), i.finalX = parseInt((e.tempVidStageWidth - i.finalW) / 2), i.finalY = parseInt((e.tempVidStageHeight - i.finalH) / 2), i.img_do.setX(i.finalX), i.img_do.setY(i.finalY), i.img_do.setWidth(i.finalW), i.img_do.setHeight(i.finalH)
			}
		}, this.setPoster = function (e) {
			return e && "" == FWDUVPUtils.trim(e) || "none" == e ? (i.showOrLoadOnMobile_bl = !0, i.isTransparent_bl = !0, void i.show()) : "youtubemobile" == e ? (i.isTransparent_bl = !1, i.showOrLoadOnMobile_bl = !1, i.img_img.src = null, void(i.imgW = 0)) : (e == i.curPath_str ? (i.isTransparent_bl = !1, i.showOrLoadOnMobile_bl = !0) : i.isTransparent_bl = !1, i.isTransparent_bl ? i.getStyle().backgroundColor = "transparent" : i.getStyle().backgroundColor = i.posterBackgroundColor_str, i.isTransparent_bl = !1, i.showOrLoadOnMobile_bl = !0, i.curPath_str = e, i.allowToShow_bl && (i.isShowed_bl = !1), void(e && (i.img_do && (i.img_do.src = ""), i.img_img.onload = i.posterLoadHandler, i.img_img.src = i.curPath_str)))
		}, this.posterLoadHandler = function (e) {
			i.imgW = i.img_img.width, i.imgH = i.img_img.height, i.img_do.setScreen(i.img_img), i.addChild(i.img_do), i.show(), i.positionAndResize()
		}, this.show = function (e) {
			i.allowToShow_bl && !i.isShowed_bl && i.showOrLoadOnMobile_bl && (i.isShowed_bl = !0, i.isTransparent_bl ? 0 != i.alpha && i.setAlpha(0) : 1 != i.alpha && i.setAlpha(1), i.setVisible(!0), i.isMobile_bl || i.isTransparent_bl || (FWDAnimation.killTweensOf(i), i.setAlpha(0), FWDAnimation.to(i, .6, {
				alpha: 1,
				delay: .4
			})), i.positionAndResize())
		}, this.hide = function (e) {
			(i.isShowed_bl || e) && (FWDAnimation.killTweensOf(i), i.isShowed_bl = !1, i.setVisible(!1))
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.prototype = null, e.FWDUVPPoster = t
}(window),
function (e) {
	var t = function (e, o, s, i, l) {
		var n = this;
		t.prototype;
		this.imageSource_img = e, this.image_sdo = null, this.segmentWidth = o, this.segmentHeight = s, this.totalSegments = i, this.animDelay = l || 300, this.count = 0, this.delayTimerId_int, this.isShowed_bl = !1, this.init = function () {
			n.setWidth(n.segmentWidth), n.setHeight(n.segmentHeight), n.image_sdo = new FWDUVPDisplayObject("img"), n.image_sdo.setScreen(n.imageSource_img), n.addChild(n.image_sdo), n.hide(!1)
		}, this.start = function () {
			null != n && (clearInterval(n.delayTimerId_int), n.delayTimerId_int = setInterval(n.updatePreloader, n.animDelay))
		}, this.stop = function () {
			clearInterval(n.delayTimerId_int)
		}, this.updatePreloader = function () {
			if (null != n) {
				n.count++, n.count > n.totalSegments - 1 && (n.count = 0);
				var e = n.count * n.segmentWidth;
				n.image_sdo.setX(-e)
			}
		}, this.show = function () {
			n.isShowed_bl || (n.setVisible(!0), n.start(), FWDAnimation.killTweensOf(n), FWDAnimation.to(n, 1, {
				alpha: 1,
				delay: .2
			}), n.isShowed_bl = !0)
		}, this.hide = function (e) {
			n.isShowed_bl && (FWDAnimation.killTweensOf(this), e ? FWDAnimation.to(this, 1, {
				alpha: 0,
				onComplete: n.onHideComplete
			}) : (n.setVisible(!1), n.setAlpha(0)), n.isShowed_bl = !1)
		}, this.onHideComplete = function () {
			n.setVisible(!1), n.stop(), n.dispatchEvent(t.HIDE_COMPLETE)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.HIDE_COMPLETE = "hideComplete", t.prototype = null, e.FWDUVPPreloader = t
}(window),
function (e) {
	var t = function (e, o) {
		var s = this;
		t.prototype;
		this.parent = e, this.main_do = null, this.reader = null, this.subtitiles_ar = null, this.totalAds = 0, s.popupAds_ar, s.popupAdsButtons_ar, this.hasText_bl = !1, this.isLoaded_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.showSubtitleByDefault_bl = o.showSubtitleByDefault_bl, s.normalButtonsColor_str = o.normalButtonsColor_str, s.selectedButtonsColor_str = o.selectedButtonsColor_str, this.setSizeOnce_bl = !1, s.init = function () {
			-1 != o.skinPath_str.indexOf("hex_white") && (s.selectedButtonsColor_str = "#FFFFFF"), s.setOverflow("visible"), s.getStyle().cursor = "default", s.setVisible(!1)
		}, this.resetPopups = function (e) {
			var t;
			s.hideAllPopupButtons(!0), s.popupAds_ar = e, s.totalAds = s.popupAds_ar.length, s.popupAdsButtons_ar = [];
			for (var i = 0; i < s.totalAds; i++) FWDUVPPopupAddButton.setPrototype(), t = new FWDUVPPopupAddButton(s, s.popupAds_ar[i].source, s.popupAds_ar[i].start, s.popupAds_ar[i].end, s.popupAds_ar[i].link, s.popupAds_ar[i].trget, i, o.popupAddCloseNPath_str, o.popupAddCloseSPath_str, o.showPopupAdsCloseButton_bl, o.useHEXColorsForSkin_bl, s.normalButtonsColor_str, s.selectedButtonsColor_str), s.popupAdsButtons_ar[i] = t, s.addChild(t)
		}, this.update = function (e) {
			if (0 != s.totalAds)
				for (var t, o = 0; o < s.totalAds; o++) e >= (t = s.popupAdsButtons_ar[o]).start && e <= t.end ? t.show() : t.hide()
		}, this.position = function (e) {
			if (0 != s.totalAds)
				for (var t = 0; t < s.totalAds; t++) s.popupAdsButtons_ar[t].resizeAndPosition(e)
		}, this.hideAllPopupButtons = function (e) {
			if (0 != s.totalAds) {
				for (var t = 0; t < s.totalAds; t++) s.popupAdsButtons_ar[t].hide(e);
				e && (s.popupAdsButtons_ar = null, s.totalAds = 0)
			}
		}, this.updateHEXColors = function (e, t) {
			if (s.normalButtonsColor_str = e, s.selectedButtonsColor_str = t, s.popupAdsButtons_ar)
				for (var o = 0; o < s.popupAdsButtons_ar.length; o++) s.popupAdsButtons_ar[o].imageSource && s.popupAdsButtons_ar[o].updateHEXColors(e, t)
		}, s.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.LOAD_ERROR = "error", t.LOAD_COMPLETE = "complete", t.prototype = null, e.FWDUVPPupupAds = t
}(window),
function (e) {
	var t = function (o, s) {
		var i = this;
		t.prototype;
		this.embedColoseN_img = o.embedColoseN_img, this.bk_do = null, this.mainHolder_do = null, this.closeButton_do = null, this.buttons_ar = [], this.embedWindowBackground_str = o.embedWindowBackground_str, this.embedWindowCloseButtonMargins = o.embedWindowCloseButtonMargins, this.totalWidth = 0, this.stageWidth = 0, this.stageHeight = 0, this.minMarginXSpace = 20, this.hSpace = 20, this.minHSpace = 10, this.vSpace = 15, this.isShowed_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
			-1 != o.skinPath_str.indexOf("hex_white") ? i.selectedButtonsColor_str = "#FFFFFF" : i.selectedButtonsColor_str = o.selectedButtonsColor_str, i.setBackfaceVisibility(), i.mainHolder_do = new FWDUVPDisplayObject("div"), i.mainHolder_do.hasTransform3d_bl = !1, i.mainHolder_do.hasTransform2d_bl = !1, i.mainHolder_do.setBackfaceVisibility(), i.bk_do = new FWDUVPDisplayObject("div"), i.bk_do.getStyle().width = "100%", i.bk_do.getStyle().height = "100%", i.bk_do.setAlpha(.9), i.bk_do.getStyle().background = "url('" + i.embedWindowBackground_str + "')", FWDUVPSimpleButton.setPrototype(), i.closeButton_do = new FWDUVPSimpleButton(o.shareClooseN_img, o.embedWindowClosePathS_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, i.selectedButtonsColor_str), i.closeButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.closeButtonOnMouseUpHandler), i.addChild(i.mainHolder_do), i.mainHolder_do.addChild(i.bk_do), i.mainHolder_do.addChild(i.closeButton_do), this.setupButtons()
		}, this.closeButtonOnMouseUpHandler = function () {
			i.isShowed_bl && i.hide()
		}, this.positionAndResize = function () {
			i.stageWidth = s.stageWidth, i.stageHeight = s.stageHeight, i.closeButton_do.setX(i.stageWidth - i.closeButton_do.w - i.embedWindowCloseButtonMargins), i.closeButton_do.setY(i.embedWindowCloseButtonMargins), i.setWidth(i.stageWidth), i.setHeight(i.stageHeight), i.mainHolder_do.setWidth(i.stageWidth), i.mainHolder_do.setHeight(i.stageHeight), i.positionButtons()
		}, this.setupButtons = function () {
			FWDUVPSimpleButton.setPrototype(), i.facebookButton_do = new FWDUVPSimpleButton(o.facebookN_img, o.facebookSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.facebookButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.facebookOnMouseUpHandler), this.buttons_ar.push(i.facebookButton_do), FWDUVPSimpleButton.setPrototype(), i.googleButton_do = new FWDUVPSimpleButton(o.googleN_img, o.googleSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.googleButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.googleOnMouseUpHandler), this.buttons_ar.push(i.googleButton_do), FWDUVPSimpleButton.setPrototype(), i.twitterButton_do = new FWDUVPSimpleButton(o.twitterN_img, o.twitterSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.twitterButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.twitterOnMouseUpHandler), this.buttons_ar.push(i.twitterButton_do), FWDUVPSimpleButton.setPrototype(), i.likedinButton_do = new FWDUVPSimpleButton(o.likedInkN_img, o.likedInSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.likedinButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.likedinOnMouseUpHandler), this.buttons_ar.push(i.likedinButton_do), FWDUVPSimpleButton.setPrototype(), i.bufferButton_do = new FWDUVPSimpleButton(o.bufferkN_img, o.bufferSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.bufferButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.bufferOnMouseUpHandler), this.buttons_ar.push(i.bufferButton_do), FWDUVPSimpleButton.setPrototype(), i.diggButton_do = new FWDUVPSimpleButton(o.diggN_img, o.diggSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.diggButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.diggOnMouseUpHandler), this.buttons_ar.push(i.diggButton_do), FWDUVPSimpleButton.setPrototype(), i.redditButton_do = new FWDUVPSimpleButton(o.redditN_img, o.redditSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.redditButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.redditOnMouseUpHandler), this.buttons_ar.push(i.redditButton_do), FWDUVPSimpleButton.setPrototype(), i.thumbrlButton_do = new FWDUVPSimpleButton(o.thumbrlN_img, o.thumbrlSPath_str, void 0, !0, o.useHEXColorsForSkin_bl, o.normalButtonsColor_str, o.selectedButtonsColor_str), i.thumbrlButton_do.addListener(FWDUVPSimpleButton.MOUSE_UP, i.thumbrlOnMouseUpHandler), this.buttons_ar.push(i.thumbrlButton_do), i.mainHolder_do.addChild(i.facebookButton_do), i.mainHolder_do.addChild(i.googleButton_do), i.mainHolder_do.addChild(i.twitterButton_do), i.mainHolder_do.addChild(i.likedinButton_do), i.mainHolder_do.addChild(i.bufferButton_do), i.mainHolder_do.addChild(i.diggButton_do), i.mainHolder_do.addChild(i.redditButton_do), i.mainHolder_do.addChild(i.thumbrlButton_do)
		}, this.facebookOnMouseUpHandler = function () {
			var t = "http://www.facebook.com/share.php?u=" + encodeURIComponent(location.href);
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.googleOnMouseUpHandler = function () {
			var t = "https://plus.google.com/share?url=" + encodeURIComponent(location.href);
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.twitterOnMouseUpHandler = function () {
			var t = "http://twitter.com/home?status=" + encodeURIComponent(location.href);
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.likedinOnMouseUpHandler = function () {
			var t = "https://www.linkedin.com/cws/share?url=" + location.href;
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.bufferOnMouseUpHandler = function () {
			var t = "https://buffer.com/add?url=" + location.href;
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.diggOnMouseUpHandler = function () {
			var t = "http://digg.com/submit?url=" + location.href;
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.redditOnMouseUpHandler = function () {
			var t = "https://www.reddit.com/?submit=" + location.href;
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.thumbrlOnMouseUpHandler = function () {
			var t = "http://www.tumblr.com/share/link?url=" + location.href;
			e.open(t, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600")
		}, this.positionButtons = function () {
			var e, t, o, s = [],
				l = [],
				n = [],
				r = 0,
				a = 0,
				d = 0;
			s[d] = [0], l[d] = i.buttons_ar[0].totalWidth, n[d] = i.buttons_ar[0].totalWidth, i.totalButtons = i.buttons_ar.length;
			for (var u = 1; u < i.totalButtons; u++) e = i.buttons_ar[u], l[d] + e.totalWidth + i.minHSpace > i.stageWidth - i.minMarginXSpace ? (s[++d] = [], s[d].push(u), l[d] = e.totalWidth, n[d] = e.totalWidth) : (s[d].push(u), l[d] += e.totalWidth + i.minHSpace, n[d] += e.totalWidth);
			r = parseInt((i.stageHeight - ((d + 1) * (e.totalHeight + i.vSpace) - i.vSpace)) / 2);
			for (u = 0; u < d + 1; u++) {
				var h, _ = 0;
				if (s[u].length > 1) {
					h = Math.min((i.stageWidth - i.minMarginXSpace - n[u]) / (s[u].length - 1), i.hSpace);
					var c = n[u] + h * (s[u].length - 1);
					_ = parseInt((i.stageWidth - c) / 2)
				} else _ = parseInt((i.stageWidth - l[u]) / 2);
				u > 0 && (r += e.h + i.vSpace);
				for (var f = 0; f < s[u].length; f++) e = i.buttons_ar[s[u][f]], o = 0 == f ? _ : (t = i.buttons_ar[s[u][f] - 1]).finalX + t.totalWidth + h, e.finalX = o, e.finalY = r, a < e.finalY && (a = e.finalY), i.buttonsBarTotalHeight = a + e.totalHeight + i.startY, e.setX(e.finalX), e.setY(e.finalY)
			}
		}, this.show = function (e) {
			i.isShowed_bl || (i.isShowed_bl = !0, s.main_do.addChild(i), i.positionAndResize(), clearTimeout(i.hideCompleteId_to), clearTimeout(i.showCompleteId_to), i.mainHolder_do.setY(-i.stageHeight), i.showCompleteId_to = setTimeout(i.showCompleteHandler, 900), setTimeout(function () {
				FWDAnimation.to(i.mainHolder_do, .8, {
					y: 0,
					delay: .1,
					ease: Expo.easeInOut
				})
			}, 100))
		}, this.showCompleteHandler = function () {}, this.hide = function () {
			i.isShowed_bl && (i.isShowed_bl = !1, s.customContextMenu_do && s.customContextMenu_do.enable(), i.positionAndResize(), clearTimeout(i.hideCompleteId_to), clearTimeout(i.showCompleteId_to), i.hideCompleteId_to = setTimeout(i.hideCompleteHandler, 800), FWDAnimation.killTweensOf(i.mainHolder_do), FWDAnimation.to(i.mainHolder_do, .8, {
				y: -i.stageHeight,
				ease: Expo.easeInOut
			}))
		}, this.hideCompleteHandler = function () {
			s.main_do.removeChild(i), i.dispatchEvent(t.HIDE_COMPLETE)
		}, this.updateHEXColors = function (e, t) {
			-1 != o.skinPath_str.indexOf("hex_white") ? i.selectedColor_str = "#FFFFFF" : i.selectedColor_str = t, i.closeButton_do.updateHEXColors(e, i.selectedColor_str), i.facebookButton_do.updateHEXColors(e, t), i.googleButton_do.updateHEXColors(e, t), i.twitterButton_do.updateHEXColors(e, t), i.likedinButton_do.updateHEXColors(e, t), i.bufferButton_do.updateHEXColors(e, t), i.diggButton_do.updateHEXColors(e, t), i.redditButton_do.updateHEXColors(e, t), i.thumbrlButton_do.updateHEXColors(e, t)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = new FWDUVPDisplayObject("div")
	}, t.HIDE_COMPLETE = "hideComplete", t.prototype = null, e.FWDUVPShareWindow = t
}(window),
function (e) {
	var t = function (e, o, s, i, l, n, r, a) {
		var d = this;
		t.prototype;
		this.nImg = e, this.sPath_str = o, this.dPath_str = s, this.n_sdo, this.s_sdo, this.d_sdo, this.toolTipLabel_str, this.totalWidth = this.nImg.width, this.totalHeight = this.nImg.height, this.useHEXColorsForSkin_bl = l, this.normalButtonsColor_str = n, this.selectedButtonsColor_str = r, this.inverseHEXColors_bl = a, this.isShowed_bl = !0, this.isSetToDisabledState_bl = !1, this.isDisabled_bl = !1, this.isDisabledForGood_bl = !1, this.isSelectedFinal_bl = !1, this.isActive_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.allowToCreateSecondButton_bl = !d.isMobile_bl || d.hasPointerEvent_bl || i, d.init = function () {
			d.setupMainContainers()
		}, d.setupMainContainers = function () {
			if (d.useHEXColorsForSkin_bl ? (d.n_sdo = new FWDUVPTransformDisplayObject("div"), d.n_sdo.setWidth(d.totalWidth), d.n_sdo.setHeight(d.totalHeight), d.n_sdo_canvas = FWDUVPUtils.getCanvasWithModifiedColor(d.nImg, d.normalButtonsColor_str).canvas, d.n_sdo.screen.appendChild(d.n_sdo_canvas), d.addChild(d.n_sdo)) : (d.n_sdo = new FWDUVPTransformDisplayObject("img"), d.n_sdo.setScreen(d.nImg), d.addChild(d.n_sdo)), d.allowToCreateSecondButton_bl) {
				d.img1 = new Image, d.img1.src = d.sPath_str;
				var e = new Image;
				d.sImg = e, d.useHEXColorsForSkin_bl ? (d.s_sdo = new FWDUVPTransformDisplayObject("div"), d.s_sdo.setWidth(d.totalWidth), d.s_sdo.setHeight(d.totalHeight), d.img1.onload = function () {
					d.inverseHEXColors_bl ? d.s_sdo_canvas = FWDUVPUtils.getCanvasWithModifiedColor(d.img1, d.normalButtonsColor_str).canvas : d.s_sdo_canvas = FWDUVPUtils.getCanvasWithModifiedColor(d.img1, d.selectedButtonsColor_str).canvas, d.s_sdo.screen.appendChild(d.s_sdo_canvas)
				}, d.s_sdo.setAlpha(0), d.addChild(d.s_sdo)) : (d.s_sdo = new FWDUVPDisplayObject("img"), d.s_sdo.setScreen(d.img1), d.s_sdo.setWidth(d.totalWidth), d.s_sdo.setHeight(d.totalHeight), d.s_sdo.setAlpha(0), d.addChild(d.s_sdo)), d.dPath_str && (e.src = d.dPath_str, d.d_sdo = new FWDUVPDisplayObject("img"), d.d_sdo.setScreen(e), d.d_sdo.setWidth(d.totalWidth), d.d_sdo.setHeight(d.totalHeight), d.d_sdo.setX(-100), d.addChild(d.d_sdo))
			}
			d.setWidth(d.totalWidth), d.setHeight(d.totalHeight), d.setButtonMode(!0), d.screen.style.yellowOverlayPointerEvents = "none", d.screen.addEventListener("touchend", d.onMouseUp), d.hasPointerEvent_bl ? (d.screen.addEventListener("pointerup", d.onMouseUp), d.screen.addEventListener("pointerover", d.onMouseOver), d.screen.addEventListener("pointerout", d.onMouseOut)) : d.screen.addEventListener && (d.isMobile_bl || (d.screen.addEventListener("mouseover", d.onMouseOver), d.screen.addEventListener("mouseout", d.onMouseOut), d.screen.addEventListener("mouseup", d.onMouseUp)), d.screen.addEventListener("touchend", d.onMouseUp))
		}, d.onMouseOver = function (e) {
			if (d.dispatchEvent(t.SHOW_TOOLTIP, {
					e: e
				}), !(d.isDisabledForGood_bl || e.pointerType && e.pointerType != e.MSPOINTER_TYPE_MOUSE && "mouse" != e.pointerType)) {
				if (d.isDisabled_bl || d.isSelectedFinal_bl) return;
				d.dispatchEvent(t.MOUSE_OVER, {
					e: e
				}), d.setSelectedState()
			}
		}, d.onMouseOut = function (e) {
			if (!(d.isDisabledForGood_bl || e.pointerType && e.pointerType != e.MSPOINTER_TYPE_MOUSE && "mouse" != e.pointerType)) {
				if (d.isDisabled_bl || d.isSelectedFinal_bl) return;
				d.dispatchEvent(t.MOUSE_OUT, {
					e: e
				}), d.setNormalState()
			}
		}, d.onMouseUp = function (e) {
			d.isDisabledForGood_bl || (e.preventDefault && e.preventDefault(), d.isDisabled_bl || 2 == e.button || d.dispatchEvent(t.MOUSE_UP, {
				e: e
			}))
		}, d.setSelected = function () {
			d.isSelectedFinal_bl = !0, d.s_sdo && (FWDAnimation.killTweensOf(d.s_sdo), FWDAnimation.to(d.s_sdo, .8, {
				alpha: 1,
				ease: Expo.easeOut
			}))
		}, d.setUnselected = function () {
			d.isSelectedFinal_bl = !1, d.s_sdo && FWDAnimation.to(d.s_sdo, .8, {
				alpha: 0,
				delay: .1,
				ease: Expo.easeOut
			})
		}, this.setNormalState = function () {
			FWDAnimation.killTweensOf(d.s_sdo), FWDAnimation.to(d.s_sdo, .5, {
				alpha: 0,
				ease: Expo.easeOut
			})
		}, this.setSelectedState = function () {
			FWDAnimation.killTweensOf(d.s_sdo), FWDAnimation.to(d.s_sdo, .5, {
				alpha: 1,
				delay: .1,
				ease: Expo.easeOut
			})
		}, this.setDisabledState = function () {
			d.isSetToDisabledState_bl || (d.isSetToDisabledState_bl = !0, d.d_sdo && d.d_sdo.setX(0))
		}, this.setEnabledState = function () {
			d.isSetToDisabledState_bl && (d.isSetToDisabledState_bl = !1, d.d_sdo && d.d_sdo.setX(-100))
		}, this.disable = function () {
			d.isDisabledForGood_bl || d.isDisabled_bl || (d.isDisabled_bl = !0, d.setButtonMode(!1), FWDAnimation.to(d, .6, {
				alpha: .4
			}), d.setNormalState())
		}, this.enable = function () {
			!d.isDisabledForGood_bl && d.isDisabled_bl && (d.isDisabled_bl = !1, d.setButtonMode(!0), FWDAnimation.to(d, .6, {
				alpha: 1
			}))
		}, this.disableForGood = function () {
			d.isDisabledForGood_bl = !0, d.setButtonMode(!1)
		}, this.showDisabledState = function () {
			0 != d.d_sdo.x && d.d_sdo.setX(0)
		}, this.hideDisabledState = function () {
			-100 != d.d_sdo.x && d.d_sdo.setX(-100)
		}, this.show = function () {
			d.isShowed_bl || (d.isShowed_bl = !0, FWDAnimation.killTweensOf(d), FWDUVPUtils.isIEAndLessThen9 ? FWDUVPUtils.isIEAndLessThen9 ? d.setVisible(!0) : (d.setAlpha(0), FWDAnimation.to(d, .4, {
				alpha: 1,
				delay: .4
			}), d.setVisible(!0)) : FWDUVPUtils.isIEWebKit ? (FWDAnimation.killTweensOf(d.n_sdo), d.n_sdo.setScale2(0), FWDAnimation.to(d.n_sdo, .8, {
				scale: 1,
				delay: .4,
				onStart: function () {
					d.setVisible(!0)
				},
				ease: Elastic.easeOut
			})) : (d.setScale2(0), FWDAnimation.to(d, .8, {
				scale: 1,
				delay: .4,
				onStart: function () {
					d.setVisible(!0)
				},
				ease: Elastic.easeOut
			})))
		}, this.hide = function (e) {
			d.isShowed_bl && (d.isShowed_bl = !1, FWDAnimation.killTweensOf(d), FWDAnimation.killTweensOf(d.n_sdo), d.setVisible(!1))
		}, d.updateHEXColors = function (e, t) {
			FWDUVPUtils.changeCanvasHEXColor(d.nImg, d.n_sdo_canvas, e), FWDUVPUtils.changeCanvasHEXColor(d.img1, d.s_sdo_canvas, t)
		}, d.init()
	};
	t.setPrototype = function () {
		t.prototype = null, t.prototype = new FWDUVPTransformDisplayObject("div")
	}, t.CLICK = "onClick", t.MOUSE_OVER = "onMouseOver", t.SHOW_TOOLTIP = "showTooltip", t.MOUSE_OUT = "onMouseOut", t.MOUSE_UP = "onMouseDown", t.prototype = null, e.FWDUVPSimpleButton = t
}(window),
function (e) {
	var t = function (e, o, s, i, l, n, r) {
		var a = this;
		t.prototype;
		this.nImg_img = null, this.sImg_img = null, this.n_do, this.s_do, this.useHEXColorsForSkin_bl = l, this.normalButtonsColor_str = n, this.selectedButtonsColor_str = r, this.nImgPath_str = e, this.sImgPath_str = o, this.buttonWidth = s, this.buttonHeight = i, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.isDisabled_bl = !1, this.init = function () {
			a.setupMainContainers(), a.setWidth(a.buttonWidth), a.setHeight(a.buttonHeight), a.setButtonMode(!0)
		}, this.setupMainContainers = function () {
			a.nImg = new Image, a.nImg.src = a.nImgPath_str, a.useHEXColorsForSkin_bl ? (a.n_do = new FWDUVPTransformDisplayObject("div"), a.n_do.setWidth(a.buttonWidth), a.n_do.setHeight(a.buttonHeight), a.nImg.onload = function () {
				a.n_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(a.nImg, a.normalButtonsColor_str).canvas, a.n_do.screen.appendChild(a.n_do_canvas)
			}, a.addChild(a.n_do)) : (a.n_do = new FWDUVPDisplayObject("img"), a.n_do.setScreen(a.nImg), a.n_do.setWidth(a.buttonWidth), a.n_do.setHeight(a.buttonHeight), a.addChild(a.n_do)), a.sImg = new Image, a.sImg.src = a.sImgPath_str, a.useHEXColorsForSkin_bl ? (a.s_do = new FWDUVPTransformDisplayObject("div"), a.s_do.setWidth(a.buttonWidth), a.s_do.setHeight(a.buttonHeight), a.sImg.onload = function () {
				a.s_do_canvas = FWDUVPUtils.getCanvasWithModifiedColor(a.sImg, a.selectedButtonsColor_str).canvas, a.s_do.screen.appendChild(a.s_do_canvas)
			}, a.addChild(a.s_do)) : (a.s_do = new FWDUVPDisplayObject("img"), a.s_do.setScreen(a.sImg), a.s_do.setWidth(a.buttonWidth), a.s_do.setHeight(a.buttonHeight), a.addChild(a.s_do)), a.s_do.setAlpha(0), a.hasPointerEvent_bl ? (a.screen.addEventListener("pointerup", a.onMouseUp), a.screen.addEventListener("pointerover", a.setNormalState), a.screen.addEventListener("pointerout", a.setSelectedState)) : a.screen.addEventListener && (a.isMobile_bl || (a.screen.addEventListener("mouseover", a.setNormalState), a.screen.addEventListener("mouseout", a.setSelectedState), a.screen.addEventListener("mouseup", a.onMouseUp)), a.screen.addEventListener("touchend", a.onMouseUp))
		}, this.setNormalState = function (e) {
			FWDAnimation.killTweensOf(a.s_do), FWDAnimation.to(a.s_do, .5, {
				alpha: 0,
				ease: Expo.easeOut
			})
		}, this.setSelectedState = function (e) {
			FWDAnimation.killTweensOf(a.s_do), FWDAnimation.to(a.s_do, .5, {
				alpha: 1,
				ease: Expo.easeOut
			})
		}, this.onMouseUp = function (e) {
			a.dispatchEvent(t.MOUSE_UP)
		}, a.updateHEXColors = function (e, t) {
			FWDUVPUtils.changeCanvasHEXColor(a.nImg, a.n_do_canvas, e), FWDUVPUtils.changeCanvasHEXColor(a.sImg, a.s_do_canvas, t)
		}, this.destroy = function () {
			FWDAnimation.killTweensOf(a.n_do), a.n_do.destroy(), this.s_do.destroy(), a.screen.onmouseover = null, a.screen.onmouseout = null, a.screen.onclick = null, a.nImg_img = null, a.sImg_img = null, a = null, null, t.prototype = null
		}, a.init()
	};
	t.setPrototype = function () {
		t.prototype = null, t.prototype = new FWDUVPTransformDisplayObject("div", "relative")
	}, t.MOUSE_UP = "onClick", t.prototype = null, e.FWDUVPSimpleSizeButton = t
}(window),
function (e) {
	var l = function (r, a) {
		var d = this;
		l.prototype;
		this.main_do = null, this.reader = null, this.subtitiles_ar = null, this.hasText_bl = !1, this.isLoaded_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.showSubtitileByDefault_bl = a.showSubtitileByDefault_bl, d.init = function () {
			d.setOverflow("visible"), d.getStyle().pointerEvents = "none", d.getStyle().cursor = "default", d.setupTextContainer(), d.getStyle().margin = "auto", d.hide(), setTimeout(function () {
				d.setSizeOnce()
			}, 500)
		}, this.setSizeOnce = function () {
			this.setWidth(r.tempVidStageWidth), this.text_do.setWidth(r.tempVidStageWidth)
		}, d.setupTextContainer = function () {
			this.text_do = new FWDUVPTransformDisplayObject("div"), d.text_do.getStyle().pointerEvents = "none", this.text_do.hasTransform3d_bl = !1, this.text_do.setBackfaceVisibility(), this.text_do.getStyle().transformOrigin = "50% 0%", this.text_do.getStyle().textAlign = "center", this.text_do.getStyle().fontSmoothing = "antialiased", this.text_do.getStyle().webkitFontSmoothing = "antialiased", this.text_do.getStyle().textRendering = "optimizeLegibility", this.addChild(this.text_do)
		}, d.loadSubtitle = function (e) {
			if (d.text_do.setX(-5e3), -1 == location.protocol.indexOf("file:")) {
				d.subtitiles_ar = [], d.stopToLoadSubtitle(), d.sourceURL_str = e, d.xhr = new XMLHttpRequest, d.xhr.onreadystatechange = d.onLoad, d.xhr.onerror = d.onError;
				try {
					d.xhr.open("get", d.sourceURL_str + "?rand=" + parseInt(99999999 * Math.random()), !0), d.xhr.send()
				} catch (e) {
					e && e.message && e.message
				}
			}
		}, this.onLoad = function (t) {
			4 == d.xhr.readyState && (404 == d.xhr.status ? d.dispatchEvent(FWDUVPData.LOAD_ERROR, {
				text: "Subtitle file path is not found: <font color='#FF0000'>" + d.sourceURL_str + "</font>"
			}) : 408 == d.xhr.status ? d.dispatchEvent(FWDUVPData.LOAD_ERROR, {
				text: "Loadiong subtitle file file request load timeout!"
			}) : 200 == d.xhr.status && (e.JSON, d.subtitle_txt = d.xhr.responseText, d.isShowed_bl && d.show(), d.parseSubtitle(d.subtitle_txt), d.prevText = "none", setTimeout(function () {
				d.show(), d.text_do.setX(0), d.updateSubtitle(r.currentSecconds)
			}, 400))), d.dispatchEvent(l.LOAD_COMPLETE)
		}, this.onError = function (t) {
			try {
				e.console && console.log(t), e.console && console.log(t.message)
			} catch (t) {}
			d.dispatchEvent(l.LOAD_ERROR, {
				text: "Error loading subtitle file : <font color='#FF0000'>" + d.sourceURL_str + "</font>."
			})
		}, this.stopToLoadSubtitle = function () {
			if (null != d.xhr) {
				try {
					d.xhr.abort()
				} catch (e) {}
				d.xhr.onreadystatechange = null, d.xhr.onerror = null, d.xhr = null
			}
			this.isLoaded_bl = !1
		}, d.parseSubtitle = function (e) {
			function r(e) {
				return e.replace(/^\s+|\s+$/g, "")
			}
			d.isLoaded_bl = !0;
			var a = (e = r(e = e.replace(/\r\n|\r|\n/g, "\n"))).split("\n\n"),
				u = 0;
			for (s in a) {
				var h = a[s].split("\n");
				if (h.length >= 2) {
					if (n = h[0], i = r(h[1].split(" --\x3e ")[0]), o = r(h[1].split(" --\x3e ")[1]), t = h[2], h.length > 2)
						for (j = 3; j < h.length; j++) t += "<br>" + h[j];
					d.subtitiles_ar[u] = {}, d.subtitiles_ar[u].number = n, d.subtitiles_ar[u].start = i, d.subtitiles_ar[u].end = o, d.subtitiles_ar[u].startDuration = l.getDuration(i), d.subtitiles_ar[u].endDuration = l.getDuration(o), d.subtitiles_ar[u].text = "<p class='UVPSubtitle'>" + t + "</p>"
				}
				u++
			}
		}, this.updateSubtitle = function (e) {
			if (d.isLoaded_bl) {
				for (var t, o, s = "", i = 0; i < d.subtitiles_ar.length; i++)
					if (t = d.subtitiles_ar[i].startDuration, o = d.subtitiles_ar[i].endDuration, t <= e + 1 && o > e + 1) {
						s = d.subtitiles_ar[i].text;
						break
					}
				if (d.prevText != s) d.text_do.setInnerHTML(s), d.setAlpha(0), setTimeout(function () {
					d.setAlpha(1), d.position()
				}, 300), d.hasText_bl = !0;
				d.prevText = s
			}
		}, this.position = function (e) {
			if (d.isLoaded_bl) {
				var t;
				"bottom" != r.tempPlaylistPosition_str && r.showPlaylistButtonAndPlaylist_bl ? scale = Math.min(2, r.tempVidStageWidth / (r.maxWidth - r.playlistWidth - r.spaceBetweenControllerAndPlaylist)) : scale = Math.min(2, r.tempVidStageWidth / (r.maxWidth - r.spaceBetweenControllerAndPlaylist)), d.setX(Math.round((r.tempVidStageWidth - d.w) / 2)), d.text_do.setScale2(scale);
				var o = d.text_do.getHeight() * scale;
				t = r.controller_do ? r.controller_do.isShowed_bl ? parseInt(r.vidStageHeight - r.controller_do.h - o) : parseInt(r.vidStageHeight - o - 10) : parseInt(r.vidStageHeight - o), FWDAnimation.killTweensOf(d.text_do), e ? FWDAnimation.to(d.text_do, .8, {
					y: t,
					ease: Expo.easeInOut
				}) : d.text_do.setY(t), d.text_do.setX(0)
			}
		}, this.show = function () {
			d.setVisible(!0)
		}, this.hide = function () {
			d.setVisible(!1)
		}, d.init()
	};
	l.getDuration = function (e) {
		var t = 0,
			o = 0,
			s = 0;
		return "0" == (t = (e = e.split(":"))[0])[0] && "0" != t[1] && (t = parseInt(t[1])), "00" == t && (t = 0), "0" == (o = e[1])[0] && "0" != o[1] && (o = parseInt(o[1])), "00" == o && (o = 0), secs = parseInt(e[2].replace(/,.*/gi, "")), "0" == secs[0] && "0" != secs[1] && (secs = parseInt(secs[1])), "00" == secs && (secs = 0), 0 != t && (s += 60 * t * 60), 0 != o && (s += 60 * o), s += secs
	}, l.setPrototype = function () {
		l.prototype = null, l.prototype = new FWDUVPTransformDisplayObject("div")
	}, l.LOAD_ERROR = "error", l.LOAD_COMPLETE = "complete", l.prototype = null, e.FWDUVPSubtitle = l
}(window),
function (e) {
	var t = function (o, s, i, l, n, r) {
		var a = this;
		t.prototype;
		this.buttonRef_do = o, this.bkPath_str = s, this.pointerPath_str = i, this.text_do = null, this.pointer_do = null, this.fontColor_str = n, this.toolTipLabel_str = l, this.toolTipsButtonsHideDelay = 1e3 * r, this.pointerWidth = 7, this.pointerHeight = 4, this.showWithDelayId_to, this.isMobile_bl = FWDUVPUtils.isMobile, this.isShowed_bl = !0, this.init = function () {
			a.setOverflow("visible"), a.setupMainContainers(), a.setLabel(a.toolTipLabel_str), a.hide(), a.getStyle().background = "url('" + a.bkPath_str + "')", a.getStyle().zIndex = 9999999999999
		}, this.setupMainContainers = function () {
			a.text_do = new FWDUVPDisplayObject("div"), a.text_do.hasTransform3d_bl = !1, a.text_do.hasTransform2d_bl = !1, a.text_do.setBackfaceVisibility(), a.text_do.setDisplay("inline"), a.text_do.getStyle().fontFamily = "Arial", a.text_do.getStyle().fontSize = "12px", a.text_do.getStyle().color = a.fontColor_str, a.text_do.getStyle().whiteSpace = "nowrap", a.text_do.getStyle().fontSmoothing = "antialiased", a.text_do.getStyle().webkitFontSmoothing = "antialiased", a.text_do.getStyle().textRendering = "optimizeLegibility", a.text_do.getStyle().padding = "6px", a.text_do.getStyle().paddingTop = "4px", a.text_do.getStyle().paddingBottom = "4px", a.setLabel(), a.addChild(a.text_do);
			var e = new Image;
			e.src = a.pointerPath_str, a.pointer_do = new FWDUVPDisplayObject("img"), a.pointer_do.setScreen(e), a.pointer_do.setWidth(a.pointerWidth), a.pointer_do.setHeight(a.pointerHeight), a.addChild(a.pointer_do)
		}, this.setLabel = function (e) {
			a.text_do.setInnerHTML(l), setTimeout(function () {
				null != a && (a.setWidth(a.text_do.getWidth()), a.setHeight(a.text_do.getHeight()), a.positionPointer())
			}, 50)
		}, this.positionPointer = function (e) {
			var t, o;
			e || (e = 0), t = parseInt((a.w - a.pointerWidth) / 2) + e, o = a.h, a.pointer_do.setX(t), a.pointer_do.setY(o)
		}, this.show = function () {
			a.isShowed_bl || (a.isShowed_bl = !0, FWDAnimation.killTweensOf(a), clearTimeout(a.showWithDelayId_to), a.showWithDelayId_to = setTimeout(a.showFinal, a.toolTipsButtonsHideDelay), e.addEventListener ? e.addEventListener("mousemove", a.moveHandler) : document.attachEvent && (document.detachEvent("onmousemove", a.moveHandler), document.attachEvent("onmousemove", a.moveHandler)))
		}, this.showFinal = function () {
			a.setVisible(!0), a.setAlpha(0), FWDAnimation.to(a, .4, {
				alpha: 1,
				onComplete: function () {
					a.setVisible(!0)
				},
				ease: Quart.easeOut
			})
		}, this.moveHandler = function (e) {
			var t = FWDUVPUtils.getViewportMouseCoordinates(e);
			FWDUVPUtils.hitTest(a.buttonRef_do.screen, t.screenX, t.screenY) || a.hide()
		}, this.hide = function () {
			a.isShowed_bl && (clearTimeout(a.showWithDelayId_to), e.removeEventListener ? e.removeEventListener("mousemove", a.moveHandler) : document.detachEvent && document.detachEvent("onmousemove", a.moveHandler), FWDAnimation.killTweensOf(a), a.setVisible(!1), a.isShowed_bl = !1)
		}, this.init()
	};
	t.setPrototype = function () {
		t.prototype = null, t.prototype = new FWDUVPDisplayObject("div", "fixed")
	}, t.CLICK = "onClick", t.MOUSE_DOWN = "onMouseDown", t.prototype = null, e.FWDUVPToolTip = t
}(window), window.FWDUVPTransformDisplayObject = function (e, t, o, s) {
		this.listeners = {
			events_ar: []
		};
		var i = this;
		if ("div" != e && "img" != e && "canvas" != e) throw Error("Type is not valid! " + e);
		this.type = e, this.children_ar = [], this.style, this.screen, this.numChildren, this.transform, this.position = t || "absolute", this.overflow = o || "hidden", this.display = s || "block", this.visible = !0, this.buttonMode, this.x = 0, this.y = 0, this.scale = 1, this.rotation = 0, this.w = 0, this.h = 0, this.rect, this.alpha = 1, this.innerHTML = "", this.opacityType = "", this.isHtml5_bl = !1, this.hasTransform2d_bl = FWDUVPUtils.hasTransform2d, this.init = function () {
			this.setScreen()
		}, this.getTransform = function () {
			for (var e, t = ["transform", "msTransform", "WebkitTransform", "MozTransform", "OTransform"]; e = t.shift();)
				if (void 0 !== this.screen.style[e]) return e;
			return !1
		}, this.getOpacityType = function () {
			return void 0 !== this.screen.style.opacity ? "opacity" : "filter"
		}, this.setScreen = function (e) {
			"img" == this.type && e ? (this.screen = e, this.setMainProperties()) : (this.screen = document.createElement(this.type), this.setMainProperties())
		}, this.setMainProperties = function () {
			this.transform = this.getTransform(), this.setPosition(this.position), this.setOverflow(this.overflow), this.opacityType = this.getOpacityType(), "opacity" == this.opacityType && (this.isHtml5_bl = !0), "filter" == i.opacityType && (i.screen.style.filter = "inherit"), this.screen.style.left = "0px", this.screen.style.top = "0px", this.screen.style.margin = "0px", this.screen.style.padding = "0px", this.screen.style.maxWidth = "none", this.screen.style.maxHeight = "none", this.screen.style.border = "none", this.screen.style.lineHeight = "1", this.screen.style.backgroundColor = "transparent", this.screen.style.backfaceVisibility = "hidden", this.screen.style.webkitBackfaceVisibility = "hidden", this.screen.style.MozBackfaceVisibility = "hidden", this.screen.style.MozImageRendering = "optimizeSpeed", this.screen.style.WebkitImageRendering = "optimizeSpeed", "img" == e && (this.setWidth(this.screen.width), this.setHeight(this.screen.height), this.screen.onmousedown = function (e) {
				return !1
			})
		}, i.setBackfaceVisibility = function () {
			i.screen.style.backfaceVisibility = "visible", i.screen.style.webkitBackfaceVisibility = "visible", i.screen.style.MozBackfaceVisibility = "visible"
		}, i.removeBackfaceVisibility = function () {
			i.screen.style.backfaceVisibility = "hidden", i.screen.style.webkitBackfaceVisibility = "hidden", i.screen.style.MozBackfaceVisibility = "hidden"
		}, this.setSelectable = function (e) {
			if (!e) {
				try {
					this.screen.style.userSelect = "none"
				} catch (e) {}
				try {
					this.screen.style.MozUserSelect = "none"
				} catch (e) {}
				try {
					this.screen.style.webkitUserSelect = "none"
				} catch (e) {}
				try {
					this.screen.style.khtmlUserSelect = "none"
				} catch (e) {}
				try {
					this.screen.style.oUserSelect = "none"
				} catch (e) {}
				try {
					this.screen.style.msUserSelect = "none"
				} catch (e) {}
				try {
					this.screen.msUserSelect = "none"
				} catch (e) {}
				this.screen.ondragstart = function (e) {
					return !1
				}, this.screen.onselectstart = function () {
					return !1
				}, this.screen.style.webkitTouchCallout = "none"
			}
		}, this.getScreen = function () {
			return i.screen
		}, this.setVisible = function (e) {
			this.visible = e, 1 == this.visible ? this.screen.style.visibility = "visible" : this.screen.style.visibility = "hidden"
		}, this.getVisible = function () {
			return this.visible
		}, this.setResizableSizeAfterParent = function () {
			this.screen.style.width = "100%", this.screen.style.height = "100%"
		}, this.getStyle = function () {
			return this.screen.style
		}, this.setOverflow = function (e) {
			i.overflow = e, i.screen.style.overflow = i.overflow
		}, this.setPosition = function (e) {
			i.position = e, i.screen.style.position = i.position
		}, this.setDisplay = function (e) {
			this.display = e, this.screen.style.display = this.display
		}, this.setButtonMode = function (e) {
			this.buttonMode = e, 1 == this.buttonMode ? this.screen.style.cursor = "pointer" : this.screen.style.cursor = "default"
		}, this.setBkColor = function (e) {
			i.screen.style.backgroundColor = e
		}, this.setInnerHTML = function (e) {
			i.innerHTML = e, i.screen.innerHTML = i.innerHTML
		}, this.getInnerHTML = function () {
			return i.innerHTML
		}, this.getRect = function () {
			return i.screen.getBoundingClientRect()
		}, this.setAlpha = function (e) {
			i.alpha = e, "opacity" == i.opacityType ? i.screen.style.opacity = i.alpha : "filter" == i.opacityType && (i.screen.style.filter = "alpha(opacity=" + 100 * i.alpha + ")", i.screen.style.filter = "progid:DXImageTransform.Microsoft.Alpha(Opacity=" + Math.round(100 * i.alpha) + ")")
		}, this.getAlpha = function () {
			return i.alpha
		}, this.getRect = function () {
			return this.screen.getBoundingClientRect()
		}, this.getGlobalX = function () {
			return this.getRect().left
		}, this.getGlobalY = function () {
			return this.getRect().top
		}, this.setX = function (e) {
			i.x = e, i.hasTransform2d_bl ? i.screen.style[i.transform] = "translate(" + i.x + "px," + i.y + "px) scale(" + i.scale + " , " + i.scale + ") rotate(" + i.rotation + "deg)" : i.screen.style.left = i.x + "px"
		}, this.getX = function () {
			return i.x
		}, this.setY = function (e) {
			i.y = e, i.hasTransform2d_bl ? i.screen.style[i.transform] = "translate(" + i.x + "px," + i.y + "px) scale(" + i.scale + " , " + i.scale + ") rotate(" + i.rotation + "deg)" : i.screen.style.top = i.y + "px"
		}, this.getY = function () {
			return i.y
		}, this.setScale2 = function (e) {
			i.scale = e, i.hasTransform2d_bl && (i.screen.style[i.transform] = "translate(" + i.x + "px," + i.y + "px) scale(" + i.scale + " , " + i.scale + ") rotate(" + i.rotation + "deg)")
		}, this.getScale = function () {
			return i.scale
		}, this.setRotation = function (e) {
			i.rotation = e, i.hasTransform2d_bl && (i.screen.style[i.transform] = "translate(" + i.x + "px," + i.y + "px) scale(" + i.scale + " , " + i.scale + ") rotate(" + i.rotation + "deg)")
		}, i.setWidth = function (e) {
			i.w = e, "img" == i.type ? (i.screen.width = i.w, i.screen.style.width = i.w + "px") : i.screen.style.width = i.w + "px"
		}, this.getWidth = function () {
			return "div" == i.type ? 0 != i.screen.offsetWidth ? i.screen.offsetWidth : i.w : "img" == i.type ? 0 != i.screen.offsetWidth ? i.screen.offsetWidth : 0 != i.screen.width ? i.screen.width : i._w : "canvas" == i.type ? 0 != i.screen.offsetWidth ? i.screen.offsetWidth : i.w : void 0
		}, i.setHeight = function (e) {
			i.h = e, "img" == i.type ? (i.screen.height = i.h, i.screen.style.height = i.h + "px") : i.screen.style.height = i.h + "px"
		}, this.getHeight = function () {
			return "div" == i.type ? 0 != i.screen.offsetHeight ? i.screen.offsetHeight : i.h : "img" == i.type ? 0 != i.screen.offsetHeight ? i.screen.offsetHeight : 0 != i.screen.height ? i.screen.height : i.h : "canvas" == i.type ? 0 != i.screen.offsetHeight ? i.screen.offsetHeight : i.h : void 0
		}, this.getNumChildren = function () {
			return i.children_ar.length
		}, this.addChild = function (e) {
			this.contains(e) ? (this.children_ar.splice(FWDUVPUtils.indexOfArray(this.children_ar, e), 1), this.children_ar.push(e), this.screen.appendChild(e.screen)) : (this.children_ar.push(e), this.screen.appendChild(e.screen))
		}, this.removeChild = function (e) {
			if (!this.contains(e)) throw Error("##removeChild()## Child doesn't exist, it can't be removed!");
			this.children_ar.splice(FWDUVPUtils.indexOfArray(this.children_ar, e), 1), this.screen.removeChild(e.screen)
		}, this.contains = function (e) {
			return -1 != FWDUVPUtils.indexOfArray(this.children_ar, e)
		}, this.addChildAtZero = function (e) {
			0 == this.numChildren ? (this.children_ar.push(e), this.screen.appendChild(e.screen)) : (this.screen.insertBefore(e.screen, this.children_ar[0].screen), this.contains(e) && this.children_ar.splice(FWDUVPUtils.indexOfArray(this.children_ar, e), 1), this.children_ar.unshift(e))
		}, this.getChildAt = function (e) {
			if (e < 0 || e > this.numChildren - 1) throw Error("##getChildAt()## Index out of bounds!");
			if (0 == this.numChildren) throw Errror("##getChildAt## Child dose not exist!");
			return this.children_ar[e]
		}, this.removeChildAtZero = function () {
			this.screen.removeChild(this.children_ar[0].screen), this.children_ar.shift()
		}, this.addListener = function (e, t) {
			if (null == e) throw Error("type is required.");
			if ("object" == typeof e) throw Error("type must be of type String.");
			if ("function" != typeof t) throw Error("listener must be of type Function.");
			var o = {};
			o.type = e, o.listener = t, o.target = this, this.listeners.events_ar.push(o)
		}, this.dispatchEvent = function (e, t) {
			if (null == e) throw Error("type is required.");
			if ("object" == typeof e) throw Error("type must be of type String.");
			for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
				if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e) {
					if (t)
						for (var i in t) this.listeners.events_ar[o][i] = t[i];
					this.listeners.events_ar[o].listener.call(this, this.listeners.events_ar[o]);
					break
				}
		}, this.removeListener = function (e, t) {
			if (null == e) throw Error("type is required.");
			if ("object" == typeof e) throw Error("type must be of type String.");
			if ("function" != typeof t) throw Error("listener must be of type Function." + e);
			for (var o = 0, s = this.listeners.events_ar.length; o < s; o++)
				if (this.listeners.events_ar[o].target === this && this.listeners.events_ar[o].type === e && this.listeners.events_ar[o].listener === t) {
					this.listeners.events_ar.splice(o, 1);
					break
				}
		}, this.disposeImage = function () {
			"img" == this.type && (this.screen.src = null)
		}, this.destroy = function () {
			try {
				this.screen.parentNode.removeChild(this.screen)
			} catch (e) {}
			this.screen.onselectstart = null, this.screen.ondragstart = null, this.screen.ontouchstart = null, this.screen.ontouchmove = null, this.screen.ontouchend = null, this.screen.onmouseover = null, this.screen.onmouseout = null, this.screen.onmouseup = null, this.screen.onmousedown = null, this.screen.onmousemove = null, this.screen.onclick = null, delete this.screen, delete this.style, delete this.rect, delete this.selectable, delete this.buttonMode, delete this.position, delete this.overflow, delete this.visible, delete this.innerHTML, delete this.numChildren, delete this.x, delete this.y, delete this.w, delete this.h, delete this.opacityType, delete this.isHtml5_bl, delete this.hasTransform2d_bl, this.children_ar = null, this.style = null, this.screen = null, this.numChildren = null, this.transform = null, this.position = null, this.overflow = null, this.display = null, this.visible = null, this.buttonMode = null, this.globalX = null, this.globalY = null, this.x = null, this.y = null, this.w = null, this.h = null, this.rect = null, this.alpha = null, this.innerHTML = null, this.opacityType = null, this.isHtml5_bl = null, this.hasTransform3d_bl = null, this.hasTransform2d_bl = null, i = null
		}, this.init()
	},
	function (e) {
		var t = function (o, s) {
			var i = this;
			t.prototype;
			this.video_el = null, this.sourcePath_str = null, this.bk_do = null, this.controllerHeight = o.data.controllerHeight, this.stageWidth = 0, this.stageHeight = 0, this.lastPercentPlayed = 0, this.volume = s, this.curDuration = 0, this.countNormalMp3Errors = 0, this.countShoutCastErrors = 0, this.maxShoutCastCountErrors = 5, this.maxNormalCountErrors = 1, this.disableClickForAWhileId_to, this.showErrorWithDelayId_to, this.playWithDelayId_to, this.disableClick_bl = !1, this.allowScrubing_bl = !1, this.hasError_bl = !0, this.isPlaying_bl = !1, this.isStopped_bl = !0, this.hasPlayedOnce_bl = !1, this.isStartEventDispatched_bl = !1, this.isSafeToBeControlled_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
				i.setBkColor(o.videoBackgroundColor_str), i.setupVideo()
			}, this.setupVideo = function () {
				null == i.video_el && (i.video_el = document.createElement("video"), i.screen.appendChild(i.video_el), i.video_el.controls = !1, i.video_el.volume = i.volume, i.video_el.WebKitPlaysInline = !0, i.video_el.playsinline = !0, i.video_el.setAttribute("playsinline", ""), i.video_el.setAttribute("webkit-playsinline", ""), i.video_el.style.position = "relative", i.video_el.style.left = "0px", i.video_el.style.top = "0px", i.video_el.style.width = "100%", i.video_el.style.height = "100%", i.video_el.style.margin = "0px", i.video_el.style.padding = "0px", i.video_el.style.maxWidth = "none", i.video_el.style.maxHeight = "none", i.video_el.style.border = "none", i.video_el.style.lineHeight = "0", i.video_el.style.msTouchAction = "none", i.screen.appendChild(i.video_el)), i.video_el.addEventListener("error", i.errorHandler), i.video_el.addEventListener("canplay", i.safeToBeControlled), i.video_el.addEventListener("canplaythrough", i.safeToBeControlled), i.video_el.addEventListener("progress", i.updateProgress), i.video_el.addEventListener("timeupdate", i.updateVideo), i.video_el.addEventListener("pause", i.pauseHandler), i.video_el.addEventListener("play", i.playHandler), FWDUVPUtils.isIE || i.video_el.addEventListener("waiting", i.startToBuffer), i.video_el.addEventListener("playing", i.stopToBuffer), i.video_el.addEventListener("ended", i.endedHandler), i.resizeAndPosition()
			}, this.destroyVideo = function () {
				clearTimeout(i.showErrorWithDelayId_to), i.video_el && (i.video_el.removeEventListener("error", i.errorHandler), i.video_el.removeEventListener("canplay", i.safeToBeControlled), i.video_el.removeEventListener("canplaythrough", i.safeToBeControlled), i.video_el.removeEventListener("progress", i.updateProgress), i.video_el.removeEventListener("timeupdate", i.updateVideo), i.video_el.removeEventListener("pause", i.pauseHandler), i.video_el.removeEventListener("play", i.playHandler), FWDUVPUtils.isIE || i.video_el.removeEventListener("waiting", i.startToBuffer), i.video_el.removeEventListener("playing", i.stopToBuffer), i.video_el.removeEventListener("ended", i.endedHandler), i.isMobile_bl ? (i.screen.removeChild(i.video_el), i.video_el = null) : (i.video_el.style.visibility = "hidden", i.video_el.src = "", i.video_el.load()))
			}, this.startToBuffer = function (e) {
				i.dispatchEvent(t.START_TO_BUFFER)
			}, this.stopToBuffer = function () {
				i.dispatchEvent(t.STOP_TO_BUFFER)
			}, this.errorHandler = function (o) {
				var s;
				i.hasError_bl = !0, s = 0 == i.video_el.networkState ? "error 'self.video_el.networkState = 0'" : 1 == i.video_el.networkState ? "error 'self.video_el.networkState = 1'" : 2 == i.video_el.networkState ? "'self.video_el.networkState = 2'" : 3 == i.video_el.networkState ? "source not found <font color='#ff0000'>" + i.sourcePath_str + "</font>" : o, e.console && e.console.log(i.video_el.networkState), clearTimeout(i.showErrorWithDelayId_to), i.showErrorWithDelayId_to = setTimeout(function () {
					i.dispatchEvent(t.ERROR, {
						text: s
					})
				}, 200)
			}, this.resizeAndPosition = function (e, t, s, l) {
				e && (i.stageWidth = e, i.stageHeight = t), i.setX(s), i.setY(l), i.setWidth(i.stageWidth), i.setHeight(i.stageHeight), o.is360 && i.renderer && (i.camera.aspect = i.stageWidth / i.stageHeight, i.camera.updateProjectionMatrix(), i.renderer.setSize(i.stageWidth, i.stageHeight))
			}, this.setSource = function (e) {
				i.sourcePath_str = e, o.is360 && i.video_el && (i.video_el.style.visibility = "hidden"), i.video_el && i.stop(), i.video_el && FWDUVPUtils.isIphone && (i.video_el.src = e)
			}, this.play = function (e) {
				if (clearTimeout(i.playWithDelayId_to), FWDUVPlayer.curInstance = o, i.isStopped_bl) i.initVideo(), i.setVolume(), i.video_el.src = i.sourcePath_str, i.isMobile_bl ? i.play() : i.playWithDelayId_to = setTimeout(i.play, 1e3), i.hastStaredToPlayHLS_bl = !0, i.startToBuffer(!0), i.isPlaying_bl = !0;
				else if (!i.video_el.ended || e) try {
					i.hastStaredToPlayHLS_bl = !0, i.isPlaying_bl = !0, i.hasPlayedOnce_bl = !0, i.video_el.play(), i.safeToBeControlled(), FWDUVPUtils.isIE && i.dispatchEvent(t.PLAY)
				} catch (e) {}
				o.is360 && i.add360Vid()
			}, this.initVideo = function () {
				i.isPlaying_bl = !1, i.hasError_bl = !1, i.allowScrubing_bl = !1, i.isStopped_bl = !1, i.setupVideo(), i.setVolume(), i.video_el.src = i.sourcePath_str
			}, this.pause = function () {
				if (null != i && !i.isStopped_bl && !i.hasError_bl && !i.video_el.ended) try {
					i.video_el.pause(), i.isPlaying_bl = !1, FWDUVPUtils.isIE && i.dispatchEvent(t.PAUSE)
				} catch (e) {}
			}, this.togglePlayPause = function () {
				null != i && i.isSafeToBeControlled_bl && (i.isPlaying_bl ? i.pause() : i.play())
			}, this.resume = function () {
				i.isStopped_bl || i.play()
			}, this.pauseHandler = function () {
				i.allowScrubing_bl || i.dispatchEvent(t.PAUSE)
			}, this.playHandler = function () {
				i.allowScrubing_bl || (i.isStartEventDispatched_bl || (i.dispatchEvent(t.START), i.isStartEventDispatched_bl = !0), o.is360 && i.start360Render(), i.dispatchEvent(t.PLAY))
			}, this.endedHandler = function () {
				i.dispatchEvent(t.PLAY_COMPLETE)
			}, this.stop = function (e) {
				(null != i && null != i.video_el && !i.isStopped_bl || e) && (i.isPlaying_bl = !1, i.isStopped_bl = !0, i.hasPlayedOnce_bl = !0, i.hastStaredToPlayHLS_bl = !1, i.isSafeToBeControlled_bl = !1, i.isStartEventDispatched_bl = !1, clearTimeout(i.playWithDelayId_to), i.stop360Render(), i.destroyVideo(), i.dispatchEvent(t.LOAD_PROGRESS, {
					percent: 0
				}), i.dispatchEvent(t.UPDATE_TIME, {
					curTime: "00:00",
					totalTime: "00:00"
				}), i.dispatchEvent(t.STOP), i.stopToBuffer())
			}, this.safeToBeControlled = function () {
				(o.videoType_str != FWDUVPlayer.HLS_JS || i.hastStaredToPlayHLS_bl) && (i.stopToScrub(), i.isSafeToBeControlled_bl || (i.hasHours_bl = Math.floor(i.video_el.duration / 3600) > 0, i.isPlaying_bl = !0, i.isSafeToBeControlled_bl = !0, o.is360 || (i.video_el.style.visibility = "visible"), setTimeout(function () {
					i.renderer && (i.renderer.domElement.style.left = "0px")
				}, 1e3), i.dispatchEvent(t.SAFE_TO_SCRUBB)))
			}, this.updateProgress = function () {
				if (o.videoType_str != FWDUVPlayer.HLS_JS || i.hastStaredToPlayHLS_bl) {
					var e = 0;
					i.video_el.buffered.length > 0 && (e = i.video_el.buffered.end(i.video_el.buffered.length - 1).toFixed(1) / i.video_el.duration.toFixed(1), !isNaN(e) && e || (e = 0)), 1 == e && i.video_el.removeEventListener("progress", i.updateProgress), i.dispatchEvent(t.LOAD_PROGRESS, {
						percent: e
					})
				}
			}, this.updateVideo = function () {
				var e;
				i.allowScrubing_bl || (e = i.video_el.currentTime / i.video_el.duration, i.dispatchEvent(t.UPDATE, {
					percent: e
				}));
				var o = t.formatTime(i.video_el.duration),
					s = t.formatTime(i.video_el.currentTime);
				isNaN(i.video_el.duration) ? i.dispatchEvent(t.UPDATE_TIME, {
					curTime: "00:00",
					totalTime: "00:00",
					seconds: 0
				}) : i.dispatchEvent(t.UPDATE_TIME, {
					curTime: s,
					totalTime: o,
					seconds: parseInt(i.video_el.currentTime)
				}), i.lastPercentPlayed = e, i.curDuration = s
			}, this.startToScrub = function () {
				i.allowScrubing_bl = !0
			}, this.stopToScrub = function () {
				i.allowScrubing_bl = !1
			}, this.scrubbAtTime = function (e) {
				i.video_el.currentTime = e;
				var o = t.formatTime(i.video_el.duration),
					s = t.formatTime(i.video_el.currentTime);
				i.dispatchEvent(t.UPDATE_TIME, {
					curTime: s,
					totalTime: o
				})
			}, this.scrub = function (e, o) {
				o && i.startToScrub();
				try {
					i.video_el.currentTime = i.video_el.duration * e;
					var s = t.formatTime(i.video_el.duration),
						l = t.formatTime(i.video_el.currentTime);
					i.dispatchEvent(t.UPDATE_TIME, {
						curTime: l,
						totalTime: s
					})
				} catch (o) {}
			}, this.replay = function () {
				i.scrub(0), i.play()
			}, this.setVolume = function (e) {
				e && (i.volume = e), i.video_el && (i.video_el.volume = i.volume)
			}, this.setPlaybackRate = function (e) {
				i.video_el && (i.video_el.defaultPlaybackRate = e, i.video_el.playbackRate = e)
			}, this.add360Vid = function () {
				i.renderer ? i.screen.appendChild(i.renderer.domElement) : null != e.THREE && (i.renderer = new THREE.WebGLRenderer({
					antialias: !0
				}), i.renderer.setSize(i.stageWidth, i.stageHeight), i.renderer.domElement.style.position = "absolute", i.renderer.domElement.style.left = "0px", i.renderer.domElement.style.top = "0px", i.renderer.domElement.style.margin = "0px", i.renderer.domElement.style.padding = "0px", i.renderer.domElement.style.maxWidth = "none", i.renderer.domElement.style.maxHeight = "none", i.renderer.domElement.style.border = "none", i.renderer.domElement.style.lineHeight = "1", i.renderer.domElement.style.backgroundColor = "transparent", i.renderer.domElement.style.backfaceVisibility = "hidden", i.renderer.domElement.style.webkitBackfaceVisibility = "hidden", i.renderer.domElement.style.MozBackfaceVisibility = "hidden", i.renderer.domElement.style.MozImageRendering = "optimizeSpeed", i.renderer.domElement.style.WebkitImageRendering = "optimizeSpeed", i.screen.appendChild(i.renderer.domElement), i.scene = new THREE.Scene, i.video_el.setAttribute("crossorigin", "anonymous"), i.canvas = document.createElement("canvas"), i.context = i.canvas.getContext("2d"), FWDUVPUtils.isFirefox ? i.videoTexture = new THREE.Texture(i.video_el) : i.videoTexture = new THREE.Texture(i.canvas), i.videoTexture.minFilter = THREE.LinearFilter, i.videoTexture.magFilter = THREE.LinearFilter, i.videoTexture.format = THREE.RGBFormat, i.cubeGeometry = new THREE.SphereGeometry(500, 60, 40), i.sphereMat = new THREE.MeshBasicMaterial({
					map: i.videoTexture
				}), i.sphereMat.side = THREE.BackSide, i.cube = new THREE.Mesh(i.cubeGeometry, i.sphereMat), i.scene.add(i.cube), i.camera = new THREE.PerspectiveCamera(45, i.stageWidth / i.stageHeight, .1, 1e4), i.camera.position.y = 0, i.camera.position.z = 500, i.camera.position.x = 0, i.scene.add(i.camera), i.controls = new THREE.OrbitControls(i.camera, o.dumyClick_do.screen), i.controls.enableDamping = !0, i.controls.enableZoom = !1, i.controls.dampingFactor = .25, i.controls.maxDistance = 500, i.controls.minDistance = 500, i.controls.rotateLeft(90 * Math.PI / 180), i.controls.enabled = !0, i.render())
			}, this.start360Render = function () {
				i.is360Rendering_bl = !0, cancelAnimationFrame(i.requestId), i.requestId = requestAnimationFrame(i.render)
			}, this.stop360Render = function () {
				if (i.is360Rendering_bl = !1, i.camera) {
					i.camera.position.y = 0, i.camera.position.z = 500, i.camera.position.x = 0, i.renderer.domElement.style.left = "-10000px", cancelAnimationFrame(i.requestId);
					try {
						i.screen.removeChild(i.renderer.domElement)
					} catch (e) {}
				}
			}, this.render = function () {
				i.is360Rendering_bl && i.camera && o.is360 ? (i.video_el.readyState === i.video_el.HAVE_ENOUGH_DATA && (i.videoTexture.needsUpdate = !0), FWDUVPUtils.isFirefox || !i.context || i.isStopped_bl || (0 != i.video_el.videoWidth && (i.canvas.width = i.video_el.videoWidth, i.canvas.height = i.video_el.videoHeight), i.context.save(), i.context.scale(-1, 1), i.context.drawImage(i.video_el, 0, 0, -1 * i.canvas.width, i.canvas.height), i.context.restore()), i.controls.update(), i.renderer.render(i.scene, i.camera), i.requestId = requestAnimationFrame(i.render)) : cancelAnimationFrame(i.requestId)
			}, t.formatTime = function (e) {
				var t = Math.floor(e / 3600),
					o = e % 3600,
					s = Math.floor(o / 60),
					l = o % 60,
					n = Math.ceil(l);
				return s = s >= 10 ? s : "0" + s, n = n >= 10 ? n : "0" + n, isNaN(n) ? "00:00" : i.hasHours_bl ? t + ":" + s + ":" + n : s + ":" + n
			}, this.init()
		};
		t.setPrototype = function () {
			t.prototype = new FWDUVPDisplayObject("div")
		}, t.ERROR = "error", t.UPDATE = "update", t.UPDATE_TIME = "updateTime", t.SAFE_TO_SCRUBB = "safeToControll", t.LOAD_PROGRESS = "loadProgress", t.START = "start", t.PLAY = "play", t.PAUSE = "pause", t.STOP = "stop", t.PLAY_COMPLETE = "playComplete", t.START_TO_BUFFER = "startToBuffer", t.STOP_TO_BUFFER = "stopToBuffer", e.FWDUVPVideoScreen = t
	}(window),
	function (e) {
		var t = function (e, o) {
			var s = this;
			t.prototype;
			this.iframe_do = null, this.vimeoPlayer = null, this.lastQuality_str = "auto", this.volume = o, this.updateVideoId_int, this.updatePreloadId_int, this.controllerHeight = e.data.controllerHeight, this.hasBeenCreatedOnce_bl = !0, this.hasHours_bl = !1, this.allowScrubing_bl = !1, this.hasError_bl = !1, this.isPlaying_bl = !1, this.isStopped_bl = !0, this.isStartEventDispatched_bl = !1, this.isSafeToBeControlled_bl = !1, this.isPausedInEvent_bl = !0, this.isShowed_bl = !0, this.isCued_bl = !1, this.isVideoLoaded_bl = !1, this.isReady_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
				s.hasTransform3d_bl = !1, s.hasTransform2d_bl = !1, s.setBackfaceVisibility(), e.videoHolder_do.addChildAt(s, 0), s.resizeAndPosition(), s.setupVideo(), s.setupDisableClick(), s.setBkColor("#000000")
			}, this.setupDisableClick = function () {
				s.disableClick_do = new FWDUVPDisplayObject("div"), s.disableClick_do.setBkColor(e.backgroundColor_str), s.disableClick_do.setAlpha(1e-8), s.addChild(s.disableClick_do)
			}, this.showDisable = function () {
				e.tempVidStageWidth && s.disableClick_do.w != s.stageWidth && (s.disableClick_do.setWidth(e.tempVidStageWidth), FWDUVPUtils.isIphone ? s.disableClick_do.setHeight(e.tempVidStageHeight - s.controllerHeight) : s.disableClick_do.setHeight(e.tempVidStageHeight))
			}, this.hideDisable = function () {
				0 != s.disableClick_do.w && (s.disableClick_do.setWidth(0), s.disableClick_do.setHeight(0))
			}, this.setupVideo = function () {
				s.vimeoPlayer || (s.iframe_do = new FWDUVPDisplayObject("IFRAME"), s.iframe_do.hasTransform3d_bl = !1, s.iframe_do.hasTransform2d_bl = !1, s.iframe_do.screen.setAttribute("id", e.instanceName_str + "vimeo"), s.isMobile_bl && (s.iframe_do.screen.setAttribute("webkitallowfullscreen", "1"), s.iframe_do.screen.setAttribute("mozallowfullscreen", "1"), s.iframe_do.screen.setAttribute("allowfullscreen", "1")), s.iframe_do.screen.setAttribute("src", "https://player.vimeo.com/video/76979871?player_id=" + e.instanceName_str + "vimeo&autoplay=0"), s.iframe_do.getStyle().width = "100%", s.iframe_do.getStyle().height = "100%", s.iframe_do.setBackfaceVisibility(), s.addChild(s.iframe_do), s.vimeoPlayer = new Vimeo.Player(s.iframe_do.screen), s.vimeoPlayer.on("play", function (e) {
					s.playHandler()
				}), s.vimeoPlayer.on("pause", function (e) {
					s.pauseHandler()
				}), s.vimeoPlayer.on("loadProgress", function (e) {
					s.loadProgressHandler()
				}), s.vimeoPlayer.on("ended", function (e) {
					s.finishHandler()
				}), s.vimeoPlayer.on("loaded", function (e) {
					s.loadedHandler()
				}), s.vimeoPlayer.ready().then(function () {
					s.readyHandler()
				}), s.blackOverlay_do = new FWDUVPDisplayObject("div"), s.blackOverlay_do.getStyle().backgroundColor = "#000000", s.blackOverlay_do.getStyle().width = "100%", s.blackOverlay_do.getStyle().height = "100%", s.addChild(s.blackOverlay_do))
			}, this.resizeAndPosition = function () {
				e.tempVidStageWidth && (s.setWidth(e.tempVidStageWidth), s.setHeight(e.tempVidStageHeight - s.controllerHeight))
			}, this.setSource = function (o) {
				o && (s.sourcePath_str = o), s.stop();
				var i = s.sourcePath_str.match(/[^\/]+$/i);
				s.vimeoPlayer.loadVideo(i).then(function (t) {
					(!e.isMobile_bl && (e.data.autoPlay_bl || e.isThumbClick_bl) || e.isAdd_bl || e.wasAdd_bl) && e.play(), s.setVolume(e.volume)
				}).catch(function (e) {
					console && console.log(e), s.displayErrorId_to = setTimeout(function () {
						s.dispatchEvent(t.ERROR, {
							error: e.name
						})
					}, 2e3), console && console.log(e)
				})
			}, this.readyHandler = function () {
				if (clearTimeout(s.intitErrorId_to), s.contains(s.blackOverlay_do) && (clearTimeout(s.removeChildWithDelayId_to), s.removeChildWithDelayId_to = setTimeout(function () {
						s.removeChild(s.blackOverlay_do)
					}, 1500)), s.resizeAndPosition(), s.isReady_bl) {
					try {
						s.vimeoPlayer.api("setColor", "#FFFFFF")
					} catch (e) {}
					return e.videoType_str == FWDUVPlayer.VIMEO && s.setX(0), void(e.data.autoPlay_bl && e.play())
				}
				s.isReady_bl = !0, s.dispatchEvent(t.READY)
			}, this.loadedHandler = function () {
				s.isVideoLoaded_bl = !0
			}, this.playHandler = function () {
				clearInterval(s.startToPlayWithDelayId_to), clearTimeout(s.displayErrorId_to), s.isStopped_bl = !1, s.isSafeToBeControlled_bl = !0, s.isPlaying_bl = !0, s.startToUpdate(), s.dispatchEvent(t.SAFE_TO_SCRUBB), s.dispatchEvent(t.PLAY), s.hasHours_bl = Math.floor(s.getDuration() / 3600) > 0
			}, this.loadProgressHandler = function (e) {
				s.isShowed_bl || s.dispatchEvent(t.LOAD_PROGRESS, {
					percent: e.percent
				})
			}, this.pauseHandler = function () {
				s.isPlaying_bl && (s.isPlaying_bl = !1, clearInterval(s.startToPlayWithDelayId_to), s.dispatchEvent(t.PAUSE), s.stopToUpdate())
			}, this.finishHandler = function () {
				e.data.loop_bl && (s.stop(), setTimeout(s.play, 200)), s.dispatchEvent(t.PLAY_COMPLETE)
			}, this.play = function (t) {
				FWDUVPlayer.curInstance = e;
				s.hasError_bl = !1, e.prevVideoType_str, FWDUVPlayer.VIMEO, s.vimeoPlayer.play(), s.isMobile_bl || (s.isStopped_bl = !1)
			}, this.pause = function () {
				s.isStopped_bl || s.hasError_bl || (clearInterval(s.startToPlayWithDelayId_to), s.vimeoPlayer.pause(), s.stopToUpdate())
			}, this.togglePlayPause = function () {
				s.isPlaying_bl ? s.pause() : s.play()
			}, this.resume = function () {
				s.isStopped_bl || s.play()
			}, this.startToUpdate = function () {
				clearInterval(s.updateVideoId_int), s.updateVideoId_int = setInterval(s.updateVideo, 500)
			}, this.stopToUpdate = function () {
				clearInterval(s.updateVideoId_int)
			}, this.updateVideo = function () {
				var e;
				if (s.vimeoPlayer) {
					var o = s.formatTime(s.getDuration()),
						i = s.formatTime(s.getCurrentTime());
					e = i / o, s.dispatchEvent(FWDUVPYoutubeScreen.UPDATE, {
						percent: e
					}), s.dispatchEvent(t.UPDATE_TIME, {
						curTime: i,
						totalTime: o,
						seconds: parseInt(s.getCurrentTime())
					})
				} else stopToUpdate()
			}, this.stop = function (e) {
				s.isVideoLoaded_bl = !1, s.isStopped_bl || (clearInterval(s.startToPlayWithDelayId_to), clearTimeout(s.displayErrorId_to), s.stopVideo(), s.isPlaying_bl = !1, s.isStopped_bl = !0, s.isCued_bl = !1, s.allowScrubing_bl = !1, s.isSafeToBeControlled_bl = !1, s.isPausedInEvent_bl = !0, s.stopToUpdate(), e || (s.stopVideo(), s.dispatchEvent(t.STOP)))
			}, this.destroy = function () {
				s.iframe_do && (s.iframe_do.screen.removeAttribute("id", e.instanceName_str + "vimeo"), s.removeChild(s.iframe_do), s.iframe_do.destroy(), s.iframe_do = null), s.vimeoPlayer = null
			}, this.stopVideo = function () {
				s.vimeoPlayer.unload().then(function () {}).catch(function (e) {})
			}, this.startToScrub = function () {
				s.isSafeToBeControlled_bl && (s.allowScrubing_bl = !0)
			}, this.stopToScrub = function () {
				s.isSafeToBeControlled_bl && (s.allowScrubing_bl = !1)
			}, this.scrubbAtTime = function (e) {
				s.vimeoPlayer.setCurrentTime(e).then(function (e) {})
			}, this.scrub = function (e) {
				s.isSafeToBeControlled_bl && s.vimeoPlayer.setCurrentTime(e * s.getDuration()).then(function (e) {})
			}, this.setVolume = function (e) {
				e && (s.volume = e), s.vimeoPlayer && s.vimeoPlayer.setVolume(e)
			}, this.getDuration = function () {
				if (s.isSafeToBeControlled_bl) return s.vimeoPlayer.getDuration().then(function (e) {
					s.duration = Math.round(e)
				}), s.duration
			}, this.getCurrentTime = function () {
				if (s.isSafeToBeControlled_bl) return s.vimeoPlayer.getCurrentTime().then(function (e) {
					s.currentTime = Math.round(e)
				}), s.currentTime
			}, this.formatTime = function (e) {
				var t = Math.floor(e / 3600),
					o = e % 3600,
					i = Math.floor(o / 60),
					l = o % 60,
					n = Math.ceil(l);
				return i = i >= 10 ? i : "0" + i, n = n >= 10 ? n : "0" + n, isNaN(n) ? "00:00" : s.hasHours_bl ? t + ":" + i + ":" + n : i + ":" + n
			}, this.init()
		};
		t.setPrototype = function () {
			t.prototype = new FWDUVPDisplayObject("div")
		}, t.SAFE_TO_SCRUBB = "safeToScrub", t.READY = "ready", t.ERROR = "initError", t.UPDATE = "update", t.UPDATE_TIME = "updateTime", t.LOAD_PROGRESS = "loadProgress", t.PLAY = "play", t.PAUSE = "pause", t.STOP = "stop", t.PLAY_COMPLETE = "playComplete", t.CUED = "cued", t.QUALITY_CHANGE = "qualityChange", e.FWDUVPVimeoScreen = t
	}(window),
	function (e) {
		var t = function (e, o, s, i, l, n) {
			var r = this,
				a = t.prototype;
			this.nImg = e, this.sPath_str = o, this.dPath_str = s, this.n_sdo, this.s_sdo, this.d_sdo, this.toolTipLabel_str, this.totalWidth = this.nImg.width, this.totalHeight = this.nImg.height, this.useHEXColorsForSkin_bl = i, this.normalButtonsColor_str = l, this.selectedButtonsColor_str = n, this.isSetToDisabledState_bl = !1, this.isDisabled_bl = !1, this.isSelectedFinal_bl = !1, this.isActive_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.hasPointerEvent_bl = FWDUVPUtils.hasPointerEvent, this.allowToCreateSecondButton_bl = !r.isMobile_bl || r.hasPointerEvent_bl, r.init = function () {
				r.setupMainContainers()
			}, r.setupMainContainers = function () {
				if (r.useHEXColorsForSkin_bl ? (r.n_sdo = new FWDUVPTransformDisplayObject("div"), r.n_sdo.setWidth(r.totalWidth), r.n_sdo.setHeight(r.totalHeight), r.n_sdo_canvas = FWDUVPUtils.getCanvasWithModifiedColor(r.nImg, r.normalButtonsColor_str).canvas, r.n_sdo.screen.appendChild(r.n_sdo_canvas), r.addChild(r.n_sdo)) : (r.n_sdo = new FWDUVPTransformDisplayObject("img"), r.n_sdo.setScreen(r.nImg), r.addChild(r.n_sdo)), r.allowToCreateSecondButton_bl) {
					r.img1 = new Image, r.img1.src = r.sPath_str;
					var e = new Image;
					r.sImg = e, r.useHEXColorsForSkin_bl ? (r.s_sdo = new FWDUVPTransformDisplayObject("div"), r.s_sdo.setWidth(r.totalWidth), r.s_sdo.setHeight(r.totalHeight), r.img1.onload = function () {
						r.s_sdo_canvas = FWDUVPUtils.getCanvasWithModifiedColor(r.img1, r.selectedButtonsColor_str).canvas, r.s_sdo.screen.appendChild(r.s_sdo_canvas)
					}, r.s_sdo.setAlpha(0), r.addChild(r.s_sdo)) : (r.s_sdo = new FWDUVPDisplayObject("img"), r.s_sdo.setScreen(r.img1), r.s_sdo.setWidth(r.totalWidth), r.s_sdo.setHeight(r.totalHeight), r.s_sdo.setAlpha(0), r.addChild(r.s_sdo)), r.dPath_str && (e.src = r.dPath_str, r.d_sdo = new FWDUVPDisplayObject("img"), r.d_sdo.setScreen(e), r.d_sdo.setWidth(r.totalWidth), r.d_sdo.setHeight(r.totalHeight), r.d_sdo.setX(-100), r.addChild(r.d_sdo))
				}
				r.setWidth(r.totalWidth), r.setHeight(r.totalHeight), r.setButtonMode(!0), r.hasPointerEvent_bl ? (r.screen.addEventListener("pointerup", r.onMouseUp), r.screen.addEventListener("pointerover", r.onMouseOver), r.screen.addEventListener("pointerout", r.onMouseOut)) : r.screen.addEventListener && (r.screen.addEventListener("mouseover", r.onMouseOver), r.screen.addEventListener("mouseout", r.onMouseOut), r.screen.addEventListener("mouseup", r.onMouseUp), r.screen.addEventListener("touchend", r.onMouseUp))
			}, r.onMouseOver = function (e) {
				if (r.dispatchEvent(t.SHOW_TOOLTIP, {
						e: e
					}), !e.pointerType || e.pointerType == e.MSPOINTER_TYPE_MOUSE) {
					if (r.isDisabled_bl || r.isSelectedFinal_bl) return;
					r.dispatchEvent(t.MOUSE_OVER, {
						e: e
					}), FWDAnimation.killTweensOf(r.s_sdo), FWDAnimation.to(r.s_sdo, .5, {
						alpha: 1,
						delay: .1,
						ease: Expo.easeOut
					})
				}
			}, r.onMouseOut = function (e) {
				if (!e.pointerType || e.pointerType == e.MSPOINTER_TYPE_MOUSE) {
					if (r.isDisabled_bl || r.isSelectedFinal_bl) return;
					r.dispatchEvent(t.MOUSE_OUT, {
						e: e
					}), FWDAnimation.killTweensOf(r.s_sdo), FWDAnimation.to(r.s_sdo, .5, {
						alpha: 0,
						ease: Expo.easeOut
					})
				}
			}, r.onMouseUp = function (e) {
				e.preventDefault && e.preventDefault(), r.isDisabled_bl || 2 == e.button || r.isSelectedFinal_bl || r.dispatchEvent(t.MOUSE_UP, {
					e: e
				})
			}, this.setNormalState = function (e) {
				r.isSelected_bl && (r.isSelected_bl = !1, FWDAnimation.killTweensOf(r.s_sdo), e ? FWDAnimation.to(r.s_sdo, .5, {
					alpha: 0,
					delay: .1,
					ease: Expo.easeOut
				}) : r.s_sdo.setAlpha(0))
			}, this.setSelectedState = function (e) {
				r.isSelected_bl || (r.isSelected_bl = !0, FWDAnimation.killTweensOf(r.s_sdo), e ? FWDAnimation.to(r.s_sdo, .5, {
					alpha: 1,
					delay: .1,
					ease: Expo.easeOut
				}) : r.s_sdo.setAlpha(1))
			}, r.setSelctedFinal = function () {
				r.isSelectedFinal_bl = !0, FWDAnimation.killTweensOf(r.s_sdo), FWDAnimation.to(r.s_sdo, .8, {
					alpha: 1,
					ease: Expo.easeOut
				}), r.setButtonMode(!1)
			}, r.setUnselctedFinal = function () {
				r.isSelectedFinal_bl = !1, FWDAnimation.to(r.s_sdo, .8, {
					alpha: 0,
					delay: .1,
					ease: Expo.easeOut
				}), r.setButtonMode(!0)
			}, this.setDisabledState = function () {
				r.isSetToDisabledState_bl || (r.d_sdo.setX(0), r.isSetToDisabledState_bl = !0, r.isMobile_bl ? r.d_sdo.setX(0) : (FWDAnimation.killTweensOf(r.d_sdo), FWDAnimation.to(r.d_sdo, .8, {
					alpha: 1,
					ease: Expo.easeOut
				})))
			}, this.setEnabledState = function () {
				r.isSetToDisabledState_bl && (r.isSetToDisabledState_bl = !1, r.d_sdo.setX(-100), r.isMobile_bl ? r.d_sdo.setX(-100) : (FWDAnimation.killTweensOf(r.d_sdo), FWDAnimation.to(r.d_sdo, .8, {
					alpha: 0,
					delay: .1,
					ease: Expo.easeOut
				})))
			}, this.disable = function () {
				r.isDisabled_bl = !0, r.setButtonMode(!1)
			}, this.enable = function () {
				r.isDisabled_bl = !1, r.setButtonMode(!0)
			}, r.updateHEXColors = function (e, t) {
				FWDUVPUtils.changeCanvasHEXColor(r.nImg, r.n_sdo_canvas, e), FWDUVPUtils.changeCanvasHEXColor(r.img1, r.s_sdo_canvas, t)
			}, r.destroy = function () {
				r.isMobile_bl ? r.hasPointerEvent_bl ? (r.screen.removeEventListener("pointerdown", r.onMouseUp), r.screen.removeEventListener("pointerover", r.onMouseOver), r.screen.removeEventListener("pointerout", r.onMouseOut)) : r.screen.removeEventListener("touchend", r.onMouseUp) : r.screen.removeEventListener ? (r.screen.removeEventListener("mouseover", r.onMouseOver), r.screen.removeEventListener("mouseout", r.onMouseOut), r.screen.removeEventListener("mousedown", r.onMouseUp)) : r.screen.detachEvent && (r.screen.detachEvent("onmouseover", r.onMouseOver), r.screen.detachEvent("onmouseout", r.onMouseOut), r.screen.detachEvent("onmousedown", r.onMouseUp)), FWDAnimation.killTweensOf(r.s_sdo), r.n_sdo.destroy(), r.s_sdo.destroy(), r.d_sdo && (FWDAnimation.killTweensOf(r.d_sdo), r.d_sdo.destroy()), r.nImg = null, r.sImg = null, r.dImg = null, r.n_sdo = null, r.s_sdo = null, r.d_sdo = null, e = null, sImg = null, dImg = null, r.toolTipLabel_str = null, r.init = null, r.setupMainContainers = null, r.onMouseOver = null, r.onMouseOut = null, r.onClick = null, r.onMouseDown = null, r.setSelctedFinal = null, r.setUnselctedFinal = null, r.setInnerHTML(""), a.destroy(), r = null, a = null, t.prototype = null
			}, r.init()
		};
		t.setPrototype = function () {
			t.prototype = null, t.prototype = new FWDUVPDisplayObject("div")
		}, t.SHOW_TOOLTIP = "showToolTip", t.CLICK = "onClick", t.MOUSE_OVER = "onMouseOver", t.MOUSE_OUT = "onMouseOut", t.MOUSE_UP = "onMouseDown", t.prototype = null, e.FWDUVPVolumeButton = t
	}(window),
	function (e) {
		var t = function (e, o) {
			var s = this;
			t.prototype;
			this.videoHolder_do = null, this.ytb = null, this.lastQuality_str = "auto", this.volume = o, this.updateVideoId_int, this.updatePreloadId_int, this.controllerHeight = e.data.controllerHeight, this.hasHours_bl = !1, this.hasBeenCreatedOnce_bl = !1, this.allowScrubing_bl = !1, this.hasError_bl = !1, this.isPlaying_bl = !1, this.isStopped_bl = !0, this.isStartEventDispatched_bl = !1, this.isSafeToBeControlled_bl = !1, this.isPausedInEvent_bl = !0, this.isShowed_bl = !0, this.isQualityArrayDisapatched_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.init = function () {
				s.hasTransform3d_bl = !1, s.hasTransform2d_bl = !1, s.setBkColor("#000000"), s.setBackfaceVisibility(), e.videoHolder_do.addChildAt(s, 0), s.resizeAndPosition(), s.setupVideo()
			}, this.setupVideo = function () {
				s.ytb || (s.videoHolder_do = new FWDUVPDisplayObject("div"), s.videoHolder_do.hasTransform3d_bl = !1, s.videoHolder_do.hasTransform2d_bl = !1, s.videoHolder_do.screen.setAttribute("id", e.instanceName_str + "youtube"), s.videoHolder_do.getStyle().width = "100%", s.videoHolder_do.getStyle().height = "100%", s.videoHolder_do.setBackfaceVisibility(), s.addChild(s.videoHolder_do), s.ytb = new YT.Player(e.instanceName_str + "youtube", {
					width: "100%",
					height: "100%",
					playerVars: {
						controls: 0,
						disablekb: 0,
						loop: 0,
						autoplay: 0,
						wmode: "opaque",
						showinfo: 0,
						rel: 0,
						modestbranding: 1,
						iv_load_policy: 3,
						cc_load_policy: 0,
						fs: 0,
						html5: 0,
						playsinline: 1
					},
					events: {
						onReady: s.playerReadyHandler,
						onError: s.playerErrorHandler,
						onStateChange: s.stateChangeHandler,
						onPlaybackQualityChange: s.qualityChangeHandler
					}
				}), s.setBkColor("#FFFFFF"))
			}, this.playerReadyHandler = function () {
				s.resizeAndPosition(), s.dispatchEvent(t.READY), s.hasBeenCreatedOnce_bl = !0
			}, this.stateChangeHandler = function (o) {
				if (-1 == o.data && s.isCued_bl && s.isMobile_bl && (s.isStopped_bl = !1, FWDUVPlayer.stopAllVideos(e)), o.data == YT.PlayerState.PLAYING) s.isSafeToBeControlled_bl || (s.isStopped_bl = !1, s.isSafeToBeControlled_bl = !0, s.isPlaying_bl = !0, s.hasHours_bl = Math.floor(s.ytb.getDuration() / 3600) > 0, s.setVolume(s.volume), s.startToUpdate(), s.startToPreload(), s.scrub(1e-5), s.isMobile_bl || s.setQuality(s.lastQuality_str), s.ytb.getAvailableQualityLevels() && 0 != s.ytb.getAvailableQualityLevels().length && s.dispatchEvent(t.QUALITY_CHANGE, {
					qualityLevel: s.ytb.getPlaybackQuality(),
					levels: s.ytb.getAvailableQualityLevels()
				}), s.dispatchEvent(t.SAFE_TO_SCRUBB)), s.isPausedInEvent_bl && s.dispatchEvent(t.PLAY), s.isPausedInEvent_bl = !1, s.hasError_bl = !1;
				else if (o.data == YT.PlayerState.PAUSED) {
					if (!s.isSafeToBeControlled_bl) return;
					s.isStopped_bl = !1, s.isPausedInEvent_bl || s.dispatchEvent(t.PAUSE), s.isPausedInEvent_bl = !0
				} else o.data == YT.PlayerState.ENDED ? s.ytb.getCurrentTime() && s.ytb.getCurrentTime() > 0 && (s.isStopped_bl = !1, setTimeout(function () {
					s.dispatchEvent(t.PLAY_COMPLETE)
				}, 100)) : o.data == YT.PlayerState.CUED && (s.isStopped_bl || s.dispatchEvent(t.CUED), s.isCued_bl = !0)
			}, this.qualityChangeHandler = function (e) {
				s.ytb.getAvailableQualityLevels() && 0 != s.ytb.getAvailableQualityLevels().length && s.dispatchEvent(t.QUALITY_CHANGE, {
					qualityLevel: s.ytb.getPlaybackQuality()
				})
			}, this.playerErrorHandler = function (e) {
				if (s.isPausedInEvent_bl = !0, !s.isStopped_bl && !s.hasError_bl) {
					var o = "";
					s.hasError_bl = !0, 2 == e.data ? o = "The youtube id is not well formatted, make sure it has exactly 11 characters and that it dosn't contain invalid characters such as exclamation points or asterisks." : 5 == e.data ? o = "The requested content cannot be played in an HTML5 player or another error related to the HTML5 player has occurred." : 100 == e.data ? o = "The youtube video request was not found, probably the video ID is incorrect." : 101 != e.data && 150 != e.data || (o = "The owner of the requested video does not allow it to be played in embedded players."), s.dispatchEvent(t.ERROR, {
						text: o
					})
				}
			}, this.resizeAndPosition = function () {
				if (s.setWidth(e.tempVidStageWidth), s.setHeight(e.tempVidStageHeight), s.videoHolder_do && (s.videoHolder_do.setWidth(e.tempVidStageWidth), s.videoHolder_do.setHeight(e.tempVidStageHeight), s.ytb && s.ytb.a)) try {
					s.ytb.a.width = e.tempVidStageWidth, s.ytb.a.height = e.tempVidStageHeight, s.ytb.a.style.width = e.tempVidStageWidth + "px", s.ytb.a.style.height = e.tempVidStageHeight + "px"
				} catch (e) {}
			}, this.setSource = function (t) {
				t && (s.sourcePath_str = t), clearInterval(s.setSourceId_int), s.setSourceId_int = setInterval(function () {
					s.ytb.cueVideoById && s.ytb.setPlaybackRate && (s.ytb.cueVideoById(s.sourcePath_str), !e.isMobile_bl && (e.data.autoPlay_bl || e.isThumbClick_bl || e.isAdd_bl && !e.loadAddFirstTime_bl) && (e.videoPoster_do.hide(!0), e.largePlayButton_do.hide(), e.play()), clearInterval(s.setSourceId_int))
				}, 50)
			}, this.play = function (t) {
				FWDUVPlayer.curInstance = e, s.isPlaying_bl = !0, s.hasError_bl = !1, s.hasStarted_bl = !0;
				try {
					s.ytb.playVideo(), s.startToUpdate()
				} catch (e) {}
				s.isStopped_bl = !1
			}, this.pause = function () {
				if (!s.isStopped_bl && !s.hasError_bl) {
					s.isPlaying_bl = !1;
					try {
						s.ytb.pauseVideo()
					} catch (e) {}
					s.stopToUpdate()
				}
			}, this.togglePlayPause = function () {
				s.isPlaying_bl ? s.pause() : s.play()
			}, this.resume = function () {
				s.isStopped_bl || s.play()
			}, this.startToUpdate = function () {
				clearInterval(s.updateVideoId_int), s.updateVideoId_int = setInterval(s.updateVideo, 500)
			}, this.stopToUpdate = function () {
				clearInterval(s.updateVideoId_int)
			}, this.updateVideo = function () {
				var e;
				if (s.ytb) {
					s.allowScrubing_bl || (e = s.ytb.getCurrentTime() / s.ytb.getDuration(), s.dispatchEvent(t.UPDATE, {
						percent: e
					}));
					var o = s.formatTime(s.ytb.getDuration()),
						i = s.formatTime(s.ytb.getCurrentTime());
					s.dispatchEvent(t.UPDATE_TIME, {
						curTime: i,
						totalTime: o,
						seconds: parseInt(s.ytb.getCurrentTime())
					})
				} else stopToUpdate()
			}, this.startToPreload = function () {
				clearInterval(s.preloadVideoId_int), s.updatePreloadId_int = setInterval(s.updateProgress, 500)
			}, this.stopToPreload = function () {
				clearInterval(s.updatePreloadId_int)
			}, this.updateProgress = function () {
				if (s.ytb) {
					var e = s.ytb.getVideoLoadedFraction();
					s.dispatchEvent(t.LOAD_PROGRESS, {
						percent: e
					})
				} else stopToPreload()
			}, this.stop = function () {
				s.isStopped_bl || (s.isPlaying_bl = !1, s.isStopped_bl = !0, s.hasStarted_bl = !1, s.isCued_bl = !1, clearInterval(s.setSourceId_int), s.allowScrubing_bl = !1, s.isSafeToBeControlled_bl = !1, s.isQualityArrayDisapatched_bl = !1, s.isPausedInEvent_bl = !0, s.stopToUpdate(), s.stopToPreload(), s.stopVideo(), s.dispatchEvent(t.STOP), s.dispatchEvent(t.LOAD_PROGRESS, {
					percent: 0
				}))
			}, this.destroyYoutube = function () {
				s.videoHolder_do && (s.videoHolder_do.screen.removeAttribute("id", e.instanceName_str + "youtube"), s.videoHolder_do.destroy(), s.videoHolder_do = null), s.ytb && s.ytb.destroy(), s.ytb = null
			}, this.stopVideo = function () {
				s.ytb.cueVideoById(s.sourcePath_str)
			}, this.setPlaybackRate = function (e) {
				s.ytb && !s.isMobile_bl && (e && (s.rate = e), s.ytb.setPlaybackRate && s.ytb.setPlaybackRate(s.rate))
			}, this.startToScrub = function () {
				s.isSafeToBeControlled_bl && (s.allowScrubing_bl = !0)
			}, this.stopToScrub = function () {
				s.isSafeToBeControlled_bl && (s.allowScrubing_bl = !1)
			}, this.scrubbAtTime = function (e) {
				s.isSafeToBeControlled_bl && s.ytb.seekTo(e)
			}, this.scrub = function (e) {
				s.isSafeToBeControlled_bl && s.ytb.seekTo(e * s.ytb.getDuration())
			}, this.setVolume = function (e) {
				e && (s.volume = e), s.ytb && s.ytb.setVolume(100 * e)
			}, this.setQuality = function (e) {
				s.lastQuality_str = e, s.ytb.setPlaybackQuality(e)
			}, this.formatTime = function (e) {
				var t = Math.floor(e / 3600),
					o = e % 3600,
					i = Math.floor(o / 60),
					l = o % 60,
					n = Math.ceil(l);
				return i = i >= 10 ? i : "0" + i, n = n >= 10 ? n : "0" + n, isNaN(n) ? "00:00" : s.hasHours_bl ? t + ":" + i + ":" + n : i + ":" + n
			}, this.init()
		};
		t.setPrototype = function () {
			t.prototype = new FWDUVPDisplayObject("div")
		}, t.READY = "ready", t.ERROR = "error", t.UPDATE = "update", t.UPDATE_TIME = "updateTime", t.SAFE_TO_SCRUBB = "safeToControll", t.LOAD_PROGRESS = "loadProgress", t.PLAY = "play", t.PAUSE = "pause", t.STOP = "stop", t.PLAY_COMPLETE = "playComplete", t.CUED = "cued", t.QUALITY_CHANGE = "qualityChange", e.FWDUVPYoutubeScreen = t
	}(window),
	function () {
		var e = function (t, o, s, i, l) {
			var n = this;
			e.prototype;
			this.text_do = null, this.hd_do = null, this.dumy_do = null, this.label_str = t, this.normalColor_str = o, this.selectedColor_str = s, this.hdPath_str = i, this.id = l, this.totalWidth = 0, this.totalHeight = 23, this.hdWidth = 7, this.hdHeight = 5, this.hasHd_bl = !1, this.isMobile_bl = FWDUVPUtils.isMobile, this.isDisabled_bl = !1, this.init = function () {
				n.hasHd_bl = !0, n.setBackfaceVisibility(), n.setupMainContainers(), n.setHeight(n.totalHeight)
			}, this.setupMainContainers = function () {
				if (n.text_do = new FWDUVPDisplayObject("div"), n.text_do.setBackfaceVisibility(), n.text_do.hasTransform3d_bl = !1, n.text_do.hasTransform2d_bl = !1, n.text_do.getStyle().display = "inline-block", n.text_do.getStyle().whiteSpace = "nowrap", n.text_do.getStyle().fontFamily = "Arial", n.text_do.getStyle().fontSize = "12px", n.text_do.getStyle().color = n.normalColor_str, n.text_do.getStyle().fontSmoothing = "antialiased", n.text_do.getStyle().webkitFontSmoothing = "antialiased", n.text_do.getStyle().textRendering = "optimizeLegibility", n.text_do.setInnerHTML(n.label_str), n.addChild(n.text_do), n.hasHd_bl) {
					var e = new Image;
					e.src = n.hdPath_str, n.hd_do = new FWDUVPDisplayObject("img"), n.hd_do.setScreen(e), n.hd_do.setWidth(n.hdWidth), n.hd_do.setHeight(n.hdHeight), n.addChild(n.hd_do)
				}
				n.dumy_do = new FWDUVPDisplayObject("div"), FWDUVPUtils.isIE && (n.dumy_do.setBkColor("#FF0000"), n.dumy_do.setAlpha(1e-4)), n.dumy_do.setButtonMode(!0), n.dumy_do.setHeight(n.totalHeight), n.addChild(n.dumy_do), n.hasPointerEvent_bl ? (n.screen.addEventListener("pointerup", n.onMouseUp), n.screen.addEventListener("pointerover", n.onMouseOver), n.screen.addEventListener("pointerout", n.onMouseOut)) : n.screen.addEventListener && (n.isMobile_bl || (n.screen.addEventListener("mouseover", n.onMouseOver), n.screen.addEventListener("mouseout", n.onMouseOut), n.screen.addEventListener("mouseup", n.onMouseUp)), n.screen.addEventListener("touchend", n.onMouseUp))
			}, this.onMouseOver = function (t) {
				n.isDisabled_bl || (n.setSelectedState(!0), n.dispatchEvent(e.MOUSE_OVER, {
					e: t,
					id: n.id
				}))
			}, this.onMouseOut = function (t) {
				n.isDisabled_bl || (n.setNormalState(!0), n.dispatchEvent(e.MOUSE_OUT, {
					e: t,
					id: n.id
				}))
			}, this.onMouseUp = function (t) {
				n.isDisabled_bl || 2 == t.button || (t.preventDefault && t.preventDefault(), n.dispatchEvent(e.CLICK, {
					e: t,
					id: n.id
				}))
			}, this.setFinalSize = function () {
				if (0 == n.text_do.x) {
					var e = n.text_do.getWidth() + 34,
						t = n.text_do.getHeight();
					n.text_do.setX(18), n.text_do.setY(parseInt((n.totalHeight - t) / 2)), n.hd_do && (n.hd_do.setX(e - 12), n.hd_do.setY(n.text_do.y + 1)), n.dumy_do.setWidth(e), n.setWidth(e)
				}
			}, this.updateText = function (e) {
				this.label_str = e, this.text_do.setInnerHTML(n.label_str), "highres" == n.label_str || "hd1080" == n.label_str || "hd720" == n.label_str || "hd1440" == n.label_str || "hd2160" == n.label_str ? n.hd_do.setVisible(!0) : n.hd_do.setVisible(!1)
			}, this.setSelectedState = function (e) {
				this.isSelected_bl = !0, FWDAnimation.killTweensOf(n.text_do), e ? FWDAnimation.to(n.text_do.screen, .5, {
					css: {
						color: n.selectedColor_str
					},
					ease: Expo.easeOut
				}) : n.text_do.getStyle().color = n.selectedColor_str
			}, this.setNormalState = function (e) {
				this.isSelected_bl = !1, FWDAnimation.killTweensOf(n.text_do), e ? FWDAnimation.to(n.text_do.screen, .5, {
					css: {
						color: n.normalColor_str
					},
					ease: Expo.easeOut
				}) : n.text_do.getStyle().color = n.normalColor_str
			}, this.disable = function () {
				n.isDisabled_bl = !0, FWDAnimation.killTweensOf(n.text_do), n.setSelectedState(!0), n.dumy_do.setButtonMode(!1)
			}, this.enable = function () {
				n.isDisabled_bl = !1, FWDAnimation.killTweensOf(n.text_do), n.setNormalState(!0), n.dumy_do.setButtonMode(!0)
			}, n.init()
		};
		e.setPrototype = function () {
			e.prototype = new FWDUVPDisplayObject("div")
		}, e.MOUSE_OVER = "onMouseOver", e.MOUSE_OUT = "onMouseOut", e.CLICK = "onClick", e.prototype = null, window.FWDUVPYTBQButton = e
	}(window);
