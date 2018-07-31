
//-------------------------- list copro -----------------------
showImmeuble();
$('#listImmeuble').keyup(showImmeuble);

//appartementSelectCompteur

function showImmeuble() {
    var str = $('#listImmeuble').val();
    if (str.length === 0) {
        str = 'all';
    }
    console.log('ok');
    $.get( "http://localhost:8000/user/consultation/finding/"+str, function( data ) {
        $("#immeuble").html("");
        $.each(data, function(key, value){
            $("#immeuble").append(
                "<form action=\"lots\" method='post'>"+
                "<input type='hidden' name='idImmeuble' value='"+ value['id'] +"'>"+
                "<div class=\"panel panel-default\">" + "<div class=\"panel-body text-center\">"+
                "<h2 class='text-center'>Immeuble : </h2>"+
                "<button id='"+ value['id'] +"' type='submit' name='envoiImmeuble'>N° :"+ value['reference'] +" </button>" + "</div></form>"+"<div class=\"list-group-horizontal\">"+
                "<p class=\"list-group-item\">Adresse :<br>" + value['adresse'] + "<br><i class=\"fas fa-street-view  fa-lg\">"+"</i>"+"</p>"+
                "<p class=\"list-group-item\">Code Postal :<br>" + value['codePostal'] + " <br><i class=\"fas fa-map-signs fa-lg\">"+"</i>"+"</p>"+
                "<p class=\"list-group-item\">Ville :<br>" + value['ville'] + " <br><i class=\"fas fa-map-marker-alt fa-lg\">"+"</i>"+"</p>"+"</div>"+"</div>"+
                "<p class='text-right'><button style='width: 10%' data-toggle=\"modal\" data-target='#myModal"+ value['id'] +"' >Le plan</button></p>\"<hr class=\\\"my-5\\\">"+
                "<div class='modal fade' id='myModal"+ value['id'] +"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"+
                "<div class='modal-dialog' role='document'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'<span aria-hidden='true'>&times;</span></button>"+
                "<h4 class='modal-title text-center' id='myModalLabel'>Plan</h4>"+
                "</div>"+
                "<div class='modal-body'><img class=\"img-responsive\" alt=\"\" src='/images/immeuble/"+value['plan']+"' />"+
                "</div>"+
                "<div class='modal-footer'>"+
                "<button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "</div>"
            );

        });

    });


}
