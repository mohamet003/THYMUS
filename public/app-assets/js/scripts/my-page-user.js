$(document).ready(function(){var s,e=[];0<$("#users-list-datatable").length&&(s=$("#users-list-datatable").DataTable({responsive:!0,
  language: {
    "sEmptyTable":     "Aucune donnée disponible dans le tableau",
    "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
    "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
    "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
    "sInfoPostFix":    "",
    "sInfoThousands":  ",",
    "sLengthMenu":     "Afficher _MENU_ éléments",
    "sLoadingRecords": "Chargement...",
    "sProcessing":     "Traitement...",
    "sSearch":         "Rechercher :",
    "sZeroRecords":    "Aucun élément correspondant trouvé",
    "oPaginate": {
      "sFirst":    "Premier",
      "sLast":     "Dernier",
      "sNext":     "Suivant",
      "sPrevious": "Précédent"
    },
    "oAria": {
      "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
      "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
    },
    "select": {
      "rows": {
        "_": "%d lignes sélectionnées",
        "0": "Aucune ligne sélectionnée",
        "1": "1 ligne sélectionnée"
      }
    }
  },
  columnDefs:[{orderable:!1,targets:[0,8,9]}]})),$(document).on("click","#users-list-datatable tr",function(){$(this).find("td").each(function(){e.push($(this).text().trim())}),localStorage.setItem("usersId",e[1]),localStorage.setItem("usersUsername",e[2]),localStorage.setItem("usersName",e[3]),localStorage.setItem("usersVerified",e[5]),localStorage.setItem("usersRole",e[6]),localStorage.setItem("usersStatus",e[7])}),void 0!==localStorage.usersId&&($(".users-view-id").html(localStorage.getItem("usersId")),$(".users-view-username").html(localStorage.getItem("usersUsername")),$(".users-view-name").html(localStorage.getItem("usersName")),$(".users-view-verified").html(localStorage.getItem("usersVerified")),$(".users-view-role").html(localStorage.getItem("usersRole")),$(".users-view-status").html(localStorage.getItem("usersStatus")),"Banned"===$(".users-view-status").text()&&$(".users-view-status").toggleClass("badge-light-success badge-light-danger"),"Close"===$(".users-view-status").text()&&$(".users-view-status").toggleClass("badge-light-success badge-light-warning")),$("#users-list-verified").on("change",function(){var e=$("#users-list-verified").val();


  s.search(e).draw()}),$("#users-list-role").on("change",function(){var e=$("#users-list-role").val();s.search(e).draw()}),$("#users-list-status").on("change",function(){var e=$("#users-list-status").val();s.search(e).draw()}),0<$("#users-language-select2").length&&$("#users-language-select2").select2({dropdownAutoWidth:!0,width:"100%"}),0<$("#users-music-select2").length&&$("#users-music-select2").select2({dropdownAutoWidth:!0,width:"100%"}),0<$("#users-movies-select2").length&&$("#users-movies-select2").select2({dropdownAutoWidth:!0,width:"100%"}),0<$(".birthdate-picker").length&&$(".birthdate-picker").datepicker({autoClose:!0}),0<$(".users-edit").length&&($("#accountForm, #infotabForm").validate({rules:{username:{required:!0,minlength:5},name:{required:!0},email:{required:!0},datepicker:{required:!0},address:{required:!0}},errorElement:"div"}),$("#infotabForm").validate({rules:{datepicker:{required:!0},address:{required:!0}},errorElement:"div"}))});
