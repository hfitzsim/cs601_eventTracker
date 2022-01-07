export default async function getUserProfileInfo() {
    await fetch("/EventTracker/php/user-profile-info.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(user => {
                return `<img src="${user.photo}"/>
                        <h1>Name: ${user.fname} ${user.lname}</h1>
                        <h2>Email: ${user.email}</h2>
                        <h3>Phone Number: ${user.phone}</h3>
                        <h3>Affiliation: ${user.affiliation}</h3>
           `
            }).join("");
           $("#profile-information").append(html);
        })
        .catch(error => {
            console.log(error);
        })
}