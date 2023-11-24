<script setup>
//Imports
import {onMounted, ref} from "vue";
import TaskServices from "@/components/Tasks/services/taskServices";
import {useRouter,useRoute} from "vue-router"

//Variables
  const router = useRouter();
  const route = useRoute();
  const task=ref({
    title:"",
    description:"",
  });
  const taskId = route.params.id;

// Functions
  const getTaskIfExist=()=>{
    if (taskId){
      TaskServices.getSpecificTask(taskId).then((res)=>{
        task.value=res.data;
      })
    }
  }
  const addNewTask=()=>{
    TaskServices.addNewTask(task.value).then((res)=>{
      router.push('/');
    }).catch((err)=>{

    })
  }
  const editTask=()=>{
    TaskServices.editTask(task.value).then((res)=>{
      router.push('/');
    }).catch((err)=>{

    })
  }

  onMounted(()=>{
    getTaskIfExist()
  })
</script>

<template>
  <div class="content">
  <div class="container p-5 rounded form-container bg-body-secondary">
    <div class="row">
      <h5>Add New Task</h5>
    </div>
    <div class="row">
      <div class="row mt-3">
         <label for="title" class="mt-2">Title</label>
         <input type="Text" id="title" name="title" class="border-top-0 border-start-0 border-end-0 mb-3   input-background" placeholder="Task Title" v-model="task.title">
      </div>
      <div class="row">
         <label for="description" class="mt-2">Description</label>
         <textarea type="Text" id="description" name="description" class="border-top-0 border-start-0 border-end-0 mb-3 input-background" placeholder="Task Description" v-model="task.description"/>
        <p class="text-body-tertiary">Description should only be {{300-task.description.length}} characters</p>
      </div>
      <div class="row mt-4">
        <button  class="btn btn-success me-3 text-white rounded" v-if="!taskId" @click="addNewTask()">Add</button>
        <button  class="btn btn-warning me-3 text-white rounded" v-if="taskId" @click="editTask()">Edit</button>
      </div>
    </div>
  </div>
    </div>
</template>

<style scoped>
.form-container {
  width: 80%; /* Adjust the width based on your design */
  margin: auto; /* Center the container horizontally */
  padding: 20px;
}

@media screen and (max-width: 768px) {
  .form-container {
    width: 100%; /* Adjust the width for smaller screens */
  }
}
.content {
  position: absolute;
  top: 25%;
  left: 30%;
  width: 40%;
}

@media screen and (max-width: 768px) {
  .content {

    top: 20%;
    width: 100%;
    left: 0%;
  }
}
</style>