@include('common.modalHeader')

<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-3">
            <label for="date_order">Fecha: <span class="text-danger">*</span> </label>
            <input type="date" wire:model.lazy="date_order" class="form-control" 
            placeholder="Ingrese una fecha">
            @error('date_order')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
        <div class="form-group mb-3">
            <label for="cost">Cliente: <span class="text-danger">*</span> </label>
            <select wire:model="clientid" class="form-control" id="pcliente">
                <option value="Seleccione..." disabled>Seleccione...</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}_{{ $client->address }}_{{ $client->commune }}">{{ $client->name }}</option>
                @endforeach
            </select>
            @error('clientid')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group mb-3">
            <label for="cost">Producto: <span class="text-danger">*</span> </label>
            <select wire:model="productid" class="form-control">
                <option value="Seleccione..." disabled>Seleccione...</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('productid')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-3">
            <label for="price">Cantidad: <span class="text-danger">*</span> </label>
            <input type="number" wire:model.lazy="quantity" class="form-control" 
            placeholder="0">
            @error('quantity')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-3">
            <label for="states">Estado: <span class="text-danger">*</span> </label>
            <select wire:model="states" class="form-control">
                <option value="Seleccione..." disabled>Seleccione...</option>
                @foreach (App\Models\Order::STATUS as $states)
                    <option value="{{ $states }}" {{ old('states') == $states ? 'selected' : '' }}>{{ $states }}</option>
                @endforeach
            </select>
            @error('states')<span class="text-danger er">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="form-group mb-0">
            <!-- <label for="barcode">Núm. Pedido: <span class="text-danger">*</span> </label> -->
            <input type="hidden" wire:model.lazy="code" class="form-control" 
            placeholder="N° pedido" disabled>
        </div>
    </div>
</div>



@include('common.modalFooter')


