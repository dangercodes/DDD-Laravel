<input type="hidden" name="id" value='{{$customer->getId() !== null ? $customer->getId() : ''}}' />
<div class="form-row">
    <div class="form-group col-md-6 col-xs-12">
        <label for="firstName">First Name</label>
        <input name="firstName" value='{{$customer->getFirstName() !== null ? $customer->getFirstName() : ''}}' type="text" class="form-control" placeholder="ex: indra" />
    </div>
    <div class="form-group col-md-6 col-xs-12">
        <label for="lastName">Last Name</label>
        <input name="lastName" value='{{$customer->getLastName() !== null ? $customer->getLastName() : ''}}'
            type="text" class="form-control" placeholder="ex: herlambang" />
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 col-xs-12">
        <label for="birthDate">Birth Date</label>
        <input id="birthDate" value='{{$customer->getBirthDate() !== null ? $customer->getBirthDate() : ''}}'
            name="birthDate" type="text" />
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12 col-xs-12">
        <label for="address">Address</label>
        <input name="address" type="text" value='{{$customer->getAddress() !== null ? $customer->getAddress() : ''}}'
            class="form-control" />
    </div>
</div>

@include('Scripts.datepicker')

@section('css')
    @parent
    @stack('datepicker-css')
@endsection

@section('javascript-library')
    @parent
    @stack('datepicker-js')
    <script type="text/javascript">
        $('#birthDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });
    </script>
@endsection
