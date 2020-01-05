<template>

    <section class="content">
        <div class="row">
            <form @submit="formFuncionario">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Dados do Aluno</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-12 col-md-8 form-group">
                            <label for="nome">Nome*</label>
                            <input type="text" class="form-control" v-model="nome" name="nome" id="nome" placeholder="Nome completo do funcionário" required/>
                        </div>

                        <div class="col-sm-12 col-md-4 form-group">
                            <label for="perfil">Foto</label>
                            <input type="file" class="custom-file-input form-control" v-on:change="selecionarArquivo" id="perfil" name="perfil" lang="pt-br">
                        </div>

                        <div class="col-sm-12 col-md-3 form-group">
                            <label for="data_nasc">Data de Nascimento*</label>
                            <input type="date" name="data_nasc" id="data_nasc" v-model="data_nasc" class="form-control" required>
                        </div>

                        <div class="col-sm-12 col-md-2 form-group">
                            <label for="tipo_sanguineo">Tipo sanguíneo</label>
                            <select class="form-control" name="tipo_sanguineo" id="tipo_sanguineo" v-model="tipo_sanguineo">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>

                        </div>

                        <div class="col-sm-12 col-md-3 form-group">
                            <label>Sexo</label><br/>
                            <div class="form-check form-check-inline">
                                <label class="radio-inline" for="sexo-masc"><input class="form-check-input" type="radio" v-model="sexo" name="sexo" id="sexo-masc" value="Masculino">Masculino</label>
                                <label class="radio-inline" for="sexo-fem"><input class="form-check-input" type="radio" name="sexo" v-model="sexo" id="sexo-fem" value="Feminino"> Feminino</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-3 form-group">
                            <label for="nacionalidade">Nacionalidade</label><br/>
                            <input type="text" class="form-control" name="nacionalidade" v-model="nacionalidade" id="nacionalidade" placeholder="Nacionalidade do aluno"/>
                        </div>

                        <div class="col-sm-12 col-md-8 form-group">
                            <label for="endereco">Endereço*</label>
                            <input type="text" class="form-control" name="endereco" v-model="endereco" id="endereco" placeholder="Endereço com número" required />
                        </div>

                        <div class="col-sm-12 col-md-4 form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" v-model="bairro" name="bairro" id="bairro" placeholder="Informe o bairro"/>
                        </div>

                        <div class="col-sm-12 col-md-4 form-group">
                            <label for="cidade">Cidade*</label>
                            <input type="text" class="form-control" v-model="cidade" name="cidade" id="cidade" placeholder="Cidade" required/>
                        </div>

                        <div class="col-sm-12 col-md-4 form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" v-model="estado" id="estado">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-4 form-group">
                            <label for="cep">CEP*</label><br/>
                            <input type="text" class="form-control cep" v-model="cep" name="cep" v-mask="'#####-###'" id="cep" placeholder="cep" required/>
                        </div>

                        <div class="col-md-12">
                            <hr/>
                            <h3 class="box-title">Dados do Responsável</h3>
                        </div>
                    <div class="col-sm-12 col-md-8 form-group">
                        <label for="nome">Nome do Responsável*</label>
                        <input type="text" class="form-control" v-model="nome_responsavel" name="nome_responsavel" id="nome_responsavel" placeholder="Nome completo responsável" required/>
                    </div>

                    <div class="col-sm-12 col-md-4 form-group">
                        <label for="grau_parentesco">Grau de parentesco</label>
                        <select class="form-control" name="grau_parentesco" v-model="grau_parentesco" id="grau_parentesco">
                            <option value="Pai">Pai</option>
                            <option value="Mãe">Mãe</option>
                            <option value="Avô(á)">Avô(á)</option>
                            <option value="Tio(a)">Tio(a)</option>
                            <option value="Irmão(a)">Irmão(a)</option>
                            <option value="Babá">Babá</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-3 form-group">
                        <label for="data_nasc_responsavel">Data de Nascimento*</label>
                        <input type="date" name="data_nasc_responsavel" id="data_nasc_responsavel" v-model="data_nasc_responsavel" class="form-control" required>
                    </div>
                    <div class="col-sm-12 col-md-3 form-group">
                        <label for="celular">Celular*</label><br/>
                        <input type="text" class="form-control" name="celular" v-model="celular" id="celular" v-mask="['(##) ####-####', '(##) #####-####']" placeholder="Telefone para contato" required/>

                    </div>
                    <div class="col-sm-12 col-md-3 form-group">
                        <label for="cpf">CPF*</label><br/>
                        <input type="text" class="form-control" name="cpf" v-model="cpf" id="cpf" v-mask="['###.###.###-##']" placeholder="CPF do responsavel" required/>

                    </div>

                    <div class="col-sm-12 col-md-3 form-group">
                        <label for="ci">C.I</label><br/>
                        <input type="text" class="form-control" name="ci" v-model="ci" id="ci" placeholder="C.I do responsavel" required/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail</label><br />
                        <input type="text" class="form-control" v-model="email" name="email" id="email" placeholder="E-mail de usuário" />
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </div>
            </form>
        </div>
    </section>

</template>

<script>
    import {TheMask} from 'vue-the-mask'
    export default {
        name: "NovoAlunoComponent",
        components: {TheMask},

        data(){
            return{
                nome: '',
                data_nasc: '',
                tipo_sanguineo: '',
                sexo: '',
                nacionalidade: '',
                endereco: '',
                bairro: '',
                cidade: '',
                estado: '',
                cep: '',
                celular: '',
                nome_responsavel: '',
                grau_parentesco: '',
                data_nasc_responsavel: '',
                cpf: '',
                ci: '',
                email: ''
            }
        },
        methods:{
            selecionarArquivo(e){
                this.perfil = e.target.files[0];
            },
            formFuncionario(e){
                e.preventDefault();
                let currentObj = this;
                const config = {
                    headers:{'content-type':'application/json'}
                }

                let formData = new FormData();
                formData.append('nome', this.nome);
                formData.append('perfil', this.perfil);
                formData.append('data_nasc', this.data_nasc);
                formData.append('tipo_sanguineo', this.tipo_sanguineo);
                formData.append('sexo', this.sexo);
                formData.append('cpf', this.cpf);
                formData.append('rg', this.rg);
                formData.append('nacionalidade', this.nacionalidade);
                formData.append('endereco', this.endereco);
                formData.append('bairro', this.bairro);
                formData.append('cidade', this.cidade);
                formData.append('estado', this.estado);
                formData.append('cep', this.cep);
                formData.append('celular', this.celular);
                formData.append('nome_responsavel', this.nome_responsavel);
                formData.append('data_nasc_responsavel', this.data_nasc_responsavel);
                formData.append('grau_parentesco', this.grau_parentesco);
                formData.append('cpf', this.cpf);
                formData.append('ci', this.ci);
                formData.append('email', this.email);
                console.log(formData);


                axios.post('/aluno/cadastrar', formData, config)
                    .then(function (response){
                        currentObj.success = response.data.success;
                        Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Novo aluno cadastrado com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                        this.input
                    })
                    .catch(function (error) {

                        currentObj.output = error;
                        Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'Erro ao cadastrar novo aluno.',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    });

            }
        },
        mounted(){
        }
    }
</script>

