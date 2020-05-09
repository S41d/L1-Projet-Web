let author = '';
let commentText;
let idPost = '';
getAuthor();
let commentsHolder;

Url = {
    get get() {
        let vars = {}
        if (window.location.search.length !== 0)
            window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
                key = decodeURIComponent(key);
                if (typeof vars[key] === "undefined") {
                    vars[key] = decodeURIComponent(value);
                } else {
                    vars[key] = [].concat(vars[key], decodeURIComponent(value));
                }
            });
        return vars;
    }
};

function firstRun() {
    if (document.getElementById('commentsHolder') !== null) {
        let submitBtn = document.getElementById('submit');
        commentsHolder = document.getElementById('commentsHolder');
        submitBtn.onclick = function () {
            sendNewComment();
            setTimeout(getComments, 100)
            document.getElementById('newCommentText').value = '';
        }
    }
}

firstRun();

function getAuthor() {
    let getAuthor = new XMLHttpRequest();
    getAuthor.open('GET', './comments/userName.php', true);
    getAuthor.onload = function () {
        author = this.responseText;
    }
    getAuthor.send();
}


function sendNewComment() {
    commentText = document.getElementById('newCommentText').value;
    getAuthor();
    idPost = Url.get.id;
    let newComment = new XMLHttpRequest();
    newComment.open('GET', './comments/newComment.php?idPost=' + idPost + '&newComment=' + commentText + '&author=' + author, true);
    newComment.send()
}

function getComments() {
    let comments = new XMLHttpRequest();
    comments.open('GET', './comments/fetchComments.php?id=' + idPost, true);
    comments.onload = function () {
        commentsHolder.innerHTML = this.responseText;
    }
    comments.send();
}