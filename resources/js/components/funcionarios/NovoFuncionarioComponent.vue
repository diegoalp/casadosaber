<template>

    <section class="content">
        <div class="row">
            
            <form @submit="formFuncionario" name="formFuncionario">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Novo Funcionário</h3>
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

                        <div class="col-sm-12 col-md-2 form-group">
                            <label for="cpf">CPF*</label>
                            <input type="text" v-mask="'###.###.###-##'" class="form-control" v-model="cpf" name="cpf" id="cpf" placeholder="Informe somente números" required/>
                        </div>

                        <div class="col-sm-12 col-lg-2 form-group">
                            <label for="rg">RG*</label>
                            <input type="text" class="form-control" name="rg" id="rg" v-model="rg" placeholder="RG" required/>
                        </div>

                        <div class="col-sm-12 col-lg-3 form-group">
                            <label for="naturalidade">Naturalidade</label><br/>
                            <input type="text" class="form-control" name="naturalidade" v-model="naturalidade" id="naturalidade" placeholder="Cidade/UF"/>
                        </div>

                        <div class="col-sm-12 col-md-2 form-group">
                            <label for="cargo">Cargo</label>
                            <select class="form-control" name="cargo" v-model="cargo" id="cargo" required>
                                <option value="Nenhum">Nenhum</option>
                                <option value="Professor">Professor</option>
                                <option value="Aux. Administrativo">Aux. Administrativo</option>
                                <option value="Porteiro">Porteiro</option>
                                <option value="Nutricionista">Nutricionista</option>
                                <option value="Berçarista">Berçarista</option>
                                <option value="Cozinheira">Cozinheira</option>
                                <option value="Serviços Gerais">Serviços Gerais</option>
                                <option value="Psicólogo">Psicólogo</option>
                                <option value="Fonoaudiólogo">Fonoaudiólogo</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-2 form-group">
                            <label for="escolaridade">Escolaridade</label>
                            <select class="form-control" name="escolaridade" v-model="escolaridade" id="escolaridade" required>
                            <option value="Nenhuma"> Nenhuma </option>
                            <option value="Fundamental Incompleto"> Fundamental Incompleto</option>
                            <option value="Fundamental Completo"> Fundamental Completo</option>
                            <option value="Médio Incompleto"> Médio Incompleto</option>
                            <option value="Médio Completo"> Médio Completo</option>
                            <option value="Superior Incompleto"> Superior Incompleto</option>
                            <option value="Superior Completo"> Superior Completo</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3 form-group">
                            <div class="form-group row">
                                <label for="data_admissao">Data de admissão*</label>
                                <input type="date" name="data_admissao" id="data_admissao" v-model="data_admissao" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 form-group">
                            <label for="salario">Salário*</label>
                            <input type="text" class="form-control" name="salario" v-model="salario" id="salario" v-money="money" placeholder="Somente números" required />
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

                        <div class="col-sm-12 col-md-3 form-group">
                            <label for="celular">Celular*</label><br/>
                            <input type="text" class="form-control" name="celular" v-model="celular" id="celular" v-mask="['(##) ####-####', '(##) #####-####']" placeholder="Telefone para contato" required/>

                        </div>
                        <div class="col-md-4 form-group">
                            <label>Estágio?</label><br/>
                            <div class="form-check form-check-inline">
                                <label class="radio-inline" for="estagio-sim"><input class="form-check-input" type="radio" v-model="estagio" name="estagio" id="estagio-sim" value="1"> Sim</label>
                                <label class="radio-inline" for="estagio-nao"><input class="form-check-input" type="radio" v-model="estagio" name="estagio" id="estagio-nao" value="2"> Não</label>
                            </div>
                        </div>
                        <!-- Form usuário -->
                                            <div class="col-md-12 box" v-if="cargo == 'Professor' || cargo == 'Aux. Administrativo'"> 
                                                <input type="hidden" id="id" class="form-control">
                                                <div class="form-group col-md-4">
                                                    <label for="email">E-mail</label><br />
                                                    <input type="text" class="form-control" v-model="email" name="email" id="email" placeholder="E-mail de usuário" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nivel">Nível de acesso</label><br />
                                                            <select class="form-control" v-model="nivel_acesso" id="nivel" name='nivel'>
                                                                <option value="superadmin">Super admin</option>
                                                                <option value="admin">Administrador</option>
                                                                <option value="professor">Professor</option>
                                                                <option value="financeiro">Financeiro</option>
                                                                <option value="pai">Pai</option>
                                                            </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="senha">Senha</label><br />
                                                    <input type="text" class="form-control" v-model="senha" name="senha" id="senha" />
                                                </div>
                                            </div>
                                            <!-- Fim form usuário -->
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
    import {Money} from 'v-money'
    export default {
        name: "NovoFuncionarioComponent",
        components: {TheMask,Money},

        data(){
            return{
                money:{
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    precision: 2,
                    masked: false
                },
                nome: '',
                    data_nasc: '',
                    tipo_sanguineo: '',
                    sexo: '',
                    cpf: '',
                    rg: '',
                    naturalidade: '',
                    escolaridade: '',
                    cargo: '',
                    salario: '',
                    data_admissao: '',
                    endereco: '',
                    bairro: '',
                    cidade: '',
                    estado: '',
                    cep: '',
                    celular: '',
                    estagio: '',
                    email: '',
                    senha: '',
                    nivel_acesso: ''
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
                    headers:{'content-type':'multipart/form-data'}
                }
                let formData = new FormData();
                formData.append('nome', this.nome);
                formData.append('perfil', this.perfil);
                formData.append('data_nasc', this.data_nasc);
                formData.append('tipo_sanguineo', this.tipo_sanguineo);
                formData.append('sexo', this.sexo);
                formData.append('cpf', this.cpf);
                formData.append('rg', this.rg);
                formData.append('naturalidade', this.naturalidade);
                formData.append('escolaridade', this.escolaridade);
                formData.append('cargo', this.cargo);
                formData.append('salario', this.salario);
                formData.append('data_admissao', this.data_admissao);
                formData.append('endereco', this.endereco);
                formData.append('bairro', this.bairro);
                formData.append('cidade', this.cidade);
                formData.append('estado', this.estado);
                formData.append('cep', this.cep);
                formData.append('celular', this.celular);
                formData.append('estagio', this.estagio);
                formData.append('email', this.email);
                formData.append('nivel_acesso', this.nivel_acesso);
                formData.append('senha', this.senha);

                axios.post('/funcionario/novo', formData, config)
                    .then(function (response){
                        currentObj.success = response.data.success;
                        Swal.fire({
                            position: 'center',
                            title:'Sucesso',
                            type: 'success',
                            title: 'Novo funcionário cadastrado com sucesso.',
                            showConfirmButton: true,
                            timer: 1500
                        })
                        .then(function() {
                                    window.location.href = "/funcionarios";
                                })
                    })
                    .catch(function (error) {

                        currentObj.output = error;
                        Swal.fire({
                            position: 'center',
                            title:'Ops',
                            type: 'error',
                            title: 'Erro ao cadastrar novo funcionáro.',
                            showConfirmButton: false,
                            timer: 1500
                    })

                    });
                    $('formFuncionario').submit(function(){
                        $(this)[0].reset();
                    });

            }
        },
        mounted(){
        }
    }
</script>

