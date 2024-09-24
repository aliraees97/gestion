    <!-- select region modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div>
    <!-- .modal -->

    <!-- JavaScript -->
    <script src="{{ asset('/assets/js/bundle.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('/assets/js/charts/chart-ecommerce.js?ver=3.2.3') }}"></script>

    {{-- bootstrap links s --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- bootstrap links e --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>





    <script>
        $(document).ready(function() {

            // Update Client Script S

            $('#editClientModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var customerId = button.data('client-id');

                $.ajax({
                    url: '/customer/' + customerId, // Adjust the URL to match your route
                    method: 'GET',
                    success: function(data) {
                        // Populate the modal fields with data
                        $('#client-id').val(data.id);
                        $('#client-name').val(data.name);
                        $('#client-email').val(data.email);
                        $('#client-phone').val(data.phone);
                    }
                });
            });

            $('#editClientForm').on('submit', function(e) {
                e.preventDefault();

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/customer/update',
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#editClientModal').modal('hide');

                            // Display a success notification
                            location.reload();

                        } else {
                            console.error('Update failed:', response.success_message);
                        }
                    },
                    error: function(xhr) {
                        console.error('AJAX error:', xhr);
                    }
                });
            });

            // Update Client Script E





            // Update Wash Type Script S

            $('.edit-wash').on('click', function() {
                var washTypeId = $(this).data('id');
                var washTypeName = $(this).data('name');
                var washTypePrice = $(this).data('price');

                // Set the modal fields
                $('#wash-type-id').val(washTypeId);
                $('#wash-type-name').val(washTypeName);
                $('#wash-type-price').val(washTypePrice);
            });

            // On form submission
            $('#editWashForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/wash-types/update',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#editWashModal').modal('hide');

                            location.reload();
                            // setTimeout(() => location.reload(), 2000);
                        } else {
                            console.error('Update failed:', response.success_message);
                        }
                    },
                    error: function(xhr) {

                        console.error('AJAX error:', xhr);
                    }
                });
            });

            // Update Wash Type Script E





            // Update Service Script S

            $('.edit-servise').on('click', function() {
                var serviceId = $(this).data('id');

                var serviceName = $(this).data('name');

                var servicePrice = $(this).data('price');

                // Set the modal fields
                $('#service-id').val(serviceId);
                $('#service-name').val(serviceName);
                $('#service-price').val(servicePrice);
            });

            // On form submission
            $('#editserviceForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/service/update',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#editserviceForm').modal('hide');
                            location.reload();
                        } else {
                            console.error('Update failed:', response.success_message);
                        }
                    },
                    error: function(xhr) {

                        console.error('AJAX error:', xhr);
                    }
                });
            });

            // Update Service Script E




            // Update Payment Method Script S

            $('.edit-payment').on('click', function() {
                var paymentId = $(this).data('id');
                var paymentName = $(this).data('name');


                // Set the modal fields
                $('#payment-type-id').val(paymentId);
                $('#payment-type-name').val(paymentName);

            });

            // On form submission
            $('#editpaymentForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/payment-types/update',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#editpaymentForm').modal('hide');
                            location.reload();
                        } else {
                            console.error('Update failed:', response.success_message);
                        }
                    },
                    error: function(xhr) {

                        console.error('AJAX error:', xhr);
                    }
                });
            });

            // Update Payment Method Script E




            // WhatsApp Button Script S

            $(document).on('click', '.whatsapp-btn', function() {
                var clientPhone = $(this).data('phone');
                var clientName = $(this).data('name');

                const message = `Hola ${clientName}, su auto está listo para ser retirado.`;
                const whatsappUrl =
                    `https://api.whatsapp.com/send?phone=${clientPhone}&text=${encodeURIComponent(message)}`;

                window.open(whatsappUrl, '_blank');
            });

            // WhatsApp Button Script E



            // Record Sale Update Script S


            $('#editrecord').on('click', function() {
                var recordId = $(this).data('record-id');
                // alert(recordId);

                // Fetch the existing record data via AJAX
                $.ajax({
                    url: '/get-record/' + recordId,
                    method: 'GET',
                    success: function(data) {
                        $('#record-id').val(data.id);
                        $('#package-id').val(data.package_id);
                        $('#car-id').val(data.car_id);
                        $('#services').val(JSON.parse(data
                            .services));
                        $('#payment-id').val(data.payment_id);
                    }
                });
            });

            $('#editRecordForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: '/record/update',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#editrecordModal').modal('hide');
                            location.reload();
                        } else {
                            console.error('Update failed:', response.success_message);
                        }
                    },
                    error: function(xhr) {

                        console.error('AJAX error:', xhr);
                    }
                });




            });

            // Record Sale Update Script E





            // Update Car Script S

            $('.edit-car').on('click', function() {
                var carId = $(this).data('id');
                var carName = $(this).data('name');
                var carModel = $(this).data('model');
                var carLicense = $(this).data('license');
                var carColor = $(this).data('colour');

                // Set the modal fields
                $('#car-id').val(carId);
                $('#car-name').val(carName);
                $('#car-model').val(carModel);
                $('#car-license').val(carLicense);
                $('#car-color').val(carColor);
            });

            // On form submission
            $('#editcarForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/car/update',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#editcarForm').modal('hide');
                            location.reload();
                        } else {
                            console.error('Update failed:', response.success_message);
                        }
                    },
                    error: function(xhr) {

                        console.error('AJAX error:', xhr);
                    }
                });
            });

            // Update Car Script E




            // Close today's sale via AJAX


            $('#confirmCloseSale').on('click', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('close.daily.sale') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Load closed sales data (assuming this function exists)
                        loadClosedSales();

                        $('#modalSaleClose').modal('hide').removeClass('show').css('display',
                            'none');
                        location.reload();

                        // Show success message
                        $('#successMessage').text('Sale closed successfully!').fadeIn().delay(
                            3000).fadeOut();
                    },
                    error: function(xhr) {
                        alert('Error closing the sale. Please try again.');
                    }
                });
            });

            // Function to load and display the sum of closed sales

            function loadClosedSales(page = 1) {
                $.ajax({
                    url: '{{ route('get-closed-sales') }}?page=' + page,
                    type: 'GET',
                    success: function(response) {
                        $('#closedSalesList').empty(); // Clear existing content

                        // Loop through the response data and append to the table
                        response.data.forEach(function(sale) {
                            $('#closedSalesList').append(
                                '<tr>' +
                                '<td>$' + sale.total_sales.toFixed(2) + '</td>' +
                                // Display total sales for the day
                                '<td>' + moment(sale.date).format('YYYY-MM-DD') +
                                '</td>' +
                                '</tr>'
                            );
                        });

                        // Handle pagination links
                        $('#paginationLinks').empty(); // Clear existing links
                        for (let i = 1; i <= response.last_page; i++) {
                            $('#paginationLinks').append(
                                '<button class="btn btn-link pagination-button" data-page="' + i +
                                '">' + i + '</button>'
                            );
                        }
                    },
                    error: function(xhr) {
                        alert('Error fetching closed sales data. Please try again.');
                    }
                });
            }

            // Event delegation for pagination buttons
            $(document).on('click', '.pagination-button', function() {
                const page = $(this).data('page');
                loadClosedSales(page);
            });

            // Initially load closed sales data on page load
            loadClosedSales();



            // User note update S

            $('#modal-note').on('click', function() {
                var customerID = $(this).data('customer-id');
                var noteName = $(this).data('note');

                $('#customer-id').val(customerID);
                $('#note-name').val(noteName);
            });

            // User note update E



        });


        // for time
        document.addEventListener("DOMContentLoaded", function() {
            function updateTimers() {
                var timers = document.querySelectorAll('.timer');
                timers.forEach(function(timer) {
                    var createdAt = new Date(timer.getAttribute('data-created-at'));
                    var now = new Date();
                    var diff = now - createdAt;
                    var hours = Math.floor(diff / 3600000);
                    var minutes = Math.floor((diff % 3600000) / 60000);
                    var seconds = Math.floor((diff % 60000) / 1000);
                    timer.textContent = `${hours}h ${minutes}m ${seconds}s`;
                });
            }
            setInterval(updateTimers, 1000);
            updateTimers();


        });
        // for time
    </script>
