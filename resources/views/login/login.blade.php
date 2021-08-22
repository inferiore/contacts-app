<!doctype html>
<html>
<head>
    <title>My Login Page</title>
</head>
<body>

<form method="POST" action="/login">
    @csrf
    <h1>Login</h1>
<!-- if there are login errors, show them here -->
<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
</p>
<p>
    <label for="email">Email</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" required>

</p>

<p>
    <input type="submit">
</p>
</form>
