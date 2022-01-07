export const checkStatus = () => {
    $.ajax({
        method: 'GET',
        url: '/EventTracker/php/check-status.php',
        datatype: Text,
        success: function(response) {
            if (response == 'false' ) {
                window.location.href="/EventTracker/pages/login.html";
            }
        } 
    }) .fail(function (xhr, status, errorThrown) {
        alert("Error");
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir( xhr );
    })
}

export const isAdmin = () => {
    $.ajax({
        method: 'GET',
        url: '/EventTracker/php/is-admin.php',
        datatype: Text,
        success: function(response) {
            if (response == 'false') {
                window.location.href="/EventTracker/pages/main.html";
            }
        } 
    }) .fail(function (xhr, status, errorThrown) {
        alert("Error");
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir( xhr );
    })
}


