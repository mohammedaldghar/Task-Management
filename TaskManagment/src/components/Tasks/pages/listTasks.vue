<script setup>
//Imports
import {onMounted, ref} from "vue";
import TaskServices from "@/components/Tasks/services/taskServices";
import {useRouter} from "vue-router"

//Variables
  const router = useRouter();
  const tasks = ref([]);

//Functions
  const getAllTasks = ()=>{
    TaskServices.getAllTasks().then((res)=>{
      tasks.value=res.data;
      tasks.value.forEach((task)=>{
        if (task.completed===0){
          task.completed=false;
        }else {
          task.completed=true;
        }
      })
    }).catch((err)=>{

    })
  }
  const deleteTask=(task)=>{
    TaskServices.deleteTask(task).then((res)=>{
      getAllTasks();
      router.push('/');
    }).catch((err)=>{

    })
  }
  const changeTaskStatus=(task)=>{
    TaskServices.editTask(task).then((res)=>{

    }).catch((err)=>{

    })
  }
  const gotoEditTaskPage=(task)=>{
    router.push(`/edit-task/${task.id}`);
  }
  const gotoAddTaskPage=()=>{
    router.push(`/add-task`);
  }

  onMounted(()=>{
    getAllTasks()
  })
</script>

<template>
<div class="container">
  <div class="row mt-5">
    <div class="col-lg-10 col-xl-10 col-md-9">
      <h1>All Tasks : </h1>
    </div>
    <div class="col mt-5 rounded-5">
      <button class="btn btn-success text-center" title="Add New Task" @click="gotoAddTaskPage()">Add New Task</button>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-lg-4 col-xl-4 col-md-6 mt-3" v-for="task in tasks" :key="task.id">
      <div class="card bg-body-tertiary">
        <div class="card-body">
          <h5 class="card-title fw-bold">{{task.title}}</h5>
          <p class="card-text fw-light mt-3">{{task.description}}</p>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
          <div>
            <input type="checkbox" class="form-check-input" id="completed" v-model="task.completed" @change="changeTaskStatus(task)">
            <label class="form-check-label ms-2" for="completed" v-if="task.completed">Completed</label>
            <label class="form-check-label ms-2" for="completed" v-if="!task.completed">UnCompleted</label>
          </div>
          <div>
            <i class="fa-solid fa-pen-to-square fs-5" id="edit-icon" title="Edit Task" @click="gotoEditTaskPage(task)"></i>
            <i class="fa-solid fa-trash-can fs-5 ms-3" @click="deleteTask(task)" title="Delete Task" id="delete-icon"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>
  #edit-icon:hover{
    color: #E4A11B;
  }
  #delete-icon:hover{
    color: #DC4C64;
  }
</style>