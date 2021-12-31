function afficheArticle() {
    var titre = document.getElementsByClassName('title');
    var enseignant = document.getElementById('nom');
    var p = document.getElementsByClassName('info');
    var voirPlus = document.getElementsByClassName('voirPlus');
    var contenu = document.getElementsByClassName('name');
    var i = 0;

    xhttp = new XMLHttpRequest();
    xhttp.open("GET" , "../../php/afficheArticle.php");
    xhttp.onload = function() {
        console.log(xhttp.responseText);
        
        if(xhttp.responseText == "") {
        }else{
        const resultat = JSON.parse(xhttp.responseText);
        resultat.forEach(element => {
            titre[i].textContent = resultat[i][1];
            contenu[i].textContent = resultat[i][2];
            voirPlus[i].textContent = resultat[i][3];
            enseignant.textContent = resultat[i][4];
            p[0].textContent = resultat.length;
            i = i+1; 
        });
        console.log(resultat);
       }
    }
    xhttp.send()
}  
function afficheCours() {
    var titre = document.getElementsByClassName('title');
    var enseignant = document.getElementById('nom');
    var voirPlus = document.getElementsByClassName('voirPlus');
    var p = document.getElementsByClassName('info');
    var contenu = document.getElementsByClassName('name');
    var i = 0;

    xhttp = new XMLHttpRequest();
    xhttp.open("GET" , "../../php/afficheCours.php");
    xhttp.onload = function() {
        console.log(xhttp.responseText);
        
        if(xhttp.responseText == "") {
        }else{
        const resultat = JSON.parse(xhttp.responseText);
        resultat.forEach(element => {
            console.log(xhttp.responseText);
            titre[i].textContent = resultat[i][1];
            contenu[i].textContent = resultat[i][2];
            enseignant.textContent = resultat[i][4];
            p[0].textContent = resultat.length;

            voirPlus[i].textContent = resultat[i][3];
            i = i+1; 
        });
        console.log(resultat);
       }
    }
    xhttp.send()
}  

function afficheCV() {
    var nom = document.getElementsByClassName('nom');
    var fonction = document.getElementsByClassName('fonction');
    var localisation = document.getElementsByClassName('localisation');
    var email = document.getElementsByClassName('email');
    var competences = document.getElementsByClassName('competences');
    var presentation = document.getElementsByClassName('presentation');

    var experiences = document.getElementsByClassName('experiences');
    var education = document.getElementsByClassName('education');

    var voirPlus = document.getElementsByClassName('voirPlus');

    xhttp = new XMLHttpRequest();
    xhttp.open("GET" , "../../php/afficheCV.php");
    xhttp.onload = function() {
        if(xhttp.responseText == "") {
        }else{
            const resultat = JSON.parse(xhttp.responseText);
                nom[0].textContent = resultat[1];
                fonction[0].textContent = resultat[4];
                localisation[0].textContent = resultat[8];
                email[0].textContent = resultat[2];
                competences[0].textContent = resultat[10];
                presentation[0].textContent = resultat[5];
                experiences[0].textContent = resultat[11];
                education[0].textContent = resultat[9];

            voirPlus[0].textContent = resultat[7];

            console.log(resultat);
        }
        
    }
    xhttp.send()
} 

function affichePresentation() {
    var presentation = document.getElementsByClassName('presentation');
    var nom = document.getElementsByClassName('nom');
    var fonction = document.getElementsByClassName('fonction');
    var email = document.getElementsByClassName('email');
    var photo = document.getElementsByClassName('photo');
    var laphoto = document.getElementById('laphoto');
    /*
    var competences = document.getElementsByClassName('competences');
    var experiences = document.getElementsByClassName('experiences');
    var education = document.getElementsByClassName('education');
*/
    xhttp = new XMLHttpRequest();
    xhttp.open("GET" , "../../php/afficheCV.php");
    xhttp.onload = function() {
        if(xhttp.responseText == "") {
        }else{
            const resultat = JSON.parse(xhttp.responseText);
                presentation[0].textContent = resultat[5];
                nom[0].textContent = resultat[0];
                fonction[0].textContent = resultat[1];
               // photo[0].textContent = resultat[2];
                email[0].textContent = resultat[2];

                var fileNewName = resultat[6];
                var src = '../dashboard/upload/'+fileNewName;
                laphoto.setAttribute('src',src);

                /*
                localisation[0].textContent = resultat[2];
                competences[0].textContent = resultat[4];
                experiences[0].textContent = resultat[6];
                education[0].textContent = resultat[7];
                */
            console.log(resultat);
        }
        
    }
    xhttp.send()
} 

function redirection(element) {
    var fichier = element.innerHTML;
    //window.location.replace('http://localhost/tp_cms/html/dashboard/upload/dora_a.pdf')
    window.location.href = 'http://localhost/tp_cms/html/dashboard/upload/'+fichier;
    alert(fichier);
}
    
//fonction du choix des themes
function theme1() {
    alert("1")
    xhttp = new XMLHttpRequest();
    xhttp.open("POST" , "../../php/theme1.php");
    xhttp.send()

}

function theme2() {
    alert("2")
    xhttp = new XMLHttpRequest();
    xhttp.open("POST" , "../../php/theme2.php");
    xhttp.send()

}

function theme3() {
    alert("3")
    xhttp = new XMLHttpRequest();
    xhttp.open("POST" , "../../php/theme3.php");
    xhttp.send()

}