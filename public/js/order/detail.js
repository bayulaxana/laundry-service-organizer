$(document).ready(function() {
    
    // itemListContainer is used for holding item list
    // that assigned to order detail
    // [in the table]
    let itemListContainer = document.getElementById("item-selected-list");
    let orderId = itemListContainer.getAttribute("data-order");

    // Fetch the data using AJAX
    $.ajax({
        url: '/api/getitemlist/' + orderId,
        success: function(result) {
            for (i in result) {
                let node = document.createElement("li");
                node.innerHTML = result[i].itm_item_details;
                
                itemListContainer.appendChild(node);
            }
        }
    });

    $('.comment-delete-trigger').click(function() {
        let commentId = $(this).attr('data-comment');
        
        // Delete the comment using AJAX
        $.ajax({
            url: '/comment/delete/' + commentId,
            success: function(result) {
                let html = "<div class='ui message green'>Komentar berhasil dihapus</div>"
                $('#comment-for-' + commentId).html(html);
            }
        });
    });
});