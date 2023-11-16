//Als er geclicked wordt op "accepteer cookies" verdwijnd de hele class genaamd met id 'cookies'
var div = document.getElementById('cookies');
var display = 0;
function dissapearcookies(){
    if(display == 1){
        div.style.display = 'block';
        display = 0;
    }
    else
    {
        div.style.display = 'none';
        display = 1;

    }
}

