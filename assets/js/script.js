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


// document.getElementById("inputGroupSelect01").addEventListener('change', () => {
//     document.getElementById("inputGroupSelect02").disabled = false;
//     document.getElementById("inputGroupSelect03").disabled = true;
//     document.getElementById("inputGroupSelect03").innerHTML = `<option selected disabled>Choix...</option>`
//     if (document.getElementById("inputGroupSelect01").value == 1) {
//         document.getElementById("inputGroupSelect02").innerHTML =
//             `<option selected disabled>Choix...</option>
//             <?php foreach($allCharactersArray as $figure) { ?>
//             <option><?= $figure['character'] ?></option>
//             <?php } ?>`
//         location.reload();
//     }
//     if (document.getElementById("inputGroupSelect01").value == 2) {
//         document.getElementById("inputGroupSelect02").innerHTML =
//             `<option selected disabled>Choix...</option>
//          <option value='1'>Master Stars Piece</option>
//          <option value='2'>BWFC</option>`
//     }
//     if (document.getElementById("inputGroupSelect01").value == 3) {
//         document.getElementById("inputGroupSelect02").innerHTML =
//             `<option selected disabled>Choix...</option>
//          <option value='1'>2021</option>
//          <option value='2'>2020</option>`
//     }
//     if (document.getElementById("inputGroupSelect01").value == 4) {
//         document.getElementById("inputGroupSelect02").innerHTML =
//             `<option selected disabled>Choix...</option>
//          <option value='1'>Entre 16 et 20 cm</option>
//          <option value='2'>Entre 21 et 25 cm</option>`
//     }
// })

// document.getElementById("inputGroupSelect02").addEventListener('change', () => {
//     document.getElementById("inputGroupSelect03").disabled = false;
//     if (document.getElementById("inputGroupSelect01").value == 1) {
//         if (document.getElementById("inputGroupSelect02").value == 1) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option selected disabled>Choix...</option>
//              <option value='1'>Petit</option>
//              <option value='2'>Normal</option>
//              <option value='3'>SSJ</option>
//              <option value='4'>SSJ2</option>
//              <option value='5'>SSJ3</option>
//              <option value='6'>SSJ4</option>
//              <option value='7'>SSG</option>
//              <option value='8'>SSGSS</option>
//              <option value='9'>Migatte No Goku'i</option>`
//         }
//         if (document.getElementById("inputGroupSelect02").value == 2) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option selected disabled>Choix...</option>
//              <option value='1'>Normal</option>
//              <option value='2'>SSJ</option>
//              <option value='3'>SSJ2</option>
//              <option value='4'>SSJ2 (Majin)</option>
//              <option value='5'>SSJ4</option>
//              <option value='6'>SSG</option>
//              <option value='7'>SSGSS</option>`
//         }
//     }
//     if (document.getElementById("inputGroupSelect01").value == 2) {
//         if (document.getElementById("inputGroupSelect02").value == 1) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option value='1' selected>Toutes</option>`
//         }
//         if (document.getElementById("inputGroupSelect02").value == 2) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option value='1' selected>Toutes</option>`
//         }
//     }
//     if (document.getElementById("inputGroupSelect01").value == 3) {
//         if (document.getElementById("inputGroupSelect02").value == 1) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option selected disabled>Choix...</option>
//              <option value='1'>Tous les mois</option>
//              <option value='2'>Janvier</option>
//              <option value='3'>Février</option>
//              <option value='4'>Mars</option>
//              <option value='5'>Avril</option>
//              <option value='6'>Mai</option>
//              <option value='7'>Juin</option>
//              <option value='8'>Juillet</option>
//              <option value='9'>Août</option>
//              <option value='10'>Septembre</option>
//              <option value='11'>Octobre</option>
//              <option value='12'>Novembre</option>
//              <option value='13'>Décembre</option>`
//         }
//         if (document.getElementById("inputGroupSelect02").value == 2) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option selected disabled>Choix...</option>
//              <option value='1'>Tous les mois</option>
//              <option value='2'>Janvier</option>
//              <option value='3'>Février</option>
//              <option value='4'>Mars</option>
//              <option value='5'>Avril</option>
//              <option value='6'>Mai</option>
//              <option value='7'>Juin</option>
//              <option value='8'>Juillet</option>
//              <option value='9'>Août</option>
//              <option value='10'>Septembre</option>
//              <option value='11'>Octobre</option>
//              <option value='12'>Novembre</option>
//              <option value='13'>Décembre</option>`
//         }
//     }
//     if (document.getElementById("inputGroupSelect01").value == 4) {
//         if (document.getElementById("inputGroupSelect02").value == 1) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option selected disabled>Choix...</option>
//              <option value='1'>Toutes</option>
//              <option value='2'>16 cm</option>
//              <option value='3'>17 cm</option>
//              <option value='4'>18 cm</option>
//              <option value='5'>19 cm</option>
//              <option value='6'>20 cm</option>`
//         }
//         if (document.getElementById("inputGroupSelect02").value == 2) {
//             document.getElementById("inputGroupSelect03").innerHTML =
//                 `<option selected disabled>Choix...</option>
//             <option value='1'>Toutes</option>
//             <option value='2'>21 cm</option>
//             <option value='3'>22 cm</option>
//             <option value='4'>23 cm</option>
//             <option value='5'>24 cm</option>
//             <option value='6'>25 cm</option>`
//         }
//     }

// })