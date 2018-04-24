window.onload = load;

function load() {
    var box = document.getElementById('myBox');
    var btn = document.getElementById('info');
    var span = document.getElementsByClassName('close')[0];

    btn.onclick = function () {
        box.style.display = "block";
    }

    span.onclick = function () {
        box.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == box) {
            box.style.display = "none";
        }
    }
}