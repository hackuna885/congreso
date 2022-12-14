<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js3/vue.js"></script>
    <script src="../js3/vue-router.js"></script>
    <script src="../js3/vuex.js"></script>
    <title>Congreso 2022</title>
</head>
<body>
    <div class="container-fluid" id="app" oncontextmenu='return false'>
    <inicio-rescontra></inicio-rescontra>        
    </div>
    
    <script src="../js3/jquery.min.js"></script>
    <script src="../js3/axios.min.js"></script>
    <script src="../js3/sweetalert2.js"></script>
    <script src="../js3/fecha-hora.js"></script>
    <script>
        app.use(store);
        app.use(router)
        app.mount("#app")
    </script>
</body>
</html>