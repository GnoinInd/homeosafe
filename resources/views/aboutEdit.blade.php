@include('header')




<div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Testimonial Upload</h4>
                    <form method="POST" action="{{ route('about.update') }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                   <input type="hidden" name="about_id" value="{{ $about->id }}">

                <div class="form-group mt-3">
                    <label for="title">About Us Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $about->title }}" required>
                </div>

                <div class="form-group mt-4">
                    <label for="description">About Us Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $about->description }}</textarea>
                </div>

                <div class="form-group my-4">
                    <label for="image">About Us Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>

                    <br><br>

                </div>
            </div>
        </div>




@include('footer')