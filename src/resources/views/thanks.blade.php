@extends('layouts.thanksapp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="baseBox">
        <div class="backStr">Thank you</div>
        <div class="frontStr">
            <div class="thanks__heading">
                <div class="thanks__heading--item">
                    <h2>お問い合わせありがとうございした</h2>
                </div>
                <div class="thanks__heading--item">
                    <a class="thanks__home--item" href="/">
                        HOME
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection