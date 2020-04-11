$(document).ready(function(){
    //save

   $("#save").click(function(){ 
		//TODO gérer le double click
		var flm_action = $("form").attr("action");
		var movie = { 
			acteur : $("#acteur").val(),
			titre : $("#titre").val(),
			realisateur : $("#realisateur").val(),
			genre : $("#genre").val(),
			sgenre : $("#sgenre").val(),
			format : $("#format").val(),
			statut : $("#statut").val(),
			duree : $("#duree").val(),
			etat : $("#etat").val(),
			description : $("#description").val()
			};
			debugger;
		
		$.ajax({type : 'POST',url : flm_action ,data : movie,async:true}).done(function(data,status){
			debugger;
		  $("#middle").empty();
		  $("#middle").html(data);
		});
	});
	
});
