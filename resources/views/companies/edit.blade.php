@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Edit company</div>
                <div class="card-body bg-ligh">
                    {!! Form::open(['action' => ['CompanyController@update', 'company' => $company], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Company name:', ['class' => 'col-form-label']) }}
                        <div class="col-10">
                            {{ Form::text('name', $company->name, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            @csrf
                            {{Form::submit('Add company', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
