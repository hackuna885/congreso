app.component('web-login', {
    template: /*html*/ `
    <div class="row justify-content-center align-items-center vh-100 animate__animated animate__fadeIn">
            
        <div class="col-md-10 mx-auto">
            <div class="row justify-content-center align-items-center vh-100">

                <div class="col-md-6 mx-auto text-center">
                    <img src="../img/login-image.png" class="img-fluid">
                </div>
                <div class="col-md-6 mx-auto">

                    <div class="mx-2 mx-md-5 my-md-5 my-3">
                        <h1 class="fw-light h3 mb-4 text-center">¡Bienvenido!</h1>
                        <h2 class="fw-light h5 mb-4 text-center" style="font-size: 1.1em;">Inicio de sesión - Congreso 2022</h2>
                        <form @submit.prevent="controlLogin">
                            <input type="email" class="form-control form-control-user mb-3" placeholder="Correo Electrónico" v-model="txtCorreo">
                            <input type="password" class="form-control form-control-user mb-3" placeholder="Contraseña" v-model="txtPws">

                            <div class="form-group" v-html="datos">
                            </div>
                            <button class="btn btn-primary form-control form-control-user my-3" type="submit" :disabled="this.txtCorreo != '' && this.txtPws.length >= 6 ? this.estadoBtn = false : this.estadoBtn = true">Inicio</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <router-link class="a" to="/inicio-restablecer">¿Olvidaste tu contraseña?</router-link>
                        </div>

                    </div>
                    
                </div>

            </div>                   

        </div>
    </div>  
    `,
    data () {
        return {
            datos: '',
            txtCorreo: '',
            txtPws: '',
            estadoBtn: true,
        }
    },
    computed: {
        ...Vuex.mapState(['titulo'])
    },
    methods: {
        controlLogin () {
            axios.post('../login/inicio.app', {
                opcion: 1,
                txtCorreo: this.txtCorreo,
                txtPws: this.txtPws
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

app.component('inicio-restablecer', {
    template: /*html*/ `
    <div class="row justify-content-center align-items-center vh-100 animate__animated animate__fadeIn">
            
        <div class="col-md-10 mx-auto">
            <div class="row justify-content-center align-items-center vh-100">

                <div class="col-md-6 mx-auto text-center">
                    <img src="../img/password-image.png" class="img-fluid">
                </div>
                <div class="col-md-6 mx-auto">

                    <div class="mx-2 mx-md-5 my-md-5 my-3">

                        <h1 class="fw-light h4 mb-4 text-center">¿Olvidaste tu contraseña?</h1>
                        <p>Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña.</p>
                        <form @submit.prevent="controlCorreo">
                            <input type="text" class="form-control form-control-user mb-3" placeholder="Ingresa tu correo electrónico..." v-model="rCorreo" required>
                            <div class="form-group" v-html="datos"></div>
                            <button class="btn btn-primary form-control form-control-user my-3" :disabled="this.rCorreo != '' ? this.estadoBtn = flase : this.estadoBtn = true">Restablecer contraseña</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <router-link class="a" to="/">¿Ya tienes una cuenta? ¡Iniciar sesión!</router-link>
                        </div>

                    </div>
                    
                </div>

            </div>                   

        </div>
    </div>
    `,
    data () {
        return {
            datos: '',
            rCorreo: '',
            estadoBtn: true
        }
    },
    computed: {
        
    },
    methods: {
        controlCorreo () {
            axios.post('../recupera/inicio.app', {
                opcion: 1,
                rCorreo: this.rCorreo
            })
            .then(response => {
              if (response.data === 'correcto') {
                  Swal.fire({
                      icon: 'success',
                      title: '¡Gracias!',
                      html: 'Te enviaremos un enlace por correo electrónico, para que puedas restablecer tu contraseña<br><br>',
                      showConfirmButton: false,
                      timer: 2000,
                      onClose: () => {  
                        window.location="/congreso";
                      }
                  })
              }else{
                  this.datos = response.data
                  // console.log(response.data)
              }
          })
        }        
    },
    created () {
        
    },
    mounted() {
  
    },
  })

  app.component('inicio-registro', {
    template: /*html*/ `
    <div class="row justify-content-center align-items-center vh-100 animate__animated animate__fadeIn">
            
        <div class="col-md-10 mx-auto">
            <div class="row justify-content-center align-items-center vh-100">

                <div class="col-md-6 mx-auto text-center">
                    <img src="img/password-image.png" class="img-fluid">
                </div>
                <div class="col-md-6 mx-auto">

                    <div class="mx-2 mx-md-5 my-md-5 my-3">

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">¡Crea una cuenta!</h1>
                          </div>
                          <form class="user" @submit.prevent="alta">
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user mb-3" v-model="nUsr" placeholder="Nombre" @keypress="soloLetras" required />
                              </div>
                              <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user mb-3" v-model="aUsr" placeholder="Apellido(s)" @keypress="soloLetras" required />
                              </div>
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control form-control-user mb-3" v-model="nCorreo" placeholder="Correo electrónico" required />
                            </div>
                            <div class="form-group" v-html="datos"></div>
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user mb-3" v-model="passUsr" placeholder="Contraseña" required />
                              </div>
                              <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user mb-3" v-model="passUsrDos" placeholder="Repetir contraseña" :disabled="estadoPass" required />
                              </div>
                            </div>
          
                            <div :class="notificaEstadoPass" role="alert">
                              {{validaContrasena}}
                            </div>
                            <button class="btn btn-primary form-control form-control-user my-3" :disabled="this.nomComer != '' && this.rfc != '' && this.nUsr != '' && this.aUsr != '' && this.nCorreo != '' && this.passUsr != '' && this.passUsrDos != '' && this.validaBtn === true ? this.estadoBtn = flase : this.estadoBtn = true">
                              Registrar cuenta
                            </button>
          
                          </form>
                        <hr>
                        <div class="text-center">
                            <router-link class="a" to="/">¿Ya tienes una cuenta? ¡Iniciar sesión!</router-link>
                        </div>

                    </div>
                    
                </div>

            </div>                   

        </div>
    </div>
    `,
    data () {
        return {
            datos: '',
            nUsr: '',
            aUsr: '',
            nCorreo: '',
            passUsr: '',
            passUsrDos: '',            
            msgAlert: '',
            estadoPass: true,
            notificaEstadoPass: '',
            validaBtn: false,
            estadoBtn: false
        }
    },
    computed: {
        validaContrasena() {
            this.notificaEstadoPass = 'small alert alert-light text-muted'
  
            if (this.passUsr.length >= 6) {
  
              this.estadoPass = false
              this.msgAlert = 'La contraseña debe tener al menos seis (6) caracteres.'
              this.validaBtn = false
  
              if (this.passUsrDos.length >= 6) {
  
                if (this.passUsr === this.passUsrDos) {
  
                  this.notificaEstadoPass = 'small alert alert-success'
                  this.msgAlert = 'Contraseña valida.'
                  this.validaBtn = true
  
                } else {
                  this.notificaEstadoPass = 'small alert alert-danger'
                  this.msgAlert = '¡Error! Las contraseñas no coinciden.'
                  this.validaBtn = false
                }
  
  
  
              } else {
                this.estadoPass = false
                this.validaBtn = false
              }
  
            } else {
              this.msgAlert = 'La contraseña debe tener al menos seis (6) caracteres.'
  
              if (this.passUsrDos != '') {
                this.estadoPass = false
                this.validaBtn = false
              } else {
                this.estadoPass = true
                this.validaBtn = false
              }
  
            }
  
  
  
            return this.msgAlert
          }

    },
    methods: {
        alta () {
            axios.post('registro/alta.app', {
                opcion: 1,
                nUsr: this.nUsr,
                aUsr: this.aUsr,
                nCorreo: this.nCorreo,
                passUsr: this.passUsr,                
            })
            .then(response => {
                if (response.data === 'correcto') {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Alta exitosa!',
                        showConfirmButton: false,
                        timer: 2000,
                        onClose: () => {  
                          window.location="/buscadorPersonal";
                        }
                    })
                }else{
                    this.datos = response.data
                    // console.log(response.data)
                }
            })
        },
        soloLetras () {
          if (event.keyCode > 32 && event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122 && event.keyCode < 160 || event.keyCode > 166 && event.keyCode < 190) event.returnValue = false
        }
    },
    created () {
        
    },
    mounted() {
        
    },
  })