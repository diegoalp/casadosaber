<template>
    <div>
        <span v-if="matricula">
            <p class="text-center" v-for="m in matricula"> {{ m.titulo }} </p>
        </span>
        <span v-else>
            <p class="text-center"><a href="#" class="btn btn-success"><b>Matricular</b></a></p>
        </span>
    </div>
</template>
<script>
export default {
    props: ['id'],
    data() {
        return {
            matricula: [],
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

    },
    mounted() {
        this.getMatricula();
    }
}
</script>