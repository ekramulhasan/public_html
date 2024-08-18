@extends('frontend.master')
@section('title')
    Order | Page
@endsection

@push('frontend_style')
    <style>
        @media (max-width: 600px) {
            .button-container {
                flex-direction: column;
            }

            .button-container .add-to-cart {
                margin-bottom: 5%;
                width: 32%;
            }

            .left-align {
                text-align: left !important;
            }

            .button {
                cursor: pointer;
            }

            .akasha-tabs-wrapper {
                text-align: left;
                /* Ensure the wrapper itself is left-aligned */
            }

            .akasha-tabs-wrapper .akasha-Tabs-panel {
                text-align: left;
                /* Ensure each tab panel content is left-aligned */
            }

            .akasha-tabs-wrapper .tabs {
                display: flex;
                /* Use flexbox for alignment */
                justify-content: flex-start;
                /* Align tabs to the left */
                flex-wrap: wrap;
                /* Ensure tabs wrap on smaller screens */
            }

            .akasha-tabs-wrapper .tabs li {
                margin-right: 10px;
                /* Optional: Add some spacing between the tabs */
                flex: 1;
                /* Allow tabs to take equal space */
            }



        }

        @media (max-width: 768px) {
            .akasha-tabs-wrapper .tabs {
                flex-direction: column;
                /* Stack tabs vertically on small screens */
                align-items: flex-start;
                /* Align items to the start */
            }
        }
    </style>
@endpush

@section('main_body')
    @include('frontend.inc_page.singleProduct')
@endsection

@push('frontend_js')
    <script>
        function validateCheckboxes() {
            const checkboxes = document.querySelectorAll('input[name="size"]');
            let isChecked = false;

            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    isChecked = true;
                }
            });

            if (!isChecked) {
                alert('Please select at least one size.');
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }

        function validateAndSubmitForm(button, action) {
            if (validateCheckboxes()) {
                button.form.action = action;
                return true; // Allow form submission
            }
            return false; // Prevent form submission
        }
    </script>


@endpush
