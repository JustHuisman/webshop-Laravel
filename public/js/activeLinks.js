var elems = document.querySelectorAll('li.nav-item.navbar-link');
elems.forEach(function(link) {
    link.addEventListener("click", function(e) {
        [].forEach.call(elems, function(el) {
            el.classList.remove("active");
        });
        link.classList.add("active");
    }, false);
});