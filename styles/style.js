function bar_de_recherche() {
    let searchinput = document.getElementById('barderechercher');
    let style = window.getComputedStyle(searchinput);
    if (style.width === "0px") {
        searchinput.style.width = "200px";
        searchinput.style.paddingLeft = "20px";
    } else {
        searchinput.style.width = "0";
        searchinput.style.paddingLeft = "0px";
    }
}

function fadeOut(element) {
    let op = 1;  // initial opacity
    element.style.display = "none";
    const timer = setInterval(function () {
        if (op <= 0.1) {
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.2;
    }, 15);
}

function fadeIn(element) {
    let op = 0.1;  // initial opacity
    element.style.display = 'block';
    const timer = setInterval(function () {
        if (op >= 1) {
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 10);
}

function sidebar() {
    let sidebar = document.getElementById('sidebar');
    let sidebarcss = window.getComputedStyle(sidebar);
    let sidebarChildren = sidebar.children;
    if (sidebarcss.width === "250px") {
        for (let i = 0; i < sidebarChildren.length; i++) {
            fadeOut(sidebarChildren[i]);
        }
        sidebar.style.width = '0';
    } else {
        for (let i = 0; i < sidebarChildren.length; i++) {
            fadeIn(sidebarChildren[i]);
        }
        sidebar.style.width = '250px';
    }
}