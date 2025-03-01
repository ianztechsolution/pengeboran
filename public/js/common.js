function buildParams(base_url, object) {
    let url = new URL(base_url);
    let existingParams = new URLSearchParams(url.search);

    Object.entries(object).forEach(([key, value]) => {
        existingParams.set(key, value);
    });

    url.search = existingParams.toString();
    return url.toString();
}
alertify.set("notifier", "position", "top-right");

function image_placeholder() {
    let count = 0;
    let maxCount = 5;
    let interval = setInterval(() => {
        document.querySelectorAll("img").forEach((img) => {
            if (!img.hasAttribute("src") || img.getAttribute("src") === "") {
                img.src = "/image/img-placeholder.jpg";
            }
            img.onerror = function () {
                this.src = "/image/img-placeholder.jpg";
            };
        });
        count++;
        if (count >= maxCount) {
            clearInterval(interval);
        }
    }, 1000);
}
image_placeholder();
$(document).ajaxComplete(function (event, xhr, settings) {
    image_placeholder();
});

$("input[readonly]").css("background-color", "#F5F7FB");

function ucwords(str) {
    return str.replace(/\b\w/g, function (char) {
        return char.toUpperCase();
    });
}

$("#common-modal").on("shown.bs.modal", function () {
    let initSelect2 = setInterval(() => {
        if ($(".select2").hasClass("select2-container")) {
            clearInterval(initSelect2);
        } else {
            $(".select2").select2({
                dropdownParent: $(this),
            });
        }
    }, 500);
});
$(document).on("click", ".image_delete_button", function (event) {
    event.preventDefault();

    if (confirm("Are you sure you want to delete this image?")) {

        // Disable button
        let btn = $('button[type=submit]');
        btn.addClass('disabled');
        let btn_html = btn.html();
        let spinner =
            btn_html +
            '<span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>';
        btn.html(spinner);

        $(this).hide();
        let route = $(this).data("route");
        let token = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: route,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function (response) {
                alertify.success("Image deleted successfully.");

                // show back the save button button
                btn.html(btn_html);
                btn.removeClass('disabled');
            },
            error: function (xhr) {
                alertify.error("Failed to delete image.");
                $(this).show();
            },
        });
    }
});

$("#common-modal").on("shown.bs.modal", function () {
    let initSelect2 = setInterval(() => {
        feather.replace();
    }, 100);
    setTimeout(() => {
        clearInterval(initSelect2);
    }, 3000);
});
