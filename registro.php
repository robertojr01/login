<?php

$email = filter_var(strtolower($_POST['email']), FILTER_VALIDATE_EMAIL);
$pass = $_POST['password'];
$pass2 = $_POST['password-2'];

$alert_red = '';
$alert_green = '';


//Validación
if( array_key_exists('button1', $_POST) ){
    if( empty($email) or empty($pass) or empty($pass2) ){
        $alert_red .= '<strong>Ooops! </strong>Parece que algunos valores estan vacios.';
        // Header('Location: login.php');
    }else{
    
        //Conectamos a la base de datos depues de haver validado que el usuario haya escrito algo
        try {
            $conn = new PDO('mysql:host=localhost;port=33065;dbname=login', 'root', 'root');
        } catch (PDOException $e) {
            echo "Errorr: " . $e->getMessage();
        }
    
        //Validación: Vemos si ya esta el email creado en nuestra base de datos
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $resultado = $stmt->fetch();
    
        if($resultado){
            $alert_red .= '<strong>Ooops! </strong>Ya existe un cuenta con ese email.';
        }
    
        //Validación: Vemos si ya esta el email creado en nuestra base de datos
        $pass = hash('sha512', $pass);
        $pass2 = hash('sha512', $pass2);
    
        if( $pass != $pass2 ){
            if( $alert_red == '' ){
                $alert_red .= '<strong>Ooops! </strong>Parece que la contraseña no conicide.';
            }
        }
    }
    
    //Si no hay errores
    if( !$alert_red){
        $stmt = $conn->prepare('INSERT INTO usuarios (id, email, pass) VALUES (null, :email, :pass)');
        $stmt->execute([':email' => $email, ':pass' => $pass]);
    
        $alert_green .= '<strong>Bien Hecho! </strong>Se ha creado la cuenta con éxito, inicie sesión para acceder. <br/>';
    }
}