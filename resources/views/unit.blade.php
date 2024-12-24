    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Purple Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.0.2/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="search-field d-none d-md-block">
                        <form class="d-flex align-items-center h-100" action="#">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                </div>
                                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects" />
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="nav-profile-img">
                                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image" />
                                    <span class="availability-status online"></span>
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1 text-black">David Greymaax</p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-cached me-2 text-success"></i> Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                                </a>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block full-screen-link">
                            <a class="nav-link">
                                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="count-symbol bg-warning"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('assets/images/faces/face4.jpg') }}" alt="image" class="profile-pic" />
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
                                            Mark send you a message
                                        </h6>
                                        <p class="text-gray mb-0">1 Minutes ago</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('assets/images/faces/face2.jpg') }}" alt="image" class="profile-pic" />
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
                                            Cregh send you a message
                                        </h6>
                                        <p class="text-gray mb-0">15 Minutes ago</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('assets/images/faces/face3.jpg') }}" alt="image" class="profile-pic" />
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
                                            Profile picture updated
                                        </h6>
                                        <p class="text-gray mb-0">18 Minutes ago</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                                data-bs-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="count-symbol bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="mdi mdi-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-1">
                                            Event today
                                        </h6>
                                        <p class="text-gray ellipsis mb-0">
                                            Just a reminder that you have an event today
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-warning">
                                            <i class="mdi mdi-settings"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-1">
                                            Settings
                                        </h6>
                                        <p class="text-gray ellipsis mb-0">Update dashboard</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-info">
                                            <i class="mdi mdi-link-variant"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-1">
                                            Launch Admin
                                        </h6>
                                        <p class="text-gray ellipsis mb-0">New admin wow!</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                            </div>
                        </li>
                        <li class="nav-item nav-logout d-none d-lg-block">
                            <a class="nav-link" href="{{ url('signout') }}">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="#">
                                <i class="mdi mdi-format-line-spacing"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                @include('template.sidebar')
                <div class="container">
                    <div class="row mt-5 d-flex justify-content-between align-items-center">
                        <div class="col-lg-6" style="margin-left: 40px;">
                            <h2 class="m-0">Units Details</h2>
                        </div>
                        <div class="col-lg-4 text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#AddUnitModal">
                                <i class="mdi mdi-plus-circle me-2"></i>Add Units
                            </button>
                        </div>
                        <div class="col-lg-4 text-center">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 my-5">
                            <table class="table table-bordered text-center text-capitalize" id="units-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="units-body"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Add Product Modal -->
                <div class="modal fade" id="AddUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold">Add Unit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="message"></div>
                            <div class="modal-body">
                                <form id="addProductForm" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="price" placeholder="Price">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="brand">
                                            <option value="">Select Brand</option>
                                            <option value="Rajab">Rajab</option>
                                            <option value="J.">J.</option>
                                            <option value="Kashees">Kashees</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="category">
                                            <option value="">Select Category</option>
                                            <option value="makeup">makeup</option>
                                            <option value="perfumes">perfumes</option>
                                            <option value="shampoo">shampoo</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="unit">
                                            <option value="">Select Unit</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Product Modal -->
                <div class="modal fade" id="updateUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold">Add Unit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="message"></div>
                            <div class="modal-body">
                                <form id="updateUnitForm" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="price" placeholder="Price">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="brand">
                                            <option value="">Select Brand</option>
                                            <option value="Rajab">Rajab</option>
                                            <option value="J.">J.</option>
                                            <option value="Kashees">Kashees</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="category">
                                            <option value="">Select Category</option>
                                            <option value="makeup">makeup</option>
                                            <option value="perfumes">perfumes</option>
                                            <option value="shampoo">shampoo</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="unit">
                                            <option value="">Select Unit</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                getUnits();

                // Add Products
                // $('#addProductForm').on('submit', function(e) {
                //     e.preventDefault();
                //     var formData = new FormData(this);
                //     $.ajax({
                //         url: '/addProduct',
                //         method: 'POST',
                //         data: formData,
                //         processData: false,
                //         contentType: false,
                //         success: function(response) {
                //             if (response === '1') {
                //                 alert("Product added successfully");
                //                 $('#AddUnitModal').modal('hide');
                //             } else {
                //                 alert("An error occurred while adding the product.");
                //             }
                //         },
                //         error: function(xhr) {
                //             if (xhr.status === 422) {
                //                 $('.message').html('<div class="alert alert-danger">Please fix the errors below:</div>');
                //                 $.each(xhr.responseJSON.errors, function(key, value) {
                //                     $('[name="' + key + '"]').after('<span class="text-danger">' + value + '</span>');
                //                 });
                //             } else {
                //                 alert("An unexpected error occurred. Please try again.");
                //             }
                //         }
                //     });
                // });

                // ____________________________________________________________________________________________
                // Function to fetch and display products
                function getUnits() {
                    $.ajax({
                        url: '/units/list',
                        method: 'GET',
                        success: function(data) {
                        let rows = '';
                        data.forEach(units => {
                        rows += `<tr>
                        <td>${units.name}</td>
                        <td>
                        <button class="btn btn-warning edit-unit-btn" data-bs-toggle="modal" data-bs-target="#updateunitModal" data-id="${units.id}">Edit</button>
                        <button class="btn btn-danger delete-unit-btn" data-id="${units.id}">Delete</button>
                        </td>
                        </tr>`;});
                        $('#units-body').html(rows);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching units:', error);
                        }
                    });
                }

                $('#addUnitForm').on('submit', function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: '/addUnit',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response === '1') {
                                alert("Unit added successfully");
                                $('#AddUnitModal').modal('hide');
                                getUnits();
                            } else {
                                alert("An error occurred while adding the Unit.");
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                $('.message').html('<div class="alert alert-danger">Please fix the errors below:</div>');
                                $.each(xhr.responseJSON.errors, function(key, value) {
                                    $('[name="' + key + '"]').after('<span class="text-danger">' + value + '</span>');
                                });
                            } else {
                                alert("An unexpected error occurred. Please try again.");
                            }
                        }
                    });
                });

                // Delete Product
                $('#products-table').on('click', '.delete-product', function() {
                    var productId = $(this).data('id');
                    if (confirm('Are you sure you want to delete this product?')) {
                        $.ajax({
                            url: '/deleteUnit/' + unitId, // URL for deleting the product
                            method: 'DELETE',
                            success: function(response) {
                                if (response.success) {
                                    alert('Product deleted successfully');
                                } else {
                                    alert('An error occurred while deleting the product.');
                                }
                            },
                            error: function(xhr) {
                                alert('An error occurred while deleting the product.');
                            }
                        });
                    }
                });

                $('#products-table').on('click', '.edit-product-btn', function() {
                    var productId = $(this).data('id');
                    $.ajax({
                        url: '/getUnit/' + unitId,
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                        }
                    });
                });

                // Update Product:-
                function updateProduct(id) {
                    let formData = new FormData();
                    formData.append('name', $('#name').val());
                    $.ajax({
                        url: `/units/update/${id}`,
                        method: 'PUT',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            alert(response.message);
                            $('#updateUnitModal').modal('hide');
                            getUnits();
                        },
                        error: function(error) {
                            console.error(error);
                            alert('Error updating unit!');
                        }
                    });
                }
            </script>
            <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
            <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('assets/js/jquery.cookie.js" type="text/javascript') }}"></script>
            <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
            <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
            <script src="{{ asset('assets/js/misc.js') }}"></script>
            <script src="{{ asset('assets/js/dashboard.js') }}"></script>
            <script src="{{ asset('assets/js/todolist.js') }}"></script>
            <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
            <!-- DataTables JS -->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    </body>

    </html>