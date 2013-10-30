<script type="text/javascript">
    function showModal() {
        $('#modal').fadeIn();
        $('#modal-background').fadeTo(500, .5);
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
            'url': 'articulos/insert-art/'
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
        $('#close-btn').button();
        $('input[type=button]').button();  
        
        
        searchArt();
        
        //mostrar automaticament la ventana modal :test only

    
    });    
    
</script>


<style type="text/css">
#modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    box-sizing: border-box;
    z-index: 1000;
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
 
 
#modal-background {
    display: none;
    position: fixed;
    background: #000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
}    
/*
#modal.window {
    width: 50%;
    max-height: 350px;
    min-width: 100px;
    overflow: auto;
    background: #fff;
    padding: 12px 14px;
    border: 1px solid;
    border-color: #aaa #999 #888;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-shadow: 0 3px 14px -4px #000;
    -ms-box-shadow: 0 3px 14px -4px #000;
    -moz-box-shadow: 0 3px 14px -4px #000;
    -webkit-box-shadow: 0 3px 14px -4px #000;
    box-shadow: 0 3px 14px -4px #000;
}   
*/ 
</style>

<div id="modal" class="window" style="width: 550px">
    <h3>Buscar</h3>    
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
            <a href="javascript:void(0)" id="close-btn" onclick="$('#modal, #modal-background' ).fadeOut();">Cancelar</a>
        </p>
    </div>   
</div>
<div id="modal-background"></div>


<section class="one-section">
    <h1>Titulo</h1>
    
    <a href="javascript:void(0)" onclick="showModal()">mostrar</a> 
</section>
