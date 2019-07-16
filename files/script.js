function showDiv() {
    var div = document.getElementById("movieForm");
    if (div.style.display === "none") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }
}

function closeDiv() {
    var div = document.getElementById("movieForm");
    if (div.style.display === "block") {
        div.style.display = "none";
    } else {
        div.style.display = "block";
    }
}