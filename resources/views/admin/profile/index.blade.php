@extends('admin.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>


  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ url('public/assets/dist/img/avatar.png')}}" alt="profile picture">
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                @if (Auth::user()->role==1)
                <p class="text-muted text-center">System Administrator</p>
                @endif

                @if (Auth::user()->role==2)
                <p class="text-muted text-center">Client</p>
                @endif

                @if (Auth::user()->role==3)
                <p class="text-muted text-center">Seller</p>
                @endif

                <form action="" method="post">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <input type="file" name="image" required>
                        </li><br>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </ul>
                </form>
            </div>
          </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><b>Profile details</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><b>Change Password</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#about_me" data-toggle="tab"><b>About Me</b></a></li>
                </ul>
                </div>
                <div class="card-body">
                @include('admin.layouts._message')
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <form class="form-horizontal" action="{{ url('admin/user/update-profile/'.Auth::user()->id) }}" method="post">
                            <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control bg-light" value="{{ Auth::user()->name }}" placeholder="Full name" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail address</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control bg-light" value="{{ Auth::user()->email }}" placeholder="E-Mail address" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Phone number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control bg-light" value="{{ Auth::user()->phone }}" placeholder="Phone number" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" action="{{ url('admin/user/update-password/'.Auth::user()->id) }}" method="POST">
                            <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="old_password" placeholder="Confirm Password" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="about_me">
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </section>

</div>


@endsection
