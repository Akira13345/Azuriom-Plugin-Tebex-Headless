<div class="card h-100">
    @if ($package->image)
        <img class="card-img-top" draggable="false" src="{{ $package->image }}" alt="{{ $package->name }}">
    @endif
    <div class="card-body">
        <h4 class="card-title">{{ $package->name }}</h4>
        <h5 class="card-subtitle mb-3">
            @if ($package->price->discounted)
                <del class="small text-danger">{{ tebex_format_price($package->price->normal) }}</del>
                {{ tebex_format_price($package->price->discounted) }}
            @else
                {{ tebex_format_price($package->price->normal) }}
            @endif
            <span><small>{{ setting('tebex.shop.vat.status') ? trans('tebex::messages.vat.ttc') : trans('tebex::messages.vat.ht') }}</small></span>
        </h5>

        @if(isset($package->banner) && $package->banner)
            <div class="package-banner" style="background-color: {{ $package->banner->color }};">
                {{ $package->banner->text }}
            </div>
        @endif

        <style>
            .card.h-100 {
                position: relative;
                overflow: hidden;
            }
            .package-banner {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                padding: 3px 10px;
                color: white;
                font-weight: bold;
                font-size: 0.75rem;
                text-transform: uppercase;
                text-align: center;
                z-index: 10;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                pointer-events: none;
            }
        </style>

        <div class="d-flex gap-2">
            <button class="btn btn-primary" onclick="openPackageModal({{ json_encode($package) }})">
                @if ($package->isInCart)
                    <i class="bi bi-pencil-square"></i> {{ trans('messages.actions.edit') }}
                @else
                    <i class="bi bi-cart-plus"></i> {{ trans('messages.actions.add') }}
                @endif
            </button>
        </div>
    </div>
</div>
