$(document).ready(function(){
    //ajout/maj
	$("#add,td[name='flm_id']").click(function(){ 
		var flm_id = $(this).attr("flm_id") == undefined ? "" : "?flm_id=" +$(this).attr("flm_id");
		  $("#middle").load("Form_Saisie.php"+ flm_id , function(responseTxt, statusTxt, xhr){

		  });
		});
	//suppression	
	$("#delete").click(function(){ 
		var str = $( "form#liste" ).serialize();
		$.post( "delete_film.php?"+str, function( data ) {
		  $( "#middle" ).html( data );
        });   
	});
});
