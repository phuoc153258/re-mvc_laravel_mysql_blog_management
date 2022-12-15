async function getList() {
    try {
        const pageItem = getPageItem();
        const response = await axios({
            method: "get",
            url: "/api/blogs/views?page=" + pageItem.value,
        });
        if (response.data.status) {
            renderListViewBlog(response.data.data);
            renderDataToListPage(response.data.data);
        }
    } catch (error) {
        console.log(error);
        await errorNoti();
        return;
    }
}
