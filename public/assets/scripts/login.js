'use strict';
var cities;
var states;

var login = {
    init: function () {
        login.validate();
    },
    msgIncorrecto: function () {
        $("#loginErrorMsg").fadeIn(1000).delay(5000).fadeOut(1000);
    },
    validate: function () {
        $("#login-form").validate({
            rules: {
                email: 'required',
                pass: 'required',
            },
            messages: {
                email: 'Campo requerido',
                pass: 'Campo requerido',
            },
            submitHandler: function (form) {
                /* Escondemos el mensaje */
                $("login-incorrecto").hide();

                /* Hacemos la petición para autenticar un usuario */
                $.post("login/auth", $(form).serialize())
                    .success(function (response) {
                        location.reload()
                    })
                    .error(function (response) {
                        console.log("fue error");
                        login.msgIncorrecto();
                    })

                return false;
            }
        })
    }
}

var registro = {
    init: function () {
        registro.cropper.init();
        registro.combos.estados.init();
        registro.validate.init();
    },
    validate: {
        init: function () {
            console.log("validate on");
            $("#register-form").validate({
                rules: {
                    nombre: "required",
                    apellido_paterno: "required",
                    apellido_materno: "required",
                    sexo: "required",
                    correo_electronico: {
                        required: true,
                        email: true
                    },
                    password: "required",
                    confirm_password: {
                        equalTo: "#password"
                    },
                    fecha_nacimiento: "required",
                    estado: "required",
                    city_id: "required",
                    direccion: "required"
                },
                messages: {
                    nombre: "Campo requerido",
                    apellido_paterno: "Campo requerido",
                    apellido_materno: "Campo requerido",
                    sexo: "Campo requerido",
                    correo_electronico: {
                        required: "Campo requerido",
                        email: "No es un email válido"
                    },
                    password: "Campo requerido",
                    confirm_password: {
                        equalTo: "Las contraseñas no coinciden"
                    },
                    fecha_nacimiento: "Campo requerido",
                    estado: "Campo requerido",
                    city_id: "Campo requerido",
                    direccion: "Campo requerido"
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function (form) {
                    console.log("submit");
                    $.post("login/registrar", $(form).serialize())
                        .success(function (response) {
                            location.reload();
                        })
                        .error(function (response) {
                            console.log("fue error");
                            $("#RegistrerErrorMsg").fadeIn(100).delay(5000).fadeOut(1000);
                        })
                    return false;
                }
            })
        }
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
    },
    combos: {
        estados: {
            init: function () {
                $.get("common/city/cities")
                    .success(function (response) {
                        cities = response.data;
                        registro.combos.estados.llenar(cities)
                    })

                $("#estado").on("change", function () {
                    console.log(this.value);
                    registro.combos.ciudades.llenar(this.value);
                });
            },
            llenar: function (cities) {
                states = _.pluck(cities, "state");
                states = _.unique(states, true, function (state) {
                    return state.id;
                });
                var combo = $("#estado");
                /* Limpiamos el combo pero guardamos el primero que es el placeholder */
                var option1 = combo.first("option");
                combo.find("option").remove();
                combo.append(option1);

                $.each(states, function (index, state) {
                    $("<option/>", {
                        value: state.id,
                        text: state.nombre,
                    }).appendTo(combo);
                });

            }
        },
        ciudades: {
            llenar: function (state_id) {

                var citiesByState = _.where(cities, {
                    state_id: parseInt(state_id)
                });
                var combo = $("#city_id");
                /* Limpiamos el combo pero guardamos el primero que es el placeholder */
                var option1 = combo.first("option");
                combo.find("option").remove();
                combo.append(option1);

                $.each(citiesByState, function (index, city) {
                    $("<option/>", {
                        value: city.id,
                        text: city.nombre,
                    }).appendTo(combo);
                });
            }
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
