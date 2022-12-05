function addHrefBackToDetailUser() {
    const userId = window.location.pathname.split("/")[3];
    document.getElementById("back-to-details-user-js").href =
        "/users/" + userId;
}

window.onload = async function () {
    await getInfoUserLogin();
    addHrefBackToDetailUser();
};
