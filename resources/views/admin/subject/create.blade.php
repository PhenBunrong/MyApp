@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Subject</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Subject</li>
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
        <h3 class="card-title">Form Subject</h3>
    </div>
    <form method="POST" action="{{route('subject.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name Subject</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="name">Select Class</label>
                <select name="cls[]" id="select2-multiple" class="form-control mt-1" multiple>
                    @foreach ($cls as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
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

    <script>
        
    </script>
@endsection