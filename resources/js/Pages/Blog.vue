<template>
    <div class="bg-gray-900 flex flex-row">

        <div class="min-w-nav">
            <navbar></navbar>
        </div>

        <div class="w-full">
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
            <div class="mt-14">
                <div class="flex flex-row justify-between px-44">
                    <p class="text-white text-xl font-semibold">Newly published</p>
                    <div class="flex flex-row" v-if="auth">
                        <inertia-link :href="route('createblog')" class="text-white text-xl font-semibold">
                            Write new blog
                        </inertia-link>
                        <svg class="h-5 w-5 text-white fill-current my-auto ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-10 px-44 mt-5">
                <div class="bg-black rounded" v-for="(post, index) in posts" :class="{ 'col-span-2' : index == 0}">
                    <div class="w-full">
                        <div class="h-44 w-full bg-cover bg-center" :style="{ 'background-image':'url('+post.image_url+')'}"></div>
                        <div class="px-4 py-3 h-full">
                            <div class="flex text-white justify-between">
                                <div class="flex flex-row">
                                    <div class="flex flex-row items-center pl-2">
                                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M10.075 9.81223C11.433 8.95923 12.317 7.30523 12.317 5.77523C12.317 3.59423 10.522 1.15723 8.11899 1.15723C5.71599 1.15723 3.92099 3.59423 3.92099 5.77523C3.92099 7.30523 4.80499 8.96023 6.16299 9.81223C2.94099 10.6772 0.562988 13.6192 0.562988 17.1102C0.562988 17.3402 0.751988 17.5302 0.982988 17.5302H15.256C15.486 17.5302 15.676 17.3412 15.676 17.1102C15.676 13.6192 13.297 10.6772 10.075 9.81223ZM4.76099 5.77523C4.76099 3.61323 6.53399 1.99723 8.11899 1.99723C9.70399 1.99723 11.478 3.61323 11.478 5.77523C11.478 7.93723 9.70399 9.55323 8.11899 9.55323C6.53399 9.55323 4.76099 7.93723 4.76099 5.77523ZM1.41499 16.6902C1.63299 13.1802 4.55699 10.3932 8.11899 10.3932C11.681 10.3932 14.605 13.1802 14.824 16.6902H1.41499Z"
                                                fill="black" stroke="white"/>
                                        </svg>
                                        <p v-text="post.users.name" class="font-extralight"></p>
                                    </div>
                                    <div class="flex flex-row items-center pl-2">
                                        <svg width="20" height="20" viewBox="0 0 30 30" fill="none">
                                            <path
                                                d="M10 8.75V3.75V8.75ZM20 8.75V3.75V8.75ZM8.75 13.75H21.25H8.75ZM6.25 26.25H23.75C24.413 26.25 25.0489 25.9866 25.5178 25.5178C25.9866 25.0489 26.25 24.413 26.25 23.75V8.75C26.25 8.08696 25.9866 7.45107 25.5178 6.98223C25.0489 6.51339 24.413 6.25 23.75 6.25H6.25C5.58696 6.25 4.95107 6.51339 4.48223 6.98223C4.01339 7.45107 3.75 8.08696 3.75 8.75V23.75C3.75 24.413 4.01339 25.0489 4.48223 25.5178C4.95107 25.9866 5.58696 26.25 6.25 26.25Z"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                        <p v-text="post.created_at" class="ml-1 font-extralight"></p>
                                    </div>
                                </div>
                                <div class="flex flex-row" v-if="post.user_id == $page.props.auth.user.id">
                                    <inertia-link :href="route('editBlog')" class="hover:bg-gray-700 mx-1 rounded flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M17.414 2.58606C17.0389 2.21112 16.5303 2.00049 16 2.00049C15.4697 2.00049 14.9611 2.21112 14.586 2.58606L7 10.1721V13.0001H9.828L17.414 5.41406C17.7889 5.03901 17.9996 4.53039 17.9996 4.00006C17.9996 3.46973 17.7889 2.96112 17.414 2.58606Z"
                                                fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M2 6C2 5.46957 2.21071 4.96086 2.58579 4.58579C2.96086 4.21071 3.46957 4 4 4H8C8.26522 4 8.51957 4.10536 8.70711 4.29289C8.89464 4.48043 9 4.73478 9 5C9 5.26522 8.89464 5.51957 8.70711 5.70711C8.51957 5.89464 8.26522 6 8 6H4V16H14V12C14 11.7348 14.1054 11.4804 14.2929 11.2929C14.4804 11.1054 14.7348 11 15 11C15.2652 11 15.5196 11.1054 15.7071 11.2929C15.8946 11.4804 16 11.7348 16 12V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H4C3.46957 18 2.96086 17.7893 2.58579 17.4142C2.21071 17.0391 2 16.5304 2 16V6Z"
                                                  fill="white"/>
                                        </svg>
                                    </inertia-link>
                                    <inertia-link :href="'#'" @click="destroy(post.id)" class="hover:bg-gray-700 mx-1 rounded flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M9 2C8.81434 2.0001 8.63237 2.05188 8.47447 2.14955C8.31658 2.24722 8.18899 2.38692 8.106 2.553L7.382 4H4C3.73478 4 3.48043 4.10536 3.29289 4.29289C3.10536 4.48043 3 4.73478 3 5C3 5.26522 3.10536 5.51957 3.29289 5.70711C3.48043 5.89464 3.73478 6 4 6V16C4 16.5304 4.21071 17.0391 4.58579 17.4142C4.96086 17.7893 5.46957 18 6 18H14C14.5304 18 15.0391 17.7893 15.4142 17.4142C15.7893 17.0391 16 16.5304 16 16V6C16.2652 6 16.5196 5.89464 16.7071 5.70711C16.8946 5.51957 17 5.26522 17 5C17 4.73478 16.8946 4.48043 16.7071 4.29289C16.5196 4.10536 16.2652 4 16 4H12.618L11.894 2.553C11.811 2.38692 11.6834 2.24722 11.5255 2.14955C11.3676 2.05188 11.1857 2.0001 11 2H9ZM7 8C7 7.73478 7.10536 7.48043 7.29289 7.29289C7.48043 7.10536 7.73478 7 8 7C8.26522 7 8.51957 7.10536 8.70711 7.29289C8.89464 7.48043 9 7.73478 9 8V14C9 14.2652 8.89464 14.5196 8.70711 14.7071C8.51957 14.8946 8.26522 15 8 15C7.73478 15 7.48043 14.8946 7.29289 14.7071C7.10536 14.5196 7 14.2652 7 14V8ZM12 7C11.7348 7 11.4804 7.10536 11.2929 7.29289C11.1054 7.48043 11 7.73478 11 8V14C11 14.2652 11.1054 14.5196 11.2929 14.7071C11.4804 14.8946 11.7348 15 12 15C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V8C13 7.73478 12.8946 7.48043 12.7071 7.29289C12.5196 7.10536 12.2652 7 12 7Z"
                                                  fill="white"/>
                                        </svg>
                                    </inertia-link>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between h-44">
                                <p v-text="post.title" class="text-white text-xl font-poppins py-2"></p>
                                <p v-text="post.body.replace(/(<([^>]+)>)/gi, '').slice(0,100)+' ...'" class="text-white text-base text-gray-400"></p>
                                <p class="text-white uppercase font-semibold text-center">read more</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
import navbar from "@/Components/navbar";
import SearchBar from "@/Components/SearchBar";
import { Inertia } from '@inertiajs/inertia'

export default {
    components:{
        navbar,
        SearchBar,
    },
    props:{
        posts: Object,
        auth: Object,
    },
    methods:{
        destroy(id){
            this.$inertia.delete('/blog/delete/'+id)
        },
        edit(id){
            this.$inertia.get('/blog/edit/'+id)
        }
    }
}
</script>
