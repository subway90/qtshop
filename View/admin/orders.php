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
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Orders</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="app-order.html" class="btn btn-primary">New
                                        order</a></div>
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
                                        <th class="w-min" data-orderable="false"><input type="checkbox"
                                                class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                        </th>
                                        <th>ID hóa đơn</th>
                                        <th>Ngày tạo</th>
                                        <th>Phương thức</th>
                                        <th>Thanh toán</th>
                                        <th>Giao hàng</th>
                                        <th>Tổng đơn</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$result = danhsachhoadon();
for($i=0;$i<count($result);$i++){
$rc = $result[$i];
?>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                                aria-label="..." /></td>
                                        <td><a href="index.php?act=donhang-chitiet&edit=3&id_ct=<?=$rc['id_dh']?>&name=<?=$rc['hoten']?>&phone=<?=$rc['phone']?>&e=<?=$rc['email']?>&add=<?=$rc['address']?>&t=<?=$rc['tongdh']?>&id_user=<?=$rc['id_user']?>" class="text-reset">#<?=$rc['id_dh']?></a></td>
                                        <td><?=$rc['ngaydat']?></td>
                                        <td>
                                        <div class="d-flex fs-6">
                                                <?php
                                                if($rc['pay']==2)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-primary">E-banking</div>
                                                    <?php
                                                }else
                                                {
                                                ?>
                                                <div class="badge badge-sa-info">Tiền mặt</div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <?php
                                                if($rc['thanhtoan']==2)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-danger">Chưa thanh toán</div>
                                                    <?php
                                                }
                                                elseif($rc['thanhtoan']==1)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-success">Đã thanh toán</div>
                                                    <?php
                                                }
                                                elseif($rc['thanhtoan']==3)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-warning">Đang thanh toán</div>
                                                    <?php
                                                }
                                                else{
                                                ?>
                                                <div class="badge badge-sa-dark">Hóa đơn đã hủy</div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex fs-6">
                                            <?php
                                                if($rc['giaohang']==2)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-danger">Chưa giao</div>
                                                    <?php
                                                }
                                                elseif($rc['giaohang']==1)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-success">Đã giao</div>
                                                    <?php
                                                }
                                                elseif($rc['giaohang']==3)
                                                {
                                                    ?>
                                                <div class="badge badge-sa-warning">Đang giao</div>
                                                    <?php
                                                }else{
                                                ?>
                                                <div class="badge badge-sa-dark">Hóa đơn đã hủy</div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="sa-price">
                                                <span class="sa-price__integer"><?=number_format($rc['tongdh'],0,',','.')?> đ</span>
                                            </div>
                                        </td>
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
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="order-context-menu-0">
                                                    <li><a class="dropdown-item" href="#">Sửa hóa đơn</a></li>
                                                    <?php
                                                    if($rc['thanhtoan']==2)
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item" href="index.php?act=admin-orders&update=0&dh=<?=$rc['id_dh']?>&stt=1">Cập nhật thanh toán 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg> 
                                                    <span class="text-success">(Đã thanh toán)</span></a></li>
                                                    <?php
                                                    }else
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item" href="index.php?act=admin-orders&update=0&dh=<?=$rc['id_dh']?>&stt=2">Cập nhật thanh toán 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg> 
                                                    <span class="text-danger">(Chưa thanh toán)</span></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if($rc['giaohang']==2)
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item" href="index.php?act=admin-orders&update=1&dh=<?=$rc['id_dh']?>&stt=3">Cập nhật giao hàng 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg> 
                                                    <span class="text-warning">(Đang giao hàng)</span></a></li>
                                                    <?php
                                                    }elseif($rc['giaohang']==3)
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item" href="index.php?act=admin-orders&update=1&dh=<?=$rc['id_dh']?>&stt=1">Cập nhật giao hàng 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg> 
                                                    <span class="text-success">(Đã giao hàng)</span></a></li>
                                                    <?php
                                                    }elseif($rc['giaohang']==1)
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item" href="index.php?act=admin-orders&update=1&dh=<?=$rc['id_dh']?>&stt=2">Cập nhật giao hàng 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg> 
                                                    <span class="text-danger">(Chưa giao hàng)</span></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <?php
                                                    if($rc['thanhtoan']==4 && $rc['giaohang']==4)
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item text-info" href="index.php?act=admin-orders&update=2&dh=<?=$rc['id_dh']?>&stt=2">Khôi phục hóa đơn</a></li>
                                                    <?php
                                                    }else
                                                    {
                                                    ?>
                                                    <li><a class="dropdown-item text-danger" href="index.php?act=admin-orders&update=2&dh=<?=$rc['id_dh']?>&stt=4">Hủy hóa đơn</a></li>
                                                    <?php
                                                    }
                                                    ?>
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