<?php

class ControladorAdministradores {

  /* -------------------------------------------------------------------------- */
  /*                          INGRESO DE ADMINISTRADOR                          */
  /* -------------------------------------------------------------------------- */

  public function ctrIngresoAdministrador() {

    if (isset($_POST['ingEmail'])) {

      if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['ingEmail']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])) {

          // $encriptar = crypt($_POST['ingPassword'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $tabla = 'administradores';
        $item = 'email';
        $valor = $_POST['ingEmail'];

        $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

        if (is_array($respuesta) && $respuesta['email'] == $_POST['ingEmail'] && $respuesta['pass'] == $_POST['ingPassword']) {

          if ($respuesta['estado'] == 1) {

            $_SESSION['validarSesionBackend'] = 'ok';
            $_SESSION['id'] = $respuesta['id'];
            $_SESSION['nombre'] = $respuesta['nombre'];
            $_SESSION['foto'] = $respuesta['foto'];
            $_SESSION['email'] = $respuesta['email'];
            $_SESSION['password'] = $respuesta['pass'];
            $_SESSION['perfil'] = $respuesta['perfil'];

            echo '<script>
              window.location = "inicio";
            </script>';

          } else {

            echo '<script>
                    Swal.fire({
                      title: "¡NO PUEDES INGRESAR!",
                      text: "Por favor vea que su cuenta este verificada para poder ingresar al sistema",
                      icon: "warning",
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false,
                    }).then((isConfirm) => {
                      if (isConfirm) {}
                    });
                  </script>';

          }

        } else {

          echo '<script>
                  Swal.fire({
                    title: "¡NO PUEDES INGRESAR!",
                    text: "Por favor verifique que usted forme parte del equipo de administradores, para poder ingresar al sistema",
                    icon: "error",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false,
                  }).then((isConfirm) => {
                    if (isConfirm) {}
                  });
                </script>';

        }

      }

    }

  }

  /* --------------------- End of INGRESO DE ADMINISTRADOR -------------------- */

}