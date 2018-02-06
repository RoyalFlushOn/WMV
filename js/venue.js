function myView(e, venueid){
    $.post(
        'services/myview-rest.php',
        {
            seatplan : e.id,
            venueName : venueid
        },
        function(data){
            if(data.success){
                location.href = 'myview.php';
            } else {
                location.href = '.';
            }
        },
        'json'
    );
};

/**
 * Click events for the links on side menu
 * 
 * Three click events are keyed on id's and when ran the
 * navigate to the corrisponding page.
 */
$('#aboutLnk').on('click', function(){
    location.href = 'about.php';
})
$('#contactLnk').on('click', function(){
    location.href = 'contact.php';
})
$('#suggestLnk').on('click', function(){
    location.href = 'suggestVenue.php';
})