
// Loading ding
window.addEventListener("load", () => {
    const loader = document.querySelector(".loaderscreen");
    loader.classList.add("loaderscreen-hidden");

    const links = document.querySelectorAll("a");
    links.forEach(link => {
        link.addEventListener("click", (event) => {
            const loader = document.querySelector(".loaderscreen");
            loader.classList.remove("loaderscreen-hidden");
            setTimeout(() => {
                loader.classList.add("loaderscreen-hidden");
            }, 5000);
        });
    });
});