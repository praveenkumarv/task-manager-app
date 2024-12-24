<<<<<<< HEAD
<h1>Task Manager Application</h1>
    <p>The Task Manager Application is a web-based task management system that utilizes Laravel as the back-end framework for implementing CRUD (Create, Read, Update, Delete) REST APIs, and Vue.js for the front-end interface to consume these APIs. This application allows users to manage their tasks in a convenient and organized manner.</p>
<h2>App Contains</h2>
<ul>
  <li>Laravel code with controllers, models, migrations, and validation. </li>
  <li>Vue.js code for the frontend, including the form and Axios integration.</li>
</ul>
<h2>Screens</h2>
<ul>
    <li>Login </br>
        ![image](https://github.com/user-attachments/assets/dfc808c3-7875-40e7-b529-13f37235ed22)
    </li>
    <li>Tasks</br>
        ![image](https://github.com/user-attachments/assets/3c074f62-69c6-4373-901c-2fcf3abc83c6)
    </li>
    <li>Upcoming Tasks</br>
        ![image](https://github.com/user-attachments/assets/ceea2e22-8592-4e83-9862-01b67406b441)
    </li>
</ul>
<ul>
    <li>Video Demo</ br>
        https://www.loom.com/share/0ee791a0b9f349b8bf7ab88c22dc32a9?sid=fb31738b-cd50-43aa-89a9-e4a4c3d97cf7
    </li>
</ul>

<h2>Features</h2>
<ul>
    <li>Create tasks: Users can create new tasks by providing a title and description.</li>
    <li>Read tasks: Users can view their existing tasks along with their details, such as title, description, and status.</li>
    <li>Update tasks: Users can edit the title, description, and status of their tasks.</li>
    <li>Delete tasks: Users can delete tasks that are no longer needed.</li>
    <li>Upcoming Tasks: It shows the tasks due in the next 7 days.</li>
</ul>

<h2>Technologies Used</h2>
<ul>
    <li>Laravel: Laravel is a PHP web application framework that provides a robust and scalable foundation for building web applications. It is used as the back-end framework in this application to implement REST APIs for task management.</li>
    <li>Vue.js: Vue.js is a JavaScript framework for building user interfaces. It is used as the front-end framework in this application to consume the REST APIs and provide a responsive and interactive user interface for managing tasks.</li>
    <ul>
    <li>Laravel version: Laravel Framework 10.48.25</li>
    <li>PHP Version 8.2.18</li>
    <li>Vue Version: 3.2</li>
    <li>MySQL Version: 8.3</li>
    </ul>
</ul>

<h2>Installation</h2>
<ol>
    <li>Clone the repository to your local environment.</li>
    <li>Make sure you have PHP and Composer installed on your system.</li>
    <li>Run the following command to install the Laravel dependencies:</li>
    <pre><code>composer install</code></pre>
    <li>Copy the .env.example file to .env and configure your database settings.</li>
    <li>Change charset to <pre><code>'charset' => 'utf8', 'collation' => 'utf8_unicode_ci' </pre></code>in config/databse.php</li>
    <li>Run the following command to generate a key for your application:</li>
    <pre><code>php artisan key:generate</code></pre>
    <li>Run the following command to migrate the database: (An alert to create a database will appear in the cli.)</li>
    <pre><code>php artisan migrate</code></pre>
    <li>Run the following command to seed the database with sample data:</li>
    <pre><code>php artisan db:seed</code></pre>
    <li>Run the following command to start the Laravel development server:</li>
    <pre><code>npm run dev</code></pre>
    <pre><code>php artisan serve</code></pre>
    <li>Open your web browser and access the application at <code>http://localhost:8000</code>.</li>
</ol>

<h2>Usage</h2>
<p>Once the application is up and running, you can start managing tasks using the following actions:</p>
<ul>
    <li>Create a task: Click on the "Create Task" button and fill in the required details in the modal that appears. Click "Save" to create a new task.</li>
    <li>View tasks: All the tasks that you have created will be listed on the main page. You can view the details of a task by clicking on its title.</li>
    <li>Edit a task: To edit a task, click on the "Edit" button next to the task you want to modify. Update the details in the modal that appears and click "Save" to save the changes.</li>
    <li>Delete a task: To delete a task, click on the "Delete" button next to the task you</li>
    <li>Upcoming Tasks: It shows the tasks due in the next 7 days.</li>
=======
Task Manager Application
The Task Manager Application is a web-based task management system that utilizes Laravel as the back-end framework for implementing CRUD (Create, Read, Update, Delete) REST APIs, and Vue.js for the front-end interface to consume these APIs. This application allows users to manage their tasks in a convenient and organized manner.

FEATURES
Create, read, update, and delete tasks.
Set task due dates and priorities.
Mark tasks as completed.
Filter tasks by status, due date, and priority.
Search tasks by title.
User authentication and authorization.
Technologies Used
Laravel: A popular PHP web framework used for developing robust and scalable web applications.
Vue.js: A JavaScript framework for building user interfaces.
MySQL: A relational database management system used for storing task data.
Axios: A popular HTTP client for making API requests from the Vue.js front-end to the Laravel back-end.

INSTALATION
1.Clone the repository to your local environment.
2.Navigate to the project directory and run composer install to install Laravel dependencies.
3.Copy the .env.example file to .env and configure your database settings (e.g., database name, username, and password).
4.Run php artisan key:generate to generate an application key.
5.Run php artisan migrate to create the necessary database tables.
6.Run php artisan db:seed to seed the database with sample data (optional).
7.Run npm install to install Vue.js dependencies.
8.Run npm run dev to compile the Vue.js assets.
9.Finally, run php artisan serve to start the development server.

API ENDPOINTS
The following REST API endpoints are available in the Task Manager Application:

GET /api/tasks: Get all tasks.
GET /api/tasks/{id}: Get a specific task by ID.
POST /api/tasks: Create a new task.
PUT /api/tasks/{id}: Update a task by ID.
DELETE /api/tasks/{id}: Delete a task by ID.
Front-end
The front-end of the Task Manager Application is built using Vue.js and provides a user-friendly interface for managing tasks. Users can view tasks, create new tasks, update task details, mark tasks as completed, and delete tasks. The front-end interacts with the back-end Laravel APIs using Axios to perform CRUD operations.

Authentication and Authorization
The Task Manager Application implements user authentication and authorization using Laravel's built-in authentication system. Users can register an account, log in, and log out. Authenticated users can create, update, and delete their own tasks, while only administrators can perform these operations on any tasks.

Security
The Task Manager Application takes security seriously and includes the following security measures:

Input validation to prevent SQL injection and cross-site scripting (XSS) attacks.
CSRF protection using Laravel's built-in CSRF middleware.
Authentication and authorization to restrict access to authorized users only.
Password hashing using Laravel's bcrypt hashing algorithm.
Secure communication over HTTPS.
Conclusion
The Task Manager Application is a full-fledged web-based task management system that provides CRUD operations through REST APIs built with Laravel, and a modern and interactive front-end interface using Vue.js. With its user-friendly features and security measures, it helps users to effectively manage their tasks in a seamless manner.





>>>>>>> parent of 7156488 (Update README.md)
