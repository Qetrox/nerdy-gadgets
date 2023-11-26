
const validation = new JustValidate("#registratie");

validation
    .addField("#email", [
        {
            rule: "required",
        },
        {
            rule: "email"

        },
    ])


    .addField("#achternaam", [
        {
            rule: "required",
        },
    ])

    .addField("#tussenvoegsel", [
        {
            rule: "required",
        },
    ])


    .addField("#postcode", [
        {
            rule: "required",
        },
    ])

    .addField("#straatnaam", [
        {
            rule: "required",
        },
    ])
    .addField("#huisnummer", [
        {
            rule: "required",
        },
        {
            rule:"integer",
        }
    ])
    .addField("#voornaam", [
        {
            rule: "required",
        },
    ])
    .addField("#plaats", [
        {
            rule: "required",
        },
    ])
    .addField("#psw", [
        {
            rule: "required",
        },
        {
            rule: "strongPassword",
        }
    ])


.onSuccess((event) => {
    document.getElementById("registratie").submit();

});
