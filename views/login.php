            
                <div class="container-sm mt-5 mb-4">
                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                <img src="views/img/logo.png" width="48" alt="">
                            </div>
                            <h2 class="fw-bold text-center py-5">Bienvenido</h2>

                            <!--login-->
                            <form action="index.php?action=validacioniniciosesion&controller=UserController" method="post">
                                <div class="mb-4">
                                    <label for="usuario" class="form-label">Nombre de usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario">
                                    <?php
                                        if(isset($data) && isset($data['usuario'])){
                                        echo "<div class='alert alert-danger'>".$data['usuario']."</div>";
                                        }
                                    ?>
                                </div>
                                <div class="mb-4">
                                    <label for="clave" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasena" id="clave">
                                    <?php
                                        if(isset($data) && isset($data['contrasena'])){
                                            echo "<div class='alert alert-danger'>".$data['contrasena']."</div>";
                                        }
                                        if(isset($data) && isset($data['general'])){
                                            echo "<div class='alert alert-danger'>".$data['general']."</div>";
                                          }
                                    ?>
                                </div>
                                <div class="mb-4 form-check">
                                    <input type="checkbox" name="connected" class="form-check-input">
                                    <label for="connected" class="form-check-label">Mantener sesión iniciada</label>
                                </div>
                                <p class="error" id="error"></p>
                                <div class="d-grid">
                                <button type="submit" name="iniciarsesion" class="btn btn-primary">Iniciar Sesión</button>
                                </div>
                            </form>
                            <div class="container w-100 my-5">
                                <div class="row text-center mb-2">
                                    <div class="col-12">Iniciar Sesión</div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-outline-primary w-100 my-1">
                                            <div class="row align-items-center">
                                                <div class="col-2"><i class="fab fa-fw fa-facebook-f"></i></div>
                                                <div class="col-10 text-center">Facebook</div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-outline-danger w-100 my-1">
                                            <div class="row align-items-center">
                                                <div class="col-2"><i class="fab fa-fw fa-google"></i></div>
                                                <div class="col-10 text-center">Google</div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            


