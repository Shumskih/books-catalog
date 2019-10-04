@if(count($errors) > 0)
    <div class="row  justify-content-center col-sm-12 col-6 col-lg-6 col-xl-12 mt-5">
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
@endif
