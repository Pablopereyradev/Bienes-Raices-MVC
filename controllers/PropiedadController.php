<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;

// 2 El metodo ej. "index" esta definido aqui
class PropiedadController {
    public static function index(Router $router) {
        // 3 Consulta a la DB y lo guarda en la variable
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        // 4 Pasa la consulta a la DB a la vista, función render en Router, Ver "admin.php"
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores,
        ]);
    }

    public static function crear(Router $router) {
        // Crea nueva instancia de $propiedad y la pasa a la vista en $router->render
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // arreglo con mensaje de errores
        $errores = Propiedad::getErrores();
    


        // Ejecutar codigo despues de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Crea una nueva instancia
        $propiedad = new Propiedad($_POST['propiedad']);

        /** SUBIDA DE ARCHIVOS */
        // Crear carpeta 
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        // Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        // Setear la imagen
        // Realiza una resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        // Validar
        $errores = $propiedad->validar();
    
        // El array de errores esta vacio
        if (empty($errores)) {
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                // Guardar la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                // Guarda en la DB
                $propiedad->guardar() ;
            }
        }


        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar("/admin");

        $propiedad = Propiedad::find($id);

        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();
        
        // Metodo POST para actualizar
        // Ejecutar el codigo despues de que el usuario envua el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            // Validacion
            $errores = $propiedad->validar();

            // Subida dde archivos
            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // El array de errores esta vacio
            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Almacenar la imagen
                    if ($_FILES['propiedad']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                }

                $resultado = $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validar ID
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);

                if ($id) {
                    $tipo = $_POST['tipo'];
                    if(validarTipoContenido($tipo)) {
                        // Compara lo que vamos a eliminar
                        if($tipo) {
                         // Obtener la propiedad
                         $propiedad = Propiedad::find($id);
                         // Eliminar propiedad
                         $propiedad->eliminar();
                        }
                    }
                }
            }
        }
    }
}