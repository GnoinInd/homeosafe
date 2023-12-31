@include('header')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="imguploadsec p-4">
                <h4>Testimonial Upload</h4>
                <form action="{{ url('testimonial/upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" multiple>
                    <div class="form-group my-3">
                        <label class="mb-1" for="title">Testimonial Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label class="mb-1" for="desccription">Testimonial Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-info">Upload</button>
                </form>
            </div>

            <br><br>
            <form action="{{ route('testimonial.deleteSelected') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="image-gallery">
                    @if(isset($testimonials) && count($testimonials) > 0)
                    @foreach($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4 col-sm-12">
                        <div class="imageUploadedViewSection">
                            <div class="d-flex flex-row">
                                <input type="checkbox" name="selected_images[]" value="{{ $testimonial->id }}"
                                    class="img-fluid m-2">

                                <img class="mt-2" src="{{ asset('storage/' . $testimonial->path) }}"
                                    alt="{{ $testimonial->title }}" width="250px" height="200px">
                            
                            </div>

                            <div class="row">
                                <div class="col-12 mt-2">
                                    <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                        class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach

                    @else
                    <p>No testimonial to display.</p>
                    @endif
                </div>
                <br><br><br><br>
                <div class="col-12 my-4">
                    <div class="text-center"><button type="submit" class="delete-button">Delete
                            Selected</button>
                    </div>

            </form>
        </div>
    </div>
</div>





@include('footer')