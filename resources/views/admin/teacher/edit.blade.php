@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create teacher</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create teacher</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-6">

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form teacher</h3>
    </div>
    <form action="{{ route('teacher.update',$teacher) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name teacher</label>
                <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" id="exampleInputEmail1" placeholder="Enter Name">
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</section>
    
@endsection