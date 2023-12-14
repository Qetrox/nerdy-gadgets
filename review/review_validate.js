const validate = new JustValidate('#review', {
        errorFieldCssClass: "validate-error-field",
        successFieldCssClass: ['validate-sucess-field'],
        errorLabelStyle: {
            color: 'white',
        },
    }
);

validate
.addField("#naam", [
    {
        rule: "required",
    },
])

.addField("#beoordeling", [
    {
        rule: "required",
        rule: 'integer',
        rule: 'minNumber',
        value: 1,
        rule: 'maxNumber',
        value: 5,

    },
])

    .addField("#opmerking", [
        {
            rule: "required",
        },
    ])





    .onSuccess((event) => {
        document.getElementById("review").submit();

    });



