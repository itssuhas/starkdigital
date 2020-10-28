@extends('employee.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>

   <!--  Create edit Employee From -->

    <form action="{{ route('employee.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')
   
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{$employee->name}}" class="form-control" placeholder="Name">
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
                <input type="text" name="email" value="{{$employee->email}}" class="form-control" placeholder="Email">
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
                <input type="text" name="phone" value="{{$employee->phone}}" class="form-control" placeholder="Phone">
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
                <input type="text" name="salary" value="{{$employee->salary}}" class="form-control" placeholder="Salary">
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
        @if ($errors->has('dept_name'))
                <small class="alert alert-danger">
                {{ $errors->first('dept_name') }}
                </small>
                @endif



            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>

        </div>
    </form>

    <!--  End Create edit Employee From -->

@endsection