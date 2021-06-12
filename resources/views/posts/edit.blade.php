<h1>Edit post</h1>

<h1>{{ Auth::user()->id }} </h1>

<form method="POST" action="/update-post/{{$post[0]->id }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title1" class="form-control" value="{{ $post[0]->title }}" id="exampleInputEmail1"
            placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <input type="text" name="body1" class="form-control" value="{{ $post[0]->body }}" id="exampleInputEmail1"
            placeholder="Enter body">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
