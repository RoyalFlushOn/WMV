/**
 *  deals with image clicks
 */

 function seatViewChng(id, name){
     $('#mainView').prop('src', './assets/images/test/screen-1/' + id + '.png');
     $('#myVwLbl').text(name);
 }

 /**
  * sidebar toggles toggles
  */
$('#menuTrig').on('click', function(){
    $('#sidebarMenu').sidebar('toggle');
});

$('#sidebarCls').on('click', function(){
    $('#sidebarMenu').sidebar('toggle')
    .sidebar('transition', 'overlay');
});

 /**
  * link buttons
  */

  $('#HmLnk').on('click', function(){
      location.href = Window.location;
  });
  $('#VenPgLnk').on('click', function(){
      location.href = Window.location;
  });
  $('#helpLnk').on('click', function(){
      location.href = Window.location + 'help.php';
  });

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