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
                    <h5 id="cardtitle" class="card-title">Exibindo clientes</h5>
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
                    <nav id="paginationNav">
                        <ul class="pagination">
                        <!--
                            <li class="page-item disabled"> 
                                <a class="page-link" href="#" tabindex="-1">Anterior</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Próximo</a>
                            </li>
                        -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <script src="{{asset('site/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('site/bootstrap.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            
    function getNextItem(data) {
        i = data.current_page+1;
        if (data.current_page == data.last_page) 
            s = '<li class="page-item disabled">';
        else
            s = '<li class="page-item">';
        s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Próximo</a></li>';
        return s;
    }
    
    function getPreviousItem(data) {
        i = data.current_page-1;
        if (data.current_page == 1) 
            s = '<li class="page-item disabled">';
        else
            s = '<li class="page-item">';
        s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Anterior</a></li>';
        return s;
    }
    
    function getItem(data, i) {
        if (data.current_page == i) 
            s = '<li class="page-item active">';
        else
            s = '<li class="page-item">';
        s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">' + i + '</a></li>';
        return s;
    }

    function montarPaginator(data) {
        
        $("#paginationNav>ul>li").remove();

        $("#paginationNav>ul").append(
            getPreviousItem(data)
        );
        // for (i=1;i<=data.last_page;i++) {
        //     $("#paginationNav>ul").append(
        //         getItem(data,i)
        //     );
        // }
        
        n = 10;
        
        if (data.current_page - n/2 <= 1)
            inicio = 1;
        else if (data.last_page - data.current_page < n)
            inicio = data.last_page - n + 1;
        else 
            inicio = data.current_page - n/2;
        
        fim = inicio + n-1;

        for (i=inicio;i<=fim;i++) {
            $("#paginationNav>ul").append(
                getItem(data,i)
            );
        }
        $("#paginationNav>ul").append(
            getNextItem(data)
        );
    }
    
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
        for(i=0;i<data.data.length;i++) {
            $("#tabelaClientes>tbody").append(
                montarLinha(data.data[i])
            );
        }
    }

    function carregarClientes(pagina) {
        $.get('/json',{page: pagina}, function(resp) {
            console.log(resp);
            console.log(resp.data.length);
            montarTabela(resp);
            montarPaginator(resp);
            $("#paginationNav>ul>li>a").click(function(){
                // console.log($(this).attr('pagina') );
                carregarClientes($(this).attr('pagina'));
            })
            $("#cardtitle").html( "Exibindo " + resp.per_page + 
                " clientes de " + resp.total + 
                " (" + resp.from + " a " + resp.to +  ")" );
        }); 
    }

    $(function(){
        carregarClientes(1);
    });
           
        </script>
    </body>
</html>
