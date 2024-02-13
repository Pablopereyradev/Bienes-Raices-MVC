<link rel="icon" href="../public/build/img/icono-pestaña.png">
<fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input name="propiedad[titulo]" type="text" id="titulo" placeholder="Titulo Propiedad" value="<?php echo s( $propiedad->titulo ); ?>">

            <label for="precio">Precio: </label>
            <input name="propiedad[precio]" type="number" id="precio" placeholder="Precio" value="<?php echo s( $propiedad->precio ); ?>">

            <label for="imagen">Imagen: </label>
            <input name="propiedad[imagen]" type="file" id="imagen">

            <?php if($propiedad->imagen) {  ?>
                <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small" >
            <?php } ?>


            <label for="descripcion">Descripción:</label>
            <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad->descripcion ); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input 
                type="number" 
                id="habitaciones" 
                name="propiedad[habitaciones]" 
                min="1" 
                max="10" 
                step="1" 
                value="<?php echo s( $propiedad->habitaciones ); ?>">

            <label for="wc">Baños:</label>
            <input name="propiedad[wc]" type="number" min="1" max="10" step="1" id="wc" value="<?php echo s( $propiedad->wc ); ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input name="propiedad[estacionamiento]" type="number" min="1" max="10" step="1" id="estacionamiento" value="<?php echo s( $propiedad->estacionamiento ); ?>">

            <legend>Información Vendedor:</legend>
            <label for="nombre_vendedor">Nombre:</label>

            <label for="vendedor">Vendedor</label>
            <select name="propiedad[vendedores_id]" id=vendedores"">
                <option>-- Selecione --</option>
                <?php foreach($vendedores as $vendedor) { ?>
                    <option 
                        <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ?>
                        value="<?php echo s($vendedor->id); ?>">
                        <?php echo s($vendedor->nombre). " " . s($vendedor->apellido); ?> 
                    </option>
                <?php } ?>
            </select>

        </fieldset>