$('#blog-form').on('beforeSubmit', function () {
    "use strict"
    var data = $('#blog-form').serialize();
    $.ajax({
        url: '/blog/add',
        data: data,
        type: 'POST',
        success: function(res){
            $('#blog-verifycode-image').trigger('click');
            $('.newBlog').append(res);
        },
        error: function () {
            window.alert('ошибка');
        }
    });
    return false;
});