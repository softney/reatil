@include('common.modalHeader')

<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="name">Nombre: <span class="text-danger">*</span> </label>
            <input type="text" wire:model.lazy="name" class="form-control"
            placeholder="Ingrese un nombre">
            @error('name')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="phone">Teléfono: <span class="text-danger">*</span> </label>
            <input type="text" wire:model.lazy="phone" class="form-control"
            placeholder="Ingrese un teléfono"
            data-toggle="input-mask" data-mask-format="(+56) 0 00000000">
            @error('phone')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="email">Email: <span class="text-danger">*</span> </label>
            <input type="email" wire:model.lazy="email" class="form-control"
            placeholder="Ingrese un email">
            @error('email')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="address">Dirección: <span class="text-danger">*</span> </label>
            <input type="text" wire:model.lazy="address" class="form-control"
            placeholder="Ingrese una dirección">
            @error('address')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="email">Comuna: <span class="text-danger">*</span> </label>
            <select wire:model="communeid" class="form-control">
                <option value="Seleccione una comuna" disabled>Seleccione una comuna</option>
                @foreach ($communes as $commune)
                    <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                @endforeach
            </select>
            @error('communeid')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
</div>

@include('common.modalFooter')