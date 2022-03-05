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
        if (this.role == 6) {
            return `El atleta ${notification.data.Athlete_name} ${notification.data.Athlete_last_name} reservó una cita.`;

        } else if (this.role == 4) {
            return `${notification.data.Muscular_name} aceptó la reserva.`;
        }
    },
    deny() {
        axios.put('/notifications/markAll').then((respuesta) => {
            this.refresh();
        });
    },
    accept() {
        axios.put('/notifications/markAll').then((respuesta) => {
            this.refresh();
        });
    },
    init() {
        this.refresh();
    }
}" x-init="init()">

    <a id="notifications-dropdown" class="mt-1 ml-2 nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fas fa-solid fa-bell"></i> Notificaciones
        <span x-show="notifications.length > 0" x-text="notifications.length" class="badge badge-pill badge-info"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifications-dropdown">

        <span x-show="notifications.length > 0">
            <button class="dropdown-item text-center" type="button" x-on:click="readAll()">
                Marcar todo como leido
            </button>

            <div class="dropdown-divider"></div>
        </span>

        <div x-show="notifications.length == 0" class="dropdown-item text-muted">
            No hay notificaciones disponibles
        </div>

        <template x-for="notification in notifications" x-bind:key="notification.id">
            <div class="dropdown-item">

                <span class="d-inline">
                    <<<<<<< HEAD El atleta <span x-text="notification.data.Nombre_Atleta">
                </span>
                <span x-text="notification.data.Apellidos_Atleta"></span>
                reservó una cita

                <button type="button" class="btn" x-on:click="read(notification.id)">
                    <i class="far fa-envelope-open" data-toggle="tooltip" data-placement="top" title="Marcar como leido"></i>
                </button>
                </span>

                <div class="dropdown-divider"></div>

                @elseif(auth()->user()->role_id == 4)

                <span x-text="notification.data.Muscular_name"></span> aceptó la reserva
                <button type="button" class="d-inline btn" x-on:click="read(notification.id)"><i data-toggle="tooltip" data-placement="top" title="Marcar como leido" class="fas fa-check-circle"></i></button>

                @endif

                </li>
                =======
                <span x-text="message(notification)"></span> &nbsp;

                <span role="button" x-on:click="read(notification.id)">
                    <i class="fas fa-check-circle" data-toggle="tooltip" data-placement="top" title="Marcar como leido"></i>
                </span>
                </span>

            </div>
            >>>>>>> aa1f14e67460bfc2b3404b2f85bfbf58b58782e6
        </template>

        <div class="dropdown-divider"></div>

        <a href="{{ route('notifications.index') }}" class="dropdown-item text-center">
            Ver todo
        </a>

    </div>
</div>