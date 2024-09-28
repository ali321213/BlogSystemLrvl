<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUsers">
                    Add Users
                </button>

                <div class="modal fade" id="addUsers" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Add Users</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addUserForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Full Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Phone No.</label>
                                        <input type="number" class="form-control" name="phone_number" required>
                                    </div>
                                    <div class="d-flex my-3" style="gap: 20px;">
                                        <label class="form-label fw-bolder">Gender:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="male" required>
                                            <label class="form-check-label">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="female" required>
                                            <label class="form-check-label">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Email address</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Your Image</label>
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editUsers" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Edit Users</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editUserForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Full Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Phone No.</label>
                                        <input type="number" class="form-control" name="phone_number" required>
                                    </div>
                                    <div class="d-flex my-3" style="gap: 20px;">
                                        <label class="form-label fw-bolder">Gender:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="male" required>
                                            <label class="form-check-label">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="female" required>
                                            <label class="form-check-label">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Email address</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bolder">Your Image</label>
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered text-center text-capitalize">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Image</th>
                            <th>Gender</th>
                            <th>Phone No.</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            show();

            function show() {
                $.ajax({
                    url: 'showUsers',
                    dataType: 'json',
                    success: function(res) {
                        $('#usersTableBody').empty();
                        if (res.length === 0) {
                            $('#usersTableBody').append('<tr><td colspan="7">No users found</td></tr>');
                        } else {
                            res.forEach(function(user) {
                            let userRow = `
                        <tr>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td><img src="${user.image}" width="50"/></td>
                        <td>${user.gender}</td>
                        <td>${user.phone_number}</td>
                        <td>${new Date(user.created_at).toLocaleString()}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUsers">Update</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>`;
                                $('#usersTableBody').append(userRow);
                            });
                        }
                    }
                });
            }

            $('#addUserForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: 'addUser',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        show();
                    },
                });
            });
        });
    </script>
</body>

</html>