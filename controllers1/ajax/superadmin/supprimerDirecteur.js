
    function supprimer(e){
        console.log(e)
        alert(e.getAttribute('id'));
        
        console.log(e.attr('id'));
//$(function () {
 alert("bjrrrrrrrrrrrrrrr");

   //$('#supprimer').on('shown.bs.modal',function(e){
   // $('#btn-supprimer').click(function(e){
        alert(e.which);
        var password = $('#input-password-delete').val();
        var directeurSelectionne = $('#hidden-delete-password').attr('value');

    if(password.length != 0 && password != ''){
        console.log(password);
        console.log(directeurSelectionne);
        $.ajax({
            url: "../../../controllers/php/superadmin/supprimerDirecteur.php",
            type: "POST",
            data: {'password' : password , 'directeurSelectionne' : directeurSelectionne},
            //dataType: "JSON",
            
            error: function(error) {
                console.log("++++++++errrrrrrrrrrrrrrrrrrrrrrrrrrroooooooooooooooooooorrrrrrrrrrrrrrrrrrrrrr+++++++++");
                //console.log(error);
            },
            success: function(response) {
                console.log("+++++++++++++++++++++++++++++++++++++++++");
                
            }
            
        })
    }
 }
 