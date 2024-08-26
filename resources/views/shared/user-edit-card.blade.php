<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex align-items-start justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                         src="{{$user->getImageUrl()}}" alt="{{$user->name}}">
                    <div>
                        <x-input name="name" type="text" value="{{$user->name}}"></x-input>
                        <span class="fs-6 text-muted">{{$user->email}}</span>
                    </div>
                </div>
            </div>
            <div>
                <x-input name="image" type="file"></x-input>
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{$user->bio}}</textarea>
                    @error('bio')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-dark btn-sm">Save</button>
                </div>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> {{$user->ideas->count()}} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{$user->comments->count()}} </a>
                </div>
            </div>
        </form>
    </div>
</div>