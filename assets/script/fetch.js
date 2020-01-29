//function for creating doom elements
const elFactory = (type, attributes, ...children) => {
  const el = document.createElement(type);

  for (key in attributes) {
    el.setAttribute(key, attributes[key]);
  }

  children.forEach(child => {
    if (typeof child === "string") {
      el.appendChild(document.createTextNode(child));
    } else {
      el.appendChild(child);
    }
  });

  return el;
};

//comment box
const commentBox = (name, comment, postId) => {
  return (Box = elFactory(
    "div",
    {
      class:
        "mt-2 p-1 comments border border-secondary rounded w-100 m-0 p-0 pb-2"
    },
    elFactory(
      "p",
      { class: "m-0" },
      elFactory("span", { class: "text-primary" }, `${name}:`),
      ` ${comment}`
    ),
    elFactory(
      "form",
      {
        class: "bd-highlight m-0",
        action: "app/Posts/delComment.php",
        method: "post"
      },
      elFactory("input", {
        type: "hidden",
        name: "postId",
        value: `${postId}`
      }),
      elFactory("input", {
        type: "hidden",
        name: "comment",
        value: `${comment}`
      }),
      elFactory(
        "button",
        {
          class:
            " bd-highlight mb-2 float-right bg-dark btn btn-link m-0 p-0 ml-2 px-2 text-white",
          type: "submit",
          name: "deleteComment"
        },
        "Delete"
      )
    )
  ));
};

//writes out the comments
const write = myJson => {
  for (let i = 0; i < myJson.length; i++) {
    if (typeof myJson[i].comments === "undefined") {
      i++;
    } else {
      for (let x = 0; x < myJson[i].comments.name.length; x++) {
        document
          .querySelectorAll(".commentsBox")
          [i].appendChild(
            commentBox(
              myJson[i].comments.name[x],
              myJson[i].comments.comment[x],
              myJson[i].post_id
            )
          );
      }
      i++;
    }
  }
};

const creatPost = (name, post_img, text, user_id, post_id, date, likes) => {
  const post = elFactory(
    "div",
    {
      class:
        "posts mx-auto flex-column bg-dark m-0 mt-2 mb-4 pb-2 container  text-white rounded shadow-lg"
    },
    //name date
    elFactory(
      "div",
      { class: "flex text-center align-items-center " },
      elFactory("h3", { class: "text-primary mb-0 mt-1" }, `${name}`),
      elFactory("p", { class: "bd-highlight ml-auto small m-0" }, `${date}`),
      //edit,delete
      elFactory(
        "div",
        { class: "edit d-flex text-center align-items-center " },
        elFactory(
          "form",
          {
            class: " bd-highlight m-0",
            action: "app/Posts/deletePost.php",
            method: "post"
          },
          elFactory("input", {
            type: "hidden",
            name: "postId",
            value: `${post_id}`
          }),
          elFactory(
            "button",
            {
              class: " bd-highlight bg-dark btn btn-link m-0 p-0 text-white",
              type: "submit",
              name: "delete"
            },
            "Delete"
          )
        ),
        elFactory(
          "form",
          { class: "bd-highlight m-0", action: "/", method: "post" },
          elFactory("input", {
            type: "hidden",
            name: "postId",
            value: `${post_id}`
          }),
          elFactory(
            "button",
            {
              class:
                " bd-highlight bg-dark btn btn-link m-0 p-0 ml-2 px-2 text-white",
              type: "submit",
              name: "edit"
            },
            "Edit"
          )
        )
      ),
      //post-img
      elFactory(
        "img",
        { class: "mx-auto d-block w-100 pt-1", src: `${post_img}` },
        "Hello World!"
      )
    ),
    //text
    elFactory(
      "div",
      { class: "postText d-flex break-text text-left border-bottom" },
      elFactory("p", { class: "w-100 p-2" }, text)
    ),
    //write a comment
    elFactory(
      "div",
      { class: "writeComment  d-flex break-text text-left mb-1 ml-2" },
      elFactory(
        "form",
        {
          class: "d-flex w-75 py-2",
          action: "app/Posts/likeCommentDB.php",
          method: "post"
        },
        elFactory("input", {
          type: "hidden",
          name: "postId",
          value: `${post_id}`,
          required: ""
        }),
        elFactory("textarea", {
          class: "rounded w-100 p-0",
          rows: "2",
          type: "text",
          name: "comment",
          placeholder: "write a comment"
        }),
        elFactory(
          "button",
          { class: "btn", type: "submit", name: "commentSub" },
          elFactory("img", {
            class: "img-fluid",
            src: "assets/Images/icons/send.svg"
          })
        )
      ),
      //like
      elFactory(
        "form",
        {
          class: "likePost d-flex border-left w-25 p-2 my-2 mt-1",
          action: "app/Posts/likeCommentDB.php",
          method: "post"
        },
        elFactory("input", {
          type: "hidden",
          name: "userId",
          value: `${user_id}`
        }),
        elFactory("input", {
          type: "hidden",
          name: "postId",
          value: `${post_id}`
        }),
        elFactory("label", { class: "theLikes" }, `${likes}`),
        elFactory(
          "button",
          { class: "btn btn-dark p-0", type: "submit", name: "like" },
          elFactory("img", {
            class: "bg-dark",
            src: "assets/Images/icons/thumb-up.svg"
          })
        )
      )
    ),
    elFactory("div", {
      class: "commentsBox flex-column break-text text-left border-top"
    })
  );

  return document.querySelector(".feed").appendChild(post);
};

fetch("app/Get/getData.json")
  .then(response => {
    return response.json();
  })
  .then(myJson => {
    const feed = document.querySelector(".feed");

    if (feed !== null) {
      if (myJson != null) {
        for (let i = 0; i < myJson.length; i++) {
          creatPost(
            myJson[i].profile_name,
            myJson[i].post_img,
            myJson[i].text,
            myJson[i].user_id,
            myJson[i].post_id,
            myJson[i].date,
            myJson[i].like
          );

          if (myJson[i].comments) {
            write(myJson);
          }
        }
      } else {
        const noPosts = document.createElement("div");

        const noPostsTemplate = `<p class="m-0">You have no posts, and you are not following anyone.</p>
      <p class="m-0">Search for new users to follow!</p>`;

        noPosts.innerHTML = noPostsTemplate;

        noPosts.classList.add(
          "bg-dark",
          "mt-5",
          "pt-2",
          "pb-2",
          "text-white",
          "rounded",
          "shadow-lg",
          "w-75",
          "d-flex",
          "flex-column",
          "justify-content-center",
          "align-items-center"
        );

        feed.appendChild(noPosts);
      }
    }
  });
