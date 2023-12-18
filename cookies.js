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

function iNoWantCookies() {
    window.location.replace('./iemand/wilt/geen/cookies/maar/heeft/geen/keuze');
}