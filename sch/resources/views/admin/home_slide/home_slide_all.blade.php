@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Home Slider Form</h4>
               <form method='post' action="{{ route('update.slider') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $homeslide->id }}">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name='title' class="form-control" type="text" placeholder="Edit Title" id="example-text-input" value="{{ $homeslide->title }}">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title </label>
                    <div class="col-sm-10">
                        <input name='short_title' class="form-control" type="text" placeholder="Edit Short Title" id="example-text-input" value="{{ $homeslide->short_title }}">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                    <div class="col-sm-10">
                        <input name='video_url' class="form-control" type="text" placeholder="Edit Video URL" id="example-text-input" value="{{ $homeslide->video_url }}">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Sllider Image</label>
                    <div class="col-sm-10">
                        <input name='home_slide' class="form-control" type="file" placeholder="Slider image" id="sliderimage">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <img class="rounded avtar-lg" src="{{ (!empty($homeslide->home_slide)) ? url($homeslide->home_slide) : url('upload/no_image.jpg') }} " alt="Card image cap" height="80" weight="80" id="showprofileimage">
                    </div>
                </div>
                <!-- end row -->
                <input type='submit' class="btn btn-info waves-effect waves-light" value="Update Slide">


                </form>
               
            </div>
        </div>
    </div> <!-- end col -->
</div>

</div>
</div>

    <script>
        $(document).ready(function(){
            $("#profileimage").change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showprofileimage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection