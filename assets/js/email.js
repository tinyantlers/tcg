$('#contact-us').submit(function () {
    var post_data = $('#contact-us').serialize();
    $('#loading').show();
    $.post('../../forms/contact.php', post_data, function (data) {
        $('#sent-message').show();
    });
});