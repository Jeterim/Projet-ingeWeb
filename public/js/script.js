$(document).ready(function() {
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