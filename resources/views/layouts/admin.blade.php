<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body style="height: auto;">
    <div class="wrapper">
        @include('partials.menu')
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">

                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <!-- Right navbar links -->
                        @if(count(config('panel.available_languages', [])) > 1)
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                        {{ strtoupper(app()->getLocale()) }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>

            </nav>
            <!-- Main content -->
            <section class="content" style="padding-top: 20px">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </section>
            <!-- /.content -->
            <footer class="footer justify-content-center">
                <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
            </footer>
        </div>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    @vite(['resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity="sha512-ubuT8Z88WxezgSqf3RLuNi5lmjstiJcyezx34yIU2gAHonIi27Na7atqzUZCOoY4CExaoFumzOsFQ2Ch+I/HCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.8.1/js/perfect-scrollbar.jquery.min.js" integrity="sha512-jFSfXp133/LWIx3/qzT+5z1pOij737HWwVd/yGVX0ZVTUFLy886mWPLDsGSiqorIbXJO3UgAeZxn4AytImx0lQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js') }}"></script>
    <script>
        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

  let languages = {
    'en': '//cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json',
    'zh_TW': '//cdn.datatables.net/plug-ins/1.13.6/i18n/zh-HANT.json'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages['{{ app()->getLocale() }}']
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'copy',
        className: 'btn-light',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-light',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-light',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-light',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-light',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-light',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});

    </script>
    <script>
        /*!
     * AdminLTE v3.0.0-alpha.2 (https://adminlte.io)
     * Copyright 2014-2018 Abdullah Almsaeed <abdullah@almsaeedstudio.com>
     * Licensed under MIT (https://github.com/almasaeed2010/AdminLTE/blob/master/LICENSE)
     */
    !function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t(e.adminlte={})}(this,function(e){"use strict";var i,t,o,n,r,a,s,c,f,l,u,d,h,p,_,g,y,m,v,C,D,E,A,O,w,b,L,S,j,T,I,Q,R,P,x,B,M,k,H,N,Y,U,V,G,W,X,z,F,q,J,K,Z,$,ee,te,ne="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},ie=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},oe=(i=jQuery,t="ControlSidebar",o="lte.control.sidebar",n=i.fn[t],r=".control-sidebar",a='[data-widget="control-sidebar"]',s=".main-header",c="control-sidebar-open",f="control-sidebar-slide-open",l={slide:!0},u=function(){function n(e,t){ie(this,n),this._element=e,this._config=this._getConfig(t)}return n.prototype.show=function(){this._config.slide?i("body").removeClass(f):i("body").removeClass(c)},n.prototype.collapse=function(){this._config.slide?i("body").addClass(f):i("body").addClass(c)},n.prototype.toggle=function(){this._setMargin(),i("body").hasClass(c)||i("body").hasClass(f)?this.show():this.collapse()},n.prototype._getConfig=function(e){return i.extend({},l,e)},n.prototype._setMargin=function(){i(r).css({top:i(s).outerHeight()})},n._jQueryInterface=function(t){return this.each(function(){var e=i(this).data(o);if(e||(e=new n(this,i(this).data()),i(this).data(o,e)),"undefined"===e[t])throw new Error(t+" is not a function");e[t]()})},n}(),i(document).on("click",a,function(e){e.preventDefault(),u._jQueryInterface.call(i(this),"toggle")}),i.fn[t]=u._jQueryInterface,i.fn[t].Constructor=u,i.fn[t].noConflict=function(){return i.fn[t]=n,u._jQueryInterface},u),re=(d=jQuery,h="Layout",p="lte.layout",_=d.fn[h],g=".main-sidebar",y=".main-header",m=".content-wrapper",v=".main-footer",C="hold-transition",D=function(){function n(e){ie(this,n),this._element=e,this._init()}return n.prototype.fixLayoutHeight=function(){var e={window:d(window).height(),header:d(y).outerHeight(),footer:d(v).outerHeight(),sidebar:d(g).height()},t=this._max(e);d(m).css("min-height",t-e.header),d(g).css("min-height",t-e.header)},n.prototype._init=function(){var e=this;d("body").removeClass(C),this.fixLayoutHeight(),d(g).on("collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu",function(){e.fixLayoutHeight()}),d(window).resize(function(){e.fixLayoutHeight()}),d("body, html").css("height","auto")},n.prototype._max=function(t){var n=0;return Object.keys(t).forEach(function(e){t[e]>n&&(n=t[e])}),n},n._jQueryInterface=function(t){return this.each(function(){var e=d(this).data(p);e||(e=new n(this),d(this).data(p,e)),t&&e[t]()})},n}(),d(window).on("load",function(){D._jQueryInterface.call(d("body"))}),d.fn[h]=D._jQueryInterface,d.fn[h].Constructor=D,d.fn[h].noConflict=function(){return d.fn[h]=_,D._jQueryInterface},D),ae=(E=jQuery,A="PushMenu",w="."+(O="lte.pushmenu"),b=E.fn[A],L={COLLAPSED:"collapsed"+w,SHOWN:"shown"+w},S={screenCollapseSize:768},j={TOGGLE_BUTTON:'[data-widget="pushmenu"]',SIDEBAR_MINI:".sidebar-mini",SIDEBAR_COLLAPSED:".sidebar-collapse",BODY:"body",OVERLAY:"#sidebar-overlay",WRAPPER:".wrapper"},T="sidebar-collapse",I="sidebar-open",Q=function(){function n(e,t){ie(this,n),this._element=e,this._options=E.extend({},S,t),E(j.OVERLAY).length||this._addOverlay()}return n.prototype.show=function(){E(j.BODY).addClass(I).removeClass(T);var e=E.Event(L.SHOWN);E(this._element).trigger(e)},n.prototype.collapse=function(){E(j.BODY).removeClass(I).addClass(T);var e=E.Event(L.COLLAPSED);E(this._element).trigger(e)},n.prototype.toggle=function(){(E(window).width()>=this._options.screenCollapseSize?!E(j.BODY).hasClass(T):E(j.BODY).hasClass(I))?this.collapse():this.show()},n.prototype._addOverlay=function(){var e=this,t=E("<div />",{id:"sidebar-overlay"});t.on("click",function(){e.collapse()}),E(j.WRAPPER).append(t)},n._jQueryInterface=function(t){return this.each(function(){var e=E(this).data(O);e||(e=new n(this),E(this).data(O,e)),t&&e[t]()})},n}(),E(document).on("click",j.TOGGLE_BUTTON,function(e){e.preventDefault();var t=e.currentTarget;"pushmenu"!==E(t).data("widget")&&(t=E(t).closest(j.TOGGLE_BUTTON)),Q._jQueryInterface.call(E(t),"toggle")}),E.fn[A]=Q._jQueryInterface,E.fn[A].Constructor=Q,E.fn[A].noConflict=function(){return E.fn[A]=b,Q._jQueryInterface},Q),se=(R=jQuery,P="Treeview",B="."+(x="lte.treeview"),M=R.fn[P],k={SELECTED:"selected"+B,EXPANDED:"expanded"+B,COLLAPSED:"collapsed"+B,LOAD_DATA_API:"load"+B},H=".nav-item",N=".nav-treeview",Y=".menu-open",V="menu-open",G={trigger:(U='[data-widget="treeview"]')+" "+".nav-link",animationSpeed:300,accordion:!0},W=function(){function i(e,t){ie(this,i),this._config=t,this._element=e}return i.prototype.init=function(){this._setupListeners()},i.prototype.expand=function(e,t){var n=this,i=R.Event(k.EXPANDED);if(this._config.accordion){var o=t.siblings(Y).first(),r=o.find(N).first();this.collapse(r,o)}e.slideDown(this._config.animationSpeed,function(){t.addClass(V),R(n._element).trigger(i)})},i.prototype.collapse=function(e,t){var n=this,i=R.Event(k.COLLAPSED);e.slideUp(this._config.animationSpeed,function(){t.removeClass(V),R(n._element).trigger(i),e.find(Y+" > "+N).slideUp(),e.find(Y).removeClass(V)})},i.prototype.toggle=function(e){var t=R(e.currentTarget),n=t.next();if(n.is(N)){e.preventDefault();var i=t.parents(H).first();i.hasClass(V)?this.collapse(R(n),i):this.expand(R(n),i)}},i.prototype._setupListeners=function(){var t=this;R(document).on("click",this._config.trigger,function(e){t.toggle(e)})},i._jQueryInterface=function(n){return this.each(function(){var e=R(this).data(x),t=R.extend({},G,R(this).data());e||(e=new i(R(this),t),R(this).data(x,e)),"init"===n&&e[n]()})},i}(),R(window).on(k.LOAD_DATA_API,function(){R(U).each(function(){W._jQueryInterface.call(R(this),"init")})}),R.fn[P]=W._jQueryInterface,R.fn[P].Constructor=W,R.fn[P].noConflict=function(){return R.fn[P]=M,W._jQueryInterface},W),ce=(X=jQuery,z="Widget",q="."+(F="lte.widget"),J=X.fn[z],K={EXPANDED:"expanded"+q,COLLAPSED:"collapsed"+q,REMOVED:"removed"+q},$="collapsed-card",ee={animationSpeed:"normal",collapseTrigger:(Z={DATA_REMOVE:'[data-widget="remove"]',DATA_COLLAPSE:'[data-widget="collapse"]',CARD:".card",CARD_HEADER:".card-header",CARD_BODY:".card-body",CARD_FOOTER:".card-footer",COLLAPSED:".collapsed-card"}).DATA_COLLAPSE,removeTrigger:Z.DATA_REMOVE},te=function(){function n(e,t){ie(this,n),this._element=e,this._parent=e.parents(Z.CARD).first(),this._settings=X.extend({},ee,t)}return n.prototype.collapse=function(){var e=this;this._parent.children(Z.CARD_BODY+", "+Z.CARD_FOOTER).slideUp(this._settings.animationSpeed,function(){e._parent.addClass($)});var t=X.Event(K.COLLAPSED);this._element.trigger(t,this._parent)},n.prototype.expand=function(){var e=this;this._parent.children(Z.CARD_BODY+", "+Z.CARD_FOOTER).slideDown(this._settings.animationSpeed,function(){e._parent.removeClass($)});var t=X.Event(K.EXPANDED);this._element.trigger(t,this._parent)},n.prototype.remove=function(){this._parent.slideUp();var e=X.Event(K.REMOVED);this._element.trigger(e,this._parent)},n.prototype.toggle=function(){this._parent.hasClass($)?this.expand():this.collapse()},n.prototype._init=function(e){var t=this;this._parent=e,X(this).find(this._settings.collapseTrigger).click(function(){t.toggle()}),X(this).find(this._settings.removeTrigger).click(function(){t.remove()})},n._jQueryInterface=function(t){return this.each(function(){var e=X(this).data(F);e||(e=new n(X(this),e),X(this).data(F,"string"==typeof t?e:t)),"string"==typeof t&&t.match(/remove|toggle/)?e[t]():"object"===("undefined"==typeof t?"undefined":ne(t))&&e._init(X(this))})},n}(),X(document).on("click",Z.DATA_COLLAPSE,function(e){e&&e.preventDefault(),te._jQueryInterface.call(X(this),"toggle")}),X(document).on("click",Z.DATA_REMOVE,function(e){e&&e.preventDefault(),te._jQueryInterface.call(X(this),"remove")}),X.fn[z]=te._jQueryInterface,X.fn[z].Constructor=te,X.fn[z].noConflict=function(){return X.fn[z]=J,te._jQueryInterface},te);e.ControlSidebar=oe,e.Layout=re,e.PushMenu=ae,e.Treeview=se,e.Widget=ce,Object.defineProperty(e,"__esModule",{value:!0})});
    //# sourceMappingURL=adminlte.min.js.map

    </script>
    @yield('scripts')
</body>

</html>
