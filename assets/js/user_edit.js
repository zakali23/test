$(document).ready(function() {

    $('input[type="checkbox"]').click(function () {
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });

    /* Quand je selectionne utilisateur les autres checkbox disparaissent*/
    $(function () {
        $("#appbundle_user_roles_0").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").show();
                $(".gestion").hide();
                $(".salarie").hide();
                $(".user").hide();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });

        $("#appbundle_user_roles_1").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").hide();
                $(".gestion").show();
                $(".salarie").hide();
                $(".user").hide();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").show();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });

        $("#appbundle_user_roles_2").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").hide();
                $(".gestion").hide();
                $(".salarie").show();
                $(".user").hide();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").show();
                $(".statut_delegueCoPro").hide();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });


        $("#appbundle_user_roles_3").click(function () {
            if ($(this).is(":checked")) {
                $(".admin").hide();
                $(".gestion").hide();
                $(".salarie").hide();
                $(".user").show();
                $(".statut_habitant").show();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            } else {
                $(".admin").show();
                $(".gestion").show();
                $(".salarie").show();
                $(".user").show();
                $(".statut_habitant").hide();
                $(".statut_gestionnaire").hide();
                $(".statut_delegueCoPro").hide();

            }
        });
    });
});


