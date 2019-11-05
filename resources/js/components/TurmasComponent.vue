<template>
<div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
              <div class="col-sm-12">
              <table id="turmas" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="turmas_info">
                <thead>
                <tr role="row">
                    <th>Título</th>
                    <th>Ano Letivo</th>
                    <th>Turno</th>
                    <th>Ensino</th>
                    <th>Hora de entrada</th>
                    <th>Hora de saída</th>
                </tr>
                </thead>
                <tbody>
                <tr role="row" class="odd" v-for="turma in lista_turmas.data" :key="turma.id">
                  <td>{{turma.titulo}}</td>
                  <td>{{turma.anoletivo.ano}}</td>
                  <td>{{ turma.turno }}</td>
                  <td>{{turma.ensino}}</td>
                  <td>{{ turma.hora_entrada }}</td>
                  <td>{{ turma.hora_saida }}</td>
                  <td><a href="javascript:void(0);" class="badge bg-red" v-on:click='removerTurma(turma.id)'>Remover</a></td>
                </tr>
                </tbody>
              </table></div></div><div><pagination :data="lista_turmas" @pagination-change-page="loadTurmas">
                    <span slot="prev-nav">&lt; Anterior</span>
                    <span slot="next-nav">Próxima &gt;</span>
                </pagination>
                </div>
                <button type="button" href="#" v-on:click="limpaCampos()" data-toggle="modal" data-target="#modalTurma" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Nova turma</button>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- Modal -->
    <div class="modal fade" id="modalTurma" tabindex="-9" role="dialog" aria-labelledby="modalTurmaLabel" aria-hidden="true">
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
            lista_turmas: {},
            lista_anos: {},
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
    methods:{
        loadTurmas(page = 1) {
                axios.get('/api/turmas?page=' + page)
                    .then(response => {
                        this.lista_turmas = response.data;
                    });
                    
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
        novaTurma(e) {
            e.preventDefault();
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'application/json'
                }
            }
            axios.post('/api/novaturma', this.turma, config)
                .then(function (response) {
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
                this.loadTurmas();
                $('#modalTurma').removeClass('in');
                $('#modalTurma').attr("aria-hidden","true");
                $('#modalTurma').css("display", "none");
                $('.modal-backdrop').remove();
                $('body').removeClass('modal-open');
        },
        limpaCampos(){
            this.turma.titulo = '';
            this.turma.ensino = '';
            this.turma.turno = '';
            this.turma.ano_letivo = '';
            this.turma.hora_entrada = '';
            this.turma.hora_saida = '';
        },
        removerTurma(id){
                axios.delete('/api/turmas/' + id)
                    .then((response) => {
                        Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Turma removida com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    },(error) => {
                        Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'Ops!<br/>Houve um erro ao tentar remover esta turma.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    })
                this.loadTurmas();
            }
    },
    mounted() {
        this.loadTurmas();
        this.loadAnosLetivos();
    }
}
</script>