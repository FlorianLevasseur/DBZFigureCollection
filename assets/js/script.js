// if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
//     document.getElementById("myHeader").classList.replace("bg-white","darkBackColor")
//     document.getElementById("myLink").href = "assets/css/bootstrap.css"
//     document.getElementById("myAccount").classList.replace("account","accountDark")
//     document.getElementById("myNav").classList.replace("bg-light","bg-dark")
//     document.getElementById("myNav").classList.replace("navbar-light","navbar-dark")
//     document.getElementById("contentId").classList.replace("bg-white","bg-dark")
//     document.getElementById("foot1").classList.replace("footLink","footLinkDark")
//     document.getElementById("foot2").classList.replace("footLink","footLinkDark")
//     document.getElementById("foot3").classList.replace("footLink","footLinkDark")
//     document.getElementById("myFooter").classList.replace("bg-white","darkBackColor")
// }

document.getElementById("createAccount").addEventListener("click", () => {
    document.getElementById("contentId").innerHTML = `
                                                    <div class="row justify-content-center mb-4">
                                                    <div class="col-lg-6 text-center">
                                                        <p class="h3 mb-4">Créez votre compte</p>
                                                        <form class="connectForm pt-4">
                                                            <div class="form-group row pb-3">
                                                                <label class="col-4 form-control-label m-auto">Pseudo</label>
                                                                <div class="col-7">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                                <div class="col-1"></div>
                                                            </div>
                                                            <div class="form-group row pb-3">
                                                                <label class="col-4 form-control-label m-auto">E-mail</label>
                                                                <div class="col-7">
                                                                    <input class="form-control" type="mail">
                                                                </div>
                                                                <div class="col-1"></div>
                                                            </div>
                                                            <div class="form-group row pb-3">
                                                                <label class="col-4 form-control-label m-auto">Mot de Passe</label>
                                                                <div class="col-7">
                                                                    <input class="form-control" type="password">
                                                                </div>
                                                                <div class="col-1"></div>
                                                            </div>
                                                            <div class="form-group row pb-3">
                                                                <label class="col-4 form-control-label m-auto">Confirmez Mot de Passe</label>
                                                                <div class="col-7">
                                                                    <input class="form-control" type="password">
                                                                </div>
                                                                <div class="col-1"></div>
                                                            </div>
                                                            <button type="button"
                                                                class="btn btn-danger rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">ENREGISTRER</button>
                                                            <hr>
                                                            <p>Vous avez déjà un compte ? <a href="#" onclick="location.reload()">Connectez-vous !</a></p>
                                                        </form>
                                                    </div>
                                                    `    
})

