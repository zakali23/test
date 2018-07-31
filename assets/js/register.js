$(document).ready(function(){

    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });

    /* Quand je selectionne utilisateur les autres checkbox disparaissent*/
    $(function () {
        $("#fos_user_registration_form_roles_0").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").show();
                $(".gestion").hide();
                $(".salarie").hide();
                $(".technicien").hide();
                $(".user").hide();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".technicien").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });

        $("#fos_user_registration_form_roles_1").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").hide();
                $(".gestion").show();
                $(".salarie").hide();
                $(".technicien").hide();
                $(".user").hide();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").show();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".technicien").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });

        $("#fos_user_registration_form_roles_2").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").hide();
                $(".gestion").hide();
                $(".salarie").show();
                $(".technicien").hide();
                $(".user").hide();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").show();
                $(".statut_delegueCoPro").hide();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".technicien").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });


        $("#fos_user_registration_form_roles_3").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").hide();
                $(".gestion").hide();
                $(".salarie").hide();
                $(".technicien").show();
                $(".user").hide();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".technicien").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });

        $("#fos_user_registration_form_roles_4").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").hide();
                $(".gestion").hide();
                $(".salarie").hide();
                $(".technicien").hide();
                $(".user").show();
                $(".statut_habitant").show();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".technicien").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });


    });

});
