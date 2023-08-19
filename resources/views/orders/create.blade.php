@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4> Add Order  <a href="{{url('orders')}}" class="btn btn-sm btn-danger float-end">Back</a></h4>
                </div>
                <div class="card-body">
                   <form action="{{url('store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Order Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                           <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
