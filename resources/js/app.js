import "./bootstrap";

import "@popperjs/core";

$(document).ready(function () {
    $("button").click(function () {
        $(".test").hide();
    });
});

window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");

    loader.classList.add("loader--hidden");

    loader.addEventListener("transitionend", () => {
        document.body.removeChild(loader);
    });
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    /* UPDATE ADMIN PERSONAL INFO */

    $("#AdminInfoForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                } else {
                    $(".admin_name").each(function () {
                        $(this).html(
                            $("#AdminInfoForm")
                                .find($('input[name="name"]'))
                                .val()
                        );
                    });
                    alert(data.msg);
                }
            },
        });
    });
});

/* UPDATE SECRETARY PERSONAL INFO */

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    /* UPDATE ADMIN PERSONAL INFO */

    $("#SecInfoForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                } else {
                    $(".name").each(function () {
                        $(this).html(
                            $("#SecInfoForm")
                                .find($('input[name="name"]'))
                                .val()
                        );
                    });
                    alert(data.msg);
                }
            },
        });
    });
});
