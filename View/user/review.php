<?php
$id_review = $_REQUEST['id_review'];
$info_review = all_in_feedback($id_review);
?>
<body>
<div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Edit Product</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="#" class="btn btn-secondary me-3">Duplicate</a>
                                    <a href="#" class="btn btn-primary">Save</a>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/name" class="form-label">Name</label><input
                                                    type="text" class="form-control" id="form-product/name"
                                                    value="Brandix Screwdriver SCREW150" />
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/description"
                                                    class="form-label">Description</label>
                                                <textarea id="form-product/description"
                                                    class="sa-quill-control form-control" rows="8">Lorem
                                                        ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in
                                                        ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus.
                                                        Maecenas eu varius nisi.</textarea>
                                            </div>
                                            <div>
                                                <label for="form-product/short-description" class="form-label">Short
                                                    description</label>
                                                <textarea id="form-product/short-description" class="form-control"
                                                    rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Pricing</h2>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col">
                                                    <label for="form-product/price"
                                                        class="form-label">Price</label><input type="number"
                                                        class="form-control" id="form-product/price" value="1499" />
                                                </div>
                                                <div class="col">
                                                    <label for="form-product/old-price" class="form-label">Old
                                                        price</label><input type="number" class="form-control"
                                                        id="form-product/old-price" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Inventory</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/sku" class="form-label">SKU</label>
                                                <input type="text" class="form-control" id="form-product/sku"
                                                    value="SCREW150" />
                                            </div>
                                            <div>
                                                <label for="form-product/quantity" class="form-label">Stock
                                                    quantity</label>
                                                <input type="number" class="form-control" id="form-product/quantity"
                                                    value="18" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Images</h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                            <div class="sa-divider"></div>
                                            <div class="table-responsive">
                                                <table class="sa-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="w-min">Image</th>
                                                            <th class="w-min">Order</th>
                                                            <th class="w-min"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-1-40x40.jpg"
                                                                        width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td><input type="number"
                                                                    class="form-control form-control-sm w-4x"
                                                                    value="0" /></td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3"
                                                                    type="button" aria-label="Delete image"
                                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Delete image">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                        height="12" viewbox="0 0 12 12"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-2-40x40.jpg"
                                                                        width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td><input type="number"
                                                                    class="form-control form-control-sm w-4x"
                                                                    value="1" /></td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3"
                                                                    type="button" aria-label="Delete image"
                                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Delete image">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                        height="12" viewbox="0 0 12 12"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-3-40x40.jpg"
                                                                        width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td><input type="number"
                                                                    class="form-control form-control-sm w-4x"
                                                                    value="2" /></td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3"
                                                                    type="button" aria-label="Delete image"
                                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Delete image">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                        height="12" viewbox="0 0 12 12"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-4-40x40.jpg"
                                                                        width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td><input type="number"
                                                                    class="form-control form-control-sm w-4x"
                                                                    value="3" /></td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3"
                                                                    type="button" aria-label="Delete image"
                                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Delete image">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                        height="12" viewbox="0 0 12 12"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="sa-divider"></div>
                                            <div class="px-5 py-4 my-2">
                                                <a href="#">Upload new image</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5 w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Visibility</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-check"><input type="radio" class="form-check-input"
                                                        name="status" />
                                                    <span class="form-check-label">Published</span></label>
                                                <label class="form-check"><input type="radio" class="form-check-input"
                                                        name="status" checked="" />
                                                    <span class="form-check-label">Scheduled</span></label>
                                                <label class="form-check mb-0"><input type="radio"
                                                        class="form-check-input" name="status" />
                                                    <span class="form-check-label">Hidden</span></label>
                                            </div>
                                            <div>
                                                <label for="form-product/seo-title" class="form-label">Publish
                                                    date</label><input type="text" class="form-control datepicker-here"
                                                    id="form-product/publish-date" data-auto-close="true"
                                                    data-language="en" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Categories</h2>
                                            </div>
                                            <select class="sa-select2 form-select">
                                                <option>Power tools</option>
                                                <option>Screwdrivers</option>
                                                <option selected="">Chainsaws</option>
                                                <option>Hand tools</option>
                                                <option>Machine tools</option>
                                                <option>Power machinery</option>
                                                <option>Measurements</option>
                                            </select>
                                            <div class="mt-4 mb-n2">
                                                <a href="#">Add new category</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/feather-icons/feather.min.js"></script>
    <script src="vendor/simplebar/simplebar.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/highlight.js/highlight.pack.js"></script>
    <script src="vendor/quill/quill.min.js"></script>
    <script src="vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
    <script src="vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
    <script src="vendor/chart.js/chart.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/fullcalendar/main.min.js"></script>
    <script src="js/stroyka.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/demo-chart-js.js"></script>
</body>