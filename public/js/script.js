jQuery(document).ready(function() {
    $('#accept-number').on('click', function(event) {
        var div = $(this).parent();
        alert("Cliked");
        $.ajax({
            url: '/vote',
            method: 'POST',
            data: { 'id': 12 },
            success: function(data) {
                console.log(data);
            },
            error: function(jqXHR, textStatus, errorsThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("Ajax error : " + textStatus + " : " + errorsThrown);
            }
        });

    });

    $('#decline-number').on('click', function(event) {
        var div = $(this).parent();
        $.post("/vote", {
                like: "-1",
                id: div.data("id")
            },
            function(data, status) {
                alert("Data: " + data + "\nStatus: " + status);
            });
    });
});