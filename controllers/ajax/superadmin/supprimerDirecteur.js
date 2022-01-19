
    function supprimer(e){
        console.log(e)
        
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
               // console.log(response);
                /*
                if(response) {
                    alert("bjr");
                }
                /*
                //$(produits) = produits;
                var html = '';
                console.log(produits);
                $.each(produits, function(i,produit) {
                    console.log(produit)
                    //html += "<option value="+produit[i]+">"+produit[2]+"</option><br>";
                    html += "<option value="+produit['nomp']+">"+produit['nomp']+"</option><br>";
                })
				
                console.log(html);
                $('#nom').prepend(html)	
                */
            },
            
        })
    }
    //})
//})
   
//})
 }