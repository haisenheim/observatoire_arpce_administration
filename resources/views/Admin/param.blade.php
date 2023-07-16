
@extends('Layouts/admin')

@section('content')
    <div class="container">
        <div>
            <form method="POST" enctype="multipart/form-data" action="/admin/params">
                <div class="modal-body">
                    @csrf
                  <div class="row">

                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <label for="">TELEPHONE</label>
                            <input type="text" name="phone" value="{{ $param->phone }}" required placeholder="Telephone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ $param->email }}" required placeholder="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">LIEN FACEBOOK</label>
                            <input type="text" name="facebook_uri" value="{{ $param->facebook_uri }}" required placeholder="lien faceboook" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">LIEN TWITTER</label>
                            <input type="text" name="twitter_uri" value="{{ $param->twitter_uri }}" required placeholder="lien twitter" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">LIEN LINKEDIN</label>
                            <input type="text" name="linkedin_uri" value="{{ $param->linkedin_uri }}" required placeholder="lien linkedin" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="">LOGO </label>
                            <input type="file" name="logo" placeholder="image" class="form-control">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
                </form>
        </div>
    </div>
@endsection
