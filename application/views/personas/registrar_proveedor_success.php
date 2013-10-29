<script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        $('#button').button();   
    });
</script>


<section class="one-section">
    <div class="window" style="width: 400px; margin: 0 auto;">
        <h3><?=$title;?></h3>
        <div class="win-cont">
            <p style="text-align:center">
                El Proveedor fue registrado exitosamente.
            </p>
            
            <br />
            
            <p style="text-align:center">
                <a href="<?=base_url()?>personas/search/proveedor/" id="button">Continuar</a>
            </p>
        </div>
    </div> 
    
</section>