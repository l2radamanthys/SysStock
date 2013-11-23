<script type="text/javascript">
    
    function showModal() {
        $('#modal').fadeIn();
        $('#modal-background').fadeTo(500, .5);
    }
    
    function hideModal() {
        $('#modal, #modal-background').fadeOut();
    }
    
    
    function searchArt()
    {
        var query = $("#query").val();
        var field = $("#field option:selected").val();
        var params = {
            'field' : field,
            'query' : query,
            //otras Opciones de Muestra
            'label' : 'Agregar', 
            //url destino
            'url': 'articulos/add_proveedor_article/<?=$pers['id_pers']?>/'
        }    

        $.ajax({
            data: params,
            url: "<?=base_url();?>http_response/search_art",
            type: 'post',
            beforeSend: function () {
                //$("#dialog").dialog();
                
            },
            success: function(response) {                
                $("#query-result").html(response);
                //$("#dialog").dialog('close');
            }    
        });       
    }    
    
    $(function() {
        //$("#accordion-menu").accordion();
        //$("#back").button();
        searchArt();
        
    });
    
    
</script>    

<section class="section">
    <h1><?=$title;?></h1>
    <h3>Proveedor: <?=$prov['nombre_pers']." ".$prov['apellido_pers']?></h3>
         

    
    <table class="table">
        <tr>
            <th style="width: 20px">Id</th>
            <th style="width: 50px">Codigo</th>
            <th style="width: 200px">Nombre</th>
            <th style="width: 50px">Precio Compra</th>
            <th style="width: 50px">Precio Proveedor</th>
            <th style="width: 50px">Ultima Actualizacion</th>
            <th style="width: 100px">Opciones</th>
        </tr>
        
        <? foreach ($articulos as $art): ?>
        <tr>
            <td><?=$art['id_art']?></td>
            <td><?=$art['codigo_art']?></td>
            <td><?=$art['nombre_art']?></td>
            
            <td><?=number_format($art['precio_costo_art'], 2)?></td>
            <td><?=number_format($art['precio_artprov'], 2)?></td>
            <td><?=date('d/m/Y', strtotime($art['ult_fecha_act_artprov']))?></td>
            <td>
                <a href="">Actualizar</a>
                <a href="">Quitar</a>
            </td>
        </tr>        
        <? endforeach; ?>
        
    </table>
    
    <p style="text-align: right; padding-right: 50px;">
    <a href="<?=base_url()?>/personas/show/<?=$prov['id_pers']?>" id="back"> Volver Atras</a>
    </p>    

</section>


<aside class="aside">
    <div id="accordion-menu" class="sub-menu">
        <h3>Articulo Proveedor</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Modificar</a></li>
            <li><a href="javascript:void(0)" onclick="showModal();>Agregar</a></li>

        </ul>
        </div>
    </div>        

    
</aside>

<!-- Ventana Modal de Busqueda -->
<div id="modal" class="window" style="width: 550px">
    <h3>Seleccionar Articulo Para Asignar</h3>    
    <div class="win-cont">
        <div style="margin: 0 auto; width: 460px;" >
            <form action="">
            <select name="field" id="field">
                <option value="codigo">Codigo</option>
                <option value="nombre" selected>Nombre</option>
            </select>
            <input type="text" name="query" id ="query" size="35"/>
            <input type="button" onclick="searchArt(); return false;" value="Buscar" />
            </form>        
        </div>
        
        <br />
        <div id="query-result"></div>
        <br />
        
        <p style="text-align: center;">
            <a href="javascript:void(0)" id="close-btn" onclick="hideModal();">Cancelar</a>
        </p>
    </div>   
</div>
<div id="modal-background"></div>