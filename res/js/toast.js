import { createApp } from 'https://unpkg.com/petite-vue?module'

  createApp({
    showToast: false,
    username: null,
    password: null,
    name: null,
    lastname: null,
    email: null,
    passRepeat: null,
    message: null,
    isActive: true,
    menuActive: false,
    mounted: false,
    bMenuActive: false,
    inputs: [],
    count: 1,

    //metodo para verificar si se ha cargado este script
    setMounted() {
        this.mounted = true;
    },

    //metodo para activar el submenu de cuenta
    setActive() {
        this.menuActive ? this.menuActive = false : this.menuActive = true;
    },

    //metodo para activar el submenu de blogs
    setBlogMActive() {
        this.bMenuActive ? this.bMenuActive = false : this.bMenuActive = true;
    },

    //metodo para disparar un mensaje
    triggerToast() {
      this.showToast = true;
      setTimeout(() => this.showToast = false, 3000)
     },

    //metodo para verificar el mensaje de error
    errorCheck(isErr, message) {
        if (isErr) {
           this.message = message;
           this.triggerToast();
        }
    },

    //metodo para verificar si hay un mensaje
    messageCheck(isMessage, message) {
        if(isMessage) {
            this.message = message;
            this.triggerToast();
        }
    },

    //metodo para verificar el login
    validateUser() {
        if(!this.username || !this.password){
            this.message = "Debes llenar todos los campos!";
            this.triggerToast();
            return this.isActive = true;
        }

        if(!this.validEmail(this.username)) {
            if(this.validUsername(this.username)) {
                return this.isActive = false;
            }
            this.message = "Ingresa un correo electronico o nombre de usuario valido!";
            this.triggerToast();
            return this.isActive = true;
        }

        if (!this.validUsername(this.password)) {
            this.message = "Ingresa una contraseña valida!";
            this.triggerToast();
            return this.isActive = true;
        }

        return this.isActive = false;
    },

    validateRegister() {

        if(!this.validUsername(this.username)) {
            this.message = "Ingresa un nombre de usuario valido!";
            this.triggerToast();
            return this.isActive = true;
        }

        
        if(!this.validUsername(this.name)) {
            this.message = "Ingresa un nombre sin simbolos!";
            this.triggerToast();
            return this.isActive = true;
        }
        
        if(!this.validUsername(this.lastname)) {
            this.message = "Ingresa un apellido sin simbolos!";
            this.triggerToast();
            return this.isActive = true;
        }
        
        if(!this.validEmail(this.email)) {
            this.message = "Ingresa un correo electronico valido!";
            this.triggerToast();
            return this.isActive = true;
        }

        if(!this.validUsername(this.password)) {
            this.message = "Ingresa una contraseña valida!";
            this.triggerToast();
            return this.isActive = true;
        }

        if(this.password != this.passRepeat) {
            this.message = "Las contraseñas deben coincidir!";
            this.triggerToast();
            return this.isActive = true;
        }

        if(!this.username || !this.password || !this.passRepeat || !this.name || !this.lastname || !this.email) {
            this.message = "Debes llenar todos los campos!";
            this.triggerToast();
            return this.isActive = true;
        }

        return this.isActive = false;

    },

    //filtro para verificar emails
    validEmail (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    },

    //filtro para verificar nombres de usuario
    validUsername (username) {
        var re = /^[a-zA-Z0-9]*$/;
        return re.test(username);
    },

    //metodo para aparecer mas campos
    addInputs () {
        this.count++;
        this.inputs.push({key: this.count});
    }
  }).mount()