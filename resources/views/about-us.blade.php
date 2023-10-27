@include('header')




<div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>About Us upload</h4>
                    <form action="{{ route('about.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" multiple>
                        <div class="form-group my-3">
                        <label class ="mb-1" for="title">About Us Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group my-3">
                        <label class ="mb-1" for="desccription">About Us Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>

                        <button type="submit" class="btn btn-info">Upload</button>
                    </form>

                    <br><br>

                  

                  
                        <div class="image-gallery">
                        @if(isset($aboutus) && count($aboutus) > 0)
                        @foreach($aboutus as $about)
                        <div class="col-4">
                        
                        
                            
                            <img class="mt-2" src="{{ asset('storage/' . $about->path) }}"
                                alt="{{ $about->title }}" width="250px" height="200px">
                                <p class="ms-5 mt-1">{{ $about->title }}</p>

                                <a href="{{ route('about.edit', ['about' => $about]) }}" class="btn btn-primary">Edit</a>
                      
                        </div>
                        @endforeach
                 
                            @else
                            <p>No aboutus to display.</p>
                            @endif
                        </div>
                      
                      

                
                </div>
            </div>
        </div>




@include('footer')