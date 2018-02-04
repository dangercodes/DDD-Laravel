@extends('Layout.main.app')

@section('title', 'Customers')
@include('Scripts.datatable')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="card-header">Customers</div>
            <div class="card-body">
                <table id="customerTable" class="display table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Birth Date</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <th scope="row">{{$customer->getName()}}</th>
                                <td>{{$customer->getBirthDate()}}</td>
                                <td>{{$customer->getAddress()}}</td>
                                <td>
                                    <a href="{{route('editCustomer', ['id' => $customer->getId()])}}" 
                                        class="btn btn-primary">Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
       
    </div>
@endsection

@section('css')
   @stack('datatable-css')
@endsection

@section('javascript-library')
   @stack('datatable-js')
   <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#customerTable').DataTable({
                lengthChange: false,
                buttons:[
                    {
                        text: 'Add New Customer',
                        action: function ( e, dt, node, config ) {
                            window.location = '{{route('createCustomer')}}';
                        }
                    }
                ]
            });
            table.buttons().container().appendTo('#customerTable_wrapper .col-md-6:eq(0)');
        });
   </script>
@endsection
