@include('partials._head')

<!-- main start -->
<div class="nk-main ">
    <!-- sidebar @s -->
    @include('partials._sidebar')
    <!-- sidebar @e -->

    <!-- wrap @s -->
    <div class="nk-wrap ">
        <!-- main header @s -->
        @include('partials._header')
        <!-- main header @e -->


        <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-sm">

                            @include('partials.message')

                            <div class="nk-block-between">

                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Carros</h3>
                                </div>

                                <!-- .nk-block-head-content -->

                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                            data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="more-options">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    {{-- <div id="clients_filter"
                                                        class="form-control-wrap dataTables_filter">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-search"></em>
                                                        </div>
                                                        <input type="search" class="form-control" id="default-04"
                                                            placeholder="Search by name">
                                                    </div> --}}
                                                </li>


                                                <li class="nk-block-tools-opt">

                                                    <button class="btn btn-primary d-none d-md-inline-flex "
                                                        data-toggle="modal" data-target="#modalCar"><em
                                                            class="icon ni ni-plus"></em>
                                                        <span>Add</span>
                                                    </button>

                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- .nk-block-head-content -->
                            </div>
                            <!-- .nk-block-between -->
                        </div>
                        <!-- .nk-block-head -->
                        <div class="nk-block">


                            <h4 class="py-3">Autos en Proceso</h4>
                            <div class="nk-tb-list is-separate mb-3 no-car">
                                <div class="nk-tb-item nk-tb-head">


                                    <div class="nk-tb-col"><span class="sub-text">Client</span></div>
                                    <div class="nk-tb-col"><span class="sub-text">Nombre</span></div>
                                    <div class="nk-tb-col"><span class="sub-text">Modelo</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Matrícula</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Color</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Tipo de lavado</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Complementos</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Pagada</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Estado</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Timpo</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Acción</span></div>

                                </div>
                                @foreach ($carsInProcess as $car)
                                    <div class="nk-tb-item">

                                        <div class="nk-tb-col">
                                            <a href="detail/{{ $car->customer->id }}">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-primary">
                                                        <span>{{ htmlspecialchars(ucfirst(substr($car->customer->name ?? '', 0, 1))) }}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span
                                                            class="tb-lead">{{ htmlspecialchars($car->customer->name ?? '') }}
                                                            <span class="dot dot-success d-md-none ms-1"></span></span>
                                                        <span>{{ htmlspecialchars($car->customer->email ?? '') }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->name ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->model ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->license_plate ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->color ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->package->name ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            @foreach (json_decode($car->services ?? '[]') as $service)
                                                <span
                                                    class="badge bg-primary me-1">{{ htmlspecialchars($service) }}</span>
                                            @endforeach
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            {{-- <span>{{ htmlspecialchars($car->status ?? '') }}</span> --}}
                                            @if ($car->pay_status != 'paid')
                                                <span class="tb-status text-danger">No</span>
                                            @else
                                                <span class="tb-status text-success">Yes</span>
                                            @endif
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            {{-- <span>{{ htmlspecialchars($car->status ?? '') }}</span> --}}
                                            @if ($car->status == 'incomplete')
                                                <span class="tb-status text-danger">Autos en Proceso</span>
                                            @endif
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span class="timer" data-created-at="<?php echo $car->created_at; ?>">
                                            </span>
                                        </div>


                                        <div class="nk-tb-col tb-col-md">

                                            <button data-id="{{ $car->id }}" data-toggle="modal"
                                                data-target="#modalCompleted"
                                                class="btn btn-primary btn-round btn-icon ">
                                                <em class="icon ni ni-check"></em>
                                            </button>

                                            @if ($car->pay_status != 'paid')
                                                <button data-id="{{ $car->id }}" data-toggle="modal"
                                                    data-target="#modalPayment"
                                                    class="btn btn-primary btn-round btn-icon">
                                                    <em class="icon ni ni-money"></em>
                                                </button>
                                            @endif



                                            {{-- <a href="/delete-car/{{ $car->id }}" class="btn btn-danger ">
                                                    <em class="icon ni ni-trash-alt"></em>
                                                </a> --}}
                                        </div>

                                    </div>
                                @endforeach


                            </div>

                            <!-- pagination .card for Autos en Proceso -->
                            <div class="card">
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                @if ($carsInProcess->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Prev</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $carsInProcess->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                @if ($carsInProcess->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $carsInProcess->nextPageUrl() }}">Next</a>
                                                    </li>
                                                @else
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Next</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End pagination .card -->



                            <h4 class="py-3">Autos Listos</h4>
                            <div class="nk-tb-list is-separate mb-3">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col"><span class="sub-text">Client</span></div>
                                    <div class="nk-tb-col"><span class="sub-text">Nombre</span></div>
                                    <div class="nk-tb-col"><span class="sub-text">Modelo</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Matrícula</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Color</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Tipo de lavado</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Complementos</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Pagada</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Estado</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Timpo</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Acción</span></div>

                                </div>

                                @foreach ($carsReady as $car)
                                    <div class="nk-tb-item">

                                        <div class="nk-tb-col">
                                            <a href="detail/{{ $car->customer->id }}">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-primary">
                                                        <span>{{ htmlspecialchars(ucfirst(substr($car->customer->name ?? '', 0, 1))) }}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span
                                                            class="tb-lead">{{ htmlspecialchars($car->customer->name ?? '') }}
                                                            <span class="dot dot-success d-md-none ms-1"></span></span>
                                                        <span>{{ htmlspecialchars($car->customer->email ?? '') }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->name ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->model ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->license_plate ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->color ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->package->name ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            @foreach (json_decode($car->services ?? '[]') as $service)
                                                <span
                                                    class="badge bg-primary me-1">{{ htmlspecialchars($service) }}</span>
                                            @endforeach
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            {{-- <span>{{ htmlspecialchars($car->status ?? '') }}</span> --}}
                                            @if ($car->pay_status != 'paid')
                                                <span class="tb-status text-danger">No</span>
                                            @else
                                                <span class="tb-status text-success">Yes</span>
                                            @endif
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            {{-- <span>{{ htmlspecialchars($car->status ?? '') }}</span> --}}
                                            @if ($car->status == 'completed')
                                                <span class="tb-status text-success">Autos Listos</span>
                                            @endif
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            @if ($car->status != 'completed')
                                                <span class="timer" data-created-at="<?php echo $car->created_at; ?>">
                                                </span>
                                            @else
                                                @php
                                                    // Calculate the time difference
                                                    $createdAt = \Carbon\Carbon::parse($car->created_at);
                                                    $completedAt = \Carbon\Carbon::parse($car->completed_at);
                                                    $differenceInSeconds = $createdAt->diffInSeconds($completedAt); // Get difference in seconds

                                                    // Convert seconds to minutes and seconds
                                                    $minutes = floor($differenceInSeconds / 60);
                                                    $seconds = $differenceInSeconds % 60;
                                                @endphp
                                                <span>
                                                    @if ($minutes > 0)
                                                        {{ $minutes }} min{{ $minutes > 1 ? 's' : '' }}
                                                    @endif
                                                    @if ($seconds > 0)
                                                        {{ $seconds }} sec{{ $seconds > 1 ? 's' : '' }}
                                                    @endif
                                                </span>
                                            @endif
                                        </div>


                                        <div class="nk-tb-col tb-col-md">

                                            @if ($car->pay_status != 'paid')
                                                <button data-id="{{ $car->id }}" data-toggle="modal"
                                                    data-target="#modalPayment"
                                                    class="btn btn-primary btn-round btn-icon">
                                                    <em class="icon ni ni-money"></em>
                                                </button>
                                            @endif

                                            @if ($car->pay_status != 'unpaid')
                                                <button data-id="{{ $car->id }}" data-toggle="modal"
                                                    data-target="#modalWhatsApp"
                                                    class="btn btn-primary btn-round btn-icon">
                                                    <em class="icon ni ni-send"></em>
                                                </button>
                                            @endif



                                        </div>

                                    </div>
                                @endforeach


                            </div>

                            <!-- pagination .card for Autos Listos -->
                            <div class="card">
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                @if ($carsReady->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Prev</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $carsReady->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                @if ($carsReady->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $carsReady->nextPageUrl() }}">Next</a>
                                                    </li>
                                                @else
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Next</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End pagination .card -->







                            {{-- no-results-message s --}}

                            <div class="card" id="no-results-message" style="display: none;">
                                <div class="card-inner">

                                    <b>No cars found.</b>

                                </div>
                            </div>

                            {{-- no-results-message e --}}

                        </div>








                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->

        {{--  modal start Add New car  --}}
        <div class="modal fade" tabindex="-1" id="modalCar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Car</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Alert for errors -->
                        <div id="errorMessages" class="alert alert-danger d-none">
                            <ul id="errorList"></ul>
                        </div>

                        <form id="carForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="customer_id">Client</label>
                                <select name="customer_id" id="customer_id" class="form-control" required>
                                    <option value="">Select Client</option>
                                    @foreach ($customer as $cust)
                                        <option value="{{ $cust->id }}">{{ $cust->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-note car-model">
                                    <a href="#" class="text-left" data-toggle="modal"
                                        data-target="#modalClient">Create a New Client</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input type="text" name="model" class="form-control" id="model" required>
                            </div>

                            <div class="form-group">
                                <label for="license_plate">Matrícula</label>
                                <input type="text" name="license_plate" class="form-control" id="license_plate"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" name="color" class="form-control" id="color" required>
                            </div>

                            <div class="form-group">
                                <label for="package_id">Package</label>
                                <select name="package_id" id="package_id" class="form-control" required>
                                    <option value="">Select Package</option>
                                    @foreach ($package as $pack)
                                        <option value="{{ $pack->id }}">{{ $pack->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="service_id">Service</label>
                                <div class="form-control-wrap">
                                    <select name="services[]" id="service_id"
                                        class="form-select js-select2 select2-hidden-accessible" multiple required
                                        data-placeholder="Select Multiple options" tabindex="-1" aria-hidden="true">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->name }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pay_status">Paid</label>
                                <select name="pay_status" id="pay_status" class="form-control" required>
                                    <option value="unpaid">No</option>
                                    <option value="paid">Yes</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar registro</button>
                                <button class="btn btn-danger close-modal ml-auto"
                                    data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal End Add New  car --}}


        {{-- Mark as completed Modal Start --}}

        <div class="modal fade" tabindex="-1" id="modalCompleted">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em
                            class="icon ni ni-cross"></em>
                    </a>

                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                            <h4 class="nk-modal-title">Are you sure?</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Do you want to mark this as finished?
                                </div>

                            </div>
                            <div class="nk-modal-action">
                                <a href="#" class="btn btn-lg btn-mw btn-primary complete-btn">Yes, finish
                                    it!</a>
                                <a href="#" data-dismiss="modal"
                                    class="btn btn-lg btn-mw btn-danger mx-2">Cancel</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Mark as completed Modal End --}}




        {{-- Payment Completed Modal Start --}}

        <div class="modal fade" tabindex="-1" id="modalPayment">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Método de Pago</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Payment Method Selection -->
                        <div class="form-group">
                            <label for="payment_id">Método de Pago</label>

                            <select name="payment_id" id="payment_id" class="form-control" required>
                                <option value="">Select Payment Method</option>
                                @foreach ($payments as $pay)
                                    <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="nk-modal-action">
                            <button type="button" class="btn btn-lg btn-mw btn-primary payment-complete">Completar
                                Pago</button>
                            <a href="#" data-dismiss="modal"
                                class="btn btn-lg btn-mw btn-danger mx-2">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  Payment Completed Modal End --}}



        {{-- Payment Completed Modal Start --}}

        <div class="modal fade" tabindex="-1" id="modalWhatsApp">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Información del Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <button class="whatsapp-btn btn btn-primary" data-phone="{{ $car->customer->phone ?? '' }}"
                            data-name="{{ $car->customer->name ?? '' }}">
                            <em class="icon ni ni-whatsapp"></em><span class="mx-1"> Enviar WhatsApp</span>
                        </button>

                        <button class="btn btn-success mark-as-deliver">
                            <span class="mx-1"> Marcar como entregado.</span>
                        </button>
                        {{-- <a href="#" data-dismiss="modal" class="btn btn-lg btn-mw btn-success mx"></a> --}}

                    </div>
                </div>
            </div>
        </div>

        {{--  Payment Completed Modal End --}}




        <!-- car Update Modal S -->

        <div class="modal fade" id="editcarModal" tabindex="-1" role="dialog" aria-labelledby="editcarModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editcarModalLabel">Update Car</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form id="editcarForm">
                            @csrf
                            <input type="hidden" name="id" id="car-id">

                            <div class="form-group">
                                <label for="car-name">Nombre</label>
                                <input type="text" class="form-control" id="car-name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="car-model">Modelo</label>
                                <input type="text" class="form-control" id="car-model" name="model" required>
                            </div>

                            <div class="form-group">
                                <label for="car-license">Matrícula</label>
                                <input type="text" class="form-control" id="car-license" name="license_plate"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="car-color">Color</label>
                                <input type="text" class="form-control" id="car-color" name="color" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- car Update Modal E -->




        {{--  modal start Add New  Client  --}}

        <div class="modal fade" tabindex="-1" id="modalClient">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <a href="#" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <em class="icon ni ni-cross"></em> </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                        <form action="{{ route('add-client-ajax') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="default-01">Nombre del Cliente</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" name="name"
                                        required>
                                    @if ($errors->has('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Teléfono</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" name="phone">
                                    @if ($errors->has('phone'))
                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Correo electrónico
                                </label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="default-01" name="email">
                                    @if ($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cliente</button>


                            </div>


                        </form>

                    </div>

                </div>
            </div>
        </div>

        {{-- modal End Add New  Client --}}



        <!-- footer @s -->
        @include('partials._footer')
        <!-- footer @e -->

    </div>
    <!-- wrap @e -->


</div>
<!-- main end -->


@include('partials.scripts')
