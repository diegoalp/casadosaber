<template>
<div>
<ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">NAVEGAÇÃO ADMINISTRADORES</li>
        <li>
          <a href="/usuarios">
            <i class="fa fa-users"></i>
            <span>Usuários</span>
            <!-- <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span> -->
          </a>
        </li>
        <li class="treeview menu-open" style="height: auto;">
          <a href="#">
            <i class="fa fa-users"></i> <span>Funcionários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li>
            <a href="/funcionarios">
              <i class="fa fa-list"></i>
              <span>listar</span>
              <!-- <span class="pull-right-container">
                <span class="label label-primary pull-right">10</span>
              </span> -->
              </a>
          </li>
            <li>
            <a href="/funcionario/novo">
              <i class="fa fa-plus"></i>
              <span>novo</span>
              <!-- <span class="pull-right-container">
                <span class="label label-primary pull-right">10</span>
              </span> -->
              </a>
          </li>
          <li>
            <a href="/funcionarios/removidos">
              <i class="fa fa-trash"></i>
              <span>lixeira</span>
              <!-- <span class="pull-right-container">
                <span class="label label-primary pull-right">10</span>
              </span> -->
              </a>
          </li>
          </ul>
        </li>
        <li class="header">TURMAS E SÉRIES</li>
        <li>
          <a href="/turmas">
            <i class="fa fa-th"></i> <span>Listar</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-trash"></i>
            <span>Lixeira</span>
          </a>
        </li>
        <li class="header">ALUNOS E RESPONSÁVEIS</li>
        <li>
          <a href="/alunos">
            <i class="fa fa-list"></i>
            <span>Listar alunos</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>
        <li>
          <a href="/aluno/novo">
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
            <span>Lixeira</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>
        <!-- <li class="header">FINANCEIRO</li>
        <li class="treeview disabled">
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
        </li> -->
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
