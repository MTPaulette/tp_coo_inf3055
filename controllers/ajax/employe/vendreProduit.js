
$(function () {
    
    $('#nom').click(function(e){
        $.ajax({
            url: "../../../controllers/php/employe/chargerProduit.php",
            type: "GET",
            
            contentType: "application/json",
            dataType: "JSON",
            
            success: function(produits) {
                console.log(produits);
                console.log(JSON.parse(produits));
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