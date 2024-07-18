$(document).ready(function() {
    $("#btnfile").click(function() {
        console.log('token');
        $("#uploadfile").click();


    });


    $('#uploadfile').change(function(e) {
        var myformData = this.files[0];

        var formData = new FormData(document.getElementById('form_id'));
        var csrf_token = "{{csrf_token()}}";
        $('#cropImagePop').show();
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.upload-demo').addClass('ready');
                $('#cropImagePop').modal('show');
                rawImg = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });








    //modal


    $(document).ready(function() {
        var windowWidth1 = $(window).width();
        var mobileBreakpoint = 567;
        if (windowWidth1 < mobileBreakpoint) {
            $uploadCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 150,
                    height: 150,
                    type: 'circle'
                },
                enforceBoundary: false,
                enableExif: true
            });
        } else {
            $uploadCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 210,
                    height: 210,
                    type: 'circle'
                },
                enforceBoundary: false,
                enableExif: true
            });
        }
    });
    $('#cropImagePop').on('shown.bs.modal', function() {
        // $('.cr-slider-wrap').prepend('<p>Image Zoom</p>');

        $uploadCrop.croppie('bind', {
            url: rawImg
        }).then(function() {
            $('.cr-slider').attr({
                'min': 0.080,
                'max': 0.7000,
                'aria-valuenow': 0.400
            });
            console.log('jQuery bind complete');
        });
    });

    $('#cropImagePop').on('hidden.bs.modal', function() {
        $('.item-img').val('');
        $('.cr-slider-wrap p').remove();
    });

    // $('.item-img').on('change', function () { 
    //     readFile(this); 
    // });

    $('.replacePhoto').on('click', function() {
        $('#cropImagePop').modal('hide');
        $('#uploadfile').trigger('click');
    })

    $('#cropImageBtn').on('click', function(ev) {

        $uploadCrop.croppie('result', {
            type: 'base64',
            // format: 'jpeg',
            backgroundColor: "#fff",
            format: 'png',
            size: {
                width: 280,
                height: 280
            }
        }).then(function(resp) {

            $('#my_image').attr('src', resp);
            $('#cropImagePop').modal('hide');
            $('.item-img').val('');
            console.log(resp);

            $('#crop_img1').val(resp);
            var formData = new FormData(document.getElementById('form_id'));
            var   formAction =$('#form_id').attr('action');
            console.log($('#form_id').attr('action'));
            var csrf_token = "{{csrf_token()}}";
            $.ajax({
                url: formAction,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: formData,
                enctype: 'multipart/form-data',
                // dataType: 'json',
                _token: csrf_token,

                success: function(response) {
                    console.log('success');
                    console.log(response);
                    if (response.img_update) {

                        $("#my_image").attr("src", response.imgName);
                        $('#change-avatar-text').removeClass('text-dark');
                        $('#change-avatar-text').css({
                            "background": "green",
                            "color": "white",
                            "border-radius": "5px"
                        });
                        $('#change-avatar-text').html(response.msg);
                        setTimeout(() => {
                            $('#change-avatar-text').html(
                                'Change Profile Picture');
                            $('#change-avatar-text').removeAttr('style');
                            $('#change-avatar-text').addClass('text-dark');
                        }, 4000);

                    }

                }
            });
        });
    });

    $('#sidebarToggleTop').click(function() {
        var images = $('.sidebar_toggle_img').attr('src');
        // console.log(images);
        if (images == '/Assets/right-arrow (1).png') {
            $('#hero').addClass('new');
              $('#content-wrapper').css('align-items','center');
            $('.sidebar_toggle_img').attr('src', '/Assets/back.png');
        } else {
            $('.sidebar_toggle_img').attr('src', '/Assets/right-arrow (1).png');
            $('#content-wrapper').css('align-items','flex-start');
            $('#hero').removeClass('new');
        }
        $("#accordionSidebar").toggle();
    });

    $('.close-modal-custom').on('click', function() {
        $('.modal').modal("hide");
    })

    $('.help_').on('click', function() {
        $('#help_modal').modal("show");
    })


    $('.help_modal_close').on('click', function() {
        $('#help_modal').modal("hide");
    })

});
$('.modal-dialog').addClass('modal-dialog-centered');

function add_update_data(thiss, event, id) {
    event.preventDefault();
    var formData = new FormData(thiss);
    $.ajax({
        url: thiss.action,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            successAlert();
        },
        error: function(response) {
            Swal.fire({text: response.responseJSON.message, icon: 'error' , iconColor: '#e31b1b', width: 300, position:'top', confirmButtonText: 'Close'})
            // console.log(response.responseJSON.message);
        }
    });
}


function successAlert(){
    Swal.fire({
        icon: 'success',
        width:200,
        position: "top-end",
        iconColor: '#22e687',
        timer: 1000,
        showCancelButton: false,
        showConfirmButton: false,
    });
}