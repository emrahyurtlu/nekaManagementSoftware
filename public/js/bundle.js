(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
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

},{}]},{},[1]);
