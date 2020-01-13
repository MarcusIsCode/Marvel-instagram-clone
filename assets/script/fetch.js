
const elFactory = (type, attributes, ...children) => {
    const el = document.createElement(type)
    
    for (key in attributes) {
        el.setAttribute(key, attributes[key])
    }

    children.forEach(child => {
        if (typeof child === 'string') {
            el.appendChild(document.createTextNode(child))
        } else {
            el.appendChild(child)
        }
    })
    
    return el
}
 
  
const commentBox =(name, comment)=>{
    return Box = elFactory('div', { class: "border-bottom w-100 m-0 p-p-0" },
        elFactory('p', {class:'m-0'}, `${name}`),
        elFactory('p', { class: 'm-0 ml-2 p-0 pb-2' }, `${comment}`)
    )
}
            


const write=(myJson)=>{
   

    for (let i = 0; i < myJson.length ; i++) {
        // console.log(myJson[i].comments.name.length+"___i"+i)
        if (typeof myJson[i].comments === 'undefined'){
            i++;
        }
        console.log(i+'i')
        for (let x = 0; x < myJson[i].comments.name.length; x++) {
            
            console.log(x+"x")
            document.querySelectorAll('.comments')[i].appendChild(commentBox(myJson[i].comments.name[x], myJson[i].comments.comment[x]))
        }
    
    
    }
   
}

const creatPost = (name, post_img, text, user_id, post_id, date, likes) => {
    const post = elFactory('div', { class: 'post mx-auto w-75 flex-column bg-dark m-0 mb-4 pb-2 container  text-white rounded shadow-lg', },
    
        elFactory('div', { class: ' text-center align-items-center ' },
            elFactory('h3', { class: 'text-center mb-0 mt-1' }, `${name}`),
            elFactory('p', { class: 'bd-highlight ml-auto small text-muted  m-0 ' }, `${date}`),
                //edit,delete
            elFactory('form', { class: 'd-flex bd-highlight m-0', action: '/', method: 'post' },
                elFactory('button', { class: ' bd-highlight bg-dark btn btn-link m-0 p-0 text-white', type: 'submit', name: 'delete' }, 'Delete'),
                elFactory('button', { class: ' bd-highlight bg-dark btn btn-link m-0 p-0 ml-2 px-2 text-white', type: 'submit', name: 'edit' }, 'Edit'),
            ),
            elFactory('img', { class: 'mx-auto d-block w-100 pt-1', src: `${post_img}` }, 'Hello World!'),
        ),
        elFactory('div', { class: 'd-flex break-text text-left border-bottom' },
            elFactory('p', { class: 'w-100 p-2' }, text),
        ),

        elFactory('div', { class: 'd-flex break-text text-left mb-1 ml-2' },
            elFactory('form', { class: 'd-flex py-2', action: "app/Posts/likeCommentDB.php", method: 'post' },
                elFactory('input', { type: 'hidden', name: 'postId', value: `${post_id}` }),
                elFactory('textarea', { class: 'rounded w-100 p-0', rows: '2', type: 'text', name: 'comment', placeholder: 'write a comment' }),

                elFactory('button', { class: 'btn w-50', type: 'submit', name: 'commentSub' },
                    elFactory('img', { class: 'img-fluid', src: 'assets/Images/icons/send.svg' })
                ),

            ),
            elFactory('form', { class: 'border-left w-25 h-100 p-2 px-3', action: "app/Posts/likeCommentDB.php", method: 'post' },
                elFactory('input', { type: 'hidden', name: 'userId', value: `${user_id}` }),
                elFactory('input', { type: 'hidden', name: 'postId', value: `${post_id}` }),
                elFactory('button', { class: 'btn btn-dark w-100 p-0', type: 'submit', name: 'like' },
                    elFactory('img', { class: ' w-100 bg-dark', src: 'assets/Images/icons/thumb-up.svg' })),
                elFactory('label', { class: ' small ' }, `${likes}`),
            ),

        ),
        elFactory('div', { class: 'comments flex-column break-text text-left border-top' },
        )
    )

    document.querySelector('main').appendChild(post)
}



fetch('app/Get/getData.json')

.then((response) => {
    return response.json();
})
.then((myJson) => {
    console.log(myJson)
    for (let i = 0; i < myJson.length; i++) {
        
        creatPost(myJson[i].profile_name, myJson[i].post_img,myJson[i].text, myJson[i].user_id, myJson[i].post_id,  myJson[i].date, myJson[i].like);
        
    }
    write(myJson);

  
    });
