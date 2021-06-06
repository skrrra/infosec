<template>
    <div class="flex flex-col mt-20">
        <div class="flex flex-row px-36">
            <img src="https://media4.giphy.com/media/f8hd7QP9LT31Rk2NG1/giphy_s.gif" alt="avatar" class="w-24 h-24 rounded-full">
            <p class="text-white font-poppins text-4xl my-auto ml-4 capitalize">{{ user.name }}</p>
        </div>
    </div>
    <ChangePassword></ChangePassword>
</template>

<script>
    import ChangePassword from "@/Components/MyProfile/ChangePassword";
    import { computed } from "vue"
    import { usePage } from '@inertiajs/inertia-vue3'
    export default {
        components:{
            ChangePassword,
        },
        setup(){
            const user = computed(() => usePage().props.value.auth.user)
            return { user }
        }
    }
</script>

