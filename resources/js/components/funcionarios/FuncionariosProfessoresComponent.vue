<template>
    <section class="content">
        <div class="row">
            <div v-for="f in funcionarios.data" v-bind:id="f.id">

                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-warning">
                        <div class="box-body box-profile">
                            <button data-v-73a14058="" type="button" data-widget="remove" v-on:click='removerFuncionario(f.id)' class="btn btn-box-tool"><i data-v-73a14058="" class="fa fa-times"></i></button>
                            <a data-toggle="modal" :data-target="'#Modal'+ f.id">
                            <img class="profile-user-img img-responsive img-circle" :src="'/imagens/funcionarios/'+ f.foto" alt="User profile picture" :height="100">

                            <h3 class="profile-username text-center">{{ f.nome }}</h3>

                            <p class="text-muted text-center">{{ f.cargo }}</p>
                            </a>

                            <a href="javascript:void(0);" class="pull-right badge bg-red" v-on:click='removerFuncionario(f.id)'>Remover</a>
                            <!-- <a class="pull-right badge bg-blue" data-toggle="modal" :data-target="'#ModalEditar'+ f.id">Editar</a> -->
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" :id="'Modal'+ f.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">{{ f.nome }}</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <strong>Cargo:</strong> <span>{{ f.cargo }}</span>
                                                | <strong>Salário:</strong> R${{ formatMoeda(f.salario) }}
                                            | <strong>Estágio?</strong> <span v-if="f.estagio === 1">Sim</span><span v-if="f.estagio === 2">Não</span>
                                        </p>
                                        <p>
                                            <strong>Escolaridade:</strong> {{ f.escolaridade }}
                                                |  <strong>Data de admissão:</strong><span> {{ f.data_admissao | moment("DD/MM/Y") }}</span>
                                        </p>
                                        <p>
                                            <strong>Data de nascimento:</strong><span> {{ f.data_nasc | moment("DD/MM/Y") }}</span> | <strong>CPF:</strong><span> {{ f.cpf }}</span> | <strong>RG:</strong> {{ f.rg }}
                                        </p>
                                        <p>
                                            <strong>Sexo:</strong><span> {{ f.sexo }}</span> | <strong>Tipo sanguíneo:</strong>
                                            <span>{{ f.tipo_sanguineo }}</span>
                                            | <strong>Naturalidade:</strong>
                                            <span>{{ f.naturalidade }}</span>
                                        </p>
                                        <p>
                                            <strong>Telefone:</strong> {{ f.celular }}
                                        </p>
                                        <p>
                                            <strong>Endereço:</strong> {{ f.endereco }}, {{ f.bairro }}, {{ f.cidade }}-{{ f.estado }} | <strong>CEP:</strong> {{ f.cep }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" :id="'ModalEditar'+ f.id" tabindex="-2">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Editar Funcinário</h3>
                                    </div>
                                    <form>
                                        <div class="col-xs-12">
                                            <div class="col-md-12">
                                                <label>Nome</label>
                                                <input class="form-control" type="text" name="nome" :value="f.nome">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Data de Nascimento</label>
                                                <input class="form-control" type="date" name="data_nasc" :value="f.data_nasc">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tipo_sanguineo">Tipo sanguíneo</label>
                                                <select class="form-control" name="tipo_sanguineo" id="tipo_sanguineo" v-model="tipo_sanguineo">
                                                    <option value="A+" v-if="f.tipo_sanguineo == 'A+'" selected>A+</option>
                                                    <option value="A-" v-if="f.tipo_sanguineo == 'A-'" selected>A-</option>
                                                    <option value="B+" v-if="f.tipo_sanguineo == 'B+'" selected>B+</option>
                                                    <option value="B-" v-if="f.tipo_sanguineo == 'B-'" selected>B-</option>
                                                    <option value="AB+" v-if="f.tipo_sanguineo == 'AB+'" selected>AB+</option>
                                                    <option value="AB-" v-if="f.tipo_sanguineo == 'AB-'" selected>AB-</option>
                                                    <option value="O+" v-if="f.tipo_sanguineo == 'O+'" selected>O+</option>
                                                    <option value="O-" v-if="f.tipo_sanguineo == 'O-'" selected>O-</option>
                                                </select>
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

            </div>
        </div>
        <pagination :data="funcionarios" @pagination-change-page="getResults"></pagination>
        
    </section>

</template>

<script>
    import {Money} from 'v-money'
    Vue.use(require('vue-moment'));
    export default {
        components: {Money},
        name: "FuncionariosProfessoresComponent",
        data(){
            return {
                funcionarios: {},
                money:{
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    precision: 2,
                    masked: false
                },
            };
        },
        methods:{
            formatMoeda(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            getResults(page = 1) {
                axios.get('/listafuncionarios/professores?page=' + page)
                    .then(response => {
                        this.funcionarios = response.data;
                    });
            },
            loadFuncionarios: function() {
                var _this = this;
                axios.get('/listafuncionarios/professores')
                    .then(function (response) {
                        // Sucesso
                        _this.funcionarios = response.data;
                    })
                    .catch(function (error) {
                        // Se tiver erros
                        Swal.fire({
                        position: 'center',
                        type: 'warning',
                        title: 'Erro ao carregar lista de funcionários.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    })
            },
            removerFuncionario(id){
                axios.delete('/funcionarios/' + id)
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
                        title: 'Ops!<br/>Houve um erro ao tentar remover este funcionario.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    })
                this.loadFuncionarios();
            }
        },
        mounted(){
            this.loadFuncionarios();
        }
    }
</script>

