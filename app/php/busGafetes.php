<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Buscador Gafetes</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center animate__animated animate__fadeIn" id="app">
            <div class="col-sm-11 col-lg-10 mx-auto my-5">
                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-7 mx-auto">
                        <div class="card border rounded bg-light p-5">
                            <div class="card-body">
                                <form @submit.prevent="buscar">
                                    <div class="form-group">
                                        <label for="">Buscar correo:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" v-model="txtBuscador" placeholder="Buscar..." autofocus/>
                                            <button type="submit" class=" input-group-tex btn btn-success"><i class="fas fa-search fa-sm me-1"></i>Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div v-for="(liDatos, index) in datos">
                            <div class="card border rounded bg-light my-3" style="font-size: .8em;">
                                <div class="card-body">
                                    <br>
                                    <div class="font-size: .7em;">

                                        <h4><b>Nombre: {{liDatos.nombreCom}}</b></h4>
                                        <p class="sinMargenButon"><b>Institución: </b> {{liDatos.institucion}}</p>
                                        <p class="sinMargenButon"><b>Correo: </b> {{liDatos.correo}}</p>
                                        <p class="sinMargenButon"><b>CorreoCryp: </b> {{liDatos.correoMd5}}</p>
                                        <p class="sinMargenButon"><b>Gafete: </b> <a :href="'https://congreso.utfv.net/genGafetes/usr.app?idUser='+liDatos.correoMd5">https://congreso.utfv.net/genGafetes/usr.app?idUser={{liDatos.correoMd5}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="../js2/jquery.min.js"></script>
    <script src="../js2/sweetalert2.js"></script>
    <script src="../js2/vue.js"></script>
    <script src="../js2/axios.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                datos: [],
                txtBuscador: ''
            },
            
            methods: {
                buscar () {
                    axios.post('../busGafetesRes/buscar.app', {
                        opcion: 2,
                        txtBuscador: this.txtBuscador
                    })
                    .then(response => {
                        this.datos = response.data        
                        console.log(response.data)

                    })
                }

               
            },
            created () {
      
            },
            mounted() {

            },

        })
    </script>

</body>
</html>