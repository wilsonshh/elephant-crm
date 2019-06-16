// delete a project
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete');
    $('#id_delete').val($(this).data('id'));
    $('#title_delete').val($(this).data('title'));
    $('#deleteModal').modal('show');
    id = $('#id_delete').val();
});
$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
        type: 'DELETE',
        url: 'project/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
            toastr.success('Successfully deleted Project!', 'Success Alert', { timeOut: 5000 });
            $('.item' + data['id']).remove();
        }
    });
});

// delete a contact
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete');
    $('#id_delete').val($(this).data('id'));
    $('#title_delete').val($(this).data('title'));
    $('#deleteModal').modal('show');
    id = $('#id_delete').val();
});
$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
        type: 'DELETE',
        url: 'contact/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
            toastr.success('Successfully deleted contact!', 'Success Alert', { timeOut: 5000 });
            $('.item' + data['id']).remove();
        }
    });
});


// Validate image
(function($) {
    $.fn.checkFileType = function(options) {
        var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
        };
        options = $.extend(defaults, options);

        return this.each(function() {

            $(this).on('change', function() {
                var value = $(this).val(),
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);

                if ($.inArray(extension, options.allowedExtensions) == -1) {
                    options.error();
                    $(this).focus();
                } else {
                    options.success();
                }

            });

        });
    };

})(jQuery);

$(function() {
    $('#image').checkFileType({
        allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
        success: function() {},
        error: function() {
            alert('Please upload a valid image (jpg, jpeg, png, gif)');
        }
    });

});