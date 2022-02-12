@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>List of Sales Team</h2>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('employee.new') }}"> Create New Employee</a>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Emp ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Current Route</th>
                            <th scope="col">Joined Date</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</td></th>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->current_route }}</td>
                                <td>{{ $employee->joined_date }}</td>
                                <td>{{ $employee->comments }}</td>
                                <td>
                                    <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                                        <a class="btn btn-info"data-toggle="modal" data-target="#exampleModal{{$employee->id}}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($employees as $employee)
        <div class="modal fade" id="exampleModal{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-md-offset-2">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$employee->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" value="{{$employee->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input type="text" class="form-control" value="{{$employee->phone}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Current Route</label>
                                <input type="text" class="form-control" value="{{$employee->current_route}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Joined Date</label>
                                <input type="text" class="form-control" value="{{$employee->joined_date}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Comments</label>
                                <textarea class="form-control" value="{{$employee->comments}}" disabled>{{$employee->comments}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
