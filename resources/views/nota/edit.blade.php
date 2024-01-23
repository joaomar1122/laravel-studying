@extends('layouts.app')

@section('title','Edição')
@section('content')
<!-- TUDO QUE FOR DIGITADO AQUI VAI SER RENDERIZADO DENTRO DO TEMPLATE-->
<div class="container mt-5">
       <h1>Edite a Nota</h1>
       <hr>
       <form action="{{ route('nota-update',['id_notas'=>$nota->id_notas])}}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                     <div class="form-group">
                            <label for="nome_cliente">Nome:</label>
                            <input type="text" class="form-control" name="nome_cliente" value="{{$nota -> nome_cliente}}">
                     </div>

                     <div class="form-group">
                            <label for="tipo_servico">Tipo de Serviço:</label>
                            <input type="text" class="form-control" name="tipo_servico" value="{{$nota -> tipo_servico}}">
                     </div>

                     <div class="form-group">
                            <label for="data_nota">Data:</label>
                            <input type="date" class="form-control" name="data_nota" value="{{$nota -> data_nota}}">
                     </div>

                     <div class="form-group">
                            <label for="preco_nota">Preço:</label>
                            <input type="price" class="form-control" name="preco_nota" value="{{$nota -> preco_nota}}">
                     </div>
                     <div class="form-group">
                            <label for="id_status">Status Pagamento:</label>
                            <select name="id_status" class="form-control" required>
                                   <option value="{{$nota->relStatus->id_status}}" disabled selected>{{$nota->relStatus->status_pagamento}}</option>
                                   @foreach($statusnota as $status)
                                          <option value="{{$status->id_status}}">{{$status->status_pagamento}}</option>
                                   @endforeach
                            </select>
                     </div>
                     <div class="form-group">
                            <label for="id_pagamento">Forma Pagamento:</label>
                            <select name="id_pagamento" class="form-control" required>
                                   <option value="{{$nota->relPagamento->id_pagamento}}" disabled selected>{{$nota->relPagamento->forma_pagamento}}</option>
                                   @foreach($formapgt as $pagamento)
                                          <option value="{{$pagamento->id_pagamento}}">{{$pagamento->forma_pagamento}}</option>
                                   @endforeach
                            </select>
                     </div>
                     <div class="form-group-btn">
                            <input type="submit" name="submit" class="btn btn-success">
                     </div>
                     <div class="form-group-btn">
                            <button type="button" onclick="voltarPagina()" class="btn btn-danger">Voltar</button>
                     </div>

                     <script>
                            function voltarPagina() {
                                   window.history.back();
                            }
                     </script>
                     <style>
                            .form-group-btn {
                                   display: inline-block;
                                   margin-right: 10px;
                                   margin-top: 0,90%;
                            }
                     </style>

              </div>
       </form>
</div>


@endsection
