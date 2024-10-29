let link = Array("./img/us-flag.gif", "./img/ja-flag.gif", "./img/sz-flag.gif", "./img/uk-flag.gif");

function showFlag() {
    let sel = document.getElementById("select");
    switch (sel.value) {
        case "dollaro":
            document.getElementById("flag").src = link[0];
            break;

        case "yen":
            document.getElementById("flag").src = link[1];
            break;

        case "franchi svizzeri":
            document.getElementById("flag").src = link[2];
            break;

        case "sterline":
            document.getElementById("flag").src = link[3];
            break;

        default:
            break;
    }
}