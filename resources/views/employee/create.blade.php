@extends('employee.layout')
  
@section('content')

<style>
/* Disable scrolling on input type = number */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
</style>
<!-- End  Disable scrolling on input type = number -->

<!--  Create Employee From -->

<div class="row" style="background-color:lightgreen;border-radius:18px;padding:5px;">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <div class="pull-left">
            <h2><u><b>Create New Employee</b></u></h2>
        </div>
    </div>
   
<form action="{{ route('employee.store') }}" id="from1" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
                @if ($errors->has('name'))
                <small class="alert alert-danger">
                {{ $errors->first('name') }}
                </small>
                @endif
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                <small class="alert alert-danger">
                {{ $errors->first('email') }}
                </small>
                @endif
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" name="phone" class="form-control" placeholder="Phone">
                @if ($errors->has('phone'))
                <small class="alert alert-danger">
                {{ $errors->first('phone') }}
                </small>
                @endif
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Salary:</strong>
                <input type="text" name="salary" class="form-control" placeholder="Salary">
                @if ($errors->has('salary'))
                <small class="alert alert-danger">
                {{ $errors->first('salary') }}
                </small>
                @endif
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Department:</strong>        

<select class="custom-select" name="dept">
@foreach($departments as $department)
  <option value="{{$department->id}}">{{$department->dept_name}}</option>
@endforeach
</select>
        @if ($errors->has('dept'))
                <small class="alert alert-danger">
                {{ $errors->first('dept') }}
                </small>
                @endif



            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>

        </div>
        
    </div>
   </div>
</form>
<!-- end Create Employee From -->

@endsection
