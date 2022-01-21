
$(function () {
    
    $('#search').keyup(function(e){
        //alert( $('#search').val() );
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

        var search = encodeURIComponent( $('#search').val() ); // on sécurise les données

        if(search != ""){ // on vérifie que les variables ne sont pas vides
            $.post(
                '../../../controllers/php/superadmin/rechercherDirecteur.php',
                {
                    search: search
                },
                function(data) {
                    window.location.href = "Location:../../../views/pages/superadmin/searchComponent.php"
                },
                ''
            );

        }

    });
})