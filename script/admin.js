
//input
const title = document.getElementById("input__title");
const description = document.getElementById("input__description");
const authorName = document.getElementById("input__author-name");
const publishDate = document.getElementById("input__publish-date");
const authorPhoto = document.getElementById("input__author-photo");
const postImage = document.getElementById("input__post-image");
const cardImage = document.getElementById("input__card-image");
const mainText = document.getElementById("input__main-text");

//input preview
const prevInputPostImage = document.getElementById("input__upload-post-image");
const prevInputCardImage = document.getElementById("input__card-image-upload");
const prevInputAuthorPhoto = document.getElementById("input__upload-author-photo");

//preview post
const prevPostTitle = document.getElementById("article-preview__title");
const prevPostDescription = document.getElementById("article-preview__description");
const prevPostImage = document.getElementById("article-preview__image");

//preview card
const prevCardTitle = document.getElementById("post-preview__title");
const prevCardDescription = document.getElementById("post-preview__description");
const prevCardImage = document.getElementById("post-preview__image");
const prevCardAuthorPhoto = document.getElementById("post-preview__author-photo");
const prevCardAuthorName = document.getElementById("post-preview__author-name");
const prevCardPublishDate = document.getElementById("post-preview__publish-date");

//preview defaultText
const defaultTitle = title.getAttribute("placeholder");
const defaultDescription = description.getAttribute("placeholder");
const defaultAuthorName = authorName.getAttribute("placeholder");

//button
const publishButton = document.getElementById("publish-button");
const removePostImage = document.getElementById("remove__post-image");
const removeCardImage = document.getElementById("remove__card-image");
const removeAuthorPhoto = document.getElementById("remove__author-photo");

//layout
const correct = document.querySelector(".correctly__message_correct");
const incorrect = document.querySelector(".correctly__message_incorrect");
const loadedAuthorPhoto = document.querySelector(".input__loaded-author-photo");
const loadedPostImage = document.querySelector(".input__loaded-post-image");
const loadedCardImage = document.querySelector(".input__loaded-card-image");

let authorPhotoBase64 = { value: "" };
let postImageBase64 = { value: "" };
let cardImageBase64 = { value: "" };



function inputEvent(input, preview, defaultText) {
    input.oninput = function () {
        for (let i = 0; i < preview.length; i++) {
            if (input.value != "") {
                preview[i].innerText = input.value;
            }
            else {
                preview[i].innerText = defaultText;
            }
        }
    }
}

function convertImageToBase64(file, preview, imageBase64) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
        for (let i = 0; i < preview.length; i++) {
            switch (preview[i].id) {
                case "article-preview__image":
                    preview[i].innerHTML = `<img src='${reader.result}' id="article-preview__image">`;
                    break;
                case "input__upload-post-image":
                    preview[i].innerHTML = `<img src='${reader.result}' class="input__post-image-output">`;
                    loadedPostImage.style.cssText = 'display: block;';
                    break;
                case "post-preview__image":
                    preview[i].innerHTML = `<img src='${reader.result}' id="post-preview__image">`;
                    break;
                case "input__card-image-upload":
                    preview[i].innerHTML = `<img src='${reader.result}' class="input__card-image-output">`;
                    loadedCardImage.style.cssText =  'display: block;';
                    break;
                case "post-preview__author-photo":
                    preview[i].innerHTML = `<img src='${reader.result}' id="post-preview__author-photo">`;
                    break;
                case "input__upload-author-photo":
                    preview[i].innerHTML = `<img src='${reader.result}' class="input__author-output">`;
                    loadedAuthorPhoto.style.cssText = 'display: inline-block;';
                    break;
                default:
                    break;
            }
        }
        imageBase64.value = reader.result;
    }
}

function getJSON() {
    if (title.value && description.value && authorName.value && publishDate.value &&
        authorPhotoBase64.value && postImageBase64.value && cardImageBase64.value && mainText.value) {
        const object = {
            [title.name]: title.value,
            [description.name]: description.value,
            [authorName.name]: authorName.value,
            [publishDate.name]: publishDate.value,
            [authorPhoto.name]: authorPhotoBase64.value,
            [postImage.name]: postImageBase64.value,
            [cardImage.name]: cardImageBase64.value,
            [mainText.name]: mainText.value
        }
        jsonData = JSON.stringify(object);
        console.log(jsonData);
        incorrect.style.cssText = 'display: none;';
        correct.style.cssText = 'display: block;';
    }
    else {
        correct.style.cssText = 'display: none;';
        incorrect.style.cssText = 'display: block;';
    }
}

//string
inputEvent(title, [prevPostTitle, prevCardTitle], defaultTitle);
inputEvent(description, [prevPostDescription, prevCardDescription], defaultDescription);
inputEvent(authorName, [prevCardAuthorName], defaultAuthorName);
inputEvent(publishDate, [prevCardPublishDate]);

//image
postImage.oninput = (image) => {
    convertImageToBase64(image.target.files[0], [prevPostImage, prevInputPostImage], postImageBase64);
}
cardImage.oninput = (image) => {
    convertImageToBase64(image.target.files[0], [prevCardImage, prevInputCardImage], cardImageBase64);
}
authorPhoto.oninput = (image) => {
    convertImageToBase64(image.target.files[0], [prevCardAuthorPhoto, prevInputAuthorPhoto], authorPhotoBase64);
}

publishButton.addEventListener("click", getJSON);

// removePostImage.addEventListener("click", postImage.remove());