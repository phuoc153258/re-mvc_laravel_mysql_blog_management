window.onload = async function () {
    setCookieLanguage();
    await getInfoUserLogin();
    await getList();
};
