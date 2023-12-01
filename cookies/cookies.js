//Als er geclicked wordt op "accepteer cookies" verdwijnd de hele class genaamd met id 'cookies'
var div = document.getElementById('cookies'); // Zoek de div met id 'cookies'

function checkCookies() {
    if(localStorage.getItem("cookie") === 'accepted') { // If the cookie is 'accepted', hide the cookie div
        div.style.display = 'none'; // Hide the cookie div
    } else {
        div.style.display = 'flex'; // Show the cookie div
    }
}

checkCookies();
function dissapearCookies() {
    localStorage.setItem("cookie", "accepted"); // Save the cookie 'accepted'
    div.style.display = 'none'; // Hide the cookie div
}

document.getElementById("ugh").addEventListener("mouseenter", run);
function run() {
    var btn = document.getElementById("ugh");
    btn.style.position = "fixed";
    btn.style.width = "100px";
    btn.style.height = "60px";
    btn.style.fontSize = "22px";
    if (!btn.style.left) {
        btn.style.left = "1000px";
    } else {
        btn.style.bottom = Math.random() * 70 + "vh";
        btn.style.left = Math.random() * 80 + "vw";
    }
}
