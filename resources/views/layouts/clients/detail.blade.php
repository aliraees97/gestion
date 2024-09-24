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
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title"><strong
                                            class="text-primary small">{{ ucfirst($user->name) }} Detalles</strong></h3>

                                </div>
                                <div class="nk-block-head-content">
                                    <a href="/admin/clients"
                                        class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                            class="icon ni ni-arrow-left"></em><span>Atrás</span></a>

                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card">
                                <div class="card-aside-wrap">
                                    <div class="card-content">

                                        <!-- .nav-tabs -->
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-tb-list is-separate mb-3">
                                                    <div class="nk-tb-item nk-tb-head">

                                                        <div class="nk-tb-col tb-col-mb"><span
                                                                class="sub-text">Nombre</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb"><span
                                                                class="sub-text">Modelo</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg"><span
                                                                class="sub-text">Color</span>
                                                        </div>

                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="sub-text">
                                                                Matrícula
                                                            </span>
                                                        </div>

                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="sub-text">Tipo de lavado
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg"><span
                                                                class="sub-text">Complementos</span>
                                                        </div>

                                                        <div class="nk-tb-col tb-col-md"><span
                                                                class="sub-text">Tiempo</span>
                                                        </div>

                                                    </div>
                                                    @foreach ($records as $rec)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{ $rec->car->name ?? '' }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{ $rec->car->model ?? '' }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{ $rec->car->color ?? '' }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{ $rec->car->license_plate ?? '' }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{ $rec->package->name ?? '' }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                @foreach (json_decode($rec->services ?? '[]') as $service)
                                                                    <span
                                                                        class="badge bg-primary me-1">{{ htmlspecialchars($service) }}</span>
                                                                @endforeach
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="timer"
                                                                    data-created-at="{{ $rec->created_at }}"></span>
                                                            </div>


                                                        </div>
                                                    @endforeach

                                                </div>


                                            </div>




                                        </div>
                                        <!-- .card-inner -->
                                    </div>
                                    <!-- .card-content -->

                                    <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl"
                                        data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true"
                                        data-toggle-body="true">
                                        <div class="card-inner-group" data-simplebar>
                                            <div class="card-inner">

                                                <div class="user-card user-card-s2 mt-3">
                                                    <div class="user-avatar lg bg-primary">
                                                        <span>{{ htmlspecialchars(ucfirst(substr($user->name ?? '', 0, 1))) }}</span>
                                                    </div>
                                                    <div class="user-info">

                                                        <h5>{{ $user->name ?? '' }}</h5>
                                                        <span class="sub-text">{{ $user->email ?? '' }}</span>


                                                    </div>
                                                    <div class="author mt-5">
                                                        <p class="card-description text-center">
                                                            {{ $user->note ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>

                                                {{-- button  --}}
                                                <div class="button-container text-center mt-3">

                                                    @if ($user->note)
                                                        <div class="drodown">
                                                            <button id="modal-note" title="Add Note" data-toggle="modal"
                                                                data-target="#modalNote"
                                                                data-customer-id="{{ $user->id }}"
                                                                data-note="{{ $user->note }}"
                                                                class="dropdown-toggle btn btn-icon btn-primary addNote">
                                                                <em class="icon ni ni-plus"></em>
                                                            </button>

                                                        </div>
                                                    @endif

                                                </div>
                                                {{-- button  --}}

                                            </div>



                                            <!-- .card-inner -->

                                        </div>
                                        <!-- .card-inner -->
                                    </div>
                                    <!-- .card-aside -->
                                </div>
                                <!-- .card-aside-wrap -->
                            </div>
                            <!-- .card -->
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->



        <!-- Modal Content Code -->
        <div class="modal fade" tabindex="-1" id="modalNote">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em> </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Nota de actualización
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update-client-note') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="customer-id" value="">
                            <div class="form-group">
                                <label for="clientName">Nota</label>
                                <textarea name="note" class="form-control" required id="note-name" cols="30" rows="10"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar </button>
                        </form>
                    </div>
                </div>
            </div>




            <!-- footer @s -->
            @include('partials._footer')
            <!-- footer @e -->

        </div>
        <!-- wrap @e -->


    </div>
    <!-- main end -->


    @include('partials.scripts')
