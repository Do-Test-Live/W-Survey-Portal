!function (t) {
    "use strict";
    var a = t(".main_nav"), e = t("#main_container"), i = t(".layer"), o = t("#menu-button-mobile"),
        n = t(".main_nav .nav-tabs a");
    a.on("click", function () {
        e.addClass("show_container"), i.addClass("layer-is-visible")
    }), t(".close_in").on("click", function () {
        e.removeClass("show_container"), t(".main_nav .nav-tabs li a").removeClass("active"), t(".tab-pane").removeClass("active"), i.removeClass("layer-is-visible")
    }), n.on("click", function (e) {
        var i = t(this).attr("href");
        t(".wrapper_in").animate({scrollTop: t(i).offset().top}, "fast"), e.preventDefault(), t(window).width() <= 767 && (o.removeClass("active"), a.slideToggle(300))
    }), o.on("click", function () {
        a.slideToggle(500), t(this).toggleClass("active")
    }), t(window).on("resize", function () {
        t(window).width() <= 767 ? a.hide() : a.show()
    });
    var n = t("button.backward,button.forward"), r = t(".wrapper_in");
    window.innerWidth < 800 && n.on("click", function () {
        return r.animate({scrollTop: 500}, "slow"), !1
    }), window.innerWidth < 600 && n.on("click", function () {
        return r.animate({scrollTop: 610}, "slow"), !1
    }), [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (e) {
        return new bootstrap.Tooltip(e)
    }), t("#accordion").on("hidden.bs.collapse shown.bs.collapse", function (e) {
        t(e.target).prev(".card-header").find("i.indicator").toggleClass("icon_minus_alt2 icon_plus_alt2")
    }), t(".video_modal").magnificPopup({type: "iframe"}), t(".magnific-gallery").each(function () {
        t(this).magnificPopup({delegate: "a", type: "image", gallery: {enabled: !0}})
    }), t(".owl-carousel").owlCarousel({
        items: 1,
        dots: !1,
        loop: !0,
        autoplay: !0,
        autoHeight: !0,
        autoplayTimeout: 3500,
        animateOut: "fadeOut",
        responsive: {0: {items: 1}, 600: {items: 1}, 1e3: {items: 1}}
    }), jQuery(function (t) {
        t("form#wrapped").attr("action", "index.php"), t("#wizard_container").wizard({
            stepsWrapper: "#wrapped",
            submit: ".submit",
            beforeSelect: function (e, i) {
                if (0 != t("input#website").val().length) return !1;
                if (!i.isMovingForward) return !0;
                i = t(this).wizard("state").step.find(":input");
                return !i.length || !!i.valid()
            }
        }).validate({
            errorPlacement: function (e, i) {
                i.is(":radio") || i.is(":checkbox") ? e.insertBefore(i.next()) : e.insertAfter(i)
            }
        }), t("#progressbar").progressbar(), t("#wizard_container").wizard({
            afterSelect: function (e, i) {
                t("#progressbar").progressbar("value", i.percentComplete), t("#location").text("(" + i.stepsComplete + "/" + i.stepsPossible + ")")
            }
        })
    }), t("input.icheck").iCheck({checkboxClass: "icheckbox_square-yellow", radioClass: "iradio_square-yellow"})
}(window.jQuery);