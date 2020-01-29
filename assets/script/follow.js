const followForm = document.querySelector(".followForm");

if (typeof followForm != "undefined" && followForm != null) {
  followForm.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(followForm);

    fetch("app/users/follow.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.json())
      .then(followers => {
        const followButton = document.querySelector(".followBtn");

        const followersNumber = document.querySelector(".followersNumber");

        if (followers > Number(followersNumber.textContent)) {
          followButton.textContent = "Unfollow";
          followersNumber.textContent = followers;
        } else if (followers < Number(followersNumber.textContent)) {
          followButton.textContent = "Follow";
          followersNumber.textContent = followers;
        }
      });
  });
}
