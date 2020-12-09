var firebaseConfig = {
    apiKey: "AIzaSyDWjW6s4ZoHeJ1sAa7Wgm06ZdF8B0Xvkpk",
    authDomain: "web-coding-project-5-semester.firebaseapp.com",
    databaseURL: "https://web-coding-project-5-semester-default-rtdb.firebaseio.com",
    projectId: "web-coding-project-5-semester",
    storageBucket: "web-coding-project-5-semester.appspot.com",
    messagingSenderId: "344742212560",
    appId: "1:344742212560:web:aca343d67fdcb91516ffd5",
    measurementId: "G-CKRGKF5J0Y"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const database = firebase.database();
const auth = firebase.auth();

// Создаем переменную, в которую положим кнопку меню
let menuToggle = document.querySelector('#menu-toggle');
// Создаем переменную, в которую положим меню
let menu = document.querySelector('.sidebar');
// отслеживаем клик по кнопке меню и запускаем функцию
menuToggle.addEventListener('click', function (event) {
    // отменяем стандартное поведение ссылки
    event.preventDefault();
    // вешаем класс на меню, когда кликнули по кнопке меню
    menu.classList.toggle('visible');
})

const  DEFAULT_PHOTO = userAvatarElem.src;

const toggleAuthDom = () => {
    
    const user = setUsers.user;
    if(user) {
        loginElem.style.display = 'none';
        userElem.style.display = '';
        userNameElem.textContent = user.displayName;
        userAvatarElem.src = user.photoURL || DEFAULT_PHOTO;
        
        
        newPostButton.classList.add('visible');
    } else {
        loginElem.style.display = '';
        userElem.style.display = 'none';
        
        
        newPostButton.classList.remove('visible');
        addPostForm.classList.remove('visible');
        postsWrapper.classList.add('visible');
    }
    

}