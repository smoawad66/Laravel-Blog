$('#fav').on('click', function(event) {
    event.preventDefault();
    const form = $('#fav_form');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success: function(response) {
            let status = $('#status').attr('value');
            status = status == 1 ? true : false;
            if (status == false) {
                $('#fav a').html('<i class="bi bi-heart-fill"></i>');
                $('#fav').attr('title', 'Unsave post');
                $('#status').attr('value', 1);
            } else {
                $('#fav a').html('<i class="bi bi-heart"></i>');
                $('#fav').attr('title', 'Save post');
                $('#status').attr('value', 0);
            }
        },
    });
});