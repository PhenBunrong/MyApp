@extends('layouts.master')
@section('subject.index', 'active')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1 class="m-0">List Subject</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{route('subject.create')}}" class="btn btn-primary">Add Subject</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Subject</li>
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
                                <th width="40%">Subject Name</th>
                                <th width="30%">Class Name</th>
                                <th width="30%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subject as $items)
                            <tr id="todo_{{$items->id}}">
                                <td>{{$items->name}}</td>
                                <td>
                                    <ul>
                                        @foreach($items->classes as $cls)
                                            <li>{{$cls->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('subject.show',$items->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('subject.edit',$items) }}">Edit</a>
                                    <a class="btn btn-danger btn_deleted" data-id="{{ $items->id}}" value="{{ $items->id}}">Delete</a>

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
        $("tbody").on('click','.btn_deleted',function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                
            let id = $(this).data('id');
            // let token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "delete",
                url: "/subject/delete",
                data: {
                    // _token: token,
                    id : id
                },
                success: (res)=> {
                    console.log(res);
                    $(this).parents('tr').remove();
                    Toast.fire({
                        icon: 'success',
                        title: 'data deleted'
                    })
                }
            });
        });
    })
</script>