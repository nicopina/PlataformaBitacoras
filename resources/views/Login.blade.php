<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('css/login.css')}}" rel="stylesheet">
<title>Login</title>
</head>
<body>



<form action="/login" method="post">
  @csrf
  <div class="container">
    <h2 for="titulo"> Bitácoras C&C</h2>
    <label for="nombre"><b>Usuario</b></label>
    <input type="ID" placeholder="Ingresar usuario" name="ID" required>

    <label for="psw"><b>Contraseña</b></label>
    <input type="Contraseña" placeholder="Ingresar contraseña" name="Contraseña" required>
    @error('message')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2"*Error></p>
    @enderror
    <button type="submit">Entrar
    </button>

  </div>
</form>

</body>
</html><?php /**PATH C:\xampp\htdocs\PlataformaBitacoras\resources\views/Login.blade.php ENDPATH**/ ?>