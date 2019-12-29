let $ = require("jquery");
require("select2")($);
require("bootstrap");
require("./form-validation");
require("datatables.net-bs4")(window, $);
window.axios = require('axios');

$(document).ready(function () {
    $('.select2').select2({});
    $('.data-table').DataTable();

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
    });

    $('#category_id').change(function (e) {
        let selected = $(this).val();
        console.log("Category: ", selected);
        if (selected > -1) {
            window.axios.get("/get-sub-categories/" + selected).then((result) => {
                console.log(result.data);
                if (result.data.length > 0) {
                    $.each(result.data, function (index, value) {
                        var option = "<option value='" + value.id + "'>" + value.name + "</option>";
                        $("#sub_category_id").append(option);
                    });

                }
            });

        }

    });
});
