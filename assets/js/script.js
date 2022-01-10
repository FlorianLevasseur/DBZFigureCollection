let date = new Date(Date.now() + 86400000); //86400000ms = 1 jour
date = date.toUTCString();

document.getElementById("darkSwitch").addEventListener("click", () => {
    if (document.getElementById("myHeader").classList.contains("bg-white")) {
        document.getElementById("myHeader").classList.replace("bg-white", "darkBackColor")
        document.getElementById("myLink").href = "assets/css/bootstrap.css"
        document.getElementById("myAccount").classList.replace("account", "accountDark")
        document.getElementById("myNav").classList.replace("bg-light", "bg-dark")
        document.getElementById("myNav").classList.replace("navbar-light", "navbar-dark")
        document.getElementById("contentId").classList.replace("bg-white", "bg-dark")
        document.getElementById("foot1").classList.replace("footLink", "footLinkDark")
        document.getElementById("foot2").classList.replace("footLink", "footLinkDark")
        document.getElementById("foot3").classList.replace("footLink", "footLinkDark")
        document.getElementById("myFooter").classList.replace("bg-white", "darkBackColor")
        document.body.classList.replace("bg-white", "darkBackColor")
        document.cookie = 'user=DarkMode; path=/; expires=' + date;
    } else {
        document.getElementById("myHeader").classList.replace("darkBackColor", "bg-white")
        document.getElementById("myLink").href = "#"
        document.getElementById("myAccount").classList.replace("accountDark", "account")
        document.getElementById("myNav").classList.replace("bg-dark", "bg-light")
        document.getElementById("myNav").classList.replace("navbar-dark", "navbar-light")
        document.getElementById("contentId").classList.replace("bg-dark", "bg-white")
        document.getElementById("foot1").classList.replace("footLinkDark", "footLink")
        document.getElementById("foot2").classList.replace("footLinkDark", "footLink")
        document.getElementById("foot3").classList.replace("footLinkDark", "footLink")
        document.getElementById("myFooter").classList.replace("darkBackColor", "bg-white")
        document.body.classList.replace("darkBackColor", "bg-white")
        document.cookie = 'user=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
    }
})
if (document.getElementById("darkSwitch").checked) {
    document.getElementById("myHeader").classList.replace("bg-white", "darkBackColor")
    document.getElementById("myLink").href = "assets/css/bootstrap.css"
    document.getElementById("myAccount").classList.replace("account", "accountDark")
    document.getElementById("myNav").classList.replace("bg-light", "bg-dark")
    document.getElementById("myNav").classList.replace("navbar-light", "navbar-dark")
    document.getElementById("contentId").classList.replace("bg-white", "bg-dark")
    document.getElementById("foot1").classList.replace("footLink", "footLinkDark")
    document.getElementById("foot2").classList.replace("footLink", "footLinkDark")
    document.getElementById("foot3").classList.replace("footLink", "footLinkDark")
    document.getElementById("myFooter").classList.replace("bg-white", "darkBackColor")
    document.body.classList.replace("bg-white", "darkBackColor")
}