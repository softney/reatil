@include('common.modalHeader')

<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="barcode">Cód. Barra (Barcode): <span class="text-danger">*</span> </label>
            <input type="text" wire:model.lazy="barcode" class="form-control"
            placeholder="Ingrese un cód. de barra">
            @error('barcode')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="name">Nombre Producto: <span class="text-danger">*</span> </label>
            <input type="text" wire:model.lazy="name" class="form-control"
            placeholder="Ingrese un nombre de producto">
            @error('name')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="cost">Precio Compra: <span class="text-danger">*</span> </label>
            <input type="number" wire:model.lazy="cost" class="form-control"
            placeholder="0">
            @error('cost')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="price">Precio Venta: <span class="text-danger">*</span> </label>
            <input type="number" wire:model.lazy="price" class="form-control"
            placeholder="0">
            @error('price')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="stock">Stock: <span class="text-danger">*</span> </label>
            <input type="number" wire:model.lazy="stock" class="form-control"
            placeholder="0">
            @error('stock')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="alerts">Inv. Min.: <span class="text-danger">*</span> </label>
            <input type="number" wire:model.lazy="alerts" class="form-control"
            placeholder="0">
            @error('alerts')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group mb-4">
            <label for="file">Imagen: </label>
            <input type="file" wire:model.lazy="image" class="form-control">
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" class="img-fluid img-thumbnail" style="max-height: 100px;">
        @endif
    </div>
</div>

@include('common.modalFooter')
