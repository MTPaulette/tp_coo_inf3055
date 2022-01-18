
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
/*
               $.each($produits, function(key,value){
                   console.log(value);
               });
             */
            },
        });
    });
})

/*
function chargerProduit() {
    var i = 0;
    var select = document.getElementById('nom');

    xhttp = new XMLHttpRequest();
    xhttp.open("GET" , "../../../controllers/php/employe/chargerProduit.php");
    xhttp.onload = function() {
        
        if(xhttp.responseText == "") {
        }else{
        const resultat = JSON.parse(xhttp.responseText);
        resultat.forEach(produit => {
          /*  produits = "<option value="+produit['nomp']+">"+produit['nomp']+"</option><br>";
            select.append(produits);
        console.log(produit);
        });
       }
    }
    xhttp.send()
}  
*/