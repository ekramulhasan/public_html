@extends('frontend.master')
@section('title')
Profile | Page
@endsection

@push('frontend_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<style>

  .dataTables_length{
    padding: 20px 0;
  }

</style>

@endpush

@section('main_body')

@include('frontend.inc_page.profile')

@endsection

@push('frontend_js')

{{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>

    $(document).ready( function () {

    $('#my_table').DataTable({
        // pagingType: 'first_last_numbers'
    });

    $('.delete-corfirm').click(function(event){

        let form = $(this).closest('form')

        event.preventDefault();

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})


    })

} );

</script>

@endpush
