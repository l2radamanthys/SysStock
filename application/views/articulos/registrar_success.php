<script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        $('#button').button();   
    });
</script>

<section class="one-section">
    
    <div class="window" style="width: 400px; margin: 0 auto;">
        <h3>Registrar Articulo</h3>
        <div class="win-cont">
            <p style="text-align:center">
                El Articulo Fue Registrado con Exito.
            </p>
            
            <br />
            
            <p style="text-align:center">
                <a href="<?=base_url();?>articulos/search" id="button">Continuar</a>
            </p>
        </div>
    </div>
    
</section>