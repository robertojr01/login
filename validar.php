<?php 


$email = filter_var(strtolower($_POST['email']), FILTER_VALIDATE_EMAIL);
$pass = $_POST['password'];
$alert_red_login = '';
$pass = hash('sha512', $pass);


if( array_key_exists('button2', $_POST) ){

    if( empty($email) or empty($pass) ){
        $alert_red_login .= '<strong>Ooops! </strong>Parece que has introducido algunos valores vacíos.';
    }

    try {
        $conn = new PDO('mysql:host=localhost;port=33065;dbname=login', 'root', 'root');
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND pass = :pass LIMIT 1");
    $stmt->execute([':email' => $email, ':pass' => $pass]);
    $resultado = $stmt->fetch();

    if( $resultado ){
        $_SESSION['usuario'] = $email;
        header('Location: index.php');
    }else{
        if( $alert_red_login == ''){
            $alert_red_login .= '<strong>Ooops! </strong>Parece que algunos valores no están correctos.';
        }
    }
}