const URLAuth = "/api/auth";

async function loginUser() {
    try {
        const username = document.getElementById("username-login-js").value;
        const password = document.getElementById("password-login-js").value;
        const response = await axios({
            method: "post",
            url: URLAuth + "/login",
            data: {
                username,
                password,
            },
        });
        if (response.data.status) {
            setCookie("access_token", "Bearer " + response.data.data.token, 1);
            await swal("Login success !!!", "", "success");
            location.replace(`/`);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function logoutUser() {
    try {
        const response = await axios({
            method: "post",
            url: URLAuth + "/logout",
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            deleteCookie("access_token");
            await swal("Logout success !!!", "", "success");
            location.replace(`/`);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function registerUser() {
    try {
        const username = document.getElementById("username-register-js").value;
        const fullname = document.getElementById("fullname-register-js").value;
        const email = document.getElementById("email-register-js").value;
        const password = document.getElementById("password-register-js").value;
        const confirmPassword = document.getElementById(
            "password-confirm-register-js"
        ).value;
        if (password == confirmPassword) {
            const response = await axios({
                method: "post",
                url: URLAuth + "/register",
                headers: {},
                data: {
                    username,
                    fullname,
                    email,
                    password,
                },
            });
            setCookie("access_token", "Bearer " + response.data.data.token, 1);
            await swal("Register success !!!", "", "success");
            location.replace(`/`);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function getInfoUser() {
    try {
        const response = await axios({
            method: "get",
            url: "/api/users/me",
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        return response;
    } catch (error) {
        console.log(error);
        return null;
    }
}

async function getInfoUserLogin() {
    try {
        const response = await getInfoUser();
        if (response.data.status) renderInfoUserToNavbar(response.data.data);
        else {
            location.replace(`/`);
            return;
        }
    } catch (error) {
        location.replace(`/`);
        return;
    }
}

async function getInfoUserLoginHome() {
    let homeNavbar = document.getElementById("home-login-nav-js");
    let str = "";
    try {
        const response = await getInfoUser();

        if (response.data.status) {
            str += `<a href="/blogs" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        <a class="text-sm text-gray-700 dark:text-gray-500 underline" style="cursor: pointer;" onclick="logoutUser()">Log out</a>`;
        } else {
            str += `<a href="/auth/login" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    <a href="/auth/register" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>`;
        }
    } catch (error) {
        str += `<a href="/auth/login" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        <a href="/auth/register" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>`;
    }
    homeNavbar.innerHTML = str;
}

async function getInfoUserLoginAdmin() {
    try {
        const response = await getInfoUser();
        console.log(checkRoleUser(response.data.data, "admin"));
        if (!checkRoleUser(response.data.data, "admin")) {
            location.replace(`/`);
            return;
        }
        renderInfoUserToNavbar(response.data.data);
    } catch (error) {
        console.log(error);
        location.replace(`/`);
        return;
    }
}
