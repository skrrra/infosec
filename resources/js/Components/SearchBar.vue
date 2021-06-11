<template>
        <div class="w-full max-w-sm">
            <div class="flex flex-row">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" class="bg-gray-input ml-3 mt-2 absolute">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M9.739 1.5C5.196 1.5 1.5 5.195 1.5 9.738C1.5 14.281 5.196 17.977 9.739 17.977C14.281 17.977 17.977 14.281 17.977 9.738C17.977 5.195 14.281 1.5 9.739 1.5ZM9.739 19.477C4.369 19.477 0 15.108 0 9.738C0 4.368 4.369 0 9.739 0C15.109 0 19.477 4.368 19.477 9.738C19.477 15.108 15.109 19.477 9.739 19.477Z"
                          fill="#717171"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M19.5144 20.7217C19.3234 20.7217 19.1314 20.6487 18.9844 20.5027L15.4604 16.9887C15.1674 16.6957 15.1664 16.2207 15.4594 15.9277C15.7514 15.6327 16.2264 15.6347 16.5204 15.9257L20.0444 19.4407C20.3374 19.7337 20.3384 20.2077 20.0454 20.5007C19.8994 20.6487 19.7064 20.7217 19.5144 20.7217Z"
                          fill="#717171"/>
                </svg>
                <input type="text"
                       v-model="search"
                       @keyup="clearSearchToggle"
                       class="pl-10 bg-gray-700 w-full rounded-l max-w-sm text-gray-400 border-none focus:outline-none focus:text-white pr-10"
                       placeholder="Search hackers...">
                <div class="relative">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="h-full mr-2 my-auto absolute right-0" @click="clearSearch" :class="{ 'hidden' : !isActive }">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M6.804 0H17.208C21.276 0 24 2.856 24 7.104V16.9092C24 21.1452 21.276 24 17.208 24H6.804C2.736 24 0 21.1452 0 16.9092V7.104C0 2.856 2.736 0 6.804 0ZM15.612 15.6C16.02 15.1932 16.02 14.5332 15.612 14.1252L13.476 11.9892L15.612 9.85195C16.02 9.44515 16.02 8.77315 15.612 8.36515C15.204 7.95595 14.544 7.95595 14.124 8.36515L12 10.5L9.86401 8.36515C9.44401 7.95595 8.78401 7.95595 8.37601 8.36515C7.96801 8.77315 7.96801 9.44515 8.37601 9.85195L10.512 11.9892L8.37601 14.1132C7.96801 14.5332 7.96801 15.1932 8.37601 15.6C8.58001 15.804 8.85601 15.9132 9.12001 15.9132C9.39601 15.9132 9.66001 15.804 9.86401 15.6L12 13.4772L14.136 15.6C14.34 15.8172 14.604 15.9132 14.868 15.9132C15.144 15.9132 15.408 15.804 15.612 15.6Z"
                              fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return{
                isActive: false,
                search: '',
            }
        },
        methods:{
            clearSearchToggle(){
                this.isActive = this.search.length >= 1;
            },
            clearSearch(){
                this.search = ''
                this.isActive = false
            }
        }
    }
</script>
