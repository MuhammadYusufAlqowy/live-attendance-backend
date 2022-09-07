@extends('layouts.auth')

@section('title', 'Forgot Password')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Forgot Password</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close"
                        data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <p class="text-small">{{ session('status') }}</p>
                </div>
            </div>
            @endif
            @error('email')
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close"
                        data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <p class="text-small">{{ $message }}</p>
                </div>
            </div>
            @enderror
            <p class="text-muted">We will send a link to reset your password</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        tabindex="1"
                        required
                        autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Forgot Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
