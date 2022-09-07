@extends('layouts.app')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data User</h1>
            {{ Breadcrumbs::render() }}
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">e-Mail</label>
                            <input type="email" name="email" class="form-control" disabled readonly value="{{ old('email', $user->email) }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="" style="display: block">Is Admin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="is_admin" type="radio" id="inlineRadio1" value="1" {{ old('name', $user->is_admin) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="is_admin" type="radio" id="inlineRadio2" value="0" {{ old('name', $user->is_admin) == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="image_profile" class="form-control-file" accept="image/*">
                            @if ($user->photo)
                            <img src="{{ asset('/storage/profile/' . $user->photo) }}" alt="" class="mt-2" height="150">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
<script>
    var fileName = @json($user->photo);
    var pathPhoto = "{{ asset('/storage/profile/') }}/"+fileName;
    var defaultPhoto = "{{ asset('img/avatar/avatar-1.png') }}";
    if(fileName){
        $("#image-preview").css(
        "background-image",
        "url(" + photo + ")"
        );
        $("#image-preview").css(
        "background-size",
        "cover"
        );
        $("#image-preview").css(
        "background-position",
        "center center"
        );
        $(".image-label").html("Change File");
    }else{
        $("#image-preview").css(
        "background-image",
        "url(" + defaultPhoto + ")"
        );
        $("#image-preview").css(
        "background-size",
        "cover"
        );
        $("#image-preview").css(
        "background-position",
        "center center"
        );
        $(".image-label").html("Upload File");
    }
        
</script>
@endpush

