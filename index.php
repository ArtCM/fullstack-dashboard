<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon.jpg" type="image/x-icon">
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
        // Define a quantidade de usuarios
        $users = 100;
        $url = "https://random-data-api.com/api/v2/users?size=$users";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));

        // var_dump($resultado);
    
    ?>

    <nav id="navbar">
        <h1>Dashboard</h1>
        <ul>
            <li class="dashboard__menu-home">Home</li>
            <li class="dashboard__menu-users">Users</li>
            <li class="dashboard__menu-leads">Leads</li>
        </ul>
    </nav>
    <main>
        <div class="dashboard__home">
            <div class="container d-flex dashboards__cards">
            <section id="dashboard__dados">
                    <div class="dashboard__data-card d-flex centralize">
                    <?php 
                        date_default_timezone_set('America/Sao_Paulo');
                        $horarioLocal = date('Y-m-d H:i:s');
                        echo "<p class='dashboard__card-text'>Horário local:<br>" . $horarioLocal . "</p>"; 
                    ?>
                    </div>
                </section>
                <section id="dashboard__home" class="p2">
                    <div class="dashboard__data-card d-flex centralize">
                        <p class="dashboard__card-text">Ultima Alteração: 10/10/2023</p>
                    </div>
                </section>
                <section id="dashboard__users">
                    <div class="dashboard__data-card d-flex centralize">
                        <?php
                            echo "<p class='dashboard__card-text'>Usuarios:<br> $users </p>"
                        ?>
                    </div>
                </section>
            </div>
            <div class="container">
                <h2 class="dashboard_tittle-style">Ultimos Leads</h2>
                <section id="dashboard__leads" class="container">
                    
                    <div class="d-flex dashboard__list">
                        <?php
                            foreach ($resultado as $id) {
                                echo "  
                                    <div class='dashboard__ultimos-leads-info'>
                                        <img class='dashboard__avatar-list' src='$id->avatar' alt='avatar'>
                                        <p class='dashboard__email-list p-1'><strong>Email: </strong>$id->email</p>
                                        <div class='dashboard__divbar'></div>
                                        <p class='dashboard__email-list p-1'><strong>Name: </strong>$id->first_name</p>
                                        <div class='dashboard__divbar'></div>
                                        <p class='dashboard__email-list p-1'><strong>Plano: </strong>" . $id->subscription->plan . "</p>
                                    </div>
                                    <div class='dashboard__divisor'></div>";
                            };
                        ?> 
                    </div>
                </section>
            </div>
        </div>
        <div class="dashboard__users d-none">
            <div class="d-flex dashboard__list">
                <?php
                    foreach ($resultado as $id) {
                        echo "  
                            <div class='dashboard__ultimos-leads-info'>
                                <img class='dashboard__avatar-list' src='$id->avatar' alt='avatar'>
                                <p class='dashboard__email-list p-1'><strong>Email: </strong>$id->email</p>
                                <div class='dashboard__divbar'></div>
                                <p class='dashboard__email-list p-1'><strong>Name: </strong>$id->first_name</p>
                                <div class='dashboard__divbar'></div>
                                <p class='dashboard__email-list p-1'><strong>User: </strong>$id->username</p>
                                <div class='dashboard__divbar'></div>
                                <p class='dashboard__email-list p-1'><strong>Password: </strong>$id->password</p>
                            </div>
                            <div class='dashboard__divisor'></div>";
                    };
                ?> 
            </div>
        </div>
        <div class="dashboard__leads-page d-none">
        <div class="d-flex dashboard__list centralize">
                <?php
                    foreach ($resultado as $id) {
                        echo "  
                            <div class='dashboard__ultimos-leads-info'>
                                <img class='dashboard__avatar-list' src='$id->avatar' alt='avatar'>
                                <p class='dashboard__email-list p-1'><strong>Email: </strong>$id->email</p>
                                <div class='dashboard__divbar'></div>
                                <p class='dashboard__email-list p-1'><strong>Name: </strong>$id->first_name</p>
                                <div class='dashboard__divbar'></div>
                                <p class='dashboard__email-list p-1'><strong>User: </strong>$id->username</p>
                                <div class='dashboard__divbar'></div>
                                <p class='dashboard__email-list p-1'><strong>Password: </strong>$id->password</p>
                            </div>
                            <div class='dashboard__divisor'></div>";
                    };
                ?> 
            </div>
        </div>

    </main>
    <script src="./assets/js/script.js"></script>
</body>
</html>