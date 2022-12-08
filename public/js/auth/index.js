function renderInfoUserToNavbar(data) {
    emptyInfoNavbar();
    let navbar = document.getElementById("info-user-navbar-js");

    let strAdmin = "";
    const cookie = getCookie("X-localization");
    if (checkRoleUser(data, "admin"))
        strAdmin += `<a class="dropdown-item" href="/admin/blogs">${
            cookie == "vie" ? "Quản trị viên" : "Admin"
        }</a>`;

    let str = `<li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                ${data.username}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                ${strAdmin}
                <a class="dropdown-item" href="/users">${
                    cookie == "vie" ? "Thông tin cá nhân" : "My information"
                }</a>
                <a class="dropdown-item" href="/blogs">${
                    cookie == "vie" ? "Blog của tôi" : "My Blogs"
                }</a>
                <a class="dropdown-item" onclick="logoutUser()">${
                    cookie == "vie" ? "Đăng xuất" : "Log out"
                }</a></div></li>`;
    navbar.innerHTML = str;
    document.getElementById("user-id-navbar-hidden-js").value = data.id;
}

function emptyInfoNavbar() {
    const navbar = (document.getElementById("info-user-navbar-js").innerHTML =
        "");
}

function checkRoleUser(data, role_name) {
    let check = false;
    data.roles.forEach((element) => {
        if (element.name == role_name) check = true;
    });
    return check;
}
