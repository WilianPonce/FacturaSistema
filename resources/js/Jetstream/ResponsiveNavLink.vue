<template>
    <div>
        <template v-if="active">
            <button type="button" class="flex items-center mt-1 px-3 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 py-3 w-full focus:outline-none" v-if="as == 'button'">
                <slot></slot>
            </button>
            <button :class="classessub" v-else-if="as == 'submenu'">
                <slot></slot>
            </button>
            <button :class="classes" v-else>
                <slot></slot>
            </button>
        </template>
        <template v-else>
            <button type="button" class="flex items-center mt-1 px-3 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 py-3 w-full focus:outline-none" v-if="as == 'button'">
                <slot></slot>
            </button>
            <inertia-link :href="href" :class="classessub" v-else-if="as == 'submenu'">
                <slot></slot>
            </inertia-link>
            <inertia-link :href="href" :class="classes" v-else>
                <slot></slot>
            </inertia-link>
        </template>
    </div>
</template>

<script>
    export default {
        props: ['active', 'href', 'as'],

        computed: {
            classes() {
                return this.active
                            ? 'flex items-center mt-1 px-3 text-gray-200 bg-gray-700 py-3 active pointer w-full hover:outline-none'
                            : 'flex items-center mt-1 px-3 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 py-3 pointer w-full hover:outline-none'
            },
            classessub() {
                return this.active
                            ? 'flex items-center px-2 pl-5 text-gray-200 bg-gray-700 py-3 active pointer w-full hover:outline-none'
                            : 'flex items-center px-2 pl-5 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 py-3 bg-gray-800 pointer w-full hover:outline-none'
            }
        }
    }
</script>
<style>
    .pointer{
        cursor:pointer;
    }
</style>
