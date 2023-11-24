
const validation = new JustValidate("#registratie");

validation
    .addField("#email", [
        {
            rule: "required",
            rule: "email"

        }
    ])


.onSuccess((event) => {
    document.getElementById("registratie").submit();

});
