window.onload = function () {

    const carousel = document.getElementById("carousel");
    const nextBtn = document.querySelector(".next");
    const prevBtn = document.querySelector(".prev");

    nextBtn.onclick = function () {
        carousel.scrollBy({
            left: 400,
            behavior: "smooth"
        });
    };

    prevBtn.onclick = function () {
        carousel.scrollBy({
            left: -400,
            behavior: "smooth"
        });
    };
};


function toggleMenu() {
    document.querySelector("nav").classList.toggle("active");
}