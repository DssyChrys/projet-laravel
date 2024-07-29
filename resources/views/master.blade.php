<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('title')</title>
    <style>
          body{
            display: flex;
          }
          .sidebar{
            width: 15%; /* Largeur de la barre latérale */
            background-color: #333; /* Couleur de fond */
            color: #fff; /* Couleur du texte */
            height: 100vh; /* Hauteur de la fenêtre */
            top: 0; /* Alignement en haut */
            left: 0; /* Alignement à gauche */
            display: flex; /* Utilisez flex pour centrer les éléments */
            flex-direction: column; /* Affichez les éléments de menu en colonne */
            /* justify-content: center; Centrez verticalement les éléments */
            align-items: center; /* Centrez horizontalement les éléments */
          }
          .sidebar ul {
              list-style: none; /* Supprime les puces des éléments de liste */
              padding: 0;
              margin-top: 60%;
          }

          .sidebar ul li {
              margin-bottom: 10px; /* Espacement entre les éléments de menu */
          }

          .sidebar ul li a {
              text-decoration: none; /* Supprime le soulignement des liens */
              color: #fff; /* Couleur du texte des liens */
              display: block; /* Affiche les liens en bloc */
              padding: 5px 0; /* Espacement vertical des liens */
          }

          .sidebar ul li a:hover {
              background-color: #555; /* Couleur de fond au survol */
          }
    </style>
</head>
<body>
  <!-- resources/views/sidebar.blade.php -->

<div class="sidebar">
    <h2>Laravel</h2>
    <ul>
        <li><a href="{{ route('employees.index') }}">Section Employer</a></li>
        <li><a href="{{ route('departments.index') }}">Section Departement</a></li>
    </ul>
</div>
      <div class="container-fluid">
        @yield('content')
      </div>
</body>
</html>
