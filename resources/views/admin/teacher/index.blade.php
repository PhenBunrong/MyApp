@extends('layouts.master')
@section('teacher.index', 'active')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1 class="m-0">List Teacher</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{route('teacher.create')}}" class="btn btn-primary">Add Teacher</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Teacher</li>
                </ol>
            </div>
        </div>
    </div>
</div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Teacher Name</th>
                                <th>Class Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teacher as $items)
                            <tr>
                                <td>{{$items->name}}</td>
                                <td>
                                    <ul>
                                        @foreach ($items->classes as $cls)
                                            <li>{{ $cls->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{$items->phone}}</td>
                                <td>{{$items->address}}</td>
                                <td>{{$items->email}}</td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('teacher.show',$items->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('teacher.edit',$items->id) }}">Edit</a>
                                    <a class="btn btn-danger btn_delete" value="{{$items->id}}" data-id="{{$items->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </section>

@endsection
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.btn_delete').on('click',function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/teacher/delete",
                data: {
                    id : $(this).data('id')
                },
                success: function (response) {
                    $(this).parents('tr').remove();
                    Toast.fire({
                        icon: 'success',
                        title: 'data deleted'
                    })
                }
            });
        })
    })
</script>