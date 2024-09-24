    <!-- sidebar @s -->
    <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
        <div class="nk-sidebar-element nk-sidebar-head">
            <div class="nk-sidebar-brand">
                <a href="/admin/dashboard" class="logo-link nk-sidebar-logo">
                    <h4> Gestion Autos</h4>
                    {{-- <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                  <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x"
                      alt="logo-dark">
                  <img class="logo-small logo-img logo-img-small" src="./images/logo-small.png"
                      srcset="./images/logo-small2x.png 2x" alt="logo-small"> --}}
                </a>
            </div>
            <div class="nk-menu-trigger me-n2">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                        class="icon ni ni-arrow-left"></em></a>
                <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                    data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
        </div>
        <!-- .nk-sidebar-element -->
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-content">

                <div class="nk-sidebar-menu" data-simplebar>
                    <ul class="nk-menu">

                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">
                                Tableau de bord
                            </h6>
                        </li>

                        <!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-pie-fill"></em></span>
                                <span class="nk-menu-text">Estadisticas</span>
                            </a>
                        </li>

                        <!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('gestion') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">

                                    <em class="icon ni ni-template"></em>
                                </span>
                                <span class="nk-menu-text">Ventas Récord</span>
                            </a>
                        </li>



                        <!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('clients') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                                <span class="nk-menu-text">Clientas</span>
                            </a>
                        </li>


                        <!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('car') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="ti ti-car"></em>
                                </span>
                                <span class="nk-menu-text">Carros</span>
                            </a>
                        </li>



                        <!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('wash-type') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-package"></em>
                                    {{-- <em class="ti ti-layout-width-full"></em> --}}
                                </span>
                                <span class="nk-menu-text">Tipos de lavado
                                </span>
                            </a>
                        </li>

                        <!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('service') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-list-thumb"></em></span>
                                <span class="nk-menu-text">Complementos</span>
                            </a>
                        </li>


                        <!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('payment-types') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-master-card"></em></span>
                                <span class="nk-menu-text">Método de pago
                                </span>
                            </a>
                        </li>




                        <!-- .nk-menu-item -->

                        {{-- <li class="nk-menu-heading">
                          <h6 class="overline-title text-primary-alt">Applications</h6>
                      </li> --}}

                        <!-- .nk-menu-heading -->

                        {{-- <li class="nk-menu-item has-sub">
                          <a href="#" class="nk-menu-link nk-menu-toggle">
                              <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                              <span class="nk-menu-text">Projects</span>
                          </a>
                          <ul class="nk-menu-sub">
                              <li class="nk-menu-item">
                                  <a href="html/project-card.html" class="nk-menu-link"><span
                                          class="nk-menu-text">Project Cards</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="html/project-list.html" class="nk-menu-link"><span
                                          class="nk-menu-text">Project List</span></a>
                              </li>
                          </ul><!-- .nk-menu-sub -->
                      </li> --}}

                        <!-- .nk-menu-item -->

                        {{-- <li class="nk-menu-item has-sub">
                          <a href="#" class="nk-menu-link nk-menu-toggle">
                              <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                              <span class="nk-menu-text">User Manage</span>
                          </a>
                          <ul class="nk-menu-sub">
                              <li class="nk-menu-item">
                                  <a href="html/user-list-default.html" class="nk-menu-link"><span
                                          class="nk-menu-text">User List - Default</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="html/user-list-regular.html" class="nk-menu-link"><span
                                          class="nk-menu-text">User List - Regular</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="html/user-list-compact.html" class="nk-menu-link"><span
                                          class="nk-menu-text">User List - Compact</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="html/user-details-regular.html" class="nk-menu-link"><span
                                          class="nk-menu-text">User Details - Regular</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="html/user-profile-regular.html" class="nk-menu-link"><span
                                          class="nk-menu-text">User Profile - Regular</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="html/user-card.html" class="nk-menu-link"><span class="nk-menu-text">User
                                          Contact - Card</span></a>
                              </li>
                          </ul><!-- .nk-menu-sub -->
                      </li> --}}

                        <!-- .nk-menu-item -->

                        {{-- <li class="nk-menu-item has-sub">
                          <a href="#" class="nk-menu-link nk-menu-toggle">
                              <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                              <span class="nk-menu-text">Customers</span>
                          </a>
                          <ul class="nk-menu-sub">
                              <li class="nk-menu-item">
                                  <a href="html/customer-list.html" class="nk-menu-link"><span
                                          class="nk-menu-text">Customer List</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="html/customer-details.html" class="nk-menu-link"><span
                                          class="nk-menu-text">Customer Details</span></a>
                              </li>
                          </ul><!-- .nk-menu-sub -->
                      </li> --}}

                        <!-- .nk-menu-item -->
                    </ul>
                    <!-- .nk-menu -->
                </div>

                <!-- .nk-sidebar-menu -->
            </div>
            <!-- .nk-sidebar-content -->
        </div>
        <!-- .nk-sidebar-element -->
    </div>
    <!-- sidebar @e -->
