@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                @if(Session::has('error'))) // Laravel 5 (Session('error')
                <div class="alert alert-danger">
                    {{ Session::get('error')}} // Laravel 5 {{Session('error')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <td>NAME</td>
                        <td>TANGGAL PERMINTAAN</td>
                        <td>JUDUL BANTUAN</td>
                        <td>JUMLAH BANTUAN</td>
                        <td>TERPENUHI</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td>
                                {{ $value->getAsker()->getName() }}
                            </td>
                            <td>
                                {{ $value->getDate() }}
                            </td>
                            <td>
                                {{ $value->getTitle() }}
                            </td>
                            <td>
                                {{ $value->amount }}
                            </td>
                            <td>
                                {{ $value->getDate()  }}
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
