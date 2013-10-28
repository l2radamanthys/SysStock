    <script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        $('input[type=submit]').button();   
    });
    </script>

<section class="one-section">
    <h1>Buscar Articulos</h1>
    
    <div style="margin: 0 auto; width: 500px;" >
        <select name="field">
            <option value="codigo">Codigo</option>
            <option value="nombre" selected>Nombre</option>
            <option value="categoria">Categoria</option>
        </select>
        <input type="text" name="query" size="35"/>
        <input type="submit" value="Buscar" />
        </form>        
    </div>
    
    <br />
    <table class="table" style="width: 800px; margin: 0 auto;">
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Precio Costo</th>
        <th>Precio Lista</th>
        <th>Precio</th>
        <th>Stock</th>
    </tr>    
        
    </table>    
    
</section>
