function accept_our_cookies__(accept_our_cookies) { //reset
    accept_our_cookies.style.transition = 'width 0.4s ease'
    accept_our_cookies.style.width = '0';
}

/**
 * Functie om naar de volgende stap/titel te gaan.
 * @param _accept_our_cookies Titel element
 * @param accept_our_cookies Laad element
 * @param titel Titel van de stap
 * @param delay Hoeveel ms voordat het activeert
 */
function step(_accept_our_cookies, accept_our_cookies, titel, delay) {
    setTimeout(() => {
        _accept_our_cookies.innerHTML = titel;
        _accept_our_cookies.style.opacity = 1;
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 6000);
}

function accept_our_cookies_() {
    const accept_our_cookies = document.getElementById('accept_our_cookies');
    const _accept_our_cookies = document.getElementById('_accept_our_cookies');
    const accept_me_cookies = document.getElementById('--accept-me-cookies--');
    setTimeout(() => {
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 1);
    step(_accept_our_cookies, accept_our_cookies, 'Dit stellen wij niet op prijs.', 6000)
    step(_accept_our_cookies, accept_our_cookies, 'Daarom treffen we de volgende maatregelen:', 12000)
    setTimeout(() => {
        _accept_our_cookies.innerHTML = 'Wij weten waar u bent.';
        _accept_our_cookies.style.opacity = 1;
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        accept_me_cookies.style.display = 'grid';
        accept_me_cookies.style.opacity = '1';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_me_cookies.style.display = 'none';
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 18000);
    step(_accept_our_cookies, accept_our_cookies, ACCEPTEER, 24000)
    step(_accept_our_cookies, accept_our_cookies, 'Hopelijk heeft dit ervoor gezorgd dat uw mening is veranderd.', 30000)
    setTimeout(() => {
        localStorage.setItem("cookie", "accepted");
        _accept_our_cookies.innerHTML = 'Wij gaan nu de cookies voor u accepteren.';
        _accept_our_cookies.style.opacity = 1;
        _accept_our_cookies.style.fontSize = '50px';
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 36000);
    setTimeout(() => {
        window.location.replace('../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../');
    }, 42000);

}