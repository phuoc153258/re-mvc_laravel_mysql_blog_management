window.onload = async function () {
    setCookieLanguage();
    await getInfoUserLoginHome();
    await getList();
};
