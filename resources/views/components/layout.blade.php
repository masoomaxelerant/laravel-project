@props([
  'title' => 'Laravel Project App'
])
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
  <style>
    .card {
      background: #e3e3e3;
      padding: 1rem;
      text-align: center;
      border-radius: 5px;
    }
    nav {
      background: #333;
      padding: 1rem;
    }
    nav a {
      color: white;
      margin-right: 1rem;
      text-decoration: none;
    }
    main {
      padding: 2rem;
    }
    .max-w-400 {
      max-width: 400px;
      margin: 0 auto;
    }
    .max-w-600 {
      max-width: 600px;
      margin: 0 auto;
    }
    .w-32 {
      width: 8rem;
    }
    .h-32 {
      height: 8rem;
    }
    .rounded-full {
      border-radius: 9999px;
    }
    .mx-auto {
      margin-left: auto;
      margin-right: auto;
    }
    /* form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      background: #f9f9f9;
      padding: 1rem;
      border-radius: 5px;
    } */
    .size-12 {
      width: 48px;
      height: 48px;
    }
    .border-gray-900\/25 {
      border-color: 
      color-mix(in oklab, var(--color-gray-900) 25%, transparent);
    }
  </style>
</head>
<body class="bg-gray-200 p-6">
  <nav>
    <a href="/">Home</a>
    <a href="/about">About Us</a>
    <a href="/contact">Contact Us</a>
    <a href="/services">Services</a>
    <a href="/suggestion">Suggestion</a>
  </nav>
  <main>
    {{ $slot }}
  </main>
</body>
</html>