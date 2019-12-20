let $ = require("jquery");
require("select2")($);
require("bootstrap");
require("./form-validation");

$(document).ready(function () {
    $('.select2').select2({});

    // DELETE CONFIRMATION
    $('.delete').click(function (e) {
        e.preventDefault();
        let link = $(this);
        let result = confirm('Bu kaydı silmek istediğinize emin misiniz?');
        if (result) {
            let href = link.attr('href');
            let token = $("[name=_token]").val();
            console.log(token);
            console.log(href);
            if (href) {
                $.ajax({
                    type: "POST",
                    data: {
                        _method: "DELETE",
                        _token: token
                    },
                    url: href,
                    success: function (result) {
                        console.log('success: ', result);
                        location.reload();
                    },
                    error: function (result) {
                        console.log('error: ', result);
                        alert('Hata: ' + result.responseJSON.message);
                    }
                });
            }
        }
    })
});
