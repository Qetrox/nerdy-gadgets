
const validator = new JustValidate('#registratie', {
        errorFieldCssClass: "just-validate-error-field",
        successFieldCssClass: ['just-validate-sucess-field'],
        errorLabelStyle: {
            color: 'white',
        },
    }
);


validator
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


    .addField("#postcode", [
        {
            rule: "required",
        }, {
            rule: 'minLength',
            value: 6,
            errorMessage: "postcode klopt niet"

        },

        {
            rule: 'maxLength',
            value: 6,
            errorMessage: "postcode klopt niet"

        }

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



