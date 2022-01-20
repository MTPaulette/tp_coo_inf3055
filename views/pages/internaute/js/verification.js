function surligne(champ, erreur)
{

   if(erreur)
        champ.style.backgroundColor = "#fba";
   else
        champ.style.backgroundColor = "";
}

function verifLogin(champ)
{

   if(champ.value.length < 4 || champ.value.length > 15)
   {

        surligne(champ, true);
        return false;
   }

   else
   {
        surligne(champ, false);
        return true;
   }
}

function verifMail(champ)
{

   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {

        surligne(champ, true);
        return false;
   }

   else
   {

        surligne(champ, false);
        return true;
   }
}
function verifContact(champ)
{
    var regex = new RegExp(/^(01|02|03|04|05|06|07|08)[0-9]{9}/gi);
    var match = false;
    if(regex.test(champ))
    {
          surligne(champ,true)
          match = false;
    }
    
    else
    {
          surlgner(champ,false);
          match = false;
        
    }
            
}

function verifForm(f)
{

    var loginOk = verifLogin(f.login);
    var mailOk = verifMail(f.email);
    var contactOk = verifContact(f.contact);
   
    if(loginOk && mailOk && contactOk)
      return true
    
    else
    {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}
