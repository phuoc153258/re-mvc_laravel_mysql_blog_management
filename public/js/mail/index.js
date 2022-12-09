async function handleVerifyEmail() {
    try {
        const response = await axios({
            method: "post",
            url: "/api/users/me/verify-mail/handle",
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        await successNoti();
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}
