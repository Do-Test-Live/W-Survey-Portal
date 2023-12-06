!function (i) {
    "use strict";
    var o = i(".main_nav"), n = (i("#main_container"), i("#menu-button-mobile"));
    i(".main_nav .nav-tabs a").on("click", function (e) {
        var t = i(this).attr("href");
        i(".wrapper_in").animate({scrollTop: i(t).offset().top}, "fast"), e.preventDefault(), i(window).width() <= 767 && (n.removeClass("active"), o.slideToggle(300))
    }), n.on("click", function () {
        o.slideToggle(500), i(this).toggleClass("active")
    }), i(window).on("resize", function () {
        i(window).width() <= 767 ? o.hide() : o.show()
    });
    var e = i("button.backward,button.forward"), t = i(".wrapper_in");
    window.innerWidth < 800 && e.on("click", function () {
        return t.animate({scrollTop: 500}, "slow"), !1
    }), window.innerWidth < 600 && e.on("click", function () {
        return t.animate({scrollTop: 610}, "slow"), !1
    }), [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (e) {
        return new bootstrap.Tooltip(e)
    }), i("#accordion").on("hidden.bs.collapse shown.bs.collapse", function (e) {
        i(e.target).prev(".card-header").find("i.indicator").toggleClass("icon_minus_alt2 icon_plus_alt2")
    }), i(".video_modal").magnificPopup({type: "iframe"}), i(".magnific-gallery").each(function () {
        i(this).magnificPopup({delegate: "a", type: "image", gallery: {enabled: !0}})
    }), i(".owl-carousel").owlCarousel({
        items: 1,
        dots: !1,
        loop: !0,
        autoplay: !0,
        autoHeight: !0,
        autoplayTimeout: 3500,
        animateOut: "fadeOut",
        responsive: {0: {items: 1}, 600: {items: 1}, 1e3: {items: 1}}
    }), jQuery(function (i) {
        i("form#wrapped").attr("action", "index.html"), i("#wizard_container").wizard({
            stepsWrapper: "#wrapped",
            submit: ".submit",
            beforeSelect: function (e, t) {
                if (0 != i("input#website").val().length) return !1;
                if (!t.isMovingForward) return !0;
                t = i(this).wizard("state").step.find(":input");
                return !t.length || !!t.valid()
            }
        }).validate({
            errorPlacement: function (e, t) {
                t.is(":radio") || t.is(":checkbox") ? e.insertBefore(t.next()) : e.insertAfter(t)
            }
        }), i("#progressbar").progressbar(), i("#wizard_container").wizard({
            afterSelect: function (e, t) {
                i("#progressbar").progressbar("value", t.percentComplete), i("#location").text("(" + t.stepsComplete + "/" + t.stepsPossible + ")")
            }
        })
    }), i("input.icheck").iCheck({checkboxClass: "icheckbox_square-yellow", radioClass: "iradio_square-yellow"})
}(window.jQuery);