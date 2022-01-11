<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/assets/css/login.css" rel="stylesheet">
<title>Login</title>
</head>
<body>



<form method="post">
  @csrf
  <div class="container">
    <h2 for="titulo"> Bitácoras C&C</h2>
    <label for="user"><b>Usuario</b></label>
    <input type="text" class="texto" placeholder="Ingresar usuario" name="ID" required>

    <label for="password"><b>Contraseña</b></label>
    <input type="password" class ="texto" placeholder="Ingresar contraseña" name="Contraseña" required>
    <button type="submit">Entrar
    </button>

  </div>
</form>

</body>
</html><?php /**PATH C:\xampp\htdocs\PlataformaBitacoras\resources\views/Login.blade.php ENDPATH**/ ?>