<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
        <img src="https://picsum.photos/128" alt="System Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">鐵祥企業</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" target="_blank" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>
                            廠商
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('management.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">廠商清單</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">廠商種類</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./order.html" target="_blank" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>訂單</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('processing.index')}}" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>加工管理</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>耗材管理<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('consume.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">列表</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('restock.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">進貨管理</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('usage.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">使用紀錄</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./consumables-inventory.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">庫存</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('monthly.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">月結查詢</p>
                            </a>
                        </li>
                    </ul>
            </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
