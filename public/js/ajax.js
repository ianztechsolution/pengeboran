const ajax_preloader = `<div class="d-flex justify-content-center align-items-center"><div class="spinner-border text-danger spinner-border-lg" role="status"></div></div>`;
const ajax_on_type_delay = 500;

function ajaxRenderTo(target_selector, route, method = "get") {
    let target = $(target_selector);
    if (!localStorage.getItem(target_selector)) {
        localStorage.setItem(target_selector, target.html());
    }
    $.ajax({
        type: method,
        url: route,
        beforeSend: function () {
            target.html(localStorage.getItem(target_selector));
        },
        success: function (response) {
            target.html(response.data.html);
        },
    });
}
$(document).on("click", ".ajax_modal_btn", function () {
    let self = $(this);
    let modal = $("#common-modal");
    modal.find("#modal_title").text(self.data("modal-title"));
    let modal_size = self.data("modal-size");
    if (modal_size) {
        modal.addClass("modal-" + modal_size);
    } else {
        modal.removeClass("modal-sm modal-lg modal-xl modal-xxl");
    }
    modal.modal("show");
    ajaxRenderTo("#common-modal #content", self.data("render-route"), "get");
});

var submit_loading = false;
$(document).on("submit", ".ajax_form", function (event) {
    event.preventDefault();
    let form = $(this);
    let action = form.attr("action");
    let method = form.attr("method");
    let formData = new FormData(this);

    let modal = form.closest(".modal");
    let btn = form.find('button[type="submit"]');
    let btn_html = btn.html();
    let spinner =
        btn_html +
        '<span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>';

    if (submit_loading) {
        return false;
    }

    $.ajax({
        url: action,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {
            btn.html(spinner);
            form.find(".form-control")
                .removeClass("border-danger")
                .attr("title", "");
            form.find(".form-select")
                .removeClass("border-danger")
                .attr("title", "");

            let inputfile_id = form.find(`input[type="file"]`).attr("id");
            form.find(`.upload_file[data-target-input="#${inputfile_id}"]`)
                .removeClass("border-danger")
                .attr("title", "");

            submit_loading = true;
        },
        success: function (response) {
            if (form.data("after-submit") == "reload") {
                location.reload();
            } else if (form.data("after-submit") == "close-modal") {
                modal.modal("hide");
                btn.html(btn_html);
            }
        },
        error: function (response) {
            const code = response.status;
            const message = response.responseJSON.message;
            const data = response.responseJSON.data;
            if (code == 422) {
                $.each(data, function (i, v) {
                    form.find(`[name="${i}"]`).addClass("border-danger").attr("title", v[0]);
                    let inputfile_id = form.find(`input[type="file"][name="${i}"]`).attr("id");
                    form.find(`.upload_file[data-target-input="#${inputfile_id}"]`)
                        .addClass("border-danger")
                        .attr("title", v[0]);
                });
            } else {
                alertify.error(message);
            }
            btn.html(btn_html);
        },
        complete: function () {
            submit_loading = false;
        },
    });
});

function ajaxAfterFormSubmit(config) {
    $(document).ajaxComplete(function (event, xhr, settings) {
        var currentUrl = settings.url;
        var checkUrls = config.expect_url;
        var expectedMethods = config.expect_method;
        var isUrlMatch = checkUrls.some(function (url) {
            return currentUrl.indexOf(url) !== -1;
        });
        var isMethodMatch = expectedMethods.includes(
            settings.type.toUpperCase()
        );
        if (xhr.status === 200 && isUrlMatch && isMethodMatch) {
            config.callback();
        }
    });
}
