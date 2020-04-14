let swup = new Swup();

let allLinks;

function onload() {
    allLinks = document.getElementById('body').children;
    allLinks = allLinks[0].children;
    allLinks = allLinks[0].children;
    [...allLinks].forEach(link => {
        link.onclick = function () {
            setTimeout(function () {
                window.scrollTo(0, 0);
            }, 500)
        }
    })
}

onload()

swup.on('contentReplaced', onload)