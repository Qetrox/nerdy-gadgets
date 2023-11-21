let i = 0;
const options = [ // Opties voor de typewriter
    'Gadgets Voor de Echte Nerds.', //1
    'Nerd Certified.', //2
    'Voor de Tech-Lovers.', //3
    'Voor Nerds, Door Nerds.', //4
    'Wat heeft een Nerd niet Nodig?', //5
    'De Beste Winkel voor Nerds.', //6
    'Word ook een Nerd!', //7
    'De Beste Kwaliteit Gadgets.', //8
    'Nerds zijn Cool, Gadgets nog Cooler.', //9
    'Geen Boeken, Maar Gadgets.', //10
    'NERD ACTIVATED', //11
];
const number = Math.floor(Math.random() * 11); // Kiest een random nummer tussen 0 en 11
const string = options[number]; // Kiest een random string uit de array

function typeWriter() { // Typewriter functie
    if (i < string.length) { // Als i kleiner is dan de lengte van de string
        document.getElementById("typewriter").innerHTML += string.charAt(i); // Voeg de letter toe aan de string
        i++;
        setTimeout(typeWriter, 50); // Wacht 50ms en voer de volgende letter toe
    }
}
typeWriter()
