<template>
<div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>Alunos Matriculados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><div v-if="qtdProfessores">{{ qtdProfessores }}</div></h3>
                    <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->

                    <p>Professores</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        <div v-if="qtdUsuarios">{{ qtdUsuarios }}</div>
                    </h3>

                    <p>Usuários do Sistema</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <div v-if="anoLetivo">{{ anoLetivo }}</div>
                    </h3>
                    <p>Ano Letivo atual</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="javascript:void(0);" v-on:click="novoAno" class="small-box-footer">
                    Novo ano letivo <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Arquivo de acesso às câmeras -->
        <div class="col-md-4">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title"><i class="fa fa-video-camera" aria-hidden="true"></i> ACESSO CÂMERAS</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <form id="arquivo-cameras" enctype="multipart/form-data">

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Selecionar:</label>
                                <input type="file" class="form-control-file" id="acesso_cameras" name="acesso_cameras" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-cameras">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Arquivo de rotinas -->
        <div class="col-md-4">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title"><i class="fa fa-calendar" aria-hidden="true"></i> ROTINA</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <form>
                        <div class="panel-body">

                            <div class="form-group">
                                <label>Selecionar:</label>
                                <input type="file" class="form-control-file" id="programacaoSemanal" name="programacaoSemanal">
                            </div>
                            <div class="form-group">
                                <label>Turma:</label><br />
                                <select name="turmaProgramacao" id="turmaProgramacao">
                                    <option value="Berçario">Bercário</option>
                                    <option value="Infantil">Infantil</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!-- Arquivos Cardápio -->
        <div class="col-md-4">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title"><i class="fa fa-calendar" aria-hidden="true"></i> CARDÁPIO</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <form>
                        <div class="panel-body">

                            <div class="form-group">
                                <label>Selecionar:</label>
                                <input type="file" class="form-control-file" id="programacaoSemanal" name="programacaoSemanal">
                            </div>
                            <div class="form-group">
                                <label>Turma:</label><br />
                                <select name="turmaProgramacao" id="turmaProgramacao">
                                    <option value="Berçario">Bercário</option>
                                    <option value="Infantil">Infantil</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- Listagem de turmas -->
    <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">TURMAS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
            <ul class="todo-list ui-sortable">
                <li v-for="turma in lista_turmas.data" :key="turma.id"> 
                    <span class="text"><strong>{{ turma.titulo }}</strong></span>
                    <span class="label label-primary">{{ turma.anoletivo.ano }}</span>
                    <span class="label label-success">{{ turma.ensino }}</span>
                    <span class="label label-warning">{{ turma.turno }}</span>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
        <div class="box-tools pull-left">
                <pagination :data="lista_turmas" @pagination-change-page="loadTurmas">
                    <span slot="prev-nav">&lt; Anterior</span>
                    <span slot="next-nav">Próxima &gt;</span>
                </pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            anoLetivo: '',
            lista_anos: {},
            qtdUsuarios: '',
            qtdProfessores: '',
            lista_turmas: {},
            turma: {
                titulo: '',
                turno: '',
                ensino: '',
                ano_letivo: '',
                hora_entrada: '',
                hora_saida: '',

            }
        }
    },
    methods: {
        loadAnoAtual: function () {
            var _this = this;
            axios.get('/api/anoatual')
                .then(function (response) {
                    // Sucesso
                    _this.anoLetivo = response.data.ano;
                })
                .catch(function (error) {
                    // Se tiver erros
                    Swal.fire({
                        title: 'Atenção!',
                        text: 'Não existe ano letivo cadastrado ou houve erro ao carregar',
                        type: 'warning',
                        confirmButtonText: 'ok'
                    })
                })
                .then(function () {
                    // Executar algo
                });
        },
        novoAno: function () {
            var _this = this;
            axios.get('/api/novoano')
                .then(function (response) {
                    // Sucesso
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Ano letivo atualizado com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(function (error) {
                    // Se tiver erros
                    console.log(error);
                })
                .then(function () {
                    // Executar algo
                });
            this.loadAnoAtual();
        },
        loadAnosLetivos: function () {
            var _this = this;
            axios.get('/api/anoletivo')
                .then(function (response) {
                    // Sucesso
                    _this.lista_anos = response.data;
                })
                .catch(function (error) {
                    // Se tiver erros
                    Swal.fire({
                        position: 'center',
                        type: 'warning',
                        title: 'Não existe ano letivo informado ou não foi possível carregar.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
        },
        loadQtdUsuarios: function () {
            var _this = this;
            axios.get('/api/qtdusuarios')
                .then(function (response) {
                    // Sucesso
                    _this.qtdUsuarios = response.data;
                })
        },
        loadQtdProfessores: function () {
            var _this = this;
            axios.get('/api/qtdprofs')
                .then(function (response) {
                    // Sucesso
                    _this.qtdProfessores = response.data;
                })
        },
        loadTurmas(page = 1) {
                axios.get('/api/turmas?page=' + page)
                    .then(response => {
                        this.lista_turmas = response.data;
                    });
                    
            },
    },
    mounted() {
        this.loadAnoAtual();
        this.loadQtdUsuarios();
        this.loadAnosLetivos();
        this.loadTurmas();
        this.loadQtdProfessores();
    }
};
</script>
