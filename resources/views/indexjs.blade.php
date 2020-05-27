<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Paginação</title>
        <!-- Styles -->        
         <link rel="stylesheet" type="text/css" href="{{asset('site/style.css')}}">         
         <style type="text/css">
             body {
                padding: 20px;
             }
         </style>        
    </head>
    <body>
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    Tabela de Clientes
                </div>
                <div class="card-body">
                    <h5 class="card-title">Exibindo clientes</h5>
                    <table id="tabelaClientes" class="table table-hover">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-mail</th>                            
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td>1</td>
                                <td>Dumon</td>
                                <td>DMD</td>
                                <td>dumon@dumon.com</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
        <script src="{{asset('site/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('site/bootstrap.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            
                function montarLinha(cliente) {
                    return '<tr>' +
                            '  <th scope="row">' + cliente.id + '</th>' +
                            '  <td>' + cliente.nome + '</td>' +
                            '  <td>' + cliente.sobrenome + '</td>' +
                            '  <td>' + cliente.email + '</td>' +
                            '</tr>';
                }

            function montarTabela(data) {
                $("#tabelaClientes>tbody>tr").remove();
                for(i=0; i<data.data.length; i++) {
                    s = montarLinha(data.data[i]);
                    //console.log(s);
                    $("#tabelaClientes>tbody").append(s);
                }
            }

            function carregarClientes(pagina) {
                $.get('/json', {page: pagina}, function(resp) {
                    //console.log(resp);
                    montarTabela(resp);
                });
            }

            $(function(){
                carregarClientes(1);
            });
           
        </script>
    </body>
</html>
