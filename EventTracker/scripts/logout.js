export const logOut = $("#logout-btn").click(function() {
    $.ajax({
        url: '/EventTracker/php/logout.php',
        success: function(data){
            alert("You have successfully been logged out.");
            window.location.href = "../../index.html";
        }
    });
});
