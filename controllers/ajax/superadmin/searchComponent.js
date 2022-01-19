
$(function () {
    
    $('#search').keyup(function(e){
        var search = $('#search').val();
        //alert(search.length)
        if(search.length >= 3){
        $.ajax({
            url: " ../../../controllers/php/superadmin/rechercherDirecteurAjax.php",
            type: "POST",
            data: {'search' : search},
                   
            //contentType: "application/json",
            dataType: "JSON",
            
            error: function(error) {
                console.log(error);
            },
            success: function(response) {
                //$(response) = response;
                var html = '';
                console.log("------------------------------------------------------");
                $(location).attr("href","../../../views/pages/superadmin/searchComponent.php");

                //console.log(response);
                $.each(response, function(i,element) {
                    console.log("------------------------------------------------------");
                    console.log(element);


/*
        html = "<div class='mysearch-dark row no-gutters'>"+  
             "<div class='img'>"+  
                if(!$search['photo']) {
                    "<p class='pasDePhoto'><img src=''></p>"+  
                }else {
                     "<img src="  +search['photo'] +" alt=''>"+  
                }
             "</div>"+  
             "<div class='card-body'>"+  */
/*
    html = " <h5 class='card-title'> Nom: " +element['nom'] +"</h5>"+  
            "<p class='card-text'>Localisation: " +element['localisation'] +"</p>"+  
             "<p class='card-text'>Directeur: " +element['loginDirecteur'] +"</p>"+  
             "<p class='card-text'> <small class='text-muted'>Etat: " +element['etat'] +"</small></p>"+  
             "<p class='card-text'> <small class='text-muted'> créé le: " +element['createdAt'] +"</small></p>"+  

                //modal pour la confirmation de l'activation 
                 "<button type='button' class='btn btn-success' id='btn-activer' data-toggle='modal' data-target='#activer'>activer</button>"+
                "<div class='modal' id='activer'>"+
                    "<div class='modal-dialog'>"+
                        "<div class='modal-content'>"+
            
                            "<div class='modal-header'>"+
                                "<h5 class='modal-title attention'>ATTENTION!!!!</h5>"+
                                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                            "</div>"+
            
                            "<div class='modal-body'>"+
                                "<span class='msg'>Vous vous apprettez à effectuer une operation sensible + Veuillez entrer votre mot de passe pour confirmer</span>"+
                                "<form class='form-inline' action=' + +/ + +/ + +/controllers/php/superadmin/activerDirecteur +php'  method='post' name='rechercher'> "+ 
                                 "<input type='hidden' name='directeurSelectionne' value=' +element['nom']'> "+ 
                                 "<div class='form-group mx-sm-3 mb-2'>"+
                                        "<input type='password' class='form-control' id='password' name='password' placeholder=''>"+
                                        "<button type='submit' class='btn btn-success'>activer</button>"+
                                    "</div>"+
                                "</form>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+  

                //modal pour la confirmation de la suspendre 
                 "<button type='button' class='btn btn-secondary' id='btn-suspendre' data-toggle='modal' data-target='#suspendre'>suspendre</button>"+  
                 "<div class='modal' id='suspendre'>"+
                    "<div class='modal-dialog'>"+
                        "<div class='modal-content'>"+
            
                            "<div class='modal-header'>"+
                                "<h5 class='modal-title attention'>ATTENTION!!!!</h5>"+
                                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                            "</div>"+
            
                            "<div class='modal-body'>"+
                                "<span class='msg'>Vous vous apprettez à effectuer une operation sensible + Veuillez entrer votre mot de passe pour confirmer</span>"+
                                "<form class='form-inline' action=' + +/ + +/ + +/controllers/php/superadmin/suspendreDirecteur +php'  method='post'>"+
                                 "<input type='hidden' name='directeurSelectionne' value=' +element['nom']> "+
                                 "<div class='form-group mx-sm-3 mb-2'>"
                                        "<input type='password' class='form-control' id='password' name='password' placeholder=''>"+
                                        "<button type='submit' class='btn btn-secondary'>suspendre</button>"+
                                    "</div>"+
                                "</form>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+ 


                //modal pour la confirmation de la suppression 
                 "<button type='button' class='btn btn-danger' id='btn-supprimer' data-toggle='modal' data-target='#supprimer'>supprimer</button>"+
                "<div class='modal' id='supprimer'>"+
                    "<div class='modal-dialog'>"+
                        "<div class='modal-content'>"+
            
                            "<div class='modal-header'>"+
                                "<h5 class='modal-title attention'>ATTENTION!!!!</h5>"+
                                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                            "</div>"+
            
                            "<div class='modal-body'>"+
                                "<span class='msg'>Vous vous apprettez à effectuer une operation sensible + Veuillez entrer votre mot de passe pour confirmer</span>"+
                                "<form class='form-inline' action=' + +/ + +/ + +/controllers/php/superadmin/supprimerDirecteur +php'  method='post'>  "+
                                 "<input type='hidden' name='directeurSelectionne' value=' +element['nom']'> "+ 
                                 "<div class='form-group mx-sm-3 mb-2'>"+
                                        "<input type='password' class='form-control' id='password' name='password' placeholder=''>"+
                                        "<button type='submit' class='btn btn-danger'>supprimer</button>"+
                                    "</div>"+
            
                                "</form>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+

             "</div>"+
             "</div>";
*/
                 //html += "<option value="+produit[i]+">"+produit[2]+"</option><br> 
                 //html += "<option value="+produit['nomp']+">"+produit['nomp']+"</option><br>  
             })
            
           //  $('#ajaxSearch').html(html);
             	
         },
     })
    }
 })
})
