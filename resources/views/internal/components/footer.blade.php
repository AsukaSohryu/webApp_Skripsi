
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>

<script src="{{ asset('/') }}assets/internal/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('/') }}assets/internal/js/scripts.bundle.js"></script>
<script src="{{ asset('/') }}assets/internal/js/widgets.bundle.js"></script>
<script src="{{ asset('/') }}assets/internal/js/custom/widgets.js"></script>
<script src="{{ asset('/') }}assets/internal/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="{{ asset('/') }}assets/internal/plugins/global/plugins.bundle.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="{{ asset('/') }}js/me/me.js"></script>
<script src="{{ asset('/') }}js/me/me-modal.js"></script>
<script src="{{ asset('/') }}js/form-data-json.min.js"></script>
<script src="{{ asset('/') }}js/me/loading-me.js"></script>
<script src="{{ asset('/') }}js/me/call-me.js"></script>
<script src="{{ asset('/') }}js/me/confirm-delete-me.js"></script>
@stack('js')
<script>

    // Function Menu Choose
    const tapParentMenu = (id, menu) => {

        showLoadingScreen()

        var menuItem = document.getElementsByClassName('menu-item');
        menuItem.forEach(element => {

            if(element.classList.contains('here') || element.classList.contains('here show') &&
            element.classList.contains('show') || element.classList.contains('here show')){
                element.classList.remove('here');
                element.classList.remove('show');
            }

        });

        if(!menu.parentElement.classList.contains('here show')){
            menu.parentElement.classList.add('here');
            menu.parentElement.classList.add('show');
        }

        var ktAppBody = document.getElementById('kt_app_body');
        if(id != 1){
            ktAppBody.setAttribute('data-kt-app-sidebar-secondary-collapse', 'off');
            checkSideBar('hide');
        }else {
            ktAppBody.setAttribute('data-kt-app-sidebar-secondary-collapse', 'on');
            checkSideBar('show');
        }

        subMenuAjax(id);


    }

    const subMenuAjax = (id) => {

        // Call Ajax for sub menu
        $.ajax({
            url     : `/setting/menus/sub-menus/${id}`,
            type    : 'GET',
            success : function(submenus){

                var sidebarSecondary = document.getElementById('kt_app_sidebar_secondary_menu_wrapper');
                sidebarSecondary.innerHTML = submenus;

                hideLoadingScreen()

            },
            erroor  : function(err){
                console.log(err);
            }
        });

    }

    const checkSideBar = (isOutpunt = "") => {

        var toggerSide = document.getElementById('kt_app_sidebar_secondary_toggle');
        var menuSubs = document.getElementsByClassName('menu-sub');

        if(isOutpunt == 'hide'){

            if(toggerSide.classList.contains('hidden')){
                toggerSide.classList.remove('hidden');
            }

        }

        if(isOutpunt == 'show'){

            if(!toggerSide.classList.contains('hidden')){
                toggerSide.classList.add('hidden');
            }

        }

        menuSubs.forEach(element => {

            if(!element.classList.contains('dont-hidden')){

                if(isOutpunt == 'hide'){

                    if(!element.classList.contains('hidden')){
                        element.classList.add('hidden');
                    }

                }else if(isOutpunt == 'show') {

                    if(element.classList.contains('hidden')){
                        element.classList.remove('hidden');
                    }

                }else if(isOutpunt == '') {

                    if(element.classList.contains('hidden')){
                        element.classList.remove('hidden');
                    }else{
                        element.classList.add('hidden');
                    }

                }


            }


        });

    }

    const tapSidebarToggle = () => {
        checkSideBar();
    }


</script>

{{-- GLOBAL SWEETALERT --}}
{{-- @include('internal.components.global-flash') --}}

</body>
</html>
