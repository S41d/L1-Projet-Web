
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

function fileCheck() {
    let filename = window.location.href
    filename = filename.substr(filename.lastIndexOf('/')+1, filename.lastIndexOf('?')-filename.lastIndexOf('/')-1);
    if (filename === 'Subs.php') {
        modCheck()
    }
}

function modCheck() {
    let sessionConnection = new XMLHttpRequest();
    sessionConnection.open('GET', '../sessioncheck.php')
    sessionConnection.onload = function () {
        let userData = JSON.parse(this.responseText);
        if (userData.length !== 0) {
            let {Iduser: user} = userData
            getMod(user)
        }
    }
    sessionConnection.send();
}

function getMod(user) {
    let modConnection = new XMLHttpRequest();
    modConnection.open('GET', 'subMod/getMod.php?idSub='+Url.get.idsub);
    modConnection.onload = function () {
        let userData = JSON.parse(this.responseText);
        if (userData.length !== 0) {
            if (userData === user) {
                addButtons()
            }
        }
    }
    modConnection.send();
}

function addButtons() {
    let sub_post = document.getElementsByClassName('sub-posts');
    [...sub_post].forEach(link => {
        // Creating Button - Variables
        let title = [...(link.children)][0]
        let postId = link.href.substr(link.href.search('=')+1);
        let subId = Url.get.idsub
        let objectButton = document.createElement('object')
        let exitButton = document.createElement("a")
        let icon = document.createElement('i')
        let text = document.createTextNode('close')

        // Creating Button - Applying
        icon.appendChild(text)
        exitButton.appendChild(icon)
        objectButton.appendChild(exitButton)
        title.appendChild(objectButton)

        // Creating Button - Setting Attributes
        icon.setAttribute('class','material-icons')
        icon.setAttribute('onclick','window.location.href=\'subMod/deletePost.php?idPost=' + postId + '\&idSub=' + subId + '\'')
        exitButton.setAttribute('href','subMod/deletePost.php?idPost=' + postId + '&idSub=' + subId)

        // Creating Button - Adding to the page
        title.appendChild(objectButton)
    })
}

fileCheck()
swup.on('contentReplaced', fileCheck)
