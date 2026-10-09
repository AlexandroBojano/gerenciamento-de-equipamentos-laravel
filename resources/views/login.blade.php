<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/var.css">
</head>
<body class="login-page-body">

    <div class="login-page">
        <h1>Login</h1>
        <form method="POST" action="/login">
            @csrf

            <label for="email">Email:</label>

            <div class="input-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user preview-icon"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
            </div>

            <label for="password">Senha:</label>
            <div class="input-icons-passwqord">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-keyhole preview-icon"><circle cx="12" cy="16" r="1"/><rect x="3" y="10" width="18" height="12" rx="2"/><path d="M7 10V7a5 5 0 0 1 10 0v3"/></svg>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit" class="button-login-page">Entrar</button>
            @error('email') <p>{{ $message }}</p> @enderror
        </form>

        <p>ou</p>

        <div class="register-button">
            <a href="/register">Criar conta</a>
        </div>

    </div>

</body>
</html>