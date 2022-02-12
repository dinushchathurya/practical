@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('employee.index') }}"> Back</a>
        <h2>Create Employee</h2>
        <div class="row">
            <div class="col">
                <div class="pull-right">
                    <form action="{{ route('employee.update',$employee->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="" value="{{$employee->name}}" >
                            @if ($errors->has('name'))
                                <li>{{ $errors->first('name') }}</li>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{$employee->email}}">
                            @if ($errors->has('email'))
                                <li>{{ $errors->first('email') }}</li>
                            @endif
                        </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Contact Number</label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="" value="{{$employee->phone}}">
                            @if ($errors->has('phone'))
                                <li>{{ $errors->first('phone') }}</li>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Current Route</label>
                            <input type="text" class="form-control" id="current_route" name="current_route" placeholder="" value="{{$employee->current_route}}">
                            @if ($errors->has('current_route'))
                                <li>{{ $errors->first('current_route') }}</li>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Joined Date</label>
                            <input type="date" class="form-control" id="joined_date" name="joined_date" placeholder="" value="{{$employee->joined_date}}">
                            @if ($errors->has('joined_date'))
                                <li>{{ $errors->first('joined_date') }}</li>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Commnets</label>
                            <textarea type="text" class="form-control" id="comments" name="comments" value="{{$employee->comments}}">{{$employee->comments}}</textarea>
                            @if ($errors->has('comments'))
                                <li>{{ $errors->first('comments') }}</li>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
        </div>
    </div>
@endsection
