@extends('layouts.staff_app')
@section('title', 'Config')
@section('breadcrumb-main', 'Home')
@section('content')
    <div class="row mb-4">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4 card-title">Configurations</h4>
                    <div class="mb-4">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger">{{ $err }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mb-4">
                        <form method="post">
                            @csrf
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Set Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($configs as $config)
                                        <tr>
                                            <td>{{ $config->title }} <input type="hidden" name="names[]" value="{{ $config->name }}"></td>
                                            <td>
                                                @switch($config->field_type)
                                                    @case('input')
                                                        <input type="text" name="values[]" id="" class="form-control" value="{{ $config->value }}">
                                                        @break
                                                    @case('select')
                                                        <select name="values[]" id="" class="form-control">
                                                            @foreach ($config->data as $data)
                                                                <option value="{{ $data['id'] }}" {{ $config->value == $data['id'] ? 'selected' : '' }}>{{ $data['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
