@extends('layouts.app')

@section('title','Criação de Dados')
@section('content')

<!-- TUDO QUE FOR DIGITADO AQUI VAI SER RENDERIZADO DENTRO DO TEMPLATE-->
<div class="container mt-5">
       <h1>Cadastre uma nova nota</h1>
       <hr>
       <form action="{{ route('nota-store')}}" method="post">
              @csrf
              
              <div class="form-group">
                     @if(isset($errors) && count($errors)>0)
                            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                                   @foreach($errors->all() as $erro)
                                          {{$erro}}<br>
                                   @endforeach
                            </div>
                     @endif
                     <div class="form-group">
                            <label for="nome_cliente">Nome:</label>
                            <input type="text" class="form-control" name="nome_cliente" placeholder="Digite o Nome do Cliente" required>
                     </div>

                     <div class="form-group">
                            <label for="tipo_servico">Tipo de Serviço:</label>
                            <input type="text" class="form-control" name="tipo_servico" value="Pacote " required>
                     </div>

                     <div class="form-group">
                            <label for="data_nota">Data:</label>
                            <input type="date" class="form-control" name="data_nota" placeholder="Digite a data do serviço" required>
                     </div>

                     <div class="form-group">
                            <label for="preco_nota">Preço:</label>
                            <input type="price" class="form-control" name="preco_nota" placeholder="Digite o preço da nota" required>
                     </div>
                     <div class="form-group">
                            <label for="id_status">Status Pagamento:</label>
                            <select name="id_status" class="form-control" required>
                                   <option value="" disabled selected>Selecione...</option>
                                   @foreach($statusnota as $status)
                                          <option value="{{$status->id_status}}">{{$status->status_pagamento}}</option>
                                   @endforeach
                            </select>
                     </div>
                     <div class="form-group">
                            <label for="id_pagamento">Forma Pagamento:</label>
                            <select name="id_pagamento" class="form-control" required>
                                   <option value="" disabled selected>Selecione...</option>
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
