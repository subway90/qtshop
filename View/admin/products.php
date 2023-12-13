<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?> 
 <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.html">Quản lí</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Quản lí sản phẩm</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Quản lí sản phẩm</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-upload-product" class="btn btn-primary">Thêm sản phẩm</a></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="p-4"><input type="text" placeholder="Start typing to search for customers"
                                    class="form-control form-control--search mx-auto" id="table-search" /></div>
                            <div class="sa-divider"></div>
                            <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                                data-sa-search-input="#table-search">
                                <thead>
                                    <tr>
                                        <th class="w-min" data-orderable="false"><input type="checkbox"
                                                class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                        </th>
                                        <th class="min-w-20x">Tên sản phẩm</th>
                                        <th>Loại hàng</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Giá gốc</th>
                                        <th>Giá sale</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

            $result = danhsachsp_all();
                for ($i = 0; $i < count($result); $i++) {
                    $rc = $result[$i];
?>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                                aria-label="..." /></td>
                                        <td>
                                            <div class="d-flex align-items-center"><a href="#"
                                                    class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                        <img src="../View/img/<?= $rc['image'] ?>" width="40" height="40" alt="" />
                                                    </div>
                                                </a>
                                                <div><a href="#" class="text-reset"><?=$rc['Name']?></a>
                                                    <div class="text-muted mt-n1">ID: <?=$rc['id_sp']?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-nowrap"><?=$rc['name']?></td>
                                        <td>
                                        <?php
                                                if($rc["Mount"] == 0)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-danger">0</div>
                                                    <?php
                                                }
                                                else if($rc["Mount"] <= 19)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-warning"><?=$rc["Mount"]?></div>
                                                    <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <div class="badge badge-sa-success"><?=$rc["Mount"]?></div>
                                                <?php
                                                }
                                        ?>
                                        </td>
                                        <td>
                                        <?php
                                                if($rc["status"] == 1)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-primary">Đang hiện</div>
                                                    <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <div class="badge badge-sa-secondary">Đang ẩn</div>
                                                <?php
                                                }
                                        ?>   
                                        </td>
                                        <td>
                                            <div class="sa-price"><?=number_format($rc['Price'],0,'.',',')?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="sa-price"><?=number_format($rc['Sale'],0,'.',',')?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown"><button class="btn btn-sa-muted btn-sm" type="button"
                                                    id="customer-context-menu-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false" aria-label="More"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="3" height="13"
                                                        fill="currentColor">
                                                        <path
                                                            d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                        </path>
                                                    </svg></button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="customer-context-menu-0">
                                                    <li><a class="dropdown-item" href="index.php?act=admin-edit&edit=0&id=<?=$rc["id_sp"]?>">Chỉnh sửa</a></li>
                                                    <li><hr class="dropdown-divider"/></li>
                                                    <li><a class="dropdown-item text-danger" href="index.php?act=admin-products&del=1&id=<?= $rc["id_sp"]?>&stt=<?=$rc["status"]?>">Ẩn/hiện</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
<?php
                }
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            