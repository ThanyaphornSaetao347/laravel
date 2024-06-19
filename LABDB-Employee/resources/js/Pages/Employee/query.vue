<template>
    <div>
        <h1>1.	บริษัทมีตำแหน่งงานใดบ้าง</h1>
        <ul>
            <li v-for="(titles, index) in title" :key="index">Department : {{ titles.title }}</li>
        </ul>
        <br>
        <h1>2.	พนักงานแต่ละคนมีอายุเท่าไหร่</h1>
        <ul>
            <li v-for="(employees, index) in age" :key="index">Employee Number : 
                {{ employees.emp_no }} , age: {{ employees.age }}</li>
        </ul>
        <br>
        <h1>3.	จำนวนพนักงานชาย/หญิง</h1>
        <ul>
            <li>Male = {{ maleCount }}</li>
            <li>Female = {{ femaleCount }}</li>
        </ul>
        <br>
        <h1>4.	หัวหน้าแผนกคนปัจจุบัน</h1>
        <ul>
            <li v-for="(dept_manager, index) in manager" :key="index">Department : {{ dept_manager.dept_no }} , 
                Employee Number : {{ dept_manager.emp_no }} , Name : {{ dept_manager.first_name }}</li>
        </ul>
        <br>
        <h1>5.	เงินเดือนล่าสุดของพนักงานแต่ละคน</h1>
        <ul>
            <li v-for="(salaries,index) in sala" :key="index">
                Employee Number : {{ salaries.emp_no }} , Salary : {{ salaries.salary }}</li>
        </ul>
        <br>
        <h1>6.	จำนวนพนักงานในแต่ละแผนก</h1>
        <ul>
            <li v-for="(dept_no,index) in work" :key="index">Department ID :{{ dept_no.dept_no }} , There are {{ dept_no.employee_count }} people in total</li>
        </ul>
        <br>
        <h1>7.	ค่าเฉลี่ยเงินเดือนพนักงานแต่ละแผนก</h1>
        <ul>
            <li v-for="(salaries,index) in avg" :key="index">Department ID : {{ salaries.dept_no }} , Average salary : {{ salaries.avg }}</li>
        </ul>
        
    </div>
</template>

<script setup> 
const { title , age , maleCount , femaleCount , sala , work , avg , manager} = 
defineProps(
    ['title','age','maleCount','femaleCount','sala','work','avg','manager']);
</script>