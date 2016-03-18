if( document.getElementById("register") ){
		var exp_nombre = /^[a-z\s]+$/i;
		var exp_dni = /^([0-9]{2}|[0-9]{1})\.[0-9]{3}\.[0-9]{3}$/;
		var exp_fdn = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-](19)\d{2}$/;
		var exp_fot = /\.(jpg|png)$/i;
		var exp_mail = /^([a-z0-9\-\_]{3,}@[a-z]{3,}\.[a-z]{2,4})?$/;/*@[a-z]{3,}*/
		var exp_user = /^([A-Z]{4,})?$/;
		var exp_pass = /^([a-z0-9]{3,15})?$/i;
		var exp_calle = /^([a-z0-9]+)?$/;
		var exp_num = /^([0-9]+|S\/N)?$/i;
		var exp_piso = /^([0-9]+|S\/N|PB)?$/i;
		var exp_dept = /^([0-9]+|[a-z]{1})?$/;
		/*Comprobar Validacion*/
		var val_nombre = validar(exp_nombre,inputs[0]);
		var val_apellido = validar(exp_nombre,inputs[1]);
		var val_dni = validar(exp_dni,inputs[2]);
		var val_fdn = validar(exp_fdn,inputs[3]);
		var val_fot = validar(exp_fot,inputs[4]);
		var val_mail = validar(exp_mail,inputs[5]);
		var val_user = validar(exp_user,inputs[6]);
		var val_pass = validar(exp_pass,inputs[7]);
		var val_calle = validar(exp_calle,inputs[8]);
		var val_num = validar(exp_num,inputs[9]);
		var val_piso = validar(exp_piso,inputs[10]);
		var val_dept = validar(exp_dept,inputs[11]);
		if((val_nombre == true && val_apellido == true && val_dni == true && val_fdn == true && val_fot == true)&&(val_mail == true && val_user == true && val_pass == true && val_calle == true && val_num == true && val_piso == true && val_dept == true )){
			return true;
		}else{
			return false;
		}
	}
}