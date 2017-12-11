/**
 * Page messages
 */
$('#msgCls').on('click', function(){
    $(this).closest('#pageMsg').transition('fade');
})

/**
 * User buttons based on login status
 */
function userBtnConfig(status){
    if(status){
        $('#signInIcon').hide();
        $('#regIcon').hide();
        $('#signOutIcon').show();
    } else {
        $('#signInIcon').show();
        $('#regIcon').show();
        $('#signOutIcon').hide();
    }
}

/**
 * sign in and register buttons prompts
 */
$('#signInIcon').popup({
    position : 'bottom right',
    on : 'hover',
    content : 'Sign In',
    variation: 'tiny'
});

$('#regIcon').popup({
    position : 'bottom right',
    on : 'hover',
    content : 'Register',
    variation: 'tiny'
});

$('#signOutIcon').popup({
    position : 'bottom right',
    on : 'hover',
    content : 'Sign Out',
    variation: 'tiny'
});

/**
 * reg and sign in/out buttons logic
 */
$('#signInMdl').modal(
    'attach events',
    '#signInIcon',
    'show'
);

$('#regIcon').on('click', function(){
    location.href = window.location.href + 'users/register.php';
})

$('#signOutIcon').on('click', function(){
    $.post(
        'services/logout-rest.php',
        {
            signOut : true
        },
        function(data){
            if(data.signout){
                userBtnConfig(false);
            }
        },
        'json'

    );
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
$('#aboutnk').on('click', function(){
    location.href = window.location.href + 'about.php';
})
$('#contactlnk').on('click', function(){
    location.href = window.location.href + 'contact.php';
})
$('#suggestLnk').on('click', function(){
    location.href = window.location.href + 'suggestVenue.php';
})

/**
 * Sign in verification logic
 */
$('#signInFrm').form({
    inline: true,
    fields: {
        userNm: {
            identifier: 'userNm',
            rules: [
                {
                    type : 'empty',
                    prompt : 'Please enter Username.'
                }
            ]
        },
        passWrd : {
            identifier : 'passWrd',
            rules: [
                {
                    type : 'empty',
                    prompt: 'Please enter a Password.'
                }//,
                // {
                //     type: 'minLength[8]',
                //     prompt: 'Password needs to be minimum 8 characters.'
                // }
            ]
        }
    }
});


