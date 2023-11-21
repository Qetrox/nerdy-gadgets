// Loading ding
window.addEventListener("load", () => { // When the page has loaded
    const loader = document.querySelector(".loaderscreen"); // Select the loaderscreen
    loader.classList.add("loaderscreen-hidden"); // Add the loaderscreen-hidden class to the loaderscreen

    const links = document.querySelectorAll("a"); // Select all links
    links.forEach(link => { // For each link
        link.addEventListener("click", (event) => { // When the link is clicked
            const loader = document.querySelector(".loaderscreen"); // Select the loaderscreen
            loader.classList.remove("loaderscreen-hidden"); // Remove the loaderscreen-hidden class from the loaderscreen
            setTimeout(() => { // After 5 seconds
                loader.classList.add("loaderscreen-hidden"); // Add the loaderscreen-hidden class to the loaderscreen
            }, 5000);
        });
    });
});