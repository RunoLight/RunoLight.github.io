<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New post</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
    <div class="header-wrapper">
        <a href="/" class="header-logo">
            <img class="header-logo-image" src="../img/logo.svg" alt="logo" width="256px" height="64px">
        </a>
        <nav class="header-nav">
            <ul class="header-menu">
                <li class="header-menu-item"><a href="#" class="header-menu-link">Some robots</a></li>
                <li class="header-menu-item"><a href="#" class="header-menu-link">More robots</a></li>
                <li class="header-menu-item"><a href="#" class="header-menu-link">Hot robots</a></li>
                <li class="header-menu-item"><a href="#" class="header-menu-link">Small robots</a></li>
            </ul>
        </nav>
        <div class="input-group search">
            <input type="search" class="search-input" placeholder="Поиск">
            <button class="search-button">
                <img src="../img/search.svg" alt="icon: search" class="search-icon">
            </button>
        </div>
    </div>
</header>
  <div class="content">
    <main class="posts">
    <form action="#" class="add-post">
      <input type="text" name="post-title" class="add-title" placeholder="Заголовок поста">
      <textarea name="post-text" id="text" class="add-text" placeholder="Текст вашего поста"></textarea>
      <div class="add-buttons">
        <button type="submit" class="button add-button">
          <svg class="icon icon-fire">
            <use xlink:href="img/icons.svg#photo"></use>
          </svg>
          Опубликовать
        </button>
        <button class="button button-outline">
          <svg class="icon icon-video">
            <use xlink:href="img/icons.svg#video"></use>
          </svg>
          Видео
        </button>
        <button class="button button-outline">
          <svg class="icon icon-photo">
            <use xlink:href="img/icons.svg#photo"></use>
          </svg>
          Фото
        </button>
      </div>
    </form>
    </main>
    <!-- /.posts -->
    <aside class="sidebar">
          <div class="login">
              <form class="login-form">
                  <h2 class="login-title">Авторизация</h2>
                  <input type="email" class="login-input login-email"
                         name="email" minlength="3" required placeholder="email">
                  <input type="password" class="login-input login-password"
                         name="password" minlength="3" required placeholder="пароль">
                  <a href="#" class="login-forget">Забыл пароль</a>
                  <button class="login-signIn" type="submit">Войти</button>
                  <a href="#" class="login-signUp">Зарегистрироваться</a>
              </form>
          </div>
          <div class="card">
              <div class="card-body">
                  <a href="#" class="card-body-title">А вы знали?</a>
                  <p class="card-text">Для регистрации необходимо заполнить логин и пароль и нажать "регистрация"</p>
              </div>
          </div>
          <div class="user">
              <div class="user-container">
                  <a href="#" class="user-info">
                      <img width="40" height="40" src="img/avatar.jpg" alt="photo: user" class="user-avatar">
                      <span class="user-name">Войдите в аккаунт!</span>
                  </a>
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

                  <label class="edit-label">
                      <div>Логин</div>

                      <input type="text"
                             class="edit-input edit-username"
                             name="username"
                             minlength="3"
                             placeholder="логин"
                             required>
                  </label>

                  <label class="edit-label">Ссылка на фото
                      <input type="text"
                             class="edit-input edit-photo"
                             name="photo"
                             placeholder="URL-photo">
                  </label>
                  <label class="edit-label">Постов на странице
                      <input type="text"
                             class="edit-input edit-postsCount"
                             name="postsOnPage"
                             placeholder="Постов на странице">
                  </label>
                  <button class="edit-button">Сохранить</button>
              </form>
          </div>
          <a href="html.php" class="button button-new-post">
              Новый пост
          </a>
      </aside>
    <!-- /.sidebar -->
  </div>
  <!-- /.content -->
  <script src="js/user.js"></script>
</body>
</html>