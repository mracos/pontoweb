function checkPass(id_new_pass, id_pass_confirm) {
    var new_pass = document.getElementById(id_new_pass).value;
    var pass_confirm = document.getElementById(id_pass_confirm).value;
    if (new_pass === pass_confirm) {
        return true;
    }
    alert("Password and password confirmation doesn't match!");
    return false;
}