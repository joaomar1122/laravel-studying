@extends('layouts.app')

@section('title','Notas')
@section('content')
<!-- TUDO QUE FOR DIGITADO AQUI VAI SER RENDERIZADO DENTRO DO TEMPLATE-->
<div class="container mt-5">
       <div class="row">
              <div class="col-sm-10">
                     <h1>Listagem De Notas Fiscais</h1>
              </div>
              <div class="col-sm-2">
                     <a href="{{route('nota-create')}}" class="btn btn-success">Nova Nota</a>
              </div>
       </div>
       <table class="table">
              <thead>
                     <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Data:</th>
                            <th scope="col">Preço:</th>
                            <th scope="col">Status</th>
                            <th scope="col">Forma Pagamento:</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                     </tr>
              </thead>
              <tbody>
                     @foreach($nota as $notas)
                     @php
                     $status = $notas->relStatus;
                     $pagamento = $notas->relPagamento;
                      
                     @endphp
                     <tr>
                            <th scope="col">{{$notas -> id_notas}}</th>
                            <th scope="col">{{$notas -> nome_cliente}}</th>
                            <th scope="col">{{$notas -> tipo_servico}}</th>
                            <th scope="col">{{$notas -> data_nota}}</th>
                            <th scope="col">{{$notas -> preco_nota}}</th>
                            <th scope="col">{{$status -> status_pagamento}}</th>
                            <th scope="col">{{$pagamento -> forma_pagamento}}</th>
                            <th class="d-flex">
                                   <a href="{{route('nota-edit',['id_notas'=>$notas->id_notas])}}" class="btn btn-primary mr-2">
                                          <svg xmlns="http://www.w3.org/2000/svg" wid_notasth="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                 <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                 <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                          </svg>
                                   </a>
                                   <form action="{{route('nota-destroy',['id_notas'=>$notas->id_notas])}}" method="POST">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-danger">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                 </svg>
                                          </button>
                                   </form>
                            </th>
                     </tr>
                     @endforeach


              </tbody>
       </table>
<div class="row"> {{-- Deixa o botão para direita --}}
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">{{-- Deixa em lista --}}
            <li class="page-item {{ ($nota->currentPage() == 1) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $nota->previousPageUrl() }}" aria-label="Previous">{{-- link --}}
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            @for ($i = 1; $i <= $nota->lastPage(); $i++)
                <li class="page-item {{ ($nota->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $nota->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <li class="page-item {{ ($nota->currentPage() == $nota->lastPage()) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $nota->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>


</div>

@endsection
