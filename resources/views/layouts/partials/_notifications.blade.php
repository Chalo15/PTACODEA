<div x-data="{
    notifications: [],
    refresh() {
        console.log('');
        axios.get('/notifications/api').then((respuesta) => {
            this.notifications = respuesta.data;
        });
    },
    read(id) {
        console.log('Llega a read', id);
        axios.put(`/notifications/${id}/markNotification`).then((respuesta) => {
            this.refresh();
        });
    },
    readAll() {
        axios.put('/notifications/markAll').then((respuesta) => {
            this.refresh();
        });
    },
    init() {
        this.refresh();
    }
}" x-init="init()">
    <a id="navbarDropdown" class="mt-1 ml-2 nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fas fa-solid fa-bell"></i> Notificaciones
        <span x-text="notifications.length" class="badge badge-pill badge-info"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <div class="py-1 text-center d-block">
            <button x-on:click="readAll()" class=" btn btn-black-codea">MarkAll</button>
        </div>

        <span x-show="notifications.length == 0" class="dropdown-item">No hay notificaciones disponibles</span>

        <template x-for="notification in notifications" x-bind:key="notification.id">
            <li class="dropdown-item">

                @if(auth()->user()->role_id == 6)

                El atleta
                <span x-text="notification.data.Athlete_name"></span>
                <span x-text="notification.data.Athlete_last_name"></span>
                reservó una cita

                <button type="button" class="d-inline btn" x-on:click="read(notification.id)" data-toggle="tooltip" data-placement="top" title="Marcar como leido"><i class="fas fa-check-circle"></i></button>

                <div class="dropdown-divider"></div>

                @elseif(auth()->user()->role_id == 4)

                <span x-text="notification.data.Muscular_name"></span> aceptó la reserva
                <button type="button" class="d-inline btn" x-on:click="read(notification.id)"><i class="fas fa-check-circle"></i></button>

                @endif

            </li>
        </template>

        <div class="text-center dropdown-item">
            <a href="{{route('notifications.index')}}" class=" dropdown-item d-inline text-right m-2">Ver todo</a>
        </div>

    </div>
</div>
