const img = document.querySelector('.tacos');
console.log(img);

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
            { class: 'bg-dark m-2 text-white rounded shadow-lg', name: 'hello' },
            elFactory('h5',{class:'text-center mb-0 mt-1'},'Tony stark'),
            elFactory('img', { class: 'mx-auto d-block w-100 p-2', src:`${myJson[0].post_img}`}, 'Hello World!'),
            elFactory('div', { class: 'border-bottom d-flex bd-highligh' },
                elFactory('p', { class:'w-75 p-2' }, myJson[0].text),
                elFactory('form', { class: 'border-left w-25 m-2', action: "/", method: 'post' },
                    elFactory('label',{class:'w-25 pl-2 pt-3',for:'likes'}, `${'likes'}`),
                    elFactory('button', { class: 'btn float-right w-50 m-0 p-0',id:'likes', type: 'submit', name: 'like' },
                        elFactory('img', { class: 'w-100 ', src: 'assets/Images/icons/thumb-up.svg' }),
            ))),
            elFactory('div', { class:""},     
                elFactory('div', { class:'comments text-justify text-left mb-1 ml-2' }, `${'jjaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'}`,),
                
                elFactory('form', { class:'d-flex p-2', action: "/", method: 'post' },
                        elFactory('textarea', {class:'rounded w-100', rows:'2', type:'text', name: 'comment' ,placeholder:'write a comment' },),
                        elFactory('button', { class:'btn w-25', type: 'submit' }, 
                            elFactory('img', { class: 'img-fluid', src: 'assets/Images/icons/send.svg'})
                        )
                    )
                  )
    )        
            
            document.body.appendChild(post);
            document.body.appendChild(post.cloneNode(true));
        });