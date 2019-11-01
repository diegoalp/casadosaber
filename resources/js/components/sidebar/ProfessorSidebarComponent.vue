<template>
<ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MINHAS TURMAS</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Bercário 1</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Maternal II</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">10</span>
            </span>
          </a>
        </li>
    </ul>
</template>

<script>
export default {
    mounted() {
        console.log('Component Super admin montado.')
    }
}
</script>
