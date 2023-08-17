<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <style>
            .modal-title{
                font-size: 20pt;
            }.select2-selection__rendered {
                line-height: 31px !important;
            }
            .select2-container .select2-selection--single {
                height: 35px !important;
            }
            .select2-selection__arrow {
                height: 34px !important;
            }
            #containerID {
                height: 500px;
                overflow: auto;
                display: flex;
                flex-direction: column-reverse;
                text-align: left;
            }
            #cotainerID2{
            
                flex: 1 1 0%;
            }
        </style>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
            
            <!-- Favicon -->
            <link rel="shortcut icon" href="{{ asset('image/logo/norsu.png') }}">
            <link rel="icon" type="image/png" href="{{ asset('image/logo/norsulogo.png') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
        <!-- Custom styles for this page -->
        {{-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
        
        
        
        <link rel="stylesheet" type="text/css" href="{{ asset('toast/toast.css') }}">
        
        
        <!-- for Select2 -->
        <link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" />
        
        {{-- for print --}}
        <link href="{{ asset('datatable/buttons.dataTables.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('datatable/jquery.dataTables.min.css') }}" rel="stylesheet" />

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        
        @if(Route::current()->getName()=="editprofileform"||Route::current()->getName()=="passwordupdate")
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @endif
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
    
            <!-- Sidebar -->
            @include('layouts.shared.main_nav')
            <!-- End of Sidebar -->
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
    
                    <!-- Topbar -->
                    @include('layouts.shared.header')
                    <!-- End of Topbar -->
    
                    <!-- Begin Page Content -->
                    {{-- @include('layouts.shared.page_content') --}}
                    <main>
                        {{ $slot }}
                    </main>
                    <!-- /.container-fluid -->
    
                </div>
                <!-- End of Main Content -->
                
                <!-- Footer -->
                @include('layouts.shared.footer')
                <!-- End of Footer -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                    <!-- Log Out -->
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        
                        <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}"
                        @click.prevent="$root.submit();" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                        </a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
        @stack('modals')
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            
            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            
            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
            
            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>
            
            <!-- Page level custom scripts -->
            {{-- <script src="js/demo/chart-area-demo.js"></script> --}}
            {{-- <script src="js/demo/chart-pie-demo.js"></script> --}}
            
            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            {{-- <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}
            
            {{-- for print --}}
            {{-- {{-- <script src="datatable/jquery-3.5.1.js"></script> --}}
            <script src="datatable/jquery.dataTables.min.js"></script>
            <script src="datatable/dataTables.buttons.min.js"></script>
            <script src="datatable/jszip.min.js"></script>
            <script src="datatable/pdfmake.min.js"></script>
            <script src="datatable/vfs_fonts.js"></script>
            <script src="datatable/buttons.html5.min.js"></script>
            <script src="datatable/buttons.print.min.js"></script>
            
            <!--toast -->
            <script type="text/javascript" src="toast/toast.js"></script>
            <!--sweet alert -->
            <script type="text/javascript" src="swal/sweetalert.js"></script>
            <!--select2 -->
            

            <script>
                function myFunction() {
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myUL");
                    li = ul.getElementsByTagName("li");
                    for (i = 0; i < li.length; i++) {
                        a = li[i].getElementsByTagName("a")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
                </script>
            
            
        @livewireScripts
        
        @stack('chat-table-scripts')
        
        {{-- admin scripts --}}
        @stack('admin-table-scripts')
        @stack('spmo-table-scripts')
        @stack('user-table-scripts')
        @stack('budgetallocation-table-scripts')
        @stack('budgetutilization-table-scripts')
        @stack('admin-submitted-purchase-request-table-scripts')
        @stack('admin-approve-purchase-request-table-scripts')
        
        {{-- spmo scripts --}}
        @stack('home-table-scripts')
        @stack('submmitedpurchaserequest-table-scripts')
        @stack('approve-purchase-request-table-scripts')
        @stack('completely-delevered-table-scripts')
        @stack('user-approve-purchase-request-table-scripts')
        @stack('procurement-report-table-scripts')
        
    </body>
</html>
