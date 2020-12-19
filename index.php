<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cybersecurity board</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">

  <!--  Firebase SDK -->
  <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js" defer></script>
  <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-auth.js" defer></script>
  <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-database.js" defer></script>
  <script src="js/loginForm.js" defer></script>
  <script src="js/postsHandler.js" defer></script>
  <script src="js/pageLogic.js" defer></script>
</head>
<body>
  <!-- header -->
  <?php
  require 'header.html';
  ?>
  <!-- header END -->

  <div class="content">
    <main class="posts">

    </main>
    <div class="post-buttons">
      <button class="page-buttons prev-page-button"><</button>
      <button class="page-buttons next-page-button">></button>

    </div>
    <!-- /.posts -->
    <form action="#" class="add-post">
      <input autofocus type="text" name="post-title" class="add-title" placeholder="Заголовок поста" >
      <textarea name="post-text" id="text" class="add-text" placeholder="Текст вашего поста"></textarea>
      <input type="text" name="post-tags" class="add-tags" placeholder="Добавьте теги">
      <div class="add-buttons">
        <button type="submit" class="button add-button">
          <svg class="icon icon-fire">
            <use xlink:href="img/icons.svg#fire"></use>
          </svg>
          Опубликовать пост
        </button>
      </div>
    </form>
    <form action="#" class="edit-post">
      <input autofocus type="text" name="edit-post-title" class="edit-post-title" placeholder="Заголовок поста" >
      <textarea name="edit-post-text" id="edit-text" class="edit-text" placeholder="Текст вашего поста"></textarea>
      <input type="text" name="edit-post-tags" class="edit-tags" placeholder="Добавьте теги">
      <div class="edit-buttons">
        <button type="submit" class="button edit-post-button">
          <svg class="icon icon-fire">
            <use xlink:href="img/icons.svg#fire"></use>
          </svg>
          Опубликовать пост
        </button>
      </div>
    </form>
    <aside class="sidebar">

      <div class="login">
        <form class="login-form">
          <h2 class="login-title">Авторизация</h2>

          <input type="email" class="login-input login-email"
          name="email"
          minlength="3"
          required
          placeholder="Введите email">

          <input type="password" class="login-input login-password"
          name="password"
          minlength="3"
          required
          placeholder="Введите пароль">

          <a href="#" class="login-forget">Забыли пароль?</a>

          <button class="login-signIn" type="submit">Войти</button>

          <a href="#" class="login-signUp">Зарегистрироваться</a>

        </form>
      </div>


      <div class="user">
        <div class="user-container">
          <a href="#" class="user-info">
            <img width="40" height="40" src="img/avatar.jpg" alt="photo: user" class="user-avatar">
            <span class="user-name">vblimov</span>
          </a>
          <!-- /.user-info -->
          <a href="#" class="edit">
            <svg width="17" height="19" class="icon icon-edit">
              <use xlink:href="img/icons.svg#edit"></use>
            </svg>
          </a>

          <a href="#" class="exit">
            <svg class="icon icon-exit">
              <use xlink:href="img/icons.svg#exit"></use>
            </svg>
          </a>
        </div>
        <form class="edit-container">
          <h2 class="edit-title">Редактировать</h2>

          <label class="edit-label">Ваш логин
            <input type="text"
                   class="edit-input edit-username"
                   name="username"
                   minlength="3"
                   placeholder="логин"
                   required>
          </label>

          <label class="edit-label">Ваше фото
            <input type="text"
                   class="edit-input edit-photo"
                   name="photo"
                   placeholder="URL-photo">
          </label>
          <label class="edit-label">Кол-во постов на странице
            <input type="text"
                   class="edit-input edit-postsCount"
                   name="postsOnPage"
                   placeholder="Постов на странице">
          </label>
          <button class="edit-button">Сохранить</button>

        </form>
        <!-- /.exit -->
      </div>
      <!-- /.user -->
      <nav class="sidebar-nav">
        <ul class="sidebar-menu">
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link">Ответы</a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link active">Комментарии</a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link">Оценки</a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link">Сохраненное </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link">Подписки</a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link">Заметки</a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link">Игнор-лист</a>
          </li>
        </ul>
      </nav>
      <a href="new-post.html" class="button button-new-post">
        <svg class="icon icon-fire">
          <use xlink:href="img/icons.svg#fire"></use>
        </svg>
        Опубликовать пост
      </a>
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Комментарий дня</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="#" class="card-body-title">Как обмануть банкомат, если вы хотите снять больше наличных</a>
          <p class="card-text">Таким образом укрепление и развитие структуры требуют от нас анализа форм развития. Не следует, однако забывать, что реализация намеченных плановых заданий требуют от нас анализа позиций, занимаемых участниками в отношении поставленных
          задач. Задача организации, в особенности же консультация...</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <a href="#" class="ad"></a>
    </aside>
    <!-- /.sidebar -->
  </div>
  <!-- /.content -->

</body>
</html>

