///Some Global content for this file;
let host = window.location.hostname;
// $('#show').trigger('click');


///get token csrf
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


///file submit form
$('.file-form').submit(function (e) {
    e.preventDefault();
    e.stopPropagation();
    var formData = new FormData(this);
    var url = $(this).attr('action');
    ///clear alert 
    $('.alert-warning').html('').hide();
    $('.alert-success').html('').hide();
    // var csrf_token = $('meta[name=csrf-token]').attr('content'); 
    $(".error").remove();
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        dataType: 'html',
        success: function (data) {
            let res = JSON.parse(data);
            switch (res.code) {

                case 'success':
                    $('.alert-success').show();
                    $('.alert-success').html(res.message);
                    setTimeout(function () {
                        $('.alert-success').hide();
                        $('.alert-success').html('');
                    }, 2500)

                    break;
                /////////////////  
                case 'success_url':
                    $('.alert-success').show();
                    $('.alert-success').html(res.message);
                    setTimeout(function () {
                        window.location.href = res.redirect_url;
                    }, 2500)

                    break;
                //////////////////
                case 'warning':
                    $('.alert-warning').show();
                    $('.alert-warning').html(res.message);
                    setTimeout(function () {
                        $('.alert-warning').hide();
                    }, 2500)
                    break;
                ///////////////////
                case 'warning_url':
                    $('.alert-warning').show();
                    $('.alert-warning').html(res.message);
                    setTimeout(function () {
                        window.location.href = res.redirect_url;
                    }, 2500)
                    break;
                ///////////////////
                case 'errors':
                    res.message.forEach(function (error) {
                        if (error[0] == 'password') {
                            $('.input-group-error').show();
                            $('.input-group-error').text(error[1]);
                        } else {
                            $('[name=' + error[0] + ']').parent().append('<span class="form-error">' + error[1] +
                                '</span>');
                        }

                    })
                    break;
            }
        },
        processData: false,
        contentType: false,
    });
})


///simple submit form
$('.simple-form').submit(function (e) {
    e.preventDefault();
    e.stopPropagation();
    var form = $(this).serialize();
    var url = $(this).attr('action');

    ///clear alert 
    $('.alert-warning').html('').hide();
    $('.alert-success').html('').hide();
    // var csrf_token = $('meta[name=csrf-token]').attr('content'); 
    $(".error").remove();

    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        dataType: 'html',
        success: function (data) {
            let res = JSON.parse(data);
            switch (res.code) {

                case 'success':
                    $('.alert-success').show();
                    $('.alert-success').html(res.message);
                    setTimeout(function () {
                        $('.alert-success').hide();
                        $('.alert-success').html('');
                    }, 2500)

                    break;
                /////////////////  
                case 'success_url':
                    $('.alert-success').show();
                    $('.alert-success').html(res.message);
                    setTimeout(function () {
                        window.location.href = res.redirect_url;
                    }, 2500)

                    break;
                //////////////////
                case 'warning':
                    $('.alert-warning').show();
                    $('.alert-warning').html(res.message);
                    setTimeout(function () {
                        $('.alert-warning').hide();
                    }, 2500)
                    break;
                ///////////////////
                case 'warning_url':
                    $('.alert-warning').show();
                    $('.alert-warning').html(res.message);
                    setTimeout(function () {
                        window.location.href = res.redirect_url;
                    }, 2500)
                    break;
                ///////////////////
                case 'errors':

                    res.message.forEach(function (error) {
                        if (error[0] == 'password') {
                            $('.input-group-error').show();
                            $('.input-group-error').text(error[1]);
                        } else {
                            $('[name=' + error[0] + ']').parent().append('<span class=form-error>' + error[1] + '</span>');
                        }
                    })
                    break;
            }
        },
    });
})


