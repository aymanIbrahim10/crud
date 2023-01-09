<template>
    <Head title="posts" />
    <AppLayout>
        <Link :href="route('posts.create')"
              v-if="permissions.posts_manage" class="inline-block px-4 py-3 bg-blue-500 text-white rounded mb-4">
            Add new post
        </Link>
     <table class="mt-4 min-w-full divide-y divide-gray-200 border">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Content</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created
                            at</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left" v-if="permissions.posts_manage">
                        <span
                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Delete</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <tr v-for="post in posts" :key="post.id">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ post.id }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ post.title }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ post.content }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ post.created_at }}
                    </td>
                    <td>
                        <Link v-if="permissions.posts_manage" :href="route('posts.edit', post.id)"  class="px-2 py-1 bg-blue-600 text-white rounded font-bold uppercase mr-2">
                            Edit
                        </Link>
                        <button v-if="permissions.posts_manage"  @click="destroy(post.id)" type="button" class="px-2 py-1 bg-red-600 text-white rounded font-bold uppercase">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </AppLayout>
</template>
<script>
import AppLayout from "../../Layouts/App.vue"
import { Head , Link} from '@inertiajs/inertia-vue3'
import {Inertia} from "@inertiajs/inertia";
  export default {
    components : {
        AppLayout, Head , Link
    },
    props: {
        permissions : Object,
        posts: Object,
    },
      setup() {
          const destroy = (id) => {
              if (confirm('Are you sure?')) {
                  Inertia.delete(route('posts.destroy', id))
              }
          }
          return {destroy}
      }
}
</script>
