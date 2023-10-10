<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Font Roboto -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,400&display=swap');
    </style>

    <!-- Normalize -->
    <link rel="stylesheet" href="./assets/css/normalize.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Global CSS-->
    <link rel="stylesheet" href="./assets/css/global.css">
    
</head>
<body>
    <!-- Consumindo a API -->
    <?php 
        $url = "https://random-data-api.com/api/v2/users?size=100";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));

        // var_dump($resultado);
    
    ?>


    <header></header>
    <nav id="nav">
        <h1>Dashboard</h1>
        <ul>
            <li class="dashboard__menu-home">Home</li>
            <li class="dashboard__menu-dados">Dados</li>
            <li class="dashboard__menu-users">Users</li>
            <li class="dashboard__menu-leads">Leads</li>
            <li class="dashboard__menu-config">Configurações</li>
        </ul>
    </nav>
    <main>
        <div class="container d-flex dashboards__cards">
            <section id="dashboard__home" class="p2">
                <div class="dashboard__data-card d-flex centralize">

                </div>
            </section>
            <section id="dashboard__dados">
                <div class="dashboard__data-card d-flex centralize">

                </div>
            </section>
            <section id="dashboard__users">
                <div class="dashboard__data-card d-flex centralize">

                </div>
            </section>
        </div>
        <section id="dashboard__leads" class="container">
            <div class="d-flex dashboard__list">
                <?php
                    foreach ($resultado as $email) {
                        // var_dump($email);
                        echo "<div class='dashboard__email-list'><p><strong>Email:</strong> " . $email->email . "<br></p></div>";
                    }
                ?> 
            </div>
        </section>
    </main>
</body>
</html>