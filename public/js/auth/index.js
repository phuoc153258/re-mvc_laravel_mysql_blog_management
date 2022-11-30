function renderInfoUserToNavbar(username) {
    emptyInfoNavbar();
    let navbar = document.getElementById("info-user-navbar-js");
    let str = `<li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                ${username}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item">Log out</a></div></li>`;
    navbar.innerHTML = str;
}

function emptyInfoNavbar() {
    const navbar = (document.getElementById("info-user-navbar-js").innerHTML =
        "");
}
