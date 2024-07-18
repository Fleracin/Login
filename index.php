<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
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
  <?php
  

session_start();



if (!isset($_SESSION['cliNom'])) {
    print"Primero debes iniciar sesión";
    exit();
}

if ($_SESSION['cliNom']['status'] != '1') {
    print"No tiene el perfil para ver esta pagina";
    exit();
}
  
  
  ?>
  <body>
    <div class="bg-[var(--background)] text-[var(--foreground)] font-sans">
  
  <nav class="bg-[var(--foreground)] text-[var(--background)] p-4 flex justify-between items-center">
    <div class="flex items-center space-x-4">
      <a href="index.php"><img src="diamondLogo.svg" alt="Logo" class="h-10"></a>
      <div class="alert alert-primary" role="alert">
    <p class="lead">¡Hola, <b> <?php print_r( $_SESSION['cliNom']); ?>!</b> Bienvenido</p>
    </div>
    <a href="Login.php">iniciar secion</a>
    </div>
    <div class="flex space-x-4">
      <a href="shop.php" class="hover:text-[var(--primary)]">Tienda</a>
      <a href="contact.php" class="hover:text-[var(--primary)]">Contacto</a>
      <a href="bolsa.php" class="hover:text-[var(--primary)]">Carrito</a>
      <a href="login.php" class="hover:text-[var(--primary)]">Login</a>
    </div>
  </nav>
  
  <div class="relative">
    <img src="https://placehold.co/1200x400" alt="Fashion hero image" class="w-full h-96 object-cover">
  </div>
  
  <div class="container mx-auto py-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div class="bg-[var(--card)] text-[var(--card-foreground)] p-4 rounded-lg">
        <img src="https://placehold.co/200x200" alt="Combo BG1" class="w-full h-48 object-cover mb-2">
        <h3 class="text-lg font-semibold">Combo BG1</h3>
        <p class="text-sm text-[var(--muted-foreground)]">COP$200.000</p>
      </div>
      <div class="bg-[var(--card)] text-[var(--card-foreground)] p-4 rounded-lg">
        <img src="https://placehold.co/200x200" alt="Combo BG1" class="w-full h-48 object-cover mb-2">
        <h3 class="text-lg font-semibold">Combo BG1</h3>
        <p class="text-sm text-[var(--muted-foreground)]">COP$200.000</p>
      </div>
      <div class="bg-[var(--card)] text-[var(--card-foreground)] p-4 rounded-lg">
        <img src="https://placehold.co/200x200" alt="Combo BG1" class="w-full h-48 object-cover mb-2">
        <h3 class="text-lg font-semibold">Combo BG1</h3>
        <p class="text-sm text-[var(--muted-foreground)]">COP$200.000</p>
      </div>
      <div class="bg-[var(--card)] text-[var(--card-foreground)] p-4 rounded-lg">
        <img src="https://placehold.co/200x200" alt="Combo BG1" class="w-full h-48 object-cover mb-2">
        <h3 class="text-lg font-semibold">Combo BG1</h3>
        <p class="text-sm text-[var(--muted-foreground)]">COP$200.000</p>
      </div>
    </div>
  </div>
  
  <div class="bg-[var(--foreground)] text-[var(--background)] py-8">
    <div class="container mx-auto">
      <h2 class="text-2xl font-semibold mb-4">SALE OFF</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-[var(--card)] text-[var(--card-foreground)] p-4 rounded-lg">
          <img src="https://placehold.co/200x200" alt="Sale item" class="w-full h-48 object-cover mb-2">
          <h3 class="text-lg font-semibold">Combo 1</h3>
          <p class="text-sm text-[var(--muted-foreground)]">COP$150.000</p>
          <button class="bg-[var(--primary)] text-[var(--primary-foreground)] p-2 rounded-lg mt-2">Ver más</button>
        </div>
        <div class="bg-[var(--card)] text-[var(--card-foreground)] p-4 rounded-lg">
          <img src="https://placehold.co/200x200" alt="Sale item" class="w-full h-48 object-cover mb-2">
          <h3 class="text-lg font-semibold">Combo 2</h3>
          <p class="text-sm text-[var(--muted-foreground)]">COP$150.000</p>
          <button class="bg-[var(--primary)] text-[var(--primary-foreground)] p-2 rounded-lg mt-2">Ver más</button>
        </div>
      </div>
    </div>
  </div>


  
  <footer class="bg-[var(--foreground)] text-[var(--background)] py-4">
    <div class="container mx-auto text-center">
      <p class="text-sm">algo</p>
    </div>
  </footer>
</div>
</body>
</html>
