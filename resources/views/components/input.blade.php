@props([
    'name',
    'type',
    'title' => null,
    'value' => ''
])

<div class="form-group mt-3">
    <label for="{{$name}}" class="text-dark">{{$title ?? ucfirst($name)}}:</label><br>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{$value}}" class="form-control">
    @error($name)
        <span class="text-danger">
              {{$message}}
        </span>
    @enderror
</div>