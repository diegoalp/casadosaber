<template>
<ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">FINANCEIRO</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-plus"></i>
                <span>Mensalidade</span>
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
</template>

<script>
export default {
    mounted() {
        console.log('Component Super admin montado.')
    }
}
</script>
