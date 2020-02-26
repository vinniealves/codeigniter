const BASE_URL = "http://localhost/codeigniter/";

function clearErrors() {
    $(".has-error").removeClass("has-error");
    $(".help-block").html("");
}

function showErrors(error_list){
    clearErrors();

    $.each(error_list, function(id, message) {
        $(id).parent().parent().addClass("has-error");
        $(id).parent().siblings(".help-block").html(message);
    })
}

function showErrorsModal(error_list){
    clearErrors();

    $.each(error_list, function(id, message) {
        $(id).parent().parent().addClass("has-error");
        $(id).siblings(".help-block").html(message);
    })
}

function loadingImg(message = ''){
    return '<i class="fa fa-circle-o-notch fa-spin"></i>&nbsp;'+message;
}

function uploadImg(input_file, img, input_path) {
    let src_before = img.attr("src");
    let img_file = input_file[0].files[0];
    let form_data = new FormData();

    form_data.append('image_file', img_file);

    $.ajax({
        url: BASE_URL + 'restrict/ajax_import_image',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        beforeSend:function(){
            clearErrors();
            input_path.siblings(".help-block").html(loadingImg("Carregando Imagem..."));
        },
        success:function(response){
            clearErrors();
            if(response['status'] == 1){
                img.attr("src", response['img_path']);
                input_path.val(response['img_path']);
            } else {
                img.attr("src", src_before);
                input_path.siblings(".help-block").html(response['error']);
            }
        },
        error:function(){
            img.attr("src", src_before);
        }

    });
}