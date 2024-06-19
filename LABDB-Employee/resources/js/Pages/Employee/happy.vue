<template>
    <div>
        <ul>
            <li v-for="(department, index) in dept" :key="index">{{ department }}</li>
        </ul>
        <br>
        <ul>
            <li v-for="(employees, index) in emp" :key="index">{{ employees }}</li>
        </ul>
    </div>
</template>

<script setup> 
const { dept , emp } = defineProps(['dept','emp']);
</script>