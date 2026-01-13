<header class="w-full bg-blue-500 text-white">
    <div class="container mx-auto  py-2 px-4 flex items-center justify-between">
        <div class="flex md:w-3/12 justify-start items-center px-4">
            <a href="<?php echo get_bloginfo('home'); ?>">
                <img src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" class="w-48 md:w-full" alt="">
            </a>
        </div>
        <div class="block md:flex md:w-6/12 justify-center md:flex fixed md:relative top-0 md:top-auto h-screen md:h-auto w-full md:bg-none pt-20 md:pt-0 px-4 md:px-0 z-50 md:z-auto text-center md:text-left text-xl md:text-base transition-all md:transition-none duration-300 ease-in-out -left-full md:!left-0" id="menu-search-bar">

            <div class="button-close absolute block md:hidden top-0 right-0 px-4 py-2 my-2 mx-4 text-3xl bg-red-700 hover:bg-red-900 rounded-md text-white hover:text-yellow-300 transition-colors" id="search-menu-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div id="header-search" class="w-full relative" data-search-controller-url="/pesquisa">
                <form method="post" id="search-form" action="">
                    <button type="submit" class="bg-none border-none absolute right-0 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-700" viewBox="0 0 24.88 24.879">
                            <path id="search" d="M65.506,55.827a10.137,10.137,0,1,1,1.277-1.283c.067.07.135.145.206.217q3.186,3.188,6.376,6.372a.962.962,0,0,1,.324,1.008.913.913,0,0,1-1.46.455A3.068,3.068,0,0,1,72,62.376q-3.156-3.156-6.312-6.314A2.628,2.628,0,0,1,65.506,55.827Zm1.773-7.761a8.3,8.3,0,1,0-8.312,8.286,8.415,8.415,0,0,0,7.462-4.642A7.944,7.944,0,0,0,67.279,48.067Z" transform="translate(-48.85 -37.926)" />
                        </svg>
                    </button>
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible">
                    </span>
                    <input class="border-gray bg-white text-black font-bold border w-full py-3 px-5 shadow-md rounded-lg ui-autocomplete-input" name="s" placeholder="FAÇA A SUA BUSCA" type="text" autocomplete="off" id="search-input">
                    <input type="hidden" name="controller" class="focus-visible:ring focus-visible:ring" value="search">
                </form>
                <div class="absolute z-30 hidden w-full" id="search-area">
                    <div class="py-2 w-full h-full md:h-auto">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="px-3 py-1 space-y-6 text-black">
                                <div class="header-search-autosuggest active">
                                    <div class="content-autosuggest text-xs font-reading" id="search-insert">
                                        <div class="m-2">
                                            <div class="w-full p-3 text-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 m-4 fill-red-700 inline-block" viewBox="0 0 24.88 24.879">
                                                    <path id="search" d="M65.506,55.827a10.137,10.137,0,1,1,1.277-1.283c.067.07.135.145.206.217q3.186,3.188,6.376,6.372a.962.962,0,0,1,.324,1.008.913.913,0,0,1-1.46.455A3.068,3.068,0,0,1,72,62.376q-3.156-3.156-6.312-6.314A2.628,2.628,0,0,1,65.506,55.827Zm1.773-7.761a8.3,8.3,0,1,0-8.312,8.286,8.415,8.415,0,0,0,7.462-4.642A7.944,7.944,0,0,0,67.279,48.067Z" transform="translate(-48.85 -37.926)" />
                                                </svg>
                                                <h1 class="text-xl text-red-700 font-medium uppercase pb-2">O QUE ESTÁ PROCURANDO?</h1>
                                                <div class="text-base text-gray-700 font-bold uppercase pb-2">DIGITE ALGO E NÓS ACHAMOS PRA VOCÊ!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex items-center md:w-3/12 justify-end md:text-sm lg:text-base gap-x-2 px-2">
            <div id="mx-2 relative _desktop_cart">
                <div class=" bg-red-700 hover:bg-red-800 px-2 py-1 rounded-l-3xl rounded-r-lg hidden md:block relative active">
                    <a class=" justify-center items-center hidden md:flex" href="https://www.redeconomia.com.br/clube-redeconomia/" target="_blank">
                        <div class="bg-white p-2 rounded-full">
                            <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" class="md:w-4 xl:w-5" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 48" style="enable-background:new 0 0 36 48;" xml:space="preserve">
                                <g class="st0">
                                    <path class="st1 fill-red-700" d="M32.2,7V41c0,3.1-2.5,5.7-5.7,5.7h-17c-3.1,0-5.7-2.5-5.7-5.7V7c0-3.1,2.5-5.7,5.7-5.7h17 C29.6,1.3,32.2,3.8,32.2,7z M29.4,7c0-1.6-1.3-2.8-2.8-2.8h-17C7.9,4.1,6.7,5.4,6.7,7v22.7h22.7V7z M29.4,32.5H6.7V41 c0,1.6,1.3,2.8,2.8,2.8h17c1.6,0,2.8-1.3,2.8-2.8V32.5z M15.9,38.2c0-1.2,0.9-2.1,2.1-2.1s2.1,0.9,2.1,2.1s-0.9,2.1-2.1,2.1 C16.8,40.3,15.9,39.4,15.9,38.2z" />
                                </g>
                            </svg>
                        </div>
                        <div class="text-sm xl:text-base text-white font-medium mx-1 xl:mx-2 uppercase">
                            Baixe o App
                        </div>
                    </a>
                </div>
            </div>
            <div id="mx-2 relative _desktop_cart">
                <div class=" bg-red-700 hover:bg-red-800 px-2 py-1 rounded-l-3xl rounded-r-lg hidden md:block relative active">
                    <a class=" justify-center items-center hidden md:flex" href="https://linktr.ee/superpax" target="_blank">
                        <div class="bg-white p-2 rounded-full">
                            <svg viewBox="0 -0.35492335728912394 1004 566.9724898595939" class="md:w-4 xl:w-5 my-2" xmlns="http://www.w3.org/2000/svg"><g fill="#ea1d2c"><path class="st1 fill-red-700" d="M0 304.6h76.41l42.46-211.2H42.45zM46.66 68.21h76.73L136 5.02H59.3zm59.47 295.82h76.42l46.69-228.18h57.31L295 93.4h-56.21l2.13-9.55c3.18-18 9.55-38.21 38.2-38.21 17 0 32.91 1.06 48.82 8.49l8.5-44.57A167.8 167.8 0 0 0 281.25 0c-61.56 0-104 36.09-119.93 93.4h-26.53l-8.49 42.45h26.53z"/><path class="st1 fill-red-700" d="M348.11 308.85c90.21 0 152.83-81.73 152.83-148.59 0-49.88-45.64-71.11-90.21-71.11-98.73 0-152.83 88.14-152.83 148.59 0 49.88 46.7 71.11 90.21 71.11m242 0c90.21 0 152.83-81.73 152.83-148.59 0-49.88-46.7-71.11-91.28-71.11-98.7 0-152.82 88.09-152.82 148.59 0 49.88 47.76 71.11 91.27 71.11m277-4.25h75.35L1004 4.29h-76.41l-18.05 89.15-31.84-3.18c-74.29 0-142.21 95.51-142.21 163.44 0 27.59 18 55.19 48.82 55.19 43.51 0 74.29-21.23 87-42.46h4.24zM631.48 462.74a295 295 0 0 1-212.26 66.86c-100.83-6.37-173-83.85-185.73-165.57h4.24c23.35 51 79.6 98.71 148.59 106.13 70 8.49 153.89-23.34 199.52-66.86l-50.94-39.27h153.89l-34 163.45-22.29-63.68z"/></g></svg>
                        </div>
                        <div class="text-sm xl:text-base text-white font-medium mx-1 xl:mx-2 uppercase">
                            Peça Já
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex md:hidden px-4 justify-start items-center">
            <a id="store-menu" href="https://clube.redeconomia.com.br/" target="_blank" class="mx-2 mb-2">
                <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" class="w-6 fill-white" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.8 27.8" style="enable-background:new 0 0 31.8 27.8;" xml:space="preserve">
                    <g>
                        <path class="st0" d="M4.8,1.1c0.4,0,0.7,0.3,0.8,0.6l0.2,1h22.9c1.1,0,1.9,1,1.6,2.1l-2.8,9.9c-0.2,0.7-0.9,1.2-1.6,1.2H8.9 l0.8,3.3h16.7c0.5,0,0.8,0.4,0.8,0.8c0,0.5-0.4,0.8-0.8,0.8H8.9c-0.4,0-0.7-0.3-0.8-0.6l-4-17.6H1.5C1,2.7,0.7,2.4,0.7,1.9 c0-0.5,0.4-0.8,0.8-0.8H4.8z M6.2,4.4l2.2,9.9h17.5l2.8-9.9H6.2z M7.3,24.7c0-1.6,1.3-2.9,2.9-2.9c1.6,0,2.9,1.3,2.9,2.9 s-1.3,2.9-2.9,2.9C8.6,27.6,7.3,26.3,7.3,24.7z M10.2,25.9c0.7,0,1.2-0.6,1.2-1.2s-0.6-1.2-1.2-1.2c-0.7,0-1.2,0.6-1.2,1.2 S9.5,25.9,10.2,25.9z M27.2,24.7c0,1.6-1.3,2.9-2.9,2.9s-2.9-1.3-2.9-2.9s1.3-2.9,2.9-2.9S27.2,23.1,27.2,24.7z M24.3,23.4 c-0.7,0-1.2,0.6-1.2,1.2s0.6,1.2,1.2,1.2s1.2-0.6,1.2-1.2S25,23.4,24.3,23.4z" fill="#fff" />
                    </g>
                </svg>
            </a>
            <a id="search-menu" class="mx-4 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 fill-white" viewBox="0 0 24.88 24.879">
                    <path id="search" d="M65.506,55.827a10.137,10.137,0,1,1,1.277-1.283c.067.07.135.145.206.217q3.186,3.188,6.376,6.372a.962.962,0,0,1,.324,1.008.913.913,0,0,1-1.46.455A3.068,3.068,0,0,1,72,62.376q-3.156-3.156-6.312-6.314A2.628,2.628,0,0,1,65.506,55.827Zm1.773-7.761a8.3,8.3,0,1,0-8.312,8.286,8.415,8.415,0,0,0,7.462-4.642A7.944,7.944,0,0,0,67.279,48.067Z" transform="translate(-48.85 -37.926)" />
                </svg>
            </a>
            <a id="mobile-menu-hamburger">
                <div class="hamburger hamburger--squeeze">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="bg-white menu js-top-menu hidden md:block" id="_desktop_top_menu">
        <nav>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menumobile',
                    'menu_class' => 'z-10 top-menu flex justify-between items-center text-xs lg:text-lg',
                    'menu_id' => 'header-nav',
                    'container_class' => 'container mx-auto px-4 py-2 uppercase',
                    'container_id' => 'menu-principal-header',
                    'walker' => new OrganizacaoMenuPrincipal()
                )
            );
            ?>
        </nav>
    </div>
</header>
<?php get_template_part('templates/header/part', 'header-bar'); ?>