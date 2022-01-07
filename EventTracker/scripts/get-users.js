export default async function getUsers() {
    await fetch("/EventTracker/php/get-users.php", { method: 'GET' })
        .then(res => {
            if (!res.ok) {
                throw Error("Error");
            }
            return res.json();
        })
        .then(data => {
            const html = data.map(user => {
                return `
                        <tr>
                            <td>${user.fname} ${user.lname}</td>
                            <td>E: ${user.email} | P: ${user.phone}</td>
                        </tr>
            `
            }).join("");
            $("#users-list").prepend(html);
        })
        .catch(error => {
            console.log(error);
        })
}

export async function filterUsers() {
        $("#search-bar").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#users-list tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      };
    



