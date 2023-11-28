$(document).ready(function () {
    var sendContactSuccess = $('.send_contact_success');
    if (sendContactSuccess.length > 0) {
        setTimeout(() => {
            sendContactSuccess.addClass('d-none');
        }, 3000);
    }
    $('#contactForm').validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "message": {
                required: true,
                minlength: 50
            },
            "name": {
                required: true,
                minlength: 8
            },
            "subject": {
                required: true,
                minlength: 8
            },
            "email": {
                require: true,
                email: true
            }
        },
        messages: {
            "message": {
                required: "Bắt buộc phải nhập",
                minlength: "Hãy nhập ít nhất 50 ký tự"
            },
            "name": {
                required: "Bắt buộc nhập tên",
                minlength: "Hãy nhập ít nhất 8 ký tự"
            },
            "subject": {
                required: "Bắt buộc nhập tiêu đề",
                minlength: "Hãy nhập ít nhất 8 ký tự"
            },
            "email": {
                required: "Bắt buộc nhập email",
                email: "Nhập đúng email"
            }
        }
    });
    $("#commentForm").submit(function (event) {
        event.preventDefault();
        var form = $(this);
        var formData = $(this).serialize();
        var url = form.attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            success: function (response) {
                $(".comments-area").html(response);
                $(`#comment_id`).val('0');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        $('#message').val('');
    });

    $(document).on('click', '.btn__reply', function () {
        var idComment = $(this).attr('id-comment');
        var nameUser = $(this).attr('name-user');
        $('#comment_id').val(`${idComment}`);

        $('#message').val(`@${nameUser} `).focus();
    });
    $("iframe[data-src]").Lazy();
});
