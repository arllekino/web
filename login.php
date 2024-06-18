<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/static/style/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/static/style/login.css">
    <script src="./script/login.js"></script>
</head>

<body>
    <main class="main">
        <div class="main__title">
            <img src="/static/image/logo-author.svg" alt="Author" class="title__logo">
            <span class="title__description">Log in to start creating</span>
        </div>
        <div class="main__form">
            <span class="form__title">Log In</span>
            <div class="form__incorrect">
                <img src="/static/image/wrong.svg" alt="Wrong" class="incorrect__image">
                <span class="incorrect__message"></span>
            </div>
            <div class="form__email">
                <label for="email__input" class="form__label">Email</label>
                <input type="email" name="email__input" id="email__input" class="form__input">
                <span class="form__valid-email"></span>
            </div>
            <div class="form__password">
                <label for="password__input" class="form__label">Password</label>
                <input type="password" name="email__input" id="password__input" class="form__input" minlength="8" required />
                <span class="form__valid-password"></span>
            </div>
            <button type="button" id="button_log-in" class="form__button">Log In</button>
        </div>
    </main>
</body>

</html> 