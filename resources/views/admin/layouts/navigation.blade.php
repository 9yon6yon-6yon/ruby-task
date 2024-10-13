<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
        <ul>
            <li> <a href="index.html"><i class='bx bx-radio-circle'></i>Default</a>
            </li>
            <li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Alternate</a>
            </li>
            <li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Graphical</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Product</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">All Category</div>
        </a>
        <ul>
            <li> <a href="{{route('admin.viewallcategory')}}"><i class='bx bx-radio-circle'></i>View Category</a>
            </li>
            <li> <a href="{{ route('admin.addcategory')}}"><i class='bx bx-radio-circle'></i>Add Category</a>
            </li>
            <li> <a href="{{ route('admin.listproducts')}}"><i class='bx bx-radio-circle'></i>Products</a>
            </li>
            <li> <a href="{{ route('admin.viewaddproduct')}}"><i class='bx bx-radio-circle'></i>Add New
                    Products</a>
            </li>
            <li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a>
            </li>
        </ul>
    </li>
   
    <li>
        <a href="user-profile.html">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">User Profile</div>
        </a>
    </li>
    <li>
        <a href="faq.html">
            <div class="parent-icon"><i class="bx bx-help-circle"></i>
            </div>
            <div class="menu-title">FAQ</div>
        </a>
    </li>
    <li>
        <a href="javascript:;" target="_blank">
            <div class="parent-icon"><i class="bx bx-support"></i>
            </div>
            <div class="menu-title">Support</div>
        </a>
    </li>
</ul>
