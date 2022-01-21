
$(function () {
    
   // $('#nom').click(function(e){
        $.ajax({
            url: "../../../controllers/php/employe/chargerProduit.php",
            type: "GET",          
            contentType: "application/json",
            dataType: "JSON",
            
            success: function(produits) {
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
            },
            
        })
    //})
})
