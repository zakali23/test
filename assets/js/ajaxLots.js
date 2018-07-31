
//-------------------------- list copro -----------------------
showLots();
$('#listLots').keyup(showLots);

//appartementSelectCompteur

function showLots() {
    var str = $('#listLots').val();
    if (str.length === 0) {
        str = 'all';
    }
    console.log('ok');
    $.get( "http://localhost:8000/user/consultation/findlot/"+str, function( data ) {
        $("#Lots").html("");
        $.each(data, function(key, value){
            $("#Lots").append(
                "<form action=\"pieces\" method='post'>"+
                "<input type='hidden' name='idLot' value='"+ value['id'] +"'>"+
                "<div class=\"panel panel-default\">" + "<div class=\"panel-body text-center\">"+
                "<button id='"+ value['id'] +"' type='submit' name='envoiImmeuble'>Lots N° :"+ value['numero'] +" </button>" + "</div></form>"+"<div class=\"list-group-horizontal\">"+
                "<p class=\"list-group-item\">Etage :<br>" + value['etage'] + "</i>"+"</p>"+
                "<p class=\"list-group-item\">Surface en m2 :<br>" + value['surface'] + "</p>"+
                "<p class=\"list-group-item\">Tantieme :<br>" + value['tantieme'] + " </p>"+"</div>"+"</div>"+"<hr class=\"my-5\">"+
                "<p class='text-right'><button style='width: 10%' data-toggle=\"modal\" data-target='#myModalImg"+ value['id'] +"' >Photo</button></p>\"<hr class=\\\"my-5\\\">"+
                "<div class='modal fade' id='myModalImg"+ value['id'] +"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"+
                "<div class='modal-dialog' role='document'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'<span aria-hidden='true'>&times;</span></button>"+
                "<h4 class='modal-title text-center' id='myModalLabel'>Photo</h4>"+
                "</div>"+
                "<div class='modal-body'><img class=\"img-responsive\" style='width: 100%;\n" +
                "object-fit: cover;' alt=\"\" src='/images/lot/"+value['photo']+"' />"+
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
