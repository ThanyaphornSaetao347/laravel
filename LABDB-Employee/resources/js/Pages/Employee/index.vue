<template>
    <div>
        <h1>Employee</h1>
        <br>
        <h1>แสดงรายชื่อแผนกทั้งหมด Department เรียงลําดับตามตัวอักษร</h1>
        <ul>
            <li v-for="(department, index) in dept" :key="index">{{ department }}</li>
        </ul>
        <br>
        <h1>แสดงรายชื่อพนักงาน ที่ชื่อขึ้นต้นด้วย ‘A’ และเป็นเพศชาย (50คน)</h1>
        <ul>
            <li v-for="(employee, index) in male" :key="index">{{ employee.first_name }}</li>
        </ul>
        <br>
        <h1>แสดงรายชื่อพนักงาน หญิง อายุมากกว่า 50 ปี (50คน)</h1>
        <ul>
            <li v-for="(employee, index) in female" :key="index">{{ employee.first_name }}</li>
        </ul>
        
    </div> 
</template>



<script setup> 
const { dept, male, female, emp } = defineProps(['dept','male',
'female']);
</script>