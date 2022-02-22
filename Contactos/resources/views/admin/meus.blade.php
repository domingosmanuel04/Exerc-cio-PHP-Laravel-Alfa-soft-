
@extends('leyouts.tema')
@section('title','Meus Contactos')
@section('content')
@if(session('smg1'))
<div class="container-fluid py-4">

    <div style="padding=10px; background-color:#14f3a9;">

        <h5 style="color:#fff; text-align:center;">{{(session('smg1'))}}</h5>
    </div>
    @endif
    @if(session('smg3'))
<div class="container-fluid py-4">

    <div style="padding=10px; background-color:#14f3a9;">

        <h5 style="color:#fff; text-align:center;">{{(session('smg3'))}}</h5>
    </div>
    @endif
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Listas de Contactos</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contacto</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">E-mail</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Permisões</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detalhes</th>
                    </tr>
                  </thead>
                  @forelse($contactos as $cont)
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/phone.png" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$cont->nome}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$cont->id}}</p>
                      </td><td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$cont->contacto}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$cont->email}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                            <a class="btn btn-success" href="/edit/{{$cont->id}}">Editar</a>
                            
                             <a class="btn btn-danger" href="/admin/delete/{{$cont->id}}" Style="">Excluir</a>
   
                      </td>
                      <td class="align-middle text-center text-sm"> <span class="text-secondary text-xs font-weight-bold"><a href="/sigle/{{$cont->id}}" class="btn btn-primary">Ver</a></span></td>
                    </tr>
                  </td>
                  @empty
                  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Não tenho Contactos</pan>
                      </td>
                  </tbody>
                  @endforelse
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


 @endsection 