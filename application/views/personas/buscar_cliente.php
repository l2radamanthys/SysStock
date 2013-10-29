<section class="one-section">    
    
    <script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        $('input[type=submit]').button();   
    });
    </script>
    
    
    <h1>Buscar Cliente</h1>
    
    <div style="margin: 0 auto; width: 500px;" >
        <?=form_open('personas/search/proveedor/');?>
        <select name="field" <?=set_select('field')?>>
            <option value="nombre_pers">Nombre</option>
            <option value="apellido_pers">Apellido</option>
            <option value="nro_dni_pers">Documento</option>
            <option value="razon_social_emp">Empresa</option>
        </select>
        <input type="text" name="query" size="35" value="<?=set_value('query')?>"/>
        <input type="submit" value="Buscar" />
        </form>        
    </div>
    
    <br />
    <table class="table" style="width: 800px; margin: 0 auto;">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Empresa</th>
            <th>DNI</th>
            <th>Opciones</th>
        </tr>
    <? foreach ($personas as $pers): ?>            
        <tr>
            <td><?=$pers['nombre_pers']?></td>
            <td><?=$pers['apellido_pers']?></td>
            <td><?=$pers['razon_social_emp']?></td>
            <td><?=$pers['tipo_dni_pers']?> <?=$pers['nro_dni_pers']?></td>
            <td><a href="<?=base_url()?>personas/show/<?=$pers['id_pers']?>">Mostrar</a></td>                        
        </tr>
    <? endforeach; ?>    
    </table>

</section>