///editor-form
$('.editor-form').submit(function (e) {
    e.preventDefault();
    e.stopPropagation();
    var formData = new FormData(this);
    var url = $(this).attr('action');
    formData.append("content", $('.summernote').summernote('code'));
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            let res = JSON.parse(data);
            switch (res.code) {

                case 'success':
                    $('.alert-success').show();
                    $('.alert-success').html(res.message);
                    setTimeout(function () {
                        $('.alert-success').hide();
                        $('.alert-success').html('');
                    }, 2500)

                    break;
                /////////////////  
                case 'success_url':
                    $('.alert-success').show();
                    $('.alert-success').html(res.message);
                    setTimeout(function () {
                        window.location.href = res.redirect_url;
                    }, 2500)

                    break;
                //////////////////
                case 'warning':
                    $('.alert-warning').show();
                    $('.alert-warning').html(res.message);
                    setTimeout(function () {
                        $('.alert-warning').hide();
                    }, 2500)
                    break;
                ///////////////////
                case 'warning_url':
                    $('.alert-warning').show();
                    $('.alert-warning').html(res.message);
                    setTimeout(function () {
                        window.location.href = res.redirect_url;
                    }, 2500)
                    break;
                ///////////////////
                case 'errors':

                    res.message.forEach(function (error) {
                        if (error[0] == 'password') {
                            $('.input-group-error').show();
                            $('.input-group-error').text(error[1]);
                        } else {
                            $('[name=' + error[0] + ']').parent().append('<span class=form-error>' + error[1] + '</span>');
                        }
                    })
                    break;
            }
        },
        processData: false,
        contentType: false,

    })
})

///error hide process code
$(document).keypress(function (e) {
    $('.error').hide();
    $('.form-error').hide();
});


///password info hide and show code
function password_info() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        $("#eye-icon").removeClass("mdi-eye");
        $("#eye-icon").addClass("mdi-eye-off");
    } else {
        x.type = "password";
        $("#eye-icon").addClass("mdi-eye");
        $("#eye-icon").removeClass("mdi-eye-off");
    }
}


///delete_user
function delete_user(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: 'delete_user_process',
            data:
            {
                'id': id,

            },
            dataType: 'html',
            success: function (data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        alert(res.message);
                        // $('#show').trigger('click');
                        setTimeout(function () {
                            window.location.reload();
                        }, 500)

                        break;

                    case 'warning':
                        alert(res.message);
                        // setTimeout(function () {

                        // }, 2500)
                        break;



                }
            },
        });

    }
}


///delete_category
function delete_category(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: 'delete_category_process',
            data:
            {
                'id': id,

            },
            dataType: 'html',
            success: function (data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        alert(res.message);
                        // $('#show').trigger('click');
                        setTimeout(function () {
                            window.location.reload();
                        }, 500)

                        break;

                    case 'warning':
                        alert(res.message);
                        // setTimeout(function () {

                        // }, 2500)
                        break;



                }
            },
        });

    }
}


///delete_email_temp
function delete_email_temp(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: 'delete_email_temp_process',
            data:
            {
                'id': id,

            },
            dataType: 'html',
            success: function (data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        alert(res.message);
                        // $('#show').trigger('click');
                        setTimeout(function () {
                            window.location.reload();
                        }, 500)

                        break;

                    case 'warning':
                        alert(res.message);
                        // setTimeout(function () {

                        // }, 2500)
                        break;



                }
            },
        });

    }
}

///delete_review
function delete_review(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: 'delete_review_process',
            data:
            {
                'id': id,

            },
            dataType: 'html',
            success: function (data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        alert(res.message);
                        // $('#show').trigger('click');
                        setTimeout(function () {
                            window.location.reload();
                        }, 500)

                        break;

                    case 'warning':
                        alert(res.message);
                        // setTimeout(function () {

                        // }, 2500)
                        break;



                }
            },
        });

    }
}


///delete_property
function delete_property(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: 'delete_property_process',
            data:
            {
                'id': id,

            },
            dataType: 'html',
            success: function (data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        alert(res.message);
                        // $('#show').trigger('click');
                        setTimeout(function () {
                            window.location.reload();
                        }, 500)

                        break;

                    case 'warning':
                        alert(res.message);
                        // setTimeout(function () {

                        // }, 2500)
                        break;



                }
            },
        });

    }
}


///show_review_detail
function show_review_detail(id) { 
        $.ajax({
            type: 'POST',
            url: 'get_review_detail_by_id',
            data:
            {
                'review_id': id,

            },
            dataType: 'html',
            success: function (data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        $('#review-detail').modal('show');
                        $('#message-text').text(res.message['review_description'])
                        // $('#show').trigger('click');
                        // setTimeout(function () {
                        //     window.location.reload();
                        // }, 500)

                        break;

                    case 'warning':
                        alert(res.message);
                        // setTimeout(function () {

                        // }, 2500)
                        break;



                }
            },
        });

    
}

///
$('.img-wrap .close').on('click', function() {
    var id = $(this).closest('.img-wrap').find('img').data('id');
    alert('remove picture: ' + id);
});


