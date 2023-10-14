<div>
    @section('title', 'Ventas')

    <div class="row" wire:poll>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            {{-- DETALLES --}}
            @include('livewire.sales.partials.detail')
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            {{-- TOTAL --}}
            @include('livewire.sales.partials.total')

            {{-- COINS --}}
            @include('livewire.sales.partials.coins')
        </div>
    </div>
</div>

@include('livewire.sales.scripts.shortcusts')
@include('livewire.sales.scripts.events')
@include('livewire.sales.scripts.general')
@include('livewire.sales.scripts.scan')
