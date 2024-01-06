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
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-dashboard">Quản lí</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Quản lí voucher</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Danh sách mã voucher</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-upload-voucher" class="btn btn-primary">Thêm voucher</a></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="p-4"><input type="text" placeholder="Start typing to search for orders"
                                    class="form-control form-control--search mx-auto" id="table-search" /></div>
                            <div class="sa-divider"></div>
                            <table class="sa-datatables-init text-nowrap" data-order="[[ 1, &quot;desc&quot; ]]"
                                data-sa-search-input="#table-search">
                                <thead>
                                    <tr>
                                        <th class="w-min" data-orderable="false">ID</th>
                                        <th>Mã CODE</th>
                                        <th>Loại</th>
                                        <th>Điều kiện</th>
                                        <th>Giảm</th>
                                        <th>Ngày tạo</th>
                                        <th>Số lượng</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$result = list_voucher();
for($i=0;$i<count($result);$i++){
$rc = $result[$i];
?>
                                    <tr>
                                        <td><?=$rc['id_voucher']?></td>
                                        <td><?=$rc['code']?></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <?php
                                                if($rc['status']==4)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-success">Miễn phí SHIP</div>
                                                    <?php
                                                }elseif($rc['status']==3)
                                                {
                                                ?>
                                                <div class="badge badge-sa-info">Giảm hóa đơn theo %</div>
                                                <?php
                                                }elseif($rc['status']==2)
                                                {
                                                ?>
                                                <div class="badge badge-sa-primary">Giảm hóa đơn theo vnđ</div>
                                                <?php
                                                }elseif($rc['status']==1)
                                                {
                                                ?>
                                                <div class="badge badge-sa-dark">Đã ẩn</div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <?php
                                                if($rc['status']==4)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-success"><?=$rc['condition_voucher']?> vnđ</div>
                                                    <?php
                                                }elseif($rc['status']==3)
                                                {
                                                ?>
                                                <div class="badge badge-sa-info"><?=$rc['condition_voucher']?> vnđ</div>
                                                <?php
                                                }elseif($rc['status']==2)
                                                {
                                                ?>
                                                <div class="badge badge-sa-primary"><?=$rc['condition_voucher']?> vnđ</div>
                                                <?php
                                                }elseif($rc['status']==1)
                                                {
                                                ?>
                                                <div class="badge badge-sa-dark">Đã ẩn</div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <?php
                                                if($rc['status']==4)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-success">freeship</div>
                                                    <?php
                                                }elseif($rc['status']==3)
                                                {
                                                ?>
                                                <div class="badge badge-sa-info"><?=$rc['number_voucher']?> %</div>
                                                <?php
                                                }elseif($rc['status']==2)
                                                {
                                                ?>
                                                <div class="badge badge-sa-primary"><?=$rc['number_voucher']?> vnđ</div>
                                                <?php
                                                }elseif($rc['status']==1)
                                                {
                                                ?>
                                                <div class="badge badge-sa-dark">Đã ẩn</div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="sa-price">
                                                <span class="sa-price__integer"><?=$rc['date_create']?> đ</span>
                                            </div>
                                        </td>
                                        <td><div class="badge badge-sa-primary"><?=$rc['amount']?></div></td>
                                        <td>
                                            <div class="dropdown"><button class="btn btn-sa-muted btn-sm" type="button"
                                                    id="order-context-menu-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false" aria-label="More"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="3" height="13"
                                                        fill="currentColor">
                                                        <path
                                                            d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                        </path>
                                                    </svg></button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="order-context-menu-0">
                                                    <li><a class="dropdown-item" href="index.php?act=admin-orders&update=1&dh=&stt=2">Cập nhật giao hàng 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg> 
                                                    <span class="text-danger">(Chưa giao hàng)</span></a></li>
                                                   
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li><a class="dropdown-item text-danger" href="index.php?act=admin-orders&update=2&dh=&stt=4">Ẩn voucher</a></li>
                                                    
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
            </div><!-- sa-app__body / end -->