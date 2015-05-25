'use strict';

var login = {
    init: function () {
        this.validate();
    },
    msgIncorrecto: function () {
        $("login-incorrecto").fadeIn();
    },
    validate: function () {
        return $("#login-form").validate({
            rules: {
                username: 'required',
                password: 'required',
            },
            messages: {
                username: 'Campo requerido',
                password: 'Campo requerido',
            },
            submitHandler: function (form) {
                /* Escondemos el mensaje */
                $("login-incorrecto").hide();

                /* Hacemos la petición para autenticar un usuario */
                $post("api/login/auth", $(form).serialize())
                    .success(function (response) {
                        setTimeout(function () {
                            window.location("inicio");
                        }, 500);
                    })
                    .error(function (response) {
                        login.msgIncorrecto();
                    })
            }
        })
    }
}

var registro = {
    init: function () {
        registro.cropper.init();
    },
    cropper: {
        init: function () {
            $('.cropper-example-1 > img')
                .on("click", function () {
                    
                }).cropper({
                    aspectRatio: 1,
                    autoCropArea: 0.65,
                    strict: false,
                    guides: false,
                    highlight: false,
                    dragCrop: false,
                    movable: true,
                    resizable: true
                });
        }
    }
}

var templateScript = function () {
    $('#login-form-link').click(function (e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

    $('#register-form-link').click(function (e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
}


/* Los objectos están cargados en memoria, ahora hay que llamarlos y ejecutar unicamente los necesarios */
var init = function () {
    login.init();
    registro.init();
    templateScript();
}


/* Cargar todo cuando el documento esté listo */
$(document).ready(init);
