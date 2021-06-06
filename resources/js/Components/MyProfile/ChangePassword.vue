<template>
    <div class="px-36 mt-10 max-w-2xl">
        <div class="bg-gray-800 py-2 rounded-t flex flex-row justify-between cursor-pointer px-3 my-auto"
             :class="{'rounded':!changePasswordToggle}"
             @click="changePasswordToggle = !changePasswordToggle; changeEmailToggle = false">
            <p class="text-gray-400 my-auto h-full">Change password</p>
            <svg class="h-7 w-7 text-white transition duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'-rotate-90':changePasswordToggle}">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </div>

        <div class="bg-gray-800 rounded-b" :class="{'hidden':!changePasswordToggle}">
            <form @submit.prevent="changePassword" class="flex flex-col mx-3 rounded">
                <!--current password-->
                <div class="w-full flex flex-row my-2">
                    <input class="rounded bg-gray-600 border-none focus:outline-none text-gray-300 placeholder-gray-300 w-full pr-10"
                           :type="showCurrentPassword ? 'text' : 'password'"
                           placeholder="Current password"
                           v-model="updatePassword.currentPassword">
                    <div class="relative mt-2">
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="showCurrentPassword=!showCurrentPassword"
                             :class="{'hidden':showCurrentPassword}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="showCurrentPassword=!showCurrentPassword"
                             :class="{'hidden':!showCurrentPassword}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                            <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                        </svg>
                    </div>
                </div>
                <!--new password-->
                <div class="w-full flex flex-row my-2">
                    <input class="rounded bg-gray-600 border-none focus:outline-none text-gray-300 placeholder-gray-300 w-full pr-10"
                           :type="showNewPassword ? 'text' : 'password'"
                           placeholder="New password"
                           v-model="updatePassword.newPassword">
                    <p v-text="updatePassword.newPassword"></p>
                    <div class="relative mt-2">
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="showNewPassword=!showNewPassword"
                             :class="{'hidden':showNewPassword}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="showNewPassword=!showNewPassword"
                             :class="{'hidden':!showNewPassword}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                            <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                        </svg>
                    </div>
                </div>
                <!--confirm new password-->
                <div class="w-full flex flex-row my-2">
                    <input class="rounded bg-gray-600 border-none focus:outline-none text-gray-300 placeholder-gray-300 w-full pr-10"
                            :type="newPassword_confirmation ? 'text' : 'password'"
                            placeholder="Confirm new password"
                            v-model="updatePassword.newPassword_confirmation">
                    <div class="relative mt-2">
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="newPassword_confirmation=!newPassword_confirmation"
                             :class="{'hidden':newPassword_confirmation}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="newPassword_confirmation=!newPassword_confirmation"
                             :class="{'hidden':!newPassword_confirmation}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                            <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                        </svg>
                    </div>
                </div>

                <button class="uppercase py-4 text-white" type="submit">change password</button>
            </form>
        </div>
    </div>
    <div class="px-36 mt-10 max-w-2xl">
        <p v-text="status"></p>
        <div class="bg-gray-800 py-2 rounded-t flex flex-row justify-between cursor-pointer px-3 my-auto"
             :class="{'rounded':!changeEmailToggle}"
             @click="changeEmailToggle = !changeEmailToggle; changePasswordToggle = false">
            <p class="text-gray-400 my-auto h-full">Change Email</p>
            <svg class="h-7 w-7 text-white transition duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'-rotate-90':changeEmailToggle}">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </div>


        <div class="bg-gray-800 rounded-b" :class="{'hidden':!changeEmailToggle}">
            <form @submit.prevent="changeEmail" class="flex flex-col mx-3 rounded">
                <!--current email-->
                <div class="w-full flex flex-row my-2">
                    <input class="rounded bg-gray-600 border-none focus:outline-none text-gray-300 placeholder-gray-300 w-full pr-10"
                           type="text" disabled
                           :placeholder="currentEmail">
                </div>
                <!--new email-->
                <div class="w-full flex flex-row my-2">
                    <input class="rounded bg-gray-600 border-none focus:outline-none text-gray-300 placeholder-gray-300 w-full pr-10"
                           type="text" placeholder="New email"
                            v-model="updateEmail.newEmail">
                </div>
                <!--current password-->
                <div class="w-full flex flex-row my-2">
                    <input class="rounded bg-gray-600 border-none focus:outline-none text-gray-300 placeholder-gray-300 w-full pr-10"
                           :type="showCurrentPasswordEmail ? 'text' : 'password'"
                           placeholder="Current password"
                           v-model="updateEmail.newEmailPasswordConfirm">
                    <p>{{ updateEmail.newEmailPasswordConfirm }}</p>
                    <div class="relative mt-2">
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="showCurrentPasswordEmail=!showCurrentPasswordEmail"
                             :class="{'hidden':showCurrentPasswordEmail}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        <svg class="text-gray-300 absolute right-0 mr-2"
                             @click="showCurrentPasswordEmail=!showCurrentPasswordEmail"
                             :class="{'hidden':!showCurrentPasswordEmail}"
                             width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                            <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                        </svg>
                    </div>
                </div>
                <button class="uppercase py-4 text-white" type="submit">change email</button>
            </form>
        </div>
    </div>
</template>

<script>
import {usePage} from '@inertiajs/inertia-vue3'
import {computed, reactive} from "vue";

    export default {
        data(){
            return{
                changePasswordToggle: false,
                // toggle password show/hidden
                showCurrentPassword: false,
                showNewPassword: false,
                newPassword_confirmation: false,
                // error message if passwords does not match
                errorConfirm: '',
                // toggle changeEmail box
                changeEmailToggle: false,
                // toggle password show/hidden
                showCurrentPasswordEmail: false,
                // pulls current email from auth
                currentEmail: this.user.email,
            }
        },
        setup () {
            const updatePassword = reactive({
                currentPassword : '',
                newPassword : '',
                newPassword_confirmation : ''
            })
            const updateEmail = reactive({
                newEmail: '',
                newEmailPasswordConfirm: ''
            })
            const user = computed(() => usePage().props.value.auth.user)
            return { updateEmail, updatePassword, user }
        },
        methods: {
            changePassword() {
                this.$inertia.patch('/profile/password-update/' + this.user.id, this.updatePassword)
                // this.changePasswordToggle = false
            },
            changeEmail(){
                this.$inertia.patch('/profile/email-update/' + this.user.id, this.updateEmail)
            },
        },
    }
</script>
