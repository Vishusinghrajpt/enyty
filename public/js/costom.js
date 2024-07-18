$('#country').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValues) {
    const currentValues = $(this).val();
    getLoctions("province", currentValues)
});

function test(id) {
    console.log(id);
}
// Login page 
function getLoctions(id, data) {
    var data_id = parseInt(data);
    var page_id = id;
    var city = 'city';
    if (id != 'state' && id != 'city' && id != 'province') {
        var parts = id.split('_');
        page_id = parts[0];
        city = 'city_' + parts[1];
    }
    $.ajax({
        type: 'get',
        url: "/getLoctions",
        data: {
            id: data_id,
            page_id: page_id
        },
        success: function (response) {
            var html = '';
            const states = JSON.parse(response);
            html += `<select onChange="getLoctions('${city}',$(this).val())" class="form-control form-select bg-white  form-control mb-3 rounded-3 selectpicker" data-live-search="true"  name="${page_id}_id" id="${id}">
                        <option value="">${page_id}  </option>`;
            for (const [state, values] of Object.entries(states)) {
                html += `<option id="j_option${values.id}" value="${values.id}" >${values.name}</option>`;
            }
            html += `</select>`;
            $('.' + id).html(html);
            $('#' + id).selectpicker();
        },
        error: function (error) {
            console.log("Error:", error);
        }
    });
}


// image section 
var num = 4;
function readImage(id, name) {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files;
        var output = $(id);
        var img_heoght = output.css('height');
        var img_border_radius = output.css('border-radius');
        var file = files[0];
        var fileName = file.name;
        var fileExtension = fileName.split('.').pop().toLowerCase();
        var supportedFormats = ['png', 'jpg', 'jpeg', 'heic'];
        if (supportedFormats.includes(fileExtension)) {
            var picReader = new FileReader();
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html = '<div class=" preview-image preview-show-' + num + '">' +
                    '<input type="hidden" name="' + name + '" value = "' + picFile.result + '">' +
                    '<div class="image-zone "><img id="pro-img-' + num + '" src="' + picFile.result +
                    '" style="max-height:' + img_heoght + '; border-radius: ' + img_border_radius +
                    ';"></div>' +
                    '</div>';
                // $('.input_img').html(html);
                $('.company-poster_img1 img').attr('src',picFile.result);
                output.html(html);
                num = num + 1;
            });
            picReader.readAsDataURL(file);
        } else {
            var errorMessage = fileExtension + ' format isn\'t supported';
            output.siblings('.profile_picture_error').html(errorMessage).show();
            setTimeout(function () {
                output.siblings('.profile_picture_error').hide();
            }, 4000);
        }
    } else {
        console.log('Browser not support');
    }
}


// date part 


$(document).ready(function () {
    $('#month, #day, #birth_year').change(function () {
        updateDate('#month', '#day', '#birth_year', '#birth_date', '.birth_date', 'DATE OF BIRTH');
    });

    $('#departure_month, #departure_day, #departure_year').change(function () {
        updateDate('#departure_month', '#departure_day', '#departure_year', '#departure_date',
            '.departure_date', 'DATE OF DEPARTURE');

    });
    updateDate();
});
// departure_month
function updateDate(month, day, year, full_date, showDate, text) {
    var selectedMonth = $(month).val();
    var selectedDay = $(day).val();
    var selectedYear = $(year).val();
    if (selectedMonth && selectedDay && selectedYear) {
        var showDateVlaue = pad(selectedDay, 2) + '-' + pad(selectedMonth, 2) + '-' + selectedYear;
        var formattedDate = selectedYear + '-' + pad(selectedMonth, 2) + '-' + pad(selectedDay, 2);
        $(full_date).val(formattedDate);
        $(showDate).html(showDateVlaue);
        yearDeff();
    } else {
        $(full_date).val('');
        $(showDate).html(text);
    }
}

function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}

