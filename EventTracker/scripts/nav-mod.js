export const openNav = $(document).ready(function() {
    $("#more").click(() => {
        $("#menu").width(250);
    })
})

export const closeNav = $(document).ready(function() {
    $("#closebtn").click(() => {
        $("#menu").width(0);
    })
})