@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send message</div>

                <div class="card-body">

                    <form action="#" method="POST">

                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">Select user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Write your message"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Send</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
