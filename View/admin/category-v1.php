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
                                            <li class="breadcrumb-item active" aria-current="page">Loại hàng</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Danh sách loại hàng</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-upload-cate-v1" class="btn btn-primary">Thêm loại hàng</a></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="p-4"><input type="text" placeholder="Start typing to search for categories"
                                    class="form-control form-control--search mx-auto" id="table-search" /></div>
                            <div class="sa-divider"></div>
                            <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                                data-sa-search-input="#table-search">
                                <thead>
                                    <tr>
                                        <th class="w-min" data-orderable="false"><input type="checkbox"
                                                class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                        </th>
                                        <th>ID</th>
                                        <th class="min-w-15x">Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Level</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
?>
                                    <!-- vòng lặp loại bắt đầu -->
                                    <?php
                $list = listloai_v1_all();
                for ($i = 0; $i < count($list); $i++)
                {
                    $list_cate_v1 = $list[$i]
                ?>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                                aria-label="..." /></td>
                                        <td>
                                                
                                            <?=$list_cate_v1['stt']?>
                                        </td>
                                        
                                        <td>
                                        <div class="d-flex align-items-center"><a href="#"
                                                    class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                        <img src="../View/img/<?=$list_cate_v1['image']?>" width="40" height="40" alt="" />
                                                    </div>
                                                </a>
                                                <div><a href="#" class="text-reset"><?=$list_cate_v1[0]?></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            if($list_cate_v1['status']==1)
                                            {
                                            ?>
                                        <div class="badge badge-sa-success">Đang hiện</div> 
                                                <?php
                                            }else
                                            {
                                                ?>
                                        <div class="badge badge-sa-danger">Đang ẩn</div> 
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?=$list_cate_v1['date']?>
                                        </td>
                                        <td>
                                            <?php
                                            if($list_cate_v1['level'] == 1)
                                            {
                                                ?>
                                            <div class="badge badge-sa-primary">Level 1</div> 
                                                <?php
                                            }
                                            else
                                            {
                                               ?>
                                            <div class="badge badge-sa-secondary">Level 2</div> 
                                               <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="dropdown"><button class="btn btn-sa-muted btn-sm" type="button"
                                                    id="category-context-menu-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false" aria-label="More"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="3" height="13"
                                                        fill="currentColor">
                                                        <path
                                                            d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                        </path>
                                                    </svg></button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="category-context-menu-0">
                                                    <li><a class="dropdown-item" href="index.php?act=admin-edit-cate-v1&edit=5&id=<?=$list_cate_v1['stt']?>">Sửa</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li><a class="dropdown-item text-danger" href="index.php?act=admin-category-v1&del=4&id=<?=$list_cate_v1['stt']?>&stt=<?=$list_cate_v1['status']?>">Ẩn / hiện</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- vòng lặp loại kết thúc -->
<?php
                    }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- sa-app__body / end -->