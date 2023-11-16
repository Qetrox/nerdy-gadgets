//Als er geclicked wordt op "accepteer cookies" verdwijnd de hele class genaamd met id 'cookies'
var div = document.getElementById('cookies');
var display = 0;

function checkCookies() {
    if(localStorage.getItem("cookie") === 'accepted') {
        div.style.display = 'none';
    } else {
        div.style.display = 'flex';
    }
}

checkCookies();
function dissapearcookies(){
    localStorage.setItem("cookie", "accepted");
    div.style.display = 'none';
}