function changePosterValue(className, data) {
    $(className).html(data);
}

function yearDeff() {
    var birth_date = $('#birth_date').val();
    var departure_date = $("#departure_date").val();
    if (birth_date && departure_date) {

        var birth_date = new Date(birth_date);
        var departure_date = new Date(departure_date);
        var differenceInYears = departure_date.getFullYear() - birth_date.getFullYear();

        if (departure_date.getMonth() < birth_date.getMonth() ||
            (departure_date.getMonth() === birth_date.getMonth() && departure_date.getDate() < birth_date.getDate())) {
            differenceInYears--;
        }
        $('.full_age').html(differenceInYears);
    }
}






$('.ReplaceProfilePPhoto').on('click', function () {
    $('#cropImageprofile').modal('hide');
    $('#profile_picture2').trigger('click');
})
// Start upload preview image
$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
var $uploadCrop,
    tempFilename,
    rawImg,
    imageId;

function imageCroper(thiss,posterImgBtn,errorDiv,showModal){

    var myformData = thiss.files[0];
    console.log(myformData);
    var fileName = myformData.name
    var fileExtension = fileName.split('.').pop().toLowerCase();

    if (fileExtension === 'png' || fileExtension === 'jpg' || fileExtension === 'heic' || fileExtension ===
        'jpeg') {
        $(posterImgBtn).val('Change Image');
        if (thiss.files && thiss.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $(showModal).modal('show');
                rawImg = e.target.result;
            }
            reader.readAsDataURL(thiss.files[0]);
        }
    } else {

        $(errorDiv).html(`` + fileExtension + ` format isn't supported`);
        $(errorDiv).show();
        setTimeout(function () {
            $(errorDiv).hide();
        }, 4000)
    }
}

$('#profile_picture2').change(function (e) {
    var myformData = this.files[0];
    var fileName = myformData.name
    var fileExtension = fileName.split('.').pop().toLowerCase();

    if (fileExtension === 'png' || fileExtension === 'jpg' || fileExtension === 'heic' || fileExtension ===
        'jpeg') {
        $('#profile_picture1').val('Change Image');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $('#cropImageprofile').modal('show');
                rawImg = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    } else {

        $('.profile_picture_error').html(`` + fileExtension + ` format isn't supported`);
        $('.profile_picture_error').show();
        setTimeout(function () {
            $('.profile_picture_error').hide();
        }, 4000)
    }
});


$(document).ready(function () {
    var windowWidth1 = $(window).width();
    var mobileBreakpoint = 567;
    if (windowWidth1 < mobileBreakpoint) {
        $uploadCrop1 = $('#upload-demoprofile').croppie({
            viewport: {
                width: 150,
                height: 150,
            },
            enforceBoundary: false,
            enableExif: true
        });
    } else {
        $uploadCrop1 = $('#upload-demoprofile').croppie({
            viewport: {
                width: 220,
                height: 200,
            },
            enforceBoundary: false,
            enableExif: true
        });
    }
});

$('#cropImageprofile').on('shown.bs.modal', function () {
    // alert('Shown pop');
    $uploadCrop1.croppie('bind', {
        url: rawImg
    }).then(function () {
        $('.cr-slider').attr({
            'min': 0.080,
            'max': 0.7000,
            'aria-valuenow': 0.400
        });

    });
});


$('#crop_profile_ImageBtn').on('click', function (ev) {
    $uploadCrop1.croppie('result', {
        type: 'base64',
        size: 'original',
        quality: 1,
        format: 'jpeg',
        backgroundColor: "white",
        // size: {width: 220, height: 220}
    }).then(function (resp1) {
        console.log(resp1);
        $('#profile_picture3').val(resp1);
        $('#profile_item-img-output').attr('src', resp1);
        $('#cropImageprofile').modal('hide');
    });
});


