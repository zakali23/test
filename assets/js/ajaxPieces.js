
//-------------------------- list pieces -----------------------
showRooms();
$('#listPieces').keyup(showRooms);

//appartementSelectCompteur

function showRooms() {
    var str = $('#listPieces').val();
    if (str.length === 0) {
        str = 'all';
    }
    console.log('ok');
    $.get( "http://localhost:8000/user/consultation/findrooms/"+str, function( data ) {
        $("#rooms").html("");
        $.each(data, function(key, value){
            $("#rooms").append(
                "<form action=\"pieces\" method='post'>"+
                "<input type='hidden' name='idLot' value='"+ value['id'] +"'>"+
                "<div class=\"panel panel-default\">" + "<div class=\"panel-body text-center\">"+
                "<button id='"+ value['id'] +"' type='submit' name='envoiImmeuble'>Piece :"+ value['nom'] +" </button>" + "</div></form>"+"<div class=\"list-group-horizontal\">"+
                "<p class=\"list-group-item\"> Consommation <br><br><a href=\"consultation/lots/pdf\" target=\"_blank\" class=\"btn btn-primary\">Voir la consommation</a><br><br><a href=\"consultation/lots/dl\" class=\"btn btn-primary\">Télécharger la consommation</a></p>"+
                "<p class=\"list-group-item\">Surface en m2: <br><br><br><span style='font-size: 20px;'>" + value['surface'] + "</span></p>"+
                "<p class=\"list-group-item\">Compteur :"+"</div>"+"</div>"+
                "<p class='text-right'><button style='width: 10%' data-toggle=\"modal\" data-target='#myModalImgRoom"+ value['id'] +"' >Photo</button></p><hr class=\\\"my-5\\\">"+

                "<div class='modal fade' id='myModalImgRoom"+ value['id'] +"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"+
                "<div class='modal-dialog' role='document'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'<span aria-hidden='true'>&times;</span></button>"+
                "<h4 class='modal-title text-center' id='myModalLabel'>Photo</h4>"+
                "</div>"+
                "<div class='modal-body'><img class='img-responsive' style='width: 100%;\n" +
                "object-fit: cover;' src='/images/lot/"+value['photo']+"' />"+
                "</div>"+
                "<div class='modal-footer'>"+
                "<button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "</div>");

        });

    });


}
