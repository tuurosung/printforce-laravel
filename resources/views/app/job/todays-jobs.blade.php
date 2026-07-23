@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Jobs" currentPage="Today's Jobs" />


<livewire:jobs.view-jobs />


@endsection

@section('js')
<script>
    // $('#customer_id').on('change', function() {
    //     const val = $(this).val();
    //     alert(val);
    // });
</script>
@endsection