function cropImgFun(ModalId,imageInput,ImgOtp){
    $uploadCrop1.croppie('result', {
        type: 'base64',
        size: 'original',
        quality: 1,
        format: 'jpeg',
        backgroundColor: "white",
    }).then(function (resp1) {
        $(imageInput).val(resp1);
        $(ImgOtp).attr('src', resp1);
        $(ModalId).modal('hide');
    });
}




$("#profile_picture1").click(function () {
    console.log('token');
    $("#profile_picture2").click();


});

$("#additional_picture1").click(function () {
    var additional_picturelength = $('.preview-images-zone .preview-image').length;
    if (additional_picturelength >= 3) {
        $("#additional_picture1").val('Image limit exceeded!');
    }
    if (additional_picturelength < 4) {
        $("#additional_picture2").click();
    } else {
        $('.additional_picture_error').html('Image limit exceeded!');
        $(".additional_picture_error").show();
    }


});


var img = new Image;
var c = document.createElement("canvas");
var ctx = c.getContext("2d");

img.onload = function () {
    c.width = this.naturalWidth;
    c.height = this.naturalHeight;
    ctx.drawImage(this, 0, 0);
    c.toBlob(function (blob) {

    }, "image/jpeg", 0.75);
};
img.crossOrigin = "";
img.src = "url-to-image";

$('#additional_picture2').change(function (e) {
    var myformData = this.files[0];
    console.log(this.files[0].name);
    var fileName = myformData.name;
    var fileExtension = fileName.split('.').pop().toLowerCase();
    if (fileExtension === 'png' || fileExtension === 'jpg' || fileExtension === 'heic' || fileExtension ===
        'jpeg') {
        readImage2();
        $('#additional_picture1').val('Add Another Image');
    } else {

        $('.additional_picture_error').html(`` + fileExtension + ` format isn't supported`);
        $('.additional_picture_error').show();
        setTimeout(function () {
            $('.additional_picture_error').hide();
        }, 4000)
    }


});


function cancel_img(data) {

    if (data == 4) {
        $('#additional_picture1').val('');
    }
    $(".preview-image.preview-show-" + data).remove();
    $(".additional_picture12 #eternity_page_error").remove();
    $("#additional_picture1").val('Add Another Image');
}


function readImage2() {

    if (window.File && window.FileList && window.FileReader) {
        console.log('hello');
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");
        if (files.length <= 4) {
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;

                var fileName = file.name;
                var fileExtension = fileName.split('.').pop().toLowerCase();
                var supportedFormats = ['png', 'jpg', 'jpeg', 'heic'];
                if (supportedFormats.includes(fileExtension)) {
                    var picReader = new FileReader();

                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        var html = '<div class=" preview-image preview-show-' + num + '">' +
                            '<input type="hidden" name="additional_picture_stor[' + num + ']" value = "' + picFile
                                .result + '">' +
                            '<div class="image-zone "><img id="pro-img-' + num + '" src="' + picFile.result +
                            '" style="    max-height: 71px;"></div>' +
                            '<div class="image-cancel d-flex" onclick="cancel_img(' + num + ')" data-no="' +
                            num + '"><img src ="/Assets/Group22.svg"  height="20"></div>' +
                            '<div class="tools-edit-image"></div>' +
                            '</div>';

                        output.append(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                } else {
                    // Display error message for unsupported format
                    var errorMessage = fileExtension + ' format isn\'t supported';
                    $('.additional_picture_error').html(errorMessage).show();
                    setTimeout(function () {
                        $('.additional_picture_error').hide();
                    }, 4000);
                }


            }
        } else {
            $('.additional_picture_error').html('The maximum number of images allowed for upload is four.').show();
            setTimeout(function () {
                $('.additional_picture_error').hide();
            }, 4000);

        }
    } else {
        console.log('Browser not support');
    }
}

// End upload preview image



// DataTable


