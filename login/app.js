$(document).ready(function()
	{

          $("#loginForm").bind("submit",function()
		{

			$.ajax({
				type:$(this).attr("method"),
				url:$(this).attr("action"),
				data:$(this).serialize(),
				success:function(response)
				{
					console.log(response);
				if(response.estado == "true")
				{
					 $("body").overhang({
					 	type: "success",
					 	message: "Redirigiendo..."


					 });

					  window.location.replace("../index.php");


				}
				else
				{
					 $(".content").overhang({
					type: "error",
					 message: "Usuario o contraseña incorrectos"
					 });
				}

				},

				error: function()
				{
					 $(".content").overhang({
					type: "error",
					 message: "Usuario o contraseña incorrectos"
					 });
				}
			});
			return true;
		});
	});
