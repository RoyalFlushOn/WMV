
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

$('#locSrchBtn').hide();

$('#venueTxtBx').autocomplete({
    source: './services/venue-rest.php'
});

$('#venueTxtBx').on('autocompleteselect', function(){
    dbVenue = true;
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

