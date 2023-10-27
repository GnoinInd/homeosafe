@include('header')


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Testimonial Upload</h4>
                    <form method="POST" action="{{ route('testimonial.update', ['testimonial' => $testimonial]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Testimonial Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $testimonial->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Testimonial Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $testimonial->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Testimonial Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>

                       
                    </form>

                    <br><br>

                </div>
            </div>
        </div>


   



@include('footer')