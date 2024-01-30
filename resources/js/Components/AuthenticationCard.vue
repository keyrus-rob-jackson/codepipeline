<template>
    <div class="lg:w-1/2 m-auto">
        <div class="">
            <div class="p-4">
                <slot name="logo" />
            </div>

            <div class="w-full sm:max-w-md mt-2 px-4 overflow-hidden sm:rounded-lg">
                <slot />
            </div>
        </div>
    </div>
</template>
