<template>
    <section class="content">
        <div class="row">

            <div v-for="f in func.data" v-bind:id="f.id">

                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="box box-warning">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" :src="'/imagens/funcionarios/'+ f.foto" alt="User profile picture">

                            <h3 class="profile-username text-center">{{ f.nome }}</h3>

                            <p class="text-muted text-center" v-if="f.cargo === 1">Professor</p>
                            <p class="text-muted text-center" v-if="f.cargo === 2">Aux. Administrativo</p>
                            <p class="text-muted text-center" v-if="f.cargo === 3">Porteiro</p>
                            <p class="text-muted text-center" v-if="f.cargo === 4">Nutricionista</p>
                            <p class="text-muted text-center" v-if="f.cargo === 5">Berçarista</p>
                            <p class="text-muted text-center" v-if="f.cargo === 6">Cozinheira</p>
                            <p class="text-muted text-center" v-if="f.cargo === 7">Serviços Gerais</p>
                            <p class="text-muted text-center" v-if="f.cargo === 8">Psicólogo</p>
                            <p class="text-muted text-center" v-if="f.cargo === 9">Fonoaudiólogo</p>
                            <p class="text-muted text-center" v-if="f.cargo === 10">Outro</p>
                        </div>
                        <div class="box-footer">
                            <a href="javascript:void(0);" class="pull-right badge bg-red-gradient" v-on:click='removerFuncionario(f.id)'><i class="fa fa-trash" aria-hidden="true"></i> Excluir definitivamente</a>
                            <a href="javascript:void(0);" class="pull-right badge bg-green-gradient" v-on:click='restaurarFuncionario(f.id)'><i class="fa fa-undo" aria-hidden="true"></i> Restaurar</a>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>

            </div>
            <pagination :data="func" @pagination-change-page="getResults"></pagination>
        </div>
    </section>

</template>

<script>
    export default {
        name: "FuncionariosRemovidosComponent",
        data(){
            return {
                func: {},
            };
        },
        methods:{
            getResults(page = 1) {
                axios.get('/funcionarios/removidos?page=' + page)
                    .then(response => {
                        this.func = response.data;
                    });
            },
            loadFunc: function() {
                var _this = this;
                axios.get('/listafuncionarios/removidos')
                    .then(function (response) {
                        // Sucesso
                        _this.func = response.data;
                    })
                    .catch(function (error) {
                        // Se tiver erros
                        Vue.notify({
                            group: 'foo',
                            title: 'Ops!',
                            text: 'Erro ao carregar turmas',
                            type: 'error',
                            duration: 5000,
                        });
                    })
            },
            removerFuncionario(id){
                axios.delete('/funcionarios/excluir/' + id)
                    .then((response) => {
                        Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Funcionário removido com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    },(error) => {
                        Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'Erro ao excluir este funcionário.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    })
                this.loadFunc();
            },
            restaurarFuncionario(id){
                axios.post('/funcionarios/restaurar/' + id)
                    .then((response) => {
                        Swal.fire({
                        position: 'center',
                        title: 'Sucesso',
                        type: 'success',
                        title: 'Funcionário restaurado com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    },(error) => {
                        Swal.fire({
                        position: 'center',
                        title: 'Ops',
                        type: 'error',
                        title: 'Não foi possível restaurar este funcionário. Tente novamente.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    })
                this.loadFunc();
            }
        },
        mounted(){
            this.loadFunc();
        }
    }
</script>

