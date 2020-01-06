
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

    

fetch('app/Get/getData.json')

    .then((response) => {
        return response.json();
    })
    .then((myJson) => {
        console.log(myJson);
        const post = elFactory(
            'div',
            { class: 'bg-dark m-2 container  text-white rounded shadow-lg', name: 'hello' },
            elFactory('h5',{class:'text-center mb-0 mt-1'},'Tony stark'),
            elFactory('img', { class: 'mx-auto d-block w-100 p-2', src:`${myJson[0].post_img}`}, 'Hello World!'),//forloop
            elFactory('div', { class: 'border-bottom d-flex bd-highligh' },
                elFactory('p', { class:'w-75 p-2' }, myJson[0].text),//forlopp
                elFactory('form', { class: 'border-left w-25 m-2', action: "app/Posts/likeCommentDB.php", method: 'post' },
                    elFactory('input', { type: 'hidden', name: 'userId', value: `${myJson[0].user_id}` }),//forLoop
                    elFactory('input', { type: 'hidden', name: 'postId', value: `${myJson[0].post_id}` }),//forLoop
                    elFactory('label',{class:'w-25 pl-2 pt-3'}, `${'likes'}`),//here
                    elFactory('button', { class: 'btn float-right w-50 m-0 p-0', type: 'submit', name: 'like' },
                        elFactory('img', { class: 'w-100 ', src: 'assets/Images/icons/thumb-up.svg' }),
            ))),
            elFactory('div', { class:""},     
                elFactory('div', { class:'break-text text-left mb-1 ml-2' }, `${'comments'}`,),//here,
                
                elFactory('form', { class: 'd-flex p-2', action: "app/Posts/likeCommentDB.php", method: 'post' },
                    elFactory('input', { type: 'hidden', name: 'postId', value: `${myJson[0].post_id}` }),//forLoop
                    elFactory('textarea', {class: 'rounded w-100', rows: '2', type: 'text', name: 'comment',placeholder:'write a comment' },),
                       
                        elFactory('button', { class:'btn w-25', type: 'submit', name:'commentSub' }, 
                            elFactory('img', { class: 'img-fluid', src: 'assets/Images/icons/send.svg'})
                        ),
                       
                    )
                  )
    )        
            
        });