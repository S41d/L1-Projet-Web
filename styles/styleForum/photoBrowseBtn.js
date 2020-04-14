const inputs = document.getElementById('uploadPhotoInput')
let btn = document.getElementById('uploadPhotoSub');

inputs.addEventListener('change', function () {
    if (inputs.value) {
        let name = inputs.value;
        name = name.substr(12)
        btn.innerText = name;
    }
})