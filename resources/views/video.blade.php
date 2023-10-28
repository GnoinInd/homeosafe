@include('header')

        

        
      <div class="form-group">

   @error('video')
       <div class="alert alert-danger">{{ $message }}</div>
   @enderror
</div>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="imguploadsec p-4">
                        <h4>Video Upload</h4>
                        <form action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-3">
                        <label for="video">YouTube Video Link</label>
                        <input type="url" name="video" id="video" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="video">YouTube Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                            
                            <button type="submit" class="btn btn-primary mt-3">Upload</button>
                        </form>
                    </div>

                </div>
                <form action="{{ route('video.deleteSelected') }}" method="POST">
    @csrf
    <div class="col-12">
        <div class="row">
            @if(isset($videos) && count($videos) > 0)
            @foreach($videos as $video)
                    <div class="col-md-6 col-lg-4 col-sm-12 mt-4">
                       <div class="videourlUploadedViewSection">
                       <div class="d-flex flex-row">
                       <input type="checkbox" name="selected_videos[]" value="{{ $video->id }}" class="img-fluid m-2">
                        <iframe width="auto" height="auto" src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
                       </div>
                        <!-- <p>{{$video->title}}</p> -->
                        <form action="{{ route('video.setStatus', $video->id) }}" method="POST">
                            @csrf
                           
                          <div class="d-flex p-2 flex-row custmfileprevBtn">
                          <button type="submit" name="status" value="active"
                                class="status-button {{ $video->status === 'active' ? 'active' : 'inactive' }}">Active</button>
                            <button type="submit" name="status" value="inactive"
                                class="status-button {{ $video->status === 'inactive' ? 'active' : 'inactive' }}">Inactive</button>
                          </div>
                        </form>
                       </div>
                    </div>
                @endforeach
            @else
                <p>No video to display.</p>
            @endif
            <div class="col-12 my-4">
                <div class="text-center"><button type="submit" class="delete-button">Delete Selected</button></div>
            </div>
        </div>
    </div>
</form>

               
                        
                    </div>
                </div>
            </div>
        </div>






@include('footer')