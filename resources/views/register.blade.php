
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>criar conta</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/var.css">
</head>
<body class="body-register">

    <div class="login-poage-register">
        <h1>Registrar</h1>
        <form method="POST" action="/register">
            @csrf

            <label for="name">Nome:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" >

            <label for="password">Senha:</label>
            <input type="password" name="password" >
            <label for="password_confirmation">Confirme a Senha:</label>
            <input type="password" name="password_confirmation" >
            <button type="submit">Registrar</button>
            @foreach ($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </form>
        <a href="/login">Já tenho conta</a>

        
    </div>
	
</body>
</html>