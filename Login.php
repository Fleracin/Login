<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
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
        };
    </script>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'conexion.php'; // Asegúrate de que este archivo tiene la configuración de conexión a la base de datos
?>

    <div class="min-h-screen flex items-center justify-center bg-background text-foreground">
        <div class="max-w-md w-full bg-card text-card-foreground p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-center">Login</h2>
            <form method="post" action="">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-muted-foreground mb-1">Email</label>
                    <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring" 
                    placeholder="you@example.com" 
                    required />
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-muted-foreground mb-1">Password</label>
                    <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="w-full px-3 py-2 border border-border rounded bg-input text-foreground focus:outline-none focus:ring-2 focus:ring-ring" 
                    placeholder="••••••••" 
                    required />
                </div>
                <button type="submit" class="w-full bg-primary text-primary-foreground hover:bg-primary/80 py-2 px-4 rounded">Login</button>
            </form>
            <p class="text-center text-muted-foreground mt-4">¿No tienes una cuenta? <a href="registrarse.php" class="text-primary hover:underline">Registrarse</a></p>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Recuperar los datos del formulario
                $email = $_POST['email'];
                $password = $_POST['password'];
            
                // Consulta para obtener el usuario desde la base de datos
                $consulta = $conexion->prepare("SELECT * FROM users WHERE cliEmail = :email");
                $consulta->bindParam(':email', $email);
                $consulta->execute();
            
                // Verificar si el usuario existe y comparar las contraseñas
                if ($consulta->rowCount() > 0) {
                    $email = $consulta->fetch(PDO::FETCH_ASSOC);
            
                    // Verificar la contraseña usando password_verify
                    if (password_verify($password, $email['password'])) {
                        // Contraseña correcta
                        session_start();
                        $_SESSION['email'] = $email['cliEmail']; // Guarda el email en la sesión
                        header('Location: index.php');
                        exit;
                    } else {
                        // Contraseña incorrecta
                        ?>
                        <div class="text-center alert alert-danger" role="alert">
                            ¡Contraseña incorrecta!
                        </div>
                    <?php
                    }
                } else {
                    // Usuario no encontrado
                    ?>
                    <div class="text-center alert alert-danger" role="alert">
                        ¡Usuario no encontrado!
                    </div>
                <?php
                }
            }
?>



        </div>
    </div>

</body>

</html>
