<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Custom Notification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">Create Notification</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store') }}" class="needs-validation" novalidate>
                            @csrf
                            @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            <div class="form-row">
                                <div class="col-12">
                                    <label for="department" class="form-label"> <strong>User</strong> </label>
                                    <select class="form-control" name="user_id" aria-label="Default select example" required>
                                        <option selected value="">Select User</option>
                                        @foreach ( $users as $user)
                                        <option value={{$user->id}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please select User.</div>
                                </div>
                                <div class="col-12">
                                    <label for="fullname" class="form-label"><strong>Subject</strong></label>
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="validationTextarea"><strong>Body</strong></label>
                                    <textarea type="text-box" name="body" id="validationTextarea" class="form-control" placeholder="Body" required>{{old('body')}}</textarea>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please enter Purpose.</div>
                                    @error('body')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="validationTextarea"><strong>Notification Type</strong></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="notification_type" value="email" checked>
                                        <label class="form-check-label">Send Email Notification</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="notification_type" value="dashboard">
                                        <label class="form-check-label">Display on Dashboard</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>