$(document).ready(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        dom: 'tp',
        language: {
            paginate: {
                previous: '<<',
                next: '>>',
                zeroRecords: "Nothing found - sorry",
            },
        },
        ajax: {
            url: "/company/clients",
            type: "GET",
        },
        drawCallback: function (json) {
            var api = this.api();
            console.log(json.json.recordsTotal);
            if (json.json.recordsTotal <= 10) {
                $(api.table().container()).find('.dataTables_paginate').hide();
            } else {
                $(api.table().container()).find('.dataTables_paginate').show();
            }
        },
        columns: [
            {
                data: 'edit',
                name: 'edit',
                orderable: false,
                searchable: false,
            },
            { data: 'creation_at', name: 'creation_at' },
            { data: 'name', name: 'name' },
            { data: 'commemoration_page', name: 'commemoration_page' },
            { data: 'poster', name: 'poster' },
            { data: 'qr', name: 'qr' },
        ]
    });

    
});



$(document).ready(function () {

    $('#subscribe-form').submit(function (event) {
        event.preventDefault();
        if (validateEmail()) {
            var email = $('#subscribe-email').val().trim();
            $.ajax({
                url: '{{ route("subscribe") }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'email': email
                },
                dataType: 'json',
                success: function (data) {
                    $("#subscribe-modal").modal('show');
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    if (errors) {
                        console.log(errors.email);
                        $('.email-msg').removeClass('d-none').find('small').html(errors
                            .email);
                        setTimeout(() => {
                            $('.email-msg').addClass('d-none');
                        }, 4000);
                    }
                }
            });
        } else {
            // You might want to display an error message to the user
        }
    });

    function validateEmail() {
        var email = $('#subscribe-email').val().trim();
        if (email === '') {
            return false;
        }
        if (!email.replace(/\s/g, '').length) {
            return false;
        }
        return true;
    }
});


$('#Filter-dropdown').on('click', function () {
    $('.shortBy').hide();
    $('.filter').toggle();
})
$('#Short-dropdown').on('click', function () {
    $('.filter').hide();
    $('.shortBy').toggle();
})

function filter(id) {
    var cli_funct = 'searchdata';

    $("#" + id).closest("li").html(`<div class="apend-data ` + id + ` p-3 bg-white rounded-4 my-1 w-100">
        <div class="d-flex justify-content-between" onclick="close1('` + id + `','filter')" style="color: gray;"> 
            ` + id + `
           <img class="cursor-pointer" src="/Assets/ep_arrow-down.svg" height="25" width="17" style="transform: rotate(180deg);">
        </div>
        <form action="" method="post" style="position: relative;">
            <input type="hidden" value="` + id + `" id="` + id + `" name="filtertype">
          <input type="text" id="` + id + `" data-id ="` + id + `" onkeyup="${cli_funct}(this.value,this.id)"  class="form-control mb-3 rounded-3" placeholder="Search" style="height: 58px; background: #F5F5F5;     border: none;">
          <img class="search-img" src="/Assets/iconoir_search.png" height="25" style="position: absolute; top: 17px;left: 190px;">
        </form>
    </div>`);
}




function shortby(id) {
    var Ascending = 'Ascending (A-Z)';
    var Descending = 'Descending (Z-A)';
    var searchid = '#NameAscDesc';
    if (id == 'Date') {
        Ascending = 'Ascending';
        Descending = 'Descending';
        searchid = '#created_at';
    }
    $("#" + id).closest("li").html(`<div class="apend-data ` + id + ` p-3 bg-white rounded-4 my-1 w-100">
        <div class="d-flex justify-content-between"  onclick="close1('` + id + `','shortby')" style="color: gray;"> 
            ` + id +
        `
           <img class="cursor-pointer"src="/Assets/ep_arrow-down.svg" height="25" width="17" style="transform: rotate(180deg);">
        </div>
        <div class="p-2 my-2 rounded-3 cursor-pointer" style="font-size:17px; background: #F5F5F5;color: gray;" onclick="searchdata('` +
        searchid + `','ASC')">` + Ascending + `</div>
        <div class="p-2 cursor-pointer"style="font-size:17px;color: gray;" onclick="searchdata('` + searchid +
        `','DESC')">` + Descending + `</div>
    </div>`);
}

