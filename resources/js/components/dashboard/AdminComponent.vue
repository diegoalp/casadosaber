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
                    <h3>15</h3>
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
                    <h3><div v-if="qtdUsuarios">{{ qtdUsuarios }}</div></h3>

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

    <!-- Modal -->
    <div class="modal fade" id="modalSerie" tabindex="-9" role="dialog" aria-labelledby="modalSerieLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" id="formTurma" @submit="novaTurma">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nova turma</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <input type="hidden" id="id" class="form-control">
                            <input type="hidden" id="id" class="form-control">
                            <div class="form-group">
                                <label for="turma">Nome</label><br />
                                <input type="text" class="form-control" v-model="turma.titulo" id="nomeTurma" placeholder="Título da Turma" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <label for="turma">Turno</label><br />
                                        <select class="form-control" id="turnoTurma" v-model="turma.turno" name="turnoTurma">
                                            <option value="Matutino">Matutino</option>
                                            <option value="Vespertino">Vespertino</option>
                                            <option value="Integral">Integral</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <label for="turma">Série (Ensino)</label><br />
                                        <select class="form-control" v-model="turma.ensino" id="ensino" name='ensino'>
                                            <option value="Infantil">Infantil</option>
                                            <option value="Fundamental I">Fundamental I</option>
                                            <option value="Fundamental I">Fundamental II</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <label for="turma">Ano Letivo</label><br />
                                        <select class="form-control" id="anoLetivo" v-model="turma.ano_letivo" name='anoLetivo'>
                                            <option v-for="ano in lista_anos" v-bind:value="ano.id"> {{ ano.ano }} </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="turma">Hora de Entrada</label><br />
                                        <input type="time" class="form-control" v-model="turma.hora_entrada" name="horaEntrada" id="horaEntrada" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="turma">Hora de Saída</label><br />
                                        <input type="time" class="form-control" v-model="turma.hora_saida" name="horaSaida" id="horaSaida" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Fim da modal de nova turma -->

</div>
</template>

<script>
export default {
    data() {
        return {
            anoLetivo: '',
            lista_anos: {},
            qtdUsuarios: '',
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
                .catch(function (error) {
                    // Se tiver erros
                })
                .then(function () {
                    // Executar algo
                });
        },
        novaTurma(e){
                e.preventDefault();
                let currentObj = this;
                const config = {
                    headers:{'content-type':'application/json'}
                }
                console.log(this.turma);
                axios.post('/api/novaturma', this.turma, config)
                    .then(function (response){
                        currentObj.success = response.data.success;
                        Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Nova turma cadastrada com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                        Swal.fire({
                            position: 'center',
                            type: 'error',
                            title: 'Erro ao cadastrar turma. <br/>Tente novamente.',
                            showConfirmButton: false,
                            timer: 1500
                    });

                    });
            },
    },
    mounted() {
        this.loadAnoAtual();
        this.loadQtdUsuarios();
        this.loadAnosLetivos();
    }
};
</script>
