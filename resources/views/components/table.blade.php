<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            {{ $head }}
        </thead>

        <tbody>
            {{ $body }}
        </tbody>

        @isset($foot)
        <tfoot>
            {{ $foot }}
        </tfoot>
        @endisset
    </table>
</div>
