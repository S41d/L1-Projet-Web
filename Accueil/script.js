let searchinput, style;
function bar_de_recherche() {
    searchinput = document.getElementById('barderechercher')
    style = window.getComputedStyle(searchinput);
    console.log(style.width)
    if (style.width === "0px"){
        searchinput.style.width = "240px"
        searchinput.style.paddingLeft = "20px"
        searchinput.classList.add('search-open')
    }
    else {
        searchinput.style.width = "0px"
        searchinput.style.paddingLeft = "5px"
    }   
}
