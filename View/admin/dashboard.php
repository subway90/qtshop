<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
$date = getdate();
?>
<div id="top" class="sa-app__body px-2 px-lg-4">
<div class="container pb-6">
                    <div class="py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col">
                                <h1 class="h3 m-0">Quản lí doanh thu</h1>
                            </div>
                            <div class="col-auto d-flex">
                                <select class="form-select me-3">
                                <option checked=""><?=$date['weekday']." /".$date['mday']."/".$date['mon']."/".$date['year']?></option>
                                    <?php

for($i=1;$i<$date['mon'];$i++)
{
    ?>
                                    <option><?=$date['mday']."/".($date['mon']-$i)."/".$date['year']?></option>
    <?php
}
                                    ?>
                                </select>
                                <a href="#" class="btn btn-primary">Xuất</a>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 g-xl-5">
                        <div class="col-12 col-md-4 d-flex">
                            <div class="card saw-indicator flex-grow-1"
                                data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                                <div class="sa-widget-header saw-indicator__header">
                                    <h2 class="sa-widget-header__title">Doanh thu tháng <?=$date['mon']?></h2>
                                    <div class="sa-widget-header__actions">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                                id="widget-context-menu-1" data-bs-toggle="dropdown"
                                                aria-expanded="false" aria-label="More">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="widget-context-menu-1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Xem chi tiết</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#">Xóa</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $month_1 = sum_total_month($date['mon']);
                                $month_2 = sum_total_month($date['mon']-1);
                                $ave_mon_1 = $month_1['sum']/$month_1['count'];
                                $ave_mon_2 = $month_2['sum']/$month_2['count'];
                                ?>
                                <div class="saw-indicator__body">
                                    <div class="saw-indicator__value"><?=number_format($month_1['sum'],0,'.',',')?> vnđ</div>
                                    <?php
                                    if($month_1 > $month_2)
                                    {
                                        ?>
                                        <div class="saw-indicator__delta saw-indicator__delta--rise">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-up"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value"><?=number_format(((1-($month_1['sum']/$month_2['sum']))*100), 2, ',' , '.')?> %</div>
                                        </div>
                                        <div class="saw-indicator__caption">so với tháng <?=($date['mon']-1)." ".$date['year']?></div>
                                        <?php
                                    }else
                                    {
                                        ?>
                                        <div class="saw-indicator__delta saw-indicator__delta--fall">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value"><?=number_format(((1-($month_1['sum']/$month_2['sum']))*100), 2, ',' , '.')?> %</div>
                                        </div>
                                        <div class="saw-indicator__caption">so với tháng <?=($date['mon']-1)." ".$date['year']?></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex">
                            <div class="card saw-indicator flex-grow-1"
                                data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                                <div class="sa-widget-header saw-indicator__header">
                                    <h2 class="sa-widget-header__title">Giá trị đơn hàng trung bình</h2>
                                    <div class="sa-widget-header__actions">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                                id="widget-context-menu-2" data-bs-toggle="dropdown"
                                                aria-expanded="false" aria-label="More">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="widget-context-menu-2">
                                                <li>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Move</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="saw-indicator__body">
                                    <div class="saw-indicator__value"><?=number_format(($ave_mon_1), 0, ',','.')?> vnđ</div>
                                    <?php
                                    if($ave_mon_1>$ave_mon_2)
                                    {
                                        ?>
                                        <div class="saw-indicator__delta saw-indicator__delta--rise">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-up"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value"><?=number_format((1-($ave_mon_1/$ave_mon_2))*100,2,',','.')?> %</div>
                                        </div>
                                        <div class="saw-indicator__caption">so với tháng <?=($date['mon']-1)." ".$date['year']?></div>
                                        <?php
                                    }else{
                                    ?>
                                    <div class="saw-indicator__delta saw-indicator__delta--fall">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value"><?=number_format((1-($ave_mon_1/$ave_mon_2))*100,2,',','.')?> %</div>
                                        </div>
                                        <div class="saw-indicator__caption">so với tháng <?=($date['mon']-1)." ".$date['year']?></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex">
                            <div class="card saw-indicator flex-grow-1"
                                data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                                <div class="sa-widget-header saw-indicator__header">
                                    <h2 class="sa-widget-header__title">Số đơn hàng</h2>
                                    <div class="sa-widget-header__actions">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                                id="widget-context-menu-3" data-bs-toggle="dropdown"
                                                aria-expanded="false" aria-label="More">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="widget-context-menu-3">
                                                <li>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Move</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="saw-indicator__body">
                                    <div class="saw-indicator__value"><?=$month_1['count']?></div>
                                    <?php
                                    if($month_1['count']>$month_2['count'])
                                    { 
                                        ?>
                                        <div class="saw-indicator__delta saw-indicator__delta--rise">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-up"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value"><?=number_format((1-($month_1['count']/$month_2['count']))*100,2,',','.')?> %</div>
                                        </div>
                                        <div class="saw-indicator__caption">so với tháng <?=($date['mon']-1)." ".$date['year']?></div>
                                    <?php
                                    }else{
                                        ?>
                                        <div class="saw-indicator__delta saw-indicator__delta--fall">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value"><?=number_format((1-($month_1['count']/$month_2['count']))*100,2,',','.')?> %</div>
                                        </div>
                                        <div class="saw-indicator__caption">so với tháng <?=($date['mon']-1)." ".$date['year']?></div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                            <div class="card flex-grow-1 saw-pulse"
                                data-sa-container-query="{&quot;560&quot;:&quot;saw-pulse--size--lg&quot;}">
                                <div class="sa-widget-header saw-pulse__header">
                                    <h2 class="sa-widget-header__title">Số lượng sản phẩm</h2>
                                    <div class="sa-widget-header__actions">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                                id="widget-context-menu-4" data-bs-toggle="dropdown"
                                                aria-expanded="false" aria-label="More">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="widget-context-menu-4">
                                                <li>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Move</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="saw-pulse__counter">
                                    <?php
                                    $count_pro = count_all_product();
                                    ?>
                                    <?=$count_pro[0]?>
                                </div>
                                <div class="sa-widget-table saw-pulse__table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th class="text-end">Lượt xem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $l_v_pro = list_view_product();
                                            for($i = 0; $i<count($l_v_pro);$i++)
                                            {
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="index.php?act=detail&edit=0&id=<?=$l_v_pro[$i]['id_sp']?>" class="text-reset"><?=$l_v_pro[$i]['Name']?></a>
                                                </td>
                                                <td class="text-end"><?=$l_v_pro[$i]['Viewsp']?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                        <div class="card flex-grow-1 saw-table">
                                <div class="sa-widget-header saw-table__header">
                                    <h2 class="sa-widget-header__title">Thống kê sản phẩm</h2>
                                    <div class="sa-widget-header__actions">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                                id="widget-context-menu-6" data-bs-toggle="dropdown"
                                                aria-expanded="false" aria-label="More">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="widget-context-menu-6">
                                                <li>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Move</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="saw-table__body sa-widget-table text-nowrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Loại</th>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng mua</th>
                                                <th>Lượt mua</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $l_order = list_order_dashboard();
                                            for($i = 0; $i<count($l_order);$i++)
                                            {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="badge badge-sa-dark"><?=$l_order[$i]['tenloai']?></div>
                                                </td>
                                                <td>
                                                    <div class="d-flex fs-6">
                                                        <div class="badge badge-sa-info"><?=$l_order[$i]['tensp']?></div>
                                                    </div>
                                                </td>
                                                <td>
                                                <?=number_format($l_order[$i]['giasp'], 0, '.', ',')?>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <a href="#" class="text-reset"><?=$l_order[$i]['soluongmua']?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?=$l_order[$i]['solanmua']?></td>
                                                <td><?=number_format($l_order[$i]['tongmua'], 0, '.', ',')?> vnđ</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex">
                            <div class="card flex-grow-1">
                                <div class="card-body">
                                    <div class="sa-widget-header mb-4">
                                        <h2 class="sa-widget-header__title">Đánh giá gần nhất</h2>
                                        <div class="sa-widget-header__actions">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                                    id="widget-context-menu-8" data-bs-toggle="dropdown"
                                                    aria-expanded="false" aria-label="More">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13"
                                                        fill="currentColor">
                                                        <path
                                                            d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="widget-context-menu-8">
                                                    <li>
                                                        <a class="dropdown-item" href="#">Settings</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">Move</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                        <div class="sa-widget-header__actions">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                                    id="widget-context-menu-9" data-bs-toggle="dropdown"
                                                    aria-expanded="false" aria-label="More">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13"
                                                        fill="currentColor">
                                                        <path
                                                            d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="widget-context-menu-9">
                                                    <li>
                                                        <a class="dropdown-item" href="#">Settings</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">Move</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
