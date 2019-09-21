<!-- Left Sidebar -->
<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a href="{{ route('adminHome') }}"@php if ($controller == 'DashboardController') echo ' class="active"'; @endphp><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-object-group" aria-hidden="true"></i><span> {{ __('Servies') }} </span> </a>
                </li>
                <li class="submenu">
                    <a href="#" @php if ($controller == 'CustomerController' || $controller == 'ProductController' || $controller == 'ManufatureController'
                    || $controller == 'IngredientController' || $controller == 'FormulaController' || $controller == 'CommentController') 
                    echo ' class="subdrop" style="display: block"'; @endphp>
                    <i class="fa fa-book" aria-hidden="true"></i> <span> {{ __('Categorys') }} </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" @php if ($controller == 'CustomerController' || $controller == 'ProductController' || $controller == 'ManufatureController'
                    || $controller == 'IngredientController' || $controller == 'FormulaController' || $controller == 'CommentController') 
                    echo ' style="display: block"'; @endphp>
                        <li class="d-none"><a href="{{ route('admin.customer') }}">{{ __('Customers') }}</a></li>
                        <li class="d-none"><a href="{{ route('admin.product') }}">{{ __('Products') }}</a></li>
                        <li><a href="{{ route('admin.manufature') }}">{{ __('Manufature') }}</a></li>
                        <li><a href="{{ route('admin.ingredient') }}">{{ __('Ingredient') }}</a></li>
                        <li><a href="{{ route('admin.formula') }}">{{ __('Formula') }}</a></li>
                        <li class="d-none"><a href="{{ route('admin.comment') }}">{{ __('Comments') }}</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#" @php if ($controller == 'SalesOrderController' || $controller == 'ReportFormulaController' || $controller == 'ReportMfgSpecController'
                     || $controller == 'ReportCostController' || $controller == 'ReportQuotationController' || $controller == 'ReportMixingController') 
                    echo ' class="subdrop"'; @endphp>
                        <i class="fa fa-bar-chart" aria-hidden="true"></i> <span> {{ __('Report') }} </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" @php if ($controller == 'SalesOrderController' || $controller == 'ReportFormulaController' 
                    || $controller == 'ReportMfgSpecController' || $controller == 'ReportCostController' || $controller == 'ReportQuotationController' 
                    || $controller == 'ReportInventoryController' || $controller == 'ReportInspectionController' || $controller == 'ReportMixingController') 
                    echo ' style="display: block"'; @endphp>
                        <li><a href="{{ route('admin.report.salesorder') }}">{{ __('Sales Order') }}</a></li>
                        <li><a href="{{ route('admin.report.formula') }}">{{ __('Formula') }}</a></li>
                        <li><a href="{{ route('admin.report.mfgspec') }}">{{ __('Mfg Spec') }}</a></li>
                        <li><a href="{{ route('admin.report.cost') }}">{{ __('Cost') }}</a></li>
                        <li><a href="{{ route('admin.report.quotation') }}">{{ __('Quotation') }}</a></li>
                        <li><a href="{{ route('admin.report.inventory') }}">{{ __('Inventory') }}</a></li>
                        <li><a href="{{ route('admin.report.mixing') }}">{{ __('Mixing') }}</a></li>

                        <li><a href="{{ route('admin.report.inspection') }}">{{ __('Inspection') }}</a></li>
                        <li><a href="javascript:;">{{ __('Encasulation') }}</a></li>
                        <li><a href="javascript:;">{{ __('Polish') }}</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- End Sidebar -->