
// $('#venueTxtBx').on('Change', function(){

//         $.post('./services/venue-rest.php', {
//             venue : $this.val()
//         },
//     function(data, status){
//         if(status){
//             $('autoCompPnl')
//         }
//     });
// });

var grpLoc;
var venue;
var dbVenue = false;

$('#signInIcon').popup({
    position : 'bottom right',
    on : 'hover',
    content : 'Sign in',
    variation: 'tiny'
});

$('#regIcon').popup({
    position : 'bottom right',
    on : 'hover',
    content : 'Register',
    variation: 'tiny'
});

/**
 * links search bar to api content
*/
$('.ui.search').search({
    apiSettings: {
        url: 'services/venue-rest.php?ven={query}'
    },
    fields:{
        results: 'venues',
        title: 'venue'
    },
    minCharacters: 3
});

/**
 * Intilizes dropdown menu
 */
$('.dropdown').dropdown({
    direction : 'left'
});

$('#venueSrchBtn').on('click', function(){
    venue = $('#venueTxtBx').val();

    location.href = 'http://localhost:8888/WMV/venue.php?venue=' + venue + '&db=' + dbVenue;
});

$('#locationDrpDwn li a').on('click', function(e){
    grpLoc = $(this).text();

    $('#locationBtn').text(grpLoc);

   e.preventDefault();

   $('#locSrchBtn').show();

});

$('#locSrchBtn').on('click', function(){
    location.href = 'http://localhost:8888/WMV/results.php?srchVal=' + grpLoc;
})

