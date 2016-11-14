/* Date: 2016-10-31T18:45:20Z Path: js/lib/jumei.js */
!function (t) {
    var e = t.document, n = 16, i = (e.getElementsByTagName("body")[0], e.getElementsByTagName("html")[0]), r = e.documentElement && e.documentElement.clientWidth || e.body.clientWidth || t.innerWidth, o = (e.documentElement && e.documentElement.clientHeight || e.body.clientHeight || t.innerHeight, navigator.userAgent.toLowerCase()), a = function (t) {
        i.style.fontSize = t + "px", i.style.display = "block"
    };
    if (o.match(/(iphone|ipod|android|windows\s*phone|symbianos)/)) {
        try {
            n = parseFloat(16 * r / 320)
        } catch (s) {
        }
        o.match(/android\s*2.3/) && o.match(/micromessenger/) && (n = 16), a(n)
    } else n = o.match(/(ipad)/) ? parseFloat(16 * r / 320) : 24, a(n)
}(window), function (t) {
    String.prototype.trim === t && (String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/g, "")
    }), Array.prototype.reduce === t && (Array.prototype.reduce = function (e) {
        if (void 0 === this || null === this)throw new TypeError;
        var n, i = Object(this), r = i.length >>> 0, o = 0;
        if ("function" != typeof e)throw new TypeError;
        if (0 === r && 1 === arguments.length)throw new TypeError;
        if (arguments.length >= 2)n = arguments[1]; else for (; ;) {
            if (o in i) {
                n = i[o++];
                break
            }
            if (++o >= r)throw new TypeError
        }
        for (; r > o;)o in i && (n = e.call(t, n, i[o], o, i)), o++;
        return n
    })
}();
var Zepto = function () {
    function t(t) {
        return null == t ? String(t) : Q[K.call(t)] || "object"
    }

    function e(t) {
        return "number" == typeof t && isFinite(t)
    }

    function n(e) {
        return "function" == t(e)
    }

    function i(t) {
        return null != t && t == t.window
    }

    function r(t) {
        return null != t && t.nodeType == t.DOCUMENT_NODE
    }

    function o(e) {
        return "object" == t(e)
    }

    function a(t) {
        return o(t) && !i(t) && t.__proto__ == Object.prototype
    }

    function s(t) {
        return t instanceof Array
    }

    function c(t) {
        return "number" == typeof t.length
    }

    function u(t) {
        return "string" == typeof t
    }

    function l(t) {
        return t ? 1 === t.nodeType : !1
    }

    function h(t) {
        return "boolean" == typeof t
    }

    function f(t) {
        return $.call(t, function (t) {
            return null != t
        })
    }

    function d(t) {
        return t.length > 0 ? C.fn.concat.apply([], t) : t
    }

    function p(t) {
        return t.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
    }

    function m(t) {
        return t in L ? L[t] : L[t] = new RegExp("(^|\\s)" + t + "(\\s|$)")
    }

    function v(t, e) {
        return "number" != typeof e || R[p(t)] ? e : e + "px"
    }

    function g(t) {
        var e, n;
        return q[t] || (e = D.createElement(t), D.body.appendChild(e), n = F(e, "").getPropertyValue("display"), e.parentNode.removeChild(e), "none" == n && (n = "block"), q[t] = n), q[t]
    }

    function y(t) {
        return "children" in t ? M.call(t.children) : C.map(t.childNodes, function (t) {
            return 1 == t.nodeType ? t : void 0
        })
    }

    function w(t, e, n) {
        for (O in e)n && (a(e[O]) || s(e[O])) ? (a(e[O]) && !a(t[O]) && (t[O] = {}), s(e[O]) && !s(t[O]) && (t[O] = []), w(t[O], e[O], n)) : e[O] !== S && (t[O] = e[O])
    }

    function b(t, e) {
        return e === S ? C(t) : C(t).filter(e)
    }

    function x(t, e, i, r) {
        return n(e) ? e.call(t, i, r) : e
    }

    function E(t, e, n) {
        null == n ? t.removeAttribute(e) : t.setAttribute(e, n)
    }

    function j(t, e) {
        var n = t.className, i = n && n.baseVal !== S;
        return e === S ? i ? n.baseVal : n : void(i ? n.baseVal = e : t.className = e)
    }

    function T(t) {
        var e;
        try {
            return t ? "true" == t || ("false" == t ? !1 : "null" == t ? null : isNaN(e = Number(t)) ? /^[\[\{]/.test(t) ? C.parseJSON(t) : t : e) : t
        } catch (n) {
            return t
        }
    }

    function _(t, e) {
        e(t);
        for (var n in t.childNodes)_(t.childNodes[n], e)
    }

    var S, O, C, A, N, P, k = [], M = k.slice, $ = k.filter, D = window.document, q = {}, L = {}, F = D.defaultView.getComputedStyle, R = {
        "column-count": 1,
        columns: 1,
        "font-weight": 1,
        "line-height": 1,
        opacity: 1,
        "z-index": 1,
        zoom: 1
    }, Z = /^\s*<(\w+|!)[^>]*>/, W = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi, X = /^(?:body|html)$/i, B = ["val", "css", "html", "text", "data", "width", "height", "offset"], U = ["after", "prepend", "before", "append"], I = D.createElement("table"), z = D.createElement("tr"), Y = {
        tr: D.createElement("tbody"),
        tbody: I,
        thead: I,
        tfoot: I,
        td: z,
        th: z,
        "*": D.createElement("div")
    }, J = /complete|loaded|interactive/, H = /^\.([\w-]+)$/, V = /^#([\w-]*)$/, G = /^[\w-]+$/, Q = {}, K = Q.toString, tt = {}, et = D.createElement("div");
    return tt.matches = function (t, e) {
        if (!t || 1 !== t.nodeType)return !1;
        var n = t.webkitMatchesSelector || t.mozMatchesSelector || t.oMatchesSelector || t.matchesSelector;
        if (n)return n.call(t, e);
        var i, r = t.parentNode, o = !r;
        return o && (r = et).appendChild(t), i = ~tt.qsa(r, e).indexOf(t), o && et.removeChild(t), i
    }, N = function (t) {
        return t.replace(/-+(.)?/g, function (t, e) {
            return e ? e.toUpperCase() : ""
        })
    }, P = function (t) {
        return $.call(t, function (e, n) {
            return t.indexOf(e) == n
        })
    }, tt.fragment = function (t, e, n) {
        t.replace && (t = t.replace(W, "<$1></$2>")), e === S && (e = Z.test(t) && RegExp.$1), e in Y || (e = "*");
        var i, r, o = Y[e];
        return o.innerHTML = "" + t, r = C.each(M.call(o.childNodes), function () {
            o.removeChild(this)
        }), a(n) && (i = C(r), C.each(n, function (t, e) {
            B.indexOf(t) > -1 ? i[t](e) : i.attr(t, e)
        })), r
    }, tt.Z = function (t, e) {
        if (t = t || [], navigator.userAgent.indexOf("MSIE 10") > -1)for (var n in C.fn)t[n] = C.fn[n]; else t.__proto__ = C.fn;
        return t.selector = e || "", t
    }, tt.isZ = function (t) {
        return t instanceof tt.Z
    }, tt.init = function (t, e) {
        if (t) {
            if (n(t))return C(D).ready(t);
            if (tt.isZ(t))return t;
            var i;
            if (s(t))i = f(t); else if (o(t))i = [a(t) ? C.extend({}, t) : t], t = null; else if (Z.test(t))i = tt.fragment(t.trim(), RegExp.$1, e), t = null; else {
                if (e !== S)return C(e).find(t);
                i = tt.qsa(D, t)
            }
            return tt.Z(i, t)
        }
        return tt.Z()
    }, C = function (t, e) {
        return tt.init(t, e)
    }, C.extend = function (t) {
        var e, n = M.call(arguments, 1);
        return "boolean" == typeof t && (e = t, t = n.shift()), n.forEach(function (n) {
            w(t, n, e)
        }), t
    }, C.mix = w, tt.qsa = function (t, e) {
        var n;
        return r(t) && V.test(e) ? (n = t.getElementById(RegExp.$1)) ? [n] : [] : 1 !== t.nodeType && 9 !== t.nodeType ? [] : M.call(H.test(e) ? t.getElementsByClassName(RegExp.$1) : G.test(e) ? t.getElementsByTagName(e) : t.querySelectorAll(e))
    }, C.contains = function (t, e) {
        return t !== e && t.contains(e)
    }, C.isEmptyObject = function (t) {
        var e;
        for (e in t)return !1;
        return !0
    }, C.inArray = function (t, e, n) {
        return k.indexOf.call(e, t, n)
    }, C.camelCase = N, C.trim = function (t) {
        return t.trim()
    }, C.uuid = 0, C.support = {}, C.expr = {}, C.map = function (t, e) {
        var n, i, r, o = [];
        if (c(t))for (i = 0; i < t.length; i++)n = e(t[i], i), null != n && o.push(n); else for (r in t)n = e(t[r], r), null != n && o.push(n);
        return d(o)
    }, C.each = function (t, e) {
        var n, i;
        if (c(t)) {
            for (n = 0; n < t.length; n++)if (e.call(t[n], n, t[n]) === !1)return t
        } else for (i in t)if (e.call(t[i], i, t[i]) === !1)return t;
        return t
    }, C.grep = function (t, e) {
        return $.call(t, e)
    }, window.JSON && (C.parseJSON = JSON.parse), C.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (t, e) {
        Q["[object " + e + "]"] = e.toLowerCase()
    }), C.fn = {
        forEach: k.forEach,
        reduce: k.reduce,
        push: k.push,
        sort: k.sort,
        indexOf: k.indexOf,
        concat: k.concat,
        map: function (t) {
            return C(C.map(this, function (e, n) {
                return t.call(e, n, e)
            }))
        },
        slice: function () {
            return C(M.apply(this, arguments))
        },
        ready: function (t) {
            return J.test(D.readyState) ? t(C) : D.addEventListener("DOMContentLoaded", function () {
                t(C)
            }, !1), this
        },
        get: function (t) {
            return t === S ? M.call(this) : this[t >= 0 ? t : t + this.length]
        },
        toArray: function () {
            return this.get()
        },
        size: function () {
            return this.length
        },
        remove: function () {
            return this.each(function () {
                null != this.parentNode && this.parentNode.removeChild(this)
            })
        },
        each: function (t) {
            return k.every.call(this, function (e, n) {
                return t.call(e, n, e) !== !1
            }), this
        },
        filter: function (t) {
            return n(t) ? this.not(this.not(t)) : C($.call(this, function (e) {
                return tt.matches(e, t)
            }))
        },
        add: function (t, e) {
            return C(P(this.concat(C(t, e))))
        },
        is: function (t) {
            return this.length > 0 && tt.matches(this[0], t)
        },
        not: function (t) {
            var e = [];
            if (n(t) && t.call !== S)this.each(function (n) {
                t.call(this, n) || e.push(this)
            }); else {
                var i = "string" == typeof t ? this.filter(t) : c(t) && n(t.item) ? M.call(t) : C(t);
                this.forEach(function (t) {
                    i.indexOf(t) < 0 && e.push(t)
                })
            }
            return C(e)
        },
        has: function (t) {
            return this.filter(function () {
                return o(t) ? C.contains(this, t) : C(this).find(t).size()
            })
        },
        eq: function (t) {
            return -1 === t ? this.slice(t) : this.slice(t, +t + 1)
        },
        first: function () {
            var t = this[0];
            return t && !o(t) ? t : C(t)
        },
        last: function () {
            var t = this[this.length - 1];
            return t && !o(t) ? t : C(t)
        },
        find: function (t) {
            var e, n = this;
            return e = "object" == typeof t ? C(t).filter(function () {
                var t = this;
                return k.some.call(n, function (e) {
                    return C.contains(e, t)
                })
            }) : 1 == this.length ? C(tt.qsa(this[0], t)) : this.map(function () {
                return tt.qsa(this, t)
            })
        },
        closest: function (t, e) {
            var n = this[0], i = !1;
            for ("object" == typeof t && (i = C(t)); n && !(i ? i.indexOf(n) >= 0 : tt.matches(n, t));)n = n !== e && !r(n) && n.parentNode;
            return C(n)
        },
        parents: function (t) {
            for (var e = [], n = this; n.length > 0;)n = C.map(n, function (t) {
                return (t = t.parentNode) && !r(t) && e.indexOf(t) < 0 ? (e.push(t), t) : void 0
            });
            return b(e, t)
        },
        parent: function (t) {
            return b(P(this.pluck("parentNode")), t)
        },
        children: function (t) {
            return b(this.map(function () {
                return y(this)
            }), t)
        },
        contents: function () {
            return this.map(function () {
                return M.call(this.childNodes)
            })
        },
        siblings: function (t) {
            return b(this.map(function (t, e) {
                return $.call(y(e.parentNode), function (t) {
                    return t !== e
                })
            }), t)
        },
        empty: function () {
            return this.each(function () {
                this.innerHTML = ""
            })
        },
        pluck: function (t) {
            return C.map(this, function (e) {
                return e[t]
            })
        },
        show: function () {
            return this.each(function () {
                "none" == this.style.display && (this.style.display = null), "none" == F(this, "").getPropertyValue("display") && (this.style.display = g(this.nodeName))
            })
        },
        replaceWith: function (t) {
            return this.before(t).remove()
        },
        wrap: function (t) {
            var e = n(t);
            if (this[0] && !e)var i = C(t).get(0), r = i.parentNode || this.length > 1;
            return this.each(function (n) {
                C(this).wrapAll(e ? t.call(this, n) : r ? i.cloneNode(!0) : i)
            })
        },
        wrapAll: function (t) {
            if (this[0]) {
                C(this[0]).before(t = C(t));
                for (var e; (e = t.children()).length;)t = e.first();
                C(t).append(this)
            }
            return this
        },
        wrapInner: function (t) {
            var e = n(t);
            return this.each(function (n) {
                var i = C(this), r = i.contents(), o = e ? t.call(this, n) : t;
                r.length ? r.wrapAll(o) : i.append(o)
            })
        },
        unwrap: function () {
            return this.parent().each(function () {
                C(this).replaceWith(C(this).children())
            }), this
        },
        clone: function () {
            return this.map(function () {
                return this.cloneNode(!0)
            })
        },
        hide: function () {
            return this.css("display", "none")
        },
        toggle: function (t) {
            return this.each(function () {
                var e = C(this);
                (t === S ? "none" == e.css("display") : t) ? e.show() : e.hide()
            })
        },
        prev: function (t) {
            return C(this.pluck("previousElementSibling")).filter(t || "*")
        },
        next: function (t) {
            return C(this.pluck("nextElementSibling")).filter(t || "*")
        },
        html: function (t) {
            return t === S ? this.length > 0 ? this[0].innerHTML : null : this.each(function (e) {
                var n = this.innerHTML;
                C(this).empty().append(x(this, t, e, n))
            })
        },
        text: function (t) {
            return t === S ? this.length > 0 ? this[0].textContent : null : this.each(function () {
                this.textContent = t
            })
        },
        attr: function (t, e) {
            var n;
            return "string" == typeof t && e === S ? 0 == this.length || 1 !== this[0].nodeType ? S : "value" == t && "INPUT" == this[0].nodeName ? this.val() : !(n = this[0].getAttribute(t)) && t in this[0] ? this[0][t] : n : this.each(function (n) {
                if (1 === this.nodeType)if (o(t))for (O in t)E(this, O, t[O]); else E(this, t, x(this, e, n, this.getAttribute(t)))
            })
        },
        removeAttr: function (t) {
            return this.each(function () {
                1 === this.nodeType && E(this, t)
            })
        },
        prop: function (t, e) {
            return e === S ? this[0] && this[0][t] : this.each(function (n) {
                this[t] = x(this, e, n, this[t])
            })
        },
        data: function (t, e) {
            var n = this.attr("data-" + p(t), e);
            return null !== n ? T(n) : S
        },
        val: function (t) {
            return t === S ? this[0] && (this[0].multiple ? C(this[0]).find("option").filter(function (t) {
                return this.selected
            }).pluck("value") : this[0].value) : this.each(function (e) {
                this.value = x(this, t, e, this.value)
            })
        },
        offset: function (t) {
            if (t)return this.each(function (e) {
                var n = C(this), i = x(this, t, e, n.offset()), r = n.offsetParent().offset(), o = {
                    top: i.top - r.top,
                    left: i.left - r.left
                };
                "static" == n.css("position") && (o.position = "relative"), n.css(o)
            });
            if (0 == this.length)return null;
            var e = this[0].getBoundingClientRect();
            return {
                left: e.left + window.pageXOffset,
                top: e.top + window.pageYOffset,
                width: Math.round(e.width),
                height: Math.round(e.height)
            }
        },
        css: function (e, n) {
            if (arguments.length < 2 && "string" == typeof e)return this[0] && (this[0].style[N(e)] || F(this[0], "").getPropertyValue(e));
            var i = "";
            if ("string" == t(e))n || 0 === n ? i = p(e) + ":" + v(e, n) : this.each(function () {
                this.style.removeProperty(p(e))
            }); else for (O in e)e[O] || 0 === e[O] ? i += p(O) + ":" + v(O, e[O]) + ";" : this.each(function () {
                this.style.removeProperty(p(O))
            });
            return this.each(function () {
                this.style.cssText += ";" + i
            })
        },
        index: function (t) {
            return t ? this.indexOf(C(t)[0]) : this.parent().children().indexOf(this[0])
        },
        hasClass: function (t) {
            return k.some.call(this, function (t) {
                return this.test(j(t))
            }, m(t))
        },
        addClass: function (t) {
            return this.each(function (e) {
                A = [];
                var n = j(this), i = x(this, t, e, n);
                i.split(/\s+/g).forEach(function (t) {
                    C(this).hasClass(t) || A.push(t)
                }, this), A.length && j(this, n + (n ? " " : "") + A.join(" "))
            })
        },
        removeClass: function (t) {
            return this.each(function (e) {
                return t === S ? j(this, "") : (A = j(this), x(this, t, e, A).split(/\s+/g).forEach(function (t) {
                    A = A.replace(m(t), " ")
                }), void j(this, A.trim()))
            })
        },
        toggleClass: function (t, e) {
            return this.each(function (n) {
                var i = C(this), r = x(this, t, n, j(this));
                r.split(/\s+/g).forEach(function (t) {
                    (e === S ? !i.hasClass(t) : e) ? i.addClass(t) : i.removeClass(t)
                })
            })
        },
        scrollTop: function () {
            return this.length ? (i(this[0]) ? D.documentElement && D.documentElement.scrollTop ? scrollTop = D.documentElement.scrollTop : D.body ? scrollTop = D.body.scrollTop : scrollTop = this[0].scrollY : scrollTop = "scrollTop" in this[0] ? this[0].scrollTop : this[0].scrollY, scrollTop) : void 0
        },
        scrollTo: function (t) {
            e(t) && window.scrollTo(0, t)
        },
        position: function () {
            if (this.length) {
                var t = this[0], e = this.offsetParent(), n = this.offset(), i = X.test(e[0].nodeName) ? {
                    top: 0,
                    left: 0
                } : e.offset();
                return n.top -= parseFloat(C(t).css("margin-top")) || 0, n.left -= parseFloat(C(t).css("margin-left")) || 0, i.top += parseFloat(C(e[0]).css("border-top-width")) || 0, i.left += parseFloat(C(e[0]).css("border-left-width")) || 0, {
                    top: n.top - i.top,
                    left: n.left - i.left
                }
            }
        },
        offsetParent: function () {
            return this.map(function () {
                for (var t = this.offsetParent || D.body; t && !X.test(t.nodeName) && "static" == C(t).css("position");)t = t.offsetParent;
                return t
            })
        }
    }, C.fn.detach = C.fn.remove, ["width", "height"].forEach(function (t) {
        C.fn[t] = function (e) {
            var n, o = this[0], a = t.replace(/./, function (t) {
                return t[0].toUpperCase()
            });
            if (e === S) {
                var s = i(o) ? o["inner" + a] : r(o) ? o.documentElement["offset" + a] : (n = this.offset()) && n[t];
                return s
            }
            return this.each(function (n) {
                o = C(this), o.css(t, x(this, e, n, o[t]()))
            })
        }
    }), U.forEach(function (e, n) {
        var i = n % 2;
        C.fn[e] = function () {
            var e, r, o = C.map(arguments, function (n) {
                return e = t(n), "object" == e || "array" == e || null == n ? n : tt.fragment(n)
            }), a = this.length > 1;
            return o.length < 1 ? this : this.each(function (t, e) {
                r = i ? e : e.parentNode, e = 0 == n ? e.nextSibling : 1 == n ? e.firstChild : 2 == n ? e : null, o.forEach(function (t) {
                    if (a)t = t.cloneNode(!0); else if (!r)return C(t).remove();
                    _(r.insertBefore(t, e), function (t) {
                        null == t.nodeName || "SCRIPT" !== t.nodeName.toUpperCase() || t.type && "text/javascript" !== t.type || t.src || window.eval.call(window, t.innerHTML)
                    })
                })
            })
        }, C.fn[i ? e + "To" : "insert" + (n ? "Before" : "After")] = function (t) {
            return C(t)[e](this), this
        }
    }), tt.Z.prototype = C.fn, tt.uniq = P, tt.deserializeValue = T, C.zepto = tt, C.type = t, C.isFunction = n, C.isWindow = i, C.isArray = s, C.isPlainObject = a, C.isString = u, C.isNumber = e, C.isElement = l, C.isBoolean = h, C.isObject = o, C
}();
window.Zepto = Zepto, "$" in window || (window.$ = Zepto), function (t) {
    function e(t) {
        var e = this.os = {}, n = this.browser = {}, i = t.match(/WebKit\/([\d.]+)/), r = t.match(/(Android)\s+([\d.]+)/), o = t.match(/(iPad).*OS\s([\d_]+)/), a = !o && t.match(/(iPhone\sOS)\s([\d_]+)/), s = t.match(/(webOS|hpwOS)[\s\/]([\d.]+)/), c = s && t.match(/TouchPad/), u = t.match(/Kindle\/([\d.]+)/), l = t.match(/Silk\/([\d._]+)/), h = t.match(/(BlackBerry).*Version\/([\d.]+)/), f = t.match(/(BB10).*Version\/([\d.]+)/), d = t.match(/(RIM\sTablet\sOS)\s([\d.]+)/), p = t.match(/PlayBook/), m = t.match(/Chrome\/([\d.]+)/) || t.match(/CriOS\/([\d.]+)/), v = t.match(/Firefox\/([\d.]+)/);
        (n.webkit = !!i) && (n.version = i[1]), r && (e.android = !0, e.version = r[2]), a && (e.ios = e.iphone = !0, e.version = a[2].replace(/_/g, ".")), o && (e.ios = e.ipad = !0, e.version = o[2].replace(/_/g, ".")), s && (e.webos = !0, e.version = s[2]), c && (e.touchpad = !0), h && (e.blackberry = !0, e.version = h[2]), f && (e.bb10 = !0, e.version = f[2]), d && (e.rimtabletos = !0, e.version = d[2]), p && (n.playbook = !0), u && (e.kindle = !0, e.version = u[1]), l && (n.silk = !0, n.version = l[1]), !l && e.android && t.match(/Kindle Fire/) && (n.silk = !0), m && (n.chrome = !0, n.version = m[1]), v && (n.firefox = !0, n.version = v[1]), e.tablet = !!(o || p || r && !t.match(/Mobile/) || v && t.match(/Tablet/)), e.phone = !(e.tablet || !(r || a || s || h || f || m && t.match(/Android/) || m && t.match(/CriOS\/([\d.]+)/) || v && t.match(/Mobile/)))
    }

    e.call(t, navigator.userAgent), t.__detect = e
}(Zepto), function (t) {
    function e(t) {
        return t._zid || (t._zid = d++)
    }

    function n(t, n, o, a) {
        if (n = i(n), n.ns)var s = r(n.ns);
        return (f[e(t)] || []).filter(function (t) {
            return t && (!n.e || t.e == n.e) && (!n.ns || s.test(t.ns)) && (!o || e(t.fn) === e(o)) && (!a || t.sel == a)
        })
    }

    function i(t) {
        var e = ("" + t).split(".");
        return {e: e[0], ns: e.slice(1).sort().join(" ")}
    }

    function r(t) {
        return new RegExp("(?:^| )" + t.replace(" ", " .* ?") + "(?: |$)")
    }

    function o(e, n, i) {
        "string" != t.type(e) ? t.each(e, i) : e.split(/\s/).forEach(function (t) {
            i(t, n)
        })
    }

    function a(t, e) {
        return t.del && ("focus" == t.e || "blur" == t.e) || !!e
    }

    function s(t) {
        return m[t] || t
    }

    function c(n, r, c, u, l, h) {
        var d = e(n), p = f[d] || (f[d] = []);
        o(r, c, function (e, r) {
            var o = i(e);
            o.fn = r, o.sel = u, o.e in m && (r = function (e) {
                var n = e.relatedTarget;
                return !n || n !== this && !t.contains(this, n) ? o.fn.apply(this, arguments) : void 0
            }), o.del = l && l(r, e);
            var c = o.del || r;
            o.proxy = function (t) {
                var e = c.apply(n, [t].concat(t.data));
                return e === !1 && (t.preventDefault(), t.stopPropagation()), e
            }, o.i = p.length, p.push(o), n.addEventListener(s(o.e), o.proxy, a(o, h))
        })
    }

    function u(t, i, r, c, u) {
        var l = e(t);
        o(i || "", r, function (e, i) {
            n(t, e, i, c).forEach(function (e) {
                delete f[l][e.i], t.removeEventListener(s(e.e), e.proxy, a(e, u))
            })
        })
    }

    function l(e) {
        var n, i = {originalEvent: e};
        for (n in e)w.test(n) || void 0 === e[n] || (i[n] = e[n]);
        return t.each(b, function (t, n) {
            i[t] = function () {
                return this[n] = g, e[t].apply(e, arguments)
            }, i[n] = y
        }), i
    }

    function h(t) {
        if (!("defaultPrevented" in t)) {
            t.defaultPrevented = !1;
            var e = t.preventDefault;
            t.preventDefault = function () {
                this.defaultPrevented = !0, e.call(this)
            }
        }
    }

    var f = (t.zepto.qsa, {}), d = 1, p = {}, m = {
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, v = "longTap tap doubleTap swipeLeft swipeRight swipeUp swipeDown";
    p.click = p.mousedown = p.mouseup = p.mousemove = "MouseEvents", t.event = {
        add: c,
        remove: u
    }, t.proxy = function (n, i) {
        if (t.isFunction(n)) {
            var r = function () {
                return n.apply(i, arguments)
            };
            return r._zid = e(n), r
        }
        if ("string" == typeof i)return t.proxy(n[i], n);
        throw new TypeError("expected function")
    }, t.fn.bind = function (e, n) {
        return this.each(function () {
            v.indexOf(e) > -1 && t.Touch.init(this), c(this, e, n)
        })
    }, t.fn.unbind = function (t, e) {
        return this.each(function () {
            u(this, t, e)
        })
    }, t.fn.one = function (t, e) {
        return this.each(function (n, i) {
            c(this, t, e, null, function (t, e) {
                return function () {
                    var n = t.apply(i, arguments);
                    return u(i, e, t), n
                }
            })
        })
    };
    var g = function () {
        return !0
    }, y = function () {
        return !1
    }, w = /^([A-Z]|layer[XY]$)/, b = {
        preventDefault: "isDefaultPrevented",
        stopImmediatePropagation: "isImmediatePropagationStopped",
        stopPropagation: "isPropagationStopped"
    };
    t.fn.delegate = function (e, n, i) {
        return this.each(function (r, o) {
            c(o, n, i, e, function (n) {
                return function (i) {
                    var r, a = t(i.target).closest(e, o).get(0);
                    return a ? (r = t.extend(l(i), {
                        currentTarget: a,
                        liveFired: o
                    }), n.apply(a, [r].concat([].slice.call(arguments, 1)))) : void 0
                }
            })
        })
    }, t.fn.undelegate = function (t, e, n) {
        return this.each(function () {
            u(this, e, n, t)
        })
    }, t.fn.live = function (e, n) {
        return t(document.body).delegate(this.selector, e, n), this
    }, t.fn.die = function (e, n) {
        return t(document.body).undelegate(this.selector, e, n), this
    }, t.fn.on = function (e, n, i) {
        return !n || t.isFunction(n) ? this.bind(e, n || i) : this.delegate(n, e, i)
    }, t.fn.off = function (e, n, i) {
        return !n || t.isFunction(n) ? this.unbind(e, n || i) : this.undelegate(n, e, i)
    }, t.fn.trigger = function (e, n) {
        return ("string" == typeof e || t.isPlainObject(e)) && (e = t.Event(e)), h(e), e.data = n, this.each(function () {
            "dispatchEvent" in this && this.dispatchEvent(e)
        })
    }, t.fn.triggerHandler = function (e, i) {
        var r, o;
        return this.each(function (a, s) {
            r = l("string" == typeof e ? t.Event(e) : e), r.data = i, r.target = s, t.each(n(s, e.type || e), function (t, e) {
                return o = e.proxy(r), r.isImmediatePropagationStopped() ? !1 : void 0
            })
        }), o
    }, "focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select keydown keypress keyup error".split(" ").forEach(function (e) {
        t.fn[e] = function (t) {
            return t ? this.bind(e, t) : this.trigger(e)
        }
    }), v.split(" ").forEach(function (e) {
        t.fn[e] = function (t) {
            return t ? this.bind(e, t) : this.trigger(e)
        }
    }), ["focus", "blur"].forEach(function (e) {
        t.fn[e] = function (t) {
            return t ? this.bind(e, t) : this.each(function () {
                try {
                    this[e]()
                } catch (t) {
                }
            }), this
        }
    }), t.Event = function (t, e) {
        "string" != typeof t && (e = t, t = e.type);
        var n = document.createEvent(p[t] || "Events"), i = !0;
        if (e)for (var r in e)"bubbles" == r ? i = !!e[r] : n[r] = e[r];
        return n.initEvent(t, i, !0, null, null, null, null, null, null, null, null, null, null, null, null), n.isDefaultPrevented = function () {
            return this.defaultPrevented
        }, n
    }
}(Zepto), function (t) {
    "user strict";
    var e = "ontouchstart" in window, n = window.navigator.userAgent, i = n.match(/(Windows\s+Phone)\s([\d\.]+)/), r = function () {
        var t = {};
        return t = e ? {
            touchstart: "touchstart",
            touchmove: "touchmove",
            touchend: "touchend",
            touchcancel: "touchcancel"
        } : i ? {
            touchstart: "MSPointerDown",
            touchmove: "MSPointerMove",
            touchend: "MSPointerUp",
            touchcancel: "MSPointerCancel"
        } : {touchstart: "mousedown", touchmove: "mousemove", touchend: "mouseup", touchcancel: "mouseout"}
    }(), o = function (t, e, n, i) {
        return Math.abs(t - e) >= Math.abs(n - i) ? t - e > 0 ? "Left" : "Right" : n - i > 0 ? "Up" : "Down"
    }, a = function (t) {
        this.elem = t, this.moved = !1, this.startX = 0, this.startY = 0, this.endX = 0, this.endY = 0, this.touchFlag = !1, this.startTime = 0, this.endTime = 0, this.longTap = null, this.init()
    };
    a.init = function (t) {
        t.touchBind || (t.touchBind = new a(t))
    }, a.prototype.init = function (t) {
        this.elem.addEventListener(r.touchstart, this, !1)
    }, a.prototype.start = function (t) {
        var e = this;
        this.startX = "touchstart" === t.type ? t.touches[0].clientX : t.clientX, this.startY = "touchstart" === t.type ? t.touches[0].clientY : t.clientY, this.endX = 0, this.endY = 0, this.touchFlag = !0, this.moved = !1, clearTimeout(this.longTap), this.longTap = setTimeout(function () {
            e.over(), e.emit("longTap", t)
        }, 500), this.elem.addEventListener(r.touchend, this, !1), this.elem.addEventListener(r.touchcancel, this, !1), this.elem.addEventListener(r.touchmove, this, !1)
    }, a.prototype.move = function (t) {
        if (t.startPosition = {
                clientX: this.startX,
                clientY: this.startY
            }, this.touchFlag)if (this.endX = "touchmove" === t.type ? t.touches[0].clientX : t.clientX, this.endY = "touchmove" === t.type ? t.touches[0].clientY : t.clientY, Math.abs(this.startX - this.endX) > 2 || Math.abs(this.startY - this.endY) > 2) {
            this.over(), this.moved = !0;
            var e = o(this.startX, this.endX, this.startY, this.endY);
            this.emit("swipe" + e, t)
        } else this.moved = !1
    }, a.prototype.end = function (t) {
        if (this.touchFlag || !this.moved) {
            t.stopPropagation();
            var e = new Date;
            e - this.endTime < 260 ? this.emit("doubleTap", t) : this.emit("tap", t), this.endTime = e, this.over()
        }
    }, a.prototype.cancel = function (t) {
        this.hasTouchEventOccured = !1, this.moved = !1, this.startX = 0, this.startY = 0
    }, a.prototype.over = function () {
        clearTimeout(this.longTap), this.moved = !1, this.hasTouchEventOccured = !1, this.elem.removeEventListener(r.touchmove, this, !1), this.elem.removeEventListener(r.touchend, this, !1), this.elem.removeEventListener(r.touchcancel, this, !1)
    }, a.prototype.emit = function (t, e) {
        var n;
        window.CustomEvent ? n = new window.CustomEvent(t, {
            bubbles: !0,
            cancelable: !0
        }) : (n = document.createEvent("Event"), n.initEvent(t, !0, !0)), e.stopPropagation(), e.target.dispatchEvent(n) || e.preventDefault()
    }, a.prototype.handleEvent = function (t) {
        switch (t.type) {
            case r.touchstart:
                this.start(t);
                break;
            case r.touchmove:
                this.move(t);
                break;
            case r.touchend:
                this.end(t);
                break;
            case r.touchcancel:
                this.cancel(t)
        }
    }, t.Touch = a
}(Zepto), function (t) {
    function e(e, n, i) {
        var r = t.Event(n);
        return t(e).trigger(r, i), !r.defaultPrevented
    }

    function n(t, n, i, r) {
        return t.global ? e(n || y, i, r) : void 0
    }

    function i(e) {
        e.global && 0 === t.active++ && n(e, null, "ajaxStart")
    }

    function r(e) {
        e.global && !--t.active && n(e, null, "ajaxStop")
    }

    function o(t, e) {
        var i = e.context;
        return e.beforeSend.call(i, t, e) === !1 || n(e, i, "ajaxBeforeSend", [t, e]) === !1 ? !1 : void n(e, i, "ajaxSend", [t, e])
    }

    function a(t, e, i) {
        delete w[i.url];
        var r = i.context, o = "success";
        i.success.call(r, t, o, e), n(i, r, "ajaxSuccess", [e, i, t]), c(o, e, i)
    }

    function s(t, e, i, r) {
        delete w[r.url];
        var o = r.context;
        r.error.call(o, i, e, t), n(r, o, "ajaxError", [i, r, t]), c(e, i, r)
    }

    function c(t, e, i) {
        var o = i.context;
        i.complete.call(o, e, t), n(i, o, "ajaxComplete", [e, i]), r(i)
    }

    function u() {
    }

    function l(t) {
        return t && (t = t.split(";", 2)[0]), t && (t == T ? "html" : t == j ? "json" : x.test(t) ? "script" : E.test(t) && "xml") || "text"
    }

    function h(t, e) {
        return (t + "&" + e).replace(/[&?]{1,2}/, "?")
    }

    function f(e) {
        e.processData && e.data && "string" != t.type(e.data) && (e.data = t.param(e.data, e.traditional)), !e.data || e.type && "GET" != e.type.toUpperCase() || (e.url = h(e.url, e.data))
    }

    function d(e, n, i, r) {
        var o = !t.isFunction(n);
        return {url: e, data: o ? n : void 0, success: o ? t.isFunction(i) ? i : void 0 : n, dataType: o ? r || i : i}
    }

    function p(e, n, i, r) {
        var o, a = t.isArray(n);
        t.each(n, function (n, s) {
            o = t.type(s), r && (n = i ? r : r + "[" + (a ? "" : n) + "]"), !r && a ? e.add(s.name, s.value) : "array" == o || !i && "object" == o ? p(e, s, i, n) : e.add(n, s)
        })
    }

    var m, v, g = 0, y = window.document, w = {}, b = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, x = /^(?:text|application)\/javascript/i, E = /^(?:text|application)\/xml/i, j = "application/json", T = "text/html", _ = /^\s*$/;
    t.active = 0, t.ajaxJSONP = function (e) {
        if (!("type" in e))return t.ajax(e);
        if (!w[e.url]) {
            w[e.url] = e.url;
            var n, i = "jsonp" + ++g, r = y.createElement("script"), c = function () {
                clearTimeout(n), t(r).remove(), delete window[i]
            }, l = function (t) {
                c(), t && "timeout" != t || (window[i] = u), s(null, t || "abort", h, e)
            }, h = {abort: l};
            return o(h, e) === !1 ? (l("abort"), !1) : (window[i] = function (t) {
                c(), a(t, h, e)
            }, r.onerror = function () {
                l("error")
            }, r.src = e.url.replace(/=\?/, "=" + i), t("head").append(r), e.timeout > 0 && (n = setTimeout(function () {
                l("timeout")
            }, e.timeout)), h)
        }
    }, t.ajaxSettings = {
        type: "GET",
        beforeSend: u,
        success: u,
        error: u,
        complete: u,
        context: null,
        global: !0,
        xhr: function () {
            return new window.XMLHttpRequest
        },
        accepts: {
            script: "text/javascript, application/javascript",
            json: j,
            xml: "application/xml, text/xml",
            html: T,
            text: "text/plain"
        },
        crossDomain: !1,
        timeout: 0,
        processData: !0,
        cache: !0
    }, t.ajax = function (e) {
        var n = t.extend({}, e || {});
        for (m in t.ajaxSettings)void 0 === n[m] && (n[m] = t.ajaxSettings[m]);
        i(n), n.crossDomain || (n.crossDomain = /^([\w-]+:)?\/\/([^\/]+)/.test(n.url) && RegExp.$2 != window.location.host), n.url || (n.url = window.location.toString()), f(n), n.cache === !1 && (n.url = h(n.url, "_=" + Date.now()));
        var r = n.dataType, c = /=\?/.test(n.url);
        if ("jsonp" == r || c)return c || (n.url = h(n.url, "callback=?")), t.ajaxJSONP(n);
        if (!w[n.url]) {
            w[n.url] = n.url;
            var d, p = n.accepts[r], g = {}, y = /^([\w-]+:)\/\//.test(n.url) ? RegExp.$1 : window.location.protocol, b = n.xhr();
            n.crossDomain || (g["X-Requested-With"] = "XMLHttpRequest"), p && (g.Accept = p, p.indexOf(",") > -1 && (p = p.split(",", 2)[0]), b.overrideMimeType && b.overrideMimeType(p)), (n.contentType || n.contentType !== !1 && n.data && "GET" != n.type.toUpperCase()) && (g["Content-Type"] = n.contentType || "application/x-www-form-urlencoded"), n.headers = t.extend(g, n.headers || {}), b.onreadystatechange = function () {
                if (4 == b.readyState) {
                    b.onreadystatechange = u, clearTimeout(d);
                    var e, i = !1;
                    if (b.status >= 200 && b.status < 300 || 304 == b.status || 0 == b.status && "file:" == y) {
                        r = r || l(b.getResponseHeader("content-type")), e = b.responseText;
                        try {
                            "script" == r ? (0, eval)(e) : "xml" == r ? e = b.responseXML : "json" == r && (e = _.test(e) ? null : t.parseJSON(e))
                        } catch (o) {
                            i = o
                        }
                        i ? s(i, "parsererror", b, n) : a(e, b, n)
                    } else s(null, b.status ? "error" : "abort", b, n)
                }
            };
            var x = "async" in n ? n.async : !0;
            b.open(n.type, n.url, x);
            for (v in n.headers)b.setRequestHeader(v, n.headers[v]);
            return o(b, n) === !1 ? (b.abort(), !1) : (n.timeout > 0 && (d = setTimeout(function () {
                b.onreadystatechange = u, b.abort(), s(null, "timeout", b, n)
            }, n.timeout)), b.send(n.data ? n.data : null), b)
        }
    }, t.get = function (e, n, i, r) {
        return t.ajax(d.apply(null, arguments))
    }, t.post = function (e, n, i, r) {
        var o = d.apply(null, arguments);
        return o.type = "POST", t.ajax(o)
    }, t.getJSON = function (e, n, i) {
        var r = d.apply(null, arguments);
        return r.dataType = "json", t.ajax(r)
    }, t.fn.load = function (e, n, i) {
        if (!this.length)return this;
        var r, o = this, a = e.split(/\s/), s = d(e, n, i), c = s.success;
        return a.length > 1 && (s.url = a[0], r = a[1]), s.success = function (e) {
            o.html(r ? t("<div>").html(e.replace(b, "")).find(r) : e), c && c.apply(o, arguments)
        }, t.ajax(s), this
    };
    var S = encodeURIComponent;
    t.param = function (t, e) {
        var n = [];
        return n.add = function (t, e) {
            this.push(S(t) + "=" + S(e))
        }, p(n, t, e), n.join("&").replace(/%20/g, "+")
    }
}(Zepto), function (t) {
    t.fn.serializeArray = function () {
        var e, n = [];
        return t(Array.prototype.slice.call(this.get(0).elements)).each(function () {
            e = t(this);
            var i = e.attr("type");
            "fieldset" != this.nodeName.toLowerCase() && !this.disabled && "submit" != i && "reset" != i && "button" != i && ("radio" != i && "checkbox" != i || this.checked) && n.push({
                name: e.attr("name"),
                value: e.val()
            })
        }), n
    }, t.fn.serialize = function () {
        var t = [];
        return this.serializeArray().forEach(function (e) {
            t.push(encodeURIComponent(e.name) + "=" + encodeURIComponent(e.value))
        }), t.join("&")
    }, t.fn.submit = function (e) {
        if (e)this.bind("submit", e); else if (this.length) {
            var n = t.Event("submit");
            this.eq(0).trigger(n), n.defaultPrevented || this.get(0).submit()
        }
        return this
    }, t.parseTpl = function (t, e) {
        var n = "var __p=[];with(obj||{}){__p.push('" + t.replace(/\\/g, "\\\\").replace(/'/g, "\\'").replace(/<%=([\s\S]+?)%>/g, function (t, e) {
                return "'," + e.replace(/\\'/, "'") + ",'"
            }).replace(/<%([\s\S]+?)%>/g, function (t, e) {
                return "');" + e.replace(/\\'/, "'").replace(/[\r\n\t]/g, " ") + "__p.push('"
            }).replace(/\r/g, "\\r").replace(/\n/g, "\\n").replace(/\t/g, "\\t") + '\');}return __p.join("");', i = new Function("obj", n);
        return e ? i(e) : i
    }
}(Zepto), function (t, e) {
    function n(n, i, r, o, a) {
        "function" != typeof i || a || (a = i, i = e);
        var s = {opacity: r};
        return o && n.css(t.fx.cssPrefix + "transform-origin", "0 0"), n.animate(s, i, null, a)
    }

    function i(e, i, r, o) {
        return n(e, i, 0, r, function () {
            a.call(t(this)), o && o.call(this)
        })
    }

    var r = window.document, o = (r.documentElement, t.fn.show), a = t.fn.hide, s = t.fn.toggle;
    t.fn.show = function (t, i) {
        return o.call(this), t === e ? t = 0 : this.css("opacity", 0), n(this, t, 1, "1,1", i)
    }, t.fn.hide = function (t, n) {
        return t === e ? a.call(this) : i(this, t, "0,0", n)
    }, t.fn.toggle = function (n, i) {
        return n === e || "boolean" == typeof n ? s.call(this, n) : this.each(function () {
            var e = t(this);
            e["none" == e.css("display") ? "show" : "hide"](n, i)
        })
    }, t.fn.fadeTo = function (t, e, i) {
        return n(this, t, e, null, i)
    }, t.fn.fadeIn = function (t, e) {
        var n = this.css("opacity");
        return n > 0 ? this.css("opacity", 0) : n = 1, o.call(this).fadeTo(t, n, e)
    }, t.fn.fadeOut = function (t, e) {
        return i(this, t, null, e)
    }, t.fn.fadeToggle = function (e, n) {
        return this.each(function () {
            var i = t(this);
            i[0 == i.css("opacity") || "none" == i.css("display") ? "fadeIn" : "fadeOut"](e, n)
        })
    }
}(Zepto), function (t, e) {
    function n(t) {
        return i(t.replace(/([a-z])([A-Z])/, "$1-$2"))
    }

    function i(t) {
        return t.toLowerCase()
    }

    function r(t) {
        return o ? o + t : i(t)
    }

    var o, a, s, c, u, l, h, f, d = "", p = {
        Webkit: "webkit",
        Moz: "",
        O: "o",
        ms: "MS"
    }, m = window.document, v = m.createElement("div"), g = /^((translate|rotate|scale)(X|Y|Z|3d)?|matrix(3d)?|perspective|skew(X|Y)?)$/i, y = {};
    t.each(p, function (t, n) {
        return v.style[t + "TransitionProperty"] !== e ? (d = "-" + i(t) + "-", o = n, !1) : void 0
    }), a = d + "transform", y[s = d + "transition-property"] = y[c = d + "transition-duration"] = y[u = d + "transition-timing-function"] = y[l = d + "animation-name"] = y[h = d + "animation-duration"] = y[f = d + "animation-timing-function"] = "", t.fx = {
        off: o === e && v.style.transitionProperty === e,
        speeds: {_default: 400, fast: 200, slow: 600},
        cssPrefix: d,
        transitionEnd: r("TransitionEnd"),
        animationEnd: r("AnimationEnd")
    }, t.fn.animate = function (e, n, i, r) {
        return t.isPlainObject(n) && (i = n.easing, r = n.complete, n = n.duration), n && (n = ("number" == typeof n ? n : t.fx.speeds[n] || t.fx.speeds._default) / 1e3), this.anim(e, n, i, r)
    }, t.fn.anim = function (i, r, o, d) {
        var p, m, v, w = {}, b = "", x = this, E = t.fx.transitionEnd;
        if (r === e && (r = .4), t.fx.off && (r = 0), "string" == typeof i)w[l] = i, w[h] = r + "s", w[f] = o || "linear", E = t.fx.animationEnd; else {
            m = [];
            for (p in i)g.test(p) ? b += p + "(" + i[p] + ") " : (w[p] = i[p], m.push(n(p)));
            b && (w[a] = b, m.push(a)), r > 0 && "object" == typeof i && (w[s] = m.join(", "), w[c] = r + "s", w[u] = o || "linear")
        }
        return v = function (e) {
            if ("undefined" != typeof e) {
                if (e.target !== e.currentTarget)return;
                t(e.target).unbind(E, v)
            }
            t(this).css(y), d && d.call(this)
        }, r > 0 && this.bind(E, v), this.size() && this.get(0).clientLeft, this.css(w), 0 >= r && setTimeout(function () {
            x.each(function () {
                v.call(this)
            })
        }, 0), this
    }, v = null
}(Zepto), function (t, e) {
    var n, i = e.userAgent, r = t.browser, o = {
        qq: /MQQBrowser\/([\d.]+)/i,
        uc: /UCBrowser\/([\d.]+)/i,
        baidu: /baidubrowser\/.*?([\d.]+)/i
    };
    t.each(o, function (t, e) {
        return (n = i.match(e)) ? (r[t] = !0, r.version = n[1], !1) : void 0
    }), !r.uc && /Uc/i.test(e.appVersion) && (r.uc = !0)
}(Zepto, navigator), function (t) {
    t.matchMedia = function () {
        var e = 0, n = "gmu-media-detect", i = t.fx.transitionEnd, r = t.fx.cssPrefix, o = t("<style></style>").append("." + n + "{" + r + "transition: width 0.001ms; width: 0; position: absolute; clip: rect(1px, 1px, 1px, 1px);}\n").appendTo("head");
        return function (r) {
            var a, s, c = n + e++, u = [];
            return o.append("@media " + r + " { #" + c + " { width: 1px; } }\n"), a = t('<div class="' + n + '" id="' + c + '"></div>').appendTo("body").on(i, function () {
                s.matches = 1 === a.width(), t.each(u, function (e, n) {
                    t.isFunction(n) && n.call(s, s)
                })
            }), s = {
                matches: 1 === a.width(), media: r, addListener: function (t) {
                    return u.push(t), this
                }, removeListener: function (t) {
                    var e = u.indexOf(t);
                    return ~e && u.splice(e, 1), this
                }
            }
        }
    }()
}(Zepto), $(function () {
    $.mediaQuery = {ortchange: "screen and (width: " + window.innerWidth + "px)"}, $.matchMedia($.mediaQuery.ortchange).addListener(function () {
        $(window).trigger("ortchange")
    })
}), function (t) {
    t.extend(t, {
        throttle: function (e, n, i) {
            function r() {
                function t() {
                    a = Date.now(), n.apply(s, u)
                }

                function r() {
                    o = void 0
                }

                var s = this, c = Date.now() - a, u = arguments;
                i && !o && t(), o && clearTimeout(o), void 0 === i && c > e ? t() : o = setTimeout(i ? r : t, void 0 === i ? e - c : e)
            }

            var o, a = 0;
            return "function" != typeof n && (i = n, n = e, e = 250), r._zid = n._zid = n._zid || t.proxy(n)._zid, r
        }, debounce: function (e, n, i) {
            return void 0 === n ? t.throttle(250, e, !1) : t.throttle(e, n, void 0 === i ? !1 : i !== !1)
        }
    })
}(Zepto), function (t, e) {
    function n() {
        t(e).on("scroll", t.debounce(80, function () {
            t(e).trigger("scrollStop")
        }, !1))
    }

    function i() {
        t(e).off("scroll"), n()
    }

    n(), t(e).on("pageshow", function (n) {
        n.persisted && t(e).off("touchstart", i).one("touchstart", i)
    })
}(Zepto, window), function (t, e) {
    t.extend(t.fn, {
        fix: function (n) {
            var i = this;
            if (i.attr("isFixed"))return i;
            i.css(n).css("position", "fixed").attr("isFixed", !0);
            var r = t('<div style="position:fixed;top:10px;"></div>').appendTo("body"), o = r[0].getBoundingClientRect().top, a = function () {
                window.pageYOffset > 0 && (r[0].getBoundingClientRect().top !== o && (i.css("position", "absolute"), s(), t(window).on("scrollStop", s), t(window).on("ortchange", s)), t(window).off("scrollStop", a), r.remove())
            }, s = function () {
                i.css({
                    top: window.pageYOffset + (n.bottom !== e ? window.innerHeight - i.height() - n.bottom : n.top || 0),
                    left: n.right !== e ? document.body.offsetWidth - i.width() - n.right : n.left || 0
                }), "100%" == n.width && i.css("width", document.body.offsetWidth)
            };
            return t(window).on("scrollStop", a), i
        }
    })
}(Zepto), function (t) {
    function e() {
        var t = n.attr("hl-cls");
        clearTimeout(i), n.removeClass(t).removeAttr("hl-cls"), n = null, r.off("touchend touchmove touchcancel", e)
    }

    var n, i, r = t(document);
    t.fn.highlight = function (o, a) {
        return this.each(function () {
            var s = t(this);
            s.css("-webkit-tap-highlight-color", "rgba(255,255,255,0)").off("touchstart.hl"), o && s.on("touchstart.hl", function (c) {
                var u;
                n = a ? (u = t(c.target).closest(a, this)) && u.length && u : s, n && (n.attr("hl-cls", o), i = setTimeout(function () {
                    n.addClass(o)
                }, 100), r.on("touchend touchmove touchcancel", e))
            })
        })
    }
}(Zepto), function (t) {
    function e(e) {
        return this.each(function (n) {
            var r = t(this), o = t.isFunction(e) ? e.call(this, n, r.offset()) : e, a = r.css("position"), s = "absolute" === a || "fixed" === a || r.position();
            "relative" === a && (s.top -= parseFloat(r.css("top")) || -1 * parseFloat(r.css("bottom")) || 0, s.left -= parseFloat(r.css("left")) || -1 * parseFloat(r.css("right")) || 0), parentOffset = r.offsetParent().offset(), props = {
                top: i(o.top - (s.top || 0) - parentOffset.top),
                left: i(o.left - (s.left || 0) - parentOffset.left)
            }, "static" == a && (props.position = "relative"), o.using ? o.using.call(this, props, n) : r.css(props)
        })
    }

    var n = t.fn.offset, i = Math.round;
    t.fn.offset = function (t) {
        return t ? e.call(this, t) : n.call(this)
    }
}(Zepto), function (t, e) {
    function n(t, e) {
        return (parseInt(t, 10) || 0) * (h.test(t) ? e / 100 : 1)
    }

    function i(t, e, i, r) {
        return ["right" === t[0] ? i : "center" === t[0] ? i / 2 : 0, "bottom" === t[1] ? r : "center" === t[1] ? r / 2 : 0, n(e[0], i), n(e[1], r)]
    }

    function r(t) {
        var e = t[0], n = e.preventDefault;
        return e = e.touches && e.touches[0] || e, 9 === e.nodeType || e === window || n ? {
            width: n ? 0 : t.width(),
            height: n ? 0 : t.height(),
            top: e.pageYOffset || e.pageY || 0,
            left: e.pageXOffset || e.pageX || 0
        } : t.offset()
    }

    function o(e) {
        var n = t(e = e || window), i = r(n);
        return e = n[0], {
            $el: n,
            width: i.width,
            height: i.height,
            scrollLeft: e.pageXOffset || e.scrollLeft,
            scrollTop: e.pageYOffset || e.scrollTop
        }
    }

    function a(t, e) {
        ["my", "at"].forEach(function (n) {
            var i = (t[n] || "").split(" "), r = t[n] = ["center", "center"], o = e[n] = [0, 0];
            1 === i.length && i[l.test(i[0]) ? "unshift" : "push"]("center"), u.test(i[0]) && (r[0] = RegExp.$1) && (o[0] = RegExp.$2), l.test(i[1]) && (r[1] = RegExp.$1) && (o[1] = RegExp.$2)
        })
    }

    var s = t.fn.position, c = Math.round, u = /^(left|center|right)([\+\-]\d+%?)?$/, l = /^(top|center|bottom)([\+\-]\d+%?)?$/, h = /%$/;
    t.fn.position = function (e) {
        if (!e || !e.of)return s.call(this);
        e = t.extend({}, e);
        var n, u = t(e.of), l = e.collision, h = l && o(e.within), f = {}, d = r(u), p = {left: d.left, top: d.top};
        return u[0].preventDefault && (e.at = "left top"), a(e, f), n = i(e.at, f.at, d.width, d.height), p.left += n[0] + n[2], p.top += n[1] + n[3], this.each(function () {
            var n = t(this), r = n.offset(), o = t.extend({}, p), a = i(e.my, f.my, r.width, r.height);
            o.left = c(o.left + a[2] - a[0]), o.top = c(o.top + a[3] - a[1]), l && l.call(this, o, {
                of: d,
                offset: r,
                my: e.my,
                at: e.at,
                within: h,
                $el: n
            }), o.using = e.using, n.offset(o)
        })
    }
}(Zepto), function (t, e) {
    var n = t.browser;
    t.support = t.extend(t.support || {}, {
        orientation: !(n.uc || parseFloat(t.os.version) < 5 && (n.qq || n.chrome)) && !(t.os.android && parseFloat(t.os.version) > 3) && "orientation" in window && "onorientationchange" in window,
        touch: "ontouchend" in document,
        cssTransitions: "WebKitTransitionEvent" in window,
        has3d: "WebKitCSSMatrix" in window && "m11" in new WebKitCSSMatrix,
        pushState: "pushState" in history && "replaceState" in history,
        scrolling: "",
        requestAnimationFrame: "webkitRequestAnimationFrame" in window
    })
}(Zepto), !function (t) {
    function e(e, i) {
        var c = e[s], u = c && r[c];
        if (void 0 === i)return u || n(e);
        if (u) {
            if (i in u)return u[i];
            var l = a(i);
            if (l in u)return u[l]
        }
        return o.call(t(e), i)
    }

    function n(e, n, o) {
        var c = e[s] || (e[s] = ++t.uuid), u = r[c] || (r[c] = i(e));
        return void 0 !== n && (u[a(n)] = o), u
    }

    function i(e) {
        var n = {};
        return t.each(e.attributes || c, function (e, i) {
            0 == i.name.indexOf("data-") && (n[a(i.name.replace("data-", ""))] = t.zepto.deserializeValue(i.value))
        }), n
    }

    var r = {}, o = t.fn.data, a = t.camelCase, s = t.expando = "Zepto" + +new Date, c = [];
    t.fn.data = function (i, r) {
        return void 0 === r ? t.isPlainObject(i) ? this.each(function (e, r) {
            t.each(i, function (t, e) {
                n(r, t, e)
            })
        }) : 0 == this.length ? void 0 : e(this[0], i) : this.each(function () {
            n(this, i, r)
        })
    }, t.fn.removeData = function (e) {
        return "string" == typeof e && (e = e.split(/\s+/)), this.each(function () {
            var n = this[s], i = n && r[n];
            i && t.each(e || i, function (t) {
                delete i[e ? a(this) : t]
            })
        })
    }, ["remove", "empty"].forEach(function (e) {
        var n = t.fn[e];
        t.fn[e] = function () {
            var t = this.find("*");
            return "remove" === e && (t = t.add(this)), t.removeData(), n.call(this)
        }
    }), t.getQueryString = function (t, e) {
        var n = new RegExp(e + "\\s*=\\s*([^&#]+)\\s*"), i = t.match(n);
        return null != i ? decodeURI(i[1]) : ""
    }, t.fn.subStr = function (e) {
        var n = e || 10;
        return this.each(function () {
            var e, i, r = t(this), o = t.trim(r.html()), a = o.replace(/[^\x00-\xff]/g, "**").length, s = 2, c = n;
            if (a > c) {
                for (e = 0; e < o.length;) {
                    var u = o.charAt(e), l = u.replace(/[^\x00-\xff]/g, "**").length;
                    if (s += l, !(c >= s)) {
                        i = o.slice(0, e), i += "...";
                        break
                    }
                    e++
                }
                r.html(i)
            }
        })
    }
}(Zepto), function (t, e) {
    function n(t) {
        return function (e) {
            return {}.toString.call(e) == "[object " + t + "]"
        }
    }

    function i() {
        return _++
    }

    function r(t) {
        return t.match(C)[0]
    }

    function o(t) {
        for (t = t.replace(A, "/"), t = t.replace(P, "$1/"); t.match(N);)t = t.replace(N, "/");
        return t
    }

    function a(t) {
        var e = t.length - 1, n = t.charAt(e);
        return "#" === n ? t.substring(0, e) : ".js" === t.substring(e - 2) || t.indexOf("?") > 0 || "/" === n ? t : t + ".js"
    }

    function s(t) {
        var e = b.alias;
        return e && E(e[t]) ? e[t] : t
    }

    function c(t) {
        var e, n = b.paths;
        return n && (e = t.match(k)) && E(n[e[1]]) && (t = n[e[1]] + e[2]), t
    }

    function u(t) {
        var e = b.vars;
        return e && t.indexOf("{") > -1 && (t = t.replace(M, function (t, n) {
            return E(e[n]) ? e[n] : t
        })), t
    }

    function l(t) {
        var e = b.map, n = t;
        if (e)for (var i = 0, r = e.length; r > i; i++) {
            var o = e[i];
            if (n = T(o) ? o(t) || t : t.replace(o[0], o[1]), n !== t)break
        }
        return n
    }

    function h(t, e) {
        var n, i = t.charAt(0);
        if ($.test(t))n = t; else if ("." === i)n = o((e ? r(e) : b.cwd) + t); else if ("/" === i) {
            var a = b.cwd.match(D);
            n = a ? a[0] + t.substring(1) : t
        } else n = b.base + t;
        return 0 === n.indexOf("//") && (n = location.protocol + n), n
    }

    function f(t, e) {
        if (!t)return "";
        t = s(t), t = c(t), t = u(t), t = a(t);
        var n = h(t, e);
        return n = l(n)
    }

    function d(t) {
        return t.hasAttribute ? t.src : t.getAttribute("src", 4)
    }

    function p(t, e, n) {
        var i = q.createElement("script");
        if (n) {
            var r = T(n) ? n(t) : n;
            r && (i.charset = r)
        }
        m(i, e, t), i.async = !0, i.src = t, W = i, U ? B.insertBefore(i, U) : B.appendChild(i), W = null
    }

    function m(t, e, n) {
        function i() {
            t.onload = t.onerror = t.onreadystatechange = null, b.debug || B.removeChild(t), t = null, e()
        }

        var r = "onload" in t;
        r ? (t.onload = i, t.onerror = function () {
            O("error", {uri: n, node: t}), i()
        }) : t.onreadystatechange = function () {
            /loaded|complete/.test(t.readyState) && i()
        }
    }

    function v() {
        if (W)return W;
        if (X && "interactive" === X.readyState)return X;
        for (var t = B.getElementsByTagName("script"), e = t.length - 1; e >= 0; e--) {
            var n = t[e];
            if ("interactive" === n.readyState)return X = n
        }
    }

    function g(t) {
        var e = [];
        return t.replace(Y, "").replace(z, function (t, n, i) {
            i && e.push(i)
        }), e
    }

    function y(t, e) {
        this.uri = t, this.dependencies = e || [], this.exports = null, this.status = 0, this._waitings = {}, this._remain = 0
    }

    if (!t.seajs) {
        var w = t.seajs = {version: "2.3.0"}, b = w.data = {}, x = n("Object"), E = n("String"), j = Array.isArray || n("Array"), T = n("Function"), _ = 0, S = b.events = {};
        w.on = function (t, e) {
            var n = S[t] || (S[t] = []);
            return n.push(e), w
        }, w.off = function (t, e) {
            if (!t && !e)return S = b.events = {}, w;
            var n = S[t];
            if (n)if (e)for (var i = n.length - 1; i >= 0; i--)n[i] === e && n.splice(i, 1); else delete S[t];
            return w
        };
        var O = w.emit = function (t, e) {
            var n = S[t];
            if (n) {
                n = n.slice();
                for (var i = 0, r = n.length; r > i; i++)n[i](e)
            }
            return w
        }, C = /[^?#]*\//, A = /\/\.\//g, N = /\/[^\/]+\/\.\.\//, P = /([^:\/])\/+\//g, k = /^([^\/:]+)(\/.+)$/, M = /{([^{]+)}/g, $ = /^\/\/.|:\//, D = /^.*?\/\/.*?\//, q = document, L = location.href && 0 !== location.href.indexOf("about:") ? r(location.href) : "", F = q.scripts, R = q.getElementById("seajsnode") || F[F.length - 1], Z = r(d(R) || L);
        w.resolve = f;
        var W, X, B = q.head || q.getElementsByTagName("head")[0] || q.documentElement, U = B.getElementsByTagName("base")[0];
        w.request = p;
        var I, z = /"(?:\\"|[^"])*"|'(?:\\'|[^'])*'|\/\*[\S\s]*?\*\/|\/(?:\\\/|[^\/\r\n])+\/(?=[^\/])|\/\/.*|\.\s*require|(?:^|[^$])\brequire\s*\(\s*(["'])(.+?)\1\s*\)/g, Y = /\\\\/g, J = w.cache = {}, H = {}, V = {}, G = {}, Q = y.STATUS = {
            FETCHING: 1,
            SAVED: 2,
            LOADING: 3,
            LOADED: 4,
            EXECUTING: 5,
            EXECUTED: 6
        };
        y.prototype.resolve = function () {
            for (var t = this, e = t.dependencies, n = [], i = 0, r = e.length; r > i; i++)n[i] = y.resolve(e[i], t.uri);
            return n
        }, y.prototype.load = function () {
            var t = this;
            if (!(t.status >= Q.LOADING)) {
                t.status = Q.LOADING;
                var e = t.resolve();
                O("load", e);
                for (var n, i = t._remain = e.length, r = 0; i > r; r++)n = y.get(e[r]), n.status < Q.LOADED ? n._waitings[t.uri] = (n._waitings[t.uri] || 0) + 1 : t._remain--;
                if (0 === t._remain)return void t.onload();
                var o = {};
                for (r = 0; i > r; r++)n = J[e[r]], n.status < Q.FETCHING ? n.fetch(o) : n.status === Q.SAVED && n.load();
                for (var a in o)o.hasOwnProperty(a) && o[a]()
            }
        }, y.prototype.onload = function () {
            var t = this;
            t.status = Q.LOADED, t.callback && t.callback();
            var e, n, i = t._waitings;
            for (e in i)i.hasOwnProperty(e) && (n = J[e], n._remain -= i[e], 0 === n._remain && n.onload());
            delete t._waitings, delete t._remain
        }, y.prototype.fetch = function (t) {
            function e() {
                w.request(o.requestUri, o.onRequest, o.charset)
            }

            function n() {
                delete H[a], V[a] = !0, I && (y.save(r, I), I = null);
                var t, e = G[a];
                for (delete G[a]; t = e.shift();)t.load()
            }

            var i = this, r = i.uri;
            i.status = Q.FETCHING;
            var o = {uri: r};
            O("fetch", o);
            var a = o.requestUri || r;
            return !a || V[a] ? void i.load() : H[a] ? void G[a].push(i) : (H[a] = !0, G[a] = [i], O("request", o = {
                uri: r,
                requestUri: a,
                onRequest: n,
                charset: b.charset
            }), void(o.requested || (t ? t[o.requestUri] = e : e())))
        }, y.prototype.exec = function () {
            function t(e) {
                return y.get(t.resolve(e)).exec()
            }

            var n = this;
            if (n.status >= Q.EXECUTING)return n.exports;
            n.status = Q.EXECUTING;
            var r = n.uri;
            t.resolve = function (t) {
                return y.resolve(t, r)
            }, t.async = function (e, n) {
                return y.use(e, n, r + "_async_" + i()), t
            };
            var o = n.factory, a = T(o) ? o(t, n.exports = {}, n) : o;
            return a === e && (a = n.exports), delete n.factory, n.exports = a, n.status = Q.EXECUTED, O("exec", n), a
        }, y.resolve = function (t, e) {
            var n = {id: t, refUri: e};
            return O("resolve", n), n.uri || w.resolve(n.id, e)
        }, y.define = function (t, n, i) {
            var r = arguments.length;
            1 === r ? (i = t, t = e) : 2 === r && (i = n, j(t) ? (n = t, t = e) : n = e), !j(n) && T(i) && (n = g(i.toString()));
            var o = {id: t, uri: y.resolve(t), deps: n, factory: i};
            if (!o.uri && q.attachEvent) {
                var a = v();
                a && (o.uri = a.src)
            }
            O("define", o), o.uri ? y.save(o.uri, o) : I = o
        }, y.save = function (t, e) {
            var n = y.get(t);
            n.status < Q.SAVED && (n.id = e.id || t, n.dependencies = e.deps || [], n.factory = e.factory, n.status = Q.SAVED, O("save", n))
        }, y.get = function (t, e) {
            return J[t] || (J[t] = new y(t, e))
        }, y.use = function (e, n, i) {
            var r = y.get(i, j(e) ? e : [e]);
            r.callback = function () {
                for (var e = [], i = r.resolve(), o = 0, a = i.length; a > o; o++)e[o] = J[i[o]].exec();
                n && n.apply(t, e), delete r.callback
            }, r.load()
        }, w.use = function (t, e) {
            return y.use(t, e, b.cwd + "_use_" + i()), w
        }, y.define.cmd = {}, t.define = y.define, w.Module = y, b.fetchedList = V, b.cid = i, w.require = function (t) {
            var e = y.get(y.resolve(t));
            return e.status < Q.EXECUTING && (e.onload(), e.exec()), e.exports
        }, b.base = Z, b.dir = Z, b.cwd = L, b.charset = "utf-8", w.config = function (t) {
            for (var e in t) {
                var n = t[e], i = b[e];
                if (i && x(i))for (var r in n)i[r] = n[r]; else j(i) ? n = i.concat(n) : "base" === e && ("/" !== n.slice(-1) && (n += "/"), n = h(n)), b[e] = n
            }
            return O("config", t), w
        }
    }
}(this);
var Jumei = Jumei || {};
!function (t, e) {
    e.extend(t, {
        setCookie: function (t, e, n, i, r, o) {
            var a = new Date;
            n && (n = 1e3 * n * 60 * 60 * 24);
            var s = new Date(a.getTime() + n);
            document.cookie = t + "=" + escape(e) + (n ? ";expires=" + s.toGMTString() : "") + (i ? ";path=" + i : "") + (r ? ";domain=" + r : "") + (o ? ";secure" : "")
        }, getCookie: function (t) {
            for (var e = document.cookie.split(";"), n = "", i = "", r = "", o = !1, a = 0; a < e.length; a++) {
                if (n = e[a].split("="), i = n[0].replace(/^\s+|\s+$/g, ""), i == t)return o = !0, n.length > 1 && (r = unescape(n[1].replace(/^\s+|\s+$/g, ""))), r;
                n = null, i = ""
            }
            return o ? void 0 : null
        }, changeScheme: function (t, n, i) {
            n = "undefined" != typeof n ? n : "href";
            for (var r = this, o = r.checkApp(), a = 0; a < e(t).length; a++) {
                var s = e(e(t)[a]).attr(n);
                s.indexOf("jumeimall:") > -1 && e(e(t)[a]).attr(n, r.jumeimall2http(s, i, o))
            }
        }, jumeimall2http: function (t, e, n) {
            var r = location.search;
            r = r.replace("?", "");
            var o = ["label", "partnerid", "hash_id", "hashid", "brandid", "productid", "itemid", "url"], a = "", s = "";
            for (i = 0; i < o.length; i++)if (-1 != t.indexOf(o[i])) {
                a = o[i];
                break
            }
            var c = "", u = "", l = "";
            if ("itemid" == a)c = this.getQueryString(t, "type"), u = this.getQueryString(t, "itemid"); else if ("url" == a)c = "url", l = this.getQueryString(t, "url"); else {
                var h = new RegExp("\\?" + a + "=(.*)\\b");
                u = t.match(h) ? t.match(h)[1] : "", c = t.split(u)[0]
            }
            var f = {
                "jumeimall://page/pop/list?partnerid=": "http://m.jumei.com/i/MobileWap/pop_list?t_lang=touch&partner_id=",
                "jumeimall://page/deallist?label=": "http://h5.jumei.com/activity/detail?label=",
                "jumeimall://page/malllist?label=": "http://m.jumei.com/i/mobilewap/activity_view/?type=mall&t_lang=touch&label=",
                "jumeimall://page/detail?hashid=": "http://m.jumei.com/i/MobileWap/deal_view?hash_id=",
                "jumeimall://page/detail?productid=": "http://m.jumei.com/i/MobileWap/mall_view?product_id=",
                "jumeimall://page/mall/flagship?brandid=": "http://m.jumei.com/products/",
                "jumeimall://page/activity/detail?label=": "http://h5.jumei.com/activity/detail?label=",
                jumei_deal: "http://m.jumei.com/i/MobileWap/deal_view?category=jumei_deal&hash_id=",
                global_deal: "http://m.jumei.com/i/MobileWap/deal_view?category=global_deal&hash_id=",
                jumei_mall: "http://m.jumei.com/i/MobileWap/mall_view?category=jumei_mall&product_id=",
                global_mall: "http://m.jumei.com/i/MobileWap/mall_view?category=jumei_mall&product_id=",
                jumei_pop: "http://m.jumei.com/i/MobileWap/deal_view?category=jumei_pop&hash_id=",
                global_pop: "http://m.jumei.com/i/MobileWap/deal_view?category=global_pop&hash_id=",
                combination: "http://m.jumei.com/i/MobileWap/haitao_detail",
                url: l
            };
            if (f[c]) {
                if (s = f[c] + u, "" == r || e || (s = s.indexOf("?") > -1 ? s + "&" + r : s + "?" + r), "combination" == c) {
                    var d = t.indexOf("?"), p = t.slice(d).replace("?", "");
                    s = f[c] + "?item_id=" + this.getQueryString(p, "itemid") + "&type=" + c + "&current_item_id=" + this.getQueryString(p, "currentitemid") + "&currentitem_type=" + this.getQueryString(p, "currentitemtype")
                }
            } else s = "http://s.m.jumei.com/pages/941";
            return "jumeimall://page/mall/flagship?brandid=" == c && (s = f[c] + u + "-0-0.html?type=2"), this.checkPlatformWap() ? s : this.changeAppHead(n, t)
        }, getQueryString: function (t, e) {
            var n = new RegExp(e + "\\s*=\\s*([^&#]+)\\s*"), i = t.match(n);
            return null != i ? decodeURI(i[1]) : null
        }, checkPlatformWap: function () {
            var t = this.getQueryString(window.location.href, "platform"), e = navigator.userAgent.toLowerCase();
            return "wap" == t ? !0 : !(/jumei/i.test(e) || /baby/i.test(e) || /global/i.test(e) || /youth/i.test(e))
        }, checkApp: function () {
            var t = this.getCookie("appid"), e = "", n = navigator.userAgent.toLowerCase();
            return e = "com.jm.android.jumei" === t || "com.jumei.iphone" === t || !t && "" !== t && (/com.jm.android.jumei/i.test(n) || /com.jumei.iphone/i.test(n)) ? "jumeimall" : "com.jm.android.baby" === t || "com.jumei.baby" === t || !t && "" !== t && (/com.jm.android.baby/i.test(n) || /com.jumei.baby/i.test(n)) ? "jmbaby" : "com.jm.android.global" === t || "com.jumei.global" === t || !t && "" !== t && (/com.jm.android.global/i.test(n) || /com.jumei.global/i.test(n)) ? "jmglobal" : "com.jm.android.youth" === t || "com.jumei.youth" === t || !t && "" !== t && (/com.jm.android.youth/i.test(n) || /com.jumei.youth/i.test(n)) ? "jmyouth" : "jumeimall"
        }, changeAppHead: function (t, e) {
            return e.replace("jumeimall", t)
        }, addWap: function (t) {
            if (this.checkPlatformWap()) {
                var n = location.search;
                e(t).each(function () {
                    var t = e(this).attr("href");
                    t.indexOf("?") > -1 ? t = t.replace("?", n + "&") : t.indexOf("#") > -1 ? t = t.replace("#", n + "#") : t += n, e(this).attr("href", t)
                })
            }
        }, os: function () {
            if (this.checkPlatformWap() === !0)return "wap";
            var t = navigator.userAgent.toLowerCase();
            return /android/g.test(t) ? "android" : /(iphone|ipod|ipad)/g.test(t) ? "iphone" : "qita"
        }, ja: function () {
            var t = ["_trackEvent"], n = [];
            if (arguments.length > 0) {
                n = arguments && e.isArray(arguments[0]) ? arguments[0] : arguments;
                for (var i = 0; i < n.length; i++)if (3 > i)if (0 == i) {
                    var r = this.os();
                    t.push(n[i] + "_" + r)
                } else t.push(n[i]); else Jumei.log("ga å¤šä½™å‚æ•°" + arguments[i]);
                window._gaq = window._gaq || [], window._jaq = window._jaq || [], window._hmt = window._hmt || [], window._gaq.push(t), window._jaq.push(t), window._hmt.push(t)
            }
        }
    })
}(Jumei, $, $(function () {
    !function () {
        var t = navigator.userAgent;
        t.indexOf("iPhone") > -1 && Jumei.checkPlatformWap() !== !0 && setTimeout(function () {
            window.location.href = "jmweb://setSpinnerStatus?spinnerstatus=hidden"
        }, 2e3);
        var e = {};
        e.loadsuccessjs = function (e) {
            if (t.indexOf("iPhone") > -1)window.location.href = "jmweb://loadsuccess?" + e; else try {
                JMWebViewAndroid.loadsuccess(e)
            } catch (n) {
                throw new error("ç‰ˆæœ¬è¿‡ä½Ž")
            }
        }, Jumei.getCookie("appid") && Jumei.checkPlatformWap() !== !0 && e.loadsuccessjs(window.location.href)
    }(), window.location.pathname.match("/cart/") || window.location.pathname.match("/movie/") || (window._gaq = window._gaq || [], window._gaq.push(["_setAccount", "UA-10208510-2"]), window._gaq.push(["_trackPageview"]), function () {
        var t = document.createElement("script");
        t.type = "text/javascript", t.setAttribute("async", "async"), t.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
        var e = document.getElementsByTagName("body")[0];
        e.appendChild(t)
    }()), window._hmt = window._hmt || [], function () {
        var t = document.createElement("script");
        t.type = "text/javascript", t.async = "async", t.setAttribute("async", "async"), t.src = ("https:" == document.location.protocol ? "https://" : "http://") + "hm.baidu.com/h.js?884477732c15fb2f2416fb892282394b";
        var e = document.getElementsByTagName("body")[0];
        e.appendChild(t)
    }()
})), function (t) {
    var e = document.getElementsByTagName("script"), n = null, i = t.Jumei.scripts || [];
    0 !== i.length && (e[e.length - 1].onload = function () {
        for (var t = 0; t < i.length; t++)n = document.createElement("script"), n.src = i[t], document.body.appendChild(n)
    })
}(window), function () {
    var t = Jumei.getQueryString(location.href, "referer");
    t && "" != t && (Jumei.setCookie("referer_site", t, 1, "/", ".jumei.com"), Jumei.setCookie("referer_site_cps", t, 1, "/", ".jumei.com"))
}(window);