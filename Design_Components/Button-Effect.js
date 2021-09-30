// function to toggle button effect
function blink(c) {
    var s = document.getElementById(c);
    s.classList.add("buttonOff");
    s.addEventListener("mouseleave", () => {
        s.classList.remove("buttonOn");
        s.classList.add("buttonOff");
    });
    s.addEventListener("mouseover", () => {
        s.classList.remove("buttonOff");
        s.classList.add("buttonOn");
    });
}