@extends('adminlte::page')

@section('title', 'Perfil do aluno | Casa do Aprender')

@section('content_header')
    <h1>Perfil do aluno</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Image -->
            @if($aluno->sexo == "Masculino")
                @php $box = "box box-primary" @endphp
            @else
                @php $box = "box box-purple" @endphp
            @endif    
            <div class="{{ $box }}">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="/imagens/alunos/{{ $aluno->matricula }}/{{ $aluno->foto }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $aluno->nome }}</h3>

                <p class="text-muted text-center">{{ $aluno->matricula }}</p>
                <p class="text-muted text-center">{{ $aluno->nacionalidade }}</p>
                <matricula_aluno-component id="{{ $aluno->id }}"></matricula_aluno-component>
                {{-- <p class="text-center"><a href="#" class="btn btn-success"><b>Matricular</b></a></p> --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="{{ $box }}">
                <div class="box-header with-border">
                <h3 class="box-title">Sobre</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <strong><i class="fa fa-calendar margin-r-5"></i> Data de nascimento</strong>
                <p class="text-muted">
                    {{ date( 'd/m/Y' , strtotime($aluno->data_nasc)) }}
                </p>
                <strong><i class="fa fa-venus-mars margin-r-5"></i> Sexo</strong>
                <p class="text-muted">
                    {{$aluno->tipo_sanguineo}}
                </p>
                <strong><i class="fa fa-heartbeat margin-r-5"></i> Tipo sanguíneo</strong>
                <p class="text-muted">
                    {{$aluno->sexo}}
                </p>
                <hr>
                <strong><i class="fa fa-map-marker margin-r-5"></i> Endereço</strong>

                <p class="text-muted">{{$aluno->endereco}}, {{$aluno->bairro}}<br>{{$aluno->cidade}} | {{$aluno->estado}}<br>
                CEP: {{$aluno->cep}}</p>
                <hr>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div> 
        <div class="col-md-8">
            <div class="{{ $box }}">
                <div class="box-header with-border">
                    <h3 class="box-title">Responsáveis</h3>
                </div>
                <div class="box-body">
                    <alunos_responsaveis-component id="{{ $aluno->id }}"></alunos_responsaveis-component>
                </div>
            </div>
            <div class="{{ $box }}">
                <div class="box-header with-border">
                    <h3 class="box-title">Saúde do aluno</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>   
    </div>
@stop
