@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
            <table class="table">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>TANGGAL PERMINTAAN</th>
                        <th>JUDUL BANTUAN</th>
                        <th>JUMLAH BANTUAN</th>
                        <th>TERPENUHI</th>
                        <th>BERIKAN BANTUAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $data)
                        <tr>
                            <td>
                                {{ $data->getAsker()->getName() }}
                            </td>
                            <td>
                                {{ $data->getDate() }}
                            </td>
                            <td>
                                {{ $data->getTitle() }}
                            </td>
                            <td>
                                {{ number_format($data->getTotal()) }}
                            </td>
                            <td>
                                {{ 0 }}
                            </td>
                            <td>
                                <a href="{{ url('/give-create') .'/'. $data->getId() }}" class="btn btn-link">bantu</a>
                            </td>
                        </tr>
                    @endforeach
                <tr>
                    <td colspan="6">
                        {{--{!! $pages->render() !!}--}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
