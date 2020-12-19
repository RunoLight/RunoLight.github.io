const postsWrapper = document.querySelector('.posts');
const newPostButton = document.querySelector('.button-new-post');
const addPostForm = document.querySelector('.add-post');
const editPostForm = document.querySelector('.edit-post');
const nextPageButton = document.querySelector('.next-page-button');
const prevPageButton = document.querySelector('.prev-page-button');
const pagitation = document.querySelector('.post-pagitation');

const adminEmail = 'vasia-cotic@yandex.ru'

let editablePostID;
let showedPosts = 0;
let postsCount = 10;

const showPost = (userID, isPrev) => {
    let postInner = '';
    let posts = [];
    let cnt = 0;
    database.ref('post').orderByChild('id').once('value', snapshot => {
        (snapshot || []).forEach(item=>{
                posts.push(`
              <section class="post">
                <div class="post-body">
                  <h2 class="post-title">${item.val().title}</h2>
                  <p class="post-text" >${item.val().text}</p>
                  <div class="tags">
                    ${(item.val().tags || []).map(tag=>`<a href="#" class="tag">#${tag}</a>`)}
                  </div>
                </div>
                <div class="post-footer">
                  <div class="post-buttons">
                    <button class="post-button post-button-likes">
                <svg width="19" height="20" class="icon icon-like">
                  <use xlink:href="img/icons.svg#like"></use>
                </svg>
                <span class="post-button likes-counter">${item.val().like}</span>
            </button>
                    ${setUsers.user? item.val().author.email === (setUsers.user.email || null) || setUsers.user.email === adminEmail?
                    `<button class="post-button post-button-delete" value="${item.val().id}" onclick="deletePost(value)">
                  <svg width="17" height="19" class="icon icon-delete">
                    <use xlink:href="img/icons.svg#delete"></use>
                  </svg>
                </button>`: `` :``}
                    ${setUsers.user? item.val().author.email === (setUsers.user.email || null) || setUsers.user.email === adminEmail?
                    `<button class="post-button post-button-edit" value="${item.val().id}" onclick="editPost(value)">
                  <svg width="17" height="19" class="icon icon-edit">
                    <use xlink:href="img/icons.svg#edit"></use>
                  </svg>
                </button>`: `` :``}
                  </div>
                  <div class="post-author">
                    <div class="author-about">
                      <a href="#" class="author-username">${item.val().author.displayName}</a>
                      <span class="post-time">${item.val().date}</span>
                    </div>
                  <a href="#" class="author-link"><img src=${item.val().author.photo || "img/avatar.jpg"} alt="avatar" class="author-avatar"></a>
                </div>
                </div>
              </section>
`);
    })}).then(()=> {
        if(userID) { // logged in
            database.ref('users/'+userID).once('value', snapshot => {
                if (snapshot.val().postsOnPage == null) {postsCount = 5;}
                else {postsCount = snapshot.val().postsOnPage;}
                if(parseInt(isPrev) === 0 || parseInt(isPrev) === 1){
                    if(parseInt(isPrev) === 1 && showedPosts < posts.length-parseInt(postsCount)) {
                        showedPosts = parseInt(showedPosts)+parseInt(postsCount);
                    } else if (parseInt(isPrev) === 0 && showedPosts !== 0) {
                        showedPosts = parseInt(showedPosts)-parseInt(postsCount);
                    } else {return;}
                }
                cnt = 0;
                posts.reverse().forEach(post => {
                    if(cnt >= showedPosts && cnt < parseInt(showedPosts)+parseInt(postsCount)){
                        postInner+=post;
                    }
                    cnt++;
                })
                postsWrapper.innerHTML = postInner;
                postInner = '';
                addPostForm.classList.remove('visible');
                editPostForm.classList.remove('visible');
                postsWrapper.classList.add('visible');
            })
        } else { // not logged in
            posts.reverse().forEach(post => {
                    postInner+=post;
            })
            postsWrapper.innerHTML = postInner;
            postInner = '';
            addPostForm.classList.remove('visible');
            editPostForm.classList.remove('visible');
            postsWrapper.classList.add('visible');
        }

    })
    pagitation.classList.remove('hidden-pagitation');
}
const showAddPosts = () => {
    addPostForm.classList.add('visible');
    postsWrapper.classList.remove('visible');
    editPostForm.classList.remove('visible');
    pagitation.classList.add('hidden-pagitation');
    editPostForm.reset();
}
const showEditPosts = (title, text, tags, postID) => {
    editPostForm.classList.add('visible');
    editPostForm.elements.namedItem('edit-post-title').value = title;
    editPostForm.elements.namedItem('edit-post-text').value = text;
    editPostForm.elements.namedItem('edit-post-tags').value = tags;
    editablePostID = postID;
    postsWrapper.classList.remove('visible');
    pagitation.classList.add('hidden-pagitation');
}


const deletePost = (postID) => {
    database.ref('post')
        .once('value', snap => {
            snap.forEach(item => {
                if(item.val().id === postID){
                    database.ref('post').child(item.key).remove()
                        .then(()=>{
                            showPost(auth.currentUser.uid)
                            return true;
                        })
                }
            })
        })
}

const editPost = (postID) => {
    database.ref('post')
        .once('value', snap => {
            snap.forEach(item => {
                if(item.val().id === postID){
                    showEditPosts(item.val().title, item.val().text, item.val().tags, postID)
                }
            })
        })
}

// При загрузке страницы
document.addEventListener('DOMContentLoaded', ()=> {
    postHandlerInit();
})

const postHandlerInit = () => {
    showPost();
    nextPageButton.addEventListener('click', event => {
        event.preventDefault();
        showPost(auth.currentUser.uid, 1)
    })
    prevPageButton.addEventListener('click', event => {
        event.preventDefault();
        showPost(auth.currentUser.uid, parseInt(0))
    })
    newPostButton.addEventListener('click', event => {
        event.preventDefault();
        showAddPosts();
    })
    addPostForm.addEventListener('submit', event => {
        event.preventDefault();
        const formElements = addPostForm.elements;
        if(formElements.namedItem('post-title').value.length < 0){
            alert('Пустой заголовок');
            return;
        }
        if(formElements.namedItem('post-text').value.length < 0){
            alert('Пустой текст');
            return;
        }
        const postID = 'postID'+(+new Date()).toString(16)
        database.ref('post/'+postID).set({
            id: postID,
            title: formElements.namedItem('post-title').value,
            text: formElements.namedItem('post-text').value,
            tags: formElements.namedItem('post-tags').value.split(',').map(item=>item.trim()),
            author: {
                displayName: setUsers.user.displayName,
                photo: setUsers.user.photoURL,
                email: setUsers.user.email
            },
            date: new Date().toLocaleString(),
            like: 0,
            comments: 0,
        })
        showPost(auth.currentUser.uid);
        addPostForm.reset();
    })
    editPostForm.addEventListener('submit', event => {
        event.preventDefault();
        const formElements = editPostForm.elements;
        if(formElements.namedItem('edit-post-title').value.length < 0){
            alert('Слишком короткий заголовок');
            return;
        }
        if(formElements.namedItem('edit-post-text').value.length < 0){
            alert('Слишком короткий пост');
            return;
        }
        database.ref('post/'+editablePostID).update({
            id: editablePostID,
            title: formElements.namedItem('edit-post-title').value,
            text: formElements.namedItem('edit-post-text').value,
            tags: formElements.namedItem('edit-post-tags').value.split(',').map(item=>item.trim()),
            author: {
                displayName: setUsers.user.displayName,
                photo: setUsers.user.photoURL,
                email: setUsers.user.email
            },
            date: new Date().toLocaleString(),
            like: 0,
            comments: 0,
        })
        showPost(auth.currentUser.uid);
        editPostForm.reset();
    })
}