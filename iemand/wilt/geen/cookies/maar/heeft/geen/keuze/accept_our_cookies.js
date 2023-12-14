function accept_our_cookies__(accept_our_cookies) { //reset
    accept_our_cookies.style.transition = 'width 0.4s ease'
    accept_our_cookies.style.width = '0';
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
    setTimeout(() => {
        _accept_our_cookies.innerHTML = 'Dit stellen wij niet op prijs.';
        _accept_our_cookies.style.opacity = 1;
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 6000);
    setTimeout(() => {
        _accept_our_cookies.innerHTML = 'Daarom gebruiken we de volgende maatregelen:';
        _accept_our_cookies.style.opacity = 1;
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 12000);
    setTimeout(() => {
        _accept_our_cookies.innerHTML = 'Daarom treffen we de volgende maatregelen:';
        _accept_our_cookies.style.opacity = 1;
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 12000);
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
    setTimeout(() => {
        _accept_our_cookies.innerHTML = ACCEPTEER;
        _accept_our_cookies.style.opacity = 1;
        _accept_our_cookies.style.fontSize = '30px';
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 24000);
    setTimeout(() => {
        _accept_our_cookies.style.transform = 'unset';
        _accept_our_cookies.innerHTML = 'Hopelijk heeft dit ervoor gezorgd dat uw mening is veranderd.';
        _accept_our_cookies.style.opacity = 1;
        _accept_our_cookies.style.fontSize = '50px';
        accept_our_cookies.style.transition = 'all 5s ease'
        accept_our_cookies.style.width = 100 + 'vw';
        setTimeout(() => {
            _accept_our_cookies.style.opacity = 0;
            accept_our_cookies__(accept_our_cookies);
        }, 5000);
    }, 30000);
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