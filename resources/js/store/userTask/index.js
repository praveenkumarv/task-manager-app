import axios from "axios";
import { defineStore } from "pinia";
import Swal from "sweetalert2/dist/sweetalert2.js";
import router from "../../router";
import "vue3-toastify/dist/index.css";
import { toast } from "vue3-toastify";

export const useUserTasks = defineStore("user-tasks-store", {
    state: () => {
        return {
            userTasks: [],
            userTask: "",
            errors: "",
        };
    },

    getters: {
        allUSerTasks(state) {
            return state.userTasks;
        },

        getErrors(state) {
            return state.errors;
        },
        getUserTask(state) {
            return state.userTask;
        },
    },

    actions: {
        async fetchAllUserTasks() {
            await axios.get("/sanctum/csrf-cookie");
            const response = await axios.get("/api/v1/user_tasks");
            try {
                this.userTasks = response.data.data;
                return this.userTasks;
            } catch (err) {
                this.tasks = [];
                console.error("Error fetching user Tasks:", err);
                return err;
            }
        },

        async createNewUserTask(user_task) {
            await axios.get("/sanctum/csrf-cookie");
            const res = await axios.post("/api/v1/user_tasks", user_task, {});

            if (res.data.status) {
                toast.success(res.data.message, {
                    position: "top-center",
                    pauseOnHover: false
                });

                this.userTask = res.data.data;
                this.userTasks.push(this.userTask);

                console.log(this.userTasks);
                router.push("/user_tasks");
            } else {
                toast.error(res.data.message, {});
                this.errors = res.data.message;
            }
        },

        async editUserTask(user_task) {
            
            await axios.get("/sanctum/csrf-cookie");

            const response = await axios.get(`/api/v1/user_tasks/${user_task.id}`, {});
            if (response.data.status) {
                this.user_task = response.data.data;

                console.log("edit_data", this.user_task);
                router.push(`/user_task/edit/${this.user_task.id}`);
                //router.push({ path: '/tasks/edit', query: { id: [this.task.id] }})

            } else {
                toast.error(response.data.message);

                this.errors = response.data.message;
            }
        },

        async deleteUserTask(id) {
            await axios.get("/sanctum/csrf-cookie");

            Swal.fire({
                title: 'User Task Deletion',
                text: 'Are you sure you want to delete this?',
                icon: 'error',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if(result.isConfirmed) {

                    axios.delete(`/api/v1/user_tasks/${id}`).then((response) => {

                        console.log(response.data);

                        if(!response.data.status) {
                            toast.error(response.data.message, {
                                position: 'top-center'
                            });
                        }

                        else {
                            toast.success(response.data.message, {
                                position: 'top-center',
                                pauseOnHover: false

                            });
                        }
                    })

                }

                this.fetchAllTasks();
              })

        },

        getLoggedInUser() {
            return this.user;
        },
    },
});

