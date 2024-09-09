<?php include('public/view/layout/header.php')?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    

    <title>datatables</title>
  </head>
  <body>

  <div class="container d-flex flex-direcion-column">
    <h1 class="text-center">Tabla de Articulos</h1>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Articulo</th>
                <th>Proveedor</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Filtro de Aire</td>
                <td>fil_aire_1</td>
                <td>filtrulandia</td>
                <td>61</td>
                <td>unidad</td>
                <td>$420</td>
            </tr>

            <tr>
                <td>Aceite</td>
                <td>castrol_14_suelto</td>
                <td>aceitero loco</td>
                <td>104</td>
                <td>litros</td>
                <td>$5200</td>
            </tr>

            <tr>
                <td>Aceite</td>
                <td>shell_suelto</td>
                <td>aceitero loco</td>
                <td>85</td>
                <td>litros</td>
                <td>$3780</td>
            </tr>

            <tr>
                <td>Filtro de nafta clio</td>
                <td>fil_nafta_1</td>
                <td>filtrulandia</td>
                <td>10</td>
                <td>unidad</td>
                <td>$1420</td>
            </tr>

            <tr>
                <td>Filtro de nafta megane</td>
                <td>fil_nafta_2</td>
                <td>filtrulandia</td>
                <td>196</td>
                <td>unidad</td>
                <td>$4420</td>
            </tr>
            
            <tr>
                <td>Filtro de nafta peugeot varios</td>
                <td>fil_nafta_3</td>
                <td>filtrulandia</td>
                <td>333</td>
                <td>unidad</td>
                <td>$3927</td>
            </tr>

            <tr>
                <td>revividor</td>
                <td>shampoo_juash_250cc</td>
                <td>variaditor</td>
                <td>18</td>
                <td>unidad</td>
                <td>$9999</td>
            </tr>
            <tr>
                <td>Aceite</td>
                <td>castrol_14_4L</td>
                <td>aceitero loco</td>
                <td>6</td>
                <td>unidad</td>
                <td>$5789</td>
            </tr>
            <tr>
                <td>Aceite</td>
                <td>ypf_botella_1L</td>
                <td>aceitero poder</td>
                <td>7</td>
                <td>unidad</td>
                <td>$6800</td>
            </tr>
            <tr>
                <td>Aceite</td>
                <td>ypf_botella_4L</td>
                <td>aceitero poder</td>
                <td>4</td>
                <td>unidad</td>
                <td>$15990</td>
            </tr>
            <tr>
                <td>revividor</td>
                <td>shampoo_revigal_250cc</td>
                <td>variaditor</td>
                <td>7</td>
                <td>unidad</td>
                <td>$7999</td>
            </tr>
            <tr>
                <td>cera</td>
                <td>cera_revigal_250cc</td>
                <td>variaditor</td>
                <td>2</td>
                <td>unidad</td>
                <td>$4900</td>
            </tr>
            <tr>
                <td>cera</td>
                <td>cera_juash_250cc</td>
                <td>variaditor</td>
                <td>7</td>
                <td>unidad</td>
                <td>$9900</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Articulo</th>
                <th>Proveedor</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Precio</th>
            </tr>
            
            
            

        </tfoot>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>    
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
   
  </body>
</html>

<?php include('public/view/layout/footer.php')?>