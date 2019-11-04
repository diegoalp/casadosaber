<template>
<div>
<ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">NAVEGAÇÃO ADMINISTRADORES</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Usuários</span>
            <!-- <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span> -->
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Funcionários</span>
            <!-- <span class="pull-right-container">
              <span class="label label-primary pull-right">10</span>
            </span> -->
          </a>
        </li>
        <li class="header">TURMAS E SÉRIES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Listar</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li class="treeview">
          <a href="#" data-toggle="modal" data-target="#modalSerie">
            <i class="fa fa-th"></i>
            <span>Nova turma</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-trash"></i>
            <span>Lixeira</span>
          </a>
        </li>
        <li class="header">ALUNOS E RESPONSÁVEIS</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Listar alunos</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus-circle"></i>
            <span>Novo Aluno</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Ex-alunos</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>
        <li class="header">FINANCEIRO</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-plus"></i>
                <span>Contas a receber</span>
            </a>    
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-window-minimize"></i>
                <span>Contas a pagar</span>
            </a>    
        </li>
        <li class="header">ARQUIVOS</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i>
                <span>Acesso Câmeras</span>
            </a>    
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i>
                <span>Rotina semanal</span>
            </a>    
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i>
                <span>Cardápio semanal</span>
            </a>    
        </li>
    </ul>
</div>
</template>

<script>
export default {
    mounted() {
        console.log('Component admin montado.')
    }
}
</script>
