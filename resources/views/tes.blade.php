<form action="{{ url('/advance-images/182af590-c716-11ea-82b3-235e5bf0cd29')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <input type="file" name="file" class="form-control">
    <input type="submit" value="submit">
</form>