jQuery(document).ready(function() {
    $('.vote_plus').on('click', function(event) {
        var post_id = $(this).parent().parent().data('id');
        $.ajax({
            type: 'POST',
            url: '/vote',
            data: { vote: "1", id: post_id },
            success: function(data) {
                $('[data-id="' + data['id'] + '"]').find("#accept-number").html(data['vote_accept']);
                $('[data-id="' + data['id'] + '"]').find("#decline-number").html(data['vote_decline']);
                $('#credits').html(data['credits']);
            },
            error: function(data)  {
                console.log('Error: ' + data);
                console.log(data);
            }
        });

    });

    $('.vote_minus').on('click', function(event) {
        var post_id = $(this).parent().parent().data('id');
        $.ajax({
            type: 'POST',
            url: '/vote',
            data: { vote: "-1", id: post_id },
            success: function(data) {
                $('[data-id="' + data['id'] + '"]').find("#accept-number").html(data['vote_accept']);
                $('[data-id="' + data['id'] + '"]').find("#decline-number").html(data['vote_decline']);
                $('#credits').html(data['credits']);
            },
            error: function(data)  {
                console.log('Error: ' + data);
                console.log(data);
            }
        });
    });
});