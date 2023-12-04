
const validation = new JustValidate("#registratie");

validation
    .addField("#email", [
        {
            rule: "required",
        },
        {
            rule: "email"

        },
        {
            validator: (value) => () => {
                return fetch("emailcheck.php?email=" + encodeURIComponent(value))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(json) {
                        return json.available;
                    });
            },
            errorMessage: "email already taken"
        }

    ])


    .addField("#achternaam", [
        {
            rule: "required",
        },
    ])

    .addField("#tussenvoegsel", [
        {
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
