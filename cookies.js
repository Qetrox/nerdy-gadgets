//Als er geclicked wordt op "accepteer cookies" verdwijnd de hele class genaamd met id 'cookies'
var div = document.getElementById('cookies'); // Zoek de div met id 'cookies'

function checkCookies() {
    if(localStorage.getItem("cookie") === 'accepted') { // Als de cookie 'accepted' is, dan moet de cookie div niet weergegeven worden
        div.style.display = 'none'; // Verberg de cookie div
    } else {
        div.style.display = 'flex'; // Laat de cookie div zien
    }
}

checkCookies();
function dissapearcookies(){ // Als er op de knop wordt geklikt, dan moet de cookie div verdwijnen en moet de cookie 'accepted' worden
    localStorage.setItem("cookie", "accepted"); // Sla de cookie 'accepted' op
    div.style.display = 'none'; // Verberg de cookie div
}

function rickroll() { // Als er op cookies weigeren wordt geklikt.
    window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
}

