const searchInput = document.querySelector("#search");
const searchForm = document.querySelector(".searchForm");
const foundUsers = document.querySelector(".foundUsers");

const appendUsers = function(user) {
  let name = user.profile_name;
  let avatar = user.profile_image;

  const div = document.createElement("div");

  template = `
        <div class="user w-100 h-20 p-3 rounded bg-dark shadow-lg mb-3">
            <a href="/?profile=${name}" class="d-flex">
                <img class="rounded" src="${avatar}" alt="${name}'s profile picture">
                <div class="userName text-white d-flex align-items-center ml-3">
                    <p>${name}</p>
                </div>
            </a>
        </div>
    `;

  div.innerHTML = template;

  div.classList.add("row", "m-0", "w-100");

  foundUsers.appendChild(div);
};

if (typeof searchInput != "undefined" && searchInput != null) {
  searchInput.addEventListener("keyup", e => {
    if (e.keyCode !== 13) {
      foundUsers.innerHTML = "";

      if (e.target.value.length >= 3) {
        const formData = new FormData(searchForm);

        fetch("app/users/search.php", {
          method: "POST",
          body: formData
        })
          .then(response => response.json())
          .then(users => {
            foundUsers.innerHTML = "";

            if (users !== "No users") {
              users.forEach(user => {
                appendUsers(user);
              });
            }
          });
      }
    }
  });
}

const searchButton = document.querySelector(".searchForm button");

if (typeof searchButton != "undefined" && searchButton != null) {
  searchButton.addEventListener("click", event => {
    event.preventDefault();

    const formData = new FormData(searchForm);

    fetch("app/users/search.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.json())
      .then(users => {
        foundUsers.innerHTML = "";

        if (users !== "No users") {
          users.forEach(user => {
            appendUsers(user);
          });
        } else {
          const div = document.createElement("div");

          template = `
            <p>No users found</p>
          `;

          div.innerHTML = template;

          div.classList.add("noUsers");

          foundUsers.appendChild(div);
        }
      });
  });
}
