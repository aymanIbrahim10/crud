<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <Link :href="route('posts.index')" :class="{ 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out mr-5': $page.component === 'Posts/Index' }">Posts</Link>
            <Link :href="route('about')" :class="{ 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out ml-5'
            : $page.component === 'About' }">About</Link>
            <div v-if="$page.props.flash.message" class="text-blue-600">
                {{ $page.props.flash.message }}
            </div>
                    <slot />
        </div>
            </div>
            </div>
            </div>
</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
  export default {
    components: {
        Link
    },
}
</script>
