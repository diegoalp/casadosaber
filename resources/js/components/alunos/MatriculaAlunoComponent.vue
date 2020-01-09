<template>
    <div>
        <span v-if="matricula.length">
            <p class="text-center" v-for="m in matricula"> {{ m.titulo }} </p>
        </span>
        <span v-else>
            <p class="text-center"><a href="" data-toggle="modal" data-target="#modalMatricula" class="btn btn-success"><b>Matricular</b></a></p>
        </span>
            <!-- Modal matrícula -->
            <div class="modal fade" id="modalMatricula" tabindex="-1" role="dialog" aria-labelledby="modalMatriculaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form @submit="formMatricula">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Matrícula</h3>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="turma">Turma</label>
                                        <select class="form-control" name="turma" v-model="turma">
                                            <option v-for="t in lista_turmas" v-bind:key="t.id" v-bind:value="t.id">{{ t.titulo }} </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mensalidade">Mensalidade</label>
                                        <input type="text" class="form-control" v-model="mensalidade" name="mensalidade" v-money="money">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="educamais">EducaMais?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" v-model="educamais" name="educamais" id="educamais1" value="1" checked>
                                            <label class="form-check-label" for="educamais1">
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" v-model="educamais" name="educamais" id="educamais2" value="0">
                                            <label class="form-check-label" for="educamais2">
                                                Não
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bolsista">Bolsista?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" v-model="bolsista" name="bolsista" id="bolsista1" value="1" checked>
                                            <label class="form-check-label" for="bolsista1">
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" v-model="bolsista" name="bolsista" id="bolsista2" value="0">
                                            <label class="form-check-label" for="bolsista2">
                                                Não
                                            </label>
                                        </div>
                                    </div>
                                </div>    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {TheMask} from 'vue-the-mask'
import {Money} from 'v-money'
export default {
    components: {TheMask,Money},
    props: ['id'],
    data() {
        return {
            matricula: [],
            addMatricula: {
                turma: '',
                mensalidade: '',
                bolsista: '',
                educamais: '',
            },
            lista_turmas: {},
            money:{
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    precision: 2,
                    masked: false
                },
        }
    },
    methods: {
        getMatricula: function () {
            var _this = this;
            axios.get('/matricula/' + this.id)
                .then(function (response) {
                    // Sucesso
                    _this.matricula = response.data;
                })
                .catch(function (error) {
                    // Se tiver erros
                    Swal.fire({
                        position: 'center',
                        type: 'warning',
                        title: 'Não foi possível carregar informações sobre a turma deste aluno.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
        },
        loadTurmas() {
                axios.get('/todasturmas')
                    .then(response => {
                        this.lista_turmas = response.data;
                    });
                    
        },
        formMatricula(e){
                e.preventDefault();
                let currentObj = this;
                const config = {
                    headers:{'content-type':'multipart/form-data'}
                }
                let formData = new FormData();
                formData.append('turma', this.turma);
                formData.append('mensalidade', this.mensalidade);
                formData.append('bolsista', this.bolsista);
                formData.append('educamais', this.educamais);
                formData.append('aluno', this.id);

                axios.post('/efetuarmatricula', formData, config)
                    .then(function (response){
                        currentObj.success = response.data.success;
                        Swal.fire({
                            position: 'center',
                            title:'Sucesso',
                            type: 'success',
                            title: 'Aluno matriculado com sucesso.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    })
                    .catch(function (error) {

                        currentObj.output = error;
                        Swal.fire({
                            position: 'center',
                            title:'Ops',
                            type: 'error',
                            title: 'Erro ao efetuar matrícula deste aluno.',
                            showConfirmButton: false,
                            timer: 1500
                    })

                    });
                    this.getMatricula();
                    $('#modalMatricula').removeClass('in');
                    $('#modalMatricula').attr("aria-hidden","true");
                    $('#modalMatricula').css("display", "none");
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
            }

    },
    mounted() {
        this.getMatricula();
        this.loadTurmas();
    }
}
</script>