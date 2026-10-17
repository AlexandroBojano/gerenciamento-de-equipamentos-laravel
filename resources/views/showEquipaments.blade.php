<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/var.css">
</head>
<body class="body">



    <h1>Lista de Equipamentos</h1>

    <div class="show-create ">
        <div class="back-home">
            <button>
                <a href="/dashboard">Voltar para Home</a>

            </button>

              <Button>
                  <a href="/new">Cadatrar Equipamento</a>
                  </Button>
        </div>






    </div>

    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Unidade</th>
                <th>Patrimônio</th>
                <th>GLPI</th>
                <th>Status</th>
                <th>Mudar o Status</th>
                <th>Gerenciar</th>

            </tr>
        </thead>

        <tbody>
          @foreach ($user as $list)

          <tr>
              <td>{{$list->model}}</td>
              <td>{{$list->type}}</td>
              <td>{{$list->unit}}</td>
              <td>{{$list->patrimonio}}</td>
              <td>{{$list->glpi}}</td>
              <td>{{ str_replace('_', ' ', ucfirst($list->status)) }}</td>
              <td>

                  <form action="/updateStatus/{{ $list->id }}" method="POST" >
                      @csrf
                         @method('PUT')
                      <select name="status" id="">
                          <option value="recebido">Recebido</option>
                           <option value="planejado">Planejado</option>
                            <option value="pendente">Pendente</option>
                             <option value="pronto">Pronto</option>
                              <option value="aguardando_retirada">Aguardando a Retirada</option>
                               <option value="retirado">Retirado</option>
                               <option value="inserviveis">Inservíveis</option>
                      </select>
                      <button type="submit">Salvar</button>


                      </form>
                  

                  
              </td>
              <td>
                  <button class="button-query"><a href="/list/{{ $list->id }}">consultar</a></button>
               <button class="button-edit">
                   <a href="/updateForm/{{ $list->id }}">Editar</a>
               </button>
                <button class="button-delete">
                    <a href="/deleteForm/{{ $list->id }}">deletar</a>
                </button>
              </td>


          </tr>


          @endforeach


        </tbody>
    </table>









</body>
</html>
