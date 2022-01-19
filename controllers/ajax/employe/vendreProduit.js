
$(function () {
    
    $('#nom').click(function(e){
        $.ajax({
            url: "../../../controllers/php/employe/chargerProduit.php",
            type: "GET",          
            contentType: "application/json",
            dataType: "JSON",
            
            success: function(produits) {
                //$(produits) = produits;
                console.log(produits);
                $.each(produits, function(i,produit) {
                    $html += "<option value="+produit[i]+">"+produit[2]+"</option><br>";
                    $html += "<option value="+produit['nomp']+">"+produit['nomp']+"</option><br>";
                })
				
                console.log(html);
                $('#nom').prepend(html)	
            },
            
        })
    })
})


/*
$(function () {
    
    $('#nom').focus(function(e){
        //alert('bjrrrrrrrr' );
        $.ajax({
            url: "../../../controllers/php/employe/chargerProduit.php",
            type: "GET",
            success: function(produits) {
                //$produits = $.parseJSON($(produits));
                console.log(produits);
                $('#nom').prepend(produits)
            },
        });
    });
})

*/