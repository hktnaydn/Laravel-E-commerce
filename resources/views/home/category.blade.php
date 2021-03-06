
@php
    
    $parentCategories=\App\Http\Controllers\HomeController::categoryList()
@endphp
<div class="col-lg-3 d-none d-lg-block">
    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Kategoriler</h6>
        <i class="fa fa-angle-down text-dark"></i>
    </a>


    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 255px">
            @foreach ($parentCategories as $rs)
            <div class="nav-item dropdown">
                
                <a class="nav-link" data-toggle="dropdown">{{$rs->title}} <i class="fa fa-angle-right"></i></a>
                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                    @if(count($rs->children))
                                        @foreach ($rs->children as $subcategory)
                                                 <a href="{{route('categoryproducts',['id'=>$subcategory->id,'slug'=>$subcategory->slug])}}" class="dropdown-item">{{$subcategory->title}}</a>
                                        @endforeach
                    @endif
                </div>
              
            </div>
            @endforeach
        </div>
    </nav>
</div>
