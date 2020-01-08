<template>
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Alunos</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    <li class="item" v-for="a in alunos.data" v-bind:id="a.id">
                        <div class="product-img">
                            <img :src="'/imagens/alunos/'+ a.matricula + '/'+ a.foto" alt="Product Image">
                        </div>
                        <div class="product-info">
                            <a v-bind:href="'/aluno/'+a.matricula" class="product-title">{{a.nome}}</a>
                            <a href="javascript:void(0);" class="pull-right badge bg-red" v-on:click='removerAluno(a.id)'>Remover</a>
                            <span class="product-description">
                                {{a.matricula}}
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <pagination :data="alunos" @pagination-change-page="getResults"></pagination>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>

</section>
</template>

<script>
import {
    Money
} from 'v-money'
Vue.use(require('vue-moment'));
export default {
    components: {
        Money
    },
    name: "AlunosComponent",
    data() {
        return {
            alunos: {},
            money: {
                decimal: ',',
                thousands: '.',
                prefix: 'R$ ',
                precision: 2,
                masked: false
            },
        };
    },
    methods: {
        formatMoeda(value) {
            let val = (value / 1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        getResults(page = 1) {
            axios.get('/listaalunos?page=' + page)
                .then(response => {
                    this.alunos = response.data;
                });
        },
        loadAlunos: function () {
            var _this = this;
            axios.get('/listaalunos')
                .then(function (response) {
                    // Sucesso
                    _this.alunos = response.data;
                })
                .catch(function (error) {
                    // Se tiver erros
                    Swal.fire({
                        position: 'center',
                        type: 'warning',
                        title: 'Erro ao carregar lista de alunos.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
        },
        removerAluno(id) {
            axios.delete('/aluno/' + id)
                .then((response) => {
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Aluno removido com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }, (error) => {
                    Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'Ops!<br/>Houve um erro ao tentar remover este aluno.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
            this.loadAlunos();
        }
    },
    mounted() {
        this.loadAlunos();
    }
}
</script>
