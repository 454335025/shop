define("library/template", [], function (a) {
    "use strict";
    var b = function (a, c) {
        return b["string" == typeof c ? "compile" : "render"].apply(b, arguments)
    };
    b.version = "2.0.4", b.openTag = "<%", b.closeTag = "%>", b.isEscape = !0, b.isCompress = !1, b.parser = null, b.render = function (a, c) {
        var d = b.get(a) || e({id: a, name: "Render Error", message: "No Template"});
        return d(c)
    }, b.compile = function (a, d) {
        function g(c) {
            try {
                return new k(c, a) + ""
            } catch (f) {
                return i ? e(f)() : b.compile(a, d, !0)(c)
            }
        }

        var h = arguments, i = h[2], j = "anonymous";
        "string" != typeof d && (i = h[1], d = h[0], a = j);
        try {
            var k = f(a, d, i)
        } catch (l) {
            return l.id = a || d, l.name = "Syntax Error", e(l)
        }
        return g.prototype = k.prototype, g.toString = function () {
            return k.toString()
        }, a !== j && (c[a] = g), g
    };
    var c = b.cache = {}, d = b.helpers = function () {
        var a = function (b, c) {
            return "string" != typeof b && (c = typeof b, "number" === c ? b += "" : b = "function" === c ? a(b.call(b)) : ""), b
        }, c = {"<": "&#60;", ">": "&#62;", '"': "&#34;", "'": "&#39;", "&": "&#38;"}, d = function (b) {
            return a(b).replace(/&(?![\w#]+;)|[<>"']/g, function (a) {
                return c[a]
            })
        }, e = Array.isArray || function (a) {
                return "[object Array]" === {}.toString.call(a)
            }, f = function (a, b) {
            if (e(a))for (var c = 0, d = a.length; d > c; c++)b.call(a, a[c], c, a); else for (c in a)b.call(a, a[c], c)
        };
        return {$include: b.render, $string: a, $escape: d, $each: f}
    }();
    b.helper = function (a, b) {
        d[a] = b
    }, b.onerror = function (b) {
        var c = "Template Error\n\n";
        for (var d in b)c += "<" + d + ">\n" + b[d] + "\n\n";
        a.console && console.error(c)
    }, b.get = function (d) {
        var e;
        if (c.hasOwnProperty(d))e = c[d]; else if ("document" in a) {
            var f = document.getElementById(d);
            if (f) {
                var g = f.value || f.innerHTML;
                e = b.compile(d, g.replace(/^\s*|\s*$/g, ""))
            }
        }
        return e
    };
    var e = function (a) {
        return b.onerror(a), function () {
            return "{Template Error}"
        }
    }, f = function () {
        var a = d.$each, c = "break,case,catch,continue,debugger,default,delete,do,else,false,finally,for,function,if,in,instanceof,new,null,return,switch,this,throw,true,try,typeof,var,void,while,with,abstract,boolean,byte,char,class,const,double,enum,export,extends,final,float,goto,implements,import,int,interface,long,native,package,private,protected,public,short,static,super,synchronized,throws,transient,volatile,arguments,let,yield,undefined", e = /\/\*[\w\W]*?\*\/|\/\/[^\n]*\n|\/\/[^\n]*$|"(?:[^"\\]|\\[\w\W])*"|'(?:[^'\\]|\\[\w\W])*'|[\s\t\n]*\.[\s\t\n]*[$\w\.]+/g, f = /[^\w$]+/g, g = new RegExp(["\\b" + c.replace(/,/g, "\\b|\\b") + "\\b"].join("|"), "g"), h = /^\d[^,]*|,\d[^,]*/g, i = /^,+|,+$/g, j = function (a) {
            return a.replace(e, "").replace(f, ",").replace(g, "").replace(h, "").replace(i, "").split(/^$|,+/)
        };
        return function (c, e, f) {
            function g(a) {
                return r += a.split(/\n/).length - 1, b.isCompress && (a = a.replace(/[\n\r\t\s]+/g, " ").replace(/<!--.*?-->/g, "")), a && (a = w[1] + l(a) + w[2] + "\n"), a
            }

            function h(a) {
                var c = r;
                if (o ? a = o(a) : f && (a = a.replace(/\n/g, function () {
                        return r++, "$line=" + r + ";"
                    })), 0 === a.indexOf("=")) {
                    var e = !/^=[=#]/.test(a);
                    if (a = a.replace(/^=[=#]?|[\s;]*$/g, ""), e && b.isEscape) {
                        var g = a.replace(/\s*\([^\)]+\)/, "");
                        d.hasOwnProperty(g) || /^(include|print)$/.test(g) || (a = "$escape(" + a + ")")
                    } else a = "$string(" + a + ")";
                    a = w[1] + a + w[2]
                }
                return f && (a = "$line=" + c + ";" + a), i(a), a + "\n"
            }

            function i(b) {
                b = j(b), a(b, function (a) {
                    a && !s.hasOwnProperty(a) && (k(a), s[a] = !0)
                })
            }

            function k(a) {
                var b;
                "print" === a ? b = y : "include" === a ? (t.$include = d.$include, b = z) : (b = "$data." + a, d.hasOwnProperty(a) && (t[a] = d[a], b = 0 === a.indexOf("$") ? "$helpers." + a : b + "===undefined?$helpers." + a + ":" + b)), u += a + "=" + b + ","
            }

            function l(a) {
                return "'" + a.replace(/('|\\)/g, "\\$1").replace(/\r/g, "\\r").replace(/\n/g, "\\n") + "'"
            }

            var m = b.openTag, n = b.closeTag, o = b.parser, p = e, q = "", r = 1, s = {
                $data: 1,
                $id: 1,
                $helpers: 1,
                $out: 1,
                $line: 1
            }, t = {}, u = "var $helpers=this," + (f ? "$line=0," : ""), v = "".trim, w = v ? ["$out='';", "$out+=", ";", "$out"] : ["$out=[];", "$out.push(", ");", "$out.join('')"], x = v ? "$out+=$text;return $text;" : "$out.push($text);", y = "function($text){" + x + "}", z = "function(id,data){data=data||$data;var $text=$helpers.$include(id,data,$id);" + x + "}";
            a(p.split(m), function (a) {
                a = a.split(n);
                var b = a[0], c = a[1];
                1 === a.length ? q += g(b) : (q += h(b), c && (q += g(c)))
            }), p = q, f && (p = "try{" + p + "}catch(e){" + "throw {" + "id:$id," + "name:'Render Error'," + "message:e.message," + "line:$line," + "source:" + l(e) + ".split(/\\n/)[$line-1].replace(/^[\\s\\t]+/,'')" + "};" + "}"), p = u + w[0] + p + "return new String(" + w[3] + ");";
            try {
                var A = new Function("$data", "$id", p);
                return A.prototype = t, A
            } catch (B) {
                throw B.temp = "function anonymous($data,$id) {" + p + "}", B
            }
        }
    }();
    return a.template = b, b
});