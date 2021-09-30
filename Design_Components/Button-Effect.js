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
function show_hide_password(target) {
    var input = document.getElementById('password');
    if (input.getAttribute('type') == 'password') {
      target.classList.add('view');
      input.setAttribute('type', 'text');
    } else {
      target.classList.remove('view');
      input.setAttribute('type', 'password');
    }
    return false;
  }