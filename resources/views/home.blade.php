@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - Users
                    <a href="{{ route('create') }}" class="float-right btn btn-primary btn-sm">Create New</a>
                </div>
                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <table class="table table-hover table-stripped">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Created At</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($users as $key => $user)
                           <tr>
                                <td> {{ $key+=1 }}</td>
                                <td> {{$user->name }}</td>
                                <td> {{ $user->email }}</td>
                                <td> {{$user->created_at}} </td>
                                <td>
                                    <div class="btn-group">
                                    <a  href="{{ route('edit',$user->id) }}" class="btn btn-sm btn-success @if($user->id==Auth::user()->id){{'disabled'}} @endif ">Edit</a>
                                    <a id="{{ $user->id }}" href="#" class="delete-btn btn btn-sm btn-danger @if($user->id==Auth::user()->id){{'disabled'}} @endif">Delete</a>
                                    </div>
                                </td>
                            </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
                <div class="card-body">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('delete') }}" method="post">
    <div id="delete-modal" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Delete</div>
            <div class="modal-body">
                Do you want to delete this user?
               @csrf
               <input type="hidden" name="_method" value="delete"/>
               <input type="hidden" name="id" id="user-id" />
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-sm btn-danger" value="Delete"/>
                <input type="button" data-dismiss="modal" value="Cancel" class="btn btn-sm btn-secondary"/>
            </div>
        </div>
    </div>
</div>
</form>

@endsection
@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".delete-btn").click(function(){
               var $id= $(this).attr('id');
               $("#delete-modal").modal('show');
               $('#user-id').val($id);

            });
        });
    </script>  
@endsection
