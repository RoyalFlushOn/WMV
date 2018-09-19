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

$('#signInErrorMsg').hide();

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
    location.href = 'users/register.php';
})

/**
 * logs user in
 */
function signIn(){

    $('#signInFrm').form('validate form');

    $('#signInFrm').form({
        onSuccess : function(){
            $.post(
                'services/login.php',
                {
                    username : $('#userNm').val(),
                    password : $('#passWrd').val()
                },
                function(data){
                    if(data.signIn){
                        userBtnConfig(true);
                        message('success', 'Sign In Successful', 'You are now signed into your account');
                        location.reload();
                    } else {
                        $('#signInErrorMsg').show();
                    }
                },
                'json'
            );
        }
    });
    

    // if($('#signInFrm').form('is valid')){
    //     $.post(
    //         'services/login.php',
    //         {
    //             username : $('#userNm').val(),
    //             password : $('#passWrd').val()
    //         },
    //         function(data){
    //             if(data.loggedOn){
    //                 userBtnConfig(true);
    //                 message('success', 'Sign In Successful', 'You are now signed into your account');
    //                 location.reload();
    //             } else {
    //                 $('#signInErrorMsg').show();
    //             }
    //         }
    //     );
    // } else {

    // }
    
}

function onSuccess(event, fields){

    $('#userNm').val() = 'cheese';
}

/**
 * sets messages ready for display on index homepage
 */

function message(type, header, message){

    $.post(
        'service/message.php',
        {
            type : type,
            header : header,
            message : message
        },
        function(data){
            if(!data.status){
                console.log('message service error');
            }
        },
        'json'
    )
}

/**
 * trigger the signing out of a user.
 */
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