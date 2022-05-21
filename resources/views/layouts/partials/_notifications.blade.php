<div x-data="{
    notifications: [],
    role: {{ auth()->user()->role_id }},
    refresh() {
        axios.get('/notifications/api').then(({ data }) => {
            this.notifications = data;
            reloadPlugins();
        });
    },
    read(id) {
        axios.put(`/notifications/${id}/markNotification`).then(() => this.refresh());
    },
    readAll() {
        axios.put('/notifications/markAll').then(() => this.refresh());
    },
    message(notification) {
        if (this.role == 6 || this.role == 5) {
            return `El instructor ${notification.data.Nombre_Atleta} ${notification.data.Apellidos_Atleta}, cédula ${notification.data.Id_Atleta} reservó una cita`;

        } else if (this.role == 2) {
            if(notification.data.State == 'CONFIRMADA'){
                return `${notification.data.Nombre_Encargado} aceptó la reserva de ${notification.data.Role_Encargado}.`;
            }else if(notification.data.State == 'PENDIENTE'){
                return `${notification.data.Nombre_Encargado} rechazó la reserva de ${notification.data.Role_Encargado}.`;
            }
        }
    },
    deny() {
        axios.put('/notifications/markAll').then((respuesta) => {
            this.refresh();
        });
    },
    accept(appointment) {
        axios.put(`/notfifications/${appointment}/accept`).then((respuesta) => {
            this.refresh();
        });
    },
    init() {
        this.refresh();
    }
}" x-init="init()">

    <a id="notifications-dropdown" class="mt-1 ml-2 nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fas fa-envelope"></i> Notificaciones
        <span x-show="notifications.length > 0" x-text="notifications.length" class="badge badge-pill badge-info"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifications-dropdown">

        <span x-show="notifications.length > 0">
            <button class="dropdown-item text-center" type="button" x-on:click="readAll()">
                <i class="fas fa-envelope-open"></i> Marcar notificaciones como leidas
            </button>

            <div class="dropdown-divider"></div>
        </span>

        <div x-show="notifications.length == 0" class="dropdown-item text-muted">
            No hay notificaciones disponibles
        </div>

        <template x-for="notification in notifications" x-bind:key="notification.id">
            <div class="dropdown-item ">

                <span x-text="message(notification)"></span> &nbsp;
                @if(auth()->user()->role_id == 2)
                <div x-show="role == 2" class="d-inline">
                    <button type="button" class="d-inline btn" x-on:click="read(notification.id)">
                        <i class="fas fa-envelope-open" data-toggle="tooltip" data-placement="top" title="Marcar como leido"></i>
                    </button>
                </div>
                @elseif(auth()->user()->role_id == 6 || auth()->user()->role_id == 5 )
                <div x-show="role == 6" class="d-inline justify-content-end">
                    <button type="button" class="d-inline btn" x-on:click="read(notification.id)">
                        <i class="fas fa-envelope-open" data-toggle="tooltip" data-placement="top" title="Marcar como leido"></i>
                    </button>
                    <button type="button" class="d-inline btn" x-on:click="accept(notification.id)">
                        <i data-toggle="tooltip" data-placement="top" title="Aceptar Reserva" class="fas fa-check-circle"></i>
                    </button>
                    <button type="button" class="d-inline btn" x-on:click="read(notification.id)">
                        <i class="fas fa-ban" data-toggle="tooltip" data-placement="top" title="Denegar Reserva"></i>
                    </button>
                </div>
                @endif


            </div>
        </template>

        <div class="dropdown-divider"></div>
        @can('role',['Instructor'])
        <div class="text-center">
            <a href="{{ route('appointments.index') }}" class="btn btn-primary my-1">
                Mis citas
            </a>
        </div>
        @endcan
        @can('role',['Musculacion','Fisioterapia'])
        <div class="text-center">
            <a href="{{ route('appointments.index') }}" class=" btn btn-primary">
                <i class="mr-1 fas fa-calendar-check"></i> Ir a confirmación de citas
            </a>
        </div>
        @endcan
    </div>
</div>