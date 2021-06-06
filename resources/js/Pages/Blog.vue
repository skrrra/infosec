<template>
    <div class="bg-gray-900 flex flex-row h-screen">

        <div class="min-w-nav">
            <navbar></navbar>
        </div>

        <div class="flex flex-col w-full">
            <div class="flex justify-between w-full px-44">
                <div class="">
                    <p class="text-center mt-5 mx-auto text-white font-semibold text-4xl cursor-default">Blog</p>
                </div>
                <div class="w-full">
                    <SearchBar class="mx-auto mt-5"></SearchBar>
                </div>
                <div class="">
                    <a href="https://discord.gg/" target="_blank">
                        <svg width="45" height="45" viewBox="0 0 43 34" fill="none" class="transform hover:rotate-360 transition duration-300 fill-current text-yellow-dark mx-auto mt-5 py-1 px-1 bg-gray-700 rounded-full">
                            <path d="M39.7964 14.4571C38.123 8.70739 36.2357 5.73655 36.2053 5.68326C36.0977 5.55195 33.4309 2.36054 27.0033 0L26.1539 2.31242C29.2118 3.43546 31.3811 4.80551 32.5742 5.69073C29.0123 4.62706 24.775 3.97563 21.022 3.97563C17.2691 3.97563 13.0318 4.62706 9.46985 5.69073C10.6628 4.80559 12.8322 3.43546 15.89 2.31242L15.0407 0C8.61328 2.36054 5.94644 5.55195 5.83887 5.68326C5.8084 5.73655 3.9211 8.70739 2.24771 14.4571C0.634931 19.998 0.0222538 27.8147 0 28.1281C0.143705 28.3528 3.44893 33.9959 12.4566 33.9959L14.7398 30.6897C12.1819 30.0105 9.74273 28.9152 7.50996 27.429L8.87499 25.3783C12.4771 27.7759 16.6775 29.0433 21.022 29.0433C25.3666 29.0433 29.567 27.7759 33.1691 25.3783L34.5341 27.429C32.3014 28.9152 29.8622 30.0105 27.3042 30.6897L29.5874 33.9959C38.5951 33.9959 41.9004 28.3528 42.0441 28.1281C42.0218 27.8147 41.4091 19.998 39.7964 14.4571ZM15.3265 20.9018H12.863V16.7959H15.3265V20.9018ZM29.181 20.9018H26.7175V16.7959H29.181V20.9018Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="mt-14 px-44">
                <div class="flex flex-row">
                    <inertia-link :href="route('createblog')" class="text-white text-xl font-semibold">
                        Write new blog
                    </inertia-link>
                    <svg class="h-5 w-5 text-white fill-current my-auto ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import navbar from "@/Components/navbar";
    import SearchBar from "@/Components/SearchBar";
    export default {
        components:{
            navbar,
            SearchBar,
        }
    }
</script>
