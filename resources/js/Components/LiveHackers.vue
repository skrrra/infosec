<template>
    <div class="flex flex-col w-full justify-center mt-10">
        <div class="flex flex-row justify-between w-full">
            <div class="flex flex-row max-w-sm">
                <p class="text-white ml-36 font-poppins text-2xl">Live hackers</p>
                <span class="flex h-3 w-3 ml-2">
                    <span class="relative animate-ping inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="absolute inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                </span>
            </div>
            <inertia-link :href="route('hackers')" class="text-yellow-dark mr-36 font-poppins text-lg my-auto hover:underline">View hackers</inertia-link>
        </div>
        <div class="grid grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4 mx-36 mt-3">
            <div v-for="liveChannel in liveChannels">
                <div class="rounded mt-3 flex flex-row cursor-default text-base hover:bg-gray-800" v-if="liveChannel.type">
                    <img :src="liveChannel.profile_image_url" alt="avatar" class="h-28 rounded-l bg-gray-input">
                    <div class="flex flex-col w-full mx-2 justify-between">

                        <p class="text-white font-poppins text-lg mt-1 tracking-wide leading-none"
                           v-text="liveChannel.user_name"></p>

                        <div class="text-sm text-gray-200 xl:w-48 2xl:w-52">
                            <p class="font-poppins font-light tracking-wide leading-none text-gray-200 my-auto"
                               :title="liveChannel.title" v-if="liveChannel.title.length > 37" v-text="liveChannel.title.slice(0,37) + ' [...]'"></p>
                            <p class="font-poppins font-light tracking-wide leading-none text-gray-200 my-auto"
                               :title="liveChannel.title" v-if="liveChannel.title.length <= 37" v-text="liveChannel.title"></p>
                        </div>

                        <div class="flex flex-row justify-between">
<!--                            <a :href="'https://twitch.tv/'+liveChannel.user_login" target="_blank" class="uppercase text-red-400 font-bold hover:text-red-600 transition duration-200">-->
<!--                                watch-->
<!--                            </a>-->
                            <p class="text-white text-xs uppercase" v-text="liveChannel.game_name"></p>

                            <div class="flex flex-row my-auto">

                                <svg width="15px" height="15px" fill="white" viewBox="0 0 20 20" x="0px" y="0px"
                                     class="text-center text-red-400 my-auto fill-current">
                                    <g>
                                        <path fill-rule="evenodd"
                                              d="M5 7a5 5 0 116.192 4.857A2 2 0 0013 13h1a3 3 0 013 3v2h-2v-2a1 1 0 00-1-1h-1a3.99 3.99 0 01-3-1.354A3.99 3.99 0 017 15H6a1 1 0 00-1 1v2H3v-2a3 3 0 013-3h1a2 2 0 001.808-1.143A5.002 5.002 0 015 7zm5 3a3 3 0 110-6 3 3 0 010 6z"
                                              clip-rule="evenodd"></path>
                                    </g>
                                </svg>

                                <span v-text="liveChannel.viewer_count"
                                      class="text-white text-sm font-poppins text-center text-red-400 pr-2"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['liveChannels'],
    computed:{
    }
}
</script>

