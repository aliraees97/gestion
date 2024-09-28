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


            // search script for clients start

            $('#search_client').on('input', function() {
                const query = $(this).val().toLowerCase();
                let hasResults = false;

                $('.nk-tb-item').each(function() {
                    // Get the client's name, phone, and email from the respective elements
                    const clientName = $(this).find('.user-info .tb-lead').text().toLowerCase();
                    const clientPhone = $(this).find('.tb-col-md').eq(0).text()
                        .toLowerCase();
                    const clientEmail = $(this).find('.tb-col-md').eq(1).text()
                        .toLowerCase();

                    // Show or hide the client item based on the search query
                    if (clientName.includes(query) || clientPhone.includes(query) || clientEmail
                        .includes(
                            query)) {
                        $(this).show();
                        hasResults = true;
                    } else {
                        $(this).hide();
                    }
                });

                // If no results found, show a 'No data found' message
                if (!hasResults) {
                    $('#no-results-message').show();
                } else {
                    $('#no-results-message').hide();
                }
            });
            // search script for clients end

            // Add client page Ajax Start
            $('#clientForm').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Redirect to the same page to show success message
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Clear previous errors
                        $('.alert-danger').remove();

                        // Show errors in the modal
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#modalDefault .modal-body').prepend(
                                    '<div class="alert alert-danger">' + value[0] +
                                    '</div>');
                            });
                        } else {
                            // Show general error message if any other error occurs
                            $('#modalDefault .modal-body').prepend(
                                '<div class="alert alert-danger">An error occurred. Please try again.</div>'
                            );
                        }
                    }
                });
            });
            // Add client page AjaxEnd


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

            $('.editrecord').on('click', function() {
                event.preventDefault();
                var recordId = $(this).data('record-id');

                // Fetch the existing record data via AJAX
                $.ajax({
                    url: '/get-record/' + recordId,
                    method: 'GET',
                    success: function(data) {
                        $('#record-id').val(data.id);
                        $('#package-id').val(data.package_id);
                        $('#car-id').val(data.car_id);
                        $('#services').val(JSON.parse(data.services));
                        $('#payment-id').val(data.payment_id);

                        // Open the modal after filling the data
                        $('#editrecordModal').modal('show');
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




            // Add Car Scripts Start

            $('#carForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Clear previous error messages
                $('#errorMessages').addClass('d-none');
                $('#errorList').empty();

                $.ajax({
                    url: "{{ route('add-car') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        // Handle success
                        if (response.success) {
                            // Redirect to a specific page if necessary
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $('#errorMessages').removeClass('d-none');
                            $.each(errors, function(key, value) {
                                $('#errorList').append('<li>' + value[0] +
                                    '</li>'
                                );
                            });
                        } else {
                            // Handle other errors
                            alert('An error occurred. Please try again later.');
                        }
                    }
                });
            });
            // Add Car Scripts End


            // Car status completed Scripts Start
            $('#modalCompleted').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var carId = button.data('id');
                var modal = $(this);

                // Store car ID in the modal for later use
                modal.find('.complete-btn').data('id', carId);
            });

            // Handle the complete button click
            $('.complete-btn').on('click', function() {
                var carId = $(this).data('id');

                $.ajax({
                    url: "{{ route('cars-complete', ':id') }}".replace(':id', carId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        if (response.success) {
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        // Handle error
                        alert('Failed to update car status. Please try again.');
                    }
                });
            });

            // Car status completed Scripts End



            // Payment On Car Page completed Scripts Start

            $('#modalPayment').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var carId = button.data('id');

                var modal = $(this);

                modal.find('.payment-complete').data('id', carId);
            });

            // Handle the complete button click inside the modal
            $('.payment-complete').on('click', function() {
                var carId = $(this).data('id');
                var paymentId = $('#payment_id').val();

                $.ajax({
                    url: "{{ route('payment-complete', ':id') }}".replace(':id', carId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        payment_id: paymentId
                    },
                    success: function(response) {
                        if (response.success) {
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('Failed to update car status. Please try again.');
                    }
                });
            });


            // Payment On Car Page completed Scripts End



            // Mark As Deliver Car Page completed Scripts Start

            $('#modalWhatsApp').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var carId = button.data('id');

                var modal = $(this);

                modal.find('.mark-as-deliver').data('id', carId);
            });

            // Handle the complete button click inside the modal
            $('.mark-as-deliver').on('click', function() {
                var carId = $(this).data('id');

                var paymentId = $('#payment_id').val();

                $.ajax({
                    url: "{{ route('mark-as-deliver', ':id') }}".replace(':id', carId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',

                    },
                    success: function(response) {
                        if (response.success) {
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('Failed to update car status. Please try again.');
                    }
                });
            });


            // Mark As Deliver Car Page completed Scripts End





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




            // Close today's sale via AJAX Start


            $('#confirmCloseSale').on('click', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('close.daily.sale') }}', // Make sure this route closes the sales
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        location.reload();
                        // Clear the existing sales list
                        $('#closedSalesList').empty();

                        // Show total sales in the display area for today's closed sales
                        let totalSales = response.today_sales.reduce((sum, sale) => sum + sale
                            .total, 0);
                        $('#totalSalesDisplay').text('Total Sales Today: $' + totalSales
                            .toFixed(2));

                        // Populate the sales list with today's closed sales
                        response.today_sales.forEach(function(sale) {
                            $('#closedSalesList').append(
                                '<tr>' +
                                '<td>$' + sale.total.toFixed(2) + '</td>' +
                                '<td>' + moment(sale.created_at).format(
                                    'YYYY-MM-DD') + '</td>' +
                                '</tr>'
                            );
                        });

                        // Optionally, load and show all closed sales records (you can keep this line to show all closed sales)
                        // loadClosedSales();

                        $('#modalSaleClose').modal('hide').removeClass('show').css('display',
                            'none');

                        // Show success message
                        $('#successMessage').text('Sale closed successfully!').fadeIn().delay(
                            3000).fadeOut();
                    },
                    error: function(xhr) {
                        alert('Error closing the sale. Please try again.');
                    }
                });
            });

            // Function to load and display all closed sales
            function loadClosedSales() {
                $.ajax({
                    url: '{{ route('get-closed-sales') }}', // Ensure this route is defined in your routes file
                    type: 'GET',
                    success: function(response) {
                        // Clear the existing content
                        $('#closedSalesList').empty();

                        // Append the closed sales to the list
                        response.data.forEach(function(sale) {
                            $('#closedSalesList').append(
                                '<tr>' +
                                '<td>$' + sale.total_sales.toFixed(2) + '</td>' +
                                '<td>' + moment(sale.date).format('YYYY-MM-DD') + '</td>' +
                                '</tr>'
                            );
                        });
                    },
                    error: function(xhr) {
                        alert('Error fetching closed sales. Please try again.');
                    }
                });
            }

            // Optionally, call this function to load the closed sales when the page loads
            $(document).ready(function() {
                loadClosedSales();
            });


            // Close today's sale via AJAX End


            // Close Single sale via AJAX

            $(document).on('click', '.confirmSingleSale', function(event) {
                event.preventDefault();

                var recordId = $(this).data('record-id');

                $.ajax({
                    url: '{{ route('close.single.sale') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        record_id: recordId
                    },
                    success: function(response) {

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

            // Close Single sale via AJAX End





            // User note update S

            $('#modal-note').on('click', function() {
                var customerID = $(this).data('customer-id');
                var noteName = $(this).data('note');

                $('#customer-id').val(customerID);
                $('#note-name').val(noteName);
            });

            // User note update E


            $('.close-modal').on('click', function() {
                location.reload();
            });


            // for Add New Car on modal  with ajax start

            $('#carModal form').on('submit', function(e) {
                e.preventDefault();

                // Create a FormData object from the form
                var formData = new FormData(this);

                // Send the form data using AJAX
                $.ajax({
                    // url: $(this).attr('action'),
                    url: "{{ route('add-car-ajax') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Check if the response was successful
                        if (response.success) {

                            $('#carModal').modal('hide').removeClass('show').css(
                                'display',
                                'none');

                            // Update the car dropdown in the first modal
                            var newCar = response.car; // Assuming response has new car data
                            $('#car_id').append(
                                `<option value="${newCar.id}" selected>${newCar.name}</option>`
                            );

                            // Optionally, show a success message to the user
                            // alert('Car added successfully');
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('An error occurred while adding the car: ' + errorMessage);
                    }
                });
            });

            // for add car on modal  with ajax end



            // for add Client on Car modal  with ajax Start

            $('#modalClient form').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages and success message
                $('small.text-danger').text('');
                $('#successMessage').hide().text('');

                // Create a FormData object from the form
                var formData = new FormData(this);

                // Send the form data using AJAX
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            // Close the modal
                            $('#modalClient').modal('hide').removeClass('show').css('display',
                                'none');

                            // Update the client dropdown in the main modal
                            var newClient = response.customer;
                            $('#customer_id').append(
                                `<option value="${newClient.id}" selected>${newClient.name}</option>`
                            );

                            // Show success message in the modal
                            $('#successMessage').text(response.message).show();
                        } else {
                            // Show a generic error message
                            $('#successMessage').text('Error: ' + response.message).show();
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Display validation errors next to the input fields
                            var errors = xhr.responseJSON.errors;

                            if (errors.name) {
                                $('input[name="name"]').siblings('small').text(errors.name[0]);
                            }
                            if (errors.phone) {
                                $('input[name="phone"]').siblings('small').text(errors.phone[
                                    0]);
                            }
                            if (errors.email) {
                                $('input[name="email"]').siblings('small').text(errors.email[
                                    0]);
                            }
                        } else {
                            // Show a general error message
                            $('#successMessage').text(
                                'An error occurred while adding the client').show();
                        }
                    }
                });
            });

            // for add Client on Car modal with ajax end



            // Rocrds filter

            $('.filter-option').click(function(e) {
                e.preventDefault();

                var filter = $(this).data('filter'); // Get the filter value (open, closed, or all)

                // Show all items if filter is 'all'
                if (filter === 'all') {
                    $('.nk-tb-item:not(.nk-tb-head)').show(); // Show only data rows, not the header
                    $('.no-data').hide(); // Hide 'No data' message
                } else {
                    // Hide all data rows first, except the header
                    $('.nk-tb-item:not(.nk-tb-head)').hide();

                    // Show only the data rows that match the selected status
                    var filteredItems = $('.nk-tb-item[data-status="' + filter + '"]');
                    filteredItems.show();

                    // Check if there are any visible items
                    if (filteredItems.length === 0) {
                        $('.no-data').show(); // Show 'No data' message
                    } else {
                        $('.no-data').hide(); // Hide 'No data' message
                    }
                }
            });

            // Rocrds filter



        });





        // for time

        document.addEventListener("DOMContentLoaded", function() {
            function updateTimers() {
                var timers = document.querySelectorAll('.timer');
                timers.forEach(function(timer) {

                    var createdAt = new Date(timer.getAttribute('data-created-at'));
                    var now = new Date();
                    var diff = now - createdAt;
                    var hours = Math.floor(diff / (1000 * 60 * 60));
                    var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((diff % (1000 * 60)) / 1000);
                    timer.textContent = `${hours}h ${minutes}m ${seconds}s`;
                });
            }
            setInterval(updateTimers, 1000);
            updateTimers();
        });

        // for time
    </script>
