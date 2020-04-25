@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User List</div>
                <div class="card-body filterable">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($users->count() > 0)
                    <table class="table table-bordered" id="user-list">
                        <thead>
                            <tr class="filters">
                                <th>Sr No</th>
                                <th><input type="text" class="form-control" placeholder="Name"></th>
                                <th><input type="text" class="form-control" placeholder="Gender"></th>
                                <th><input type="text" class="form-control" placeholder="Hobbies"></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cnt = 1; @endphp
                            @foreach($users as $user)
                            @php $showBlockedLink = true; @endphp
                            <tr>
                                <td>{{ $cnt++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ ucfirst($user->gender) }}</td>
                                <td>{{ $user->hobbyList() }}</td>
                                <td>
                                @if ($user->getFrienshipStatus() == 0)
                                    <span class="text-success"><srtong>Request sent</srtong></span>
                                @elseif ($user->getFrienshipStatus() == 1)
                                    <span class="text-success"><srtong>Your friend</srtong></span>
                                    @php $showBlockedLink = false; @endphp
                                @elseif ($user->getFrienshipStatus() == 2)
                                    <span class="text-danger"><srtong>Blocked</srtong></span>
                                    @php $showBlockedLink = false; @endphp
                                @elseif ($user->getFrienshipStatus() == 4)
                                    <a href="{{ route('acceptFriendRequest', ['friend_id' => $user->id]) }}">Accept Friend Request</a>
                                @else
                                    <a href="{{ route('sendFriendRequest', ['friend_id' => $user->id]) }}">Send Friend Request</a>
                                @endif                          
                                @if ($showBlockedLink)
                                 | <a href="{{ route('blockFriendRequest', ['friend_id' => $user->id]) }}">Block</a>
                                 @endif
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>No Record Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
