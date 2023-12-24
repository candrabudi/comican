/* <![CDATA[ */
window._wpemojiSettings = {
    baseUrl: "https://s.w.org/images/core/emoji/14.0.0/72x72/",
    ext: ".png",
    svgUrl: "https://s.w.org/images/core/emoji/14.0.0/svg/",
    svgExt: ".svg",
    source: {
        concatemoji:
            "https://seataku.com/wp-includes/js/wp-emoji-release.min.js?ver=6.4.2",
    },
};
/*! This file is auto-generated */
!(function (i, n) {
    var o, s, e;
    function c(e) {
        try {
            var t = { supportTests: e, timestamp: new Date().valueOf() };
            sessionStorage.setItem(o, JSON.stringify(t));
        } catch (e) {}
    }
    function p(e, t, n) {
        e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
        var t = new Uint32Array(
                e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
            ),
            r =
                (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
                e.fillText(n, 0, 0),
                new Uint32Array(
                    e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
                ));
        return t.every(function (e, t) {
            return e === r[t];
        });
    }
    function u(e, t, n) {
        switch (t) {
            case "flag":
                return n(
                    e,
                    "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f",
                    "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f"
                )
                    ? !1
                    : !n(
                          e,
                          "\ud83c\uddfa\ud83c\uddf3",
                          "\ud83c\uddfa\u200b\ud83c\uddf3"
                      ) &&
                          !n(
                              e,
                              "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                              "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
                          );
            case "emoji":
                return !n(
                    e,
                    "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff",
                    "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff"
                );
        }
        return !1;
    }
    function f(e, t, n) {
        var r =
                "undefined" != typeof WorkerGlobalScope &&
                self instanceof WorkerGlobalScope
                    ? new OffscreenCanvas(300, 150)
                    : i.createElement("canvas"),
            a = r.getContext("2d", { willReadFrequently: !0 }),
            o = ((a.textBaseline = "top"), (a.font = "600 32px Arial"), {});
        return (
            e.forEach(function (e) {
                o[e] = t(a, e, n);
            }),
            o
        );
    }
    function t(e) {
        var t = i.createElement("script");
        (t.src = e), (t.defer = !0), i.head.appendChild(t);
    }
    "undefined" != typeof Promise &&
        ((o = "wpEmojiSettingsSupports"),
        (s = ["flag", "emoji"]),
        (n.supports = { everything: !0, everythingExceptFlag: !0 }),
        (e = new Promise(function (e) {
            i.addEventListener("DOMContentLoaded", e, { once: !0 });
        })),
        new Promise(function (t) {
            var n = (function () {
                try {
                    var e = JSON.parse(sessionStorage.getItem(o));
                    if (
                        "object" == typeof e &&
                        "number" == typeof e.timestamp &&
                        new Date().valueOf() < e.timestamp + 604800 &&
                        "object" == typeof e.supportTests
                    )
                        return e.supportTests;
                } catch (e) {}
                return null;
            })();
            if (!n) {
                if (
                    "undefined" != typeof Worker &&
                    "undefined" != typeof OffscreenCanvas &&
                    "undefined" != typeof URL &&
                    URL.createObjectURL &&
                    "undefined" != typeof Blob
                )
                    try {
                        var e =
                                "postMessage(" +
                                f.toString() +
                                "(" +
                                [
                                    JSON.stringify(s),
                                    u.toString(),
                                    p.toString(),
                                ].join(",") +
                                "));",
                            r = new Blob([e], { type: "text/javascript" }),
                            a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports",
                            });
                        return void (a.onmessage = function (e) {
                            c((n = e.data)), a.terminate(), t(n);
                        });
                    } catch (e) {}
                c((n = f(s, u, p)));
            }
            t(n);
        })
            .then(function (e) {
                for (var t in e)
                    (n.supports[t] = e[t]),
                        (n.supports.everything =
                            n.supports.everything && n.supports[t]),
                        "flag" !== t &&
                            (n.supports.everythingExceptFlag =
                                n.supports.everythingExceptFlag &&
                                n.supports[t]);
                (n.supports.everythingExceptFlag =
                    n.supports.everythingExceptFlag && !n.supports.flag),
                    (n.DOMReady = !1),
                    (n.readyCallback = function () {
                        n.DOMReady = !0;
                    });
            })
            .then(function () {
                return e;
            })
            .then(function () {
                var e;
                n.supports.everything ||
                    (n.readyCallback(),
                    (e = n.source || {}).concatemoji
                        ? t(e.concatemoji)
                        : e.wpemoji &&
                          e.twemoji &&
                          (t(e.twemoji), t(e.wpemoji)));
            }));
})((window, document), window._wpemojiSettings);
/* ]]> */

var sf_templates = '<a href="{search_url_escaped}">View All Results</a>';
var sf_position = "0";
var sf_input = ".search-live";
jQuery(document).ready(function () {
    jQuery(sf_input).ajaxyLiveSearch({
        expand: false,
        searchUrl: "https://seataku.com/?s=%s",
        text: "Search",
        delay: 500,
        iwidth: 180,
        width: 350,
        ajaxUrl: "https://seataku.com/wp-admin/admin-ajax.php",
        rtl: 0,
    });
    jQuery(".live-search_ajaxy-selective-input").keyup(function () {
        var width = jQuery(this).val().length * 8;
        if (width < 50) {
            width = 50;
        }
        jQuery(this).width(width);
    });
    jQuery(".live-search_ajaxy-selective-search").click(function () {
        jQuery(this).find(".live-search_ajaxy-selective-input").focus();
    });
    jQuery(".live-search_ajaxy-selective-close").click(function () {
        jQuery(this).parent().remove();
    });
});

jQuery.event.special.touchstart = {
    setup: function (_, ns, handle) {
        this.addEventListener("touchstart", handle, {
            passive: !ns.includes("noPreventDefault"),
        });
    },
};
jQuery.event.special.touchmove = {
    setup: function (_, ns, handle) {
        this.addEventListener("touchmove", handle, {
            passive: !ns.includes("noPreventDefault"),
        });
    },
};
jQuery.event.special.wheel = {
    setup: function (_, ns, handle) {
        this.addEventListener("wheel", handle, { passive: true });
    },
};
jQuery.event.special.mousewheel = {
    setup: function (_, ns, handle) {
        this.addEventListener("mousewheel", handle, { passive: true });
    },
};

ts_darkmode.listen();

var swiper = new Swiper(".swiper-container", {
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
