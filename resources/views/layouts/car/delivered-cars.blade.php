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
                                    <h3 class="nk-block-title page-title">Autos Entregados</h3>
                                </div>

                                <!-- .nk-block-head-content -->

                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                            data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                        {{-- <div class="toggle-expand-content" data-content="more-options">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div id="clients_filter"
                                                        class="form-control-wrap dataTables_filter">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-search"></em>
                                                        </div>
                                                        <input type="search" class="form-control" id="default-04"
                                                            placeholder="Search by name">
                                                    </div>
                                                </li>


                                                <li class="nk-block-tools-opt">

                                                    <button class="btn btn-primary d-none d-md-inline-flex "
                                                        data-toggle="modal" data-target="#modalCar"><em
                                                            class="icon ni ni-plus"></em>
                                                        <span>Add</span>
                                                    </button>

                                                </li>

                                            </ul>
                                        </div> --}}
                                    </div>
                                </div>

                                <!-- .nk-block-head-content -->
                            </div>
                            <!-- .nk-block-between -->
                        </div>
                        <!-- .nk-block-head -->
                        <div class="nk-block">

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
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Entregado</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Timpo</span></div>


                                </div>

                                @foreach ($cars as $car)
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
                                                <span
                                                    class="tb-status text-success">{{ $car->payment->name ?? '' }}</span>
                                            @endif
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            {{-- <span>{{ htmlspecialchars($car->status ?? '') }}</span> --}}
                                            @if ($car->status == 'delivered')
                                                <span class="tb-status text-success">Entregado</span>
                                            @endif
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            @if ($car->status != 'delivered')
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

                                    </div>
                                @endforeach


                            </div>






                            {{-- no-results-message s --}}

                            <div class="card" id="no-results-message" style="display: none;">
                                <div class="card-inner">

                                    <b>No cars found.</b>

                                </div>
                            </div>

                            {{-- no-results-message e --}}




                            <!-- pagination .card -->
                            <div class="card">
                                <div class="card-inner ">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <!-- Pagination links with custom prev and next buttons -->
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                @if ($cars->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Prev</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $cars->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                @if ($cars->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $cars->nextPageUrl() }}">Next</a>
                                                    </li>
                                                @else
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Next</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>



                                        <!-- .pagination-goto -->
                                    </div>
                                    <!-- .nk-block-between -->
                                </div>
                                <!-- .card-inner -->
                            </div>
                            <!-- pagination .card  end-->
                        </div>








                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->







        <!-- footer @s -->
        @include('partials._footer')
        <!-- footer @e -->

    </div>
    <!-- wrap @e -->


</div>
<!-- main end -->


@include('partials.scripts')
