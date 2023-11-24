import axios from "axios";
 class TaskServices {
     getAllTasks() {
         return axios.get('http://127.0.0.1:8000/api/task');
     }
     editTask(task){
         return axios.patch(`http://127.0.0.1:8000/api/task/${task.id}`,task)
     }
     deleteTask(task){
         return axios.delete(`http://127.0.0.1:8000/api/task/${task.id}`);
     }
     getSpecificTask(taskId){
         return axios.get(`http://127.0.0.1:8000/api/task/${taskId}`);
     }
     addNewTask(task){
         return axios.post('http://127.0.0.1:8000/api/task',task);
     }
 }
 export default new TaskServices();