<html>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/js/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/cropper/dist/cropper.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/login.css">
</head>
<style>
    label.error {
        font-size: .8em;
        color: red;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Iniciar Sesión</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Registrarse</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" id="pass" tabindex="2" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Iniciar Sesión">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div id="loginErrorMsg" class="alert alert-danger" style="display:none" role="alert">Usuario o contraseñas incorrectos</div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" role="form" style="display: none;">
                                    <div class="row">
                                        <section class="pull-right col-md-6">
                                            <div class="cropper-example-1" style="cursor:pointer">
                                                <img src="img/picture.jpg" alt="Picture">
                                            </div>
                                            <div class="hiddenfile">
                                                <input name="upload" type="file" id="fileinput" />
                                            </div>
                                        </section>
                                        <section class="pull-left col-md-6">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Nombre(s)">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="apellido_paterno" id="apellido_paterno" tabindex="2" class="form-control" placeholder="Apellido Paterno">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="apellido_materno" id="apellido_materno" tabindex="3" class="form-control" placeholder="Apellido Materno">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <select type="text" name="sexo" id="sexo" tabindex="3" class="form-control" placeholder="Sexo">
                                                        <option value disabled selected>Sexo</option>
                                                        <option value="H">Hombre</option>
                                                        <option value="M">Mujer</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" tabindex="3" class="form-control" placeholder="Apellido Materno">
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="form-group col-md-12">
                                                <input type="email" name="correo_electronico" id="correo_electronico" tabindex="4" class="form-control" placeholder="Email Address">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Contraseña">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="password" name="confirmpassword" id="confirmpassword" tabindex="6" class="form-control" placeholder="Confirmar contraseña">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <select type="text" name="estado" id="estado" tabindex="3" class="form-control" placeholder="Estado">
                                                    <option value disabled>Estado</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <select type="text" name="city_id" id="city_id" tabindex="3" class="form-control" placeholder="Ciudad">
                                                    <option value disabled selected>Ciudad</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea name="direccion" id="direccion" tabindex="7" class="form-control" placeholder="Dirección"></textarea>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="registrar" id="registrar" tabindex="8" class="form-control btn btn-info" value="Registrarse">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div id="RegistrerErrorMsg" class="alert alert-danger fade out" role="alert">Hubo un error al registrase, intente más tarde</div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/underscore/underscore-min.js"></script>
    <script src="/assets/js/jquery/dist/jquery.min.js"></script>
    <script src="/assets/js/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery-validate/dist/jquery.validate.min.js"></script>
    <script src="/assets/js/cropper/dist/cropper.min.js"></script>
    <script src="/assets/scripts/login.js"></script>
    <script>
    </script>
</body>

</html>
