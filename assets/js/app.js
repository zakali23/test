import $ from "jquery"


$(document).ready(function()
{
    $("#appbundle_contact_vousEtes").change(function() {
        if ($(this).val() === "Syndic") {
            // language=JQuery-CSS
            $(".contact-form").css({"display": "none"});
            $(".syndic").css({"display": "contents"});
            $(".residence").css({"display": "contents"});
        }

        else if ($(this).val() === "null") {
                // language=JQuery-CSS
                $(".contact-form").css({"display": "none"});
                $(".syndic").css({"display": "none"});
                $(".residence").css({"display": "none"});
        }
        else {
                $(".contact-form").css({"display": "contents"});
                $(".syndic").css({"display": "contents"});
                $(".residence").css({"display": "contents"});
        }

    });
});

$(document).ready(function () {

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 20) {
            $('#myBtn').fadeIn();
        } else {
            $('#myBtn').fadeOut();
        }
    });

    //Click event to scroll to top
    $('#myBtn').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
});


var autocomplete = new google.maps.places.Autocomplete($("#appbundle_contact_adresseContact")[0], {});

google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    console.log(place.address_components);
});
var autocomplete = new google.maps.places.Autocomplete($("#appbundle_contact_adresseSyndic")[0], {});

google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    console.log(place.address_components);
});
// language=JQuery-CSS
var autocomplete = new google.maps.places.Autocomplete($("#appbundle_contact_adresseResidence")[0], {});

google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    console.log(place.address_components);
});
// contact form google map
var autocomplete = new google.maps.places.Autocomplete($("#appbundle_infocontact_adresseInfo")[0], {});

google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    console.log(place.address_components);
});
$(function () {
    $('#Envoyer').click(function(){
        var valid = true;

        if($('#appbundle_infocontact_nomInfo').val()=== ''){
            $('#nom_id').show();
            valid = false;

        }else if(!$('#appbundle_infocontact_nomInfo').val().match(/^[a-zA-Z]+$/i)){
            $('#nom_valid').show();


        }else{
            $('#nom_id').hide();
        }
        if($('#appbundle_infocontact_prenomInfo').val()=== ''){
            $('#prenom_id').show();
            valid = false;

        }else if(!$('#appbundle_infocontact_nomInfo').val().match(/^[a-zA-Z]+$/i)){
            $('#prenom_valid').show();


        }else{
            $('#prenom_id').hide();
        }
        if($('#appbundle_infocontact_emailInfo').val()=== ''){
            $('#email_id').show();
            valid = false;

        }else if (!$('#appbundle_infocontact_emailInfo').val().match(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i)){

            $('#email_valid').show();
        }else{
            $('#email_id').hide();
        }
        if($('#appbundle_infocontact_telephoneInfo').val()=== ''){
            $('#telephone_id').show();
            valid = false;

        }else if (!$('#appbundle_infocontact_telephoneInfo').val().match(/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/)){
            $('#telephone_valid').show();
        }
        else{
            $('#telephone_id').hide();
        }
        if($('#appbundle_infocontact_adresseInfo').val()=== ''){
            $('#adresse_id').show();
            valid = false;

        }else{
            $('#adresse_id').hide();
        }


     return valid;

    });
});









