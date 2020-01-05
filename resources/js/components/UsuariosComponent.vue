<template>
<div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
              <div class="col-sm-12">
              <table id="usuarios" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="usuarios_info">
                <thead>
                <tr role="row">
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Nível</th>
                </tr>
                </thead>
                <tbody>
                <tr role="row" class="odd" v-for="u in lista_usuarios.data" :key="u.id">
                  <td>{{u.name}}</td>
                  <td>{{u.email}}</td>
                  <td>{{ u.user_type }}</td>
                  <td><a href="javascript:void(0);" class="badge bg-red" v-on:click='removerUsuario(u.id)'>Remover</a></td>
                </tr>
                </tbody>
              </table></div></div><div><pagination :data="lista_usuarios" @pagination-change-page="loadUsuarios">
                    <span slot="prev-nav">&lt; Anterior</span>
                    <span slot="next-nav">Próxima &gt;</span>
                </pagination>
                </div>
                <button type="button" href="#" data-toggle="modal" data-target="#modalUsuario" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Novo usuário</button>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- Modal -->
    <div class="modal fade" id="modalUsuario" tabindex="-9" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" id="formUsuario" @submit="novoUsuario">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de novo usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <input type="hidden" id="id" class="form-control">
                            <div class="form-group">
                                <label for="nomeUsuario">Nome</label><br />
                                <input type="text" class="form-control" v-model="usuario.nome" name="nomeUsuario" id="nomeUsuario" placeholder="Nome" />
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label><br />
                                <input type="text" class="form-control" v-model="usuario.email" name="email" id="email" placeholder="E-mail de usuário" />
                            </div>
                            <div class="form-group">
                                <label for="nivel">Nível de acesso</label><br />
                                        <select class="form-control" v-model="usuario.nivel_acesso" id="nivel" name='nivel'>
                                            <option value="superadmin">Super admin</option>
                                            <option value="admin">Administrador</option>
                                            <option value="professor">Professor</option>
                                            <option value="financeiro">Financeiro</option>
                                            <option value="pai">Pai</option>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label><br />
                                <input type="text" class="form-control" v-model="usuario.senha" name="senha" id="senha" />
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
            lista_usuarios: {},
            usuario: {
                nome: '',
                email: '',
                senha: '',
                nivel_acesso: ''
            }
        }
    },
    methods:{
        loadUsuarios(page = 1) {
                axios.get('/listausuarios?page=' + page)
                    .then(response => {
                        this.lista_usuarios= response.data;
                    });
                    
        },
        novoUsuario(e) {
            e.preventDefault();
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'application/json'
                }
            }
            axios.post('/novousuario', this.usuario, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Novo usuário cadastrado com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(function (error) {
                    currentObj.output = error;
                    Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'Erro ao cadastrar novo usuário. <br/>Tente novamente.',
                        showConfirmButton: false,
                        timer: 1500
                    });

                });
                this.loadUsuarios();
                $('#modalUsuario').removeClass('in');
                $('#modalUsuario').attr("aria-hidden","true");
                $('#modalUsuario').css("display", "none");
                $('.modal-backdrop').remove();
                $('body').removeClass('modal-open');
        },
        removerUsuario(id){
                axios.delete('/usuario/' + id)
                    .then((response) => {
                        Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Usuário com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    },(error) => {
                        Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'Ops!<br/>Houve um erro ao tentar remover este usuário.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    })
                this.loadUsuarios();
            }
    },
    mounted() {
        this.loadUsuarios();
    }
}
</script>