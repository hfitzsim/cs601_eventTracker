import { openNav, closeNav } from "./nav-mod.js";
import {default as toggleCollapsible} from "./collapsible.js";
import { getUserUpcomingEvents, getUserPastEvents, selectUpcomingEvent, toConfrimAttendance, getAllUpcomingEvents, getAllPastEvents } from "./get-events.js";
import { logOut } from "./logout.js";
import { checkStatus, isAdmin } from "./verify-loggedin.js";
import { default as getUsers, filterUsers } from "./get-users.js";
import { default as eligibleColor } from "./checkAwardEligibility.js";
import { default as getUserProfileInfo } from "./get-profile-info.js";

checkStatus();
$(document).ready(toggleCollapsible);
$(document).ready(logOut);

$("#app-name").click(() => {
    window.location.href="/EventTracker/pages/main.html";
})

$("#bu-logo").click(() => {
    window.location.href='http://www.bu.edu/';
})

if (window.location.href.indexOf("/EventTracker/pages/progress") != -1 ) {
    $(document).ready(() => {
        eligibleColor();  
    })
}

if (window.location.href.indexOf("/EventTracker/pages/users-events") != -1) {
    $(document).ready(() => {
        getUserUpcomingEvents();
        getUserPastEvents();
    });
} 

if (window.location.href.indexOf("/EventTracker/pages/all-events") != -1) {
    $(document).ready(() => {
        getAllUpcomingEvents();
        getAllPastEvents();
    });
    } 

if (window.location.href.indexOf("/EventTracker/pages/rsvp") != -1) {
    $(document).ready(() => {
        selectUpcomingEvent();
    });
} 

if (window.location.href.indexOf("/EventTracker/pages/check-in") != -1) {
    $(document).ready(() => {
        toConfrimAttendance();
    });
} 

if (window.location.href.indexOf("/EventTracker/pages/account") != -1) {
    $(document).ready(() => {
        getUserProfileInfo();
    })
}

//admin restricted pages -->
if (window.location.href.indexOf("/EventTracker/pages/admin") != -1) {
    isAdmin();
}

if (window.location.href.indexOf("/EventTracker/pages/users-list") != -1) {
    isAdmin();
    $(document).ready(() => {
       getUsers();
       filterUsers();
    })
}

if (window.location.href.indexOf("/EventTracker/pages/create-event") != -1) {
    isAdmin();
}





