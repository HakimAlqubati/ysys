<h1>Add post</h1>

<h1>{{Auth::user()->id}} </h1>

<form method="POST" action="/posts">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title1" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <input type="text" name="body1" class="form-control" id="exampleInputEmail1" placeholder="Enter body">
        <input type="hidden" name="user_id1" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->id}}" placeholder="Enter body">
    </div>
     
    <button type="submit" class="btn btn-primary">Save</button>
</form>
