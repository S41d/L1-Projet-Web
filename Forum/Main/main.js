let Subs = document.getElementById('subs');
let returnValue = new String;
window.onload = function () {
    let connection = new XMLHttpRequest();
    connection.open('GET', './getMain.php', true);
    connection.onload = function () {
        let results = JSON.parse(this.responseText);
        if (this.responseText !== '') {
            returnValue += '<a href="../Main.createSub.php" class="newBtn" id="newBtn">New Sub</a>'
        }
        results.forEach(element => {
            returnValue += '<a href=' + '"../Subs.php?idsub=' + element.idsub + '">' + element.namesub + '</a>'
        })
        Subs.innerHTML = returnValue;
    }
    connection.send();
}