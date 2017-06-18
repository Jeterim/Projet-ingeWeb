$(document).ready(function() {
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

    var win = $(window);
    var pageNumber = 2;
    // Each time the user scrolls
    win.scroll(function() {
        // End of the document reached?
        if ($(document).height() - win.height() == win.scrollTop()) {
            $('#loading').show();

            $.ajax({
                type: 'GET',
                url: 'http://localhost:8888/pages/?page=' + pageNumber,
                success: function(data) {
                    pageNumber += 1;
                    if (data.length == 0 && $("#nomore").size() == 0) {
                        $(".blog-main").append('<nav id="nomore"><ul class="pager"><li>No more posts ...</li></ul></nav>');
                    } else {
                        $(".blog-main").append(data);

                    }
                },
                error: function(data) {
                    console.log("Error");
                    console.log(data);
                    $(".blog-main").append(data);
                },
            });
        }
    });
});