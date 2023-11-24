
const validation = new JustValidate("#registratie");

validation
    .addField("#email", [
        {
            rule: "required"

        }
    ])


.onSuccess((event) => {
    document.getElementById("registratie").submit();

});
