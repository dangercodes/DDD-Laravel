
@extends('Layout.main.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Customer Info</div>
                <div class="card-body">
                    <form action={{route('submitCustomer')}} method="post">
                        {{ csrf_field() }}
                        @include('Customer.form', ['customer' => $customer])
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection