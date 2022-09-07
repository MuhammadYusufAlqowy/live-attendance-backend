@extends('layouts.app')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            {{ Breadcrumbs::render() }}
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Detail User</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table-striped table" id="datatable">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Is Admin?</th>
                                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                @if (!empty($user->photo))
                                    <td class="p-5"><img width="350" src="{{ asset('/storage/profile/' .$user->photo) }}" alt=""></td>
                                @else
                                    <td class="p-5"><img width="350" src="{{ asset('img\avatar\avatar-1.png') }}" alt=""></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

