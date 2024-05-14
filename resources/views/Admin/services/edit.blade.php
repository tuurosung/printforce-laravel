@extends('layout.app')

@section('content')
<div class="d-flex justify-content-center mb-5">

    <div class="col-5">

        <h4 class="fs-30px fw-600 montserrat mb-4">Edit Service</h4>

        @include('layout.errors')

        <form id="" autocomplete="off" method="POST" action="{{ route('update.service') }}">

            @csrf

            <input type="text" class="form-control d-none" name="service_id" value="{{ $service->service_id }}" required readonly>

            <div class="card mb-3">
                <div class="card-body">

                    <div class="form-group">
                        <label for="">Service Name</label>
                        <input type="text" class="form-control" name="service_name" id="service_name" value="{{ $service->service_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="custom-select browser-default" name="category_id" id="category">
                            <option value="">--- Select Category ---</option>

                            @foreach ($all_categories as $categories)
                            <option value="{{ $categories->category_id }}" {{ $categories->category_id === $service->category_id ? 'selected' : '' }}>{{ $categories->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Artist/Photo</label>
                                <input type="number" step="any" class="form-control" name="artist" id="artist" value="{{ $service->artist }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Individual</label>
                                <input type="number" step="any" class="form-control" name="individual" id="individual" value="{{ $service->individual }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Institution</label>
                                <input type="number" step="any" class="form-control" name="institution" id="institution" value="{{ $service->institution }}" required>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-end">
                <a href="{{ route('all.services') }}" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                <button type="submit" class="btn btn-primary mr-0"> <i class="fas fa-check mr-3"></i> Update Service</button>
            </div>

        </form>
    </div>

</div>
@endsection

@section('js')
<script type="text/javascript">
    $('#category').select2()
</script>
@endsection
