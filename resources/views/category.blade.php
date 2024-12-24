<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Category</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.0.2/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <!-- End layout styles -->
  <link rel="icon" href="{{ asset('images/favicon.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}"
            alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}"
            alt="logo" /></a>
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
            <h2 class="m-0">Category Details</h2>
          </div>
          <div class="col-lg-4 text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info d-flex align-items-center" data-bs-toggle="modal"
              data-bs-target="#AddProductModal">
              <i class="mdi mdi-plus-circle me-2"></i> Add Category
            </button>
          </div>
          <div class="col-lg-4 text-center">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 my-5">
            <table class="table table-bordered table-striped text-center text-capitalize" id="products-table">
              <thead>
                <tr class="fw-bolder">
                  <th>Name</th>
                  <th>Image</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="products-body">
                <tr>
                  <td>testing</td>
                  <td>testing</td>
                  <td>17-12-2024 02:50PM</td>
                  <td>17-12-2024 02:50PM</td>
                  <td>
                    <button class="btn btn-warning edit-product-btn" data-bs-toggle="modal"
                      data-bs-target="#updateProductModal">Edit</button>
                    <button class="btn btn-danger delete-product-btn">Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>one</td>
                  <td>one</td>
                  <td>15-12-2024 10:50PM</td>
                  <td>15-12-2024 10:50PM</td>
                  <td>
                    <button class="btn btn-warning edit-product-btn" data-bs-toggle="modal"
                      data-bs-target="#updateProductModal">Edit</button>
                    <button class="btn btn-danger delete-product-btn">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Add Product Modal -->
      <div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 fw-bold">Add Category</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="message"></div>
            <div class="modal-body">
              <form id="addCategoryForm" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" name="name" placeholder="Name">
                </div>

                <div class="mb-3">
                  <input type="file" class="form-control" name="img" placeholder="Name">
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
      <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 fw-bold">Update Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="message"></div>
            <div class="modal-body">
              <form id="updateProductForm" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <input type="hidden" name="id">
                  <input type="text" class="form-control" name="name" placeholder="Name">
                </div>

                <div class="mb-3">
                  <input type="file" class="form-control" name="img" placeholder="Name">
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
      $(function () {
        // Add Category Ajax Request
        $("#add_category_form").submit(function (e) {
          e.preventDefault();
          const formdata = new FormData(this);
          $("#add_category_btn").text('Adding...'); // Update button text
          $.ajax({
            url: '{{ route('category.store') }}',
            method: 'POST',
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
              if (response.status === 200) {
                Swal.fire(
                  'Added!',
                  'Category added successfully!',
                  'success'
                );
                fetchAllCategories();
                $("#add_category_form")[0].reset();
                $("#addCategoryModal").modal('hide');
                $('.modal-backdrop').remove();
              } else {
                alert("An error occurred while adding the category.");
              }
              $("#add_category_btn").text('Add Category');
            },
            error: function (xhr, status, error) {
              alert("An unexpected error occurred. Please try again.");
              $("#add_category_btn").text('Add Category');
            }
          });
        });


        // edit employee ajax request
        $(document).on('click', '.editIcon', function (e) {
          e.preventDefault();
          let id = $(this).attr('id');
          $.ajax({
            url: '{{ route('category.edit') }}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            },
            success: function (response) {
              $("#fname").val(response.first_name);
              $("#lname").val(response.last_name);
              $("#email").val(response.email);
              $("#emp_id").val(response.id);
              $("#emp_avatar").val(response.avatar);
            }
          });
        });

        // update employee ajax request
        $("#edit_category_form").submit(function (e) {
          e.preventDefault();
          const fd = new FormData(this);
          $("#edit_category_btn").text('Updating...');
          $.ajax({
            url: '{{ route('category.update') }}',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
              if (response.status == 200) {
                Swal.fire(
                  'Updated!',
                  'Category Updated Successfully!',
                  'success'
                )
                fetchAllCategories();
              }
              $("#edit_category_btn").text('Update Category');
              $("#edit_category_form")[0].reset();
              $("#editCategoryModal").modal('hide');
            }
          });
        });

        // Delete Category ajax request
        $(document).on('click', '.deleteIcon', function (e) {
          e.preventDefault();
          let id = $(this).attr('id');
          let csrf = '{{ csrf_token() }}';
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: '{{ route('category.delete')}}',
                data: {
                  id: id,
                  _token: csrf
                },
                success: function (response) {
                  console.log(response);
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                  fetchAllCategories();
                }
              });
            }
          })
        });

        // Fetch all employees ajax request
        fetchAllCategories();

        function fetchAllCategories() {
          $.ajax({
            url: '{{ route('category.fetchAll') }}',
            method: 'get',
            success: function (response) {
              $("#show_all_categories").html(response);
              $("table").DataTable({
                order: [0, 'desc']
              });
            }
          });
        }
      });
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
    <script src="{{ asset('/css/bootstrap-5.0.2/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>

</html>