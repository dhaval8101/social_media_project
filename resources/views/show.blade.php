<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social Media</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
    <style>
        body {
            background: #00FFFF;
        }

    </style>
</head>
<body>

    <!-- Demo header-->
    <section class="pb-12 header text-center">
        <div class="container py-12 text-white">
            <header class="py-3">
            </header>
            <div class="row">
                <div class="col-lg-124 mx-auto">
                    <div class="card border-12 shadow">
                        <div class="card-body p-12">
                            <!-- Responsive table -->
                            <div class="table-responsive">
                                <table class="table  m-0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Pincode</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($users as $user)
                                            <td>
                                                {{$user['id']}}
                                            </td>
                                            <td>
                                                {{$user['name']}}
                                            </td>
                                            <td>
                                                {{$user['email']}}
                                            </td>
                                            <td>
                                                {{$user['password']}}
                                            </td>
                                            <td>
                                                {{$user['phone']}}
                                            </td>
                                            <td>
                                                {{$user['address']}}
                                            </td>
                                            <td>
                                                {{$user['city']}}
                                            </td>

                                            <td>
                                                {{$user['pin_code']}}
                                            </td>
                                            <td>
                                                {{$user['role']}}
                                            </td>
                                            <td>
                                                <!-- Call to action buttons -->
                                                <ul class="list-inline m-0">

                                                    <li class="list-inline-item">
                                                        <button class="btn btn-primary"><a class="text-white" type="button" href={{'update/'.$user['id']}}>Update</a>
                                                    </li>
                                                    <br>
                                                    <br>
                                                    <li class="list-inline-item">
                                                        <button class="btn btn-danger"><a class="text-white" type="button" href={{'delete/'.$user['id']}}>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</body>
</html>
