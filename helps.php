<?php
	function validar_campos($campo)
	{
		$campo = trim($campo);
		$campo = stripcslashes($campo);
		$campo = htmlspecialchars($campo);

		return $campo;
	}


  