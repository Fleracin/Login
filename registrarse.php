<?php

include 'conexion.php';

$exitoMensaje = $errorMensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliNom = $_POST['cliNom'];
    $cliApe = $_POST['cliApe'];
    $cliDir = $_POST['cliDir'];
    $cliEmail = $_POST['cliEmail'];
    $cliTel = $_POST['cliTel'];
    $password = $_POST['password'];

    $sqlVerificarUsuario = "SELECT cliEmail FROM users WHERE cliEmail = :email";
    $stmtVerificarUsuario = $conexion->prepare($sqlVerificarUsuario);
    $stmtVerificarUsuario->bindParam(':email', $cliEmail, PDO::PARAM_STR);
    $stmtVerificarUsuario->execute();

    if ($stmtVerificarUsuario->rowCount() > 0) {
        $errorMensaje = "El correo electrónico ya está en uso. Por favor, elija otro.";
    } else {
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $sqlInsertarUsuario = "INSERT INTO users (status, cliNom, cliApe, cliDir, cliEmail, cliTel, password) VALUES (1, :nombre, :apellido, :direccion, :email, :telefono, :password)";
        $stmtInsertarUsuario = $conexion->prepare($sqlInsertarUsuario);
        $stmtInsertarUsuario->bindParam(':nombre', $cliNom, PDO::PARAM_STR);
        $stmtInsertarUsuario->bindParam(':apellido', $cliApe, PDO::PARAM_STR);
        $stmtInsertarUsuario->bindParam(':direccion', $cliDir, PDO::PARAM_STR);
        $stmtInsertarUsuario->bindParam(':email', $cliEmail, PDO::PARAM_STR);
        $stmtInsertarUsuario->bindParam(':telefono', $cliTel, PDO::PARAM_INT);
        $stmtInsertarUsuario->bindParam(':password', $passwordHashed, PDO::PARAM_STR);

        if ($stmtInsertarUsuario->execute()) {
            $exitoMensaje = "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            $errorMensaje = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
		<script type="text/javascript">
			window.tailwind.config = {
				darkMode: ['class'],
				theme: {
					extend: {
						colors: {
							border: 'hsl(var(--border))',
							input: 'hsl(var(--input))',
							ring: 'hsl(var(--ring))',
							background: 'hsl(var(--background))',
							foreground: 'hsl(var(--foreground))',
							primary: {
								DEFAULT: 'hsl(var(--primary))',
								foreground: 'hsl(var(--primary-foreground))'
							},
							secondary: {
								DEFAULT: 'hsl(var(--secondary))',
								foreground: 'hsl(var(--secondary-foreground))'
							},
							destructive: {
								DEFAULT: 'hsl(var(--destructive))',
								foreground: 'hsl(var(--destructive-foreground))'
							},
							muted: {
								DEFAULT: 'hsl(var(--muted))',
								foreground: 'hsl(var(--muted-foreground))'
							},
							accent: {
								DEFAULT: 'hsl(var(--accent))',
								foreground: 'hsl(var(--accent-foreground))'
							},
							popover: {
								DEFAULT: 'hsl(var(--popover))',
								foreground: 'hsl(var(--popover-foreground))'
							},
							card: {
								DEFAULT: 'hsl(var(--card))',
								foreground: 'hsl(var(--card-foreground))'
							},
						},
					}
				}
			}
		</script>

</head>
  <body>

</div>
    <div class="min-h-screen flex items-center justify-center bg-background text-foreground">
  <div class="max-w-md w-full bg-card text-card-foreground p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6 text-center">Registro</h2>
    <form method="post" action="">
      <div class="mb-4">
        <label for="cliNom" class="block text-sm font-medium text-muted-foreground mb-1">Nombre</label>
        <input
          type="text"
          id="nombre"
          name="cliNom"
          class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring"
          placeholder="John"
          required
        />
      </div>
      <div class="mb-4">
        <label for="cliApe" class="block text-sm font-medium text-muted-foreground mb-1">Apellido</label>
        <input
          type="text"
          id="apellido"
          name="cliApe"
          class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring"
          placeholder="Doe"
          required
        />
      </div>
      <div class="mb-4">
        <label for="cliDir" class="block text-sm font-medium text-muted-foreground mb-1">Direccion</label>
        <input
          type="text"
          id="direccion"
          name="cliDir"
          class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring"
          placeholder="123 Main St"
          required
        />
      </div>
      <div class="mb-4">
        <label for="cliEmail" class="block text-sm font-medium text-muted-foreground mb-1">Email</label>
        <input
          type="email"
          id="email"
          name="cliEmail"
          class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring"
          placeholder="you@example.com"
          required
        />
      </div>
      <div class="mb-6">
        <label for="cliTel" class="block text-sm font-medium text-muted-foreground mb-1">Telefono</label>
        <input
          type="tel"
          id="telefono"
          name="cliTel"
          class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring"
          placeholder="(123) 456-7890"
          required
        />
      </div>
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-muted-foreground mb-1">Contraseña</label>
        <input
        type="password"
        id="password"
        name="password"
        class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring"
        placeholder="••••••••"
        required
        />
    </div>
      <button type="submit" class="w-full bg-primary text-primary-foreground hover:bg-primary/80 py-2 px-4 rounded">Registrarse</button>
    </form>
    <p class="text-center text-muted-foreground mt-4">Ya tienes una cuenta? <a href="Login.php" class="text-primary hover:underline">Login</a></p>
  </div>
</div>

<?php
    if ($exitoMensaje) {
        echo "<p>$exitoMensaje</p>";
    }
    if ($errorMensaje) {
        echo "<p>$errorMensaje</p>";
    }
    ?>
</body>
</html>
</html>
