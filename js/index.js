/**
 * Page messages
 */
$('#msgCls').on('click', function(){
    $(this).closest('#pageMsg').transition('fade');
})

/**
 * links search bar to api content
*/
$('.ui.search').search({
    apiSettings: {
        url: 'services/venue-rest.php?ven={query}'
    },
    fields:{
        results: 'venues',
        title: 'venue',
        url : 'link'
    },
    minCharacters: 3
});

/**
 * Intilizes dropdown menu and deal with logic
 * for locations
 */
$('.dropdown').dropdown({
    direction : 'left',
    action: function(text, value){
        // $('#test').text(window.location.href + 'results.php?srchVal=' + text);

        location.href = 'results.php?srchVal=' + text;
        
    }
});

/**
 * Click events for the links on side menu
 * 
 * Three click events are keyed on id's and when ran the
 * navigate to the corrisponding page.
 */
$('#aboutlnk').on('click', function(){
    location.href = 'about.php';
})
$('#contactlnk').on('click', function(){
    location.href = 'contact.php';
})
$('#suggestLnk').on('click', function(){
    location.href = 'suggestVenue.php';
})


