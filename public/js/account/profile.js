$('.edit-detail-element').transition('toggle');

$('#edit-profile-button').click(function() {
    $('#profile-details').transition(
        {
            animation   : 'fade up',
            duration    : '200ms',
            onComplete  : function() {
                $('.profile-detail-element').transition('toggle');
                
                setTimeout( function(){
                    $('.edit-detail-element').transition('toggle');
                    $('#profile-details').transition('fade up');
                }, 200);
            }
        }
    );
});

$('#cancel-edit-button').click(function() {
    $('#profile-details').transition(
        {
            animation   : 'fade up',
            duration    : '200ms',
            onComplete  : function() {
                $('.edit-detail-element').transition('toggle');
                
                setTimeout( function(){
                    $('.profile-detail-element').transition('toggle');
                    $('#profile-details').transition('fade up');
                }, 200);
            }
        }
    );
});