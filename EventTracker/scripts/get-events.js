export async function getAllEvents() {
    await fetch("/EventTracker/php/get-events.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(event => {
                return `<h5>${event.title}</h5>
                  <h6>Description: ${event.description}</h6>
                  <p>Event Contact: ${event.owner}</p>
                  <p>Location: ${event.location} </p>
                  <p>Date & Time: ${event.dt_start} - ${event.dt_end}</p>
                  <hr style="width:60%;text-align:left;margin-left:0">`
            }).join("");
            document.querySelector("#all-events").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}

export async function selectUpcomingEvent() {
    await fetch("/EventTracker/php/registerable-events.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(event => {
                return `<option value="${event.eventID}">${event.title}</option>`;
            }).join("");
            document.querySelector("#all-upcoming-events").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}


export async function getUserUpcomingEvents() {
    await fetch("/EventTracker/php/get-upcoming.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(event => {
                return `<h5>${event.title}</h5>
                  <h6>Description: ${event.description}</h6>
                  <p>Event Contact: ${event.owner}</p>
                  <p>Location: ${event.location} 
                  <p>Date & Time: ${event.dt_start} - ${event.dt_end}</p>
                  <hr style="width:60%;text-align:left;margin-left:0">`
            }).join("");
            document.querySelector("#future-events").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}

export async function getUserPastEvents() {
    await fetch("/EventTracker/php/get-past.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(event => {
                return `<h5>${event.title}</h5>
                  <h6>Description: ${event.description}</h6>
                  <p>Event Contact: ${event.owner}</p>
                  <p>Location: ${event.location} 
                  <p>Date & Time: ${event.dt_start} - ${event.dt_end}</p>
                  <hr style="width:60%;text-align:left;margin-left:0">`
            }).join("");
            document.querySelector("#past-events").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}

export async function toConfrimAttendance() {
    await fetch("/EventTracker/php/get-upcoming.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(event => {
                return `<option value="${event.eventID}">${event.title}</option>`
            }).join("");
            document.querySelector("#select-event").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}

export async function getAllUpcomingEvents() {
    await fetch("/EventTracker/php/all-upcoming.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(event => {
                return `<h5>${event.title}</h5>
                  <h6>Description: ${event.description}</h6>
                  <p>Event Contact: ${event.owner}</p>
                  <p>Location: ${event.location} 
                  <p>Date & Time: ${event.dt_start} - ${event.dt_end}</p>
                  <hr style="width:60%;text-align:left;margin-left:0">`
            }).join("");
            document.querySelector("#all-upcoming").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}

export async function getAllPastEvents() {
    await fetch("/EventTracker/php/all-past.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(event => {
                return `<h5>${event.title}</h5>
                  <h6>Description: ${event.description}</h6>
                  <p>Event Contact: ${event.owner}</p>
                  <p>Location: ${event.location} 
                  <p>Date & Time: ${event.dt_start} - ${event.dt_end}</p>
                  <hr style="width:60%;text-align:left;margin-left:0">`
            }).join("");
            document.querySelector("#all-past").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}