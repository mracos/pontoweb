function clock(){
    setInterval(function(){
        now = new Date();
        document.getElementById('clock').innerHTML = now.format('HH:MM:ss - dd/mm/yyyy')
    }, 1000);
}