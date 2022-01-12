function validateEnregistrement(){
    var form = document.forms["enregistrement"];
    var nom = form["nom"].value;
    var login = form["login"].value;
    var password = form["password"].value;
    var p = document.getElementById("error")
    
    if(nom == "" && login == "" && password == ""){
     
 //   if(nom == "" || prenom == "" || login == "" || region == "" || departement == "" || arrondissement == ""){
        p.textContent = "Veuillez remplir tous les champs du formulaire";
        e.preventDefault();
    }else if(nom == ""){
        p.textContent = "Veuillez entrer votre nom";
        e.preventDefault();
    }else if(login == ""){
        p.textContent = "Veuillez entrer votre login";
        e.preventDefault();
    }else if(password == ""){
        p.textContent = "Veuillez entrer votre mot de passe";
        e.preventDefault();
    }else {
        validatePassword();
    }
}   

function validatePassword(){
    var form = document.forms["enregistrement"];
    var password = form["password"].value;
    var p = document.getElementById("error")

    if(password.length < 6){
        p.textContent = "votre mot de passe doit avoir au moins 6 caracteres";
        e.preventDefault();
    }
}
function validateConnexion(){
    var form = document.forms["connexion"];
    var login = form["login"].value;
    var password = form["password"].value;
    var p = document.getElementById("error")
    
    if(login == "" && password == ""){
     
 //   if(nom == "" || prenom == "" || login == "" || region == "" || departement == "" || arrondissement == ""){
        p.textContent = "Veuillez remplir tous les champs du formulaire";
        e.preventDefault();
    }else if(login == ""){
        p.textContent = "Veuillez entrer votre login";
        e.preventDefault();
    }else if(password == ""){
        p.textContent = "Veuillez entrer votre mot de passe";
        e.preventDefault();
    }
} 