window.onload = async function () {
    setCookieLanguage();
    await getInfoUserLogin();
    await checkLoginToComment();
    await getBlog();
    await getCommentBlog();
    await getReport();
};
