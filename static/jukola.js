var showOnClick = function() {
    var attribute = this.getAttribute("data-target");
    var currentElement = document.getElementById(attribute);
    currentElement.style.display = "block";

    this.style.display = "none";
};

(function() {
    var buttons = document.getElementsByClassName("show-button");

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', showOnClick, false);
    }
})();
