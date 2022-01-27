@props(['color' => 'primary', 'title' => null, 'header' => null, 'collapse' => false])

<div class="card {{ $color ? "card-{$color}" : '' }} card-outline">

    @if(isset($title) || isset($header))
    <div class="card-header">

        <div class="row">

            @if(isset($title))
            <div class="col d-flex align-items-center">
                <h3 class="card-title">
                    {{ $title }}
                </h3>
            </div>
            @endif

            @if(isset($header))
            <div {{ $header->attributes->class(['col']) }}>
                {{ $header }}
            </div>
            @endif

            @if ($collapse)
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            @endif

        </div>

    </div>
    @endif

    @if(isset($body))
    <div {{ $body->attributes->class(['card-body']) }}>
        {{ $body }}
    </div>
    @endif

    @if (isset($footer))
    <div {{ $footer->attributes->class(['card-footer']) }}>
        {{ $footer }}
    </div>
    @endif
</div>
