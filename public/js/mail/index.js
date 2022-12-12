async function handleVerifyEmail() {
    try {
        const token =
            "Bearer " +
            window.location.pathname
                .split("/")[5]
                .replace("%7C", "|")
                .toString();
        const response = await axios({
            method: "post",
            url: "/api/users/me/verify-mail/handle",
            data: {},
            headers: {
                Authorization: token || getCookie("access_token"),
            },
        });
        await successNoti();
    } catch (error) {
        await errorNoti();
        return;
    }
}
