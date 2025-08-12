import { createApp } from "vue";
import axios from "axios";

if (document.getElementById("FormUsers")) {
    createApp({
        data() {
            return {
                form: {
                    name: "",
                    email: "",
                    password: ""
                },
                users: [],
                showModal: false // modal visibility state
            };
        },
        mounted() {
            console.log("Vue app mounted → Fetching users...");
            this.fetchUsers();
        },
        methods: {
            // Fetch all users
            fetchUsers() {
                console.log("Fetching all form users...");
                axios.get("/form_users")
                    .then(response => {
                        console.log("Users fetched successfully:", response.data);
                        this.users = response.data;
                    })
                    .catch(error => {
                        console.error("Error fetching users:", error);
                    });
            },

            // Create a new user
storeUser() {
    console.log("Creating new user with data:", this.form);
    axios.post("/form_users", {
        name: this.form.name,
        email: this.form.email
    })
    .then(() => {
        console.log("✅ User created successfully!");
        this.fetchUsers();
        this.form = { name: "", email: "" };
        this.closeModal();
    })
    .catch(error => {
        console.error("❌ Error creating user:", error);
    });
},

            // Delete a user
            deleteUser(id) {
                console.log(`Deleting user with ID: ${id}`);
                axios.delete(`/form_users/${id}`)
                    .then(() => {
                        console.log("✅ User deleted successfully!");
                        this.fetchUsers();
                    })
                    .catch(error => {
                        console.error("❌ Error deleting user:", error);
                    });
            },

            // Modal control
            openModal() {
                this.showModal = true;
            },
            closeModal() {
                this.showModal = false;
            }
        }
    }).mount("#FormUsers");
}
