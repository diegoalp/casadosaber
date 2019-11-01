<template>
<ul class="sidebar-menu tree" data-widget="tree">
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
    </ul>
</template>

<script>
export default {
    mounted() {
        console.log('Component Super admin montado.')
    }
}
</script>
