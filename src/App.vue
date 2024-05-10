<template>
  <div class="container mt-5">
        <Header></Header>
    <!-- DATATABLE -->
    <table
      class="row-border display cell-border table table-dark table-striped"
      id="tasks_table"
    >
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Created_at</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id">
          <th>{{ task.id }}</th>
          <td>{{ task.title }}</td>
          <td>{{ task.description }}</td>
          <td>{{ task.created_at.slice(0, 10) }}</td>
        </tr>
      </tbody>
    </table>
    <!-- END DATATABLE -->
    <Footer></Footer>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import DataTable from "datatables.net-dt";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

const tasks = ref([]);

/**
 * Fetches task data from the server and updates the 'tasks' reactive variable.
 * @return array tasks
 * @error handle axios error
 */
const getTasks = async () => {
  try {
    // Make a GET request to the server to fetch tasks
    const response = await axios.get(
      "http://localhost/test_app/test_tasks/src/api/tasks"
    );
    // Update the 'tasks' reactive variable with the data received from the server
    tasks.value = response.data;
  } catch (error) {
    console.error("Error fetching tasks:", error);
  }
};

onMounted(async () => {
  await getTasks();
  new DataTable("#tasks_table");
});
</script>

<style></style>
