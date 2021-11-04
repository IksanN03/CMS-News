$(function() {
    $(document).on('click', '.showModalButton', function() {
        $('#modal-universe').find('#modalContent').html('');
        $('#modal-universe').find('#modalContent').html("<div id='modalContent'><div style='text-align:center'><img src='../img/loader.gif'></div></div>");
        if ($('#modal-universe').data('bs.modal').isShown) {
            $('#modal-universe').find('#modalContent').load($(this).attr('value'));
            $('#modal-universe-label').html($(this).attr('title'));
        } else {
            $('#modal-universe').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'), function(response, status, xhr) {
                    if (status == "error") {
                        var msg = 'An error was encountered while processing your request. ';
                        if (xhr.status == 403) msg = 'Anda tidak diizinkan untuk mengakses fitur ini. ';
                        $('#modalContent').html('<div class="alert alert-custom alert-light-danger" style="margin-bottom:0px"><big><b>'+xhr.status + '</b> ' + xhr.statusText +'</big> <br><span class="text-muted">'+msg+'</span></div>' );
                    }
                });
                $('#modal-universe-label').html($(this).attr('title'));
        }
    });

    $(document).on('click', '.showModalButtonSmall', function() {
        $('#modal-universe-small').find('#modalContentSmall').html('');
        $('#modal-universe-small').find('#modalContentSmall').html("<div id='modalContentSmall'><div style='text-align:center'><img src='../img/loader.gif'></div></div>");
        if ($('#modal-universe-small').data('bs.modal').isShown) {
            $('#modal-universe-small').find('#modalContentSmall').load($(this).attr('value'));
            $('#modal-universe-small-label').html($(this).attr('title'));
        } else {
            $('#modal-universe-small').modal('show')
                .find('#modalContentSmall')
                .load($(this).attr('value'), function(response, status, xhr) {
                    if (status == "error") {
                        var msg = 'An error was encountered while processing your request. ';
                        if (xhr.status == 403) msg = 'Anda tidak diizinkan untuk mengakses fitur ini. ';
                        $('#modalContentSmall').html('<div class="alert alert-custom alert-light-danger" style="margin-bottom:0px"><big><b>'+xhr.status + '</b> ' + xhr.statusText +'</big> <br><span class="text-muted">'+msg+'</span></div>' );
                    }
                });
                $('#modal-universe-small-label').html($(this).attr('title'));
        }
    });

    $(document).on('click', '.showModalButtonLarge', function() {
        $('#modal-universe-large').find('#modalContentLarge').html('');
        $('#modal-universe-large').find('#modalContentLarge').html("<div id='modalContentLarge'><div style='text-align:center'><img src='../img/loader.gif'></div></div>");
        if ($('#modal-universe-large').data('bs.modal').isShown) {
            $('#modal-universe-large').find('#modalContentLarge').load($(this).attr('value'));
            $('#modal-universe-large-label').html($(this).attr('title'));
        } else {
            $('#modal-universe-large').modal('show')
                .find('#modalContentLarge')
                .load($(this).attr('value'), function(response, status, xhr) {
                    if (status == "error") {
                        var msg = 'An error was encountered while processing your request. ';
                        if (xhr.status == 403) msg = 'Anda tidak diizinkan untuk mengakses fitur ini. ';
                        $('#modalContentLarge').html('<div class="alert alert-custom alert-light-danger" style="margin-bottom:0px"><big><b>'+xhr.status + '</b> ' + xhr.statusText +'</big> <br><span class="text-muted">'+msg+'</span></div>' );
                    }
                });
                $('#modal-universe-large-label').html($(this).attr('title'));
        }
    });

    $(document).on('click', '.showModalButtonXlarge', function() {
        $('#modal-universe-xlarge').find('#modalContentXlarge').html('');
        $('#modal-universe-xlarge').find('#modalContentXlarge').html("<div id='modalContentXlarge'><div style='text-align:center'><img src='../img/loader.gif'></div></div>");
        if ($('#modal-universe-xlarge').data('bs.modal').isShown) {
            $('#modal-universe-xlarge').find('#modalContentXlarge').load($(this).attr('value'));
            $('#modal-universe-xlarge-label').html($(this).attr('title'));
        } else {
            $('#modal-universe-xlarge').modal('show')
                .find('#modalContentXlarge')
                .load($(this).attr('value'), function(response, status, xhr) {
                    if (status == "error") {
                        var msg = 'An error was encountered while processing your request. ';
                        if (xhr.status == 403) msg = 'Anda tidak diizinkan untuk mengakses fitur ini. ';
                        $('#modalContentXlarge').html('<div class="alert alert-custom alert-light-danger" style="margin-bottom:0px"><big><b>'+xhr.status + '</b> ' + xhr.statusText +'</big> <br><span class="text-muted">'+msg+'</span></div>' );
                    }
                });
                $('#modal-universe-xlarge-label').html($(this).attr('title'));
        }
    });

    $(document).on('click', '.showModalButtonFull', function() {
        $('#modal-universe-full').find('#modalContentFull').html('');
        $('#modal-universe-full').find('#modalContentFull').html("<div id='modalContentFull'><div style='text-align:center'><img src='../img/loader.gif'></div></div>");
        if ($('#modal-universe-full').data('bs.modal').isShown) {
            $('#modal-universe-full').find('#modalContentFull').load($(this).attr('value'));
            $('#modal-universe-full-label').html($(this).attr('title'));
        } else {
            $('#modal-universe-full').modal('show')
                .find('#modalContentFull')
                .load($(this).attr('value'), function(response, status, xhr) {
                    if (status == "error") {
                        var msg = 'An error was encountered while processing your request. ';
                        if (xhr.status == 403) msg = 'Anda tidak diizinkan untuk mengakses fitur ini. ';
                        $('#modalContentFull').html('<div class="alert alert-custom alert-light-danger" style="margin-bottom:0px"><big><b>'+xhr.status + '</b> ' + xhr.statusText +'</big> <br><span class="text-muted">'+msg+'</span></div>' );
                    }
                });
                $('#modal-universe-full-label').html($(this).attr('title'));
        }
    });
});