function close1(id, func) {
    $('.' + id).closest("li").html(`
            <div class="p-3 d-flex justify-content-between w-100 cursor-pointer" id="` + id + `" onclick="` +
        func + `(this.id)">
            <span>` + id + `</span>
            <img src="/Assets/ep_arrow-down.svg" height="25" width="17" style="">
            </div>`);
}


function pageOpen(slug) {
    // var url = "{{config('app.url')}}/commemoration/"+slug;
    var url = "https://enyty.com/commemoration/" + slug;
    console.log(url);
    window.location = url;
}


// function searchdata(id, data) {
//     $(id).val(data);
//     $('.form').submit();
// }
function searchdata(id, data) {
    // recent weekly monthly anniversary

    var massage1 = '';
    switch (data) {
        case 'recent':
            massage1 = "THERE ARE NO RECENT POSTERS IN YOUR CITY.";
            break;
        case 'weekly':
            massage1 = "THERE ARE NO WEEKLY POSTERS IN YOUR CITY";
            break;
        case 'monthly':
            massage1 = "THERE ARE NO MONTHLY POSTERS IN YOUR CITY";
            break;
        case 'anniversary':
            massage1 = "THERE ARE NO ANNIVERSARY POSTERS IN YOUR CITY";
            break;
        default:
            // massage1 = "Invalid option selected.";
            break;
    }
    $('#emptyTableMass').val(massage1);
    $(id).val(data);
    $('.form').submit();
}

function getSelect() {
    var selectedData = $('#selectpicker').val();
    return JSON.stringify(selectedData);
}

$(document).ready(function () {

    
    $('#selectpicker').select2({
        placeholder: 'Search',
        minimumInputLength: 1,
        ajax: {
            url: '/searcharea',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    val: $('#selectpicker option').length,
                    selected: getSelect(),
                    q:$('.select2-search__field').val()
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name
                        };
                    })
                };
            },
            cache: true
        },
        maximumSelectionLength: 3,
        language: {
            searching: function () {
                return "Searching..."; 
            },
            inputTooShort: function (args) {
                var minLength = args.minimum;
                return "Type a country, province or city"; 
            },
            noResults: function () {
                return "No results found"; 
            },
            maximumSelected: function (args) {
                var maximum = args.maximum;
                return "You can only select up to " + maximum + " items"; 
            }
        }
    });
    function updateSelectedValues() {

        var selected = $('#selectpicker').select2('data');
        var $selectedValuesContainer = $('#selected-values');
        $selectedValuesContainer.empty();
        selected.forEach(function (item) {
            var $valueElement = $('<div class="selected-value"></div>').text(item.text);
            var $removeButton = $('<span>&times;</span>');


            $removeButton.on('click', function () {
                var option = $('#selectpicker').find('option[value="' + item.id + '"]');
                option.prop('selected', false);
                option.remove();
                $('#selectpicker').trigger('change');
            });

            $valueElement.append($removeButton);
            $selectedValuesContainer.append($valueElement);
        });
    }
    $('#selectpicker').on('change', function () {
        updateSelectedValues();
        console.log($('#selectpicker').val().length);
        if ($('#selectpicker').val().length > 0) {
            $('.filterBtn12').show();
        } else {
            $('.filterBtn12').hide();
        }

    });
    updateSelectedValues();
});


// show and hide div 
function showHidefuc(showDiv, hideDiv) {

    $(showDiv).removeClass('d-flex');
    $(showDiv).show();
    $(hideDiv).hide();
    console.log(hideDiv);
}

