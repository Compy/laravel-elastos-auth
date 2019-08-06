@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Scan the code using the Elaphant Wallet
                    </div>
                    <div class="card-body text-center">
                        {!! QrCode::size(250)->generate($scanUrl); !!}
                        <hr/>
                        <div class="lds-ripple"><div></div><div></div></div>
                        <p class="text-muted">
                            Waiting for phone authentication...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/vendor/didauth/js/elaauth.js"></script>
@endsection
