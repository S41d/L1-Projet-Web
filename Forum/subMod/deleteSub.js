let mod, user;

function modCheck() {
    let sessionConnection = new XMLHttpRequest();
    sessionConnection.open('GET', '../sessioncheck.php')
    sessionConnection.onload = function () {
        let userData = JSON.parse(this.responseText);
        console.log(userData);
        if (userData.length !== 0) {
            user = userData.Iduser
            getMod(user)
        } else {
        }
    }
    sessionConnection.send();
}

function getMod(user) {
    let modConnection = new XMLHttpRequest();
    modConnection.open('GET', 'subMod/getMod.php');
    modConnection.onload = function () {
        let userData = JSON.parse(this.responseText);
        console.log(userData);
        if (userData.length !== 0) {
            mod = userData.id
            if (mod === user) {
                addButtons()
            }
        } else {

        }
    }
    modConnection.send();
}

function addButtons() {

}

modCheck()
swup.on('contentReplaced', modCheck)
