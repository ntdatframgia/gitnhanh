@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="{{asset("/../storage/app/avatar/$user->img")}}" class="avatar img-circle" alt="avatar" width="100" height="100">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data" role="form">
        {{csrf_field()}}
        {{ method_field('PUT') }}
          <div class="form-group">
           <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fname" value="{{$user->fname}}" required>
              @if ($errors->has('fname'))
                  <span class="help-block">
                      <strong>{{ $errors->first('fname') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
           <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="lname" value="{{$user->lname}}" required>
              @if ($errors->has('lname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span>
              @endif
            </div>
          </div>          
          <div class="form-group">
           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value="{{$user->email}}" required>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
           <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="username" value="{{$user->username}}" required>
              @if ($errors->has('username'))
                  <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
           <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label class="col-md-3 control-label">Address:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="address" value="{{$user->address}}" required>
              @if ($errors->has('address'))
                  <span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
              @endif
            </div>
          </div> 
          <div class="form-group">
           <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
            <label class="col-md-3 control-label">Birthday:</label>
            <div class="col-md-8">
            <?php  $birthday =  date('d-m-Y',strtotime( $user->birthday));?>
              <input id="birthday" class="form-control" name="birthday" type="text" value="{{$birthday}}" required>
              @if ($errors->has('birthday'))
                  <span class="help-block">
                      <strong>{{ $errors->first('birthday') }}</strong>
                  </span>
              @endif
            </div>
          </div>
           <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender" class="col-md-3 control-label">Gender</label>
            <div class="col-md-6">
                <div class="col-md-3">
                    <label class="radio-inline">
                        <input  name="gender" id="input-gender-male" value="1" required @if($user->gender==1) checked="checked"@endif type="radio" required />Male
                    </label>
                </div>
                <div class="col-sm-3">
                    <label class="radio-inline">
                        <input name="gender" id="input-gender-female" value="2" @if($user->gender==2)  checked="checked"@endif  type="radio" />Female
                    </label>
                </div>        
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
            </div>
          </div>  
          <div class="form-group">
           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" name="password" type="password" value="">
            </div>
          </div>
          <div class="form-group">
           <div class="form-group{{ $errors->has('cpassword') ? ' has-error' : '' }}">
            <label class="col-md-3 control-label"> Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" name="cpassword" type="password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection
