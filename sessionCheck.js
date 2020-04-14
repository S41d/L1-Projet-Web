let connexionButtons = document.getElementsByClassName('connexionButton');
let compteButtons = document.getElementsByClassName('compteButton');

function sessionCheck() {
    let connection = new XMLHttpRequest();
    connection.open('GET', '../sessioncheck.php')
    connection.onload = function () {
        let userData = JSON.parse(this.responseText);
        let newBtn;
        if (userData.length === 0) {
            [...compteButtons].forEach(btn => {
                btn.style.display = "none";
            })
            if (document.getElementById('newBtn')) {
                newBtn = document.getElementById('newBtn');
                newBtn.style.display = "none";
            }
            if (document.getElementById('newComment'))
                document.getElementById('newComment').style.display = 'none';
        } else {
            [...connexionButtons].forEach(btn => {
                btn.style.display = 'none';
            });
        }
    }
    connection.send();
}

sessionCheck();

swup.on('contentReplaced', sessionCheck)