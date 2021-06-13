@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send message</div>

                <div class="card-body">

                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <select
                                name="recipient_id"
                                id="recipient_id"
                                class="form-control {{ $errors->has('recipient_id') ? 'is-invalid' : '' }}"
                            >
                                <option value="">Select user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('recipient_id', "<div class='invalid-feedback'>:message</div>") !!}
                        </div>

                        <div class="form-group">
                            <textarea
                                name="body"
                                id="body"
                                placeholder="Write your message"
                                class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                                >
                            </textarea>
                            {!! $errors->first('body', "<div class='invalid-feedback'>:message</div>") !!}
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
