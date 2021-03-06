@extends('layouts.profile')

{{-- web site title --}}
@section('title')
@parent
change password
@stop

{{-- website content --}}
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">

      @if(Session::has('alertMessage'))
      <div class="alert alert-dismissable alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{Session::get('alertMessage')}}</strong>
      </div>
      @endif

      @if(Session::has('alertError'))
      <div class="alert alert-dismissable alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{Session::get('alertError')}}</strong>
      </div>
      @endif

      <div class="panel panel-default">
          <div class="panel-heading"><h3>Change Password</h3></div>
              <div class="panel-body">
                  {{Form::open(array('url'=>'profile/settings'))}}
                      <div class="form-group">
                          <label for="inputEmail" class="control-label">Current Password</label>
                          <div class="">
                              <input type="password" class="form-control" id="inputPassword" name="current_password" placeholder="********">
                              <span class="badge alert-danger">{{ ($errors->has('current_password') ? $errors->first('current_password') : '') }}</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail" class="control-label">New Password</label>
                          <div class="">
                            <input type="password" class="form-control" id="inputPassword" name="new_password" placeholder="********">
                            <span class="badge alert-danger">{{ ($errors->has('new_password') ? $errors->first('new_password') : '') }}</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail" class="control-label">Confirm New Password</label>
                          <div class="">
                            <input type="password" class="form-control" id="inputPassword" name="confirm_new_password" placeholder="********">
                            <span class="badge alert-danger">{{ ($errors->has('confirm_new_password') ? $errors->first('confirm_new_password') : '') }}</span>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="">
                              <a href="{{URL::to('profile')}}" class="btn btn-danger">Back</a>
                              <button type="submit" class="btn btn-success pull-right">Change Password</button>
                          </div>
                      </div>
                  </form>
              </div>
      </div>
  </div>
</div> <br /><br /><br />

@stop