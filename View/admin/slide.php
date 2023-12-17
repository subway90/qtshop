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
                                            <li class="breadcrumb-item active" aria-current="page">Slide</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Danh sách slide chính</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-upload-slide" class="btn btn-primary">Thêm slide</a></div>
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
                                        <th>ID</th>
                                        <th class="min-w-20x">Nội dung slide</th>
                                        <th>Link button</th>
                                        <th>Tên button</th>
                                        <th>Làm mờ Background</th>
                                        <th>Ngày cập nhật</th>
                                        <th class="min-w-5x">Trạng thái</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$result = slide_all();
for($i=0;$i<count($result);$i++)
{
$slide = $result[$i];
?>
                                    <tr>
                                        <td class="text-nowrap"><?=$slide['id_slide']?>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded " style="width: 140px; height: 60px">
                                                        <img src="./../View/img/<?=$slide['image']?>" alt="image-slide" />
                                                    </div>
                                                </a>
                                                <div>
                                                <?php
                                                if(!empty($slide['title1']))
                                                {
                                                ?>
                                                <a href="#" class="text-reset"><?=$slide['title2']?></a>
                                                <?php
                                                }else
                                                {
                                                ?>
                                                <a href="#" class="text-reset">(trống)</a>
                                                <?php
                                                }
                                                if(!empty($slide['title1']))
                                                {
                                                    ?>
                                                <div class="text-muted mt-n1"><?=$slide['title1']?></div>
                                                <?php
                                                }else
                                                {
                                                ?>
                                                <div class="text-muted mt-n1">(trống)</div>
                                                <?php
                                                }
                                                ?> 
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            if(!empty($slide['link']))
                                            {
                                                echo $slide['link'];
                                            }else
                                            {
                                                echo'(trống)';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if(!empty($slide['name_link']))
                                            {
                                                echo $slide['name_link'];
                                            }else
                                            {
                                                echo'(trống)';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if(!empty($slide['background']))
                                            {
                                                ?>
                                                <div class="sa-price"><div class="badge badge-sa-success">Đang bật</div>
                                                <?php
                                            }else
                                            {
                                                ?>
                                                <div class="sa-price"><div class="badge badge-sa-secondary">Đang tắt</div>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?=$slide['date']?></td>
                                        <td>
                                            <?php
                                            if($slide['status']==1)
                                            {
                                            ?>
                                                <div class="sa-price"><div class="badge badge-sa-success">SLIDE 1</div>
                                            <?php
                                            }
                                            else if($slide['status']==2)
                                            {
                                            ?>
                                                <div class="sa-price"><div class="badge badge-sa-info">SLIDE 2</div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <div class="sa-price"><div class="badge badge-sa-danger">Đang ẩn</div>
                                            <?php
                                            }
                                            ?>
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
                                                    <li>
                                                        <a class="dropdown-item" href="index.php?act=admin-edit-slide&id=<?=$slide['id_slide']?>">Sửa slide</a>
                                                    </li>
                                                    <li>
                                                        <?php
                                                        if(!empty($slide['background']))
                                                        {
                                                        ?>
                                                        <a class="dropdown-item text-primary" href="#">Tắt làm mờ Background</a>
                                                        <?php
                                                        }else
                                                        {
                                                            ?>
                                                        <a class="dropdown-item text-success" href="#">Bật làm mờ Background</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </li>
                                                        <?php
                                                        if($slide['status']==1)
                                                        {
                                                        ?>
                                                    <li>
                                                        <a class="dropdown-item" href="#">Thay đổi <?=$arrow?> <span class="text-info">SLIDE 2</span> </a>
                                                    </li>
                                                        <?php
                                                        }elseif($slide['status']==1)
                                                        {
                                                        ?>
                                                    <li>
                                                        <a class="dropdown-item" href="#">Thay đổi <?=$arrow?> <span class="text-info">SLIDE 1</span> </a>
                                                    </li>
                                                        <?php
                                                        }
                                                        ?>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <?php
                                                    if($slide['status'] == 3)
                                                    {
                                                        ?>
                                                    <li>
                                                        <a class="dropdown-item text-success" href="index.php?act=admin-slide&del=3&id=<?=$slide['id_slide']?>&stt=<?=$slide['status']?>">Hiện slide</a>
                                                    </li>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="index.php?act=admin-slide&del=3&id=<?=$slide['id_slide']?>&stt=<?=$slide['status']?>">Ẩn slide</a>
                                                    </li>
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
                        <!-- slide phụ start-->

                        <!-- <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Danh sách slide phụ</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            
                            <div class="sa-divider"></div>
                            <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                                data-sa-search-input="#table-search">
                                <thead>
                                    <tr>
                                        <th class="w-min" data-orderable="false"><input type="checkbox"
                                                class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                        </th>
                                        <th>STT</th>
                                        <th class="min-w-20x">Nội dung slide</th>
                                        <th>Link button</th>
                                        <th>Ngày chỉnh sửa</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
for($i=1;$i<=2;$i++)
{
?>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                                aria-label="..." /></td>
                                        <td class="text-nowrap"><?=$i?></td>
                                        <td>
                                            <div class="d-flex align-items-center"><a href="#"
                                                    class="me-4">
                                                    <div
                                                        class="sa-symbol sa-symbol--shape--rounded " style="width: 60px; height: 100px">
                                                        <img src="./../View/img/offer-1.png" alt="image-user" /></div>
                                                </a>
                                                <div><a href="#" class="text-reset">Tiêu đề 1</a>
                                                    <div class="text-muted mt-n1">Tiêu đề 2</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>index.php?act=shop</td>
                                        <td>00-00-0000 00:00:00</td>
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
                                                    <li><a class="dropdown-item" href="index.php?act=admin-edit-slide&id=1">Sửa</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li><a class="dropdown-item text-danger" href="#">Ẩn / hiện</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
<?php
}
?>
                                </tbody>
                            </table>
                        </div> -->

                        <!-- slide phụ end -->
                    </div>
                </div>
            </div><!-- sa-app__body / end -->