
$(function () {
   $('#supprimer').on('show.bs.modal',function(e){
    $e =  e.stopPropagation();
    console.log(e)
    $('#password').keyup(function(e){
        console.log('bjrrrr');
        console.log($('#password').attr('value'));
        alert('+++++++++++++++++++'+$('#password').val());
        $.ajax({
            url: "../../../controllers/php/superadmin/supprimerDirecteur.php",
            type: "GET",          
            contentType: "application/json",
            dataType: "JSON",
            
            success: function(response) {
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
    })
})
})
