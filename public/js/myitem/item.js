$("#edit-modal-form").modal('attach events', '#edit-modal-close', 'close');
$("#delete-modal-form").modal('attach events', '#delete-modal-close', 'close');

$("#modal-submit").click(function() {
    $(this).addClass('loading');
    $("#modal-form").addClass('loading');
});

function getItemContent(item_id) {
    let endpoint = '/api/getitem/' + item_id;
    $("#edit-modal-form")
        .modal('setting', 'transition', 'fade up')
        .modal('duration', 100)
        .modal('show');
    
    $.ajax({
        url: endpoint,
        complete: function() {
            $('#edit-modal-form form').removeClass("loading");
        },
        success: function (result) {
            $('#item_id').val(result.item_id);
            $('#item_details').val(result.item_details);
            $('#item_type').val(result.item_type);
        }
    });
    $('#edit-modal-form form').addClass("loading");
}

function getDelete(item_id) {
    $("#delete-modal-form")
        .modal('setting', 'transition', 'fade up')
        .modal('duration', 100)
        .modal('show');

    $("#delete-modal-form form").attr("action", "/myitem/delete/");
    $("#delete-modal-form form input").attr("value", item_id);
}