<template>
    <div>
        <table class="table table-striped">
            <tbody>
                <tr v-for="r in responsaveis" v-bind:key="r.id">
                    <td>
                        <strong>{{ r.pai.nome}}</strong> | {{ r.pai.grau_parentesco}} | {{ r.pai.celular}} | CPF: {{ r.pai.cpf}}
                    </td>
                </tr>
            </tbody>    
        </table>
    </div>
</template>
<script>
export default {
    props: ['id'],
    data() {
        return {
            responsaveis: [],
        }
    },
    methods: {
        getResponsaveis: function () {
            var _this = this;
            axios.get('/responsaveis/' + this.id)
                .then(function (response) {
                    // Sucesso
                    _this.responsaveis = response.data;
                })
                .catch(function (error) {
                    // Se tiver erros
                    Swal.fire({
                        position: 'center',
                        type: 'warning',
                        title: 'Não foi possível carregar informações sobre os responsáveis.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
        },

    },
    mounted() {
        this.getResponsaveis();
    }
}
</script>