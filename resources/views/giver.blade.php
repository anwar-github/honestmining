@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-info">INFO</h3>
                <table class="table text-muted">
                    <thead>
                        <tr>
                            <td>NAME</td>
                            <td>
                                {{ $data['received']->getAsker()->getName() }}
                            </td>
                        </tr>
                        <tr>
                            <td>TANGGAL BANTUAN</td>
                            <td>
                                {{ $data['received']->getDate() }}
                            </td>
                        </tr>
                        <tr>
                            <td>JUDUL BANTUAN</td>
                            <td>
                                {{ $data['received']->getTitle() }}
                            </td>
                        </tr>
                        <tr>
                            <td>Detail</td>
                            <td>
                                {{ $data['received']->getDetail() }}
                            </td>
                        </tr>
                        <tr>
                            <td>JUMLAH BANTUAN</td>
                            <td>
                                {{ $data['received']->getTotal() }}
                            </td>
                        </tr>
                        <tr>
                            <td>TERPENUHI</td>
                            <td>
                                {{ number_format($data['received']->amount) }} / {{ number_format($data['received']->total) }} orang
                            </td>
                        </tr>
                    </thead>
                </table>
                <h3 class="text-info">BERIKAN BANTUAN</h3>

                <label>SALDO: {{ number_format($data['user']->getBalance()) }}</label>

                <form method="post" action="{{ url('/give') }}">

                   @csrf

                    <input type="hidden" name="bantuan_id" value="{{ $data['received']->getId() }}">

                    <div class="form-group">
                        <label>NILAI BANTUAN</label>
                        <input type="number" name="nilai_bantuan" class="form-control" placeholder="Masukkan nilai bantuan" required>
                        @if ($errors->has('nilai_bantuan'))
                            <div class="error text-danger">{{ $errors->first('nilai_bantuan') }}</div>
                        @endif
                    </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-success">submit</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
@endsection
