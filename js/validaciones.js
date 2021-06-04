
var form = document.getElementById("formulario");
//var enviar= document.getElementById("registrarse");

var bandera=true; //para poner un mensaje en los input mal introducidos

function validar(){
    event.preventDefault(); 

// Se valida el nombre
    var nombre=form.nombre.value;
    document.getElementById("alerta").innerHTML="";
    var expre_nombre=/^[a-zA-ZÀ-ÿ\s]{2,50}$/; //solo letras, espacios y acentos
    
    if(nombre ==''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Nombre vacío <br>";
        bandera=false;
    }else if(expre_nombre.test(nombre)){ 
        
    } else{  //si no cumple la expresion saltra otro mensaje
        document.getElementById("alerta").innerHTML+="* Nombre incorrecto <br>";
        bandera=false;
    }
    
    //Se valida apellidos
    var apellidos =form.apellidos.value;
    var expre_apellidos=/^[a-zA-ZÀ-ÿ\s]{2,50}$/; //solo letras, espacios y acentos
    
    if(apellidos==''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Apellidos vacío <br>";
        bandera=false;
    }else if(expre_apellidos.test(apellidos)){ 
        
    }else{  //si no cumple la expresion saltra otro mensaje
        document.getElementById("alerta").innerHTML+="* Apellidos incorrectos <br>";
        bandera=false;
    }  
        
    //Se valida el correo 
    var correo=form.correo.value;
    
    var expre_correo=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/; //expresion para el correo electronico
    if(correo == ''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Correo vacío <br>";
        bandera=false;
    }else if(expre_correo.test(correo)){
        
     }else{  //si no cumple la expresion saltra otro mensaje
        document.getElementById("alerta").innerHTML+="* Correo electrónico erroneo <br>";
        bandera=false;
    }
    
    //Se valida la contraseña
    var contrasena =form.contrasena.value;
    var expre_contrasena=/^.{6,10}$/; //de seis a 10 digitos 
    if(contrasena == ''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Contraseña vacía <br>";
        bandera=false;
    }else if(expre_contrasena.test(contrasena)){ 
        
    } else{ //si no cumple la expresion saltra otro mensaje
        
        document.getElementById("alerta").innerHTML+="* Contraseña de 6-10 digitos <br>" ;
        bandera=false;
    }
    
    //Se valida conf_contrasena
    var conf_contra=form.conf_contrasena.value;
    if(conf_contra==''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Contraseña vacía <br>";
        bandera=false;
    }else if(conf_contra != contrasena){ //sino es igual a contraseña saldra un mensaje diciendolo
        document.getElementById("alerta").innerHTML+="* confirmar tiene que ser igual a contraseña <br>";
        bandera=false;
    }
    
    //Se valida la direccion
    var direccion =form.direccion.value;
    if(direccion == ''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Dirección vacía <br>";
        bandera=false;
    }
    
    //Se valida el dni 
    var dni = form.dni.value;
    var expre_dni=/^\d{8}[a-zA-Z]$/; //hacemos la expresion
    if(dni == ''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Dni vació <br>";
        bandera=false; 
    }else if(expre_dni.test(dni)){ // Se tiene que introducir 8 numeros y una letra ya sea minúscula o mayúscula
    
    }else{ //si no cumple la expresion saltra otro mensaje
        document.getElementById("alerta").innerHTML+="* Dni incorrecto, ej: 12345678Q <br>";
        bandera=false;
    }
    
    //Se valida el pais
    var pais =form.pais.value;
    var expre_pais=/^[a-zA-ZÀ-ÿ\s]{2,50}$/; //solo letras, espacios y acentos
    
    if(pais == ''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* pais vacío <br>";
        bandera=false;
    }else if(expre_pais.test(pais)){ 
    
    }else{ //si no cumple la expresion saltra otro mensaje
        document.getElementById("alerta").innerHTML+="* pais incorrecto <br>";
        bandera=false;
    }
    
    //Se valida ciudad
    var ciudad =form.ciudad.value;
    var expre_ciudad=/^[a-zA-ZÀ-ÿ\s]{2,50}$/; //solo letras, espacios y acentos
    if(ciudad == ''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Ciudad vacía <br>";
        bandera=false;
    }else if(expre_ciudad.test(ciudad)){ 
    
    }else{ //si no cumple la expresion saltra otro mensaje
        document.getElementById("alerta").innerHTML+="* Ciudad incorrecta <br>";
        bandera=false;
    }
    
    //Se valida telefono
    var telefono=form.telefono.value;
    var expre_telefono=/^\d{9}$/;/* numero de 9 digitos */
    if(telefono == ''){ //si esta vacio saldra un mensaje de error
        document.getElementById("alerta").innerHTML+="* Telefono vacío <br>";
        bandera=false;
    }else if(expre_telefono.test(telefono)){
        
    }else{ 
        document.getElementById("alerta").innerHTM+="* Telefono incorrecto <br>";
        bandera=false;
    }
    
    //Se valida codigo_postal
    var cp=form.codigo_postal.value;
    var expre_cp=/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/; // expresion regular de codigo postal,número entre el 01000 y 52999, deben ser 5 numeros
    
    if(cp == ''){ //si esta vacio saldra un mensaje de error
       document.getElementById("alerta").innerHTML+="* Codigo Postal vacío <br>";
        bandera=false;
    }else if(expre_cp.test(cp)){ 
        
    }else{ //mensaje donde se indica al usuario que debería poner 
        document.getElementById("alerta").innerHTML+="* Codigo Postal incorrecto (01000 - 52999) <br>";
        bandera=false;
    }
    
    if(bandera==true){ // si bandera es true el formulario se enviará al action 
        form.submit();
    }
    bandera=true;
}

form.addEventListener("submit",validar,true);






















