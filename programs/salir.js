//nuva version
$("#salir").click(function(event){
	$.ajax({
		url:"../programs/salir.php",
		success:function(){
			$(location).attr('href',"../templates/login.html");
		}
	});
});