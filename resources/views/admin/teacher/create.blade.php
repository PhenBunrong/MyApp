@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Teacher</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Teacher</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Teacher</h3>
    </div>
    <form method="POST" action="{{route('teacher.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name Teacher</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="start_date">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" class="form-control" id="end_date">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Select Class</label>
                        <select name="cls[]" id="select2-multiple"  class="form-control mt-1"  multiple="multiple">
                            @foreach ($cls as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</section>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #aaa;
    }
</style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#select2-multiple').select2();
        });
    </script>
@endsection