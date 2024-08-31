<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="{{$user->getImageUrl()}}" alt="{{$user->name}}">
                <div>
                    <h3 class="card-title mb-0"><a href="#">{{$user->name}}</a></h3>
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                @auth()
                    @if(Auth::id() === $user->id && !isset($editing))
                        <a href="{{route('users.edit', $user->id)}}">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5><p class="fs-6 fw-light">{{$user->bio}}</p>
            @include('users.shared.user-stats')
            @auth()
                @if(Auth::id() !== $user->id)
                    @if($user->isFollow($user))
                        <form action="{{route('users.unfollow', $user->id)}}" method="post">
                            @csrf
                            <div class="mt-3">
                                <input type="text" hidden="true">
                                <button class="btn btn-danger btn-sm">Unfollow</button>
                            </div>
                        </form>
                    @else
                        <form action="{{route('users.follow', $user->id)}}" method="post">
                            @csrf
                            <div class="mt-3">
                                <input type="text" hidden="true">
                                <button class="btn btn-primary btn-sm">Follow</button>
                            </div>
                        </form>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</div>