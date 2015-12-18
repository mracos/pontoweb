var chlogged = function(session_id, user, id_tag) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState = 2 && xhttp.status = 400) {
            document.getElementById(id_tag).innerHTML = xhttp.responseText();
        }
    }
}