function searchFilm() {
    let input = document.getElementById('barderechercher');
    let filter = input.value.toUpperCase();
    let body = document.getElementById('body');
    let children = body.children;
    for (let i = 0; i < children.length; i++) {
        let a = children[i];
        let txtValue = a.id;
        txtValue = txtValue.replace(/-/g, ' ');
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            children[i].style.display = "";
        } else {
            children[i].style.display = "none";
        }
    }
}



