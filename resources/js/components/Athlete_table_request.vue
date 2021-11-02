<template>
    <div>
        <h1 class "text-center">Solicitudes de Registro de Atletas</h1>
        <hr>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Numero de soliciutd</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Correo</th>
            <th scope="col">Id Categoría</th>
            <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>        
            <tr v-for = "Athlete_table_request in solicitudes" : key = "solicitud.id">
            <th scope="row">{{ solicitud.id }}</th>
            <td>{{ solicitud.name }}</td>
            <td>{{ solicitud.last_name }}</td>
            <td>{{ solicitud.email }}</td>
            <td>{{ solicitud.sport_id }}</td>
            <td>{{ solicitud.state }}</td>  
            </tr>            
        </tbody>
        </table>
    </div>
</template>

<script>
    export default{
        Data(){
            return {
                solicitudes:[],
            }
        }
        methods:{
            async list(){
                const res = await axios.get('solicitudes');
                this.solicitudes = res.data;
            }
        },
        created(){
            this.list();
        }
    }
</script>

<style>

</style>
