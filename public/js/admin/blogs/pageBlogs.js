window.onload = async function () {
    setCookieLanguage();
    await getInfoUserLoginAdmin();
    await getList();
    addEventUploadFile();
};
