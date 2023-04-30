            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('js/scripts.bundle.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="{{ asset("plugins/nepali-date-picker/js/nepali.datepicker.v4.0.min.js") }}" ></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    {{-- <script src="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('js/widgets.bundle.js')}}"></script>
    <script src="{{asset('js/custom/widgets.js')}}"></script>
    <script src="{{asset('js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('js/custom/utilities/modals/new-target.js')}}"></script>
    <script src="{{asset('js/custom/utilities/modals/users-search.js')}}"></script> --}}

    <script>
        function convertCurrency(amount) {
            return Intl.NumberFormat("en-IN").format(amount);
        }
    </script>
    @yield('scripts')
</body>
</html>
