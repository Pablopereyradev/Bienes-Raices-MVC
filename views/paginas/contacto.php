<main class="contenedor seccion contenido-centrado">
    <h1 class="fw-300 centrar-texto">Contacto</h1>
    
    <?php
        if($mensaje) { ?>
        <p class="alerta exito" ><?php echo $mensaje ?></p>
    <?php  } ?>


    <picture>
        <source srcset="build/img/destacada.webp" type="imagen/webp">
        <source srcset="build/img/destacada.jpg" type="imagen/jpeg">
        <img src="/build/img/destacada3.jpg" alt="Imagen Principal">
    </picture>

    <h2 class="fw-300 centrar-texto">Llena el formulario de Contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder="Tu Nombre" name="contacto[nombre]">

            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje" name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la Propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[tipo]">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>


            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]">
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser Contactado</p>
            <div class="forma-contacto">
                <label for="telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                <label for="correo">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]">
            </div>

            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton boton-verde">

    </form>
</main>