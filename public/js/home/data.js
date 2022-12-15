async function getListViewBlog() {
    try {
        const response = await axios({
            method: "post",
            url: "/api/blog" + "/logout",
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
