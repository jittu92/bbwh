<?php
// prd($_SESSION);
include 'layouts/app-header-links.php';
include 'layouts/app-header-aside.php';
?>
      <main class="app-main" data-page_name="<?=$page_name?>" data-aside_menu_name="<?=$aside_menu_name?>">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page "><div class="sidebar-backdrop"></div>
            <!-- .page-inner -->
            <div class="page-inner">
              <header class="page-title-bar">
                <div class="d-flex -flex-column -flex-md-row justify-content-between">
                <!-- <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
                    </li>
                  </ol>
                </nav> -->
                  <h1 class="page-title"><?= $page_title?> </h1>
                  <div class="ml-auto">
                    <!-- <a href="admin/products/new" class="btn btn-success"><span class="menu-icon fal fa-plus mr-2"></span>New</a> -->
                    <a href="jsavascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#uploadProductsModal">
                      <span class="menu-icon fal fa-plus mr-2"></span>
                      Upload
                    </a>
                    <a href="jsavascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#productDetailsModal">
                      <span class="menu-icon fal fa-plus mr-2"></span>
                      New
                    </a>
                  </div>
                </div>
              </header>
              <div class="page-section">
                <table id="myTable" class="table table-bordered table-sm lign-middle ">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Sale Price</th>
                      <th>Stock</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if($products['success']){
                        foreach ($products['data'] as $key => $value) {
                          ?>
                          <tr
                          class=""

                          >
                            <td><?= $key+1?></td>
                            <td><?= $value->pm_name?></td>
                            <td><?= $value->pm_description?></td>
                            <td><?= $value->pm_price?></td>
                            <td><?= $value->pm_sale_price?></td>
                            <td><?= $value->pm_stock?></td>
                            <td>
                              <span>
                                <i
                                  class="fa fa-edit product_row"
                                  <?php
                                    foreach ($value as $v_key => $v_value) {
                                      echo "data-".$v_key."=\"".$v_value."\"";
                                    }
                                  ?>
                                data-toggle="modal"
                                data-target="#productEditModal"
                                ></i>
                              </span>
                            </td>
                            <td>
                              <?php if ($_SESSION['admin_session_data']['admin_role'] == 1): ?>
                                <span>
                                  <i
                                    class="fa fa-trash delete_row"
                                    <?php
                                      foreach ($value as $v_key => $v_value) {
                                        echo "data-".$v_key."=\"".$v_value."\"";
                                      }
                                    ?>
                                  ></i> </span>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>


            </div><!-- /.page-inner -->

          </div><!-- /.page -->
        </div><!-- /.wrapper -->
      </main>






    </div>
    <div class="modal modal-drawer fade has-shown newModal"
      id="productDetailsModal"
      tabindex="-1" role="dialog" style="display: none;" aria-hidden="true"
    >
      <div class="modal-dialog modal-drawer-right" role="document" style="width: 500px;">
        <div class="modal-content">
          <div class="modal-header modal-body-scrolled">
            <h3>Product Create</h3>
          </div>

          <div class="modal-body perfect-scrollbar">
            <form id="productsAddForm">
              <div class="alert alert-success msg">
                  <!-- success msg -->
              </div>
              <div class="alert alert-danger msg">
                  <!-- error msg -->
              </div>
              <fieldset>
                <div class="form-group">
                  <label for="">Name (*)</label>
                  <input type="text" class="form-control" name="pm_name" required>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" name="pm_description">
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" class="form-control" name="pm_price" step="0.01">
                </div>
                <div class="form-group">
                  <label for="">Sale Price</label>
                  <input type="number" class="form-control" name="pm_sale_price" step="0.01">
                </div>
                <div class="form-group">
                  <label for="">Stock</label>
                  <input type="number" step="0.00" class="form-control" name="pm_stock" >
                </div>
              </fieldset>

              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal modal-drawer fade has-shown newModal"
      id="productEditModal"
      tabindex="-1" role="dialog" style="display: none;" aria-hidden="true"
    >
      <div class="modal-dialog modal-drawer-right" role="document" style="width: 500px;">
        <div class="modal-content">
          <div class="modal-header modal-body-scrolled">
            <h3>Product Edit</h3>
          </div>

          <div class="modal-body perfect-scrollbar">
            <input type="hidden" name="" value="" id="product_id">
            <form id="productsEditForm">
              <fieldset>
                <div class="alert alert-success msg">
                </div>
                <div class="alert alert-danger msg">
                </div>
                <div class="form-group">
                  <label for="">Name (*)</label>
                  <input type="text" class="form-control" name="pm_name" required>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" name="pm_description">
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" class="form-control" name="pm_price" step="0.01">
                </div>
                <div class="form-group">
                  <label for="">Sale Price</label>
                  <input type="number" class="form-control" name="pm_sale_price" step="0.01">
                </div>
                <div class="form-group">
                  <label for="">Stock</label>
                  <input type="number" step="0.00" class="form-control" name="pm_stock" >
                </div>
              </fieldset>

              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal modal-drawer fade has-shown newModal"
      id="uploadProductsModal"
      tabindex="-1" role="dialog" style="display: none;" aria-hidden="true"
    >
      <div class="modal-dialog modal-drawer-right" role="document" style="width: 500px;">
        <div class="modal-content">
          <div class="modal-header modal-body-scrolled">
            <h3>Upload Product</h3>
          </div>

          <div class="modal-body perfect-scrollbar">
            <form id="productsUploadForm">
              <div class="alert alert-success msg">
                  <!-- success msg -->
              </div>
              <div class="alert alert-danger msg">
                  <!-- error msg -->
              </div>
              <fieldset>
                <div class="form-group">
                  <label for="csv_file">File input</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="csv_file" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    <label class="custom-file-label" for="csv_file">Choose file</label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Required Fields</label>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="input_required[]" value="0">
                    <label class="custom-control-label" for="customSwitch1">Name</label>
                  </div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch2" name="input_required[]" value="1">
                    <label class="custom-control-label" for="customSwitch2">Description</label>
                  </div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch3" name="input_required[]" value="2">
                    <label class="custom-control-label" for="customSwitch3">Price</label>
                  </div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch4" name="input_required[]" value="3">
                    <label class="custom-control-label" for="customSwitch4">Sale Price</label>
                  </div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch5" name="input_required[]" value="4">
                    <label class="custom-control-label" for="customSwitch5">Stock</label>
                  </div>
                </div>
              </fieldset>

              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php
      include 'layouts/app-footer-links.php';
    ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
    <!-- js - datatable -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/admin/js/model-js/products.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
        $('#myTable').DataTable({
          paging: false,
          ordering: false,
          info: false
        });

      });
    </script>
  </body>
</html>
