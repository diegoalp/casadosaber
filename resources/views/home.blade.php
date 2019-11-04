@extends('adminlte::page')

@section('title', 'Sistema | Bebê Fofo')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!-- Verificação de Níve de acesso -->
    @can('isSuperAdmin')
        <admin-component></admin-component>
    @endcan

    @can('isAdmin')
        <admin-component></admin-component>
    @endcan

    @can('isProfessor')
        Bem-vindo professor(a)
    @endcan

    @can('isFinanceiro')
        Bem-vindo financeiro
    @endcan

    @can('isPai')
        Bem-vindo pai
    @endcan

    <!-- Fim Verificação de Níve de acesso -->
@stop