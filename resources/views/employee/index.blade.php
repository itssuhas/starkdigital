@extends('employee.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b>Check all Employee :-</b></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New </a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped table-responsive-md btn-table">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Dept</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $blog->name }}</td>
            <td>{{ $blog->email }}</td>
            <td>{{ $blog->phone }}</td>
            <td>{{ $blog->salary }}</td>
            <td>{{ $blog->dept_name }}</td>
            <td>

                    <a class="btn btn-primary" href="{{ route('employee.edit',$blog->id) }}">Edit</a>
            </td>
            
            <td>
                <form action="{{ route('employee.destroy',$blog->id) }}" method="POST">
      
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

            <div class="pull-right">
                <h5>Average Salary Department Wise :-</h5>
            </div>
      <table class="table table-striped table-responsive-md btn-table">
        <tr>
           <th>Department Name</th>
           <th>Average</th>
        </tr>
        @foreach ($average as $data)
        <tr>
            <td>{{ $data->dept_name }}</td>
            <td>{{ $data->average }}</td>
            
        </tr>
        @endforeach
    </table>
      
      <br>
            <div class="pull-right">
                <h5>Min Salary Department Wise :-</h5>
            </div>

      <table class="table table-striped table-responsive-md btn-table">
        <tr>
           <th>Department Name</th>
           <th>Min Salary</th>
        </tr>
        @foreach ($minsalary as $salary)
        <tr>
            <td>{{ $salary->dept_name }}</td>
            <td>{{ $salary->min }}</td>
            
        </tr>
        @endforeach
    </table>
    <br>       
   <div class="pull-right">
                <h5>Max Salary Department Wise :-</h5>
    </div>

      <table class="table table-striped table-responsive-md btn-table">
        <tr>
            <th>Department Name</th>
            <th>Max Salary</th>
        </tr>
        @foreach ($maxsalary as $salary)
        <tr>
            <td>{{ $salary->dept_name }}</td>
            <td>{{ $salary->max }}</td>        
        </tr>
        @endforeach
    </table>
@endsection