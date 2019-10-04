{{ csrf_field() }}
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Enter book's title" name="title"
           @if($book->title ?? '')
           value="{{ $book->title ?? '' }}"
           @else
           value="{{ \Illuminate\Support\Facades\Request::old('title') }}"
        @endif>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"
              placeholder="Enter book's description">@if($book->description ?? ''){{ $book->description ?? '' }}@else{{ \Illuminate\Support\Facades\Request::old('description') }}@endif</textarea>
</div>
<div class="form-group">
    <label for="author">Select one or several authors</label>
    <select multiple class="form-control" id="author" name="author[]">
        @if (isset($book) && request()->getRequestUri() === '/admin/book/edit/'.$book->id)
            @foreach($authors as $author)
                <option value="{{ $author->id }}"
                        @foreach($book->authors as $bookAuthor)
                        @if($author->id === $bookAuthor->id)
                        selected
                    @endif
                    @endforeach
                >{{ $author->surname }}, {{ $author->name }}</option>
            @endforeach
        @else
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->surname }}, {{ $author->name }}</option>
            @endforeach
        @endif
    </select>
</div>
<div class="form-group">
    <label for="pages">Number of pages</label>
    <input type="number" class="form-control" id="pages" placeholder="Enter number of pages" name="num_of_pages"
           @if($book->num_of_pages ?? '')
           value="{{ $book->num_of_pages ?? '' }}"
           @else
           value="{{ \Illuminate\Support\Facades\Request::old('num_of_pages') }}"
        @endif>
</div>
<div class="form-group">
    <label for="cover">Choose book's cover</label>
    <input type="file" class="form-control-file" id="cover" name="cover"
           @if($book->cover ?? '')
           value="{{ $book->cover ?? '' }}"
           @else
           value="{{ \Illuminate\Support\Facades\Request::old('cover') }}"
        @endif>
    <small class="text-muted">Image size must be less than 2Mb</small>
</div>
<div>{{ $errors->first('cover') }}</div>
@if($book->cover ?? '')
    <img src="/uploads/{{ $book->cover }}" alt="..." class="img-thumbnail mb-3"/>
@endif
<button type="submit" class="btn btn-outline-success">Save</button>
<a href="{{ route('books') }}" class="btn btn-outline-secondary">Back</a>
