
function shownoodzakelijk() {
    div = document.getElementById("noodzakelijk"); // Zoek de div met id 'noodzakelijk'
    if(div.style.opacity == '0') { //checked of dat de tekst niet zichtbaar is (0)
        div.style.marginTop = '-7.4%'
        div.style.marginLeft = '3.4%'
        div.style.opacity = '1' // opacity = 1 = zienbaar dus als opacity niet zienbaar is (0) maakt het het zichtbaar (1)
        document.getElementById("noodzakelijkarrow").innerHTML = "<span onclick=\"shownoodzakelijk()\" > arrow_right </span>"; // maakt de arrow naar rechts wijzend

    }
    else{
        div.style.marginTop = '-10.4%'
        div.style.opacity = '0' // opacity 0 = niet zichtbaar maken
        document.getElementById("noodzakelijkarrow").innerHTML = "<span onclick=\"shownoodzakelijk()\" > arrow_drop_up </span>"; // maakt de arrow weer up
    }

}

function showprestatie() {
    div = document.getElementById("prestatie"); // Zoek de div met id 'prestatie'
    if(div.style.opacity == '0') { //checked of dat de tekst niet zichtbaar is (0)
        div.style.marginTop = '-7.4%'
        div.style.marginLeft = '3.4%'
        div.style.opacity = '1' // opacity = 1 = zienbaar dus als opacity niet zienbaar is (0) maakt het het zichtbaar (1)
        document.getElementById("prestatiearrow").innerHTML = "<span onclick=\"showprestatie()\" > arrow_right </span>"; // maakt de arrow naar rechts wijzend
    }
    else{
        div.style.marginTop = '-12.4%'
        div.style.opacity = '0' // opacity 0 = niet zichtbaar maken
        document.getElementById("prestatiearrow").innerHTML = "<span onclick=\"showprestatie()\" > arrow_drop_up </span>";
    }

}

function showfunctioneel() {
    div = document.getElementById("functioneel"); // Zoek de div met id 'functioneel'
    if(div.style.opacity == '0') { //checked of dat de tekst niet zichtbaar is (0)
        div.style.opacity = '1' // opacity = 1 = zienbaar dus als opacity niet zienbaar is (0) maakt het het zichtbaar (1)
        div.style.marginTop = '-7.4%'
        div.style.marginLeft = '3.4%'
        document.getElementById("functioneelarrow").innerHTML = "<span onclick=\"showfunctioneel()\" > arrow_right </span>"; // maakt de arrow naar rechts wijzend
    }
    else{

        div.style.marginTop = '-9.4%'
        div.style.opacity = '0' // opacity 0 = niet zichtbaar maken
        document.getElementById("functioneelarrow").innerHTML = "<span onclick=\"showfunctioneel()\" > arrow_drop_up </span>";
    }

}

function showanalytisch() {
    div = document.getElementById("analytisch"); // Zoek de div met id 'analytisch'
    if(div.style.opacity == '0') { //checked of dat de tekst niet zichtbaar is (0)
        div.style.opacity = '1' // opacity = 1 = zienbaar dus als opacity niet zienbaar is (0) maakt het het zichtbaar (1)
        div.style.marginTop = '-7.4%'
        div.style.marginLeft = '3.4%'
        document.getElementById("analytischarrow").innerHTML = "<span onclick=\"showanalytisch()\" > arrow_right </span>"; // maakt de arrow naar rechts wijzend
    }
    else{
        div.style.marginTop = '-10.4%'
        div.style.opacity = '0' // opacity 0 = niet zichtbaar maken
        document.getElementById("analytischarrow").innerHTML = "<span onclick=\"showanalytisch()\" > arrow_drop_up </span>";
    }

}
function showuwkeuzes(){
    div = document.getElementById("uwkeuzes"); // Zoek de div met id 'uwkeuzes'
    if(div.style.opacity == '0') { //checked of dat de tekst niet zichtbaar is (0)
        div.style.opacity = '1' // opacity = 1 = zienbaar dus als opacity niet zienbaar is (0) maakt het het zichtbaar (1)
        div.style.marginTop = '-7.4%'
        div.style.marginLeft = '3.4%'
        document.getElementById("keuzes").innerHTML = "<span onclick=\"showuwkeuzes()\" > arrow_right </span>"; // maakt de arrow naar rechts wijzend
    }
    else{
        div.style.marginTop = '-10.4%'
        div.style.opacity = '0' // opacity 0 = niet zichtbaar maken
        document.getElementById("keuzes").innerHTML = "<span onclick=\"showuwkeuzes()\" > arrow_drop_up </span>";
    }



}