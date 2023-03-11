<script setup>
import MainNavLayout from '@/Layouts/MainNavLayout.vue';
import { ref } from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import Magnify from 'vue-material-design-icons/Magnify.vue'
import Home from 'vue-material-design-icons/Home.vue'
import HomeOutline from 'vue-material-design-icons/HomeOutline.vue'
import TelevisionPlay from 'vue-material-design-icons/TelevisionPlay.vue'
import StorefrontOutline from 'vue-material-design-icons/StorefrontOutline.vue'
import AccountGroup from 'vue-material-design-icons/AccountGroup.vue'
import ControllerClassicOutline from 'vue-material-design-icons/ControllerClassicOutline.vue'
import DotsGrid from 'vue-material-design-icons/DotsGrid.vue'
import FacebookMessenger from 'vue-material-design-icons/FacebookMessenger.vue'
import Bell from 'vue-material-design-icons/Bell.vue'
import Logout from 'vue-material-design-icons/Logout.vue'

import { useGeneralStore } from '@/stores/jeneral';
import { storeToRefs } from 'pinia';
import CreatePostBox from '@/Components/CreatePostBox.vue';
import Post from '@/Components/Post.vue';

const useGeneral=useGeneralStore();
const {isPostOverlay, isCropperModal,isImageDisplay}=storeToRefs(useGeneral);

const user=usePage().props.auth.user
defineProps({
    posts:Object
})
let showMenu=ref(false);

</script>

<template>
    <Head title="Posts" />
    
    <MainNavLayout >

        <div class="fixed w-full h-[100%] bg-[#F1F2F5]">
            <div class="grid grid-rows-3 grid-flow-col w-full max-w-[1600px] mt-[56px] h-[calc(100%-56px)] mx-auto px-4">
                <div id="LeftSection" class="xl:w-[345px] lg:block hidden">
                    <div class="pt-4 max-w-[320px] pr-4">
                        <Link href="#" class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] p-2 rounded-md">
                            <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="data:image/jpeg;base64,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" alt="Endaweke">
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Endawke Ekuahone</div>
                        </Link>
                        <button class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                            <AccountMultiple :size="40" fillColor="#5BD7C6"/>
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Friends</div>
                        </button>
                        <button class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                            <Flag :size="40" fillColor="#F2682C"/>
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Pages</div>
                        </button>
                        <button class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                            <ClockTimeTwoOutline :size="40" fillColor="#21AAFA"/>
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Most Recent</div>
                        </button>
                        <button class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                            <AccountGroup :size="40" fillColor="#20A9FD"/>
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Groups</div>
                        </button>
                        <button class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                            <StorefrontOutline :size="40" fillColor="#48C0D8"/>
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Marketplace</div>
                        </button>
                        <button class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                            <TelevisionPlay :size="40" fillColor="#9739CF"/>
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Watch</div>
                        </button>
                        <button class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                            <Restore :size="40" fillColor="#32B4D0"/>
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Memories</div>
                        </button>
                    </div>
                </div>

                <div id="PostsSection" class="row-span-6 max-w-[600px] lg:mx-0 mx-auto overflow-auto">
<h1>Posts Section</h1>
                    <CreatePostBox
                        
                        :placeholder="'What\'s on your mind '"
                    />
                    <div v-for="post in posts.data" :key="post">
                        <Post :user="post.user" :post="post" :comments="post.comments" />
                    </div>
<!-- 
                    <div v-for="post in posts.data" :key="post">
                        <Post :user="post.user" :post="post" :comments="post.comments" />
                    </div> -->

                </div>

                <div id="RightSection" class="pl-4 md:block hidden">
                    <div class="max-w-[340px] min-w-[250px] mx-auto pt-4">
                        <div class="flex items-center justify-between border-b border-b-gray-300">
                            <div class="font-semibold">Contacts</div>
                            <div class="flex items-center">
                                <div class="p-2 hover:bg-gray-300 rounded-full cursor-pointer">
                                    <VideoImage :size="23" fillColor="#050505"/>
                                </div>
                                <div class="p-2 hover:bg-gray-300 rounded-full cursor-pointer">
                                    <Magnify :size="23" fillColor="#050505"/>
                                </div>
                                <div class="p-2 hover:bg-gray-300 rounded-full cursor-pointer">
                                    <DotsHorizontal :size="23" fillColor="#050505"/>
                                </div>
                            </div>
                        </div>
                        <div class="h-[calc(100vh-115px)] overflow-auto pt-2">
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/140/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Andrew Smith</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/141/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Wade Konopelski</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/142/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Thora Deckow</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/143/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Prof. Cooper Ratke</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/140/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Dennis Hackett</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/141/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Jodie Collins</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/142/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Alphonso Lindgren</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/143/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Barrett Fay Jr</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/140/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Andrew Smith</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/141/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Wade Konopelski</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/142/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Thora Deckow</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/143/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Prof. Cooper Ratke</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/140/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Dennis Hackett</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/141/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Jodie Collins</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/142/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Alphonso Lindgren</div>
                            </div>
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" src="https://picsum.photos/id/143/300/320">
                                <div class="text-[15px] text-gray-800 font-extrabold pl-3">Barrett Fay Jr</div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </MainNavLayout>
  
</template>
