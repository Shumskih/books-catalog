{{ csrf_field() }}
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter author's name" @if($author->name ?? '') value="{{ $author->name ?? '' }}" @else value="{{ \Illuminate\Support\Facades\Request::old('name') }}" @endif name="name">
</div>
<div class="form-group">
    <label for="name">Surname</label>
    <input type="text" class="form-control" id="name" placeholder="Enter author's surname" @if($author->surname ?? '') value="{{ $author->surname ?? '' }}" @else value="{{ \Illuminate\Support\Facades\Request::old('surname') }}" @endif name="surname">
</div>
<button type="submit" class="btn btn-outline-success">Save</button>
<a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Back</a>
