function oscillate() {
    var x = document.getElementById("rotate");
    x.classList.add("oscillate");
    setTimeout(() => {
        x.classList.remove("oscillate");
    }, 2050);
}