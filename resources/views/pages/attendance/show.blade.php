@extends('layouts.app')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Absensi</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- {{dd($attendance)}} --}}
                    <table class="table-striped table" id="datatable">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $attendance->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $attendance->status ? 'Check Out' : 'Check In' }}</td>
                            </tr>
                            <tr>
                                <th>Check In</th>
                                <td>{{ $attendance->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Check Out</th>
                                <td>{{ $attendance->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            @foreach ($attendance->detail as $detail)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-user-check mr-1"></i>
                        Attendance {{ $detail->type }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table-striped table" id="datatable">
                        <tbody>
                            <tr>
                                <th>Time</th>
                                <td>{{ $detail->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Lat, Long</th>
                                <td>{{ $detail->lat }}, {{ $detail->long }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $detail->address }}</td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>
                                    <div style="width: 100%">
                                        <iframe width="100%" height="300" frameborder="0" scrolling="no"
                                            marginheight="0" marginwidth="0"
                                            src="https://maps.google.com/maps?q={{ $detail->lat }},{{ $detail->long }}&hl=en&z=14&amp;output=embed">
                                        </iframe>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><img width="350" src="{{ asset('/storage/attendance/' . $detail->photo) }}" alt=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
            @endforeach
        </div>
    </section>
</div>
@endsection

