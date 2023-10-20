@include('header')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="imguploadsec p-4">
                        <h4>Image Upload</h4>
                        <form action="{{ route('images.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="images[]" multiple>
                            <button type="submit">Upload</button>
                        </form>
                    </div>

                </div>

                <form action="{{ route('images.deleteSelected') }}" method="POST">
                        @csrf

                        <div class="col-12">
                    <div class="row">

                        @if(isset($images) && count($images) > 0)
                        @foreach($images as $image)
                        <div class="col-4">
                            <input type="checkbox" name="selected_images[]" value="{{ $image->id }}" class="img-fluid">
                            <img class="mt-2" src="{{ asset('storage/' . $image->path) }}"
                                alt="{{ $image->image_name }}" width="250px" height="200px">
                            <p></p>
                         
                            <form action="{{ route('images.setStatus', $image->id) }}" method="POST">
                            @csrf
                            
                           <button type="submit" name="status" value="active"
                        class="status-button {{ $image->status === 'active' ? 'active' : 'inactive' }}">Active</button>
                                
                        <button type="submit" name="status" value="inactive"
                          class="status-button {{ $image->status === 'inactive' ? 'active' : 'inactive' }}">Inactive</button>
                         
                        </form>
                        </div>
                        @endforeach
                        @else
                        <p>No images to display.</p>
                        @endif



                        <div class="col-12 my-4">
                            <div class="text-center"><button type="submit" class="delete-button">Delete
                                    Selected</button>
                            </div>
                        </div>

                </form>
               
                        
                    </div>
                </div>
            </div>
        </div>






@include('footer')