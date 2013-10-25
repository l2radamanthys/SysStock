
<script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        $('#button').button();   
    });
</script>  

<section class="one-section">

    <h1><?=$title;?></h1>
    
    <div style="width: 500px; margin: 0 auto;">
        <? if(!$error): ?>
        <div class="notify-success">
            <strong><?=$pers['nombre_pers'];?> <?=$pers['apellido_pers'];?> </strong>, Fue Habilitada como Proveedor Correctamente.
        </div>
        <? else: ?>
        <div class="notify-error">
            Fallo, la habilitacion como Proveedor, <strong><?=$pers['nombre_pers'];?> <?=$pers['apellido_pers'];?>,</strong> ya es Proveedor.
        </div>
        <? endif; ?>
        
        <br />
        <p style="text-align:center">
            <a href="<?=base_url()?>personas/show/<?=$pers['id_pers'];?>" id="button">Continuar</a>            
        </p>
    
    </div>

</section>