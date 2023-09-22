let i = 0;
const options = [
    'Gadgets Voor de Echte Nerds.', //1
    'Nerd Certified.', //2
    'Voor de Tech-Lovers.', //3
    'Voor Nerds, Door Nerds.', //4
    'Wat heeft een Nerd niet Nodig?', //5
    'De Beste Winkel voor Nerds.', //6
    'Wordt ook een Nerd!', //7
    'De Beste Kwaliteit Gadgets.', //8
    'Nerds zijn Cool, Gadgets nog Cooler.', //9
    'Geen Boeken, Maar Gadgets.', //10
];
const number = Math.floor(Math.random() * 10);
const string = options[number];

function typeWriter() {
    if (i < string.length) {
        document.getElementById("typewriter").innerHTML += string.charAt(i);
        i++;
        setTimeout(typeWriter, 50);
    }
}
typeWriter()