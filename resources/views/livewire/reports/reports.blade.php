<div>
    @section('title', 'Reoprtes')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $componentName }}</h4>

                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <label class="">Elige un Usuario</label>
                                        <div class="form-group">
                                            <select wire:model="userId" class="form-control">
                                                <option value="0">Todos</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="">Elige un tipo de reporte</label>
                                        <div class="form-group">
                                            <select wire:model="reportType" class="form-control">
                                                <option value="0">Ventas del día</option>
                                                <option value="1">Ventas por fecha</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="">Fecha desde</label>
                                        <div class="form-group">
                                            <input type="date" wire:model="dateFrom" class="form-control date"
                                            placeholder="Seleccione una fecha">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="">Fecha hasta</label>
                                        <div class="form-group">
                                            <input type="date" wire:model="dateTo" class="form-control date"
                                            placeholder="Seleccione una fecha">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button wire:click="$refresh" class="btn btn-dark btn-sm btn-block">
                                                Consultar
                                            </button>

                                            <a href="{{ url('report/excel' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}"
                                                class="btn btn-dark btn-sm btn-block {{ count($data) <1 ? 'disabled' : '' }}"
                                                target="_blank">
                                                Exportar a EXCEL
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">                            
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered table-centered" style="width: 100%;">
                                    <thead class="text-white bg-dark">
                                        <tr>
                                            <th>Folio</th>
                                            <th class="text-right" style="padding-right: 15px;">Total</th>
                                            <th class="text-right" style="padding-right: 15px;">Cantidad</th>
                                            <th>Estado</th>
                                            <th>Usuario</th>
                                            <th class="text-center">Fecha</th>
                                            <th width="70px" class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) < 1)
                                            <tr><td colspan="7" class="text-center">No hay ventas registradas.</td></tr>
                                        @endif
                                        @foreach ( $data as $da )
                                             <tr>
                                                <td>{{ $da->id }}</td>
                                                <td class="text-right" style="padding-right: 15px;">$ {{ number_format($da->total, 0, ",", ".") }}</td>
                                                <td class="text-right" style="padding-right: 15px;">{{ number_format($da->items, 0, ",", ".") }}</td>
                                                <td>{{ $da->status }}</td>
                                                <td>{{ $da->user }}</td>
                                                <td class="text-center">{{ \Carbon\Carbon::parse($da->created_at)->format('d-m-Y') }}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0);" wire:click.prevent="getDetails({{ $da->id }})">
                                                        <i class="fas fa-file-invoice text-dark font-16"></i>
                                                    </a>                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        @include('livewire.reports.salesDetail')
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('show-modal', msg => {
            $('#modal-details').modal('show')
        });

        $(".selector").flatpickr({
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                    ],
                },

                months: {
                    shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                    ],
                },
            },
        });      
    });

    
</script>


