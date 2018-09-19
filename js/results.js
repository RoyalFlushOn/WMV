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