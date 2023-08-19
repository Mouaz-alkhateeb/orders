@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Orders List

                        @if (auth()->check() && auth()->user()->type == 3)
                        <a href="{{url('add_order')}}" class="btn btn-sm btn-success float-end">Add Order</a>
                        @endif

                    </h4>

                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Order Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created By</th>
                        @if (auth()->check() && auth()->user()->type == 2)
                            <th>Operations</th>
                        @endif
                    </thead>
                    <tbody>

                        @forelse ($orders as $order)
                            <tr>
                                <td>1</td>
                                <td>{{ $order->title }}</td>
                                <td>{{ $order->description }}</td>
                                <td>
                                    @if ($order->status == 1)
                                        <span class="badge bg-success">Approved</span>
                                    @elseif ($order->status == 2)
                                        <span class="badge bg-danger">Rejected</span>
                                    @elseif ($order->status == 3)
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $order->user->name }}</td>
                                @if (auth()->check() && auth()->user()->type == 2)
                                    <td>
                                        <form action="{{ url('approve/'.$order->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-primary">Approve</button>
                                        </form>
                                        <form action="{{ url('reject/'.$order->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Records Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
