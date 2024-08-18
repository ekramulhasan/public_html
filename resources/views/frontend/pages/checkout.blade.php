@extends('frontend.master')
@section('title')
    Checkout | Page
@endsection

@push('frontend_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .akasha-checkout-review-order table {
            width: 100%;
            border-collapse: collapse;
        }

        .akasha-checkout-review-order th,
        .akasha-checkout-review-order td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .akasha-checkout-review-order th {
            text-align: left;
        }

        @media (max-width: 768px) {

            .akasha-checkout-review-order table,
            .akasha-checkout-review-order thead,
            .akasha-checkout-review-order tbody,
            .akasha-checkout-review-order th,
            .akasha-checkout-review-order td,
            .akasha-checkout-review-order tr {
                display: block;
                width: 100%;
            }

            .akasha-checkout-review-order thead tr {
                display: none;
            }

            .akasha-checkout-review-order tr {
                margin-bottom: 10px;
                border: 1px solid #ddd;
            }

            .akasha-checkout-review-order td {
                display: flex;
                justify-content: flex-start;
                /* Left align the content */
                align-items: center;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #ddd;
                text-align: left;
            }

            .akasha-checkout-review-order td:before {
                content: attr(data-title);
                font-weight: bold;
                flex-basis: 40%;
                text-align: left;
            }

            .akasha-checkout-review-order td:last-child {
                border-bottom: 0;
            }
        }

        .akasha-checkout-payment ul {
            list-style: none;
            padding: 0;
        }

        .akasha-checkout-payment li {
            margin-bottom: 10px;
        }
    </style>
@endpush

{{-- body start --}}
@section('main_body')
    @include('frontend.inc_page.checkout')
@endsection
{{-- body end --}}

@push('frontend_js')
    <script>
        document.getElementById('cod').addEventListener('click', function() {

            let submitButton = document.getElementById('submit');
            let sslbutton = document.getElementById('ssl-demo');

            if (submitButton.style.display === 'none' || submitButton.style.display === '') {
                submitButton.style.display = 'block';
                sslbutton.style.display = 'none';
            }

        });


        document.getElementById('payment-card').addEventListener('click', function() {

            let submitButton = document.getElementById('submit');
            let sslbutton = document.getElementById('ssl-demo');

            if (sslbutton.style.display === 'none' || sslbutton.style.display === '') {
                sslbutton.style.display = 'block';
                submitButton.style.display = 'none';
            }

        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2();

            $('#district_id').on('change', function() {

                var district_id = $(this).val();

                if (district_id) {

                    $.ajax({

                        url: "{{ url('/upazila/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            var d = $('#upazila_id').empty();

                            $.each(data, function(key, value) {

                                $('#upazila_id').append('<option value="' + value.id +
                                    '">' + value.upazila_name_en + '</option>')

                            })
                        }
                    })

                }

            })

        });
    </script>

    <script>
        function updateDeliveryCharge() {

            const selectedOption = document.querySelector('input[name="deliveryCharge"]:checked');
            const deliveryChargeElement = document.getElementById('deliveryCharge');
            const totalPriceElement = document.getElementById('totalPrice');
            const totalPrice = parseInt(document.getElementById('total').value);
            const totalPriceValue = document.getElementById('totalValue');



            deliveryChargeElement.textContent = parseInt(selectedOption.value, 10);
            totalPriceElement.textContent = "৳ " + (parseInt(selectedOption.value, 10) + totalPrice);
            totalPriceValue.value = (parseInt(selectedOption.value, 10) + totalPrice);

            // alert(totalPriceValue);
        }

        document.getElementById('orderForm').addEventListener('submit', function(event) {

            if (!document.querySelector('input[name="deliveryCharge"]:checked')) {
                alert('Please select a delivery charge.');
                event.preventDefault();
            }

            var isValid = true;

            if ($('#district_id').val() === null) {
                alert('Please select a district.');
                isValid = false;
            }

            if ($('#upazila_id').val() === '') {
                alert('Please select a town/upazila.');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
@endpush
