jQuery(document).ready(function() {
    $('.vote_plus').on('click', function(event) {
        var post_id = $(this).parent().parent().data('id'); // Comment améliorer ?
        $.post("/vote", {vote: "1", id: post_id},
            function(data) {
			$('[data-id="'+data['id']+'"]').find("#accept-number").html(data['vote_accept']);
			$('[data-id="'+data['id']+'"]').find("#decline-number").html(data['vote_decline']);	
            }
	);

    });

    $('.vote_minus').on('click', function(event) {
        var post_id = $(this).parent().parent().data('id'); // Comment améliorer ?
        $.post("/vote", {vote: "-1", id: post_id},
            function(data) {
		$('[data-id="'+data['id']+'"]').find("#accept-number").html(data['vote_accept']);
		$('[data-id="'+data['id']+'"]').find("#decline-number").html(data['vote_decline']);
            }
	);
    });
});