//  loade More 
function loadMore() {
    $('#input_loadMore').val(4);
    $('.form').submit();
}


function setupTable(tableId, ajaxUrl, loadMoreBtnId, showLessBtnId, mass) {
    $.fn.dataTable.ext.pager.numbers_length = 6;
    $(tableId).DataTable({
        searching: true,
        serverSide: true,
        processing: true,
        dom: 'tp',
        language: {
            emptyTable: mass,
            paginate: {
                previous: '<<',
                next: '>>',
                zeroRecords: "Nothing found - sorry",
            },
        },
        ajax: {
            url: ajaxUrl,
            type: "GET"
        },
        paging: true,
        pageLength: 20,
        drawCallback: function (json) {
            var api = this.api();
            console.log(json.json.recordsTotal);
            if (json.json.recordsTotal <= 20) {
                $(api.table().container()).find('.dataTables_paginate').hide();
            } else {
                $(api.table().container()).find('.dataTables_paginate').show();
            }
        },
        columns: [
            { data: 'details', name: 'details', orderable: false, searchable: true }
        ]
    });
}


$(document).ready(function () {
    $.fn.dataTable.ext.pager.numbers_length = 6;

    $('.form').on('submit', function (e) {
        e.preventDefault();

        var has_data = false;
        var new_mass = false;
        var new_mass_val = '';
        var query = "?";
        var data = [];
        var tableId = $(this).data('table');
        var requestFor = $(this).data('for');

        $.each($(this).serializeArray(), function (index, item) {
            if (item.value) {
                if (item.name == "emptyTableMass") {
                    new_mass = true;
                    new_mass_val = item.value;
                }else{
                   new_mass_val = 'THERE ARE NO RECENT MEMORIAL PROFILES IN YOUR CITY';
                }
                
                has_data = true;
                query += item.name + '=' + item.value + '&';
            }
        });

        if (has_data) {
            
            console.log(requestFor);
           if(requestFor == "/company/clients" || requestFor ==  '/company/invoices'){
                $(tableId).DataTable().ajax.url(requestFor + query).load(function (json) {
                    var api = $(tableId).DataTable();
                    console.log(json.recordsTotal);
                    if (json.recordsTotal <= 3) {
                        $(api.table().container()).find('.dataTables_paginate').hide();
                    } else {
                        $(api.table().container()).find('.dataTables_paginate').show();
                    }
                });
           }else{
               var options = {
                   language: {
                       emptyTable: new_mass_val,
                       paginate: {
                           previous: '<<',
                           next: '>>',
                           zeroRecords: "Nothing found",
                       },
                   },
                   processing: true,
                   serverSide: true,
                   ajax: {
                       url: requestFor + query,
                       type: "GET"
                   },
                   columns: [
                       { data: 'details', name: 'details', orderable: false, searchable: false }
                   ],
                   dom: "tp",
                   paging: true,
                   pageLength: 20,
                   drawCallback: function (json) {
                       var api = this.api();
                       console.log(json.json.recordsTotal);
                       if (json.json.recordsTotal <= 20) {
                           $(api.table().container()).find('.dataTables_paginate').hide();
                       } else {
                           $(api.table().container()).find('.dataTables_paginate').show();
                       }
                   }
               };
               if ($.fn.DataTable.isDataTable(tableId)) {
                   $(tableId).DataTable().destroy();
               }
               $(tableId).DataTable(options).draw();
           }
        } else {
            $(tableId).DataTable().ajax.url(requestFor + query).load(function (json) {
                var api = $(tableId).DataTable();
                if (json.recordsTotal <= 3) {
                    $(api.table().container()).find('.dataTables_paginate').hide();
                } else {
                    $(api.table().container()).find('.dataTables_paginate').show();
                }
            });
        }
    });
});




function clearAllFilter() {
    $('#selectpicker').val(null).trigger('change');
    $('#selectpicker').find('option').remove();
   
    $('.form').submit();
}




