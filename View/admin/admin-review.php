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
                                        <th class="w-min">Mã</th>
                                        <th >Tên người dùng</th>
                                        <th>Sản phẩm đánh giá</th>
                                        <th>Điểm sao</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

            $result = admin_list_review();
                for ($i = 0; $i < count($result); $i++) {
                    $rc = $result[$i];
?>
                                    <tr>
                                        <td class="text-nowrap"><div class="badge badge-sa-primary"><?=$rc['id_review']?></div></td>
                                        <td>
                                            <div class="d-flex align-items-center"><a href="#"
                                                    class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                        <img src="../View/img/<?= $rc['image_user'] ?>" width="40" height="40" alt="" />
                                                    </div>
                                                </a>
                                                <div><a href="#" class="text-reset"><?=$rc['hoten']?></a>
                                                    <div class="text-muted mt-n1"><?=$rc['email_user']?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center"><a href="#"
                                                    class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                        <img src="../View/img/<?= $rc['anhsp'] ?>" width="40" height="40" alt="" />
                                                    </div>
                                                </a>
                                                <div><a href="#" class="text-reset"><?=$rc['tensp']?></a>
                                                    <div class="text-muted mt-n1">Size: <?=$rc['size']?> | Màu: <?=$rc['color']?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                                <?=$rc['rating']?>
                                            <i class="fas fa-star"></i>
                                        </td>
                                        <td>
                                            <p><?=$rc['noidung']?></p>
                                            <img src="../View/img/<?=$rc['image']?>" width="30%" alt="<?=$rc['image']?>">
                                        </td>
                                        <td>
                                            <div class="sa-price">
                                            <?=$rc['date_submit']?>
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
                                                    <?php
                                                    if($rc["status"]!=1)
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item" href="index.php?act=admin-review&del=5&id=<?=$rc["id_review"]?>&stt=1">Hủy kết quả</a></li>
                                                    <li><hr class="dropdown-divider"/></li>
                                                    <?php
                                                    }
                                                    ?>
                                                    <li>
                                                        <?php
                                                        if($rc["status"]==2)
                                                        {
                                                        ?>
                                                        <a class="dropdown-item text-danger" href="index.php?act=admin-review&del=5&id=<?=$rc["id_review"]?>&stt=2">Ẩn đánh giá</a>
                                                        <?php
                                                        }elseif($rc["status"]==3)
                                                        {
                                                        ?>
                                                        <a class="dropdown-item text-success" href="index.php?act=admin-review&del=5&id=<?=$rc["id_review"]?>&stt=3">Hiện đánh giá</a>
                                                        <?php
                                                        }else
                                                        {
                                                        ?>
                                                        <div class="dropdown-item text-info" href="#">Đánh giá chưa hoàn thành</div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </li>
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
<!-- <div id="top" class="sa-app__body px-2 px-lg-4">
    <div class="container pb-6">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-6 d-flex">
                            <div class="card flex-grow-1">
                                <div class="card-body">
                                    <div class="sa-widget-header mb-4">
                                        <h2 class="sa-widget-header__title">Đánh giá gần nhất</h2>
                                        
                                    </div>
                                    <div class="sa-timeline mb-n2 pt-2">
                                        <ul class="sa-timeline__list">

                                            <li class="sa-timeline__item">
                                                <div class="sa-timeline__item-title">Hôm qua</div>
                                                <div class="sa-timeline__item-content">Sản phẩm này dùng ổn quá 
                                                    <a href="#">Áo len cổ lọ size XXL</a>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="col-12 col-lg-6 d-flex">
                            <div class="card flex-grow-1">
                                <div class="card-body">
                                    <div class="sa-widget-header">
                                        <h2 class="sa-widget-header__title">Đánh giá sản phẩm</h2>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item py-2">
                                        <div class="d-flex align-items-center py-3">
                                            <a href="#" class="me-4">
                                                <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                    <img src="./../t/admin_t/images/products/product-2-40x40.jpg" width="40"
                                                        height="40" alt="" />
                                                </div>
                                            </a>
                                            <div class="d-flex align-items-center flex-grow-1 flex-wrap">
                                                <div class="col">
                                                    <a href="#" class="text-reset fs-exact-14">Sản phẩm đánh giá 1</a>
                                                    <div class="text-muted fs-exact-13">124 lượt đánh giá
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-auto">
                                                    <div class="sa-rating ms-sm-3 my-2 my-sm-0"
                                                        style="--sa-rating--value:0.5"> 2.5/5 sao
                                                        <div class="sa-rating__body"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div> -->