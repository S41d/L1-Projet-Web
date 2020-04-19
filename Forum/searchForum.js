let body = document.getElementById('body');
let searchBar = document.getElementById('barderechercher');
let resultsDiv = document.createElement("div");

resultsDiv.classList.add('resultsDiv');

function loadSearchResults(results) {
    let allResults = "";
    let animationdelay = 0.3;
    results.forEach(element => {
        allResults += `<a href="./Subs.php?idsub=` + element.idSub + `" style="animation-delay: ` + animationdelay + `s">` + element.nameSub + `<br><p>` + element.descriptionSub + `</p></a>`;
        animationdelay += 0.1;
    });
    resultsDiv.innerHTML = allResults;

let sideBar = document.getElementById('sideBar');
document.body.insertBefore(resultsDiv, sideBar)
}


function searchForum() {
    let searchInput = searchBar.value;
    let requestSubs = new XMLHttpRequest();
    requestSubs.open('GET', './fetchSubs.php?input=' + searchInput, true);
    requestSubs.onload = function () {
        if (this.responseText !== '') {
            let searchResults = JSON.parse(this.responseText);
            body.style.display = "none";
            resultsDiv.style.animation = "fadeIn 1s";
            resultsDiv.style.display = "flex";
            loadSearchResults(searchResults);
        } else {
            resultsDiv.style.display = "none";
            body.style.animation = "fadeIn 1s";
            body.style.display = "block";
        }
    }
    requestSubs.send();
}
