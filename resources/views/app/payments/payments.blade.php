@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Payments">
    <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_payment_modal">
        <i class="fas fa-plus me-3"></i>
        New Payment
    </a>
</x-headers.page-header>


@can('administrator')
<div class="grid grid-cols-12 gap-6 mb-7">
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Today's Payments" :value="$statistics->todaysTotalPayment"
            bgColour="primary" />

    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Weekly Payments" :value="$statistics->weeksTotalPayment"
            bgColour="success" />

    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Monthly Pmts" :value="$statistics->monthsTotalPayment" bgColour="pink" />

    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Annual Payments" :value="$statistics->yearToDateTotal"
            bgColour="warning" />

    </div>
</div>
@endcan




<div class="card border-0">
    <div class="card-body">

        <!-- Only show to admins -->
        @livewire('livewire.payments.payment-history')

    </div>
</div>

<div id="modal_holder"></div>
@endsection

@section('js')
<script type="text/javascript">
    const el = document.querySelector("#start_date");
    // new HSDatepicker(el);
    // alert('hi')
</script>


<script>
    $(document).on('click', '.table tbody .edit', function() {
        $.get($(this).data('url'), function(data) {
            $('#modal_holder').html(data)
            const modal = new HSOverlay(document.querySelector('#edit-payment-modal'));
            modal.open();
        })
    })


    $(document).on('click', '.table tbody .delete', function() {
        const $form = $(this).closest('form')

        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $form.submit()
                }
            })
    })
</script>
@endsection
