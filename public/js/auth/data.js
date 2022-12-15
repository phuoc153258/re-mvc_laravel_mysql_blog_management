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
            await successNoti();
            location.replace(`/`);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
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
            await successNoti();
            location.replace(`/`);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
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
            await successNoti();
            location.replace(`/`);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
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
        [];
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
    const cookie = getCookie("X-localization");
    let str = "";
    try {
        const response = await getInfoUser();
        if (response.data.status) {
            str += `
            <a href="/blogs" class="nav-link">${
                cookie == "vie" ? "Trang chủ" : "Home"
            }</a>
             <a class="nav-link" style="cursor: pointer;" onclick="logoutUser()">${
                 cookie == "vie" ? "Đăng xuất" : "Logout"
             }</a>`;
        } else {
            str += `<a href="/auth/login" class="nav-link">${
                cookie == "vie" ? "Đăng nhập" : "Login"
            }</a>
            <a href="/auth/register" class="ml-4 nav-link">${
                cookie == "vie" ? "Đăng ký" : "Register"
            }</a>`;
        }
    } catch (error) {
        str += `<a href="/auth/login" class="nav-link">${
            cookie == "vie" ? "Đăng nhập" : "Login"
        }</a>
         <a href="/auth/register" class="ml-4 nav-link">${
             cookie == "vie" ? "Đăng ký" : "Register"
         }</a>`;
    }
    homeNavbar.innerHTML = str;
}

async function getInfoUserLoginAdmin() {
    try {
        const response = await getInfoUser();
        if (!checkRoleUser(response.data.data, "admin")) {
            location.replace(`/`);
            return;
        }
        renderInfoUserToNavbar(response.data.data);
    } catch (error) {
        location.replace(`/`);
        return;
    }
}

async function sendMailForgotPassword() {
    try {
        const email = document.getElementById("email-forgot-password-js");
        const response = await axios({
            method: "post",
            url: URLAuth + `/mails/${email.value}`,
            headers: {},
            data: {},
        });
        await swal(response.data.data, "", "success");
        document.getElementById("check-email-send-js").value = 1;
    } catch (error) {
        errorNoti();
        return;
    }
}

async function verifyOTPForgotPassword() {
    try {
        const emailCheck = document.getElementById("check-email-send-js").value;
        if (emailCheck == "0") {
            errorNoti();
            return;
        }
        const otp = document.getElementById("otp-forgot-password-js").value;
        const email = document.getElementById("email-forgot-password-js");
        const response = await axios({
            method: "post",
            url: URLAuth + `/mails/${email.value}/verify`,
            headers: {},
            data: {
                otp,
            },
        });
        await swal(response.data.message, "", "success");
        document.getElementById("check-otp-verify-js").value = 1;
        document.getElementById("token-reset-password-js").value =
            response.data.data;

        document.getElementById(
            "new-password-forgot-password-js"
        ).readOnly = false;
        document.getElementById(
            "confirm-password-forgot-password-js"
        ).readOnly = false;
    } catch (error) {
        errorNoti();
        return;
    }
}

async function resetPassword() {
    try {
        const emailCheck = document.getElementById("check-email-send-js").value;
        const otpCheck = document.getElementById("check-otp-verify-js").value;
        const password = document.getElementById(
            "new-password-forgot-password-js"
        ).value;
        const confirmPassword = document.getElementById(
            "confirm-password-forgot-password-js"
        ).value;
        const token = document.getElementById("token-reset-password-js").value;
        if (
            emailCheck == "0" ||
            otpCheck == "0" ||
            password != confirmPassword
        ) {
            errorNoti();
            return;
        }
        const response = await axios({
            method: "post",
            url: URLAuth + `/reset-password`,
            headers: {
                Authorization: "Bearer " + token,
            },
            data: {
                password,
            },
        });
        await swal(response.data.message, "", "success");
        location.replace(`/auth/login`);
    } catch (error) {
        errorNoti();
        return;
    }
}
