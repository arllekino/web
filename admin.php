<?php
function authBySession(): void
{  
    session_name('auth');
    session_start();
    $userId = $_SESSION['user_id'] ?? null;  
    if ($userId) {
        http_response_code(200);
    } else {
        header('Location:' . '/login', true, 303);
        exit();
    } 
}

authBySession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/style/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/style/admin.css">
    <title>Create post</title>
</head>

<body>
    <header class="head">
        <div class="panel">
            <img src="./static/image/logo-author.svg" alt="" class="panel__logo">
            <div class="panel__link">
                <a href="" class="link__user">Y</a>
                <button href="" class="link__exit"></button>
            </div>
        </div>
    </header>
    <main>
        <form action="/api.php" class="post-info">
            <div class="post-info__headline">
                <div class="titling">
                    <h1 class="titling__main-title">New Post</h1>
                    <span class="titling__subtitle">Fill out the form bellow and publish your article</span>
                </div>
                <button type="button" id="publish-button">Publish</button>
            </div>
            <div id="post-info__correctly">
                <p class="correctly__message correctly__message_correct">
                    <img src="./static/image/right.svg" alt="">
                    <span class="correctly__string">Publish Complete!</span>
                </p>
                <p class="correctly__message correctly__message_incorrect">
                    <img src="./static/image/wrong.svg" alt="">
                    <span class="correctly__string">Whoops! Some fields need your attention :o</span>
                </p>
            </div>
            <div class="post-info__main-info">
                <h2 class="main-info__title">Main Information</h2>
                <div class="main-info__layout">
                    <div class="main-info__input">
                        <div class="input__post">
                            <label for="input__title" class="input__label-string">Title</label>
                            <input type="text" name="title" id="input__title" class="input__string" placeholder="New post" />
                            <span class="post-info__empty-input" id="post-info__empty-title">Title is required.</span>
                        </div>
                        <div class="input__post">
                            <label for="input__description" class="input__label-string">Short description</label>
                            <input type="text" name="subtitle" id="input__description" class="input__string" placeholder="Please, enter any description" />
                            <span class="post-info__empty-input" id="post-info__empty-description">Description is required.</span>
                        </div>
                        <div class="input__post">
                            <label for="input__author-name" class="input__label-string">Author name</label>
                            <input type="text" name="author" id="input__author-name" class="input__string" placeholder="John Smith" />
                            <span class="post-info__empty-input" id="post-info__empty-author-name">Author name is required.</span>
                        </div>
                        <div class="input__post">
                            <span class="input__sign-string">Author photo</span>
                            <span id="input__upload-author-photo">
                                <label for="input__author-photo" class="input__author-photo__label">
                                    <img src="./static/image/author-upload.svg" alt="" class="input__author-output" />
                                    <span class="label__string-black">Upload</span>
                                </label>
                            </span>
                            <span class="input__loaded-author-photo">
                                <label for="input__author-photo" class="upload-author-photo__label">
                                    <img src="./static/image/camera.svg" alt="">
                                    <span class="label__string-black">Upload New</span>
                                </label>
                                <button type="button" id="remove__author-photo" class="remove">
                                    <img src="./static/image/junk.svg" alt="">
                                    <span class="remove__string">Remove</span>
                                </button>
                            </span>
                            <input type="file" name="author_photo" id="input__author-photo" accept=".png,.jpeg,.gif"/>
                            <span class="post-info__empty-input" id="post-info__empty-author-photo">Author photo is required.</span>
                        </div>
                        <div class="input__post">
                            <label for="input__publish-date" class="input__label-string">Publish date</label>
                            <input type="date" name="publish_date" id="input__publish-date" />
                            <span class="post-info__empty-input" id="post-info__empty-publish-date">Publish date is required.</span>
                        </div>
                        <div class="input__post">
                            <span class="input__sign-string">Hero image</span>
                            <div id="input__upload-post-image">
                                <label for="input__post-image" class="upload-post-image__label">
                                    <img src="./static/image/post-image-upload.svg" alt="" class="input__post-image-output" />
                                </label>
                                <span class="input__comment">Size up to 10mb. Format: png, jpeg, gif.</span>
                            </div>
                            <div class="input__loaded-post-image">
                                <label for="input__post-image" class="upload-post-image__label">
                                    <img src="./static/image/camera.svg" alt="">
                                    <span class="label__string-black">Upload New</span>
                                </label>
                                <button type="button" id="remove__post-image" class="remove">
                                    <img src="./static/image/junk.svg" alt="">
                                    <span class="remove__string">Remove</span>
                                </button>
                            </div>
                            <input type="file" name="post_image" id="input__post-image" accept=".png,.jpeg,.gif" />
                            <span class="post-info__empty-input" id="post-info__empty-post-image">Post image is required.</span>
                        </div>
                        <div class="input__post">
                            <span class="input__sign-string">Hero image</span>
                            <div id="input__card-image-upload">
                                <label for="input__card-image" class="upload-card-image__label">
                                    <img src="./static/image/card-image-upload.svg" alt="" class="input__card-image-output" />
                                </label>
                                <span class="input__comment">Size up to 5mb. Format: png, jpeg, gif.</span>
                            </div>
                            <div class="input__loaded-card-image">
                                <label for="input__card-image" class="upload-card-image__label">
                                    <img src="./static/image/camera.svg" alt="">
                                    <span class="label__string-black">Upload New</span>
                                </label>
                                <button type="button" id="remove__card-image" class="remove">
                                    <img src="./static/image/junk.svg" alt="">
                                    <span class="remove__string">Remove</span>
                                </button>
                            </div>
                            <input type="file" name="card_image" id="input__card-image" accept=".png,.jpeg,.gif" />
                            <span class="post-info__empty-input" id="post-info__empty-card-image">Card image is required.</span>
                        </div>
                    </div>
                    <div class="main-info__preview-area">
                        <div class="preview-area__article-preview">
                            <span class="article-preview__string">Article preview</span>
                            <div class="article-preview__frame">
                                <div class="article-preview__post">
                                    <ol class="article-preview__item">
                                        <li class="item__elipse"></li>
                                        <li class="item__elipse"></li>
                                        <li class="item__elipse"></li>
                                    </ol>
                                    <h3 id="article-preview__title">New post</h3>
                                    <p id="article-preview__description">Please, enter any description</p>
                                    <div id="article-preview__image"></div>
                                </div>
                            </div>
                        </div>
                        <div class="preview-area__post-preview">
                            <span class="post-preview__string">Post card preview</span>
                            <div class="post-preview__frame">
                                <div class="post-preview__card">
                                    <div id="post-preview__image"></div>
                                    <div class="post-preview__titling">
                                        <h3 id="post-preview__title">New post</h3>
                                        <p id="post-preview__description">Please, enter any description</p>
                                    </div>
                                    <div class="post-preview__author">
                                        <div id="post-preview__author-photo"></div>
                                        <span id="post-preview__author-name">John Smith</span>
                                        <span id="post-preview__publish-date">12/31/2000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="post-info__content">
                <h2 class="content__title">Content</h2>
                <label for="input__main-text" class="input__label-main-text">Post content (plain text)</label>
                <textarea name="content" id="input__main-text" placeholder="Type anything you want ..."></textarea>
                <span class="post-info__empty-input" id="post-info__empty-content">Content text is required.</span>
            </div>
        </form>
    </main>
    <script src="./script/admin.js"></script>
</body>

</html>