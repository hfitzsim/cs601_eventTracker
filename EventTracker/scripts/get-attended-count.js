export async function getAttendedCount() {
    await fetch("/EventTracker/php/get-attended.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => { 
            const html = data.attendedCount;       
            document.querySelector("#attended-count").insertAdjacentHTML("afterbegin", html);
        })
        .catch(error => {
            console.log(error);
        })
}