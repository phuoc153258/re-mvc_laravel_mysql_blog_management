function renderInfoUserToNavbar(data) {
    emptyInfoNavbar();
    let navbar = document.getElementById("info-user-navbar-js");
    let str = `<li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                ${data.username}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/users">User information</a>
                <a class="dropdown-item" onclick="logoutUser()">Log out</a></div></li>`;
    navbar.innerHTML = str;
    document.getElementById("user-id-navbar-hidden-js").value = data.id;
}

function emptyInfoNavbar() {
    const navbar = (document.getElementById("info-user-navbar-js").innerHTML =
        "");
}
